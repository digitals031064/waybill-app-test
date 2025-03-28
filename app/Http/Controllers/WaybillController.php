<?php

namespace App\Http\Controllers;

use App\Models\Waybill;
use Illuminate\Http\Request;

class WaybillController extends Controller
{
    public function index()
    {
        return view('waybills.index');
    }

    public function fetch()
    {
       //return response()->json(Waybill::all());
       return response()->json(Waybill::paginate(10)); // 10 items per page
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'waybill_no' => 'required|unique:waybills',
            'consignee_id' => 'required',
            'shipper_id' => 'required',
            'user_id' => 'required',
            'shipment' => 'required',
            'price' => 'required|numeric',
            'cbm' => 'required|numeric',
            'status' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $waybill = Waybill::create($request->all());

        return response()->json($waybill);
    }

    public function update(Request $request, Waybill $waybill)
    {
        $validator = Validator::make($request->all(), [
            'waybill_no' => 'required|unique:waybills,waybill_no,' . $waybill->id,
            'consignee_id' => 'required',
            'shipper_id' => 'required',
            'user_id' => 'required',
            'shipment' => 'required',
            'price' => 'required|numeric',
            'cbm' => 'required|numeric',
            'status' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $waybill->update($request->all());
        return response()->json($waybill);
    }

    public function destroy(Waybill $waybill)
    {
        $waybill->delete();
        return response()->json(['message' => 'Waybill deleted successfully']);
    }
}
