<?php
/**
  * @var \App\View\AppView $this
  */
?>
<script>
$(document).ready(function() {
       $('#myTable').DataTable( {
            language: {
                url: '/locale/es_ES/es_ES.json'
            }
        } );
    } );
</script>



<div class="col-md-12">
    <div class="panel panel-default" style="margin-top:20px">
        <div class="panel-heading" style ="font-size: 150%;">
            <?= __('Residencias') ?> <?= $this->Html->link('<span class="fa fa-plus"></span>',
            ['action' => 'add'],['class'=> 'btn btn-sm btn-success pull-right'  ,'escape' => false,'data-toggle'=> 'tooltip', 'title'=> __('Añadir')] ) ?>
           
         </div>
    
        <div class="panel-body">
            <table id="myTable" width="100%" class="table table-striped table-bordered table-hover">
                <thead>
                    <tr>
                        
                        
                        <th scope="col"><?= ('Residencia') ?></th>
                        <th scope="col"><?= ('Puesto') ?></th>
                        <th scope="col"><?= __('Acciones') ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($residencias as $residencia): ?>
                    <tr>
                        <td><?= h($residencia->residencia) ?></td>
                        <td><?= $residencia->has('puestos_gestion') ? $residencia->puestos_gestion['puesto']: '' ?></td>
                        <td class="actions">
                             <div class="tooltip-demo">
                            <?= $this->Html->link('<i class="fa fa-pencil" aria-hidden="true"></i>', ['action' => 'edit', $residencia->Id],
                                                        ['escape' => false, 'data-toggle'=> 'tooltip', 'title'=> __('Editar')]) ?><i>&nbsp&nbsp</i>
                                        <?= $this->Form->postLink('<i class="fa fa-trash-o" aria-hidden="true"></i>', ['action' => 'delete', $residencia->Id], 
                                        ['confirm' => __('Está usted seguro de eliminar el registro:  {0}?', $residencia->residencia),'escape' => false , 'data-toggle'=> 'tooltip', 'title'=> __('Eliminar')]) ?>
                            </div>                    
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
    
</div>
