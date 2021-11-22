<?php

// inclusion des classes
// __DIR__ le chemin absolu du repertoire dans lequel se trouve 
// le fichier qui fait référence au DIR
require __DIR__.'/../app/Controllers/CoreController.php'; 
require __DIR__.'/../app/Controllers/MainController.php';
require __DIR__.'/../app/Controllers/CatalogController.php';

// on inclue égalements les models

require __DIR__.'/../app/Models/CoreModel.php'; 
// Il faut inclure CoreModel avant tous les autres car maintenant 
// c'est qui possède les propriétés et function commun aux autres modèles
require __DIR__.'/../app/Models/Brand.php';
require __DIR__.'/../app/Models/Product.php';
require __DIR__.'/../app/Models/Category.php';
require __DIR__.'/../app/Models/Type.php';

require __DIR__.'/../app/Utils/Database.php';

// Inclusion spéfique pour Utiliser les dépendances installées avec 'composer'
require __DIR__.'/../vendor/autoload.php';

// --------------------------------------------------------------
// Préparation d'AltoRouter
// --------------------------------------------------------------
$router = new AltoRouter();

// Comme la racine de notre site oShop n'est pas située à la racine 
// du serveur web (qui est elle est directement localhost/ située dans /var/www/html c'est la racine du rep)
// on doit préciser ou se situe la racine de oShop
// Pourquoi ? => pour permettre à AltoRouter d'analyser la bonne partie de l'url
// Par exemple pour l'url :
// http://localhost/S05/S05-projet-oShop-laurasullyalexandrine/public/catalogue/category
// on veut que AltoRouter analyse la partie après '/public' => '/catalogue/category'
// on pourrait donner la racine de notre site en dur comme ceci :
// $router->setBasePath('/S05/S05-projet-oShop-laurasullyalexandrine/public');
// Problème ça ne marchera pas pour toute la promo car personne n'est exactement la meme 
// structure de répertoires
// Heureusement, avec $_SERVER['BASE_URI'] dont la valeur est calculée par le fichier .htaccess
// présent dans notre répertoire public on aura une valeur dynamique qui sera dispo pour tout le monde
dump($_SERVER['BASE_URI']);
// $router->setBasePath('/S05/S05-projet-oShop-laurasullyalexandrine/public'); donc on n'a plus besoin de cette ligne de code qui traitait un cas unique
$router->setBasePath($_SERVER['BASE_URI']);

// Définition des routes

// Pour la page d'accueil
$router->map( // arguments fournis en entrée de notre méthode 'map'
    'GET', // La méthode HTTP qui est autorisée pour cette route
    '/', // la partie d'url apres la racine di site qui correspond à la page demandée
    [
        'controller' => 'MainController',
        'method' => 'homeAction'
    ],
     // les informations qu'on récupèrera plus tard si on tombe sur cette route 
    'home' // un identifiant unique pour cette route
 );

 $router->map( // arguments fournis en entrée de notre méthode 'map'
    'GET', // La méthode HTTP qui est autorisée pour cette route
    '/test/', // la partie d'url apres la racine di site qui correspond à la page demandée
    [
        'controller' => 'MainController',
        'method' => 'testAction'
    ],
     // les informations qu'on récupèrera plus tard si on tombe sur cette route 
    'test' // un identifiant unique pour cette route
 );

  // route pour la page affichant les mentions légales
$router->map( // arguments fournis en entrée de notre méthode 'map'
    
    'GET', // La méthode HTTP qui est autorisée pour cette route
    '/mention-legale/', // la partie d'url apres la racine du site qui correspond à la page demandée
    [
        'controller' => 'MainController',
        'method' => 'legalMentionAction'
    ],
    
     // les informations qu'on récupèrera plus tard si on tombe sur cette route 
    'mention-legale', // un identifiant unique pour cette route
 );


 // route pour la page affichant une catégorie et tous les produits associés
$router->map( // arguments fournis en entrée de notre méthode 'map'
    'GET', // La méthode HTTP qui est autorisée pour cette route
    '/catalog/categorie/[i:id]', // i correspond à la recherche d'un entier
                                // id correspond au nom de la clé qui contiendra
                                // la valeur de cet entier dans un tableau par 
                                // extrait dans $match
    // la partie d'url apres la racine du site qui correspond à la page demandée
    [
        'controller' => 'CatalogController',
        'method' => 'categoryAction'
    ],
     // les informations qu'on récupèrera plus tard si on tombe sur cette route 
    'catalog-category' // un identifiant unique pour cette route
 );

  // route pour la page affichant une catégorie et tous les produits associés
