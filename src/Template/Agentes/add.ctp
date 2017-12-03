<?php
/**
  * @var \App\View\AppView $this
  */
  
  $opciones = array();
  $opciones[1] ='Activo';
  $opciones[2] ='Inactivo';
  
?>

<div class="agentes form large-9 medium-8 columns content">
    <?= $this->Form->create($agente) ?>
    <fieldset>
        <legend><?= __('Add Agente') ?></legend>
        <?php
            echo $this->Form->input('apellido1');
            echo $this->Form->input('apellido2');
            echo $this->Form->input('nombre');
            echo $this->Form->input('cargo_id', ['options' => $cargos]);
            echo $this->Form->input('residencia_id', ['options' => $residencias]);
            echo $this->Form->input('codigo_agente');
            echo $this->Form->input('status',['options' => $opciones]);
            echo $this->Form->input('cursos._ids', ['options' => $cursos]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
