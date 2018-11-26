<!--body-->
	<div class=" col-md-10 col-xs-12">
            <div class="row">
	<!--titre-->
			<div class="col-md-12">
				<h2>التذاكر</h2>
			</div>
                            <div class="col-md-8 col-xs-12">
				<ol class="breadcrumb">
				  <li><a href="#">الرئسية</a></li>
				  <li class="active">التذاكر</li>
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
			        	التذاكر
			      		<i class="caret"></i>
			        </a>
			      </h4>
			    </div>
			    <div id="collapse2" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="heading2">
			      <div class="panel-body padding-none">
			       <div class="div-margin">
<?= $this->Form->create('Ticket',array('action'=>'index_admin','class'=>'form-inline')); ?> 
    <div class="form-group">
        <select class="form-control input-sm" name="data[Ticket][statu_id]" >
            <option selected disabled="" value="">حالة التذكرة</option>
            <option   value="1">في الانتظار</option>
            <option  value="2">تم الرد</option>
            <option  value="3">جاري مراجعتها</option>
            <option  value="4">مغلقة</option>
    </select>
    </div>
    <div class="form-group">
        <input class="form-control input-sm" type="number" min="0" name="data[Ticket][user_id]" placeholder="رقم العضو">
    </div> 
    <div class="form-group">
        <input placeholder="تاريخ ابتدءا من ..." class="form-control input-sm" type="text" onfocus="(this.type='date')"  name="data[Ticket][created]" > 
    </div> 
    <button type="submit" class="btn btn-danger btn-sm" ><i class="glyphicon glyphicon-search"></i>  إبحث </button>
<?= $this->Form->end(); ?>
<div class="wrapper">
    <div class="table2 table-bordered">
        <div class="row-table header">
          <div class="cell">
              رقم التذكرة
          </div>
            <div class="cell">
              رقم العضو
          </div>
            <div class="cell">
              اسم العضو
          </div>
          <div class="cell">
              عنوان التذكرة
          </div>
          <div class="cell">
              الحالة
          </div>
            <div class="cell">
                اخر تحديث
          </div>
        <div class="cell">
          <span class="glyphicon glyphicon-cog"> </span>
        </div>  
        </div>
<?php foreach ($AllTickets as $val)
{ ?>
            <div class="row-table">
              <div class="cell">
               <?php
                if($val['Ticket']['seen']==0)
                {?>
                  <i class="glyphicon glyphicon-folder-close" style="color:rgb(245, 138, 21);"></i>  
            <?php }
                else { ?>
                    <i class="glyphicon glyphicon-folder-open" style="color:rgb(245, 138, 21);"></i>  
                <?php }
                   echo $val['Ticket']['id'];?>
              </div>
                 <div class="cell">
                  <?php echo $val['Ticket']['user_id'];?>
              </div>
                <div class="cell">
                  <?php echo $val['User']['Pseudo'];?>
              </div>
              <div class="cell">
                  <?php echo '<a href="'.$this->Html->url('/messages/index_admin/'.$val['Ticket']['id'],true).'">'.$val['Ticket']['title'].'</a>';?>
              </div>

              <div class="cell">
                  <?php echo $val['Statu']['name'];?>
              </div>
              <div class="cell">
                  <?php echo $val['Ticket']['modified'];?>
              </div>
            <div class="cell">
                <a class="btn btn-sm btn-info" href="#"  data-toggle="modal" data-target="#exampleModal2" data-whatever="<?php echo $val['Ticket']['id']; ?>"> 	
                    <i class="glyphicon glyphicon-cog"></i>  تعديل  الحالة
                </a>
              </div>
            </div>
<?php } ?>
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
<!---fin-->
</div>
</div>
</div>
</div>
</div>
<!--fin payment-->
</div>
<!--fin body-->	
</div>
	<!--model الغاء-->
<div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">تحديد حالة التذكرة</h4>
      </div>
      <div class="modal-body">
<?php echo $this->Form->create('Ticket',array('action'=>'update_statu'));?>          
          <div class="form-group">
            <input type="hidden"  class="form-control" id="TicketId"name="data[Ticket][id]" >
            <div class="form-group">
                <select class="form-control" name="data[Ticket][statu_id]">
                    <option selected disabled value="">اختر الحالة ...</option>
                    <option value="1">في الانتظار</option>
                    <option value="2"> تم الرد</option>
                    <option value="3"> جاري مراجعتها</option>
                    <option value="4">مغلقة </option> 
                </select>
            </div>
          </div>
                  <button class="btn btn-grean">تعديل الحالة</button>
                  <button type="button" class="btn btn-default" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">إلغاء</span></button>
<?php echo $this->Form->end();?> 
      </div>
      <div class="modal-footer">
       
      </div>
    </div>
  </div>
</div>
<!--fin modele -->
<script>
$('#exampleModal2').on('show.bs.modal', function (event) {
  	  var button = $(event.relatedTarget) // Button that triggered the modal
	  var recipient = button.data('whatever') // Extract info from data-* attributes
	  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
	  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
	  var modal = $(this)
	  modal.find('.modal-title').text('الغاء الطلب رقم: ' + recipient)
	  modal.find('#TicketId').val(recipient)
});
</script>