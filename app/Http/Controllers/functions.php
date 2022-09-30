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

    function integerToBinary($name = "Laravel"){
        $message = "HI " . $name;

        return response()->json([
            "status" => "Success",
            "message" => $message
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
