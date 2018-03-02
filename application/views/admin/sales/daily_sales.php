<div class="content-page">
    <!-- Start content -->
    <div class="content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-lg-12">
                    <div class="card-box">
                        <h4 class="header-title m-t-0">Daily Sales Master</h4>

                        <form role="form" novalidate="" id="product_master_form" method="post">
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-4 col-form-label"> Sales Date<span class="text-danger">*</span></label>
                                <div class="col-7">

                                    <input class="form-control" id="date" name="sales_date" placeholder="YYYY-MM-DD" type="text"/>
                                </div>
                            </div>

                      
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
                              <div class="input_fields_wrap">

                              <br>
                              </div>
                                <button class="add_field_button">Add More Fields</button>
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



$(document).ready(function() {
    var max_fields      = 10; //maximum input boxes allowed
    var wrapper         = $(".input_fields_wrap"); //Fields wrapper
    var add_button      = $(".add_field_button"); //Add button ID

    var x = 1; //initlal text box count
    $(add_button).click(function(e){ //on add input button click
        e.preventDefault();
        if(x < max_fields){ //max input box allowed
            x++; //text box increment

            $(wrapper).append('<div><div class="form-row align-items-center"><div class="col-auto"><label class="sr-only" for="inlineFormInput">Name</label><select class="form-control product_id" id="product_id'+x+'" onchange="get_price('+x+')" name="product_id[]" required><option>Select</option><?php foreach($res as $rw){ ?><option value="<?php echo $rw->id; ?>"><?php echo $rw->product_name; ?></option><?php } ?></select></div><div class="col-auto"><label class="sr-only" for="inlineFormInputGroup">Units</label><div class="input-group mb-2 mb-sm-0"><input type="text" class="form-control units" id="units'+x+'" name="units[]" placeholder="Units" onblur="calculate_price('+x+')"></div></div><div class="col-auto"><label class="sr-only" for="inlineFormInputGroup">Price</label> <div class="input-group mb-2 mb-sm-0"><input type="text" class="form-control price" id="price'+x+'" name="price[]" placeholder="Price"> </div></div><div class="col-auto"><div class="input-group mb-1 mb-sm-1"><input type="text" class="form-control price" id="total'+x+'" name="" placeholder="total"> </div></div><div class="col-auto"><label class="sr-only" for="inlineFormInputGroup">Comments</label><div class="input-group mb-2 mb-sm-0"> <input type="text" class="form-control" id="comments'+x+'" name="comments[]" placeholder="Comments"></div></div></div><br><a href="#" class="remove_field">Remove</a></div>'); //add input box
        }
    });

    $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
        e.preventDefault(); $(this).parent('div').remove(); x--;
    })
});



function get_price(sel){
  var selected_val=$('#product_id'+sel+'').val();
  $.ajax({
        type: "POST",
        url: '<?php echo base_url(); ?>salescontroller/get_price_for_product',
        data: {selected_val:selected_val}, // serializes the form's elements.
        success: function(data)
        {
          if(data=='0'){
            $('#price'+sel+'').val(data);
          }else{
              $('#price'+sel+'').val(data);
          }
        }
      });
}
function calculate_price(price){
    var prd_units=$('#units'+price+'').val();
    var prd_price=$('#price'+price+'').val();
    var total_price=  prd_units*prd_price;
    $('#total'+price+'').val(total_price);
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
