<?php

namespace App\Http\Controllers;

use App\Services\AchievementService;
use Illuminate\Http\Request;

class AchievementController extends Controller
{
    private $achievementService;

    /**
     * __construct
     *
     * @return void
     */
    public function __construct(AchievementService $achievementService)
    {
        $this->achievementService = $achievementService;
    }
    /**
     * Get achievement data
     * 
     * @param Request $request
     * 
     * @return Response
     */
    public function getAchievementData(Request $request, $userId)
    {
        $data = $this->achievementService->getUserAchievementDetails($userId);

        return $this->sendApiResponse(200, 'Request Successful', $data);
    }
}
