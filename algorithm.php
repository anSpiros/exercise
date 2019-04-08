<?php 
    require 'ReadLines.php';

    // class SetUpCoordinates {
    //     function __construct() {

    //     }
    // }
    // var_dump($argv);

    function changeDirection(&$current_rover_position,$direction){
        if($direction == 'L') {
            if($current_rover_position['facing'] == 'N') {
                $current_rover_position['facing'] = 'W';
            }elseif($current_rover_position['facing'] == 'W') {
                $current_rover_position['facing'] = 'S';
            }elseif($current_rover_position['facing'] == 'S') {
                $current_rover_position['facing'] = 'E';
            }else {
                $current_rover_position['facing'] = 'N';
            }
        } else{
            if($current_rover_position['facing'] == 'N') {
                $current_rover_position['facing'] = 'E';
            }elseif($current_rover_position['facing'] == 'E') {
                $current_rover_position['facing'] = 'S';
            }elseif($current_rover_position['facing'] == 'S') {
                $current_rover_position['facing'] = 'W';
            }else {
                $current_rover_position['facing'] = 'N';
            }
        }
    }

    $arr = array(
        'coordinates' => null, 
        'position' => null,
        'move' => null
    );
    echo "If you want to exit , type exit! \n";
    echo "How many rovers do you want? ";
    $handle = fopen ("php://stdin","r");
    $rovers = fgets($handle);
    $rovers = trim($rovers);

    $output = array();

    for($i = 1; $i <= $rovers; $i++ ) {
        $read = new ReadLines($rovers);
        $arr['starting_coordinates'] = $read->read_and_return('coordinates',$i);
        $arr['rover_position'] = $read->read_and_return('position',$i);
        $arr['move_sequence'] = $read->read_and_return('move',$i);

        // var_dump($arr);

        //starting points
        $starting_point = explode(" ", $arr['starting_coordinates']);
        $starting_point['x'] = $starting_point[0];
        $starting_point['y'] = $starting_point[1];

        // // current position
        $current_rover_position = explode(" ", $arr['rover_position']);
        $current_rover_position['x'] = $current_rover_position[0];
        $current_rover_position['y'] = $current_rover_position[1];
        $current_rover_position['facing'] = $current_rover_position[2];

        //move sequence
        $move_direction = str_split($arr['move_sequence']);
        foreach ($move_direction as $char) {
            if($char == 'L') {
                changeDirection($current_rover_position,'L');
            }elseif($char == 'R') {
                changeDirection($current_rover_position,'R');
            }elseif($char == 'M') {
                // var_dump($current_rover_position);
                if($current_rover_position['facing'] == 'S') {
                    $current_rover_position['x'] = (int)$current_rover_position['x'] - 1;
                    echo "x = ". (int)$current_rover_position['x'];
                }elseif($current_rover_position['facing'] == 'N') {
                    $current_rover_position['x'] = (int)$current_rover_position['x'] + 1;
                    echo "x = ". (int)$current_rover_position['x'];
                }elseif($current_rover_position['facing'] == 'W') {
                    $current_rover_position['y'] = (int)$current_rover_position['y'] - 1;
                    echo "y = ". (int)$current_rover_position['y'];
                }elseif($current_rover_position['facing'] == 'E') {
                    $current_rover_position['y'] = (int)$current_rover_position['y'] + 1;
                    echo "y = ". (int)$current_rover_position['y'];
                }
            }
        }

        echo "\n".$current_rover_position['x']." ".$current_rover_position['y']." ". $current_rover_position['facing']."\n";
    }
    
?>