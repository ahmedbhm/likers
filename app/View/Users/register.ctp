<div class="black-div container-fluid" style="padding-top: 30px; padding-bottom: 30px;">
        <div class="col-md-offset-4 col-md-4">
                <p class="p-center">
                <?php echo $this->Html->image('logo.jpg', array('alt' => 'logo','class'=>'logo2'));?>
                </p>
                <!--titre page-->
                <h3 style="color:#19BC9A;">مرحبا بك! تسجيل عضوية جديدة</h3>
<?php
        echo $this->Form->create('User',array('action' => 'register'));?>
<!--pseodo-->
<div class="form-group">
<div class="input-group">
<div class="input-group-addon"><i class="glyphicon glyphicon-user"></i></div>
<?php echo $this->Form->input('Pseudo',
                        array(
                        'type' => 'text',
                        'class' => 'form-control input-lg input-dark',
                        'placeholder' => 'إسم المستخدم',
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
<!--mail-->
  <div class="form-group">
    <div class="input-group">
<div class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></div>
    <?php    echo $this->Form->input('mail',
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
                        ));?>
</div>
</div>
<!--passe-->
<div class="form-group">
<div class="input-group">
    <div class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></div>
    <?php     echo $this->Form->input('pass',
                        array(
                        'type' => 'password',
                        'class' => 'form-control input-lg input-dark',
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
    </div>
    </div>
<!--passe 2-->
<div class="form-group">
<div class="input-group">
    <div class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></div>
    <?php     echo $this->Form->input('pass',
                        array(
                        'type' => 'password',
                        'class' => 'form-control input-lg input-dark',
                        'placeholder' =>'إعادة كلمة السر',
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
<!--country-->
<div class="form-group">
        
<div class="input-group">
    <div class="input-group-addon"><i class="glyphicon glyphicon-map-marker"></i></div>
    <?php     echo $this->Form->input('country',
                        array(
                        'type' => 'text',
                        'class' => 'form-control input-lg input-dark',
                        'placeholder' =>' الدولة',
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
<!--telephone-->
<div class="form-group">
<div class="input-group">
    <div class="input-group-addon"><i class="glyphicon glyphicon-phone"></i></div>
    <?php     echo $this->Form->input('tel',
                        array(
                        'type' => 'tel',
                        'class' => 'form-control input-lg input-dark',
                        'placeholder' =>'رقم الهاتف',
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
    <!--titre page-->
       <p> لديك حساب بالفعل ؟

        <a href="<?php echo $this->Html->url('/users/login',true); ?>" style="float: left; text-decoration:underline; color: #fff;"> سجل دخولك</a>
        </p>
    </div>
    <div class="form-group">
        <button class="btn btn-grean form-control">تسجيل  حساب</button>
<?php     echo $this->Form->end(); 
?>
    </div>

</div>
</div>