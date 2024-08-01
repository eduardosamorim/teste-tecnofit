<?php
namespace App\Services;

use App\Repositories\MovementRepository;
use App\Repositories\PersonalRecordRepository;

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
        $movement = $this->movementRepository->findById($movementId);

        if (!$movement) {
            return null; 
        }
    
        $ranking = $this->personalRecordRepository->getRankingByMovementId($movementId);
    
        return [
            'movement' => $movement->name,
            'ranking' => $ranking,
        ];
    }
}