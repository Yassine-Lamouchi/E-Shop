<?php
require '../../config/db.php';

if (isset($_GET['supprimer']) && isset($_GET['id'])) {
    $stmt = $cnx->prepare("DELETE FROM produits WHERE id = ?");
    $stmt->execute([$_GET['id']]);
    header("Location: admin_produit.php");
    exit();
}

$res = $cnx->query("SELECT p.id, p.nom, p.prix, p.quantite_stock, c.nom_cat FROM produits p, categories c WHERE p.id_categorie = c.id_cat");

include '../../includes/header.php';
?>

<h1 align="center">Nos Produits Disponibles</h1>
<table width="80%" border="1" cellpadding="10" cellspacing="0" align="center">
    <thead>
        <tr>
            <th>Produit</th>
            <th>Prix</th>
            <th>Stock</th>
            <th>Catégorie</th>
            <th colspan="2">Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php while ($row = $res->fetch()): ?>
            <tr>
                <td><?= htmlspecialchars($row['nom']) ?></td>
                <td><?= htmlspecialchars($row['prix']) ?></td>
                <td><?= htmlspecialchars($row['quantite_stock']) ?></td>
                <td><?= htmlspecialchars($row['nom_cat']) ?></td>
                <td align="center"><a href="modifier_produit.php?id=<?= $row['id'] ?>">Modifier</a></td>
                <td align="center"><a href="?supprimer=1&id=<?= $row['id'] ?>" onclick="return confirm('supprimer produit <?= htmlspecialchars($row['nom']) ?> ?');">Supprimer</a></td>
            </tr>
        <?php endwhile; ?>
    </tbody>
    <tfoot>
        <p align="center">Nombre totale des produits : <?= $res->rowCount() ?></p>
    </tfoot>
</table>

<?php include '../../includes/footer.php'; ?>
