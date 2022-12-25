<?php
if($_SERVER['REQUEST_METHOD'] != 'POST'){
    echo "ERR METHOD";
    die();
}
$gen = true;
switch($_POST[act]){
    case "gen":
        $gen = true;
        break;
    case "del":
        $gen = false;
        break;
    default: die();
}
require_once "include/json.php";
header('Location: /course_list.php');
die();
/*
 * Local Variables:
 * mode: web
 * End:
 * End: */?>
