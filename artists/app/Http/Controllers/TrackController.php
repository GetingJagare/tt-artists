<?php

namespace App\Http\Controllers;

use App\Http\Resources\AlbumResource;
use App\Http\Resources\TrackResource;
use App\Models\Album;
use App\Models\Track;
use Illuminate\Http\Request;

/**
 * @OA\Get(
 *     path="/api/album/{id}/tracks",
 *     summary="Get All Album Tracks",
 *     @OA\Parameter(
 *         description="Album ID",
 *         in="path",
 *         name="id",
 *         required=true,
 *         @OA\Schema(type="string"),
 *         @OA\Examples(example="int", value="1", summary="An int value."),
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="OK"
 *     )
 * )
 * @OA\Get(
 *     path="/api/track/{id}/albums",
 *     summary="Get All Albums containing definite track",
 *     @OA\Parameter(
 *         description="Track ID",
 *         in="path",
 *         name="id",
 *         required=true,
 *         @OA\Schema(type="string"),
 *         @OA\Examples(example="int", value="1", summary="An int value."),
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="OK"
 *     )
 * )
 */
class TrackController extends Controller
{
    public function index($albumId) {
        return TrackResource::collection(Album::find($albumId)->tracks()->get());
    }

    public function albums($trackId) {
        return AlbumResource::collection(Track::find($trackId)->albums()->get());
    }
}
