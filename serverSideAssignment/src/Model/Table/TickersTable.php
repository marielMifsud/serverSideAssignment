<?php
namespace App\Model\Table;

use Cake\ORM\Table;


class TickersTable extends Table
{
    public function initialize(array $config): void
    {
        $this->setDisplayField('ticker');
        $this->hasMany("Trades");
    }

   
}