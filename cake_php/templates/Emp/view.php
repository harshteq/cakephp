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
            <?= $this->Html->link(__('Edit Emp'), ['action' => 'edit', $emp->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Emp'), ['action' => 'delete', $emp->id], ['confirm' => __('Are you sure you want to delete # {0}?', $emp->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Emp'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Emp'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="emp view content">
            <h3><?= h($emp->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($emp->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($emp->email) ?></td>
                </tr>
                <tr>
                    <th><?= __('Address') ?></th>
                    <td><?= h($emp->address) ?></td>
                </tr>
                <tr>
                    <th><?= __('City') ?></th>
                    <td><?= h($emp->city) ?></td>
                </tr>
                <tr>
                    <th><?= __('Pincode') ?></th>
                    <td><?= h($emp->pincode) ?></td>
                </tr>
                <tr>
                    <th><?= __('Country') ?></th>
                    <td><?= h($emp->country) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($emp->id) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
