
@extends('admin.adminmaster')
@section('admin_content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
      <!-- Main content -->
      <section class="content">
        <div class="row">

            <div class="col-md-12">
				<div class="box bb-3 border-warning">
				  <div class="box-header">
					<h4 class="box-title">Student <strong>Search</strong></h4>
				  </div>

				  <div class="box-body">
                    <form action="{{route('roll.generate.store')}}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <h5>Year</h5>
                                    <div class="controls">
                                        <select name="student_year_id" id="student_year_id" required="" class="form-control" aria-invalid="false">
                                            <option value="" disabled="" selected="">Select Year</option>
                                            @foreach ($allYear as $item)
                                            <option value="{{$item->id}}">{{$item->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <h5>Class</h5>
                                    <div class="controls">
                                        <select name="student_class_id" id="student_class_id" required="" class="form-control" aria-invalid="false">
                                            <option value="" disabled="" selected="">Select Class</option>
                                            @foreach ($allClass as $item)
                                            <option value="{{$item->id}}">{{$item->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4" style="padding-top: 25px">
                                <a id="search" class="btn btn-primary" name="search">Search</a>
                            </div>
                        </div>


                        <div class="row d-none" id="roll-generate">
                            <div class="col-md-12">
                                <table class="table table-bordered table-striped" style="width: 100%">
                                    <thead class="thead-light">
                                        <tr>
                                          <th>ID No</th>
                                          <th>Student Name</th>
                                          <th>Father,s Name</th>
                                          <th>Gender</th>
                                          <th>Roll</th>
                                        </tr>
                                      </thead>
                                      <tbody id="roll-generate-tr">

                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <input type="submit" class="btn btn-info" value="Roll Generate">
                    </form>
				  </div>
				</div>
			  </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </section>

      {{-- // Start Roll Generated =========== --}}

      <script type="text/javascript">
        $(document).on('click','#search',function(){
          var student_year_id = $('#student_year_id').val();
          var student_class_id = $('#student_class_id').val();
           $.ajax({
            url: "{{ route('student.registration.getstudents')}}",
            type: "GET",
            data: {'student_year_id':student_year_id,'student_class_id':student_class_id},
            success: function (data) {
              $('#roll-generate').removeClass('d-none');
              var html = '';
              $.each( data, function(key, v){
                html +=
                '<tr>'+
                '<td>'+v.student.id_no+'<input type="hidden" name="student_id[]" value="'+v.student_id+'"></td>'+
                '<td>'+v.student.name+'</td>'+
                '<td>'+v.student.father_name+'</td>'+
                '<td>'+v.student.gender+'</td>'+
                '<td><input type="text" class="form-control form-control-sm" name="roll[]" value="'+v.roll+'"></td>'+
                '</tr>';
              });
              html = $('#roll-generate-tr').html(html);
            }
          });
        });

      </script>

      {{-- ============ End Script Roll Generate ================= --}}


@endsection
