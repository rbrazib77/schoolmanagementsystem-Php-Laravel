<!DOCTYPE html>
<html>
<head>
<style>
#customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

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

    @php
         $registrationfee = App\Models\FeeCategoryAmount::where('fee_category_id','3')->where('student_class_id',$details->student_class_id)->first();
           $originalfee = $registrationfee->amount;
            $discount = $details['discount']['discount'];
            $discounttablefee = $discount/100*$originalfee;
            $finalfee = (float)$originalfee-(float)$discounttablefee;
    @endphp

<table id="customers">
  <tr>
   <td><h2>
    </h2></td>
    <td>
    <h2>Rb Dev's</h2>
    <p>School Address:Dhaka,Mirpur</p>
    <p>Phone : 01734268063</p>
    <p>Email : support@easylerningbd.com</p>
    </td>
  </tr>
</table>

<table id="customers">
  <tr>
    <th width="10%">Sl</th>
    <th width="45%">Student Details</th>
    <th width="45%">Student Data</th>
  </tr>
  <tr>
    <td>1</td>
    <td><b>Student Name</b></td>
    <td>{{ $details['student']['name'] }}</td>
  </tr>
  <tr>
    <td>2</td>
    <td><b>Student ID No</b></td>
    <td>{{ $details['student']['id_no'] }}</td>
  </tr>

    <tr>
    <td>3</td>
    <td><b>Student Role</b></td>
    <td>{{ $details->roll }}</td>
  </tr>

  <tr>
    <td>4</td>
    <td><b>Father's Name</b></td>
    <td>{{ $details['student']['father_name'] }}</td>
  </tr>
  <tr>
    <td>5</td>
    <td><b>Mother's Name</b></td>
    <td>{{ $details['student']['mother_name'] }}</td>
  </tr>
  <tr>
    <td>12</td>
    <td><b>Session</b></td>
    <td>{{ $details['studentYear']['name'] }}</td>
  </tr>
  <tr>
    <td>13</td>
    <td><b>Class</b></td>
    <td>{{ $details['studentClass']['name'] }}</td>
    </tr>
  <tr>
    <td>6</td>
    <td><b>Mobile Number</b></td>
    <td>{{ $details['student']['mobile'] }}</td>
  </tr>
  <tr>
    <td>7</td>
    <td><b>Exam Fee</b></td>
    <td>{{ $originalfee}}</td>
  </tr>
    <tr>
    <td>11</td>
    <td><b>Discount</b></td>
    <td>{{ $discount }} %</td>
  </tr>
    <tr>
    <td>13</td>
    <td><b>Fee For This Student for {{$exam_type}}</b></td>
    <td>{{$finalfee}}</td>
    </tr>

</table>
<br> <br>
  <i style="font-size: 10px; float: right;">Print Data : {{ date("d M Y") }}</i>

</body>
</html>

