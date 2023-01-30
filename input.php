<?php

session_start();

if(isset($_POST['user'])){

    if($_POST['user'] == 'aleksas' && password_verify($_POST['password'],'$2y$10$qNOPBOSpWTc05sU7ItAGwOXjo3WzbJjqevAW8WmLEp6quv60t91h.')){
        $no = rand(1,1000);
        $_SESSION['user_id']=$no;


        header("location: login.php");
    }else{
        echo "<h1 class='alert alert-danger font-monospace'>"."Prisijungimai neteisingi"."</h1>" ;
    }

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
<form method="post">
    <div class="card col-md-5 font-monospace rounded">
        <div class="card-header bg-dark text-warning">
            <div class="card-title">
                <h1>Prisijunkite</h1>
            </div>
        </div>
    <div class="card-body bg-secondary">
        <label class=" text-warning fs-4 mt-3" >Prisijungimo vardas:</label>
    <input type="text" class="form-control mt-2 " name="user">
        <label class="text-warning fs-4 mt-5">Prisijungimo slaptažodis:</label>
    <input type="password" class="form-control mt-2 " name="password">
    <button class="btn btn-success mt-5">Prisijungti</button>
    </div>
    </div>
</form>


</div>





<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>


</body>
</html>

