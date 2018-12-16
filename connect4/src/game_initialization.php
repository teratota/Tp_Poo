<?php

class game_initialization
{
	public $table = array();
	
	public function create_grid()
    {
    	for ($x = 1; $x <= 6; $x++) {
            for ($i = 1; $i <= 7; $i++) {
                $this->table[$x][$i]=0;
            }
        }
        return  $this->table;
    }
}