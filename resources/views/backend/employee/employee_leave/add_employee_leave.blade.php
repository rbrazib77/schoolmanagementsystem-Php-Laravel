@extends('admin.adminmaster')
@section('admin_content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<section class="content">
    <div class="row">
        <div class="col-12">
            <div class="box">
                <div class="box-header with-border">
                  <h4 class="box-title">Employee Leave</h4>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                  <div class="row">
                    <div class="col">
                        <form action="{{route('employee.leave.store')}}" method="POST">
                         @csrf
                          <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <h5>Employee Name<span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <select name="employee_id" id="select" required="" class="form-control" aria-invalid="false">
                                            <option value="" selected="" disabled="">Select Employee</option>
                                            @foreach ($allEmployee as $item)
                                            <option value="{{$item->id}}">{{$item->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                           </div>
                           <div class="col-lg-6">
                            <div class="form-group">
                                <h5>Start Date <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="date" name="start_date" class="form-control" placeholder="Salary Increment">
                                    @error('start_date')
                                    <strong class="text-danger">{{$message}}</strong>
                                    @enderror
                                </div>
                            </div>
                          </div>
                          </div>
                          <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <h5>Leave Purpose<span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <select name="leave_purpose_id" id="leave_purpose_id" required="" class="form-control" aria-invalid="false">
                                            <option value="" selected="" disabled="">Select Employee</option>
                                            @foreach ($leave_purpose as $item)
                                            <option value="{{$item->id}}">{{$item->name}}</option>
                                            @endforeach
                                            <option value="0">New Purpose</option>
                                        </select>
                                        <input type="text" name="name" class="form-control" placeholder="Write Purpose" id="add_another" style="display: none">
                                    <div class="help-block"></div></div>
                                </div>
                           </div>
                              <div class="col-lg-6">
                                <div class="form-group">
                                    <h5>End Date <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="date" name="end_date" class="form-control">
                                        @error('end_date')
                                        <strong class="text-danger">{{$message}}</strong>
                                        @enderror
                                    </div>
                                </div>
                              </div>
                          </div>
                            <div class="text-xs-right">
                                {{-- <button type="submit" class="btn btn-info">Submit</button> --}}
                                <input type="submit" class="btn btn-info" value="Submit">
                            </div>
                        </form>

                    </div>
                    <!-- /.col -->
                  </div>
                  <!-- /.row -->
                </div>
                <!-- /.box-body -->
              </div>
        </div>
        <!-- /.col -->
    </div>
<!-- /.row -->
</section>

<script type="text/javascript">
	$(document).ready(function(){
		$(document).on('change','#leave_purpose_id',function(){
			var leave_purpose_id = $(this).val();
			if (leave_purpose_id == '0') {
				$('#add_another').show();
			}else{
				$('#add_another').hide();
			}
		});
	});
</script>

@endsection

