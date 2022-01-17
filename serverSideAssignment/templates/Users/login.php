<h1 class="text-center mt-3">Log In</h1>
<hr>

<?php
    echo '<div class="row mt-5">';
        echo '<div class="col-6 offset-3">';
        echo $this->Form->create();
        echo $this->Form->control("email", ['placeholder' => 'Enter the email', 'label' =>false, 'class'=>'form-control mb-3', 'required' => true]);
        echo $this->Form->control("password", ['type' => 'password', 'placeholder' => 'Enter the password', 'label' =>false, 'class'=>'form-control mb-3', 'required' => true]);
        echo $this->Form->submit("Log In", ['class' => 'btn btn-secondary mt-3 col-6 offset-3']);
        echo $this->Form->end();
    echo '</div>';
    echo '</div>';


?>