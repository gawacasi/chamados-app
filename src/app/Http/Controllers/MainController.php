<?php

namespace App\Http\Controllers;

use App\Models\Chamado;
use App\Models\User;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

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

    public function createChamado()
    {
        $id = session('user.id');
        $user = User::find($id)->toArray();

        return view('create-chamado', [
            'user' => $user
        ]);
    }

    public function createChamadoSubmit(Request $request)
    {
        $request->validate(
            [
                'text_chamado' => 'required',
                'text_title'   => 'required'
            ],
            [
                'text_chamado.required' => 'Text is Required',
                'text_title.required'   => 'Title is Required',
            ]
        );

        $id = session('user.id');

        $chamado = new Chamado();
        $chamado->user_id = $id;
        $chamado->title = $request->text_title;
        $chamado->text = $request->text_chamado;
        $chamado->save();

        return redirect()->route('home');
    }

    public function editSubmit(Request $request)
    {
        $request->validate(
            [
                'text_chamado' => 'required',
                'text_title'   => 'required'
            ],
            [
                'text_chamado.required' => 'Text is Required',
                'text_title.required'   => 'Title is Required',
            ]
        );

        if ($request->chamado_id == null) {
            return redirect()->route('home');
        }

        $id = $this->decryptId($request->chamado_id);

        $chamado = Chamado::find($id);
        $chamado->title = $request->text_title;
        $chamado->text = $request->text_chamado;

        $chamado->save();

        return redirect()->route('home');
    }

    public function updateStatus(Request $request, $id)
    {
        $chamado = Chamado::findOrFail($id);
        $chamado->status = $request->status;
        $chamado->save();

        return response()->json(['success' => true]);
    }

    public function edit($id)
    {
        $id = $this->decryptId($id);
        $user_id = session('user.id');
        $user = User::find($user_id)->toArray();
        $chamado = Chamado::find($id);

        return view('edit', ['chamado' => $chamado, 'user' => $user]);
    }

    public function delete($id)
    {
        $id = $this->decryptId($id);

        $chamado = Chamado::find($id);

        return view('delete', ['chamado' => $chamado]);
    }

    public function deleteConfirm($id)
    {
        $id = $this->decryptId($id);
        $chamado = Chamado::find($id);

        $chamado->delete();
        
        return redirect()->route('home');
    }

    private function decryptId($id)
    {
        try {
            $id = Crypt::decrypt($id);
        } catch (DecryptException $e) {
            return redirect()->route('home');
        }

        return $id;
    }
}
