<div class="col-md-10 col-xs-12">
			<div class="row">
		<!--titre-->
			<div class="col-md-12">
				<h2>إدارة الأرصدة </h2>
				
			</div>
			<div class="col-md-12">
				<ol class="breadcrumb">
				  <li><a href="#">الرئسية</a></li>
				  <li class="active"> إدارة الأرصدة </li>
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
			      <div class="panel-body" style="padding: 0;">
<!--paramaitre-->
<div class="div-margin">
                <button class="btn btn-primary btn-sm"  role="button" data-toggle="collapse" href="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                 <span class="glyphicon glyphicon-search"></span>
                        بحث عن عملية
                </button>

</div>
<!--fin paramaitre-->
<!--search-->
<?php echo $this->Form->create('Recharge',array('action'=>'rechages_management',
                                            'id'=>'collapseExample',
                                            'class'=>'collapse form-inline div-margin'))
; ?>
          <div class="form-group">
            <input type="text" class="form-control input-sm" name="data[Recharge][user_id]" id="RechargeUser_id" placeholder="رقم العضو">
          </div>
           <div class="form-group">
            <input type="text" class="form-control input-sm" name="data[Recharge][id]" id="RechargeId" placeholder=" رقم العملية">
          </div>
           <div class="form-group">
            <select class="form-control input-sm" name="data[Recharge][state]" id="RechargeState">
                <option value="" selected>الحالة...</option>
                <option  value="0">في انتضار القبول</option>
                <option  value="1">تم القبول</option>
            </select>
          </div>
           <div class="form-group">
            <select class="form-control input-sm" name="data[Recharge][way_id]" id="RechargeWay_id">
                <option value="" disabled selected> طريقة الشحن</option>
                         <option value="5">ون كارد</option>
                        <option value="4">كوبون</option>
                        <option value="3">بايبال</option>
                        <option value="2">كاشيو</option>
                        <option value="1">الادارة</option>
            </select>
          </div>
           <div class="form-group">
                <input placeholder="بالتاريخ " class="form-control input-sm" type="text" onfocus="(this.type='date')"  name="data[Recharge][created]" id="RechargeCreated"> 
          </div>
<?php     echo $this->Form->end(array('class' => 'btn btn-primary btn-sm',
                                                'label' => 'إبحث',
                                                'div' => array(
                                                        'class' => 'form-group'
                                                        )
                                                ));?>
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
					        رقم العضو
					      </div>
					    <div class="cell">
					        اكمية الشحن
					      </div>
					      <div class="cell">
					        طريقة الشحن
					      </div>
					      <div class="cell">
					        حالة الشحن
					      </div>
                                                <div class="cell">
					        كود الدفع
					      </div>
					      <div class="cell">
					      تاريخ الشحن
					      </div>
					      <div class="cell">
					        <span class="glyphicon glyphicon-cog"></span> 
					      </div>
					        
					    </div>
<?php foreach ($AllRecharges as $val)
    {
 ?>
        <div class="row-table">
          <div class="cell">
              <?php echo $val['Recharge']['id']; ?>
          </div>
          <div class="cell">
              <?php echo $val['Recharge']['user_id']; ?>
          </div>
            <div class="cell" style="direction: ltr;">
              <?php echo $val['Recharge']['amount'].' $'; ?>
          </div>
          <div class="cell">
              <?php echo $val['Way']['name']; ?>
          </div>
          <div class="cell">
              <?php if($val['Recharge']['state']==0)  echo 'في الإنتظار القبول'; 
              elseif ($val['Recharge']['state']==1) echo 'تم القبول'; ?>
             
          </div>
            <div class="cell">
              <?php echo $val['Recharge']['transaction_id']; ?>
          </div>
          <div class="cell">
              <?php
               $date =new DateTime($val['Recharge']['created']);
              echo date_format($date, 'Y/m/d');
              ?>
          </div>
          <div class="cell">
              <?php if ($val['Recharge']['state']==0){ 
                  ?>
              <button class="btn btn-sm btn-danger"   data-toggle="modal" data-target="#exampleModal" data-user_id="<?= $val['Recharge']['user_id']; ?>" data-whatever="<?= $val['Recharge']['id']; ?>"> <span class="glyphicon glyphicon-remove"></span> حدف</button>
              <button class="btn btn-sm btn-success"  data-toggle="modal" data-target="#exampleModal2" data-user_id="<?= $val['Recharge']['user_id']; ?>" data-montant="<?= $val['Recharge']['amount']; ?>" data-whatever2="<?= $val['Recharge']['id']; ?>"> <span class="glyphicon glyphicon-ok"></span> قبول</button>
                 <?php   }?>
              
          </div>
        </div>
<?php } ?>
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
<!--model delete-->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
<div class="modal-dialog" role="document">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
<h4 class="modal-title" id="exampleModalLabel"> حدف العملية رقم</h4>
</div>
<div class="modal-body">
<?php echo $this->Form->create('Recharge',array('action'=>'delete')); ?>
    <input type="hidden" name="data[Recharge][id]" id="RechargeId">
    <input type="hidden" name="data[Recharge][user_id]" id="RechargeUser_id">
     <button class="btn btn-grean">حدف</button>
     <button type="button" class="btn btn-default" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">إلغاء</span></button>
<?php     echo $this->Form->end();?>
</div>
<div class="modal-footer">
</div>
</div>
</div>
</div>
<!--fin  -->
<!--model accepte-->
<div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
<div class="modal-dialog" role="document">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
<h4 class="modal-title2" id="exampleModalLabel2"> قبول العملية رقم</h4>
</div>
<div class="modal-body">
<?php echo $this->Form->create('Recharge',array('action'=>'accept')); ?>
    <div class="form-group">
    <input type="hidden" name="data[Recharge][id]" id="RechargeId">
    <input type="number" min="0" name="data[Recharge][amount]" id="RechargeAmount" class="form-control">
    <input type="hidden"  name="data[Recharge][user_id]" id="RechargeUser_id" >
    </div>
    <div class="form-group">
    <button class="btn btn-grean">قبول</button>
      <button type="button" class="btn btn-default" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">إلغاء</span></button>
</div>
<?php     echo $this->Form->end();?>
</div>
</div>
</div>
</div>
<!--fin  -->
<script>
$('#exampleModal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var recipient = button.data('whatever')
  var user_id = button.data('user_id')// Extract info from data-* attributes
  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  var modal = $(this)
  modal.find('.modal-title').text('حدف العملية رقم: ' + recipient)
    modal.find('#RechargeId').val(recipient)
    modal.find('#RechargeUser_id').val(user_id)
})
$('#exampleModal2').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var recipient2 = button.data('whatever2') // Extract info from data-* attributes
  var mantant = button.data('montant')
  var user_id = button.data('user_id')
  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  var modal = $(this)
  modal.find('.modal-title2').text('قبول العملية رقم: ' + recipient2)
    modal.find('#RechargeId').val(recipient2)
    modal.find('#RechargeAmount').val(mantant)
    modal.find('#RechargeUser_id').val(user_id)
})
</script>