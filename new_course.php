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
                        <label for="cename">
                            Course English Name
                        </label>
                    </td>
                    <td>
                        <input id="cename" name="ename" type="text" />
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="ccname">
                            Course Chinese name
                        </label>
                    </td>
                    <td>
                        <input id="ccname" name="cname" type="text" />
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="cred">
                            Course Credits
                        </label>
                    </td>
                    <td>
                        <input id="cred" name="credit" type="text" inputmode="numeric" pattern="\d*" required />
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="count">
                            Number of test
                        </label>
                    </td>
                    <td>
                        <input id="count" name="test" type="text" inputmode="numeric" pattern="\d*" />
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="cgr">
                            Passing grade
                        </label>
                    </td>
                    <td>
                        <input id="cgr" name="grade" type="text" inputmode="numeric" pattern="\d*" />
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <input type="submit" value="Add New Course" />
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
