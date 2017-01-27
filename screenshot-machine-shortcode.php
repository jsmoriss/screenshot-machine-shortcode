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
 * Tested Up To: 4.7.2
 * Version: 1.1.2-1
 *
 * Version Components: {major}.{minor}.{bugfix}-{stage}{level}
 *
 *	{major}		Major code changes / re-writes or significant feature changes.
 *	{minor}		New features / options were added or improved.
 *	{bugfix}	Bugfixes or minor improvements.
 *	{stage}{level}	dev < a (alpha) < b (beta) < rc (release candidate) < # (production).
 *
 * See PHP's version_compare() documentation at http://php.net/manual/en/function.version-compare.php.
 * 
 * This script is free software; you can redistribute it and/or modify it under
 * the terms of the GNU General Public License as published by the Free Software
 * Foundation; either version 3 of the License, or (at your option) any later
 * version.
 * 
 * This script is distributed in the hope that it will be useful, but WITHOUT ANY
 * WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A
 * PARTICULAR PURPOSE. See the GNU General Public License for more details at
 * http://www.gnu.org/licenses/.
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
