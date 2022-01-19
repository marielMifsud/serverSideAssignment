<h1 class="text-center">Trade edit</h1>

<div class="row">
    <div class="col-6 offset-3">
        <?php
        echo $this->Form->create($tradeToEdit, ['type' => 'file']);
        echo $this->Form->control("ticker_id", ['options' => $allTickers, 'label' => false, 'class' => 'form-control mb-3']);
        echo $this->Form->control("notes", ['type' => 'textarea', 'placeholder' => 'Enter your notes', 'label' => false, 'class' => 'form-control mb-3']);
        echo $this->Form->control("amount_of_shares", [ 'label' => false, 'class' => 'form-control mb-3']);
        echo $this->Form->control("price_bought", [  'label' => false, 'class' => 'form-control mb-3']);
        echo $this->Form->control("image_url", ['type' => 'file', 'label' => false, 'name' => 'attachment', 'class' => 'form-control mb-3']);
        echo 'Private: ';
        echo $this->Form->checkbox("privacy_setting",  ['name' => 'privacy_setting']);
        echo '</br>';
        echo '<select class="progLang1 form-select" multiple="true" name="share[]" style="width: 99%;">';
        foreach ($allUsers as $user) {
            echo ' <option value="' . $user->email . '">' . $user->email . '</option>';
        }
        echo '</select>';

        echo $this->Form->submit("Update Trade", ['class' => 'btn btn-secondary mt-3 col-6 offset-3']);



        echo $this->Form->end();

        ?>


    </div>
</div>