<?php
require '../../config/db.php';

if (isset($_POST['valider'])) {
    $nom = $_POST['nom'];
    $id_categorie = $_POST['id_categorie'];
    $prix_ttc = $_POST['prix_ttc'];
    $quantite_stock = $_POST['quantite_stock'];
    $image = !empty($_POST['image']) ? $_POST['image'] : 'default.jpg';
    $description = $_POST['description'];

    $stmt = $cnx->prepare("INSERT INTO produits (nom, id_categorie, prix, quantite_stock, image, description) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->execute([$nom, $id_categorie, $prix_ttc, $quantite_stock, $image, $description]);

    header("Location: admin_produit.php");
    exit();
}

include '../../includes/header.php';
?>

<h2>Ajouter un nouveau produit</h2>

<form action="" method="POST">
    <p>
        <label for="nom">Nom du produit :</label><br>
        <input type="text" id="nom" name="nom" required>
    </p>
    <p>
        <label for="id_categorie">Catégorie :</label><br>
        <select id="id_categorie" name="id_categorie" required>
            <option value="" selected>-- Choisir une catégorie --</option>
            <?php 
                $categories = $cnx->query("SELECT * FROM categories"); 
                while ($row = $categories->fetch()):
            ?>
                <option value="<?= htmlspecialchars($row['id_cat']) ?>"><?= htmlspecialchars($row['nom_cat']) ?></option>
            <?php endwhile; ?>
        </select>
    </p>
    <p>
        <label for="prix_ttc">Prix TTC (DT) :</label><br>
        <input type="number" id="prix_ttc" name="prix_ttc" step="0.01" min="0" required>
    </p>
    <p>
        <label for="quantite_stock">Quantité en stock :</label><br>
        <input type="number" id="quantite_stock" name="quantite_stock" value="0" min="0" required>
    </p>
    <p>
        <label for="image">Nom du fichier image (ex: 1.jpg) :</label><br>
        <input type="text" id="image" name="image" placeholder="image.jpg">
    </p>
    <p>
        <label for="description">Description :</label><br>
        <textarea id="description" name="description" rows="5" cols="40"></textarea>
    </p>
    <p>
        <input type="submit" name="valider" value="Enregistrer le produit">
        <input type="reset" value="Annuler">
    </p>
</form>

<p><a href="admin_produit.php">Retour à la liste</a></p>

<?php
include '../../includes/footer.php';
?>
