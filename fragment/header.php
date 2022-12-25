<?php namespace header;
$currentPath = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)
?>
<div class="body-lpad">
</div>
<header>
    <nav class="header-container">
        <ul>
            <li><a href="/">ScoreTracker</a></li>
            <li><a href="/">Archived</a></li>
            <li><a href="/">Summary</a></li>
            <li class="header-lang">
                <div>
                    <a href="<?php echo $currentPath ?>?lang=en">EN</a>
                </div>
                <div>
                    <a href="<?php echo $currentPath ?>?lang=zh">ZH</a>
                </div>
            </li>
        </ul>
    </nav>
</header>
<?php
/*
 * Local Variables:
 * mode: web
 * End:
 * End: */?>
