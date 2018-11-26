<!--body-->
	<div class=" col-md-10 col-xs-12">
            <div class="row">
<!--titre-->
<div class="col-md-12">
        <h2>الرصيد</h2>	
</div>
    <div class="col-md-8 col-xs-12">
        <ol class="breadcrumb">
          <li><a href="#">الرئسية</a></li>
          <li class="active">الرصيد</li>
        </ol>
</div>
<div class="col-md-4 col-xs-12" style="text-align: left;">
    <button type="button" class="btn btn-primary "> الرصيد <span class="badge num"> <?php echo $capitale[0]['User']['capital'];?>$</span></button>
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
			        	شحن الرصيد
			      		<i class="caret"></i>
			        </a>
			      </h4>
			    </div>
			    <div id="collapse2" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="heading2">
			      <div class="panel-body">
			      	<!--forms-->
<?php echo $this->Form->create('Recharge',array('action'=>'balance')); ?>
    <div class="form-group">
      <label for="sold">المبلغ المراد شحنه</label>
      <input type="number" class="form-control" name="data[Recharge][amount]" id="RechargeAmount" placeholder="10$">
    </div>
    <div class="checkbox">
      <label>
        <input type="checkbox" name="data[Recharge][cheked]" id="RechargeCheked">  قرأت و أوافق على شروط الإستخدام 
      </label>
    </div>
                                <input type="hidden" name="data[Recharge][way_id]" value="3">
      <a onclick="f1()" style="margin-bottom: 5px;margin-left: 5px;" class="btn btn-warning col-xs-12 col-md-2 col-sm-2" href="#" data-toggle="modal" data-target="#activer_service" ><i class="glyphicon glyphicon-credit-card"></i> ادفع عن طريق كاشيو </a>
      <a onclick="f2()" style="margin-bottom: 5px;margin-left: 5px;" class="btn btn-danger col-xs-12 col-md-2 col-sm-2" href="#" data-toggle="modal" data-target="#coupon_model"  ><i class="glyphicon glyphicon-credit-card"></i> ادفع عن طريق كوبون  </a>
      <a onclick="f3()" style="margin-bottom: 5px;margin-left: 5px;" class="btn btn-success col-xs-12 col-md-2 col-sm-2" href="#" data-toggle="modal" data-target="#modele2"  ><i class="glyphicon glyphicon-credit-card"></i> ادفع عن طريق ون كارد  </a>
      <button type="submit" style="margin-bottom: 5px;margin-left: 5px;" class="btn btn-primary col-xs-12 col-md-2 col-sm-2"><i class="glyphicon glyphicon-credit-card"></i> ادفع عن طريق بايبال</button>
<?php
echo $this->Form->end(); 
?>
<!--fin forms-->
			      	
			      </div>
			      </div>
	</div>
	</div>
            </div>
        
		<!--fin payment-->
		
	</div>
		<!--fin body-->	
        </div>


<!--modele cache you-->
<div class="modal fade" id="activer_service" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
<div class="modal-dialog" role="document">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
<h4 class="modal-title" id="exampleModalLabel">شحن حسابك بالكاشيو  </h4>
</div>
<div class="modal-body">
<?php echo $this->Form->create('Recharge',array('action'=>'balance')); ?>
    <div class="form-group">
        <label>المبلغ المراد شحنه</label>
        <input class="form-control" type="number" name="data[Recharge][amount]" min="0" id="prix_cachyou" value="0" />
    </div>
    <div class="form-group">
        <label>كود الكاشيو</label>
        <input class="form-control" type="text" name="data[Recharge][transaction_id]" placeholder="كود الكاشيو"  />
    </div>
    <div class="checkbox">
      <label>
        <input type="checkbox" name="data[Recharge][cheked]" id="RechargeCheked">  قرأت و أوافق على شروط الإستخدام 
      </label>
    </div>
    <input type="hidden" name="data[Recharge][way_id]" value="2">
    <button type="submit" class="btn btn-grean ">دفع</button>
    <button type="button" class="btn btn-default" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">إلغاء</span></button>
<?php echo $this->Form->end(); ?>
</div>
</div>
</div>
</div>
<!--fin modele cach you-->


