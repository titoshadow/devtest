<?php

namespace Database\Seeders;

use App\Models\Home;
use GuzzleHttp\Exception\ConnectException;
use Illuminate\Contracts\Filesystem\FileNotFoundException;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class HomeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     * @throws FileNotFoundException
     */
    public function run()
    {
        try{
            $jsonHomes = Http::timeout(120)->get('http://feeds.spotahome.com/ads-housinganywhere.json')->body();

            foreach (json_decode($jsonHomes, true) as $home){
                Home::insert([
                    'json_content' => json_encode($home)
                ]);
            }
        } catch (NotFoundHttpException|ConnectException $e){
            // TODO something
        }
    }
}
