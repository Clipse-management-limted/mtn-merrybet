<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
<title>@yield('title') - {{config('app.name')}}</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css'>
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/css/bootstrap.css'>
<link rel='stylesheet' href='https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css'>
<link rel='stylesheet' href='https://cdn.datatables.net/buttons/1.5.2/css/buttons.bootstrap4.min.css'> -->
<link href="{{ asset('yo/font-awesome.css') }}" rel="stylesheet">
<link href="{{ asset('yo/bootstrap.css') }}" rel="stylesheet">
<link href="{{ asset('yo/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
<link href="{{ asset('yo/buttons.bootstrap4.min.css') }}" rel="stylesheet">
<link href="{{ asset('datatable/style.css') }}" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>


</head>
<body>
<!-- partial:index.partial.html -->
<div class="container">


  <div class="row">

    <div class="col-12" >
      <h3 class="titulo-tabla">SoGreene Guestlist </h3>

  <a class="btn btn-primary" href="{{ route('valguest') }}">Validated Guest List </a>
      <table id="ejemplo" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
              <th>S/N</th>
              <th>Title</th>
                <th>Firts Name</th>
                <th>Last Name</th>
                  <th>Attendance</th>
                <th>Action</th>
                <!-- <th>Time</th> -->
            </tr>
        </thead>
        <tbody>
          <?php
          $count = 1;
          foreach($posts as $row)
          {

          echo '
          <tr>
          <td>'.$count++.'</td>
          <td>'.$row->Title.'</td>
          <td>'.$row->First.'</td>
            <td>'.$row->Last.'</td>
              <td>'.$row->attend.'</td>

          <td><button type="button" name="email_button" class="btn btn-info btn-xs email_button" id="'.$count.'" data-email="'.$row->id.'" data-ct="'.$row->Last.'" data-name="'.$row->First.'" data-action="single">Send Single</button></td>
          </tr>
          ';
          }
          ?>
          {{-- @foreach($posts as $p)


            <tr>
                <td>{{$p->id}}</td>
                <td>{{$p->Title}}</td>
                <td>{{$p->First}}</td>
                <td>{{$p->Last}}</td>
                  <td>{{$p->attend}}</td>
                <td><button type="button" name="email_button" class="btn btn-info btn-xs email_button" id="{{$count}}" data-email="{{$row->First}}" data-ct="{{$row->Last}}" data-name="{{$row->First}}" data-action="single">Send Single</button></td>
                <!-- <td>{{$p->updated_at}}</td> -->
            </tr>
@endforeach --}}
        </tbody>
        <tfoot>
            <tr>
              <th>S/N</th>
              <th>Title</th>
                <th>Firts Name</th>
                <th>Last Name</th>
                <th>Attendance</th>
                <th>Action</th>
                <!-- <th>Time</th> -->
            </tr>
        </tfoot>
    </table>




    </div>
  </div>






</div>

<script>
$(document).ready(function(){
  $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
 $('.email_button').click(function(){
  $(this).attr('disabled', 'disabled');
  var id = $(this).attr("id");
  var action = $(this).data("action");
  var email_data = [];

  var email = $(this).data("email");
    var name = $(this).data("name");
    var ct =$(this).data("ct");


  // if(action == 'single')
  // {
  //  email_data.push({
  //   email: $(this).data("email"),
  //   name: $(this).data("name")
  //  });
  // }
  // else
  // {
  //  $('.single_select').each(function(){
  //   if($(this). prop("checked") == true)
  //   {
  //    email_data.push({
  //     email: $(this).data("email"),
  //     name: $(this).data('name')
  //    });
  //   }
  //  });
  // }

  $.ajax({
   url:"send_mail",
   method:"POST",
    data:{firstname:name, id:email,lastname:ct},
   // data:{email_data:email_data,},
   beforeSend:function(){
    $('#'+id).html('Sending...');
    $('#'+id).addClass('btn-danger');
   },
   success:function(data){
    if(data = 'ok')
    {
     $('#'+id).text('Success');
     $('#'+id).removeClass('btn-danger');
     $('#'+id).removeClass('btn-info');
     $('#'+id).addClass('btn-success');
    }
    else
    {
     $('#'+id).text(data);
    }
    $('#'+id).attr('disabled', false);
   }

  });
 });
});
</script>

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

  <!-- <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/js/bootstrap.min.js'></script>

<script src='https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js'></script>

<script src='https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js'></script>
<script src='https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js'></script>



<script src='https://cdn.datatables.net/buttons/1.5.2/js/buttons.bootstrap4.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js'></script> -->
<!-- <script src='https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js'></script>
<script src='https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js'></script>
<script src='https://cdn.datatables.net/buttons/1.5.2/js/buttons.print.min.js'></script>
<script src='https://cdn.datatables.net/buttons/1.5.2/js/buttons.colVis.min.js'></script> -->
<script src="{{ asset('datatable/script.js') }}" ></script>


</body>
</html>
