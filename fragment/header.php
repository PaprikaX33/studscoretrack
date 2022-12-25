<?php namespace header;
$currentPath = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)
?>
<header class="header-container">
    <nav class="header-navigation">
        <div>
            <a href="/">ScoreTracker</a>
        </div>
        <div>
            <a href="/">Archived</a>
        </div>
        <div>
            <a href="/">Summary</a>
        </div>
    </nav>
    <div class="header-lang">
        <div>
            <a href="<?php echo $currentPath ?>?lang=en">EN</a>
        </div>
        <div><a>|</a></div>
        <div>
            <a href="<?php echo $currentPath ?>?lang=zh">ZH</a>
        </div>
    </div>
</header>
<?php
/*
 * Local Variables:
 * mode: web
 * End:
 * End: */?>
