<div>
    <ul class="breadcrumb">
        <li><a href="/admin/dashboard">Dashboard</a> <span class="divider">/</span></li>
        <li><a href="/admin/projects">Projects</a></li>
    </ul>
</div>

<div class="row-fluid sortable">

    <div class="box span12">
        <center><b style="color:green;"><?php $this->load->view('message/message');?></b></center>
        <div class="box-header well" data-original-title>
            <h2>Projects</h2>
            <a class="btn btn-primary" style="float:right;" href="/admin/projects/add">Add</a>
        </div>

        <div class="box-content">

            <table class="table table-bordered table-striped table-condensed">

                <thead>
                <tr>
                    <th>Company Name</th>
                    <th>Project Name</th>
                    <th>Create By</th>
                    <th></th>
                </tr>

                </thead>

                <tbody>

                <?php foreach($projects as $project):?>

                <tr>
                    <td><?php echo $project->company_name; ?></td>
                    <td><?php echo $project->project_name; ?></td>
                    <td><?php echo $project->username; ?></td>
                    <td class="center">
                        <a class="btn btn-info" href="/admin/projects/edit/<?php echo $project->project_id ?>">
                            <i class="icon-edit icon-white"></i>
                            Edit
                        </a>
                        <a class="btn btn-danger" href="/admin/projects/remove/<?php echo $project->project_id ?>" onclick="return confirm('Are You Sure Want To Delete The Project?')">
                            <i class="icon-trash icon-white"></i>
                            Delete
                        </a>
                    </td>
                </tr>

                    <?php endforeach; ?>

                </tbody>

            </table>

            <div  style="padding-left: 400px;">
                <!--                --><?php //echo $links; ?>
            </div>



        </div>

    </div>

</div>