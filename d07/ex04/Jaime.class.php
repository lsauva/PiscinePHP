<?php

class Jaime extends Lannister {
    public function sleepWith($p) {
        if (!($p instanceof Cersei))
            parent::sleepWith($p);
        else
            print("With pleasure, but only in a tower in Winterfell, then." . PHP_EOL);
    }
}
?>
