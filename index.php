<?php
require_once "include/db_con.php";
require_once "include/db_generate.php";
$sqlcon = db_init();
create_db_if_not_exists($sqlcon);
$sqlcon->close();

http_response_code(301);
header('Location: /course_list.php');
die();
/*
 * Local Variables:
 * mode: web
 * End:
 * End: */
?>
