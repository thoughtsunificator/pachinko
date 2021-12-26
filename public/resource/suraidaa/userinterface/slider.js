UserInterface.model({
	name: "suraidaa.slider",
	method: UserInterface.appendChild,
	properties: {
		tagName: "div",
		id: "slider",
		children: [
			{
				tagName: "div",
				className: "display-grid template-slider-container",
				children: [
					{
						tagName: "a",
						href: "javascript:;",
						className: "slider-navigation-button slider-previous margin-left-small z-index-2"
					},
					{
						tagName: "a",
						href: "javascript:;",
						className: "slider-navigation-button slider-next margin-right-small z-index-2 justify-self-end"
					}
				]
				},
				{
					tagName: "div",
					className: "display-grid template-slider-bullets margin-top"
				}
		]
	}
})

UserInterface.bind("suraidaa.slider", async function(element, images) {

	let slider = new Suraidaa.Slider()

	let imagesNode = element.querySelector(".template-slider-container")
	let bulletsNode = element.querySelector(".template-slider-bullets")
	let previousButtonNode = element.querySelector(".slider-previous")
	let nextButtonNode = element.querySelector(".slider-next")

	UserInterface.listen(slider, "previous", async function(repeat) {
		let activeImage = slider.getActiveImage()
		let previousImage = slider.getPreviousImage()
		if (repeat && previousImage === null)
			previousImage = slider.getImages()[slider.getImages().length - 1]
		if (previousImage !== null) {
			await UserInterface.announce(slider, "set_image_state", { image: previousImage, state: Suraidaa.Image.STATE_ACTIVE })
			await UserInterface.announce(slider, "set_image_state", { image: activeImage, state: Suraidaa.Image.STATE_INACTIVE })
		}
	})

	UserInterface.listen(slider, "next", async function(repeat) {
		let activeImage = slider.getActiveImage()
		let nextImage = slider.getNextImage()
		if (repeat && nextImage === null)
			nextImage = slider.getImages()[0]
		if (nextImage !== null) {
			await UserInterface.announce(slider, "set_image_state", { image: nextImage, state: Suraidaa.Image.STATE_ACTIVE })
			await UserInterface.announce(slider, "set_image_state", { image: activeImage, state: Suraidaa.Image.STATE_INACTIVE })
		} 
	})

	UserInterface.listen(slider, "set_image_state", async function(data) {
		if (data.state === Suraidaa.Image.STATE_ACTIVE) {
			let activeImage = slider.getImages().find(image => image.getState() === Suraidaa.Image.STATE_ACTIVE)
			await UserInterface.announce(activeImage, "set_image_state", Suraidaa.Image.STATE_INACTIVE)
		}
		await UserInterface.announce(data.image, "set_image_state", data.state)
	})

	UserInterface.listen(slider, "initialize", async function(images) {
		for (const image of images) {
			slider.addImage(image)
			await UserInterface.runModel("suraidaa.image", { data: image, parentNode: imagesNode, bindingArgs: [slider, image] })
			await UserInterface.runModel("suraidaa.bullet", { data: image, parentNode: bulletsNode, bindingArgs: [slider, image] })
		}
		UserInterface.announce(slider, "set_image_state", { image: images[0], state: Suraidaa.Image.STATE_ACTIVE })
		slider.play()
	})

	imagesNode.addEventListener("mouseenter", () => slider.pause())
	imagesNode.addEventListener("mouseleave", () => slider.play())
	previousButtonNode.addEventListener("click", () => UserInterface.announce(slider, "previous", true))
	nextButtonNode.addEventListener("click", () => UserInterface.announce(slider, "next", true))

	await UserInterface.announce(slider, "initialize", images)
	
})
