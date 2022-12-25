<?php
require_once "include/json.php";
function db_init(){
    $config = load_json("config/dbconfig.json");
    return new mysqli((($config["connection"]["host"] ?? "localhost") . ":"
                     . (strval($config["connection"]["port"]) ?? "3306"))
                    , ($config["account"]["user"] ?? "root")
                    , ($config["account"]["pass"] ?? "")
                    , $config["name"]);}
/*
 * Local Variables:
 * mode: web
 * End:
 * End: */
?>
