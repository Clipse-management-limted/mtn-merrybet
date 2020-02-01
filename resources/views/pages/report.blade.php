 @extends('layouts.dashboard')
@section('title') Mtn Sales Confrence  @endsection

@section('content')


<br /><br />
  <div class="container">
      <div class="row">

        <div class="col-lg-12">
          <form class="form-horizontal" method="POST" action="{{ route('fetreport') }}">
              {{ csrf_field() }}
          <div class="form-group{{ $errors->has('kd') ? ' has-error' : '' }}">
              <label for="gender" class="col-md-4 control-label">activities</label>

              <div class="col-md-6">
                <select id="ac" name="ac" class="form-control{{ $errors->has('ac') ? ' has-error' : '' }}">

                             <option>   Select Activities  </option>
                               @if ($TICKECT->count() > 0 )
                               @foreach ($TICKECT as $user)
                               <option value="{{$user->acti_id}}">{{$user->name}} </option>
                               @endforeach
                               @else
                                 <option >   <div class="alert alert-warning">
                                       <strong>Sorry!</strong> No Available Activities For This Events .....
                                   </div></option>
                               @endif

                </select>

                  @if ($errors->has('ac'))
                      <span class="help-block">
                          <strong>{{ $errors->first('ac') }}</strong>
                      </span>
                  @endif
              </div>
          </div>
          <div class="form-group">
              <div class="col-md-6 col-md-offset-4">
                  <button type="submit" class="btn btn-primary">
                      Fetch Records
                  </button>

              </div>
          </div>
      </form>


<div class="col-md-8">

                         <div class="panel panel-default">
                             <div class="panel-heading">
                                 Graphical Attendance  Report for  <p class="btn btn-danger">
                                   {{App\Model\mtncotumer::actiinfo($re->first()->acti_id)}}
                                 </p>
                             </div>
                             <!-- /.panel-heading -->
                             <div class="panel-body">

                                 <div class="well">
                                     {{-- <h4>DataTables Usage Information</h4> --}}
                                     <!-- Bar chart -->
            <div class="box box-primary">
              {{-- <div class="box-header with-border">
                <i class="fa fa-bar-chart-o"></i>
                <h3 class="box-title">Bar Chart</h3>
                <div class="box-tools pull-right">
                  <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                  <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                </div>
              </div> --}}
              <div class="box-body">
                <div id="bar-chart" style="height: 300px;"></div>
              </div><!-- /.box-body-->
            </div><!-- /.box -->
                                     {{-- <p>DataTables is a very flexible, advanced tables plugin for jQuery. In SB Admin, we are using a specialized version of DataTables built for Bootstrap 3. We have also customized the table headings to use Font Awesome icons in place of images. For complete documentation on DataTables, visit their website at <a target="_blank" href="https://datatables.net/">https://datatables.net/</a>.</p>
                                     <a class="btn btn-default btn-lg btn-block" target="_blank" href="https://datatables.net/">View DataTables Documentation</a> --}}
                                 </div>
                             </div>
                             <!-- /.panel-body -->
                         </div>
                         <!-- /.panel -->
                         </div>



                         <div class="col-md-4">
                           <div class="panel panel-default">
                               <div class="panel-heading">
                                   DataTables  Attendance  Report for  <p class="btn btn-danger">
                                     {{App\Model\mtncotumer::actiinfo($re->first()->acti_id)}}
                                   </p>
                               </div>
                               <!-- /.panel-heading -->
                               <div class="panel-body">



                                 <div class="dataTable_wrapper">
                                     <table class="table table-striped table-bordered table-hover" id="example1">
                                         <thead>
                                             <tr>
                                                 <th>Group Name</th>
                                                 <th>Total</th>
                                             </tr>
                                         </thead>
                                         @if($re->first()->acti_id)

                                         <tbody>
                                        {{-- {{dd($re)}} --}}


                                              @foreach($re as $p)


                                             <tr>
                                               <td>{{$p->groups}}</td>
                                              <td>{{$p->total}}</td>
                                             </tr>
                                 @endforeach
                                         </tbody>


                                           @else

                                                  <tbody>


                                                       @foreach($re->unique('platoon') as $p)


                                                      <tr>
                                                        <td>{{$p->platoon}}</td>
                                                        <td>{{App\Model\mtncotumer::someStatic($p->platoon)}}</td>
                                                      </tr>
                                          @endforeach
                                                  </tbody>
                                             @endif
                                     </table>
                                 </div>
                                 <!-- /.table-responsive -->
                         </div>
                         </div>




                         </div>

