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

$query = "INSERT INTO course(en_name, zh_name, semester, credit, passing)
VALUES (?, ?, ?, ?, ?);";
$stmt = $sqlcon->prepare($query);
$ename = $_POST["ename"] == '' ? NULL : $_POST["ename"];
$cname = $_POST["cname"] == '' ? NULL : $_POST["cname"];
$credit = $_POST["credit"];
$grade = $_POST["grade"]  == '' ? 60 : $_POST["grade"];

$stmt->bind_param("ssiii", ...[$ename, $cname, $last_sem + 1, $credit, $grade]);
$stmt->execute();
$courseid = $sqlcon->query("SELECT MAX(id) FROM course;")->fetch_assoc()['id'];
$sqlcon->close();
header('Location: /course.php?id='.(string)$courseid);
die();
/*
 * Local Variables:
 * mode: web
 * End:
 * End: */?>
