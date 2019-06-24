<?php
if(isset($_GET["id"])){
    $id= $_GET["id"];

    require "connect.php";
    $sql="SELECT task_id FROM tasks WHERE task_id = $id";
    $result = mysqli_query($connect,$sql);
    $row= mysqli_fetch_assoc($result);
    extract($row);

}
if(isset($_POST["task"])){
    $task=$_REQUEST["task"];
    $status=$_REQUEST["status"];
    $date= $_REQUEST["date"];
    $id= $_REQUEST["id"];

    require 'connect.php';

    $sql1= "UPDATE `tasks` SET `task_id`=$id,`task_name`=$task,`date_to_do`=$date,`status`=$status WHERE task_id=$id";
    mysqli_query($connect,$sql1) or die(mysqli_error($connect));
    // header("location:task.php");
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
<body>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-6">
            <div class="card">
                <div class="card-header text-center">Update task</div>
                <div class="card-body">
                    <form class="form" action="update.php" method="post" enctype="multipart/form-data">
                        <input type="hidden" value="<?=$id?>" class="form-control">
                        <div class="form-group">
                            <label for="task">Task</label>
                            <input type="text" value="<?=$task?>" class="form-control" name="task" id="task" >
                        </div>
                        <div class="form-group">
                            <label for="date">Date to do</label>
                            <input  type="date" value="<?=$date?>" class="form-control" name="date" id="date" >
                        </div> <div class="form-group">
                            <label for="status">Status</label>
                            <input  type="text" value="" class="form-control" name="status" id="status">
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