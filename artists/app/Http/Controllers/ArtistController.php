<?php

namespace App\Http\Controllers;

use App\Http\Resources\ArtistResource;
use App\Models\Artist;
use Illuminate\Http\Request;

/**
 * @OA\Get(
 *     path="/api/artists",
 *     summary="Get All Artists",
 *     @OA\Response(
 *         response=200,
 *         description="OK"
 *     )
 * )
 */
class ArtistController extends Controller
{
    public function index() {
        return ArtistResource::collection(Artist::all());
    }
}
