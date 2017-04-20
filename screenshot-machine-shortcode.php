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
 * Requires At Least: 3.7
 * Tested Up To: 4.7.4
 * Version: 1.1.3
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

if ( ! defined( 'ABSPATH' ) ) 
	die( 'These aren\'t the droids you\'re looking for...' );

if ( ! class_exists( 'ScreenshotMachineShortCode' ) ) {

	class ScreenshotMachineShortCode {  

		protected $api_url = 'http://api.screenshotmachine.com/';  

		public function __construct()  {  
			add_shortcode( 'ssm', array( &$this, 'shortcode' ) );
		}  

		public function shortcode( $atts, $content = null ){

			extract( shortcode_atts( array(
				'key' => '',
				'url' => '',
				'size' => 'T',
				'format' => 'jpg',
				'days' => '14',
				'wait' => '200',
				'title' => '',
				'link' => true,
				'target' => '_blank',
				'refresh' => true,
			), $atts ) );

			$size = strtoupper( $size );
			$link = filter_var( $link, FILTER_VALIDATE_BOOLEAN );
			$refresh = filter_var( $refresh, FILTER_VALIDATE_BOOLEAN );

			switch ( $size ) {
				case 'T' : $width=120; $height=90; break;
				case 'S' : $width=200; $height=150; break;
				case 'E' : $width=320; $height=240; break;
				case 'N' : $width=400; $height=300; break;
				case 'M' : $width=640; $height=480; break;
				case 'L' : $width=800; $height=600; break;
				case 'X' : $width=1024; $height=768; break;
			}

			$oret_html = '';
			$classnames = array( 'ssm' );
			$img_url = $this->api_url.'?key='.$key.
				'&url='.urlencode($url).
				'&size='.$size.
				'&format='.$format.
				'&cacheLimit='.$days.
				'&timeout='.$wait;

			if ( $refresh )  {
			    	$classnames[] = 'ssm_refresh';
				wp_register_script( 'ssm_refresh', plugins_url( 'screenshot-machine-shortcode.js' , __FILE__ ) ); 
   					wp_enqueue_script( 'ssm_refresh', array( 'jquery' ), '1.0.0', true );
			}

			if ( $link == true ) {
				$ret_html .= '<a href="'.$url.'" title="'.$title.'" class="ssm_link" '.
					( empty( $target ) ? '' : ' target="'.$target.'" ' ).' >';
			}

			$ret_html .= '<img alt="'.$title.'" class="'.implode( ' ', $classnames ).'" data-refreshcounter="0" 
				data-src="'.$img_url.'" data-width="'.$width.'" data-height="'.$height.'" 
				src="'.$img_url.'" width="'.$width.'" height="'.$height.'" />';

			if ( $link == true )
				$ret_html .= '</a>';

			return $ret_html;
		}
	}

	$_ScreenshotMachineShortCode = new ScreenshotMachineShortCode(); 
}

?>
