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
 * Requires PHP: 7.2.34
 * Requires At Least: 5.5
 * Tested Up To: 6.3.0
 * Version: 2.3.0
 *
 * Version Numbering: {major}.{minor}.{bugfix}[-{stage}.{level}]
 *
 *      {major}         Major structural code changes and/or incompatible API changes (ie. breaking changes).
 *      {minor}         New functionality was added or improved in a backwards-compatible manner.
 *      {bugfix}        Backwards-compatible bug fixes or small improvements.
 *      {stage}.{level} Pre-production release: dev < a (alpha) < b (beta) < rc (release candidate).
 *
 * Copyright 2013-2023 Jean-Sebastien Morisset (https://surniaulula.com/)
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

			if ( ! is_array( $atts ) ) {	// Empty string if no shortcode attributes.

				$atts = array();
			}

			extract( shortcode_atts( array(
				'key'       => '',
				'url'       => '',
				'size'      => '',		// Deprecated argument.
				'dimension' => '120x90',
				'device'    => 'desktop',
				'format'    => 'jpg',
				'days'      => '14',		// Used for the cacheLimit query value.
				'wait'      => '200',		// Used for the timeout query value.
				'title'     => '',
				'link'      => true,
				'target'    => '_blank',
				'refresh'   => true,
				'width'     => '',
				'height'    => '',
			), $atts ) );

			$html      = '';
			$classes   = array( 'ssm' );
			$size      = strtoupper( $size );	// Just in case.
			$dimension = strtolower( str_replace( ' ', '', $dimension ) );	// Just in case.
			$link      = filter_var( $link, FILTER_VALIDATE_BOOLEAN );
			$refresh   = filter_var( $refresh, FILTER_VALIDATE_BOOLEAN );

			switch ( $size ) {

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

				$width  = $matches[1];
				$height = $matches[2] !== 'full' ? $matches[2] : '';
			}

			$img_url = esc_url_raw( add_query_arg( array(
				'key'        => $key,
				'url'        => urlencode( $url ),
				'dimension'  => $dimension,
				'format'     => $format,
				'cacheLimit' => $days,
				'timeout'    => $wait,
			), $this->api_url ) );

			if ( $refresh )  {

			    	$classes[] = 'ssm_refresh';

				wp_register_script( 'ssm_refresh', plugins_url( 'screenshot-machine-shortcode.min.js' , __FILE__ ) );

   				wp_enqueue_script( 'ssm_refresh', array( 'jquery' ), '1.0.0', true );
			}

			if ( $link ) {

				$html .= '<a href="' . $url . '" title="' . $title . '" class="ssm_link" ' .
					( empty( $target ) ? '' : ' target="' . $target . '" rel="noopener"' ) . ' >';
			}

			$html .= '<img ' .
				'class="' . implode( $glue = ' ', $classes ) . '" ' .
				'src="' . $img_url . '" ' .
				( $width !== '' ? 'width="' . $width . '" ' : '' ).
				( $height !== '' ? 'height="' . $height . '" ' : '' ).
				'alt="' . $title . '" ' .
				'data-refreshcounter="0" ' .
				'data-src="' . $img_url . '" ' .
				( $width !== '' ? 'data-width="' . $width . '" ' : '' ).
				( $height !== '' ? 'data-height="' . $height . '" ' : '' ).
				'/>';

			if ( $link ) {

				$html .= '</a>';
			}

			return $html;
		}
	}

	ScreenshotMachineShortcode::get_instance();
}
