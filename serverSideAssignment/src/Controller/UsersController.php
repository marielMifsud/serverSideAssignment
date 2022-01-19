<?php

namespace App\Controller;
use Cake\Log\Log;

class UsersController extends AppController
{
    public function beforeFilter(\Cake\Event\EventInterface $event)
    {
        parent::beforeFilter($event);
        $this->Authentication->addUnauthenticatedActions(['login', 'register']);
    }

    public function register()
    {
        $allUsers = $this->fetchTable('Users')->find()->all();
        $this->set("allUsers", $allUsers);

       

        if ($this->request->is("post")) {
            $usersTable = $this->fetchTable('Users');

            $newUser = $usersTable->newEntity($this->request->getData());

            if ($usersTable->save($newUser)) {
                $this->Flash->success("User has been registered");
                return $this->redirect(['action' => 'login']);
            } else {
                $this->Flash->error("Error with user registration");
            }
        }
    }

    public function login()
    {
        $ipAdrress = $_SERVER['REMOTE_ADDR'];
        $this->request->allowMethod(['get', 'post']);
        $result = $this->Authentication->getResult();
        // regardless of POST or GET, redirect if user is logged in
        if ($result->isValid()) {
            // redirect to /articles after login success
            $redirect = $this->request->getQuery('redirect', [
                'controller' => 'Trades',
                'action' => 'index',
            ]);
    
            Log::alert('Message: User Logged In, IP Address of user: '.$ipAdrress.' Email '.$this->loggedInUser->email . ' Current user logged in: ' .$this->loggedInUser->id, ['scope' => 'users']);
            return $this->redirect($redirect);
        }
        // display error if user submitted and authentication failed
        if ($this->request->is('post') && !$result->isValid()) {
            $this->Flash->error(__('Invalid username or password'));
        }
    }

    public function logout()
    {
        $ipAdrress = $_SERVER['REMOTE_ADDR'];
        $result = $this->Authentication->getResult();
        // regardless of POST or GET, redirect if user is logged in
        if ($result->isValid()) {
            $this->Authentication->logout();
            Log::alert('Message: User Logged Out, IP Address of user: '.$ipAdrress.' Email '.$this->loggedInUser->email . ' Current user logging out: ' .$this->loggedInUser->id, ['scope' => 'users']);
            return $this->redirect(['controller' => 'Users', 'action' => 'login']);
        }
    }


    public function showusers()
    {
        $allUsers = $this->fetchTable('Users')->find()->all();
        $this->set("allUsers" , $allUsers);
    }

   


}
