<?php
require_once "include/session.php";
require_once "include/language.php";
$LANG = new Language();
?>
<!DOCTYPE html>
<html lang=<?php echo "\"" . $LANG["tag"] . "\""?>>
    <head>
        <title>
            <?php echo $LANG->tag?>
        </title>
    </head>
    <body>
        <h1><?php echo $LANG["title"];?></h1>
        <?php
        require_once "include/json.php";
        var_dump(load_json("config/dbconfig.json"));
        ?>
        <h2><?php echo $LANG["new"] ?></h2>
    </body>
    <?php
    /*
     * Local Variables:
     * mode: web
     * End:
     * End: */?>
</html>
