<?php

namespace App\Repositories;

use App\Models\PersonalRecord;

class PersonalRecordRepository
{
    public function getRankingByMovementId($movementId)
    {
        $ranking =  PersonalRecord::with('user')
            ->where('movement_id', $movementId)
            ->orderBy('value', 'desc')
            ->orderBy('date', 'desc')
            ->get();

        return $this->formatRanking($ranking);
    }

    private function formatRanking($ranking)
    {
       $formattedRanking = [];
        $previousValue = null;
        $position = 0;
        $seenUsers = [];
    
        foreach ($ranking as $record) {
            if (in_array($record->user->name, $seenUsers)) {
                continue; 
            }
    
            if ($record->value !== $previousValue) {
                $previousValue = $record->value;
                $position++;
            }
    
            $formattedRanking[] = [
                'user' => $record->user->name,
                'value' => $record->value,
                'position' => $position,
                'date' => $record->date,
            ];
    
            $seenUsers[] = $record->user->name;
        }

        return $formattedRanking;
    }
    
}