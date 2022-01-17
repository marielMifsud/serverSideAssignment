<?php

namespace App\Controller;

class TradesController extends AppController
{
    public function beforeFilter(\Cake\Event\EventInterface $event)
    {
        parent::beforeFilter($event);
        $this->Authentication->addUnauthenticatedActions(['index']);
    }
    public function index()
    {
        $allTrades = $this->fetchTable('Trades')->find()->contain(['Tickers'])->contain(['Users'])->all();
        $this->set("allTrades", $allTrades);
      

        $tickersTable = $this->fetchTable('Tickers');
        $allTickers = $tickersTable->find('list')->toArray();
        $this->set("allTickers", $allTickers);

        

        if($this->request->is("post"))
        {
            $tradesTable = $this->fetchTable('Trades');
            $newTrade = $tradesTable->newEntity($this->request->getData());
            
            $attachment = $this->request->getData('attachment');
            $name = $attachment->getClientFileName();
            $targetPath = WWW_ROOT.'img'.DS.$name;
            $newTrade->image_name = $name;
            $attachment->moveTo($targetPath);
           
            
            $newTrade->user_id = $this->loggedInUser->id;
            

            if($tradesTable->save($newTrade))
            {
                $this->Flash->success("Trade has been saved");
                
                return $this->redirect(['action' => 'index']);
            }
            else
            {
                $this->Flash->error("Trade was unsuccssful");
            }
        }

       


       
    }
}
