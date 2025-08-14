<?php
session_start();
session_destroy();
header("Location: nextpage.php");
exit;
?>
