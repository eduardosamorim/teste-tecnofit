<?php

namespace App\Repositories;

use App\Models\PersonalRecord;

class PersonalRecordRepository
{
    public function getRankingByMovementId($movementId)
    {
        return PersonalRecord::with('user')
            ->where('movement_id', $movementId)
            ->orderBy('value', 'desc')
            ->orderBy('date', 'asc')
            ->get();
    }
}