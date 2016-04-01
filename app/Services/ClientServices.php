<?php

namespace App\Services;

use App\Repositories\ClientRepository;
use App\Validators\ClientValidator;
use Prettus\Validator\Exceptions\ValidatorException;

/**
 * Description of ClientServices
 * 
 * Nossa classe ClientService, é responsavel pelos serviços realizados 
 * pela parte de Clientes, ou seja, nela fica toda nossa regra de negócio.
 * Por exemplo: 
 * Criamos um Cliente, enviaremos um email.
 * Criamos um cliente, enviamos um post.
 * 
 * @author Maurilio
 */
class ClientServices {
    /**
     * Os Services são responsaveis por toda nossa regra de negocio,
     * alem de se ligar ao banco de dados atraves dos repositories,
     * tambem são responsaveis por criar todas nossas ações
     * tomadas ao realizar determinada tarefa.
     * 
     */

    /**
     * @var ClientRepository
     */
    protected $repository;

    /**
     * @var ClientValidator
     */
    protected $validator;

    public function __construct(ClientRepository $repository, ClientValidator $validator) {
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
