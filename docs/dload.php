<?php
$url=$_REQUEST['url'];
ob_end_clean();
 
$file = __DIR__ . '/'.$url;
 
header('Content-Description: File Transfer');
header('Content-Type: application/octet-stream');
header('Content-Disposition: attachment; filename=' . $_REQUEST['url']);
header('Content-Transfer-Encoding: binary');
header('Content-Length: ' . filesize($file));
 
readfile($file);

@unlink($file);

exit();



?>