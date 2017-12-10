<div class="col-md-4 col-md-offset-3">
    
    <div class="panel panel-default" style="margin-top:30px">
        <div class="panel-heading">
            
                 <h4><?=  __('Nueva formación Agente') ?>
                        <?php if($current_user['role_id'] == 1) :?>
                            <?= $this->Html->link('<span class="fa fa-reply"></span>' ,
                              ['controller' => '/Formaciones' , 'action' => 'index'],['class'=> 'btn btn-sm btn-success pull-right'  ,'escape' => false ,'data-toggle'=> 'tooltip', 'title'=> __('Volver')] ) ?>
                        <?php endif;?>
                 </h4>
                
        </div>
        
        <div class="panel-body">
    <?= $this->Form->create($agentesFormation) ?>
    
       
        <?php
            echo $this->Form->input('formacione_id', ['options' => $formaciones , 'label' => __('Formación')]);
            echo $this->Form->input('agente_id', ['options' => $agentes]);
            echo $this->Form->input('is_trabajado',['label' => __('Día trabajado')]);
            echo $this->Form->input('observacion');
        ?>
   
    </div>
    <div class="panel-footer">
            <?= $this->Form->button(__('Crear')) ?>
            <?= $this->Form->end() ?>
        </div>
</div>
