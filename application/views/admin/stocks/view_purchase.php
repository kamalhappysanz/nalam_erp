<div class="content-page">
    <!-- Start content -->
    <div class="content">
        <div class="container-fluid">


<div class="row">
    <div class="col-12">
        <div class="card-box table-responsive">
            <h4 class="m-t-0 header-title"><b>View Purchase  List  </b></h4>


            <div id="datatable_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4 no-footer">

                <div class="row">
                    <div class="col-sm-12">
                        <table id="datatable" class="table table-bordered dataTable no-footer" role="grid" aria-describedby="datatable_info">
                            <thead>
                                <tr role="row">
                                    <th class="sorting_asc">S.No</th>
                                    <th class="sorting_asc"> Item Name(Units)</th>
                                      <th class="sorting_asc">Purchase Date</th>
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
                                    <td><?php echo $rows->item_name; ?>(<?php echo $rows->item_units ?>)</td>
                                    <td><?php echo $rows->purchase_date; ?></td>
                                    <td><?php echo $rows->item_price; ?><br><?php  echo $rows->comments;  ?></td>
                                    <td id=""><?php echo $rows->total_price; ?></td>
                                      <td id=""><?php echo $rows->created_by; ?></td>
                                      <td id=""><a data-toggle="modal" data-target=".bs-example-modal-lg" data-id="<?php echo $rows->id;  ?>"  data-price="<?php echo $rows->item_price;  ?>" data-units="<?php echo $rows->item_units;  ?>" data-product-name="<?php echo $rows->item_name;  ?>"
                                        data-total="<?php echo $rows->total_price;  ?>" data-comments="<?php echo $rows->comments;  ?>" ><i class="far fa-edit"></i></a>
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
                   <h5 class="modal-title" id="myLargeModalLabel">Update Purchase</h5>
               </div>
               <div class="modal-body">
                 <form role="form" novalidate="" id="purchase_history" method="post" action="">
                   <div class="form-group row">
                       <label for="inputEmail3" class="col-4 col-form-label">Product Name</label>
                       <div class="col-7">
                           <input class="form-control"  name="item_name" placeholder="" id="item_name" type="text" />
                           <input class="form-control"  name="id" placeholder="" id="id" type="hidden"/>
                       </div>
                   </div>
                   <div class="form-group row">
                       <label for="inputEmail3" class="col-4 col-form-label">Units</label>
                       <div class="col-7">
                           <input class="form-control"  name="item_units" placeholder="" id="item_units" type="text" onblur="calculate_price()"/>

                       </div>
                   </div>
                   <div class="form-group row">
                       <label for="inputEmail3" class="col-4 col-form-label">Price</label>
                       <div class="col-7">
                           <input class="form-control"  name="item_price" placeholder="" id="item_price" type="text" onblur="calculate_price()"/>

                       </div>
                   </div>
                   <div class="form-group row">
                       <label for="inputEmail3" class="col-4 col-form-label">Total</label>
                       <div class="col-7">
                           <input class="form-control"  name="total_price" placeholder="" id="total_price" type="text"/>

                       </div>
                   </div>
                   <div class="form-group row">
                       <label for="inputEmail3" class="col-4 col-form-label">Comments</label>
                       <div class="col-7">
                           <input class="form-control"  name="comments" placeholder="" id="comments" type="text"/>

                       </div>
                   </div>
                   <div class="form-group row">
                       <label for="inputEmail3" class="col-4 col-form-label">&nbsp;</label>
                       <div class="col-7">
                          <input type="submit" class="btn btn-primary" value="Update Purchase">

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
    $(this).find('#item_name').val(product_name);
    var product_units = $(e.relatedTarget).attr('data-units');
    $(this).find('#item_units').val(product_units);
    var product_price = $(e.relatedTarget).attr('data-price');
    $(this).find('#item_price').val(product_price);
    var product_total = $(e.relatedTarget).attr('data-total');
    $(this).find('#total_price').val(product_total);
    var comments = $(e.relatedTarget).attr('data-comments');
    $(this).find('#comments').val(comments);
});


function calculate_price(){
    var prd_units=$('#product_units').val();
    var prd_price=$('#product_price').val();
    var total_price=  prd_units*prd_price;
    $('#product_total').val(total_price);
}

$('#purchase_history').validate({ // initialize the plugin
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
            url: "<?php echo base_url(); ?>stockcontroller/update_purchase_id",
            type: 'POST',
            data: $('#purchase_history').serialize(),
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
