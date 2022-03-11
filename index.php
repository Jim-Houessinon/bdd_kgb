<?php

require('model.php');

if(isset($_POST['action']))
{
    if($_POST['action'] == "listerTout")
    {
        $donnees = listerTout();
        require('tableauMissions.php');
    }

    elseif($_POST['action'] == "adminLister")
    {
        $donnees = adminLister($_POST['table'], $_POST['colonne'], $_POST['id']);
        require('tableauDetailMission.php');
    }

        elseif ($_POST['action'] == "creer")
        { 
            if(verifierTableExiste($_POST['table']) == 0)
            {
                if(verifierColonneExiste($_POST['table'], $_POST['colonne']) == 0)
                {
                    creerTable($_POST['table'], $_POST['colonne'], $_POST['type']);
                    require('gestionBdd.php');
                }
            }

            else
            {
                if(verifierColonneExiste($_POST['table'], $_POST['colonne']) == 0)
                {
                    creerColonne($_POST['table'], $_POST['colonne'], $_POST['type']);
                    require('gestionBdd.php');
                }
            }
        }

    elseif ($_POST['action'] == "modifier")
    {
        modifierColonne($_POST['table'], $_POST['colonne'], $_POST['type']);
        require('gestionBdd.php');
    }

    elseif ($_POST['action'] == "supprimer")
    {
        if(($_POST['table']) == "" && ($_POST['colonne'] == ""))
        {
            echo $_POST['table']." et ".$_POST['colonne']." non existant !";
            require('gestionBdd.php');
        }

        elseif(($_POST['table']) !== "" && ($_POST['colonne'] == ""))
        {
            supprimerTable($_POST['table']);
            require('gestionBdd.php');
        }

        elseif(($_POST['table']) == "" && ($_POST['colonne'] !== ""))
        {
            echo "Table non renseignée non existant !";
        }

        else
        {
            supprimerColonne($_POST['table'], $_POST['colonne']);
            require('gestionBdd.php');
        }
    }

    elseif($_POST['action'] == "insertion")
    {
        if(verifierTableExiste($_POST['table']) == 1)
        {
            if($_POST['table'] !== "mission")
            {
                insertion($_POST['table'], $_POST['colonne'], $_POST['valeur']);
                require('gestionBdd.php');
            }

            else
            {
                if(recupNationalite($_POST['cibles'], $_POST['idCible']) !== recupNationalite($_POST['agents'], $_POST['idAgent']))
                {
                    if(recupNationalite($_POST['contacts'], $_POST['idContact']) == $_POST['pays'])
                    {
                        if(recupPays($_POST['planques'], $_POST['idPlanque']) == $_POST['pays'])
                        {
                            if(recupSpecialite($_POST['agents'], $_POST['idAgent'])!== $_POST['specialite'])
                            {
                                insertionMission($_POST['table'], $_POST['action'], $_POST['statut'], $_POST['colonne'], $_POST['valeur'], $_POST['type'], $_POST['id'] ,$_POST);
                                require('gestionBdd.php');
                            }

                            else
                            {
                                echo "Aucun agent dispose de la spécialité requise pour la mission !";
                                require('gestionBdd.php');
                            }
                        }

                        else
                        {
                            echo "Mission impossible ! Cause planque pas dans le même pays que celui de la mission.";
                            require('gestionBdd.php');
                        }
                    }

                    else
                    {
                        echo "Mission impossible ! Cause contact pas même nationalité que le pays de la mission.";
                        require('gestionBdd.php');
                    }
                }

                else
                {
                    echo "Mission impossible ! Cause cible même nationalité que agent.";
                    require('gestionBdd.php');
                }
            }
        }

        else
        {
            echo "Cette table n'existe pas.";
            require('gestionBdd.php');
        }
    }

    else
    {
        echo "Cette instruction existe pas.";
        require('tableauMissions.php');
    }
}

elseif(isset($_POST['condition']))
{
    $donnees = listerDetailMission($_POST['condition']);
    require('tableauDetailMission.php');
}

elseif(isset($_POST['email']))
{
    if(verifAdmin($_POST['email'], $_POST['password']) !== 0)
    {
        $prenom = recupPrenom($_POST['email'], $_POST['password']);
        session_start();
        $_SESSION['prenom'] = $prenom;
        require('gestionBdd.php');
    }

    else
    {
        echo "Vous n'êtes pas autorisé a accéder à cette espace.";
    }
}

else
{   
    $donnees = listerTout();
    require('tableauMissions.php');
}

?>