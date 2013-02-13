
<div>
    <ul class="breadcrumb">
        <li>
            <a href="/admin/dashboard">Dashboard</a> <span class="divider">/</span>
        </li>
        <li>
            <a href="/admin/payments/add_form">Add Payment</a>
        </li>
    </ul>
</div>

<div class="row-fluid sortable">
    <div class="box span12">
        <div class="box-header well" data-original-title>
            <h2><i class="icon-edit"></i>Add Payment</h2>

        </div>
        <div class="box-content">
            <form class="form-horizontal" action="" method="post">

                <div class="control-group">

                    <label class="control-label add " for="first_name">First Name</label>
                    <div class="controls">
                        <input type="text" name="first_name" id="first_name" placeholder="First Name">
                        <span class="help-inline validate">  <?php echo form_error('first_name'); ?> </span>

                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label add" for="mid_name">Mid Name</label>
                    <div class="controls">
                        <input type="text" name="mid_name" id="mid_name" placeholder="Mid Name">
                        <span class="help-inline validate"> <?php echo form_error('mid_name'); ?> </span>

                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label add" for="last_name">Last Name</label>
                    <div class="controls">
                        <input type="text" name="last_name" id="last_name" placeholder="Last Name">
                        <span class="help-inline validate"> <?php echo form_error('last_name'); ?> </span>

                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label add" for="address1">Address1</label>
                    <div class="controls">
                        <input type="text" name="address1" id="address1" placeholder="Address1">
                        <span class="help-inline validate"> <?php echo form_error('address1'); ?> </span>

                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label add" for="address2">Address2</label>
                    <div class="controls">
                        <input type="text" name="address2" id="address2" placeholder="Address2">
                        <span class="help-inline validate"> <?php echo form_error('address2'); ?> </span>

                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label add" for="amount">Amount</label>
                    <div class="controls">
                        <input type="text" name="amount" id="amount" placeholder="Payment Amount">
                        <span class="help-inline validate"> <?php echo form_error('amount'); ?> </span>

                    </div>
                </div>
                <div class="control-group">
                    <div class="controls">

                        <button type="submit" class="btn btn-primary">Add</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!--/span-->

</div><!--/row-->

