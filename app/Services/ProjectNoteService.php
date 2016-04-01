<?php

namespace App\Services;

use App\Repositories\ProjectNoteRepository;
use App\Validators\ProjectNoteValidator;
use Prettus\Validator\Exceptions\ProjectValidator;

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
class ProjectNoteService {
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

    public function __construct(ProjectNoteRepository $repository, ProjectNoteValidator $validator) {
        $this->repository = $repository;
        $this->validator = $validator;
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

}
