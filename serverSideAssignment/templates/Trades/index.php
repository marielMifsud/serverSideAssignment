<h1 class="text-center mt-3"> Trades List </h1>
<hr>

<?php

echo '<h1 class="text-center mt-3"> Add Trade</h1>';
echo '<div class="row mt-5">';
echo '<div class="col-6 offset-3">';


echo $this->Form->create(null, ['type' => 'file']);
echo $this->Form->control("ticker_id", ['options' => $allTickers, 'label' => false, 'class' => 'form-control mb-3']);
echo $this->Form->control("notes", ['type' => 'textarea', 'placeholder' => 'Enter your notes', 'label' => false, 'class' => 'form-control mb-3']);
echo $this->Form->control("amount_of_shares", ['placeholder' => 'Enter amount of shares', 'label' => false, 'class' => 'form-control mb-3']);
echo $this->Form->control("price_bought", ['placeholder' => 'Enter the price the share where bought', 'label' => false, 'class' => 'form-control mb-3']);
echo $this->Form->control("image_url", ['type' => 'file', 'label' => false, 'name' => 'attachment', 'class' => 'form-control mb-3']);
echo 'Private: ';
echo $this->Form->checkbox("privacy_setting",  ['name' => 'privacy_setting']);
echo '</br>';
echo '<select class="progLang1 form-select" multiple="true" name="share[]" style="width: 99%;">';
foreach($allUsers as $user)
{
    echo ' <option value="'.$user->email.'">'.$user->email.'</option>';
}
echo '</select>';

echo $this->Form->submit("Add Trade", ['class' => 'btn btn-secondary mt-3 col-6 offset-3']);
echo $this->Form->end();
echo '</div>';
echo '</div>';



if (count($allTrades) > 0) {
   


    foreach ($allTrades as $trade) {

        

        if ($trade->privacy_setting == 0 || (isset($loggedInUser) && $trade->user_id == $loggedInUser->id)) {
       
            
            

            $owner_name = $trade->user->first_name . ' ' . $trade->user->last_name;



            echo '<div class="card mt-3 " id="listTrades" style="width: 18rem; display:inline-block; padding:2px; margin-right: 5%;">';
            echo '<div class="card-body">';
            echo '<h5 class="card-title">Trade:' . $trade->id . '</h5>';
            echo '<hr/>';
            echo '<h6 class="card-subtitle mb-2 text-muted">Ticker: ' . $trade->ticker->ticker . '</h6>';
            echo '<p><b>Owner name: </b>' . $owner_name;
            echo '<p><b>Notes:</b> ' . $trade->notes . '</p>';
            echo '<p><b>Amount of shares:</b> ' . $trade->amount_of_shares . '</p>';
            echo '<p><b>Price bought:</b>' . $trade->price_bought . '</p>';
            echo '<p><b>Date:</b>' . date('dS F Y H:i', strtotime($trade->date)) . '</p>';
            echo '<p><b>Image:</b></p>';
            echo '<p><img src="./webroot/img/' . $trade->image_name . '"style="width: 200px; height:200px"></p>';


            echo '<div class="d-flex justify-content-center">';
            echo '<button type="button" class="btn btn-success" name="likeButton"><i class="bi bi-hand-thumbs-up"></i></button>';
            echo '</div>';

            echo '<div class="d-flex justify-content-center">';
            echo '<button type="button" class="btn btn-danger"><i class="bi bi-hand-thumbs-down"></i></button>';
            echo '</div>';




            echo '</div>';

            echo '</div>';
        }
    }
} else
    echo "No trades available";



    
?>


