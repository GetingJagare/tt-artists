<?php

use App\Http\Controllers\AlbumController;
use App\Http\Controllers\ArtistController;
use App\Http\Controllers\TrackController;
use Illuminate\Support\Facades\Route;

Route::get('/artists', [ArtistController::class, 'index']);
Route::get('/artist/{id}/albums', [AlbumController::class, 'index']);
Route::get('/album/{id}/tracks', [TrackController::class, 'index']);
Route::get('/track/{id}/albums', [TrackController::class, 'albums']);
