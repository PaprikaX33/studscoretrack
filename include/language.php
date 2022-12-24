<?php
function define_language($available)
{
    if(isset($_GET['lang']) && $_GET['lang'] != ''){
        // A language change with get parameter is requested
        if(in_array($_GET['lang'], $available_langs))
        {
            $_SESSION['lang'] = $_GET['lang']; // Overwrite the session with supplied param 
        }
    }
    // No language specification supplied by the get parameter
    if(!isset($_SESSION['lang']) || $_SESSION['lang']==''){
        $_SESSION['lang'] = 'en';
    }
    return $_SESSION['lang'];
}
function config_language()
{
    $lang_tag = define_language(['en','zh']);
    require_once "language/lang_" . $lang_tag . ".php";
    return $language;
}
/*
 * Local Variables:
 * mode: web
 * End:
 * End: */
?>
