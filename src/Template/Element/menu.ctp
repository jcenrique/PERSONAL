<?
  use SessionHandler;
?>

<nav class="navbar navbar-default" role="navigation" id="main_nav">
  <!-- El logotipo y el icono que despliega el menú se agrupan
       para mostrarlos mejor en los dispositivos móviles -->
  <div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse"
            data-target=".navbar-ex1-collapse">
      <span class="sr-only">Desplegar navegación</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>
    <a class="navbar-brand" href="#"><?=$this->Html->image("logo.png");?>  </a>
  </div>
 
  <!-- Agrupar los enlaces de navegación, los formularios y cualquier
       otro elemento que se pueda ocultar al minimizar la barra -->
  
  
  <div class="collapse navbar-collapse navbar-ex1-collapse">
   
    <?php if(isset($current_user)): ?>
  <?php if($current_user['role_id'] == 1): ?>
  
    <ul class="nav navbar-nav">
      <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
          <?= __('Agentes')?><b class="caret"></b>
        </a>
        <ul class="dropdown-menu">
          <li><a href="#"><?= __('Lista agentes')?></a></li>
          <li><a href="#"><?= __('Telefonos agentes')?></a></li>
          
        </ul>
      </li>
       
       <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
          <?= __('Formación')?><b class="caret"></b>
        </a>
        <ul class="dropdown-menu">
          <li><a href="#"><?= __('Cursos')?></a></li>
          <li><a href="#"><?= __('Cursos agentes')?></a></li>
          
        </ul>
      </li>
      
      
      <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
          <?= __('Situaciones')?><b class="caret"></b>
        </a>
        <ul class="dropdown-menu">
          <li><a href="#"><?= __('Sabados')?></a></li>
          <li><a href="#"><?= __('Horas cómputo')?></a></li>
          <li><a href="#"><?= __('Disponibilidad')?></a></li>
          <li class="divider"></li>
          <li><a href="#"><?= __('Reconocimientos médicos')?></a></li>
          <li class="divider"></li>
          <li><a href="#"><?= __('Observaciones')?></a></li>
        </ul>
      </li>
    
    </ul>
 
    <?php endif; ?>
    <ul class="nav navbar-nav navbar-right">
     
      <?php if($current_user['role_id'] == 1): ?>
      <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
         <?= __('Configuración')?> <b class="caret"></b>
        </a>
        <ul class="dropdown-menu">
          <li><a href="#"><?= __('Puestos de gestión')?></a></li>
          <li><a href="#"><?= __('Residencias')?></a></li>
          <li><a href="#"><?= __('Estaciones')?></a></li>
          
           <li class="divider"></li>
          <li>
          <li><a href="#"><?= __('Categorías')?></a></li>
          <li><a href="#"><?= __('Roles')?></a></li>
          <li><a href="#"><?= __('Usuarios')?></a></li>
          
        </li>
        </ul>
      </li>
     <?php endif; ?>
      <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
         <?= __('Menu usuario') . ' '?> <?=  $this->Gravatar->avatar($current_user['email'], 
           ['size' => 25 , 'class'=>"img-rounded border-radius:15px"]); ' '?> <b class="caret"></b>
        </a>
         
        <ul class="dropdown-menu">
          <li><a href="#"><?= __('Cuenta')?></a></li>
          
           <li class="divider"></li>
          <li>
           
            
          <?=$this->Html->link (__('Salir'),['controller' => 'Users'  ,'action' => 'logout']  ) ?>
        </li>
        </ul>
      </li>
    </ul>
     
    <?php endif; ?>
  </div>
</nav>