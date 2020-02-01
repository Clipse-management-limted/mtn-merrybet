<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
<title>@yield('title') - {{config('app.name')}}</title>
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

<!-- CSRF Token -->
<meta name="csrf-token" content="{{ csrf_token() }}">

</head>
<body>
<!-- partial:index.partial.html -->
<div class="container">


  <div class="row">

    <div class="col-12" >
      <h3 class="titulo-tabla">List Of People in  {{$re}}  Group  </h3>


      <table id="ejemplo" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
              <th>S/N</th>
                <th>Name</th>
                <th>Phone</th>
                <th>Groups</th>
                <th>Hotel</th>
                <th>Qrcode</th>
                	<th>Select</th>
                  <th>Action</th>
            </tr>
        </thead>
        <tbody>
          <?php
          $count = 1;
          foreach($posts as $row)
          {
            if($row->hotel =='1')
            {
              $hotel='Lagos Continental';

            }
            elseif($row->hotel =='3'){
                $hotel='Eko Signature';
            }
            else
            {
              $hotel='Eko Hotel';

            }

          echo '
          <tr>
          <td>'.$count++.'</td>
          <td>'.$row->name.'</td>
          <td>'.$row->phone.'</td>
          <td>'.$row->platoon.'</td>
          <td>'.$hotel.'</td>
        <td>'.$row->ivcode.'</td>
        <td>
            <input type="checkbox" name="single_select" class="single_select"  data-ivcode="'.$row->ivcode.'" data-email="'.$row->email.'" data-name="'.$row->name.'" data-phone="'.$row->phone.'" />
          </td>
        <td><button type="button" name="email_button" class="btn btn-info btn-xs email_button" id="'.$row->id.'" data-ivcode="'.$row->ivcode.'" data-name="'.$row->name.'" data-phone="'.$row->phone.'"  data-email="'.$row->email.'" data-action="single">Send Single</button></td>
          </tr>
          ';
          }
          ?>
          <tr>
            <td colspan="6"></td>
            <td><button type="button" name="bulk_email" class="btn btn-info email_button" id="bulk_email" data-action="bulk">Send Bulk</button></td></td>

          </tr>

          {{-- @foreach($posts as $p)


            <tr>
                <td>{{$p->id}}</td>
                <td>{{$p->name}}</td>
                <td>{{$p->phone}}</td>
                <td>{{$p->hotel}}</td>
                <td>{{$p->gender}}</td>
                <td>{{$p->social_handle}}</td>
            </tr>
@endforeach --}}

        </tbody>
        <tfoot>
            <tr>
                <th>S/N</th>
                <th>Name</th>
                <th>Phone</th>
                  <th>Hotel</th>
                <th>Groups</th>
                <th>Qrcode</th>
                	<th>Select</th>
                  <th>Action</th>
            </tr>
        </tfoot>
    </table>




    </div>
  </div>






</div>
<!-- partial -->
<!-- <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/js/bootstrap.min.js'></script>
<script src='https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js'></script>
<script src='https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js'></script>
<script src='https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js'></script>
<script src='https://cdn.datatables.net/buttons/1.5.2/js/buttons.bootstrap4.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js'></script> -->



<!--

 -->
 <!-- <script src='https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js'></script> -->
<!-- <script src='https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js'></script> -->
 <!-- <script src='https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js'></script> -->

 <!-- <script src="{{ asset('datatable/jQuery-3.3.1/jquery-3.3.1.js') }}" ></script>
 <script src="{{ asset('js2/bootstrap.min.js') }}" ></script>

<script src="{{ asset('datatable/DataTables-1.10.20/jquery.dataTables.min.js') }}" ></script>
<script src="{{ asset('datatable/DataTables-1.10.20/dataTables.bootstrap4.min.js') }}" ></script>
<script src="{{ asset('datatable/DataTables-1.10.20/dataTables.buttons.min.js') }}" ></script>
<script src="{{ asset('datatable/DataTables-1.10.20/buttons.bootstrap4.min.js') }}" ></script>

<script src="{{ asset('datatable/JSZip-2.5.0/jszip.min.js') }}" ></script>
<script src="{{ asset('datatable/pdfmake-0.1.36/pdfmake.min.js') }}" ></script>
<script src="{{ asset('datatable/pdfmake-0.1.36/vfs_fonts.js') }}" ></script>
<script src="{{ asset('js2/bootstrap.min.js') }}" ></script> -->

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

  // var email = $(this).data("email");
  //   var phone = $(this).data("phone");
  //   var name =$(this).data("name");
  //   var ivcode  =$(this).data("ivcode");


  if(action == 'single')
  {
   email_data.push({

     email : $(this).data("email"),
       phone :$(this).data("phone"),
       name : $(this).data("name"),
     ivcode  : $(this).data("ivcode")
   });
  }
  else
  {
   $('.single_select').each(function(){
    if($(this). prop("checked") == true)
    {
     email_data.push({
       email : $(this).data("email"),
         phone :$(this).data("phone"),
         name : $(this).data("name"),
       ivcode  : $(this).data("ivcode")
     });
    }
   });
  }

  $.ajax({
   url:"send_mail_info",
   method:"POST",
    //data:{ivcode:ivcode,id:id,phone:phone,name:name},
   data:{email_data:email_data,},
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

</body>
</html>
