<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Inventory[]|\Cake\Collection\CollectionInterface $inventories
 */
?>
<div class="inventories index content">
    <?= $this->Html->link(__('New Inventory'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Inventories') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('film_id') ?></th>
                    <th><?= $this->Paginator->sort('store_id') ?></th>
                    <th><?= $this->Paginator->sort('modified') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($inventories as $inventory): ?>
                <tr>
                    <td><?= $this->Number->format($inventory->id) ?></td>
                    <td><?= $inventory->has('film') ? $this->Html->link($inventory->film->title, ['controller' => 'Films', 'action' => 'view', $inventory->film->id]) : '' ?></td>
                    <td><?= $inventory->has('store') ? $this->Html->link($inventory->store->id, ['controller' => 'Stores', 'action' => 'view', $inventory->store->id]) : '' ?></td>
                    <td><?= h($inventory->modified) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $inventory->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $inventory->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $inventory->id], ['confirm' => __('Are you sure you want to delete # {0}?', $inventory->id)]) ?>
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
