<?php

class course_game extends verification
{
    public function first_player($player)
    {
        $ramdomInt=$this->generateRamdomInt(1,4);
        $table["player1"]=$player["player".$ramdomInt];
        unset($player["player".$ramdomInt]);
        ksort($player);
        $i=1;
        $x=2;
        while(count($player)!=0){
            foreach($player as $value => &$players){
                if($players['team']!=$table["player".$i]["team"]){
                    $table["player".$x]=$players;
                    unset($player[$value]);
                    break;
                }
            }
            $i++;
            $x++;
        }  
        return $table;
    }
    public function token_position($grid,$player)
    {
        $i=1;
        while(1){
            echo "<br>";
            echo "tour".$i;
            foreach($player as $value => &$players){
                $x=6;
                $ramdomInt=$this->generateRamdomInt(1,7);
                while(1){
                    if($grid[$x][$ramdomInt]===0){
                        if($x==1){
                            $grid[$x][$ramdomInt]=$players['token_color'];
                            echo "<br>";
                            echo $value." ".$x.",".$ramdomInt."  ";
                            break;
                        }
                        $x--;
                    }else{
                        $x++;
                        if($x==7){
                                $ramdomInt=$this->generateRamdomInt(1,7); 
                                $x=6; 
                        }else{
                                $grid[$x][$ramdomInt]=$players['token_color'];
                                echo "<br>";
                                echo $value." ".$x.",".$ramdomInt."  ";
                                break;
                        } 
                    }
                }
                $return=$this->check_grid($grid);
                if($return["value"]==1){
                    break;
                }
                $flag=$this->check_zero($grid);
                if($flag==6){
                    break;
                }
            }
            if($flag==6){
                echo "Partie terminée egalité";
                break;
            }
            if($return["value"]==1){
                echo "<br>";
                echo "<br>";
                echo "Partie terminée les ".$return["winner"]." gagne";
                break;
            }
            echo "<br>";
            $i++;
        }
    }
    private function generateRamdomInt($min,$max)
    {
        return rand($min,$max);
    }
}