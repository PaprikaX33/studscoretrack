<?php
function load_json($filepath)
{
    return json_decode(file_get_contents($filepath), true);
}
/*
 * Local Variables:
 * mode: web
 * End:
 * End: */
?>
