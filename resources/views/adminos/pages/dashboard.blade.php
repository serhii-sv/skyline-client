@extends('adminos.layouts.account')
@section('title')
    Account
@endsection
@section('content')
        <div class="main-content">
            <div class="row">
                <div class="col-lg-12">
                    <!--Page Content-->
                    <div class="wrapper wrapper-content">
                        @include('adminos.partials.breadcrumbs')
                        <!-- Start FROM HERE  -->
                            <div class="row">
                                <div class="col-sm-6 col-md-6 col-lg-6 col-xl-3">
                                    <div class="panel-box statistic-bg-purple radius">
                                        <div class="panel-box-content">
                                            <div class="row">
                                                <div class="col-6 statistic-box">
                                                    <h4 class="text-white">$1200</h4>
                                                    <h6 class="m-b-0 text-white">Total Revenue</h6>
                                                </div>
                                                <div class="col-6 pl-1 pl-2 statistic-charts pt-3">
                                                    <div id="sparkline1"></div>
                                                </div>
                                                <div class="col-12 statistic-footer">
                                                    <p class="text-white"><i class="feather icon-clock f-14"></i> update : 2:15 am</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-6 col-lg-6 col-xl-3">
                                    <div class="panel-box statistic-bg-info radius">
                                        <div class="panel-box-content">
                                            <div class="row">
                                                <div class="col-6 statistic-box">
                                                    <h4 class="text-white">700</h4>
                                                    <h6 class="m-b-0 text-white">Affiliate Revenue</h6>
                                                </div>
                                                <div class="col-6 pl-1 pl-2 statistic-charts pt-3">
                                                    <div id="sparkline2"></div>
                                                </div>
                                                <div class="col-12 statistic-footer">
                                                    <p class="text-white m-b-0"><i class="feather icon-clock f-14"></i> update : 2:15 am</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-6 col-lg-6 col-xl-3">
                                    <div class="panel-box statistic-bg-red radius">
                                        <div class="panel-box-content">
                                            <div class="row">
                                                <div class="col-6 statistic-box">
                                                    <h4 class="text-white">3600</h4>
                                                    <h6 class="m-b-0 text-white">+ Refunds</h6>
                                                </div>
                                                <div class="col-6 pl-1 pl-2 statistic-charts pt-3">
                                                    <div id="sparkline3"></div>
                                                </div>
                                                <div class="col-12 statistic-footer">
                                                    <p class="text-white m-b-0"><i class="feather icon-clock f-14"></i> update : 2:15 am</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-6 col-lg-6 col-xl-3">
                                    <div class="panel-box statistic-bg-yellow radius">
                                        <div class="panel-box-content">
                                            <div class="row">
                                                <div class="col-6 statistic-box">
                                                    <h4 class="text-white">$10,207</h4>
                                                    <h6 class="m-b-0 text-white">Visual Figure</h6>
                                                </div>
                                                <div class="col-6 pl-1 pl-2 statistic-charts pt-3">
                                                    <div id="sparkline4"></div>
                                                </div>
                                                <div class="col-12 statistic-footer">
                                                    <p class="text-white m-b-0"><i class="feather icon-clock f-14"></i> update : 2:15 am</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-9">
                                    <div class="panel-box">
                                        <div class="panel-box-title">
                                            <h5>Monthly View</h5>
                                            <div class="panel-box-tools">
                                                <a class="collapse-link">
                                                    <i class="fa fa-chevron-up"></i>
                                                </a>
                                                <a class="dropdown-toggle" href="#" data-toggle="dropdown">
                                                    <i class="fa fa-wrench"></i>
                                                </a>
                                                <ul class="dropdown-menu dropdown-user dropdown-menu-right">
                                                    <li><a href="#">Config option 1</a></li>
                                                    <li><a href="#">Config option 2</a></li>
                                                </ul>
                                                <a class="close-link">
                                                    <i class="fa fa-times"></i>
                                                </a>
                                            </div>
                                            <p class="float-right">For more details about usage, please refer
                                                <a href="https://www.amcharts.com/online-store/" class="text-navy">amCharts licence</a>
                                            </p>
                                        </div>
                                        <div class="panel-box-content">
                                            <div id="visitor" style="height:317px;"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-3">
                                    <div class="panel-box">
                                        <div class="col-12 text-center panel-box-title">
                                            <h6>Project Completed</h6>
                                        </div>
                                        <div class="panel-box-content" style="height:390px;">
                                            <div class="row">
                                                <div class="col-12 text-center">
                                                    <div class="col-12">
                                                        <div data-label="85%" class="radial-bar radial-bar-75 radial-bar-lg radial-bar-warning" data-toggle="tooltip" title="Project Completed 85%"></div>
                                                        <p>Version 1.0.0.5</p>
                                                        <h6><a href="#" class="yellow-link-color">View Project Report</a></h6>
                                                    </div>
                                                    <div class="pt-1 pl-3 pr-3">
                                                        <span class="pull-left">Current Task</span>
                                                        <span class="pull-right">30%</span>
                                                        <div class="progress" style="height: 4px; clear: both;">
                                                            <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100" style="width:30%;"></div>
                                                        </div>
                                                    </div>
                                                    <div class="pt-2 pl-3 pr-3">
                                                        <span class="pull-left">Fixed Bugs</span>
                                                        <span class="pull-right">60%</span>
                                                        <div class="progress" style="height: 4px; clear: both;">
                                                            <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width:60%"></div>
                                                        </div>
                                                    </div>
                                                    <div class="pt-2 pl-3 pr-3">
                                                        <span class="pull-left">Remaining Tasks</span>
                                                        <span class="pull-right">37%</span>
                                                        <div class="progress" style="height: 4px;  clear: both;">
                                                            <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="37" aria-valuemin="0" aria-valuemax="100" style="width:37%"></div>
                                                        </div>
                                                    </div>
                                                    <div class="pt-2 pl-3 pr-3">
                                                        <span class="pull-left">Overall Progress</span>
                                                        <span class="pull-right">60%</span>
                                                        <div class="progress" style="height: 4px; clear: both;">
                                                            <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width:60%"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--Sales Per Day, Visitor & Orders-->
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-4">
                                    <div class="panel-box">
                                        <div class="panel-box-content">
                                            <div class="small-box bg-aqua mb-0 h-250">
                                                <canvas id="sales-per-day" class="p-3"></canvas>
                                                <div class="inner custom-inner">
                                                    <h4>$ 2,150</h4>
                                                    <p>Sales Per Day</p>
                                                </div>
                                                <a class="small-box-footer" href="#">More info <i class="fa fa-arrow-circle-right"></i></a>
                                            </div>
                                            <div class="custom-card-footer text-center">
                                                <div class="monthly-static border-right">
                                                    <h5>$2035</h5>
                                                    <p>Total Revenue</p>
                                                </div>
                                                <div class="vertical-divider"></div>
                                                <div class="monthly-static border-right">
                                                    <h5>$540</h5>
                                                    <p>Today Sales</p>
                                                </div>
                                                <div class="vertical-divider"></div>
                                                <div class="monthly-static">
                                                    <h5>47</h5>
                                                    <p>Products</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-4">
                                    <div class="panel-box">
                                        <div class="panel-box-content">
                                            <div class="small-box bg-warning mb-0 h-250">
                                                <canvas id="visitors-per-day" class="p-3"></canvas>
                                                <div class="inner custom-inner">
                                                    <h4><i class="fa fa-user-plus"></i> 122,150</h4>
                                                    <p>Visitors Per Year</p>
                                                </div>
                                                <a class="small-box-footer" href="#">More info <i class="fa fa-arrow-circle-right"></i></a>
                                            </div>
                                            <div class="custom-card-footer text-center">
                                                <div class="monthly-static border-right">
                                                    <h5>3735</h5>
                                                    <p>This Month</p>
                                                </div>
                                                <div class="vertical-divider"></div>
                                                <div class="monthly-static border-right">
                                                    <h5>440</h5>
                                                    <p>This Week</p>
                                                </div>
                                                <div class="vertical-divider"></div>
                                                <div class="monthly-static">
                                                    <h5>67</h5>
                                                    <p>Today</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-4">
                                    <div class="panel-box">
                                        <div class="panel-box-content">
                                            <div class="small-box bg-red mb-0 h-250">
                                                <canvas id="orders-per-day" class="p-3"></canvas>
                                                <div class="inner custom-inner">
                                                    <h4><i class="fa fa-shopping-basket"></i> 15823</h4>
                                                    <p>Orders Per Year</p>
                                                </div>
                                                <a class="small-box-footer" href="#">More info <i class="fa fa-arrow-circle-right"></i></a>
                                            </div>
                                            <div class="custom-card-footer text-center">
                                                <div class="monthly-static border-right">
                                                    <h5>4735</h5>
                                                    <p>This Month</p>
                                                </div>
                                                <div class="vertical-divider"></div>
                                                <div class="monthly-static border-right">
                                                    <h5>940</h5>
                                                    <p>This Week</p>
                                                </div>
                                                <div class="vertical-divider"></div>
                                                <div class="monthly-static">
                                                    <h5>127</h5>
                                                    <p>Today</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--Application Sales-->
                            <div class="row">
                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-8">
                                    <div class="panel-box">
                                        <div class="panel-box-title">
                                            <h5>Application Sales</h5>
                                            <div class="panel-box-tools">
                                                <a class="collapse-link">
                                                    <i class="fa fa-chevron-up"></i>
                                                </a>
                                                <a class="dropdown-toggle" href="#" data-toggle="dropdown">
                                                    <i class="fa fa-wrench"></i>
                                                </a>
                                                <ul class="dropdown-menu dropdown-user dropdown-menu-right">
                                                    <li><a href="#">Config option 1</a></li>
                                                    <li><a href="#">Config option 2</a></li>
                                                </ul>
                                                <a class="close-link">
                                                    <i class="fa fa-times"></i>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="panel-box-content">
                                            <div class="table-responsive">
                                                <table class="table table-hover table-borderless">
                                                    <thead>
                                                    <tr>
                                                        <th><input type="checkbox" checked class="i-checks" name="input[]"></th>
                                                        <th>Application</th>
                                                        <th>Sales</th>
                                                        <th>Change</th>
                                                        <th>Avg Price</th>
                                                        <th>Total</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <tr>
                                                        <td>
                                                            <input type="checkbox" checked class="i-checks" name="input[]">
                                                        </td>
                                                        <td>
                                                            <div class="d-inline-block align-middle">
                                                                <h6 class="ml-0 pl-0">Adminos</h6>
                                                                <p class="text-muted m-b-0">Powerful Admin Theme</p>
                                                            </div>
                                                        </td>
                                                        <td>16,300</td>
                                                        <td><canvas id="app-sale1"></canvas></td>
                                                        <td>$53</td>
                                                        <td class="text-c-blue">$15,652</td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <input type="checkbox" checked class="i-checks" name="input[]">
                                                        </td>
                                                        <td>
                                                            <div class="d-inline-block align-middle">
                                                                <h6 class="ml-0 pl-0">Photoshop</h6>
                                                                <p class="text-muted m-b-0">Design Software</p>
                                                            </div>
                                                        </td>
                                                        <td>26,421</td>
                                                        <td><canvas id="app-sale2"></canvas></td>
                                                        <td>$35</td>
                                                        <td class="text-c-blue">$18,785</td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <input type="checkbox" checked class="i-checks" name="input[]">
                                                        </td>
                                                        <td>
                                                            <div class="d-inline-block align-middle">
                                                                <h6 class="ml-0 pl-0">RefineThemes</h6>
                                                                <p class="text-muted m-b-0">Best Admin Templates</p>
                                                            </div>
                                                        </td>
                                                        <td>8,265</td>
                                                        <td><canvas id="app-sale3"></canvas></td>
                                                        <td>$98</td>
                                                        <td class="text-c-blue">$9,652</td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <input type="checkbox" checked class="i-checks" name="input[]">
                                                        </td>
                                                        <td>
                                                            <div class="d-inline-block align-middle">
                                                                <h6 class="ml-0 pl-0">RFETech</h6>
                                                                <p class="text-muted m-b-0">Admin App</p>
                                                            </div>
                                                        </td>
                                                        <td>10,652</td>
                                                        <td><canvas id="app-sale4"></canvas></td>
                                                        <td>$20</td>
                                                        <td class="text-c-blue">$7,856</td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                                <div class="text-center">
                                                    <a href="#!" class=" b-b-primary text-primary">View all Projects</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-4">
                                    <div class="panel-box table-panel-box">
                                        <div class="panel-box-title ui-sortable-handle">
                                            <h5>Customer Reviews </h5>
                                            <div class="panel-box-tools">
                                                <a class="collapse-link ui-sortable">
                                                    <i class="fa fa-chevron-up"></i>
                                                </a>
                                                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                                    <i class="fa fa-wrench"></i>
                                                </a>
                                                <ul class="dropdown-menu dropdown-user">
                                                    <li><a href="#">Action option 1</a></li>
                                                    <li><a href="#">Action option 2</a></li>
                                                </ul>
                                                <a class="close-link">
                                                    <i class="fa fa-times"></i>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="panel-box-content">
                                            <div class="row reviews">
                                                <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2 text-center ui-sortable">
                                                    <img src="/adminos/img/users/user4.jpg" class="review-cirlce-img" alt="">
                                                </div>
                                                <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 review-by ui-sortable">
                                                    <h6 class="ml-2">Sarah Deo</h6>
                                                    <p class="ml-2">Highly recommend</p>
                                                </div>
                                                <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4 review-rating ui-sortable">
                                                    <i class="fa fa-star text-warning"></i>
                                                    <i class="fa fa-star text-warning"></i>
                                                    <i class="fa fa-star text-warning"></i>
                                                    <i class="fa fa-star text-warning"></i>
                                                    <i class="fa fa-star text-warning"></i>
                                                </div>
                                            </div>
                                            <div class="row col-lg-12 reviews ui-sortable">
                                                <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2 text-center ui-sortable">
                                                    <img src="/adminos/img/users/user1.jpg" class="review-cirlce-img" alt="">
                                                </div>
                                                <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 review-by ui-sortable">
                                                    <h6 class="ml-2">Jack Andrew</h6>
                                                    <p class="ml-2">Awesome</p>
                                                </div>
                                                <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4 review-rating ui-sortable">
                                                    <i class="fa fa-star text-warning"></i>
                                                    <i class="fa fa-star text-warning"></i>
                                                    <i class="fa fa-star text-warning"></i>
                                                    <i class="fa fa-star text-warning"></i>
                                                    <i class="fa fa-star text-warning"></i>
                                                </div>
                                            </div>
                                            <div class="row col-lg-12 reviews ui-sortable">
                                                <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2 text-center ui-sortable">
                                                    <img src="/adminos/img/users/user2.jpg" class="review-cirlce-img" alt="">
                                                </div>
                                                <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 review-by ui-sortable">
                                                    <h6 class="ml-2">John Simth</h6>
                                                    <p class="ml-2">Extremely Good</p>
                                                </div>
                                                <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4 review-rating ui-sortable">
                                                    <i class="fa fa-star text-warning"></i>
                                                    <i class="fa fa-star text-warning"></i>
                                                    <i class="fa fa-star text-warning"></i>
                                                    <i class="fa fa-star text-warning"></i>
                                                    <i class="fa fa-star text-muted"></i>
                                                </div>
                                            </div>
                                            <div class="row col-lg-12 reviews ui-sortable">
                                                <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2 text-center ui-sortable">
                                                    <img src="/adminos/img/users/user5.jpg" class="review-cirlce-img" alt="">
                                                </div>
                                                <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 review-by ui-sortable">
                                                    <h6 class="ml-2">Jasmine Carlos</h6>
                                                    <p class="ml-2">Highly recommend</p>
                                                </div>
                                                <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4 review-rating ui-sortable">
                                                    <i class="fa fa-star text-warning"></i>
                                                    <i class="fa fa-star text-warning"></i>
                                                    <i class="fa fa-star text-warning"></i>
                                                    <i class="fa fa-star text-warning"></i>
                                                    <i class="fa fa-star text-muted"></i>
                                                </div>
                                            </div>
                                            <div class="row col-lg-12 reviews ui-sortable">
                                                <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2 text-center ui-sortable">
                                                    <img src="/adminos/img/users/user6.jpg" class="review-cirlce-img" alt="">
                                                </div>
                                                <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 review-by ui-sortable">
                                                    <h6 class="ml-2">Alexa Deora</h6>
                                                    <p class="ml-2">Highly recommend</p>
                                                </div>
                                                <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4 review-rating ui-sortable">
                                                    <i class="fa fa-star text-warning"></i>
                                                    <i class="fa fa-star text-warning"></i>
                                                    <i class="fa fa-star text-warning"></i>
                                                    <i class="fa fa-star text-warning"></i>
                                                    <i class="fa fa-star text-muted"></i>
                                                </div>
                                            </div>
                                            <div class="text-center">
                                                <a class=" b-b-primary text-primary" href="#">View all Reviews</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--Smart Chat And Top Visitors-->
                            <div class="row">
                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-6">
                                    <div class="chat_window panel-box">
                                        <div class="top_menu panel-box-title">
                                            <h5 class="text-center">Chat</h5>
                                            <div class="panel-box-tools">
                                                <a class="collapse-link">
                                                    <i class="fa fa-chevron-up"></i>
                                                </a>
                                                <a class="dropdown-toggle" href="#" data-toggle="dropdown">
                                                    <i class="fa fa-wrench"></i>
                                                </a>
                                                <ul class="dropdown-menu dropdown-user dropdown-menu-right">
                                                    <li><a href="#">Config option 1</a></li>
                                                    <li><a href="#">Config option 2</a></li>
                                                </ul>
                                                <a class="close-link">
                                                    <i class="fa fa-times"></i>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="panel-box-content msg-menu">
                                            <ul class="messages">
                                                <li class="message left appeared">
                                                    <div class="avatar female-pic"><img src="/adminos/img/users/user4.jpg" alt=""></div>
                                                    <div class="text_wrapper">
                                                        <div class="text">Hello John! :)</div>
                                                    </div>
                                                </li>
                                                <li class="message right appeared">
                                                    <div class="avatar male-pic"><img src="/adminos/img/users/user2.jpg" alt="">
                                                    </div>
                                                    <div class="text_wrapper">
                                                        <div class="text">Hi Ninna! How are you?</div>
                                                    </div>
                                                </li>
                                                <li class="message left appeared">
                                                    <div class="avatar female-pic"><img src="/adminos/img/users/user4.jpg" alt=""></div>
                                                    <div class="text_wrapper">
                                                        <div class="text">I'm fine, thank you!</div>
                                                    </div>
                                                </li>
                                            </ul>
                                            <div class="bottom_wrapper clearfix">
                                                <div class="d-flex">
                                                    <a class="nav-link" href="#"><i class="feather icon-mic"></i></a>
                                                    <a class="nav-link" href="#"><i class="feather icon-camera"></i></a>
                                                    <a class="nav-link" href="#"><i class="feather icon-paperclip"></i></a>
                                                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" aria-expanded="true" href="#">
                                                        <i class="feather icon-more-horizontal"></i>
                                                    </a>
                                                    <ul class="dropdown-menu dropdown-user dropdown-menu-right">
                                                        <li><a href="#">Config option 1</a></li>
                                                        <li><a href="#">Config option 2</a></li>
                                                    </ul>
                                                </div>
                                                <div class="message_input_wrapper">
                                                    <input class="message_input" id="send-text" placeholder="Type your message here..." />
                                                </div>
                                                <div class="send_message">
                                                    <div class="icon"></div>
                                                    <div class="text">Send</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-6">
                                    <div class="panel-box">
                                        <div class="top_menu panel-box-title">
                                            <h5>Sales</h5>
                                            <div class="panel-box-tools">
                                                <a class="collapse-link">
                                                    <i class="fa fa-chevron-up"></i>
                                                </a>
                                                <a class="dropdown-toggle" href="#" data-toggle="dropdown">
                                                    <i class="fa fa-wrench"></i>
                                                </a>
                                                <ul class="dropdown-menu dropdown-user dropdown-menu-right">
                                                    <li><a href="#">Config option 1</a></li>
                                                    <li><a href="#">Config option 2</a></li>
                                                </ul>
                                                <a class="close-link">
                                                    <i class="fa fa-times"></i>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="panel-box-content p-3 bg-sky-line-blue">
                                            <div id="vmap" style="width:100%; height:356px;"></div>
                                        </div>
                                        <div class="panel-box-footer bg-inverse">
                                            <div class="panel-content jqvmap-bg-ocean">
                                                <div class="d-flex align-items-center">
                                                    <img class="d-inline-block jqvmap-country-flag mr-3" alt="flag" src="/adminos/img/flag-icon-css/flags/4x3/us.svg" style="width:55px; height: auto;">
                                                    <h6 class="d-inline-block fw-100 m-0 text-white">Sales in:
                                                        <small class="jqvmap-country">United States of America : $4,353</small>
                                                    </h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <!-- Social widgets -->
                                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-3 ui-sortable">
                                    <div class="panel-box">
                                        <div class="panel-box-title ui-sortable-handle">
                                            <h5>Facebook Status</h5>
                                        </div>
                                        <div class="panel-box-content">
                                            <div class="facebook-bg custom-bg-height">
                                                <i class="fa fa-facebook-f"></i>
                                            </div>
                                        </div>
                                        <div class="panel-box-content border-top">
                                            <div class="row pt-3 pb-3">
                                                <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 ui-sortable mb-2">
                                                    <div class="sell-ratio">
                                                        <h6 class="text-muted pl-2">Followers </h6>
                                                        <div class="progress-w-percent pl-2 pr-2">
                                                            <span class="progress-value">72k </span>
                                                            <div class="progress" style="height: 4px;">
                                                                <div class="progress-bar progress-bar-success" role="progressbar" style="width: 72%;" aria-valuenow="72" aria-valuemin="0" aria-valuemax="100"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 ui-sortable mb-2">
                                                    <div class="sell-ratio">
                                                        <h6 class="text-muted pl-2">Page Likes</h6>
                                                        <div class="progress-w-percent pl-2 pr-2">
                                                            <span class="progress-value">39k</span>
                                                            <div class="progress" style="height: 4px;">
                                                                <div class="progress-bar progress-bar-info" role="progressbar" style="width: 39%;" aria-valuenow="39" aria-valuemin="0" aria-valuemax="100"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="space"></div>
                                                <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 ui-sortable mb-2">
                                                    <div class="sell-ratio">
                                                        <h6 class="text-muted pl-2">Shared</h6>
                                                        <div class="progress-w-percent pl-2 pr-2">
                                                            <span class="progress-value">25k </span>
                                                            <div class="progress" style="height: 4px;">
                                                                <div class="progress-bar progress-bar-warning" role="progressbar" style="width: 39%;" aria-valuenow="39" aria-valuemin="0" aria-valuemax="100"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 ui-sortable mb-2">
                                                    <div class="sell-ratio">
                                                        <h6 class="text-muted pl-2">Comments </h6>
                                                        <div class="progress-w-percent pl-2 pr-2">
                                                            <span class="progress-value">61k </span>
                                                            <div class="progress" style="height: 4px;">
                                                                <div class="progress-bar progress-bar-danger" role="progressbar" style="width: 61%;" aria-valuenow="61" aria-valuemin="0" aria-valuemax="100"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-3 ui-sortable">
                                    <div class="panel-box">
                                        <div class="panel-box-title ui-sortable-handle">
                                            <h5>Twitter Status</h5>
                                        </div>
                                        <div class="panel-box-content">
                                            <div class="twitter-bg custom-bg-height">
                                                <i class="fa fa-twitter"></i>
                                            </div>
                                        </div>
                                        <div class="panel-box-content border-top">
                                            <div class="row  pt-3 pb-3">
                                                <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 ui-sortable mb-2">
                                                    <div class="sell-ratio">
                                                        <h6 class="text-muted pl-2">Followers </h6>
                                                        <div class="progress-w-percent pl-2 pr-2">
                                                            <span class="progress-value">56k </span>
                                                            <div class="progress" style="height: 4px;">
                                                                <div class="progress-bar progress-bar-success" role="progressbar" style="width: 56%;" aria-valuenow="56" aria-valuemin="0" aria-valuemax="100"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 ui-sortable mb-2">
                                                    <div class="sell-ratio">
                                                        <h6 class="text-muted pl-2">Page Likes</h6>
                                                        <div class="progress-w-percent pl-2 pr-2">
                                                            <span class="progress-value">89k</span>
                                                            <div class="progress" style="height: 4px;">
                                                                <div class="progress-bar progress-bar-info" role="progressbar" style="width: 89%;" aria-valuenow="89" aria-valuemin="0" aria-valuemax="100"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="space"></div>
                                                <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 ui-sortable mb-2">
                                                    <div class="sell-ratio">
                                                        <h6 class="text-muted pl-2">Shared</h6>
                                                        <div class="progress-w-percent pl-2 pr-2">
                                                            <span class="progress-value">55k </span>
                                                            <div class="progress" style="height: 4px;">
                                                                <div class="progress-bar progress-bar-warning" role="progressbar" style="width: 55%;" aria-valuenow="55" aria-valuemin="0" aria-valuemax="100"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 ui-sortable mb-2">
                                                    <div class="sell-ratio">
                                                        <h6 class="text-muted pl-2"> Comments </h6>
                                                        <div class="progress-w-percent pl-2 pr-2">
                                                            <span class="progress-value">61k </span>
                                                            <div class="progress" style="height: 4px;">
                                                                <div class="progress-bar progress-bar-danger" role="progressbar" style="width: 61%;" aria-valuenow="61" aria-valuemin="0" aria-valuemax="100"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-3 ui-sortable">
                                    <div class="panel-box">
                                        <div class="panel-box-title ui-sortable-handle">
                                            <h5>Instagram Status</h5>
                                        </div>
                                        <div class="panel-box-content">
                                            <div class="instagram-bg custom-bg-height">
                                                <i class="fa fa-instagram"></i>
                                            </div>
                                        </div>
                                        <div class="panel-box-content border-top">
                                            <div class="row pt-3 pb-3">
                                                <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 ui-sortable mb-2">
                                                    <div class="sell-ratio">
                                                        <h6 class="text-muted pl-2">Followers </h6>
                                                        <div class="progress-w-percent pl-2 pr-2">
                                                            <span class="progress-value">72k </span>
                                                            <div class="progress" style="height: 4px;">
                                                                <div class="progress-bar progress-bar-success" role="progressbar" style="width: 72%;" aria-valuenow="72" aria-valuemin="0" aria-valuemax="100"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 ui-sortable mb-2">
                                                    <div class="sell-ratio">
                                                        <h6 class="text-muted pl-2">Page Likes</h6>
                                                        <div class="progress-w-percent pl-2 pr-2">
                                                            <span class="progress-value">39k</span>
                                                            <div class="progress" style="height: 4px;">
                                                                <div class="progress-bar progress-bar-info" role="progressbar" style="width: 39%;" aria-valuenow="39" aria-valuemin="0" aria-valuemax="100"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="space"></div>
                                                <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 ui-sortable mb-2">
                                                    <div class="sell-ratio">
                                                        <h6 class="text-muted pl-2">Shared</h6>
                                                        <div class="progress-w-percent pl-2 pr-2">
                                                            <span class="progress-value">25k </span>
                                                            <div class="progress" style="height: 4px;">
                                                                <div class="progress-bar progress-bar-warning" role="progressbar" style="width: 39%;" aria-valuenow="39" aria-valuemin="0" aria-valuemax="100"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 ui-sortable mb-2">
                                                    <div class="sell-ratio">
                                                        <h6 class="text-muted pl-2"> Comments </h6>
                                                        <div class="progress-w-percent pl-2 pr-2">
                                                            <span class="progress-value">61k </span>
                                                            <div class="progress" style="height: 4px;">
                                                                <div class="progress-bar progress-bar-danger" role="progressbar" style="width: 61%;" aria-valuenow="61" aria-valuemin="0" aria-valuemax="100"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-3 ui-sortable">
                                    <div class="panel-box">
                                        <div class="panel-box-title ui-sortable-handle">
                                            <h5>YouTube Status</h5>
                                        </div>
                                        <div class="panel-box-content">
                                            <div class="youtube-bg custom-bg-height">
                                                <i class="fa fa-youtube"></i>
                                            </div>
                                        </div>
                                        <div class="panel-box-content border-top">
                                            <div class="row pt-3 pb-3">
                                                <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 ui-sortable mb-2">
                                                    <div class="sell-ratio">
                                                        <h6 class="text-muted pl-2">Subscribers </h6>
                                                        <div class="progress-w-percent pl-2 pr-2">
                                                            <span class="progress-value">57k </span>
                                                            <div class="progress" style="height: 4px;">
                                                                <div class="progress-bar progress-bar-success" role="progressbar" style="width: 57%;" aria-valuenow="57" aria-valuemin="0" aria-valuemax="100"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 ui-sortable mb-2">
                                                    <div class="sell-ratio">
                                                        <h6 class="text-muted pl-2">Video Likes</h6>
                                                        <div class="progress-w-percent pl-2 pr-2">
                                                            <span class="progress-value">69k</span>
                                                            <div class="progress" style="height: 4px;">
                                                                <div class="progress-bar progress-bar-info" role="progressbar" style="width: 69%;" aria-valuenow="69" aria-valuemin="0" aria-valuemax="100"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="space"></div>
                                                <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 ui-sortable mb-2">
                                                    <div class="sell-ratio">
                                                        <h6 class="text-muted pl-2">Shared</h6>
                                                        <div class="progress-w-percent pl-2 pr-2">
                                                            <span class="progress-value">45k </span>
                                                            <div class="progress" style="height: 4px;">
                                                                <div class="progress-bar progress-bar-warning" role="progressbar" style="width: 45%;" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 ui-sortable mb-2">
                                                    <div class="sell-ratio">
                                                        <h6 class="text-muted pl-2"> Comments </h6>
                                                        <div class="progress-w-percent pl-2 pr-2">
                                                            <span class="progress-value">31k </span>
                                                            <div class="progress" style="height: 4px;">
                                                                <div class="progress-bar progress-bar-danger" role="progressbar" style="width: 31%;" aria-valuenow="31" aria-valuemin="0" aria-valuemax="100"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Social widgets -->
                            </div>
                    </div>
                    @include('adminos.partials.footer')
                </div>
            </div>
        </div>

