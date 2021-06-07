<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mutation extends Model {

    protected $table = 'mutation';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'status', 'mutation_string', 'enabled'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];

}
