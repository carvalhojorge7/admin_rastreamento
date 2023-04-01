<?php

namespace App\Http\Controllers;

use App\Models\Pacotes;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class PacotesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $em_transito = Pacotes::where([
                'status' => 'Despachando',
                'status' => 'Em trânsito',
                'status' => 'Saiu Para Entrega'
            ])->count();
            $despachando = Pacotes::where('status', 'Despachando')->count();
            $em_transito = Pacotes::where('status', 'Em Trânsito')->count();
            $saiu_entrega = Pacotes::where('status', 'Saiu Para Entrega')->count();
            $entregue = Pacotes::where('status', 'Entregue')->count();
            $pacotes = Pacotes::orderBy('id', 'desc')->get();
            $qtd_transito = $despachando + $em_transito + $saiu_entrega;
            $total = $qtd_transito + $entregue;
            return response()->json([
                'total' => $total,
                'em_transito' => $qtd_transito,
                'entregue' => $entregue,
                'lista' => $pacotes
            ], 200);
        } catch (Exception $e) {
            report($e);
            return response()->json(['error' => $e], 500);
        }
    }

    public function store(Request $request)
    {
        try {
            $pacote = Pacotes::create($request->all());
            return response()->json(['data' => $pacote], 200);
        } catch (Exception $e) {
            report($e);
            return response()->json(['error' => $e], 500);
        }
    }

    public function busca_e_atualiza(Request $request)
    {
        try {
            if ($request->id) {
                $pacote = Pacotes::find($request->id);
                $pacote->update($request->all());
                return response()->json([
                    'data' => $pacote,
                    'msg' => 'Pacote atualizado com sucesso!',
                    'alert' => 'success'
                ], 200);
            }
            $pacote = Pacotes::where('pedido', $request->pedido)->first();
            if ($pacote) {
                return response()->json(['data' => $pacote], 200);
            } else {
                return response()->json([
                    'msg' => 'Pacote não encontrado!',
                    'alert' => 'warning'
                ], 200);
            }
        } catch (Exception $e) {
            report($e);
            return response()->json([
                'error' => $e,
                'msg' => 'Ocorreu um erro inesperado!',
                'alert' => 'danger'
            ], 500);
        }
    }

    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
