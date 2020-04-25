<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Employee $employee
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Employee'), ['action' => 'edit', $employee->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Employee'), ['action' => 'delete', $employee->id], ['confirm' => __('Are you sure you want to delete # {0}?', $employee->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Employees'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Employee'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="employees view content">
            <h3><?= h($employee->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('First Name') ?></th>
                    <td><?= h($employee->first_name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Last Name') ?></th>
                    <td><?= h($employee->last_name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Address') ?></th>
                    <td><?= $employee->has('address') ? $this->Html->link($employee->address->id, ['controller' => 'Addresses', 'action' => 'view', $employee->address->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Email') ?></th>
                    <td><?= h($employee->email) ?></td>
                </tr>
                <tr>
                    <th><?= __('Store') ?></th>
                    <td><?= $employee->has('store') ? $this->Html->link($employee->store->id, ['controller' => 'Stores', 'action' => 'view', $employee->store->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Username') ?></th>
                    <td><?= h($employee->username) ?></td>
                </tr>
                <tr>
                    <th><?= __('Password') ?></th>
                    <td><?= h($employee->password) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($employee->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($employee->modified) ?></td>
                </tr>
                <tr>
                    <th><?= __('Is Active') ?></th>
                    <td><?= $employee->is_active ? __('Yes') : __('No'); ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Payments') ?></h4>
                <?php if (!empty($employee->payments)) : ?>
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
                        <?php foreach ($employee->payments as $payments) : ?>
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
            <div class="related">
                <h4><?= __('Related Rentals') ?></h4>
                <?php if (!empty($employee->rentals)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Rental Date') ?></th>
                            <th><?= __('Inventory Id') ?></th>
                            <th><?= __('Customer Id') ?></th>
                            <th><?= __('Return Date') ?></th>
                            <th><?= __('Employee Id') ?></th>
                            <th><?= __('Modified') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($employee->rentals as $rentals) : ?>
                        <tr>
                            <td><?= h($rentals->id) ?></td>
                            <td><?= h($rentals->rental_date) ?></td>
                            <td><?= h($rentals->inventory_id) ?></td>
                            <td><?= h($rentals->customer_id) ?></td>
                            <td><?= h($rentals->return_date) ?></td>
                            <td><?= h($rentals->employee_id) ?></td>
                            <td><?= h($rentals->modified) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Rentals', 'action' => 'view', $rentals->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Rentals', 'action' => 'edit', $rentals->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Rentals', 'action' => 'delete', $rentals->id], ['confirm' => __('Are you sure you want to delete # {0}?', $rentals->id)]) ?>
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
