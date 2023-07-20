<?php
/**
 * Created by PhpStorm.
 * User: Jérémy
 * Date: 26/01/2019
 * Time: 12:24
 */
    if(isset($erreur)){
        $erreur = htmlspecialchars($erreur);?>

        <div class="alert alert-dark mt-5">
            <?=$erreur?>
        </div>
    <?php } ?>
