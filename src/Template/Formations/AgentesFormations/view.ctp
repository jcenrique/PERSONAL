<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Agentes Formation'), ['action' => 'edit', $agentesFormation->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Agentes Formation'), ['action' => 'delete', $agentesFormation->id], ['confirm' => __('Are you sure you want to delete # {0}?', $agentesFormation->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Agentes Formations'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Agentes Formation'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Formaciones'), ['controller' => 'Formaciones', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Formacione'), ['controller' => 'Formaciones', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Agentes'), ['controller' => 'Agentes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Agente'), ['controller' => 'Agentes', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="agentesFormations view large-9 medium-8 columns content">
    <h3><?= h($agentesFormation->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Formacione') ?></th>
            <td><?= $agentesFormation->has('formacione') ? $this->Html->link($agentesFormation->formacione->id, ['controller' => 'Formaciones', 'action' => 'view', $agentesFormation->formacione->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Agente') ?></th>
            <td><?= $agentesFormation->has('agente') ? $this->Html->link($agentesFormation->agente->id, ['controller' => 'Agentes', 'action' => 'view', $agentesFormation->agente->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($agentesFormation->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Is Trabajado') ?></th>
            <td><?= $agentesFormation->is_trabajado ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Observacion') ?></h4>
        <?= $this->Text->autoParagraph(h($agentesFormation->observacion)); ?>
    </div>
</div>
