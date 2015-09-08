<?php

class Cell {
    protected $visited=false;
    protected $robittaIsHere=false;

    public function setRobittaHere(){
        $this->robittaIsHere = true;
    }

    public function isRobittaHere(){
        return $this->robittaIsHere;
    }

    public function makeVisited(){
        $this->visited = true;
    }

    public function isVisited(){
        return $this->visited;
    }
}