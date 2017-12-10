<?php
/**
  * @var \App\View\AppView $this
  */
?>
<div class="col-md-6 col-md-offset-3">
    
    <div class="panel panel-default" style="margin-top:30px">
        <div class="panel-heading">
             <h4><?= __('Modificar curso') ?>
                        <?php if($current_user['role_id'] == 1) :?>
                            <?= $this->Html->link('<span class="fa fa-reply"></span>',
                             $this->request->referer(),['class'=> 'btn btn-sm btn-success pull-right'  ,'escape' => false ,'data-toggle'=> 'tooltip', 'title'=> __('Volver')] ) ?>
                        <?php endif;?>
                 </h4>
                
        </div>
        
        <div class="panel-body">
            <?= $this->Form->create($curso) ?>
            
                <?php
                    echo $this->Form->input('nombre_curso');
                    echo $this->Form->input('descripcion');
                    echo $this->Form->input('empresa');
                   
                ?>
        </div>   
        <div class="panel-footer">
            <?= $this->Form->button(__('Modificar')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>