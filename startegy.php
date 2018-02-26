<?php
abstract class AbstractCharacter {
    public $weapon;

    abstract public function talk();

    public function setWeapon($weapon) {
        $this->weapon = $weapon;
    }

    public function attack() {
        if(isset($this->weapon)) {
            return $this->weapon->damage();
        } else {
            throw new Exception('You must use setWeapon() function.');
        }
    }
}

interface WeaponBehavior {
    public function damage();
}

class Sword implements WeaponBehavior {
    public function damage() {
        return 150;
    }
}

class Axe implements WeaponBehavior {
    public function damage() {
        return 100;
    }
}

class Blunt implements WeaponBehavior {
    public function damage() {
        return 120;
    }
}

class King extends AbstractCharacter {
    public function __construct() {
        $this->weapon = new Sword();
    }

    public function talk() {
        echo "I\'m the King!";
    }
}

$king = new King();
$king->talk();
$king->setWeapon(new Axe());
echo $king->attack();

