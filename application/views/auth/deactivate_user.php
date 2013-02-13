<?php $this->load->view('header');?>

 <center> <h2>Deactivate User</h2></center>
<!--     <div style="clear: both;"></div>-->
<div id="content" class="span10">
    <div class="dactive" style="margin-left:10px; padding: 30px 150px">
        <span>Are you sure you want to deactivate the user <b><?php echo ucwords($user['username']); ?></b></span>

        <?php echo form_open("auth/deactivate/".$user['id']);?>

        <p>
            <label for="confirm">Yes:</label>
            <input type="radio" name="confirm" value="yes" checked="checked" />
            <label for="confirm">No:</label>
            <input type="radio" name="confirm" value="no" />
        </p>

        <?php echo form_hidden($csrf); ?>
        <?php echo form_hidden(array('id'=>$user['id'])); ?>

        <p><?php echo form_submit('submit', 'Submit');?></p>

    </div>







    <?php echo form_close();?>

</div>
