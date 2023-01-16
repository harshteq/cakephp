<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Info $info
 */
?>
<?= $this->Html->link(__('Logout'), ['action' => 'logout'], ['class' => 'nav-link active']) ?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $info->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $info->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Info'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="info form content">
            <?= $this->Form->create($info,['enctype'=>'multipart/form-data']) ?>
            <fieldset>
                <legend><?= __('Edit Info') ?></legend>
                <?php
                    echo $this->Form->control('firstname');
                    echo $this->Form->control('lastname');
                    echo $this->Form->control('email');
                    echo $this->Form->control('password');
                    echo $this->Form->control('phonenumber');
                    echo $this->Form->control('change_image ',['type'=>'file']);
                echo $this->Html->image($info->image);
                // debug($info->image);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
