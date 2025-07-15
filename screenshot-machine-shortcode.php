<?php
/*
 * Plugin Name: JSM Screenshot Machine Shortcode
 * Text Domain: screenshot-machine-shortcode
 * Domain Path: /languages
 * Plugin URI: https://surniaulula.com/extend/plugins/screenshot-machine-shortcode/
 * Assets URI: https://jsmoriss.github.io/screenshot-machine-shortcode/assets/
 * Author: JS Morisset
 * Author URI: https://surniaulula.com/
 * License: GPLv3
 * License URI: https://www.gnu.org/licenses/gpl.txt
 * Description: Shortcode for Screenshot Machine Images
 * Requires PHP: 7.4.33
 * Requires At Least: 5.9
 * Tested Up To: 6.8.2
 * Version: 3.0.0
 *
 * Version Numbering: {major}.{minor}.{bugfix}[-{stage}.{level}]
 *
 *      {major}         Major structural code changes and/or incompatible API changes (ie. breaking changes).
 *      {minor}         New functionality was added or improved in a backwards-compatible manner.
 *      {bugfix}        Backwards-compatible bug fixes or small improvements.
 *      {stage}.{level} Pre-production release: dev < a (alpha) < b (beta) < rc (release candidate).
 *
 * Copyright 2013-2025 Jean-Sebastien Morisset (https://surniaulula.com/)
 */

if ( ! defined( 'ABSPATH' ) ) {

	die( 'These aren\'t the droids you\'re looking for.' );
}

