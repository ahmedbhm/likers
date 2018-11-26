	<div class="container-fluid" >
		<div class="row">
			<!--menu-->
		<div class="col-md-2 col-xs-12" style="padding: 0;">
		<div class="menu1">    
            <ul id="menu-content" class="menu-content collapse out">
                
                <li role="presentation" class="li1 active">
                  <a href="<?php echo $this->Html->url('/Users/admin',true); ?>">
                  <i class="glyphicon glyphicon-tasks"></i> إحصائيات عامة
                  </a>
                </li>

                <li role="presentation" class="li1">
                  <a href="<?php echo $this->Html->url('/users/members_management',true); ?>">
                  <i class="glyphicon glyphicon-user"></i> إدارة الأعضاء
                  </a>
                </li>
                
                <li role="presentation" class="li1">
                  <a href="<?php echo $this->Html->url('/orders/orders_management',true); ?>">
                  <i class="glyphicon glyphicon-shopping-cart"></i> إدارة الطلبات
                  </a>
                </li>
                
                <li role="presentation" class="li1">
                  <a href="<?php echo $this->Html->url('/Recharges/rechages_management',true); ?>">
                  <i class="glyphicon glyphicon-shopping-cart"></i> إدارة الارصدة
                  </a>
                </li>
                
                <li role="presentation" class="li1">
                  <a href="<?= $this->Html->url('/Tickets/index_admin/',true); ?>">
                  <i class="glyphicon glyphicon-list-alt"></i> التذاكر
                  </a>
                </li>

                
                <li role="presentation" class="li1">
                  <a href="<?php echo $this->Html->url('/users/profile_suppervisor',true); ?>">
                  <i class="glyphicon glyphicon-question-sign"></i> بروفايل
                  </a>
                </li>
                
            </ul>
		</div>
	</div>
	<!--fin menu-->
