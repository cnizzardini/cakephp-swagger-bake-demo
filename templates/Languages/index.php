<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Language[]|\Cake\Collection\CollectionInterface $languages
 */
?>
<div class="languages index content">
    <?= $this->Html->link(__('New Language'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Languages') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('name') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($languages as $language): ?>
                <tr>
                    <td><?= $this->Number->format($language->id) ?></td>
                    <td><?= h($language->name) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $language->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $language->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $language->id], ['confirm' => __('Are you sure you want to delete # {0}?', $language->id)]) ?>
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
