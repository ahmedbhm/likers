<?php $count = $this->requestAction ('Notifications/count_notif'); ?>
    <div class="container-fluid" style="min-height:80px;z-index:9995;">
<div class="header-nav navbar navbar-fixed-top" >
        <div class="row">
    <div class="col-md-1 col-xs-1 col-sm-1">
        <span  class=" toggle-btn" data-toggle="collapse" data-target="#menu-content"><a class="a-head" href="#">☰</a></span>
    </div>
        <div class="col-md-3 col-xs-1 col-sm-4">
             <?php echo $this->Html->image('logo.jpg', array('alt' => 'logo','class'=>'logo  hidden-xs'));?>
        </div>
        <div class="col-md-8 col-xs-10 col-sm-6" style="text-align: left; float: left;">      
            <a  href="<?= $this->Html->url('/Notifications/index/',true); ?>" class="btn btn-grean message" > 
                تنبيهات 
                <span class="badge num"><?= $count ?></span>
            </a>
                <ul class=" btn-nav btn btn-grean" style="text-align: right;">
                <li class="dropdown">
                  <a href="#" style="color: #FFF;" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                       <?php echo $this->Session->read('Auth.User.Pseudo'); ?> <span class="caret"></span>
                  </a>
                  <ul class="dropdown-menu">
                    <li><a href="<?php echo $this->Html->url('/users/profile_user',true); ?>">حسابي</a></li>
                    <li role="separator" class="divider"></li>
                 <?php   if ($this->Session->read('Auth.User.id'))
                    {
                        echo '<li>'.$this->Html->link('خروج',array('controller'=>'users', 'action'=> 'logout')).'<li>';
                    }?>
                  </ul>
                </li>
            </ul>

        </div>
        </div>
    </div>
</div>
