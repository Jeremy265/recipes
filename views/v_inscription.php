<?php
/**
 * Created by PhpStorm.
 * User: Jérémy
 * Date: 28/01/2019
 * Time: 16:53
 */

    require_once(PATH_VIEWS.'header.html');
    require_once(PATH_VIEWS.'menu.php');
    require_once (PATH_VIEWS.'alert.php');
?>

    <div class="container py-5">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-6 mx-auto">

                        <!-- form card login -->
                        <div class="card rounded-1">
                            <div class="card-header">
                                <h3 class="mb-0"><?=INSCRIPTION?></h3>
                            </div>
                            <div class="card-body">
                                <form class="form" role="form" action="index.php?page=inscription" method="POST">
                                    <div class="form-group">
                                        <label for="uname1"><?=ID?></label>
                                        <input required name="id" type="text" class="form-control form-control-lg rounded-0">
                                    </div>
                                    <div class="form-group">
                                        <label><?=MDP?></label>
                                        <input required name="mdp" type="password" class="form-control form-control-lg rounded-0">
                                    </div>
                                    <div class="form-group">
                                        <label><?=CONFIRMER_MDP?></label>
                                        <input required name="confirmMdp" type="password" class="form-control form-control-lg rounded-0">
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