<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Export
      <small>Excel</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Export to Excel</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <!-- Small boxes (Stat box) -->
    <div class="row">
      <div class="col-md-12 col-xs-12">

        <div id="messages"></div>

        <?php if ($this->session->flashdata('success')) : ?>
          <div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <?php echo $this->session->flashdata('success'); ?>
          </div>
        <?php elseif ($this->session->flashdata('error')) : ?>
          <div class="alert alert-error alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <?php echo $this->session->flashdata('error'); ?>
          </div>
        <?php endif; ?>


        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Data</h3>
          
          </div>
          <!-- /.box-header -->
          <form role="form" method="post" enctype="multipart/form-data">
            <div class="box-body">

            <div class="table-responsive">
    <table class="table table-hover tablesorter">
        <thead>
            <tr>
                <th class="header">id</th>
                <th class="header">bill_no</th>
                <th class="header">customer_name</th>   
                <th class="header">customer_address</th>
                <th class="header">customer_phone</th>
                <th class="header">date_time</th>
                <th class="header">gross_amount</th>
                <th class="header">SGST %</th>
                <th class="header">SGST Charged</th>
                <th class="header">CGST %</th>
                <th class="header">CGST Charged</th>
                <th class="header">net_amount</th>
                <th class="header">discount</th>
                <th class="header">paid_status</th>
                <th class="header">user_id</th>

            </tr>
        </thead>
        
        <tbody>
            <?php
            if (isset($mobiledata) && !empty($mobiledata)) {
                foreach ($mobiledata as $key => $val) {
                    ?>
                    <tr>
                        <td><?php echo $val['id']; ?></td>   
                        <td><?php echo $val['bill_no']; ?></td> 
                        <td><?php echo $val['customer_name']; ?></td>
                        <td><?php echo $val['customer_address']; ?></td>                       
                        <td><?php echo $val['customer_phone']; ?></td>
                        <td><?php echo $val['date_time']; ?></td>
                        <td><?php echo $val['gross_amount']; ?></td>
                        <td><?php echo $val['service_charge_rate']; ?></td>
                        <td><?php echo $val['service_charge']; ?></td>
                        <td><?php echo $val['vat_charge_rate']; ?></td>
                        <td><?php echo $val['vat_charge']; ?></td>
                        <td><?php echo $val['net_amount']; ?></td>
                        <td><?php echo $val['discount']; ?></td>
                        <td><?php echo $val['paid_status']; ?></td>
                        <td><?php echo $val['user_id']; ?></td>

                    </tr>
                    <?php
                }
            } else {
                ?>
                <tr>
                    <td colspan="5" class="alert alert-danger">No Records founds</td>    
                </tr>
            <?php } ?>
 
        </tbody>
    </table>
    
</div> 


            </div>
            <!-- /.box-body -->

            <div class="box-footer">
              <a class="pull-left btn btn-primary btn-large" style="margin-right:40px" href="<?php echo site_url()?>dashboard">Dashboard</a>
              <a class="pull-left btn btn-warning btn-large" style="margin-right:40px" href="<?php echo site_url()?>exports/createxls"><i class="fa fa-file-excel-o"></i> Export Data</a>
              
            </div>
          </form>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
      </div>
      <!-- col-md-12 -->
    </div>
    <!-- /.row -->


  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<script type="text/javascript">
  $(document).ready(function() {
    // $(".select_group").select2();

    $("#exportNav").addClass('active');
    // $("#manageProductNav").addClass('active');

  });
</script>