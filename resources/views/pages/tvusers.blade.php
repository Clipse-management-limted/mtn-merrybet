<!DOCTYPE html>
<html lang="en" >
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
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



</head>
<body>
<!-- partial:index.partial.html -->
<div class="container">


  <div class="row">

    <div class="col-12" >
      {{-- <h3 class="titulo-tabla">Clientes Registrados </h3> --}}

 <?php $count = 0;?>
      <table id="ejemplo" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
              <th>S/N</th>
                <th>Name</th>
                <th>Phone</th>
                <th>Email</th>
                <th>Ticket</th>
                <th>Ticket Type</th>
                <th>Select</th>
      <th>Action</th>
            </tr>
        </thead>
        <tbody>
          {{-- @foreach($posts as $p) --}}
            <?php
              $count = 1;
              foreach($posts as $row)
              {

               echo '
               <tr>
                 <td>'.$count++.'</td>
                <td>'.$row["CUSTOMER_NAME"].'</td>
                <td>'.$row["PHONE"].'</td>
                <td>'.$row["EMAIL"].'</td>
                <td>'.$row["ivcode"].'</td>
                <td>'.$row["TICKET_CATEGORY"].'</td>
                <td>
                 <input type="checkbox" name="email" class="single_select" data-ct="'.$row["TICKET_CATEGORY"].'" data-email="'.$row["EMAIL"].'" data-name="'.$row["CUSTOMER_NAME"].'" />
                </td>
                <td><button type="button" name="email_button" class="btn btn-info btn-xs email_button" id="'.$count.'" data-email="'.$row["EMAIL"].'" data-ct="'.$row["TICKET_CATEGORY"].'" data-name="'.$row["CUSTOMER_NAME"].'" data-action="single">Send Single</button></td>
               </tr>
               ';
              }
              ?>

        </tbody>
        <tfoot>
            <tr>
              <th>S/N</th>
                <th>Name</th>
                <th>Phone</th>
                <th>Email</th>
                <th>Ticket</th>
                <th>Ticket Type</th>
                <th>Select</th>
      <th>Action</th>
            </tr>
        </tfoot>
        <tr>
     <td colspan="6"></td>
     <td><button type="button" name="bulk_email" class="btn btn-info email_button" id="bulk_email" data-action="bulk">Send Bulk</button></td></td>
    </td>
        {{-- <tr>
   <td colspan="3"></td>
   <td><button type="button" name="bulk_email" class="btn btn-info email_button" id="bulk_email" data-action="bulk">Send Bulk</button></td>
     </tr> --}}
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


<script type="text/javascript">



    $.ajaxSetup({

        headers: {

            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

        }

    });



    $(".btn-submit").click(function(e){



        e.preventDefault();



        var name = $("input[name=name]").val();

        var email = $("input[name=email]").val();



        $.ajax({

           type:'POST',

           url:'/ajaxRequest',

           data:{name:name, password:password, email:email},

           success:function(data){

              alert(data.success);

           }

        });



  });

</script>



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
    data:{name:name, email:email,ct:ct},
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


</body>
</html>
