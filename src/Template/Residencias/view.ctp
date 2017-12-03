<?php
/**
  * @var \App\View\AppView $this
  */
?>

<div class="residencias view large-9 medium-8 columns content">
    <h3><?= h($residencia->Id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Puestos Gestion') ?></th>
            <td><?= $residencia->has('puestos_gestion') ? $this->Html->link($residencia->puestos_gestion->puesto, ['controller' => 'PuestosGestion', 'action' => 'view', $residencia->puestos_gestion->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Residencia') ?></th>
            <td><?= h($residencia->residencia) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($residencia->Id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Agentes residencia') ?></h4>
        <?php if (!empty($residencia->agentes)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Apellido1') ?></th>
                <th scope="col"><?= __('Apellido2') ?></th>
                <th scope="col"><?= __('Nombre') ?></th>
                
                
                <th scope="col"><?= __('Codigo Agente') ?></th>
                
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($residencia->agentes as $agentes): ?>
            <tr>
                <td><?= h($agentes->id) ?></td>
                <td><?= h($agentes->apellido1) ?></td>
                <td><?= h($agentes->apellido2) ?></td>
                <td><?= h($agentes->nombre) ?></td>
               
                
                <td><?= h($agentes->codigo_agente) ?></td>
                
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Agentes', 'action' => 'view', $agentes->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Agentes', 'action' => 'edit', $agentes->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Agentes', 'action' => 'delete', $agentes->id], ['confirm' => __('Are you sure you want to delete # {0}?', $agentes->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
