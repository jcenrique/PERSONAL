
<div class="container" style="margin-top:30px">
<div class="col-md-5 col-md-offset-3">
  <?= $this->Flash->render ('auth')?>
  <?= $this->Form->create() ?>
    <div class="panel panel-default">
  <div class="panel-heading"><h3 class="panel-title"><strong><?= __('Iniciar sesión')?></strong></h3></div>
  <div class="panel-body">
   <form role="form">
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
 <div class="row">
  <div class ="col-xs-3 col-sm-3 col-md-4">
    
    <?= $this->Form->button(__('Iniciar sesión'),['class'=>'btn btn-md btn-primary']) ?>
  </div>
 </div>
 <br>
 <div class="row">
  <div class="text-center">
   
    <?= $this->Html->link(__('Registrarse'),['controller' => 'Users', 'action' => 'register'],['class' =>'btn  btn-md btn-primary btninter'] )?>

     <?= $this->Html->link(__('Password perdido'),['controller' => 'Users', 'action' => 'recuperar'],['class' =>'btn  btn-md btn-success btninter right'] )?>
  </div>
</div>
</form>
<?= $this->Form->end()?>
  </div>
</div>
</div>
