/*
userinterface.js v0.0.3
Copyright (C) 2019 Romain Lebesle

This program is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program.  If not, see <https://www.gnu.org/licenses/>.
Element¹: https://developer.mozilla.org/en-US/docs/Web/API/element
Node²: https://developer.mozilla.org/en-US/docs/Web/API/node
*/
(function() {

	const PROPERTIES_PROCESSED = ["count", "tagName", "children"]
	const APPEND_CHILD = "appendChild"
	const INSERT_BEFORE = "insertBefore"
	const REMOVE_ELEMENT = "removeElement"
	const UPDATE_ELEMENT = "updateElement"
	const REPLACE_ELEMENT = "replaceElement"
	const WRAP_ELEMENT = "wrapElement"
	const REMOVE_LISTENERS = "removeListeners"
	const METHODS_CREATE = [
		APPEND_CHILD,	
		INSERT_BEFORE, 
		REPLACE_ELEMENT, 
		WRAP_ELEMENT
	]

	let _models = []
	let _groups = []
	let _sets = []
	let _listeners = []

	this.DEBUG = false
	this.appendChild = APPEND_CHILD
	this.insertBefore = INSERT_BEFORE
	this.removeElement = REMOVE_ELEMENT
	this.replaceElement = REPLACE_ELEMENT
	this.updateElement = UPDATE_ELEMENT
	this.wrapElement = WRAP_ELEMENT
	this.removeListeners = REMOVE_LISTENERS

	/**
	 * Create a model
	 * @param {type} 								model                   		 
	 * @param {string} 							model.name                  The name of the model
	 * @param {string} 							model.method                The name of the method
	 * @param {?Object}							model.properties  					Processed properties along with any properties an Element¹ can have
	 * @param {?function}						model.callback  						Callback of processed properties along with any properties an Element¹ can have
	 * @param {number} 							[model.properties.count] 	 	The number of element
	 * @param {Object[]} 						[model.properties.children]	An array of the "properties" object
	 * @param {string[]} 						[model.cssSelectors]        The CSS selector(s) of the target(s)
	 */
	this.model = model => {
		if (this.DEBUG)
			console.log("[model]", model.method, model.name)
		_models.push(model)
	}

	/**
	 * Link a model and a given function
	 * @param {string} 	 name 	  The name of the model
	 * @param {function} callback The function binding the model
	*/
	this.bind = (name, callback) => {
		if (this.DEBUG)
			console.log("[bind]", name)
		_models.find(model => model.name === name).binding = {name, callback}
	}

	/**
	 * Group models
	 * @param {string} 	 name 	The name of the group
	 * @param {string[]} models The names of the models
	 */
	this.group = (name, models) => {
		if (this.DEBUG)
			console.log("[group]", name, models)
		_groups.push({name, models})
	}

	/**
	 * Combine groups into a set
	 * @param {string} 	 name 	The name of the set
	 * @param {string[]} models	The names of the groups
	 */
	this.set = (name, groups) => {
		if (this.DEBUG)
			console.log("[set]", name, groups)
		_sets.push({name, groups})
	}

	/**
	 * Fire a model
	 * @param {string} name 		    							The name of the model
	 * @param {Object} [parameters]								The parameters of the model
	 * @param {Object} [parameters.data] 			    The data that will be echoed on the model
	 * @param {Object} [parameters.parentNode]		The Element¹ each selector will query on
	 * @param {Object} [parameters.bindingArgs]		The arguments that go along with the binding
	 */
	this.runModel = async (name, parameters = {}) => {
		if (this.DEBUG)
			console.log("[runModel]", name)
		let model = _models.find(model => model.name === name)		
		let {method, properties} = model
		if (model.hasOwnProperty("callback"))
			properties = model.callback(parameters.data)
		let targets = []
		if (model.hasOwnProperty("cssSelectors") && model.cssSelectors.length >= 1) {
			let parentNode = document
			if (parameters.hasOwnProperty("parentNode"))
				parentNode = parameters.parentNode
			targets = [].concat.apply([], model.cssSelectors.map((selector) => {
				if (selector.startsWith("*"))
					return [].slice.call(parentNode.querySelectorAll(selector.substring(1)))
				else
					return parentNode.querySelector(selector)
			})).filter(target => target !== null)
		}
		if (targets.length === 0 && parameters.hasOwnProperty("parentNode"))
			targets.push(parameters.parentNode)		
		if (method === WRAP_ELEMENT)
			properties.count = targets.length
		for ([index, target] of targets.entries()) {
			let nodes = []
			if (METHODS_CREATE.includes(method))
				nodes = await UserInterface.createNodes(properties)
			if (method === APPEND_CHILD)
				nodes.forEach(element => target.appendChild(element))
			else if (method === INSERT_BEFORE)
				nodes.forEach(element => target.parentNode.insertBefore(element, target))
			else if (method === REMOVE_ELEMENT)
				target.parentNode.removeChild(target)
			else if (method === REPLACE_ELEMENT)
				target.parentNode.replaceChild(nodes[0], target)
			else if (method === UPDATE_ELEMENT)
				Object.assign(target, properties)			
			else if (method === WRAP_ELEMENT) {
				nodes[index].appendChild(target.cloneNode(true))
				target.parentNode.replaceChild(nodes[index], target)
			} else if (method === REMOVE_LISTENERS)
				target.parentNode.replaceChild(target.cloneNode(true), target)
			if (nodes.length >= 1 && model.hasOwnProperty("binding"))
				await	model.binding.callback.apply(null, [nodes[0]].concat(parameters.bindingArgs))
		}
	}

	/**
	 * Run a group
	 * @param  {string} 	name          The name of the group
	 * @param  {Object[]} [parameters]	The parameters for each model
	 */
	this.runGroup = async (name, parameters = []) => {
		if (this.DEBUG)
			console.log("[runGroup]", name)
		let {models} = _groups.find(group => group.name === name)
		for (let [index, name] of models.entries())
			if (index <= parameters.length)
				await UserInterface.runModel(name, parameters[index])
			else
				await UserInterface.runModel(name)
	}

	/**
	 * Run a set
	 * @param  {string} 	name         The name of the set
	 * @param  {Object[]} [parameters] The parameters for each model by group
	 */
	this.runSet = async (name, parameters = []) => {
		if (this.DEBUG)
			console.log("[runSet]", name)
		let {groups} = _sets.find(set => set.name === name)
		for (let [index, name] of groups.entries())
			if (index <= parameters.length)
				await UserInterface.runGroup(name, parameters[index])
			else	
				await UserInterface.runGroup(name)
	}

	/**
	 * Create one or many Nodes
	 * @param {?(Object|function)} properties	Processed properties along with any properties an Element¹ can have or a callback returning them
	 * @returns {Element[]}                   An array of Nodes¹
	 */	
	this.createNodes = async (properties) => {
		let elements = []
		let {count = 1, tagName, children = []} = properties
		for (let i = 0; i < count; i++) {
			let currentTagName
			if (tagName instanceof Array)
				currentTagName = tagName[i]
			else
				currentTagName = tagName
			let element = document.createElement(currentTagName)
			Object.keys(properties).filter(property => PROPERTIES_PROCESSED.includes(property)).forEach(property => {
				if (properties[property] instanceof Array)
					element[property] = properties[property][i]
				else
					element[property] = properties[property]
			})
			let currentChildren
			if (children.length > 0 && children[0] instanceof Array)
				currentChildren = children[i]
			else
				currentChildren = children
			for (let child of currentChildren)
				(await UserInterface.createNodes(child)).forEach(childElement => element.appendChild(childElement))			
			elements.push(element)
		}
		return elements
	}	

	/**
	 * Returns the properties of a model
	 * @param  {string} name   The name of the model 
	 * @param  {Object} [data] The data that will be echoed on the model
	 * @return {Object}	       The "properties" object of the model
	 */
	this.getModelProperties = (name, data) => {
		let model = _models.find(model => model.name === name)
		if (model.hasOwnProperty("callback"))
			return model.callback(data)
		else if (model.hasOwnProperty("properties"))
			return model.properties	
	}

	/**
	 * Add a listener
	 * @param  {*} 		  	context	 Where the announce will be broadcasted
	 * @param  {string}   title 	 The content of the message
	 * @param  {function} callback 
	 */
	this.listen = (context, title, callback) => {
		if (this.DEBUG)
			console.log("(listen)", title)
		_listeners.push({context, title, callback})
	}

	/**
	 * Message one or many listeners
	 * @param  {*} 			context Where the announce will be broadcasted
	 * @param  {string} title 	The title of the announce
	 * @param  {*} 			content The content of the announce
	 */
	this.announce = async (context, title, content) => {
		if (this.DEBUG)
			console.log("(announce)", title)
		let listeners = _listeners.filter(listener => listener.context === context && listener.title === title)
		for (let listener of listeners)
			await listener.callback(content)
	}
	
}).call(UserInterface = {})
