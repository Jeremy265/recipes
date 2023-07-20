<?php
/**
 * Created by PhpStorm.
 * User: Jérémy
 * Date: 26/01/2019
 * Time: 11:35
 */



    require_once ('v_header.html');
    require_once ('v_menu.php');
    require_once ('v_alert.php');
?>
    


    <div class="container py-5">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-6 mx-auto">

                        <!-- form card login -->
                        <div class="card rounded-1">
                            <div class="card-header">
                                <h3 class="mb-0"><?=CONNEXION?></h3>
                            </div>
                            <div class="card-body">
                                <form class="form" role="form" autocomplete="off" id="formLogin" novalidate="" action="index.php?page=connexion" method="POST">
                                    <div class="form-group">
                                        <label for="uname1"><?=ID?></label>
                                        <input type="text" class="form-control form-control-lg rounded-0" type="text" name="id" required>
                                        <div class="invalid-feedback">Oops, you missed this one.</div>
                                    </div>
                                    <div class="form-group">
                                        <label><?=MDP?></label>
                                        <input type="password" class="form-control form-control-lg rounded-0" name="mdp" autocomplete="new-password" required >
                                        <div class="invalid-feedback">Enter your password too!</div>
                                    </div>
                                    <input type="submit" class="btn btn btn-dark btn-lg float-right" value="Valider">
                                </form>
                            </div>
                            <!--/card-block-->
                        </div>
                        <!-- /form card login -->
                    </div>
                </div>
                <!--/row-->
            </div>
            <!--/col-->
        </div>
        <!--/row-->
    </div>
    <!--/container-->

<?php
    require_once (PATH_VIEWS.'footer.html');?>