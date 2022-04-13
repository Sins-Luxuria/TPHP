<?php
session_start();
$token=uniqid();
$_SESSION["token"]=$token;
$title="Herbiers";
include "header.php";
?>

<div>
    <h1>Relevés</h1>
    <table class="table table-striped">
        <tr>
            <th>Date</th>
            <th>Lieu</th>
            <th>Relevé</th>
            <th>Visualiser</th>
        </tr>
        <?php
        //construire le menu avec le contenu de la table catégories
        include_once "config.php";
        //création de la connexion à la BDD
        $pdo = new PDO("mysql:host=".Config::SERVEUR.";dbname=".Config::BDD, Config::UTILISATEUR, Config::MOTDEPASSE);
        //création de la requete
        $req = $pdo->prepare("select * from releve");
        //executer la requete
        $req->execute();
        //récuperer le resultat
        $lignes = $req->fetchAll();

        foreach ($lignes as $l){
            ?>
            <tr>
                <td><?php echo htmlentities($l["date_releve"])?></td>
                <td><?php echo htmlentities($l["lieu"])?></td>
                <td><?php echo htmlentities($l["releve"])?></td>
                <td>
                    <a href="herbier_draw.php?id=<?php echo $l["id"]?>" class="btn btn-success">Voir</a>
                </td>
            </tr>
            <?php
        }
        ?>
    </table>
</div>
<hr>
<div>
    <h1>Ajouter un relevé</h1>
    <form class="form" method="post" action="action/ajoutReleve.php">
        <div class="row">
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="date" class="form-label">Date</label>
                    <input type="date" class="form-control" id="date" name="date" required>
                </div>
                <div class="mb-3">
                    <label for="lieu" class="form-label">Lieu</label>
                    <input type="text" class="form-control" id="lieu" name="lieu" required>
                </div>
                <div class="mb-3">
                    <label for="donnees" class="form-label">Données</label>
                    <input type="text" class="form-control" id="donnees" name="donnees" required>
                </div>
                <input type="submit" class="btn btn-primary" value="OK">
                </div>
        </div>

    </form>
</div>
<?php
include "footer.php";
?>