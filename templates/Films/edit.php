<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Film $film
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $film->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $film->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Films'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="films form content">
            <?= $this->Form->create($film) ?>
            <fieldset>
                <legend><?= __('Edit Film') ?></legend>
                <?php
                    echo $this->Form->control('title');
                    echo $this->Form->control('description');
                    echo $this->Form->control('release_year');
                    echo $this->Form->control('language_id', ['options' => $languages]);
                    echo $this->Form->control('original_language_id');
                    echo $this->Form->control('rental_duration');
                    echo $this->Form->control('rental_rate');
                    echo $this->Form->control('length');
                    echo $this->Form->control('replacement_cost');
                    echo $this->Form->control('rating');
                    echo $this->Form->control('special_features');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
