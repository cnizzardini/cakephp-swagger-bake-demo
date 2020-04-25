<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Employee[]|\Cake\Collection\CollectionInterface $employees
 */
?>
<div class="employees index content">
    <?= $this->Html->link(__('New Employee'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Employees') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('first_name') ?></th>
                    <th><?= $this->Paginator->sort('last_name') ?></th>
                    <th><?= $this->Paginator->sort('address_id') ?></th>
                    <th><?= $this->Paginator->sort('email') ?></th>
                    <th><?= $this->Paginator->sort('store_id') ?></th>
                    <th><?= $this->Paginator->sort('is_active') ?></th>
                    <th><?= $this->Paginator->sort('username') ?></th>
                    <th><?= $this->Paginator->sort('password') ?></th>
                    <th><?= $this->Paginator->sort('modified') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($employees as $employee): ?>
                <tr>
                    <td><?= $this->Number->format($employee->id) ?></td>
                    <td><?= h($employee->first_name) ?></td>
                    <td><?= h($employee->last_name) ?></td>
                    <td><?= $employee->has('address') ? $this->Html->link($employee->address->id, ['controller' => 'Addresses', 'action' => 'view', $employee->address->id]) : '' ?></td>
                    <td><?= h($employee->email) ?></td>
                    <td><?= $employee->has('store') ? $this->Html->link($employee->store->id, ['controller' => 'Stores', 'action' => 'view', $employee->store->id]) : '' ?></td>
                    <td><?= h($employee->is_active) ?></td>
                    <td><?= h($employee->username) ?></td>
                    <td><?= h($employee->password) ?></td>
                    <td><?= h($employee->modified) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $employee->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $employee->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $employee->id], ['confirm' => __('Are you sure you want to delete # {0}?', $employee->id)]) ?>
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
