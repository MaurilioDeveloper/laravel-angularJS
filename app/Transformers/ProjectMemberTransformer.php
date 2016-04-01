<?php

namespace App\Transformers;

use App\Models\User;
use League\Fractal\TransformerAbstract;
/**
 * Description of ProjectTransformer
 *
 * @author Maurilio
 */
class ProjectMemberTransformer extends TransformerAbstract
{
    public function transform(User $member)
    {
        return [
            'member_id' => $member->id,
            'nome' => $member->name,
        ];
    }
   
}
