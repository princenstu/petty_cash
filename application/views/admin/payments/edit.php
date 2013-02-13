<div>
    <ul class="breadcrumb">
        <li>
            <a href="/admin/dashboard">Dashboard</a> <span class="divider">/</span>
        </li>
        <li>
            <a href="/admin/payments/edit">Payments</a>
        </li>
    </ul>
</div>

<div class="row-fluid sortable">
    <div class="box span12">
        <div class="box-header well" data-original-title>
            <h2><i class="icon-edit"></i>Payment</h2>

            <div class="box-icon">
                <a href="#" class="btn btn-setting btn-round"><i class="icon-cog"></i></a>
                <a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
                <a href="#" class="btn btn-close btn-round"><i class="icon-remove"></i></a>
            </div>
        </div>
        <div class="box-content">
            <form class="form-horizontal" action="<?php echo base_url();?>admin/payments/update" method="post">
                <input type="hidden" name="payment_id" value="<?php echo $row->payment_id;?>">
                <div class="control-group">
                    <label class="control-label add " for="first_name">First Name</label>
                    <div class="controls">
                        <input type="text" name="first_name" value="<?php echo $row->first_name;?>" id="first_name" placeholder="First Name">
                        <span class="help-inline validate">  <?php echo form_error('first_name'); ?> </span>

                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label add" for="mid_name">Mid Name</label>
                    <div class="controls">
                        <input type="text" value="<?php echo $row->mid_name;?>"  name="mid_name" id="mid_name" placeholder="Mid Name">
                        <span class="help-inline validate"> <?php echo form_error('mid_name'); ?> </span>

                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label add" for="last_name">Last Name</label>
                    <div class="controls">
                        <input type="text" value="<?php echo $row->last_name;?>"  name="last_name" id="last_name" placeholder="Last Name">
                        <span class="help-inline validate"> <?php echo form_error('last_name'); ?> </span>

                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label add" for="address1">Address1</label>
                    <div class="controls">
                        <input type="text" value="<?php echo $row->address1;?>"  name="address1" id="address1" placeholder="Address1">
                        <span class="help-inline validate"> <?php echo form_error('address1'); ?> </span>

                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label add" for="address2">Address2</label>
                    <div class="controls">
                        <input type="text" value="<?php echo $row->address2;?>"  name="address2" id="address2" placeholder="Address2">
                        <span class="help-inline validate"> <?php echo form_error('address2'); ?> </span>

                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label add" for="amount">Amount</label>
                    <div class="controls">
                        <input type="text" value="<?php echo $row->amount;?>"  name="amount" id="payment_date" placeholder="Payment Date">
                        <span class="help-inline validate"> <?php echo form_error('amount'); ?> </span>

                    </div>
                </div>
                <div class="control-group">
                    <div class="controls">
                        <!--            <label class="checkbox">-->
                        <!--                <input type="checkbox"> Remember me-->
                        <!--            </label>-->
                        <button type="submit" class="btn">Update</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!--/span-->

</div><!--/row-->








<h3>Update payment Information</h3>
<form class="form-horizontal" action="<?php echo base_url();?>admin/payments/update" method="post" onSubmit=" return validateStandard(this)" enctype="multipart/form-data">

</form>
