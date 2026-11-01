<?php
require '../../config/db.php';

if (isset($_POST['valider'])) {
    $nom = $_POST['cat'];
    $stmt = $cnx->prepare("INSERT INTO categories (nom_cat) VALUES (?)");
    $stmt->execute([$nom]);

    header("Location: admin_categorie.php");
    exit();
}

include '../../includes/header.php';
?>

<h2>Ajouter une nouvelle catégorie</h2>

<form action="" method="POST">
    <p>
        <label for="cat">Nom du categorie :</label><br>
        <input type="text" id="cat" name="cat" required>
    </p>
    <p>
        <input type="submit" name="valider" value="Enregistrer la catégorie">
        <input type="reset" value="Annuler">
    </p>
</form>

<p><a href="admin_categorie.php">Retour à la liste</a></p>

<?php
include '../../includes/footer.php';
?>
