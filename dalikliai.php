
<?php

function recursive($x, $y){
    if (($x == $y )){

        echo $x ;
    }
    if($x > $y){
            $x = $x-$y ;
           return  recursive($x, $y);
    }
    if($x<$y){
        $y = $y-$x;
        return recursive($x, $y);

    }
}
if((int)isset($_POST['x']) && (int)isset($_POST['y']) ){
        $x=$_POST['x'];
    $y=$_POST['y'];
    recursive($x,$y);
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

</head>
<body>


<div class="container">
<form method="post">
    <div class="card mt-5 col-md-4 bg-dark text-light ">
        <div class="card-header bg-dark">
            <div class="card-title">
                <h1>Rasti bendrą daliklį</h1>
            </div>
        </div>
        <div class="card-body bg-secondary">
                <label>Skaičius x:</label>
            <input class="form-control" type="text" name="x" placeholder="x">
            <label class="mt-5">Skaičius y:</label>
            <input class="form-control" type="text" name="y" placeholder="y">
            <button class="btn btn-success mt-3">Ieškoti</button>
        </div>


    </div>
    <h2 class="text-success mt-5 text-center col-md-4"><?php (isset($_POST['x']) && isset($_POST['y'])) ? recursive($x,$y):""  ?> </h2>
</form>
</div>





<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>


</body>
</html>


