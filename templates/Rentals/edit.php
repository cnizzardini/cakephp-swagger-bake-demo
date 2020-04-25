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
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $rental->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $rental->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Rentals'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="rentals form content">
            <?= $this->Form->create($rental) ?>
            <fieldset>
                <legend><?= __('Edit Rental') ?></legend>
                <?php
                    echo $this->Form->control('rental_date');
                    echo $this->Form->control('inventory_id', ['options' => $inventories]);
                    echo $this->Form->control('customer_id', ['options' => $customers]);
                    echo $this->Form->control('return_date', ['empty' => true]);
                    echo $this->Form->control('employee_id', ['options' => $employees]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
