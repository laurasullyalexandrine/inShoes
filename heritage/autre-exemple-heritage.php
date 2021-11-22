<?php 

class Animal {

    protected $estVivant = true;

    protected function manger() {
        echo 'Miam' . '<br>';
    }

    protected function dormir() {
        echo 'Rrrrrrrrr'.'<br>';
    }

    protected function mourir() {
        $this->estVivant = false;
        echo "Je crois que c'est la fin...sniff...<br>";
    }
}

class Chien extends Animal {
    protected $nombreDePattes = 4;

    protected function aboyer() {
        echo 'Ouaf !<br>';
    }

    // Bonus : on peut éventuellement surcharger => réécrire
    // la méthode présente dans le parent
    /*protected function dormir() {
        echo 'Rrrrrrrrr Pfffffffff'.'<br>';
    }*/
}

class EpagneulBreton extends Chien {

    // Comme aucun chien ne peut hériter de l'Epagneul Breton
    // on peut laisser la méthode chasser en private
    private function chasser() {
        echo "Ca sent le gibier, je vais suivre la piste.<br>";
    }

    public function vieMaVie() {
        $this->aboyer(); // J'essaie de dire quelque chose à son maître mais il comprend jamais rien
        $this->chasser(); // C'est mon activité favorite
        $this->manger(); // Ca fait du bien de reprendre des forces
        $this->dormir(); // Ca fait du bien de se reposer
    }
}

class BorderCollie extends Chien {
    private function troupeauter() {
        echo 'Pas bouger les moutons !<br>';
    }

    public function vieMaVie() {
        $this->aboyer(); // J'essaie de dire quelque chose à son maître mais il comprend jamais rien
        $this->troupeauter(); // C'est mon activité favorite
        $this->manger(); // Ca fait du bien de reprendre des forces
        $this->dormir(); // Ca fait du bien de se reposer
    }
}

echo '---------------------------'.'<br/>';
echo 'Ton chien (Epagneul Breton)'.'<br/>';
echo '---------------------------'.'<br/>';
$tonChien = new EpagneulBreton();
$tonChien->vieMaVie();
var_dump($tonChien);

echo '---------------------------'.'<br/>';
echo 'Mon chien (BorderCollie)'.'<br/>';
echo '---------------------------'.'<br/>';
$monChien = new BorderCollie();
$monChien->vieMaVie();
var_dump($monChien);