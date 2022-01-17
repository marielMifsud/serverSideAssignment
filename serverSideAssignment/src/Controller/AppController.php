<?php
declare(strict_types=1);

namespace App\Controller;

use Cake\Controller\Controller;


class AppController extends Controller
{
    public $loggedInUser;
    
 
    public function initialize(): void
    {
        parent::initialize();

        $this->loadComponent('RequestHandler');
        $this->loadComponent('Flash');

        
        $this->loadComponent('Authentication.Authentication');

        if($user = $this->Authentication->getIdentity())
        {
            $this->set('loggedInUser', $user);

            $this->loggedInUser = $user;
            
        }
        
    }
}
