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
            <?= $this->Html->link(__('List Film Categories'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="filmCategories form content">
            <?= $this->Form->create($filmCategory) ?>
            <fieldset>
                <legend><?= __('Add Film Category') ?></legend>
                <?php
                    echo $this->Form->control('film_id', ['options' => $films]);
                    echo $this->Form->control('category_id', ['options' => $categories]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
