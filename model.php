<?php

$hostName = "i54jns50s3z6gbjt.chr7pe7iynqr.eu-west-1.rds.amazonaws.com";
$databaseName = "bh9q7lke8xm08ps7";
$userName = "jeqnjyhmqk1tlrnu";
$password = "a1ai0zar7rlw9tvl";
$t ="coco";
$pdo = dbConnect();

function dbConnect()
{  
    try
    {
        global $hostName, $databaseName, $userName, $password;
        return $pdo = new PDO("mysql:host=$hostName;dbname=$databaseName", $userName, $password);
    }

    catch(Exception $e)
    {
        echo('Problème de connexion !');
    }
}

function listerTout()
{
    global $pdo;
    $statement = $pdo->prepare("SELECT * FROM missions");

    if($statement->execute())
    {
        $donnees = $statement ->fetch(PDO::FETCH_ASSOC);
        return $donnees;
    }

    else
    {
        echo("Erreur chargement..");
    }
}

function listerDetailMission($condition)
{
    global $pdo;
    $statement = $pdo->prepare("SELECT * FROM missions WHERE id = ".$condition);

    if($statement->execute())
    {
        $donnees = $statement ->fetch(PDO::FETCH_ASSOC);
        return $donnees;
    }

    else
    {
        echo("Erreur chargement..");
    }
}

function adminLister($table, $colonne, $condition)
{
    if($colonne == "")
    {
        $colonne = "*";
    } 

    if($condition == "")
    {
        global $pdo;
        $statement = $pdo->prepare("SELECT ".$colonne." FROM ".$table);
    }

    else
    {
        global $pdo;
        $statement = $pdo->prepare("SELECT ".$colonne." FROM ".$table." WHERE id = ".$condition);
    }

    if($statement->execute())
    {
        $donnees = $statement ->fetch(PDO::FETCH_ASSOC);
        return $donnees;
    }

    else
    {
        echo("Erreur chargement..");
    }
}

function verifierTableExiste($table)
{
    global $pdo, $databaseName;
    $statement = $pdo->prepare("SHOW TABLES FROM ".$databaseName." LIKE '".$table."'");
    $statement->execute();

    if($statement -> fetch() > 0)
    {
        return 1;
    }

    else
    {
        return 0;
    }
}

function verifierColonneExiste($table, $colonne)
{
    global $pdo;
    $statement = $pdo->prepare("SHOW COLUMNS FROM ".$table." LIKE '".$colonne."'");
    
    try
    {
        $statement->execute();
    }

catch(PDOException $e)
{
    return 0;
}
    
if($statement -> fetch() > 0)
    {
        return 1;
    }

    else
    {
        return 0;
    }
}

function creerTable($table, $colonne, $type)
{
    if(verifierTableExiste($table) == 0)
    {
        global $pdo;
        $statement = $pdo->prepare("CREATE TABLE ".$table." (".$colonne." ".$type.")");
        $statement->execute();

        echo "Table ".$table." créé !";
    }

    else
    {
        if(verifierColonneExiste($table, $colonne) == 0)
        {
            creerColonne($table, $colonne);
        }

        else
        {
            echo "Colonne ".$colonne." existe déjà !";
        }
    }
}

function creerColonne($table, $colonne, $type)
{
    global $pdo;
    $statement = $pdo->prepare("ALTER TABLE ".$table." ADD ".$colonne." ".$type);
    $statement->execute();

    if(verifierColonneExiste($table, $colonne) == 0)
    {
        echo "Colonne ".$colonne." créer !";
    }

    else
    {
        echo "Un problème est survenu !";
    }
}

function modifierColonne($table, $colonne, $type)
{
    if(verifierColonneExiste($table, $colonne) == 1)
    {
        global $pdo;
        $statement = $pdo->prepare("ALTER TABLE ".$table." MODIFY ".$colonne." ".$type);
        if($statement->execute())
        {
            echo "Colonne ".$colonne." modifié !";
        }
    }

    else
    {
        echo "La colonne ".$colonne." n'existe pas !";
    }
}

function supprimerTable($table)
{
    global $pdo;
    $statement = $pdo->prepare("DROP TABLE ".$table);

    if($statement->execute())
    {
        echo "TABLE ".$table." supprimé !";
    }

    else
    {
        echo "Problème lors de la suppression !";
    }
}

function supprimerColonne($table, $colonne)
{
    global $pdo;
    $statement = $pdo->prepare("ALTER TABLE ".$table." DROP COLUMN ".$colonne);

    try
    {
        $statement->execute();
 
        echo "Colonne ".$colonne." supprimé !";
    }

    catch(PDOException $e)
    {
        echo "Problème lors de la suppression.".'<br>'."La table ne peut contenir moins d'une colonne !";
        
    }
}

function insertion($table, $designation, $valeur)
{
    global $pdo;
    $statement = $pdo->prepare("INSERT INTO ".$table." (".$designation.") VALUES ('".$valeur."')");

    if($statement->execute())
    {
        echo "Insertion réussie !";
    }

    else
    {
        echo "Problème lors de l'insertion. Avez-vous définie les bonnes valeurs aux bons champs ?";
    }
}

function insertionMission($table, $action, $statut, $colonne, $valeur, $type, $id, $post)
{ 
    foreach($post as $designation => $valeur)
    {
        if($designation !== $table && $designation !== $action && $designation !== $statut && $designation !== $colonne && $designation !== $valeur && $designation !== $type && $designation !== $id && $designation !== "")
        {   
            insertion($table, $designation, $valeur);
        }
    }

    echo "Insertion réussie !";
}

function recupNationalite($table, $id)
{
    global $pdo;
    $statement = $pdo->prepare("SELECT nationalite FROM ".$table." WHERE id = ".$id);
    
    if($statement->execute())
    {
        $donnees = $statement ->fetch(PDO::FETCH_STRING);
        return $donnees;
    }

    else
    {
        echo "Problème récupération donnée";
    }
}

    function recupPays($table, $id)
    {
        global $pdo;
        $statement = $pdo->prepare("SELECT pays FROM ".$table." WHERE id = ".$id);
    
        if($statement->execute())
        {
            $donnees = $statement ->fetch(PDO::FETCH_STRING);
            return $donnees;
        }
    
        else
        {
            echo "Problème récupération donnée";
        }
    }

    function recupSpecialite($table, $id)
    {
        global $pdo;
        $statement = $pdo->prepare("SELECT specialites FROM ".$table." WHERE id = ".$id);
    
        if($statement->execute())
        {
            $donnees = $statement ->fetch(PDO::FETCH_STRING);
            return $donnees;
        }
    
        else
        {
            echo "Problème récupération donnée";
        }
    }

    function verifAdmin($email, $password)
    {
        global $pdo;
        $statement = $pdo->prepare("SELECT nom FROM administrateurs WHERE email = '".$email."' AND mot_de_passe = '".$password."'");
        $statement->execute();
        $reponse = $statement -> fetch(PDO::FETCH_ASSOC);
        
        if($reponse > 0)
        {
          
            $val = $reponse['nom'];

                return $val;
        }

        else
        {
            return 0;
        }
    }

    function recupPrenom($email, $password)
    {
        global $pdo;
        $statement = $pdo->prepare("SELECT prenom FROM administrateurs WHERE email = '".$email."' AND mot_de_passe = '".$password."'");
        $statement->execute();
        $prenom = $statement -> fetch(PDO::FETCH_ASSOC);

        return $prenom;
    }

?>

