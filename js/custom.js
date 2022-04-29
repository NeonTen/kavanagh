jQuery(document).ready(function() {

    // Mobile menu
    // Grab HTML Elements
	const btnWrap = document.querySelector(".mobile-menu-wrapper");
	const btn = document.querySelector("button.mobile-menu-button");
	const menu = document.querySelector(".mobile-menu");
    const overlay = document.querySelector(".overlay");
    const close = document.querySelector(".mobile-menu .close");

	btn.addEventListener("click", () => {
	    btnWrap.classList.toggle("menu-open");
	    menu.classList.toggle("slide-close");
	    overlay.classList.toggle("hidden");
	});
	overlay.addEventListener("click", () => {
        btnWrap.classList.toggle("menu-open");
	    menu.classList.toggle("slide-close");
	    overlay.classList.toggle("hidden");
	});
	close.addEventListener("click", () => {
        btnWrap.classList.toggle("menu-open");
	    menu.classList.toggle("slide-close");
	    overlay.classList.toggle("hidden");
	});

	// Global Modal.
	jQuery(".modal-trigger").click(function(e) {
        e.preventDefault();

		var targetModal = jQuery(this).data('modal');
		jQuery(".modal-"+targetModal).removeClass("-translate-y-[9999px]");
		jQuery(".modal-"+targetModal).addClass("-translate-y-1/2");
		jQuery(".modal-overlay").removeClass("hidden");
        
    });
	jQuery(".modal-overlay, .modal-body .close").click(function(e) {
        e.preventDefault();

		jQuery(".modal-body").addClass("-translate-y-[9999px]");
		jQuery(".modal-body").removeClass("-translate-y-1/2");
	    jQuery(".modal-overlay").addClass("hidden");
        
    });

    // redirect
    jQuery(".animate-redirect a[href^='#']").click(function(e) {
        e.preventDefault();

        var position = jQuery(jQuery(this).attr("href")).offset().top;

        jQuery("body, html").animate({
            scrollTop: position
        }, 1000);
    });

	// nav cloned in side-menu
	jQuery(".contact-info")
	.clone()
	.removeClass()
	.addClass('flex flex-col text-right space-y-2 uppercase tracking-wider')
	.appendTo('nav.clone');

	// Our Projects slider
	jQuery('.slider-for').slick({
		autoplay: true,
		slidesToShow: 1,
		slidesToScroll: 1,
		arrows: false,
		asNavFor: '.slider-nav'
	});
	jQuery('.slider-nav').slick({
		slidesToShow: 1,
		slidesToScroll: 1,
		asNavFor: '.slider-for',
		arrows: false,
		dots: false,
		focusOnSelect: true
	});

	// Slider section
	jQuery('.slider-container').slick({
		autoplay: true,
		slidesToShow: 1,
		slidesToScroll: 1,
		arrows: true,
		dots: true,
		prevArrow: '<span class="left-arrow cursor-pointer"><svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M28 8L12 20L28 32" stroke="#DACF52" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"/><rect x="0.5" y="0.5" width="39" height="39" stroke="#DACF52"/></svg></span>',
		nextArrow: '<span class="right-arrow cursor-pointer"><svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M12 32L28 20L12 8" stroke="#DACF52" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"/><rect x="39.5" y="39.5" width="39" height="39" transform="rotate(-180 39.5 39.5)" stroke="#DACF52"/></svg></span>'
	});

	// Testimonials Slider
	jQuery('.testimonials-slider').slick({
		autoplay: true,
		slidesToShow: 1,
		slidesToScroll: 1,
		arrows: false,
		dots: false,
	});

	// Filter posts by category - using mix it up.
	var containerEl = document.querySelector('.filter-posts');
    var mixer;

    if (containerEl) {
        mixer = mixitup(containerEl);
    }

	// Galley Carousel - gallery popup.
	jQuery('.popup-gallery').magnificPopup({
		delegate: 'a',
		type: 'image',
		gallery: {
		  enabled: true,
		  navigateByImgClick: true,
		  preload: [0,1] // Will preload 0 - before current, and 1 after the current image
		},
		callbacks: {
		  elementParse: function(item) {
			console.log(item.el[0].className);
			if(item.el[0].className == 'video') {
			  item.type = 'iframe',
			  item.iframe = {
				 patterns: {
				   youtube: {
					 index: 'youtube.com/', // String that detects type of video (in this case YouTube). Simply via url.indexOf(index).
	  
					 id: 'v=', // String that splits URL in a two parts, second part should be %id%
					  // Or null - full URL will be returned
					  // Or a function that should return %id%, for example:
					  // id: function(url) { return 'parsed id'; }
	  
					 src: '//www.youtube.com/embed/%id%?autoplay=1' // URL that will be set as a source for iframe.
				   },
				   vimeo: {
					 index: 'vimeo.com/',
					 id: '/',
					 src: '//player.vimeo.com/video/%id%?autoplay=1'
				   },
				   gmaps: {
					 index: '//maps.google.',
					 src: '%id%&output=embed'
				   }
				 }
			  }
			} else {
			   item.type = 'image',
			   item.tLoading = 'Loading image #%curr%...',
			   item.mainClass = 'mfp-img-mobile',
			   item.image = {
				 tError: '<a href="%url%">The image #%curr%</a> could not be loaded.'
			   }
			}
	  
		  }
		}
	});

	// Gallery Carousel
	jQuery('.gallery-slider').slick({
        infinite: true,
        slidesToShow: 3,
        slidesToScroll: 1,
        dots: false,
        arrows: false,
		responsive: [
			{
				breakpoint: 1024,
				settings: {
					slidesToShow: 2,
					slidesToScroll: 1,
				}
			},
			{
				breakpoint: 640,
				settings: {
					slidesToShow: 1,
					slidesToScroll: 1,
				}
			}
		]
    });

});
