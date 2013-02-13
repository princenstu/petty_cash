<?php $this->load->view('header');?>
<div id="content" class="span10">
    <div>
        <ul class="breadcrumb">
            <li>
                <a href="/admin/dashboard">Dashboard</a> <span class="divider">/</span>
            </li>
            <li>
                <a href="/auth/user_info">User List</a>
            </li>
        </ul>
    </div>

    <div class="row-fluid sortable">
        <div class="box span12">
            <center><b style="color:green;"><?php $this->load->view('message/message');?></b></center>
            <div class="box-header well" data-original-title>
                <h2>Users</h2>
                <a  class="btn btn-primary" href="/auth/create_user" style="float:right;">Add</a>

            </div>
            <div class="box-content">

                <table class="table table-bordered table-striped table-condensed">
                    <thead>
                    <tr>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Email</th>
                        <th>Group</th>
                        <th>Status</th>
                        <th></th>
                    </tr>
                    </thead>

                    <tbody>
                    <?php foreach ($users as $user):?>
                    <tr>
                        <td><?php echo $user['first_name']?></td>
                        <td class="center"><?php echo $user['last_name']?></td>
                        <td class="center"><?php echo $user['email'];?></td>
                        <td class="center"><?php echo  $user['group'];?></td>
                        <td><?php echo ($user['active']) ? anchor("auth/deactivate/".$user['id'], 'Active') : anchor("auth/activate/". $user['id'], 'Inactive');?></td>
                        <td class="center">
                            <a class="btn btn-info" href="/auth/update_user/<?php echo $user['id']; ?>">
                                <i class="icon-edit icon-white"></i>
                                Edit
                            </a>
                            <a class="btn btn-danger" href="/auth/remove/<?php echo $user['id']; ?>" onclick="return confirm('Are You Sure You Want To Delete The User?')">
                                <i class="icon-trash icon-white"></i>
                                Delete
                            </a>
                        </td>
                    </tr>
                        <?php endforeach; ?>


                    </tbody>
                </table>

            </div>
        </div>

    </div>

</div>
<?php $this->load->view('footer');?>

