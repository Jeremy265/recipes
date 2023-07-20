<?php
/**
 * Created by PhpStorm.
 * User: Jérémy
 * Date: 30/01/2019
 * Time: 15:17
 */

    require_once(PATH_VIEWS.'header.html');
    require_once(PATH_VIEWS.'menu.php');
    require_once (PATH_VIEWS.'alert.php');
?>
    <h1 class="titrePageCentre"><?= isset($titre1) ? $titre1 : MES_RECETTES ?></h1>
    <section class="pageScindee2">
        <section class="mesCreations">
            <h2><?= isset($titre2) ? $titre2 : MES_CREATIONS?></h2>
            <?php
                if(isset($listeRecettesCrees)){
                    foreach($listeRecettesCrees as $recette) {
                        ?>
                        <article class="recette">
                            <div class="nomRecette">
                                <h1><?= $recette->getNomRecette() ?></h1>
                            </div>
                            <div>
                                <a href="index.php?page=ficheRecette&idRecette=<?= $recette->getIdRecette() ?>">
                                    <img class="photoRecette" src="<?= PATH_IMAGES . $recette->getPhoto() ?>"
                                        alt="<?= $recette->getPhoto() ?>">
                                </a>
                            </div>
                        </article>
                        <?php
                    }
                }?>
        </section>
        <section class="mesRecettesFavorites">
            <h2><?= isset($titre3) ? $titre3 : MES_RECETTES_FAVORITES?></h2>
            <?php
            if(isset($listeRecettesFavorites)){
                foreach($listeRecettesFavorites as $recette) {
                    ?>
                    <article class="recette">
                        <div class="nomRecette">
                            <h1><?= $recette->getNomRecette() ?></h1>
                        </div>
                        <div>
                            <a href="index.php?page=ficheRecette&idRecette=<?= $recette->getIdRecette() ?>">
                                <img class="photoRecette" src="<?= PATH_IMAGES . $recette->getPhoto() ?>"
                                     alt="<?= $recette->getPhoto() ?>">
                            </a>
                        </div>
                    </article>
                    <?php
                }
            }?>
        </section>
    </section>