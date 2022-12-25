<?php
if($_SERVER['REQUEST_METHOD'] != 'GET' || !isset($_GET['id']) || $_GET['id'] == ''){
    header('Location: /course_list.php');
    die();
}
$PAGE_TITLE_TAG = "page-course-data-title";
require_once "include/db_con.php";
require_once "fragment/header.php";
$sqlcon = db_init();
$maxcourse = $sqlcon->query("SELECT MAX(courseID) FROM course;")->fetch_row()[0];
if($_GET["id"] > $maxcourse){
    header('Location: /course_list.php');
    die();
}
$query = "SELECT en_name, zh_name, credit, semester, passing, archived
 FROM course WHERE courseID=".(string)$_GET["id"];
$res = $sqlcon->query($query)->fetch_assoc();
$sqlcon->close();
?>
<div class="content-block">
    <table class="key-val-table">
        <tbody>
            <tr>
                <td>
                    Course English Name
                </td>
                <td><?php echo $res["en_name"] ?></td>
            </tr>
            <tr>
                <td>
                    Course Chinese name
                </td>
                <td><?php echo $res["zh_name"] ?></td>
            </tr>
            <tr>
                <td>
                    Current Average Score
                </td>
                <td>
                    TODO
                </td>
            </tr>
            <tr>
                <td>
                    Maximum Possible Score
                </td>
                <td>
                    TODO
                </td>
            </tr>
            <tr>
                <td>
                    Course Credits
                </td>
                <td><?php echo $res["credit"] ?></td>
            </tr>
            <tr>
                <td>
                    Minimum average score for passable grade
                </td>
                <td><?php echo $res["passing"] ?></td>
            </tr>
            <tr>
                <td>
                    Semester
                </td>
                <td><?php echo $res["semester"] ?></td>
            </tr>
        </tbody>
    </table>
</div>
<div class="content-block">
    <h2>Test Results</h2><?php
                         if (!$res["archived"]){
                             printf("<div class=\"control-block\">
<a href=\"/new_test.php?cid=%d\">Add new test result</a></div>", $_GET['id']);
                         }
                         ?>
</div>
<div class="content-block">
    <table>
        <thead>
            <tr>
                <th>Test Title</th>
                <th>Score</th>
                <th>Weight</th>
                <th>Note</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="score-name">
                    Quiz1
                </td>
                <td class="score-point">
                    90
                </td>
                <td class="score-weight">
                    100
                </td>
                <td class="score-note">
                    None
                </td>
            </tr>
            <tr>
                <td class="score-name">
                    Quiz2
                </td>
                <td class="score-point">
                    90
                </td>
                <td class="score-weight">
                    100
                </td>
                <td class="score-note">
                    None
                </td>
            </tr>
        </tbody>
    </table>
</div>
<?php
require_once "fragment/closer.php";
/*
 * Local Variables:
 * mode: web
 * End:
 * End: */?>
