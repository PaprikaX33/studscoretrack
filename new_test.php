<?php
if($_SERVER['REQUEST_METHOD'] != 'GET' || !isset($_GET['cid']) || $_GET['cid'] == ''){
    header('Location: /course_list.php');
    die();
}
$PAGE_TITLE_TAG = "page-new-test-title";
require_once "include/db_con.php";
$cid = $_GET["cid"];
$sqlcon = db_init();
$maxcourse = $sqlcon->query("SELECT MAX(id) FROM course;")->fetch_row()[0];
if($cid > $maxcourse){
    header('Location: /course_list.php');
    die();
}
$sqlcon->close();
require_once "fragment/header.php";
?>
<div class="content-block">
    <form id="new-course-form" method="POST" action="/post_test.php">
        <input name="courseid" type="hidden" value="<?php echo $cid; ?>" />
        <table class="key-val-table">
            <tbody>
                <tr>
                    <td>
                        <label for="tname"><?php echo $LANG["nt-title"]; ?></label>
                    </td>
                    <td>
                        <input id="tname" name="name" type="text" />
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="twg"><?php echo $LANG["nt-weigh"]; ?></label>
                    </td>
                    <td>
                        <input id="twg" name="weight" type="text" inputmode="numeric" pattern="\d*" required />
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="ts"><?php echo $LANG["nt-score"]; ?></label>
                    </td>
                    <td>
                        <input id="ts" name="score" type="text" inputmode="numeric" pattern="\d*" required />
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <input type="submit" value="<?php echo $LANG["nt-but-submit"]; ?>" />
                    </td>
                </tr>
            </tbody>
        </table>
    </form>
</div>
<?php
require_once "fragment/closer.php";
/*
 * Local Variables:
 * mode: web
 * End:
 * End: */?>
