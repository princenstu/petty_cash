<h3>Update Rental Information</h3>

<form class="form-horizontal" action="<?php echo base_url();?>admin/rentals/update" method="post" onSubmit=" return validateStandard(this)" >

    <input type="hidden" name="rental_id" value="<?php echo $row->rental_id;?>">
    <div class="control-group">
        <label class="control-label add " for="id">Order ID</label>
        <div class="controls">
            <input type="text" name="order_id" value="<?php echo $row->order_id;?>"  id="id" placeholder="Order ID">
           <span class="help-inline validate">  <?php echo form_error('order_id'); ?> </span>

        </div>
    </div>
     <div class="control-group">
        <label class="control-label add" for="first_name">First Name</label>
        <div class="controls">
            <input type="text" name="first_name" value="<?php echo $row->first_name;?>" id="first_name" placeholder="Type First Name">
           <span class="help-inline validate"> <?php echo form_error('first_name'); ?> </span>

        </div>
    </div>
     <div class="control-group">
        <label class="control-label add" for="last_name">Last Name</label>
        <div class="controls">
            <input type="text" name="last_name" value="<?php echo $row->last_name;?>" id="last_name" placeholder="Type Last Name">
                  <span class="help-inline validate"> <?php echo form_error('last_name'); ?> </span>

        </div>
    </div>
     <div class="control-group">
        <label class="control-label add" for="skill">Skill</label>
        <div class="controls">
            <input type="text" name="skill" value="<?php echo $row->skill;?>" id="skill" placeholder="Type skill">
                 <span class="help-inline validate"> <?php echo form_error('skill'); ?> </span>

        </div>
    </div>
     <div class="control-group">
        <label class="control-label add" for="height">Height</label>
        <div class="controls">
            <input type="text" name="height" value="<?php echo $row->height;?>" id="height" placeholder="Type Height">
                  <span class="help-inline validate"> <?php echo form_error('height'); ?></span>

        </div>
    </div>
     <div class="control-group">
        <label class="control-label add"  for="weight">Weight</label>
        <div class="controls">
            <input type="text" name="weight" value="<?php echo $row->weight;?>" id="weight" placeholder="Type Weight">
                 <span class="help-inline validate">   <?php echo form_error('weight'); ?> </span>

        </div>
    </div>
     <div class="control-group">
        <label class="control-label add" for="shoe_size">Shoe Size</label>
        <div class="controls">
            <input type="text" name="shoe_size" value="<?php echo $row->shoe_size;?>" id="shoe_size" placeholder="Type Shoe Size">
          <span class="help-inline validate">     <?php echo form_error('shoe_size'); ?> </span>

        </div>
    </div>
     <div class="control-group">
        <label class="control-label add" for="notes">Notes</label>
        <div class="controls">
            <input type="text" name="notes" value="<?php echo $row->notes;?>" id="notes" placeholder="Type Notes">
               <span class="help-inline validate"> <?php echo form_error('notes'); ?> </span>

        </div>
    </div>
     <div class="control-group">
        <label class="control-label add" for="start_date">Start Date </label>
        <div class="controls">
            <input type="text" name="start_date" value="<?php echo $row->start_date;?>" id="start_date" placeholder="Type Start Date">
                <span class="help-inline validate"> <?php echo form_error('start_date'); ?> </span>

        </div>
    </div>
     <div class="control-group">
        <label class="control-label add" for="end_date">End Date</label>
        <div class="controls">
            <input type="text" name="end_date" value="<?php echo $row->end_date;?>" id="end_date" placeholder="Type End Date">
                <span class="help-inline validate"> <?php echo form_error('end_date'); ?> </span>

        </div>
    </div>
     <div class="control-group">
        <label class="control-label add" for="type">Type Name</label>
        <div class="controls">
            <input type="text" name="type" value="<?php echo $row->type;?>" id="type" placeholder="Type Name">
                 <span class="help-inline validate"> <?php echo form_error('type'); ?> </span>

        </div>
    </div>

    <div class="control-group">
        <div class="controls">
<!--            <label class="checkbox">-->
<!--                <input type="checkbox"> Remember me-->
<!--            </label>-->
            <button type="submit" class="btn">Update Information</button>
        </div>
    </div>
</form>
