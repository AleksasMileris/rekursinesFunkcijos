<?php
        // direktorija
        $d = $_GET['nuoroda'];


        // Atgal mygtuko kelias
        $goBack=dirname("$d");




            // Trina elementus iš lenteles

            if(isset($_POST['checked'])){

               foreach ($_POST['checked'] as $file){
                   if(is_file($d."/".$file)){
                   unlink($d."/".$file);
                   }else{
                       rmdir($file);
                   }
               }
            }



            // Kuria nauja failą
        if(isset($_POST['newFile']) && ($_POST['newFile'] != "")){

            $myfile = fopen($d."/".$_POST['newFile'], "wb");

            fwrite($myfile, 'Naujas failas');

            fclose($myfile);
        }

        // Kuria nauja folderi
if(isset($_POST['newFolder'])  && ($_POST['newFolder'] != "")){

    mkdir($d."/".$_POST['newFolder'], 0700);


}
    //http://localhost/php-start/rekursinesFunkcijos/?nuoroda=C:/xampp/htdocs/test-wp






        function isskleistiNuoroda($nuorodosKelias){

            $nuoroda= opendir($nuorodosKelias);









                    while($nuorodosElementas = readdir($nuoroda)){


                            if($nuorodosElementas == '.'|| $nuorodosElementas == '..'){
                                continue;
                            }


                            echo "<tr class=''>";



//-----------------------------------------------------------------------------------------------------------------------------------
                                if(is_dir($nuorodosKelias."/".$nuorodosElementas)){

                                //isskleistiNuoroda($nuorodosKelias."/".$nuorodosElementas);
                                    echo  "<td class='col-md-1'><img src='./img/folder.png' width='40'></td>";
                                    echo "<td>";
                                    echo "<a class='text-decoration-none text-info'  href='?nuoroda=$nuorodosKelias/$nuorodosElementas' >$nuorodosElementas</a>";
                                    echo "</td>";



                                }else{
                                    $nuorodosElementas;
                                }
                                if (is_file($nuorodosKelias."/".$nuorodosElementas)){
                                    $ext = pathinfo($nuorodosKelias . "/" . $nuorodosElementas, PATHINFO_EXTENSION);

                                    if ($ext =='php'|| $ext== 'css'|| $ext == 'html'|| $ext == 'txt' ) {
                                        echo "<td class='col-md-1'><img  src='./img/$ext.png' width='40'></td>";
                                    }else{
                                        echo "<td class='col-md-1'><img src='./img/file.png' width='40'></td>";
                                    }
                                    echo "<td>";
                                   echo $nuorodosElementas;
                                    echo "</td>";

                                }




//-----------------------------------------------------------------------------------------------------------------------------------
                           // Ikonos ir VISI FAILAI       /|\
                                        //               / | \
                                            //          /  |  \
                                            //             |
                                            //             |
                                            //             |

//-----------------------------------------------------------------------------------------------------------------------------------
                                 if($nuorodosKelias."/".$nuorodosElementas){
                                    echo "<td>" ;
                                    echo  (filesize($nuorodosKelias."/".$nuorodosElementas))." B"."/".(filesize($nuorodosKelias."/".$nuorodosElementas) / 1000)." KB";
                                    echo "</td>" ;
                                }else{
                                    echo "<td>" ;
                                    echo " ";
                                    echo "</td>" ;
                                }
//-----------------------------------------------------------------------------------------------------------------------------------
                                // Failo Dydis          /|\
                              //                       / | \
                              //                      /  |  \
                                          //             |
                                          //             |
                                          //             |

//-----------------------------------------------------------------------------------------------------------------------------------

                                if(is_dir($nuorodosKelias."/".$nuorodosElementas)){
                                    echo "<td>" ;
                                    echo  skaiciuojaFailus($nuorodosKelias."/".$nuorodosElementas);
                                    echo "</td>" ;
                                }else{
                                    echo "<td>" ;
                                    echo " ";
                                    echo "</td>" ;
                                }
//-----------------------------------------------------------------------------------------------------------------------------------

                        // Failu kiekis viduje    /|\
                        //                       / | \
                        //                      /  |  \
                                    //             |
                                    //             |
                                    //             |

//-----------------------------------------------------------------------------------------------------------------------------------


                                if (is_file($nuorodosKelias."/".$nuorodosElementas)){

                                    $ext=pathinfo($nuorodosKelias."/".$nuorodosElementas,PATHINFO_EXTENSION);
                                    if($ext){
                                        echo "<td class='text-uppercase fw-bold monospace'>$ext</td>";
                                        echo "<td>";
                                        echo "<a class='text-decoration-none text-info' href='./redagavimas.php?path=".$nuorodosKelias."/".$nuorodosElementas."'>".'Redaguoti'."</a>";
                                        echo "</td>";

                                        echo "<td>"."<input class='form-check-input' type='checkbox' name='checked[]' value='$nuorodosElementas'>"."</td>";
                                    }
                                }else{
                                    $direktorija=pathinfo($nuorodosKelias."/".$nuorodosElementas,PATHINFO_DIRNAME)."/".$nuorodosElementas;
                                        echo "<td class='text-uppercase fw-bold monospace'>Folder</td>";
                                    echo "<td >"." "."</td>";
                                    echo "<td>"."<input class='form-check-input' type='checkbox' name='checked[]' value='$direktorija'>"."</td>";

                                }



                        // Failo tipas koregavimas ir trinti check boxas       /|\
                                                            //                / | \
                                                            //               /  |  \
                                                                    //          |
                                                                    //          |
                                                                    //          |

                                echo "</tr>";
                            }



                                    closedir($nuoroda);
        };






