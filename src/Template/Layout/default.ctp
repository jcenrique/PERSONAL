<script type="text/javascript">

window.setTimeout(function() {
    $(".alert").fadeTo(500, 0).slideUp(500, function(){
        $(this).remove(); 
    });
}, 4000);


</script>
<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = 'Gestión del personal';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <?= $this->Html->css([ '/vendor/bootstrap/css/bootstrap.min' ,'/vendor/flot-tooltip/jquery.flot.tooltip.min'
        ,'/vendor/datatables-plugins/dataTables.bootstrap','/vendor/datatables-responsive/dataTables.responsive'
        ,'/vendor/metisMenu/metisMenu.min', 'sb-admin-2','/vendor/font-awesome/css/font-awesome.min', 'style']) ?>
   
      
 <?= $this->Html->script([ '/vendor/jquery/jquery.min','/vendor/bootstrap/js/bootstrap.min',
     '/vendor/datatables/js/jquery.dataTables.min', 
    '/vendor/datatables-plugins/dataTables.bootstrap.min' ,
    '/vendor/datatables-responsive/dataTables.responsive.min','/vendor/flot-tooltip/jquery.flot.tooltip.min',
    '/vendor/metisMenu/metisMenu.min',  'sb-admin-2']) ?>
    
 <?= $this->fetch('script') ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    

   
</head>
<body>
    
    <?= $this->element('menu')?>
   
    <?= $this->Flash->render() ?>
    <div class="container-fluid">
        <?= $this->fetch('content') ?>
    </div>
    
    <footer>
    </footer>
 
  <script>
    $(document).ready(function() {
        $('#myTable').DataTable({
            "sPaginationType": 'full_numbers',
             responsive: true,
            language: {
                url: '/locale/es_ES/es_ES.json'
            }
        });
    });
     // tooltip demo
    $('.tooltip-demo').tooltip({
        selector: "[data-toggle=tooltip]",
        container: "body"
    })
   
   
   
   
    </script>
   

</body>
</html>
