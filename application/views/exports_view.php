<!DOCTYPE html>
<html lang="en">  
<head>
  <link rel="stylesheet" href="<?php echo base_url();?>assets/css/style.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<title>How to export data in Codeigniter using PHPExcel Library</title>
<body>

<div class="table-responsive">
    <table class="table table-hover tablesorter">
        <thead>
            <tr>
                <th class="header">id</th>
                <th class="header">username</th>
                <th class="header">password</th>   
                <th class="header">email</th>
                <th class="header">firstname</th>
                <th class="header">lastname</th>
                <th class="header">phone</th>
                <th class="header">Gender</th>
            </tr>
        </thead>
        <a class="pull-right btn btn-warning btn-large" style="margin-right:40px" href="<?php echo site_url()?>exports/createxls"><i class="fa fa-file-excel-o"></i> Export Data</a>
        <tbody>
            <?php
            if (isset($mobiledata) && !empty($mobiledata)) {
                foreach ($mobiledata as $key => $val) {
                    ?>
                    <tr>
                        <td><?php echo $val['id']; ?></td>   
                        <td><?php echo $val['username']; ?></td> 
                        <td><?php echo $val['password']; ?></td>
                        <td><?php echo $val['email']; ?></td>                       
                        <td><?php echo $val['firstname']; ?></td>
                        <td><?php echo $val['lastname']; ?></td>
                        <td><?php echo $val['phone']; ?></td>
                        <td><?php echo $val['gender']; ?></td>
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
</body>
</html>