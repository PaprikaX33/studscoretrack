<?php
$PAGE_TITLE_TAG = "page-archive-title";
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
        </tr>
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
    </tbody>
</table>
<?php
require_once "fragment/closer.php";
/*
 * Local Variables:
 * mode: web
 * End:
 * End: */?>
