<?php

use App\Models\Home;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Yajra\DataTables\Facades\DataTables;

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

Route::get('/', function (Request $request) {

    $filtered = array();
    $homesList = Home::skip($request->start)->take($request->length)->get();

    foreach ($homesList as $home) {
        $filtered[] = $home->json_content;
    }

    return DataTables::of($filtered)
        ->setOffset($request->start)
        ->setTotalRecords(Home::count())
        ->addColumn('Title', function ($item) {
            return $item['Address'];
        })
        ->editColumn('Link', function ($item) {
            return $item['Link']
                ?
                '<td><span class="icon-holder"><a target="_blank" href="' . $item['Link'] . '" class="fa-solid fa-arrow-up-right-from-square c-blue-500"></a></span></td>'
                :
                '<td><span class="icon-holder"><i class="fas fa-times c-red-500"></i></span></td>';
        })
        ->editColumn('Image', function ($item) {
            return array_pop($item['Images'])
                ?
                '<td><span class="icon-holder"><a target="_blank" href="' . array_pop($item['Images']) . '" class="fa-solid fa-image c-blue-500"></a></span></td>'
                :
                '<td><span class="icon-holder"><i class="fas fa-times c-red-500"></i></span></td>';
        })
        ->rawColumns(['Link', 'Image'])
        ->toJson();
});
