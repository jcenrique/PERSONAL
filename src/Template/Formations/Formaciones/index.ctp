<script type="text/javascript" class="init">
	

$(document).ready(function() {
    $('#myTable1').DataTable( {
        responsive: {
            details: {
                type: 'column'
            }
        },
        autoWidth : false,
        sPaginationType: 'full_numbers',
             responsive: true,
            language: {
                url: '/locale/es_ES/es_ES.json'
            },
       
        columnDefs: [ 
            {
            className: 'control',
            orderable: false,
            targets:   0
            },
            { "width": "20%", "targets": 1 },
            { "width": "10%", "targets": 2 },
            { "width": "10%", "targets": 3 },
            { "width": "5%", "targets": 4 },
            { "width": "5%", "targets": 5 },
            { "width": "20%", "targets": 6 },
            { "width": "5%", "targets": 7 },
            { "width": "25%", "targets": 8 }
        ]
       
        
    } );
    
    $('.collapse').on('show.bs.collapse', function () {
    $('.collapse.in').collapse('hide');
    
     // tooltip demo
    $('.tooltip-demo').tooltip({
        selector: "[data-toggle=tooltip]",
        container: "body"
    })
});
} );
var table = $('#myTable1').DataTable();
 
$('#container').css( 'display', 'block' );
table.columns.adjust().draw();

	</script>

 
    
    

