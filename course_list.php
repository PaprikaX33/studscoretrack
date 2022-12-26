<?php
$PAGE_TITLE_TAG = "page-course-title";
require_once "include/db_con.php";
require_once "fragment/header.php";
$sqlcon = db_init();
$lang_name = "en_name";
if($LANG["id"] == "zh"){
    $lang_name = "zh_name";
}
$query = "SELECT id, "
        .$lang_name." AS name, passing,
(SELECT SUM(score * weight) FROM test WHERE courseID=course.id) as score,
(SELECT SUM(weight) FROM test WHERE courseID=course.id) as weight
 FROM course WHERE archived=FALSE ORDER BY semester DESC";
$res = $sqlcon->query($query);
?>

<div class="content-block">
    <div class="control-block">
        <div>
            <a href="/new_course.php"><?php echo $LANG["list-new"];  ?></a>
        </div>
        <div class="flex-pad"></div>
        <div>
            <?php echo $LANG["list-current-sem"]
                     . " : "
                     . $sqlcon->query("SELECT MAX(semester) FROM course WHERE archived=TRUE;")
                              ->fetch_row()[0]; ?>
        </div>
        <div class="flex-pad"></div>
        <div><?php
             if($res->num_rows > 0){
                 echo "<a href=\"/semester_archive.php\">" . $LANG["list-arch"] . "</a>";
             }
             else{
                 echo " ";
             }
             ?>
        </div>
    </div>
</div>
<div class="content-block">
    <table>
        <thead>
            <tr>
                <th><?php echo $LANG["list-header-title"]; ?></th>
                <th><?php echo $LANG["list-header-avg"]; ?></th>
                <th><?php echo $LANG["list-header-max"]; ?></th>
                <th><?php echo $LANG["list-header-pass"]; ?></th>
            </tr>
        </thead>
        <tbody>
            <?php
            while($row = $res->fetch_assoc()){
                if($row["weight"] == 0){
                    $avg = 0;
                }
                else {
                    $avg = (float)$row["score"] / (float)$row["weight"];
                }
                if($row["weight"] >= 100){
                    $maxc = 0;
                    $passability = $avg >= $row["passing"];
                }
                else {
                    $maxc = ($row["score"] + (100.0 * (float)(100 - $row["weight"]))) / 100.0;
                    $passability = $maxc >= $row["passing"];
                }
                printf("<tr onclick=\"window.location='/course.php?id=%d';\">
                <td class=\"course-name\">
                    %s
                </td>
                <td class=\"course-score\">
                    %d
                </td>
                <td class=\"course-max\">
                    %d
                </td>
                <td class=\"course-pass\">
                    %s
                </td>
            </tr>", $row["id"], ($row["name"] == '' ? "--" : $row["name"])
                     , $avg, $maxc
                     , ($passability ? $LANG["list-pass-pos"] : $LANG["list-pass-neg"]));
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
