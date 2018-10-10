<?php

Class Exemple {

    // public $foo = 0;
    private $_att = 0;
    private $_x = 0;
    private $_y = 0;

    public function getX() { return $this->_x; }
    public function getY() { return $this->_y; }

    public function setX($x) { $this->_x = $x; return; }
    public function setY($y) { $this->_y = $y; return; }

    public function getAtt() { return $this->_att; }

    public function setAtt( $v ) { $this->_att = $v; return; }

    // public function __construct(array $kwargs) {
    public function __construct() {
        print( 'Constructor called' . PHP_EOL);
		// print('$this->foo: ' . $this->foo . PHP_EOL);
		// $this->foo = 42;
		// print('$this->foo: ' . $this->foo . PHP_EOL);
		// $this->bar();
        $this->setAtt($kwargs['arg']);
        return;
    }

    public function __destruct() {
        print( 'Destrcutor called' . PHP_EOL );
        return;
    }

    public function __toString() {
        return 'Exemple( $_att = ' . $this->getAtt() . ')';
    }

    public function bar() {
        print( 'Method bar called' . PHP_EOL );
        readfile('../ex00/Color.doc.txt');
        print(PHP_EOL);
        return;
    }

    public function __invoke() {
        return $this->getX() + $this->getY();
    }
}

// $instance = new Exemple( array('arg' => 42 ));
$instance = new Exemple();
// print( $instance . PHP_EOL );
$instance->setX( 10 );
$instance->setY( 32 );
print($instance() . PHP_EOL);

// (1ere video) : sans $this
// print('$instance->foo: ' . $instance->foo . PHP_EOL);
// $instance->foo = 42;
// print('$instance->foo: ' . $instance->foo . PHP_EOL);

$instance->bar();
?>
