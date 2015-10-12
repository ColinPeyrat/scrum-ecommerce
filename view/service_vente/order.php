<h1>Service vente</h1>
<div class="row">
    <div class="col-md-3">
        <ul class="nav nav-pills nav-stacked">
            <li role="presentation"><a href="./?r=srv/addphoto">Ajouter une photo</a></li>
            <li role="presentation"><a href="./?r=srv/addvideo">Ajouter une video</a></li>
            <li role="presentation"><a href="./?r=srv/gallery">Gallerie</a></li>
            <li role="presentation"><a href="./?r=srv/order">Commande</a> </li>
        </ul>
    </div>
    <div class="col-md-9">
        <form class="form-inline" action="?r=srv/order" method="post" >
            <div id="sandbox-container" class="form-group">
                <div class="input-group date">
                    <a href="#" class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></a><input type="text" value="<?php if(isset($_POST['date'])) echo $_POST['date'];  ?>" name="date" class="form-control">
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Rechercher</button>
        </form>
        <hr>
        <script type="text/javascript">
                $('#sandbox-container .input-group.date').datepicker({
                    format: "yyyy-mm-dd",
                    todayBtn: "linked",
                    language: "fr",
                    orientation: "top auto",
                    autoclose: true,
                    todayHighlight: true
                });
        </script>
        <div class="table-responsive">
            <table class="table table-striped">
                <tr>
                    <th>Nom client</th>
                    <th>Ville livraison</th>
                    <th>Code postale livraison</th>
                    <th>Date commande</th>
                    <th>Plus d'information</th>
                </tr>
                <?php foreach($data as $k => $v): ?>
                    <tr>
                        <td><?php echo $v['commande']->T_E_CLIENT_CLI->cli_nom ?></td>
                        <?php if($v['commande']->T_E_RELAIS_REL->rel_id != null): ?>
                            <td><?php echo $v['commande']->T_E_RELAIS_REL->rel_ville ?></td>
                            <td><?php echo $v['commande']->T_E_RELAIS_REL->rel_cp ?></td>
                        <?php else: ?>
                            <td><?php echo $v['commande']->T_E_ADRESSE_ADR->adr_ville ?></td>
                            <td><?php echo $v['commande']->T_E_ADRESSE_ADR->adr_cp ?></td>
                        <?php endif; ?>
                        <td><?php echo $v['commande']->com_date ?></td>
                        <td><a data-toggle="modal" href="#" data-target="#modal<?php echo $k; ?>" >Plus d'information</a></td>
                    </tr>
                <?php  endforeach; ?>
            </table>
            <?php if(empty($data)) echo '<p style="text-align:center;">Pas de commande pour cette date</p>'; ?>
            <?php foreach($data as $k => $v): ?>
            <div class="modal fade" id="modal<?php echo $k; ?>" tabindex="-1" role="dialog" aria-labelledby="Commande <?php echo $k; ?>">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel">Commande de <?php echo $v['commande']->T_E_CLIENT_CLI->cli_civilite.' '.$v['commande']->T_E_CLIENT_CLI->cli_nom ?></h4>
                        </div>
                        <div class="modal-body">
                            <div class="row row-eq-height">
                                <div class="col-md-6">
                                    <div class="panel panel-success">
                                        <div class="panel-heading">
                                            <h3 class="panel-title">Fiche client</h3>
                                        </div>
                                        <div class="panel-body">
                                            <div class="table-responsive">
                                                <table class="table">
                                                    <tr>
                                                        <td>Nom</td>
                                                        <td><?php echo $v['commande']->T_E_CLIENT_CLI->cli_nom ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Prénom</td>
                                                        <td><?php echo $v['commande']->T_E_CLIENT_CLI->cli_prenom ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Email</td>
                                                        <td><?php echo $v['commande']->T_E_CLIENT_CLI->cli_mel ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Téléphone fixe</td>
                                                        <td><?php echo $v['commande']->T_E_CLIENT_CLI->cli_telfixe ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Téléphone portable</td>
                                                        <td><?php echo $v['commande']->T_E_CLIENT_CLI->cli_telportable ?></td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="panel panel-info">
                                        <div class="panel-heading">
                                            <h3 class="panel-title">Fiche Livraison</h3>
                                        </div>
                                        <div class="panel-body">
                                            <div class="table-responsive">
                                                <table class="table">
                                                    <?php if($v['commande']->T_E_RELAIS_REL->rel_id != null): ?>
                                                        <tr>
                                                            <td>Type</td>
                                                            <td>Relais</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Nom</td>
                                                            <td><?php echo $v['commande']->T_E_RELAIS_REL->rel_nom ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Rue</td>
                                                            <td><?php echo $v['commande']->T_E_RELAIS_REL->rel_rue ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Ville</td>
                                                            <td><?php echo $v['commande']->T_E_RELAIS_REL->rel_ville ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Code Postal</td>
                                                            <td><?php echo $v['commande']->T_E_RELAIS_REL->rel_cp ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Pays</td>
                                                            <td><?php echo $v['commande']->T_E_RELAIS_REL->T_R_PAYS_PAY->pay_nom ?></td>
                                                        </tr>
                                                    <?php else: ?>
                                                        <tr>
                                                            <td>Type</td>
                                                            <td>Adresse personnel ('<?php echo $v['commande']->T_E_ADRESSE_ADR->adr_type ?>')</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Nom</td>
                                                            <td><?php echo $v['commande']->T_E_ADRESSE_ADR->adr_nom ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Rue</td>
                                                            <td><?php echo $v['commande']->T_E_ADRESSE_ADR->adr_rue ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Complément rue</td>
                                                            <td><?php echo $v['commande']->T_E_ADRESSE_ADR->adr_complementrue ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Ville</td>
                                                            <td><?php echo $v['commande']->T_E_ADRESSE_ADR->adr_ville ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Code Postal</td>
                                                            <td><?php echo $v['commande']->T_E_ADRESSE_ADR->adr_cp ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Pays</td>
                                                            <td><?php echo $v['commande']->T_E_ADRESSE_ADR->T_R_PAYS_PAY->pay_nom ?></td>
                                                        </tr>
                                                    <?php endif; ?>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12" >
                                    <div class="panel panel-primary">
                                        <div class="panel-heading">
                                            <h3 class="panel-title">Produit commandé</h3>
                                        </div>
                                        <div class="panel-body">
                                            <div class="table-responsive">
                                                <table class="table">
                                                    <tr>
                                                        <td>Nom Produit</td>
                                                        <td>Editeur</td>
                                                        <td>Console</td>
                                                        <td>Quantité</td>
                                                        <td>Prix Unitaire</td>
                                                        <td>Prix total</td>
                                                    </tr>
                                                    <?php $prixtotal = 0;
                                                    foreach($v['produit'] as $key => $value): ?>
                                                        <tr>
                                                            <td><?php echo $value->T_E_JEUVIDEO_JEU->jeu_nom ?></td>
                                                            <td><?php echo $value->T_E_JEUVIDEO_JEU->T_R_EDITEUR_EDI->edi_nom ?></td>
                                                            <td><?php echo $value->T_E_JEUVIDEO_JEU->T_R_CONSOLE_CON->con_nom ?></td>
                                                            <td><?php echo $value->lec_quantite ?></td>
                                                            <td><?php echo $value->T_E_JEUVIDEO_JEU->jeu_prixttc ?> €</td>
                                                            <td><?php $prixtotal += ($value->T_E_JEUVIDEO_JEU->jeu_prixttc*$value->lec_quantite); echo ($value->T_E_JEUVIDEO_JEU->jeu_prixttc*$value->lec_quantite) ?> €</td>
                                                        </tr>
                                                    <?php endforeach ?>
                                                    <tr>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td><strong>TOTAL</strong></td>
                                                        <td><strong><?php echo $prixtotal ?> €</strong></td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
            <?php  endforeach; ?>
        </div>
    </div>
</div>