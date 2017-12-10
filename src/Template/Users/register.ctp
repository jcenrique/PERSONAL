<?php
/**
  * @var \App\View\AppView $this
  */
  

?>
<div class="col-md-6 col-md-offset-3">
    
    <div class="panel panel-default" style="margin-top:30px">
        <div class="panel-heading">
            
                 <h4><?= __('Registrar Usuario') ?>
                 </h4>
                
        </div>
        
        <div class="panel-body">
            <?= $this->Form->create($user) ?>
            <?php
                echo $this->Form->input('username',['label'=>__('Usuario')]);
                echo $this->Form->input('firts_name',['label'=>__('Nombre')]);
                echo $this->Form->input('last_name',['label'=>__('Apellidos')]);
                echo $this->Form->input('password',['label'=>__('Contraseña'), 'value' => '']);
                echo $this->Form->input('email',['label'=>__('Correo')]);
                
                
            ?>
        </div>
        <div class="panel-footer">
            <?= $this->Form->button(__('Crear'),['class'=> 'btn btn-success']) ?>
        </div>
        <?= $this->Form->end() ?>
    </div>
</div>
