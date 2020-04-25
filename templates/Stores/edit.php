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
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $store->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $store->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Stores'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="stores form content">
            <?= $this->Form->create($store) ?>
            <fieldset>
                <legend><?= __('Edit Store') ?></legend>
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
