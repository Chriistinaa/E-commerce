<?php
require('./inc/init.inc.php');

//TODO Pour le debug
// var_dump(RACINE_SITE);
// echo'<br>';
// echo session_status();


// echo '<h2>Notre future page d\'accueil pour notre boutique</h2>';
//TODO Notre accueil
require('./inc/haut.inc.php');
?>



<h2>Notre page d'accueil</h2>
<p>Coincée entre le haut et le bas!</p>
<!-- <img src=" <?php echo RACINE_SITE; ?>inc/img/test-image.jpg" alt="bonjour"> -->
<img src="http://localhost:4000/public/img/52- bb -36_dog-2606759_640.jpg" alt="">
<?php

// echo getenv('NOM_VARIABLE');
// echo '<br>ou<br>';
// echo $_ENV['TEST'];

require('./inc/bas.inc.php');