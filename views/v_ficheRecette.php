<?php

    require_once(PATH_VIEWS.'header.html');
    require_once(PATH_VIEWS.'menu.php');
    require_once (PATH_VIEWS.'alert.php');
?>
<?php
    if(isset($recette)){?>
        <h1 class="h1 mt-5 mb-5"><strong><?=$recette->getNomRecette()?></strong></h1>
        <section class="">
            <article>
                <div class="row">
                    <div class="col-sm-8 mb-5">
                        <img class="img-thumbnail w-100" src="<?=PATH_IMAGES.$recette->getPhoto()?>" alt="<?=$recette->getPhoto()?>">
                        <div><?=AJOUTE_PAR.' '.$recette->getCreateur()->getIdentifiant().' le '.$recette->getTypePlat()?></div>
                    </div>

                    <div class="col-sm-4">
                        <label>Difficulté : </label>
                        <h2>
                        <?php
                            for($i=0 ; $i<$recette->getDifficulte() ; $i++){
                                echo '<i class="fas fa-star"></i>';
                            }
                            for($i=5 ; $i>$recette->getDifficulte() ; $i--){
                                echo '<i class="far fa-star"></i>';
                            }
                        ?>
                        </h2>
                        <br></br>
                        <div>
                            <i class="fas fa-users fa-2x icon"></i>
                            <span class="h4"><?=$recette->getNbPersonne()?> personnes</span>
                        </div>
                        <br></br>
                        <div class="mb-5">
                            <i class="fas fa-utensils fa-2x icon"></i>
                            <span class="h4"><?=$recette->getDateCreation()?></span>   
                        </div>

                        <?php
                            if(isset($_SESSION['logged'])){?>
                                <?php
                                if(isset($favorite) && $favorite==true){?>
                                    <a href="index.php?page=ficheRecette&idRecette=<?=$recette->getIdRecette()?>&favoris=0"><?=SUPPRIMER_FAVORIS?></a><br>
                                <?php
                                }
                                else{?>
                                    <a href="index.php?page=ficheRecette&idRecette=<?=$recette->getIdRecette()?>&favoris=1"><?=AJOUTER_FAVORIS?></a><br>
                                <?php }?>

                        <?php } ?>
                        <?php
                        if(isset($_SESSION['admin']) || (isset($_SESSION['idUtilisateur']) && $_SESSION['idUtilisateur']== $recette->getCreateur()->getNoUtilisateur())){?>
                            <a href="index.php?page=modifierRecette&idRecette=<?=$recette->getIdRecette()?>"><?=MODIFIER_RECETTE?></a><br>
                            <a href="index.php?page=supprimerRecette&idRecette=<?=$recette->getIdRecette()?>"><?=SUPPRIMER_RECETTE?></a>
                        <?php } ?>
                    </div>

                </div>
                <div class="row">
                    <div class="col-sm-6 ingr pt-3">
                        <div class="h1"><?=INGREDIENTS?></div>
                        <br></br>
                        <ul>
                            <?php
                            if($recette->getListeIngredient() != null) {
                                foreach ($recette->getListeIngredient() as $ing) {
                                    ?>
                                    <li class="ingredient">
                                        <?=$ing->getQuantite().' '.$ing->getNomIngredient(); ?>
                                    </li>
                                    <?php
                                }
                            }
                            ?>
                        </ul>
                    </div>
                    <div class="col-sm-6 prep pt-3">
                        <div class="h1"><?=PREPARATION?></div>
                        <br></br>
                        <ul>
                            <?php
                            if($recette->getListeEtape() != null) {
                                foreach ($recette->getListeEtape() as $etape) {
                                    ?>
                                    <li class="step">
                                        <?=$etape->getDescription(); ?>
                                    </li>
                                    
                                    <?php
                                }
                            }
                            ?>
                        </ul>
                    </div>
                </div>
            </article>
        <article class="">
            <div class="h2 mt-5 mb-3 text-center pt-3 pb-3 comment-title"><?=TITRE_ESPACE_COMMENTAIRE?></div>
            <div class="">
                <form class="" method="post" action="index.php?page=ficheRecette&idRecette=<?=$recette->getIdRecette()?>">
                    <textarea class="form-control mb-2" required name="commentaire" type="text" placeholder="Votre commentaire ici..."></textarea>
                    <input class="btn btn-dark" type="submit" value="Ok">
                </form>
            </div>
            
            <?php
                if($recette->getListeCommentaire() != null){
                    foreach($recette->getListeCommentaire() as $com){?>
                        <div class="mt-5 comment-message pl-3 pt-3 pb-3">
                            <div class="">
                                <div class="">
                                    <?='<a href="index.php?page=mesRecettes&id='.$com->getNomUtilisateur().'">'.$com->getNomUtilisateur(). "</a>". ' le '. $com->getDateCreation().' : '?>
                                </div>
                                
                                <div>
                                    <?php
                                    if(isset($_SESSION['admin']) || (isset($_SESSION['nomUtilisateur']) && $com->getNomUtilisateur() == $_SESSION['nomUtilisateur'])){
                                        echo '<a href="index.php?page=ficheRecette&idRecette='.$recette->getIdRecette().'&supprimerComId='.$com->getIdCommentaire().'">'.SUPPRIMER_COMMENTAIRE.'</a>';
                                    }
                                    ?>
                                </div>
                            </div>
                            <div class="">
                                <?=$com->getContenu()?>
                            </div>
                        </div>
                    <?php
                    }
                }
            ?>
        </article>
        <section>

        <?php
    }
require_once(PATH_VIEWS.'footer.html');
?>