<?php 
require_once("inc/init.inc.php");
// ---------------------- TRATEMENT PHP -------------------------//

// ----AJOUT PANIER ---- //
if (isset($_POST['ajout_panier'])) { 
    // debug($_POST);
    $resultat = executeRequete("SELECT *FROM produit WHERE id_produit='$_POST[id_produit]'");
    $produit = $resultat->fetch_assoc();
    ajouterProduitDansPanier($produit['titre'],$_POST['id_produit'], $_POST['quantite'], $produit['prix']);
}
// ------------------------ AFFICHAGE HTML -----------------------//
require_once("inc/haut.inc.php");
echo $contenu;
echo "<table>";
echo "<tr><td colspan='5'><Panier</td></<tr>";
echo "<tr><th>Titre</th><th>Produit</th><th>Quantite</th><th>Prix Unitaire</th></tr>";
if (empty($_SESSION['panier']['id_produit'])) // panier vide
{
    echo "<tr><td colspan='5'>votre panier est vide</td></tr>";
} else {
    echo "<tr><td colspan='5'>Votre panier contient des produits</td></tr>";
}
echo "</table><br>";
echo "<i>Réglement pas CHÉQUE uniquement à l'adresse suivante : 300 rue de vaugirard 75015 PARIS</i><br>";
require_once("inc/bas.inc.php");
