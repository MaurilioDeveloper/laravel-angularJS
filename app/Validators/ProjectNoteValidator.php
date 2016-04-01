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
class ProjectNoteValidator extends LaravelValidator
{
    protected $rules = [
        'project_id' => 'required|integer',
        'title' => 'required',
        'note' => 'required',
      
    ];
    
}
