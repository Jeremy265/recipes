<?php
/**
 * Created by PhpStorm.
 * User: Nassim
 * Date: 30/01/2019
 * Time: 15:17
 */

    require_once(PATH_VIEWS.'header.html');
    require_once(PATH_VIEWS.'menu.php');
    require_once (PATH_VIEWS.'alert.php');
?>
<h1 class="titrePageCentre"><?= PROFIL ?></h1>
    <section class="monProfil">
        <?php if(isset($nom)){ ?>
            <p>Nom : <?= $nom ?></p>
        <?php } ?>
    </section>