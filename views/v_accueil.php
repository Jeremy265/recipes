<?php

	require_once(PATH_VIEWS.'header.html');
	require_once(PATH_VIEWS.'menu.php');
    require_once('v_alert.php');
?>
    <p class="display-4 mt-5 mb-5"><?=RECETTE_JOUR?></p>
<?php
    if(isset($recette)){?>
        <div class="">
            <div class="">
                <div class="inner">
                    <a href="index.php?page=ficheRecette&idRecette=<?=$recette->getIdRecette()?>">
                        <img class="rounded img-fluid w-100" src="<?=PATH_IMAGES.$recette->getPhoto()?>" alt="<?=$recette->getPhoto()?>">
                    </a>
                </div>

								<form method="post" action="index.php?page=ficheRecette&idRecette=<?=$recette->getIdRecette()?>">
								    <input class="btn btn-dark btn-recette" type="submit" value="<?=$recette->getNomRecette()?>"/>
								</form>
            </div>
        </div>
<?php
    }
    require_once(PATH_VIEWS.'footer.html');
?>
