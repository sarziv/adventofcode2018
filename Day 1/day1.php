<?php
//Day 1
$file = fopen("input.txt", "r") or die("Problem");

    function part1($file) {
        $count = 0;
        while(!feof($file)){
            $char = fgetc($file)[0];
            $line = fgets($file);
            $number = substr($line, 0);

            if($char == "+"){
                $count = $count + $number;
            }else{
                $count = $count - $number;
            }
        }
        echo $count;
    }

    function part2($file) {
        $count_loop= 0;
        $count = 0;
        $freq_list = array();
        while(true){
            $char = fgetc($file)[0];
            $line = fgets($file);
            $number = substr($line, 0);
            if(feof($file)){
                fseek($file,0);
            }
            if($char == "+"){
                $count = $count + $number;
            }else{
                $count = $count - $number;
            }

            if(in_array($count,$freq_list)){
                echo $count . " Found";
                break;
            }else{
                array_push($freq_list,$count);
            }
            $count_loop++;

            echo "iteration: " . $count_loop ." Number ". $count."\n";

        }
    }

//part1($file);
//part2($file);







