<style type="text/css">
    .validation{
        color:red;
    }
</style>
<div>
    <ul class="breadcrumb">
        <li><a href="/admin/dashboard">Dashboard</a> <span class="divider">/</span></li>
        <li><a href="/admin/projects">Projects</a></li>
    </ul>
</div>
<div class="row-fluid sortable">
    <div class="box span12">
        <div class="box-header well" data-original-title>
            <h2><i class="icon-edit"></i> Edit Project</h2>
        </div>
        <div class="box-content">
            <form enctype="multipart/form-data" id="addcompany" class="form-horizontal" action="" method="post">
                <input type="hidden" name="project_id" value="<?php echo $project['project_id'] ?>">


                <div class="control-group">
                    <label class="control-label add" for="name">Project Name</label>
                    <div class="controls">
                        <input type="text" id="name" name="name" placeholder="Project Name" value="<?php echo $project['name'] ?>">
                        <span class="help-inline validation"><?php echo form_error('name'); ?></span>
                    </div>
                </div>



                <div class="control-group">
                    <label class="control-label add" for="company_id">Company Name</label>
                    <div class="controls">
                        <select id="company_id" name="company_id">
                            <?php
                            foreach ($companies as $company) {
                                ?>
                                <option value="<?php echo $company->company_id;?>"<?php echo ($company->company_id == $project['company_id']) ? 'selected="selected"' : '' ?>><?php echo $company->name; ?></option>
                                <?php
                            }
                            ?>
                        </select>
                    </div>
                </div>


                <div class="control-group">
                    <div class="controls">
                        <button type="submit" class="btn btn-primary">Update Project</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!--/span-->
</div><!--/row-->