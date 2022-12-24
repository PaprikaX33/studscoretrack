<?php namespace header;
$currentPath = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)
?>
<header>
    <div id="header-title">
        <nav>
            <a href="/"><?php echo $LANG["title"]?></a>
        </nav>
    </div>
    <div id="header-lang">
        <nav>
            <a href="<?php echo $currentPath ?>?lang=en">EN</a>
        </nav>
        <nav>
            <a href="<?php echo $currentPath ?>?lang=zh">ZH</a>
        </nav>
</header>
<?php
/*
 * Local Variables:
 * mode: web
 * End:
 * End: */?>
