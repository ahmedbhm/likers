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
<?= $this->Form->create('Ticket',array('action'=>'index','class'=>'form-inline')); ?> 
    <div class="form-group">
        <select class="form-control input-sm" name="data[Ticket][statu_id]" >
            <option selected disabled="" value="">حالة التذكرة</option>
            <option   value="1">في الانتظار</option>
            <option  value="2">تم الرد</option>
            <option  value="3">جاري مراجعتها</option>
            <option  value="4">مغلقة</option>
    </select>
    </div>
    <button type="submit" class="btn btn-danger btn-sm" ><i class="glyphicon glyphicon-search"></i>  إبحث </button>
     <div class="form-group"> 
    <a class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal"><i class="glyphicon glyphicon-plus"></i> تذكرة جديدة</a>
     </div>
<?= $this->Form->end(); ?>
<div class="wrapper">
    <div class="table2 table-bordered">
        <div class="row-table header">
          <div class="cell">
              رقم التذكرة
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
            
        </div>
<?php foreach ($AllTickets as $val)
{ ?>
            <div class="row-table">
              <div class="cell">
                  <?php
                if($val['Ticket']['seenU']==0)
                {?>
                  <i class="glyphicon glyphicon-folder-close" style="color:rgb(245, 138, 21);"></i>  
            <?php }
                else { ?>
                    <i class="glyphicon glyphicon-folder-open" style="color:rgb(245, 138, 21);"></i>  
                <?php }
                   echo $val['Ticket']['id'];?>
              </div>
              <div class="cell">
                  <?php echo '<a href="'.$this->Html->url('/messages/index/'.$val['Ticket']['id'],true).'">'.$val['Ticket']['title'].'</a>';?>
              </div>

              <div class="cell">
                  <?php echo $val['Statu']['name'];?>
              </div>
              <div class="cell">
                  <?php echo $val['Ticket']['modified'];?>
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
<!-- Modal new member -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
<div class="modal-dialog" role="document">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
<h4 class="modal-title" id="myModalLabel">تذكرة جديدة</h4>
</div>
<div class="modal-body">
<!--form ajou-->
       <?php echo $this->Form->create('Ticket',array('action' => 'add'));?>
<div class="form-group">
<input type="text" name="data[Ticket][title]" class="form-control" placeholder="العنوان">
<input type="hidden" value="1" name="data[Ticket][statu_id]" >
</div>
<div class="form-group">
    <textarea type="text" name="data[Message][content]" class="form-control" placeholder="المحتوى  "></textarea>
</div>

<?php     echo $this->Form->end(array('class' => 'btn btn-grean',
                                                'label' => 'إرسال',
                                                'div' => array(
                                                        'class' => 'form-group'
                                                        )
                                                )); 
?>
<!--fin form ajout-->
</div>
<div class="modal-footer">
</div>
</div>
</div>
</div>
<!--fin model-->