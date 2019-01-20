<?php
//Day 2
//oiwcdpbseqgxryfmlpktnupvza

$file = fopen("input2.txt", "r") or die("Problem");

function part1 ($file)
{
    //array filter
    function limit ($var)
    {
        return (1 < $var);
    }

    $two = 0;
    $three = 0;
    while (!feof($file)) {

        $line = fgets($file);
        $lineArray = str_split($line);
        $values = array_count_values($lineArray);
        $filterArray = array_filter($values, "limit");
        $unique = array_unique($filterArray);
        foreach ($unique as $item) {
            if ($item == 2) {
                $two++;
            }
            if ($item == 3) {
                $three++;
            }
        }
    }
    echo "Two: " . $two . " Three: " . $three . "\n";
    echo "Part1: " . ($two * $three);
}

function part2 ($file)
{

    $count = 0;
    $max = 0.0;
    $s1 = "";
    $s2 = "";

    while (!feof($file)) {

        $lineStart = fgets($file);
        $line[] = fgets($file);
        foreach ($line as $item) {
            $count++;
            echo "Iteration: " . $count . "\n";
            similar_text($item, $lineStart, $percent);
            echo "String1: " . $item . "String2: " . "$lineStart" . "Percent: " . $percent . "%" . "\n";

            if($percent > $max){
                $max = $percent;
                $s1 = $lineStart;
                $s2 = $item;

            }
        }
        echo "Max Percent: " .$max . "\n";
        echo "String1: " .$s1;
        echo "String1: " .$s2;
    }

}


//part1($file);
part2($file);