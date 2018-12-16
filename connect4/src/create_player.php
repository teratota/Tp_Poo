<?php

final class create_player extends verification
{
    public $tab_player = array();
    public $player=array();


    public function create()
    {
        for($i=1;$i<=4;$i++){
            $this->player[$i]=[
                'id' => $this->generateuniqid(),
                'team' => 'nope',
                'token_color'=>'nope'
            ];
            $this->tab_player["player".$i]=$this->player[$i];
        }
        $verif_tab=$this->verificate_number_player($this->tab_player);
        if($verif_tab==1){
            return $this->tab_player;
        }else{
            echo"le nombre de participant est impaire";
        }
    }

    private function generateuniqid()
    {
        return uniqid();
    }
}