<?php
if(isset($_GET["id"])){
    $id= $_GET["id"];

    require "connect.php";
    $sql="SELECT * FROM tasks WHERE task_id = $id";
    $result = mysqli_query($connect,$sql);
    $row= mysqli_fetch_assoc($result);
    extract($row);

}
if(isset($_POST["task_name"])){

    $task_name=$_REQUEST["task_name"];
    $status=$_REQUEST["status"];
    $date_to_do= $_REQUEST["date_to_do"];
    $id= $_REQUEST["id"];

    require 'connect.php';

    $sql1= "UPDATE tasks set task_name='$task_name',date_to_do='$date_to_do',status='$status' where task_id='$id'";
    mysqli_query($connect,$sql1) or die(mysqli_error($connect));
    header("location:task.php");
}

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Update task</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</head>
<body class="bg-dark" style="font-family: 'Droid Sans'">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-6">
            <div class="card border border-warning">
                <div class="card-header text-center"><h3 style="font-family: 'Orator Std'">update <?=$task_name?></h3> </div>
                <div class="card-body">
                    <form class="form" action="update.php" method="post" enctype="multipart/form-data">
                        <input type="hidden" value="<?=$id?>">
                        <div class="form-group">
                            <label for="date">task name</label>
                            <input  type="text" value="<?=$task_name?>" class="form-control" name="task_name" id="date" >
                        </div>
                        <div class="form-group">
                            <label for="date">Date to do</label>
                            <input  type="date" value="<?=$date_to_do?>" class="form-control" name="date_to_do" id="date" >
                        </div>
                        <div class="form-group">
                            <label for="status">Status</label>
                            <input type="text" value="<?=$status?>" class="form-control" name="status" id="status">
                        </div>
                        <button type="submit" class="btn btn-warning btn-block">Update Task</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>