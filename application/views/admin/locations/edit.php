<?php //var_dump($locations_de);die;?>
<div>
    <ul class="breadcrumb">
        <li>
            <a href="/admin/dashboard">Dashboard</a> <span class="divider">/</span>
        </li>
        <li>
            <a href="/admin/locations/edit">Edit Location</a>
        </li>
    </ul>
</div>

<div class="row-fluid sortable">
    <div class="box span12">
        <div class="box-header well" data-original-title>
            <h2><i class="icon-edit"></i> Edit Location</h2>

        </div>
        <div class="box-content">
            <form class="form-horizontal" action="" method="post" onSubmit=" return validateStandard(this)" enctype="multipart/form-data">
        <input type="hidden" name="location_id" value="<?php echo $locations['location_id'];?>">
                <fieldset style="border: 1px solid #CCCCCC; border-radius: 3px 3px 3px 3px; margin-bottom: 5px; margin-right: 15px">
                    <legend style="border: 1px solid #CCCCCC; padding-left: 20px; border-radius: 3px 3px 3px 3px;">German</legend>
    <div class="control-group">
        <label class="control-label add " for="name">Name</label>
        <div class="controls">
            <input type="text" name="name_de" value="<?php echo (!empty($locations_de->name)) ? $locations_de->name : '' ; ?>"  id="name" placeholder="Name">
           <span class="help-inline validate">  <?php echo form_error('name'); ?> </span>

        </div>
    </div>

     <div class="control-group">
        <label class="control-label add" for="description">Description</label>
        <div class="controls">
            <textarea rows="10" cols="3" id="description" name="description_de" placeholder="Write something about your location" class="input-xxlarge"><?php echo (!empty($locations_de->description)) ? $locations_de->description : '';?></textarea>
           <span class="help-inline validate"> <?php echo form_error('description'); ?> </span>

        </div>
    </div>
</fieldset>
<fieldset style="border: 1px solid #CCCCCC; border-radius: 3px 3px 3px 3px; margin-bottom: 5px; margin-right: 15px">
    <legend style="border: 1px solid #CCCCCC; padding-left: 20px; border-radius: 3px 3px 3px 3px;">English</legend>
    <div class="control-group">
        <label class="control-label add " for="name">Name</label>
        <div class="controls">
            <input type="text" name="name" value="<?php echo $locations['name'];?>"  id="name" placeholder="Name">
            <span class="help-inline validate">  <?php echo form_error('name'); ?> </span>

        </div>
    </div>

    <div class="control-group">
        <label class="control-label add" for="description">Description</label>
        <div class="controls">
            <textarea rows="10" cols="3" id="description" name="description" placeholder="Write something about your location" class="input-xxlarge"><?php echo $locations['description'];?></textarea>
            <span class="help-inline validate"> <?php echo form_error('description'); ?> </span>

        </div>
    </div>
</fieldset>
     <div class="control-group">
         <label class="control-label add" for="image">Image</label>
        <div class="controls">


            <input type="file" name="image"  id="image">


        </div>
     </div>
            <div class="control-group">
      <div class="controls">
          <?php if (!empty($locations['image'])):  ?>

          <span style="margin-left:80px;"><img src="/uploads/<?php echo ThumbHelper::getThumb($locations['image']); ?>" /></span>
          <?php endif; ?>
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
