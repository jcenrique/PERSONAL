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
                ['action' => 'delete', $agentesFormation->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $agentesFormation->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Agentes Formations'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Formaciones'), ['controller' => 'Formaciones', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Formacione'), ['controller' => 'Formaciones', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Agentes'), ['controller' => 'Agentes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Agente'), ['controller' => 'Agentes', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="agentesFormations form large-9 medium-8 columns content">
    <?= $this->Form->create($agentesFormation) ?>
    <fieldset>
        <legend><?= __('Edit Agentes Formation') ?></legend>
        <?php
            echo $this->Form->input('formacione_id', ['options' => $formaciones]);
            echo $this->Form->input('agente_id', ['options' => $agentes]);
            echo $this->Form->input('is_trabajado');
            echo $this->Form->input('observacion');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
