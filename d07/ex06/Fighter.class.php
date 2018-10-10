<?php

abstract class Fighter {
    private $fighter_type;

    public function getFighterType() { return $this->fighter_type; }
    public function setFighterType($n) { $this->fighter_type  = $n; return; }

    public function __construct($n) {
        $this->setFighterType($n);
    }

    public abstract function fight($target);

    public function __toString() {
        return $this->getFighterType();
    }
}
?>
