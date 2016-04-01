<?php

namespace App\Validators;

use Prettus\Validator\LaravelValidator;
/**
 * Description of ClientValidator
 * 
 * Classe resposavel por realizar as regras de validação de
 * campos que serão preenchidos para inserção 
 * de um cliente no banco de dados.
 * @author Maurilio
 */
class ProjectValidator extends LaravelValidator
{
    protected $rules = [
        'owner_id' => 'required|integer',
        'client_id' => 'required|integer',
        'name' => 'required|email',
        'description' => 'required',
        'progress' => 'required',
        'status' => 'required',
        'due_date' => 'require'
    ];
    
}
