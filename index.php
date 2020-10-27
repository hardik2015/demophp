<?php
$streamurl=str_replace('index.php','https://iptvurl.herokuapp.com/adult/index.php',$streamurl);

header ("Location: $streamurl");

?>