<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $title_for_layout; ?>
	</title>
	<?php
		echo $this->Html->meta('icon');
                
		echo $this->Html->css('bootstrap.css');
                echo $this->Html->css('style.css');

                echo $this->Html->script('jquery-1.11.3.min.js');
 
		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
</head>
<body>
<!-- //
           likers V1
          script by https://www.facebook.com/itdigitale
         // -->
<div class="col-md-12">

    <?php
            if ($this->Session->read('Auth.User.role_id')==3 && $this->Session->read('Auth.User.active')==1)
            {
                echo $this->element('header_user') ;
            }
            if ($this->Session->read('Auth.User.role_id')==1 || $this->Session->read('Auth.User.role_id')==2 && $this->Session->read('Auth.User.active')==1)
            {
                echo $this->element('header_admin') ;
            }
    ?>
</div>
		
<div class="container-fluid" >
    <div class="row" >
        <?php
            if ($this->Session->read('Auth.User.role_id')==3 && $this->Session->read('Auth.User.active')==1)
            {
                echo $this->element('navbar_user') ;
            }
            if ($this->Session->read('Auth.User.role_id')==2 && $this->Session->read('Auth.User.active')==1)
            {
                echo $this->element('navbar_suppervisor') ;
            }
            if ($this->Session->read('Auth.User.role_id')==1)
            {
                echo $this->element('navbar_admin') ;
            }
             
            echo $this->Session->flash(); 

            echo $this->fetch('content'); 
            ?>
        <div class="col-md-10 col-xs-12" style="direction: ltr; text-align: left;">
        </div>
    </div>
</div>	
<!-- Js writeBuffer -->
<?php  if (class_exists('JsHelper') && method_exists($this->Js, 'writeBuffer')) echo $this->Js->writeBuffer();
// Writes cached scripts
 ?>
	    <?php echo $this->Html->script('bootstrap.min.js'); ?>
            <?php echo $this->Html->script('MyScript.js'); ?>
	    <?php echo $this->fetch('script'); ?>         
</body>
</html>
