
<div class="col-md-12">
    <div class="panel panel-default" style="margin-top:20px">
        <div class="panel-heading" style ="font-size: 150%;">
            <?= __('Puestos de gestión') ?> <?= $this->Html->link('<span class="fa fa-plus"></span>',
            ['action' => 'add'],['class'=> 'btn btn-sm btn-success pull-right'  ,'escape' => false ,'data-toggle'=> 'tooltip', 'title'=> __('Añadir')] ) ?>
               
        </div>
        
        <div class="panel-body">
            <table id="myTable" width="100%" class="table table-striped table-bordered table-hover">
                <thead>
                    <tr>
                      
                        <th scope="col"><?= __('Puesto') ?></th>
                        <th scope="col" class="actions"><?= __('Acciones') ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($puestosGestion as $puestosGestion): ?>
                    <tr>
                       
                        <td><?= h($puestosGestion->puesto) ?></td>
                        <td class="actions">
                             <div class="tooltip-demo">
                            <?= $this->Html->link('<i class="fa fa-pencil" aria-hidden="true"></i>', ['action' => 'edit', $puestosGestion->id],
                                            ['escape' => false, 'data-toggle'=> 'tooltip', 'title'=> __('Editar')]) ?><i>&nbsp&nbsp</i>
                            <?= $this->Form->postLink('<i class="fa fa-trash-o" aria-hidden="true"></i>', ['action' => 'delete', $puestosGestion->id], 
                            ['confirm' => __('Está usted seguro de eliminar el registro # {0}?', $puestosGestion->id),'escape' => false , 'data-toggle'=> 'tooltip', 'title'=> __('Eliminar')]) ?>
                            </div>
                           
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
   
        </div>
    </div>
 </div>   