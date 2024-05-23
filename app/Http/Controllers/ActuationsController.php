<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;
use App\Models\AlarmActuation;
use App\Models\Alarm;

class ActuationsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $title = 'Laravel Alarmes | Atuações dos Alarmes ';

        $query = AlarmActuation::with('alarm')
            ->join('alarms', 'alarms_actuations.alarm_id', '=', 'alarms.id')
            ->join('equipments', 'alarms.equipment_id', '=', 'equipments.id');

        $orderable_by = [
            "alarm_name_asc",
            "alarm_name_desc",
            "equipment_name_asc",
            "equipment_name_desc",
            "actuation_start_desc",
            "actuation_start_asc",
            "actuation_end_desc",
            "actuation_end_asc"
        ];

        $search_text = $request->query('search_text');
        $order_by = $request->query('order_by');

        // if search_text, search for search_text LIKE on Alarm name OR Alarm Description
        if (!is_null($search_text)) {
            $query->whereHas('alarm', function (Builder $queryBuilder) use ($search_text) {
                $queryBuilder->whereAny([
                    'name',
                    'description',
                ], 'LIKE', '%'.$search_text.'%');
            });
        }

        // if order_by
        if (!is_null($order_by) && in_array($order_by, $orderable_by)) {

            if ($order_by === "alarm_name_asc") {
                $query->orderBy('alarms.name', 'asc');
            } else if ($order_by === "alarm_name_desc") {
                $query->orderBy('alarms.name', 'desc');
            } else if ($order_by === "equipment_name_asc") {
                $query->orderBy('equipments.name', 'asc');
            } else if ($order_by === "equipment_name_desc") {
                $query->orderBy('equipments.name', 'desc');
            } else if ($order_by === "actuation_start_desc") {
                $query->orderBy('start', 'desc');
            } else if ($order_by === "actuation_start_asc") {
                $query->orderBy('start', 'asc');
            } else if ($order_by === "actuation_end_desc") {
                $query->orderBy('end', 'desc');
            } else if ($order_by === "actuation_end_asc") {
                $query->orderBy('end', 'asc');
            }

        } else {
            // default order by
            $query->orderBy('start', 'desc');
        }

        $actuations = $query->get();

        // getting top 3 most triggered alarms
        $mostTriggeredAlarms = Alarm::with('equipment')
                                ->withCount('actuations')
                                ->orderBy('actuations_count', 'desc')
                                ->limit(3)
                                ->get();

        return view('actuations.index', compact('title', 'actuations', 'search_text', 'order_by', 'mostTriggeredAlarms'));
    }
}
