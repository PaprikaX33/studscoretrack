<?php
require_once "include/session.php";
require_once "include/language.php";
$LANG = new Language();
?>
<!DOCTYPE html>
<html lang="<?php echo $LANG["tag"] ?>">
    <head>
        <title>Score Tracker</title>
        <link rel="stylesheet" type="text/css" href="css/heading.css">
        <link rel="stylesheet" type="text/css" href="css/padding.css">
        <link rel="stylesheet" type="text/css" href="css/content.css">
    </head>
    <body>
        <?php
        require_once "fragment/header.php";
        ?>
        <div id="main-content">
            <h1 id="page-title">Course List</h1>
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
                            <td class="course-name">
                                Seminar on something something
                            </td>
                            <td class="course-score">
                                90
                            </td>
                            <td class="course-max">
                                100
                            </td>
                            <td class="course-pass">
                                Passable
                            </td>
                            <tr>
                                <td class="course-name">
                                    Seminar on nothing really
                                </td>
                                <td class="course-score">
                                    100
                                </td>
                                <td class="course-max">
                                    1000
                                </td>
                                <td class="course-pass">
                                    Maybe
                                </td>
                            </tr>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <?php
        require_once "fragment/closer.php";
        ?>
    </body>
    <?php
    /*
     * Local Variables:
     * mode: web
     * End:
     * End: */?>
</html>
