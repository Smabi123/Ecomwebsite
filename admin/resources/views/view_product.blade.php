@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">View Products</div>
                <div class="panel-body">
                   <table class="table table-bordered data-table">
              <thead>
                  <?php
                  $i=1;
                  ?>
                <tr>
                  <th>Sl.No</th>   
                  <th>Name</th>
                  <th>Description</th>
                  <th>Image</th>
                </tr>
              </thead>
              <tbody>
                  @foreach($product as $row)
                <tr class="gradeX">
                  <td>{{$i}}</td>       
                  <td>{{$row->name}}</td>
                  <td>{{$row->description}}</td>
                  <td>@if($row->photo!='')<img style='height:50px; width : 50px' src="{{asset('storage/app')}}/{{$row->photo}}" >@endif</td>
                  
                  
                  <td>
                   
                   <a href="{{url('delete_product/'.$row->id)}}" onclick="return funpas()" class="btn btn-danger btn-sm">Delete</a>
                  </td>
                  
                </tr>
                <?php $i++; ?>
                @endforeach
              </tbody>
            </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
<script>
	function funpas()
	{
	return confirm('Are you sure do you want to delete this Product... Click Ok to continue.');
	}


	</script>