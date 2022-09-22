<?php
session_start();
if(empty($_SESSION['user_id'])){
   header('location: login_form.php');    
} else {
   echo 'Secure page!.';
   echo '<a href="/logout.php">logout';
}
?>