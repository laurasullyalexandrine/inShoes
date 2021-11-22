<?php

// Pour créer un modèle on ressort les infos de adminer et on prend 
// le nom de chaque colonne de la table et on en fait les propriétés de la class
// le nom de la table est transformé pour nommer la class en CamelCase si cela est necessaire 
class Type extends CoreModel {

private $footer_order;

// Méthode retournant la liste de toutes les types
 // au moment dans le MainController on appellera cette méthode le resultat sera retourner 
 // Donc à placer dans le MainController
 public function findAll() {

    // En premier ce connecter à la BDD en récupérant de connexion PDO
     $pdoDBConnexion = Database::getPDO();

     // On écrit notre requête sql
     $sql = 'SELECT * FROM `type`';

     //  Exécution de la requête
     $pdoStatement = $pdoDBConnexion->query($sql);

         // Récupération des résultats
         $typeList = $pdoStatement->fetchAll(PDO::FETCH_CLASS, 'Type'); // ici on vient donner la nom de la class du modèle

         return $typeList;
}   

 // méthode qui permet de retourner les infos d'un produit à partir de son id
 public function find($id) {
    // récupération de connexion PDO
    $pdoDBConnexion = Database::getPDO();

    // on écrit notre requête sql
    $sql = 'SELECT * FROM `type` WHERE id ='. $id;

    //  Exécution de la requête
    $pdoStatement = $pdoDBConnexion->query($sql);

    // On récupère le result
    $type = $pdoStatement->fetchObject('Type');

    // On retourne la liste des catégories
    return $type;
}

public function findAllForFooter() {

    // En premier ce connecter à la BDD en récupérant de connexion PDO
     $pdoDBConnexion = Database::getPDO();

     // On écrit notre requête sql
     $sql = 'SELECT *
     FROM `type`
     WHERE `footer_order` > 0
     ORDER BY `footer_order` ASC
     LIMIT 5';

     //  Exécution de la requête
     //  C'est une requête de type de SELECT on veut récupérer le resultat donc c'est 'query'
     $pdoStatement = $pdoDBConnexion->query($sql);

         // Récupération des résultats
         $typeList = $pdoStatement->fetchAll(PDO::FETCH_CLASS, 'Brand'); 
         // Ici on veut récupérer tous les résultats sous forme d'objet de la classe Brand alors 
         // on utilise fetchAll avec une option FETCH_CLASS pour pouvoir manipuler des objets par la suite
         return $typeList;
    }


    /**
     * Get the value of footer_order
     */ 
    public function getFooterOrder()
    {
        return $this->footer_order;
    }

    /**
     * Set the value of footer_order
     *
     * @return  self
     */ 
    public function setFooterOrder($footer_order)
    {
        $this->footer_order = $footer_order;

        return $this;
    }

}
