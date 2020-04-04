=== JSM's Screenshot Machine Shortcode ===
Plugin Name: JSM's Screenshot Machine Shortcode
Plugin Slug: screenshot-machine-shortcode
Text Domain: screenshot-machine-shortcode
Domain Path: /languages
License: GPLv3
License URI: https://www.gnu.org/licenses/gpl.txt
Assets URI: https://jsmoriss.github.io/screenshot-machine-shortcode/assets/
Tags: screenshot, machine, shortcode
Contributors: jsmoriss
Requires PHP: 5.6
Requires At Least: 4.2
Tested Up To: 5.4
Stable Tag: 2.0.0

Shortcode to include images from Screenshot Machine in your content.

== Description ==

**Shortcode to include images from [Screenshot Machine](http://screenshotmachine.com/) in your content.**

Use the `ssm` shortcode in your content with the following arguments:

* `key="{customer key}"`
* `url="{url}"`
* `dimension="{width x height}"` (default is 120x90)
* `device="{desktop|phone|tablet}"` (default is desktop)
* `format="{jpg|png|gif}"` (default is jpg)
* `days="{cache expiration}"` (default is 14)
* `wait="{wait in ms}"` (default is 200)
* `title="{href title}"`
* `link="{yes|no}"` (default is yes)
* `target="{frame name}"` (default is _blank)
* `refresh="{yes|no}"` (default is yes)

You can find the `{customer key}` on [your Screenshot Machine customer profile](https://www.screenshotmachine.com/account.php).

The `{url}` is the web page URL you want to capture in the screenshot.

Example dimension values:

* `320x240` - screenshot size 320x240 pixels
* `800x600` - screenshot size 800x600 pixels
* `1024x768` - screenshot size 1024x768 pixels
* `1920x1080` - screenshot size 1920x1080 pixels
* `1024xfull` - full page screenshot with width equals to 1024 pixels (can be pretty long)

Example device and dimension values:

* `device="desktop"` and `dimension="1024x768"` - desktop screenshot with size 1024x768 pixels
* `device="phone"` and `dimension="480x800"` - mobile phone screenshot with size 480x800 pixels
* `device="tablet"` and `dimension="800x1280"` - tablet screenshot with size 800x1280 pixels

The format `{jpeg|png|gif}` is an image format to use for the screenshot (default is jpg).

The `{cache expiration}` is a number of days a screenshot should be used before a new one is created (default is 14).

The `{wait in ms}` is a number of milliseconds to wait before capturing the screenshot (default is 200).

The `{href title}` is a title text for the image alt and title attributes.

The link `{yes|no}` value will determine if the image is linked to the web page URL or not.

The target `{frame name}` default value opens the link in a new window/tab. An empty string, "_self", "_top", "_parent", or an HTML frame name are also valid values.

The refresh `{yes|no}` value includes javascript to retry the image every second until it's available (for a maximum of 10 seconds).

Example shortcode:

<pre>
&#91;ssm key="abc123" url="https://google.com/" dimension="800x600"&#93;
</pre>

== Installation ==

= Automated Install =

1. Go to the wp-admin/ section of your website.
1. Select the *Plugins* menu item.
1. Select the *Add New* sub-menu item.
1. In the *Search* box, enter the plugin name.
1. Click the *Search Plugins* button.
1. Click the *Install Now* link for the plugin.
1. Click the *Activate Plugin* link.

= Semi-Automated Install =

1. Download the plugin ZIP file.
1. Go to the wp-admin/ section of your website.
1. Select the *Plugins* menu item.
1. Select the *Add New* sub-menu item.
1. Click on *Upload* link (just under the Install Plugins page title).
1. Click the *Browse...* button.
1. Navigate your local folders / directories and choose the ZIP file you downloaded previously.
1. Click on the *Install Now* button.
1. Click the *Activate Plugin* link.

== Frequently Asked Questions ==

== Screenshots ==

== Changelog ==

<h3 class="top">Version Numbering</h3>

Version components: `{major}.{minor}.{bugfix}[-{stage}.{level}]`

* {major} = Major structural code changes / re-writes or incompatible API changes.
* {minor} = New functionality was added or improved in a backwards-compatible manner.
* {bugfix} = Backwards-compatible bug fixes or small improvements.
* {stage}.{level} = Pre-production release: dev < a (alpha) < b (beta) < rc (release candidate).

<h3>Repositories</h3>

* [GitHub](https://jsmoriss.github.io/screenshot-machine-shortcode/)
* [WordPress.org](https://plugins.trac.wordpress.org/browser/screenshot-machine-shortcode/)

<h3>Changelog / Release Notes</h3>

**Version 2.0.0 (2017/09/24)**

* **New Features**
	* None.
* **Improvements**
	* Added support for the new "dimension" argument.
	* Deprecated the "size" argument -- older size values are converted to dimension values for backwards compatibility.
* **Bugfixes**
	* None.
* **Developer Notes**
	* None.

== Upgrade Notice ==

= 2.0.0 =

(2017/09/24) Added support for the new "dimension" argument. Deprecated the "size" argument -- older size values are converted to dimension values for backwards compatibility.

