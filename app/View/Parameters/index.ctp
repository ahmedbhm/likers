        <!--body-->
        <div class="col-md-10 col-xs-12">
                <div class="row">
        <!--titre-->
                <div class="col-md-12">
                        <h2> إدارة عامة</h2>

                </div>
                <div class="col-md-12">
                        <ol class="breadcrumb">
                          <li><a href="#">الرئسية</a></li>
                          <li class="active"> إدارة عامة</li>
                        </ol>
        </div>
        <!--fin titre-->
        <!--parame-->
        <div class="col-md-4">
             <!--panel-->
                        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                  <div class="panel panel-default">
                    <div class="panel-header-blue" role="tab" id="heading">
                      <h4 class="panel-title">
                        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse" aria-expanded="true" aria-controls="collapse">
                                <i class="glyphicon glyphicon-th-list"></i>
                                  إعدادات عامة
                                <i class="caret"></i>
                        </a>
                      </h4>
                    </div>
                    <div id="collapse" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="heading">
                      <div class="panel-body padding-none" >
<!---->
<div class="div-margin-lg">
<?= $this->Form->create('Parameter',array('action'=>'param')); ?>
         <div class="form-group">
           <label for="exampleInputEmail1">الحد الأدنى للشحن</label>
           <input type="number" value="<?= $AllParameters['Parameter']['lowest_amount_charging'] ?>" name="data[Parameter][lowest_amount_charging]" min="0" class="form-control" placeholder="الحد الأدنى للشحن">
         </div>
         <div class="form-group">
         <hr>
         </div>
         <div class="form-group">
           <label for="exampleInputPassword1">أضف</label>
           <input type="number" value="<?= $AllParameters['Parameter']['free_amount'] ?>" name="data[Parameter][free_amount]" class="form-control" id="exampleInputPassword1" placeholder="أضف">
           <label for="exampleInputPassword1">عند شحن</label>
           <input type="number" value="<?= $AllParameters['Parameter']['when_charging'] ?>" name="data[Parameter][when_charging]" class="form-control" id="exampleInput" placeholder="عند شحن">
          </div>
         <div class="form-group">
         <button type="submit" class="btn btn-grean">تحديث</button>
         </div>
<?= $this->Form->end(); ?>
</div>

 <!---->

                      </div>
                    </div>
                  </div>
                </div>
                <!--fin panel-->
                </div>
    
            <!--fin parame-->
                <!--member-->
                <div class="col-md-8">
                        <!--panel-->
                        <div class="panel-group" id="accordion3" role="tablist" aria-multiselectable="true">
                  <div class="panel panel-default">
                    <div class="panel-header-grean" role="tab" id="heading3">
                      <h4 class="panel-title">
                        <a role="button" data-toggle="collapse" data-parent="#accordion3" href="#collapse3" aria-expanded="true" aria-controls="collapse3">
                                <i class="glyphicon glyphicon-th-list"></i>
                                 الإشراف
                                <i class="caret"></i>
                        </a>
                      </h4>
                    </div>
                    <div id="collapse3" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="heading3">
                      <div class="panel-body padding-none" >
                       <!---->

                       <div class="div-margin">
                         <button class="btn btn-default btn-sm" data-toggle="modal" data-target="#myModal">
                                <span class="glyphicon glyphicon-plus"></span>
                                 مشرف جديد
                        </button>
                        <!-- table-->
                        <div class="wrapper">
                                  <div class="table2">
                                    <div class="row-table header">
                                      <div class="cell">
                                        #
                                      </div>
                                      <div class="cell">
                                           إسم المشرف
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
                                       الهاثف
                                      </div>
                                      <div class="cell">
                                       <span class="glyphicon glyphicon-cog"></span>
                                      </div>
                                    </div>
<?php foreach ($AllSupervisor as $val)
{ ?>
    <div class="row-table">
      <div class="cell">
          <?= $val['User']['id'] ?>
      </div>
      <div class="cell">
          <?= $val['User']['Pseudo'] ?>
      </div>
      <div class="cell">
          <?= $val['User']['mail'] ?>
      </div>
      <div class="cell">
          <?= $val['User']['created'] ?>
      </div>
      <div class="cell">
          <?= $val['User']['country'] ?>
      </div>
        <div class="cell">
            <?= $val['User']['tel'] ?>
      </div>
      <div class="cell">
         <a href="#" data-toggle="modal" data-target="#activer_user" data-whatever="<?= $val['User']['id'] ?>">حذف الإشراف</a>                
        </div>
        </div>
<?php } ?>
                                      
                        <!--fin table-->
                        <!---->

                      </div>
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
                </div>
        </div>

 <!-- Modal new superiseur -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
<div class="modal-dialog" role="document">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
<h4 class="modal-title" id="myModalLabel">مشرف جديد</h4>
</div>
<div class="modal-body">
<!--form ajou-->
       <?php echo $this->Form->create('Parameter',array('action' => 'add_supervisor'));?>
<!--pseodo-->

<?php echo $this->Form->input('Pseudo',
                        array(
                        'type' => 'text',
                        'class' => 'form-control',
                        'placeholder' => 'إسم المشرف',
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

<?php     echo $this->Form->end(array('class' => 'btn btn-grean',
                                                'label' => 'أضف المشرف',
                                                'div' => array(
                                                        'class' => 'form-group'
                                                        )
                                                )); 
?>
</div>
</div>
</div>
</div>
<!--fin form ajout-->       
        
        
        
 <!--model suprimer superviseur-->
<div class="modal fade" id="activer_user" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
<div class="modal-dialog" role="document">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
<h4 class="modal-title" id="exampleModalLabel">  </h4>
</div>
<div class="modal-body">
<?php echo $this->Form->create('Parameters',array('action'=>'delet_user')); ?>
    <input type="hidden" name="data[Parameters][id]" id="UserId">
<?php     echo $this->Form->end(array('class' => 'btn btn-grean',
                                                'label' => 'حذف',
                                                'div' => array(
                                                        'class' => 'form-group'
                                                        )
                                                ));?>
</div>
</div>
</div>
</div>
<!--fin modele-->
        <script>
             $('#activer_user').on('show.bs.modal', function (event) {
              var button = $(event.relatedTarget) 
              var recipient = button.data('whatever') 
              var modal = $(this)
              modal.find('.modal-title').text('تفعيل العضو رقم: ' + recipient)
                modal.find('#UserId').val(recipient)
            });
         </script>