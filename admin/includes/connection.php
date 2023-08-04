<?php 
 if(!isset($_SESSION)) 
 { 
     session_start(); 
 }
$connection = mysqli_connect('localhost', 'root', '', 'payroll');

if(!$connection) {
    echo "Connection to DB Failed.";
}
?>