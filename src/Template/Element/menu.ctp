

<nav class="navbar navbar-default navbar-static-top" role="navigation" id="main_nav">
    <!-- El logotipo y el icono que despliega el menú se agrupan
         para mostrarlos mejor en los dispositivos móviles -->
    <div>
       
        <?=$this->Html->image("logo.png", [
        "alt" => "gestionPM",
        'url' => ['controller' => 'Users', 'action' => 'login'] , 'class'=> 'navbar-brand']);?>
    </div>
   
    <!-- Agrupar los enlaces de navegación, los formularios y cualquier
         otro elemento que se pueda ocultar al minimizar la barra -->
    
    
   
     <ul class="nav navbar-top-links navbar-right">
        <?php if(isset($current_user)): ?>
        <?php if($current_user['role_id'] == 1): ?>
      
        
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class ="fa fa-users"></span>
                   <b class="caret"></b>
                </a>
                <ul class="dropdown-menu">
                     <li><?= $this->Html->link('<span class ="fa fa-users"></span>' . ' ' . __('Agentes') , 
                    ['controller' => '../Agentes' , 'action' => 'index'], ['escape' => false]) ?></li>
                    <li><a href="#"><?= __('Telefonos agentes')?></a></li>
                  
                </ul>
            </li>
           
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class ="fa fa-university"></span>
                   <b class="caret"></b>
                </a>
                <ul class="dropdown-menu">
                    <li><?= $this->Html->link('<span class ="fa fa-book"></span>' . ' ' . __('Cursos') , 
                    ['controller' => '../formations/Cursos' , 'action' => 'index'], ['escape' => false]) ?></li>
                     <li><?= $this->Html->link('<span class ="fa fa-archive"></span>' . ' ' . __('Formaciones') , 
                    ['controller' => '../formations/Formaciones' , 'action' => 'index'], ['escape' => false]) ?></li>
                    <li><?= $this->Html->link('<span class ="fa fa-mortar-board"></span>' . ' ' . __('Agentes-Formaciones') , 
                    ['controller' => '../formations/AgentesFormations' , 'action' => 'index'], ['escape' => false]) ?></li>
                  
                </ul>
            </li>
          
          
          
     
        <?php endif; ?>
        
        
         
          <?php if($current_user['role_id'] == 1): ?>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class ="fa fa-cog"></span>
             <b class="caret"></b>
            </a>
            <ul class="dropdown-menu">
              <li><?= $this->Html->link('<span class ="fa fa-desktop"></span>' . ' ' . __('Puestos de gestión') , 
                    ['controller' => '../PuestosGestion' , 'action' => 'index'], ['escape' => false]) ?></li>
              
              <li><?= $this->Html->link('<span class ="fa fa-building"></span>' . ' ' . __('Residencias') , 
                    ['controller' => '../Residencias' , 'action' => 'index'], ['escape' => false]) ?></li>
             
             <li><?= $this->Html->link('<span class ="fa fa-home"></span>' . ' ' . __('Estaciones') , 
                    ['controller' => '../Estaciones' , 'action' => 'index'], ['escape' => false]) ?></li>
              
               <li class="divider"></li>
              <li>
              <li><?= $this->Html->link('<span class ="fa fa-user-md"></span>' . ' ' . __('Roles') , 
                    ['controller' => '../Roles' , 'action' => 'index'], ['escape' => false]) ?></li>
              
            </li>
              <li><?= $this->Html->link('<span class ="fa fa-sitemap"></span>' . ' ' . __('Categorías') , 
                    ['controller' => '../Cargos' , 'action' => 'index'], ['escape' => false]) ?></li>
              
            </li>
              
              <li><?= $this->Html->link('<span class ="fa fa-users"></span>' . ' ' . __('Usuarios') , 
                    ['controller' => '../Users' , 'action' => 'index'], ['escape' => false]) ?></li>
              
            </li>
            </ul>
          </li>
         <?php endif; ?>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
             <?=$this->Gravatar->avatar($current_user['email'] , 
               ['size' => 25 , 'class'=>"img-rounded border-radius:15px"])?><b class="caret"></b>
            </a>
             
            <ul class="dropdown-menu dropdown-user">
               <li><?= $this->Html->link('<span class ="fa fa-user"></span>' . ' ' . __('Cuenta') , 
                    ['controller' => '../Users' , 'action' => 'edit' , $current_user['id']], ['escape' => false]) ?></li>
              
               <li class="divider"></li>
              
              <li><?= $this->Html->link('<span class ="fa fa-sign-out"></span>' . ' ' . __('Salir') , 
                    ['controller' => '../Users' , 'action' => 'logout' ], ['escape' => false]) ?></li>
                
             
            </ul>
          </li>
        
         
        <?php endif; ?>
   </ul>
   
</nav>