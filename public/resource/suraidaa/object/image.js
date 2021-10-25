Suraidaa.Image = function(media, text, link, responsive) {
	this.media = media
	this.text = text
	this.link = link
	this.state = Suraidaa.Image.STATE_INACTIVE
	this.responsive = responsive

	this.getMedia = function(size) {
		return this.media[size].media
	}

	this.getSrc = function(size) {
		return this.media[size].src
	}

	this.getText = function() {
		return this.text
	}

	this.getLink = function() {
		return this.link
	}

	this.setState = function(state) {
		this.state = state
	}

	this.getState = function() {
		return this.state
	}

	this.getResponsive = function() {
		return this.responsive
	}

	UserInterface.listen(this, "set_image_state", state => this.setState(state))
}
Suraidaa.Image.STATE_INACTIVE = "STATE_INACTIVE"
Suraidaa.Image.STATE_ACTIVE = "STATE_ACTIVE"