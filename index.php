<?php
require_once "include/session.php";
require_once "include/language.php";
$LANG = config_language();
?>
<!DOCTYPE html>
<html lang=<?php echo "\"" . $LANG["tag"] . "\""?>>
    <head>
    </head>
    <body>
        <h1><?php echo $LANG["title"];?></h1>
        <?php
        require_once "include/json.php";
        var_dump(load_json("config/dbconfig.json"));
        ?>
    </body>
    <?php
    /*
     * Local Variables:
     * mode: web
     * End:
     * End: */?>
</html>
