<?php
require_once "include/session.php";
require_once "include/language.php";
$LANG = new Language();
?>
<!DOCTYPE html>
<html lang="<?php echo $LANG["tag"] ?>">
    <head>
        <title><?php echo $LANG[$PAGE_TITLE_TAG] ?? "--??--"; ?>- Score Tracker</title>
        <link rel="stylesheet" type="text/css" href="css/heading.css">
        <link rel="stylesheet" type="text/css" href="css/padding.css">
        <link rel="stylesheet" type="text/css" href="css/content.css">
    </head>
    <body>
        <?php
        $currentPath = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)
        ?>
        <div id="body-lpad">
        </div>
        <div id="body-main">
            <header>
                <nav id="header-container">
                    <ul>
                        <li><a href="/course_list.php">ScoreTracker</a></li>
                        <li><a href="/archived.php">Archived</a></li>
                        <li><a href="/">Summary</a></li>
                        <li id="header-mid-pad"></li>
                        <li id="header-lang">
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
