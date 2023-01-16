<style>
h2{
    text-align: center;
}
p{
    text-align: center;
}
    </style>

<?php
use Symfony\Contracts\Service\Attribute\Required;
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Info $info
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Info'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>

    <div class="column-responsive column-80">
 
        <div class="info form content">
    
            <?= $this->Form->create($info,['enctype'=>'multipart/form-data']) ?>
            <h2>Register</h2>
		<p class="hint-text">Create your account. It's free and only takes a minute.</p>
            <fieldset>
                <?php
                    echo $this->Form->control('firstname',['required'=>false]);
                    echo $this->Form->control('lastname',['required'=>false]);
                    echo $this->Form->control('email',['required'=>false]);
                    echo $this->Form->control('password',['required'=>false]);
                    echo $this->Form->control('phonenumber',['required'=>false]);
                    echo $this->Form->control('image_file',['type'=>'file']);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <div class="text-center">Already have an account? <a href="login">Login here</a></div>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
