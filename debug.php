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
    <form id="custa" method="POST" action="/debug.php">
        <input name="act" type="hidden" value="custa" />
    </form>
    <form id="popu" method="POST" action="/debug.php">
        <input name="act" type="hidden" value="popu" />
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
            <tr>
                <td>
                    <input form="custa" type="submit" value="custom"/>
                </td>
                <td>
                    <input form="popu" type="submit" value="populate"/>
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
                        $generatorQ = "
CREATE TABLE course (
id INT NOT NULL AUTO_INCREMENT,
en_name VARCHAR(50),
zh_name VARCHAR(50),
semester INT NOT NULL,
credit INT NOT NULL DEFAULT 3,
passing INT NOT NULL DEFAULT 60,
archived BOOL NOT NULL DEFAULT FALSE,
PRIMARY KEY (id)
);
CREATE TABLE test (
id INT NOT NULL AUTO_INCREMENT,
courseID INT NOT NULL,
name VARCHAR(50),
score INT NOT NULL,
weight INT NOT NULL,
PRIMARY KEY (id),
FOREIGN KEY (courseID) REFERENCES course(id)
);";
                        $sqlcon->multi_query($generatorQ);
                        $iter = 0;
                        do{
                            echo (string)$iter++ . " ";
                            if($result = $sqlcon->store_result()){

                            }
                        }while($sqlcon->next_result());
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
                    case "custa":
                        $generatorQ = "
CREATE TABLE foo (
id INT NOT NULL AUTO_INCREMENT,
PRIMARY KEY (id)
);
CREATE TABLE bar (
id INT NOT NULL AUTO_INCREMENT,
fooid INT NOT NULL,
PRIMARY KEY (id),
FOREIGN KEY (fooid) REFERENCES foo(id)
);";
                        $sqlcon->multi_query($generatorQ);
                        do{
                            $result = $sqlcon->store_result();
                        }while($sqlcon->next_result());
                        break;
                    case "custb":
                        $res = $sqlcon->query("SELECT CAST(SUM(score * weight) AS DECIMAL) / "
                                             ."CAST(SUM(weight) AS DECIMAL) AS avgs, "
                                             ."SUM(weight) as weight"
                                             ."FROM test WHERE courseID=3");
                        while($row = $res->fetch_assoc()){
                            var_dump($row);
                        }
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
