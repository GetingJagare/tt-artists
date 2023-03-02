<?php

namespace App\Http\Controllers;

use App\Http\Resources\AlbumResource;
use App\Models\Album;
use Illuminate\Http\Request;

/**
 * @OA\Get(
 *     path="/api/artist/{id}/albums",
 *     summary="Get Albums By Artist",
 *     @OA\Parameter(
 *         description="Artist ID",
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
class AlbumController extends Controller
{
    public function index($artistId) {
        return AlbumResource::collection(Album::where(['artist_id' => $artistId])->get());
    }
}
