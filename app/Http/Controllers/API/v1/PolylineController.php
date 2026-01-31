<?php

namespace App\Http\Controllers\API\v1;

use App\Http\Controllers\TransportController;
use App\Http\Requests\ManualPolylineImportRequest;
use Illuminate\Http\JsonResponse;

class PolylineController extends Controller
{
    /**
     * @todo add docs when endpoint is stable
     */
    public function storeManual(ManualPolylineImportRequest $request): JsonResponse {
        $validated = $request->validated();
        $features  = [];

        foreach ($validated['polyline'] as $point) {
            $properties = new \stdClass();

            if (array_key_exists(2, $point) && $point[2] !== null && $point[2] !== '') {
                $properties->id = $point[2];
            }

            if (array_key_exists(3, $point) && $point[3] !== null && $point[3] !== '') {
                $properties->sequence = $point[3];
            }

            $features[] = [
                'type'       => 'Feature',
                'geometry'   => [
                    'type'        => 'Point',
                    'coordinates' => [$point[0], $point[1]],
                ],
                'properties' => $properties,
            ];
        }

        $geoJson = [
            'type'     => 'FeatureCollection',
            'features' => $features,
        ];

        $polyline = TransportController::getPolylineHash(
            json_encode($geoJson, JSON_THROW_ON_ERROR),
            sprintf('manual:%s', $validated['profile'])
        );

        return $this->sendResponse([
            'id'      => $polyline->id,
            'source'  => $polyline->source,
            'hash'    => $polyline->hash,
        ]);
    }
}
