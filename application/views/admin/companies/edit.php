<style type="text/css">
    .validation{
        color:red;
    }

</style>
<div>
    <ul class="breadcrumb">
        <li><a href="/admin/dashboard">Dashboard</a> <span class="divider">/</span></li>
        <li><a href="/admin/companies">Companies</a></li>
    </ul>
</div>

<div class="row-fluid sortable">

    <div class="box span12">

        <div class="box-header well" data-original-title>
            <h2><i class="icon-edit"></i> Edit Company</h2>
        </div>

        <div class="box-content">

            <form enctype="multipart/form-data" id="editcompany" class="form-horizontal" action="" method="post">
                <input type="hidden" name="company_id" value="<?php echo $company['company_id'] ?>">
                <div class="control-group">
                    <label class="control-label add" for="name">Company Name</label>
                    <div class="controls">
                        <input type="text" id="name" name="name" placeholder="Company Name" value="<?php echo $company['name'] ?>">
                        <span class="help-inline validation"><?php echo form_error('name'); ?></span>
                    </div>
                </div>

                <div class="control-group">
                    <div class="controls">
                        <button type="submit" class="btn btn-primary">Update Company</button>
                    </div>
                </div>

            </form>

        </div>

    </div>
    <!--/span-->

</div><!--/row-->