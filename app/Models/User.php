<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $fillable = ['name', 'email', 'password', 'total_balance'];
    protected $visible = ['id', 'name', 'email', 'total_balance'];
    use HasFactory;

    public function incomes()
    {
        return $this->hasMany(Income::class);
    }

    public function expenses()
    {
        return $this->hasMany(Expense::class);
    }

    // Mutador para actualizar el saldo total
    public function setTotalBalanceAttribute($value)
    {
        $this->attributes['total_balance'] = $value;
    }

    // Accesor para obtener el saldo total actualizado en tiempo real
    public function getTotalBalanceAttribute()
    {
        // Calcular la suma de los montos de los ingresos
        $incomeTotal = $this->incomes->sum('amount');

        // Calcular la suma de los montos de los gastos
        $expenseTotal = $this->expenses->sum('amount');

        // Calcular el saldo total
        return $incomeTotal - $expenseTotal;
    }
}
