
<div class="col-md-6 col-md-offset-3">
    
    <div class="panel panel-default" style="margin-top:30px">
        <div class="panel-heading">
            <h4><?= $user->nombre_completo ?>
                    <?php if($current_user['role_id'] == 1) :?>
                        <?= $this->Html->link('<span class="fa fa-reply"></span>',
                        ['action' => 'index'],['class'=> 'btn btn-sm btn-success pull-right'  ,'escape' => false,' data-toggle'=> 'tooltip', 'title'=> __('Volver')] ) ?>
                    <?php endif;?>
            </h4>
        </div>
        <div class="panel-body">
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
   </div>
</div>
