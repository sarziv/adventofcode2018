<?php
//Day 3
//387,801: 11x22
$file = fopen("input3.txt", "r") or die("Problem");

function part1($file)
{

    $overlap[][] = 0;
    $count = 0;
    while (!feof($file)) {
        $uncut = fgets($file);
        $idcut = explode("@", $uncut)[1];
        $parts = preg_split('/,|: |x|\s/', $idcut, null, PREG_SPLIT_NO_EMPTY);

        $pos_x = $parts[0] + 1;
        $pos_y = $parts[1] + 1;
        $grid_x = $parts[2];
        $grid_y = $parts[3];

        for ($row = 0; $row < $grid_x; $row++) {
            for ($col = 0; $col < $grid_y; $col++) {
                $overlap[$pos_x + $row][$pos_y + $col]++;
                echo "Working on fabric!" . "\n";
            }
        }
    }
    foreach ($overlap as $arrItem) {
        foreach ($arrItem as $value) {
            if ($value >= 2) {
                $count++;
                echo "Working on count is " . $count . "\n";
            }
        }
    }
    echo "Overlap: " . $count;
}

function part2($file){

    $overlap[][] = 0;
    $count = 0;
    $isOverlap = false;
    while (!feof($file)) {
        $uncut = fgets($file);
        $idcut = explode("@", $uncut)[1];
        $parts = preg_split('/,|: |x|\s/', $idcut, null, PREG_SPLIT_NO_EMPTY);

        $pos_x = $parts[0] + 1;
        $pos_y = $parts[1] + 1;
        $grid_x = $parts[2];
        $grid_y = $parts[3];

        for ($row = 0; $row < $grid_x; $row++) {
            for ($col = 0; $col < $grid_y; $col++) {
                $overlap[$pos_x + $row][$pos_y + $col]++;
                $count++;
                if ($overlap[$pos_x . '.' . $pos_y] == 2 && $isOverlap = true) {
                    break 2;
                }
            }
            echo "Working on fabric!" . "\n";
        }
        if (!$isOverlap) {
            echo 'No overlap: ' . $count . PHP_EOL;
            break;
        }
       }
    }


part2($file);

