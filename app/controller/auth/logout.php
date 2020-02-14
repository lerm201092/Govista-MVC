<?php  
 include "../../../config/config.php"; 
session_start(); //to ensure you are using same session
session_destroy(); //destroy the session
header("location:".SERVER_FOLDER."apps/login"); //to redirect back to "index.php" after logging out
exit();
?>