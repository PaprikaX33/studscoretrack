<?php
class Language implements ArrayAccess
{
    private $messages = ["tag" => "en"];
    private function define_language(array $available) : string{
        if(isset($_GET['lang']) && $_GET['lang'] != ''){
            // A language change with get parameter is requested
            if(in_array($_GET['lang'], $available_langs))
            {
                $_SESSION['lang'] = $_GET['lang']; // Overwrite the session with supplied param
            }
        }
        // No language specification supplied by the get parameter
        // Revert to default 'en' language
        if(!isset($_SESSION['lang']) || $_SESSION['lang']==''){
            $_SESSION['lang'] = 'en';
        }
        return $_SESSION['lang'];
    }
    public function __construct(?string $language = NULL){
        $lang_tag = $language ?? $this->define_language(['en','zh']);
        $this->messages = require_once "language/lang_" . $lang_tag . ".php";
    }
    public function get(string $requested) : string{
        return $this->messages[$requested] ?? "--??--";
    }

    // Implementing the ArrayAccess interface
    public function offsetExists(mixed $offset): bool{
        return isset($this->messages[$offset]);
    }
    public function offsetGet(mixed $offset): mixed{
        return $this->get($offset);
    }
    public function offsetSet(mixed $offset, mixed $value): void{
    }
    public function offsetUnset(mixed $offset): void{
        unset($this->messages[$offset]);
    }
}
/*
 * Local Variables:
 * mode: web
 * End:
 * End: */
?>
