<?php

namespace App\Repositories;

use App\Models\Client;
use Prettus\Repository\Eloquent\BaseRepository;
/**
 * Description of ClientRepositoryEloquent
 * 
 * Classe responsavel para fazer a ligação entre os Models e Controllers
 * sem necessariamente ser colocado toda a codificação de Ligação de Models x Controller
 * nos Controllers.
 * Assim deixando a aplicação com menos acoplamento possivel e não fazer que a aplicação
 * dependa especificamente e um ORM. No caso estamos trabalhando com Eloquent, mas
 * poderiamos trabalhar com Doctrine, modificando somente nos repositories.
 * 
 * @author Maurilio
 */
class ClientRepositoryEloquent extends BaseRepository implements ClientRepository
{
    /*
     * Os repositories, são responsaveis apenas para nossa abstação com
     * banco de dados. Com ligação com o banco de dados.
     */
    
    public function model()
    {
        return Client::class;
    }
    
}
