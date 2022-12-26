<?php
$PAGE_TITLE_TAG = "page-archive-title";
require_once "include/db_con.php";
require_once "fragment/header.php";
?>
<table>
    <thead>
        <tr>
            <th>Course Title</th>
            <th>Score</th>
            <th>Credit</th>
            <th>Semester</th>
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
                .$lang_name." AS name, credit, semester FROM course WHERE archived=TRUE";
        $res = $sqlcon->query($query);
        while ($row = $res->fetch_assoc()) {
            printf("<tr onclick=\"window.location='/course.php?id=%d';\">
                <td class=\"course-name\">
                    %s
                </td>
                <td class=\"course-score\">
                    90
                </td>
                <td class=\"course-credit\">
                    %d
                </td>
                <td class=\"course-semester\">
                    %d
                </td>
            </tr>", $row["id"], $row["name"], $row["credit"], $row["semester"]);
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
