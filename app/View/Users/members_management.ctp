        <!--body-->
        <div class="col-md-10 col-xs-12">
                <div class="row">
        <!--titre-->
                <div class="col-md-12">
                        <h2> إدارة الأعضاء  </h2>

                </div>
                <div class="col-md-12">
                        <ol class="breadcrumb">
                          <li><a href="#">الرئسية</a></li>
                          <li class="active"> إدارة الأعضاء </li>
                        </ol>
        </div>
        <!--fin titre-->
                <!--member-->
                <div class="col-md-12">
                        <!--panel-->
                        <div class="panel-group" id="accordion3" role="tablist" aria-multiselectable="true">
                  <div class="panel panel-default">
                    <div class="panel-header-grean" role="tab" id="heading3">
                      <h4 class="panel-title">
                        <a role="button" data-toggle="collapse" data-parent="#accordion3" href="#collapse3" aria-expanded="true" aria-controls="collapse3">
                                <i class="glyphicon glyphicon-th-list"></i>
                                  الخدمات الحالية
                                <i class="caret"></i>
                        </a>
                      </h4>
                    </div>
                    <div id="collapse3" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="heading3">
                      <div class="panel-body padding-none" >
<!---------------------------------------------->
<div class="div-margin">
    <button class="btn btn-primary btn-sm"  role="button" data-toggle="collapse" href="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
     <span class="glyphicon glyphicon-search"></span>
            بحث عن عضو
    </button>
    <button class="btn btn-default btn-sm" data-toggle="modal" data-target="#myModal">
            <span class="glyphicon glyphicon-plus"></span>
             عضو جديد
    </button>
    <button class="btn btn-success btn-sm"  role="button" data-toggle="collapse" href="#collapseExample2" aria-expanded="false" aria-controls="collapseExample">
     <span class="glyphicon glyphicon-signal"></span>
            تواجد الأعضاء
    </button>
    
    <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#notif">
            <span class="glyphicon glyphicon-plus"></span>
             تنبيه جديد
    </button>
</div>
<!------------------------------------------------------- -->
<!--onligne-->
<div class="div-margin collapse" id="collapseExample2">
    <a href="<?php echo $this->Html->url(array("controller" => "Users","action" => "members_management","1")); ?>" class="btn btn-default btn-sm">اليوم </a>
    <a href="<?php echo $this->Html->url(array("controller" => "Users","action" => "members_management","2")); ?>" class="btn btn-default btn-sm">أمس</a>
    <a href="<?php echo $this->Html->url(array("controller" => "Users","action" => "members_management","3")); ?>" class="btn btn-default btn-sm">هذا الأسبوع</a>
    <a href="<?php echo $this->Html->url(array("controller" => "Users","action" => "members_management","4")); ?>" class="btn btn-default btn-sm">هذا الشهر</a>
    <a href="<?php echo $this->Html->url(array("controller" => "Users","action" => "members_management","5")); ?>" class="btn btn-default btn-sm">هذه السنة</a>
</div>
<!--fin enligne-->
                        <!--search-->
<?php echo $this->Form->create('User',array('action'=>'members_management','class'=>'form-inline div-margin collapse','id'=>'collapseExample')); ?>
    <div class="form-group">
      <input type="text" class="form-control input-sm"  name="data[User][id]"   placeholder="رقم العضو">
    </div>
     <div class="form-group">
      <input type="text" class="form-control input-sm"  name="data[User][Pseudo]"   placeholder="إسم العضو">
    </div>
     <div class="form-group">
      <input type="text" class="form-control input-sm" name="data[User][mail]" placeholder="إيميل العضو">
    </div>
     <div class="form-group">
      <input type="text" class="form-control input-sm" name="data[User][country]" placeholder="الدولة">
    </div>
     <div class="form-group">
        <input placeholder="تاريخ التسجيل" class="form-control input-sm" type="text" onfocus="(this.type='date')"  name="data[User][created]" > 
    </div>
    <button type="submit" class="btn btn-primary btn-sm">إبحث</span></button>
<?php echo $this->Form->end();?>
                        <!--fin search-->

                        <!-- table-->
                        <div class="div-margin">
                        <div class="wrapper">
                                  <div class="table2 table-bordered">
                                    <div class="row-table header">
                                      <div class="cell">
                                        #
                                      </div>
                                      <div class="cell">
                                           إسم العضو
                                      </div>
                                      <div class="cell">
                                       الإيميل
                                      </div>
                                      <div class="cell">
                                      تاريخ التسجيل
                                     </div>
                                      <div class="cell">
                                       الدولة
                                      </div>
                                        <div class="cell">
                                       الهاتف
                                      </div>
                                        <div class="cell">
                                       الرصيد
                                      </div>
                                        <div class="cell">
                                       نسبة التخفيض
                                      </div>
                                      <div class="cell">
                                       <span class="glyphicon glyphicon-cog"></span>
                                      </div>
                                    </div>
