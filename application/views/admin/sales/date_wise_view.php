<div class="content-page">
    <!-- Start content -->
    <div class="content">
        <div class="container-fluid">
          <div class="row">
              <div class="card-box table-responsive">
            <table   id="grand_total"class="dataTables_wrapper container-fluid dt-bootstrap4 no-footer">
              <tr>
              <th>S.no </th>  <th>Product </th>
              <th>Total units </th>  <th>Total Price </th></tr>
              <tr>  <?php $i=1; foreach($total as $result){ ?>
              <td> <?php echo $i; ?></td>
              <td> <?php echo $result->product_name; ?></td>
              <td> <?php echo $result->total_units; ?></td>
            <td> <?php echo $result->total_price; ?></td>
          </tr>
          <?php $i++;} ?>

          </table>
          <?php if(empty($total_sales)){}else{ foreach($total_sales as $tot){} } ?>
          <div class="result pull-right"><b>Total: </b> <?php echo $tot->total_sales; ?></div>
          </div>
          </div>
<?php  if(empty($day_sales)){

}else{ ?>
  <div class="row">
      <div class="col-12">
          <div class="card-box table-responsive">
              <h4 class="m-t-0 header-title"><b>Day Wise Total Sales List  (<?php if(empty($sales_date)){}else{ echo $sales_date;}   ?> <?php if(empty($sales_month)){}else{ echo $sales_month;}   ?> - <?php if(empty($sales_year)){}else{ echo $sales_year;}   ?>)</b></h4>


              <div id="datatable_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4 no-footer">

                  <div class="row">
                      <div class="col-sm-12">
                          <table id="datatable_2" class="table table-bordered dataTable no-footer" role="grid" aria-describedby="datatable_info">
                              <thead>
                                  <tr role="row">
                                      <th class="sorting_asc">S.No</th>

                                      <th class="sorting_asc"> Sales Date</th>
                                      <th class="sorting_asc"> Total</th>




                                  </tr>
                              </thead>

                              <tbody>
                                <?php   $i=1; foreach ($day_sales as $day_res) { ?>


                                  <tr role="row" class="odd">
                                      <td class=""><?php echo $i; ?>
                                      </td>

                                      <td><?php echo $day_res->sales_date; ?></td>
                                      <td><?php echo $day_res->day_sales; ?></td>
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

<?php } ?>


<div class="row">
    <div class="col-12">
        <div class="card-box table-responsive">
            <h4 class="m-t-0 header-title"><b>Date Wise Sales List  (<?php if(empty($sales_date)){}else{ echo $sales_date;}   ?> <?php if(empty($sales_month)){}else{ echo $sales_month;}   ?> - <?php if(empty($sales_year)){}else{ echo $sales_year;}   ?>)</b></h4>


            <div id="datatable_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4 no-footer">

                <div class="row">
                    <div class="col-sm-12">
                        <table id="datatable" class="table table-bordered dataTable no-footer" role="grid" aria-describedby="datatable_info">
                            <thead>
                                <tr role="row">
                                    <th class="sorting_asc">S.No</th>
                                    <th class="sorting_asc"> Product Name</th>
                                      <th class="sorting_asc"> Units</th>
                                    <th class="sorting_asc"> Price</th>
                                    <th class="sorting_asc"> Total</th>
                                    <th class="sorting_asc"> Added by</th>
                                      <th class="sorting_asc"> Action</th>


                                </tr>
                            </thead>

                            <tbody>
                              <?php   $i=1; foreach ($res as $rows) { ?>


                                <tr role="row" class="odd">
                                    <td class=""><?php echo $i; ?>
                                    </td>
                                    <td><?php echo $rows->product_name; ?></td>
                                    <td><?php echo $rows->units; ?></td>
                                    <td><?php echo $rows->price; ?></td>
                                    <td id=""><?php echo $rows->total; ?></td>
                                      <td id=""><?php echo $rows->created_by; ?></td>
                                      <td id=""><a data-toggle="modal" data-target=".bs-example-modal-lg" data-id="<?php echo $rows->id;  ?>"  data-price="<?php echo $rows->price;  ?>" data-units="<?php echo $rows->units;  ?>" data-product-name="<?php echo $rows->product_name;  ?>"  data-total="<?php echo $rows->total;  ?>" ><i class="far fa-edit"></i></a>
                                        <a onclick="delete_sales_id(<?php echo $rows->id; ?>)"><i class="far fa-trash-alt"></i></a>
                                    </td>


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
<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" id="myModal" aria-hidden="true" style="display: none;">
       <div class="modal-dialog modal-lg">
           <div class="modal-content">
               <div class="modal-header">
                   <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                   <h5 class="modal-title" id="myLargeModalLabel">Update Sales</h5>
               </div>
               <div class="modal-body">
                 <form role="form" novalidate="" id="product_master_form" method="post" action="">
                   <div class="form-group row">
                       <label for="inputEmail3" class="col-4 col-form-label">Product Name</label>
                       <div class="col-7">
                           <input class="form-control"  name="product_name" placeholder="" id="product_name" type="text" readonly/>
                           <input class="form-control"  name="id" placeholder="" id="id" type="hidden"/>
                       </div>
                   </div>
                   <div class="form-group row">
                       <label for="inputEmail3" class="col-4 col-form-label">Units</label>
                       <div class="col-7">
                           <input class="form-control"  name="product_units" placeholder="" id="product_units" type="text" onblur="calculate_price()"/>

                       </div>
                   </div>
                   <div class="form-group row">
                       <label for="inputEmail3" class="col-4 col-form-label">Price</label>
                       <div class="col-7">
                           <input class="form-control"  name="product_price" placeholder="" id="product_price" type="text" onblur="calculate_price()"/>

                       </div>
                   </div>
                   <div class="form-group row">
                       <label for="inputEmail3" class="col-4 col-form-label">Total</label>
                       <div class="col-7">
                           <input class="form-control"  name="product_total" placeholder="" id="product_total" type="text"/>

                       </div>
                   </div>
                   <div class="form-group row">
                       <label for="inputEmail3" class="col-4 col-form-label">&nbsp;</label>
                       <div class="col-7">
                          <input type="submit" class="btn btn-primary" value="Update Sales">

                       </div>
                   </div>
                 </form>
               </div>
           </div><!-- /.modal-content -->
       </div><!-- /.modal-dialog -->
   </div><!-- /.modal -->
<script language="javascript" type="text/javascript">
$('#myModal').on('show.bs.modal', function (e) {
    var myRoomNumber = $(e.relatedTarget).attr('data-id');
    $(this).find('#id').val(myRoomNumber);
    var product_name = $(e.relatedTarget).attr('data-product-name');
    $(this).find('#product_name').val(product_name);
    var product_units = $(e.relatedTarget).attr('data-units');
    $(this).find('#product_units').val(product_units);
    var product_price = $(e.relatedTarget).attr('data-price');
    $(this).find('#product_price').val(product_price);
    var product_total = $(e.relatedTarget).attr('data-total');
    $(this).find('#product_total').val(product_total);
});


function calculate_price(){
    var prd_units=$('#product_units').val();
    var prd_price=$('#product_price').val();
    var total_price=  prd_units*prd_price;
    $('#product_total').val(total_price);
}

$('#product_master_form').validate({ // initialize the plugin
    rules: {
        product_units: {
            required: true

        },
        product_price: {
            required: true

        },


    },
    messages: {
        product_units: { required:"Enter the date"},
          product_price: { required:"Enter the date"}

    },
    submitHandler: function(form) {
        //alert("hi");

        $.ajax({
            url: "<?php echo base_url(); ?>salescontroller/update_sales_id",
            type: 'POST',
            data: $('#product_master_form').serialize(),
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



function delete_sales_id(id){

  swal({
      title: 'Are you sure?',
      text: "You won't be able to revert this!",
      type: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Confirm!'
  }).then(function(){
            $.ajax({
              type:"POST",
              data:{ id: id },
              url: "<?php echo base_url();  ?>salescontroller/delete_sales_id",
              cache: false,
              success: function(data){
              if(data=="success"){
                location.reload();

              }else{
                 swal("Something Went wrong");
              }
              }
            });
  }).catch(function(reason){
    swal("Something Went wrong");
  });
}

       </script>
