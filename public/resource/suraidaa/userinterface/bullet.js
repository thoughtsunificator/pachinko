UserInterface.model({
	name: "suraidaa.bullet",
	method: UserInterface.appendChild,
	properties: {
		tagName: "a",
		href: "javascript:;",
		className: "slider-bullet"
	},
})

UserInterface.bind("suraidaa.bullet", function(element, slider, image) {

	UserInterface.listen(image, "set_image_state", function(state) {
		if (state === Suraidaa.Image.STATE_ACTIVE)
			element.classList.add("slider-bullet-active")
		else if (state === Suraidaa.Image.STATE_INACTIVE)
			element.classList.remove("slider-bullet-active")
	})

	element.addEventListener("click", function() {
		slider.interrupt()
		UserInterface.announce(slider, "set_image_state", { image, state: Suraidaa.Image.STATE_ACTIVE })
	})

})
