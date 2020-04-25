<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\FilmActor[]|\Cake\Collection\CollectionInterface $filmActors
 */
?>
<div class="filmActors index content">
    <?= $this->Html->link(__('New Film Actor'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Film Actors') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('uuid') ?></th>
                    <th><?= $this->Paginator->sort('actor_id') ?></th>
                    <th><?= $this->Paginator->sort('film_id') ?></th>
                    <th><?= $this->Paginator->sort('modified') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($filmActors as $filmActor): ?>
                <tr>
                    <td><?= h($filmActor->uuid) ?></td>
                    <td><?= $filmActor->has('actor') ? $this->Html->link($filmActor->actor->id, ['controller' => 'Actors', 'action' => 'view', $filmActor->actor->id]) : '' ?></td>
                    <td><?= $filmActor->has('film') ? $this->Html->link($filmActor->film->title, ['controller' => 'Films', 'action' => 'view', $filmActor->film->id]) : '' ?></td>
                    <td><?= h($filmActor->modified) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $filmActor->uuid]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $filmActor->uuid]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $filmActor->uuid], ['confirm' => __('Are you sure you want to delete # {0}?', $filmActor->uuid)]) ?>
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
