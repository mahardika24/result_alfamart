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
                    <div class="card card-custom gutter-b example example-compact">
                        <div class="card-header">
                            <h3 class="card-title">Form Magazine</h3>
                        
                        </div>
                        <!--begin::Form-->
                        <?php echo form_open_multipart('administrator/edit_magazine');?>
                        <form class="form" method="post">
                            <div class="card-body">
                                <input type='hidden' name='id' value='<?= $rows['id_majalah'] ?>'>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Tahun</label>
                                    <div class="col-10">
                                        <input class="form-control" type="text" name="a" value="<?= $rows['tahun'] ?>" id="example-text-input" />
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="example-search-input" class="col-sm-2 col-form-label">Nama Edisi</label>
                                    <div class="col-10">
                                        <input class="form-control" type="text" name="b"  value="<?= $rows['nama_edisi'] ?>" id="example-search-input" />
                                    </div>
                                </div>                            

                                <div class="form-group row">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Image</label>
                                    <div class="col-10">                                    
                                        <input type="file" id="input-file-now" name="c" class="dropify" data-default-file="../../cover/<?= $rows['thumbnail_img'] ?>">                                       
                                    </div>
                                </div>                                

                                <div class="form-group row">
                                    <label for="example-tel-input" class="col-sm-2 col-form-label">Link Majalah</label>
                                    <div class="col-10">
                                        <input class="form-control" type="text" name="d"  value="<?= $rows['link_majalah'] ?>" id="example-tel-input" />
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="inputOption" class="col-sm-2 col-form-label">Status Aktif</label>
                                    <div class="col-3">
                                        <select class="form-control" name="e" id="exampleSelect1">
                                            <?php
                                            if($rows['status_aktif'] == 'Y'){
                                                echo"
                                                <option selected value='Y'>Ya</option>
                                                <option value='N'>Tidak</option>
                                                ";
                                            }else if ($rows['status_aktif'] == 'N'){
                                                echo"
                                                <option value='Y'>Ya</option>
                                                <option selected value='N'>Tidak</option>	
                                                ";
                                            }                                            
                                            ?>					
                                        </select> 
                                    </div>                   
                                </div>                                																																				

                            </div>
                            <div class="card-footer">
                                <div class="row">
                                    <div class="col-2"></div>
                                    <div class="col-10">
                                        <button name='submit' type="submit" class="btn btn-success mr-2">Submit</button>
                                        <a href="<?= base_url('administrator/magazine') ?>" class="btn btn-secondary">Cancel</a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!--end::Card-->

            </div>
        <!--end::Container-->
    </div>
    <!--end::Entry-->
</div>
<!--end::Content-->