if ( ! class_exists( 'ScreenshotMachineShortcode' ) ) {

	class ScreenshotMachineShortcode {

		private $api_url = 'https://api.screenshotmachine.com/';

		private static $instance = null;	// ScreenshotMachineShortcode class object.

		public function __construct()  {

			add_action( 'plugins_loaded', array( $this, 'init_textdomain' ) );

			add_shortcode( 'ssm', array( $this, 'do_shortcode' ) );
		}

		public static function &get_instance() {

			if ( null === self::$instance ) {

				self::$instance = new self;
			}

			return self::$instance;
		}

		public function init_textdomain() {

			load_plugin_textdomain( 'screenshot-machine-shortcode', false, 'screenshot-machine-shortcode/languages/' );
		}

		public function do_shortcode( $atts = array(), $content = null, $tag = '' ) {

			if ( ! is_array( $atts ) ) $atts = array();	// Empty string if no shortcode attributes.

			extract( shortcode_atts( array(
				'key'       => false,		// Customer API key.
				'url'       => false,		// URL you to capture.
				'size'      => false,		// Deprecated.
				'dimension' => '120x90',	// Default value is 120x90.
				'device'    => 'desktop',	// desktop, phone, tablet.
				'format'    => 'jpg',		// jpg, png, gif.
				'days'      => '14',		// How old (in days) to accept a cached image.
				'wait'      => '200',		// How long capturing engine should wait before the screenshot is created.
				'zoom'      => '100',		// Manage zoom scale of the webpage.
				'click'     => false,		// Trigger a "click" event on CSS selector.
				'hide'      => false,		// Hide/remove a CSS selector(s).
				'cookies'   => false,		// Semicolon [;] separated list of cookies.
				'language'  => false,		// Sets the Accept-Language header.
				'agent'     => false,		// Sets the User-Agent header.
				'select'    => false,		// CSS selector to DOM element (example: table.table:nth-child(3) > tbody:nth-child(2) > tr:nth-child(15)).
				'crop'      => false,		// Capture selected region (example: 100,0,800,300).
				'title'     => false,
				'link'      => true,
				'target'    => '_blank',
				'refresh'   => true,
				'width'     => false,
				'height'    => false,
			), $atts ) );

			/*
			 * Sanitize attribute values.
			 *
			 * See https://developer.wordpress.org/apis/security/sanitizing/.
			 */
			$key       = sanitize_text_field( $key );
			$url       = filter_var( $url, FILTER_VALIDATE_URL );
			$size      = strtoupper( sanitize_text_field( $size ) );	// Deprecated.
			$dimension = strtolower( str_replace( ' ', '', sanitize_text_field( $dimension ) ) );
			$device    = sanitize_text_field( $device );
			$format    = sanitize_text_field( $format );
			$days      = floatval( $days );
			$wait      = intval( $wait );
			$zoom      = intval( $zoom );
			$click     = sanitize_text_field( $click );
			$hide      = sanitize_text_field( $hide );
			$cookies   = sanitize_text_field( $cookies );
			$language  = sanitize_text_field( $language );
			$agent     = sanitize_text_field( $agent );
			$select    = sanitize_text_field( $select );
			$crop      = sanitize_text_field( $crop );
			$title     = sanitize_text_field( $title );
			$link      = filter_var( $link, FILTER_VALIDATE_BOOLEAN );
			$target    = sanitize_text_field( $target );
			$refresh   = filter_var( $refresh, FILTER_VALIDATE_BOOLEAN );
			$width     = intval( $width );
			$height    = intval( $height );
			$classes   = array( 'ssm' );

			switch ( $size ) {	// Deprecated.

				case 'T': $dimension = '120x90'; break;
				case 'S': $dimension = '200x150'; break;
				case 'E': $dimension = '320x240'; break;
				case 'N': $dimension = '400x300'; break;
				case 'M': $dimension = '640x480'; break;
				case 'L': $dimension = '800x600'; break;
				case 'X': $dimension = '1024x768'; break;
			}

			/*
			 * Dimensions can be 1024x768 or 1024xfull.
			 */
			if ( preg_match( '/^([0-9]+)x([0-9]+|full)$/', $dimension, $matches ) ) {

				$width  = intval( $matches[ 1 ] );
				$height = $matches[ 2 ] !== 'full' ? intval( $matches[ 2 ] ) : false;
			}

			/*
			 * Get the screenshot image URL. Note that setting any query variable’s value to boolean false removes the key.
			 *
			 * See https://www.screenshotmachine.com/website-screenshot-api.php.
			 */
			$img_url = esc_url_raw( add_query_arg( array(
				'key'             => $key,
				'url'             => urlencode( $url ),
				'dimension'       => $dimension,
				'device'          => $device,
				'format'          => $format,
				'cacheLimit'      => $days,
				'delay'           => $wait,
				'zoom'            => $zoom,
				'click'           => urlencode( $click ),
				'hide'            => urlencode( $hide ),
				'cookies'         => urlencode( $cookies ),
				'accept-language' => urlencode( $language ),
				'user-agent'      => urlencode( $agent ),
				'selector'        => urlencode( $select ),
				'crop'            => urlencode( $crop ),
			), $this->api_url ) );

			/*
			 * Maybe include javascript to retry the image every second until it's available (for a maximum of 10 seconds).
			 */
			if ( $refresh )  {

				$classes[] = 'ssm_refresh';

				wp_register_script( 'ssm_refresh', plugins_url( 'js/screenshot-machine-shortcode.min.js' , __FILE__ ) );

				wp_enqueue_script( 'ssm_refresh', array( 'jquery' ), '1.0.0', true );
			}

			/*
			 * Create the output HTML.
			 */
			$html = '';

			if ( $link ) $html .= '<a href="' . esc_url( $url ) . '" class="ssm_link" ' .
				( $width ? 'width="' . esc_attr( $width ) . '" ' : '' ) .		// Not false, null, or 0.
				( $height ? 'height="' . esc_attr( $height ) . '" ' : '' ) .		// Not false, null, or 0.
				( $title ? 'title="' . esc_attr( $title ) . '" ' : '' ) .
				( $target ? ' target="' . esc_attr( $target ) . '" rel="noopener"' : '' ) .
				'>';

			$html .= '<img src="' . esc_url( $img_url ) . '" ' .
				'class="' . esc_attr( implode( $glue = ' ', $classes ) ) . '" ' .
				( $width ? 'width="' . esc_attr( $width ) . '" ' : '' ) .		// Not false, null, or 0.
				( $height ? 'height="' . esc_attr( $height ) . '" ' : '' ) .		// Not false, null, or 0.
				( $title ? 'alt="' . esc_attr( $title ) . '" ' : '' ) .
				'data-src="' . esc_url( $img_url ) . '" ' .
				( $width ? 'data-width="' . esc_attr( $width ) . '" ' : '' ) .		// Not false, null, or 0.
				( $height ? 'data-height="' . esc_attr( $height ) . '" ' : '' ) .	// Not false, null, or 0.
				'data-refreshcounter="0"/>';

			if ( $link ) $html .= '</a>';

			return $html;
		}
	}

	ScreenshotMachineShortcode::get_instance();
}