function skaiciuojaFailus($nuorodosKelias){

    $nuoroda= opendir($nuorodosKelias);
    $count = 0;
    while($nuorodosElementas = readdir($nuoroda)){
        if($nuorodosElementas == '.'|| $nuorodosElementas == '..'){
            continue;
        }

        if(is_dir($nuorodosKelias."/".$nuorodosElementas)){

            $count+=skaiciuojaFailus($nuorodosKelias."/".$nuorodosElementas);

        }elseif (is_file($nuorodosKelias."/".$nuorodosElementas)){
            $count++;
        }
    }
    closedir($nuoroda);
    return $count;
};


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



        <div class="container font-monospace">





            <form action="index.php?nuoroda=<?=$d?>" method="post">

                <div class="d-flex justify-content-between">
                <div><a class=" btn btn-dark  text-decoration-none text-light mt-5 mb-1 " href="<?= "?nuoroda=$goBack" ?>"><-- Grižti </a></div>
                <button class="btn btn-danger mt-5 mb-1 " name="trintiFaila">Trinti failus</button>
                </div>
            <table class=" verticalText text-center font-monospace table table-dark table-striped table-hover table-bordered border-danger table-sm">

                <thead>



                <tr>
                    <th>Ikonos</th>
                    <th>Visi failai</th>
                    <th>Failo Dydis</th>
                    <th>Failų kiekis viduje </th>
                    <th>Failo tipas</th>
                    <th>Koreguoti</th>
                    <th>Trinti</th>
                </tr>

                </thead>
                <tbody>

                <?=  isskleistiNuoroda($d) ?>

                </tbody>
            </table>

            </form>


                            <hr class="mt-5">
                            <h1 class="text-center text-primary">Sukurti failą šitoje direktorijoje.</h1>


            <form class="mt-5 mb-5 col-md-7"  action="?nuoroda=<?=$d?>" method="post">
                <table class="table table-dark table-striped table-bordered border-primary table-sm">
                        <thead>
                            <tr>
                                    <th>Sukurti nauja katalogą</th>
                                    <th>Sukurti nauja failą</th>
                            </tr>
                        </thead>
                            <tbody>
                                    <tr>
                                            <td class="p-3" ><input class="form-control  " type="text" name="newFolder" placeholder="Pvz... NaujasKatalogas"></td>
                                            <td class="p-3" ><input class="form-control " type="text" name="newFile" placeholder="Pvz... NaujasFailas.txt"> </td>
                                    </tr>

                            </tbody>
                </table>
                <button class="btn btn-primary">Sukurti failą</button>
            </form>
    </div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>


</body>
</html>

