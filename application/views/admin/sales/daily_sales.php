<div class="content-page">
    <!-- Start content -->
    <div class="content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-lg-10">
                    <div class="card-box">
                        <h4 class="header-title m-t-0">Daily Sales Master</h4>

                        <form role="form" novalidate="" id="product_master_form" method="post">
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-4 col-form-label"> Sales Date<span class="text-danger">*</span></label>
                                <div class="col-7">

                                    <input class="form-control" id="date" name="sales_date" placeholder="YYYY-MM-DD" type="text"/>
                                </div>
                            </div>

                          <a  class="btn" onclick="addsales()" >  <i class="fas fa-plus-square"></i></a>

                            <!-- <div class="form-row align-items-center">
                                  <div class="col-auto">
                                      <label class="sr-only" for="inlineFormInput">Name</label>
                                    <select name="product_id[]" class="form-control">
                                      <option value="0">Select</option>
                                      <?php foreach ($res as $rows) {  ?>

                                      <option value="<?php echo $rows->id; ?>"><?php echo $rows->product_name; ?></option>
                                    <?php   } ?>
                                    </select>
                                  </div>
                                  <div class="col-auto">
                                      <label class="sr-only" for="inlineFormInputGroup">Units</label>
                                      <div class="input-group mb-2 mb-sm-0">
                                          <input type="text" class="form-control" id="inlineFormInputGroup" name="units[]" placeholder="Units">
                                      </div>
                                  </div>
                                  <div class="col-auto">
                                      <label class="sr-only" for="inlineFormInputGroup">Price</label>
                                      <div class="input-group mb-2 mb-sm-0">
                                          <input type="text" class="form-control" id="inlineFormInputGroup" name="price[]" placeholder="Price">
                                      </div>
                                  </div>
                                  <div class="col-auto">
                                      <label class="sr-only" for="inlineFormInputGroup">Comments</label>
                                      <div class="input-group mb-2 mb-sm-0">
                                          <input type="text" class="form-control" id="inlineFormInputGroup" name="comments[]" placeholder="Comments">
                                      </div>
                                  </div>
                              </div> -->
                              <br>
                              <div id="addrows"></div>

                            <div class="form-group row">
                                <div class="col-8 offset-4">
                                    <button type="submit" class="btn btn-gradient waves-effect waves-light">
                                    Add
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
      "product_id[]": {
          required: true

      },
        sales_date: {
            required: true

        },
        "units[]": {
            required: true

        },
        "price[]": {
            required: true

        },

    },
    messages: {
        sales_date: { required:"Enter the date"},
        "units[]": { required:"Enter the Units" },
          "product_id[]": { required:"Select product" },
        "price[]": { required:"Enter the Price" }
    },
    submitHandler: function(form) {
        //alert("hi");

        $.ajax({
            url: "<?php echo base_url(); ?>salescontroller/daily_sales_report",
            type: 'POST',
            data: $('#product_master_form').serialize(),
            success: function(response) {

                if (response == "success") {
                    swal({
                        title: "Success",
                        text: "Successfully.",
                        type: "success"
                    }).then(function() {
                        location.href = '<?php echo base_url(); ?>salescontroller';
                    });
                } else {
                    sweetAlert("Oops...", response, "error");
                }
            }
        });
    }
});

function addsales(){

  $('#addrows').append('<div class="form-row align-items-center"><div class="col-auto"><label class="sr-only" for="inlineFormInput">Name</label><select class="form-control" name="product_id[]" required><option>Select</option><?php foreach($res as $rw){ ?><option value="<?php echo $rw->id; ?>"><?php echo $rw->product_name; ?></option><?php } ?></select></div><div class="col-auto"><label class="sr-only" for="inlineFormInputGroup">Units</label><div class="input-group mb-2 mb-sm-0"><input type="text" class="form-control" id="inlineFormInputGroup" name="units[]" placeholder="Units"></div></div><div class="col-auto"><label class="sr-only" for="inlineFormInputGroup">Price</label> <div class="input-group mb-2 mb-sm-0"><input type="text" class="form-control" id="inlineFormInputGroup" name="price[]" placeholder="Price"> </div></div><div class="col-auto"><label class="sr-only" for="inlineFormInputGroup">Comments</label><div class="input-group mb-2 mb-sm-0"> <input type="text" class="form-control" id="inlineFormInputGroup" name="comments[]" placeholder="Comments"></div></div></div><br>');
}

</script>
<script>
	$(document).ready(function(){
		var date_input=$('input[name="sales_date"]'); //our date input has the name "date"
		var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
		date_input.datepicker({
			format: 'yyyy-mm-dd',
			container: container,
			todayHighlight: true,
			autoclose: true,
		})
	})
</script>
