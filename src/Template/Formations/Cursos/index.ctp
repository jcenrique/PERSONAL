
<div class="col-md-12">
    <div class="panel panel-default" style="margin-top:20px">
        <div class="panel-heading" style ="font-size: 150%;">
            <?= __('Cursos') ?> <?= $this->Html->link('<span class="fa fa-plus"></span>',
            ['action' => 'add'],['class'=> 'btn btn-sm btn-success pull-right'  ,'escape' => false ,'data-toggle'=> 'tooltip', 'title'=> __('Añadir')] ) ?>
               
        </div>
        
        <div class="panel-body">
            <table id="myTable" width="100%" class="table table-striped table-bordered table-hover">
                <thead>
                    <tr>
                        
                        <th scope="col"><?= __('Nombre curso') ?></th>
                        <th scope="col"><?= __('Empresa') ?></th>
                        <th scope="col"><?= __('Creado') ?></th>
                        <th scope="col"><?= __('Modificado') ?></th>
                        <th scope="col" class="actions"><?= __('Acciones') ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($cursos as $curso): ?>
                    <tr>
                       
                        <td><?= h($curso->nombre_curso) ?></td>
                        <td><?= h($curso->empresa) ?></td>
                        <td><?= h($curso->created->nice()) ?></td>
                        <td><?= h($curso->modified->nice()) ?></td>
                        <td class="actions">
                            <div class="tooltip-demo">
                                <?= $this->Html->link('<i class="fa fa-eye" aria-hidden="true"></i>' , ['action' => 'view', $curso->id],
                                                    ['escape' => false , 'data-toggle'=> 'tooltip', 'title'=> __('Ver')]) ?><i>&nbsp&nbsp</i>
                                <?= $this->Html->link('<i class="fa fa-pencil" aria-hidden="true"></i>', ['action' => 'edit', $curso->id],
                                                    ['escape' => false, 'data-toggle'=> 'tooltip', 'title'=> __('Editar')]) ?><i>&nbsp&nbsp</i>
                                <?= $this->Form->postLink('<i class="fa fa-trash-o" aria-hidden="true"></i>', ['action' => 'delete', $curso->id], 
                                    ['confirm' => __('Está usted seguro de eliminar el registro:  {0}?', $curso->nombre_curso),'escape' => false , 'data-toggle'=> 'tooltip', 'title'=> __('Eliminar')]) ?>
                            </div>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
     </div>
    </div>
</div>
