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

                </td>
                <td>

                </td>
            </tr>
        </tbody>
    </table>
</div>
<div class="content-block">
    <h2> Output </div>
        <?php
        if($_SERVER['REQUEST_METHOD'] != 'POST'){
            echo "ERR METHOD";
            goto endtag;
        }
        require_once "include/json.php";
        $config = load_json("config/dbconfig.json");
        $sqlcon = new mysqli((($config["connection"]["host"] ?? "localhost") . ":"
                            . (strval($config["connection"]["port"]) ?? "3306"))
                           , ($config["account"]["user"] ?? "root")
                           , ($config["account"]["pass"] ?? "")
                           , $config["name"]);
        try{
            switch($_POST["act"]){
                case "gen":
                    echo $sqlcon->query("CREATE TABLE course (
courseID INT NOT NULL,
en_name VARCHAR(50),
zh_name VARCHAR(50),
semester INT NOT NULL,
credits INT DEFAULT 3,
passing INT DEFAULT 60,
archived BOOL NOT NULL DEFAULT FALSE,
PRIMARY KEY (courseID)
);");
                    echo $sqlcon->query("CREATE TABLE score (
scoreID INT NOT NULL,
courseID INT NOT NULL,
name VARCHAR(50),
score INT NOT NULL,
weight INT NOT NULL,
PRIMARY KEY (scoreID),
FOREIGN KEY (courseID) REFERENCES course(courseID)
);");
                    break;
                case "del":
                    echo $sqlcon->query("DROP TABLE IF EXISTS score, course;");
                    break;
                default: break;
            }
        }
        catch(mysqli_sql_exception $e){
            echo $e;
        }

        $sqlcon->close();
        endtag:?>
</div>
<?php
require_once "fragment/closer.php";
/*
 * Local Variables:
 * mode: web
 * End:
 * End: */?>
