@extends('admin.adminmaster')
@section('admin_content')
<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-12">
        <div class="box p-3">
    <style>
    #customers {
    font-family: Arial, Helvetica, sans-serif;
    }
    .details_profile {
    display: flex;
    }
    .details_profile_img {
    width: 30%;
    margin-bottom: 10px;
    padding: 10px;
    }
    .details_profile_contact {
    width: 70%;
    }

    #customers td, #customers th {
    border: 1px solid #ddd;
    padding: 8px;
    }

    #customers th {
    padding-top: 12px;
    padding-bottom: 12px;
    text-align: left;
    background-color: #4CAF50;
    color: white;
    }
    </style>
</head>
<body>
    <div class="details_profile">
        <div class="details_profile_img">
            <img width="100%" id="showImage"  src="{{(!empty($details->image)) ? url('upload/employee_images/'.$details->image):url('upload/no_image.jpg')}}" alt="User Avatar">
        </div>
        <div class="details_profile_contact">
            <h1><span class="text-white"><strong>Name:</strong></span>{{ $details->name }}</h1>
            <h3><span class="text-white"><strong>Address:</strong></span>{{ $details->address}}</h3>
            <h3><span class="text-white"><strong>Mobile:</strong></span>{{ $details->mobile}}</h3>
        </div>
    </div>

    <table id="customers">
    <tr>
        <th width="10%">Sl</th>
        <th width="45%">Employee Details</th>
        <th width="45%">Employee Data</th>
    </tr>
    <tr>
        <td>1</td>
        <td><b>Employee Name</b></td>
        <td>{{ Str::title($details->name)}}</td>
    </tr>
    <tr>
        <td>2</td>
        <td><b>Employee ID No</b></td>
        <td>{{ $details->id_no }}</td>
    </tr>
    <tr>
        <td>3</td>
        <td><b>Father's Name</b></td>
        <td>{{ $details->father_name}}</td>
    </tr>
    <tr>
        <td>4</td>
        <td><b>Mother's Name</b></td>
        <td>{{ $details->mother_name }}</td>
    </tr>
    <tr>
        <td>5</td>
        <td><b>Mobile Number </b></td>
        <td>{{ $details->mobile}}</td>
    </tr>
    <tr>
        <td>6</td>
        <td><b>Address</b></td>
        <td>{{ Str::title($details->address)}}</td>
    </tr>
    <tr>
        <td>7</td>
        <td><b>Gender</b></td>
        <td>{{ $details->gender}}</td>
    </tr>

        <tr>
        <td>8</td>
        <td><b>Religion</b></td>
        <td>{{ $details->religion }}</td>
    </tr>
    <tr>
        <td>9</td>
        <td><b>Date of Birth</b></td>
        <td>{{ date('Y-m-d',strtotime($details->dob))}}</td>
    </tr>
    <tr>
        <td>10</td>
        <td><b>Designation</b></td>
        <td>{{ Str::title($details->designation->name)}}</td>
    </tr>
    <tr>
        <td>11</td>
        <td><b>Joining Date</b></td>
        <td>{{ date('Y-m-d',strtotime($details->join_date))}}</td>
    </tr>
    <tr>
        <td>12</td>
        <td><b>Employee Salary</b></td>
        <td>{{$details->salary}}</td>
    </tr>
    </table>
    <br>
    <div class="footer">
        <a href="{{route('employee.registration.pdf',$details->id)}}" class="btn btn-success" style="float: left;">Download PDF</a>
        <i style="font-size: 10px; float: right;">Date : {{ date("d M Y") }}</i>
    </div>
            </div>
            </div>
            <!-- /.box-body -->
        </div>
        </div>
        <!-- /.col -->
    </div>
<!-- /.row -->
</section>
@endsection
