

   
<div class="col-md-5 col-md-offset-3">
    <?= $this->Flash->render ('auth')?>
    <div class="panel panel-default" style="margin-top:30px">
        
        <div class="panel-heading">
            <h3 class="panel-title"><strong><?= __('Iniciar sesión')?></strong></h3>
        </div>
       
        <div class="panel-body">
          <?= $this->Form->create() ?>
           
              <div class="form-group">
                    <label for="exampleInputEmail1"><?= __('Usuario o Email') ?></label>
                     <?= $this->Form->input('email',['class' => 'form-control' , 'placeholder'=>'Introducir usuario o email',
                    'label' => false, 'required']) ?>
              </div>
              <div class="form-group">
                    <label for="exampleInputPassword1"><?= __('Password')?> </label>
                    <?= $this->Form->input('password',['class' => 'form-control' , 'placeholder'=>'Introducir contraseña',
                    'label' => false, 'required']) ?>
              </div>
        </div>
        
        <div class="panel-footer">
           <div>
            <?= $this->Form->button(__('Iniciar sesión'),['class'=>'btn btn-md btn-primary']) ?>
           <?= $this->Form->end()?>
                <?= $this->Html->link(__('Registrarse'),['controller' => 'Users', 'action' => 'register'],['class' =>'btn  btn-md btn-primary'] )?>
                <?= $this->Html->link(__('Password perdido'),['controller' => 'Users', 'action' => 'recuperar'],['class' =>'btn  btn-md btn-success pull-right'] )?>
            </div>
        </div>
        
    </div>   
</div>