<!--modele coupon-->
<div class="modal fade" id="coupon_model" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
<div class="modal-dialog" role="document">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
<h4 class="modal-title" id="exampleModalLabel">شحن حسابك الكوبون  </h4>
</div>
<div class="modal-body">
<?php echo $this->Form->create('Recharge',array('action'=>'balance')); ?>
    <div class="form-group">
        <label>كود الكوبون</label>
        <input class="form-control" name="data[Recharge][transaction_id]" type="text" placeholder="كود الكوبون"  />
    </div>
    <div class="checkbox">
      <label>
        <input type="checkbox" name="data[Recharge][cheked]" id="Cheked_coupon">  قرأت و أوافق على شروط الإستخدام 
      </label>
    </div>
    <input type="hidden" name="data[Recharge][way_id]" value="4">
    <button type="submit" class="btn btn-grean" onclick="valid()"> دفع</button>
    <button type="button" class="btn btn-default" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">إلغاء</span></button>
<?php echo $this->Form->end(); ?>
</div>
</div>
</div>
</div>
<!--fin modele coupon-->


<!--modele one card-->
<div class="modal fade" id="activer_service" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
<div class="modal-dialog" role="document">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
<h4 class="modal-title" id="exampleModalLabel">شحن حسابك بالكاشيو  </h4>
</div>
<div class="modal-body">
<?php echo $this->Form->create('Recharge',array('action'=>'balance')); ?>
    <div class="form-group">
        <label>المبلغ المراد شحنه</label>
        <input class="form-control" type="number" name="data[Recharge][amount]" min="0" id="prix_cachyou" value="0" />
    </div>
    <div class="form-group">
        <label>كود الكاشيو</label>
        <input class="form-control" type="text" name="data[Recharge][transaction_id]" placeholder="كود الكاشيو"  />
    </div>
    <div class="checkbox">
      <label>
        <input type="checkbox" name="data[Recharge][cheked]" id="RechargeCheked">  قرأت و أوافق على شروط الإستخدام 
      </label>
    </div>
    <input type="hidden" name="data[Recharge][way_id]" value="2">
    <button type="submit" class="btn btn-grean ">دفع</button>
    <button type="button" class="btn btn-default" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">إلغاء</span></button>
<?php echo $this->Form->end(); ?>
</div>
</div>
</div>
</div>
<!--fin modele cach you-->


<!--modele card-->
<div class="modal fade" id="modele2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
<div class="modal-dialog" role="document">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
<h4 class="modal-title" id="exampleModalLabel">شحن حسابك ب وان كارد  </h4>
</div>
<div class="modal-body">
<?php echo $this->Form->create('Recharge',array('action'=>'balance')); ?>
    <div class="form-group">
        <label>المبلغ المراد شحنه</label>
        <input class="form-control" type="number" name="data[Recharge][amount]" min="0" id="prix_onecard" value="0" />
    </div>
    <div class="form-group">
        <label>كود الكاشيو</label>
        <input class="form-control" type="text" name="data[Recharge][transaction_id]" placeholder="كود الكاشيو"  />
    </div>
    <div class="checkbox">
      <label>
        <input type="checkbox" name="data[Recharge][cheked]" id="RechargeCheked">  قرأت و أوافق على شروط الإستخدام 
      </label>
    </div>
    <input type="hidden" name="data[Recharge][way_id]" value="5">
    <button type="submit" class="btn btn-grean ">دفع</button>
    <button type="button" class="btn btn-default" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">إلغاء</span></button>
<?php echo $this->Form->end(); ?>
</div>
</div>
</div>
</div>
<!--fin modele one card-->
<script>
    
    function f1()
    {
        var a = document.getElementById('RechargeAmount').value;
        document.getElementById('prix_cachyou').value=a;
    }
    
    function f2()
    {
        var a = document.getElementById('RechargeAmount').value;
        document.getElementById('coupon').value=a;
    }
    function f3()
    {
        var a = document.getElementById('RechargeAmount').value;
        document.getElementById('prix_onecard').value=a;
    }
    
//    function valid()
//    {
//         var a = document.getElementById('Cheked_coupon').checked;
//           if(a==='true')
//         {
//             alert("a");
//             return true;
//         }
//         else 
//         {
//             alert(a);
//             document.getElementById('ServiceUpdateStateForm').onsubmit = function() {
//              return false;
//                }
//         }
//    }
 </script>