<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Salary;
use Illuminate\Support\Facades\DB;

class SalaryController extends Controller
{

    public function Paid(Request $request, $id)
    {
        $validatedData = $request->validate([
            'salary_month' => 'required',
        ]);
        $month = $request->salary_month;
        $check = Salary::where('employee_id', $id)->where('salary_month', $month)->first();
        if ($check) {
            return response()->json('salary already paid');
        } else {
            $salary =  new Salary();
            $salary->employee_id = $id;
            $salary->amount = $request->salary;
            $salary->salary_date = date('Y-m-d');
            $salary->salary_month = $month;
            $salary->salary_year = date('Y');
            $salary->save();
        }
    }

    public function AllSalary()
    {
        $salary = Salary::select('salary_month')->groupBy('salary_month')->paginate(2);
        return response()->json($salary);
    }

    public function ViewSalary($id)
    {
        $month = $id;

        $view = Salary::join('employees', 'salaries.employee_id', 'employees.id')
            ->select('employees.name', 'salaries.*')
            ->where('salaries.salary_month', $month)
            ->paginate(1000);
        return response()->json($view);
    }
    public function EditSalary($id)
    {
        $edit = Salary::join('employees', 'salaries.employee_id', 'employees.id')
            ->select('employees.name', 'employees.email', 'salaries.*')
            ->where('salaries.id', $id)
            ->first();
        return response()->json($edit);
    }

    public function SalaryUpdate(Request $request, $id)
    {

        $salary = Salary::find($id);
        $salary->employee_id = $request->employee_id;
        $salary->amount = $request->amount;
        $salary->salary_month = $request->salary_month;
        $salary->salary_year = date('Y');
        $salary->save();
    }

    public function StockUpdate(Request $request, $id)
    {
        $validatedData = $request->validate([
            'product_quantity' => 'required',
        ]);
        $product = Product::find($id);
        $product->product_quantity =  $request->product_quantity;
        $product->save();
    }
}