<h1>JSM Screenshot Machine Shortcode</h1>

<table>
<tr><th align="right" valign="top" nowrap>Plugin Name</th><td>JSM Screenshot Machine Shortcode</td></tr>
<tr><th align="right" valign="top" nowrap>Summary</th><td>Shortcode to include images from Screenshot Machine in your content.</td></tr>
<tr><th align="right" valign="top" nowrap>Stable Version</th><td>3.0.0</td></tr>
<tr><th align="right" valign="top" nowrap>Requires PHP</th><td>7.4.33 or newer</td></tr>
<tr><th align="right" valign="top" nowrap>Requires WordPress</th><td>5.9 or newer</td></tr>
<tr><th align="right" valign="top" nowrap>Tested Up To WordPress</th><td>6.8.1</td></tr>
<tr><th align="right" valign="top" nowrap>Contributors</th><td>jsmoriss</td></tr>
<tr><th align="right" valign="top" nowrap>License</th><td><a href="https://www.gnu.org/licenses/gpl.txt">GPLv3</a></td></tr>
<tr><th align="right" valign="top" nowrap>Tags / Keywords</th><td>screenshot, machine, shortcode</td></tr>
</table>

<h2>Description</h2>

<p><strong>Shortcode to include images from <a href="http://screenshotmachine.com/">Screenshot Machine</a> in your content.</strong></p>

<h4>SSM Shortcode Required Attributes:</h4>

<ul>
<li><code>key="{customer API key}"</code></li>
<li><code>url="{webpage url}"</code></li>
</ul>

<p>You can find the {customer API key} in your <a href="https://www.screenshotmachine.com/dashboard.php">Screenshot Machine dashboard</a>.</p>

<p>The {webpage url} is the web page URL you want to capture in the screenshot.</p>

<h4>SSM Shortcode Optional Attributes:</h4>

<ul>
<li><code>dimension="{width x height}"</code> (default is 120x90)</li>
<li><code>device="{desktop|phone|tablet}"</code> (default is desktop)</li>
<li><code>format="{jpg|png|gif}"</code> (default is jpg)</li>
<li><code>days="{cache expiration}"</code> (default is 14)</li>
<li><code>wait="{ms}"</code> (default is 200)</li>
<li><code>zoom="{percentage}"</code> (default is 100)</li>
<li><code>click="{css selector}"</code> (example: .button-close)</li>
<li><code>hide="{css selectors}"</code> (example: .add-banner1,.add-banner2)</li>
<li><code>cookies="{semicolon list}"</code> (example: name1=value1;name2=value2)</li>
<li><code>language="{locale}"</code> (example: en-US)</li>
<li><code>agent="{user agent}"</code></li>
<li><code>select="{css selector}"</code> (example: table.table:nth-child(3) > tbody:nth-child(2) > tr:nth-child(15))</li>
<li><code>crop="{x,y,width,height}"</code> (example: 100,0,800,300)</li>
<li><code>title="{title}"</code></li>
<li><code>link="{yes|no}"</code> (default is yes)</li>
<li><code>target="{name}"</code> (default is _blank)</li>
<li><code>refresh="{yes|no}"</code> (default is yes)</li>
</ul>

<h4>SSM Shortcode Attribute Details:</h4>

<p>The dimension="{width x height}" attribute examples:</p>

<ul>
<li><code>dimension="320x240"</code> - screenshot size 320x240 pixels.</li>
<li><code>dimension="800x600"</code> - screenshot size 800x600 pixels.</li>
<li><code>dimension="1024x768"</code> - screenshot size 1024x768 pixels.</li>
<li><code>dimension="1920x1080"</code> - screenshot size 1920x1080 pixels.</li>
<li><code>dimension="1024xfull"</code> - full page screenshot with width equals to 1024 pixels (can be pretty long).</li>
</ul>

<p>The days="{cache expiration}" attribute value is a number of days that a screenshot should be used before a new one is created (default is 14).</p>

<p>The wait="{ms}" attribute value is a number of milliseconds to wait before capturing the screenshot (default is 200).</p>

<p>The click="{css selector}", hide="{css selectors}", and select="{css selector}" attribute values are CSS class and/or id selectors. For example:</p>

<ul>
<li><code>click=".button-close"</code> - click this CSS class container before taking a screenshot.</li>
<li><code>hide=".add-banner1,.add-banner2"</code> - hide this CSS class container before taking a screenshot.</li>
<li><code>select="table.table:nth-child(3) &gt; tbody:nth-child(2) &gt; tr:nth-child(15)"</code> - take a screenshot only of this CSS container.</li>
</ul>

<p>The title="{title}" attribute value is a text string for the image alt and anchor title attributes.</p>

<p>The link="{yes|no}" attribute value will determine if the image is linked to the web page URL or not.</p>

<p>The target="{name}" attribute opens the link in that target (default is "_blank"). An empty string, "_self", "_top", "_parent", or an HTML frame are other possible values.</p>

<p>The refresh="{yes|no}" attribute value includes javascript to retry the image every second until it's available (for a maximum of 10 seconds).</p>

<h4>SSM Shortcode Example:</h4>

<pre>&#91;ssm key="abc123" url="https://google.com/" dimension="800x600"&#93;</pre>

