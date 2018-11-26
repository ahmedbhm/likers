<!--body-->
	<div class=" col-md-10 col-xs-12">
            <div class="row">
	<!--titre-->
			<div class="col-md-12">
				<h2>تنبيهات</h2>
				
			</div>
                            <div class="col-md-8 col-xs-12">
				<ol class="breadcrumb">
				  <li><a href="#">الرئسية</a></li>
				  <li class="active">تنبيهات</li>
				</ol>
                        </div>
                  
		<!--fin titre-->
		
		<!--payment-->
		<div class="col-md-12 col-xs-12">
		<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
			  <div class="panel panel-default">
			    <div class="panel-header-grean" role="tab" id="heading2">
			      <h4 class="panel-title">
			        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse2" aria-expanded="true" aria-controls="collapse2">
			        	<i class="glyphicon glyphicon-search"></i>
			        	تنبيهات
			      		<i class="caret"></i>
			        </a>
			      </h4>
			    </div>
			    <div id="collapse2" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="heading2">
<?php foreach ($AllNotif as $val)
{
     if ($val['Notification']['is_all']==1) {
    ?>
<div class="panel-body padding-none">
 <div class="div-margin-lg">
     <br />
     <div class="col-md-1 col-sm-1 hidden-xs">
              <p style=" border-radius: 4px; padding:15px 0px; background: #19A5BD; color: #FFF; text-align: center;">عامة</p>
    </div>
     <div class="col-md-8">
         <div class="row">
         <div class="col-md-11 col-sm-11">
         <div class="alert alert-warning" role="alert" style="background: #19A5BD; border: 1px solid #17A2A2;">
             <p style="color: #FFF;">  <i class="glyphicon glyphicon-time"></i><?php echo $val['Notification']['created']; ?></p>
             <p style="color: #FFF;font-size: 12px;"><?= $val['Notification']['content'] ?></p>
         </div>
         </div>

         </div>
     </div>

     </div>
 </div>
<?php }  else {
    
 ?>
<div class="panel-body padding-none">
 <div class="div-margin-lg">
     <br />
     <div class="col-md-1 col-sm-1 hidden-xs">
              <p style=" border-radius: 4px; padding:15px 0px; background: #62AF25; color: #FFF; text-align: center;">خاصة</p>
    </div>
     <div class="col-md-8">
         <div class="row">
         <div class="col-md-11 col-sm-11">
         <div class="alert alert-warning" role="alert" style="background: #72AF25; border: 1px solid #809665;">
             <p style="color: #FFF;">  <i class="glyphicon glyphicon-time"></i><?php echo $val['Notification']['created']; ?></p>
             <p style="color: #FFF;font-size: 12px;"><?php echo $val['Notification']['content'] ?></p>
         </div>
         </div>

         </div>
     </div>

     </div>
 </div>
<?php }
} ?> 
                     <!---fin-->
			      </div>
                              <!--pagination-->
<nav>
        <ul class="pager">
<?php       
    if($this->paginator->hasPrev())
        {
            echo $this->Paginator->prev(__('السابق'), array('tag' => 'li'));;
        }
 else {
       echo '<li class="disabled"><a href="#">السابق</a></li>';     
}
if($this->paginator->hasNext())
    {
        echo $this->paginator->next(__('التالي'), array('tag' => 'li'));
    }
 else {
       echo '<li class="disabled"><a href="#">التالي</a></li>';     
}
?>
        </ul>
</nav>
                                  
                                  
                                  
                                  <!---fin-->
			      </div>
	</div>
	</div>
            </div>
        
		<!--fin payment-->
		
	</div>
		<!--fin body-->	
        </div>
<!-- Modal new member -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
<div class="modal-dialog" role="document">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
<h4 class="modal-title" id="myModalLabel">عضو جديد</h4>
</div>
<div class="modal-body">
<!--form ajou-->
       <?php echo $this->Form->create('User',array('action' => 'add'));?>
<!--pseodo-->

<?php echo $this->Form->input('Pseudo',
                        array(
                        'type' => 'text',
                        'class' => 'form-control',
                        'placeholder' => 'إسم العضو',
                        'label' => array(
                            'class' => '',
                            'text' => ''
                        ),
                        'div' => array(
                                        'class' => 'form-group',
                                       'style' => ''
                                      )
                        ));?>

<!--mail-->
    <?php    echo $this->Form->input('mail',
                        array(
                        'type' => 'email',
                        'class' => 'form-control',
                        'placeholder' => 'الإيميل',
                        'label' => array(
                            'class' => '',
                            'text' => ''
                        ),
                        'div' => array(
                                        'class' => 'form-group',
                                       'style' => ''
                                      )
                        ));?>
<!--passe-->
    <?php     echo $this->Form->input('pass',
                        array(
                        'type' => 'password',
                        'class' => 'form-control',
                        'placeholder' =>' كلمة السر',
                        'label' => array(
                            'class' => '',
                            'text' => ''
                        ),
                        'div' => array(
                                        'class' => 'form-group',
                                       'style' => ''
                                      )
                        ));?>
    <?php    echo $this->Form->input('country',
                        array(
                        'type' => 'text',
                        'class' => 'form-control',
                        'placeholder' => 'الدولة',
                        'label' => array(
                            'class' => '',
                            'text' => ''
                        ),
                        'div' => array(
                                        'class' => 'form-group',
                                       'style' => ''
                                      )
                        ));?>
    <?php    echo $this->Form->input('tel',
                        array(
                        'type' => 'tel',
                        'class' => 'form-control',
                        'placeholder' => 'الهاثف',
                        'label' => array(
                            'class' => '',
                            'text' => ''
                        ),
                        'div' => array(
                                        'class' => 'form-group',
                                       'style' => ''
                                      )
                        ));?>

<?php     echo $this->Form->end(array('class' => 'btn btn-info btn-lg btn-t1',
                                                'label' => 'أضف العضو',
                                                'div' => array(
                                                        'class' => 'form-group'
                                                        )
                                                )); 
?>
<!--fin form ajout-->
</div>
<div class="modal-footer">
</div>
</div>
</div>
</div>
<!--fin model-->