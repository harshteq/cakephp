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
            <?= $this->Form->create() ?>
            <fieldset>
                <legend><?= __('<h2>forget password</h2>') ?></legend>
                <?php
                    // echo $this->Form->control('name');
                    echo $this->Form->control('email'); 
                ?>
               

            </fieldset>
            <?= $this->Form->button(__('send mail')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>

