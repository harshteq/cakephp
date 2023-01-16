

<?php
use Symfony\Contracts\Service\Attribute\Required;
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Info $info
 */
?>
<div class="row">
    
    <div class="column-responsive column-80">
 
        <div class="info form content">
    
            <?= $this->Form->create() ?>
     
            <fieldset>
                <?php
                    echo $this->Form->control('email');
                    echo $this->Form->control('password');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
