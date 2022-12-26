<?php
if($_SERVER['REQUEST_METHOD'] != 'GET' || !isset($_GET['id']) || $_GET['id'] == ''){
    header('Location: /course_list.php');
    die();
}
$PAGE_TITLE_TAG = "page-course-data-title";
require_once "include/db_con.php";
require_once "fragment/header.php";
$sqlcon = db_init();
$maxcourse = $sqlcon->query("SELECT MAX(id) FROM course;")->fetch_row()[0];
if($_GET["id"] > $maxcourse){
    header('Location: /course_list.php');
    die();
}
$query = "SELECT en_name, zh_name, credit, semester, passing, archived,
(SELECT SUM(score * weight) FROM test WHERE courseID=course.id) as score,
(SELECT SUM(weight) FROM test WHERE courseID=course.id) as weight
 FROM course WHERE id=".(string)$_GET["id"];
$res = $sqlcon->query($query)->fetch_assoc();
?>
<div class="content-block">
    <table class="key-val-table">
        <tbody>
            <tr><?php
                echo "<td>" . $LANG["cour-en-name"] . "</td>";
                echo "<td>" . $res["en_name"] . "</td>";
                ?></tr>
            <tr><?php
                echo "<td>" . $LANG["cour-zh-name"] . "</td>";
                echo "<td>" . $res["zh_name"] . "</td>";
                ?></tr>
            <tr><?php
                echo "<td>" . $LANG["cour-avg-sc"] . "</td><td>";
                if($res["weight"] == 0){
                    echo 0;
                }
                else {
                    echo (float)$res["score"] / (float)$res["weight"];
                }
                echo "</td>"
                ?></tr>
            <tr>
                <?php
                echo "<td>";
                if(!$res["archived"]){
                    echo $LANG["cour-max-sc"];
                }
                else {
                    echo $LANG["cour-cr-sc"];
                }
                echo "</td>";
                echo "<td>";
                if(!$res["archived"]){
                    if($res["weight"] >= 100){
                        echo $maxc = 0;
                    }
                    else {
                        echo ($res["score"] + (100.0 * (float)(100 - $res["weight"]))) / 100.0;
                    }
                }
                else {
                    echo (float)$res["score"] / 100.0;
                }
                echo "</td>";
                ?>
            </tr>
            <tr><?php
                echo "<td>" . $LANG["cour-cred"] . "</td>";
                echo "<td>" . $res["credit"] . "</td>";
                ?></tr>
            <tr><?php
                echo "<td>" . $LANG["cour-pass"] . "</td>";
                echo "<td>" . $res["passing"] . "</td>";
                ?></tr>
            <tr><?php
                echo "<td>" . $LANG["cour-sem"] . "</td>";
                echo "<td>" . $res["semester"] . "</td>";
                ?></tr>
        </tbody>
    </table>
</div>
<div class="content-block">
    <?php
    echo "<h2>" . $LANG["cour-test-res"] . "</h2>";
    if(!$res["archived"]){
        printf("<div class=\"control-block\">"
              ."<a href=\"/new_test.php?cid=%d\">%s</a>"
              ."</div>", $_GET['id'], $LANG["cour-new-test"]);
    }
    ?>
</div>
<div class="content-block">
    <table>
        <thead>
            <tr>
                <th><?php echo $LANG["cour-res-tit"]; ?></th>
                <th><?php echo $LANG["cour-res-scr"]; ?></th>
                <th><?php echo $LANG["cour-res-wgh"]; ?></th>
            </tr>
        </thead>
        <tbody>
            <?php
            $testquery = "SELECT id, name, score, weight "
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
