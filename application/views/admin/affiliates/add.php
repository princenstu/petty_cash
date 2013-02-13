<style type="text/css">
    .validation{
        color:red;
    }

</style>
<div>
    <ul class="breadcrumb">
        <li><a href="/admin/dashboard">Dashboard</a> <span class="divider">/</span></li>
        <li><a href="/admin/affiliates">Affiliates</a></li>
    </ul>
</div>

<div class="row-fluid sortable">

    <div class="box span12">

        <div class="box-header well" data-original-title>
            <h2><i class="icon-edit"></i>Affiliates</h2>
        </div>

        <div class="box-content">

            <form enctype="multipart/form-data" id="addproduct" class="form-horizontal" action="" method="post">
                <fieldset style="border: 1px solid #CCCCCC; margin:0 15px 5px 0">
                    <legend style="border: 1px solid #CCCCCC; padding-left: 20px;">English</legend>
                    <div class="control-group">
                        <label class="control-label add" for="name">Name</label>

                        <div class="controls">
                            <input type="text" id="name" name="name" placeholder="Affiliates Name" class="input-xxlarge">
                            <span class="help-inline validation"> <?php echo form_error('name'); ?></span>
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label add" for="email">Email</label>

                        <div class="controls">
                            <input type="text" id="email" name="email" placeholder="Affiliates email" class="input-xxlarge">
                            <span class="help-inline validation"><?php echo form_error('email'); ?></span>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label add" for="phone">Phone</label>

                        <div class="controls">
                            <input type="text" id="phone" name="phone" placeholder="Affiliates Phone" class="input-xxlarge">
                            <span class="help-inline validation"><?php echo form_error('phone'); ?></span>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label add" for="details">Detail</label>
                        <div class="controls">
                            <textarea rows="10" cols="3" id="details" name="details"
                                      placeholder="Write something" class="input-xxlarge"></textarea>
                            <span class="help-inline validation"><?php echo form_error('details'); ?></span>
                        </div>

                    </div>
                    <div class="control-group">
                        <label class="control-label add" for="Percentage">Percentage</label>

                        <div class="controls">
                            <input type="text" id="Percentage" name="percentage" placeholder="Affiliates Percentage">
                            <span class="help-inline validation"><?php echo form_error('percentage'); ?></span>
                        </div>

                </fieldset>

                    <div class="control-group">
                    <div class="controls">
                        <button type="submit" class="btn btn-primary">Add Affiliates</button>
                    </div>
                </div>

            </form>

        </div>

    </div>
    <!--/span-->

</div><!--/row-->

