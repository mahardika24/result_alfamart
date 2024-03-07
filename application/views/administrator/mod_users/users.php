<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
    <!--begin::Content-->
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">

        <!--begin::Subheader-->
        <!-- <div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
            <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
               
                <div class="d-flex align-items-center flex-wrap mr-2">
                   
                    <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">Users</h5>
                   
                    <div class="subheader-separator subheader-separator-ver mt-2 mb-2 mr-4 bg-gray-200"></div>
                    
                    <a href="<?= base_url('administrator/add_user') ?>" class="btn btn-light-info font-weight-bolder btn-sm">Add User</a>
                   
                </div>
                
            </div>
        </div> -->
        <!--end::Subheader-->




        <!--begin::Entry-->
        <div class="d-flex flex-column-fluid">
            <!--begin::Container-->
            <div class="container">             
                                     
                <!--begin::Card-->
                <div class="card card-custom">
                    <div class="card-header flex-wrap border-0 pt-6 pb-0">
                            <div class="card-title">
                                <h3 class="card-label">Data Users</h3>                                                                
                            </div>

                            <div class="card-toolbar">
                            <!--begin::Button-->
                            <a href="<?= base_url('administrator/add_user') ?>" class="btn btn-primary font-weight-bolder">
                                <span class="svg-icon svg-icon-md">       
                                </span>Tambah User
                            </a>
                            <!--end::Button-->
                            </div>
                    </div>

                    <div class="card-body">
                            
                            <!--begin::Search Form-->
                            
                            <div class="mb-7">
                                <div class="row align-items-center">
                                    <div class="col-lg-9 col-xl-8">
                                        <form class="form" action="<?= base_url('administrator/users') ?>" method="post">
                                            <div class="row align-items-center">
                                                
                                                <div class="col-md-4 my-2 my-md-0">
                                                    <div class="input-icon">
                                                        <input type="text" name="keyword" class="form-control" placeholder="Search..." autocomplete="off" autofocus/>
                                                        <span>
                                                            <i class="flaticon2-search-1 text-muted"></i>
                                                        </span>
                                                    </div>
                                                </div>                                            
                                                <div class="col-md-4 my-2 my-md-0">
                                                    <button type="submit" name="submit"  class="btn btn-light-primary px-6 font-weight-bold">Search</button>
                                                </div>
                                                
                                            </div>
                                        </form>
                                    </div>                                    
                                </div>
                            </div>
                            
                            <!--end::Search Form-->
                            
                        
                             <!--begin: Datatable-->
                            <div class="table-responsive-lg">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Username</th>
                                            <th>Nama Lengkap</th>
                                            <th>Email</th>
                                            <th>No Telepon</th>
                                            <th>Level</th>
                                            <th>Blokir</th>
                                            <th width="10%;">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                        <?php if(empty($record)) : ?>
                                            <tr>
                                                <td colspan="8">
                                                <div class="alert alert-danger" role="alert">
                                                    Data not Found
                                                </div>
                                                </td>
                                            </tr>

                                        <?php endif ?>

                                        <?php                                             
                                            foreach ($record as $row){
                                            $start++;
                                            echo "<tr>
                                                    <td>$start </td>
                                                    <td>$row->username</td>
                                                    <td>$row->nama_lengkap</td>
                                                    <td>$row->email</td>
                                                    <td>$row->no_telp</td>
                                                    <td>$row->level</td>
                                                    <td>$row->blokir</td>
                                                    <td>
                                                        <div class='d-flex align-items-center'>
                                                            <span class='label label-inline label-light-success font-weight-bold'>
                                                                <a href='".base_url()."administrator/edit_user/$row->username''>Edit</a>
                                                            </span>                                                             
                                                        </div>
                                                    </td>
                                                </tr>";
                                                
                                           
                                            }
                                        ?>
                                    </tbody>
                                </table>
                                <h7> Result: <?= $total_rows ?> </h7>
                            </div>
                            <!--end: Datatable-->
                            <?php 
                            echo $this->pagination->create_links();
                            ?>                    
                    </div>
                </div>
                <!--end::Card-->

              
            

        </div>
        <!--end::Container-->
    </div>
    <!--end::Entry-->
</div>
<!--end::Content-->