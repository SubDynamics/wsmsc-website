<?php
/**
 * Front page template.
 *
 * Replicates the WSMSC 2026 design with parallax hero, welcome section,
 * photo gallery, and event sections.
 *
 * @package wsmsc2026
 */

get_header();

$images_url = get_template_directory_uri() . '/assets/images';
?>

<!-- =====================================================
     HERO SECTION
     Full-viewport background image with fade-on-scroll headline
     ===================================================== -->
<section class="wsmsc-hero" id="hero" aria-label="Hero">
	<div class="wsmsc-hero__bg" style="background-image: url('<?php echo esc_url( $images_url . '/wsmsc_site_hero_graphic.jpg' ); ?>');" aria-hidden="true"></div>
	<div class="wsmsc-hero__content" id="hero-content">
		<h1 class="wsmsc-hero__title">Westside Music Social Club</h1>
		<hr class="wsmsc-hero__divider" aria-hidden="true">
		<p class="wsmsc-hero__tagline">Rock with your community!</p>
	</div>
</section>

<!-- =====================================================
     WELCOME SECTION
     Introduction copy and disclaimer callout
     ===================================================== -->
<section class="wsmsc-welcome" id="welcome" aria-label="Welcome">
	<div class="wsmsc-welcome__inner">
		<h2 class="wsmsc-welcome__heading">Welcome to the Westside Music Social Club! 🎸</h2>
		<div class="wsmsc-welcome__body">
			<p>The WSMSC is your neighborhood &#8220;musical living room&#8221;&#8212;a <strong>no-judgment zone</strong> built for amateur musicians and enthusiasts to step out of the practice room and into the community. Whether you&#8217;re dusting off an old guitar or just love the local beat, this is your space to jam, connect, support, and grow.</p>
			<p><strong>Ready to join the band? Let&#8217;s make some noise! 🤘 ✨</strong></p>
		</div>
	</div>
</section>

<!-- Disclaimer callout -->
<div class="wsmsc-callout" role="note">
	<div class="wsmsc-callout__inner">
		<p><em>Keep in mind: We aren&#8217;t a school (no formal lessons here!) and we&#8217;re focused on the hobbyist experience rather than the pro circuit. We&#8217;re just here to keep the music social and the vibes high.</em></p>
	</div>
</div>

<!-- =====================================================
     PHOTO GALLERY SECTION
     ===================================================== -->
<section class="wsmsc-gallery" id="gallery" aria-label="Photo gallery">
	<div class="wsmsc-gallery__row wsmsc-gallery__row--two">
		<figure class="wsmsc-gallery__item">
			<img src="<?php echo esc_url( $images_url . '/monthly_jam_01.jpg' ); ?>" alt="Members socializing at a WSMSC event" loading="lazy">
		</figure>
		<figure class="wsmsc-gallery__item">
			<img src="<?php echo esc_url( $images_url . '/monthly_jam_02.jpg' ); ?>" alt="Musicians rehearsing together at a WSMSC session" loading="lazy">
		</figure>
	</div>
	<div class="wsmsc-gallery__row wsmsc-gallery__row--three">
		<figure class="wsmsc-gallery__item">
			<img src="<?php echo esc_url( $images_url . '/monthly_jam_03.jpg' ); ?>" alt="Band members performing at a WSMSC house jam" loading="lazy">
		</figure>
		<figure class="wsmsc-gallery__item">
			<img src="<?php echo esc_url( $images_url . '/monthly_jam_04.jpg' ); ?>" alt="Drummer playing at a WSMSC session" loading="lazy">
		</figure>
		<figure class="wsmsc-gallery__item">
			<img src="<?php echo esc_url( $images_url . '/monthly_jam_05.jpg' ); ?>" alt="Musician working with electronics at a WSMSC jam" loading="lazy">
		</figure>
	</div>
</section>

<!-- =====================================================
     UPCOMING EVENTS SECTION
     ===================================================== -->
<section class="wsmsc-events" id="events" aria-label="Upcoming events">
	<div class="wsmsc-events__heading-wrap">
		<h2 class="wsmsc-events__heading">Chekout Our Upcoming Events</h2>
	</div>

	<!-- Full-width feature image -->
	<div class="wsmsc-events__feature-img" aria-hidden="true">
		<img src="<?php echo esc_url( $images_url . '/monthly_jam_06.jpg' ); ?>" alt="" loading="lazy">
	</div>

	<!-- The House Jam event card -->
	<div class="wsmsc-event-card-section" aria-label="The House Jam event">
		<div class="wsmsc-event-card-section__bg" style="background-image: url('<?php echo esc_url( $images_url . '/monthly_jam_06.jpg' ); ?>');" aria-hidden="true"></div>
		<div class="wsmsc-event-card-section__card">
			<h3 class="wsmsc-event-card__title">The House Jam</h3>
			<div class="wsmsc-event-card__body">
				<p>Monthly rotating meetup where Westside neighbors trade the practice room for the living room. Hosted by members for members, these sessions are a no-judgment zone to experiment, collaborate, and play just for the fun of it&#8212;no perfection required. Whether you want to volunteer your space as a host, sign up to lead a &#8220;dealer&#8217;s choice&#8221; jam progression, or just grab a seat and listen, all instruments and skill levels are welcome. RSVP is required to keep things cozy, so check the monthly theme, grab your gear, and come make some noise! 🤘</p>
				<p>RSVP on Heylo for details</p>
			</div>
		</div>
	</div>

	<!-- Karaoke Night event card -->
	<div class="wsmsc-event-card-section wsmsc-event-card-section--right" aria-label="Karaoke night event">
		<div class="wsmsc-event-card-section__bg" style="background-image: url('<?php echo esc_url( $images_url . '/karaoke.jpg' ); ?>');" aria-hidden="true"></div>
		<div class="wsmsc-event-card-section__card">
			<h3 class="wsmsc-event-card__title">Karaoke Night</h3>
			<div class="wsmsc-event-card__body">
				<p>Grab the mic and sing your heart out! Our karaoke nights are all about fun, community, and sharing your love of music&#8212;no judgment, just good vibes. From classic rock anthems to pop hits, there&#8217;s something for everyone. RSVP to secure your spot and get ready to perform.</p>
				<p>RSVP on Heylo for details</p>
			</div>
		</div>
	</div>
</section>

<?php
get_footer();
