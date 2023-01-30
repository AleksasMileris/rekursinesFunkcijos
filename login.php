<?php
session_start();
require_once "checking.php";



if(isset($_FILES["file"])) {

    $file = realpath($_FILES["file"]["name"]);
    header('location: index.php?nuoroda=' . dirname($file));
}

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>




<div class="container mt-5">
    <a href="login.php?logout=true" class=" btn btn-danger">Atsijungti</a>

</div>

        <div class="container">

                <form method="post" enctype="multipart/form-data">
                <div class="card  mt-3 col-md-6">
                    <div class="card-header bg-dark text-warning">
                        <h2>Ikelkite failą</h2>
                    </div>

                    <div class="card-body bg-secondary text-warning">
                        <input class="form-control mt-3" type="file" name="file">
                        <button class="btn btn-success mt-4" name="file" value="1">Išskleisti failą</button>

                    </div>

                </div>
                </form>
        </div>





<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>


</body>
</html>

