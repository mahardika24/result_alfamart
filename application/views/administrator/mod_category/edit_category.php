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
                            <h3 class="card-title">Form Category</h3>                        
                        </div>

                        
                        <!--begin::Form-->
                        <form class="form" action="<?= base_url('administrator/edit_category') ?>" method="post" enctype="multipart/form-data">                        

                        <?php echo $error;?>

                            <div class="card-body">
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Nama Kategori</label>
                                    <div class="col-10">
                                        <input class="form-control" type="text" name="a" value="<?= $rows['nama_kategori'] ?>" id="example-text-input" />
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Unggah Image</label>
                                    <div class="col-sm-6">
                                        <input type="file" name="b" class="dropify" data-default-file="<?= base_url('uploads/') ?><?= $rows['image'] ?>" >
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="example-email-input" class="col-sm-2 col-form-label">Link</label>
                                    <div class="col-10">
                                        <input class="form-control" type="text" name="c"  value="<?= $rows['link'] ?>" id="example-email-input" />
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="example-tel-input" class="col-sm-2 col-form-label">Urutan</label>
                                    <div class="col-10">
                                        <input class="form-control" type="tel" name="d"  value="<?= $rows['urutan'] ?>" id="example-tel-input" />
                                    </div>
                                </div>
                              
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">Aktif</label>
                                    <div class="col-10">
                                        <select class="form-control" name="f" id="exampleSelect1">
                                            <?php
                                             if($rows['is_active'] == 'Y'){
                                            ?>
                                                <option selected value="Y">Yes</option>
                                                <option value="N">No</option>	
                                            <?php
                                             }else{
                                            ?>
                                            <option value="Y">Yes</option>
                                            <option selected value="N">No</option>
                                            <?php
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
                                        <button class="btn btn-secondary" onclick="goBack()">Cancel</button>
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

