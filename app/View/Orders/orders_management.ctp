<div class="col-md-10 col-xs-12">
    <div class="row">
<!--titre-->
    <div class="col-md-12">
            <h2>إدارة الطلبات </h2>
    </div>
    <div class="col-md-12">
            <ol class="breadcrumb">
              <li><a href="#">الرئسية</a></li>
              <li class="active"> إدارة الطلبات </li>
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
			        	  الطلبات الحالية
			      		<i class="caret"></i>
			        </a>
			      </h4>
			    </div>
			    <div id="collapse3" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="heading3">
			      <div class="panel-body padding-none">
			      	<!--parametre -->
			      	<div class="div-margin">
			   			<button class="btn btn-primary btn-sm"  role="button" data-toggle="collapse" href="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
			  			 <span class="glyphicon glyphicon-search"></span>
			  			 	إبحث عن طلب
			   			</button>
			   		</div>
			   		<!--fin paramaitre-->
			      	<!--search-->
<?php echo $this->Form->create('Order',array('action'=>'orders_management','class'=>'form-inline div-margin collapse','id'=>'collapseExample')); ?>
    <div class="form-group">
        <input type="number" class="form-control input-sm" name="data[Order][id]" placeholder="رقم الطلب">
    </div>
     <div class="form-group">
         <input type="number" class="form-control input-sm" name="data[Order][id_user]" placeholder="رقم العضو">
    </div>
     <div class="form-group">
      <input type="text" class="form-control input-sm" name="data[Order][price]" placeholder="الثمن">
    </div>
    <div class="form-group">
      <input type="text" class="form-control input-sm" name="data[Order][url]" placeholder="الرابط">
    </div>
    <div class="form-group">
        <input placeholder="تاريخ ابتدءا من ..." class="form-control input-sm" type="text" onfocus="(this.type='date')"  name="data[Order][created]" > 
    </div>
    <div class="form-group">
      <select class="form-control input-sm" name="data[Order][id_state]">
          <option value="" selected disabled>الحالة....</option>
          <option value="1">في الإنتظار</option>
          <option value="2">مكتمل</option>
          <option value="3">مكتمل جزئيا</option>
          <option value="4">ملغي</option>
          <option value="5">جاري تنفيدها</option>
          <option value="6">رابط خطأ</option>
          <option value="7">في التعويض</option>
          <option value="8">في المراجعة</option>
          <option value="9">الحساب خاص</option>
      </select>
    </div>
    <button type="submit" class="btn btn-primary btn-sm">إبحث</button>
<?php echo $this->Form->end();?>
    <!--fin search-->
			      	
<!-- table-->
<div class="div-margin">
<div class="wrapper">
<div class="table-responsive">
          <div class="table2 table-bordered">
            <div class="row-table header">
              <div class="cell">
                #
              </div>
              <div class="cell">
                 رقم العضو
              </div>
                <div class="cell">
                 اسم العضو
              </div>
              <div class="cell">
                 رابط الطلب
              </div>
                <div class="cell">
                 تاريخ
              </div>

              <div class="cell">
               العدد البدئي
              </div>
              <div class="cell">
               العدد المطلوب
              </div>
              <div class="cell">
               العدد النهائي
              </div>
             <div class="cell">
               الثمن
              </div>
              <div class="cell">
              حالة الطلب
              </div>
              <div class="cell">
              <span class="glyphicon glyphicon-cog"> </span>
              </div>   
            </div>
<?php
$i=0;
foreach ($AllOrders as $val) {
 ?>
    <div class="row-table">
      <div class="cell">
        <?php echo $AllOrders[$i]['Order']['id'];?>
      </div>
      <div class="cell">
         <?php echo $AllOrders[$i]['Order']['id_user'];?>
      </div>
        <div class="cell">
         <?php echo $AllOrders[$i]['User']['Pseudo'];?>
      </div>
       <div class="cell">
         <?php echo str_replace(',','<br/>',$AllOrders[$i]['Order']['url']);?>
      </div>
      <div class="cell">
         <?php $date =new DateTime($AllOrders[$i]['Order']['created']);
              echo date_format($date, 'Y/m/d');?>
      </div>
      <div class="cell">
        <?php echo $AllOrders[$i]['Order']['initial_number'];?>
      </div>
      <div class="cell">
       <?php echo $AllOrders[$i]['Order']['quantity'];?>
      </div>
         <div class="cell">
       <?php echo $AllOrders[$i]['Order']['final_number'];?>
      </div>
      <div class="cell">
       <?php echo number_format($AllOrders[$i]['Order']['price'],2).'$';?>
      </div>
      <div class="cell">
       <?php echo $AllOrders[$i]['State']['name'];?>
      </div>
      <div class="cell">
          <?php if ( $AllOrders[$i]['Order']['id_state']!=4)
           { ?>  
          <a class="btn btn-sm btn-danger" href="#" data-toggle="modal" data-target="#exampleModal2" data-user="<?php echo $AllOrders[$i]['Order']['id_user']; ?>" data-whatever="<?php echo $AllOrders[$i]['Order']['id']; ?>"> 	<i class="glyphicon glyphicon-remove"></i> </a>
       <a class="btn btn-sm btn-info" href="#"  data-toggle="modal" data-target="#exampleModal"  data-id_state="<?php echo $AllOrders[$i]['Order']['id_state']; ?>" data-final_number="<?php echo $AllOrders[$i]['Order']['quantity']; ?>"  data-initial_number="<?php echo $AllOrders[$i]['Order']['initial_number']; ?>"  data-whatever="<?php echo $AllOrders[$i]['Order']['id']; ?>"> 	<i class="glyphicon glyphicon-cog"></i> 
       </a>
<?php } ?>
      </div>
    </div>
<?php
    $i++;}
