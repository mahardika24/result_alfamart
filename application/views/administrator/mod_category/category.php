<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
    <!--begin::Content-->
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">

        <!--begin::Entry-->
        <div class="d-flex flex-column-fluid">
            <!--begin::Container-->
            <div class="container">
       
       
                <!--begin::Card-->
                <div class="card card-custom">
                    
                    <div class="card-header flex-wrap border-0 pt-6 pb-0">
                            <div class="card-title">
                                <h3 class="card-label">Data Kategori</h3>                                                                
                            </div>

                            <div class="card-toolbar">
                            <!--begin::Button-->
                            <a href="<?= base_url('administrator/add_category') ?>" class="btn btn-primary font-weight-bolder">
                                <span class="svg-icon svg-icon-md">       
                                </span>Tambah Kategori
                            </a>
                            <!--end::Button-->
                            </div>
                    </div>

                    <div class="card-body">                           
                             <!--begin: Datatable-->
                            <div class="table-responsive-lg">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Nomor</th>
                                            <th>ID Kategori</th>
                                            <th>Nama Kategori</th>
                                            <th>Image</th>
                                            <th>Link</th>
                                            <th>Urutan</th>
                                            <th>Aktif</th>                                          
                                            <th width="10%;">Aksi</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                            $no = 1;
                                            foreach ($record->result_array() as $row){
                                            echo "<tr>
                                                    <td>$no</td>
                                                    <td>$row[id_kategori]</td>
                                                    <td>$row[nama_kategori]</td>
                                                    <td>$row[image]</td>
                                                    <td>$row[link]</td>
                                                    <td>$row[urutan]</td>
                                                    <td>$row[is_active]</td>                                               
                                                    <td>
                                                        <div class='d-flex align-items-center'>
                                                            <a href='".base_url()."administrator/edit_category/$row[id_kategori]' class='btn btn-transparent-primary btn-sm font-weight-bold mr-2'>Edit</a>                                                            
                                                        </div>
                                                    </td>
                                                </tr>";
                                            $no++;
                                            }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                            <!--end: Datatable-->
                    </div>
                </div>
                <!--end::Card-->
            

        </div>
        <!--end::Container-->
    </div>
    <!--end::Entry-->
</div>
<!--end::Content-->