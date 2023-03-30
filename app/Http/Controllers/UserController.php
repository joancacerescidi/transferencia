<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\TryCatch;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    //
    public function updateUser($id)
    {
        try {
            $resultado = User::where('id', $id)->first();
            if ($resultado) {

                $typeUser = '';
                if ($resultado->type == 'free') {
                    $typeUser = 'payment';
                } else if ($resultado->type == 'payment') {
                    $typeUser = 'free';
                }

                User::where('id', $resultado->id)
                    ->update(['type' => $typeUser]);

                return back();
            }
        } catch (\Throwable $th) {
        }
    }
}
