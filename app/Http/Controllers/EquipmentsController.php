<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Equipment;

class EquipmentsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Laravel Alarmes | Equipamentos';
        $equipments = Equipment::all();

        return view('equipments.index', compact('title', 'equipments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = 'Laravel Alarmes | Novo Equipamento';
        return view('equipments.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'serial_number' => 'required|string|max:255|unique:equipments',
            'type' => 'required|in:voltage,current,oil',
        ]);

        Equipment::create($request->all());

        return redirect()->route('equipments.index')->with('success', 'Equipamento cadastrado com sucesso!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Equipment $equipment)
    {
        $title = 'Laravel Alarmes | Editar Equipamento';
        return view('equipments.edit', compact('title', 'equipment'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Equipment $equipment)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'serial_number' => 'required|string|max:255|unique:equipments',
            'type' => 'required|in:voltage,current,oil',
        ]);

        $equipment->update($request->all());

        return redirect()->route('equipments.index')->with('success', 'Equipamento atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Equipment $equipment)
    {
        $equipment->delete();

        return redirect()->route('equipments.index')->with('success', 'Equipamento excluído com sucesso!');
    }
}
