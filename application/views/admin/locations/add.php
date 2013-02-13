    <div>
            <ul class="breadcrumb">
                <li>
                    <a href="/admin/dashboard">Dashboard</a> <span class="divider">/</span>
                </li>
                <li>
                    <a href="/admin/locations/add_form">Add Location</a>
                </li>
            </ul>
    </div>

<div class="row-fluid sortable">
    <div class="box span12">
        <div class="box-header well" data-original-title>
            <h2><i class="icon-edit"></i> Add Location</h2>

        </div>
        <div class="box-content">

<form class="form-horizontal" action="" method="post"  enctype="multipart/form-data">

    <fieldset style="border: 1px solid #CCCCCC; border-radius: 3px 3px 3px 3px; margin-bottom: 5px; margin-right: 15px">
        <legend style="border: 1px solid #CCCCCC; padding-left: 20px; border-radius: 3px 3px 3px 3px;">German</legend>
        <div class="control-group">
            <label class="control-label add " for="name">Name</label>
            <div class="controls">
                <input type="text" name="name_de" id="name" placeholder="Name" class="input-xxlarge">
               <span class="help-inline validate message">  <?php echo form_error('name'); ?> </span>

            </div>
        </div>

         <div class="control-group">
        <label class="control-label add" for="description">Description</label>
        <div class="controls">
            <textarea rows="10" cols="3" id="description" name="description_de" placeholder="Write something about your location" class="input-xxlarge"></textarea>
           <span class="help-inline validate"> <?php echo form_error('description'); ?> </span>

        </div>
    </div>
</fieldset>
    <fieldset style="border: 1px solid #CCCCCC; border-radius: 3px 3px 3px 3px; margin-bottom: 5px; margin-right: 15px">
        <legend style="border: 1px solid #CCCCCC; padding-left: 20px; border-radius: 3px 3px 3px 3px;">English</legend>
        <div class="control-group">
            <label class="control-label add " for="name">Name</label>
            <div class="controls">
                <input type="text" name="name" id="name" placeholder="Name" class="input-xxlarge">
                <span class="help-inline validate message">  <?php echo form_error('name'); ?> </span>

            </div>
        </div>

        <div class="control-group">
            <label class="control-label add" for="description">Description</label>
            <div class="controls">
                <textarea rows="10" cols="3" id="description" name="description" placeholder="Write something about your location" class="input-xxlarge"></textarea>
                <span class="help-inline validate"> <?php echo form_error('description'); ?> </span>

            </div>
        </div>
    </fieldset>
        <div class="control-group">
            <label class="control-label add" for="image">Image</label>
            <div class="controls">
                <input type="file" id="image" name="image" required="1">

            </div>

        </div>

        <div class="control-group">
            <div class="controls">

                <button type="submit" class="btn">Add</button>
            </div>
        </div>
</form>
        </div>
    </div>
    <!--/span-->

</div><!--/row-->
