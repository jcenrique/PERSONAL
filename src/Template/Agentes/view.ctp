<?php
/**
  * @var \App\View\AppView $this
  */
  
  $opciones = array();
  $opciones[1] ='Activo';
  $opciones[2] ='Inactivo';
  
?>

<div class="col-md-6 col-md-offset-3">
    
    <div class="panel panel-default" style="margin-top:30px">
        <div class="panel-heading">
            <h5><?= $agente->nombre_completo ?>
                    <?php if($current_user['role_id'] == 1) :?>
                        <div class ="pull-right tooltip-demo">
                             <?= $this->Html->link('<span class="fa fa-reply"></span>',
                            $this->request->referer(),['class'=> 'btn btn-sm btn-success'  ,'escape' => false ,'data-toggle'=> 'tooltip', 'title'=> __('Volver')] ) ?>
                             <?= $this->Html->link('<span class="fa fa-edit"></span>',
                            ['action' => 'edit' , $agente->id],['class'=> 'btn btn-sm btn-success '  ,'escape' => false ,'data-toggle'=> 'tooltip', 'title'=> __('Editar')] ) ?>
                        </div>
                    <?php endif;?>
            </h5>
        </div>
        <div class="panel-body">
       <table class="table table-striped table-bordered">
                <tr>
                    <th scope="row"><?= __('Apellido1') ?></th>
                    <td><?= h($agente->apellido1) ?></td>
                </tr>
                <tr>
                    <th scope="row"><?= __('Apellido2') ?></th>
                    <td><?= h($agente->apellido2) ?></td>
                </tr>
                <tr>
                    <th scope="row"><?= __('Nombre') ?></th>
                    <td><?= h($agente->nombre) ?></td>
                </tr>
                <tr>
                    <th scope="row"><?= __('Cargo') ?></th>
                    <td><?= $agente->has('cargo') ? $this->Html->link($agente->cargo->cargo, ['controller' => 'Cargos', 'action' => 'view', $agente->cargo->Id]) : '' ?></td>
                </tr>
                <tr>
                    <th scope="row"><?= __('Residencia') ?></th>
                    <td><?= $agente->has('residencia') ? $this->Html->link($agente->residencia->residencia, ['controller' => 'Residencias', 'action' => 'view', $agente->residencia->Id]) : '' ?></td>
                </tr>
                            <tr>
                    <th scope="row"><?= __('Codigo Agente') ?></th>
                    <td><?= $this->Number->format($agente->codigo_agente) ?></td>
                </tr>
                <tr>
                    <th scope="row"><?= __('Estado') ?></th>
                    <td><?= $opciones[$agente->status] ?></td>
                </tr>
                <tr>
                    <th scope="row"><?= __('Creado') ?></th>
                    <td><?= h($agente->created) ?></td>
                </tr>
                <tr>
                    <th scope="row"><?= __('Modificado') ?></th>
                    <td><?= h($agente->modified) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
