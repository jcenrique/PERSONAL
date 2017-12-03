<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $cargo->Id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $cargo->Id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Cargos'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Agentes'), ['controller' => 'Agentes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Agente'), ['controller' => 'Agentes', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="cargos form large-9 medium-8 columns content">
    <?= $this->Form->create($cargo) ?>
    <fieldset>
        <legend><?= __('Edit Cargo') ?></legend>
        <?php
            echo $this->Form->input('cargo');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
