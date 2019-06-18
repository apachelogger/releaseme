<?php
    include_once ("functions.inc");
    $translation_file = "www";
    require('../aether/config.php');

    $pageConfig = array_merge($pageConfig, [
        'title' => "KDE Plasma 5.9.1, Bugfix Release for January",
        'cssFile' => '/css/announce.css'
    ]);

    require('../aether/header.php');
    $site_root = "../";
    $release = 'plasma-5.9.1'; // for i18n
    $version = "5.9.1";
?>

<script src="/js/use-ekko-lightbox.js" defer="true"></script>

<main class="releaseAnnouncment container">

    <h1 class="announce-title"><a href="/announcements/"><?php i18n("Release Announcements")?></a><?php print i18n_var("Plasma %1", $version)?></h1>

    <?php include "./announce-i18n-bar.inc"; ?>

    <h1>NOT OUT YET</h1>

    <figure class="videoBlock">
        <iframe width="560" height="315" src="https://www.youtube.com/embed/lm0sqqVcotA?rel=0" allowfullscreen='true'></iframe>
    </figure>

    <figure class="topImage">
        <a href="plasma-5.9/plasma-5.9.png" data-toggle="lightbox">
            <img src="plasma-5.9/plasma-5.9-wee.png" height="338" width="600" style="width: 100%; max-width: 600px; height: auto;" alt="Plasma 5.9" />
        </a>
        <figcaption><?php print i18n_var("KDE Plasma %1", "5.9")?></figcaption>
    </figure>

    <p>
        <?php i18n("Tuesday, 14 February 2017.")?>
        <?php print i18n_var("Today KDE releases a Bugfix update to KDE Plasma 5, versioned %1", "5.9.1");?>.
        <?php print i18n_var("<a href='https://www.kde.org/announcements/plasma-%1.0.php'>Plasma %1</a>
        was released in January with many feature refinements and new modules to complete the desktop experience.", "5.9");?>
    </p>

    <p>
<?php        i18n("This release adds a month's worth of new translations and fixes from KDE's contributors.  The bugfixes are typically small but important and include:");?>
    </p>

    <ul>
        <?php i18n("
FIXME
")?>
    </ul>

    <a href="plasma-5.9.0-5.9.1-changelog.php"><?php print i18n_var("Full Plasma %1 changelog", "5.9.1"); ?></a>

    <!-- // Boilerplate again -->
    <section class="row get-it">
        <article class="col-md">
            <h2><?php i18n("Live Images");?></h2>
            <p>
                <?php i18n("The easiest way to try it out is with a live image booted off a USB disk. Docker images also provide a quick and easy way to test Plasma.");?>
            </p>
            <a href='https://community.kde.org/Plasma/Live_Images' class="learn-more"><?php i18n("Download live images with Plasma 5");?></a>
            <a href='https://community.kde.org/Plasma/Docker_Images' class="learn-more"><?php i18n("Download Docker images with Plasma 5");?></a>
        </article>

        <article class="col-md">
            <h2><?php i18n("Package Downloads");?></h2>
            <p>
                <?php i18n("Distributions have created, or are in the process of creating, packages listed on our wiki page.");?>
            </p>
            <a href='https://community.kde.org/Get_KDE_Software_on_Your_Linux_Distro' class="learn-more"><?php i18n("Get KDE Software on Your Linux Distro wiki page");?></a>
        </article>

        <article class="col-md">
            <h2><?php i18n("Source Downloads");?></h2>
            <p>
                <?php i18n("You can install Plasma 5 directly from source.");?>
            </p>
            <a href='https://community.kde.org/Guidelines_and_HOWTOs/Build_from_source' class='learn-more'><?php i18n("Community instructions to compile it");?></a>
            <a href='../info/plasma-5.9.1.php' class='learn-more'><?php i18n("Source Info Page");?></a>
        </article>
    </section>

    <section class="give-feedback">
        <h2><?php i18n("Feedback");?></h2>

        <p class="kSocialLinks">
            <?php i18n("You can give us feedback and get updates on our social media channels:"); ?>
            <a class="shareFacebook" href="https://www.facebook.com/kde/" rel="nofollow">Post on Facebook</a>
            <a class="shareTwitter" href="https://twitter.com/kdecommunity" rel="nofollow">Share on Twitter</a>
            <a class="shareDiaspora" href="https://joindiaspora.com/people/9c3d1a454919ef06" rel="nofollow">Share on Diaspora</a>
            <a class="shareReddit" href="http://www.reddit.com/r/kde/" rel="nofollow">Share on Reddit</a>
            <a class="shareYouTube" href="https://www.youtube.com/channel/UCF3I1gf7GcbmAb0mR6vxkZQ" rel="nofollow">Share on YouTube</a>
            <a class="shareMastodon" href="https://mastodon.technology/@kde" rel="nofollow">Share on Mastodon</a>
            <a class="shareLinkedIn" href="https://www.linkedin.com/company/29561/" rel="nofollow">Share on LinkedIn</a>
            <a class="sharePeerTube" href="https://peertube.mastodon.host/accounts/kde/videos" rel="nofollow">Share on PeerTube</a>
        </p>
        <p>
            <?php print i18n_var("Discuss Plasma 5 on the <a href='%1'>KDE Forums Plasma 5 board</a>.", "https://forum.kde.org/viewforum.php?f=289");?>
        </p>

        <p><?php print i18n_var("You can provide feedback direct to the developers via the <a href='%1'>Plasma Matrix chat room</a>, <a href='%2'>Plasma-devel mailing list</a> or report issues via <a href='%3'>bugzilla</a>. If you like what the team is doing, please let them know!", "https://webchat.kde.org/#/room/#kde-devel:kde.org", "https://mail.kde.org/mailman/listinfo/plasma-devel", "https://bugs.kde.org/enter_bug.cgi?product=plasmashell&amp;format=guided"); ?>

        <p><?php i18n("Your feedback is greatly appreciated.");?></p>
    </section>

    <h2>
        <?php i18n("Supporting KDE");?>
    </h2>

    <p align="justify">
        <?php print i18n_var("KDE is a <a href='%1'>Free Software</a> community that exists and grows only because of the help of many volunteers that donate their time and effort. KDE is always looking for new volunteers and contributions, whether it is help with coding, bug fixing or reporting, writing documentation, translations, promotion, money, etc. All contributions are gratefully appreciated and eagerly accepted. Please read through the <a href='%2'>Supporting KDE page</a> for further information or become a KDE e.V. supporting member through our <a href='%3'>Join the Game</a> initiative.", "http://www.gnu.org/philosophy/free-sw.html", "/community/donations/", "https://relate.kde.org/civicrm/contribute/transact?id=5"); ?>
    </p>

<?php
  include($site_root . "/contact/about_kde.inc");
?>

<h2><?php i18n("Press Contacts");?></h2>

<?php
  include($site_root . "/contact/press_contacts.inc");
?>

</main>
<?php
  require('../aether/footer.php');
