<?php

namespace App\Http\Controllers;

use App\Http\Controllers\ResponseController as RC;
use App\Models\Mutation;

class StatsController extends RC {

    public function stats() {
        $count_mutations = Mutation::where('status', 'mutation')->count();
        $count_no_mutations = Mutation::where('status', 'no_mutation')->count();
        if ($count_mutations > 0 && $count_no_mutations > 0) {
            $ratio = $count_mutations / $count_no_mutations;
        } else {
            return $this->sendError(false, "No se encontraron registros");
        }
        $response = [
            "count_mutations" => $count_mutations,
            "count_no_mutations" => $count_no_mutations,
            "ratio" => number_format($ratio, 2)
        ];
        return $this->sendResponse($response, "stats");
    }

}
