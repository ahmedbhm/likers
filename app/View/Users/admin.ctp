<!--body-->
<div class="col-md-10 col-xs-12">
                <div class="row">
        <!--titre-->
        <div class="col-md-12">
                <h2>إحصائيات عامة</h2>

        </div>
        <div class="col-md-12">
                <ol class="breadcrumb">
                  <li><a href="#">الرئسية</a></li>
                  <li class="active">إحصائيات عامة</li>
                </ol>
        </div>
        <!--fin titre-->
        <!--body-->
        <div class="col-md-8">
                <div class="row">

                <!--statique new money-->
                        <div class="col-md-6">
                        <!--panel-->
                        <div class="panel-group" id="accordion1" role="tablist" aria-multiselectable="true">
                  <div class="panel panel-default">
                    <div class="panel-header-blue" role="tab" id="heading1">
                      <h4 class="panel-title">
                        <a role="button" data-toggle="collapse" data-parent="#accordion1" href="#collapse1" aria-expanded="true" aria-controls="collapse1">
                                <i class="glyphicon glyphicon-credit-card"></i>
                                إحصائيات مالية
                                <i class="caret"></i>
                        </a>
                      </h4>
                    </div>
                    <div id="collapse1" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="heading1">
                      <div class="panel-body padding-none">
                        <!-- -->
    <div class="div-margin">
    <ul class="list-group">
              <li class="list-group-item">
                  <span class="badge"><?php echo $OrdersCount; ?></span>
                العدد الكلي للخدمات
              </li>
              <li class="list-group-item">
                  <span class="badge"><?php echo ' $ '.number_format($sum_amount[0][0]['total_sum'],4);?></span>
                اجمالي المبالغ المشحونة
              </li>
               <li class="list-group-item">
                <span class="badge"><?php echo ' $ '.number_format($sum_prices[0][0]['total_sum'],4);?></span>
                إجمالي الأرصدة المنفقة
              </li>
              <li class="list-group-item">
                <span class="badge"><?php echo ' $ '.number_format($sum_capital[0][0]['total_sum'],4);?></span>
                اجمالي الارصدة الحالية
              </li>
              <li class="list-group-item">
                  <span class="badge"><?php if($sum_Recharge_today[0][0]['total_sume']) echo ' $ '.$sum_Recharge_today[0][0]['total_sume'];
                  else echo '0';?></span>
                المبلغ الذي تم شحنه اليوم
              </li>
              <li class="list-group-item">
                <span class="badge"><?php if($sum_Recharge_Yesterday[0][0]['total_sum']) echo ' $ '.$sum_Recharge_Yesterday[0][0]['total_sum'];
                else echo '0' ?></span>
                المبلغ الذي تم شحنه البارحة
              </li>
              <li class="list-group-item">
                <span class="badge"><?php echo ' $ '.$sum_Recharge_week_ago[0][0]['total_sum'];?></span>
                المبلغ الذي تم شحنه منذ اسبوع 
              </li>
              <li class="list-group-item">
                <span class="badge"><?php echo ' $ '.$sum_Recharge_month_ago[0][0]['total_sum'];?></span>
                المبلغ الذي تم شحنه منذ شهر 
              </li>
              <li class="list-group-item">
                <span class="badge"><?php echo ' $ '.$sum_Recharge_year_ago[0][0]['total_sum'];?></span>
                المبلغ الذي تم شحنه منذ سنة 
              </li>
            </ul>
<!--                        <a class="btn btn-warning btn-sm" href="#"><span class="glyphicon glyphicon-stats"></span> تفاصيل المبالغ المشحونة</a>-->
  </div>
                        <!---->

                      </div>
                    </div>
                  </div>
                </div>
                <!--fin panel-->
                </div>
                <!--fin new money-->
                <!--new member-->
                        <div class="col-md-6">
                        <!--panel-->
                       <div class="panel-group" id="accordion2" role="tablist" aria-multiselectable="true">
                  <div class="panel panel-default">
                    <div class="panel-header-blue" role="tab" id="heading2">
                      <h4 class="panel-title">
                        <a role="button" data-toggle="collapse" data-parent="#accordion2" href="#collapse2" aria-expanded="true" aria-controls="collapse2">
                                <i class="glyphicon glyphicon-user"></i>
                                 أعضاء جدد
                                <i class="caret"></i>
                        </a>
                      </h4>
                    </div>
                    <div id="collapse2" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="heading2">
                      <div class="panel-body padding-none">
                          <div class="div-margin">
                        <!-- -->
                        <table class="table" style="margin-bottom: 0px;">
                                  <tr>
                                        <th>#</th>
                                    <th>العضو</th>
                                    <th>تاريخ التسجيل</th> 
                                  </tr>
