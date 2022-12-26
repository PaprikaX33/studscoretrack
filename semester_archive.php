<?php
require_once "include/db_con.php";
$sqlcon = db_init();
$query="UPDATE course SET archived = TRUE WHERE archived = FALSE;";
$sqlcon->query($query);
$sqlcon->close();
header('Location: /course_list.php');
die();
/*
 * Local Variables:
 * mode: web
 * End:
 * End: */?>
