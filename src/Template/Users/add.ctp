<?php
/**
  * @var \App\View\AppView $this
  */
  

?>

<div class="row">
 <div class="col-md-6 col-md-offset-3">
        <div class="page-header">
            <h3><?= __('Nuevo usuario') ?></h3>
        </div>
    <?= $this->Form->create($user) ?>
    <fieldset>
        
        <?php
            echo $this->Form->input('username',['label'=>__('Usuario')]);
            echo $this->Form->input('firts_name',['label'=>__('Nombre')]);
            echo $this->Form->input('last_name',['label'=>__('Apellidos')]);
            echo $this->Form->input('password',['label'=>__('Contraseña')]);
            echo $this->Form->input('email',['label'=>__('Correo')]);
            echo $this->Form->input('role_id', ['options' => $roles,'label'=>__('Rol')]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Crear'),['class'=> 'btn btn-success']) ?>
    <?= $this->Form->end() ?>
</div>
<div>
