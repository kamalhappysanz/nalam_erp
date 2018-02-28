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
                                      <td id=""><a href="<?php echo base_url(); ?>salescontroller/delete_sales_id<?php echo $rows->id; ?>"><?php echo $rows->id; ?><i class="far fa-edit"></i></a>
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
<script language="javascript" type="text/javascript">
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
