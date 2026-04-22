/**
 * WSMSC 2026 – Scroll Effects
 *
 * Handles:
 *  1. Hero headline fade-out as user scrolls down.
 *  2. Subtle parallax translation on the hero background image.
 *  3. Parallax translation on every event-section background image.
 */
( function () {
	'use strict';

	var hero        = document.getElementById( 'hero' );
	var heroBg      = hero ? hero.querySelector( '.wsmsc-hero__bg' ) : null;
	var heroContent = document.getElementById( 'hero-content' );

	/* Collect all event-section background elements. */
	var eventBgs = Array.prototype.slice.call(
		document.querySelectorAll( '.wsmsc-event-card-section__bg' )
	);

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
	 * Update all parallax/fade states based on scroll position.
	 */
	function updateEffects() {
		var scrollY     = window.scrollY || window.pageYOffset;
		var viewportH   = window.innerHeight;

		/* ── 1. Hero background parallax ─────────────────────────── */
		if ( heroBg ) {
			heroBg.style.transform = 'translateY(' + ( scrollY * 0.4 ) + 'px)';
		}

		/* ── 2. Hero headline fade & upward drift ─────────────────── */
		if ( hero && heroContent ) {
			var heroHeight = hero.offsetHeight;
			var fadeStart  = heroHeight * 0.15;
			var fadeEnd    = heroHeight * 0.65;
			var progress   = clamp( ( scrollY - fadeStart ) / ( fadeEnd - fadeStart ), 0, 1 );

			heroContent.style.opacity   = ( 1 - progress ).toFixed( 3 );
			heroContent.style.transform = 'translateY(-' + ( progress * 40 ) + 'px)';
		}

		/* ── 3. Event-section background parallax ─────────────────── */
		/* Each background shifts at 30 % of the distance between its
		   parent section's vertical centre and the viewport centre.
		   When the section is centred in the viewport the offset is 0,
		   so the image appears naturally placed at that moment and drifts
		   as the user scrolls through.                                  */
		eventBgs.forEach( function ( bg ) {
			var section        = bg.parentElement;
			var rect           = section.getBoundingClientRect();
			var sectionCenterY = rect.top + rect.height / 2;
			var viewportCenter = viewportH / 2;
			var offset         = ( sectionCenterY - viewportCenter ) * 0.3;
			bg.style.transform = 'translateY(' + offset + 'px)';
		} );

		ticking = false;
	}

	/**
	 * Request an animation frame to throttle the scroll handler.
	 */
	function onScroll() {
		if ( ! ticking ) {
			window.requestAnimationFrame( updateEffects );
			ticking = true;
		}
	}

	window.addEventListener( 'scroll', onScroll, { passive: true } );

	/* Run once on load to set the initial state for all effects. */
	updateEffects();
}() );
