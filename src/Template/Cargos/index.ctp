<div class="col-md-12">
    <div class="panel panel-default" style="margin-top:20px">
        <div class="panel-heading" style ="font-size: 150%;">
            <?= __('Categorias') ?> <?= $this->Html->link('<span class="fa fa-plus"></span>' ,
            ['action' => 'add'],['class'=> 'btn btn-sm btn-success pull-right'  ,'escape' => false ,'data-toggle'=> 'tooltip', 'title'=> __('Añadir')] ) ?>
               
        </div>
        
        <div class="panel-body">
            <table id="myTable" width="100%" class="table table-striped table-bordered table-hover">
                <thead>
                    <tr>
                        
                        <th scope="col"><?= $this->Paginator->sort('cargo' ,['label' => 'Categoría']) ?></th>
                        <th scope="col" class="actions"><?= __('Actions') ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($cargos as $cargo): ?>
                    <tr>
                       
                        <td><?= h($cargo->cargo) ?></td>
                        <td class="actions">
                            <div class="tooltip-demo">
                            <?= $this->Html->link('<i class="fa fa-pencil" aria-hidden="true"></i>', ['action' => 'edit', $cargo->Id],
                                                ['escape' => false, 'data-toggle'=> 'tooltip', 'title'=> __('Editar')]) ?><i>&nbsp&nbsp</i>
                            <?= $this->Form->postLink('<i class="fa fa-trash-o" aria-hidden="true"></i>', ['action' => 'delete', $cargo->Id], 
                            ['confirm' => __('Está usted seguro de eliminar el registro:  {0}?', $cargo->cargo),'escape' => false , 'data-toggle'=> 'tooltip', 'title'=> __('Eliminar')]) ?>
                            </div>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
