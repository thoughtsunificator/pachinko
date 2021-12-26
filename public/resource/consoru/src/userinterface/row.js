UserInterface.model({
	name: "consoru.row",
	method: UserInterface.appendChild,
	callback: text => ({
		tagName: "div",
		className: "row",
		textContent: text
	})
})
