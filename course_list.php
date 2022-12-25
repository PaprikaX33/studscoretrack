<?php
$PAGE_TITLE_TAG = "page-course-title";
require_once "fragment/header.php";
?>
<div class="content-block">
    <div class="control-block">
        <div>
            Add new course
        </div>
        <div class="flex-pad">
        </div>
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
</div>
<?php
require_once "fragment/closer.php";
/*
 * Local Variables:
 * mode: web
 * End:
 * End: */?>
