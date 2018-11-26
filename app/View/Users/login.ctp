<div class="black-div container-fluid" style="padding-top: 40px;padding-bottom: 40px;">
<div class="col-md-offset-4 col-md-4">
			<p class="p-center">
			 <?php echo $this->Html->image('logo.jpg', array('alt' => 'logo','class'=>'logo2'));?>
			</p>
		<!--titre page-->
                <h3 style="color:#19BC9A;">مرحبا بك! تسجيل الدخول</h3>
		<!-- form login -->
<?php
        echo $this->Form->create('User');?>
<div class="form-group">
<div class="input-group">
    <div class="input-group-addon"><i class="glyphicon glyphicon-user"></i></div>

                    <?php
echo $this->Form->input('mail',
                        array(
                        'type' => 'email',
                        'class' => 'form-control input-lg input-dark',
                        'placeholder' => 'الإيميل',
                        'label' => array(
                            'class' => '',
                            'text' => ''
                        ),
                        'div' => array(
                                        'class' => 'form-group',
                                       'style' => ''
                                      )
                        ));
                    ?>
    </div>
    </div>

    <div class="form-group">

    <div class="input-group">
<div class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></div>

                <?php
        echo $this->Form->input('pass',
                        array(
                        'type' => 'password',
                        'class' => 'form-control input-lg input-dark',
                        'placeholder' =>'كلمة السر',
                        'label' => array(
                            'class' => '',
                            'text' => ''
                        ),
                        'div' => array(
                                        'class' => 'form-group',
                                       'style' => ''
                                      )
                        ));?>
</div>
</div>
   <div class="form-group">
        <a href="#" style="color: #19bd9b;" data-toggle="modal" data-target="#myModal"><i class="glyphicon glyphicon-exclamation-sign"></i> نسيت كلمة المرور؟ إضغط هنا</a>
  </div>
  <div class="form-group">
      <p style="text-align: left;" > 
          <span style="float: right;"> ليس لديك حساب</span>
      <a href="<?php echo $this->Html->url('/users/register',true); ?>" style=" text-decoration:underline; color: #fff;clear: both;">أحصل على حساب</a>
      </p>
  </div>
<div class="form-group">
        <button class="btn btn-grean form-control" type="submit">تسجيل الدخول</button>

 </div>
                                <?php
       echo $this->Form->end(); 
?>

<!-- info site-->
<p class="p-center">
السيرفر متوقف حاليًا

</p>
<!-- fin info site-->
<p class="p-center">
        copyrignt @ 2015 <a href="http://www.morahhib.com/open-source/likers">likers v1</a>
</p>
</div>
</div>	


<!-- Modal new member -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
<div class="modal-dialog" role="document">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
<h4 class="modal-title" id="myModalLabel"> تجديد كلمة السر</h4>
</div>
<div class="modal-body">
<!--form ajou-->
       <?php echo $this->Form->create('Notifications',array('action' => 'get_pwd'));?>
<div class="form-group">
    <input type="email" name="data[User][mail]" class="form-control" placeholder="ضع إيميلك هنا"/>
</div>

<?php     echo $this->Form->end(array('class' => 'btn btn-grean',
                                                'label' => 'تجديد كلمة السر',
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
<!--fin model-->