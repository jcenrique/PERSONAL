<div class="col-md-12">
    <div class="panel panel-default" style="margin-top:20px">
        <div class="panel-heading" style ="font-size: 150%;">
            <?= __('Formación por agentes') ?> <?= $this->Html->link('<span class="fa fa-plus"></span>',
            ['action' => 'add'],['class'=> 'btn btn-sm btn-success pull-right'  ,'escape' => false ,'data-toggle'=> 'tooltip', 'title'=> __('Añadir')] ) ?>
               
        </div>
        
        <div class="panel-body">
            <table id="myTable" width="100%" class="table table-striped table-bordered table-hover">
                <thead>
                    <tr>
                       
                        <th scope="col"><?= __('Formación') ?></th>
                        <th scope="col"><?= __('Agente') ?></th>
                        <th scope="col"><?= __('Día de trabajo') ?></th>
                        <th scope="col" class="actions"><?= __('Acciones') ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($agentesFormations as $agentesFormation): ?>
                    <tr>
                        
                        <td><?= $agentesFormation->formacione->nombre ? $this->Html->link($agentesFormation->formacione->nombre, ['controller' => '../Formations/Cursos', 'action' => 'view', $agentesFormation->formacione->curso_id]) : '' ?></td>
                        <td><?= $agentesFormation->agente->nombre_completo ? $this->Html->link($agentesFormation->agente->nombre_completo, ['controller' => '../Agentes', 'action' => 'view', $agentesFormation->agente->id]) : '' ?></td>
                        <td><?= h($agentesFormation->is_trabajado) ?></td>
                        <td class="actions">
                            <div class="tooltip-demo">
                                <?= $this->Html->link('<i class="fa fa-eye" aria-hidden="true"></i>' , ['action' => 'view', $agentesFormation->id],
                                                ['escape' => false , 'data-toggle'=> 'tooltip', 'title'=> __('Ver')]) ?><i>&nbsp&nbsp</i>
                                <?= $this->Html->link('<i class="fa fa-pencil" aria-hidden="true"></i>', ['action' => 'edit', $agentesFormation->id],
                                                ['escape' => false, 'data-toggle'=> 'tooltip', 'title'=> __('Editar')]) ?><i>&nbsp&nbsp</i>
                                <?= $this->Form->postLink('<i class="fa fa-trash-o" aria-hidden="true"></i>', ['action' => 'delete', $agentesFormation->id], 
                                ['confirm' => __('Está usted seguro de eliminar el registro: # {0}?', $agentesFormation->formacione->nombre 
                                        . ' correspondiente a: ' . $agentesFormation->agente->nombre_completo ),'escape' => false , 'data-toggle'=> 'tooltip', 'title'=> __('Eliminar')]) ?>
                            <div class="tooltip-demo">
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
         </div>
    </div>
</div>
