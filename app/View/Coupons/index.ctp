<!--body-->
	<div class=" col-md-10 col-xs-12">
            <div class="row">
	<!--titre-->
			<div class="col-md-12">
				<h2>الكوبونات</h2>
			</div>
                            <div class="col-md-8 col-xs-12">
				<ol class="breadcrumb">
				  <li><a href="#">الرئسية</a></li>
				  <li class="active">الكوبونات</li>
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
			        	الكوبونات
			      		<i class="caret"></i>
			        </a>
			      </h4>
			    </div>
			    <div id="collapse2" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="heading2">
			      <div class="panel-body padding-none">
			       <div class="div-margin">
<?= $this->Form->create('Ticket',array('action'=>'index','class'=>'form-inline')); ?> 
     <div class="form-group"> 
    <a class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal"><i class="glyphicon glyphicon-plus"></i> كوبون جديدة</a>
     </div>
<?= $this->Form->end(); ?>
<div class="wrapper">
    <div class="table2 table-bordered">
        <div class="row-table header">
          <div class="cell">
             رقم الكوبون 
          </div>
          <div class="cell">
              كود كوبون
          </div>
          <div class="cell">
              قيمة الكوبون
          </div>
           
            
        </div>
<?php foreach ($AllCoupon as $val)
{ ?>
            <div class="row-table">
              <div class="cell">
                  <?= $val['Coupon']['id']; ?>
              </div>

              <div class="cell">
                  <?= $val['Coupon']['code']; ?>
              </div>
              <div class="cell">
                  <?= $val['Coupon']['price']; ?>
              </div>
            </div>
<?php } ?>
    </div>
</div>
</div>
<!--pag-->
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
<h4 class="modal-title" id="myModalLabel">كوبون جديدة</h4>
</div>
<div class="modal-body">
<!--form ajou-->
       <?php echo $this->Form->create('Coupon',array('action' => 'add'));?>
<div class="form-group">
</div>
<div class="form-group">
 <div class="input-group">
     <input type="text" name="data[Coupon][code]" class="form-control" placeholder="كود الكوبون" id="CouponCode" style="border-radius: 0;" >
<div class="input-group-addon"  onclick="makeid()">
    <i class="glyphicon glyphicon-refresh"></i>
</div>
</div>
</div>
<div class="form-group">
    <input type="number" name="data[Coupon][price]" min="1" class="form-control" placeholder="قيمة الكوبون" id="CouponPrice" style="border-radius: 0;" >
</div>

<?php     echo $this->Form->end(array('class' => 'btn btn-grean',
                                                'label' => 'توليد الكوبون',
                                                'div' => array(
                                                        'class' => 'form-group'
                                                        )
                                                )); 
?>
<!--fin form ajout-->
</div>
</div>
</div>
</div>
<!--fin model-->