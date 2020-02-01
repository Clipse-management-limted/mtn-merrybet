@extends('layouts.app')
@section('title') Ticket Registration  @endsection
@section('content')
<div class="container">
    <div class="row">
    <a class="btn btn-primary" href="{{ route('vusers') }}">View Users</a>

        <div class="col-md-9 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Register Ticket</div>

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

                                         <form id="register-form" class="register-form">

                                           <div id="error">
                                                 <!-- error will be shown here ! -->
                                                 </div>



                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="Mr/Mrs ..."  required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div><br><br>

                        <div class="form-group{{ $errors->has('phone_no') ? ' has-error' : '' }}">
                            <label for="phone_no" class="col-md-4 control-label">Mobile Number                  </label>

                            <div class="col-md-6">
                                <input id="phone_no" type="text" class="form-control" name="phone_no" value="{{ old('phone_no') }}" placeholder="0802334 ..."  required autofocus>

                                @if ($errors->has('phone_no'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('phone_no') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                      <br><br>
                     <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">Email </label>

                            <div class="col-md-6">
                                <input id="email" type="text" class="form-control" name="email" value="{{ old('email') }}" placeholder="kenneyg......."  autofocus>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>

                        </div><br><br>
                        <div class="form-group{{ $errors->has('ticket') ? ' has-error' : '' }}">
                            <label for="ticket" class="col-md-4 control-label">Ticket Type</label>

                            <div class="col-md-6">
                              <select id="ticket" name="ticket" class="form-group{{ $errors->has('ticket') ? ' has-error' : '' }}">
                                <option value="">Select Tickets </option>
                                <option value="Regular">Regular </option>
                                <option value="Vip">Vip </option>
                                    <option value="VVIP">VVIP </option>

                              </select>

                                @if ($errors->has('ticket'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('ticket') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div><br><br>
                        {{--    <div class="form-group{{ $errors->has('phone_no') ? ' has-error' : '' }}">
                            <label for="sh" class="col-md-4 control-label">Social Handle</label>

                            <div class="col-md-6">
                                <input id="sh" type="text" class="form-control" name="sh" value="{{ old('sh') }}" placeholder="@SocialHandle ..."   autofocus>

                                @if ($errors->has('sh'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('sh') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div><br><br> --}}

                        <!-- <div class="form-group{{ $errors->has('kd') ? ' has-error' : '' }}">
                            <label for="kd" class="col-md-4 control-label">Names of kids</label>

                            <div class="col-md-6">
                                <input id="kd[]" type="text" class="form-control{{ $errors->has('kd') ? ' is-invalid' : '' }}" name="kd[]" value="{{ old('kd') }}" placeholder="james ..."  required autofocus>

                                @if ($errors->has('kd'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('kd') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div> -->
                        <!-- <div class="form-group{{ $errors->has('kd') ? ' has-error' : '' }}">
                            <label for="kt" class="col-md-4 control-label">kid Tag Number</label>

                            <div class="col-md-6">
                                <input id="kt[]" type="text" class="form-control{{ $errors->has('kd') ? ' is-invalid' : '' }}" name="kt[]" value="{{ old('kd') }}" placeholder="101 ..."  required autofocus>

                                @if ($errors->has('kt'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('kt') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                      <div id="cat_fields">

                     </div>
                         </div>




                        <div class="form-group{{ $errors->has('qr_code') ? ' has-error' : '' }}">
                            <label for="qr_code" class="col-md-4 control-label">Registration Code</label>

                            <div class="col-md-6">
                                <input id="qr_code" type="text" class="form-control" name="qr_code" value="{{ old('qr_code') }}" placeholder="5476356756 ..."  required autofocus>

                                @if ($errors->has('qr_code'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('qr_code') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div> -->


                                      <div class="form-group">
                                          <div class="col-md-6 col-md-offset-4">
                                            <div class="form-group row mb-0">
                          <!-- <div class="col-md-6 offset-md-4">
                      <button class="btn btn-success" type="button"  onclick="cat_fields();"> <span class="icon-plus-sign" aria-hidden="true"></span>Add Kids </button>
                      </div> -->
                    </div>
                    <div class="form-group">
<button type="submit" class="btn btn-primary" name="btn_save" id="btn_save">
<span class="glyphicon glyphicon-log-in"></span> &nbsp; Create Tickets
</button>
</div>
      {{-- <button type="submit" id="btn_save" class="btn btn-primary">
                                                  Register
                                              </button> --}}
                                          </div>
                                      </div>

                      </form>
                  </div>
                  </div>
                  </div>
                  </div>
                  </div>

                  @section('javascript')

                    <script >

                    var room = 1;
                    function cat_fields(id) {
                    var cat_fields ='cat_fields';
                    // alert(cat_fields);
                    room++;
                    var objTo = document.getElementById(cat_fields)
                    var divtest = document.createElement("div");
                    divtest.setAttribute("class", "form-group removeclass"+room);
                    var rdiv = 'removeclass'+room;
                    divtest.innerHTML = ' <div class="form-group"> <label for="kd" class="col-md-4 control-label">Names of kids</label>     <div class="col-md-6"> <input type="text" class="form-control" id="kd[]" name="kd[]" value="" placeholder="james ...">    </div> </div> <div class="form-group"> <label for="kt" class="col-md-4 control-label">kid Tag Number</label>     <div class="col-md-6"> <input type="text" class="form-control" id="kt[]" name="kt[]" value="" placeholder="101 ...">    </div> </div> <div class="input-group-btn"> <button class="btn btn-danger" type="button" onclick="remove_cat_fields('+ room +');"> <span class="icon-minus-sign" aria-hidden="true"></span>Remove </button></div></div></div></div><div class="clear"></div>';

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
        var name = $('#name').val();
        var phone_no = $('#phone_no').val();
        var email        = $('#email').val();
        var ticket        = $('#ticket').val();
        $.ajax({
            type : "POST",
            url  : "{{route('TCemail')}}",
            dataType : "JSON",
            data : {name:name,phone_no:phone_no, email:email,ticket:ticket},
            beforeSend: function()
    {
      $("#add-error-bag").fadeOut();
      $("#btn_save").html('<span class="glyphicon glyphicon-transfer"></span> &nbsp; sending ...');
    },
            success: function(data){
              console.log(data);
	       	if(data.error =="1"){


            var errors=data;
            console.log(errors);
            $('[name="name"]').val(" ");
            $('[name="phone_no"]').val(" ");
            $('[name="email"]').val(" ");
            $('[name="ticket"]').val(" ");

            $("#add-error-bag").fadeIn(20, function()
                          {
                                 //  var errors=data.responseJSON;
            errorsHtml ='<div class="alert alert-danger" id="add-error-bag">'
            //   $.each(errors.status, function(key, value) {
                 errorsHtml+='<p>' + data.status + '</p>';
                   // $('#add-task-errors').append('<li>' + value + '</li>');
              // });
               errorsHtml+='</div>';
               $("#add-error-bag").html(errorsHtml);
               $("#btn_save").html('<span class="glyphicon glyphicon-log-in"></span> &nbsp; Create Tickets !!');

                 });

                 $("#add-error-bag").fadeOut(10000);

                 }
                 else
                 {
                   var errors=data;
                console.log(errors);
                $('[name="name"]').val(" ");
                $('[name="phone_no"]').val(" ");
                $('[name="email"]').val(" ");
                $('[name="ticket"]').val(" ");


                     $("#add-error-bag").fadeIn(20, function()
                                                           {
                   //  var errors=data.responseJSON;
                     errorsHtml ='<div class="alert alert-success" id="add-success-bag">'
                     //   $.each(errors.status, function(key, value) {
                          errorsHtml+='<p>' + data.status + '</p>';
                            // $('#add-task-errors').append('<li>' + value + '</li>');
                       // });
                        errorsHtml+='</div>';
                        $("#add-error-bag").html(errorsHtml);
                           $("#btn_save").html('<span class="glyphicon glyphicon-log-in"></span> &nbsp; Create Tickets !!');

                      });
                     $("#add-error-bag").fadeOut(10000);



                 }


            },

            error: function(data) {
              var errors=data.responseJSON;
           console.log(errors);
           $("#add-error-bag").fadeIn(20, function()
                                                 {

           errorsHtml ='<div class="alert alert-danger" id="add-error-bag"><ul id="add-task-errors">'
             errorsHtml+='<p>' + errors.message + '</p>';
             $.each(errors.errors, function(key, value) {
               errorsHtml+='<li>' + value + '</li>';
                 // $('#add-task-errors').append('<li>' + value + '</li>');
             });
              errorsHtml+='</ul></div>';
              $("#add-error-bag").html(errorsHtml);
                 $("#btn_save").html('<span class="glyphicon glyphicon-log-in"></span> &nbsp; Create Tickets !!');
            });
           $("#add-error-bag").fadeOut(10000);
             }
        });
        return false;
    });
    	});
                    </script>


                    @endsection

                  @endsection
