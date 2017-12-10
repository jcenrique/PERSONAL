<?php
/**
  * @var \App\View\AppView $this
  */
?>
<div class="col-md-6 col-md-offset-3">
    
    <div class="panel panel-default" style="margin-top:30px">
        <div class="panel-heading">
            
                 <h4><?= __('Crear residencia') ?>
                        <?php if($current_user['role_id'] == 1) :?>
                            <?= $this->Html->link('<span class="fa fa-reply"></span>' . ' ' .  __('Lista de residencias'),
                             $this->request->referer(),['class'=> 'btn btn-sm btn-success pull-right'  ,'escape' => false] ) ?>
                        <?php endif;?>
                 </h4>
                
        </div>
        
        <div class="panel-body">
            <?= $this->Form->create($residencia) ?>
           
                <?php
                    echo $this->Form->input('puesto_id', ['options' => $puestosGestion, 'empty' => true]);
                    echo $this->Form->input('residencia');
                ?>
        </div>
        
        <div class="panel-footer">
            <?= $this->Form->button(__('Crear'),['class'=> 'btn btn-success']) ?>
        </div>
        <?= $this->Form->end() ?>
</div>