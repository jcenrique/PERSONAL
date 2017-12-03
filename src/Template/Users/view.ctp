<?php
/**
  * @var \App\View\AppView $this
  */
?>
<div class="row" style ="padding-top: 10px" >   
        <?= $this->Html->link(__('Lista de usuarios'), ['action' => 'index'],['class'=> 'btn btn-primary']) ?>
  </div>

<div class="container">
        <div class="page-header">
            <h3><?= $user->nombre_completo ?></h3>
        </div>
       <table class="table table-striped table-bordered">
        <tr>
            <th scope="row"><?= __('Usuario') ?></th>
            <td><?= h($user->username) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Nombre') ?></th>
            <td><?= h($user->firts_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Apellidos') ?></th>
            <td><?= h($user->last_name) ?></td>
        </tr>
        
        <tr>
            <th scope="row"><?= __('Correo') ?></th>
            <td><?= h($user->email) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Rol') ?></th>
            <td><?= h($user->role->rol) ?></td>
        </tr>
        
        <tr>
            <th scope="row"><?= __('Creado') ?></th>
            <td><?= h($user->created->nice()) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modificado') ?></th>
            <td><?= h($user->modified->nice()) ?></td>
        </tr>
    </table>
   
</div>
