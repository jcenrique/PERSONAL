<div class="col-md-6 col-md-offset-3">
    <div class="panel panel-default" style="margin-top:30px">
        <div class="panel-heading">
             <h4><?= __('Nuevo Usuario') ?>
                        <?php if($current_user['role_id'] == 1) :?>
                            <?= $this->Html->link('<span class="fa fa-reply"></span>',
                             $this->request->referer(),['class'=> 'btn btn-sm btn-success pull-right'  ,'escape' => false,'data-toggle'=> 'tooltip', 'title'=> __('Volver')] ) ?>
                        <?php endif;?>
                 </h4>
                
        </div>
        
        <div class="panel-body">
        
         
            <?= $this->Form->create($user) ?>
            
                
                <?php
                    echo $this->Form->input('username',['label'=>__('Usuario')]);
                    echo $this->Form->input('firts_name',['label'=>__('Nombre')]);
                    echo $this->Form->input('last_name',['label'=>__('Apellidos')]);
                    echo $this->Form->input('password',['label'=>__('Contraseña')]);
                    echo $this->Form->input('email',['label'=>__('Correo')]);
                    echo $this->Form->input('role_id', ['options' => $roles,'label'=>__('Rol')]);
                ?>
            
          </div>
           <div class="panel-footer">
            <?= $this->Form->button(__('Crear')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
