<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style>
    table
    {
    border-spacing : 0;
    border-collapse : collapse;
    }
    table td{
    border-width: 0;
    padding:0;
    }
    .bordure td{
    border:1px solid black;
    padding:3px;
    box-sizing: border-box;
    }
    .petitTableau td {
    width:13px;
    height:13px;
    }
    .petitTableau td.vert{
    background-color: green;
    }
    </style>
    <title>test carre</title>
</head>
<body>

<?php
//$d=filter_input(INPUT_GET,"d");
//$d = "3/5/4/8/9/6/7/8/2";
$d = "0/0/0/0/5/0/0/0/0";

$tab = explode("/", $d);
//echo var_dump($tab);


//le grand herbier de 90x90 est une representation extrapolisée du cadre d'echantillon etant un carré de 3x3 qui contient 9 echantillon
// 90x90 est considerable comme une quantité très grande d'echantillon. le nombre d'echantillon dans le carré de 90*90 s'étend à 8100
//notre stratégie pour la réalisation du grand herbier est la suivante:
//notre grand herbier sera composé de 8100 echantillons qui contiennent un nombre de carré vert parmi les 9 du cadre d'échantillon selectionné
//la loi de l'aléatoire fera que la repartition du nombre de carré vert dans le grand herbier tendra vers le nombre de carré vert dans le cadre d'echantillon


echo "<table><tr>";
// le nombre de petit carré (=echantillon) dans le grand herbier est de 8100
for($i=1;$i<=900;$i++){
    //selction du nombre de carré vert dans l'echantillon parmi les 9 quantité du cadre d'echantillon
    $randnumb = rand(0, 8);
    echo "<td>";
    creerpetitcarre($tab[$randnumb]);
    echo "<td>";
    if($i%30==0)
        echo "</tr><tr>";

}
echo "</tr></table>";



function creerpetitcarre($nombrevert){
    // selection de l'emplacement des cases qui seront vertes
    $tabvert = []; //tableau contenant les cases qui doivent etre vertes
    for($i=0;$i<$nombrevert;$i++) {
        do {
            $randseed = rand(1, 9);
            $new_number = $randseed;
        } while (in_array($new_number, $tabvert)); //verification que le meme emplacement ne se retrouve 2 fois dans le tableau
        $tabvert[] = $new_number;
    }
        //creation du tableau

        echo "<table class='petitTableau'><tr>";
                for($i=1;$i<=9;$i++){
                    echo in_array($i,$tabvert)?"<td style='background-color:green'></td>":"<td style='background-color:white'></td>";
                    if($i%3==0)
                        echo "</tr><tr>";
                }


    echo "</tr></table>";
}
// 90x90/9 = 900
// 10 x 10 carrés de 9
            ?>
</body>
</html>




