<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$url = base_url () .'result/female_10k/';
?>
<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
<main class="main-content">
      <div class="contents">
         <div class="crm mt-25">
            <div class="container">
               <div class="row">
                  <!-- Banner -->
                  <div class="col-12">
                     <div class="ap-tab-header__img mb-25">
                        <img src="<?php echo base_url(); ?>assets-frontend/img/banner-1.jpeg" class="img-fluid w-100" alt="banner">
                     </div>
                  </div>

                  <!-- Table -->
                  <div class="col-12">
                     <div class="card-result mb-25">
                        <div class="d-flex align-items-center justify-content-between" style="margin-left:10px; margin-right:20px;">
                           <h2 class="default color-12">10K</h2>
                           <h5 class="gender-text">FEMALE</h5>
                        </div>

                       <!-- SEARCH BAR & ADD BUTTON -->
                       <div class="project-top-right d-flex flex-wrap justify-content-between">
                           <div class="project-category col-12 col-md-auto">
                              <form class="form-search" method="post" action="<?php echo $url; ?>">
                                    <div class="d-flex align-items-end">
                                       <input type="text" class="form-control form-control-default mr-2" placeholder="Input name or bib" name="search" id="search" value="<?php echo $search_string; ?>">
                                       <button type="submit" class="btn btn-danger btn-xs btn-squared">Search</button>
                                    </div>
                              </form>
                           </div>
                           <div class="project-category mt-2 mt-md-0 col-12 col-md-auto">
                              <div class="d-flex justify-content-end ">
                                    <button type="button" class="btn btn-danger btn-xs btn-squared mr-2" id="addDataButton">Add Data</button>
                                    <button type="button" class="btn btn-danger btn-xs btn-squared" id="deleteButton">Delete</button>
                              </div>
                           </div>
                        </div>



                  <!-- END -->

                  <!-- POPUP MODAL -->
                  <div class="modal fade" id="addDataModal" tabindex="-1" role="dialog" aria-labelledby="addDataModalLabel" aria-hidden="true">
                     <div class="modal-dialog" role="document">
                        <div class="modal-content">
                              <div class="modal-header">
                                 <h5 class="modal-title" id="addDataModalLabel">Add Data</h5>
                                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                 <span aria-hidden="true"><i class="bx bx-x text-lg "></i></span>
                                 </button>
                              </div>
                              <div class="modal-body">
                                 <form id="addDataForm" enctype="multipart/form-data">
                                       <div class="input-group mb-3">
                                       <input type="file" class="form-control">
                                       </div>
                                 </form>
                              </div>
                              <div class="modal-footer">
                                 <button type="submit" class="btn btn-danger" form="addDataForm">Submit</button>
                              </div>
                        </div>
                     </div>
                  </div>
                  <!-- END POPUP MODAL -->


                        <div class="mt-2">
                           <div class="table5 userDatatable global-shadow border-light-0 bg-white radius-xl w-100 mb-30">
                              <div class="table-responsive">
                                 <table class="table mb-0 table-borderless">
                                    <?php if(empty($data)){ ?>                          
                                       <div class="col-md-12 col-sm-12" style="height:400px;">
                                          <div class="main-title" >
                                             <div class="alert alert-danger" role="alert">
                                                Data not found
                                             </div>
                                          </div>
                                       </div>                    
                                    <?php }else{ ?>

                                    <thead>
                                       <tr class="userDatatable-header">
                                          <th>
                                             <span class="userDatatable-title text-center">Position</span>
                                          </th>
                                          <th>
                                             <span class="userDatatable-title">Name</span>
                                          </th>
                                          <th>
                                             <span class="userDatatable-title">Race</span>
                                          </th>                                          
                                          <th>
                                             <span class="userDatatable-title">Gender</span>
                                          </th>
                                          <th>
                                             <span class="userDatatable-title">BIB</span>
                                          </th>
                                          <th>
                                             <span class="userDatatable-title">1.3 Km</span>
                                          </th>
                                          <th>
                                             <span class="userDatatable-title">4.8 Km</span>
                                          </th>
                                          <th>
                                             <span class="userDatatable-title">7.2 Km</span>
                                          </th>
                                          <th>
                                             <span class="userDatatable-title">Pace</span>
                                          </th>
                                          <th>
                                             <span class="userDatatable-title">Gun Time</span>
                                          </th>
                                          <th>
                                             <span class="userDatatable-title">Chip Time</span>
                                          </th>
                                          <th>
                                             <span class="userDatatable-title text-center">Overall</span>
                                          </th>
                                       </tr>
                                    </thead>
                                    <tbody>                                    

                                       <?php $i=1;foreach($data as $rec): ?>
                                          <tr>
                                             <td><div class="userDatatable-content text-center"><?php echo $rec->position; ?></div></td>
                                             <td><div class="userDatatable-content"><?php echo $rec->athlete_name; ?></div></td>
                                             <td><div class="userDatatable-content"><?php echo $rec->race; ?></div></td>                                             
                                             <td><div class="userDatatable-content"><?php echo $rec->gender; ?></div></td>
                                             <td><div class="userDatatable-content"><?php echo $rec->bib_number; ?></div></td>
                                             <td><div class="userDatatable-content"><?php echo $rec->cp1; ?></div></td>
                                             <td><div class="userDatatable-content"><?php echo $rec->cp2; ?></div></td>
                                             <td><div class="userDatatable-content"><?php echo $rec->cp3; ?></div></td>
                                             <td><div class="userDatatable-content"><?php echo $rec->pace; ?></div></td>
                                             <td><div class="userDatatable-content"><?php echo $rec->gun_time; ?></div></td>
                                             <td><div class="userDatatable-content"><?php echo $rec->chip_time; ?></div></td>
                                             <td><div class="userDatatable-content text-center"><?php echo $rec->overall; ?></div></td>                                             
                                          </tr>
                                       <?php endforeach; ?>   
                                       
                                       <?php
                                       }                                       
                                       ?>
                                    </tbody>
                                 </table>
                              </div>
                              <div class="d-flex justify-content-end mt-30">
                                 <?php echo $links; ?>
                              </div>


                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>

   </main>

   
<!-- === FUNGSI SWEET ALERT === -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
   <script>
    document.getElementById("deleteButton").addEventListener("click", function() {
        // Menampilkan konfirmasi SweetAlert
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire(
                    'Deleted!',
                    'Your data has been deleted.',
                    'success'
                );
            }
        });
    });
</script>

<!-- === FUNGSI UNTUK MODAL === -->
   <script>
    document.getElementById("addDataButton").addEventListener("click", function() {
        $('#addDataModal').modal('show');
    });
    
    document.querySelector("#addDataModal .close").addEventListener("click", function() {
        $('#addDataModal').modal('hide');
    });
    
    document.querySelector("#addDataModal [data-dismiss='modal']").addEventListener("click", function() {
        $('#addDataModal').modal('hide');
    });
</script>