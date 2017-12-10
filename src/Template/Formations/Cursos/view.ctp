<div class="col-md-6 col-md-offset-3">
    
    <div class="panel panel-default" style="margin-top:30px">
        <div class="panel-heading">
            <h4><?= __('Curso') ?>
                    <?php if($current_user['role_id'] == 1) :?>
                        <?= $this->Html->link('<span class="fa fa-reply"></span>',
                        $this->request->referer(),['class'=> 'btn btn-sm btn-success pull-right'  ,'escape' => false ,'data-toggle'=> 'tooltip', 'title'=> __('Volver')] ) ?>
                    <?php endif;?>
            </h4>
        </div>
        <div class="panel-body">
       <table class="table table-striped table-bordered">
         <tr>
            <th scope="row"><?= __('Nombre curso') ?></th>
            <td><?= h($curso->nombre_curso) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Empresa') ?></th>
            <td><?= h($curso->empresa) ?></td>
        </tr>
       
        <tr>
            <th scope="row"><?= __('Descripción') ?></th>
            <td><?= $this->Text->autoParagraph(h($curso->descripcion)); ?></td>
            
        </tr>
         <tr>
            <th scope="row"><?= __('Creado') ?></th>
            <td><?= h($curso->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modificado') ?></th>
            <td><?= h($curso->modified) ?></td>
        </tr>
    </table>
    </div>
    
    
    </div>
</div>
