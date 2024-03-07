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
                            <h3 class="card-title">Form User</h3>
                        
                        </div>
                        <!--begin::Form-->
                        <form class="form" action="<?= base_url('administrator/edit_user') ?>" method="post">
                            <div class="card-body">
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Username</label>
                                    <div class="col-10">
                                        <input class="form-control" type="text" name="a" value="<?= $rows['username'] ?>" id="example-text-input" readonly/>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-search-input" class="col-sm-2 col-form-label">Nama Lengkap</label>
                                    <div class="col-10">
                                        <input class="form-control" type="text" name="b" value="<?= $rows['nama_lengkap'] ?>" id="example-search-input" />
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-email-input" class="col-sm-2 col-form-label">Email</label>
                                    <div class="col-10">
                                        <input class="form-control" type="email" name="c" value="<?= $rows['email'] ?>" id="example-email-input" />
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="example-tel-input" class="col-sm-2 col-form-label">Nomor Telephone</label>
                                    <div class="col-10">
                                        <input class="form-control" type="tel" name="d" value="<?= $rows['no_telp'] ?>" id="example-tel-input" />
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-password-input" class="col-sm-2 col-form-label">Password</label>
                                    <div class="col-10">
                                        <input class="form-control" type="password" name="e" id="example-password-input" />
                                    </div>
                                </div>
                                <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-2 col-form-label">Level</label>
                                        <div class="col-10">
                                            <select class="form-control" name="f" id="exampleSelect1">
                                                <?php
                                                if ($rows['level'] == "admin") {
                                                    echo "
                                                    <option selected value='admin'>Admin</option>
                                                    <option value='user'>User</option>" ;
                                                }else if ($rows['level'] == "user"){
                                                    echo "
                                                    <option value='admin'>Admin</option>
                                                    <option selected value='user'>User</option>" ;
                                                }
                                                ?>						
                                            </select> 
                                        </div>                   
                                    </div>
                                <div class="form-group row">
                                    <label for="inputBlokir" class="col-sm-2 col-form-label">Blokir</label>
                                    <div class="radio-inline col-sm-10">
                                        <?php
                                                if ($rows['blokir'] == "Y") {
                                                    echo "
                                                    <label class='radio'>
                                                    <input checked name='g' type='radio' value='Y' name='radios2' />
                                                    <span></span>Ya</label>

                                                    <label class='radio'>
                                                    <input type='radio' name='g' value='N' name='radios2' />
                                                    <span></span>Tidak</label>                                                    
                                                    " ;
                                                }else if ($rows['blokir'] == "N"){
                                                    echo "
                                                    <label class='radio'>
                                                    <input type='radio' name='g' value='Y' name='radios2' />
                                                    <span></span>Ya</label>

                                                    <label class='radio'>
                                                    <input checked name='g' type='radio' value='N' name='radios2' />
                                                    <span></span>Tidak</label>
                                                    " ;
                                                }
                                        ?>
                                       
                                    </div>                 
                                </div>																																					

                            </div>
                            <div class="card-footer">
                                <div class="row">
                                    <div class="col-2"></div>
                                    <div class="col-10">
                                        <button name='submit' type="submit" class="btn btn-success mr-2">Submit</button>                                        
                                        <a href="<?= base_url('administrator/users') ?>" class="btn btn-secondary">Cancel</a>
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