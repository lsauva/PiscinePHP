<?php

abstract class House {
    abstract public function getHouseName();
    abstract public function getHouseMotto();
    abstract public function getHouseSeat();

    public function introduce() {
        print("House ");
        print(static::getHouseName());
        print(" of ");
        print(static::getHouseSeat());
        print(" : \"");
        print(static::getHouseMotto());
        print("\"\n");
    }
}
?>
