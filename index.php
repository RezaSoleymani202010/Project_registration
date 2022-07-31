<?php 
require "_load.php";


if($_SESSION['user_id']){
    redirect("panel.php");
}
else
    redirect("login.php");


?>