<?php 
foreach ($AllUsers as $val) {
 ?>
    <div class="row-table">
      <div class="cell">
          <?php echo $val['User']['id']; ?>
      </div>
      <div class="cell">
        <?php echo $val['User']['Pseudo']; ?>
      </div>
      <div class="cell">
        <?php echo $val['User']['mail']; ?>
      </div>
      <div class="cell">
       <?php $date =new DateTime($val['User']['created']);
              echo date_format($date, 'Y/m/d');?>
      </div>
      <div class="cell">
       <?php echo $val['User']['country']; ?>
      </div>
        <div class="cell">
       <?php echo $val['User']['tel']; ?>
      </div>
        <div class="cell">
       <?php echo $val['User']['capital']; ?>
      </div>
        <div class="cell">
       <?php echo ' % '.$val['User']['reduction']; ?>
      </div>
      <div class="cell">
<?php if ($val['User']['active']==0)
        { ?>
          <a class="btn btn-sm btn-success" href="#" data-toggle="modal" data-target="#activer_user" data-whatever="<?php echo $val['User']['id']; ?>"><i class="glyphicon glyphicon-ok"></i> تفعيل</a>            
<?php   }
        else
        { ?>
          <a class="btn btn-sm btn-danger" href="#" data-toggle="modal" data-target="#desactiver_user" data-whatever="<?php echo $val['User']['id']; ?>"> <i class="glyphicon glyphicon-remove"></i> حظر</a>               
<?php   }?>
           <a class="btn btn-sm btn-warning" href="#"  data-toggle="modal" data-target="#exampleModal" data-whatever="<?php echo $val['User']['id']; ?>"> <i class="glyphicon glyphicon-usd"></i> رصيد
       </a>
          <a class="btn btn-sm btn-info" href="#" data-toggle="modal" data-target="#remise" data-whatever="<?php echo $val['User']['id']; ?>"> <i class="glyphicon glyphicon-star"></i> تخفيض </a> 
      </div>
    </div>
<?php
}
?>
                                  </div>
                                  </div>
                      </div>
                        <!--fin table-->
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

<!--fin pagination-->
                        <!---->

                      </div>
                    </div>
                  </div>
                </div>
                <!--fin panel-->
                </div>
                <!-- fin new member-->
        </div>
        </div>
        <!--fin body-->
<!--model balances-->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
<div class="modal-dialog" role="document">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
<h4 class="modal-title" id="exampleModalLabel"> شحن للعضو رقم </h4>
</div>
<div class="modal-body">
<?php echo $this->Form->create('Recharge',array('action'=>'add')); ?>
    <input type="hidden" name="data[Recharge][user_id]" id="RechargeUser_id">
    <?php echo $this->Form->input('amount',
                        array(
                        'type' => 'number',
                        'class' => 'form-control',
                        'placeholder' => 'المبلغ المراد شحنه',
                        'label' => array(
                            'class' => '',
                            'text' => 'المبلغ'
                        ),
                        'div' => array(
                                        'class' => 'form-group'
                                      )
                        ));?>
    <input type="hidden" value="1" name="data[Recharge][way_id]" id="RechargeWay_id">
    <input type="hidden" value="1" name="data[Recharge][state]" id="RechargeState">
    <button class="btn btn-grean">تحديث</button>
    <button type="button" class="btn btn-default" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">إلغاء</span></button>
             
<?php     echo $this->Form->end();?>
</div>
<div class="modal-footer">
</div>
</div>
</div>
</div>
<!--fin modele -->
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
                        'placeholder' => 'الهاتف',
                        'label' => array(
                            'class' => '',
                            'text' => ''
                        ),
                        'div' => array(
                                        'class' => 'form-group',
                                       'style' => ''
                                      )
                        ));?>
<button class="btn btn-grean">أضف العضو</button>
 <button type="button" class="btn btn-default" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">إلغاء</span></button>

<?php     echo $this->Form->end(); 
?>
<!--fin form ajout-->
</div>

</div>
</div>
</div>
<!--fin model-->
<!--model Activer user-->
<div class="modal fade" id="activer_user" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
<div class="modal-dialog" role="document">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
<h4 class="modal-title" id="exampleModalLabel"> شحن للعضو رقم </h4>
</div>
<div class="modal-body">
<?php echo $this->Form->create('User',array('action'=>'update_state')); ?>
    <input type="hidden" name="data[User][id]" id="UserId">
    <input type="hidden" value="1" name="data[User][active]" id="UserActive">
    <button class="btn btn-grean"> إزالة الحظر</button>
    <button type="button" class="btn btn-default" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">إلغاء</span></button>