$router->map( // arguments fournis en entrée de notre méthode 'map'
    'GET', // La méthode HTTP qui est autorisée pour cette route
    '/catalog/type/[i:id]', // la partie d'url apres la racine du site qui correspond à la page demandée
    [
        'controller' => 'CatalogController',
        'method' => 'typeAction'
    ],
     // les informations qu'on récupèrera plus tard si on tombe sur cette route 
    'catalog-type' // un identifiant unique pour cette route
 );

   // route pour la page affichant une catégorie et tous les produits associés
$router->map( // arguments fournis en entrée de notre méthode 'map'
    'GET', // La méthode HTTP qui est autorisée pour cette route
    '/catalog/brand/[i:id]', // la partie d'url apres la racine du site qui correspond à la page demandée
    [
        'controller' => 'CatalogController',
        'method' => 'brandAction'
    ],
     // les informations qu'on récupèrera plus tard si on tombe sur cette route 
    'catalog-brand' // un identifiant unique pour cette route
 );

    // route pour la page affichant une catégorie et tous les produits associés
$router->map( // arguments fournis en entrée de notre méthode 'map'
    'GET', // La méthode HTTP qui est autorisée pour cette route
    '/catalog/product/[i:id]', // la partie d'url apres la racine du site qui correspond à la page demandée
    [
        'controller' => 'CatalogController',
        'method' => 'productAction'
    ],
     // les informations qu'on récupèrera plus tard si on tombe sur cette route 
    'catalog-product' // un identifiant unique pour cette route
 );
 

 // On regarde s'il y a une route pour la page demandée
 // On demande à AltoRouter est ce que tu as trouvé une route ?
 $match = $router->match();
 // dump($match);

 if($match) { 
     // Et lui répond oui j'ai trouvé une route et nous on dit si tu as trouvé une route alors :

     // => d'abbord check le bon controller 
     // ici maintenant on récupère le bon controller à instancier
     $controllerToUse = $match['target']['controller'];
     // dump($controllerToUse);

     // ensuite fais appelle à la bonne méthode située dans le MainController
     $methodToCall = $match ['target']['method'];
     // dump($methodToCall);

     // on récupère les paramètres (données dynamiques) issues de l'url qui ont été extraites par AltoRouter lors du ->match()
         $params = $match['params'];

     // on instancie le bon contrôleur (soit MainController ou CatalogController)
     // la variable $controller ira chercher selon la route le MainController qui gère la home etc 
     // ou le CatalogController qui gère le catalogue et ses ++ catagories
     $controller = new $controllerToUse($router);
    // dump($controller);

     // ici on appelle la méthode du controleur qui permettra d'afficher l'élément central
     $controller->$methodToCall($params);
    // Pour l'accueil
    // $methodToCall vaut 'homeAction'
    // et PHP appelera donc $controller ->homeAction();
    
    }
    else {
        // Si on ne trouve pas de route => erreur 404
        $mainController = new MainController();
        $mainController->pageNotFoundAction();
    }



// --------------------------------------------------------------
// Récupération de la page à afficher
// --------------------------------------------------------------


// ____________________________Ancienne méthode__________________________________________
// 
// var_dump($_GET);
// exit();

// Par défaut, on veut afficher la page d'accueil
// $pageToDisplay = '/';

// if (isset($_GET['_url']) && $_GET['_url'] !== '')  {
    // Si une valeur est fournie pour le paramètre d'url '_url'
    // alors on remplace la valeur de $pageToDisplay par celle
    // trouvée dans $_GET['_url']
    // $pageToDisplay = $_GET['_url'];
// }

// var_dump($pageToDisplay);

// --------------------------------------------------------------
// On définit l'ensemble des routes de notre site
// --------------------------------------------------------------

// $routes = [
    // '/' => 'homeAction',

// ];

// dump($routes);
// ____________________________Ancienne méthode__________________________________________



// On regarde si il y a une route pour la page demandée ?
// if (isset($routes[$pageToDisplay])) {

    // $mainController = new MainController();
    // on récupère la méthode à appeler dans le MainController

    // $methodCall = $routes[$pageToDisplay];

    // on appelle la méthode du contrôleur
    // $mainController->$methodCall();
    // Pour l'accueil, $pageToDisplay vaut '/'
    // $methodCall vaut homeAction
    // et Php appelera donc : $mainController->homeAction();

// }
// else {
    // Si on ne trouve pas de route => erreur 404
    // $mainController = new MainController();
    // $mainController->pageNotFoundAction();
// }

// ____________________________Ancienne méthode__________________________________________