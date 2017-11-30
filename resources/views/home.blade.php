@extends('layouts.app')

@section('content')
    <div class="page-wrapper">
        <script src="/assets/plugins/gridstack/lodash.js"></script>
        <script>
            (function(w,d,t,f){  w[f]=w[f]||function(c,k,n){s=w[f],k=s['k']=(s['k']||(k?('&k='+k):''));s['c']=
                c=(c  instanceof  Array)?c:[c];s['n']=n=n||0;L=d.createElement(t),e=d.getElementsByTagName(t)[0];
                L.async=1;L.src='//feed.aqicn.org/feed/'+(c[n].city)+'/'+(c[n].lang||'')+'/feed.v1.js?n='+n+k;
                e.parentNode.insertBefore(L,e);  };  })(  window,document,'script','_aqiFeed'  );
        </script>
        <!-- Row -->
        <div class="row page-titles"></div>
        <!-- Row -->
        <!-- ============================================================== -->
        <!-- Container fluid  -->
        <!-- ============================================================== -->
        <div class="container-fluid">

            <!-- Row -->
            <div class="row">
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">@lang('general.weather')</h4>
                        </div>
                        <div class="card-body">
                            <hr>
                            <table class="table no-border lite-padding">
                                <tbody>
                                <tr>
                                    <div  id='my-container'></div>
                                    <script  type="text/javascript"  charset="utf-8">
                                        var french = {
                                            0: "lundi",
                                            1: "mardi",
                                            2: "mercredi",
                                            3: "jeudi",
                                            4: "vendredi",
                                            5: "samedi",
                                            6: "dimanche"
                                        };
                                        var english = {
                                            0: "Monday",
                                            1: "Tuesday",
                                            2: "Wednesday",
                                            3: "Thursday",
                                            4: "Friday",
                                            5: "Saturday",
                                            6: "Sunday"
                                        };
                                        var keyByValue = function(value, tab) {

                                            var kArray = Object.keys(tab);        // Creating array of keys
                                            var vArray = Object.values(tab);      // Creating array of values
                                            var vIndex = vArray.indexOf(value);         // Finding value index

                                            return kArray[vIndex];                      // Returning key by value index
                                        }
                                        _aqiFeed({  city:"{{ \Illuminate\Support\Facades\Auth::user()->city_name }}",
                                            lang:"{{ app()->getLocale() }}",  callback:function(aqi){
                                                var key;
                                                var day = aqi.date.substr(0, aqi.date.indexOf(" "));
                                                if ((key = keyByValue(day, french)) === 0)
                                                    key = 6;
                                                else
                                                {
                                                    key--;
                                                }
                                                var locale = "{{ app()->getLocale() }}";
                                                if (locale === "fr")
                                                    var date = french[key] + aqi.date.substr(aqi.date.indexOf(" "));
                                                else if (locale == "en")
                                                {

                                                    if ((key = keyByValue(day, english)) === 0)
                                                        key = 6;
                                                    var date = english[key] + aqi.date.substr(aqi.date.indexOf(" "));
                                                }

                                                aqi.details = aqi.details.replace(aqi.date, date);
                                                $("#my-container").html(aqi.details);
                                            }});
                                    </script>
                                </tr>
                                </tbody>
                            </table>
                            <hr>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Feeds</h4>
                            <ul class="feeds">
                                <li>
                                    <div class="bg-light-info"><i class="fa fa-bell-o"></i></div> You have 4 pending tasks. <span class="text-muted">Just Now</span></li>
                                <li>
                                    <div class="bg-light-success"><i class="ti-server"></i></div> Server #1 overloaded.<span class="text-muted">2 Hours ago</span></li>
                                <li>
                                    <div class="bg-light-warning"><i class="ti-shopping-cart"></i></div> New order received.<span class="text-muted">31 May</span></li>
                                <li>
                                    <div class="bg-light-danger"><i class="ti-user"></i></div> New user registered.<span class="text-muted">30 May</span></li>
                                <li>
                                    <div class="bg-light-inverse"><i class="fa fa-bell-o"></i></div> New Version just arrived. <span class="text-muted">27 May</span></li>
                                <li>
                                    <div class="bg-light-info"><i class="fa fa-bell-o"></i></div> You have 4 pending tasks. <span class="text-muted">Just Now</span></li>
                                <li>
                                    <div class="bg-light-danger"><i class="ti-user"></i></div> New user registered.<span class="text-muted">30 May</span></li>
                                <li>
                                    <div class="bg-light-inverse"><i class="fa fa-bell-o"></i></div> New Version just arrived. <span class="text-muted">27 May</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Row -->
            <div class="row">
                <div class="col-lg-4 col-md-12">
                    <!-- card -->
                    <div class="card card-inverse card-info">
                        <div class="card-body">
                            <div class="d-flex">
                                <div class="m-r-20 align-self-center">
                                    <h1 class="text-white"><i class="ti-pie-chart"></i></h1></div>
                                <div>
                                    <h3 class="card-title">Overall Sales</h3>
                                    <h6 class="card-subtitle">March  2017</h6> </div>
                            </div>
                            <div class="row">
                                <div class="col-12 p-t-10 p-b-20 align-self-center">
                                    <h2 class="font-light text-white">$14,000</h2>
                                    <div class="progress">
                                        <div class="progress-bar bg-success" role="progressbar" style="width: 88%; height: 6px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- card -->
                </div>
                <div class="col-lg-4 col-md-12">
                    <div class="card card-inverse card-success">
                        <div class="card-body">
                            <div class="d-flex">
                                <div class="m-r-20 align-self-center">
                                    <h1 class="text-white"><i class="icon-cloud-download"></i></h1></div>
                                <div>
                                    <h3 class="card-title">Today's Sales</h3>
                                    <h6 class="card-subtitle">March  2017</h6> </div>
                            </div>
                            <div class="row">
                                <div class="col-4 align-self-center">
                                    <h2 class="font-light text-white">$354</h2> </div>
                                <div class="col-8 p-t-10 p-b-20 text-right">
                                    <div class="spark-count" style="height:50px"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12">
                    <!-- card -->
                    <div class="card card-inverse card-danger">
                        <div class="card-body">
                            <div class="d-flex">
                                <div class="m-r-20 align-self-center">
                                    <h1 class="text-white"><i class="ti-pie-chart"></i></h1></div>
                                <div>
                                    <h3 class="card-title">Monthly Sales</h3>
                                    <h6 class="card-subtitle">March  2017</h6> </div>
                            </div>
                            <div class="row">
                                <div class="col-12 p-t-10 p-b-20 align-self-center">
                                    <h2 class="font-light text-white">$1800</h2>
                                    <div class="progress">
                                        <div class="progress-bar bg-white" role="progressbar" style="width: 58%; height: 6px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- card -->
                </div>
            </div>
            <!-- Row -->
            <div class="row">
                <!-- Column -->
                <div class="col-lg-4">
                    <div class="card">
                        <img class="card-img-top img-responsive" src="/assets/images/big/img1.jpg" alt="Card image cap">
                        <div class="card-body">
                            <ul class="list-inline font-14">
                                <li class="p-l-0">20 May 2016</li>
                                <li><a href="javascript:void(0)" class="link">3 Comment</a></li>
                            </ul>
                            <h4 class="font-normal">Featured Hydroflora Pots Garden &amp; Outdoors</h4>
                            <p class="m-b-0 m-t-10">Titudin venenatis ipsum ac feugiat. Vestibulum ullamcorper quam.</p>
                            <button class="btn btn-success btn-rounded waves-effect waves-light m-t-20">Read more</button>
                        </div>
                    </div>
                </div>
                <!-- Column -->
                <!-- Column -->
                <div class="col-lg-4">
                    <div class="card">
                        <img class="card-img-top img-responsive" src="/assets/images/big/img2.jpg" alt="Card image cap">
                        <div class="card-body">
                            <ul class="list-inline font-14">
                                <li class="p-l-0">20 May 2016</li>
                                <li><a href="javascript:void(0)" class="link">3 Comment</a></li>
                            </ul>
                            <h4 class="font-normal">Featured Hydroflora Pots Garden &amp; Outdoors</h4>
                            <p class="m-b-0 m-t-10">Titudin venenatis ipsum ac feugiat. Vestibulum ullamcorper quam.</p>
                            <button class="btn btn-success btn-rounded waves-effect waves-light m-t-20">Read more</button>
                        </div>
                    </div>
                </div>
                <!-- Column -->
                <!-- Column -->
                <div class="col-lg-4">
                    <div class="card">
                        <img class="card-img-top img-responsive" src="/assets/images/big/img4.jpg" alt="Card image cap">
                        <div class="card-body">
                            <ul class="list-inline font-14">
                                <li class="p-l-0">20 May 2016</li>
                                <li><a href="javascript:void(0)" class="link">3 Comment</a></li>
                            </ul>
                            <h4 class="font-normal">Featured Hydroflora Pots Garden &amp; Outdoors</h4>
                            <p class="m-b-0 m-t-10">Titudin venenatis ipsum ac feugiat. Vestibulum ullamcorper quam.</p>
                            <button class="btn btn-success btn-rounded waves-effect waves-light m-t-20">Read more</button>
                        </div>
                    </div>
                </div>
                <!-- Column -->
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Recent Comments</h4>
                            <h6 class="card-subtitle">Latest Comments on users from Material</h6> </div>
                        <!-- ============================================================== -->
                        <!-- Comment widgets -->
                        <!-- ============================================================== -->
                        <div class="comment-widgets m-b-20">
                            <!-- Comment Row -->
                            <div class="d-flex flex-row comment-row">
                                <div class="p-2"><span class="round"><img src="/assets/images/users/1.jpg" alt="user" width="50"></span></div>
                                <div class="comment-text w-100">
                                    <h5>James Anderson</h5>
                                    <div class="comment-footer">
                                        <span class="date">April 14, 2016</span>
                                        <span class="label label-info">Pending</span> <span class="action-icons">
                                                    <a href="javascript:void(0)"><i class="mdi mdi-pencil-circle"></i></a>
                                                    <a href="javascript:void(0)"><i class="mdi mdi-checkbox-marked-circle"></i></a>
                                                    <a href="javascript:void(0)"><i class="mdi mdi-heart"></i></a>
                                                </span>
                                    </div>
                                    <p class="m-b-5 m-t-10">Lorem Ipsum is simply dummy text of the printing and type setting industry. Lorem Ipsum has beenorem Ipsum is simply dummy text of the printing and type setting industry.</p>
                                </div>
                            </div>
                            <!-- Comment Row -->
                            <div class="d-flex flex-row comment-row ">
                                <div class="p-2"><span class="round"><img src="/assets/images/users/2.jpg" alt="user" width="50"></span></div>
                                <div class="comment-text active w-100">
                                    <h5>Michael Jorden</h5>
                                    <div class="comment-footer">
                                        <span class="date">April 14, 2016</span>
                                        <span class="label label-success">Approved</span> <span class="action-icons active">
                                                    <a href="javascript:void(0)"><i class="mdi mdi-pencil-circle"></i></a>
                                                    <a href="javascript:void(0)"><i class="mdi mdi-checkbox-marked-circle text-success"></i></a>
                                                    <a href="javascript:void(0)"><i class="mdi mdi-heart text-danger"></i></a>
                                                </span>
                                    </div>
                                    <p class="m-b-5 m-t-10">Lorem Ipsum is simply dummy text of the printing and type setting industry. Lorem Ipsum has beenorem Ipsum is simply dummy text of the printing and type setting industry..</p>
                                </div>
                            </div>
                            <!-- Comment Row -->
                            <div class="d-flex flex-row comment-row">
                                <div class="p-2"><span class="round"><img src="/assets/images/users/3.jpg" alt="user" width="50"></span></div>
                                <div class="comment-text w-100">
                                    <h5>Johnathan Doeting</h5>
                                    <div class="comment-footer">
                                        <span class="date">April 14, 2016</span>
                                        <span class="label label-danger">Rejected</span> <span class="action-icons">
                                                    <a href="javascript:void(0)"><i class="mdi mdi-pencil-circle"></i></a>
                                                    <a href="javascript:void(0)"><i class="mdi mdi-checkbox-marked-circle"></i></a>
                                                    <a href="javascript:void(0)"><i class="mdi mdi-heart"></i></a>
                                                </span>
                                    </div>
                                    <p class="m-b-5 m-t-10">Lorem Ipsum is simply dummy text of the printing and type setting industry. Lorem Ipsum has beenorem Ipsum is simply dummy text of the printing and type setting industry.</p>
                                </div>
                            </div>
                            <!-- Comment Row -->
                            <div class="d-flex flex-row comment-row">
                                <div class="p-2"><span class="round"><img src="/assets/images/users/4.jpg" alt="user" width="50"></span></div>
                                <div class="comment-text w-100">
                                    <h5>James Anderson</h5>
                                    <div class="comment-footer">
                                        <span class="date">April 14, 2016</span>
                                        <span class="label label-info">Pending</span> <span class="action-icons">
                                                    <a href="javascript:void(0)"><i class="mdi mdi-pencil-circle"></i></a>
                                                    <a href="javascript:void(0)"><i class="mdi mdi-checkbox-marked-circle"></i></a>
                                                    <a href="javascript:void(0)"><i class="mdi mdi-heart"></i></a>
                                                </span>
                                    </div>
                                    <p class="m-b-5 m-t-10">Lorem Ipsum is simply dummy text of the printing and type setting industry. Lorem Ipsum has beenorem Ipsum is simply dummy text of the printing and type setting industry..</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <button class="pull-right btn btn-sm btn-rounded btn-success" data-toggle="modal" data-target="#myModal">Add Task</button>
                            <h4 class="card-title">To Do list</h4>
                            <h6 class="card-subtitle">List of your next task to complete</h6>
                            <!-- ============================================================== -->
                            <!-- To do list widgets -->
                            <!-- ============================================================== -->
                            <div class="to-do-widget m-t-20">
                                <!-- .modal for add task -->
                                <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title">Add Task</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
                                            </div>
                                            <div class="modal-body">
                                                <form>
                                                    <div class="form-group">
                                                        <label>Task name</label>
                                                        <input type="text" class="form-control" placeholder="Enter Task Name"> </div>
                                                    <div class="form-group">
                                                        <label>Assign to</label>
                                                        <select class="custom-select form-control pull-right">
                                                            <option selected="">Sachin</option>
                                                            <option value="1">Sehwag</option>
                                                            <option value="2">Pritam</option>
                                                            <option value="3">Alia</option>
                                                            <option value="4">Varun</option>
                                                        </select>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <button type="button" class="btn btn-success" data-dismiss="modal">Submit</button>
                                            </div>
                                        </div>
                                        <!-- /.modal-content -->
                                    </div>
                                    <!-- /.modal-dialog -->
                                </div>
                                <!-- /.modal -->
                                <ul class="list-task todo-list list-group m-b-0" data-role="tasklist">
                                    <li class="list-group-item" data-role="task">
                                        <div class="checkbox checkbox-info">
                                            <input type="checkbox" id="inputSchedule" name="inputCheckboxesSchedule">
                                            <label for="inputSchedule" class=""> <span>Schedule meeting with</span> </label>
                                        </div>
                                        <ul class="assignedto">
                                            <li><img src="/assets/images/users/1.jpg" alt="user" data-toggle="tooltip" data-placement="top" title="" data-original-title="Steave"></li>
                                            <li><img src="/assets/images/users/2.jpg" alt="user" data-toggle="tooltip" data-placement="top" title="" data-original-title="Jessica"></li>
                                            <li><img src="/assets/images/users/3.jpg" alt="user" data-toggle="tooltip" data-placement="top" title="" data-original-title="Priyanka"></li>
                                            <li><img src="/assets/images/users/4.jpg" alt="user" data-toggle="tooltip" data-placement="top" title="" data-original-title="Selina"></li>
                                        </ul>
                                    </li>
                                    <li class="list-group-item" data-role="task">
                                        <div class="checkbox checkbox-info">
                                            <input type="checkbox" id="inputCall" name="inputCheckboxesCall">
                                            <label for="inputCall" class=""> <span>Give Purchase report to</span> <span class="label label-danger">Today</span> </label>
                                        </div>
                                        <ul class="assignedto">
                                            <li><img src="/assets/images/users/3.jpg" alt="user" data-toggle="tooltip" data-placement="top" title="" data-original-title="Priyanka"></li>
                                            <li><img src="/assets/images/users/4.jpg" alt="user" data-toggle="tooltip" data-placement="top" title="" data-original-title="Selina"></li>
                                        </ul>
                                    </li>
                                    <li class="list-group-item" data-role="task">
                                        <div class="checkbox checkbox-info">
                                            <input type="checkbox" id="inputBook" name="inputCheckboxesBook">
                                            <label for="inputBook" class=""> <span>Book flight for holiday</span> </label>
                                        </div>
                                        <div class="item-date"> 26 jun 2017</div>
                                    </li>
                                    <li class="list-group-item" data-role="task">
                                        <div class="checkbox checkbox-info">
                                            <input type="checkbox" id="inputForward" name="inputCheckboxesForward">
                                            <label for="inputForward" class=""> <span>Forward all tasks</span> <span class="label label-warning">2 weeks</span> </label>
                                        </div>
                                        <div class="item-date"> 26 jun 2017</div>
                                    </li>
                                    <li class="list-group-item" data-role="task">
                                        <div class="checkbox checkbox-info">
                                            <input type="checkbox" id="inputRecieve" name="inputCheckboxesRecieve">
                                            <label for="inputRecieve" class=""> <span>Recieve shipment</span> </label>
                                        </div>
                                        <div class="item-date"> 26 jun 2017</div>
                                    </li>
                                    <li class="list-group-item" data-role="task">
                                        <div class="checkbox checkbox-info">
                                            <input type="checkbox" id="inputpayment" name="inputCheckboxespayment">
                                            <label for="inputpayment" class=""> <span>Send payment today</span> </label>
                                        </div>
                                        <div class="item-date"> 26 jun 2017</div>
                                    </li>
                                    <li class="list-group-item" data-role="task">
                                        <div class="checkbox checkbox-info">
                                            <input type="checkbox" id="inputForward2" name="inputCheckboxesd">
                                            <label for="inputForward2" class=""> <span>Important tasks</span> <span class="label label-success">2 weeks</span> </label>
                                        </div>
                                        <ul class="assignedto">
                                            <li><img src="/assets/images/users/1.jpg" alt="user" data-toggle="tooltip" data-placement="top" title="" data-original-title="Assign to Steave"></li>
                                            <li><img src="/assets/images/users/2.jpg" alt="user" data-toggle="tooltip" data-placement="top" title="" data-original-title="Assign to Jessica"></li>
                                            <li><img src="/assets/images/users/4.jpg" alt="user" data-toggle="tooltip" data-placement="top" title="" data-original-title="Assign to Selina"></li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Right sidebar -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Container fluid  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- footer -->
        <!-- ============================================================== -->
        <footer class="footer"> © 2017 {{ config('app.name') }} </footer>
        <!-- ============================================================== -->
        <!-- End footer -->
        <!-- ============================================================== -->
    </div>
@endsection
