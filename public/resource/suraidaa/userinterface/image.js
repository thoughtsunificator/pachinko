UserInterface.model({
	name: "suraidaa.image",
	method: UserInterface.appendChild,
	callback: image => ({
		tagName: "figure",
		className: "display-grid template-slider-image",
		children: [
			{
				tagName: "picture",
				children: [
					{
						tagName: "source",
						media: image.getMedia("low"),
						srcset: image.getSrc("low")
					},
					{
						tagName: "source",
						media: image.getMedia("medium"),
						srcset: image.getSrc("medium")
					},
					{
						tagName: "img",
						className: "display-block full-width full-height",
						srcset: image.getSrc("default"),
						alt: image.getText()
					}
				]
			},
			{
				tagName: "figcaption",
				className: "padding-vertical full-width text-indent background-color-seethrough",
				children: [{
					tagName: "a",
					className: "color-white hover-text-decoration-underline",
					href: image.getLink(),
					textContent: image.getText()
				}]
			}
		]
	})
})

UserInterface.bind("suraidaa.image", function(element, slider, image) {

	UserInterface.listen(image, "set_image_state", function(state) {
		if (state === Suraidaa.Image.STATE_ACTIVE)
			element.classList.add("z-index-1")
		else if (state === Suraidaa.Image.STATE_INACTIVE)
			element.classList.remove("z-index-1")
	})
	
})
