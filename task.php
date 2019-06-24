
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>To Do</title>
    <link rel="stylesheet" href=css/bootstrap.css>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
</head>
<body>
<?php
include 'nav.php';
?>
<div class="container">
    <table id="task" class="table table-hover border border-dark">
        <thead>
        <tr>
            <th>ID</th>
            <th>Task</th>
            <th>Date-to-do</th>
            <th>Status</th>
            <th>Delete</th>
            <!--<th>Update</th>-->
            <th>complete</th>

        </tr>
        </thead>
        <tbody>
        <?php

        require 'connect.php';
        $sql ="SELECT * FROM `tasks` ORDER BY task_id DESC ";
        $results = mysqli_query($connect,$sql);

        while ($row= mysqli_fetch_assoc($results))
        {
            extract($row);
            echo " 
         <tr>
            <td>$task_id</td>
            <td>$task_name</td>
            <td>$date_to_do</td>
            <td>$status</td>
            <td><a href='delete.php?id=$task_id' class='btn btn-danger'>Remove</a></td>         
           <!--  <td><a href='update.php?id=$task_id' class='btn btn-success'>Update</a></td>  -->       
            <td><a href='complete.php?id=$task_id' class='btn btn-info'>Complete</a></td>         
        </tr>";
        }
        ?>

        </tbody>
    </table>
</div>
<script>
    $(document).ready(function() {
        $('#task').DataTable();
    } );
</script>
</body>
</html>
</body>
</html>
