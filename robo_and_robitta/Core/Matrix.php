<?php
class Matrix {
    protected $width;
    protected $height;
    protected $cells = array();

    public function __construct($width, $height){
        $this->width = $width;
        $this->height = $height;

        for($x = 0; $x < $width; $x++){
            for($y = 0; $y < $height; $y++){
                $this->addCell($y, $x);
            }
        }
    }

    public function setRobitta($x, $y){
        $this->getPosition($x-1,$y-1)->setRobittaHere();
    }

    public function addCell($x,$y){
        $this->cells[$x][$y] = new Cell;
    }

    public function getPosition($x,$y){
        return (isset($this->cells[$y][$x])) ? $this->cells[$y][$x] : null;
    }

    public function countCells(){
        return $this->width*$this->height;
    }
}