<?php 
    require 'ReadLines.php';

    // class SetUpCoordinates {
    //     function __construct() {

    //     }
    // }
    // var_dump($argv);

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

    for($i = 1; $i <= $rovers; $i++ ) {
        $read = new ReadLines($rovers);
        $arr['coordinates'] = $read->read_and_return('coordinates',$i);
        $arr['position'] = $read->read_and_return('position',$i);
        $arr['move'] = $read->read_and_return('move',$i);

        var_dump($arr);

        //starting points
        $starting_point = explode(" ", $arr['coordinates']);
        $starting_point['x'] = $starting_point[0];
        $starting_point['y'] = $starting_point[1];

        // current position
        $current_position = explode(" ", $arr['position']);
        $current_position['x'] = $current_position[0];
        $current_position['y'] = $current_position[1];
        $current_position['facing'] = $current_position[2];

        //move sequence
        
    
    }
?>