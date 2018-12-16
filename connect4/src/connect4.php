<?php

final class connect4
{
    function run()
    {
        $create_player= new create_player;
        $team= new team;
        $course_game= new course_game;
        $game_initialization= new game_initialization;
        $player=$create_player->create();
        echo "Initialistion des joueurs";
        echo "<br>";
        print_r($player);
        echo "<br>";
        echo "Initialistion de la grille";
        $grid=$game_initialization->create_grid();
        echo "<br>";
        print_r($grid);
        echo "<br>";
        echo "Choix aléatoire des équipes(bleu ou rouge)";
        echo "<br>";
        $team=$team->select_team($player);
        print_r($team);
        echo "<br>";
        echo "Choix aléatoire du premier participant";
        echo "<br>";
        $player=$course_game->first_player($team);
        print_r($player);
        echo "<br>";
        $course_game->token_position($grid,$player);
    }
    
}