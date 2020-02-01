@extends('layouts.dashboard')
@section('title') Record activities  @endsection
@section('content')
<div class="container">
    <div class="row">

        <div class="col-md-9 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Record activities  </div>

                <div class="panel-body">
                  <div class="col-lg-8 col-lg-offset-2">
                       @if (session('status'))

                           <div class="alert alert-success">
                               {{ session('status') }}
                           </div>
                       @endif
                       <div id="add-success-bag">
                       </div>

                       <div id="add-error-bag">
                       </div>


                       <!-- <div class="alert alert-danger" id="add-error-bag">
                                              <ul id="add-task-errors">
                                              </ul>
                                          </div> -->
                                         </div>

                     <form>

                     <div class="form-group{{ $errors->has('kd') ? ' has-error' : '' }}">
                         <label for="gender" class="col-md-4 control-label">activities</label>
                               {{-- <a href="#" data-toggle="modal" data-target="#create-event-" data-id="" data-url="" class="btn btn-danger create-item pull-right" />   <span>Add Activities<i class="fa fa-plus"></i></span></a> --}}

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

                             @if ($errors->has('gender'))
                                 <span class="help-block">
                                     <strong>{{ $errors->first('gender') }}</strong>
                                 </span>
                             @endif
                         </div>
                     </div><br><br>


                     <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                         <label for="name" class="col-md-4 control-label">Name</label>

                         <div class="col-md-6">
                             <input id="iv" type="hidden" class="form-control" name="iv" value="iv">
                             <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="joy Fred ..."  required autofocus>

                             @if ($errors->has('name'))
                                 <span class="help-block">
                                     <strong>{{ $errors->first('name') }}</strong>
                                 </span>
                             @endif
                         </div>
                     </div><br><br>

                     <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                         <label for="phone" class="col-md-4 control-label">Phone Number</label>

                         <div class="col-md-6">

                             <input id="phone" type="text" class="form-control" name="phone" value="{{ old('phone') }}" placeholder="67453 ..."  required autofocus>

                             @if ($errors->has('phone'))
                                 <span class="help-block">
                                     <strong>{{ $errors->first('phone') }}</strong>
                                 </span>
                             @endif
                         </div>
                     </div><br><br>
                     <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                         <label for="phone" class="col-md-4 control-label">Organization</label>

                         <div class="col-md-6">

                             <input id="og" type="text" class="form-control" name="og" value="{{ old('og') }}" placeholder="MTN"  required autofocus>

                             @if ($errors->has('og'))
                                 <span class="help-block">
                                     <strong>{{ $errors->first('og') }}</strong>
                                 </span>
                             @endif
                         </div>
                     </div><br><br>
                     {{-- <div class="form-group{{ $errors->has('Code') ? ' has-error' : '' }}">
                         <label for="Code" class="col-md-4 control-label">Code</label>

                         <div class="col-md-6">

                             <input id="Code" type="hidden" class="form-control" name="phone" value="{{ old('Code') }}" placeholder="urwirgfge"  required autofocus>

                             @if ($errors->has('Code'))
                                 <span class="help-block">
                                     <strong>{{ $errors->first('Code') }}</strong>
                                 </span>
                             @endif
                         </div>
                     </div><br><br> --}}

                        {{-- <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Qrcode / Wristband Id</label>

                            <div class="col-md-6">
                                <input id="iv" type="hidden" class="form-control" name="iv" value="iv">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="67453 ..."  required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div><br><br> --}}



                        <div class="form-group row mb-0">
                            <label for="name" class="col-md-4 control-label"></label>
                                  <div class="col-md-6 offset-md-2">
                                    <button type="submit" id="btn_save" class="btn btn-primary">
                                      Check In
                                  </button>
                                  </div>
                              </div>


                      </form>
                  </div>
                  </div>

                  <!-- Edit Item Modal -->
