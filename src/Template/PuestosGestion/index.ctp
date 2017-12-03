<?php
/**
  * @var \App\View\AppView $this
  */
?>
<script>

$(document).ready(function(){
    $('#myTable').dataTable();
});

$

</script>

    <div class="row" style ="padding-top: 10px" >   
        <?= $this->Html->link(__('Nuevo puesto gestión'), ['action' => 'add'],['class'=> 'btn btn-primary']) ?>
   </div>

<div class="row">
 <div class="col-md-6 col-md-offset-3">
        <div class="page-header">
            <h3><?= __('Puestos de Gestión') ?></h3>
        </div>
  
    <table id="myTable" class="table table-striped table-bordered">
        <thead>
            <tr>
              
                <th scope="col"><?= $this->Paginator->sort('puesto') ?></th>
                <th scope="col" class="actions"><?= __('Acciones') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($puestosGestion as $puestosGestion): ?>
            <tr>
               
                <td><?= h($puestosGestion->puesto) ?></td>
                <td class="actions">
                    <?= $this->Html->link('<i class="fa fa-pencil" aria-hidden="true"></i>', ['action' => 'edit', $puestosGestion->id],
                                    ['escape' => false, 'data-toggle'=> 'tooltip', 'title'=> __('Editar')]) ?><i>&nbsp&nbsp</i>
                    <?= $this->Form->postLink('<i class="fa fa-trash-o" aria-hidden="true"></i>', ['action' => 'delete', $puestosGestion->id], 
                    ['confirm' => __('Está usted seguro de eliminar el registro # {0}?', $puestosGestion->id),'escape' => false , 'data-toggle'=> 'tooltip', 'title'=> __('Eliminar')]) ?>
                    
                   
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
   
</div>
</div>
    