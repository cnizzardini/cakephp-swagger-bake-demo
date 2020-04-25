<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Store $store
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Store'), ['action' => 'edit', $store->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Store'), ['action' => 'delete', $store->id], ['confirm' => __('Are you sure you want to delete # {0}?', $store->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Stores'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Store'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="stores view content">
            <h3><?= h($store->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Address') ?></th>
                    <td><?= $store->has('address') ? $this->Html->link($store->address->id, ['controller' => 'Addresses', 'action' => 'view', $store->address->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($store->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Manager Employee Id') ?></th>
                    <td><?= $this->Number->format($store->manager_employee_id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($store->modified) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Customers') ?></h4>
                <?php if (!empty($store->customers)) : ?>
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
                        <?php foreach ($store->customers as $customers) : ?>
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
                <?php if (!empty($store->employees)) : ?>
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
                        <?php foreach ($store->employees as $employees) : ?>
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
                <h4><?= __('Related Inventories') ?></h4>
                <?php if (!empty($store->inventories)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Film Id') ?></th>
                            <th><?= __('Store Id') ?></th>
                            <th><?= __('Modified') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($store->inventories as $inventories) : ?>
                        <tr>
                            <td><?= h($inventories->id) ?></td>
                            <td><?= h($inventories->film_id) ?></td>
                            <td><?= h($inventories->store_id) ?></td>
                            <td><?= h($inventories->modified) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Inventories', 'action' => 'view', $inventories->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Inventories', 'action' => 'edit', $inventories->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Inventories', 'action' => 'delete', $inventories->id], ['confirm' => __('Are you sure you want to delete # {0}?', $inventories->id)]) ?>
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
