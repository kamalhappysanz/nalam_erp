<div class="content-page">
    <!-- Start content -->
    <div class="content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-lg-10">
                    <div class="card-box">
                        <h4 class="header-title m-t-0">Select Sales date </h4>

                        <form role="form" novalidate="" id="product_master_form" method="post" action="<?php echo base_url(); ?>salescontroller/date_wise_sales">
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-4 col-form-label"> Sales Date<span class="text-danger">*</span></label>
                                <div class="col-7">

                                    <input class="form-control" id="date" name="sales_date" placeholder="YYYY-MM-DD" type="text"/>
                                </div>
                            </div>


                            <div class="form-group row">
                                <div class="col-8 offset-4">
                                    <button type="submit" class="btn btn-gradient waves-effect waves-light">
                                    Submit
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
                <div class="col-lg-10">
                    <div class="card-box">
                        <h4 class="header-title m-t-0">Select Month</h4>

                        <form role="form" novalidate="" id="product_master_form" method="post" action="<?php echo base_url(); ?>salescontroller/month_wise_sales">
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-4 col-form-label"> Sales Month<span class="text-danger">*</span></label>
                                <div class="col-7">
                                  <select class="form-control" name="sales_month">
                                    <option value=''>--Select Month--</option>
                                       <option  value='1'>Janaury</option>
                                       <option value='2'>February</option>
                                       <option value='3'>March</option>
                                       <option value='4'>April</option>
                                       <option value='5'>May</option>
                                       <option value='6'>June</option>
                                       <option value='7'>July</option>
                                       <option value='8'>August</option>
                                       <option value='9'>September</option>
                                       <option value='10'>October</option>
                                       <option value='11'>November</option>
                                       <option value='12'>December</option>
                                  </select>

                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-4 col-form-label"> Sales Year<span class="text-danger">*</span></label>
                                <div class="col-7">

                                  <select class="form-control" name="sales_year">
                                    <option value=''>--Select Year--</option>
                                       <option  value='2018'>2018</option>
                                        <option  value='2019'>2019</option>
                                        <option  value='2020'>2020</option>

                                  </select>
                                </div>
                            </div>


                            <div class="form-group row">
                                <div class="col-8 offset-4">
                                    <button type="submit" class="btn btn-gradient waves-effect waves-light">
                                    Submit
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
