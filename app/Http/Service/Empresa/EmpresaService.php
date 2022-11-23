<?php

namespace App\Http\Service\Empresa;

use App\Models\Empresa\EmpresaModel;
use App\Models\Empresa\EmpresaServicoModel;
use DateTime;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class EmpresaService
{
    protected $empresaModel;
    protected $empresaServicoModel;

    public function __construct(EmpresaModel $empresaModel, EmpresaServicoModel $empresaServicoModel)
    {
        $this->empresaModel = $empresaModel;
        $this->empresaServicoModel = $empresaServicoModel;
    }

    public function register(Request $request){
        $attributes = $request->all();

        $ano_fundacao = implode('-', array_reverse(explode('/', substr($attributes['ano_fundacao'], 0, 10)))).substr($attributes['ano_fundacao'], 10);
        $data_formatada = new DateTime($ano_fundacao);

        $attributes['ano_fundacao'] = $data_formatada->format('Y-m-d');

        $this->empresaModel->create($attributes);

        return response()->json([
            "message" => "Registro feito com sucesso!",
            "status" => TRUE,
        ], 200);
    }

    public function list(){
        return $this->empresaModel->all();
    }

    public function findById($id){
        return $this->empresaModel->find($id);
    }

    public function alter(Request $request, $id){
        $attributes = $request->all();

        $this->empresaModel->find($id)->update($attributes);

        return response()->json([
            "message" => "Registro alterado com sucesso!",
            "status" => TRUE,
        ], 200);
    }

    public function vincularTiposServicos(Request $request,  $id){
        $attributes = $request->all();

        try {
            $this->empresaServicoModel->where('empresa_id', $id)->delete();

            foreach ($attributes['servicos'] as $servicoKey) {
                $this->empresaServicoModel->create([
                    'empresa_id' => $id,
                    'servico_id' => $servicoKey['id'],
                ]);
            }

            return response()->json([
                'message' => 'Registro feito com sucesso!',
                'status' => true,
            ], 400);
        } catch (Exception $e) {
            return response()->json([
                'message' => $e,
                'status' => false,
            ], 400);
        }
        
    }

}