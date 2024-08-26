<?php
include 'conn.php';

$id = $_GET['id'];

// var_dump($_GET);
// die();


$sql2 = "DELETE FROM book WHERE s_id = '$id' ";
$result1 = mysqli_query($conn, $sql2);




$sql = "DELETE FROM student_details WHERE id = '$id' ";
$result2 = mysqli_query($conn, $sql);




header('location:index.php');
