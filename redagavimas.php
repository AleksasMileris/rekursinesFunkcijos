<?php
$path= $_GET['path'] ;

$goBack=dirname("$path");

if(isset($_POST['content'])){

    $open = fopen($path, "w");
    fwrite($open, $_POST['content']);
    fclose($open);


}

$opened = fopen($path, "r");
$content= fread($opened, filesize($path));
fclose($opened);

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



<div class="container">


    <div><a class=" btn btn-dark mt-5 text-decoration-none text-light mt-5 mb-1 " href="<?= "index.php?nuoroda=$goBack" ?>"><-- Grižti </a></div>


    <form action="redagavimas.php?path=<?=$path?>" method="post">
        <textarea name="content" class="size">
            <?= $content ?>
        </textarea>

        <button class="btn btn-success">Išsaugoti</button>
    </form>

</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>


</body>
</html>


