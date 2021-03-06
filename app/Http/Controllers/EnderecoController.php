<?php

namespace App\Http\Controllers;

use App\Endereco;
use App\Pagamento;
use Illuminate\Http\Request;

class EnderecoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $endereco = Endereco::all()->toJson();

        return $endereco;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'rua' => 'required|max:120',
            'numero' => 'required',
            'cidade' => 'required|max:45',
            'cep' => 'required',
        ]);

        $endereco = $request->all();

        Endereco::create($endereco);

        return response(["status" => "Cadastrado com sucesso"], 200);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Endereco::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {


        $endereco = $request->all();

        $reg = Endereco::find($id);

        $reg->update($endereco);

        return response(["status" => "Alterado com sucesso"], 200);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $reg = Endereco::find($id);

        $reg->delete();

        return response(["status" => "Removido com sucesso"], 200);

    }
}
