<?php
class Robo {
    protected $nuts = -1;
    protected $matrix;
    protected $currentX=0;
    protected $currentY=0;
    protected $dirHorizontal=1;
    protected $dirVertical=0;

    public function startWalk(Matrix $matrix){
        $this->matrix = $matrix;

        for($steps = 0; $steps <= $matrix->countCells(); $steps++){
            $this->makeStep();
        }
    }

    protected function addNut(){
        $this->nuts++;
    }

    protected function makeStep(){
        $currCell = $this->getCurrentCell();

        //add a nut
        $this->addNut();

        //if you find Robitta break, else mark as visited and move
        if(!$currCell->isRobittaHere()){
            //mark current cell as visited
            $currCell->makeVisited();

            //decide direction for next step
            $this->decideNextDirection();

            //move
            $this->updateCoordinates();
        }else{
            echo $this->nuts;
            exit;
        }
    }

    protected function decideNextDirection(){
        if($this->isGoingRight() && $this->nextCellNotValid()){
            $this->turnDown();
        }else if($this->isGoingDown() && $this->nextCellNotValid()){
            $this->turnLeft();
        }else if($this->isGoingLeft() && $this->nextCellNotValid()){
            $this->turnUp();
        }else if($this->isGoingUp() && $this->nextCellNotValid()){
            $this->turnRight();
        }
    }

    protected function updateCoordinates(){
        $this->currentX += $this->dirHorizontal;
        $this->currentY += $this->dirVertical;
    }

    protected function turnRight(){
        $this->dirHorizontal=1;
        $this->dirVertical=0;
    }

    protected function turnLeft(){
        $this->dirHorizontal=-1;
        $this->dirVertical=0;
    }

    protected function turnUp(){
        $this->dirHorizontal=0;
        $this->dirVertical=-1;
    }

    protected function turnDown(){
        $this->dirHorizontal=0;
        $this->dirVertical=1;
    }

    protected function isGoingRight(){
        return $this->dirHorizontal == 1;
    }

    protected function isGoingLeft(){
        return $this->dirHorizontal == -1;
    }

    protected function isGoingUp(){
        return $this->dirVertical == -1;
    }

    protected function isGoingDown(){
        return $this->dirVertical == 1;
    }

    protected function nextCellNotValid(){
        $cell = $this->getNextCell();
        return is_null($cell) || $cell->isVisited();
    }

    protected function getCurrentCell(){
        return $this->matrix->getPosition($this->currentX, $this->currentY);
    }

    protected function getNextCell(){
        return $this->matrix->getPosition($this->currentX+$this->dirHorizontal, $this->currentY+$this->dirVertical);
    }
}