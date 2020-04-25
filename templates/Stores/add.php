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
            <?= $this->Html->link(__('List Stores'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="stores form content">
            <?= $this->Form->create($store) ?>
            <fieldset>
                <legend><?= __('Add Store') ?></legend>
                <?php
                    echo $this->Form->control('manager_employee_id');
                    echo $this->Form->control('address_id', ['options' => $addresses]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
