@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Contact Us</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for="name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="name" class="form-control" name="name" value="{{ old('name') }}" required>

                               <br>
                <span style="color:red;">{{ $errors->first('name') }}</span>
                            </div>
                        </div>
						<div class="form-group">
                            <label for="name" class="col-md-4 control-label">Phone Number</label>

                            <div class="col-md-6">
                                <input id="pnum" type="pnum" class="form-control" name="pnum" value="{{ old('pnum') }}" required>

                               <br>
                <span style="color:red;">{{ $errors->first('pnum') }}</span>
                            </div>
                        </div>

 <div class="form-group">
                            <label for="name" class="col-md-4 control-label">Email</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                               <br>
                <span style="color:red;">{{ $errors->first('email') }}</span>
                            </div>
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
