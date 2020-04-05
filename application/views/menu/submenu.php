 <!-- Begin Page Content -->
 <div class="container-fluid">
     <div class="row">
         <div class="col-lg-12">
             <!-- Page Heading -->
             <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

             <?= form_error('title', '<div class="alert alert-danger">', '</div>'); ?>
             <?= form_error('menu_id', '<div class="alert alert-danger">', '</div>'); ?>
             <?= form_error('url', '<div class="alert alert-danger">', '</div>'); ?>
             <?= form_error('icon', '<div class="alert alert-danger">', '</div>'); ?>


             <?= $this->session->flashdata('message'); ?>


             <div class="card shadow mb-4">
                 <div class="card-header py-3">
                     <h6 class="m-0 font-weight-bold text-primary"><a href="" class="btn btn-primary" data-toggle="modal" data-target="#addSubMenu">Add New Submenu</a>
                     </h6>
                 </div>
                 <div class="card-body">
                     <div class="table-responsive">

                         <table class="table table-bordered" id="dataTable mydata" width="100%" cellspacing="0">
                             <thead>
                                 <tr>
                                     <th class="text-center">No</th>
                                     <th class="text-center">Title</th>
                                     <th class="text-center">Menu</th>
                                     <th class="text-center">Url</th>
                                     <th class="text-center">Icon</th>
                                     <th class="text-center">Active</th>
                                     <th class="text-center">Action</th>
                                 </tr>
                             </thead>
                             <tbody id="show_data">
                                 <?php $i = 1; ?>
                                 <?php foreach ($subMenu as $sm) : ?>
                                     <tr>
                                         <th class="text-center"><?= $i; ?></th>
                                         <td><?= $sm['title']; ?></td>
                                         <td><?= $sm['menu']; ?></td>
                                         <td><?= $sm['url']; ?></td>
                                         <td><?= $sm['icon']; ?></td>
                                         <td class="text-center"><?= $sm['is_active']; ?></td>
                                         <td>
                                             <a href="" data="<?= $sm['id']; ?>" data-toggle="modal" data-target="#editSubMenu<?= $sm['id']; ?>" class="btn btn-success btn-icon-split">
                                                 <span class="icon text-white-40">
                                                     <i class="fas fa-pencil-alt"></i>
                                                 </span>
                                                 <span class="text">Edit</span>
                                             </a>
                                             <a href="#" data="<?= $sm['id']; ?>" data-toggle="modal" data-target="#deleteSubMenu<?= $sm['id']; ?>" class="btn btn-danger btn-icon-split">
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

 <!-- Modal ADD SUBMENU -->
 <div class="modal fade" id="addSubMenu" tabindex="-1" role="dialog" aria-labelledby="addSubMenuLabel" aria-hidden="true">
     <div class="modal-dialog" role="document">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" id="addSubMenuLabel">Add New Submenu</h5>
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                 </button>
             </div>

             <form action="<?= base_url('menu/submenu'); ?>" method="post">
                 <div class="modal-body">
                     <div class="form-group">
                         <input type="text" class="form-control" id="title" name="title" placeholder="Submenu Name">
                     </div>
                     <div class="form-group">
                         <select name="menu_id" id="menu_id" class="form-control">
                             <option value="">Select Menu</option>
                             <?php foreach ($menu as $m) : ?>
                                 <option value="<?= $m['id']; ?>"><?= $m['menu']; ?></option>
                             <?php endforeach; ?>
                         </select>
                     </div>
                     <div class="form-group">
                         <input type="text" class="form-control" id="url" name="url" placeholder="Submenu Url">
                     </div>
                     <div class="form-group">
                         <input type="text" class="form-control" id="icon" name="icon" placeholder="Submenu Icon">
                     </div>
                     <div class="form-group">
                         <div class="form-check">
                             <input type="checkbox" class="form-check-input" value="1" name="is_active" id="is_active" checked>
                             <label for="is_active" class="form-check-label">Active</label>
                         </div>
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
 <?php foreach ($subMenu as $sm) :
        $id = $sm['id'];
        $title = $sm['title'];
        $menu_id = $sm['menu_id'];
        $url = $sm['url'];
        $icon = $sm['icon'];
        $active = $sm['is_active'];
    ?>

     <div class="modal fade" id="editSubMenu<?= $id; ?>" tabindex="-1" role="dialog" aria-labelledby="editSubMenuLabel" aria-hidden="true">
         <div class="modal-dialog" role="document">
             <div class="modal-content">
                 <div class="modal-header">
                     <h5 class="modal-title" id="editSubMenuLabel">Edit Submenu</h5>
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                         <span aria-hidden="true">&times;</span>
                     </button>
                 </div>

                 <form action="<?= base_url('menu/subEdit'); ?>" method="post">
                     <div class="modal-body">
                         <div class="form-group">
                             <input type="hidden" class="form-control" id="id" name="id" value="<?= $id; ?>">
                             <input type="text" class="form-control" id="title" name="title" placeholder="Submenu Name" value="<?= $title; ?>">
                         </div>
                         <div class="form-group">
                             <select name="menu_id" id="menu_id" class="form-control">
                                 <?php foreach ($menu as $m) : ?>
                                     <option value="<?= $m['id']; ?>" <?= $menu_id == $m['id'] ? "selected" : null ?>><?= $m['menu']; ?></option>
                                 <?php endforeach; ?>
                             </select>
                         </div>
                         <div class="form-group">
                             <input type="text" class="form-control" id="url" name="url" placeholder="Submenu Url" value="<?= $url; ?>">
                         </div>
                         <div class="form-group">
                             <input type="text" class="form-control" id="icon" name="icon" placeholder="Submenu Icon" value="<?= $icon; ?>">
                         </div>
                         <div class="form-group">
                             <div class="form-check">
                                 <input type="checkbox" class="form-check-input" value="1" name="is_active" id="is_active" checked>
                                 <label for="is_active" class="form-check-label">Active</label>
                             </div>
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
     <div class="modal fade" id="deleteSubMenu<?= $id; ?>" tabindex="-1" role="dialog" aria-labelledby="deleteSubMenuLabel" aria-hidden="true">
         <div class="modal-dialog" role="document">
             <div class="modal-content">
                 <div class="modal-header">
                     <h5 class="modal-title" id="deleteSubMenuLabel">Delete Menu</h5>
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                         <span aria-hidden="true">&times;</span>
                     </button>
                 </div>

                 <form action="<?= base_url('menu/subDelete'); ?>" method="post">
                     <div class="modal-body">
                         <div class="form-group">
                             <input type="hidden" class="form-control" id="id" name="id" value="<?= $id; ?>">
                             Are you sure you want to delete the menu <b><?= $title; ?></b>?
                         </div>
                     </div>
                     <div class="modal-footer">
                         <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                         <button type="submit" class="btn btn-primary">Delete Submenu</button>
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
