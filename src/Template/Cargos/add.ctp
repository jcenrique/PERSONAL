<?php
/**
  * @var \App\View\AppView $this
  */
?>
<div class="col-md-6 col-md-offset-3">
    
    <div class="panel panel-default" style="margin-top:30px">
        <div class="panel-heading">
            
                 <h4><?= __('Nueva Categoría') ?>
                        <?php if($current_user['role_id'] == 1) :?>
                            <?= $this->Html->link('<span class="fa fa-list"></span>' ,
                             $this->request->referer(),['class'=> 'btn btn-sm btn-success pull-right'  ,'escape' => false ,'data-toggle'=> 'tooltip', 'title'=> __('Volver')] ) ?>
                        <?php endif;?>
                 </h4>
                
        </div>
        
        <div class="panel-body">
            <?= $this->Form->create($cargo) ?>
    
            <?php
                echo $this->Form->input('cargo', ['label' => __('Categoría')]);
            ?>
        </div>
        <div class="panel-footer">
            <?= $this->Form->button(__('Crear')) ?>
            <?= $this->Form->end() ?>
        </div>
</div>
