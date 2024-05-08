<?php

namespace App\Http\Controllers;

use App\Models\Expense;
use Illuminate\Http\Request;

class ExpenseController extends Controller
{
    // Método para mostrar todos los gastos
    public function index()
    {
        return Expense::all();
    }

    // Método para crear un nuevo gasto
    public function store(Request $request)
    {
        $expense = Expense::create($request->all());
        return response()->json($expense, 201);
    }

    // Método para mostrar un gasto específico
    public function show(Expense $expense)
    {
        return $expense;
    }

    // Método para actualizar un gasto
    public function update(Request $request, Expense $expense)
    {
        $expense->update($request->all());
        return response()->json($expense, 200);
    }

    // Método para eliminar un gasto
    public function destroy(Expense $expense)
    {
        $expense->delete();
        return response()->json(null, 204);
    }
}
