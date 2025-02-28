<?php

namespace App\Http\Controllers;

use App\Models\calculatorModel;
use Illuminate\Http\Request;

class calculatorController extends Controller
{
    public function index()
    {
        return view('calculator');
    }

    public function calculate(Request $request)
    {
        $expression = $request->input('expression');

        try {
            // Menggunakan eval untuk menghitung hasil ekspresi
            $result = eval("return $expression;");
            return response()->json(['result' => $result]);
        } catch (\Throwable $e) {
            return response()->json(['error' => 'Invalid expression'], 400);
        }
    }

    public function history()
    {
        return view('history');
    }

    public function storeHistory(Request $request)
    {
        $data = [
            'expression' => $request->input('expression'),
            'result' => $request->input('result')
        ];

        calculatorModel::create($data);
        return redirect()->route('calculator');
    }
}
