<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Album;
use App\Models\Track;

class TrackSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $albumId = Album::all()->pluck('id')->toArray();

        $albumTrackCount = [];

        for ($i = 1; $i <= 2000; $i++) {
            $track = Track::create([
                'title' => "Track $i",
            ]);

            $albumCount = rand(1, 4);
            $albums = [];
            $j = 1;

            while ($j <= $albumCount) {
                $currentAlbumId = $albumId[rand(0, count($albumId) - 1)];

                if (in_array($currentAlbumId, $albums)) {
                    continue;
                }

                $albums[] = $currentAlbumId;
                $j++;
            }

            foreach ($albums as $id) {
                $albumTrackCount[$id] = $albumTrackCount[$id] ?? 0;
                DB::table('album_track')->insert([
                    'album_id' => $id,
                    'track_id' => $track->id,
                    'order' => ++$albumTrackCount[$id],
                ]);
            }
        }
    }
}
