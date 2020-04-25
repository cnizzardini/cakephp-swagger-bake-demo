<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Rental $rental
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Rental'), ['action' => 'edit', $rental->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Rental'), ['action' => 'delete', $rental->id], ['confirm' => __('Are you sure you want to delete # {0}?', $rental->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Rentals'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Rental'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="rentals view content">
            <h3><?= h($rental->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Inventory') ?></th>
                    <td><?= $rental->has('inventory') ? $this->Html->link($rental->inventory->id, ['controller' => 'Inventories', 'action' => 'view', $rental->inventory->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Customer') ?></th>
                    <td><?= $rental->has('customer') ? $this->Html->link($rental->customer->id, ['controller' => 'Customers', 'action' => 'view', $rental->customer->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Employee') ?></th>
                    <td><?= $rental->has('employee') ? $this->Html->link($rental->employee->id, ['controller' => 'Employees', 'action' => 'view', $rental->employee->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($rental->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Rental Date') ?></th>
                    <td><?= h($rental->rental_date) ?></td>
                </tr>
                <tr>
                    <th><?= __('Return Date') ?></th>
                    <td><?= h($rental->return_date) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($rental->modified) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Payments') ?></h4>
                <?php if (!empty($rental->payments)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Customer Id') ?></th>
                            <th><?= __('Employee Id') ?></th>
                            <th><?= __('Rental Id') ?></th>
                            <th><?= __('Amount') ?></th>
                            <th><?= __('Created') ?></th>
                            <th><?= __('Modified') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($rental->payments as $payments) : ?>
                        <tr>
                            <td><?= h($payments->id) ?></td>
                            <td><?= h($payments->customer_id) ?></td>
                            <td><?= h($payments->employee_id) ?></td>
                            <td><?= h($payments->rental_id) ?></td>
                            <td><?= h($payments->amount) ?></td>
                            <td><?= h($payments->created) ?></td>
                            <td><?= h($payments->modified) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Payments', 'action' => 'view', $payments->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Payments', 'action' => 'edit', $payments->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Payments', 'action' => 'delete', $payments->id], ['confirm' => __('Are you sure you want to delete # {0}?', $payments->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
