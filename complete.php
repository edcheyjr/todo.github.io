<?php
if(isset($_GET['id']))
{
    $id= $_GET['id'];
    //delete
    require 'connect.php';
    $sql="DELETE FROM tasks WHERE task_id = $id";
    mysqli_query($connect,$sql) or die(mysqli_error($connect));

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
header("location:task.php");
