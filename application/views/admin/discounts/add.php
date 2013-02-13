<div>
    <ul class="breadcrumb">
        <li><a href="/admin/dashboard">Dashboard</a> <span class="divider">/</span></li>
        <li><a href="/admin/discounts">Discounts</a></li>
    </ul>
</div>

<div class="row-fluid sortable">

    <div class="box span12">

        <div class="box-header well" data-original-title>
            <h2><i class="icon-edit"></i> Add Discount</h2>
        </div>

        <div class="box-content">

            <form enctype="multipart/form-data" id="addproduct" class="form-horizontal" action="" method="post">

                <div class="control-group">
                    <label class="control-label add" for="amount">Title</label>

                    <div class="controls">
                        <input type="text" id="title" name="title" placeholder="Title" value="<?php echo set_value("title") ?>" >
                        <span class="help-inline validation"><?php echo form_error('title'); ?></span>
                    </div>
                </div>

                <div class="control-group">
                    <label class="control-label add" for="amount">Amount</label>

                    <div class="controls">
                        <input type="text" id="amount" name="amount" placeholder="Amount" value="<?php echo set_value("amount") ?>" >
                        <span class="help-inline validation"><?php echo form_error('amount'); ?></span>
                    </div>
                </div>

                <div class="control-group">
                    <label class="control-label add" for="expire_date">Expire Date</label>

                    <div class="controls">
                        <input type="text" id="expire_date" name="expire_date" placeholder="yyyy-mm-dd" class="datepicker hasDatepicker" value="<?php echo set_value("expire_date") ?>">
                        <span class="help-inline validation"><?php echo form_error('expire_date'); ?></span>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label add" for="is_enabled">Enable</label>

                    <div class="controls">
                        <input type="radio" name="is_enabled" value='yes' <?php echo (!empty($_POST['is_enabled']) AND $_POST['is_enabled'] == 'yes') ? 'checked="checked"' : '' ?>>Yes &nbsp;&nbsp;&nbsp;&nbsp;
                        <input type="radio" name="is_enabled" value='no' <?php echo (empty($_POST['is_enabled']) or $_POST['is_enabled']== 'no') ? 'checked="checked"' : '' ?>> No

                    </div>
                </div>


                <div class="control-group">
                    <label class="control-label add" for="discount_type">Discount Type</label>

                    <div class="controls">
                        <select id="discount_type" name="discount_type">
                            <option value="percent">Percent</option>
                            <option value="discount-amount">Discount Amount</option>
                        </select>
                        <span class="help-inline validation"><?php echo form_error('discount_type'); ?></span>
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

<script type="text/javascript">
    $(function() {
        $( "#expire-date" ).datepicker({
            changeMonth: true,
            changeYear: true,
            dateFormat: 'dd/mm/yy'
        });
    });
</script>

