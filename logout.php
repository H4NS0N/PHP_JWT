<?php
//Nulstiltiden med -3600 timer og cookien udløber og dermed logges ud og sendes tilbage til index.php
setcookie("token", "", time() - 3600,  "/", "", true, true);
header('location:index.php');
?>