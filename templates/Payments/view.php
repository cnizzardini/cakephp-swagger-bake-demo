<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Payment $payment
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Payment'), ['action' => 'edit', $payment->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Payment'), ['action' => 'delete', $payment->id], ['confirm' => __('Are you sure you want to delete # {0}?', $payment->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Payments'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Payment'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="payments view content">
            <h3><?= h($payment->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Customer') ?></th>
                    <td><?= $payment->has('customer') ? $this->Html->link($payment->customer->id, ['controller' => 'Customers', 'action' => 'view', $payment->customer->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Employee') ?></th>
                    <td><?= $payment->has('employee') ? $this->Html->link($payment->employee->id, ['controller' => 'Employees', 'action' => 'view', $payment->employee->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Rental') ?></th>
                    <td><?= $payment->has('rental') ? $this->Html->link($payment->rental->id, ['controller' => 'Rentals', 'action' => 'view', $payment->rental->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($payment->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Amount') ?></th>
                    <td><?= $this->Number->format($payment->amount) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($payment->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($payment->modified) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
