<!--body-->
	<div class=" col-md-10 col-xs-12">
            <div class="row">
	<!--titre-->
			<div class="col-md-12">
				<h2>حسابي</h2>
				
			</div>
                            <div class="col-md-8 col-xs-12">
				<ol class="breadcrumb">
				  <li><a href="#">الرئسية</a></li>
				  <li class="active">حسابي</li>
				</ol>
                        </div>
                  
		<!--fin titre-->
		
		<!--payment-->
		<div class="col-md-12 col-xs-12">
		<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
			  <div class="panel panel-default">
			    <div class="panel-header-blue" role="tab" id="heading2">
			      <h4 class="panel-title">
			        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse2" aria-expanded="true" aria-controls="collapse2">
			        	<i class="glyphicon glyphicon-search"></i>
			        	معلومات بايبال
			      		<i class="caret" ></i>
			        </a>
			      </h4>
			    </div>
			    <div id="collapse2" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="heading2">
			      <div class="panel-body padding-none">
			       <div class="div-margin-lg">
<!--paypal-->

<?php echo $this->Form->create('Paypal',array('action' => 'update'));?>
<!--mail-->
    <?php    echo $this->Form->input('pass',
                        array(
                        'type' => 'text',
                         'value' => $paypal['Paypal']['pass'],   
                        'class' => 'form-control',
                        'placeholder' => 'باس ال API',
                        'label' => array(
                            'class' => '',
                            'text' => ' باس ال API'
                        ),
                        'div' => array(
                                        'class' => 'form-group',
                                       'style' => ''
                                      )
                        ));?>
<!--passe-->
    <?php     echo $this->Form->input('signature',
                        array(
                        'type' => 'text',
                        'value' => $paypal['Paypal']['signature'],
                        'class' => 'form-control',
                        'placeholder' =>' التوقيع ',
                        'label' => array(
                            'class' => '',
                            'text' => 'التوقيع'
                        ),
                        'div' => array(
                                        'class' => 'form-group',
                                       'style' => ''
                                      )
                        ));?>
    <?php     echo $this->Form->input('user',
                        array(
                        'type' => 'text',
                        'value' => $paypal['Paypal']['user'],
                        'class' => 'form-control',
                        'placeholder' =>'إيميل بايبال',
                        'label' => array(
                            'class' => '',
                            'text' => 'إيميل بايبال'
                        ),
                        'div' => array(
                                        'class' => 'form-group',
                                       'style' => ''
                                      )
                        ));?>
<?php     echo $this->Form->end(array('class' => 'btn btn-primary',
                                                'label' => 'تحديث',
                                                'div' => array(
                                                        'class' => 'form-group'
                                                        )
                                                )); 
?>

<!--fin form paypal-->


                                   </div>
                               </div>
			      </div>
			      </div>
</div>
</div>
   <!--payment-->
   <!--profil-->
		<div class="col-md-12 col-xs-12">
		<div class="panel-group" id="accordion1" role="tablist" aria-multiselectable="true">
			  <div class="panel panel-default">
			    <div class="panel-header-grean" role="tab" id="heading1">
			      <h4 class="panel-title">
			        <a role="button" data-toggle="collapse" data-parent="#accordion1" href="#collapse1" aria-expanded="true" aria-controls="collapse1">
			        	<i class="glyphicon glyphicon-search"></i>
			        	حسابي
			      		<i class="caret"></i>
			        </a>
			      </h4>
			    </div>
			    <div id="collapse2" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="heading1">
			      <div class="panel-body padding-none">
			       <div class="div-margin-lg">

<!--form ajou-->
<?php echo $this->Form->create('User',array('action' => 'profile_admin'));?>
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
<?php     echo $this->Form->end(array('class' => 'btn btn-grean',
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
