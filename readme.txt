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
Requires At Least: 3.7
Tested Up To: 4.8.2
Requires PHP: 5.3
Stable Tag: 2.0.0

Shortcode to include images from Screenshot Machine in your content.

== Description ==

Use the `ssm` shortcode in your content with the following arguments:

* `key="{account key}"`
* `url="{url}"`
* `dimension="{width x height}"` (default is 120x90)
* `device="{desktop|phone|tablet}"` (default is desktop)
* `format="{jpg|png|gif}"` (default is jpg)
* `days="{cache expiration}"` (default is 14)
* `wait="{wait in ms}"` (default is 200)
* `title="{href title}"
* `link="{yes|no}"` (default is yes)
* `target="{link target}"` (default is _blank)
* `refresh="{yes|no}"` (default is yes)

You can find the `{account key}` on [your Screenshot Machine account/settings page](https://www.screenshotmachine.com/account.php).

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

`{jpeg|png|gif}` is the image format to use (default is jpg).

`{cache expiration}` is the number of days a screenshot should be used before a new one is created.

`{wait in ms}` is the number of milliseconds to wait before capturing the screenshot.

`{href title}` is the title text for the image alt and link title.

The link `{yes|no}` value will determine if the image is linked to the web page URL or not.

The `{link target}` default will open links in a new window/tab. An empty string, '_self', '_top', '_parent', and a framename are also valid.

The refresh `{yes|no}` value includes javascript to retry the image every second until it's available (for a maximum of 10 seconds).

Example:

<pre>
&#91;ssm key="abc123" url="https://surniaulula.com/extend/plugins/screenshot-machine-shortcode/" dimension="800x600"&#93;
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

1. Download the plugin archive file.
1. Go to the wp-admin/ section of your website.
1. Select the *Plugins* menu item.
1. Select the *Add New* sub-menu item.
1. Click on *Upload* link (just under the Install Plugins page title).
1. Click the *Browse...* button.
1. Navigate your local folders / directories and choose the zip file you downloaded previously.
1. Click on the *Install Now* button.
1. Click the *Activate Plugin* link.

== Frequently Asked Questions ==

= Frequently Asked Questions =

* None

== Other Notes ==

= Additional Documentation =

* None

== Screenshots ==

== Changelog ==

= Repositories =

* [GitHub](https://jsmoriss.github.io/screenshot-machine-shortcode/)
* [WordPress.org](https://wordpress.org/plugins/screenshot-machine-shortcode/developers/)

= Version Numbering =

Version components: `{major}.{minor}.{bugfix}[-{stage}.{level}]`

* {major} = Major structural code changes / re-writes or incompatible API changes.
* {minor} = New functionality was added or improved in a backwards-compatible manner.
* {bugfix} = Backwards-compatible bug fixes or small improvements.
* {stage}.{level} = Pre-production release: dev < a (alpha) < b (beta) < rc (release candidate).

= Changelog / Release Notes =

**Version 2.0.0 (2017/09/24)**

* *New Features*
	* None
* *Improvements*
	* Added support for the new "dimension" argument.
	* Deprecated the "size" argument -- older size values are converted to dimension values for backwards compatibility.
* *Bugfixes*
	* None
* *Developer Notes*
	* None

== Upgrade Notice ==

= 2.0.0 =

(2017/09/24) Added support for the new "dimension" argument. Deprecated the "size" argument -- older size values are converted to dimension values for backwards compatibility.

