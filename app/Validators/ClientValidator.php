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
class ClientValidator extends LaravelValidator
{
    protected $rules = [
        'name' => 'required|max:255',
        'responsible' => 'required|max:255',
        'email' => 'required|email',
        'address' => 'required'
    ];
    
}
