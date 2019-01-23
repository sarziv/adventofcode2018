<?php
//Day 5

$file = fopen("input5.txt", "r") or die("Problem");
//copy of the file
$list = "";
$count = 0;
$line = fgets($file);
$list = str_split($line, 1);
$array=$list;
$size=sizeof($array);
while ($size-1 >= $count) {
    if (strcasecmp($array[$count], $array[$count + 1]) == 0) {
        if (ctype_lower($array[$count]) == ctype_upper($array[$count+1]) || (ctype_upper($array[$count]) == ctype_lower($array[$count+1]))) {
            echo "Found: " . $array[$count] . " " . $array[$count+1] . "\n";
            unset($array[$count]);
            unset($array[$count+1]);
            $size=$size-2;
            $array = array_values($array);
            $count=0;
        }
    }
    $count++;
}

echo "Answer Found:\n";
foreach ($array as $item){
    echo $item;
}
echo "\n";
echo "Alchemical Reduction: ". ($size-2);