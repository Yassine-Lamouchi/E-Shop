<?php
// Détection dynamique du chemin relatif vers la racine du projet
if (!isset($base_path)) {
    if (file_exists('includes/footer.php')) {
        $base_path = '';
    } elseif (file_exists('../../includes/footer.php')) {
        $base_path = '../../';
    } elseif (file_exists('../includes/footer.php')) {
        $base_path = '../';
    } else {
        $base_path = '';
    }
}
?>
<br><br>
<hr>
<table width="100%" border="0" cellpadding="10" style="background-color: #333; color: white; text-align: center; font-family: Arial, sans-serif;">
    <tr>
        <td>
            <p>&copy; <?php echo date('Y'); ?> - TP E-Commerce PHP/MySQL</p>
            <small>Session de Travaux Pratiques - E-Shop</small>
        </td>
        <td>
            <strong>Liens rapides :</strong><br>
            <a href="<?= $base_path ?>index.php" style="color: #ffc107;">Boutique</a> | 
            <a href="<?= $base_path ?>admin/produit/admin_produit.php" style="color: #ffc107;">Espace Admin</a>
        </td>
    </tr>
</table>
