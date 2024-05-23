<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Alarm;
use App\Models\Equipment;

class AlarmsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Laravel Alarmes | Alarmes';
        $alarms = Alarm::with('equipment')->get();

        return view('alarms.index', compact('title', 'alarms'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = 'Laravel Alarmes | Novo Alarme';
        // assuming that each equipment can have more than one alarm
        $equipments = Equipment::select('id', 'name')->get();
        return view('alarms.create', compact('title', 'equipments'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'classification' => 'required|in:urgent,emergent,ordinary',
            'active' => 'required|boolean',
            'equipment_id' => 'exists:App\Models\Equipment,id'
        ]);


        $data = [];

        if ($request->active == "1") {
           $data = array_merge($request->all(), ['deactivated_at' => null]);
        } else {
            $data = array_merge($request->all(), ['deactivated_at' => now()]);
        }

        Alarm::create($data);


        return redirect()->route('alarms.index')->with('success', 'Alarme cadastrado com sucesso!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Alarm $alarm)
    {
        $title = 'Laravel Alarmes | Editar Alarme';
        // cant edit the related equipment, to no lost the Alarm historic
        return view('alarms.edit', compact('title', 'alarm'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Alarm $alarm)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'classification' => 'required|in:urgent,emergent,ordinary',
            'active' => 'required|boolean',
        ]);

        $data = [];

        if ($request->active == "1") {
            $data = array_merge($request->all(), ['deactivated_at' => null]);
        } else {
            $data =  array_merge($request->all(), ['deactivated_at' => now()]);
        }

        // prevent equipment id update
        $data = array_merge($data, ['equipment_id' => $alarm->equipment->id]);

        // TODO - send e-mail to "abcd@abc.com.br when a "urgent" alarm change status
        // if ($alarm->classification === "urgent" && $alarm->deactivated_at !== $data->deactivated_at) {
        //     sendWarningEmail($alarm, "update");
        // }

        $alarm->update($data);

        return redirect()->route('alarms.index')->with('success', 'Alarme atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Alarm $alarm)
    {
        $alarm->delete();

        // TODO - send e-mail to "abcd@abc.com.br when delete a "urgent" alarm
        // if ($alarm->classification === "urgent") {
        //     sendWarningEmail($alarm, "delete");
        // }

        return redirect()->route('alarms.index')->with('success', 'Alarme excluído com sucesso!');
    }
}
