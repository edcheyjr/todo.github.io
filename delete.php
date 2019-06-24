<?php
if(isset($_GET['id']))
{
    $id= $_GET['id'];
    //delete
    require 'connect.php';
    $sql="DELETE FROM tasks WHERE task_id = $id";
    mysqli_query($connect,$sql) or die(mysqli_error($connect));
}
header("location:task.php");

