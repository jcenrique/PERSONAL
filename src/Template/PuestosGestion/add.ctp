<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Puestos Gestion'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="puestosGestion form large-9 medium-8 columns content">
    <?= $this->Form->create($puestosGestion) ?>
    <fieldset>
        <legend><?= __('Add Puestos Gestion') ?></legend>
        <?php
            echo $this->Form->input('puesto');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
