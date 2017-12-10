<?php
/**
  * @var \App\View\AppView $this
  */
?>
<div class="col-md-6 col-md-offset-3">
    
    <div class="panel panel-default" style="margin-top:30px">
        <div class="panel-heading">
             <h4><?= __('Editar Puesto Gestión') ?>
                        <?php if($current_user['role_id'] == 1) :?>
                            <?= $this->Html->link('<span class="fa fa-reply"></span>' . ' ' .  __('Lista de cartegorías'),
                             $this->request->referer(),['class'=> 'btn btn-sm btn-success pull-right'  ,'escape' => false] ) ?>
                        <?php endif;?>
                 </h4>
                
        </div>
        
        <div class="panel-body">
            <?= $this->Form->create($puestosGestion) ?>
    
            
            <?php
                echo $this->Form->input('puesto');
            ?>
        </div>
    
        <div class="panel-footer">
            <?= $this->Form->button(__('Modificar')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>