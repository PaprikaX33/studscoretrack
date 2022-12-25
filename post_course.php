<?php
require_once "include/json.php";
require_once "include/db_con.php";
if($_SERVER['REQUEST_METHOD'] != 'POST'){
    header('Location: /course_list.php');
    die();
}
$sqlcon = db_init();
/* Find the largest value of the archived */
$last_sem = $sqlcon->query("SELECT MAX(semester) FROM course WHERE archived=TRUE;")->fetch_row()[0];
$last_sem ??= 0;

$query = "INSERT INTO course(en_name, zh_name, semester, credits, numoftest, passing)
VALUES (?, ?, ?, ?, ?, ?);";
$stmt = $sqlcon->prepare($query);
$ename = $_POST["ename"];
$cname = $_POST["cname"];
$credit = $_POST["credit"];
$test = $_POST["test"];
$grade = $_POST["grade"];

$stmt->bind_param("ssiiii", ...[$ename, $cname, $last_sem + 1, $credit, $test, $grade]);
$stmt->execute();
$sqlcon->close();
header('Location: /course_list.php');
/*
 * Local Variables:
 * mode: web
 * End:
 * End: */?>
