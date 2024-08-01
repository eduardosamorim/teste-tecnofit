<?php
namespace App\Services;

use App\Repositories\MovementRepository;
use App\Repositories\PersonalRecordRepository;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class RankingService
{
    protected $movementRepository;
    protected $personalRecordRepository;

    public function __construct(MovementRepository $movementRepository, PersonalRecordRepository $personalRecordRepository)
    {
        $this->movementRepository = $movementRepository;
        $this->personalRecordRepository = $personalRecordRepository;
    }

    public function getRanking($movementId)
    {
        try {
            $movement = $this->movementRepository->findById($movementId);
        } catch (ModelNotFoundException $e) {
            throw new ModelNotFoundException('Movement not found');
        }

        $ranking = $this->personalRecordRepository->getRankingByMovementId($movementId);

        $position = 1;
        $previousValue = null;
        $tiedPosition = 1;

        foreach ($ranking as $record) {
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
        }

        return [
            'movement' => $movement->name,
            'ranking' => $formattedRanking,
        ];
    }
}