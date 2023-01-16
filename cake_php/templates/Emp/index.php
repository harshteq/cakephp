<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Emp> $emp
 */
?>
<div class="emp index content">
    <?= $this->Html->link(__('New Emp'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <?= $this->Html->link(__('send mail'), ['action' => 'myadd'], ['class' => 'button float-left']) ?>
    <!-- <h3><?= __('Emp') ?></h3><?php echo $this->Html->image('sas.jpg');?> -->

    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('name') ?></th>
                    <th><?= $this->Paginator->sort('email') ?></th>
                    <th><?= $this->Paginator->sort('address') ?></th>
                    <th><?= $this->Paginator->sort('city') ?></th>
                    <th><?= $this->Paginator->sort('pincode') ?></th>
                    <th><?= $this->Paginator->sort('country') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($emp as $emp): ?>
                <tr>
                    <td><?= $this->Number->format($emp->id) ?></td>
                    <td><?= h($emp->name) ?></td>
                    <td><?= h($emp->email) ?></td>
                    <td><?= h($emp->address) ?></td>
                    <td><?= h($emp->city) ?></td>
                    <td><?= h($emp->pincode) ?></td>
                    <td><?= h($emp->country) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $emp->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $emp->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $emp->id], ['confirm' => __('Are you sure you want to delete # {0}?', $emp->id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
            
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>
