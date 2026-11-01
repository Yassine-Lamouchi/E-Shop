<?php
require '../../config/db.php';

if (!isset($_GET['id'])) {
    header("Location: admin_categorie.php");
    exit();
}

$id = $_GET['id'];

if (isset($_POST['modifier'])) {
    $stmt = $cnx->prepare("UPDATE categories SET nom_cat = ? WHERE id_cat = ?");
    $stmt->execute([$_POST['nom_cat'], $id]);
    header("Location: admin_categorie.php");
    exit();
}

$stmt = $cnx->prepare("SELECT * FROM categories WHERE id_cat = ?");
$stmt->execute([$id]);
$row = $stmt->fetch();

if (!$row) {
    header("Location: admin_categorie.php");
    exit();
}

include '../../includes/header.php';
?>

<h1>Modifier Catégorie</h1>
<form method="post" action="">
    <label>Nom :</label>
    <input type="text" name="nom_cat" value="<?= htmlspecialchars($row['nom_cat']) ?>" required>
    <input type="submit" name="modifier" value="Enregistrer">
    <a href="admin_categorie.php">Annuler</a>
</form>

<?php include '../../includes/footer.php'; ?>
