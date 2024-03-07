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
                            <h3 class="card-title">Upload Magazine</h3>
                        </div>
                        <!--begin::Form-->
                        
                        <?php 
                        if(isset($success)){
                            echo "
                            <div class='card-body'>
                            <div class='alert alert-success col-10' role='alert'>
                            $success
                            </div>
                            </div>
                            ";
                        }else if(isset($error)){
                            echo "
                            <div class='card-body'>
                                <div class='alert alert-danger col-10' role='alert'>
                                $error
                                </div>
                            </div>
                            ";
                        }else{
                            
                        }
                        ?>
                        
                        
                        <!-- <form class="form" method="post"> -->
                        <form method="POST" enctype="multipart/form-data" action="<?=base_url('administrator/upload_magazine')?>">
                            <div class="card-body">
                                                 
                                <div class="form-group">
                                    <label>File Zip Upload</label>
                                    <div></div>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="customFile" name="file"/>
                                        <label class="custom-file-label" for="customFile">Choose file</label>
                                    </div>
                                </div>

                                          																																				
                            </div>
                            <div class="card-footer">
                                <div class="row">
                                    <div class="col-2"></div>
                                    <div class="col-10">
                                        <button name='submit' type="submit" class="btn btn-success mr-2">Upload and Extract</button>
                                        <a href="<?= base_url('administrator/upload_magazine') ?>" class="btn btn-secondary">Cancel</a>
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