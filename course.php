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
                             printf("<div class=\"control-block\">"
                                   ."<a href=\"/new_test.php?cid=%d\">Add new test result</a>"
                                   ."</div>", $_GET['id']);
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
            </tr>
        </thead>
        <tbody>
            <?php
            $testquery = "SELECT testID AS id, name, score, weight "
                        ."FROM test WHERE courseID=".(string)$_GET['id'];
            $testres = $sqlcon->query($testquery);
            while($trow = $testres->fetch_assoc()){
                printf("<tr>
                <td class=\"test-name\">%s</td>
                <td class=\"test-score\">%d</td>
                <td class=\"test-weight\">%d</td>
                </tr>", $trow["name"], $trow["score"], $trow["weight"]);
            }
            $sqlcon->close();
            ?>
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