<?php
$f=App\Model\mtncotumer::actiinfo($re->first()->acti_id);
if($f=='Afro gidi')
{?>
  <div class="col-md-8">
    <div class="panel panel-default">
        <div class="panel-heading">
            DataTables  Enegry Spirit Report for  <p class="btn btn-danger">
              {{App\Model\mtncotumer::actiinfo($re->first()->acti_id)}}
            </p>
        </div>
        <!-- /.panel-heading -->
        <div class="panel-body">



          <div class="dataTable_wrapper">
              <table class="table table-striped table-bordered table-hover" id="example1">
                  <thead>
                      <tr>
                          <th>Group Name</th>
                          <th>Energy Spirit</th>
                          <th>Score</th>
                      </tr>
                  </thead>


                  <tbody>
                    <tr>
                      <td>Wood Wind</td>
                      <td>Lagos Spirit On a 100%</td>
                     <td>19</td>
                    </tr>
                      <tr>
                        <td>Brass</td>
                        <td>Team Work and Leg Work</td>
                       <td>17</td>
                      </tr>
                      <tr>
                        <td>Percussion</td>
                        <td>Intro and Creativity</td>
                       <td>16</td>
                      </tr>
                      <tr>
                        <td>keyboard</td>
                        <td> Team work </td>
                       <td>14</td>
                      </tr>
                      <tr>
                        <td>Strings</td>
                        <td>Swag and Team Work</td>
                       <td>12</td>
                      </tr>



                  </tbody>
              </table>
          </div>
          <!-- /.table-responsive -->
  </div>
  </div>




  </div>







<?php
}
else{
  // code...
}
?>



                     </div>
                     <!-- /.col-lg-12 -->





      </div>
      </div>

      <!-- Page script -->
