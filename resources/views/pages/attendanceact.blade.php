<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
<title>@yield('title') - {{config('app.name')}}</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
<link href="{{ asset('yo/font-awesome.css') }}" rel="stylesheet">
<link href="{{ asset('yo/bootstrap.css') }}" rel="stylesheet">
<link href="{{ asset('yo/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
<link href="{{ asset('yo/buttons.bootstrap4.min.css') }}" rel="stylesheet">
<link href="{{ asset('datatable/style.css') }}" rel="stylesheet">



</head>
<body>
<!-- partial:index.partial.html -->
<div class="container">


  <div class="row">

    <div class="col-12" >
      <h3 class="titulo-tabla">All Activitie Attendance </h3>



      <form class="form-horizontal" method="POST" action="{{ route('fetchac') }}">
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



      <table id="ejemplo" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
              <th>S/N</th>
                <th>Name</th>
                <th>Phone</th>
                <th>Group</th>
                <th>Time In</th>
                  <th></th>
            </tr>
        </thead>
        <tbody>
  <?php $count ='1';?>
          @foreach($posts as $p)
<?php
$name2=App\Model\mtncotumer::usersinfo323($p->reg);
$name=App\Model\mtncotumer::usersinfo($p->reg);
$phone2=App\Model\mtncotumer::phoneinfo2($p->reg);
$phone=App\Model\mtncotumer::phoneinfo($p->reg);
$group=App\Model\mtncotumer::usersinfogroup($p->reg);?>

            <tr>
                <td>{{$count++}}</td>
                <td>{{$name or $p->reg}}</td>
                <td>{{$phone}}</td>
                  <td>{{$group}}</td>
                <td>{{$p->created_at}}</td>
                  <td></td>
            </tr>
@endforeach
        </tbody>
        <tfoot>
            <tr>
                <th>S/N</th>
                <th>Name</th>
                <th>Phone</th>
                  <th>Group</th>
                <th>Time In</th>
                  <th></th>
            </tr>
        </tfoot>

    </table>




    </div>
  </div>






</div>


<script src="{{ asset('yo/js/jquery.min.js') }}" ></script>
<script src="{{ asset('yo/js/popper.min.js') }}" ></script>
<script src="{{ asset('yo/js/bootstrap.min.js') }}" ></script>
<script src="{{ asset('yo/js/jquery.dataTables.min.js') }}" ></script>
<script src="{{ asset('yo/js/dataTables.bootstrap4.min.js') }}" ></script>
<script src="{{ asset('yo/js/dataTables.buttons.min.js') }}" ></script>
<script src="{{ asset('yo/js/buttons.bootstrap4.min.js') }}" ></script>
<script src="{{ asset('yo/js/jszip.min.js') }}" ></script>
<script src="{{ asset('yo/js/pdfmake.min.js') }}" ></script>
<script src="{{ asset('yo/js/vfs_fonts.js') }}" ></script>
<script src="{{ asset('yo/js/buttons.html5.min.js') }}" ></script>
<script src="{{ asset('yo/js/buttons.print.min.js') }}" ></script>
<script src="{{ asset('yo/js/buttons.colVis.min.js') }}" ></script>
<script src="{{ asset('datatable/script.js') }}" ></script>

</body>
</html>
