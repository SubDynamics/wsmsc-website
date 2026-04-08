/**
 * WSMSC 2026 – Scroll Effects
 *
 * Handles:
 *  1. Hero headline fade-out as user scrolls down.
 *  2. Subtle parallax translation on the hero background image.
 */
( function () {
	'use strict';

	var hero        = document.getElementById( 'hero' );
	var heroBg      = hero ? hero.querySelector( '.wsmsc-hero__bg' ) : null;
	var heroContent = document.getElementById( 'hero-content' );

	if ( ! hero || ! heroBg || ! heroContent ) {
		return;
	}

	/**
	 * Clamp a value between min and max.
	 *
	 * @param {number} value
	 * @param {number} min
	 * @param {number} max
	 * @return {number}
	 */
	function clamp( value, min, max ) {
		return Math.min( Math.max( value, min ), max );
	}

	var ticking = false;

	/**
	 * Update hero visual state based on scroll position.
	 */
	function updateHero() {
		var scrollY     = window.scrollY || window.pageYOffset;
		var heroHeight  = hero.offsetHeight;

		/* ── 1. Parallax background ───────────────────────────────── */
		/* Move the background at ~40 % of the scroll speed so it
		   appears to scroll more slowly than the page content.        */
		var parallaxOffset = scrollY * 0.4;
		heroBg.style.transform = 'translateY(' + parallaxOffset + 'px)';

		/* ── 2. Headline fade & subtle upward drift ───────────────── */
		/* Content starts fading once the user has scrolled 15 % of
		   the hero height and is fully invisible at 65 %.             */
		var fadeStart = heroHeight * 0.15;
		var fadeEnd   = heroHeight * 0.65;

		var progress = clamp( ( scrollY - fadeStart ) / ( fadeEnd - fadeStart ), 0, 1 );

		heroContent.style.opacity   = ( 1 - progress ).toFixed(3);
		heroContent.style.transform = 'translateY(-' + ( progress * 40 ) + 'px)';

		ticking = false;
	}

	/**
	 * Request an animation frame to throttle scroll handler.
	 */
	function onScroll() {
		if ( ! ticking ) {
			window.requestAnimationFrame( updateHero );
			ticking = true;
		}
	}

	window.addEventListener( 'scroll', onScroll, { passive: true } );

	/* Run once on load to set initial state. */
	updateHero();
}() );
