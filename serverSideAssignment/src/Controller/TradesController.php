<?php

namespace App\Controller;
use Cake\Log\Log;
class TradesController extends AppController
{
    
    public function beforeFilter(\Cake\Event\EventInterface $event)
    {
        parent::beforeFilter($event);
        $this->Authentication->addUnauthenticatedActions(['index']);
    }
    public function index()
    {

        $ipAdrress = $_SERVER['REMOTE_ADDR'];
        $allTrades = $this->fetchTable('Trades')->find()->contain(['Tickers'])->contain(['Users'])->all();
        $this->set("allTrades", $allTrades);




        $tickersTable = $this->fetchTable('Tickers');
        $allTickers = $tickersTable->find('list')->toArray();
        $this->set("allTickers", $allTickers);

        $usersTable = $this->fetchTable('Users');
        $allUsers = $usersTable->find()->toArray();
        $this->set('allUsers', $allUsers);

        $likesTable = $this->fetchTable('Likes');
        $allLikes = $likesTable->find()->toArray();
        $this->set('allLikes', $allLikes);

        if ($this->request->is("post")) {
            $tradesTable = $this->fetchTable('Trades');
            $newTrade = $tradesTable->newEntity($this->request->getData());

            $attachment = $this->request->getData('attachment');
            $name = $attachment->getClientFileName();
            $targetPath = WWW_ROOT . 'img' . DS . $name;
            $newTrade->image_name = $name;
            $attachment->moveTo($targetPath);

            $newTrade->user_id = $this->loggedInUser->id;

            if ($tradesTable->save($newTrade)) {
                $this->Flash->success("Trade has been saved");
                Log::info('Message: Trade has been saved, IP Address of user: '.$ipAdrress.' Email '.$this->loggedInUser->email . ' Current user logged in: ' .$this->loggedInUser->id. ' Trade Id: '. $newTrade->id, ['scope' => 'trades']);
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error("Trade was unsuccssful");
            }
        }
    }


    public function edit($id)
    {
        $tradesTable = $this->fetchTable('Trades');
        $tickersTable = $this->fetchTable('Tickers');
        $allTickers = $tickersTable->find('list')->toArray();
        $this->set("allTickers", $allTickers);

        $usersTable = $this->fetchTable('Users');
        $allUsers = $usersTable->find()->toArray();
        $this->set('allUsers', $allUsers);

        $tradeToEdit = $tradesTable->findById($id)->first();

        if ($this->request->is(['post', 'put'])) {
            $tradeToEdit = $tradesTable->patchEntity($tradeToEdit, $this->request->getData());

            $attachment = $this->request->getData('attachment');
            $name = $attachment->getClientFileName();
            $targetPath = WWW_ROOT . 'img' . DS . $name;
            $tradeToEdit->image_name = $name;
            $attachment->moveTo($targetPath);

            if ($tradesTable->save($tradeToEdit)) {
                $this->Flash->success('Trade updated');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('Trade failed to update');
            }
        }

        $this->set('tradeToEdit', $tradeToEdit);
    }


    public function delete($id)
    {
        $tradesTable = $this->fetchTable('Trades');
        $tradeToDelete = $tradesTable->findById($id)->first();

        if ($tradesTable->delete($tradeToDelete) == true) {
            $this->Flash->success("Trade Deleted");
        } else {
            $this->Flash->error('Trade not Deleted');
        }

        return $this->redirect(['action' => 'index']);
    }


    public function likeButton($trade_id, $user_id)
    {
        $ipAdrress = $_SERVER['REMOTE_ADDR'];
        $likesTable = $this->fetchTable('Likes');     
        $allLikes = $likesTable->find()->toArray();
        $this->set('allLikes', $allLikes);

        $likeData = ['trade_id' => $trade_id, 'user_id' => $user_id];

        $newLike = $likesTable->newEntity($likeData);

        if($likesTable->save($newLike))
        {
            $this->Flash->success('Liked trade');
            Log::info('Message: Trade has been liked, IP Address of user: '.$ipAdrress.' Email '.$this->loggedInUser->email . ' Current user logged in: ' .$this->loggedInUser->id,['scope' => 'trades']);
            return $this->redirect(['action' => 'index']);
        }
        else
        {
            $this->Flash->error('Error with liking trade');
        }

    }

    public function dislikeButton($id)
    {
        $ipAdrress = $_SERVER['REMOTE_ADDR'];
        $likesTable = $this->fetchTable('Likes');     
        $allLikes = $likesTable->find()->toArray();
        $this->set('allLikes', $allLikes);
      
        $likeToDelete = $likesTable->get($id);


        if($likesTable->delete($likeToDelete) == true)
        {
            $this->Flash->success('Disliked trade');
            Log::info('Message: Trade has been disliked, IP Address of user: '.$ipAdrress.' Email '.$this->loggedInUser->email . ' Current user logged in: ' .$this->loggedInUser->id,['scope' => 'trades']);
            return $this->redirect(['action' => 'index']);
        }
        else
        {
            $this->Flash->error('Error with dislikingtrade');
        }


    }

    public function usertrades()
    {
        $allTrades = $this->fetchTable('Trades')->find()->contain(['Tickers'])->contain(['Users'])->all();
        $this->set("allTrades", $allTrades);

        
        $name = $attachment->getClientFileName();
            $targetPath = WWW_ROOT . 'img' . DS . $name;
       


    }
}
