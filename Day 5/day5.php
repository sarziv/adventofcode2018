<?php
//Day 5

$file = fopen("input5.txt", "r") or die("Problem");
//copy of the file
function part1 ($file)
{
    $count = 0;
    $line = fgets($file);
    $array = str_split($line, 1);
    $size = sizeof($array);
    while ($size - 1 >= $count) {
        if (strcasecmp($array[$count], $array[$count + 1]) == 0) {
            if (ctype_lower($array[$count]) == ctype_upper($array[$count + 1]) || (ctype_upper($array[$count]) == ctype_lower($array[$count + 1]))) {
                echo "Found: " . $array[$count] . " " . $array[$count + 1] . "\n";
                unset($array[$count]);
                unset($array[$count + 1]);
                $size = $size - 2;
                $array = array_values($array);
                $count = 0;
            }
        }
        $count++;
    }

    echo "Answer Found:\n";
    foreach ($array as $item) {
        echo $item;
    }
    echo "\n";
    echo "Alchemical Reduction: " . ($size)-2;
}

function part2 ($file)
{
    $min= array();
    $count = 0;
    $line = fgets($file);
    $array = str_split($line, 1);

    foreach (range('A', 'Z') as $char) {
        $count_letter = 0;
        foreach ($array as $value) {
            if ($value == $char) {
                unset($array[$count_letter]);
            } elseif ($value == strtolower($char)) {
                unset($array[$count_letter]);
            }
            $count_letter++;
        }

        $array = array_values($array);
        $size = sizeof($array);

        echo "Without: " . $char . "\n";
        //size is +1 then count what whatever
        while ($size >= $count) {
            if (strcasecmp($array[$count], $array[$count + 1]) == 0) {
                if (ctype_lower($array[$count]) == ctype_upper($array[$count + 1]) || (ctype_upper($array[$count]) == ctype_lower($array[$count + 1])) || ctype_lower($array[$count+1]) == ctype_upper($array[$count])) {
                    unset($array[$count]);
                    unset($array[$count + 1]);
                    $size = $size - 2;
                    $array = array_values($array);
                    $count = 0;
                }
            }
            $count++;
        }
        print_r($array);

        array_push($min,sizeof($array));
        $array = str_split($line, 1);
    }
    echo "Minimal chemical reduction: " . ((min($min))-2);
}


//part1($file);
part2($file);