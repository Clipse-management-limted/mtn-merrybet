@extends('layouts.dashboard')
@section('title') Add Room  @endsection
@section('content')
  <br><br>
<div class="container">
    <div class="row">

        <div class="col-md-9 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Add Room </div>

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

                        <div class="form-group{{ $errors->has('qr_code') ? ' has-error' : '' }}">
                            <label for="qr_code" class="col-md-4 control-label">Qrcode Code</label>

                            <div class="col-md-6">
                                <input id="qr_code" type="text" class="form-control" name="qr_code" value="{{ old('qr_code') }}" placeholder="5476356756 ..."  required autofocus>

                                @if ($errors->has('qr_code'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('qr_code') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <br><br>

                        <div class="form-group{{ $errors->has('key') ? ' has-error' : '' }}">
                            <label for="key" class="col-md-4 control-label">Room Key</label>

                            <div class="col-md-6">
                                <input id="key" type="text" class="form-control" name="key" value="{{ old('key') }}" placeholder="67453 ..."  required autofocus>

                                @if ($errors->has('key'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('key') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div><br><br>


                        <div class="form-group row mb-0">
                            <label for="name" class="col-md-4 control-label"></label>
                                  <div class="col-md-6 offset-md-2">
                                    <button type="submit" id="btn_save" class="btn btn-primary">
                                      Validate
                                  </button>
                                  </div>
                              </div>
                                          </div>
                                      </div>

                      </form>
                  </div>
                  </div>
                  </div>
                  </div>
                  </div>

                  @section('javascript')
            <script type="text/javascript">
                      	$(document).ready(function(){
                      //Save product
      $('#btn_save').on('click',function(){
        $.ajaxSetup({
               headers: {
                   'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
               }
           });
          var qrcode = $('#qr_code').val();
          var rg = $('#key').val();
          $.ajax({
              type : "POST",
              url  : "{{route('scanroom')}}",
              dataType : "JSON",
              data : {key:rg,qrcode:qrcode},

              success: function(data){
                console.log(data);
  	       	if(data.error =="1"){


              var errors=data;
              console.log(errors);
              $('[name="name"]').val(" ");

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

                   $("#add-error-bag").fadeOut(9000);

                   }
                   else
                   {
                     var errors=data;
                  console.log(errors);
                  $('[name="name"]').val(" ");

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
                       $("#add-error-bag").fadeOut(2000);



                   }


              },

              error: function(data) {
                var errors=data.responseJSON;
             console.log(errors);
                if(errors.error =="1"){
                  console.log(errors);
                  $('[name="key"]').val(" ");

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

                       $("#add-error-bag").fadeOut(2000);

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
             $("#add-error-bag").fadeOut(3000);

              }
               }
          });
          return false;
      });
      	});
                      </script>

                    @endsection

                  @endsection
