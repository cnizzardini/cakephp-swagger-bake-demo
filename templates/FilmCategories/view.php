<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\FilmCategory $filmCategory
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Film Category'), ['action' => 'edit', $filmCategory->uuid], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Film Category'), ['action' => 'delete', $filmCategory->uuid], ['confirm' => __('Are you sure you want to delete # {0}?', $filmCategory->uuid), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Film Categories'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Film Category'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="filmCategories view content">
            <h3><?= h($filmCategory->uuid) ?></h3>
            <table>
                <tr>
                    <th><?= __('Uuid') ?></th>
                    <td><?= h($filmCategory->uuid) ?></td>
                </tr>
                <tr>
                    <th><?= __('Film') ?></th>
                    <td><?= $filmCategory->has('film') ? $this->Html->link($filmCategory->film->title, ['controller' => 'Films', 'action' => 'view', $filmCategory->film->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Category') ?></th>
                    <td><?= $filmCategory->has('category') ? $this->Html->link($filmCategory->category->name, ['controller' => 'Categories', 'action' => 'view', $filmCategory->category->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($filmCategory->modified) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
