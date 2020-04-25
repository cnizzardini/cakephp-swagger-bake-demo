<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Address $address
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Address'), ['action' => 'edit', $address->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Address'), ['action' => 'delete', $address->id], ['confirm' => __('Are you sure you want to delete # {0}?', $address->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Addresses'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Address'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="addresses view content">
            <h3><?= h($address->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Address') ?></th>
                    <td><?= h($address->address) ?></td>
                </tr>
                <tr>
                    <th><?= __('Address2') ?></th>
                    <td><?= h($address->address2) ?></td>
                </tr>
                <tr>
                    <th><?= __('District') ?></th>
                    <td><?= h($address->district) ?></td>
                </tr>
                <tr>
                    <th><?= __('City') ?></th>
                    <td><?= $address->has('city') ? $this->Html->link($address->city->name, ['controller' => 'Cities', 'action' => 'view', $address->city->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Postal Code') ?></th>
                    <td><?= h($address->postal_code) ?></td>
                </tr>
                <tr>
                    <th><?= __('Phone') ?></th>
                    <td><?= h($address->phone) ?></td>
                </tr>
                <tr>
                    <th><?= __('Location') ?></th>
                    <td><?= h($address->location) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($address->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($address->modified) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Customers') ?></h4>
                <?php if (!empty($address->customers)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Store Id') ?></th>
                            <th><?= __('First Name') ?></th>
                            <th><?= __('Last Name') ?></th>
                            <th><?= __('Email') ?></th>
                            <th><?= __('Address Id') ?></th>
                            <th><?= __('Is Active') ?></th>
                            <th><?= __('Created') ?></th>
                            <th><?= __('Modified') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($address->customers as $customers) : ?>
                        <tr>
                            <td><?= h($customers->id) ?></td>
                            <td><?= h($customers->store_id) ?></td>
                            <td><?= h($customers->first_name) ?></td>
                            <td><?= h($customers->last_name) ?></td>
                            <td><?= h($customers->email) ?></td>
                            <td><?= h($customers->address_id) ?></td>
                            <td><?= h($customers->is_active) ?></td>
                            <td><?= h($customers->created) ?></td>
                            <td><?= h($customers->modified) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Customers', 'action' => 'view', $customers->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Customers', 'action' => 'edit', $customers->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Customers', 'action' => 'delete', $customers->id], ['confirm' => __('Are you sure you want to delete # {0}?', $customers->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
            <div class="related">
                <h4><?= __('Related Employees') ?></h4>
                <?php if (!empty($address->employees)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('First Name') ?></th>
                            <th><?= __('Last Name') ?></th>
                            <th><?= __('Address Id') ?></th>
                            <th><?= __('Picture') ?></th>
                            <th><?= __('Email') ?></th>
                            <th><?= __('Store Id') ?></th>
                            <th><?= __('Is Active') ?></th>
                            <th><?= __('Username') ?></th>
                            <th><?= __('Password') ?></th>
                            <th><?= __('Modified') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($address->employees as $employees) : ?>
                        <tr>
                            <td><?= h($employees->id) ?></td>
                            <td><?= h($employees->first_name) ?></td>
                            <td><?= h($employees->last_name) ?></td>
                            <td><?= h($employees->address_id) ?></td>
                            <td><?= h($employees->picture) ?></td>
                            <td><?= h($employees->email) ?></td>
                            <td><?= h($employees->store_id) ?></td>
                            <td><?= h($employees->is_active) ?></td>
                            <td><?= h($employees->username) ?></td>
                            <td><?= h($employees->password) ?></td>
                            <td><?= h($employees->modified) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Employees', 'action' => 'view', $employees->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Employees', 'action' => 'edit', $employees->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Employees', 'action' => 'delete', $employees->id], ['confirm' => __('Are you sure you want to delete # {0}?', $employees->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
            <div class="related">
                <h4><?= __('Related Stores') ?></h4>
                <?php if (!empty($address->stores)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Manager Employee Id') ?></th>
                            <th><?= __('Address Id') ?></th>
                            <th><?= __('Modified') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($address->stores as $stores) : ?>
                        <tr>
                            <td><?= h($stores->id) ?></td>
                            <td><?= h($stores->manager_employee_id) ?></td>
                            <td><?= h($stores->address_id) ?></td>
                            <td><?= h($stores->modified) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Stores', 'action' => 'view', $stores->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Stores', 'action' => 'edit', $stores->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Stores', 'action' => 'delete', $stores->id], ['confirm' => __('Are you sure you want to delete # {0}?', $stores->id)]) ?>
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
