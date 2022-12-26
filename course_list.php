<?php
$PAGE_TITLE_TAG = "page-course-title";
require_once "include/db_con.php";
require_once "fragment/header.php";
?>
<div class="content-block">
    <div class="control-block">
        <div>
            <a href="/new_course.php">Add new course</a>
        </div>
        <div class="flex-pad"></div>
        <div>
            Archive this semester
        </div>
    </div>
</div>
<div class="content-block">
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
            <?php
            $sqlcon = db_init();
            $lang_name = "en_name";
            switch($LANG["id"]){
                case "zh":
                    $lang_name = "zh_name";
                    break;
                default: break;
            }
            $query = "SELECT courseID AS id, "
                    .$lang_name." AS name, passing "
                    ."FROM course WHERE archived=FALSE ORDER BY semester DESC";
            $res = $sqlcon->query($query);
            while($row = $res->fetch_assoc()){
                $score = $sqlcon->query("SELECT CAST(SUM(score * weight) AS DECIMAL) / "
                                       ."CAST(SUM(weight) AS DECIMAL) AS avgs, "
                                       ."SUM(weight) AS weight, SUM(score * weight) AS score "
                                       ."FROM test WHERE courseID=".$row["id"])->fetch_assoc();
                if($score["weight"] > 100){
                    /* Special Computation */
                    $max = 0;
                    $passability = $score["avgs"] >= $row["passing"];
                }
                else {
                    $max = ($score["score"] + 100.0 * (100 - $score["weight"])) / 100;
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
            </tr>", $row["id"], ($row["name"] == '' ? "--" : $row["name"]), $score["avgs"], $max,
                ($passability ? "Passable" : "Not-Passable"));
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
