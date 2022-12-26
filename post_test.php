<?php
require_once "include/db_con.php";
if($_SERVER['REQUEST_METHOD'] != 'POST'){
    header('Location: /course_list.php');
    die();
}
$sqlcon = db_init();
$cid = $_POST["courseid"];
$name = $_POST["name"];
$weight = $_POST["weight"];
$score = $_POST["score"] == '' ? 0 : $_POST["score"];
$maxcourse = $sqlcon->query("SELECT MAX(courseID) FROM course;")->fetch_row()[0];
if($cid > $maxcourse){
    header('Location: /course_list.php');
}
$query = "INSERT INTO test(courseID, name, score, weight)
VALUES (?, ?, ?, ?);";
$stmt = $sqlcon->prepare($query);

$stmt->bind_param("isii", ...[$cid, $name, $score, $weight]);
$stmt->execute();
$courseid = $sqlcon->query("SELECT MAX(testID) FROM test;")->fetch_row()[0];
$sqlcon->close();
header('Location: /course.php?id='.(string)$courseid);
die();
/*
 * Local Variables:
 * mode: web
 * End:
 * End: */?>