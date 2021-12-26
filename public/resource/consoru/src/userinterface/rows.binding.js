UserInterface.bind("consoru.rows", async function(element, consoru, tab) {

	UserInterface.listen(consoru, "tab set", function(name) {
		if(name === tab.name) {
			element.style.display = ""
		} else {
			element.style.display = "none"
		}
	})

	for(const row of tab.data) {
		await UserInterface.runModel("consoru.row", {bindingArgs:[consoru, tab], data: row, parentNode: element})
	}

})
