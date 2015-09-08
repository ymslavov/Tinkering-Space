<?php

require_once('Cell.php');
require_once('Matrix.php');
require_once('Robo.php');

class Program {
protected $input;
protected $matrixWidth;
protected $matrixHeight;
protected $robittaX;
protected $robittaY;

public function __construct($input){
$this->parseInput($input);

//create matrix
$matrix = new Matrix($this->matrixWidth, $this->matrixHeight);
$matrix->setRobitta($this->robittaX, $this->robittaY);

//start walk
$robo = new Robo;
return $robo->startWalk($matrix);
}

protected function parseInput($input){
$initSplit = preg_split('/( \| )|(x)|\s/',$input);

$this->matrixWidth = $initSplit[0];
$this->matrixHeight = $initSplit[1];
$this->robittaX = $initSplit[3];
$this->robittaY = $initSplit[2];
}
}