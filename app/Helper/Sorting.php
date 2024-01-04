<?php

namespace App\Helper;

class Sorting {
    
    public $newToOld  = 'New To Old';
    public $best  = 'Best Sellers';
    public $oldToNew  = 'Old To New';
    public $highToLow = 'High To Low';
    public $lowToHigh = 'Low To High';
      public $dhighToLow = 'dHigh To Low';
    public $dlowToHigh = 'dLow To High';
    public function getList()
    {
        $shorting = [$this->newToOld, $this->oldToNew, $this->highToLow, $this->lowToHigh,$this->best];
        return $shorting;
    }

    public function getValue($value)
    {
         if ($value == $this->best) {
            return $this->best;
        }elseif ($value == $this->oldToNew) {
            return $this->oldToNew;
        }
        elseif ($value == $this->highToLow) {
            return $this->highToLow;
        }
        elseif ($value == $this->lowToHigh) {
            return $this->lowToHigh;
        }
        elseif ($value == $this->dhighToLow) {
            return $this->dhighToLow;
        }
        elseif ($value == $this->dlowToHigh) {
            return $this->dlowToHigh;
        }
        else {
            return $this->newToOld;
        }
    }
}