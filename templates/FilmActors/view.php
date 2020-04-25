<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\FilmActor $filmActor
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Film Actor'), ['action' => 'edit', $filmActor->uuid], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Film Actor'), ['action' => 'delete', $filmActor->uuid], ['confirm' => __('Are you sure you want to delete # {0}?', $filmActor->uuid), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Film Actors'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Film Actor'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="filmActors view content">
            <h3><?= h($filmActor->uuid) ?></h3>
            <table>
                <tr>
                    <th><?= __('Uuid') ?></th>
                    <td><?= h($filmActor->uuid) ?></td>
                </tr>
                <tr>
                    <th><?= __('Actor') ?></th>
                    <td><?= $filmActor->has('actor') ? $this->Html->link($filmActor->actor->id, ['controller' => 'Actors', 'action' => 'view', $filmActor->actor->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Film') ?></th>
                    <td><?= $filmActor->has('film') ? $this->Html->link($filmActor->film->title, ['controller' => 'Films', 'action' => 'view', $filmActor->film->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($filmActor->modified) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
