

<?php
echo 'je suis le  '
// Ici je fait appelle à mon tableau associatif contenu dans ma variable $viewVars contenu elle dans ma méthode show
// dump($viewVars); ?>

<!--Ensuite ici pour le test je fait appelle à l'id de mon tableau associatif et il m'affichera bien l'id saisie dans l'url-->
TYPE n° <?= $viewVars['id_type']. ' !'?>