<?php
if (isset($_POST['task'])){
    require "connect.php";
    extract($_POST);
    //mysql
    $sql="INSERT INTO `tasks`(`task_id`, `task_name`, `date_to_do`, `status`) VALUES (NULL ,'$task','$date','$status')";
    mysqli_query($connect,$sql)or die(mysqli_error($connect)) ;
    header('location:task.php');
    //echo $task,$date,$status;
}

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>New Task</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</head>
<body>
<?php
require "nav.php";
?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-6">
            <div class="card">
                <div class="card-header text-center">Add task</div>
                <div class="card-body"></div>
                    <div class="card-body">
                        <form class="form" action="todo.php" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="task">Task</label>
                                <input type="text" class="form-control" name="task" id="task" >
                            </div>
                            <div class="form-group">
                                <label for="date">Date to do</label>
                                <input  type="date" class="form-control" name="date" id="date" >
                            </div>
                                <input  type="hidden" value="incomplete" class="form-control" name="status">

                            <button type="submit" class="btn btn-warning btn-block">Add Task</button>
                        </form>
                    </div>
                </div>
        </div>
    </div>
</div>
</body>
</html>