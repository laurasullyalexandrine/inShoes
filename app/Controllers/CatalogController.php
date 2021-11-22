<?php

class CatalogController extends CoreController {

    public function categoryAction($params) {
        // dump($params);
        $categoryId = $params ['id'];
        // dump($categoryId);

        // Pour tester nos modèles, on va essayer d'afficher la liste de la tous les produits, 
        // prochainement on affichera uniquement
        // les produits de la catégorie demandée

        $productObject = new Product();
            // lorsque que veut faire appelle à une méthode on doit d'abbord l'instancier
        $productList = $productObject->findAll();
            // Ensuite on appelle cette méthode, en retour on va avoir une liste 
            // un tableau qui contient toute la liste des produits
            // si je veux rajouter une autre information un seul endroit qui transmet 
            // toutes les informations aux views c'est la méthode show


        // Si on veut récupérer les données de la catégorie à afficher
        // on fait appels à nos modèles
        $this->show ('category', [
            'id_category' => $categoryId,
            'products_list' => $productList
        ]);
    }

    public function typeAction($params) {
        // dump($params);
        $typeId = $params ['id'];
        // dump($typeId);
        $this->show ('type', [
            'id_type' => $typeId
        ]);
    }

    public function brandAction($params) {
        // dump($params);
        $brandId = $params ['id'];
        // dump($brandId);
        $this->show ('brand', [
            'id_brand' => $brandId
        ]);
    }

    public function productAction($params) {
        // dump($params);
        $productId = $params ['id'];
        // dump($productId);
        $this->show ('product', [
            'id_product' => $productId
        ]);
    }
}