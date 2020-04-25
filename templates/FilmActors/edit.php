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
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $filmActor->uuid],
                ['confirm' => __('Are you sure you want to delete # {0}?', $filmActor->uuid), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Film Actors'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="filmActors form content">
            <?= $this->Form->create($filmActor) ?>
            <fieldset>
                <legend><?= __('Edit Film Actor') ?></legend>
                <?php
                    echo $this->Form->control('actor_id', ['options' => $actors]);
                    echo $this->Form->control('film_id', ['options' => $films]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
