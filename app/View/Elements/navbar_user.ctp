<!--menu-->
<?php $ServicesCategory = $this->requestAction ('Users/navbar_types'); 
$ticket_noSeen = $this->requestAction ('Tickets/ticket_noSeenU');?>
<div class="col-md-2 col-xs-12" style="padding: 0;">
    <div class="menu1">    
        <ul id="menu-content" class="menu-content collapse out">
            <li role="presentation" class="li1 active">
               <?php echo '<a href="'.$this->Html->url('/users/home/',true).'">'; ?>
              <i class="glyphicon glyphicon-home"></i> الرئيسية
              </a>
            </li>

            <li  data-toggle="collapse" data-target="#products" class="li1">
              <a href="#"><i class="glyphicon glyphicon-shopping-cart"></i> طلب جديد
                     <i class="caret"></i><span class="arrow"></span></a>
            </li>
            <ul class=" collapse" id="products">
                <?php if ($ServicesCategory) 
                    { $i=0;
                        foreach ($ServicesCategory as $val) 
                            {
                                $titre = '/Orders/index/'.$ServicesCategory[$i]['Type']['id']; 
                                echo '<li class="active li2">'
                                            . '<a href="'.$this->Html->url($titre,true).'">'
                                                    . '<i>'.$this->Html->image('types_icon/'.$ServicesCategory[$i]['Type']['url_icon']).'</i>'.$ServicesCategory[$i]['Type']['name']
                                            . '</a>'
                                    . '</li>';
                                $i++;
                            } //fin foreach
                    }//fin if 
                ?> 
            </ul>
            <li role="presentation" class="li1">
              <?php echo '<a href="'.$this->Html->url('/orders/historic/',true).'">'; ?>
                <i class="glyphicon glyphicon-blackboard"></i> سجل الطلبات
              </a>
            </li>
            <li role="presentation" class="li1">           
             <?php echo '<a href="'.$this->Html->url('/recharges/balance/',true).'">'; ?>
                    <i class="glyphicon glyphicon-piggy-bank"></i> الرصيد
                </a>
            </li>
                
                <li role="presentation" class="li1">
                <?php echo '<a href="'.$this->Html->url('/recharges/payments/',true).'">'; ?>
                  <i class="glyphicon glyphicon-indent-left"></i> كشف الحساب
                  </a>
                </li>
                
                <li role="presentation" class="li1">
                    <a href="<?= $this->Html->url('/Tickets/index/',true); ?>">
                  <i class="glyphicon glyphicon-tags"></i> تذاكر 
                  <span class="badge num"><?= $ticket_noSeen ?></span>
                  </a>
                </li>
                
                <li role="presentation" class="li1">
                  <a href="<?= $this->Html->url('/Notifications/index/',true); ?>">
                  <i class="glyphicon glyphicon-bell"></i> التنبيهات 
                  </a>
                </li>
                
                <li role="presentation" class="li1">
                <?php echo '<a href="'.$this->Html->url('/users/prices/',true).'">'; ?>
                  <i class="glyphicon glyphicon-euro"></i> الأسعار
                  </a>
                </li>
                
                <li role="presentation" class="li1">
                  <?php echo '<a href="'.$this->Html->url('/writings/view_i/',true).'">'; ?>
                  <i class="glyphicon glyphicon-info-sign"></i> كيفية الطلب
                  </a>
                </li>
                
                <li role="presentation" class="li1">
                    <a href="<?php echo $this->Html->url('/writings/view_q/',true);?>">
                  <i class="glyphicon glyphicon-question-sign"></i> صفحة التعليمات
                  </a>
                </li>
            
                
            </ul>
		</div>
	</div>
	<!--fin menu-->