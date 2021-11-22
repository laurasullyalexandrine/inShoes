<?php

class Product extends CoreModel {
    
    private $description;
    private $picture;
    private $price;
    private $rate;
    private $status;
    private $brand_id;
    private $category_id;
    private $type_id;

//--------------------------------------------------------
// Systèm Activ Record
//--------------------------------------------------------
    // Méthode retournant la liste de tous les produits
    public function findAll() {

    // En premier ce connecter à la BDD en récupérant de connexion PDO
    $pdoDBConnexion = Database::getPDO();

    // on écrit notre requête sql
    $sql = 'SELECT * FROM product';

    //  Exécution de la requête
    $pdoStatement = $pdoDBConnexion->query($sql);

    // Récupération des résultats
        $productsList = $pdoStatement->fetchAll(PDO::FETCH_CLASS, 'Product');

    // On retourne la liste des produits
    return $productsList;
    }

    // méthode qui permet de retourner les infos d'un produit à partir de son id
    public function find($id) {
        // récupération de connexion PDO
        $pdoDBConnexion = Database::getPDO();

        // on écrit notre requête sql
        $sql = 'SELECT * FROM product WHERE id ='. $id;

        //  Exécution de la requête
        $pdoStatement = $pdoDBConnexion->query($sql);

        // On retourne la liste des produits
        $product = $pdoStatement->fetchObject('Product');

    }

    /**
     * Get the value of description
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set the value of description
     *
     * @return  self
     */
    public function setDescription($description)
    {
        $this->description = $description;

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
     * Get the value of price
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set the value of price
     *
     * @return  self
     */
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get the value of rate
     */
    public function getRate()
    {
        return $this->rate;
    }

    /**
     * Set the value of rate
     *
     * @return  self
     */
    public function setRate($rate)
    {
        $this->rate = $rate;

        return $this;
    }

    /**
     * Get the value of status
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set the value of status
     *
     * @return  self
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get the value of brand_id
     */ 
    public function getBrandId()
    {
        return $this->brand_id;
    }

    /**
     * Set the value of brand_id
     *
     * @return  self
     */ 
    public function setBrandId($brand_id)
    {
        $this->brand_id = $brand_id;

        return $this;
    }

    /**
     * Get the value of category_id
     */ 
    public function getCategoryId()
    {
        return $this->category_id;
    }

    /**
     * Set the value of category_id
     *
     * @return  self
     */ 
    public function setCategoryId($category_id)
    {
        $this->category_id = $category_id;

        return $this;
    }

    /**
     * Get the value of type_id
     */ 
    public function getTypeId()
    {
        return $this->type_id;
    }
}