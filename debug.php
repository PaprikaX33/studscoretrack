<?php
$PAGE_TITLE_TAG = "page-debug";
require_once "fragment/header.php";
require_once "include/json.php";
require_once "include/db_generate.php";
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
                        var_dump(create_db_if_not_exists($sqlcon));
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
                        echo $sqlcon->query("SELECT MAX(id) AS id FROM course;")
                                    ->fetch_assoc()['id'];
                        break;
                    case "popu":
                        $inserterQ = "
INSERT INTO `course` (`id`, `en_name`, `zh_name`, `semester`, `credit`, `passing`, `archived`)
 VALUES(1, 'sakura', '???', 1, 3, 60, 1);
INSERT INTO `course` (`id`, `en_name`, `zh_name`, `semester`, `credit`, `passing`, `archived`)
 VALUES(2, 'kuro', '???', 1, 3, 40, 1);
INSERT INTO `course` (`id`, `en_name`, `zh_name`, `semester`, `credit`, `passing`, `archived`)
 VALUES(3, 'tokyo', '??????', 2, 3, 60, 0);

INSERT INTO `test` (`id`, `courseID`, `name`, `score`, `weight`) VALUES(1, 1, 'Q1', 10, 30);
INSERT INTO `test` (`id`, `courseID`, `name`, `score`, `weight`) VALUES(2, 1, 'Q2', 100, 30);
INSERT INTO `test` (`id`, `courseID`, `name`, `score`, `weight`) VALUES(3, 1, 'Q3', 80, 40);
INSERT INTO `test` (`id`, `courseID`, `name`, `score`, `weight`) VALUES(4, 2, 'Q1', 50, 25);
INSERT INTO `test` (`id`, `courseID`, `name`, `score`, `weight`) VALUES(5, 2, 'Q2', 75, 25);
INSERT INTO `test` (`id`, `courseID`, `name`, `score`, `weight`) VALUES(6, 2, 'Q3', 30, 25);
INSERT INTO `test` (`id`, `courseID`, `name`, `score`, `weight`) VALUES(7, 3, 'Q1', 60, 10);
INSERT INTO `test` (`id`, `courseID`, `name`, `score`, `weight`) VALUES(8, 3, 'Q2', 70, 20);
INSERT INTO `test` (`id`, `courseID`, `name`, `score`, `weight`) VALUES(9, 3, 'Q3', 85, 20);
INSERT INTO `test` (`id`, `courseID`, `name`, `score`, `weight`) VALUES(10, 3, 'Q4', 50, 20);";
                        $sqlcon->multi_query($inserterQ);
                        $iter = 0;
                        do{
                            echo (string)$iter++ . " ";
                            //$sqlcon->store_result();
                        }while($sqlcon->next_result());
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
