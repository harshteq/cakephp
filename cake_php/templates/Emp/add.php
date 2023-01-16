<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Emp $emp
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Emp'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="emp form content">
            <?= $this->Form->create($emp) ?>
            <fieldset>
                <legend><?= __('Add Emp') ?></legend>
                <?php
                    echo $this->Form->control('name');
                    echo $this->Form->control('email');
                    echo $this->Form->control('password');
                    echo $this->Form->control('address');
                    echo $this->Form->control('city');
                    echo $this->Form->control('pincode');
                    echo $this->Form->control('country');  
                ?>
               

            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>

