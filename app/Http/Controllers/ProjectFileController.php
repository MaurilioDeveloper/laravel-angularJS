<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProjectFileController extends Controller {

    private $repository;
    private $request;
    private $service;

    public function __construct(\App\Repositories\ProjectRepository $repository, Request $request, \App\Services\ProjectService $service) {
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

        return $this->repository->findWhere(['owner_id' => \LucaDegasperi\OAuth2Server\Facades\Authorizer::getResourceOwnerId()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store() 
    {
        $file = $this->request->file('file');
        $extension = $file->getClientOriginalExtension();

        $data['file'] = $file;
        $data['extension'] = $extension;
        $data['name'] = $this->request->name;
        $data['project_id'] = $this->request->project_id;
        $data['description'] = $this->request->description;
        
        $this->service->createFile($data);
        
        //echo $this->request->name;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) 
    {
        if ($this->checkProjectPermissions($id) == false) {
            return ['Error' => 'Access forbidden'];
        }
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
        if ($this->checkProjectPermissions($id) == false) {
            return ['Error' => 'Access forbidden'];
        }
        return $this->repository->find($id)->delete();
    }

    private function checkProjectOwner($projectId) 
    {
        $userId = \LucaDegasperi\OAuth2Server\Facades\Authorizer::getResourceOwnerId();
        $this->repository->isOwner($projectId, $userId);
    }

    private function checkProjectMember($projectId) 
    {
        $userId = \LucaDegasperi\OAuth2Server\Facades\Authorizer::getResourceOwnerId();
        $this->repository->hasMember($projectId, $userId);
    }

    private function checkProjectPermissions($projectId) 
    {
        if ($this->checkProjectOwner($projectId) || $this->checkProjectMember($projectId)) {
            return true;
        }
        return false;
    }

}
