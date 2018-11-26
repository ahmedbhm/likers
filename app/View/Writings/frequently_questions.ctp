<?php 	echo $this->Html->css('summernote.css'); ?>
<?php 	echo $this->Html->css('font-awesome.min.css'); ?>	
<div class="col-md-10 col-xs-12">
			<div class="row">
		<!--titre-->
			<div class="col-md-12">
				<h2> الاسئلة الشائعة  </h2>
				
			</div>
			<div class="col-md-12">
				<ol class="breadcrumb">
				  <li><a href="#">الرئسية</a></li>
				  <li class="active"> الاسئلة الشائعة </li>
				</ol>
		</div>
		<!--fin titre-->
			<!--member-->
			<div class="col-md-12">
				<!--panel-->
				<div class="panel-group" id="accordion3" role="tablist" aria-multiselectable="true">
			  <div class="panel panel-default">
			    <div class="panel-header-grean" role="tab" id="heading3">
			      <h4 class="panel-title">
			        <a role="button" data-toggle="collapse" data-parent="#accordion3" href="#collapse3" aria-expanded="true" aria-controls="collapse3">
			        	<i class="glyphicon glyphicon-question-sign"></i>
			        	  الاسئلة الشائعة
			      		<i class="caret"></i>
			        </a>
			      </h4>
			    </div>
			    <div id="collapse3" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="heading3">
			      <div class="panel-body padding-none" >
					<!-- faq-->
<div class="div-margin">
        <h3>الاسئلة الشائعة</h3>
        <hr />
        <div id="summernote"><?php echo $FrequentlyQuestions[0]['Writing']['contents'];?></div>
<?php echo $this->Form->create('Writing',array('action'=>'frequently_questions')); ?>
<input type="hidden" id="WritingContents" name="data[Writing][contents]" />
<button class="sv btn btn-grean">حفظ </button>
<?php echo $this->Form->end(); ?>
</div>
					<!--fin faq-->
					     
			      	
			      </div>
			    </div>
			  </div>
			</div>
			<!--fin panel-->
			</div>
			<!-- fin new member-->
		</div>
		</div>
		<!--fin body-->
                            <?php echo $this->Html->script('summernote.js'); ?>

<script>
	$(document).ready(function() {
  $('#summernote').summernote({
  height: 300,                 // set editor height

  minHeight: null,             // set minimum height of editor
  maxHeight: null,             // set maximum height of editor

  focus: true,                 // set focus to editable area after initializing summernote
});

});

/**/
$(document).ready(function(){
    $(".sv").click(function(){
    	var sHTML = $('#summernote').code(); 
    	$('#WritingContents').val(sHTML);
        //alert(sHTML);
    });
});
</script>
