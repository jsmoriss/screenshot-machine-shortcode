<?php
/*
 * Plugin Name: JSM's Screenshot Machine Shortcode
 * Text Domain: screenshot-machine-shortcode
 * Domain Path: /languages
 * Plugin URI: https://surniaulula.com/extend/plugins/screenshot-machine-shortcode/
 * Assets URI: https://jsmoriss.github.io/screenshot-machine-shortcode/assets/
 * Author: JS Morisset
 * Author URI: https://surniaulula.com/
 * License: GPLv3
 * License URI: http://www.gnu.org/licenses/gpl.txt
 * Description: Shortcode for Screenshot Machine Images
 * Requires PHP: 5.4
 * Requires At Least: 3.8
 * Tested Up To: 4.9.1
 * Version: 2.0.0
 *
 * Version Numbering: {major}.{minor}.{bugfix}[-{stage}.{level}]
 *
 *	{major}		Major structural code changes / re-writes or incompatible API changes.
 *	{minor}		New functionality was added or improved in a backwards-compatible manner.
 *	{bugfix}	Backwards-compatible bug fixes or small improvements.
 *	{stage}.{level}	Pre-production release: dev < a (alpha) < b (beta) < rc (release candidate).
 *
 * Copyright 2013-2017 Jean-Sebastien Morisset (https://surniaulula.com/)
 */

if ( ! defined( 'ABSPATH' ) ) {
	die( 'These aren\'t the droids you\'re looking for...' );
}

if ( ! class_exists( 'ScreenshotMachineShortCode' ) ) {

	class ScreenshotMachineShortCode {  

		private static $instance;
		private static $api_url = 'http://api.screenshotmachine.com/';  

		public function __construct()  {  

			add_action( 'plugins_loaded', array( __CLASS__, 'load_textdomain' ) );

			add_shortcode( 'ssm', array( __CLASS__, 'do_shortcode' ) );
		}  

		public static function &get_instance() {

			if ( ! isset( self::$instance ) ) {
				self::$instance = new self;
			}

			return self::$instance;
		}

		public static function load_textdomain() {

			load_plugin_textdomain( 'screenshot-machine-shortcode', false, 'screenshot-machine-shortcode/languages/' );
		}

		public static function do_shortcode( $atts = array(), $content = null, $tag = '' ) { 

			if ( ! is_array( $atts ) ) {	// empty string if no shortcode attributes
				$atts = array();
			}

			extract( shortcode_atts( array(
				'key' => '',
				'url' => '',
				'size' => '',		// deprecated
				'dimension' => '120x90',
				'device' => 'desktop',
				'format' => 'jpg',
				'days' => '14',		// for cacheLimit query value
				'wait' => '200',	// for timeout query value
				'title' => '',
				'link' => true,
				'target' => '_blank',
				'refresh' => true,
				'width' => '',
				'height' => '',
			), $atts ) );

			$html = '';
			$classes = array( 'ssm' );
			$size = strtoupper( $size );	// just in case
			$dimension = strtolower( str_replace( ' ', '', $dimension ) );	// just in case
			$link = filter_var( $link, FILTER_VALIDATE_BOOLEAN );
			$refresh = filter_var( $refresh, FILTER_VALIDATE_BOOLEAN );

			switch ( $size ) {
				case 'T': $dimension='120x90'; break;
				case 'S': $dimension='200x150'; break;
				case 'E': $dimension='320x240'; break;
				case 'N': $dimension='400x300'; break;
				case 'M': $dimension='640x480'; break;
				case 'L': $dimension='800x600'; break;
				case 'X': $dimension='1024x768'; break;
				default: break;	// nothing to do
			}

			// dimensions can be 1024x768 or 1024xfull
			if ( preg_match( '/^([0-9]+)x([0-9]+|full)$/', $dimension, $matches ) ) {
				$width = $matches[1];
				$height = $matches[2] !== 'full' ? $matches[2] : '';
			}

			$img_url = esc_url( add_query_arg( array(
				'key' => $key,
				'url' => urlencode( $url ),
				'dimension' => $dimension,
				'format' => $format,
				'cacheLimit' => $days,
				'timeout' => $wait,
			), self::$api_url ) );

			if ( $refresh )  {
			    	$classes[] = 'ssm_refresh';
				wp_register_script( 'ssm_refresh', plugins_url( 'screenshot-machine-shortcode.js' , __FILE__ ) ); 
   					wp_enqueue_script( 'ssm_refresh', array( 'jquery' ), '1.0.0', true );
			}

			if ( $link == true ) {
				$html .= '<a href="'.$url.'" title="'.$title.'" class="ssm_link" '.
					( empty( $target ) ? '' : ' target="'.$target.'" ' ).' >';
			}

			$html .= '<img '.
				'alt="'.$title.'" '.
				'class="'.implode( ' ', $classes ).'" '.
				'data-refreshcounter="0" '.
				'data-src="'.$img_url.'" '.
				( $width !== '' ? 'data-width="'.$width.'" ' : '' ).
				( $height !== '' ? 'data-height="'.$height.'" ' : '' ).
				'src="'.$img_url.'" '.
				( $width !== '' ? 'width="'.$width.'" ' : '' ).
				( $height !== '' ? 'height="'.$height.'" ' : '' ).
				'/>';

			if ( $link == true ) {
				$html .= '</a>';
			}

			return $html;
		}
	}

	ScreenshotMachineShortCode::get_instance(); 
}

