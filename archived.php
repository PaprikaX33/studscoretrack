<?php
$PAGE_TITLE_TAG = "page-archive-title";
require_once "include/db_con.php";
require_once "fragment/header.php";
?>
<table>
    <thead>
        <tr>
            <th><?php echo $LANG["arch-header-title"]; ?></th>
            <th><?php echo $LANG["arch-header-score"]; ?></th>
            <th><?php echo $LANG["arch-header-cred"]; ?></th>
            <th><?php echo $LANG["arch-header-sem"]; ?></th>
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
        $query = "SELECT id, "
                .$lang_name." AS name, credit, semester,
(SELECT SUM(score * weight) FROM test WHERE courseID=course.id) as score,
(SELECT SUM(weight) FROM test WHERE courseID=course.id) as weight
 FROM course WHERE archived=TRUE";
        $res = $sqlcon->query($query);
        while($row = $res->fetch_assoc()){
            if($row["weight"] == 0){
                $avg = 0;
            }
            else {
                $avg = (float)$row["score"] / (float)$row["weight"];
            }
            /* $score = $sqlcon->query("SELECT CASE WHEN SUM(weight)=0 THEN 0 ELSE "
             *                        ."CAST(SUM(score * weight) AS DECIMAL) / "
             *                        ."CAST(SUM(weight) AS DECIMAL) END AS avgs "
             *                        ."FROM test WHERE courseID=".$row["id"])->fetch_assoc(); */
            Printf("<tr onclick=\"window.location='/course.php?id=%d';\">
                <td class=\"course-name\">
                    %s
                </td>
                <td class=\"course-score\">
                    %d
                </td>
                <td class=\"course-credit\">
                    %d
                </td>
                <td class=\"course-semester\">
                    %d
                </td>
            </tr>", $row["id"], $row["name"]
                 , $avg, $row["credit"], $row["semester"]);
        }
        $sqlcon->close();
        ?>
    </tbody>
</table>
<?php
require_once "fragment/closer.php";
/*
 * Local Variables:
 * mode: web
 * End:
 * End: */?>