?>
        </div>
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
			<!-- fin last ordsers-->
		</div>
		</div>
		<!--fin body-->
		
		
		</div>
	</div>
			<!--footer-->
		<div class="col-md-12">
			<p style="text-align: center;">جميع الحقوق محفوظة لشركة إسم الشركة</p>
		</div>	
	<!-- fin footer-->
	<!--model  (تعديل)-->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">تحديد حالة الطلب</h4>
      </div>
      <div class="modal-body">
<?php echo $this->Form->create('Order',array('action'=>'update_state'));?>          
<div class="form-group">
    <label for="message-text" class="control-label">حالة الطلب</label>
    <select class="form-control input-sm" name="data[Order][id_state]" id="RechargeId_state">
        <option  value="1" >في الإنتظار</option>
        <option  value="2">مكتمل</option>
        <option  value="3">مكتمل جزئيا</option>
        <option  value="5">جاري تنفيدها</option>
        <option value="6">رابط خطأ</option>
          <option value="7">في التعويض</option>
          <option value="8">في المراجعة</option>
          <option value="9">الحساب خاص</option>
    </select>
</div>
          <div class="form-group">
              <label>العدد الحالي</label>
            <input type="hidden"  class="form-control" id="OrderId"name="data[Order][id]" >
            <input type="number" min="0" class="form-control" id="OrderInitial_number"name="data[Order][initial_number]" >
          </div>
            <input type="hidden" min="0"  class="form-control" id="OrderFinal_number"name="data[Order][quantity]" >

                  <button class="btn btn-grean">تحديث</button>
                  <button type="button" class="btn btn-default" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">إلغاء</span></button>
<?php echo $this->Form->end();?> 
      </div>
      <div class="modal-footer">
       
      </div>
    </div>
  </div>
</div>
<!--fin modele -->
	<!--model الغاء-->
<div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">تحديد حالة الطلب</h4>
      </div>
      <div class="modal-body">
<?php echo $this->Form->create('Order',array('action'=>'cancel'));?>          
          <div class="form-group">
            <input type="hidden"  class="form-control" id="OrderId"name="data[Order][id]" >
            <input type="hidden"  class="form-control" id="OrderId_user"name="data[Order][id_user]" >
          </div>
                  <button class="btn btn-grean">إلغاء الطلب</button>
                  <button type="button" class="btn btn-default" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">إلغاء</span></button>
<?php echo $this->Form->end();?> 
      </div>
      <div class="modal-footer">
       
      </div>
    </div>
  </div>
</div>
<!--fin modele -->
<script>
$('#exampleModal').on('show.bs.modal', function (event) {
  	  var button = $(event.relatedTarget) // Button that triggered the modal
	  var recipient = button.data('whatever') // Extract info from data-* attributes
          var initial_number = button.data('initial_number') 
          var final_number = button.data('final_number')
          var id_state = button.data('id_state')
	  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
	  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
	  var modal = $(this)
	  modal.find('.modal-title').text('تعديل الطلب رقم: ' + recipient)
	  modal.find('#OrderId').val(recipient)
          modal.find('#OrderFinal_number').val(final_number)
	  modal.find('#OrderInitial_number').val(initial_number)
          modal.find('#RechargeId_state').val(id_state)
});
//************************************************************
$('#exampleModal2').on('show.bs.modal', function (event) {
  	  var button = $(event.relatedTarget) // Button that triggered the modal
	  var recipient = button.data('whatever') // Extract info from data-* attributes
          var id_user = button.data('user')
	  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
	  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
	  var modal = $(this)
	  modal.find('.modal-title').text('الغاء الطلب رقم: ' + recipient)
	  modal.find('#OrderId').val(recipient)
          modal.find('#OrderId_user').val(id_user)
});
</script>