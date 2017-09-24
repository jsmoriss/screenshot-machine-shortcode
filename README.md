<h1>JSM&#039;s Screenshot Machine Shortcode</h1>

<table>
<tr><th align="right" valign="top" nowrap>Plugin Name</th><td>JSM&#039;s Screenshot Machine Shortcode</td></tr>
<tr><th align="right" valign="top" nowrap>Summary</th><td>Shortcode to include images from Screenshot Machine in your content.</td></tr>
<tr><th align="right" valign="top" nowrap>Stable Version</th><td>2.0.0</td></tr>
<tr><th align="right" valign="top" nowrap>Requires At Least</th><td>WordPress 3.7</td></tr>
<tr><th align="right" valign="top" nowrap>Tested Up To</th><td>WordPress 4.8.2</td></tr>
<tr><th align="right" valign="top" nowrap>Contributors</th><td>jsmoriss</td></tr>
<tr><th align="right" valign="top" nowrap>License</th><td><a href="https://www.gnu.org/licenses/gpl.txt">GPLv3</a></td></tr>
<tr><th align="right" valign="top" nowrap>Tags / Keywords</th><td>screenshot, machine, shortcode</td></tr>
</table>

<h2>Description</h2>

<p>Use the <code>ssm</code> shortcode in your content with the following arguments:</p>

<ul>
<li><code>key="{customer key}"</code></li>
<li><code>url="{url}"</code></li>
<li><code>dimension="{width x height}"</code> (default is 120x90)</li>
<li><code>device="{desktop|phone|tablet}"</code> (default is desktop)</li>
<li><code>format="{jpg|png|gif}"</code> (default is jpg)</li>
<li><code>days="{cache expiration}"</code> (default is 14)</li>
<li><code>wait="{wait in ms}"</code> (default is 200)</li>
<li><code>title="{href title}"</code></li>
<li><code>link="{yes|no}"</code> (default is yes)</li>
<li><code>target="{link target}"</code> (default is _blank)</li>
<li><code>refresh="{yes|no}"</code> (default is yes)</li>
</ul>

<p>You can find the <code>{customer key}</code> on <a href="https://www.screenshotmachine.com/account.php">your Screenshot Machine account/settings page</a>.</p>

<p>The <code>{url}</code> is the web page URL you want to capture in the screenshot.</p>

<p>Example dimension values:</p>

<ul>
<li><code>320x240</code> - screenshot size 320x240 pixels</li>
<li><code>800x600</code> - screenshot size 800x600 pixels</li>
<li><code>1024x768</code> - screenshot size 1024x768 pixels</li>
<li><code>1920x1080</code> - screenshot size 1920x1080 pixels</li>
<li><code>1024xfull</code> - full page screenshot with width equals to 1024 pixels (can be pretty long)</li>
</ul>

<p>Example device and dimension values:</p>

<ul>
<li><code>device="desktop"</code> and <code>dimension="1024x768"</code> - desktop screenshot with size 1024x768 pixels</li>
<li><code>device="phone"</code> and <code>dimension="480x800"</code> - mobile phone screenshot with size 480x800 pixels</li>
<li><code>device="tablet"</code> and <code>dimension="800x1280"</code> - tablet screenshot with size 800x1280 pixels</li>
</ul>

<p><code>{jpeg|png|gif}</code>
 is the image format to use (default is jpg).</p>

<p><code>{cache expiration}</code>
 is the number of days a screenshot should be used before a new one is created.</p>

<p><code>{wait in ms}</code>
 is the number of milliseconds to wait before capturing the screenshot.</p>

<p><code>{href title}</code>
 is the title text for the image alt and link title.</p>

<p>The link <code>{yes|no}</code> value will determine if the image is linked to the web page URL or not.</p>

<p>The <code>{link target}</code> default will open links in a new window/tab. An empty string, '_self', '_top', '_parent', and a framename are also valid.</p>

<p>The refresh <code>{yes|no}</code> value includes javascript to retry the image every second until it's available (for a maximum of 10 seconds).</p>

<p>Example:</p>

<pre>
&#91;ssm key="abc123" url="https://surniaulula.com/extend/plugins/screenshot-machine-shortcode/" dimension="800x600"&#93;
</pre>


<h2>Installation</h2>

<h4>Automated Install</h4>

<ol>
<li>Go to the wp-admin/ section of your website.</li>
<li>Select the <em>Plugins</em> menu item.</li>
<li>Select the <em>Add New</em> sub-menu item.</li>
<li>In the <em>Search</em> box, enter the plugin name.</li>
<li>Click the <em>Search Plugins</em> button.</li>
<li>Click the <em>Install Now</em> link for the plugin.</li>
<li>Click the <em>Activate Plugin</em> link.</li>
</ol>

<h4>Semi-Automated Install</h4>

<ol>
<li>Download the plugin archive file.</li>
<li>Go to the wp-admin/ section of your website.</li>
<li>Select the <em>Plugins</em> menu item.</li>
<li>Select the <em>Add New</em> sub-menu item.</li>
<li>Click on <em>Upload</em> link (just under the Install Plugins page title).</li>
<li>Click the <em>Browse...</em> button.</li>
<li>Navigate your local folders / directories and choose the zip file you downloaded previously.</li>
<li>Click on the <em>Install Now</em> button.</li>
<li>Click the <em>Activate Plugin</em> link.</li>
</ol>


<h2>Frequently Asked Questions</h2>

<h4>Frequently Asked Questions</h4>

<ul>
<li>None</li>
</ul>


<h2>Other Notes</h2>

<h3>Other Notes</h3>
<h4>Additional Documentation</h4>

<ul>
<li>None</li>
</ul>

