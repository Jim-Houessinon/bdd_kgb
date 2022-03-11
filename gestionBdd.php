<?php
if(!isset($_SESSION))
{
    session_start();
}
?>

<!Doctype html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <title>Tableau des Missions</title>
        <link rel="stylesheet" href="style.css">
        <script type="text/javascript" src="script.js"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    </head>
    <body>
      <h1 class="text-center">Gestion Base de Données</h1>
        <div class="row container-fluid p-0 m-0">
            <?php
                foreach($_SESSION['prenom'] as $designation => $valeur)
                {?>
                    <script>
                        var conversion = <?php echo json_encode($valeur); ?>;
                    </script>
            <?php }?>
            <div class="col-lg-3 text-center h3">
                Bienvenue <script>document.write(conversion)</script>
            </div>
            <div class="space-formulaire"></div>
            <form method="post" action="index.php">
                <div class="form-row">
                    <div class="row">
                        <div class="col-lg-4"></div>
                        <div class="col-12 col-md-6 col-lg-4">
                            <div class="col-md-8 mb-3">
                                <label>Action :</label>
                                <select name="action">
                                    <option value="adminLister" selected>Lister</option>
                                    <option value="creer">Creer</option>
                                    <option value="modifier">Modifier</option>
                                    <option value="supprimer">Supprimer</option>
                                    <option value="insertion">Insertion</option>
                                </select>   
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4"></div>
                        <div class="col-md-4 mt-2">
                            <label>Table</label>
                            <input type="text" class="form-control col-md-7" name="table" placeholder="Nom de la table">
                            <div class="mt-2">
                            <label>Colonne</label>
                            <input type="text" class="form-control col-md-7" name="colonne" placeholder="Nom de la colonne">
                            </div>
                            <div class="mt-2">
                            <label>Type du champ de la colonne</label>
                            <input type="text" class="form-control col-md-7" name="type" placeholder="Ex : varchar(50)">
                            </div>
                            <div class="mt-2">
                            <label>Valeur</label>
                            <input type="text" class="form-control col-md-7" name="valeur" placeholder="Une valeur..">
                            </div>
                            <div class="mt-2">
                            <label>Id</label>
                            <input type="text" class="form-control col-md-7" name="id" placeholder="n°identification">
                            </div>
                        </div>
                    </div>
                        Cases à remplir que si l'action est une insertion sur la table mission :
                        <div class="col-md-4 mt-2">
                            <label>Titre</label>
                            <input type="text" class="form-control" name="titre" placeholder="Titre mission">
                        </div>
                        <div class="col-md-4 mt-2">
                            <label>Description</label>
                            <input type="text" class="form-control col-md-7" name="description" placeholder="Descriptif">
                        </div>
                        <div class="col-md-4"></div>
                        <div class="col-md-4 mt-2">
                            <label>Nom de code</label>
                            <input type="text" class="form-control col-md-7" name="nomCode" placeholder="Alcatraz">
                        </div>
                        <div class="col-md-4 mt-2">
                            <label>Pays</label>
                            <input type="text" class="form-control col-md-7" name="pays" placeholder="Russie">
                        </div>
                        <div class="col-md-4"></div>
                        <div class="col-md-4 mt-2">
                            <label>Contact</label>
                            <input type="text" class="form-control col-md-7" name="contact" placeholder="Informateur">
                        </div>
                        <div class="col-md-4 mt-2">
                            <label>Cible</label>
                            <input type="text" class="form-control col-md-7" name="cible" placeholder="Cible à atteindre">
                        </div>
                        <div class="col-md-4"></div>
                        <div class="col-md-4 mt-2">
                            <label>Agent</label>
                            <input type="text" class="form-control col-md-7" name="agent" placeholder="Notre agent">
                        </div>
                        <div class="col-md-4 mt-2">
                        <label>Type Mission :</label>
                        <select  name="typeMission">
                            <option value="En préparation">Surveillance</option>
                            <option value="En cours">Assassinat</option>
                            <option value="Terminé">Infiltration</option>
                        </select>
                        <label class="mt-2">Statut Mission :</label>
                        <select  name="statut">
                            <option value="En préparation">En preparation</option>
                            <option value="En cours">En cours</option>
                            <option value="Terminé">Terminé</option>
                            <option value="Echec">Echec</option>
                        </select>
                    </div>
                    <div class="col-md-4 mt-2">
                        <label>Planque</label>
                        <input type="text" class="form-control col-md-7" name="planque" placeholder="Maison, entrepôt..">
                    </div>
                    <div class="col-md-4 mt-2">
                        <label>Date de début</label>
                        <input type="text" class="form-control col-md-7" name="dateDebut" placeholder="01/02/2022">
                    </div>
                    <div class="col-md-4 mt-2">
                        <label>Date de fin</label>
                        <input type="text" class="form-control col-md-7" name="dateFin" placeholder="02/03/20022">
                    </div>
                    <div class="col-md-4"></div>
                    <div class="col-md-4 mt-2">
                        <label>Spécialité</label>
                        <input type="text" class="form-control col-md-7" name="specialite" placeholder="Sniper">
                    </div>
                    <div class="row">
                        <div class="col-md-4 mt-4 mb-2">
                            Règle métier :
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 mt-2">
                            <label>Id Cible</label>
                            <input type="text" class="form-control col-md-7" name="idCible" placeholder="n°identification de la cible">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 mt-2">
                            <label>Id Agent</label>
                            <input type="text" class="form-control col-md-7" name="idAgent" placeholder="n°identification de notre agent">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 mt-2">
                            <label>Id Contact</label>
                            <input type="text" class="form-control col-md-7" name="idContact" placeholder="n°identification de notre contact">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 mt-2">
                            <label>Id Planque</label>
                            <input type="text" class="form-control col-md-7" name="idPlanque" placeholder="n°identification de notre planque">
                        </div>
                    </div>
                </div>
                <div class ="row">
                    <div class="col-md-4"></div>
                    <button class="col-md-1 btn btn-primary mt-3 mb-3" type="submit">Envoyer</button>
                    <button class="col-md-1 btn btn-danger mx-2 mt-3 mb-3" type="submit"><a class="text-decoration-none text-white" href="deconnexion.php">Déconnexion</a></button>     
                </div>
            </form>
        </div>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
        <script type="text/javascript" src="script.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    </body>
</html>