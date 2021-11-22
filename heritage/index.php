<?php

require __DIR__.'/Actor.php';
require __DIR__.'/SecretAgent.php';

$seanConnery = new Actor ('Sean Connery');
$seanConnery -> sayHello();
// pour l'accès à une propriété en dehors du code de la classe 
// c'est comme private l'accés est interdit.
// var_dump($seanConnery->name); // ici cela génère une erreur accès interdit 
// Fatal error: Uncaught Error: Cannot access protected property Actor::$name 
// in /var/www/html/S05/S05-projet-oShop-laurasullyalexandrine/heritage/index.php on line 10
// on a donc besoin de passer par un getter ou un setter 
var_dump($seanConnery->getName());
var_dump($seanConnery);

$secretAgent = new AgentSecret('James Bond', 'Aston Martin submersible');
$secretAgent->saySecretAgentHello();
var_dump($secretAgent);
