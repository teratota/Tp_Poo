<?php

class verification
{
    public function verificate_number_player($tab_player)
    {
        $number_player=count($tab_player);
        if($number_player%2==0){
            return 1;
        }else{
            return 0;
        }
    }
    public function check_zero($grid)
    {
        $flag=0;
        foreach($grid as $value){
            if(!in_array("0",$value)){
                $flag++;
            }
        }
        return $flag;
    }
    public function check_grid($grid)
    {
        $return=$this->line($grid);
        if($return["value"]==1){
            return $return;
        }else{
            $return=$this->column($grid);
            if($return["value"]==1){
                return $return;
            }else{
                $return=$this->diag($grid,"blue");
                if($return["value"]==1){
                    return $return;
                }else{
                    return $return;
                }
            }
        }  
    }
    private function line($grid)
    {
        foreach($grid as $value){
            $x = 'blue'; 
            $n = sizeof($value); 
            $return=$this->frequency($value, $n, $x,$i=1); 
            if($return==4){
                $win=array("winner"=>$x,"value"=>1);
                break;
            }else{
                $win=array("winner"=>"rien","value"=>0);
            }
            $x = 'red'; 
            $n = sizeof($value); 
            $return=$this->frequency($value, $n, $x,$i=1); 
            if($return==4){
                $win=array("winner"=>$x,"value"=>1);
                break;
            }
            else{
                $win=array("winner"=>"rien","value"=>0);
            }
        }
        return $win;
    }

    private function column($grid)
    {
        $blue = array (); 
        $red = array (); 
        for($x = 1; $x <= 7; $x++){
            $f=1;
            for ($i = 0; $i <= 5; $i++){ 
                $blue[$i]=$grid[$f][$x];
                $f++;
            }
            $b = 'blue'; 
            $n = sizeof($blue);
            $reponse=$this->frequency($blue, $n-1, $b,$i=0); 
            if($reponse==4){
                $win=array("winner"=>$b,"value"=>1); 
                break;
            }else{
                $win=array("winner"=>"rien","value"=>0);
            }
            $f=1;
            for ($i = 0; $i <= 5; $i++){ 
                $red[$i]=$grid[$f][$x];
                $f++;
            }
            $r = 'red'; 
            $n = sizeof($red);
            $reponse=$this->frequency($red, $n-1, $r,$i=0);
            if($reponse==4){
                $win=array("winner"=>$r,"value"=>1);
                break;
            }else{
                $win=array("winner"=>"rien","value"=>0);
            }
        }  
        return $win;  
    }

    private function diag($grid)
    {
        $tab_diag=array();
        $x=6;
        for($i = 1; $i <= 3; $i++){
            for ($r = 1; $r <= $x; $r++){ 
                $tab_diag[$i][$r]=$grid[$i][$r];
            }
        $x--;
        }
        $x=6;
        $f=4;
        for($i = 2; $i <= 4; $i++){
            for ($r = 1; $r <= $x; $r++){ 
                $tab_diag[$f][$r]=$grid[$r][$r+1];
            }
        $f++;
        $x--;
        }
        $x=6;
        $f=7;
        for($i = 1; $i <= 3; $i++){
            $p=7;
            for ($r = 1; $r <= $x; $r++){ 
                $tab_diag[$f][$r]=$grid[$r][$p];
                $p--;
            }
        $f++;
        $x--;
        }
        $x=6;
        $f=10;
        for($i = 1; $i <= 3; $i++){
            $p=6;
            for ($r = 1; $r <= $x; $r++){ 
                $tab_diag[$f][$r]=$grid[$r][$p];
                $p--;
            }
        $f++;
        $x--;
        }
        foreach($tab_diag as $value){
            $x = 'blue'; 
            $n = sizeof($value); 
            $return=$this->frequency($value, $n, $x,$i=1); 
            if($return==4){
                $win=array("winner"=>$x,"value"=>1);
                break;
            }else{
                $win=array("winner"=>"rien","value"=>0);
            }
            $x = 'red'; 
            $n = sizeof($value); 
            $return=$this->frequency($value, $n, $x,$i=1); 
            if($return==4){
                $win=array("winner"=>$x,"value"=>1);
                break;
            }
            else{
                $win=array("winner"=>"rien","value"=>0);
            }
        }
        return $win;
    }

    private function frequency($a, $n, $x ,$i) 
    { 
        $count = 0; 
        $flag=" ";
        for ($i; $i <= $n; $i++){ 
            if ($count==4){
                break;
            }
            if ($a[$i] === $x && $flag===$x){
                $count++;
            }elseif($a[$i] === $x){
                $count=1;
            }else{
                $count=0;
            }
            $flag=$a[$i]; 
        }
            
        return $count; 
    } 
    
}