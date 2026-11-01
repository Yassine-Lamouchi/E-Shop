<?php
require 'config/db.php';
include 'includes/header.php';

$res = $cnx->query("SELECT id, image, nom, prix, quantite_stock, nom_cat FROM produits, categories WHERE produits.id_categorie = categories.id_cat");
?>
<h1 align="center">Liste des produits</h1>
<table width="80%" border="1" cellpadding="10" cellspacing="0" align="center">
    <thead>
        <tr>
            <th>Image</th>
            <th>Produit</th>
            <th>Categorie</th>
            <th>Prix</th>
            <th>Disponible</th>
            <th>Détails</th>
        </tr>
    </thead>
    <tbody>
        <?php while ($row = $res->fetch()): ?>
            <tr>
                <td align="center"><img src="<?= 'images/' . htmlspecialchars($row['image']) ?>" width="60%" height="60%" alt="<?= htmlspecialchars($row['nom']) ?>"></td>

                <td><?= htmlspecialchars($row['nom']) ?></td>
                <td><?= htmlspecialchars($row['nom_cat']) ?></td>
                <td><?= htmlspecialchars($row['prix']) ?> DT</td>

                <?php if ($row['quantite_stock'] > 0): ?>
                    <td>
                        <font color="green">En stock</font>
                    </td>
                <?php else: ?>
                    <td>
                        <font color="red">En rupture de stock</font>
                    </td>
                <?php endif; ?>

                <td><a href="produit.php?id=<?= htmlspecialchars($row['id']) ?>">Voir les détails</a></td>
            </tr>
        <?php endwhile; ?>
    </tbody>
</table>
<?php
include 'includes/footer.php';
?>
