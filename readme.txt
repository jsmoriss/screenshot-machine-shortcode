=== JSM Screenshot Machine Shortcode ===
Plugin Name: JSM Screenshot Machine Shortcode
Plugin Slug: screenshot-machine-shortcode
Text Domain: screenshot-machine-shortcode
Domain Path: /languages
License: GPLv3
License URI: https://www.gnu.org/licenses/gpl.txt
Assets URI: https://jsmoriss.github.io/screenshot-machine-shortcode/assets/
Tags: screenshot, machine, shortcode
Contributors: jsmoriss
Requires PHP: 7.4.33
Requires At Least: 5.9
Tested Up To: 6.8.0
Stable Tag: 3.0.0

Shortcode to include images from Screenshot Machine in your content.

== Description ==

**Shortcode to include images from [Screenshot Machine](http://screenshotmachine.com/) in your content.**

= SSM Shortcode Required Attributes: =

* `key="{customer API key}"`
* `url="{webpage url}"`

You can find the {customer API key} in your [Screenshot Machine dashboard](https://www.screenshotmachine.com/dashboard.php).

The {webpage url} is the web page URL you want to capture in the screenshot.

= SSM Shortcode Optional Attributes: =

* `dimension="{width x height}"` (default is 120x90)
* `device="{desktop|phone|tablet}"` (default is desktop)
* `format="{jpg|png|gif}"` (default is jpg)
* `days="{cache expiration}"` (default is 14)
* `wait="{ms}"` (default is 200)
* `zoom="{percentage}"` (default is 100)
* `click="{css selector}"` (example: .button-close)
* `hide="{css selectors}"` (example: .add-banner1,.add-banner2)
* `cookies="{semicolon list}"` (example: name1=value1;name2=value2)
* `language="{locale}"` (example: en-US)
* `agent="{user agent}"`
* `select="{css selector}"` (example: table.table:nth-child(3) > tbody:nth-child(2) > tr:nth-child(15))
* `crop="{x,y,width,height}"` (example: 100,0,800,300)
* `title="{title}"`
* `link="{yes|no}"` (default is yes)
* `target="{name}"` (default is _blank)
* `refresh="{yes|no}"` (default is yes)

= SSM Shortcode Attribute Details: =

The dimension="{width x height}" attribute examples:

* `dimension="320x240"` - screenshot size 320x240 pixels.
* `dimension="800x600"` - screenshot size 800x600 pixels.
* `dimension="1024x768"` - screenshot size 1024x768 pixels.
* `dimension="1920x1080"` - screenshot size 1920x1080 pixels.
* `dimension="1024xfull"` - full page screenshot with width equals to 1024 pixels (can be pretty long).

The days="{cache expiration}" attribute value is a number of days that a screenshot should be used before a new one is created (default is 14).

The wait="{ms}" attribute value is a number of milliseconds to wait before capturing the screenshot (default is 200).

The click="{css selector}", hide="{css selectors}", and select="{css selector}" attribute values are CSS class and/or id selectors. For example:

* `click=".button-close"` - click this CSS class container before taking a screenshot.
* `hide=".add-banner1,.add-banner2"` - hide this CSS class container before taking a screenshot.
* `select="table.table:nth-child(3) > tbody:nth-child(2) > tr:nth-child(15)"` - take a screenshot only of this CSS container.

The title="{title}" attribute value is a text string for the image alt and anchor title attributes.

The link="{yes|no}" attribute value will determine if the image is linked to the web page URL or not.

The target="{name}" attribute opens the link in that target (default is "_blank"). An empty string, "_self", "_top", "_parent", or an HTML frame are other possible values.

The refresh="{yes|no}" attribute value includes javascript to retry the image every second until it's available (for a maximum of 10 seconds).

= SSM Shortcode Example: =

<pre>&#91;ssm key="abc123" url="https://google.com/" dimension="800x600"&#93;</pre>

== Installation ==

== Frequently Asked Questions ==

== Screenshots ==

== Changelog ==

<h3 class="top">Version Numbering</h3>

Version components: `{major}.{minor}.{bugfix}[-{stage}.{level}]`

* {major} = Major structural code changes and/or incompatible API changes (ie. breaking changes).
* {minor} = New functionality was added or improved in a backwards-compatible manner.
* {bugfix} = Backwards-compatible bug fixes or small improvements.
* {stage}.{level} = Pre-production release: dev < a (alpha) < b (beta) < rc (release candidate).

<h3>Repositories</h3>

* [GitHub](https://jsmoriss.github.io/screenshot-machine-shortcode/)
* [WordPress.org](https://plugins.trac.wordpress.org/browser/screenshot-machine-shortcode/)

<h3>Changelog / Release Notes</h3>

**Version 3.0.0 (2025/01/17)**

* **New Features**
	* None.
* **Improvements**
	* Improved shortcode attribute sanitization.
* **Bugfixes**
	* None.
* **Developer Notes**
	* None.
* **Requires At Least**
	* PHP v7.4.33.
	* WordPress v5.9.

**Version 2.3.0 (2021/06/28)**

* **New Features**
	* None.
* **Improvements**
	* Updated the API URL from http to https.
* **Bugfixes**
	* None.
* **Developer Notes**
	* None.
* **Requires At Least**
	* PHP v7.4.33.
	* WordPress v5.9.

== Upgrade Notice ==

= 3.0.0 =

(2025/01/17) Improved shortcode attribute sanitization.

= 2.3.0 =

(2021/06/28) Updated the API URL from http to https.

