<?php

namespace App\Http\Middleware;

use Closure;

class CheckProjectOwner
{
    private $repository;
    
    public function __construct(\App\Repositories\ProjectRepository $repository)
    {
        $this->repository = $repository;
    }
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $userId = \LucaDegasperi\OAuth2Server\Facades\Authorizer::getResourceOwnerId();
        $projectId = $request->project;
         if($this->repository->isOwner($projectId, $userId) == false){
            return ['Error' => 'Access forbidden'];
         }
        
        return $next($request);
    }
}