@endsection

@push('scripts')
    <!--Add VectorMap JS Library before <body> tag -->
    <script src="{{ asset('adminos/plugins/jqvmap/js/jquery.vmap.js') }}"></script>
    <script src="{{ asset('adminos/plugins/jqvmap/js/jquery.vmap.world.js') }}"></script>
    <script src="{{ asset('adminos/plugins/jqvmap/js/jquery.vmap.sampledata.js') }}"></script>

    <script>
        $(document).ready(function() {
            jQuery('#vmap').vectorMap({
                map: 'world_en',
                backgroundColor: null,
                color: '#00b3b3',
                hoverOpacity: 0.7,
                selectedColor: '#FFC107',
                enableZoom: true,
                showTooltip: true,
                values: data_array,
                scaleColors: ['#F8AC59', '#28A745'],
                normalizeFunction: 'polynomial',
                onRegionClick: function(element, country_code, country)
                {
                    /* When you will click on country, the region has the code, you can find the data_array in jquery.vmap.sampledata.js
                    + and other thing we have to set the code to LowerCase because in jquery.vmap.sampledata.js the country code is in lowercase
                    */
                    //Generate random sales numbers
                    var sales = Math.floor(Math.random() * 100);
                    $('.jqvmap-country-flag').attr('src', 'img/flag-icon-css/flags/4x3/' + country_code.toLowerCase() + '.svg');
                    $('.jqvmap-country').html(country + ' - ' + '$' + sales.toFixed(2).replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,"));
                }
            });
        });
    </script>

    <script src="{{ asset('adminos/plugins/iCheck/icheck.min.js') }}"></script>
    <script>
        $(document).ready(function () {
            $('.i-checks').iCheck({
                checkboxClass: 'icheckbox_square-green',
                radioClass: 'iradio_square-green',
            });
        });
    </script>
    <script src="{{ asset('adminos/plugins/chartJS/js/Chart.js') }}"></script>

    <script>
        $(document).ready(function () {
            var ctx1 = document.getElementById('app-sale1').getContext("2d");
            var myChart = new Chart(ctx1, {
                type: 'line',
                data: amuntchart('#11c15b', [1, 15, 30, 15, 25, 35, 45, 20, 25, 30], 'transparent'),
                options: buildchartoption(),
            });
            var ctx2 = document.getElementById('app-sale2').getContext("2d");
            var myChart = new Chart(ctx2, {
                type: 'line',
                data: amuntchart('#448aff', [45, 30, 25, 35, 20, 35, 45, 20, 25, 1], 'transparent'),
                options: buildchartoption(),
            });
            var ctx3 = document.getElementById('app-sale3').getContext("2d");
            var myChart = new Chart(ctx3, {
                type: 'line',
                data: amuntchart('#ff5252', [1, 45, 24, 40, 20, 35, 10, 20, 45, 30], 'transparent'),
                options: buildchartoption(),
            });
            var ctx4 = document.getElementById('app-sale4').getContext("2d");
            var myChart = new Chart(ctx4, {
                type: 'line',
                data: amuntchart('#536dfe', [1, 15, 45, 15, 25, 35, 45, 20, 25, 30], 'transparent'),
                options: buildchartoption(),
            });

            function amuntchart(a, b, f) {
                if (f == null) {
                    f = "rgba(0,0,0,0)";
                }
                return {
                    labels: ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October"],
                    datasets: [{
                        label: "",
                        borderColor: a,
                        borderWidth: 2,
                        hitRadius: 30,
                        pointHoverRadius: 4,
                        pointBorderWidth: 50,
                        pointHoverBorderWidth: 12,
                        pointBackgroundColor: Chart.helpers.color("#000000").alpha(0).rgbString(),
                        pointBorderColor: Chart.helpers.color("#000000").alpha(0).rgbString(),
                        pointHoverBackgroundColor: a,
                        pointHoverBorderColor: Chart.helpers.color("#000000").alpha(.1).rgbString(),
                        fill: true,
                        backgroundColor: f,
                        data: b,
                    }]
                };
            }

            function buildchartoption() {
                return {
                    maintainAspectRatio: false,
                    title: {
                        display: !1
                    },
                    tooltips: {
                        enabled: false,
                    },
                    legend: {
                        display: !1,
                        labels: {
                            usePointStyle: !1
                        }
                    },
                    responsive: !0,
                    maintainAspectRatio: !0,
                    hover: {
                        mode: "index"
                    },
                    scales: {
                        xAxes: [{
                            display: !1,
                            gridLines: !1,
                            scaleLabel: {
                                display: !0,
                                labelString: "Month"
                            }
                        }],
                        yAxes: [{
                            display: !1,
                            gridLines: !1,
                            scaleLabel: {
                                display: !0,
                                labelString: "Value"
                            },
                            ticks: {
                                beginAtZero: !0
                            }
                        }]
                    },
                    elements: {
                        point: {
                            radius: 4,
                            borderWidth: 12
                        }
                    },
                    layout: {
                        padding: {
                            left: 0,
                            right: 0,
                            top: 5,
                            bottom: 0
                        }
                    }
                };
            }
        });
    </script>

    <!-- Add ChartJS Library before </body> -->
    <script src="{{ asset('adminos/plugins/chartJS/js/Chart.js') }}"></script>

    <script>
        var ctx = document.getElementById("sales-per-day").getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Oct", "Sep", "Nov", "Dec"],
                datasets: [{
                    label: 'Sales',
                    data: [90, 60, 50, 20, 40, 30, 20, 34, 45, 34, 12, 34],
                    backgroundColor: "#17a2b8",
                    borderColor: "#17a2b8",
                    borderWidth: 1
                }, {
                    label: 'Products',
                    data: [30, 29, 15, 35, 20, 23, 10, 60, 50, 20, 40, 30],
                    backgroundColor: "#F3F3F3",
                    borderColor: "#F3F3F3",
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{}]
                },
                legend: {
                    display: true,
                    position: 'top',
                    labels: {
                        fontColor: '#F3F3F3',
                        fontFamily: 'Circular Std Book',
                        fontSize: 14,
                    }
                },
                scales: {
                    xAxes: [{
                        ticks: {
                            fontSize: 14,
                            fontFamily: 'Circular Std Book',
                            fontColor: '#F3F3F3',
                        }
                    }],
                    yAxes: [{
                        ticks: {
                            fontSize: 14,
                            fontFamily: 'Circular Std Book',
                            fontColor: '#F3F3F3',
                        }
                    }]
                }
            }
        });
        //Unique Visitors Per Day
        var ctx = document.getElementById("visitors-per-day").getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Oct", "Sep", "Nov", "Dec"],
                datasets: [{
                    label: 'Unique Visitors',
                    data: [30, 29, 15, 35, 20, 23, 10, 60, 50, 20, 40, 30],
                    backgroundColor: "#fd7e14",
                    borderColor: "#fd7e14",
                    borderWidth: 2
                }, {
                    label: 'Regular Visitors',
                    data: [90, 60, 50, 20, 40, 30, 20, 34, 45, 34, 12, 34],
                    backgroundColor: "#F3F3F3",
                    borderColor: "#F3F3F3",
                    borderWidth: 2
                }]
            },
            options: {
                scales: {
                    yAxes: [{}]
                },
                legend: {
                    display: true,
                    position: 'top',
                    labels: {
                        fontColor: '#F3F3F3',
                        fontFamily: 'Circular Std Book',
                        fontSize: 14,
                    }
                },
                scales: {
                    xAxes: [{
                        ticks: {
                            fontSize: 14,
                            fontFamily: 'Circular Std Book',
                            fontColor: '#F3F3F3',
                        }
                    }],
                    yAxes: [{
                        ticks: {
                            fontSize: 14,
                            fontFamily: 'Circular Std Book',
                            fontColor: '#F3F3F3',
                        }
                    }]
                }
            }
        });
        //Orders Per Day
        var ctx = document.getElementById("orders-per-day").getContext('2d');
        ctx.height = 500;
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Oct", "Sep", "Nov", "Dec"],
                datasets: [{
                    label: 'Unique Orders',
                    data: [90, 60, 50, 20, 40, 30, 20, 34, 45, 34, 12, 34],
                    backgroundColor: "#FF6384",
                    borderColor: "#FF6384",
                    borderWidth: 2
                }, {
                    label: 'Regular Orders',
                    data: [30, 29, 15, 35, 20, 23, 10, 60, 50, 20, 40, 30],
                    backgroundColor: "#F3F3F3",
                    borderColor: "#F3F3F3",
                    borderWidth: 2
                }]
            },
            options: {
                scales: {
                    yAxes: [{}]
                },
                legend: {
                    display: true,
                    position: 'top',
                    labels: {
                        fontColor: '#F3F3F3',
                        fontFamily: 'Circular Std Book',
                        fontSize: 14,
                    }
                },
                scales: {
                    xAxes: [{
                        ticks: {
                            fontSize: 14,
                            fontFamily: 'Circular Std Book',
                            fontColor: '#F3F3F3',
                        }
                    }],
                    yAxes: [{
                        ticks: {
                            fontSize: 14,
                            fontFamily: 'Circular Std Book',
                            fontColor: '#F3F3F3',
                        }
                    }]
                }
            }
        });
    </script>

    <script src="{{ asset('adminos/plugins/amcharts/amcharts.js') }}"></script>
    <script src="{{ asset('adminos/plugins/amcharts/serial.js') }}"></script>
    <script src="{{ asset('adminos/plugins/amcharts/animated.js') }}"></script>
   <script>
       AmCharts.makeChart("visitor", {
           type: "serial",
           hideCredits: !0,
           theme: "light",
           dataDateFormat: "YYYY-MM-DD",
           precision: 2,
           valueAxes: [{
               id: "v1",
               title: "Visitors",
               position: "left",
               autoGridCount: !1,
               labelFunction: function (e) {
                   return "$" + Math.round(e) + "M"
               }
           }, {
               id: "v2",
               title: "New Visitors",
               gridAlpha: 0,
               position: "right",
               autoGridCount: !1
           }],
           graphs: [{
               id: "g3",
               valueAxis: "v1",
               lineColor: "#feb798",
               fillColors: "#feb798",
               fillAlphas: 1,
               type: "column",
               title: "Returning Visitor",
               valueField: "sales2",
               clustered: !1,
               columnWidth: .5,
               legendValueText: "$[[value]]M",
               balloonText: "[[title]]<br /><b style='font-size: 130%'>$[[value]]M</b>"
           }, {
               id: "g4",
               valueAxis: "v1",
               lineColor: "#fe9365",
               fillColors: "#fe9365",
               fillAlphas: 1,
               type: "column",
               title: "New visitor",
               valueField: "sales1",
               clustered: !1,
               columnWidth: .3,
               legendValueText: "$[[value]]M",
               balloonText: "[[title]]<br /><b> style='font-size: 130%'>$[[value]]M</b>"
           }, {
               id: "g1",
               valueAxis: "v2",
               bullet: "round",
               bulletBorderAlpha: 1,
               bulletColor: "#FFFFFF",
               bulletSize: 5,
               hideBulletsCount: 50,
               lineThickness: 2,
               lineColor: "#0df3a3",
               type: "smoothedLine",
               title: "Last Month Visitor",
               useLineColorForBulletBorder: !0,
               valueField: "market1",
               balloonText: "[[title]]<br /><b> style='font-size: 130%'>[[value]]</b>"
           }, {
               id: "g2",
               valueAxis: "v2",
               bullet: "round",
               bulletBorderAlpha: 1,
               bulletColor: "#FFFFFF",
               bulletSize: 5,
               hideBulletsCount: 50,
               lineThickness: 2,
               lineColor: "#fe5d70",
               dashLength: 5,
               title: "Average Visitor",
               useLineColorForBulletBorder: !0,
               valueField: "market2",
               balloonText: "[[title]]<br /><b> style='font-size: 130%'>[[value]]</b>"
           }],
           chartCursor: {
               pan: !0,
               valueLineEnabled: !0,
               valueLineBalloonEnabled: !0,
               cursorAlpha: 0,
               valueLineAlpha: .2
           },
           categoryField: "date",
           categoryAxis: {
               parseDates: !0,
               dashLength: 1,
               minorGridEnabled: !0
           },
           legend: {
               useGraphSettings: !0,
               position: "top"
           },
           balloon: {
               borderThickness: 1,
               cornerRadius: 5,
               shadowAlpha: 0
           },
           dataProvider: [{
               date: "2013-01-16",
               market1: 71,
               market2: 75,
               sales1: 5,
               sales2: 8
           }, {
               date: "2013-01-17",
               market1: 74,
               market2: 78,
               sales1: 4,
               sales2: 6
           }, {
               date: "2013-01-18",
               market1: 78,
               market2: 88,
               sales1: 5,
               sales2: 2
           }, {
               date: "2013-01-19",
               market1: 85,
               market2: 89,
               sales1: 8,
               sales2: 9
           }, {
               date: "2013-01-20",
               market1: 82,
               market2: 89,
               sales1: 9,
               sales2: 6
           }, {
               date: "2013-01-21",
               market1: 83,
               market2: 85,
               sales1: 3,
               sales2: 5
           }, {
               date: "2013-01-22",
               market1: 88,
               market2: 92,
               sales1: 5,
               sales2: 7
           }, {
               date: "2013-01-23",
               market1: 85,
               market2: 90,
               sales1: 7,
               sales2: 6
           }, {
               date: "2013-01-24",
               market1: 85,
               market2: 91,
               sales1: 9,
               sales2: 5
           }, {
               date: "2013-01-25",
               market1: 80,
               market2: 84,
               sales1: 5,
               sales2: 8
           }, {
               date: "2013-01-26",
               market1: 87,
               market2: 92,
               sales1: 4,
               sales2: 8
           }, {
               date: "2013-01-27",
               market1: 84,
               market2: 87,
               sales1: 3,
               sales2: 4
           }, {
               date: "2013-01-28",
               market1: 83,
               market2: 88,
               sales1: 5,
               sales2: 7
           }, {
               date: "2013-01-29",
               market1: 84,
               market2: 87,
               sales1: 5,
               sales2: 8
           }, {
               date: "2013-01-30",
               market1: 81,
               market2: 85,
               sales1: 4,
               sales2: 7
           }]
       });
   </script>
@endpush
