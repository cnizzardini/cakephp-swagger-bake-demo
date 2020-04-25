<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\FilmText[]|\Cake\Collection\CollectionInterface $filmTexts
 */
?>
<div class="filmTexts index content">
    <?= $this->Html->link(__('New Film Text'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Film Texts') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('uuid') ?></th>
                    <th><?= $this->Paginator->sort('film_id') ?></th>
                    <th><?= $this->Paginator->sort('title') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($filmTexts as $filmText): ?>
                <tr>
                    <td><?= h($filmText->uuid) ?></td>
                    <td><?= $filmText->has('film') ? $this->Html->link($filmText->film->title, ['controller' => 'Films', 'action' => 'view', $filmText->film->id]) : '' ?></td>
                    <td><?= h($filmText->title) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $filmText->uuid]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $filmText->uuid]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $filmText->uuid], ['confirm' => __('Are you sure you want to delete # {0}?', $filmText->uuid)]) ?>
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
