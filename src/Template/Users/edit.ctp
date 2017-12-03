<?php
/**
  * @var \App\View\AppView $this
  */
?>
<div class="row" style ="padding-top: 10px" >   
        <?= $this->Html->link(__('Lista de usuarios'), ['action' => 'index'],['class'=> 'btn btn-primary']) ?>
  </div>
<div class="row">
 <div class="col-md-6 col-md-offset-3">

        <div class="page-header">
             <h3><?= __('Editar Usuario') ?></h3>
        </div>
    <?= $this->Form->create($user) ?>
   
        <?php
            echo $this->Form->input('username',['label'=>__('Usuario')]);
            echo $this->Form->input('firts_name',['label'=>__('Nombre')]);
            echo $this->Form->input('last_name',['label'=>__('Apellidos')]);
            echo $this->Form->input('password',['label'=>__('Contraseña')]);
            echo $this->Form->input('email',['label'=>__('Correo')]);
            echo $this->Form->input('role_id', ['options' => $roles,'label'=>__('Rol')]);
            
        ?>
   
    <?= $this->Form->button(__('Modificar'),['class'=> 'btn btn-success']) ?>
    <?= $this->Form->end() ?>
</div>
</div>