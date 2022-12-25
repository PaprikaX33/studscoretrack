<?php
$PAGE_TITLE_TAG = "page-new-test-title";
require_once "fragment/header.php";
?>
<div class="content-block">
    <form id="new-course-form" method="POST" action="/post_course.php">
        <input name="courseid" type="hidden" />
        <table class="key-val-table">
            <tbody>
                <tr>
                    <td>
                        Test Title
                    </td>
                    <td>
                        <input name="name" type="text" />
                    </td>
                </tr>
                <tr>
                    <td>
                        Test Weight
                    </td>
                    <td>
                        <input name="weight" type="text" inputmode="numeric" pattern="\d*" required />
                    </td>
                </tr>
                <tr>
                    <td>
                        Test Score
                    </td>
                    <td>
                        <input name="credit" type="text" inputmode="numeric" pattern="\d*" required />
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <input type="submit" value="Add New Test" />
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
