<?php $this->load->view('header');?>
<div id="content" class="span10">
<div>
<ul class="breadcrumb">
<li>
<a href="/admin/dashboard">Dashboard</a> <span class="divider">/</span>
</li>
<li>
<a href="auth/user_info">Add User</a>
</li>
</ul>
</div>

<div class="row-fluid sortable">
<div class="box span12">
<div class="box-header well" data-original-title>
<h2><i class="icon-edit"></i> Add User</h2>
</div>
<div class="box-content">
<form enctype="multipart/form-data" id="addproduct" class="form-horizontal" action="../auth/create_user"
  method="post" name="adduser">

<div class="control-group">
    <label class="control-label add" for="first_name">First Name</label>
    <div class="controls">
        <input type="text" id="first_name" name="first_name" placeholder="First Name">
        <span class="help-inline validation"> <?php echo form_error('first_name'); ?></span>
    </div>
</div>

<div class="control-group">
    <label class="control-label add" for="last_name">Last Name</label>
    <div class="controls">
        <input type="text" id="last_name" name="last_name" placeholder="Last Name">
        <span class="help-inline validation"> <?php echo form_error('last_name'); ?></span>
    </div>
</div>

<div class="control-group">
    <label class="control-label add" for="email">Email</label>

    <div class="controls">
        <input type="text" id="email" name="email" placeholder="Email">

        <span class="help-inline validation"><?php echo form_error('email'); ?></span>
    </div>
</div>

<div class="control-group">
    <label class="control-label add" for="password">Password</label>

    <div class="controls">
        <input type="password" id="password" name="password" placeholder="Password";>
        <span class="help-inline validation"><?php echo form_error('password'); ?></span>
    </div>
</div>

<div class="control-group">
    <label class="control-label add" for="password_confirm">Confirm Password</label>

    <div class="controls">
        <input type="password" id="password_confirm" name="password_confirm" placeholder="Password Confirm">
        <span class="help-inline validation"><?php echo form_error('password_confirm'); ?></span>
    </div>
</div>

<div class="control-group">
    <label class="control-label add" for="group">Group</label>
    <div class="controls">
        <select id="group" name="group">
            <?php
            foreach($groups as $group)
            {

                echo "<option value='$group->id'>$group->name</option>";

            }

            ?>

        </select>
        <span class="help-inline validation"><?php echo form_error('status'); ?></span>
    </div>
</div>
<div class="control-group">
    <label class="control-label add" for="location">Location</label>
    <div class="controls">
        <select id="location" name="location">
            <?php
            foreach($locations as $location)
            {

                echo "<option value='$location[location_id]'>$location[name]</option>";

            }

            ?>
            </select>
    </div>
</div>

<div class="control-group">
    <div class="controls">
        <button type="submit" class="btn btn-primary">Add User</button>
        <a href="/admin/dashboard" class="btn">Cancel</a></div>
    </div>
</div>

</form>
</div>
</div>
</div>
<?php $this->load->view('footer');?>

