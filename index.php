<?php
require_once "include/session.php";
require_once "include/language.php";
$LANG = new Language();
?>
<!DOCTYPE html>
<html lang="<?php echo $LANG["tag"] ?>">
    <head>
        <title>Score Tracker</title>
        <link rel="stylesheet" type="text/css" href="css/style.css">
    </head>
    <body>
        <?php
        require_once "fragment/header.php";
        ?>
        <div id="main-body">
            <div id="page-title">
                <h2> Course List </h2>
            </div>
            <div id="page-content">
                <div id="course-name">
                    Seminar on something something
                </div>
                <div id="course-score">
                    90
                </div>
                <div id="course-max">
                    100
                </div>
                <div id="course-pass">
                    Passable
                </div>
            </div>
        </div>
    </body>
    <?php
    /*
     * Local Variables:
     * mode: web
     * End:
     * End: */?>
</html>
