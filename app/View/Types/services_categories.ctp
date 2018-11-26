
<div class="col-md-10 col-xs-12">
        <div class="row">
<!--titre-->
        <div class="col-md-12">
                <h2>إدارة الأقسام </h2>

        </div>
        <div class="col-md-12">
                <ol class="breadcrumb">
                  <li><a href="#">الرئسية</a></li>
                  <li class="active"> إدارة الأقسام</li>
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
                         الأقسام الحالية
                        <i class="caret"></i>
                </a>
              </h4>
            </div>
            <div id="collapse3" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="heading3">
              <div class="panel-body padding-sm">
                <!--paramaitre-->
                <div class="div-margin">
                                <button class="btn btn-default btn-sm" data-toggle="modal" data-target="#myModal">
                                        <span class="glyphicon glyphicon-plus"></span>
                                         قسم جديد
                                </button>
                </div>
                <!--fin paramaitre-->
                <!-- table-->
                <div class="wrapper">
                          <div class="table2 table-bordered">
                            <div class="row-table header">
                              <div class="cell">
                                #
                              </div>
                              <div class="cell">
                                 إسم القسم
                              </div>
                              <div class="cell">
                                تاريخ إضافة القسم
                              </div>
                                <div class="cell">
                               <span class="glyphicon glyphicon-cog"></span> 
                               إعدادات
                              </div> 
                           </div>
<?php foreach ($AllTypes as $val)
    {
?>
    <div class="row-table">
       <div class="cell">
         <?php echo $val['Type']['id'];?>
       </div>
       <div class="cell">
         <?php echo $val['Type']['name'];?> 
       </div>
       <div class="cell">
        <?php $date =new DateTime($val['Type']['created']);
              echo date_format($date, 'Y/m/d');?>
       </div>
        <div class="cell">
             <?php if($val['Type']['active']== 1){ ?>
            <a class="btn btn-danger btn-sm" href="#" data-toggle="modal" 
                     data-target="#exampleModal_desactiver" 
                     data-activeid="<?php echo $val['Type']['id'] ;?>"> <i class="glyphicon glyphicon-remove"></i> توقيف القسم
                  </a>
             <?php } if($val['Type']['active']== 0){ ?> 
            <a class="btn btn-sm btn-success" href="#" data-toggle="modal" 
                      data-target="#exampleModal_activer" 
                      data-activeid2="<?php echo $val['Type']['id']; ?>"> <i class="glyphicon glyphicon-ok"></i> تفعيل القسم
                   </a>
             <?php } ?>
       </div>
     </div>
<?php }?>                              
                          </div>
                          </div>
                <!--fin table-->
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
<!-- Modal new catégorie -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
<div class="modal-dialog" role="document">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
<h4 class="modal-title" id="myModalLabel">قسم جديد</h4>
</div>
<div class="modal-body">
<!--form ajou-->
<?php echo $this->Form->create('Type',array('action'=>'add','type' => 'file')) ;?>
                  <div class="form-group">
                    <label for="name">إسم القسم</label>
                    <input type="text" class="form-control" name="data[Type][name]" id="name" placeholder="إسم القسم">
                  </div>
                  <div class="form-group">
<?php echo $this->Form->input('url_icon_file',array('label'=>'إقونة القسم','type'=>'file')) ;?>
                    <p class="help-block">الإقونة لا يجب أن تتعدى 32*32 px</p>
                  </div>

<!--fin form ajout-->
</div>
<div class="modal-footer">
    <button type="submit" class="btn btn-grean">أضف القسم</button>
<?php echo $this->Form->end() ; ?>
</div>
</div>
</div>
</div>
<!--fin model الغاء-->
	<!--model ايقاف القسم-->
<div class="modal fade" id="exampleModal_desactiver" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">ايقاف القسم</h4>
      </div>
      <div class="modal-body">
<?php echo $this->Form->create('Type',array('action'=>'update_state'));?>          
          <div class="form-group">
            <input type="hidden"  class="form-control" id="TypeId"name="data[Type][id]" >
            <input type="hidden"  value="0" class="form-control" id="Typeactive"name="data[Type][active]" >
          </div>
                  <button class="btn btn-grean">ايقاف</button>
                  <button type="button" class="btn btn-default" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">إلغاء</span></button>

<?php echo $this->Form->end();?> 
      </div>
      <div class="modal-footer">
       
      </div>
    </div>
  </div>
</div>
<!--fin modele -->
	<!--model تفعيل القسم-->
<div class="modal fade" id="exampleModal_activer" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">تفعيل القسم</h4>
      </div>
      <div class="modal-body">
<?php echo $this->Form->create('Type',array('action'=>'update_state'));?>          
          <div class="form-group">
            <input type="hidden"  class="form-control" id="TypeId"name="data[Type][id]" >
            <input type="hidden"  value="1" class="form-control" id="TypeActive"name="data[Type][active]" >
          </div>
          <button type="submit" class="btn btn-grean">تفعيل</button>
          <button type="button" class="btn btn-default" data-dismiss="modal" aria-label="Close">  إلغاء</button>
<?php echo $this->Form->end();?> 
      </div>
    </div>
  </div>
</div>
<!--fin modele -->
<script>
$('#exampleModal_desactiver').on('show.bs.modal', function (event) {
  	  var button = $(event.relatedTarget) // Button that triggered the modal
	  var TypeId = button.data('activeid') // Extract info from data-* attributes
	  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
	  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
	  var modal = $(this)
	  modal.find('.modal-title').text('ايقاف القسم رقم: ' + TypeId)
	  modal.find('#TypeId').val(TypeId)
});
//************************************************************************************************
$('#exampleModal_activer').on('show.bs.modal', function (event) {
  	  var button = $(event.relatedTarget) // Button that triggered the modal
	  var TypeId = button.data('activeid2') 
	  var modal = $(this)
	  modal.find('.modal-title').text('تفعيل القسم رقم: ' + TypeId)
	  modal.find('#TypeId').val(TypeId)
});
</script>