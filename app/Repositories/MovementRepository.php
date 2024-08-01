<?php

namespace App\Repositories;

use App\Models\Movement;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class MovementRepository
{
    public function findById($id)
    {
        $movement = Movement::find($id);

        if(!$movement){
            return null;
        }
        
        return Movement::find($id);
    }
}