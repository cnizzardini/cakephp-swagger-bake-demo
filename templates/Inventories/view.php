<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Inventory $inventory
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Inventory'), ['action' => 'edit', $inventory->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Inventory'), ['action' => 'delete', $inventory->id], ['confirm' => __('Are you sure you want to delete # {0}?', $inventory->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Inventories'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Inventory'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="inventories view content">
            <h3><?= h($inventory->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Film') ?></th>
                    <td><?= $inventory->has('film') ? $this->Html->link($inventory->film->title, ['controller' => 'Films', 'action' => 'view', $inventory->film->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Store') ?></th>
                    <td><?= $inventory->has('store') ? $this->Html->link($inventory->store->id, ['controller' => 'Stores', 'action' => 'view', $inventory->store->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($inventory->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($inventory->modified) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Rentals') ?></h4>
                <?php if (!empty($inventory->rentals)) : ?>
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
                        <?php foreach ($inventory->rentals as $rentals) : ?>
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
