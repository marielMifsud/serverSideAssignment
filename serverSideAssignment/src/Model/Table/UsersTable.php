<?php
namespace App\Model\Table;

use Cake\ORM\Table;


class UsersTable extends Table
{
    public function initialize(array $config): void
    {
        $this->setDisplayField('user');
        $this->belongsToMany("Trades");
        $this->belongsTo('Likes');
    }

   
}