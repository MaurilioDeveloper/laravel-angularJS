<?php

namespace App\Models;

use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;
use Illuminate\Database\Eloquent\Model;

/**
 * Description of ProjectMember
 *
 * @author Maurilio
 */
class ProjectMember extends Model implements Transformable{
    use TransformableTrait;

    protected $fillable = [
        'project_id',
        'member_id',
    ];
    
}
