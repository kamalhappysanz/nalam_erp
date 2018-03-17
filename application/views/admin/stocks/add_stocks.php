<div class="content-page">
    <!-- Start content -->
    <div class="content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-lg-10">
                    <div class="card-box">
                        <h4 class="header-title m-t-0">Add Stocks</h4>

                        <form role="form" novalidate="" id="stock_master_form" method="post" action="<?php echo base_url(); ?>salescontroller/date_wise_sales">
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-4 col-form-label">Purchase Date<span class="text-danger">*</span></label>
                                <div class="col-7">

                                    <input class="form-control" id="date" name="purchase_date" placeholder="YYYY-MM-DD" type="text"/>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-4 col-form-label">Item Name<span class="text-danger">*</span></label>
                                <div class="col-7">

                                    <input class="form-control" id="item_name" name="item_name" placeholder="" type="text"/>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-4 col-form-label">Item Units<span class="text-danger">*</span></label>
                                <div class="col-7">

                                    <input class="form-control" id="item_units" name="item_units" placeholder="" type="text"/>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-4 col-form-label">Item Price<span class="text-danger">*</span></label>
                                <div class="col-7">

                                    <input class="form-control" id="item_price" name="item_price" placeholder="" type="text"/>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-4 col-form-label">Total Price<span class="text-danger">*</span></label>
                                <div class="col-7">

                                    <input class="form-control" id="total_price" name="total_price" placeholder="" type="text"/>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-4 col-form-label">Comments</label>
                                <div class="col-7">

                                    <textarea class="form-control" name="comments"></textarea>
                                </div>
                            </div>


                            <div class="form-group row">
                                <div class="col-8 offset-4">
                                    <button type="submit" class="btn btn-gradient waves-effect waves-light">
                                    Save
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

<script>
	$(document).ready(function(){
		var date_input=$('input[name="purchase_date"]'); //our date input has the name "date"
		var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
		date_input.datepicker({
			format: 'yyyy-mm-dd',
			container: container,
			todayHighlight: true,
			autoclose: true,
		})
	})


  $('#stock_master_form').validate({ // initialize the plugin
      rules: {
          purchase_date: {
              required: true

          },
          item_name: {
              required: true

          },
          item_units: {
              required: true

          },
          item_price: {
              required: true
          },
          total_price: {
              required: true
          },
      },
      messages: {
          purchase_date: { required:"Enter the date"},
          item_name: { required:"Enter the item name"},
          item_units: { required:"Enter the item units"},
          item_price: { required:"Enter the price"},
          total_price: { required:"Enter the Total"}

      },
      submitHandler: function(form) {
          //alert("hi");

          $.ajax({
              url: "<?php echo base_url(); ?>stockcontroller/add_stocks",
              type: 'POST',
              data: $('#stock_master_form').serialize(),
              success: function(response) {

                  if (response == "failed") {
                      sweetAlert("Oops...", response, "error");
                  } else {

                    swal("Good job!", response, "success");
                  //  $('#myModal').modal('hide');
                    window.setTimeout(function(){location.reload()},1500)
                  }
              }
          });
      }
  });

</script>
