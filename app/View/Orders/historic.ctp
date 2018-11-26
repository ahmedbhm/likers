<!--body-->
<div class=" col-md-10 col-xs-12">

        <!--order-->
        <div class="row">
            
        <!-- type orders-->
                <div class="col-md-12">
                    
                            <!--titre-->
                  <div class="row">
                          <div class="col-md-12">
                              <h2>سجل الطلبات</h2>
                          </div>
                          <div class="col-md-12">
                                  <ol class="breadcrumb">
                                    <li><a href="#">الرئسية</a></li>
                                    <li class="active">سجل الطلبات</li>
                                  </ol>
                          </div>
                  </div>
                  <!--fin titre-->  
                  
                   <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                  <div class="panel panel-default">
                    <div class="panel-header-grean" role="tab" id="heading2">
                      <h4 class="panel-title">
                        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse2" aria-expanded="true" aria-controls="collapse2">
                                <i class="glyphicon glyphicon-search"></i>
                                ملخض الطلبات
                                <i class="caret"></i>
                        </a>
                      </h4>
                    </div>
                    <div id="collapse2" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="heading2">
                      <div class="panel-body" style="padding: 0;">
       <!--paramaitre-->
            <div class="div-margin">
                <button class="btn btn-primary btn-sm"  role="button" data-toggle="collapse" href="#OrderHistoricForm" aria-expanded="false" aria-controls="collapseExample">
                 <span class="glyphicon glyphicon-search"></span>
                       بحث عن طلب
                </button>
                <button class="btn btn-default btn-sm">
                    <span class="glyphicon glyphicon-time"></span>
                    في الإنتظار
                    <?php echo $state1; ?>
                </button>
                <button  class="btn btn-default btn-sm">
                    <span class="glyphicon glyphicon-fire"></span>
                    جاري تنفيدها
                    <?php echo $state5; ?>
                </button>
                <button class="btn btn-default btn-sm">
                    <span class="glyphicon glyphicon-ok"></span>
                    مكتمل
                    <?php echo $state2; ?>
                </button>
                 <button class="btn btn-default btn-sm">
                    <span class="glyphicon glyphicon-ok-sign"></span>
                   مكتمل جزئيا
                    <?php echo $state3; ?>
                </button>
                <button class="btn btn-default btn-sm">
                    <span class="glyphicon glyphicon-remove"></span>
                    ملغي
                    <?php echo $state4; ?>
                </button>
                <button class="btn btn-default btn-sm">
                    <span class="glyphicon glyphicon-shopping-cart"></span>
                    إجمالي الطلبات
                    <?php echo $all; ?>
                </button>
            </div>
<!--search-->
<?php echo $this->Form->create('Order', array('action' => 'historic','class'=>'form-inline div-margin collapse','id'=>'OrderHistoricForm'));?>    

<div class="form-group">
<?php   echo $this->Form->input('id',
       array(
       'type' => 'text',
       'class' => 'form-control input-sm',
       'placeholder' =>'رقم الخدمة',
       'label' => array(
           'class' => '',
           'text' => ''
       )));
?>
</div>

<div class="form-group">
<select class="form-control input-sm" name="data[Order][id_state]" id="RechargeId_state">
     <option value="" selected>الحالة...</option>
     <option  value="1">في الإنتظار</option>
     <option  value="2">مكتمل</option>
     <option  value="3">مكتمل جزئيا</option>
     <option  value="4">ملغي</option>
     <option  value="5">جاري تنفيدها</option>
     <option value="6">رابط خطأ</option>
	  <option value="7">في التعويض</option>
	  <option value="8">في المراجعة</option>
	  <option value="9">الحساب خاص</option>
    </select>
</div>

<div class="form-group">
    <label>إبتداءا من: </label>
    <input class="form-control input-sm" type="date" name="data[Order][created]" placeholder="الطلبات انطلاقا من">
</div>
<button class="btn btn-info btn-sm">بحث</button>
<?php     echo $this->Form->end(); 
?> 
       <!--fin search-->
       <hr />
       <!--detaill-->
       <div class="div-margin">
<div class="wrapper">
    <div class="table2 table-bordered">
        <div class="row-table header">
          <div class="cell">
             <?php echo $this->Paginator->sort('Order.id', '#');?> 
          </div>
          <div class="cell">
            <?php echo $this->Paginator->sort('Service.name', 'الخدمة');?>               
          </div>
          <div class="cell">
              <?php echo $this->Paginator->sort('Order.url', 'الرابط');?>            
          </div>
<div class="cell">
                <?php echo $this->Paginator->sort('State.name', 'العدد البدئي');?>               
          </div>
          <div class="cell">
              <?php echo $this->Paginator->sort('Order.quantity', 'الكمية');?>             
          </div>
<div class="cell">
                <?php echo $this->Paginator->sort('State.name', 'العدد النهائي');?>               
          </div>
            <div class="cell">
                <?php echo $this->Paginator->sort('Order.price', 'الثمن');?>               
          </div>
            <div class="cell">
                <?php echo $this->Paginator->sort('State.name', 'الحالة');?>               
          </div>
          <div class="cell">
            <?php echo $this->Paginator->sort('Order.created', 'التاريخ');?>              
          </div>
        </div>
<?php foreach ($order_service as $val)
        { ?>
            <div class="row-table">
              <div class="cell">
                  <?php echo $val['Order']['id']; ?>
              </div>
              <div class="cell">
                <?php echo $val['Service']['name']; ?>
              </div>
              <div class="cell">
                <?php echo str_replace(',','<br/>',$val['Order']['url']); ?>
              </div>
              <div class="cell">
                <?php echo $val['Order']['initial_number']; ?>
              </div>
              <div class="cell">
                <?php echo $val['Order']['quantity']; ?>
              </div>
              <div class="cell">
                <?php echo $val['Order']['final_number']; ?>
              </div>
              <div class="cell">
                  <?php echo  number_format($val['Order']['price'], 3).'$'; ?>
              </div>
              <div class="cell">
                  <?php echo $val['State']['name']; ?>
              </div>
              <div class="cell">
                <i class="glyphicon glyphicon-hourglass"></i>
                <?php 
                $date =new DateTime($val['Order']['created']); 
                echo date_format($date, 'd/m/Y');
                ?>
              </div>
            </div>
<?php   } ?>
    </div>
</div>
</div>
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
                        <!--fin detail-->
                      </div>
                    </div>
                  </div>
                </div>
                </div>
                <!-- fin type orders-->
        <!-- type orders-->
      
        <!--fin row-->	
</div>
<!-- fin body-->
</div>