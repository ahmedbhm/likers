<div class=" col-md-10 col-xs-12">

    <div class="row">
        <div class="col-md-12">
            <h2>الأسعار</h2>

        </div>
        <div class="col-md-12">
            <ol class="breadcrumb">
              <li><a href="#">الرئسية</a></li>
              <li class="active">الأسعار</li>
            </ol>
        </div>
    </div>
<!--fin titre-->
<!--price-->

<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
    <div class="panel panel-default">
      <div class="panel-header-grean" role="tab" id="heading2">
        <h4 class="panel-title">
          <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse2" aria-expanded="true" aria-controls="collapse2">
                  <i class="glyphicon glyphicon-usd"></i>
                  الأسعار
                  <i class="caret"></i>
          </a>
        </h4>
      </div>
        <div id="collapse2" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="heading2">
          <div class="panel-body padding-none">

                                <!--table-->
                                <div class="div-margin">
                                <div class="wrapper">
                                          <div class="table2 table-bordered">
                                            <div class="row-table header">
                                              <div class="cell">
                                                الفئة
                                              </div>

                                              <div class="cell">
                                                إسم الخدمة
                                              </div>

                                              <div class="cell">
                                                 السعر ل 1K
                                              </div>

                                                <div class="cell">
                                                أدنى و أكبر كمية
                                              </div>
                                                 <div class="cell">
                                                تفاصيل
                                              </div>
                                            </div>
                                        <!--affich-->
                                        <?php
                                        $i=0;
                                        foreach ($prices as $price)
                                                {
                                                        ?>
                                            <div class="row-table">

                                              <div class="cell">
                                                <?php echo $price['Type']['name']; ?>
                                              </div>
                                              <div class="cell">
                                            <?php echo $price['Service']['name']; ?>
                                               ً
                                              </div>

                                              <div class="cell">
                                            <?php echo $price['Service']['price'].'$'; ?>
                                               
                                              </div>
                                              <div class="cell">                      
                                            <?php echo $price['Service']['lowest_quantity'].'-'.$price['Service']['largest_quantity']; ?>
                                                
                                              </div>
                                            <div class="cell">                      
                                            <?php echo $price['Service']['description']; ?>
                                                
                                              </div>
                                            </div>
                                            <?php
                                            $i++;
                                                }
                                            ?>


                                          </div>
                                          </div>
                                          </div>

                                        <!--fintable-->
                              </div>
                              </div>
                </div>
                </div>
                <!--fin price-->	
        </div>