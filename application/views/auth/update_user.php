<?php // var_dump($locations);die;?>
<?php $this->load->view('header');?>
<div id="content" class="span10">
    <div>
        <ul class="breadcrumb">
            <li>
                <a href="/admin/dashboard">Dashboard</a> <span class="divider">/</span>
            </li>
            <li>
                <a href="auth/user_info">Users</a>

            </li>
        </ul>
    </div>

    <div class="row-fluid sortable">
        <div class="box span12">
            <div class="box-header well" data-original-title>
                <h2><i class="icon-edit"></i> Update User</h2>
            </div>
            <div class="box-content">
                <form enctype="multipart/form-data" id="addproduct" class="form-horizontal" action=""
                      method="post" name="adduser">
                    <input type="hidden" name="id" value="<?php echo $users->id;?>">

                  <div class="control-group">

                        <label class="control-label add" for="first_name">First Name</label>
                        <div class="controls">
                            <input type="text" id="first_name" name="first_name" value="<?php echo $users->first_name;?>">
                            <span class="help-inline validation"> <?php echo form_error('first_name'); ?></span>
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label add" for="last_name">Last Name</label>
                        <div class="controls">
                            <input type="text" id="last_name" name="last_name" value="<?php echo $users->last_name;?>">
                            <span class="help-inline validation"> <?php echo form_error('last_name'); ?></span>
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label add" for="email">Email</label>

                        <div class="controls">
                            <input type="text" id="email" name="email" value="<?php echo $users->email;?>">

                            <span class="help-inline validation"><?php echo form_error('email'); ?></span>
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label add" for="password">Password</label>

                        <div class="controls">
                            <input type="password" id="password" name="password" value="">
                            <span class="help-inline validation"><?php echo form_error('password'); ?></span>
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label add" for="password_confirm">Confirm Password</label>

                        <div class="controls">
                            <input type="password" id="password_confirm" name="password_confirm" >
                            <span class="help-inline validation"><?php echo form_error('password_confirm'); ?></span>
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label add" for="group">Group</label>
                        <div class="controls">
                            <select id="group" name="group">

                            <?php

                                foreach ($groups as $group) {
                                    ?>

                                    <option value="<?php echo $group->id; ?>"<?php echo ($group->name == $users->group)? 'selected="selected"' : '' ?>><?php echo $group->name; ?></option>
                                    ";
                                    <?php
                                }
                                ?>
                            </select>
                            <span class="help-inline validation"><?php echo form_error('status'); ?></span>
                        </div>
                    </div>


                    <div class="control-group">
                        <div class="controls">
                            <button type="submit" class="btn btn-primary">Update</button>

                            <a href="/admin/dashboard" class="btn">Cancel</a></div>
                    </div>
            </div>

            </form>
        </div>
    </div>
</div>

<?php $this->load->view('footer');?>
