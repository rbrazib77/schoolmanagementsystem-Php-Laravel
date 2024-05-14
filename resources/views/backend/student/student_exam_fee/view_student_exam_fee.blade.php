
@extends('admin.adminmaster')
@section('admin_content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/handlebars.js/4.7.8/handlebars.min.js"></script>
      <!-- Main content -->
      <section class="content">
        <div class="row">

            <div class="col-md-12">
				<div class="box bb-3 border-warning">
				  <div class="box-header">
					<h4 class="box-title">Student : <Span class="text-white"><strong>Exam Fee</strong></Span></h4>
				  </div>

				  <div class="box-body">
                        <div class="row">
                            <div class="col-lg-3">
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
                            <div class="col-lg-3">
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
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <h5>Exam Type</h5>
                                    <div class="controls">
                                        <select name="exam_type_id" id="exam_type_id" required="" class="form-control" aria-invalid="false">
                                            <option value="" disabled="" selected="">Select Exam Type</option>
                                            @foreach ($examType as $item)
                                            <option value="{{$item->id}}">{{$item->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3" style="padding-top: 25px">
                                <a id="search" class="btn btn-primary" name="search">Search</a>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-md-12">
                                <div id="DocumentResults">
                                    <script id="document-template" type="text/x-handlebars-template">
                                        <table class="table table-bordered table-striped" style="width: 100%">
                                            <thead>
                                                <tr>
                                                    @{{{thsource}}}
                                                </tr>
                                              </thead>
                                              <tbody>
                                                @{{#each this}}
                                                    <tr>
                                                        @{{{tdsource}}}
                                                    </tr>
                                                @{{/each}}

                                              </tbody>
                                        </table>
                                    </script>
                                </div>
                            </div>
                        </div>
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
      var exam_type_id = $('#exam_type_id').val();
       $.ajax({
        url: "{{ route('student.exam.fee.classwise.get')}}",
        type: "get",
        data: {'student_year_id':student_year_id,'student_class_id':student_class_id,'exam_type_id':exam_type_id},
        beforeSend: function() {
        },
        success: function (data) {
          var source = $("#document-template").html();
          var template = Handlebars.compile(source);
          var html = template(data);
          $('#DocumentResults').html(html);
          $('[data-toggle="tooltip"]').tooltip();
        }
      });
    });

  </script>
      {{-- ============ End Script Roll Generate ================= --}}


@endsection


