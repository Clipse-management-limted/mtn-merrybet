@extends('layouts.dashboard')
@section('title') Mtn Sales Confrence  @endsection

@section('content')

<br /><br />
  <div class="container">
      <div class="row">


          <div class="col-md-9 col-md-offset-2">
              <div class="panel panel-default">
                  <div class="panel-heading">Sales Conference 2020 Registration              Questionnaire   </div>

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

                    <form id="register-fo" class="register-fo">

                        <div id="error">
                            <!-- error will be shown here ! -->
                            </div>
														<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
																<label for="name" class="col-md-4 control-label">Enter Qrcode  </label>

																<div class="col-md-6">
																		<input id="qr_code" type="hidden" class="form-control" name="qr_code" value="{{ old('qr_code') }}" placeholder="5476356756 ..."  required autofocus>
																		<input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="Or Last Four Digit Of Phone Number 7453 ..."  required autofocus>

																		@if ($errors->has('name'))
																				<span class="help-block">
																						<strong>{{ $errors->first('name') }}</strong>
																				</span>
																		@endif
																</div>
														</div><br><br>



                         <div class="form-group{{ $errors->has('enjoy_session') ? ' has-error' : '' }}">
                              <label for="enjoy_session" class="col-md-4 control-label">Did you enjoy the strategy session?</label>
{{--
                              <div class="col-md-6">
																<div class="btn-group btn-group-toggle" data-toggle="buttons">
																	<label class="btn btn-secondary">
																		<input type="radio" name="enjoy_session" id="enjoy_session" value="yes" autocomplete="off"> Yes
																	</label>
																	<label class="btn btn-secondary">
																		<input type="radio" name="enjoy_session" id="enjoy_session" value="no" autocomplete="off"> No
																	</label>
																</div>
                              </div> --}}


															<div class="col-md-6">
																<select id="enjoy_session" name="enjoy_session" class="form-control{{ $errors->has('enjoy_session') ? ' has-error' : '' }}" required>

																						 <option>   Select Rate  </option>

																							 <option value="Yes">Yes</option>
																							 	 <option value="No">No</option>

																</select>

																	@if ($errors->has('enjoy_session'))
																			<span class="help-block">
																					<strong>{{ $errors->first('enjoy_session') }}</strong>
																			</span>
																	@endif
															</div>
                          </div><br><br>

                           <div class="form-group{{ $errors->has('enjoy_galanight') ? ' has-error' : '' }}">
                              <label for="enjoy_galanight" class="col-md-4 control-label">Did you enjoy the gala night?                 </label>
	                <div class="col-md-6">
															<select id="enjoy_galanight" name="enjoy_galanight" class="form-control{{ $errors->has('enjoy_galanight') ? ' has-error' : '' }}" required>

																					 <option>   Select Rate  </option>

																						 <option value="Yes">Yes</option>
																							 <option value="No">No</option>

															</select>

																@if ($errors->has('enjoy_galanight'))
																		<span class="help-block">
																				<strong>{{ $errors->first('enjoy_galanight') }}</strong>
																		</span>
																@endif
                          </div>
													  </div>
                        <br><br>
                       <div class="form-group{{ $errors->has('ent_rating') ? ' has-error' : '' }}">
                              <label for="ent_rating" class="col-md-4 control-label">What is the rating of the entertainment? </label>

															<div class="col-md-6">
											<select id="ent_rating" name="ent_rating" class="form-control{{ $errors->has('ent_rating') ? ' has-error' : '' }}" required>

																	 <option>   Select Rate  </option>

																		 <option value="1">1</option>
																			 <option value="2">2</option>
																			 <option value="3">3</option>
																				<option value="4">4</option>
																				<option value="5">5</option>
																					<option value="6">6</option>
																					<option value="7">7</option>
																						<option value="8">8</option>
																						<option value="9">9</option>
																							<option value="10">10</option>

											</select>

												@if ($errors->has('ent_rating'))
														<span class="help-block">
																<strong>{{ $errors->first('ent_rating') }}</strong>
														</span>
												@endif
											</div>

                          </div><br><br>
                          <div class="form-group{{ $errors->has('agency_didwell') ? ' has-error' : '' }}">
                             <label for="agency_didwell" class="col-md-4 control-label">Did the agency do well?                 </label>
														 			   <div class="col-md-6">
														 <select id="agency_didwell" name="agency_didwell" class="form-control{{ $errors->has('agency_didwell') ? ' has-error' : '' }}" required>

																					<option>   Select Rate  </option>

																						<option value="Yes">Yes</option>
																							<option value="No">No</option>

														 </select>

															 @if ($errors->has('agency_didwell'))
																	 <span class="help-block">
																			 <strong>{{ $errors->first('agency_didwell') }}</strong>
																	 </span>
															 @endif
														 </div>
                         </div>
                       <br><br>

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
  <span class="glyphicon glyphicon-log-in"></span> &nbsp; Submit
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
          var agency_didwell = $('#agency_didwell').val();
          var ent_rating        = $('#ent_rating').val();
          var enjoy_galanight        = $('#enjoy_galanight').val();
          var enjoy_session =$('#enjoy_session').val();
          $.ajax({
              type : "POST",
              url  : "{{route('questmtncos')}}",
              dataType : "JSON",
                data : {enjoy_session:enjoy_session,name:name,agency_didwell:agency_didwell, ent_rating:ent_rating,enjoy_galanight:enjoy_galanight},
              // data : {name:name,phone_no:phone_no, email:email,gender:gender},
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
              $('[name="enjoy_session"]').val(" ");
              $('[name="agency_didwell"]').val(" ");
              $('[name="ent_rating"]').val(" ");
              $('[name="enjoy_galanight"]').val(" ");

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
                 $("#btn_save").html('<span class="glyphicon glyphicon-log-in"></span> &nbsp; Register');

                   });

                   $("#add-error-bag").fadeOut(10000);

                   }
                   else
                   {
                     var errors=data;
                  console.log(errors);
                  $('[name="name"]').val(" ");
                  $('[name="enjoy_session"]').val(" ");
                  $('[name="agency_didwell"]').val(" ");
                  $('[name="ent_rating"]').val(" ");
                  $('[name="enjoy_galanight"]').val(" ");


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
                             $("#btn_save").html('<span class="glyphicon glyphicon-log-in"></span> &nbsp; Register');

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
//$.each(errors.errors, function(key, value) {
                // errorsHtml+='<li>' + value + '</li>';
                   // $('#add-task-errors').append('<li>' + value + '</li>');
              // });
                errorsHtml+='</ul></div>';
                $("#add-error-bag").html(errorsHtml);
                   $("#btn_save").html('<span class="glyphicon glyphicon-log-in"></span> &nbsp; Register');
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
