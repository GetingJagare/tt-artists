<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Artist;

class AlbumSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $artistId = Artist::all()->pluck('id')->toArray();

        for ($i = 1; $i <= 200; $i++) {
            DB::table('albums')->insert([
                'title' => "Album $i",
                'release_year' => Carbon::now()->year - rand(0, 5),
                'artist_id' => $artistId[rand(0, count($artistId) - 1)],
            ]);
        }
    }
}
