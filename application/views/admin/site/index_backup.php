
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-3 stretch-card grid-margin">
              <div class="card bg-gradient-danger card-img-holder text-white">
                <div class="card-body">
                  <!-- <img src="<?php echo base_url(); ?>support_assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image"/> -->
                  <h4 class="font-weight-normal mb-3">Total Employee
                    <i class="fa fa-2x fa-users mdi-24px float-right"></i>
                  </h4>
                    <h2 class="mb-5"><?php if(!empty($total_staff[0]->total_count)){  echo number_format($total_staff[0]->total_count, 2, '.', ''); }else{ echo '0.00'; }?></h2>
                
                </div>
              </div>
            </div>
            <?php $total_leads=$leads[0]->contacted+$leads[0]->notcontacted+$leads[0]->erelevant+$leads[0]->followup+$leads[0]->casedropped+$leads[0]->lostlead+$leads[0]->importance+$leads[0]->negotiation+$leads[0]->dealdone+$leads[0]->quotationsending; ?>  
            <div class="col-md-3 stretch-card grid-margin">
              <div class="card bg-gradient-info card-img-holder text-white">
                <div class="card-body">
                <!-- <img src="<?php echo base_url(); ?>support_assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image"/> -->                  
                  <h4 class="font-weight-normal mb-3">Total Lead
                    <i class="fa fa-2x fa-bullhorn mdi-24px float-right"></i>
                  </h4>
                  <h2 class="mb-5"><?php if(!empty($total_leads)){ echo number_format($total_leads, 2, '.', ''); }else{ echo '0.00'; }?></h2>
                
                </div>
              </div>
            </div>
              
               <div class="col-md-3 stretch-card grid-margin">
              <div class="card bg-gradient-success card-img-holder text-white">
                <div class="card-body">
                <!-- <img src="<?php echo base_url(); ?>support_assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image"/> -->                  
                  <h4 class="font-weight-normal mb-3"> Contacted Lead
                    <i class="fa fa-2x fa-phone mdi-24px float-right"></i> 
                  </h4>
                  <h2 class="mb-5"><?php if(!empty($leads[0]->contacted)){ echo number_format($leads[0]->contacted, 2, '.', ''); }else{ echo '0.00'; }?></h2>
                
                </div>
              </div>
            </div>
              
            <div class="col-md-3 stretch-card grid-margin">
              <div class="card bg-gradient-primary card-img-holder text-white">
                <div class="card-body">
                <!-- <img src="<?php echo base_url(); ?>support_assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image"/> -->                                    
                  <h4 class="font-weight-normal mb-3">Not Contacted Lead
                    <i class="fa fa-2x fa-mobile mdi-24px float-right"></i>
                  </h4>
                  <h2 class="mb-5"><?php if(!empty($leads[0]->notcontacted)){  echo number_format($leads[0]->notcontacted, 2, '.', ''); }else{ echo '0.00'; }?></h2>
                  </div>
              </div>
            </div>
          
            <div class="col-md-3 stretch-card grid-margin">
              <div class="card bg-gradient-primary card-img-holder text-white">
                <div class="card-body">
                <!-- <img src="<?php echo base_url(); ?>support_assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image"/> -->                                    
                  <h4 class="font-weight-normal mb-3">E-Relevant
                    <i class="fa fa-2x fa-random mdi-24px float-right"></i>
                  </h4>
                  <h2 class="mb-5"><?php if(!empty($leads[0]->erelevant)){  echo number_format($leads[0]->erelevant, 2, '.', ''); }else{ echo '0.00'; }?></h2>
                  </div>
              </div>
            </div>
              
           <div class="col-md-3 stretch-card grid-margin">
              <div class="card bg-gradient-success card-img-holder text-white">
                <div class="card-body">
                <!-- <img src="<?php echo base_url(); ?>support_assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image"/> -->                                    
                  <h4 class="font-weight-normal mb-3">Follow Up Leads
                    <i class="fa fa-2x fa-plus mdi-24px float-right"></i>
                  </h4>
                  <h2 class="mb-5"><?php if(!empty($leads[0]->followup)){  echo number_format($leads[0]->followup, 2, '.', ''); }else{ echo '0.00'; }?></h2>
                  </div>
              </div>
            </div>
              
           <div class="col-md-3 stretch-card grid-margin">
              <div class="card bg-gradient-info card-img-holder text-white">
                <div class="card-body">
                <!-- <img src="<?php echo base_url(); ?>support_assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image"/> -->                                    
                  <h4 class="font-weight-normal mb-3">Case Dropped Leads
                    <i class="fa fa-2x fa-dropbox mdi-24px float-right"></i>
                  </h4>
                  <h2 class="mb-5"><?php if(!empty($leads[0]->casedropped)){  echo number_format($leads[0]->casedropped, 2, '.', ''); }else{ echo '0.00'; }?></h2>
                  </div>
              </div>
            </div>
              
             <div class="col-md-3 stretch-card grid-margin">
              <div class="card bg-gradient-danger card-img-holder text-white">
                <div class="card-body">
                <!-- <img src="<?php echo base_url(); ?>support_assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image"/> -->                                    
                  <h4 class="font-weight-normal mb-3">Lost Leads
                    <i class="fa fa-2x fa-unlink mdi-24px float-right"></i>
                  </h4>
                  <h2 class="mb-5"><?php if(!empty($leads[0]->lostlead)){  echo number_format($leads[0]->lostlead, 2, '.', ''); }else{ echo '0.00'; }?></h2>
                  </div>
              </div>
            </div>
              
              
                <div class="col-md-3 stretch-card grid-margin">
              <div class="card bg-gradient-danger card-img-holder text-white">
                <div class="card-body">
                <!-- <img src="<?php echo base_url(); ?>support_assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image"/> -->                                    
                  <h4 class="font-weight-normal mb-3">Importance Lead
                    <i class="fa fa-2x fa-inbox mdi-24px float-right"></i>
                  </h4>
                  <h2 class="mb-5"><?php if(!empty($leads[0]->importance)){  echo number_format($leads[0]->importance, 2, '.', ''); }else{ echo '0.00'; }?></h2>
                  </div>
              </div>
            </div>
              
           <div class="col-md-3 stretch-card grid-margin">
              <div class="card bg-gradient-info card-img-holder text-white">
                <div class="card-body">
                <!-- <img src="<?php echo base_url(); ?>support_assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image"/> -->                                    
                  <h4 class="font-weight-normal mb-3">Negotiation Leads
                    <i class="fa fa-2x fa-handshake-o mdi-24px float-right"></i>
                  </h4>
                  <h2 class="mb-5"><?php if(!empty($leads[0]->negotiation)){  echo number_format($leads[0]->negotiation, 2, '.', ''); }else{ echo '0.00'; }?></h2>
                  </div>
              </div>
            </div>
              
           <div class="col-md-3 stretch-card grid-margin">
              <div class="card bg-gradient-success card-img-holder text-white">
                <div class="card-body">
                <!-- <img src="<?php echo base_url(); ?>support_assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image"/> -->                                    
                  <h4 class="font-weight-normal mb-3">Deal Done Leads
                    <i class="fa fa-2x fa-check mdi-24px float-right"></i>
                  </h4>
                  <h2 class="mb-5"><?php if(!empty($leads[0]->dealdone)){  echo number_format($leads[0]->dealdone, 2, '.', ''); }else{ echo '0.00'; }?></h2>
                  </div>
              </div>
            </div>
              
             <div class="col-md-3 stretch-card grid-margin">
              <div class="card bg-gradient-primary card-img-holder text-white">
                <div class="card-body">
                <!-- <img src="<?php echo base_url(); ?>support_assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image"/> -->                                    
                  <h4 class="font-weight-normal mb-3">Quotation Sending Leads
                    <i class="fa fa-2x fa-envelope-o mdi-24px float-right"></i>
                  </h4>
                  <h2 class="mb-5"><?php if(!empty($leads[0]->quotationsending)){  echo number_format($leads[0]->quotationsending, 2, '.', ''); }else{ echo '0.00'; }?></h2>
                  </div>
              </div>
            </div>

           
          </div>
      
            
         
          <!--<div class="row">
            <div class="col-md-7 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <div class="clearfix">
                    <h4 class="card-title float-left">Visit And Sales Statistics</h4>
                    <div id="visit-sale-chart-legend" class="rounded-legend legend-horizontal legend-top-right float-right"></div>                                     
                  </div>
                  <canvas id="visit-sale-chart" class="mt-4"></canvas>
                </div>
              </div>
            </div>
            <div class="col-md-5 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Traffic Sources</h4>
                  <canvas id="traffic-chart"></canvas>
                  <div id="traffic-chart-legend" class="rounded-legend legend-vertical legend-bottom-left pt-4"></div>                                                      
                </div>
              </div>
            </div>
          </div>-->
        
        
        </div>
       