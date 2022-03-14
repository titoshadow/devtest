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
use function cache;
use function config;
use function now;
use function view;

class HomesController extends Controller
{
    /**0
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(): View
    {
        return view('welcome');
    }
}
