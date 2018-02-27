<div class="content-page">
    <!-- Start content -->
    <div class="content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-lg-6">
                    <div class="card-box">
                        <h4 class="header-title m-t-0">Product Master</h4>
                        <?php foreach ($res as $rows) {   } ?>
                        <form role="form" novalidate="" id="product_master_form" method="post" name="product_master_form">
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-4 col-form-label"> Product Name<span class="text-danger">*</span></label>
                                <div class="col-7">
                                    <input type="text" required="" name="product_name" class="form-control" id="inputEmail3" placeholder="Product Name" value="<?php echo $rows->product_name; ?>">
                                      <input type="hidden" required="" name="product_id" class="form-control" id="inputEmail3" placeholder="Product Name" value="<?php echo $rows->id; ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-4 col-form-label">Product Short Code<span class="text-danger">*</span></label>
                                <div class="col-7">
                                    <input type="text" required="" name="product_short_code" class="form-control" id="inputEmail3" placeholder="Product Short Code" value="<?php echo $rows->product_short_code; ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-4 col-form-label">Status<span class="text-danger">*</span></label>
                                <div class="col-7">
                                  <select class="form-control" name="status">
                                         <option value="Active">Active</option>
                                         <option value="Deactive">Deactive</option>
                                        </select>
                                        <script language="JavaScript">document.product_master_form.status.value="<?php echo $rows->status; ?>";</script>

                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-8 offset-4">
                                    <button type="submit" class="btn btn-gradient waves-effect waves-light">
                                        Update Product
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


        </div>
    </div>
</div>
<script type="text/javascript">
$('#product_master_form').validate({ // initialize the plugin
    rules: {
        product_name: {
            required: true,
            remote: {
                   url: "<?php echo base_url(); ?>productcontroller/check_product_name_exist/<?php echo $rows->id; ?>",
                   type: "post"
                }
        },
        product_short_code: {
            required: true,
            remote: {
                   url: "<?php echo base_url(); ?>productcontroller/check_product_short_exist/<?php  echo $rows->id; ?>",
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
            url: "<?php echo base_url(); ?>productcontroller/save_product",
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
