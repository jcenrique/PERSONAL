<?php
/**
  * @var \App\View\AppView $this
  */
 use Cake\I18n\I18n;
use Cake\I18n\Time;
use Cake\Routing\Router;
  $opciones = array();
  $opciones[1] ='Activo';
  $opciones[2] ='Inactivo';
?>


<div class="col-md-12" >
    <div class="panel panel-default" style="margin-top:20px">
        <div class="panel-heading" style ="font-size: 150%;">
            <?= __('Agentes') ?> 
            <div class ="pull-right">
                <?= $this->Html->link('<span class="fa fa-plus"></span>',
                ['action' => 'add'],['class'=> 'btn btn-sm btn-success'  ,'escape' => false ,'data-toggle'=> 'tooltip', 'title'=> __('Añadir')] ) ?>
                 <?= $this->Html->link('<span class="fa fa-file-excel-o"></span>',
                ['action' => 'exportar_excel'],['class'=> 'btn btn-sm btn-success'  ,'escape' => false ,'data-toggle'=> 'tooltip', 'title'=> __('Imprimir')] ) ?>  
            </div>   
        </div>
        
        <div class="panel-body">
            <table id="myTable" width="100%" class="table table-striped table-bordered table-hover ">
                <thead>
                    <tr>
                       
                        <th><?= __('Primer apellido') ?></th>
                        <th><?= __('Segundo apellido') ?></th>
                        <th><?=  __('Nombre') ?></th>
                        <th><?=  __('Categoría') ?></th>
                        <th><?= __('Residencia') ?></th>
                        <th><?= __('Código') ?></th>
                        <th><?= __('Estado') ?></th>
                        <th><?= __('Creado') ?></th>
                        <th><?=  __('Modificado') ?></th>
                        <th class="actions col-sm-2"><?= __('Acciones') ?></th>
                    </tr>
                </thead>
                <tbody>
                   
                    <?php foreach ($agentes as $agente): ?>
                    <tr>
                       
                        <td><?= h($agente->apellido1) ?></td>
                        <td><?= h($agente->apellido2) ?></td>
                        <td><?= h($agente->nombre) ?></td>
                        <td><?= $agente->has('cargo') ? $this->Html->link($agente->cargo->cargo, ['controller' => 'Cargos', 'action' => 'index', $agente->cargo->Id]) : '' ?></td>
                        <td><?= $agente->has('residencia') ? $this->Html->link($agente->residencia->residencia, 
                                ['controller' => 'Residencias', 'action' => 'index', $agente->residencia->Id]) : '' ?></td>
                        <td><?= $this->Number->format($agente->codigo_agente) ?></td>
                        <td><?= h($opciones[$agente->status]) ?></td>
                        <?php
                        if($agente->created <> null){
                            $time = new Time($agente->created);
        			        $fecha =  $time->i18nFormat("HH:mm d/M/yyyy ", null, "es_ES");
                        }else{
                            $fecha ="";
                        }
        			     ?>
                        <td><?= h($fecha) ?></td>
                         <?php
                         if($agente->modified <> null){
                            $time = new Time($agente->modified);
        			        $fecha =  $time->i18nFormat("HH:mm d/M/yyyy ", null, "es_ES");
                        }else{
                            $fecha ="";
                        }
        			     ?>
                        <td><?= h($fecha) ?></td>
                        <td class="actions">
                            <div class="tooltip-demo">
                                <?= $this->Html->link('<i class="fa fa-eye" aria-hidden="true"></i>' , ['action' => 'view', $agente->id],
                                                ['escape' => false , 'data-toggle'=> 'tooltip', 'title'=> __('Ver')]) ?><i>&nbsp&nbsp</i>
                                <?= $this->Html->link('<i class="fa fa-pencil" aria-hidden="true"></i>', ['action' => 'edit', $agente->id],
                                                ['escape' => false, 'data-toggle'=> 'tooltip', 'title'=> __('Editar')]) ?><i>&nbsp&nbsp</i>
                                <?= $this->Form->postLink('<i class="fa fa-trash-o" aria-hidden="true"></i>', ['action' => 'delete', $agente->id], 
                                ['confirm' => __('Está usted seguro de eliminar el registro: # {0}?', $agente->id),'escape' => false , 'data-toggle'=> 'tooltip', 'title'=> __('Eliminar')]) ?>
                            <div class="tooltip-demo">
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    
    </div>
</div>
