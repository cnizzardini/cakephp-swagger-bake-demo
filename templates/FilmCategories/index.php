<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\FilmCategory[]|\Cake\Collection\CollectionInterface $filmCategories
 */
?>
<div class="filmCategories index content">
    <?= $this->Html->link(__('New Film Category'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Film Categories') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('uuid') ?></th>
                    <th><?= $this->Paginator->sort('film_id') ?></th>
                    <th><?= $this->Paginator->sort('category_id') ?></th>
                    <th><?= $this->Paginator->sort('modified') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($filmCategories as $filmCategory): ?>
                <tr>
                    <td><?= h($filmCategory->uuid) ?></td>
                    <td><?= $filmCategory->has('film') ? $this->Html->link($filmCategory->film->title, ['controller' => 'Films', 'action' => 'view', $filmCategory->film->id]) : '' ?></td>
                    <td><?= $filmCategory->has('category') ? $this->Html->link($filmCategory->category->name, ['controller' => 'Categories', 'action' => 'view', $filmCategory->category->id]) : '' ?></td>
                    <td><?= h($filmCategory->modified) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $filmCategory->uuid]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $filmCategory->uuid]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $filmCategory->uuid], ['confirm' => __('Are you sure you want to delete # {0}?', $filmCategory->uuid)]) ?>
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
