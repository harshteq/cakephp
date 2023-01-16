<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Emp $emp
 */
?>
<div class="row">
    <aside class="column">
        
    </aside>
    <div class="column-responsive column-80">
        <div class="emp form content">
            <?= $this->Form->create() ?>
            <fieldset>
            <legend><?= __('update Emp') ?></legend>
                <?php
                foreach($results as $record){

                    echo $this->Form->control('name');

                    echo $this->Form->control('address');
                    echo $this->Form->control('city');
                    echo $this->Form->control('pincode');
                    echo $this->Form->control('country');   
                }
                ?>

            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>

