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
                        <label for="cename"><?php echo $LANG["nc-en-name"]; ?></label>
                    </td>
                    <td>
                        <input id="cename" name="ename" type="text" />
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="ccname"><?php echo $LANG["nc-zh-name"]; ?></label>
                    </td>
                    <td>
                        <input id="ccname" name="cname" type="text" />
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="cred"><?php echo $LANG["nc-cred"]; ?></label>
                    </td>
                    <td>
                        <input id="cred" name="credit" type="text"
                               inputmode="numeric" pattern="\d*"
                               value="3" required />
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="cgr"><?php echo $LANG["nc-passing"]; ?></label>
                    </td>
                    <td>
                        <input id="cgr" name="grade" type="text"
                               inputmode="numeric" pattern="\d*" />
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <input type="submit" value="<?php echo $LANG["nc-but-submit"]; ?>" />
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
