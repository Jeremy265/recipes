<nav  class="navbar navbar-expand-lg bg-dark navbar-dark">
  <a class="navbar-brand" href="index.php?page=accueil">NosRecettes</a>
  <button class="navbar-toggler btn-dark" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">

    <ul class="navbar-nav mr-auto">
        <li class="nav-item">
            <a class="nav-link" href="index.php?page=accueil"><?=ACCUEIL?></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="index.php?page=voirRecettes"><?=VOIR_RECETTES?></a>
        </li>
        <?php
            if(isset($_SESSION['logged'])){?>
            <li class="nav-item">
                <a class="nav-link" href="index.php?page=ajoutRecette"><?=AJOUT?></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="index.php?page=mesRecettes"><?=MES_RECETTES?></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="index.php?page=profil"><?=PROFIL?></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="index.php?page=accueil&deco=1"><?=DECONNEXION?></a>
            </li>
        <?php
            }
            else{?>
                <li class="nav-item">
                    <a class="nav-link" href="index.php?page=connexion"><?=CONNEXION?></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php?page=inscription"><?=INSCRIPTION?></a>
                </li>
        <?php } ?>

    </ul>

  </div>
</nav>
