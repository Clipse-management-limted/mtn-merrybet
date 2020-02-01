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



</head>
<body>
<!-- partial:index.partial.html -->
<div class="container">


  <div class="row">

    <div class="col-12" >
      <h3 class="titulo-tabla">Clientes Registrados </h3>


      <table id="ejemplo" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
              <th>S/N</th>
                <th>Ticket Id</th>
                <th>name</th>
                <th>phone</th>
                <th>Won</th>
                <!-- <th>Time</th> -->
            </tr>
        </thead>
        <tbody>
          @foreach($posts as $p)


            <tr>
                <td>{{$p->id}}</td>
                <td>{{$p->qr_code}}</td>
                <td>{{$p->name}}</td>
                <td>{{$p->phone}}</td>
                <td>{{$p->won}}</td>
                <!-- <td>{{$p->updated_at}}</td> -->
            </tr>
@endforeach
        </tbody>
        <tfoot>
            <tr>
                <th>S/N</th>
                <th>Ticket Id</th>
                <th>name</th>
                <th>phone</th>
                <th>Won</th>
                <!-- <th>Time</th> -->
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

</body>
</html>
