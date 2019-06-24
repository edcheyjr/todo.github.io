<?php


if(isset($_GET['id']))
{
    $id= $_GET['id'];

    require "connect.php";
    $sql="insert into history select * from tasks where task_id=$id";
    mysqli_query($connect,$sql) or die(mysqli_error($connect));
// update
    $sql1="update history set status =DEFAULT WHERE task_id=$id";
    mysqli_query($connect,$sql1) or die(mysqli_error($connect));

    $sql2="delete from history where status='incomplete'";
    mysqli_query($connect,$sql1) or die(mysqli_error($connect));
    //delete
require "delete.php";
}
if(isset($_GET['date'])){

    $date =$_GET['date'];

    require 'connect.php';
    $sql2="SELECT date FROM tasks WHERE task_id=$id";
    $task_date= mysqli_query($connect,$sql2) or die(mysqli_error($connect));
    $current_date = date('Y-m-d H:i:s');
    while ($current_date  >= $date){
        require 'connect.php';
        $status='expired';
        $sql3="update tasks set 'status'=$status where task_id = $id";
        mysqli_query($connect,$sql3) or die(mysqli_error($connect));
    }
}
header("location:report.php");