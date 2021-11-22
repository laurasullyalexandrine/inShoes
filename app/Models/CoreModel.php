<?php

class CoreModel {
    
    protected $id;
    protected $name;
    protected $created_at;
    protected $updated_at;


    /**
     * Get the value of the entity id
     * Cette méthode getter donne un accès en lecture à la propriété id
     * à tout code externe à la classe qui manipulerait des objets de cette entité
     * 
     * @return void
     */
    public function getId()
    {
        return $this->id;
    }


    /**
     * Nous sommes ici dans un docblock :
     * c'est un commentaire particulier qui permet d'ajouter notamment 
     * des précisions sur les entrées et les sorties de la méthode.
     * Cela a un interet pour nous dev et pour nos collègues
     * mais c'est aussi utile à l'éditeur de code pour nous afficher 
     * des informations en plus lors de l'utilisation de la méthode.
     * Mais cela n'a pas d'impact sur l'éxécution du code par PHP
     * Get the value of name
     */ 
    // 
    public function getName() // get récupérer 
    {
        return $this->name;
    }

    /**
     * Set the value of name
     *
     * @return  self
     */ 
    public function setName($name) // set modifier en écriture
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get the value of created_at
     */ 
    public function getCreatedAt()
    {
        return $this->created_at;
    }


    /**
     * Get the value of updated_at
     */ 
    public function getUpdatedAt()
    {
        return $this->updated_at;
    }

}