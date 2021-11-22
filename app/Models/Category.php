<?php
// un models qui va permettre dans PHP de représenter une table 
// c'est un plan de la table SQL dans PHP 
class Category extends CoreModel {

private $subtitle;
private $picture;
private $home_order;



 // Méthode retournant la liste de toutes les categories
 // au moment dans le MainController on appellera cette méthode le resultat sera retourner 
 // Donc à placer dans le MainController
 public function findAll() {

    // En premier ce connecter à la BDD en récupérant de connexion PDO
     $pdoDBConnexion = Database::getPDO();

     // On écrit notre requête sql
     $sql = 'SELECT * FROM category';

     //  Exécution de la requête
     $pdoStatement = $pdoDBConnexion->query($sql);

         // Récupération des résultats
         $categoriesList = $pdoStatement->fetchAll(PDO::FETCH_CLASS, 'Category'); // ici on vient donner la nom de la class du modèle

         return $categoriesList;

 }   

 // méthode qui permet de retourner les infos d'un produit à partir de son id

 /**
  * Undocumented function
  *
  * @param [int] $id
  * @return Category l'objet catégorie correspond à l'id fourni
  */
 public function find($id) {
    // récupération de connexion PDO
    $pdoDBConnexion = Database::getPDO();

    // on écrit notre requête sql
    $sql = 'SELECT * FROM category WHERE id ='. $id;

    //  Exécution de la requête
    $pdoStatement = $pdoDBConnexion->query($sql);

    // On récupère le result
    $category = $pdoStatement->fetchObject('Category');

    // On retourne la liste des catégories
    return $category;

}


/**
 * Get the value of subtitle
 */ 
public function getSubtitle()
{
return $this->subtitle;
}

/**
 * Set the value of subtitle
 *
 * @return  self
 */ 
public function setSubtitle($subtitle)
{
$this->subtitle = $subtitle;

return $this;
}

/**
 * Get the value of picture
 */ 
public function getPicture()
{
return $this->picture;
}

/**
 * Set the value of picture
 *
 * @return  self
 */ 
public function setPicture($picture)
{
$this->picture = $picture;

return $this;
}

/**
 * Get the value of home_order
 */ 
public function getHomeOrder()
{
return $this->home_order;
}

/**
 * Set the value of home_order
 *
 * @return  self
 */ 
public function setHomeOrder($home_order)
{
$this->home_order = $home_order;

return $this;
}

}