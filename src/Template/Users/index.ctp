<?php
/**
  * @var \App\View\AppView $this
  */
?>

<div class="row" style ="padding-top: 10px" >   
        <?= $this->Html->link(__('Nuevo Usuario'), ['action' => 'add'],['class'=> 'btn btn-primary']) ?>
  </div>

<div class="row">
    <div class="col-md-12">
        <div class="page-header">
            <h3><?= __('Usuarios') ?></h3>
        </div>
    <div class="scrollme">
     <table id="myTable" class="table table-striped table-bordered">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('username',['label'=>__('Usuario')]) ?></th>
                <th scope="col"><?= $this->Paginator->sort('firts_name',['label'=>__('Nombre')]) ?></th>
                <th scope="col"><?= $this->Paginator->sort('last_name',['label'=>__('Apellidos')]) ?></th>
                
                <th scope="col"><?= $this->Paginator->sort('email',['label'=>__('Correo')]) ?></th>
                <th scope="col"><?= $this->Paginator->sort('role_id',['label'=>__('Rol')]) ?></th>
                <th scope="col"><?= $this->Paginator->sort('created',['label'=>__('Creado')]) ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified',['label'=>__('Modificado')]) ?></th>
                <th scope="col" class="actions"><?= __('Acciones') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user): ?>
            <tr>
                <td><?= h($user->username) ?></td>
                <td><?= h($user->firts_name) ?></td>
                <td><?= h($user->last_name) ?></td>
              
                <td><?= h($user->email) ?></td>
                <td><?= h($user->role->rol) ?></td>
                <td><?= h($user->created->nice()) ?></td>
                <td><?= h($user->modified->nice()) ?></td>
                <td class="actions">
                    <?= $this->Html->link('<i class="fa fa-eye" aria-hidden="true"></i>' , ['action' => 'view', $user->id],
                                    ['escape' => false , 'data-toggle'=> 'tooltip', 'title'=> __('Ver')]) ?><i>&nbsp&nbsp</i>
                    <?= $this->Html->link('<i class="fa fa-pencil" aria-hidden="true"></i>', ['action' => 'edit', $user->id],
                                    ['escape' => false, 'data-toggle'=> 'tooltip', 'title'=> __('Editar')]) ?><i>&nbsp&nbsp</i>
                    <?= $this->Form->postLink('<i class="fa fa-trash-o" aria-hidden="true"></i>', ['action' => 'delete', $user->id], 
                    ['confirm' => __('Está usted seguro de eliminar el registro:  {0}?', $user->nombre_completo),'escape' => false , 'data-toggle'=> 'tooltip', 'title'=> __('Eliminar')]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    </div>
    </div>
</div>
