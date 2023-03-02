<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Resources\ArtistResource;
use App\Http\Resources\AlbumResource;
use App\Http\Resources\TrackResource;
use App\Models\Album;
use App\Models\Artist;
use App\Models\Track;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::prefix('v1')->group(function () {
    Route::get('/artists', fn() => ArtistResource::collection(Artist::all()));
    Route::get('/artist/{id}/albums', fn($artistId) => AlbumResource::collection(Album::where(['artist_id' => $artistId])->get()));
    Route::get('/album/{id}/tracks', fn($albumId) => TrackResource::collection(Album::find($albumId)->tracks()->get()));
    Route::get('/track/{id}/albums', fn($trackId) => AlbumResource::collection(Track::find($trackId)->albums()->get()));
});
