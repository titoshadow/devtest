<?php

namespace App\Http\APIControllers;

use App\Http\Controllers\Controller;
use App\Models\Home;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class APIHomesController extends Controller
{
    /**0
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return JsonResponse
     * @throws Exception
     */
    public function index(Request $request): JsonResponse
    {
        $filtered = array();
        $start = $request->start ?: 0;
        $rows = $request->length ?: 0;

        $homesList = Home::skip($start)->take($rows)->get();

        foreach ($homesList as $home) {
            $filtered[] = $home->json_content;
        }

        return DataTables::of($filtered)
            ->setOffset($start)
            ->setTotalRecords(Home::count())
            ->addColumn('Title', function ($item) {
                return $item['Address'];
            })
            ->editColumn('Link', function ($item) {
                return $item['Link'];
            })
            ->editColumn('Image', function ($item) {
                return array_pop($item['Images']);
            })
            ->escapeColumns([])
            ->toJson();
    }
}
