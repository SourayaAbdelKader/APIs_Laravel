<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class functions extends Controller
{
    // Create an API that recives a number $num and returns each place value in the number.
    function decomposingNumber($number){
        $number_decompotion = array();
        $length = strlen($number);
        for ($i = 1 ; $i <= $length; $i++) {
            $new_number = $number % (10**(length-i)); // to take the firts digit on the left of the number
            $new_number = $new_number * (10**(length-i)); // multiply this digit to take it's place value 
            array_push($number_decompotion, $new_number); 
            $number = $number - $new_number; 
        };

        return response()->json([
            "status" => "Success",
            "message" => $number_decompotion
        ]);
    };

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
                if(is_numeric($string[$i])){ //checking if the following char is a number 
                    $number .= $string[$i];
                    $multi_digit_number = true;
                    $i++;
                };
                while($multi_digit_number){ // to check if the number is more than 2 digits 
                    if(is_numeric($string[$i])){
                        $number .= $string[$i];
                        $i++;
                    }
                    else {
                        $multi_digit_number = false;
                    }  
                };
                $binary_string .= decbin($number);
            } 
            else { 
                $binary_string .= $char;
                $i++;
            };
        };

        return response()->json([
            "status" => "Success",
            "message" => $binary_string
        ]);
    }


    function sortingString($name = "Laravel"){
        $message = "HI " . $name;

        return response()->json([
            "status" => "Success",
            "message" => $message
        ]);
    }

    function calculatePrefixNotarions(Request $request){
        $name = $request->name;
        $age = $request->age;

        return response()->json([
            "status" => "Success",
            "message" => $age
        ]);
    }
    
}
