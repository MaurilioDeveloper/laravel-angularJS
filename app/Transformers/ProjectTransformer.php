<?php

namespace App\Transformers;

use App\Models\Project;
use League\Fractal\TransformerAbstract;
/**
 * Description of ProjectTransformer
 *
 * @author Maurilio
 */
class ProjectTransformer extends TransformerAbstract
{
    protected $defaultIncludes = ['members'];
    public function transform(Project $project)
    {
        return [
            'project_id' => $project->id,
            'client_id' => $project->client_id,
            'owner_id' => $project->owner_id,
            'members' => $project->members,
            'project' => $project->name,
            'description' => $project->description,
            'progress' => $project->progress,
            'status' => $project->status,
            'due_date' => $project->due_date,
        ];
    }
    
    public function includeMembers(Project $project)
    {
        return $this->collection($project->members, new ProjectMemberTransformer());
    }
    
}
