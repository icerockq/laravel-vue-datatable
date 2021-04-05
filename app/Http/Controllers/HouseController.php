<?php


namespace App\Http\Controllers;


use App\Models\House;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class HouseController extends Controller
{
    public function index(Request $request)
    {
        $query = House::query();

        if ($request->filled('name')) {
            $query->where('name', 'LIKE', '%' . $request->input('name') . '%');
        }
        if ($request->filled('min_price')) {
            $query->where('price', '>=', $request->input('min_price'));
        }
        if ($request->filled('max_price')) {
            $query->where('price', '<=', $request->input('max_price'));
        }
        if ($request->filled('bedrooms')) {
            $query->where('bedrooms', '=', $request->input('bedrooms'));
        }
        if ($request->filled('bathrooms')) {
            $query->where('bathrooms', '=', $request->input('bathrooms'));
        }
        if ($request->filled('storeys')) {
            $query->where('storeys', '=', $request->input('storeys'));
        }
        if ($request->filled('garages')) {
            $query->where('garages', '=', $request->input('garages'));
        }
        if($request->filled(['sort_column', 'sort_order'])) {
            $query->orderBy($request->input('sort_column'), $request->input('sort_order'));
        }

        return $query->get();
    }
}
