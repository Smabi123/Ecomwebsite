@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Add Product</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        
                        <div class="form-group">
                            <label for="name" class="col-md-4 control-label">Product ID</label>
                            

                            <div class="col-md-6">
                                <input id="pur_order_num" type="text" class="form-control" name="pur_order_num" value="{{ rand() }}" required readonly>

                               <br>
                <span style="color:red;">{{ $errors->first('name') }}</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="name" class="col-md-4 control-label">Name</label>
                            

                            <div class="col-md-6">
                                <input id="name" type="name" class="form-control" name="name" value="{{ old('name') }}" required>

                               <br>
                <span style="color:red;">{{ $errors->first('name') }}</span>
                            </div>
                        </div>
						<div class="form-group">
                            <label for="location" class="col-md-4 control-label">Location</label>
                            

                            <div class="col-md-6">
                                 <input id="location" type="text" class="form-control" name="location" value="{{ old('location') }}" required>

                               <br>
                <span style="color:red;">{{ $errors->first('location') }}</span>
                            </div>
                            
                        </div>
                        <div class="form-group">
                            <label for="description" class="col-md-4 control-label">Description</label>
                            

                            <div class="col-md-6">
                                <textarea id="description" type="text" class="form-control" name="description"  required></textarea>

                               <br>
                <span style="color:red;">{{ $errors->first('description') }}</span>
                            </div>
                            
                        </div>
<div class="control-group">
              <label class="col-md-4 control-label">Photo</label>
              <div class="col-md-6">
                <input type="file" name="photo" id="photo"   />
                <br>
                <span style="color:green">Image should be less than 2MB</span>
                <br>
                <span style="color:green">width-> 300 & height-> 310</span>
                <br>
                <span style="color:red;">{{ $errors->first('photo') }}</span>
              </div>
                       

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                   Submit
                                </button>

                                
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