<div class="modal fade" id="create-event-" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                     <div class="modal-dialog" role="document">
                     <div class="modal-content">
                     <div class="modal-header">
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                     <h4 class="modal-title" id="myModalLabel">Add Activities</h4>

                     </div>



                     <div class="modal-body">

                     <!-- Main content -->
                      <section class="invoice">

                        <div class="row invoice-info">
                          <div class="col-md-12">
                            <form id="active" role="form"  method="POST" action="{{route('create_activi') }}">
                              {{ csrf_field() }}
                                  <div id="error">
                                    <!-- error will be shown here ! -->
                                    </div>

                  <div class="form-group row">
                      <label for="name" class="col-md-4 col-form-label text-md-right">Activitie Name</label>

                      <div class="col-md-6">
                          <input id="subname[]" type="text" placeholder="Enter Activitie Name...." class="form-control{{ $errors->has('subname') ? ' is-invalid' : '' }}" name="subname[]" value="{{ old('subname') }}" required autofocus>

                          @if ($errors->has('subname'))
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $errors->first('subname') }}</strong>
                              </span>
                          @endif
                      </div>
                        </div>
                      {{-- <div class="form-group row">
                          <label for="name" class="col-md-4 col-form-label text-md-right">Price</label>
                      <div class="col-md-6">
                          <input id="price[]" type="text" placeholder="Enter Food Price...." class="form-control{{ $errors->has('price') ? ' is-invalid' : '' }}" name="price[]" value="{{ old('price') }}" required autofocus>

                          @if ($errors->has('price'))
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $errors->first('price') }}</strong>
                              </span>
                          @endif
                      </div>
                </div> --}}
                <div class="form-group row">
                  <div id="cat_fields">

                 </div>
                     </div>

                  <div class="line"></div>

                  <div class="form-group row mb-0">
                      <div class="col-md-6 offset-md-4">  <!-- <div class="input-group-btn"> -->
                  <button class="btn btn-success" type="button"  onclick="cat_fields();"> <span class="icon-plus-sign" aria-hidden="true"></span>Add More Activities </button>
                  </div>  </div>
                  <div class="form-group row mb-0">
                      <div class="col-md-6 offset-md-4">
                          <button type="submit" class="pull-right btn btn-primary btn-block margin-bottom">
                              Save
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
                  </div>
                  </div>
                </div>

                  @section('javascript')

                    <script >

                    var room = 1;
                    function cat_fields() {
                    var cat_fields ='cat_fields';
                    // alert(cat_fields);
                    room++;
                    var objTo = document.getElementById(cat_fields)
                    var divtest = document.createElement("div");
                    divtest.setAttribute("class", "form-group removeclass"+room);
                    var rdiv = 'removeclass'+room;
                    divtest.innerHTML = ' <div class="form-group"> <label for="kd" class="col-md-4 control-label">Activitie Name</label>     <div class="col-md-6"> <input type="text" class="form-control" id="subname[]" name="subname[]" value="" placeholder="Add Activitie Name ...">    </div> </div>  <div class="input-group-btn"> <button class="btn btn-danger" type="button" onclick="remove_cat_fields('+ room +');"> <span class="icon-minus-sign" aria-hidden="true"></span>Remove </button></div></div></div></div><div class="clear"></div>';

                    objTo.appendChild(divtest)
                    }
                    function remove_cat_fields(rid) {
                    $('.removeclass'+rid).remove();
                    }
                      </script>
                      <script type="text/javascript">
                      	$(document).ready(function(){
                      //Save product
      $('#btn_save').on('click',function(){
        $.ajaxSetup({
               headers: {
                   'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
               }
           });
             var iv = $('#iv').val();
          var qrcode = $('#name').val();
          var phone = $('#phone').val();
            var ac = $('#ac').val();
            var og = $('#og').val();
              var code = $('#code').val();
          $.ajax({
              type : "POST",
              url  : "{{route('valcheching')}}",
              dataType : "JSON",
              data : {qrcode:qrcode,ac:ac,iv:iv,phone:phone,code:code,og:og},

              success: function(data){
                console.log(data);
  	       	if(data.error =="1"){


              var errors=data;
              console.log(errors);
              $('[name="name"]').val(" ");
                  $('[name="og"]').val(" ");
                      $('[name="phone"]').val(" ");

              $("#add-error-bag").fadeIn(10, function()
                            {
                                   //  var errors=data.responseJSON;
              errorsHtml ='<div class="alert alert-danger" id="add-error-bag">'
              //   $.each(errors.status, function(key, value) {
                   errorsHtml+='<p>' + data.status + '</p>';
                     // $('#add-task-errors').append('<li>' + value + '</li>');
                // });
                 errorsHtml+='</div>';
                 $("#add-error-bag").html(errorsHtml);

                   });

                   $("#add-error-bag").fadeOut(5000);

                   }
                   else
                   {
                     var errors=data;
                  console.log(errors);
                  $('[name="name"]').val(" ");
                  $('[name="og"]').val(" ");
                      $('[name="phone"]').val(" ");

                       $("#add-error-bag").fadeIn(10, function()
                                                             {
                     //  var errors=data.responseJSON;
                       errorsHtml ='<div class="alert alert-success" id="add-success-bag">'
                       //   $.each(errors.status, function(key, value) {
                            errorsHtml+='<p>' + data.status + '</p>';
                              // $('#add-task-errors').append('<li>' + value + '</li>');
                         // });
                          errorsHtml+='</div>';
                          $("#add-error-bag").html(errorsHtml);


                        });
                       $("#add-error-bag").fadeOut(5000);



                   }


              },

              error: function(data) {
                var errors=data.responseJSON;
             console.log(errors);
                if(errors.error =="1"){
                  console.log(errors);
                  $('[name="name"]').val(" ");
                  $('[name="og"]').val(" ");
                      $('[name="phone"]').val(" ");

                  $("#add-error-bag").fadeIn(10, function()
                                {
                                       //  var errors=data.responseJSON;
                  errorsHtml ='<div class="alert alert-danger" id="add-error-bag">'
                  //   $.each(errors.status, function(key, value) {
                       errorsHtml+='<p>' + errors.status + '</p>';
                         // $('#add-task-errors').append('<li>' + value + '</li>');
                    // });
                     errorsHtml+='</div>';
                     $("#add-error-bag").html(errorsHtml);

                       });

                       $("#add-error-bag").fadeOut(5000);

                       }
                       else
                       {

             //
                var errors=data.responseJSON;
             console.log(errors);
             $("#add-error-bag").fadeIn(10, function()
                                                   {

             errorsHtml ='<div class="alert alert-danger" id="add-error-bag"><ul id="add-task-errors">'
               errorsHtml+='<p>' + errors.message + '</p>';
               // errorsHtml+='<p>' + errors.status + '</p>';
               $.each(errors.errors, function(key, value) {
                 errorsHtml+='<li>' + value + '</li>';
                   // $('#add-task-errors').append('<li>' + value + '</li>');
               });
                errorsHtml+='</ul></div>';
                $("#add-error-bag").html(errorsHtml);

              });
             $("#add-error-bag").fadeOut(5000);

              }
               }
          });
          return false;
      });
      	});
                      </script>

                    @endsection

                  @endsection
