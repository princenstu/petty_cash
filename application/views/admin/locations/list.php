
    <div>
    <ul class="breadcrumb">
    <li><a href="/admin/dashboard">Dashboard</a> <span class="divider">/</span> </li>
    <li><a href="/admin/locations">Locations</a></li>
    </ul>
    </div>
     <div class="row-fluid sortable">
         <div class="box span12">
          <center><b style="color:green;"><?php $this->load->view('message/message');?></b></center>
             <div class="box-header well" data-original-title>

                 <h2>Locations</h2>
                     <a  class="btn btn-primary" href="/admin/locations/add" style="float:right;">Add</a>

    </div>
    <div class="box-content">

    <table class="table table-bordered table-striped table-condensed">
      <thead>
          <tr>
              <th>Name</th>
              <th>Image</th>
              <th></th>
          </tr>
      </thead>

      <tbody>
      <?php foreach($locations as $location):?>
        <tr>
            <td class="center"><?php echo $location['name'] ?></td>
            <td class="center"><?php if (!empty($location['image'])):  ?>

                <span style="margin-left:80px;"><img src="/uploads/<?php echo $location['image']; ?>" /></span>
                <?php endif; ?></td>
            <td class="center">
                <a class="btn btn-info" href="/admin/locations/edit/<?php echo $location['location_id'] ?>">
                    <i class="icon-edit icon-white"></i>
                    Edit
                </a>
                <a class="btn btn-danger" href="/admin/locations/remove/<?php echo $location['location_id']?>" onclick="return confirm('Are You Sure You Want To Delete The Location ?')">
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

