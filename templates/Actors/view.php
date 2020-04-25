<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Actor $actor
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Actor'), ['action' => 'edit', $actor->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Actor'), ['action' => 'delete', $actor->id], ['confirm' => __('Are you sure you want to delete # {0}?', $actor->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Actors'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Actor'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="actors view content">
            <h3><?= h($actor->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('First Name') ?></th>
                    <td><?= h($actor->first_name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Last Name') ?></th>
                    <td><?= h($actor->last_name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($actor->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($actor->modified) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Film Actors') ?></h4>
                <?php if (!empty($actor->film_actors)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Uuid') ?></th>
                            <th><?= __('Actor Id') ?></th>
                            <th><?= __('Film Id') ?></th>
                            <th><?= __('Modified') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($actor->film_actors as $filmActors) : ?>
                        <tr>
                            <td><?= h($filmActors->uuid) ?></td>
                            <td><?= h($filmActors->actor_id) ?></td>
                            <td><?= h($filmActors->film_id) ?></td>
                            <td><?= h($filmActors->modified) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'FilmActors', 'action' => 'view', $filmActors->uuid]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'FilmActors', 'action' => 'edit', $filmActors->uuid]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'FilmActors', 'action' => 'delete', $filmActors->uuid], ['confirm' => __('Are you sure you want to delete # {0}?', $filmActors->uuid)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