<?php
foreach ($NewUser as $val) {
?>
    <tr>
      <td><?php echo $val['User']['id'] ;?></td>
      <td><?php echo $val['User']['Pseudo'] ;?></td> 
      <td><?php echo $val['User']['created'] ;?></td>
    </tr>
<?php } ?>
                                </table>
                        <!---->
                      </div>
                      </div>
                    </div>
                  </div>
                </div>
                <!--fin panel-->
                </div>
                <!-- fin new member-->
                <!--last orders-->
                <div class="col-md-12">
                        <!--panel-->
                        <div class="panel-group" id="accordion3" role="tablist" aria-multiselectable="true">
                  <div class="panel panel-default">
                    <div class="panel-header-grean" role="tab" id="heading3">
                      <h4 class="panel-title">
                        <a role="button" data-toggle="collapse" data-parent="#accordion3" href="#collapse3" aria-expanded="true" aria-controls="collapse3">
                                <i class="glyphicon glyphicon-usd"></i>
                                 أخر المعاملات المالية 
                                <i class="caret"></i>
                        </a>
                      </h4>
                    </div>
                    <div id="collapse3" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="heading3">
                      <div class="panel-body padding-none" >
                        <!-- table-->
                        <div class="div-margin">
                            <div class="wrapper" style="margin-bottom: 7px;" >
                                  <div class="table2 table-bordered">
                                    <div class="row-table header">
                                      <div class="cell">
                                        #
                                      </div>
                                      <div class="cell">
                                        إسم العضو
                                      </div>
                                      <div class="cell">
                                        اكمية الشحن
                                      </div>
                                      <div class="cell">
                                        طريقة الشحن
                                      </div>
                                    </div>
<?php foreach ($last_4_recharges as $val)
{?>
    <div class="row-table">
      <div class="cell">
        <?php echo $val['Recharge']['id'];?>
      </div>
      <div class="cell">
        <?php echo $val['User']['Pseudo'];?>  
        devloppeur
      </div>
      <div class="cell">
        <?php echo $val['Recharge']['amount'].'$';?>
      </div>
      <div class="cell">
          <p class="btn btn-warning btn-sm"><?php echo $val['Way']['name'];?></p>
      </div>
    </div>
<?php }?>
            </div>
            </div>
<!--<a class="btn btn-primary btn-sm" href="<?php echo $this->Html->url('/Recharges/rechages_management',true); ?>">تفاصيل عمليات الشحن</a>-->
</div>
  <!--fin table-->
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

        <!--slide-->
        <div class="col-md-4">
                        <!--panel-->
                        <div class="panel-group" id="accordion4" role="tablist" aria-multiselectable="true">
                  <div class="panel panel-default">
                    <div class="panel-header-grean" role="tab" id="heading4">
                      <h4 class="panel-title">
                        <a role="button" data-toggle="collapse" data-parent="#accordion4" href="#collapse4" aria-expanded="true" aria-controls="collapse4">
                                <i class="glyphicon glyphicon-signal"></i>
                                        متصلين حاليا
                                <i class="caret"></i>
                        </a>
                      </h4>
                    </div>
                    <div id="collapse4" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="heading4">
                      <div class="panel-body padding-none">
                        <!-- -->
                         <div class="div-margin">
                        <table class="table" style="margin-bottom: 0px;">
                                  <tr>
                                        <th></th>
                                        <th>#</th>
                                    <th>العضو</th>
                                    <th>تاريخ التسجيل</th> 
                                  </tr>
<?php
foreach ($ActiveUser as $val) {
?>
    <tr>
        <th><span class="online glyphicon glyphicon-certificate"></span></th>
        <td><?php echo $val['User']['id'] ;?></td>
        <td><?php echo $val['User']['Pseudo'] ;?></td> 
        <td><?php echo $val['User']['created'] ;?></td>
    </tr>
<?php } ?>
                                </table>
                        <!---->
                      </div>
                      </div>
                    </div>
                  </div>
                </div>
                <!--fin panel-->
                </div>
        <!--fin slide-->
                </div>
        </div>
        <!--fin body>