/* =====================================
Template Name: 	Mediplus.
Author Name: Naimur Rahman
Website: http://wpthemesgrid.com/
Description: Mediplus - Doctor HTML Template.
Version:	1.1
========================================*/
/*=======================================
[Start Activation Code]
=========================================
* Sticky Header JS
* Search JS
* Mobile Menu JS
* Hero Slider JS
* Testimonial Slider JS
* Portfolio Slider JS
* Clients Slider JS
* Single Portfolio Slider JS
* Accordion JS
* Nice Select JS
* Date Picker JS
* Counter Up JS
* Checkbox JS
* Right Bar JS
* Video Popup JS
* Wow JS
* Scroll Up JS
* Animate Scroll JS
* Stellar JS
* Google Maps JS
* Preloader JS
=========================================
[End Activation Code]
=========================================*/
(function($) {
    "use strict";
     $(document).on('ready', function() {

        jQuery(window).on('scroll', function() {
			if ($(this).scrollTop() > 200) {
				$('#header .header-inner').addClass("sticky");
			} else {
				$('#header .header-inner').removeClass("sticky");
			}
		});

		/*====================================
			Sticky Header JS
		======================================*/
		jQuery(window).on('scroll', function() {
			if ($(this).scrollTop() > 100) {
				$('.header').addClass("sticky");
			} else {
				$('.header').removeClass("sticky");
			}
		});

		$('.pro-features .get-pro').on( "click", function(){
			$('.pro-features').toggleClass('active');
		});

		/*====================================
			Search JS
		======================================*/
		$('.search a').on( "click", function(){
			$('.search-top').toggleClass('active');
		});

		/*====================================
			Mobile Menu
		======================================*/
		$('.menu').slicknav({
			prependTo:".mobile-nav",
			duration: 300,
			closeOnClick:true,
		});

		/*===============================
			Hero Slider JS
		=================================*/
		$(".hero-slider").owlCarousel({
			loop:true,
			autoplay:true,
			smartSpeed: 500,
			autoplayTimeout:3500,
			singleItem: true,
			autoplayHoverPause:true,
			items:1,
			nav:true,
			navText: ['<i class="fa fa-angle-left" aria-hidden="true"></i>', '<i class="fa fa-angle-right" aria-hidden="true"></i>'],
			dots:false,
		});

		/*===============================
			Testimonial Slider JS
		=================================*/
		$('.testimonial-slider').owlCarousel({
			items:3,
			autoplay:true,
			autoplayTimeout:4500,
			smartSpeed:300,
			autoplayHoverPause:true,
			loop:true,
			merge:true,
			nav:false,
			dots:true,
			responsive:{
				1: {
					items:1,
				},
				300: {
					items:1,
				},
				480: {
					items:1,
				},
				768: {
					items:2,
				},
				1170: {
					items:3,
				},
			}
		});

		/*===============================
			Portfolio Slider JS
		=================================*/
		$('.portfolio-slider').owlCarousel({
			autoplay:true,
			autoplayTimeout:4000,
			margin:15,
			smartSpeed:300,
			autoplayHoverPause:true,
			loop:true,
			nav:true,
			dots:false,
			responsive:{
				300: {
					items:1,
				},
				480: {
					items:2,
				},
				768: {
					items:2,
				},
				1170: {
					items:4,
				},
			}
		});

		/*=====================================
			Counter Up JS
		======================================*/
		$('.counter').counterUp({
			delay:20,
			time:2000
		});

		/*===============================
			Clients Slider JS
		=================================*/
		$('.clients-slider').owlCarousel({
			items:5,
			autoplay:true,
			autoplayTimeout:3500,
			margin:15,
			smartSpeed: 400,
			autoplayHoverPause:true,
			loop:true,
			nav:false,
			dots:false,
			responsive:{
				300: {
					items:1,
				},
				480: {
					items:2,
				},
				768: {
					items:3,
				},
				1170: {
					items:5,
				},
			}
		});

		/*====================================
			Single Portfolio Slider JS
		======================================*/
		$('.pf-details-slider').owlCarousel({
			items:1,
			autoplay:false,
			autoplayTimeout:5000,
			smartSpeed: 400,
			autoplayHoverPause:true,
			loop:true,
			merge:true,
			nav:true,
			dots:false,
			navText: ['<i class="icofont-rounded-left"></i>', '<i class="icofont-rounded-right"></i>'],
		});

		/*===================
			Accordion JS
		=====================*/
		$('.accordion > li:eq(0) a').addClass('active').next().slideDown();
		$('.accordion a').on('click', function(j) {
			var dropDown = $(this).closest('li').find('p');
			$(this).closest('.accordion').find('p').not(dropDown).slideUp(300);
			if ($(this).hasClass('active')) {
				$(this).removeClass('active');
			} else {
				$(this).closest('.accordion').find('a.active').removeClass('active');
				$(this).addClass('active');
			}
			dropDown.stop(false, true).slideToggle(300);
			j.preventDefault();
		});

		/*====================================
			Nice Select JS
		======================================*/
		$('select').niceSelect();

		/*=====================================
			Date Picker JS
		======================================*/
		$( function() {
			$( "#datepicker" ).datepicker();
		} );



		/*===============================
			Checkbox JS
		=================================*/
		$('input[type="checkbox"]').change(function(){
			if($(this).is(':checked')){
				$(this).parent("label").addClass("checked");
			} else {
				$(this).parent("label").removeClass("checked");
			}
		});

		/*===============================
			Right Bar JS
		=================================*/
		$('.right-bar .bar').on( "click", function(){
			$('.sidebar-menu').addClass('active');
		});
		$('.sidebar-menu .cross').on( "click", function(){
			$('.sidebar-menu').removeClass('active');
		});

		/*=====================
			Video Popup JS
		=======================*/
		$('.video-popup').magnificPopup({
			type: 'video',
		});

		/*================
			Wow JS
		==================*/
		var window_width = $(window).width();
			if(window_width > 767){
            new WOW().init();
		}

		/*===================
			Scroll Up JS
		=====================*/
		$.scrollUp({
			scrollText: '<span><i class="fa fa-angle-up"></i></span>',
			easingType: 'easeInOutExpo',
			scrollSpeed: 900,
			animation: 'fade'
		});

		/*=======================
			Animate Scroll JS
		=========================*/
		$('.scroll').on("click", function (e) {
			var anchor = $(this);
				$('html, body').stop().animate({
					scrollTop: $(anchor.attr('href')).offset().top - 100
				}, 1000);
			e.preventDefault();
		});

		/*=======================
			Stellar JS
		=========================*/
		$.stellar({
		  horizontalOffset: 0,
		  verticalOffset: 0
		});

		/*====================
			Google Maps JS
		======================*/
		var map = new GMaps({
				el: '#map',
				lat: 23.011245,
				lng: 90.884780,
				scrollwheel: false,
			});
			map.addMarker({
				lat: 23.011245,
				lng: 90.884780,
				title: 'Marker with InfoWindow',
				infoWindow: {
				content: '<p>welcome to Medipro</p>'
			}

		});
	});

	/*====================
		Preloader JS
	======================*/
	$(window).on('load', function() {
		$('.preloader').addClass('preloader-deactivate');
	});


})(jQuery);




























