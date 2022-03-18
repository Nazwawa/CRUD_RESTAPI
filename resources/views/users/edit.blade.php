@extends('template')

@section('content')
    <div class="row mt-5 mb-5">
        <div class="col-lg-12 margin-tb">
            <div class="float-left">
                <h2>Edit Siswa</h2>
            </div>
            <div class="float-right">
                <a class="btn btn-secondary" href="{{ route('users.index') }}"> Back</a>
            </div>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ url()->current() }}">
        @method('PUT')
        @csrf
    
        <h4>Edit User</h4>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">First Name</label>
            <input type="text" name="nama_depan" class="form-control" id="exampleInputPassword1" value="{{ $user['firstName'] }}">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Last Name</label>
            <input type="text" name="nama_belakang" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $user['lastName'] }}">
        </div>
      <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
          <button type="submit" class="btn btn-primary">Save</button>
        </div>
      </div>
    </form>
@endsection