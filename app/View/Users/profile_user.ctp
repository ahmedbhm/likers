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
			      <div class="panel-body padding-none">
			       <div class="div-margin-lg">
<!---->
<!--form ajou-->
<?php echo $this->Form->create('User',array('action' => 'profile_user'));?>
<!--mail-->
    <?php    echo $this->Form->input('mail',
                        array(
                        'type' => 'email',
                        'value'=>$profile_user[0]['User']['mail'] ,
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
    <?php    echo $this->Form->input('mail_paypal',
                        array(
                        'type' => 'email',
                        'value'=>$profile_user[0]['User']['mail_paypal'] ,
                        'class' => 'form-control',
                        'placeholder' => 'ايميل بايبال',
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
    <?php     echo $this->Form->input('pass1',
                        array(
                        'type' => 'password',
                        'class' => 'form-control',
                        'placeholder' =>' كلمة السر الجديدة',
                        'label' => array(
                            'class' => '',
                            'text' => ''
                        ),
                        'div' => array(
                                        'class' => 'form-group',
                                       'style' => ''
                                      )
                        ));?>
    <?php     echo $this->Form->input('old_pass',
                        array(
                        'type' => 'password',
                        'class' => 'form-control',
                        'placeholder' =>'كلمة السر القديمة',
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
                                                'label' => 'تحديث',
                                                'div' => array(
                                                        'class' => 'form-group'
                                                        )
                                                )); 
?>
<!--fin form ajout-->

                                   </div>
                               </div>
			      </div>
			      </div>
</div>
</div>
    </div>
</div>
