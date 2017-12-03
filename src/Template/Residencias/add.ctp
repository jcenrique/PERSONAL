<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Residencias'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Puestos Gestion'), ['controller' => 'PuestosGestion', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Puestos Gestion'), ['controller' => 'PuestosGestion', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Agentes'), ['controller' => 'Agentes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Agente'), ['controller' => 'Agentes', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="residencias form large-9 medium-8 columns content">
    <?= $this->Form->create($residencia) ?>
    <fieldset>
        <legend><?= __('Add Residencia') ?></legend>
        <?php
            echo $this->Form->input('puesto_id', ['options' => $puestosGestion, 'empty' => true]);
            echo $this->Form->input('residencia');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
