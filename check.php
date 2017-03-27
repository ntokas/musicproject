<?php
$content = file_get_contents("http://localhost/mystore/music/search.php?q=".$_GET['q']."&type_id=".$_GET['type_id']);
echo $content;
?>