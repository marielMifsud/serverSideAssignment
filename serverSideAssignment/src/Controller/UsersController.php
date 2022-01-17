<?php

namespace App\Controller;

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
        $this->request->allowMethod(['get', 'post']);
        $result = $this->Authentication->getResult();
        // regardless of POST or GET, redirect if user is logged in
        if ($result->isValid()) {
            // redirect to /articles after login success
            $redirect = $this->request->getQuery('redirect', [
                'controller' => 'Trades',
                'action' => 'index',
            ]);
    
            return $this->redirect($redirect);
        }
        // display error if user submitted and authentication failed
        if ($this->request->is('post') && !$result->isValid()) {
            $this->Flash->error(__('Invalid username or password'));
        }
    }

    public function logout()
    {
        $result = $this->Authentication->getResult();
        // regardless of POST or GET, redirect if user is logged in
        if ($result->isValid()) {
            $this->Authentication->logout();
            return $this->redirect(['controller' => 'Users', 'action' => 'login']);
        }
    }
}
