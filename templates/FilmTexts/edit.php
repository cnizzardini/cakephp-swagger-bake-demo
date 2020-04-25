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
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $filmText->uuid],
                ['confirm' => __('Are you sure you want to delete # {0}?', $filmText->uuid), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Film Texts'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="filmTexts form content">
            <?= $this->Form->create($filmText) ?>
            <fieldset>
                <legend><?= __('Edit Film Text') ?></legend>
                <?php
                    echo $this->Form->control('film_id', ['options' => $films]);
                    echo $this->Form->control('title');
                    echo $this->Form->control('description');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
