<?php

namespace App\Http\Controllers;

use App\Models\Tenant;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AgenteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('agentes.list');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('agentes.new');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $countName = Str::length($request->name);
        $randomName = Str::random($countName); // Genera una cadena aleatoria de 10 caracteres
        
        $slugDB = Str::slug($request->name, '_');
        $slugDomain = Str::slug($request->name);

        $tenant = Tenant::create(['id' => $slugDB.'_'.$randomName]);
        $tenant->createDomain(['domain' => $slugDomain.'-'.$randomName.'.localhost',]);

        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
