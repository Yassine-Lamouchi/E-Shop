<?php
require 'config/db.php';

if (!isset($_GET['id'])) {
    header("Location: index.php");
    exit();
}

$id = $_GET['id'];
$stmt = $cnx->prepare("SELECT nom, image, description, quantite_stock, prix, nom_cat FROM produits, categories WHERE produits.id_categorie = categories.id_cat AND produits.id = ?");
$stmt->execute([$id]);
$produit = $stmt->fetch();

if (!$produit) {
    header("Location: index.php");
    exit();
}

include 'includes/header.php';
?>

<table align="center" width="80%" cellpadding="15" cellspacing="15">
    <tr>
        <td><img src="images/<?= htmlspecialchars($produit['image']); ?>" width="300" alt="<?= htmlspecialchars($produit['nom']); ?>"></td>
        <td>
            <h2><?= htmlspecialchars($produit['nom']); ?></h2>
            <p><b>Catégorie:</b> <?= htmlspecialchars($produit['nom_cat']); ?></p>
            <hr>
            <h3>Description du produit : </h3>
            <p><?= nl2br(htmlspecialchars($produit['description'])); ?></p>
            <p><b>Prix: <?= htmlspecialchars($produit['prix']); ?> DT</b></p>
            <p>Quantité en stock: <?= htmlspecialchars($produit['quantite_stock']); ?></p>
            <input type="button" value="Acheter" style="background-color: blue; color: white; padding: 10px 20px; border: none; cursor: pointer; margin-bottom: 15px;"><br>
            <a href="index.php">Retour à l'accueil</a>
        </td>
    </tr>
</table>

<?php
include 'includes/footer.php';
?>
