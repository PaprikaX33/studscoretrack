<?php
$PAGE_TITLE_TAG = "page-debug";
require_once "fragment/header.php";
require_once "include/json.php";
echo "<pre>";
var_dump(load_json("config/dbconfig.json"));
echo "</pre>";
?>
<div class="content-block">
    <form id="genDB" method="POST" action="/debug.php">
        <input name="act" type="hidden" value="gen" />
    </form>
    <form id="delDB" method="POST" action="/debug.php">
        <input name="act" type="hidden" value="del" />
    </form>
    <form id="selc" method="POST" action="/debug.php">
        <input name="act" type="hidden" value="selc" />
    </form>
    <form id="selt" method="POST" action="/debug.php">
        <input name="act" type="hidden" value="selt" />
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
            <tr>
                <td>
                    <input form="selc" type="submit" value="select course"/>
                </td>
                <td>
                    <input form="selt" type="submit" value="select test"/>
                </td>
            </tr>
        </tbody>
    </table>
</div>
<div class="content-block">
    <h2> Output </div>
        <pre>
            <?php
            if($_SERVER['REQUEST_METHOD'] != 'POST'){
                echo "ERR METHOD";
                goto endtag;
            }
            require_once "include/db_con.php";
            $sqlcon = db_init();
            try{
                switch($_POST["act"]){
                    case "gen":
                        echo $sqlcon->query("CREATE TABLE course (
courseID INT NOT NULL AUTO_INCREMENT,
en_name VARCHAR(50),
zh_name VARCHAR(50),
semester INT NOT NULL,
numoftest INT NOT NULL DEFAULT 2,
credits INT NOT NULL DEFAULT 3,
passing INT NOT NULL DEFAULT 60,
archived BOOL NOT NULL DEFAULT FALSE,
PRIMARY KEY (courseID)
);");
                        echo $sqlcon->query("CREATE TABLE test (
scoreID INT NOT NULL AUTO_INCREMENT,
courseID INT NOT NULL,
name VARCHAR(50),
score INT NOT NULL,
weight INT NOT NULL,
PRIMARY KEY (scoreID),
FOREIGN KEY (courseID) REFERENCES course(courseID)
);");
                        break;
                    case "del":
                        echo $sqlcon->query("DROP TABLE IF EXISTS test, course;");
                        break;
                    case "selt":
                        var_dump($sqlcon->query("SELECT * FROM test;")->fetch_all());
                        break;
                    case "selc":
                        var_dump($sqlcon->query("SELECT * FROM course;")->fetch_all());
                        break;
                    default: break;
                }
            }
            catch(mysqli_sql_exception $e){
                echo $e;
            }

            $sqlcon->close();
            endtag:?>
        </pre>
</div>
<div class="content-block">
    <?php
    phpinfo(INFO_GENERAL);
    ?>
</div>
    <?php
    require_once "fragment/closer.php";
    /*
     * Local Variables:
     * mode: web
     * End:
     * End: */?>
