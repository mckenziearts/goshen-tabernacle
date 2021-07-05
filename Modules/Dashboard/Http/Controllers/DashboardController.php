<?php

namespace Modules\Dashboard\Http\Controllers;

use App\Http\Controllers\AdminController;
use Illuminate\Http\Request;

class DashboardController extends AdminController
{
    public function index()
    {
        return view('dashboard::index');
    }

    public function create()
    {
        return view('dashboard::create');
    }

    public function store(Request $request)
    {
        //
    }

    public function show(int $id)
    {
        return view('dashboard::show');
    }

    public function edit(int $id)
    {
        return view('dashboard::edit');
    }

    public function update(Request $request, int $id)
    {
        //
    }

    public function destroy(int $id)
    {
        //
    }
}
