<?php
require_once "include/db_con.php";
if($_SERVER['REQUEST_METHOD'] != 'POST'){
    header('Location: /course_list.php');
    die();
}
$sqlcon = db_init();
if($_POST["courseid"] == '' || $_POST["weight"] == '' || $_POST["score"] == ''){
    header('Location: /course_list.php');
    die();
}
$cid = $_POST["courseid"];
$name = $_POST["name"] == '' ? NULL : $_POST["name"];
$weight = $_POST["weight"];
$score = $_POST["score"];
$maxcourse = $sqlcon->query("SELECT MAX(id) FROM course;")->fetch_row()[0];
if($cid > $maxcourse){
    header('Location: /course_list.php');
}
$query = "INSERT INTO test(courseID, name, score, weight)
VALUES (?, ?, ?, ?);";
$stmt = $sqlcon->prepare($query);

$stmt->bind_param("isii", ...[$cid, $name, $score, $weight]);
$stmt->execute();
$sqlcon->close();
header('Location: /course.php?id='.(string)$cid);
die();
/*
 * Local Variables:
 * mode: web
 * End:
 * End: */?>
