<?php

class NightsWatch implements IFighter{
    private $_nw = [];

    private function _getNw() { return $this->_nw; }
    private function _setNw($p) { array_push($this->_nw, $p); return; }

    public function recruit($p) {
        $interfaces = class_implements($p);
        if (isset($interfaces['IFighter']))
            $this->_setNw($p);
    }

    public function fight() {
        foreach ($this->_getNw() as $p) {
            $p->fight();
        }
    }
}
?>
