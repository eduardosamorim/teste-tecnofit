<?php

namespace App\Http\Controllers;

use App\Services\RankingService;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class RankingController extends Controller
{
    protected $rankingService;

    public function __construct(RankingService $rankingService)
    {
        $this->rankingService = $rankingService;
    }

    public function getRanking(Request $request, $movementId)
    {
        try {
            $result = $this->rankingService->getRanking($movementId);

            if (!$result) {
                return response()->json(['error' => 'No data found'], 204);
            }

            return response()->json($result);
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => $e->getMessage()], 404);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error'], 500);
        }
    }
}