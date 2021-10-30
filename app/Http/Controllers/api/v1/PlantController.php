<?php

namespace App\Http\Controllers\api\v1;

use App\Helpers\api\ResponseHelper;
use App\Http\Controllers\Controller;
use App\Http\Services\PlantService;
use Illuminate\Http\Request;

class PlantController extends Controller
{
    /**
     * Get plants list.
     *
     * @return array
     */
    public function getList(): array
    {
        try {
            $service = new PlantService();
            $result = $service->getList();
            return ResponseHelper::successResponse($result);
        } catch(\Exception $e) {
            return ResponseHelper::errorResponse($e->getMessage());
        }
    }

    /**
     * Get the specified plant.
     *
     * @param Request $request
     * @return array
     */
    public function getOne(Request $request): array
    {
        try {
            $request->validate([
                'slug' => 'required|string',
            ]);

            $service = new PlantService();
            $result = $service->getBySlug($request['slug']);
            return ResponseHelper::successResponse($result);
        } catch(\Exception $e) {
            return ResponseHelper::errorResponse($e->getMessage());
        }
    }
}
