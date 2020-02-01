@extends('layouts.app')
@section('title') Top -Up  @endsection
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Top by - {{ Auth::user()->name }} </div>

                <div class="panel-body">
                  <div class="col-lg-10 col-lg-offset-2">
                                         @if (session('status'))

                                                       <div class="alert alert-success">
                                                           {{ session('status') }}
                                                       </div>
                                                   @endif



                                         </div>
                    <form class="form-horizontal" method="POST" action="{{ route('top') }}">
                        {{ csrf_field() }}
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
                        </div>

                        <div class="form-group{{ $errors->has('amount') ? ' has-error' : '' }}">
                            <label for="amount" class="col-md-4 control-label">Amount</label>

                            <div class="col-md-6">
                                <input id="amount" type="text" class="form-control" name="amount" value="{{ old('amount') }}" placeholder="5000 ..."  required autofocus>

                                @if ($errors->has('amount'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('amount') }}</strong>
                                    </span>
                                @endif
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
                        </div>


                                      <div class="form-group">
                                          <div class="col-md-6 col-md-offset-4">

                                              <button type="submit" class="btn btn-primary">
                                                  Top Up
                                              </button>
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


                    @endsection

                  @endsection