<?php     echo $this->Form->end();?>
</div>
<div class="modal-footer">
</div>
</div>
</div>
</div>
<!--fin modele Activer user-->
<!--model désctiver user-->
<div class="modal fade" id="desactiver_user" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
<div class="modal-dialog" role="document">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
<h4 class="modal-title" id="exampleModalLabel">  </h4>
</div>
<div class="modal-body">
<?php echo $this->Form->create('User',array('action'=>'update_state')); ?>
    <input type="hidden" name="data[User][id]" id="UserId">
    <input type="hidden" value="0" name="data[User][active]" id="UserActive">
    <button class=" btn btn-grean">حظر</button>
    <button type="button" class="btn btn-default" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">إلغاء</span></button>
<?php     echo $this->Form->end();?>
</div>
<div class="modal-footer">
</div>
</div>
</div>
</div>
<!--fin modele désactiver user-->
<!-- Modal  notification -->
<div class="modal fade" id="notif" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
<div class="modal-dialog" role="document">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
<h4 class="modal-title" id="myModalLabel">تنبيه جديد </h4>
</div>
<div class="modal-body">
<!--form ajou-->
<?= $this->Form->create('Notification',array('action'=>'add')) ?>
  <div class="radio">
  <label>
    <input type="radio" name="data[Notification][Check]" id="noCheck" onclick="javascript:yesnoCheck();" checked>
    أرسل التنبيه لكل الأعضاء
  </label>
          <input type="hidden" name="data[Notification][is_all]" id="NotificationIs_all">

</div>
<div class="radio">
  <label>
    <input type="radio" name="data[Notification][Check]" id="yesCheck" onclick="javascript:yesnoCheck();">
    أرسل التنبيه لعضو محدد
  </label>    
</div>
     <div class="form-group" id="id_user" style="display: none;">
    <label for="exampleInputEmail1">رقم العضو</label>
    <input type="text" name="data[Notification][user_id]" class="form-control" id="" placeholder="رقم العضو">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">رسالة التنبيه</label>
    <textarea class="form-control" name="data[Notification][content]" ></textarea>
  </div>
  
  <button type="submit" class="btn btn-grean">إرسال </button>
  <button type="button" class="btn btn-default" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">إلغاء</span></button>
<?= $this->Form->end() ?>
<!--fin form ajout-->
</div>

</div>
</div>
</div>
<!--fin model remise-->
<!--!--model Activer user-->
<div class="modal fade" id="remise" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
<div class="modal-dialog" role="document">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
<h4 class="modal-title" id="exampleModalLabel"> تخفيض للعضو رقم </h4>
</div>
<div class="modal-body">
<?php echo $this->Form->create('User',array('action'=>'update_reduction')); ?>
    <div class="form-group">
        <input type="number" min="0" name="data[User][reduction]" id="UserReduction" placeholder="نسبة المئوية للتخفيض" class="form-control">
    </div>
    <input type="hidden"  name="data[User][id]" id="UserId">
    <button class="btn btn-grean"> تخفيض</button>
<?php     echo $this->Form->end();?>
</div>
<div class="modal-footer">
</div>
</div>
</div>
</div>
<!--fin modele remise-->
<script>
$('#exampleModal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) 
  var recipient = button.data('whatever') 
  var modal = $(this)
  modal.find('.modal-title').text('شحن للعضو رقم: ' + recipient)
    modal.find('#RechargeUser_id').val(recipient)
});
//*******************************************************************
$('#activer_user').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) 
  var recipient = button.data('whatever') 
  var modal = $(this)
  modal.find('.modal-title').text('تفعيل العضو رقم: ' + recipient)
    modal.find('#UserId').val(recipient)
});
//*******************************************************************
$('#desactiver_user').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) 
  var recipient = button.data('whatever') 
  var modal = $(this)
  modal.find('.modal-title').text('حظر العضو رقم: ' + recipient)
    modal.find('#UserId').val(recipient)
});
//*************************Model notifications**************************
function yesnoCheck() {
    if (document.getElementById('yesCheck').checked) {
        document.getElementById('id_user').style.display = 'block';
    } 
    else{
        document.getElementById('id_user').style.display = 'none';
    }
}
//******************** remise
$('#remise').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) 
  var recipient = button.data('whatever') 
  var modal = $(this)
  modal.find('.modal-title').text('تخفيض للعضو رقم: ' + recipient)
    modal.find('#UserId').val(recipient)
});
</script>