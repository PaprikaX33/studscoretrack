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
                    .$lang_name." AS name FROM course WHERE archived=FALSE";
            $res = $sqlcon->query($query);
            while ($row = $res->fetch_assoc()) {
                printf("<tr onclick=\"window.location='/course.php?id=%d';\">
                <td class=\"course-name\">
                    %s
                </td>
                <td class=\"course-score\">
                    90
                </td>
                <td class=\"course-max\">
                    100
                </td>
                <td class=\"course-pass\">
                    Passable
                </td>
            </tr>", $row["id"], ($row["name"] == '' ? "--" : $row["name"]));
                //printf("%s (%s)\n", $row["Name"], $row["CountryCode"]);
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
