<div class=" col-md-10 col-xs-12">
	<!--titre-->
		<div class="row">
			<div class="col-md-12">
				<h2>كشف الحساب</h2>
				
			</div>
			<div class="col-md-10">
				<ol class="breadcrumb">
				  <li><a href="#">الرئسية</a></li>
				  <li class="active">كشف الحساب</li>
				</ol>
			</div>
                    <div class="col-md-2" style="text-align: left;">
                            <button type="button" class="btn btn-primary"> الرصيد <span class="badge num"> <?php echo $capitale[0]['User']['capital'];?>$</span></button>
			</div>
		<!--fin titre-->
		
		<!--payment-->
		<div class="col-md-12">
		<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
			  <div class="panel panel-default">
			    <div class="panel-header-grean" role="tab" id="heading2">
			      <h4 class="panel-title">
			        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse2" aria-expanded="true" aria-controls="collapse2">
			        	<i class="glyphicon glyphicon-search"></i>
			        	ملخص الشحن 
			      		<i class="caret"></i>
			        </a>
			      </h4>
			    </div>
			    <div id="collapse2" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="heading2">
			      <div class="panel-body padding-none">
<!--search-->
<?php echo $this->Form->create('Recharge',array('action'=>'payments','class'=>'form-inline search-order-us')); ?>    
        <div class="form-group">
            <input class="form-control input-sm" type="search" name="data[Recharge][id]" id="RechargeId" placeholder="رقم العملية"/>
        </div>
        <div class="form-group">
                <select name="data[Recharge][way_id]" id="RechargeWay_id" class="form-control input-sm">
                        <option value="" disabled selected> طريقة الشحن</option>
                         <option value="5">ون كارد</option>
                        <option value="4">كوبون</option>
                        <option value="3">بايبال</option>
                        <option value="2">كاشيو</option>
                        <option value="1">الادارة</option>
                </select>
        </div>
        <div class="form-group">
                <select name="data[Recharge][state]" id="RechargeState" class="form-control input-sm">
                        <option value="" disabled selected>  الحالة</option>
                        <option value="00">في الانتظار</option>
                        <option value="1">مقبول</option>
                </select>
        </div>
<!--        <div class="form-group">
                <input class="form-control" type="text" placeholder="dd/mm/yyyy" onfocus="(this.type='date')"/>
        </div>-->
        <div class="form-group">
            <button class="btn btn-info btn-sm"> <span class="glyphicon glyphicon-search"></span> إبحث </button>
<?php echo $this->Form->end();?> 
        </div>

<!--fin search-->
			      	<!--table-->
			      		<!--detaill-->
                                <div class="div-margin">
			      	<div class="wrapper">
					  <div class="table2 table-bordered">
					    <div class="row-table header">
					      <div class="cell">
					        #
					      </div>

					      <div class="cell">
					        طريقة الشحن
					      </div>
                                                <div class="cell">
					        كود الدفع
					      </div>
					      <div class="cell">
					        الرصيد المشحون
					      </div>
					      <div class="cell">
					        الحالة
					      </div>
					      <div class="cell">
					        التاريخ
					      </div>
					    </div>
<?php foreach ($AllRecharges as $val){
?>					
    <div class="row-table">
    <div class="cell">
        <?php echo $val['Recharge']['id']; ?>
     </div>
      
      <div class="cell">
        <?php echo $val['Way']['name']; ?>
      </div>
        <div class="cell">
        <?php echo $val['Recharge']['transaction_id']; ?>
      </div>
      <div class="cell">
        <?php echo $val['Recharge']['amount']; ?>
      </div>
    <div class="cell">
        <?php if($val['Recharge']['state']==0) echo 'في انتظار القبول';
            if($val['Recharge']['state']==1) echo 'تم القبول';
        ?>
      </div>
      <div class="cell">
        <i class="glyphicon glyphicon-hourglass"></i>
        <?php $date =new DateTime($val['Recharge']['created']);
              echo date_format($date, 'Y/m/d');
        ?>
      </div>
    </div>
<?php  }?>                                              
					  </div>
					  </div>
                                          </div>
<!--pagination-->
<nav>
        <ul class="pager">
<?php       
    if($this->paginator->hasPrev())
        {
            echo $this->Paginator->prev(__('السابق'), array('tag' => 'li'));
        }
    else
        {
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
			      	<!--fin detail-->
			      	<!--fintable-->
			      </div>
			      </div>
	</div>
	</div>
                </div>
		<!--fin payment-->
		
	</div>
		<!--fin body-->	
       </div>