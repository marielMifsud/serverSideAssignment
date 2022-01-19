<h1 class="text-center mt-3"> List of Users </h1>

<?php
if (count($allUsers) > 0) {
    foreach ($allUsers as $user) {

        $userFullName = $user->first_name." ".$user->last_name;
        echo '<div class="list-group mt-3">';
            echo '<div class="list-group-item list-group-item-action flex-column align-items-start dark">';
                echo '<div class="d-flex w-100 justify-content-between">';
                    echo '<p><b>'.$userFullName.'</b></p>';
                    echo '<p>'.$user->email.'</p>';

                echo '</div>';
            echo '</div>';
        echo '</div>';
    }
}


?>