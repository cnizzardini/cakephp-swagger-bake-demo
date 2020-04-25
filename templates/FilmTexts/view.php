<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\FilmText $filmText
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Film Text'), ['action' => 'edit', $filmText->uuid], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Film Text'), ['action' => 'delete', $filmText->uuid], ['confirm' => __('Are you sure you want to delete # {0}?', $filmText->uuid), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Film Texts'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Film Text'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="filmTexts view content">
            <h3><?= h($filmText->title) ?></h3>
            <table>
                <tr>
                    <th><?= __('Uuid') ?></th>
                    <td><?= h($filmText->uuid) ?></td>
                </tr>
                <tr>
                    <th><?= __('Film') ?></th>
                    <td><?= $filmText->has('film') ? $this->Html->link($filmText->film->title, ['controller' => 'Films', 'action' => 'view', $filmText->film->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Title') ?></th>
                    <td><?= h($filmText->title) ?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('Description') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($filmText->description)); ?>
                </blockquote>
            </div>
        </div>
    </div>
</div>
