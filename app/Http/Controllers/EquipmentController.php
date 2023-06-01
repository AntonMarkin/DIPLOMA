<?php

namespace App\Http\Controllers;

use App\Http\Requests\EqupmentRequest;
use App\Http\Requests\EqupmentTypesRequest;
use App\Models\Equipment;
use App\Models\EquipmentType;
use App\Models\Office;
use Illuminate\Http\Request;

class EquipmentController extends Controller
{
    public function equipmentTypes()
    {
        $equipmentTypes = EquipmentType::withoutGlobalScopes()->sortable()->paginate(10);
        return view('admin.equipment_types', compact('equipmentTypes'));
    }
    public function equipment()
    {
        $equipment = Equipment::withoutGlobalScopes()->sortable()->paginate(10);
        $equipmentTypes = EquipmentType::all();
        $offices = Office::all();
        return view('admin.equipment', compact('equipment', 'equipmentTypes', 'offices'));
    }

    public function updateOrCreateType(EqupmentTypesRequest $request, $id = null)
    {
        $data = $request->validated();
        if ($id != null) {
            $equipmentType = EquipmentType::withoutGlobalScopes()->where('id', $id)->update($data);
        } else {
            $equipmentType = EquipmentType::create($data);
        }
        return redirect()->route('admin.equipment-types');
    }
    public function updateOrCreate(EqupmentRequest $request, $id = null)
    {
        $data = $request->validated();
        if ($id != null) {
            $equipment = Equipment::withoutGlobalScopes()->where('id', $id)->update($data);
        } else {
            $equipment = Equipment::create($data);
        }
        return redirect()->route('admin.equipment');
    }
}
