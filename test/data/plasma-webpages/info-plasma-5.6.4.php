<?php
  $version = "5.6.4";
  $page_title = "KDE Plasma ".$version." Source Information Page";
  $site_root = "../";
  include "header.inc";
?>

<h1>NOT OUT YET</h1>

<p>This is a bugfix release of KDE Plasma, featuring Plasma Desktop and
other essential software for your computer.  Details in the <a
href="../announcements/plasma-<?php echo $version; ?>.php">Plasma <?php echo $version; ?> announcement</a>.</p>

<h2>Security Issues</h2>

<p>Please report possible problems to <a
href="m&#x61;i&#00108;&#x74;o:&#115;ec&#117;&#x72;&#00105;&#x74;&#121;&#x40;kde.&#00111;&#x72;g">&#x73;&#101;&#x63;u&#114;i&#x74;y&#x40;kd&#101;.&#x6f;&#00114;&#103;</a>.
Security issues are listed on the <a
href="http://kde.org/info/security/">KDE Security Advisories</a> page.</p>

<h2><a name="bugs">Bugs</a></h2>

<p><a href="https://community.kde.org/Plasma/5.6_Errata">5.6 Errata wiki page</a> lists the most important known problems.</p>

<p>Please check the <a href="http://bugs.kde.org/">bug database</a>
before filing any bug reports. Also check for possible updates on this page
that might describe or fix your problem.</p>

<h2>Install Packages</h2>

<p> The easiest way to install and use Plasma 5 is to install
 pre-built packages.  For details of Linux distributions which do so
 see the <a href="https://community.kde.org/Plasma/Packages">Plasma
 Binary Packages wiki page</a>.</p>

<h2>Source Install and Use</h2>

<p>You can compile Plasma yourself if you are a software developer.  See the
 <a href="http://community.kde.org/Plasma/Building">Build instructions</a>
 on our developer wiki.
</p>

<h2><a name="source">Download Source Code</a></h2>
<p>
  The complete source code for Plasma <?php echo $version; ?> is available for download from <a href="http://download.kde.org/stable/plasma/<?php echo $version; ?>">download.kde.org</a>.
</p>

<p>GPG signatures are available alongside the source code for
verification. They are signed by release manager <a
href="https://sks-keyservers.net/pks/lookup?op=vindex&search=0xa506e6d4dd4d5088">Jonathan Riddell</a>.  Git tags are also signed by the
same key.</p>

<?php
include "source-plasma-$version.inc"
?>

<?php
  include "footer.inc";
?>