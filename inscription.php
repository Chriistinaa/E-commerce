<?php require_once("inc/init.inc.php");
$title = " | Inscription";


if ($_POST) {

    $verif_caractere = preg_match('#^[a-zA-Z0-9._-]+$#', $_POST['pseudo']);
    if (!$verif_caractere || (strlen($_POST['pseudo']) < 1 || strlen($_POST['pseudo']) > 20)) {
        $contenu .= "<div class='erreur'>Le pseudo doit contenir entre 1 et 20 caractères. <br> 
    Caractères acceptés : Lettre de A à Z et chiffre de 0 à 9 </div>";
    } else {
        $utilisateur = executeRequete("SELECT * FROM utilisateur WHERE pseudo ='$_POST[pseudo]'");
        if ($utilisateur->num_rows > 0) {
            $contenu .= "<div class='erreur'>Pseudo indisponible. Veuillez en choisir un autre svp.</div>";
        } else {
            // $_POST['mot_de_passe'] = md5($_POST['mot_de_passe']);
            $_POST['mot_de_passe'] = password_hash($_POST['mot_de_passe'], PASSWORD_BCRYPT);
            foreach ($_POST as $indice => $valeur) {
                $_POST[$indice] = htmlEntities(addSlashes($valeur));
            }
            executeRequete("INSERT INTO utilisateur(pseudo, mot_de_passe, nom, prenom, email, civilite, ville,
         code_postal, adresse) VALUES ('$_POST[pseudo]', '$_POST[mot_de_passe]', '$_POST[nom]', 
         '$_POST[prenom]', '$_POST[email]', '$_POST[civilite]', '$_POST[ville]', '$_POST[code_postal]',
         '$_POST[adresse]')");
            $contenu .= "<div class='validation'>Vous êtes inscrit à notre site web. <a href=\"connexion.php\"><u>Cliquez ici pour vous connecter</u></a></div>";
        }
    }
}
?>

<?php require_once("inc/haut.inc.php"); ?>
<?php echo $contenu ?>
<form method="post" action="">

    <label for="pseudo">Pseudo</label><br>
    <input type="text" id="pseudo" name="pseudo" maxlength="20" placeholder="Votre pseudo" title="caractères acceptés : a-zA-Z0-9-_." required="required"><br><br>

    <label for="mot_de_passe">Mot de passe </label><br>
    <input type="password" id="mot_de_passe" name="mot_de_passe" maxlength="20" required="required"><br><br>

    <label for="nom">Nom</label><br>
    <input type="text" id="nom" name="nom" placeholder="Votre nom"><br><br>

    <label for="prenom">Prenom</label><br>
    <input type="text" id="prenom" name="prenom" placeholder="Votre prenom"><br><br>

    <label for="email">Email</label><br>
    <input type="email" id="email" name="email" placeholder="exemple@gmail.com"><br><br>

    <label for="civilite">Civilité</label><br>
    <input name="civilite" value="m" checked="" type="radio">Homme
    <input name="civilite" value="f" type="radio">Femme <br><br>


    <label for="ville">Ville</label><br>
    <input type="text" id="ville" name="ville" placeholder="Votre ville" pattern="[a-zA-Z0-9.-_]{5,15}" title="caractères acceptés : a-zA-Z0-9-_."><br><br>

    <label for="code_postal">Code postal</label><br>
    <input type="text" id="code_postal" name="code_postal" placeholder="code postal" pattern="[0-9]{5}" title="5 chffres requis : 0-9"><br><br>

    <label for="adresse">Adresse</label><br>
    <textarea type="text" id="adresse" name="adresse" placeholder="Votre adresse" pattern="[a-zA-Z0-9-_.]{5,15}" title="caractères acceptés :  a-zA-Z0-9.-_"></textarea><br><br>



    <input type="submit" value="S'inscrire">
</form>

<?php require_once("inc/bas.inc.php"); ?>