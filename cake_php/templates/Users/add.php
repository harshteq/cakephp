<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>

<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Users'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="users form content">
            <?= $this->Form->create($user,['enctype'=>'multipart/form-data']) ?>
            <fieldset>
                <legend><?= __('Add User') ?></legend>
                <?php
                    echo $this->Form->control('name',['required'=>false]);
                    echo $this->Form->control('email',['required'=>false]);
                    echo $this->Form->control('password',['required'=>false]); 
                    echo $this->Form->control('image_file',['type'=>'file','required'=>false]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
        </div>
    </div>
</div>
