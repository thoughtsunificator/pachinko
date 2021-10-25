<div class="wrap">
	
	<link rel="stylesheet" href="/resource/suraidaa/resource/suraidaa.css">
	<script>
		Suraidaa = {}
	</script>
	<script src="/resource/suraidaa/object/slider.js"></script>
	<script src="/resource/suraidaa/object/image.js"></script>
	<script src="/resource/suraidaa/userinterface/slider.js"></script>
	<script src="/resource/suraidaa/userinterface/image.js"></script>
	<script src="/resource/suraidaa/userinterface/bullet.js"></script>
	<script>
		(function() {
			const LOW_RESOLUTION = "320"
			const MEDIUM_RESOLUTION = "640"
			const DEFAULT_RESOLUTION = "940"
			const LOW_MEDIA = "(max-width: 21.000em)"
			const MEDIUM_MEDIA = "(max-width: 44.000em)"
			const IMAGES_PATH = "/resource/suraidaa/resource/image/"
			
			const IMAGES = [ /* Slider images go here */
				{	url: IMAGES_PATH + "slider_1.jpg", caption: "No Game No Life"	, link: "anime"},
				{	url: IMAGES_PATH + "slider_2.jpg", caption: "Dantalian no Shokan"	, link: "anime"},
				{ url: IMAGES_PATH + "slider_3.jpg", caption: "Bokurano" , link: "anime"},
				{ url: IMAGES_PATH + "slider_4.jpg", caption: "Infinite Stratos" , link: "anime"}
			].map(item => {
				return new Suraidaa.Image(
					{
						low: { media: LOW_MEDIA, src: item.url 	},
						medium: {media: MEDIUM_MEDIA,	src: item.url	},
						default: {	src: item.url	},
					}, item.caption, item.link)
			})
			
			window.addEventListener("load",() => {
				UserInterface.runModel("suraidaa.slider", { bindingArgs: [ IMAGES ], parentNode: document.querySelector(".slider") })
			})

	})()
	</script>
	<div class="slider"></div>
	<h2 class="margin-top-xl">News</h2>
		<div class="display-grid template-3col grid-gap">
			<section class="margin-top-xl">
				<h2>Lorem ipsus</h2>
				<section>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nobis voluptates autem molestias consequatur. Perspiciatis suscipit accusamus odio ad deserunt numquam illum officia consequuntur, voluptatem soluta nobis, neque eveniet eius laudantium?</section>
			</section>
			<section>
				<h2>Lorem ipsus</h2>
				<section>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nobis voluptates autem molestias consequatur. Perspiciatis suscipit accusamus odio ad deserunt numquam illum officia consequuntur, voluptatem soluta nobis, neque eveniet eius laudantium?</section>
			</section>
			<section>
				<h2>Lorem ipsus</h2>
				<section>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nobis voluptates autem molestias consequatur. Perspiciatis suscipit accusamus odio ad deserunt numquam illum officia consequuntur, voluptatem soluta nobis, neque eveniet eius laudantium?</section>
			</section>
			<section>
				<h2>Lorem ipsus</h2>
				<section>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nobis voluptates autem molestias consequatur. Perspiciatis suscipit accusamus odio ad deserunt numquam illum officia consequuntur, voluptatem soluta nobis, neque eveniet eius laudantium?</section>
			</section>
			<section>
				<h2>Lorem ipsus</h2>
				<section>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nobis voluptates autem molestias consequatur. Perspiciatis suscipit accusamus odio ad deserunt numquam illum officia consequuntur, voluptatem soluta nobis, neque eveniet eius laudantium?</section>
			</section>
			<section>
				<h2>Lorem ipsus</h2>
				<section>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nobis voluptates autem molestias consequatur. Perspiciatis suscipit accusamus odio ad deserunt numquam illum officia consequuntur, voluptatem soluta nobis, neque eveniet eius laudantium?</section>
			</section>
			<section>
				<h2>Lorem ipsus</h2>
				<section>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nobis voluptates autem molestias consequatur. Perspiciatis suscipit accusamus odio ad deserunt numquam illum officia consequuntur, voluptatem soluta nobis, neque eveniet eius laudantium?</section>
			</section>
			<section>
				<h2>Lorem ipsus</h2>
				<section>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nobis voluptates autem molestias consequatur. Perspiciatis suscipit accusamus odio ad deserunt numquam illum officia consequuntur, voluptatem soluta nobis, neque eveniet eius laudantium?</section>
			</section>
			<section>
				<h2>Lorem ipsus</h2>
				<section>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nobis voluptates autem molestias consequatur. Perspiciatis suscipit accusamus odio ad deserunt numquam illum officia consequuntur, voluptatem soluta nobis, neque eveniet eius laudantium?</section>
			</section>
			<section>
				<h2>Lorem ipsus</h2>
				<section>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nobis voluptates autem molestias consequatur. Perspiciatis suscipit accusamus odio ad deserunt numquam illum officia consequuntur, voluptatem soluta nobis, neque eveniet eius laudantium?</section>
			</section>
			<section>
				<h2>Lorem ipsus</h2>
				<section>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nobis voluptates autem molestias consequatur. Perspiciatis suscipit accusamus odio ad deserunt numquam illum officia consequuntur, voluptatem soluta nobis, neque eveniet eius laudantium?</section>
			</section>
			<section>
				<h2>Lorem ipsus</h2>
				<section>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nobis voluptates autem molestias consequatur. Perspiciatis suscipit accusamus odio ad deserunt numquam illum officia consequuntur, voluptatem soluta nobis, neque eveniet eius laudantium?</section>
			</section>
		</div>
</div>
