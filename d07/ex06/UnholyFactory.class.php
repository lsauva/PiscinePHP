<?php

class UnholyFactory {
    private $_enrolled_fighters = [];

    private function _getEnrolledFighters() { return $this->_enrolled_fighters; }
    private function _setEnrolledFighters($p) { array_push($this->_enrolled_fighters, $p); return; }

    private function _isAlreadyEnrolled($p) {
        if (in_array($p, $this->_getEnrolledFighters()))
            return True;
        else
            return False;
    }

    public function absorb($p) {
        if ( $this instanceof Fighter) {
            if ( $this->_isAlreadyEnrolled($p))
                print('(Factory already absorbed a fighter of type $p)' . PHP_EOL);
            else {
                $this->_setEnrolledFighters($p);
                print('(Factory absorbed a fighter of type $p)' . PHP_EOL);
            }
        }
        else
            print("(Factory can't absorb this, it's not a fighter)" . PHP_EOL );
    }

    public function fabricate($p) {
        foreach ( $this->_getEnrolledFighters() as $fighter) {
            if ($fighter->getFighterType() === $p) {
                print( "(Factory fabricates a fighter of type $p)" . PHP_EOL );
                return clone $fighter;
            }
        }
        print( "(Factory hasn't absorbed any fighter of type $p)" . PHP_EOL );
        return null;
    }
}
?>
