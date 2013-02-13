<div>
    <ul class="breadcrumb">
        <li>
            <a href="/admin/dashboard">Dashboard</a> <span class="divider">/</span>
        </li>
        <li>
            <a href="/admin/rentals">Rentals</a>
        </li>
    </ul>
</div>

<div class="row-fluid sortable">
    <div class="box span12">
        <div class="box-header well" data-original-title>
            <h2><i class="icon-edit"></i> Add Rental</h2>

        </div>
        <div class="box-content">
            <form class="form-horizontal" action="" method="post" onSubmit=" return validateStandard(this)" >

     <div class="control-group">
        <label class="control-label add" for="first_name">First Name</label>
        <div class="controls">
            <input type="text" name="first_name" id="first_name" placeholder=" First Name">
           <span class="help-inline validate"> <?php echo form_error('first_name'); ?> </span>

        </div>
    </div>
     <div class="control-group">
        <label class="control-label add" for="last_name">Last Name</label>
        <div class="controls">
            <input type="text" name="last_name" id="last_name" placeholder=" Last Name">
                  <span class="help-inline validate"> <?php echo form_error('last_name'); ?> </span>

        </div>
    </div>
     <div class="control-group">
        <label class="control-label add" for="skill">Skill</label>
        <div class="controls">
            <input type="text" name="skill" id="skill" placeholder=" skill">
                 <span class="help-inline validate"> <?php echo form_error('skill'); ?> </span>

        </div>
    </div>
     <div class="control-group">
        <label class="control-label add" for="height">Height</label>
        <div class="controls">
            <input type="text" name="height" id="height" placeholder=" Height">
                  <span class="help-inline validate"> <?php echo form_error('height'); ?></span>

        </div>
    </div>
     <div class="control-group">
        <label class="control-label add" for="weight">Weight</label>
        <div class="controls">
            <input type="text" name="weight" id="weight" placeholder=" Weight">
                 <span class="help-inline validate">   <?php echo form_error('weight'); ?> </span>

        </div>
    </div>
     <div class="control-group">
        <label class="control-label add" for="shoe_size">Shoe Size</label>
        <div class="controls">
            <input type="text" name="shoe_size" id="shoe_size" placeholder=" Shoe Size">
          <span class="help-inline validate">     <?php echo form_error('shoe_size'); ?> </span>

        </div>
    </div>
     <div class="control-group">
        <label class="control-label add" for="notes">Notes</label>
        <div class="controls">
            <input type="text" name="notes" id="notes" placeholder=" Notes">
               <span class="help-inline validate"> <?php echo form_error('notes'); ?> </span>

        </div>
    </div>
     <div class="control-group">
        <label class="control-label add" for="start_date">Start Date </label>
        <div class="controls">
            <input type="text" name="start_date" id="start_date" placeholder=" Start Date">
                <span class="help-inline validate"> <?php echo form_error('start_date'); ?> </span>

        </div>
    </div>
     <div class="control-group">
        <label class="control-label add" for="end_date">End Date</label>
        <div class="controls">
            <input type="text" name="end_date" id="end_date" placeholder=" End Date">
                <span class="help-inline validate"> <?php echo form_error('end_date'); ?> </span>

        </div>
    </div>
                <div class="control-group">
                    <label class="control-label add" for="status">Type</label>
                    <div class="controls">
                        <select id="type" name="type">
                            <option value="primary">Primary</option>
                            <option value="secondary">Secondary</option>
                        </select>
                        <span class="help-inline validation"><?php echo form_error('type'); ?></span>
                    </div>
                </div>

    <div class="control-group">
        <div class="controls">
<!--            <label class="checkbox">-->
<!--                <input type="checkbox"> Remember me-->
<!--            </label>-->
            <button type="submit" class="btn">Submit</button>
        </div>
    </div>
</form>
        </div>
    </div>
    <!--/span-->

</div><!--/row-->

