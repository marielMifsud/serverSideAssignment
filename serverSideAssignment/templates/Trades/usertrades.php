<h1 class="text-center mt-3">My Trades</h1>

<?php



if (count($allTrades) > 0) {
    foreach ($allTrades as $trade) {

        if($loggedInUser->id == $trade->user_id)
        {
            $owner_name = $trade->user->first_name . ' ' . $trade->user->last_name;



            echo '<div class="card mt-4" id="listTrades" style="width: 18rem; display:inline-block; padding:2px; margin-right: 5%;">';
            echo '<div class="card-body">';
            echo '<h5 class="card-title">Trade:' . $trade->id . '</h5>';
            echo '</hr>';
            echo '<h6 class="card-subtitle mb-2 text-muted">Ticker: ' . $trade->ticker->ticker . '</h6>';
            echo '<p><b>Owner name: </b>' . $owner_name . '</p>';
            echo '<p><b>Notes:</b> ' . $trade->notes . '</p>';
            echo '<p><b>Amount of shares:</b> ' . $trade->amount_of_shares . '</p>';
            echo '<p><b>Price bought:</b>' . $trade->price_bought . '</p>';
            echo '<p><b>Date:</b>' . date('dS F Y H:i', strtotime($trade->date)) . '</p>';
            echo '<p><b>Image:</b></p>';
            echo '<img src="./webroot/img/' . $trade->image_name . '"style="width: 200px ; height:200px">';


            echo '<div style="width: 18rem; display:inline-block; margin-right: 5%;">';

            
            


            echo '</div>';









            echo '</div>';

            echo '</div>';

        }

        
        
        }
    }


?>