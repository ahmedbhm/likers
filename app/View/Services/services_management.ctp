<div class="col-md-10 col-xs-12">
            <div class="row">
    <!--titre-->
            <div class="col-md-12">
                    <h2>إدارة الخدمات  </h2>

            </div>
            <div class="col-md-12">
                    <ol class="breadcrumb">
                      <li><a href="#">الرئسية</a></li>
                      <li class="active"> إدارة الخدمات </li>
                    </ol>
    </div>
    <!--fin titre-->
            <!--last orders-->
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
                  <div class="panel-body padding-none">
                    <!--paramaitre-->
                    <div class="div-margin">
                                    <button class="btn btn-default btn-sm" data-toggle="modal" data-target="#myModal">
                                            <span class="glyphicon glyphicon-plus"></span>
                                              خدمة جديدة
                                    </button>
                    </div>
                    <!--fin paramaitre-->
                    <!-- table-->
                    <div class="div-margin">
                    <div class="wrapper">
                              <div class="table2 table-bordered">
                                <div class="row-table header">
                                  <div class="cell">
                                    #
                                  </div>
                                  <div class="cell">
                                      إسم الخدمة
                                  </div>
                                  <div class="cell">
                                   قسم الخدمة
                                  </div>
                                  <div class="cell">
                                   ثمن 1K

                                  </div>
                                  <div class="cell">
                                    الحد الأدنى - الأعلى
                                  </div>
                                  <div class="cell">
                                   ملاحظة
                                  </div>

                                  <div class="cell">
                                   <span class="glyphicon glyphicon-cog"></span> 
                                   إعدادات
                                  </div>

                                </div>
<?php foreach ($AllServices as $val) {
 ?>
    <div class="row-table">
      <div class="cell">
        <?php echo $val['Service']['id']; ?>
      </div>
      <div class="cell">
        <?php echo $val['Service']['name']; ?>
      </div>
      <div class="cell">
        <?php echo $val['Type']['name']; ?>
      </div>
      <div class="cell">
       <?php echo $val['Service']['price']; ?>
      </div>
      <div class="cell">
       <?php echo $val['Service']['lowest_quantity'].'-'.$val['Service']['largest_quantity']; ?>
      </div>
       <div class="cell">
       <?php echo $val['Service']['description']; ?>
      </div>
      <div class="cell">
<?php if ($val['Service']['active'] == 0)
 { ?>
          <a class="btn btn-sm btn-success" href="#" data-toggle="modal" data-target="#activer_service" data-whatever="<?php echo $val['Service']['id']; ?>"> <i class="glyphicon glyphicon-glyphicon glyphicon-ok"></i> تفعيل
      </a> 
<?php }
else
{ ?>
          <a class="btn btn-sm btn-danger" href="#" data-toggle="modal" data-target="#desactiver_service" data-whatever="<?php echo $val['Service']['id']; ?>"><i class="glyphicon glyphicon-remove"></i> ايقاف</a> 
<?php }?>
          <a class="btn btn-warning btn-sm" href="#"  data-toggle="modal" 
   data-target="#exampleUpdate" 
   data-whatever="<?php echo $val['Service']['id']; ?>" 
   data-name="<?php echo $val['Service']['name']; ?>" 
   data-price="<?php echo $val['Service']['price']; ?>" 
   data-lowest_quantity="<?php echo $val['Service']['lowest_quantity']; ?>" 
   data-largest_quantity="<?php echo $val['Service']['largest_quantity']; ?>" 
   data-description="<?php echo $val['Service']['description']; ?>" 
   data-TypeId="<?php echo $val['Type']['id']; ?>" >
              <i class="glyphicon glyphicon-cog"></i>
 تعديل
</a>

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
            echo $this->Paginator->prev(__('Previous'), array('tag' => 'li'));;
        }
