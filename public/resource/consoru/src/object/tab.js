Consoru.Tab = function(name) {
	this.name = name
	this.active = false
}

Consoru.Tab.prototype.isActive = function() {
	return this.active
}

Consoru.Tab.prototype.setActive = function(active) {
	this.active = active
}