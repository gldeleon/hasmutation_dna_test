<?php

namespace App\Http\Controllers;

use App\Http\Controllers\ResponseController as RC;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Mutation;

class DnaController extends RC {

    private $noMutation = ["ATGCGA", "CAGTGC", "TTATTT", "AGACGG", "GCGTCA", "TCACTG"];

    public function hasMutation(Request $request) {
        //dd($request);
        $dna = $request->get("dna");
        $validator = Validator::make($request->get("dna"), [
                    "dna" => "required|array"
                        ], [
                    "dna.required" => "El parametro 'dna' es requerido y debe ser array"
        ]);
        /* validate only A,T,C,G */
        if ($validator) {
            $validChar = $this->validateChar($dna);
            if ($validChar) {
                /* validate the array */
                $result = $this->validateMutation($this->noMutation, $dna);
                if ($result) {
                    /* insert in db */
                    $this->insertDna(json_encode($dna), "no_mutation");
                    return $this->sendResponse($result, "DNA sin diferencia genética");
                } else {
                    /* insert in db */
                    $this->insertDna(json_encode($dna), "mutation");
                    return $this->sendError(false, "El dna contiene una mutación");
                }
            }
        } else {
            return $this->sendError(false, "El array contiene una letra no aceptada");
        }

        return $this->sendError(false);
    }

    public function validateChar($dna) {
        /* valid characters */
        $validChar = ["A", "T", "C", "G"];
        $notValidChar = ["B", "D", "E", "F", "H", "I", "J", "K", "L", "M", "N", "O", "P", "Q", "R", "S", "U", "V", "W", "X", "Y", "Z"];
        foreach ($dna as $k => $v) {
            $div = str_split($v);
            for ($i = 0; $i < count($div); $i++) {
                for ($j = 0; $j < count($notValidChar); $j++) {
                    if ($div[$i] === $notValidChar[$j]) {
                        //echo "{$div[$i]} Contains a not valid letter {$notValidChar[$j]}";
                        return false;
                        exit();
                    }
                    return true;
                }
            }
        }
    }

    public function validateMutation($noMutation, $toValidate) {
        $num = 0;
        foreach ($noMutation as $key => $value) {
            if ($value !== $toValidate[$num]) {
                /* if one is mutation, exit and return false */
                //return "{$value} contains a mutation {$toValidate[$num]}";
                return false;
                exit();
            }
            $num++;
        }
        return true;
    }

    public function insertDna($dna, $status) {
        $mutation = new Mutation();
        $mutation->status = $status;
        $mutation->mutation_string = $dna;
        $mutation->save();
    }

}
