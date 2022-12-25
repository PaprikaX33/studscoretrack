<?php
$PAGE_TITLE_TAG = "page-new-course-title";
require_once "fragment/header.php";
?>
<div class="content-block">
    <form id="new-course-form" method="POST" action="/post_course.php">
        <table class="key-val-table">
            <tbody>
                <tr>
                    <td>
                        Course English Name
                    </td>
                    <td>
                        <input name="ename" type="text" />
                    </td>
                </tr>
                <tr>
                    <td>
                        Course Chinese name
                    </td>
                    <td>
                        <input name="cname" type="text" />
                    </td>
                </tr>
                <tr>
                    <td>
                        Course Credits
                    </td>
                    <td>
                        <input name="credit" type="text" inputmode="numeric" pattern="\d*" required />
                    </td>
                </tr>
                <tr>
                    <td>
                        Number of test
                    </td>
                    <td>
                        <input name="test" type="text" inputmode="numeric" pattern="\d*" />
                    </td>
                </tr>
                <tr>
                    <td>
                        Passing grade
                    </td>
                    <td>
                        <input name="grade" type="text" inputmode="numeric" pattern="\d*" />
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="submit" value="Create New Course" />
                    </td>
                    <td></td>
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