<div class="col-md-12" >
    <div class="panel panel-default" style="margin-top:20px">
        <div class="panel-heading" style ="font-size: 150%;">
            <?= __('Formación') ?> 
            <div class = "pull-right">
                
                <?= $this->Html->link('<span class="fa fa-plus"></span>',
                ['action' => 'add'],['class'=> 'btn btn-sm btn-success'  ,'escape' => false ,'data-toggle'=> 'tooltip', 'title'=> __('Añadir')] ) ?>
                <?= $this->Html->link('<span class="fa fa-file-excel-o"></span>',
                ['action' => 'xlsxSpout'],['class'=> 'btn btn-sm btn-success'  ,'escape' => false ,'data-toggle'=> 'tooltip', 'title'=> __('Imprimir')] ) ?>  
            </div>
        </div>
        
        <div class="panel-body">
            <table id="myTable1" width="100%" class="table table-striped table-bordered table-hover nowrap">
                <thead>
                    <tr>
                        <th></th>
                        <th><?= __('Curso') ?></th>
                        <th><?= __('Fecha inicio') ?></th>
                        <th><?= __('Fecha fin') ?></th>
                        <th><?= __('Hora inicio') ?></th>
                        <th><?= __('Hora fin') ?></th>
                       
                        <th scope="col"><?= __('Observacion') ?></th>
                        <th class ="actions"><?= __('Actiones') ?></th>
                        <th>Asistentes</th>
                        
                    
                    </tr>
                   
                </thead>
                
                <tbody>
                    <?php $i=1 ?>
                    <?php foreach ($formaciones as $formacione): ?>
                       
                        <tr> 
                         <td></td>
                            <td><?= $formacione->curso->nombre_curso? $this->Html->link($formacione->curso->nombre_curso, 
                                ['controller' => '../Formations/Cursos', 'action' => 'view', $formacione->curso->id]) : '' ?>
                            </td>
                            <td><?= h($formacione->fecha_inicio->format('d-M-Y')) ?></td>
                            <td><?= h($formacione->fecha_fin->format('d-M-Y')) ?></td>
                            <td><?= h($formacione->hora_inicio->format('H:i')) ?></td>
                            <td><?= h($formacione->hora_fin->format('H:i')) ?></td>
                            <td><?= $this->Text->autoParagraph(h($formacione->observacion)); ?></td>
                            <td class="actions">
                               <div class="tooltip-demo">
                                    <?= $this->Html->link('<i class="fa fa-plus" aria-hidden="true"></i>', ['controller' => '../Formations/AgentesFormations' , 'action' => 'add' , $formacione->id],
                                                        ['escape' => false, 'data-toggle'=> 'tooltip', 'title'=> __('Añadir asistentes')]) ?><i>&nbsp&nbsp</i>
                                    <?= $this->Html->link('<i class="fa fa-pencil" aria-hidden="true"></i>', ['action' => 'edit', $formacione->id],
                                                        ['escape' => false, 'data-toggle'=> 'tooltip', 'title'=> __('Editar')]) ?><i>&nbsp&nbsp</i>
                                    <?= $this->Form->postLink('<i class="fa fa-trash-o" aria-hidden="true"></i>', ['action' => 'delete', $formacione->id], 
                                        ['confirm' => __('Está usted seguro de eliminar el registro:  {0}?', $formacione->curso->nombre_curso),'escape' => false , 'data-toggle'=> 'tooltip', 'title'=> __('Eliminar')]) ?>
                                </div>
                            </td>
                            <td>
                               <?php $j=1 ?>
                               <div id="panel-asistententes<?=$i?>" class="panel-group" style="display:none;">
                                      <div class="panel panel-default">
                                        <a class ="hidden-xs visible-sm-*" data-toggle="collapse" href="#collapse<?=$i?>">Ver Asistentes</a>
                                        
                                        <div id="collapse<?=$i?>" class="panel-collapse collapse">
                                               <div class="panel-body">                        
                                                  
                                                 
                                                        <?php foreach ($agentesFormations as $agenteformacion): ?>
                                                            <?php if( $agenteformacion->formacione_id == $formacione->id):?>
                                                                <?php foreach ($agentes as $agente): ?>
                                                                    <?php if( $agenteformacion->agente_id == $agente->id):?>
                                                                       
                                                                            <li style= "list-style:none">
                                                                               
                                                                               <div class ="align-middle row">
                                                                                   <div class ="col-xs-2 col-sm-2" style = "text-align:left;">
                                                                                       <?= $this->Form->postButton(
                                                                                        $this->Html->tag('i', '', ['class' => 'fa fa-times-circle']) , 
                                                                                        ['controller' => '/AgentesFormations' , 'action' => 'delete', $agenteformacion->id], 
                                                                                        ['confirm' => __('Está usted seguro de eliminar el registro:  {0}?', $agente->nombre_completo ),
                                                                                        'escape' => false , 'data-toggle'=> 'tooltip', 'class' => 'btn btn-link', 'title'=> __('Eliminar')]) ?>
                                                                                    </div>
                                                                                    <div class ="col-xs-8 col-sm-10" style = "text-align:left;padding-top:7px">
                                                                                        <?= $j . '.- ' .  trim($agente->nombre_completo) ?>
                                                                                    </div>
                                                                                </div>
                                                                            </li>
                                                                        
                                                                         <?php $j++ ?>
                                                                     <?php endif; ?>
                                                                <?php endforeach; ?>
                                                            <?php endif; ?>
                                                       <?php endforeach; ?>
                                               
                                              
                                               
                                            </div>
                                          
                                        </div>
                                      </div>
                                    </div>   
                                                                                     
                                    
                                     <script>
                                            var count = '<?php echo $j;?>';
                                            var panelcount = '<?php echo $i;?>';
                                            var n = 'panel-asistententes' + panelcount.toString();
                                           
                                               elElemento=document.getElementById(n);
                                              
                                                if(count>1){
                                                    if(elElemento.style.display == 'block') {
                                                        elElemento.style.display = 'none';
                                                    }else {
                                                          elElemento.style.display = 'block';
                                                      }
                                                }
                                        
                                     </script>
                                     
                                </div>
                              
                            </td>
                           
                         </tr>                        
                   
                   <?php $i++ ?>
                       
                   
                    <?php endforeach; ?>
                 </tbody>
            </table>
    
        </div>
    </div>
</div>

  
                                