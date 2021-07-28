<?php

namespace App\Http\Services;

use App\Http\Repositories\PlantRepository;

class PlantService extends BaseService
{
    public function getListForAdmin() {
        $repository = new PlantRepository();
        return $repository->getListForAdmin();
    }

    public function getListForClient($params) {
        $repository = new PlantRepository();
        return $repository->getListForClient($params);
    }

    public function getPlantBySlug($slug) {
        $repository = new PlantRepository();
        return $repository->getPlantBySlug($slug);
    }

    public function createPlant($params)
    {
        $repository = new PlantRepository();
        return $repository->createPlant($params);
    }

    public function updatePlant($params, $slug) {
        $repository = new PlantRepository();
        return $repository->updatePlant($params, $slug);
    }

    public function archive($slug) {
        $repository = new PlantRepository();
        return $repository->archive($slug);
    }

    public function returnFromArchive($slug) {
        $repository = new PlantRepository();
        return $repository->returnFromArchive($slug);
    }

    public function addToCart($slug, $qty): bool
    {
        $repository = new PlantRepository();
        return $repository->addToCart($slug, $qty);
    }
}
