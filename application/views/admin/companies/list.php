
<div>
<ul class="breadcrumb">
<li><a href="/admin/dashboard">Dashboard</a> <span class="divider">/</span></li>
<li><a href="/admin/companies">Companies</a></li>
</ul>
</div>

<div class="row-fluid sortable">

<div class="box span12">
<center><b style="color:green;"><?php $this->load->view('message/message');?></b></center>
<div class="box-header well" data-original-title>
    <h2>Companies</h2>
    <a class="btn btn-primary" style="float:right;" href="/admin/companies/add">Add</a>
</div>

<div class="box-content">

    <table class="table table-bordered table-striped table-condensed">

        <thead>
        <tr>
            <th>Company Name</th>
            <th>Create By</th>
            <th></th>
        </tr>

        </thead>

        <tbody>

        <?php foreach($companies as $company):?>

        <tr>
            <td><?php echo $company->name; ?></td>
            <td><?php echo $company->username; ?></td>
            <td class="center">
                <a class="btn btn-info" href="/admin/companies/edit/<?php echo $company->company_id ?>">
                    <i class="icon-edit icon-white"></i>
                    Edit
                </a>
                <a class="btn btn-danger" href="/admin/companies/remove/<?php echo $company->company_id ?>" onclick="return confirm('Are You Sure Want To Delete The Company?')">
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