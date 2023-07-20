<?php
    require_once ('v_header.html');
    require_once ('v_menu.php');
    require_once ('v_alert.php');
?>

    <h1 class="titrePageCentre">Ajouter une recette</h1>
    <section c<!-- Formulaire d'ajout -->
    <form class="ajoutRecette" method ="post" action ="index.php?page=ajoutRecette" enctype="multipart/form-data">
        <div>
            <strong><?=CHOIX_PHOTO?></strong><br>
            <input required type="file" name="photo" accept=".jpg,.jpeg,.png,.gif">
        </div>
        <div>
            <strong><?=NOM_RECETTE?></strong><br>
            <input required type="text" name="nom">
        </div>
        <div class="deuxEntrees">
            <span>
                <strong><?=CHOIX_NB_PERSONNE?> </strong><br>
                <input required type="number" name="nbPersonne" min="1" value="1">
            </span>
            <span>
                <strong><?=CHOIX_DIFFICULTE?></strong><br>
                <input required type="number" min="1" max="5" name="difficulte" value="1">
            </span>
        </div>
        <div>
            <strong><?=TYPE_PLAT?></strong><br>
            <?php
                if(isset($listeTypePlat)){
                    echo '<select style="margin-top:0.5em;" required name="typePlat">';
                    foreach($listeTypePlat as $tP){
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
            ?>
            <?php if(isset($listeEtapes)) {
                echo '<datalist id = "listeEtapes">';
                foreach ($listeEtapes as $e){
                    echo '<option value = "' . $e->getDescription() . '">"';
                }
                echo '</datalist>';
            }
            ?>
                <input type="button" name="ingredients" value="+" onclick="addInput('ingredients')"><br>
                <input required type="text" name="ingredients[]" list="listeIngredients" placeholder="Choisir l'ingrédient...">
                <input required type="text" name="quantites[]" placeholder="Quantité..." class="quantiteIngredient"><br>
        </div>
        <div id="etapes">
            <strong><?=ETAPES?></strong><br>
            <input type="button" name="ajoutEtape" value="+" onclick="addInput('etapes')"><br>
            <input required type="text" name="etapes[]" list="listeEtapes"><br>
        </div>
        <script type="text/javascript" >
            function infosCuisson(){
                var elt = document.getElementById("autre");
                elt.style.display = "inline-block";
            }
            var nIng = 1;
            var nEta = 1;
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
                var i=0;
                while (i<4){
                    document.getElementById(element).remove();
                    i++;
                }
            }
        </script>
        <input value="Enregistrer" type="submit">
    </form>

<?php
    require_once ('v_footer.html');
?>