if($this->paginator->hasNext())
    {
        echo $this->paginator->next(__('Next'), array('tag' => 'li'));
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
            <!-- fin last ordsers-->
    </div>
</div>
<!-- Modal new SERVCE -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
<div class="modal-dialog" role="document">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
<h4 class="modal-title" id="myModalLabel">خدمة جديدة</h4>
</div>
<div class="modal-body">
<!--form ajout-->
<?php echo $this->Form->create('Service',array('action' => 'add_service'));?>
<?php echo $this->Form->input('name',
                        array(
                        'type' => 'text',
                        'class' => 'form-control',
                        'placeholder' => 'اسم الخدمة',
                        'label' => array(
                            'class' => '',
                            'text' => ''
                        ),
                        'div' => array(
                                        'class' => 'form-group',
                                       'style' => ''
                                      )
                        ));?>
<div class="form-group">
    <label for="Services" class=" control-label">قسم الخدمة </label>
        <select name="data[Service][type_id]" id="ServiceField" class="form-control">
            <option value="" selected="" disabled>اختر قسم........</option>
          <?php foreach ($ServiceTypes as $val)
          {
              echo '<option value="'.$val['Type']['id'].'">'.$val['Type']['name'].'</option>';
          } ?>
      </select>
</div>
<?php echo $this->Form->input('price',
                        array(
                        'type' => 'number',
                        'class' => 'form-control',
                        'placeholder' => 'الثمن ل 1K',
'step' => 'any',
                        'label' => array(
                            'class' => '',
                            'text' => ''
                        ),
                        'div' => array(
                                        'class' => 'form-group',
                                       'style' => ''
                                      )
                        ));?>
<?php echo $this->Form->input('lowest_quantity',
                        array(
                        'type' => 'text',
                        'class' => 'form-control',
                        'placeholder' => 'الحد الأدنى',
                        'label' => array(
                            'class' => '',
                            'text' => ''
                        ),
                        'div' => array(
                                        'class' => 'form-group',
                                       'style' => ''
                                      )
                        ));?>
<?php echo $this->Form->input('largest_quantity',
                        array(
                        'type' => 'text',
                        'class' => 'form-control',
                        'placeholder' => 'الحد الأعلى',
                        'label' => array(
                            'class' => '',
                            'text' => ''
                        ),
                        'div' => array(
                                        'class' => 'form-group',
                                       'style' => ''
                                      )
                        ));?>
<?php echo $this->Form->input('description',
                        array(
                        'type' => 'text',
                        'class' => 'form-control',
                        'placeholder' => 'ملاحظة',
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
                                                'label' => 'أضف الخدمة',
                                                'div' => array(
                                                        'class' => 'form-group'
                                                        )
                                                )); 
?>
</div>
</div>
</div>
</div>
<!--fin model ajout-->
<!--modele paramaitre-->
<div class="modal fade" id="exampleUpdate" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
<div class="modal-dialog" role="document">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
<h4 class="modal-title" id="exampleModalLabel">رقم الخدمة  </h4>
</div>
<div class="modal-body">
<?php echo $this->Form->create('Service',array('action'=>'update')); ?>
    <div class="form-group">
      <label for="name"> إسم الخدمة</label>
      <input type="text" class="form-control" name="data[Service][name]" id="ServiceName" placeholder="إسم القسم">
      <input type="hidden" name="data[Service][id]" id="ServicesId">
    </div>
<div class="form-group">
    <label for="Services" class=" control-label">قسم الخدمة </label>
        <select name="data[Service][type_id]" id="ServiceType_id" class="form-control">
            <option value="" selected="" disabled>اختر قسم........</option>
          <?php foreach ($ServiceTypes as $val)
          {
              echo '<option value="'.$val['Type']['id'].'">'.$val['Type']['name'].'</option>';
          } ?>
      </select>
</div>
    <div class="form-group">
      <label for="name">  الثمن ل 1K</label>
      <input type="number" class="form-control" name="data[Service][price]" id="ServicePrice" placeholder="الثمن ل 1K">
    </div>
    <div class="form-group">
      <label for="name">الحد الأدنى </label>
      <input type="number" class="form-control" name="data[Service][lowest_quantity]" id="ServiceLowest_quantity" placeholder="الحد الأدنى  ">
    </div>
    <div class="form-group">
      <label for="name">الحد الأعلى</label>
      <input type="number" class="form-control" name="data[Service][largest_quantity]" id="ServiceLargest_quantity" placeholder=" الحد الأعلى">
    </div>
    <div class="form-group">
      <label for="name">ملاحظة</label>
      <textarea placeholder="ملاحظتك" name="data[Service][description]" id="ServiceDescription" class="form-control"></textarea>
    </div>
     <button type="submit" class="btn btn-grean">تحديث</button>
     <button type="button" class="btn btn-default" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">إلغاء</span></button>
<?php echo $this->Form->end(); ?>
</div>
   
</div>
</div>
</div>
<!--fin modele paramaitre-->
<!--modele activer service-->
<div class="modal fade" id="activer_service" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
<div class="modal-dialog" role="document">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
<h4 class="modal-title" id="exampleModalLabel">رقم الخدمة  </h4>
</div>
<div class="modal-body">
<?php echo $this->Form->create('Service',array('action'=>'update_state')); ?>
    <div class="form-group">
    <input type="hidden" name="data[Service][id]" id="ServiceId" >
    <input type="hidden" value="1" name="data[Service][active]" id="ServiceActive" >
    </div
</div>
    <button type="submit" class="btn btn-grean">تفعيل الخدمة</button>
    <button type="button" class="btn btn-default" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">إلغاء</span></button>
<?php echo $this->Form->end(); ?>
</div>
</div>
</div>
</div>
<!--fin modele activer service-->
<!--modele désactiver service-->
<div class="modal fade" id="desactiver_service" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
<div class="modal-dialog" role="document">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
<h4 class="modal-title" id="exampleModalLabel">رقم الخدمة  </h4>
</div>
<div class="modal-body">
<?php echo $this->Form->create('Service',array('action'=>'update_state')); ?>
    <div class="form-group">
    <input type="hidden" name="data[Service][id]" id="ServiceId" >
    <input type="hidden" value="0" name="data[Service][active]" id="ServiceActive" >
    </div
</div>
    <button type="submit" class="btn btn-grean">ايقاف الخدمة</button>
    <button type="button" class="btn btn-default" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">إلغاء</span></button>
<?php echo $this->Form->end(); ?>
</div>
</div>
</div>
</div>
<!--fin modele désactiver service-->

<script>
    $('#exampleUpdate').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) 
        var recipient = button.data('whatever')
        var name = button.data('name')
        var price = button.data('price')
        var lowest_quantity = button.data('lowest_quantity')
        var largest_quantity = button.data('largest_quantity')
        var description = button.data('description')
        var TypeId = button.data('TypeId')
        
        var modal = $(this)
        modal.find('.modal-title').text(' تحديث القسم رقم: ' + recipient)
        modal.find('#ServiceName').val(name)
        modal.find('#ServicePrice').val(price)
        modal.find('#ServiceLowest_quantity').val(lowest_quantity)
        modal.find('#ServiceLargest_quantity').val(largest_quantity)
        modal.find('#ServiceDescription').val(description)
        modal.find('#ServiceType_id').val(TypeId)
        modal.find('#ServicesId').val(recipient)
    });
//******************************************************************************
    $('#activer_service').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) 
        var recipient = button.data('whatever')
        var modal = $(this)
        modal.find('.modal-title').text('تفعيل الخدمة رقم : ' + recipient)
        modal.find('#ServiceId').val(recipient)

    });
//******************************************************************************
    $('#desactiver_service').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) 
        var recipient = button.data('whatever')
        var modal = $(this)
        modal.find('.modal-title').text('ايقاف الخدمة رقم : ' + recipient)
        modal.find('#ServiceId').val(recipient)

    });
</script>