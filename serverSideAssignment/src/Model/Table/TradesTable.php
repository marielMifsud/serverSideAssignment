<?php
namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

class TradesTable extends Table
{
    public function initialize(array $config): void
    {
        $this->belongsTo('Tickers');
        $this->belongsTo('Users');
        $this->addBehavior('Timestamp');
    }

    public function validationDefault(Validator $validator): Validator
    {
        $validator->minLength('notes', 20, 'Minimum length is 20');
        $validator->allowEmptyString('notes');


        $validator->notEmptyString('amount_of_shares', 'Amount of shares is required');
        $validator->greaterThan('amount_of_shares', 0,  'Amount number can\'t be negative');

        $validator->notEmptyString('price_bought', 'Price is required');
        $validator->greaterThan('price_bought', 0, 'Price cannot be less then zero');
        

        $validator->notEmptyString('privacy_setting', 'Privacy setting is required');

        return $validator;
        
    }

}