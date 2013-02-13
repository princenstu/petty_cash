    <div>
        <ul class="breadcrumb">
            <li>
                <a href="/admin/dashboard">Dashboard</a> <span class="divider">/</span>
            </li>
            <li>
                <a href="/admin/payments">Payments</a>

            </li>
        </ul>
    </div>

    <div class="row-fluid sortable">
        <div class="box span12">
            <b style="color:green;"><?php $this->load->view('message/message');?></b>
            <div class="box-header well" data-original-title>
                <h2>Payments</h2>

                <div class="box-icon">
                </div>

            </div>
            <div class="box-content">
                <table class="table table-bordered table-striped table-condensed">
                    <thead>
                    <tr>
                        <th>First Name</th>
                        <th>Midle Name</th>
                        <th>Last Name</th>
                        <th>Address1</th>
                        <th>Address2</th>
                        <th>Amount</th>
                    </tr>
                    </thead>

                    <tbody>
                    <?php foreach ($payments as $payment): ?>
                    <tr>
                        <td><?php echo $payment['first_name'] ?></td>
                        <td class="center"><?php echo $payment['mid_name'] ?></td>
                        <td class="center"><?php echo $payment['last_name'] ?></td>
                        <td class="center">
                            <span class=""><?php echo $payment['address1'] ?></span>
                        </td>
                        <td class="center"><?php echo $payment['address2'] ?></td>
                        <td class="center"><?php echo $payment['amount'] ?></td>
                    </tr>
                        <?php endforeach; ?>


                    </tbody>
                </table>

            </div>
        </div>

    </div>