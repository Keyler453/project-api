<?php

namespace App\Http\Controllers;

use App\Models\Income;
use Illuminate\Http\Request;

class IncomeController extends Controller
{
    // Método para mostrar todos los ingresos
    public function index()
    {
        return Income::all();
    }

    // Método para crear un nuevo ingreso
    public function store(Request $request)
    {
        $income = Income::create($request->all());
        return response()->json($income, 201);
    }

    // Método para mostrar un ingreso específico
    public function show(Income $income)
    {
        return $income;
    }

    // Método para actualizar un ingreso
    public function update(Request $request, Income $income)
    {
        $income->update($request->all());
        return response()->json($income, 200);
    }

    // Método para eliminar un ingreso
    public function destroy(Income $income)
    {
        $income->delete();
        return response()->json(null, 204);
    }
}
