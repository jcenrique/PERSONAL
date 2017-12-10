<div class="col-md-12">
    <div class="panel panel-default" style="margin-top:20px">
        <div class="panel-heading" style ="font-size: 150%;">
            <?= __('Usuarios') ?> <?= $this->Html->link('<span class="fa fa-plus"></span>',
            ['action' => 'add'],['class'=> 'btn btn-sm btn-success pull-right'  ,'escape' => false,'data-toggle'=> 'tooltip', 'title'=> __('Añadir')] ) ?>
           
         </div>
    
        <div class="panel-body">
            <table id="myTable" width="100%" class="table table-striped table-bordered table-hover">
                <thead>
                   
                    <tr>
                        <th><?= __('Usuario') ?></th>
                        <th><?= __('Nombre') ?></th>
                        <th><?= __('Apellidos') ?></th>
                        
                        <th><?= __('Correo') ?></th>
                        <th><?=__('Rol') ?></th>
                        <th><?= __('Creado') ?></th>
                        <th><?= __('Modificado') ?></th>
                        <th><?= __('Acciones') ?></th>
                    </tr>
                    
                </thead>
                <tbody>
                    <?php foreach ($users as $user): ?>
                    <tr>
                        <td class="odd gradeX"><?= h($user->username) ?></td>
                        <td class="even gradeC"><?= h($user->firts_name) ?></td>
                        <td class="odd gradeA"><?= h($user->last_name) ?></td>
                      
                        <td class="odd gradeA"><?= h($user->email) ?></td>
                        <td class="odd gradeA"><?= h($user->role->rol) ?></td>
                        <td class="odd gradeA"><?= h($user->created->nice()) ?></td>
                        <td class="odd gradeA"><?= h($user->modified->nice()) ?></td>
                        <td class="actions">
                            <div class="tooltip-demo">
                                <?= $this->Html->link('<i class="fa fa-eye" aria-hidden="true"></i>' , ['action' => 'view', $user->id],
                                                ['escape' => false , 'data-toggle'=> 'tooltip', 'title'=> __('Ver')]) ?><i>&nbsp&nbsp</i>
                                <?= $this->Html->link('<i class="fa fa-pencil" aria-hidden="true"></i>', ['action' => 'edit', $user->id],
                                                ['escape' => false, 'data-toggle'=> 'tooltip', 'title'=> __('Editar')]) ?><i>&nbsp&nbsp</i>
                                <?= $this->Form->postLink('<i class="fa fa-trash-o" aria-hidden="true"></i>', ['action' => 'delete', $user->id], 
                                ['confirm' => __('Está usted seguro de eliminar el registro:  {0}?', $user->nombre_completo),'escape' => false , 'data-toggle'=> 'tooltip', 'title'=> __('Eliminar')]) ?>
                           </div>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
 
