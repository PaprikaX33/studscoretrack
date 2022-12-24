<?php
require_once "include/session.php";
require_once "include/language.php";
$LANG = new Language();
?>
<!DOCTYPE html>
<html lang="<?php echo $LANG["tag"] ?>">
    <head>
        <title>
            Score Tracker
        </title>
    </head>
    <body>
        <header>
            <!-- Top header menu containing logo and Navigation bar -->
            <div id="header-title">
                <nav>
                    <?php echo $LANG["title"];?>
                </nav>
            </div>
            <div id="header-lang">
                <nav>
                    <a href="<?php echo parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH) ?>?lang=en">EN</a>
                </nav>
                <nav>
                    <a href="<?php echo parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH) ?>?lang=zh">ZH</a>
                </nav>
        </header>
        <h1></h1>
        <?php
        require_once "include/json.php";
        var_dump(load_json("config/dbconfig.json"));
        ?>
        <h2><?php echo $LANG["new"] ?></h2>
    </body>
    <?php
    /*
     * Local Variables:
     * mode: web
     * End:
     * End: */?>
</html>
