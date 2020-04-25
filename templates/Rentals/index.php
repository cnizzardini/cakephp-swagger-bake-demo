<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Rental[]|\Cake\Collection\CollectionInterface $rentals
 */
?>
<div class="rentals index content">
    <?= $this->Html->link(__('New Rental'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Rentals') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('rental_date') ?></th>
                    <th><?= $this->Paginator->sort('inventory_id') ?></th>
                    <th><?= $this->Paginator->sort('customer_id') ?></th>
                    <th><?= $this->Paginator->sort('return_date') ?></th>
                    <th><?= $this->Paginator->sort('employee_id') ?></th>
                    <th><?= $this->Paginator->sort('modified') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($rentals as $rental): ?>
                <tr>
                    <td><?= $this->Number->format($rental->id) ?></td>
                    <td><?= h($rental->rental_date) ?></td>
                    <td><?= $rental->has('inventory') ? $this->Html->link($rental->inventory->id, ['controller' => 'Inventories', 'action' => 'view', $rental->inventory->id]) : '' ?></td>
                    <td><?= $rental->has('customer') ? $this->Html->link($rental->customer->id, ['controller' => 'Customers', 'action' => 'view', $rental->customer->id]) : '' ?></td>
                    <td><?= h($rental->return_date) ?></td>
                    <td><?= $rental->has('employee') ? $this->Html->link($rental->employee->id, ['controller' => 'Employees', 'action' => 'view', $rental->employee->id]) : '' ?></td>
                    <td><?= h($rental->modified) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $rental->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $rental->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $rental->id], ['confirm' => __('Are you sure you want to delete # {0}?', $rental->id)]) ?>
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
