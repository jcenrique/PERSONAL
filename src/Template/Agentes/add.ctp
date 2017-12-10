<?php
/**
  * @var \App\View\AppView $this
  */
  
  $opciones = array();
  $opciones[1] ='Activo';
  $opciones[2] ='Inactivo';
  
?>

<div class="col-md-4 col-md-offset-3">
    
    <div class="panel panel-default" style="margin-top:30px">
        <div class="panel-heading">
            
                 <h4><?=  __('Nuevo Agente') ?>
                        <?php if($current_user['role_id'] == 1) :?>
                            <?= $this->Html->link('<span class="fa fa-reply"></span>' ,
                             $this->request->referer(),['class'=> 'btn btn-sm btn-success pull-right'  ,'escape' => false ,'data-toggle'=> 'tooltip', 'title'=> __('Volver')] ) ?>
                        <?php endif;?>
                 </h4>
                
        </div>
        
        <div class="panel-body">
        <?= $this->Form->create($agente) ?>
        <?php
            echo $this->Form->input('apellido1');
            echo $this->Form->input('apellido2');
            echo $this->Form->input('nombre');
            echo $this->Form->input('cargo_id', ['options' => $cargos]);
            echo $this->Form->input('residencia_id', ['options' => $residencias]);
            echo $this->Form->control('codigo_agente', ['type' => 'number']);
            
            echo $this->Form->input('status',['options' => $opciones]);
           
        ?>
      </div>
    <div class="panel-footer">
            <?= $this->Form->button(__('Crear')) ?>
            <?= $this->Form->end() ?>
        </div>
</div>
