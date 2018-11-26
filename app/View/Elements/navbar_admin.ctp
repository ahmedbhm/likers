<?php $ticket_noSeen = $this->requestAction ('Tickets/ticket_noSeen'); ?>	
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
                  <a href="<?php echo $this->Html->url('/Types/services_categories',true); ?>">
                  	
                  <i class="glyphicon glyphicon-th"></i> إدارة الأقسام
                  </a>
                </li>
                
                
                <li role="presentation" class="li1">
                  <a href="<?php echo $this->Html->url('/Services/services_management',true); ?>">
                  <i class="glyphicon glyphicon-briefcase"></i> إدارة الخدمات
                  </a>
                </li>
                
                <li role="presentation" class="li1">
                  <a href="<?php echo $this->Html->url('/users/members_management',true); ?>">
                  <i class="glyphicon glyphicon-user"></i> إدارة الأعضاء
                  </a>
                </li>
                
                <li role="presentation" class="li1">
                  <a href="<?php echo $this->Html->url('/orders/orders_management',true); ?>">
                  <i class="glyphicon glyphicon-blackboard"></i> إدارة الطلبات
                  </a>
                </li>
                
                <li role="presentation" class="li1">
                  <a href="<?php echo $this->Html->url('/Recharges/rechages_management',true); ?>">
                  <i class="glyphicon glyphicon-shopping-cart"></i> إدارة الارصدة
                  </a>
                </li>
                
                <li role="presentation" class="li1">
                  <a href="<?= $this->Html->url('/Tickets/index_admin/',true); ?>">
                  <i class="glyphicon glyphicon-tags"></i> التذاكر
                  <span class="badge num"><?= $ticket_noSeen ?></span>
                  </a>
                </li>
                
                <li role="presentation" class="li1">
                  <a href="<?php echo $this->Html->url('/Coupons/index',true); ?>">
                  <i class="glyphicon glyphicon-qrcode"></i> الكوبونات
                  </a>
                </li>
                
                <li role="presentation" class="li1">
                  <a href="<?php echo $this->Html->url('/Writings/usage_instructions',true); ?>">
                  <i class="glyphicon glyphicon-list-alt"></i> كيفية الطلب
                  </a>
                </li>
                
                <li role="presentation" class="li1">
                  <a href="<?php echo $this->Html->url('/Writings/frequently_questions',true); ?>">
                  <i class="glyphicon glyphicon-question-sign"></i> صفحة التعليمات
                  </a>
                </li> 
                
                <li role="presentation" class="li1">
                  <a href="<?php echo $this->Html->url('/Parameters/index',true); ?>">
                  <i class="glyphicon glyphicon-cog"></i> اعدادات
                  </a>
                </li>
                
                
            </ul>
		</div>
	</div>
	<!--fin menu-->
