<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class functions extends Controller
{
    // Create an API that recives a number $num and returns each place value in the number.
    function decomposingNumber($number){
        $abs_number = abs($number);
        $number_decompotion = array();
        $i = 1;
        if ($number > 0){
        $length = strlen($number);
        } else {$length = strlen($number) -1;}
        while($i <= $length) {
            $place_value = 10**($length - $i);
            echo $place_value;
            $new_number = floor($abs_number/ $place_value); // to take the firts digit on the left of the number
            $new_number = $new_number * $place_value; // multiply this digit to take it's place value 
            if ($number > 0 ){
            array_push($number_decompotion, $new_number); 
            } else {array_push($number_decompotion, -$new_number);}
            $abs_number = $abs_number - $new_number; 
            $i++;
        };

        return response()->json([
            "status" => "Success",
            "message" => $number_decompotion
        ]);
    }

    // function that translates from Human to Programer by replacing the numbers in a string with their binary form.
    function integerToBinary($string){
        $binary_string = "";
        $length = strlen($string);
        $i = 0; // to loop over the string
        $number = ""; 
        $multi_digit_number = false; 
        while ($i < $length) {
            if (is_numeric($string[$i])){
                $number .= $string[$i];
                $i++;
                if(is_numeric($string[$i]) && $i< $length){ //checking if the following char is a number 
                    $number .= $string[$i];
                    $multi_digit_number = true;
                    $i++;
                };
                while($multi_digit_number && $i< $length){ // to check if the number is more than 2 digits 
                    if(is_numeric($string[$i]) && $i< $length){
                        $number .= $string[$i];
                        $i++;
                    }
                    else {
                        $multi_digit_number = false;
                    }  
                };
                $binary_string .= decbin($number);
                $number = "";
            } 
            else { 
                $binary_string .= $string[$i];
                $i++;
            };
        };

        return response()->json([
            "status" => "Success",
            "message" => $binary_string
        ]);
    }

    // function that takes care of Prefix Notation Evaluation.The API receives a mathematical expression in prefix notation as a string and evaluates the expression.
    function calculatePrefixNotations($expression){
        $content = explode(' ', $expression);
        print_r($content);
        $total = 0;
        
        return response()->json([
            "status" => "Success",
            "message" => $total
        ]);
    }


    function sortingString($string){
        $length = strlen($string);
        $i = 0;
        $numbers = array();
        $letters = array();
        while ($i < $length) {
            if(is_numeric($string[$i])){
            array_push($numbers, $string[$i]); // puts all the numbers in one array
            }
            else {
                array_push($letters, $string[$i]); 
            }
            $i++;
        };
        sort($numbers);
        print_r($numbers);
        natcasesort($letters);
        $new_letters_array = array();
        
        $letters_length = count($letters);
        echo $letters_length;
        for ($j = 0; $j < $letters_length; $j++) {
            if(in_array(strtolower($letters[$j]), $letters) && !in_array(strtolower($letters[$j]) ,$new_letters_array)){
                $element_to_find = strtolower($letters[$j]);
                $index = array_search($element_to_find, $letters);
                array_push($new_letters_array, $letters[$index]);
            };
            if (!in_array($letters[$j], $new_letters_array))
            array_push($new_letters_array, $letters[$j]);
        };
        $final_array = array_merge($new_letters_array, $numbers);
        print_r($final_array);
        
        $final_string = "";
        foreach ($final_array as $i) { $final_string .= $i; };
        
        print_r($new_letters_array);
        return response()->json([
            "status" => "Success",
            "message" => $final_string
        ]);
    }
    
}
