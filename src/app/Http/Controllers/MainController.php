<?php

namespace App\Http\Controllers;

use App\Models\Chamado;
use App\Models\User;
use Dotenv\Parser\Value;
use Illuminate\Http\Request;

use function PHPUnit\Framework\isNull;

class MainController extends Controller
{
    public function index()
    {
        $id = session('user.id');
        $user = User::find($id)->toArray();

        $chamados =  [
            'PEN' => Chamado::where('status', 'PEN')->get(),
            'DEV' => Chamado::where('status', 'DEV')->get(),
            'FIN' => Chamado::where('status', 'FIN')->get()
        ];

        return view('home', [
            'user' => $user,
            'chamados' => $chamados,
        ]);
    }

    public function createChamado() {}

    public function updateStatus(Request $request, $id)
    {
        $chamado = Chamado::findOrFail($id);
        $chamado->status = $request->status;
        $chamado->save();

        return response()->json(['success' => true]);
    }
}
