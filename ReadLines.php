<?php 
    class ReadLines {
        private $isDone = false;
        
        public function read_and_return($type,$rover_number) {
            if($type == 'coordinates') {
                // reset the variable
                $this->isDone = false;
                return $this->readCoordinates($rover_number);
            } elseif($type == 'position') {
                // reset the variable
                $this->isDone = false;
                return $this->readPosition($rover_number);
            } else {
                // reset the variable
                $this->isDone = false;
                return $this->readMove($rover_number);
            }
            
        }

        private function readCoordinates($rover_number) {
            do{
                echo "Give starting coordinates for rover $rover_number: ";
                $handle = fopen ("php://stdin","r");
                $line = fgets($handle);
                $line = trim($line);
                // echo gettype((int)$line);
                if ( preg_match('@\s@s',$line) ){
                    echo "\n";
                    $this->isDone = true;
                    return $line;

                }else {
                    if($line == 'exit') { 
                        exit;
                    }
                    echo "\n";
                    echo "Must provide coordinates with spaces\n";
                }
            }while(!$this->isDone);
        }
        private function readPosition($rover_number) {
            do{
                echo "Give starting position of rover $rover_number: ";
                $handle = fopen ("php://stdin","r");
                $line = fgets($handle);
                $line = trim($line);
                if ( preg_match('@\s@s',$line) ){
                    echo "\n";
                    $this->isDone = true;
                    return $line;

                }else {
                    if($line == 'exit') { 
                        exit;
                    }
                    echo "\n";
                    echo "Must provide position with spaces\n";
                }
            }while(!$this->isDone);
        }
        private function readMove($rover_number) {
            do{
                echo "Give move sequence of rover $rover_number: ";
                $handle = fopen ("php://stdin","r");
                $line = fgets($handle);
                $line = trim($line);
                if(strlen($line) > 4) {
                    echo "\n";
                    $this->isDone = true;
                    return $line;
                } else {
                    echo "\n";
                    echo "Must provide at least 5 moves \n";
                }
            }while(!$this->isDone);
        }
    }


?>