<script src="{{ asset('yo/plugins/jQuery/jQuery-2.1.4.min.js') }}"></script>
   @if($re->first()->acti_id)

     <script>
        $(function () {
          var id ={{$acti_id}}
        //  console.log(id);
          $.ajax({
                            type: "GET",
                            url: "chart/"+{{id}},
                            data: {},
                            contentType: "application/json; charset=utf-8",
                            dataType: "json",
                            success: function (data) {
                                console.log(data);
                            var items = data.map(function (id) {
                                  var res = [];
                                  res.push(id.groups,id.count);
                         // return id.id + ' ' + id.name;
                          console.log(res);
                       return res;
                     });

                                $.plot("#bar-chart", [items], {
                                  grid: {
                                    borderWidth: 2,
                                    borderColor: "#3097D1",
                                    tickColor: "#3097D1"
                                  },
                                  series: {
                                    bars: {
                                      show: true,
                                      barWidth: 0.5,
                                      align: "center"
                                    }
                                  },
                                  xaxis: {
                                    mode: "categories",
                                    tickLength: 0
                                  }
                                });
                                /* END BAR CHART       borderColor: "#f3f3f3",
                                    tickColor: "#f3f3f3"*/

                            },
                        });





        });

        /*
         * Custom Label formatter
         * ----------------------
         */
        function labelFormatter(label, series) {
          return '<div style="font-size:13px; text-align:center; padding:2px; color: #fff; font-weight: 600;">'
                  + label
                  + "<br>"
                  + Math.round(series.percent) + "%</div>";
        }
      </script>



        @else


        @section('javascript')

        <script>
           $(function () {
             /*
              * Flot Interactive Chart
              * -----------------------
              */
             // We use an inline data source in the example, usually data would
             // be fetched from a server
             var data = [], totalPoints = 100;
             function getRandomData() {

               if (data.length > 0)
                 data = data.slice(1);

               // Do a random walk
               while (data.length < totalPoints) {

                 var prev = data.length > 0 ? data[data.length - 1] : 50,
                         y = prev + Math.random() * 10 - 5;

                 if (y < 0) {
                   y = 0;
                 } else if (y > 100) {
                   y = 100;
                 }

                 data.push(y);
               }

               // Zip the generated y values with the x values
               var res = [];
               for (var i = 0; i < data.length; ++i) {
                 res.push([i, data[i]]);
               }

               return res;
             }

             var interactive_plot = $.plot("#interactive", [getRandomData()], {
               grid: {
                 borderColor: "#f3f3f3",
                 borderWidth: 1,
                 tickColor: "#f3f3f3"
               },
               series: {
                 shadowSize: 0, // Drawing is faster without shadows
                 color: "#3c8dbc"
               },
               lines: {
                 fill: true, //Converts the line chart to area chart
                 color: "#3c8dbc"
               },
               yaxis: {
                 min: 0,
                 max: 100,
                 show: true
               },
               xaxis: {
                 show: true
               }
             });

             var updateInterval = 500; //Fetch data ever x milliseconds
             var realtime = "on"; //If == to on then fetch data every x seconds. else stop fetching
             function update() {

               interactive_plot.setData([getRandomData()]);

               // Since the axes don't change, we don't need to call plot.setupGrid()
               interactive_plot.draw();
               if (realtime === "on")
                 setTimeout(update, updateInterval);
             }

             //INITIALIZE REALTIME DATA FETCHING
             if (realtime === "on") {
               update();
             }
             //REALTIME TOGGLE
             $("#realtime .btn").click(function () {
               if ($(this).data("toggle") === "on") {
                 realtime = "on";
               }
               else {
                 realtime = "off";
               }
               update();
             });
             /*
              * END INTERACTIVE CHART
              */


             /*
              * LINE CHART
              * ----------
              */
             //LINE randomly generated data

             var sin = [], cos = [];
             for (var i = 0; i < 14; i += 0.5) {
               sin.push([i, Math.sin(i)]);
               cos.push([i, Math.cos(i)]);
             }
             var line_data1 = {
               data: sin,
               color: "#3c8dbc"
             };
             var line_data2 = {
               data: cos,
               color: "#00c0ef"
             };
             $.plot("#line-chart", [line_data1, line_data2], {
               grid: {
                 hoverable: true,
                 borderColor: "#f3f3f3",
                 borderWidth: 1,
                 tickColor: "#f3f3f3"
               },
               series: {
                 shadowSize: 0,
                 lines: {
                   show: true
                 },
                 points: {
                   show: true
                 }
               },
               lines: {
                 fill: false,
                 color: ["#3c8dbc", "#f56954"]
               },
               yaxis: {
                 show: true,
               },
               xaxis: {
                 show: true
               }
             });
             //Initialize tooltip on hover
             $('<div class="tooltip-inner" id="line-chart-tooltip"></div>').css({
               position: "absolute",
               display: "none",
               opacity: 0.8
             }).appendTo("body");
             $("#line-chart").bind("plothover", function (event, pos, item) {

               if (item) {
                 var x = item.datapoint[0].toFixed(2),
                         y = item.datapoint[1].toFixed(2);

                 $("#line-chart-tooltip").html(item.series.label + " of " + x + " = " + y)
                         .css({top: item.pageY + 5, left: item.pageX + 5})
                         .fadeIn(200);
               } else {
                 $("#line-chart-tooltip").hide();
               }

             });
             /* END LINE CHART */

             /*
              * FULL WIDTH STATIC AREA CHART
              * -----------------
              */
             var areaData = [[2, 88.0], [3, 93.3], [4, 102.0], [5, 108.5], [6, 115.7], [7, 115.6],
               [8, 124.6], [9, 130.3], [10, 134.3], [11, 141.4], [12, 146.5], [13, 151.7], [14, 159.9],
               [15, 165.4], [16, 167.8], [17, 168.7], [18, 169.5], [19, 168.0]];
             $.plot("#area-chart", [areaData], {
               grid: {
                 borderWidth: 0
               },
               series: {
                 shadowSize: 0, // Drawing is faster without shadows
                 color: "#00c0ef"
               },
               lines: {
                 fill: true //Converts the line chart to area chart
               },
               yaxis: {
                 show: false
               },
               xaxis: {
                 show: false
               }
             });

             /* END AREA CHART */

             /*
              * BAR CHART
              * ---------
              */

             var bar_data = {
               data: [["January", 10], ["February", 8], ["March", 4], ["April", 13], ["May", 17], ["June", 9]],
               color: "#3c8dbc"
             };
             $.plot("#bar-chart", [bar_data], {
               grid: {
                 borderWidth: 1,
                 borderColor: "#f3f3f3",
                 tickColor: "#f3f3f3"
               },
               series: {
                 bars: {
                   show: true,
                   barWidth: 0.5,
                   align: "center"
                 }
               },
               xaxis: {
                 mode: "categories",
                 tickLength: 0
               }
             });
             /* END BAR CHART */

             $.ajax({
                               type: "GET",
                               url: "{{url('stock/chart')}}",
                               data: {},
                               contentType: "application/json; charset=utf-8",
                               dataType: "json",
                               success: function (data) {
                               // //   $.each(data, function(index) {
                               // //     var res = [];
                               // // res.push([data[id].TEST1,data[name].TEST2]);
                               // // return res;
                               // //
                               // //  //  $("#pr_result").append(data[index].dbcolumn);
                               // //         console.log(data[id].TEST1);
                               // //         console.log(data[name].TEST2);
                               // //     });
                         //       let newData = data.map((v) => {
                         //     const row = [];
                         //     v.data.map((v, i) => {
                         //         row.push([v.id,v.name]);
                         //     })
                          //   console.log(data);
                         //     return row;
                         // });

                                   var items = data.map(function (id) {
                                     var res = [];
                                     res.push(id.platoon,id.count);
                            // return id.id + ' ' + id.name;
                             console.log(res);
                          return res;
                        });

                                   $.plot("#bar-chart", [items], {
                                     grid: {
                                       borderWidth: 2,
                                       borderColor: "#3097D1",
                                       tickColor: "#3097D1"
                                     },
                                     series: {
                                       bars: {
                                         show: true,
                                         barWidth: 0.5,
                                         align: "center"
                                       }
                                     },
                                     xaxis: {
                                       mode: "categories",
                                       tickLength: 0
                                     }
                                   });
                                   /* END BAR CHART */

                               },
                           });



        // var url = "{{url('stock/chart')}}";
        // var Years = new Array();
        // var Labels = new Array();
        // var Prices = new Array();
        // $(document).ready(function(){
        //   $.get(url, function(response){
        //     response.forEach(function(data){
        //         Years.push(data.stockYear);
        //         Labels.push(data.stockName);
        //         Prices.push(data.stockPrice);
        //     });
        //     var ctx = document.getElementById("canvas").getContext('2d');
        //         var myChart = new Chart(ctx, {
        //           type: 'bar',
        //           data: {
        //               labels:Years,
        //               datasets: [{
        //                   label: 'Infosys Price',
        //                   data: Prices,
        //                   borderWidth: 1
        //               }]
        //           },
        //           options: {
        //               scales: {
        //                   yAxes: [{
        //                       ticks: {
        //                           beginAtZero:true
        //                       }
        //                   }]
        //               }
        //           }
        //       });
        //   });
        // });

             /*
              * DONUT CHART
              * -----------
              */

             var donutData = [
               {label: "Series2", data: 30, color: "#3c8dbc"},
               {label: "Series3", data: 20, color: "#0073b7"},
               {label: "Series4", data: 50, color: "#00c0ef"}
             ];
             $.plot("#donut-chart", donutData, {
               series: {
                 pie: {
                   show: true,
                   radius: 1,
                   innerRadius: 0.5,
                   label: {
                     show: true,
                     radius: 2 / 3,
                     formatter: labelFormatter,
                     threshold: 0.1
                   }

                 }
               },
               legend: {
                 show: false
               }
             });
             /*
              * END DONUT CHART
              */

           });

           /*
            * Custom Label formatter
            * ----------------------
            */
           function labelFormatter(label, series) {
             return '<div style="font-size:13px; text-align:center; padding:2px; color: #fff; font-weight: 600;">'
                     + label
                     + "<br>"
                     + Math.round(series.percent) + "%</div>";
           }
         </script>
        <!-- Page-Level Demo Scripts - Tables - Use for reference -->
          <!-- <script>
          $(document).ready(function() {
              $('#dataTables-example').DataTable({
                      responsive: true
              });
          });
          </script> -->
         <script>
          $(function () {
              $("#example1").DataTable();
              $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false
              });
            });
          </script>


       @endsection
          @endif

      @endsection
