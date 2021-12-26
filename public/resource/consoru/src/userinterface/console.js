UserInterface.model({
	name: "consoru.console",
	method: UserInterface.appendChild,
	properties: {
		tagName: "div",
		id: "console",
		className: "position-fixed bottom-0 right-0 full-width z-index-3",
		children: [
			{
				tagName: "div",
				className: "tab-content",
			},
			{
				tagName: "div",
				className: "bar display-grid grid-auto-flow-column",
				style: "background-color: #1a1a1a",
				children: [
					{
						tagName: "div",
						className: "tabs display-grid justify-content-flexstart grid-auto-column-maxcontent grid-auto-flow-column"
					},
					{
						tagName: "div",
						className: "display-grid justify-content-flexend grid-auto-column-maxcontent grid-auto-flow-column",
						children: [
							{
								className: "closeBtn border-width-0 hover-color-tosca",
								style: "background-color: rgb(109, 72, 72); color: white; padding: 0 15px;font-size: 1.2em;display: grid;place-content: center;",
								tagName: "button",
								textContent: "x"
							}
						]
					}
				]
			}
		]
	}
})
