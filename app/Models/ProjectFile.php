<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class ProjectFile extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = [
        'name',
        'description',
        'extension',
    ];
    /**
     * @method Responsavel por fazer o relacionamento entre as tabelas.
     * Project <--> ProjectNote
     * @return type
     */
    public function project() 
    {
        return $this->belongsTo(Project::class);
    }
}
