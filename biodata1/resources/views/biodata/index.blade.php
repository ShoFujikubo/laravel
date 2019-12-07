@extends('layouts.app')
@section('content')
<div class = "container mt-5">
 <div class = "row">
  <div class = "col-md-10">
    
    <h3>This is Biodata1</h3>
 </div>
 <div class = "col-sm-2">
  <a class = "btn btn-sm btn-success" href="#">
  Create New Biodata
  </a>
 </div>
</div>

@if($message = Session::get('success'))
<div class = "alert alert-primary">
    <p>{{$message}}</p>
</div>

@endif
<table class = "table table-hover table-sm">
<tr>
<th width = "50px">
 <b>No.</b>
</th>

<th width = "300px">
 <b>Person</b>
</th>

<th>
 <b>Details</b>
</th>
<th width = "180px">Action</th>
</tr>

@foreach($biodatas as biodata)
<tr>
 <td>
  <b>{{++$i}}.</b>
  <td>{{$biodata->name}}</td>
  <td>{{$biodata->content}}</td>
 </td>
 <td>
 <form action = "#" method ="post">
  <a class = "btn btn-sm btn-success" href="#">SHOW</a>
  <a class = "btn btn-sm btn-wrong" href="#">EDIT</a>

@csrf

@method('DELETE')
<button type = "submit" class = "btn btn-sm btn-danger" name="button">DELETE</button>
</form>

</td>
</tr>

@endforeach
</table>
  {!!$biodatas->links()!!}
</div>
 @endsection
$biodatas1 = Biodata1::latest()->paginate(5);
return view('biodata.index',compact('biodatas'))->with('i',(request()->input('page',1)-1)*5);
