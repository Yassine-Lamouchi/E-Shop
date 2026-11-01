<?php
require '../../config/db.php';

if (!isset($_GET['id'])) {
    header("Location: admin_produit.php");
    exit();
}

$id = $_GET['id'];

if (isset($_POST['modifier'])) {
    $stmt = $cnx->prepare("UPDATE produits SET image = ?, nom = ?, prix = ?, quantite_stock = ?, description = ?, id_categorie = ? WHERE id = ?");
    $stmt->execute([$_POST['image'], $_POST['nom'], $_POST['prix'], $_POST['quantite_stock'], $_POST['description'], $_POST['id_categorie'], $id]);
    header("Location: admin_produit.php");
    exit();
}

$stmt = $cnx->prepare("SELECT * FROM produits WHERE id = ?");
$stmt->execute([$id]);
$row = $stmt->fetch();

if (!$row) {
    header("Location: admin_produit.php");
    exit();
}

$cats = $cnx->query("SELECT id_cat, nom_cat FROM categories");

include '../../includes/header.php';
?>

<h1>Modifier Produit</h1>
<form method="post" action="">
    <label>Nom :</label><br>
    <input type="text" name="nom" value="<?= htmlspecialchars($row['nom']) ?>" required><br>
    <label>Prix :</label><br>
    <input type="text" name="prix" value="<?= htmlspecialchars($row['prix']) ?>" required><br>
    <label>Stock :</label><br>
    <input type="text" name="quantite_stock" value="<?= htmlspecialchars($row['quantite_stock']) ?>" required><br>
    <label>Description :</label><br>
    <textarea name="description"><?= htmlspecialchars($row['description']) ?></textarea><br>
    <label>Image :</label><br>
    <input type="text" name="image" value="<?= htmlspecialchars($row['image']) ?>" required><br>
    <label>Catégorie :</label><br>
    <select name="id_categorie">
        <?php while ($cat = $cats->fetch()): ?>
            <option value="<?= htmlspecialchars($cat['id_cat']) ?>"
            <?php if ($cat['id_cat'] == $row['id_categorie']) { echo 'selected'; } ?>>
                <?= htmlspecialchars($cat['nom_cat']) ?>
            </option>
        <?php endwhile; ?>
    </select><br><br>
    <input type="submit" name="modifier" value="Enregistrer">
    <a href="admin_produit.php">Annuler</a>
</form>

<?php include '../../includes/footer.php'; ?>
