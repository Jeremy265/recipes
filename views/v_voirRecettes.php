<?php
/**
 * Created by PhpStorm.
 * User: Jérémy
 * Date: 25/01/2019
 * Time: 22:22
 */
    require_once (PATH_VIEWS.'header.html');
    require_once (PATH_VIEWS.'menu.php');
    require_once (PATH_VIEWS.'alert.php');

    if(!isset($nbP)){
        $nbP=1;
    }
    if(!isset($mc)){
        $mc="";
        }
    if(!isset($typePlat)){
        $typePlat="";
    }
?>
  <p class="display-4 mt-5 mb-5">Toutes les recettes</p> <!--ajouter define pour le titre-->

  <div class="">
    <form class="" action="index.php?page=voirRecettes" method="post">

        <div>
          <div class="input-group input-group-sm mb-3">
            <div class="input-group-prepend">

              <span class="input-group-text" id="inputGroup-sizing-sm">Rechercher</span>

            </div>
            <input type="text" name="mc" class="form-control" placeholder="mots clés..." aria-label="Small" aria-describedby="inputGroup-sizing-sm" value="<?=$mc?>">
          </div>

            <div class="form-group">
                
                <label for="exampleFormControlSelect1"><?=TYPE_PLAT?> : </label>

                <?php
                if(isset($listeTypePlat)){
                    echo '<select class="form-control" required name="typePlat">';
                    echo '<option value = "Tous">Tous</option>';
                    foreach($listeTypePlat as $tP){
                        if($typePlat == $tP)
                            echo '<option value = "'.$tP.'" selected>'.$tP.'</option>';
                        else
                            echo '<option value = "'.$tP.'">'.$tP.'</option>';
                    }
                    echo '</select>';
                }?>
            </div>
            <div class="form-group"> 
                <label for="formControlRange">Nombre de personnes : </label>
                <input type="range" class="form-control-range" list="nbPersonne" name="nbPersonne" min="1" max="15" value="<?=$nbP?>" step="1" oninput="document.getElementById('AffichageRange').textContent=value">
                <label id="AffichageRange"><?=$nbP?></label>
                <label>personne(s) au moins</label><br>
                <input type="submit" class="btn btn-light" value="Valider ces filtres">
            </div>
        </div>
    </form>
  </div>

<?php
    if(isset($listeRecettes) && $listeRecettes != null){?>
        <section class="">
        <?php foreach($listeRecettes as $recette){?>
            <article class="text-center">

                <div class="inner">
                    <a href="index.php?page=ficheRecette&idRecette=<?=$recette->getIdRecette()?>">
                      <img class="rounded img-fluid w-100 mt-5" src="<?=PATH_IMAGES.$recette->getPhoto()?>" alt="<?=$recette->getPhoto()?>">
                    </a>
                </div>

                <form method="post" action="index.php?page=ficheRecette&idRecette=<?=$recette->getIdRecette()?>">
					<input class="btn btn-dark btn-recette mb-5" type="submit" value="<?=$recette->getNomRecette()?>"/>
				</form>
            </article>
        <?php
    }?>
    </section>
<?php
}
require_once ('v_footer.html');
?>
