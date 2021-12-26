UserInterface.bind("consoru.console", async function(element, tabs, defaultTab) {

	const consoru = new Consoru.Console()

	const tabContentNode = element.querySelector(".tab-content")
	const tabsNode = element.querySelector(".tabs")
	const closeNode = element.querySelector(".closeBtn")


	UserInterface.listen(consoru, "tab set", function(name) {
		if(name === null) {
			element.classList.remove("open")
		} else {
			element.classList.add("open")
		}
	})

	for (const tab of tabs) {
		await UserInterface.runModel("collection.tab", {bindingArgs: [consoru, {action: "tab set", name: tab.name, toggle: true}], parentNode: tabsNode, data: { text: tab.name, className: "tab" }})
		await UserInterface.runModel("consoru.rows", {parentNode: tabContentNode, bindingArgs: [consoru, tab], data: tab})
	}

	document.body.classList.add("consoru")

	closeNode.addEventListener("click", function() {
		document.body.classList.remove("consoru")
		element.remove()
	})

})
