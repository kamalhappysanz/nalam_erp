<div class="content-page">
    <!-- Start content -->
    <div class="content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-lg-6">
                    <div class="card-box">
                        <h4 class="header-title m-t-0">Product Master</h4>

                        <form role="form" novalidate="" id="product_master_form" method="post">
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-4 col-form-label"> Product Name<span class="text-danger">*</span></label>
                                <div class="col-7">
                                    <input type="text" required="" name="product_name" class="form-control" id="inputEmail3" placeholder="Product Name">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-4 col-form-label">Product Short Code<span class="text-danger">*</span></label>
                                <div class="col-7">
                                    <input type="text" required="" name="product_short_code" class="form-control" id="inputEmail3" placeholder="Product Short Code">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-4 col-form-label">Status<span class="text-danger">*</span></label>
                                <div class="col-7">
                                  <select class="form-control" name="status">
                                         <option value="Active">Active</option>
                                         <option value="Deactive">Deactive</option>
                                        </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-8 offset-4">
                                    <button type="submit" class="btn btn-gradient waves-effect waves-light">
                                        Save Product
                                    </button>
                                    <button type="reset" class="btn btn-light waves-effect m-l-5">
                                        Cancel
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card-box table-responsive">
                        <h4 class="m-t-0 header-title"><b>Product List</b></h4>


                        <div id="datatable_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4 no-footer">

                            <div class="row">
                                <div class="col-sm-12">
                                    <table id="datatable" class="table table-bordered dataTable no-footer" role="grid" aria-describedby="datatable_info">
                                        <thead>
                                            <tr role="row">
                                                <th class="sorting_asc">S.No</th>
                                                <th class="sorting_asc"> Product Name</th>
                                                <th class="sorting_asc"> Product Short Code</th>
                                                <th class="sorting_asc"> Status</th>
                                                <th class="sorting_asc"> Action</th>

                                            </tr>
                                        </thead>

                                        <tbody>
                                          <?php   $i=1; foreach ($res as $rows) { ?>


                                            <tr role="row" class="odd">
                                                <td class="sorting_1"><?php echo $i; ?></td>
                                                <td><?php echo $rows->product_name; ?></td>
                                                <td><?php echo $rows->product_short_code; ?></td>
                                                <td><?php echo $rows->status; ?></td>
                                                <td><a href="<?php echo base_url(); ?>productcontroller/get_product_id/<?php echo $rows->id ?>"><i class="far fa-edit"></i></a></td>

                                            </tr>
                                              <?php $i++; }  ?>


                                        </tbody>
                                    </table>
                                </div>
                            </div>
                          </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<script type="text/javascript">
$('#product_master_form').validate({ // initialize the plugin
    rules: {
        product_name: {
            required: true,
            remote: {
                   url: "<?php echo base_url(); ?>productcontroller/check_product_name",
                   type: "post"
                }
        },
        product_short_code: {
            required: true,
            remote: {
                   url: "<?php echo base_url(); ?>productcontroller/check_product_short_code",
                   type: "post"
                }
        },
        status: {
            required: true
        },
    },
    messages: {
        product_name: { required:"Enter the Product Name",remote:"Product Name Already Exists" },
        product_short_code: { required:"Enter the Product Short Code",remote:"Product Short Code Already Exists" },
        status: { required:"Enter the Password" }
    },
    submitHandler: function(form) {
        //alert("hi");

        $.ajax({
            url: "<?php echo base_url(); ?>productcontroller/create_product",
            type: 'POST',
            data: $('#product_master_form').serialize(),
            success: function(response) {

                if (response == "success") {
                    swal({
                        title: "Success",
                        text: "Added Successfully.",
                        type: "success"
                    }).then(function() {
                        location.href = '<?php echo base_url(); ?>productcontroller';
                    });
                } else {
                    sweetAlert("Oops...", response, "error");
                }
            }
        });
    }
});
</script>
