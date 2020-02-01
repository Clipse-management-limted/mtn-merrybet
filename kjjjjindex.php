<!-- Page-Level Demo Scripts - Tables - Use for reference -->
  <!-- <script>
  $(document).ready(function() {
      $('#dataTables-example').DataTable({
              responsive: true
      });
  });
  </script> -->
  {{-- <script>
  $(function () {
      $("#example1").DataTable();
      $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false
      });
    });
  </script> --}}

  <!-- Page script -->




<form class="form-horizontal" method="POST" action="{{ route('creg2') }}">
    {{ csrf_field() }}
    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
        <label for="name" class="col-md-4 control-label">Name of Guadian/ number of kids</label>

        <div class="col-md-6">
            <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="Mr/Mrs ..."  required autofocus>

            @if ($errors->has('name'))
                <span class="help-block">
                    <strong>{{ $errors->first('name') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group{{ $errors->has('phone_no') ? ' has-error' : '' }}">
        <label for="phone_no" class="col-md-4 control-label">Mobile Number</label>

        <div class="col-md-6">
            <input id="phone_no" type="text" class="form-control" name="phone_no" value="{{ old('phone_no') }}" placeholder="0802334 ..."  required autofocus>

            @if ($errors->has('phone_no'))
                <span class="help-block">
                    <strong>{{ $errors->first('phone_no') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div class="form-group{{ $errors->has('phone_no') ? ' has-error' : '' }}">
        <label for="email" class="col-md-4 control-label">Email</label>

        <div class="col-md-6">
            <input id="email" type="text" class="form-control" name="email" value="{{ old('email') }}" placeholder="kenneyg......."  autofocus>

            @if ($errors->has('email'))
                <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div class="form-group{{ $errors->has('phone_no') ? ' has-error' : '' }}">
        <label for="sh" class="col-md-4 control-label">Social Handle</label>

        <div class="col-md-6">
            <input id="sh" type="text" class="form-control" name="sh" value="{{ old('sh') }}" placeholder="@SocialHandle ..."   autofocus>

            @if ($errors->has('sh'))
                <span class="help-block">
                    <strong>{{ $errors->first('sh') }}</strong>
                </span>
            @endif
        </div>
    </div>

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
     </div> -->
    <div class="form-group{{ $errors->has('kd') ? ' has-error' : '' }}">
        <label for="gender" class="col-md-4 control-label">Gender</label>

        <div class="col-md-6">
          <select id="gender" name="gender" class="form-group{{ $errors->has('gender') ? ' has-error' : '' }}">
            <option value="">Select Gender </option>
            <option value="m">Male </option>
            <option value="f">FeMale </option>

          </select>

            @if ($errors->has('gender'))
                <span class="help-block">
                    <strong>{{ $errors->first('gender') }}</strong>
                </span>
            @endif
        </div>
    </div>



    <!-- <div class="form-group{{ $errors->has('qr_code') ? ' has-error' : '' }}">
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
                          <button type="submit" id="btn-add" class="btn btn-primary">
                              Register
                          </button>
                      </div>
                  </div>

  </form>

  <?php
header('Location: public/');



var table = $('.data-table').DataTable({
//      processing: true,
//      serverSide: true,
//      ajax: "{{ route('ajaxproducts.index') }}",
//      columns: [
//          {data: 'DT_RowIndex', name: 'DT_RowIndex'},
//          {data: 'name', name: 'name'},
//          {data: 'detail', name: 'detail'},
//          {data: 'action', name: 'action', orderable: false, searchable: false},
//      ]
//  });
//
//  $('#createNewProduct').click(function () {
//      $('#saveBtn').val("create-product");
//      $('#product_id').val('');
//      $('#productForm').trigger("reset");
//      $('#modelHeading').html("Create New Product");
//      $('#ajaxModel').modal('show');
//  });
//
//  $('body').on('click', '.editProduct', function () {
//    var product_id = $(this).data('id');
//    $.get("{{ route('ajaxproducts.index') }}" +'/' + product_id +'/edit', function (data) {
//        $('#modelHeading').html("Edit Product");
//        $('#saveBtn').val("edit-user");
//        $('#ajaxModel').modal('show');
//        $('#product_id').val(data.id);
//        $('#name').val(data.name);
//        $('#detail').val(data.detail);
//    })
// });
//
//  $('#saveBtn').click(function (e) {
//      e.preventDefault();
//      $(this).html('Sending..');
//
//      $.ajax({
//        data: $('#productForm').serialize(),
//        url: "{{ route('ajaxproducts.store') }}",
//        type: "POST",
//        dataType: 'json',
//        success: function (data) {
//
//            $('#productForm').trigger("reset");
//            $('#ajaxModel').modal('hide');
//            table.draw();
//
//        },
//        error: function (data) {
//            console.log('Error:', data);
//            $('#saveBtn').html('Save Changes');
//        }
//    });
//  });
//
//  $('body').on('click', '.deleteProduct', function () {
//
//      var product_id = $(this).data("id");
//      confirm("Are You sure want to delete !");
//
//      $.ajax({
//          type: "DELETE",
//          url: "{{ route('ajaxproducts.store') }}"+'/'+product_id,
//          success: function (data) {
//              table.draw();
//          },
//          error: function (data) {
//              console.log('Error:', data);
//          }
//      });
//  });
