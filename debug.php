<?php
$PAGE_TITLE_TAG = "page-debug";
require_once "fragment/header.php";
require_once "include/json.php";
var_dump(load_json("config/dbconfig.json"));
?>
<div class="content-block">
    <form id="genDB" method="POST" action="/debug_back.php">
        <input name="act" type="hidden" value="gen" />
    </form>
    <form id="delDB" method="POST" action="/debug_back.php">
        <input name="act" type="hidden" value="del" />
    </form>
    <table class="key-val-table">
        <tbody>
            <tr>
                <td>
                    <input form="genDB" type="submit" value="Create DB"/>
                </td>
                <td>
                    <input form="delDB" type="submit" value="Delete DB"/>
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
