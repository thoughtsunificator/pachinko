Suraidaa.Slider = function() {
	this.images = []
	this.state = Suraidaa.Slider.STATE_PLAYING
	this.timeout = null

	this.addImage = function(image) {
		this.images.push(image)
	}

	this.removeImage = function(image) {
		this.images.splice(this.images.indexOf(image), 1)
	}

	this.getImages = function() {
		return this.images
	}

	this.getActiveImage = function() {
		return this.images.find(image => image.getState() === Suraidaa.Image.STATE_ACTIVE)
	}

	this.getPreviousImage = function() {
		let index = this.images.indexOf(this.getActiveImage())
		let previousIndex = index - 1
		if (previousIndex >= 0) {
			return this.images[previousIndex]
		} else {
			return null
		}
	}

	this.getNextImage = function() {
		let index = this.images.indexOf(this.getActiveImage())
		let nextIndex = index + 1
		if (nextIndex <= this.images.length - 1) {
			return this.images[nextIndex]
		} else {
			return null
		}
	}
	
	this.setActiveImage = function(image) {
		this.images.array.forEach (element => {
			if (image === element)
				element.setActive(true)
			else
				element.setActive(false)
		})
	}

	this.play = async function() {
		if (UserInterface.DEBUG === true)
			console.log("[Slider]: play")
		this.state = Suraidaa.Slider.STATE_PLAYING
		while(this.state === Suraidaa.Slider.STATE_PLAYING) {
			if (UserInterface.DEBUG === true)
				console.log("[Slider]: (Timeout) Waiting " + Suraidaa.Slider.TIMEOUT_MILLISECOND+"ms to go the next image")
			await new Promise(async (resolve) => {
				this.timeout = setTimeout(async () => {
					await UserInterface.announce(this, "next", true)
					resolve()
				}, Suraidaa.Slider.TIMEOUT_MILLISECOND)
			})
			if (UserInterface.DEBUG === true)
				console.log("[Slider]: (Timeout) Image changed")
		}
	}

	this.pause = function() {
		if (UserInterface.DEBUG === true)
			console.log("[Slider]: pause")
		this.state = Suraidaa.Slider.STATE_PAUSED
		if (this.timeout !== null)
			clearTimeout(this.timeout)
	}

	this.interrupt = function() {
		if (UserInterface.DEBUG === true)
			console.log("[Slider]: interrupt")
		this.pause()
		this.play()
	}
}
Suraidaa.Slider.TIMEOUT_MILLISECOND = 8000
Suraidaa.Slider.STATE_PAUSED = "STATE_PAUSED"
Suraidaa.Slider.STATE_PLAYING = "STATE_PLAYING"
