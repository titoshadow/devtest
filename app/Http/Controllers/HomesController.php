<?php

namespace App\Http\Controllers;

use App\Models\Home;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Yajra\DataTables\CollectionDataTable;
use Yajra\DataTables\Facades\DataTables;
use function cache;use function config;use function now;use function view;

class HomesController extends Controller
{
    /**0
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return Application|Factory|View|JsonResponse|CollectionDataTable
     * @throws Exception
     */
    public function index(Request $request): Application|Factory|View|JsonResponse|CollectionDataTable
    {
        $homesList = cache()->remember('homesList', now()->addMinutes(config('app.cache_minutes')),
            function () {
                return Home::get('json_content');
            });

        $filteredHomesList = array();
        foreach ($homesList as $home) {
            $filteredHomesList[] = $home->json_content;
        }

        if ($request->ajax()) {
            return DataTables::of($filteredHomesList)
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
                        '<td><span class="icon-holder"><i class="fas fa-times c-red-500"></i></span></td>';;
                })
                ->rawColumns(['Link', 'Image'])
                ->toJson();
        }

        return view('welcome');
    }
}
