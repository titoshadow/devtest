<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
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
