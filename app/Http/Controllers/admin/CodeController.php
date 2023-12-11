<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\admin\MagikCodes;

class CodeController extends Controller
{
    public function index()
    {
        return view('admin.code');
    }

    public function generateCode(Request $request)
    {
        // Récupérer la valeur du select
        $selectedAmount = $request->input('amount');

        // Générer un code de 10 chiffres
        $generatedCode = $this->generateRandomCode();

        // Insérer le code dans la base de données
        $magicCode = new MagikCodes();
        $magicCode->value = $generatedCode;
        $magicCode->points = $selectedAmount;
        $magicCode->is_used = false;
        $magicCode->save();

        $generatedCode = $magicCode->value;

        return response()->json(['generatedCode' => $generatedCode]);
    }

    private function generateRandomCode()
    {
        $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $code = '';
    
        for ($i = 0; $i < 10; $i++) {
            $code .= $characters[rand(0, strlen($characters) - 1)];
        }
    
        return $code;
    }
}
