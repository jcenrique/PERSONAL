<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Residencia'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Puestos Gestion'), ['controller' => 'PuestosGestion', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Puestos Gestion'), ['controller' => 'PuestosGestion', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Agentes'), ['controller' => 'Agentes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Agente'), ['controller' => 'Agentes', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="residencias index large-9 medium-8 columns content">
    <h3><?= __('Residencias') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('Id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('puesto_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('residencia') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($residencias as $residencia): ?>
            <tr>
                <td><?= $this->Number->format($residencia->Id) ?></td>
                <td><?= $residencia->has('puestos_gestion') ? $this->Html->link($residencia->puestos_gestion->puesto, ['controller' => 'PuestosGestion', 'action' => 'view', $residencia->puestos_gestion->id]) : '' ?></td>
                <td><?= h($residencia->residencia) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $residencia->Id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $residencia->Id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $residencia->Id], ['confirm' => __('Are you sure you want to delete # {0}?', $residencia->Id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
