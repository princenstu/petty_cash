<div>
    <ul class="breadcrumb">
        <li><a href="/admin/dashboard">Dashboard</a> <span class="divider">/</span></li>
        <li><a href="/admin/products">Cash Memo</a></li>
    </ul>
</div>

<div class="row-fluid sortable">
    <center><b style="color:green;"><?php $this->load->view('message/message');?></b></center>
    <div class="box span12">

        <div class="box-header well" data-original-title>
            <h2>Projects</h2>
            <a class="btn btn-primary" style="float:right;" href="/admin/cash_memos/add">ADD</a>
        </div>

        <div class="box-content">

            <table class="table table-bordered table-striped table-condensed">

                <thead>
                <tr>
                    <th>Memo No</th>
                    <th>Company Name</th>
                    <th>Project Name</th>
                    <th>Disbursed</th>
                    <th>Recieved</th>
                    <th>Amount</th>
                    <th>Create Date</th>
                    <th></th>
                </tr>

                </thead>

            <tbody>
                <?php  if(!empty($cashmemoes)) { ?>
                <?php foreach($cashmemoes as $cashmemo):?>

                <tr>
                    <td><?php echo $cashmemo->memo_no; ?></td>
                    <td><?php echo $cashmemo->name; ?></td>
                    <td><?php echo $cashmemo->project_name; ?></td>
                    <td><?php echo $cashmemo->group_name; ?></td>
                    <td><?php echo $cashmemo->username; ?></td>
                    <td><?php echo $cashmemo->amount; ?></td>
                    <td><?php echo $cashmemo->create_date; ?></td>

                    <td class="center">
                        <a class="btn btn-small" href="/admin/cash_memos/edit/<?php echo $cashmemo->memo_id ?>">
                            <i class="icon-edit icon-white"></i>
                            Edit
                        </a>
                        <a class="btn btn-danger" href="/admin/cash_memos/remove/<?php echo $cashmemo->memo_id ?>" onclick="return confirm('Are You Sure You Want To Delete The Category?')">
                            <i class="icon-trash icon-white"></i>
                            Delete
                        </a>
                        <a class="btn btn-primary" href="/admin/cash_memos/getCashmemoById/<?php echo $cashmemo->memo_id ?>" onclick="return confirm('Are You Sure You Want To Detail information of The Cash Memo?')">
                            <i class="icon-trash icon-white"></i>
                            Detail
                        </a>
                    </td>
                </tr>

                    <?php endforeach; ?>
                <?php }else{ ?>
                </tbody>
         <tr> <td colspan="6"></td> No Cash Memo Found </tr>
                <?php } ?>
            </table>

            <div  style="padding-left: 400px;">
                <!--                                --><?php //echo $links; ?>
            </div>



        </div>

    </div>

</div>