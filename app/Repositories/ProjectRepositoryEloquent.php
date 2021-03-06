<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\ProjectRepository;
use App\Models\Project;
use App\Validators\ProjectValidator;
use App\Presenters\ProjectPresenter;

/**
 * Class ProjectRepositoryEloquent
 * @package namespace App\Repositories;
 */
class ProjectRepositoryEloquent extends BaseRepository implements ProjectRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Project::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
    /*
     * Metodo que verifica se um usuario é dono de um determinado projeto
     *
     */
    public function isOwner($projectId, $userId){
        if(count($this->findWhere(['id' => $projectId, 'owner_id' => $userId]))){
            return true;
        }
        return false;
    }
    
    public function hasMember($projectId, $memberId)
    {
        $project = $this->find($projectId);
        
        foreach($project->members as $member){
            if($member->id == $memberId){
                return true;
            }
        }
        return false;
    }
    
    public function presenter() 
    {
        return ProjectPresenter::class;
    }
}
