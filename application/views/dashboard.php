<div class="content-page">
    <!-- Start content -->
    <div class="content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <h4 class="page-title float-left">Dashboard</h4>

                        <ol class="breadcrumb float-right">
                            <li class="breadcrumb-item"><a href="#">Abstack</a></li>
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>

                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
            <!-- end row -->


            <div class="row">
                <div class="col-xs-12 col-md-6 col-lg-6 col-xl-3">
                    <div class="card-box tilebox-one">
                        <i class="fi-box float-right"></i>
                        <h6 class="text-muted text-uppercase mb-3">Today Sales</h6>
                        <h4 class="mb-3" data-plugin="counterup"><?php if(empty($today_sales_res)){
                        }else{
                          foreach($today_sales_res as $today_sales){} echo $today_sales->total_sales;
                        }  ?></h4>
                        </div>
                </div>

                <div class="col-xs-12 col-md-6 col-lg-6 col-xl-3">
                    <div class="card-box tilebox-one">
                        <i class="fi-layers float-right"></i>
                        <h6 class="text-muted text-uppercase mb-3">Previous day sales</h6>
                        <h4 class="mb-3"><span data-plugin="counterup"><?php if(empty($previous_day_sales_list)){
                        }else{
                          foreach($previous_day_sales_list as $previous_sales){} echo $previous_sales->total_sales;
                        }  ?></span></h4>
                        </div>
                </div>

                <div class="col-xs-12 col-md-6 col-lg-6 col-xl-3">
                    <div class="card-box tilebox-one">
                        <i class="fi-tag float-right"></i>
                        <h6 class="text-muted text-uppercase mb-3">Last 7 Days Sales</h6>
                        <h4 class="mb-3"><span data-plugin="counterup">
                          <?php if(empty($this_week_sales_list)){
                          }else{
                            foreach($this_week_sales_list as $this_week){} echo $this_week->total_sales;
                          }  ?>
                        </span></h4>
                      </div>
                </div>

                <div class="col-xs-12 col-md-6 col-lg-6 col-xl-3">
                    <div class="card-box tilebox-one">
                        <i class="fi-briefcase float-right"></i>
                        <h6 class="text-muted text-uppercase mb-3">This Month Sales</h6>
                        <h4 class="mb-3" data-plugin="counterup">
                          <?php if(empty($current_month_sales_list)){
                          }else{
                            foreach($current_month_sales_list as $current_month_sales){} echo $current_month_sales->total_sales;
                          }  ?>
                        </h4>
                        </div>
                </div>
            </div>


            <div class="row">
                <div class="col-xl-12">
                  
                </div>

            </div>
            <!-- end row -->


        </div> <!-- container -->

    </div> <!-- content -->
