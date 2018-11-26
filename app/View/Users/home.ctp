<?php //debug($LatestOrders);die(); ?>	
	<!--body-->
	<div class="col-md-10 col-xs-12">
		<!--titre-->
		<div class="row">
			<div class="col-md-12">
				<h2>الرئيسية</h2>				
			</div>
			<div class="col-md-12">
				<ol class="breadcrumb">
				  <li><a href="#">الرئسية</a></li>
				  <li class="active">الرئيسية</li>
				</ol>
			</div>
		</div>		
		<!--fin titre-->
		<!-- money-->
		<div class="row">
			
                    <div class="col-md-4 col-sm-4">
                            <div class="money-div">
                                <div class="money-info">
                                    <p><i class="glyphicon glyphicon-usd money-icon"></i></p>
                                    <div class="titre">
                                   <p > 
                                   <?php echo $capitale[0]['User']['capital'];?>
                                       $
                                   </p>
                                    <h4> الرصيد الحالي</h4>
                                    </div>
                                </div>
                                <div class="money-detail money-detail-blue" ><a  href="<?php echo $this->Html->url('/recharges/payments/',true);?>"> الشحنات السابقة</a></div>
                            </div>
			</div>
			<div class="col-md-4 col-sm-4">
                            <div class="money-div">
                                <div class="money-info">
                                    <p><i class="glyphicon glyphicon-tags money-icon"></i></p>
                                    <div class="titre">
                                   <p > 
                                   <?php echo $TicketNoSeen[0][0]['sum_ticket']; ?>
                                   </p>
                                    <h4> تذاكر في إنتظارك</h4>
                                    </div>
                                </div>
                                <div class="money-detail money-detail-green" ><a  href="<?php echo $this->Html->url('/tickets/index',true) ; ?>">جميع التذاكر  </a></div>
                            </div>
			</div>
			<div class="col-md-4 col-sm-4">
                            <div class="money-div">
                                <div class="money-info">
                                    <p><i class="glyphicon glyphicon-shopping-cart money-icon"></i></p>
                                    <div class="titre">
                                   <p > 
                                   <?php echo $order_count; ?>
                                   </p>
                                    <h4> عدد الطلبات</h4>
                                    </div>
                                </div>
                                <div class="money-detail money-detail-maron" ><a  href="<?php echo $this->Html->url('/orders/historic/',true);?>">الطلبات السابقة  </a></div>
                            </div>
			</div>
		</div>
		<!-- fin money-->
		<!--table-->
                <div class="row">
                    <div class="col-md-8">
                        <!-- notif-->
                         <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
			  <div class="panel panel-default">
			    <div class="panel-header-blue" role="tab" id="heading2">
			      <h4 class="panel-title">
			        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse" aria-expanded="true" aria-controls="collapse">
			        	<i class="glyphicon glyphicon-list-alt"></i>
			        	آخر التنبيهات 
			      		<i class="caret"></i>
			        </a>
			      </h4>
			    </div>
			    <div id="collapse" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="heading">
			      <div class="panel-body" style="padding: 0;">
			      	<!--texte-->
			      	<div class="div-margin">
			      	<!-- table-->
			      	<div class="wrapper">
					  <div class="table2 table-bordered">
					    <div class="row-table header">
					      <div class="cell">
					        التنبيه
					      </div>
					      <div class="cell">
					      التاريخ
					      </div>
					        
					    </div>
<?php foreach ($Notifications as $val)
 {
 ?>
    <div class="row-table">
      <div class="cell">
          <?php echo $val['Notification']['content']; ?>
      </div>
      <div class="cell">
         <i class="glyphicon glyphicon-hourglass"></i>
         <?php echo $val['Notification']['created']; ?>
      </div>

    </div>
<?php }   ?>
					  </div>
					  </div>
			      	<!--fin table-->
			      	</div>
			      	<!--fintext-->
			      	
			      </div>
			      </div>
		</div>
		</div>
                        
                        <!--notif FIN-->
                    </div>
                    <div class="col-md-4">
                       <div class="panel-group" id="accordion2" role="tablist" aria-multiselectable="true">
			  <div class="panel panel-default">
			    <div class="panel-header-grean" role="tab" id="heading2">
			      <h4 class="panel-title">
			        <a role="button" data-toggle="collapse" data-parent="#accordion2" href="#collapse2" aria-expanded="true" aria-controls="collapse2">
			        	<i class="glyphicon glyphicon-list-alt"></i>
			        	آخر عمليات الشراء
			      		<i class="caret"></i>
			        </a>
			      </h4>
			    </div>
			    <div id="collapse2" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="heading2">
			      <div class="panel-body padding-none">
			      	<!--texte-->
			      	<div class="div-margin">
			      	<!-- table-->
			      	<div class="wrapper">
					  <div class="table2 table-bordered">
					    <div class="row-table header">
					      <div class="cell">
					        إسم الخدمة
					      </div>
					      <div class="cell">
					      التاريخ
					      </div>
					        
					    </div>
                                <?php foreach ($LatestOrders as $val){
                                 ?>
                                    <div class="row-table">
                                      <div class="cell">
                                        <?php echo $val['Service']['name'];?>
                                      </div>
                                      <div class="cell">
                                         <i class="glyphicon glyphicon-hourglass"></i>
                                         <?php 
                                         $date =new DateTime($val['Order']['created']);
                                         echo date_format($date, 'd/m/Y');
                                         ?>
                                      </div>
                                    </div>
                                <?php }   ?>
					  </div>
					  </div>
			      	<!--fin table-->
			      	</div>
			      	<!--fintext-->
			      	
			      </div>
			      </div>
		</div>
		</div>
                    </div>
                </div>
                
                <!-- fin table-->
		
		
	</div>
	<!--fin body-->
