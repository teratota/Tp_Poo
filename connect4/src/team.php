<?php

class team extends verification
{
    private $team=[
        0=>'blue',
        1=>'blue',
        2=>'red',
        3=>'red',
    ];

    public function select_team($player)
    {
        $number_player=count($player);
        $this->shuffletable();
        $x=0;
        for($i=1;$i<=$number_player;$i++){
            $player["player".$i]['team']=$this->team[$x];
            $player["player".$i]['token_color']=$this->team[$x];
            $x++;
        }
        return $player;  
    }
    private function shuffletable()
    {
        shuffle($this->team);
    }
}