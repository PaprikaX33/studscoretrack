<!doctype html>
<html>
    <head>
    </head>
    <body>
        <?php
        require_once "include/database.php";
        echo var_dump(load_json("config/dbconfig.json"));
        ?>
    </body>
    <?php
    /*
     * Local Variables:
     * mode: web
     * End:
     * End: */?>
</html>
