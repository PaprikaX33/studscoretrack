<?php
function create_db_if_not_exists(mysqli $sqlcon){
    $generatorQ = "
CREATE TABLE IF NOT EXISTS course (
id INT NOT NULL AUTO_INCREMENT,
en_name VARCHAR(50),
zh_name VARCHAR(50),
semester INT NOT NULL,
credit INT NOT NULL DEFAULT 3,
passing INT NOT NULL DEFAULT 60,
archived BOOL NOT NULL DEFAULT FALSE,
PRIMARY KEY (id)
);

CREATE TABLE IF NOT EXISTS test (
id INT NOT NULL AUTO_INCREMENT,
courseID INT NOT NULL,
name VARCHAR(50),
score INT NOT NULL,
weight INT NOT NULL,
PRIMARY KEY (id),
FOREIGN KEY (courseID) REFERENCES course(id)
);";
    $retval = [];
    $sqlcon->multi_query($generatorQ);
    do{
        $loopin = [];
        if ($result = $sqlcon->store_result()) {
            while ($row = $result->fetch_row()) {
                $loopin[] = $row;
            }
            $retval[] = $loopin;
        }
    }while($sqlcon->next_result());
    return $retval;
}
/*
 * Local Variables:
 * mode: web
 * End:
 * End: */
?>
