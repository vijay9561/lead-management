
        <div class="content-wrapper">
          <div class="page-header">
            <h3 class="page-title">
              <span class="page-title-icon bg-gradient-primary text-white mr-2">
                <i class="fa fa-users"></i>                 
              </span>
            Employee
            </h3>
          </div>
          <div class="row">
           <div class="col-md-12">
            <?php if(isset($_GET['add'])){
                ?>   
            <div class="card">
            <div class="card-header">
              <i class="fa fa-shopping-bag"></i> Add New Employee
            </div>
              <div class="card-body">
               <div class="alert alert-danger" id="error_message_change" style="display:none;"></div> 
                <div class="alert alert-success" id="success_message_submit" style="display:none;"></div> 
               <form method="post" id="add_emplyee_form">
                <div class="row">  
                <div class="form-group col-md-6">
                <label>Employee Name </label>  
                <input type="text" class="form-control" value="" name="full_name" id="full_name" placeholder="Employee Name">
                </div>
                 <div class="form-group col-md-6">
                <label>Employee Mobile No </label>  
                <input type="text" class="form-control" value="" name="mobile_no" id="mobile_no" placeholder="Mobile No">
                </div>
                </div>     
                   
                <div class="row">  
                <div class="form-group col-md-6">
                <label>Email ID </label>  
                <input type="email" class="form-control" value="" name="email_address" id="email_address" placeholder="Employee Name">
                </div>
                 <div class="form-group col-md-6">
                <label>Employee Password </label>  
                <input type="password" class="form-control" value="" name="password" id="password" placeholder="Mobile No">
                </div>
                </div>     
                   
                <div class="row">  
                <div class="form-group col-md-6">
                <label>Location </label>  
                <input type="text" class="form-control" value="" name="location" id="location" placeholder="Location">
                </div>
                 <div class="form-group col-md-6">
                <label>Employee Role </label>  
                <select type="password" class="form-control" value="" name="role" id="role" placeholder="Mobile No">
                    <option value="">Select Employee Role</option>   
                   <?php foreach($role as $row){ ?>
                   <option value="<?php echo $row->role_name; ?>"><?php echo $row->role_name; ?></option>    
                   <?php } ?>
                </select>
                </div>
                </div>     
                  <div class="form-group col-md-2">    
                  <button type="submit" id="submit_button" class="btn btn-gradient-primary mr-2">Add Employee</button>
                  </div>
              
                  </form>
              
              </div>     
            </div>
            <?php }elseif(isset($_GET['update'])){  $id= base64_decode($_GET['update']); 
               $q=$this->db->query("select  *from tbl_registration where id='".$id."'")->row();
            ?>
           <div class="card">
            <div class="card-header">
              <i class="fa fa-edit"></i> Update New Employee
            </div>
              <div class="card-body">
               <div class="alert alert-danger" id="error_message_change" style="display:none;"></div> 
                <div class="alert alert-success" id="success_message_submit" style="display:none;"></div> 
               <form method="post" id="update_emplyee_form">
                <div class="row">  
                <div class="form-group col-md-6">
                    <input type="hidden" name="id" value="<?php echo $id; ?>" id="id"/>
                <label>Employee Name </label>  
                <input type="text" class="form-control" value="<?php echo $q->full_name; ?>" name="full_name"  id="full_name" placeholder="Employee Name">
                </div>
                 <div class="form-group col-md-6">
                <label>Employee Mobile No </label>  
                <input type="text" class="form-control" value="<?php echo $q->mobile_no; ?>" name="mobile_no" id="mobile_no" placeholder="Mobile No">
                </div>
                </div>     
                   
                <div class="row">  
                <div class="form-group col-md-12">
                <label>Email ID </label>  
                <input type="email" class="form-control" value="<?php echo $q->email_address; ?>" name="email_address" id="email_address" placeholder="Employee Name">
                </div>
               
                </div>     
                   
                <div class="row">  
                <div class="form-group col-md-6">
                <label>Location </label>  
                <input type="text" class="form-control" value="<?php echo $q->location; ?>" name="location" id="location" placeholder="Location">
                </div>
                 <div class="form-group col-md-6">
                <label>Employee Role </label>  
                <select type="password" class="form-control" value="" name="role" id="role" placeholder="Mobile No">
                    <option value="<?php echo $q->role; ?>"><?php echo $q->role; ?></option>   
                   <?php foreach($role as $row){  if($q->role!=$row->role_name){?>
                   <option value="<?php echo $row->role_name; ?>"><?php echo $row->role_name; ?></option>    
                   <?php } } ?>
                </select>
                </div>
                </div>     
                  <div class="form-group col-md-2">    
                  <button type="submit" id="submit_button" class="btn btn-gradient-primary mr-2">Update Employee</button>
                  </div>
              
                  </form>
              
              </div>     
            </div>
            <?php }elseif(isset($_GET['view'])){ 
                 $id= base64_decode($_GET['view']); 
               $q=$this->db->query("select  *from tbl_registration where id='".$id."'")->result();
               $leads=$this->GenericModel->get_record_with_condition("tbl_lead","SUM(CASE WHEN status = 'Contacted' THEN 1 ELSE 0 END) AS 'contacted',SUM(CASE WHEN status = 'Not Contacted' THEN 1 ELSE 0 END) AS 'notcontacted',SUM(CASE WHEN status = 'E Relevant' THEN 1 ELSE 0 END) AS 'erelevant',SUM(CASE WHEN status = 'Follow Up' THEN 1 ELSE 0 END) AS 'followup',SUM(CASE WHEN status = 'Case Dropped' THEN 1 ELSE 0 END) AS 'casedropped',SUM(CASE WHEN status = 'Lost Lead' THEN 1 ELSE 0 END) AS 'lostlead',SUM(CASE WHEN status = 'Importance' THEN 1 ELSE 0 END) AS 'importance',SUM(CASE WHEN status = 'Negotiation' THEN 1 ELSE 0 END) AS 'negotiation',SUM(CASE WHEN status = 'Deal Done' THEN 1 ELSE 0 END) AS 'dealdone',SUM(CASE WHEN status = 'Quotation Sending' THEN 1 ELSE 0 END) AS 'quotationsending'","userid='".$id."'");
                ?>    
               <div class="card">
            <div class="card-header">
                <i class="fa fa-eye"></i> View Lead Details <a href="<?php echo site_url(); ?>employee" class="btn btn-gradient-danger btn-rounded btn-fw btn-sm"> Back</a>
            </div>
              <div class="card-body">
              <table class="table table-bordered">
                  <tbody>
                      <tr>
                        <th>Employee Name</th>
                       <td><?php echo $q[0]->full_name; ?></td>
                        </tr> 
                        <tr>
                        <th>Mobile No</th>
                       <td><?php echo $q[0]->mobile_no; ?></td>
                        </tr>
                     
                          <tr>
                        <th>Email ID</th>
                       <td><?php echo $q[0]->email_address; ?></td>
                        </tr>
                         <tr>
                        <th>Location</th>
                       <td><?php echo $q[0]->location; ?></td>
                        </tr>
                         <tr>
                        <th>Role</th>
                       <td><?php echo $q[0]->role; ?></td>
                        </tr>
                        <tr>
                        <th>Created Date</th>
                       <td><?php echo date('Y-m-d h:i A', strtotime($q[0]->created_date)); ?></td>
                        </tr>
                   </tbody>   
              </table>
              </div>     
            </div> 
                <div class="card">
            <div class="card-header">
                <i class="fa fa-eye"></i> Lead Statistics <a href="<?php echo site_url(); ?>employee" class="btn btn-gradient-danger btn-rounded btn-fw btn-sm"> Back</a>
            </div>
                    <div class="card-body">
                  <div class="row">
          
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
              <div class="card bg-gradient-danger card-img-holder text-white">
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
              <div class="card bg-gradient-danger card-img-holder text-white">
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
              <div class="card bg-gradient-primary card-img-holder text-white">
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
              <div class="card bg-gradient-success card-img-holder text-white">
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
              <div class="card bg-gradient-info card-img-holder text-white">
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
                        
                    </div>
                </div>
            <?php }else{ ?>  
                <div class="card">
            <div class="card-header">
                <i class="mdi mdi-table-large"></i> Employee List <a href="<?php echo site_url() ?>employee?add=new" class="btn btn-gradient-info btn-sm"> Add Employee <i class="fa fa-plus"></i></a>
            </div>
              <div class="card-body">
                  
                 <?php if($this->session->userdata('success')){ ?>
                  <div class="alert alert-success">
                      <?php echo $this->session->userdata('success'); ?>
                  </div>
                 <?php $this->session->unset_userdata('success'); } ?>
                  <div class="table-responsive">
                      <table class="table table-bordered" id="employee_table">
                          <thead>
                            <tr>
                            <th>Sr.No</th>
                            <th>Name</th>
                            <th>Mobile No</th>
                            <th>Email ID</th>
                            <th>Location</th>
                            <th>Role</th>   
                            <th style="width:22%;">Action</th>
                            </tr>
                          </thead>    
                      </table>   
                  </div>
              </div>
            </div>
            <?php } ?>
           </div>
          </div>   
        </div>
         
     