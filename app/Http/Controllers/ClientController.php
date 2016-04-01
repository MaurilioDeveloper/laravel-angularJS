<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\ClientRepository;
use App\Services\ClientServices;

class ClientController extends Controller
{
    private $repository;
    private $request;
    private $service;


    public function __construct(ClientRepository $repository, Request $request, ClientServices $service) 
    {
        $this->repository = $repository;
        $this->request = $request;
        $this->service = $service;
    }
    /**
     * Display a listing of the resource.
     *
     * @return metodo index (Listagem).
     * Este metodo realiza uma injeção de dependencia, pela qual ultiliza
     * a classe que ClientRepository, que possui a interface Repository
     * fazendo com que possamos trabalhar sem acoplamento, realizando manutenção
     * apenas na parte de respository, ao executar alguma modificação.
     * 
     */
    public function index()
    {
        return $this->repository->all();
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        /**
         * @method String store() Description
         * 
         * O metodo store(), chamaremos o objeto service,
         * pois quando criamos um cliente, atribuimos regras
         * de negocio a ele, e essas regras são definidas nos 
         * services. E como foi criado no nosso ClientService
         * o metodo de create, atribuiremos aqui.
         * 
         */
        return $this->service->create($this->request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return $this->repository->find($id);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        return $this->service->find($id)->update($this->request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return $this->repository->find($id)->delete();
    }
}
