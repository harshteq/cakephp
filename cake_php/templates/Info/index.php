<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Info> $info
 */
?>

<?php
$this->Breadcrumbs->add([
    ['title' => 'Products', 'url' => ['controller' => 'info', 'action' => 'Products']],
    ['title' => 'Product name', 'url' => ['controller' => 'info', 'action' => 'index']]
]);

?>


<?php

echo $this->Breadcrumbs->render();          

?>
<div class="info index content">

    <?= $this->Html->link(__('New Info'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Info') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('firstname') ?></th>
                    <th><?= $this->Paginator->sort('lastname') ?></th>
                    <th><?= $this->Paginator->sort('email') ?></th>
                    <th><?= $this->Paginator->sort('phonenumber') ?></th>
                    <th><?= $this->Paginator->sort('image') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($info as $info): ?>
                <tr>
                    <td><?= $this->Number->format($info->id) ?></td>
                    <td><?= h($info->firstname) ?></td>
                    <td><?= h($info->lastname) ?></td>
                    <td><?= h($info->email) ?></td>
                    <td><?= h($info->phonenumber) ?></td>
                    <td><?= $this->Html->image($info->image)?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $info->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $info->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $info->id], ['confirm' => __('Are you sure you want to delete # {0}?', $info->id)]) ?>
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
