<?php

class CoreController {
    /* On ne souhaite pas utiliser show en dehors de la classe CatalogController
    => on peut donc la mettre en private */
    protected function show($viewName, $viewVars = []) {

        // c'est pas recommandé t'utiliser 'global' mais accessible de donner 
        // accès à la variable $router (définie dans index.php) dans la méthode show
        // au lieu de faire des choses trop compliquées à ce stade de la formation
        // en utilisant 'global' $router qui est défini à l'extérieur de show sera accessible ici
        global $router;

        // on rajoute une variable contenant le chemin vers de mon rep. public
       $absoluteUrl = $_SERVER ['BASE_URI'].'/';
        //dump($absoluteUrl);
        // On récupure les infos communes à toutes les pages
        // on récupère les 5 marques présentes dans le footer
        // instancier un nouvel objet de la class Brand
        $brandObject = new Brand();
        // Ensuite on applique la méthode
        $footerBrands = $brandObject->findFooterBrands();

        $typeObject = new Type();
        // Ensuite on applique la méthode
        $footerType = $typeObject->findAllForFooter();
        
        // $viewVars est disponible dans chaque fichier de vue
        require_once __DIR__.'/../views/header.tpl.php';
        require_once __DIR__.'/../views/'.$viewName.'.tpl.php';
        require_once __DIR__.'/../views/footer.tpl.php';
    }


}