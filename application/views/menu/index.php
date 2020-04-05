 <!-- Begin Page Content -->
 <div class="container-fluid">
     <div class="row">
         <div class="col-lg-6">
             <!-- Page Heading -->
             <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>


             <?= form_error('menu', '<div class="alert alert-danger">', '</div>'); ?>

             <?= $this->session->flashdata('message'); ?>


             <div class="card shadow mb-4">
                 <div class="card-header py-3">
                     <h6 class="m-0 font-weight-bold text-primary"><a href="" class="btn btn-primary" data-toggle="modal" data-target="#addMenu">Add New Menu</a>
                     </h6>
                 </div>
                 <div class="card-body">
                     <div class="table-responsive">

                         <table class="table table-bordered" id="dataTable mydata" width="100%" cellspacing="0">
                             <thead>
                                 <tr>
                                     <th class="text-center">No</th>
                                     <th class="text-center">Menu</th>
                                     <th class="text-center">Action</th>
                                 </tr>
                             </thead>
                             <tbody id="show_data">
                                 <?php $i = 1; ?>
                                 <?php foreach ($menu as $m) : ?>
                                     <tr>
                                         <th class="text-center"><?= $i; ?></th>
                                         <td><?= $m['menu']; ?></td>
                                         <td>
                                             <a href="" data="<?= $m['id']; ?>" data-toggle="modal" data-target="#editMenu<?= $m['id']; ?>" class="btn btn-success btn-icon-split ml-4 mr-3">
                                                 <span class="icon text-white-40">
                                                     <i class="fas fa-pencil-alt"></i>
                                                 </span>
                                                 <span class="text">Edit</span>
                                             </a>
                                             <a href="#" data="<?= $m['id']; ?>" data-toggle="modal" data-target="#deleteMenu<?= $m['id']; ?>" class="btn btn-danger btn-icon-split ml-3 mr-1">
                                                 <span class="icon text-white-40">
                                                     <i class="fas fa-trash"></i>
                                                 </span>
                                                 <span class="text">Delete</span>
                                             </a>
                                         </td>
                                     </tr>

                                     <?php $i++; ?>
                                 <?php endforeach; ?>
                             </tbody>
                         </table>

                     </div>
                 </div>
             </div>


         </div>
     </div>

 </div>
 <!-- /.container-fluid -->

 </div>
 <!-- End of Main Content -->

 <!-- Modal -->
 <div class="modal fade" id="addMenu" tabindex="-1" role="dialog" aria-labelledby="addMenuLabel" aria-hidden="true">
     <div class="modal-dialog" role="document">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" id="addMenuLabel">Add New Menu</h5>
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                 </button>
             </div>

             <form action="<?= base_url('menu'); ?>" method="post">
                 <div class="modal-body">
                     <div class="form-group">
                         <input type="text" class="form-control" id="menu" name="menu" placeholder="Menu Name">
                     </div>
                 </div>
                 <div class="modal-footer">
                     <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                     <button type="submit" class="btn btn-primary">Add</button>
                 </div>
             </form>
         </div>
     </div>
 </div>


 <!-- Modal Edit -->
 <?php foreach ($menu as $m) :
        $id = $m['id'];
        $menu = $m['menu'];
    ?>

     <div class="modal fade" id="editMenu<?= $id; ?>" tabindex="-1" role="dialog" aria-labelledby="editMenuLabel" aria-hidden="true">
         <div class="modal-dialog" role="document">
             <div class="modal-content">
                 <div class="modal-header">
                     <h5 class="modal-title" id="editMenuLabel">Edit Menu</h5>
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                         <span aria-hidden="true">&times;</span>
                     </button>
                 </div>

                 <form action="<?= base_url('menu/edit'); ?>" method="post">
                     <div class="modal-body">
                         <div class="form-group">
                             <input type="hidden" class="form-control" id="id" name="id" value="<?= $id; ?>">
                             <input type="text" class="form-control" id="menu" name="menu" placeholder="Menu Name" value="<?= $menu; ?>">
                         </div>
                     </div>
                     <div class="modal-footer">
                         <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                         <button type="submit" class="btn btn-primary">Save Changes</button>
                     </div>
                 </form>
             </div>
         </div>
     </div>


     <!-- Modal Delete -->
     <div class="modal fade" id="deleteMenu<?= $id; ?>" tabindex="-1" role="dialog" aria-labelledby="deleteMenuLabel" aria-hidden="true">
         <div class="modal-dialog" role="document">
             <div class="modal-content">
                 <div class="modal-header">
                     <h5 class="modal-title" id="deleteMenuLabel">Delete Menu</h5>
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                         <span aria-hidden="true">&times;</span>
                     </button>
                 </div>

                 <form action="<?= base_url('menu/delete'); ?>" method="post">
                     <div class="modal-body">
                         <div class="form-group">
                             <input type="hidden" class="form-control" id="id" name="id" value="<?= $id; ?>">
                             Are you sure you want to delete the menu <b><?= $menu; ?></b>?
                         </div>
                     </div>
                     <div class="modal-footer">
                         <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                         <button type="submit" class="btn btn-primary">Delete Menu</button>
                     </div>
                 </form>
             </div>
         </div>
     </div>

 <?php endforeach; ?>


 <script>
     $(document).ready(function() {
         $('#mydata').DataTable();
     });
 </script>
