<?php
/**
 * Created by PhpStorm.
 * User: yuda
 * Date: 24/03/19
 * Time: 11:30
 */
// get file content from url
$data = file_get_contents("https://gist.githubusercontent.com/tymat/03c0944ea1a280948c2e8fc9e41ffc10/raw/d396e6ee86f8dc8ab6b2855261938f3343445c43/LoremIpsum.md");

// convert to lowercase
$lowData = strtolower($data);

// remove whitespace and non word character
$cleanData = preg_replace("/\W/","", $lowData);

// create empty associative array
$whole = array();

// count every characters
foreach (count_chars($cleanData, 1) as $i => $val) {
    // assign key-value pairs to the array
    $whole[chr($i)] = $val;
}

// descending sort the array by its value
arsort($whole);

// loop through the array
foreach ($whole as $key => $value) {
    echo "Occurence of letter ".$key." is ".$value;
    echo "<br>";
}

// print the first index that has the most value, in this case its "e"
echo "The letter that occurs most in the text is e with the amount of ".$whole["e"];