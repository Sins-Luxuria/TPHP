<?php
$title="Affichage carré herbiers";
include "header.php";
$d=filter_input(INPUT_GET,"d");

$tab = explode("/", $d);

//le grand herbier de 90x90 est une représentation extrapolisée du cadre d'échantillon étant un carré de 3x3 qui contient 9 echantillons
// 90x90 est considerable comme une quantité très grande d'echantillons. le nombre d'échantillons dans le carré de 90*90 s'étend à 8100
//notre stratégie pour la réalisation du grand herbier est la suivante:
//notre grand herbier sera composé de 8100 échantillons qui contiennent un nombre de carré vert parmi les 9 du cadre d'échantillons selectionnés
//la loi de l'aléatoire fera que la répartition du nombre de carré vert dans le grand herbier tendra vers le nombre de carré vert dans le cadre d'échantillon

?>
<div>
    <h1 class="carre"><?php echo $d ?></h1>
    </br>
    <table>
        <tr>
<?php
// le nombre de petit carré (=échantillon) dans le grand herbier est de 8100
for($i=1;$i<=900;$i++){
    //selection du nombre de carré vert dans l'échantillon parmi les 9 quantité du cadre d'echantillon
    $randnumb = rand(0,8);
    echo "<td>";
    creerpetitcarre($tab[$randnumb]);
    echo "<td>";
    if($i%30==0)
        echo "</tr><tr>";
}

?>
        </tr>
    </table>
</div>
<hr>
<div class="centrer">
    <a href="index.php" class="btn btn-secondary">Retour</a>
</div>

<?php
function creerpetitcarre($nombrevert){
    // selection de l'emplacement des cases qui seront vertes
    $tabvert = []; //tableau contenant les cases qui doivent etre vertes
    for($i=0;$i<$nombrevert;$i++) {
        do {
            $randseed = rand(1, 9);
            $new_number = $randseed;
        } while (in_array($new_number, $tabvert)); //vérification que le meme emplacement ne se retrouve 2 fois dans le tableau
        $tabvert[] = $new_number;
    }
    //création du tableau

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

include "footer.php";
?>