document.addEventListener("DOMContentLoaded", () => {
  const header = document.querySelector(".header");
  const nav    = document.querySelector(".nav.menu");
  if (!nav) return;

  const indicator = nav.querySelector(".nav-indicator");
  const links     = Array.from(nav.querySelectorAll(".nav-link"));

  // Helper: ambil hash dari href absolut/relatif
  const getHash = (a) => {
    try { return new URL(a.getAttribute("href"), location.href).hash || ""; }
    catch { return ""; }
  };

  // Helper: set active + geser indikator
  function setActive(link){
    links.forEach(l => l.classList.remove("active"));
    if (link) {
      link.classList.add("active");
      moveIndicator(link);
    }
  }
  function moveIndicator(link){
    if (!indicator || !link) return;
    indicator.style.width = link.offsetWidth + "px";
    indicator.style.left  = link.offsetLeft + "px";
  }

  // Smooth scroll
  links.forEach(a => {
    a.addEventListener("click", (e) => {
      const hash = getHash(a);
      const target = hash && document.querySelector(hash);
      const samePage = a.origin === location.origin && a.pathname === location.pathname;

      if (samePage && target) {
  e.preventDefault();
  const offset = (header?.offsetHeight || 0) + 20;
  const top = target.getBoundingClientRect().top + window.pageYOffset - offset;

  // Ganti ini:
  // window.scrollTo({ top, behavior: "smooth" });

  // Jadi pakai custom:
  smoothScrollTo(top, 1500); // 1500ms = 1.5 detik
  setActive(a);
}

    });
  });

  // ScrollSpy
  function updateActiveOnScroll(){
    const offset = (header?.offsetHeight || 0) + 30;
    let activated = false;

    for (const a of links) {
      const hash = getHash(a);
      if (!hash) continue;
      const sec = document.querySelector(hash);
      if (!sec) continue;

      const top = sec.offsetTop;
      const bottom = top + sec.offsetHeight;
      const y = window.scrollY + offset;

      if (y >= top - 50 && y < bottom - 50) {
        setActive(a);
        activated = true;
        break;
      }
    }

    if (!activated && window.scrollY < 60) {
      const tema = links.find(l => getHash(l) === "#tema" || l.dataset.section === "tema");
      if (tema) setActive(tema);
    }
  }

  // Init
  const anyActive = nav.querySelector(".nav-link.active");
  if (anyActive) moveIndicator(anyActive);

  const onHome = !!document.querySelector("#tema");
  if (onHome) {
    if (location.hash && document.querySelector(location.hash)) {

      setTimeout(() => {
  const target = document.querySelector(location.hash);
  if (target) {
    const offset = (header?.offsetHeight || 0) + 20;
    const top = target.getBoundingClientRect().top + window.pageYOffset - offset;
    smoothScrollTo(top, 1500);
  }
}, 150);

    } else {
      const tema = links.find(l => getHash(l) === "#tema" || l.dataset.section === "tema");
      if (tema) setActive(tema);
    }

    // 🔥 Perbaikan: taruh ticking scroll di sini
    let ticking = false;
    window.addEventListener("scroll", () => {
      if (!ticking) {
        window.requestAnimationFrame(() => {
          updateActiveOnScroll();
          ticking = false;
        });
        ticking = true;
      }
    }, { passive: true });

    window.addEventListener("resize", () => moveIndicator(nav.querySelector(".nav-link.active")));
    updateActiveOnScroll();
  }
});


// Fungsi custom smooth scroll
function smoothScrollTo(targetY, duration = 1200) {
  const startY = window.pageYOffset;
  const diff = targetY - startY;
  let startTime;

  function step(timestamp) {
    if (!startTime) startTime = timestamp;
    const time = timestamp - startTime;
    const percent = Math.min(time / duration, 1);

    // easing (easeInOutCubic biar smooth)
    const ease = percent < 0.5
      ? 4 * percent * percent * percent
      : 1 - Math.pow(-2 * percent + 2, 3) / 2;

    window.scrollTo(0, startY + diff * ease);

    if (time < duration) {
      requestAnimationFrame(step);
    }
  }

  requestAnimationFrame(step);
}
