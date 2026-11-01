<?php
require '../../config/db.php';

if (isset($_GET['supprimer']) && isset($_GET['id'])) {
    $stmt = $cnx->prepare("DELETE FROM categories WHERE id_cat = ?");
    $stmt->execute([$_GET['id']]);
    header("Location: admin_categorie.php");
    exit();
}

$res = $cnx->query("SELECT * FROM categories");

include '../../includes/header.php';
?>

<h1 align="center">Nos Catégories</h1>
<table width="80%" border="1" cellpadding="10" cellspacing="0" align="center">
    <thead>
        <tr>
            <th>Id</th>
            <th>Nom</th>
            <th colspan="2">Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php while ($row = $res->fetch()): ?>
            <tr>
                <td><?= htmlspecialchars($row['id_cat']) ?></td>
                <td><?= htmlspecialchars($row['nom_cat']) ?></td>
                <td align="center"><a href="modifier_categorie.php?id=<?= $row['id_cat'] ?>">Modifier</a></td>
                <td align="center"><a href="?supprimer=1&id=<?= $row['id_cat'] ?>" onclick="return confirm('supprimer categorie <?= htmlspecialchars($row['nom_cat']) ?> ?');">Supprimer</a></td>
            </tr>
        <?php endwhile; ?>
    </tbody>
    <tfoot>
        <p align="center">Nombre totale des catégories : <?= $res->rowCount() ?></p>
    </tfoot>
</table>

<?php include '../../includes/footer.php'; ?>
