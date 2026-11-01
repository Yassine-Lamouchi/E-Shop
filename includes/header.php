<?php
// Détection dynamique du chemin relatif vers la racine du projet
if (!isset($base_path)) {
    if (file_exists('includes/header.php')) {
        $base_path = '';
    } elseif (file_exists('../../includes/header.php')) {
        $base_path = '../../';
    } elseif (file_exists('../includes/header.php')) {
        $base_path = '../';
    } else {
        $base_path = '';
    }
}
?>
<meta charset="UTF-8">
<table width="100%" border="1" cellpadding="10" style="border-collapse: collapse; font-family: Arial; background-color: #f8f9fa;">
    <tr>
        <!-- LOGO -->
        <td width="25%" style="background-color: #333; color: white;">
            <h2 style="margin:0;">MON E-SHOP</h2>
        </td>

        <!-- MENU PUBLIC (Consultation) -->
        <td align="center">
            <a href="<?= $base_path ?>index.php" style="text-decoration:none; color:#333; font-weight:bold;">🏠 Boutique</a>
        </td>

        <!-- MENU ADMIN (Gestion) -->
        <td width="45%" style="background-color: #fff3cd;">
            <div style="text-align: center;">
                <strong>🛠️ Espace Administration :</strong> <br>
                <a href="<?= $base_path ?>admin/produit/admin_produit.php">Produits</a> | 
                <a href="<?= $base_path ?>admin/produit/ajouter_produit.php" style="color: green;">+ Nouveau Produit</a> |
                <a href="<?= $base_path ?>admin/categorie/admin_categorie.php">Catégories</a> | 
                <a href="<?= $base_path ?>admin/categorie/ajouter_categorie.php" style="color: green;">+ Nouvelle Catégorie</a>
            </div>
        </td>
    </tr>
</table>
<br>
