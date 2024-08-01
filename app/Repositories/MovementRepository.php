<?php

namespace App\Repositories;

use App\Models\Movement;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class MovementRepository
{
    public function findById($id)
    {
        return Movement::findOrFail($id);
    }
}