<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Film[]|\Cake\Collection\CollectionInterface $films
 */
?>
<div class="films index content">
    <?= $this->Html->link(__('New Film'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Films') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('title') ?></th>
                    <th><?= $this->Paginator->sort('release_year') ?></th>
                    <th><?= $this->Paginator->sort('language_id') ?></th>
                    <th><?= $this->Paginator->sort('original_language_id') ?></th>
                    <th><?= $this->Paginator->sort('rental_duration') ?></th>
                    <th><?= $this->Paginator->sort('rental_rate') ?></th>
                    <th><?= $this->Paginator->sort('length') ?></th>
                    <th><?= $this->Paginator->sort('replacement_cost') ?></th>
                    <th><?= $this->Paginator->sort('rating') ?></th>
                    <th><?= $this->Paginator->sort('special_features') ?></th>
                    <th><?= $this->Paginator->sort('modified') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($films as $film): ?>
                <tr>
                    <td><?= $this->Number->format($film->id) ?></td>
                    <td><?= h($film->title) ?></td>
                    <td><?= h($film->release_year) ?></td>
                    <td><?= $film->has('language') ? $this->Html->link($film->language->name, ['controller' => 'Languages', 'action' => 'view', $film->language->id]) : '' ?></td>
                    <td><?= $this->Number->format($film->original_language_id) ?></td>
                    <td><?= $this->Number->format($film->rental_duration) ?></td>
                    <td><?= $this->Number->format($film->rental_rate) ?></td>
                    <td><?= $this->Number->format($film->length) ?></td>
                    <td><?= $this->Number->format($film->replacement_cost) ?></td>
                    <td><?= h($film->rating) ?></td>
                    <td><?= h($film->special_features) ?></td>
                    <td><?= h($film->modified) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $film->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $film->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $film->id], ['confirm' => __('Are you sure you want to delete # {0}?', $film->id)]) ?>
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
