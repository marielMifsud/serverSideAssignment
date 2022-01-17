<h1 class="text-center mt-3">Register User</h1>
<hr>

<?php
    echo '<div class="row mt-5">';
        echo '<div class="col-6 offset-3">';
        echo $this->Form->create();
        echo $this->Form->control("first_name", ['placeholder' => 'Enter the first name', 'label' =>false, 'class'=>'form-control mb-3']);
        echo $this->Form->control("last_name", ['placeholder' => 'Enter the last name', 'label' =>false, 'class'=>'form-control mb-3']);
        echo $this->Form->control("email", ['placeholder' => 'Enter the email', 'label' =>false, 'class'=>'form-control mb-3']);
        echo $this->Form->control("password", ['type' => 'password', 'placeholder' => 'Enter the password', 'label' =>false, 'class'=>'form-control mb-3']);
        echo $this->Form->submit("Register", ['class' => 'btn btn-secondary mt-3 col-6 offset-3']);
        echo $this->Form->end();
    echo '</div>';
    echo '</div>';


?>
