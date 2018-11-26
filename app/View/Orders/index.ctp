<?php if (isset($ing->user_name) && $ing->user_name)
{
 ?>
<div class="col-md-12" id="Statistiques">
    <div class="row">
    <div class="panel panel-default">
        <div class="panel-header-grean">
          <h3 class="panel-title"> <i class="glyphicon glyphicon-tasks"></i> معلومات عن الرابط </h3>
        </div>
      <div class="panel-body">
          <div class="col-md-4 col-xs-4">
              <div class="row">
                    <p id="load" style=" top:20%; right: 15%; position: absolute; z-index: 100; display: none;">
                           <?php echo $this->Html->image('hourglass.svg');?>
                            </p>
                    <img style="width: 95%; height: 95%; margin-bottom: 10px;" src="<?php echo $ing->img?>" />
              </div>
          </div>
          <div class="col-md-8 col-xs-8">
           <div class="row">
               <i class="glyphicon glyphicon-link"></i> <a target="_blank" href="<?php echo $ing->url?>" id="lien2"class="info-link"><?php echo $ing->url?></a>
        <br/>
        <i class="glyphicon glyphicon glyphicon-star"></i> <label class="info-link" > إسم المستخدم:  <?php echo $ing->user_name;?></label>
        <br/>
        <i class="glyphicon glyphicon-heart"></i> <label class="info-link" id="num_follows"> <?php echo $ing->followd_by;?> </label>
           </div>
           </div>
      </div>
    </div>
    </div>
</div>
<?php 
} 
elseif(isset($Service[0]['Service']['name']) && $Service[0]['Service']['name'])
{
?>
<!-- detaill order-->
<div class="col-md-12" id="DetaillOrder">	
    <div class="row">
    <div class="panel panel-default">
        <div class="panel-header-grean">
          <h3 class="panel-title"> <i class="glyphicon glyphicon-tasks"></i> تفاصيل الطلب</h3>
        </div>
        <div class="panel-body">
          <label style="color: #D03F42;"><i class="glyphicon glyphicon-shopping-cart"></i> إسم الخدمة</label>
          <?php if ($Service[0]['Service']['name'])
          {
             echo '<p>'.$Service[0]['Service']['name'].'</p>';
          }
          else
          {
              echo '<p> إسم الخدمة يوضع هنا</p>';
          }?>         
          <label style="color: #D03F42;"><i class="glyphicon glyphicon-sort-by-attributes-alt"></i> أدنى كمية يمكن طلبها لكل رابط  </label>
          <?php if ($Service[0]['Service']['lowest_quantity'])
          {
              echo '<p id="lowest_quantity">'.$Service[0]['Service']['lowest_quantity'].'</p>';
          }
          else
          {
              echo ' <p>أدنى كمية يمكن طلبها لكل رابط </p>';
          }?>
          <label style="color: #D03F42;"><i class="glyphicon glyphicon-sort-by-attributes"></i>اقصى كمية يمكن طلبها لكل رابط </label>
          <?php if ($Service[0]['Service']['largest_quantity'])
          {
              echo '<p id="largest_quantity">'.$Service[0]['Service']['largest_quantity'].'</p>';
          }
          else
          {
              echo ' <p>اقصى كمية يمكن طلبها لكل رابط </p>';
          }?>
           <label style="color: #D03F42;"><i class="glyphicon glyphicon-list-alt"></i>ملاحظة </label>
          <?php if ($Service[0]['Service']['description'])
          {
              echo '<p>'.$Service[0]['Service']['description'].'</p>';
          }
          else
          {
              echo ' <p>الملاحظات عن الطلب توضع هنا</p>';
          }?>
           <hr>
                    <div class="col-md-12 col-xs-12"> 
         <div class="row">
          <label style="color: #D03F42; "><i class="glyphicon glyphicon-credit-card"></i> ثمن 1K. </label>
          <?php if ($Service[0]['Service']['price'])
          {
              echo '<div><p id="price" style=" display: inline;">'.$Service[0]['Service']['price'].'</p><span>$</span></div>';
          }
          else
          {
              echo ' <p>سعر الخدمة يوضع هنا</p>';
          }?>
          <label style="color: #D03F42; "><i class="glyphicon glyphicon-credit-card"></i> الثمن الكلي. </label>
          <p id="rst">0</p>
        </div>
         </div>
        </div>
    </div>
</div>
</div>
<!-- fin detaill order -->
<?php
}
          else
          {
              ?>
        
<div class=" col-md-10 col-xs-12" >        
        <!--orders-->
        <div class="row">
        <div class="col-md-8">
        <!--titre-->
        <div class="row">
                <div class="col-md-12">
                        <h2>الرئيسية</h2>
                </div>
                <div class="col-md-12">
                        <ol class="breadcrumb">
                          <li><a href="#">الرئسية</a></li>
                          <li><a href="#">خدمات</a></li>
                          <li class="active">خدمة جديدة</li>
                        </ol>
                </div>
        </div>
        <!--fin titre-->
        <div class="panel panel-default">
                  <div class="panel-header-blue"><i class="glyphicon glyphicon-plus"></i> خدمة جديدة </div>
                <div class="panel-body">
                   <!--formulare-->
                   <div>

                          <!-- Nav tabs -->
                          <ul class="nav nav-tabs" role="tablist" style="margin-bottom: 10px;">
                            <li role="presentation" class="active"><a href="#order1" aria-controls="home" role="tab" data-toggle="tab">رابط واحد</a></li>
                            <li role="presentation"><a href="#order2" aria-controls="profile" role="tab" data-toggle="tab">روابط متعددة</a></li>
                          </ul>

                          <!-- Tab panes -->
                          <div class="tab-content">
                            <div role="tabpanel" class="tab-pane active" id="order1">
                                <!--form order1-->
<?php echo $this->Form->create('Order', array('url'=>array('controller'=>'Orders', 'action'=>'add'))); ?>
<div class="form-group">
    <label for="orders">الخدمة</label>
        <select name="data[Order][id_service_order]" id="OderService" class="form-control" onchange='getValue("OrderQuantity")'>
<option selected disabled>إختر خدمة...</option>         
 <?php foreach ($OrderServices as $val)
          {
              echo '<option value="'.$val['Service']['id'].'">'.$val['Service']['name'].'</option>';
          } ?>
      </select>
</div>
<div class="form-group">
<?php   echo $this->Form->input('url',
                    array(
                    'type' => 'text',
                    'class' => 'form-control input-left',
                     'id'=>'OrderUrl',
                    'onkeyup' => 'Test_adresse_url(\'OrderUrl\',\'lien2\')',
                    'placeholder' =>'https://',
                    'label' => array(
                        'class' => '',
                        'text' => 'الرابط'
                    )
                    ));?>
  </div> 
<div class="form-group">
    <input type="hidden" id="reduction" value="<?php    echo $this->Session->read("Auth.User.reduction") ?>" />
    <?php   echo $this->Form->input('quantity',
                    array(
                    'type' => 'number',
                    'class' => 'form-control',
                    'onkeyup'=>'getValue("OrderQuantity")',
                    'id'=>'OrderQuantity',
                    'placeholder' =>'العدد المطلوب',
                    'label' => array(
                        'class' => '',
                        'text' => 'العدد المطلوب'
                    )
                    ));?>
</div>        
<div class="form-group">

        <input id="inp_nul_follow" type="hidden" name="data[Order][initial_number]" value="0"/>

      <div class="checkbox">
        <label>
              <?php   echo $this->Form->checkbox('check');?>لقد راجعت الطلب و متأكد منه
        </label>
      </div>
</div>
<!--submit-->
 <div class="form-group">
        <button type="submit" class="btn btn-grean" onmouseover="get_follow()">إتمام الطلب</button>
  </div>
    <?php     echo $this->Form->end();?>                                

                                <!--fin order1-->
                            </div>
                            <div role="tabpanel" class="tab-pane" id="order2"> 
<!--form order2-->
<?php echo $this->Form->create(null, array('url'=>array('controller'=>'Orders', 'action'=>'add2'))); ?>
<div class="form-group">
    <label for="orders">الخدمة</label>
        <select name="data[Order][id_service_order]" id="OderService2" class="form-control">
<option selected disabled>إختر خدمة...</option>
          <?php foreach ($OrderServices as $val)
          {
              echo '<option value="'.$val['Service']['id'].'">'.$val['Service']['name'].'</option>';
          } ?>
      </select>
</div>
<div class="form-group">
<?php   echo $this->Form->input('url',
                    array(
                    'type' => 'textarea',
                    'style'=>'text-align:left;direction:ltr;',
                    'class' => 'form-control',
                    'onkeyup' => 'Test_adresse_url(\'lien1','lien2\')',
                    'placeholder' =>' https://exapmle.com:100,
 https://exapmle.com:100',
                    'label' => array(
                        'class' => '',
                        'text' => 'الرابط'
                    )
                    ));?>
  </div> 
<div class="form-group">
    <?php   echo $this->Form->input('quantity',
                    array(
                    'type' => 'number',
                    'class' => 'form-control',
                    'onkeyup'=>'getValue("OrderQuantity2")',
                    'id'=>'OrderQuantity2',
                    'placeholder' =>'العدد المطلوب',
                    'label' => array(
                        'class' => '',
                        'text' => 'العدد المطلوب'
                    )
                    ));?>
</div>        
<div class="form-group">
      <div class="checkbox">
        <label>
              <?php   echo $this->Form->checkbox('check');?>أوافق على شروط الخدمة
        </label>
    </div>
</div>
<!--submit-->
 <div class="form-group">
      <button type="submit" class="btn btn-grean">إتمام الطلب</button>
  </div>
    <?php     echo $this->Form->end(); 
?>                                

<!--fin order2-->
                            </div>

                        </div>
                 </div>
                 <!--fin formulaire-->
                </div>
        </div>
</div>
        <!-- fin orders-->
<!-- detaill order-->
<div class="col-md-4" id="Statistiques">				
                <div class="panel panel-default">
                   
                          <div class="panel-header-grean">
                            <h3 class="panel-title"> <i class="glyphicon glyphicon-tasks"></i> معلومات عن الرابط  </h3>
                          </div>
                        <div class="panel-body">
                      
                            <div class="col-md-4 col-xs-4">
                                <div class="row">
                               <p id="load" style=" top:20%; right: 15%; position: absolute; z-index: 100; display: none;">
                           <?php echo $this->Html->image('hourglass.svg');?>
                            </p>
                            <?php echo $this->Html->image('profil.jpg', array('alt' => 'profil','class'=>'profil',
                                'style'=>'width:95%;height:95%; margin-bottom:5px;'));?>
                                </div>
                            </div>
                            <div class="col-md-8 col-xs-8">
                             <div class="row">
                                 <i class="glyphicon glyphicon-link"></i> <a href="" id="lien2" style="color: #D03F42;"> الرابط.</a>
                          <br/>
                          <i class="glyphicon glyphicon glyphicon-star"></i> <label style="color: #D03F42;">المستخدم.</label>
                          <br/>
                          <i class="glyphicon glyphicon-heart"></i> <label style="color: #D03F42;"> العدد الحالي.</label>
                             </div>
                             </div>
                        </div>
                </div>
        </div>
        <!-- fin detaill order -->
<!-- detaill order-->
<div class="col-md-4" id="DetaillOrder">				
    <div class="panel panel-default">
        <div class="panel-header-grean">
          <h3 class="panel-title"> <i class="glyphicon glyphicon-tasks"></i> تفاصيل الطلب</h3>
        </div>
        <div class="panel-body">
          <label style="color: #D03F42;"><i class="glyphicon glyphicon-shopping-cart"></i> إسم الخدمة</label>
           <?php if (isset($Service[0]['Service']['name']) && $Service[0]['Service']['name'])
          {
              echo '<p>'.$Service[0]['Service']['name'].'</p>';
          }
          else
          {
              echo '<p>إسم الخدمة يوضع هنا</p>';
          }?>
          
          
         
          <label style="color: #D03F42;"><i class="glyphicon glyphicon-sort-by-attributes-alt"></i> أدنى كمية يمكن طلبها لكل رابط  </label>
          <?php if (isset($Service[0]['Service']['lowest_quantity']) && $Service[0]['Service']['lowest_quantity'])
          {
              echo '<p>'.$Service[0]['Service']['lowest_quantity'].'</p>';
          }
          else
          {
              echo ' <p>أدنى كمية يمكن طلبها لكل رابط</p>';
          }?>
          <label style="color: #D03F42;"><i class="glyphicon glyphicon-sort-by-attributes"></i>اقصى كمية يمكن طلبها لكل رابط</label>
          <?php if (isset($Service[0]['Service']['largest_quantity']) && $Service[0]['Service']['largest_quantity'])
          {
              echo '<p>'.$Service[0]['Service']['largest_quantity'].'</p>';
          }
          else
          {
              echo ' <p>اقصى كمية يمكن طلبها لكل رابط .</p>';
          }?>
           <label style="color: #D03F42;"><i class="glyphicon glyphicon-list-alt"></i>ملاحظة </label>
          <?php if (isset($Service[0]['Service']['description']) && $Service[0]['Service']['description'])
          {
              echo '<p>'.$Service[0]['Service']['description'].'</p>';
          }
          else
          {
              echo ' <p>الملاحظات عن الطلب توضع هنا...</p>';
          }?>
           <hr>
                                      <div class="col-md-12 col-xs-12"> 
                           <div class="row">
                            <label style="color: #D03F42; "><i class="glyphicon glyphicon-credit-card"></i> ثمن 1K </label>
                            <p id="num2">سعر الخدمة يوضع هنا.</p>
                            <label style="color: #D03F42; "><i class="glyphicon glyphicon-credit-card"></i> الثمن الكلي </label>
                            <p>0</p>
                          </div>
                           </div>
        </div>
    </div>
</div>
        <!-- fin detaill order -->
</div>
<!--fin row-->
    </div>
<?php  }?>
<?php
//$this->Js->get('#OderService')->event('change', 
//$this->Js->request(array(
//'controller'=>'Orders',
//'action'=>'index'
//), array(
//'update'=>'#DetaillOrder',
//'async' => true,
//'method' => 'post',
//'dataExpression'=>true,
//'data'=> $this->Js->serializeForm(array(
//'isForm' => true,
//'inline' => true
//))
//))
//);
?>
<script>
//<![CDATA[
$(document).ready(function () {

    
    $("#OderService").bind("change", function (event) {
          $( document ).ajaxStart(function() {
         $( "#load" ).hide();
   });
        $.ajax({
            async:true, data:$("#OderService").serialize(), 
            dataType:"html", 
            success:function (data, textStatus) {
                $("#DetaillOrder").html(data);}, 
            type:"post", url:"\/Orders\/index",
//            complete: function(){
//            }
        });
return false
;});
    $("#OderService2").bind("change", function (event) {
         $( document ).ajaxStart(function() {
         $( "#load" ).hide();
   });
        $.ajax({
            async:true, data:$("#OderService2").serialize(), 
            dataType:"html", 
            success:function (data, textStatus) {
                $("#DetaillOrder").html(data);}, 
            type:"post", url:"\/Orders\/index"

        });
return false
;});

    $("#OrderUrl").one("change", function (event) {
          $( document ).ajaxStart(function() {
         $( "#load" ).show();
   });

        $.ajax({
            async:true, data:$("#OrderUrl").serialize(), 
            dataType:"html", 
            success:function (data, textStatus) {
                $("#Statistiques").html(data);}, 
            type:"post", url:"\/Orders\/index"
        });
return false
;});

;});

//]]>
</script>
