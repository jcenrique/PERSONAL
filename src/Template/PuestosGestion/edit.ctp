<?php
/**
  * @var \App\View\AppView $this
  */
?>
  <div class="row" style ="padding-top: 10px" >  
    
       <?= $this->Form->postLink(
                __('Eliminar'),
                ['action' => 'delete', $puestosGestion->id],
                ['confirm' => __('Esta usted seguro de eliminar el registro # {0}?', $puestosGestion->id ) ,'class'=> 'btn btn-warning']
            )
        ?>
        <?= $this->Html->link(__('Lista Puestos Gestion'), ['action' => 'index'],['class'=> 'btn btn-primary']) ?>
    
</div>
<div class="row">
 <div class="col-md-6 col-md-offset-3">
    <?= $this->Form->create($puestosGestion) ?>
    <fieldset>
        <legend><?= __('Editar Puesto Gestión') ?></legend>
        <?php
            echo $this->Form->input('puesto');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
</div>