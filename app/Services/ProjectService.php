<?php

namespace App\Services;

use App\Repositories\ProjectRepository;
use App\Validators\ProjectValidator;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Contracts\Filesystem\Factory as Storage;
/**
 * Description of ProjectServices
 * 
 * Nossa classe ProjectService, é responsavel pelos serviços realizados 
 * pela parte de Projectes, ou seja, nela fica toda nossa regra de negócio.
 * Por exemplo: 
 * Criamos um Projeto, enviaremos um email.
 * Criamos um Projeto, enviamos um post.
 * 
 * @author Maurilio
 */
class ProjectService {
    /**
     * Os Services são responsaveis por toda nossa regra de negocio,
     * alem de se ligar ao banco de dados atraves dos repositories,
     * tambem são responsaveis por criar todas nossas ações
     * tomadas ao realizar determinada tarefa.
     * 
     */

    /**
     * @var ProjectRepository
     */
    protected $repository;

    /**
     * @var ProjectValidator
     */
    protected $validator;
    protected $filesystem;
    protected $storage;
    
    public function __construct(ProjectRepository $repository, ProjectValidator $validator, Filesystem $filesystem, Storage $storage) {
        $this->repository = $repository;
        $this->validator = $validator;
        $this->filesystem = $filesystem;
        $this->storage = $storage;
    }

    public function create(array $data) {
        /**
         * @method String create(array $data) Description create()
         * 
         * Aqui poderiamos enviar um email.
         * Disparar uma notificação.
         * Realizar alguma determinada ação.
         */
        try {
            $this->validator->with($data)->passeOrFail();
            return $this->repository->create($data);
        } catch (ValidatorException $e) {
            return [
                'error' => 'true',
                'message' => $e->getMessageBag()
            ];
        }
    }

    public function update(array $data, $id) 
    {
        /**
         * @method String update(String $data, int $id) Description update()
         * 
         * 
         */
        try {
            $this->validator->with($data)->passeOrFail();
            return $this->repository->update($data, $id);
        } catch (ValidatorException $e) {
            return [
                'error' => 'true',
                'message' => $e->getMessageBag()
            ];
        }
    }
    public function createFile(array $data)
    {
        $project = $this->repository->skipPresenter()->find($data['project_id']);
        $projectFile = $project->files()->create($data);
        
        $this->storage->put($projectFile->id.".".$data['extension'], $this->filesystem->get($data['file']));

        // name
        // description
        // extension
        // file
    }

}
