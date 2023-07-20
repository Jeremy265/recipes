<?php
/**
 * Created by PhpStorm.
 * User: Jérémy
 * Date: 25/01/2019
 * Time: 23:43
 */

    require_once ('v_header.html');
    require_once ('v_menu.php');
    require_once ('v_alert.php');
?>
    <form action="index.php?page=recherche" method="post">
        <div>
		    <strong>Mot clé :</strong>
            <input type="text" name="nomRecette">
        </div>
    </form>
    <?php if(isset($listeRecettes)){?>
            <section class="sectionRecette">
            <?php foreach($listeRecettes as $recette){?>
                <article class="recette">
                    <div>
                        <a href="index.php?page=ficheRecette&idRecette=<?=$recette->getIdRecette()?>"><img class="photoRecette" src="<?=PATH_IMAGES.$recette->getPhoto()?>" alt="<?=$recette->getPhoto()?>"></a>
                    </div>
                    <div class="nomRecette">
                        <h1><?=$recette->getNomRecette()?></h1>
                    </div>
                </article>
                <?php
            }?>
            </section>
        <?php
    }
    require_once ('v_footer.html');
?>