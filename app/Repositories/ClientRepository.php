<?php

namespace App\Repositories;

use Prettus\Repository\Contracts\RepositoryInterface;
/**
 * Interface responsavel pela ligação da nossa ORM Eloquent.
 * Trabalhando desta forma, é bom pois não gera acoplamento 
 * na aplicação e caso queiramos trabalhar com Doctrine por exemplo,
 * só seria necessario alterar a chamada nos providers, para uma 
 * repository responsavel pela aquela determinada ORM.
 * 
 * @author Maurilio
 */
interface ClientRepository extends RepositoryInterface
{
    
    
}
