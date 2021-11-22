<?php

class MainController extends CoreController {

public function homeAction() {
    $this->show('home');
}

public function legalMentionAction() {
    $this->show('mention-legale');
}

public function testAction() {
    // $productObjet = new Product(); // instancier un nouvel objet 
    // $productObjet ->findAll(); // et après appeller la méthode

    // Récuperer le produit ayant l'id 12
    // $productObjet = new Product();
    // dump($productObjet->find(12));

    // Récuperer la liste de toutes les cats
    $categoryObjet = new Category();
    dump($categoryObjet->find(5));
}

// ici on traite la cas avec cette méthode de la page non trouvée cela affichera la page 404.tpl.php
public function pageNotFoundAction() {
    header("HTTP/1.0 404 Not Found");
    $this->show('404');
    }
    
}

