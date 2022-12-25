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
                <table>
                    <thead>
                        <tr>
                            <th>Course Title</th>
                            <th>Average Score</th>
                            <th>Maximum Score</th>
                            <th>Passable</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td id="course-name">
                                Seminar on something something
                            </td>
                            <td id="course-score">
                                90
                            </td>
                            <td id="course-max">
                                100
                            </td>
                            <td id="course-pass">
                                Passable
                            </td>
                        </tr>
                    </tbody>
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
