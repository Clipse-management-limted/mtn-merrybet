@extends('layouts.app')
@section('title') Ticket Validation  @endsection
@section('content')
<div class="container">
    <div class="row">
      <a class="btn btn-primary" href="{{ url('validate') }}">Validate Online E-Ticket </a>
        <div class="col-md-9 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Hard Copy Ticket Validation  </div>

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
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Qrcode</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="67453 ..."  required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
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
          var qrcode = $('#name').val();
          $.ajax({
              type : "POST",
              url  : "{{route('valMQrcode')}}",
              dataType : "JSON",
              data : {qrcode:qrcode},

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

                   $("#add-error-bag").fadeOut(2000);

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
                  $('[name="name"]').val(" ");

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
