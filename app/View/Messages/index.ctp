<!--body-->
	<div class=" col-md-10 col-xs-12">
            <div class="row">
<!--titre-->
<div class="col-md-12">
        <h2>الرسائل</h2>
</div>
    <div class="col-md-8 col-xs-12">
        <ol class="breadcrumb">
          <li><a href="#">الرئسية</a></li>
          <li class="active">الرسائل</li>
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
                        الرسائل
                        <i class="caret"></i>
                </a>
              </h4>
            </div>
            <div id="collapse2" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="heading2">
              <div class="panel-body padding-none">
               <div class="div-margin-lg">
                   <h4> عنوان التذكرة : <?= $AllMessages[0]['Ticket']['title']?></h4> 
                   <hr />
                   <br />
<?php foreach ($AllMessages as $val)
{
    if ($val['Message']['user_id']== $this->Session->read('Auth.User.id'))
    {   
    ?>        
<div class="col-md-8">
    <div class="row">
     <div class="col-md-2 col-sm-2 hidden-xs">
         <p style="padding:20px 10px; background: #557CC1; color: #FFF; text-align: center;">أنا</p>
    </div>
    <div class="col-md-10 col-sm-10">
    <div class="alert alert-info" role="alert" style="background: #EFEDED; border: 1px solid #B9BBBB;">
        <p style="color: #000;">  <i class="glyphicon glyphicon-time"></i><?= $val['Message']['created'] ?></p>
       <p style="color: #000;"><?= $val['Message']['content'] ?></p>
    </div>
    </div>
    </div>
</div>
<?php } 
else
    {
?>                  
<div class="col-md-8">
    <div class="row">
  <div class="col-md-2 col-sm-2 hidden-xs">
         <p style="padding:20px 10px; background: #DE4E4E; color: #FFF; text-align: center;">الادارة</p>
    </div>
    <div class="col-md-10 col-sm-10">
        <div class="alert alert-success" role="alert" style="background: #FFF; border: 1px solid #B9BBBB;">
        <p style="color: #000;">  <i class="glyphicon glyphicon-time"></i><?= $val['Message']['created'] ?></p>
        <p style="color: #000;"><?= $val['Message']['content'] ?></p>
    </div>
    </div>
   
    </div>
</div>
<?php } 

} ?>
                   <div class="col-md-12"> 
<?= $this->Form->create('Message',array('action'=>'add','class'=>'form-horizontal')) ?>
 <div class="form-group">
 <div class="col-md-12">
     <textarea class="form-control" style="height:100px;" name="data[Message][content]"></textarea>
     <input type="hidden" name="data[Message][ticket_id]" value="<?= $AllMessages[0]['Ticket']['id']?>">
 </div>
  </div>
 <div class="form-group">
 <div class="col-md-2">

     <button class="btn btn-primary">إرسال</button>
 </div>
 </div>
<?= $this->Form->end() ?>
               </div>
                   </div>
               </div>

     <!---fin-->
              </div>
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