<?php
require_once "include/session.php";
require_once "include/language.php";
$PAGE_TITLE_TAG ??= "undefined";
$LANG = new Language();

function gen_language_path(string $language_tag): string{
    $givenURI = NULL;
    parse_str(parse_url($_SERVER['REQUEST_URI'], PHP_URL_QUERY), $givenURI);
    $givenURI["lang"] = $language_tag;
    return parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH) . "?" . http_build_query($givenURI);
}
?>
<!DOCTYPE html>
<html lang="<?php echo $LANG["tag"] ?>">
    <head>
        <title><?php echo $LANG[$PAGE_TITLE_TAG] ?>- Score Tracker</title>
        <link rel="stylesheet" type="text/css" href="css/heading.css">
        <link rel="stylesheet" type="text/css" href="css/padding.css">
        <link rel="stylesheet" type="text/css" href="css/content.css">
    </head>
    <body>
        <div id="body-lpad">
        </div>
        <div id="body-main">
            <header>
                <nav id="header-container">
                    <ul>
                        <li><a href="/course_list.php">ScoreTracker</a></li>
                        <li><a href="/archived.php">Archived</a></li>
                        <li id="header-mid-pad"></li>
                        <li id="header-lang">
                            <div>
                                <a href="<?php echo gen_language_path("en") ?>">EN</a>
                            </div>
                            <div>
                                <a href="<?php echo gen_language_path("zh") ?>">ZH</a>
                            </div>
                        </li>
                    </ul>
                </nav>
            </header>
            <div class="main-content">
                <h1 class="page-title"><?php echo $LANG[$PAGE_TITLE_TAG] ?></h1>
                <div class="page-content">
                    <?php
                    /*
                     * Local Variables:
                     * mode: web
                     * End:
                     * End: */?>
