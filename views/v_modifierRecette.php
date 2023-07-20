<?php
/**
 * Created by PhpStorm.
 * User: Jérémy
 * Date: 26/01/2019
 * Time: 12:19
 */

    require_once (PATH_VIEWS.'header.html');
    require_once (PATH_VIEWS.'menu.php');
    require_once (PATH_VIEWS.'alert.php');

    if(isset($recette)){?>
        <h1 class="titrePageCentre">Modifier la recette <?=$recette->getNomRecette()?></h1>
        <!-- Formulaire de modification -->
        <form class="modifierRecette" method ="post" action ="index.php?page=modifierRecette&idRecette=<?=$idRecette?>" enctype="multipart/form-data">
            <div>
                <strong><?=CHOIX_PHOTO?></strong><br>
                <img class="photoRecette" src="<?=PATH_IMAGES.$recette->getPhoto()?>"><br>
                <input type="file" name="photo" accept=".jpg,.jpeg,.png,.gif" >
            </div>
            <div>
                <strong><?=NOM_RECETTE?></strong><br>
                <input required type="text" name="nom" value="<?=$recette->getNomRecette()?>">
            </div>
            <div class="deuxEntrees">
                        <span>
                            <strong><?=CHOIX_NB_PERSONNE?> </strong><br>
                            <input required type="number" name="nbPersonne" min="1" value="<?=$recette->getNbPersonne()?>">
                        </span>
                <span>
                            <strong><?=CHOIX_DIFFICULTE?></strong><br>
                            <input required type="number" min="1" max="5" name="difficulte" value="<?=$recette->getDifficulte()?>">
                        </span>
            </div>

            <div>
                <strong><?=TYPE_PLAT?></strong><br>
                <?php
                if(isset($listeTypePlat)){
                    echo '<select style="margin-top:0.5em;" required name="typePlat">';
                    foreach($listeTypePlat as $tP){
                        if($recette->getTypePlat() == $tP)
                            echo '<option value = "'.$tP.'" selected>'.$tP.'</option>';
                        else
                            echo '<option value = "'.$tP.'">'.$tP.'</option>';
                    }
                    echo '</select>';
                }?>
            </div>
            <div id="ingredients">
                <strong><?=INGREDIENTS_INDIQUER_UNITE?></strong><br>
                <?php if(isset($listeIngredients)) {
                    echo '<datalist id = "listeIngredients">';
                    foreach ($listeIngredients as $i){
                        echo '<option value = "' . $i->getNomIngredient() . '">"';
                    }
                    echo '</datalist>';
                }
                    $nIng=0;
                    if(isset($listeIngredientsRecette)){
                        foreach ($listeIngredientsRecette as $ing){
                            $nIng++;?>
                            <input id="ingredient<?=$nIng?>" type="text" name="ingredients[]" list="listeIngredients" placeholder="Choisir l'ingrédient..." value="<?=$ing->getNomIngredient()?>">
                            <input id="ingredient<?=$nIng?>" type="text" name="quantites[]" placeholder="Quantité..." class="quantiteIngredient" value="<?=$ing->getQuantite()?>">
                            <input id="ingredient<?=$nIng?>" type="button" name="retirerIngredient" value="-" onclick="removeInput('ingredient<?=$nIng?>')"><br id="ingredient<?=$nIng?>">
                    <?php }}
                ?>

                <input type="button" name="ingredients" value="+" onclick="addInput('ingredients')"><br>
                </div>
            <div id="etapes">
                <strong><?=ETAPES?></strong><br>
                <?php if(isset($listeEtapes)) {
                    echo '<datalist id = "listeEtapes">';
                    foreach ($listeEtapes as $e){
                        echo '<option value = "' . $e->getDescription() . '">"';
                    }
                    echo '</datalist>';
                }
                if(isset($listeEtapesRecette)){
                    $nEta=0;
                    foreach ($listeEtapesRecette as $e){
                        $nEta++;?>
                        <input id="etape<?=$nEta?>" type="text" name="etapes[]" list="listeEtapes" value="<?=$e->getDescription()?>">
                        <input id="etape<?=$nEta?>" type="button" name="retirerEtape" value="-" onclick="removeInput('etape<?=$nEta?>')"><br id="etape<?=$nEta?>">
                <?php }}?>
                <input type="button" name="ajoutEtape" value="+" onclick="addInput('etapes')"><br>
            </div>
            <script type="text/javascript" >
                var nIng = <?=$nIng?>;
                var nEta = <?=$nEta?>;
                function addInput(element){
                    var div = document.getElementById(element);
                    var input = document.createElement("input");
                    var boutonRetirer = document.createElement("input");
                    var br = document.createElement("br");
                    boutonRetirer.setAttribute("type", "button");
                    boutonRetirer.setAttribute("name", "retirer"+element);
                    boutonRetirer.setAttribute("value", "-");
                    input.setAttribute("name", element+"[]");
                    if(element == "ingredients"){
                        nIng ++;
                        br.setAttribute("id", "ingredient"+nIng);
                        input.setAttribute("id", "ingredient"+nIng)
                        input.setAttribute("list", "listeIngredients");
                        input.setAttribute("placeholder", "Choisir l'ingrédient...");
                        var inputQuantite = document.createElement("input");
                        inputQuantite.setAttribute("id", "ingredient"+nIng);
                        inputQuantite.setAttribute("name", "quantites[]");
                        inputQuantite.setAttribute("placeholder", "Quantité...");
                        inputQuantite.setAttribute("type", "text");
                        inputQuantite.setAttribute("class", "quantiteIngredient");
                        boutonRetirer.setAttribute("id", "ingredient"+nIng);
                        boutonRetirer.setAttribute("onclick", "removeInput('ingredient"+nIng+"')");
                    }
                    if(element == "etapes"){
                        nEta++;
                        br.setAttribute("id", "etape"+nEta);
                        input.setAttribute("id", "etape"+nEta);
                        input.setAttribute("list","listeEtapes")
                        boutonRetirer.setAttribute("id", "etape"+nEta);
                        boutonRetirer.setAttribute("onclick", "removeInput('etape"+nEta+"')");
                    }
                    div.appendChild(input);
                    if(element=="ingredients")
                        div.appendChild(inputQuantite);
                    div.appendChild(boutonRetirer);
                    div.appendChild(br);
                }
                function removeInput(element){
                    if(element !== "ingredient1" && element !== "etape1"){
                        var i=0;
                        while (i<4){
                            document.getElementById(element).remove();
                            i++;
                        }
                    }
                    else{
                        alert('<?=ING_ETA_OBLIGATOIRE?>')
                    }
                }
            </script>
            <input value="Enregistrer" type="submit" name="valider">
            <input value="Annuler" type="submit" name="valider">
            </form>
    <?php
    }

    require_once ('v_footer.html');
    ?>

