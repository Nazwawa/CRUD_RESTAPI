@extends('template')

@section('content')
    <div class="row mt-5 mb-5">
        <div class="col-lg-12 margin-tb">
            <div class="float-left">
                <h2>Data </h2>
            </div>
            <div class="float-right">
                <a class="btn btn-success" href="{{ route('users.create') }}">Create New</a>
            </div>
        </div>
    </div>

    @if ($messages = Session::get('message'))
    <div class="alert alert-success">
        <p>{{ $messages }}</p>
    </div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th width="20px" class="text-center">No</th>
            <th width="280px"class="text-center">First Name</th>
            <th width="280px"class="text-center">Last Name</th>
            <th width="280px"class="text-center">Action</th>
        </tr>
        @php
        $number = 1;
    @endphp
    @forelse($users['data'] as $user)
    <tr>
        <td>{{ $number++ }}</td>
        <td>{{ $user['firstName'] }}</td>
        <td>{{ $user['lastName'] }}</td>
        <td align="center">
            <form method="POST" action="{{ 'users/'.$user['id'] }}">
                @method('DELETE')
                @csrf
            
                <a href="{{ 'users/'.$user['id'] }}" class="text-primary"><button type="button" class="btn btn-warning">Edit</button>
                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure to delete this user?');">Delete</button>
            </form>
        </td>

    </tr>
    @empty
        <tr><td colspan="6" align="center">No Record(s) Found!</td></tr>
    @endforelse

    </table>
    @if($users['total'] > $users['limit'])
<div class="card-body">
    @php $pages = $users['total'] / $users['limit'] @endphp
    <nav aria-label="Page navigation example">
        <ul class="pagination">
            <li class="page-item {{ request('page') == 1 || is_null(request('page')) ? 'disabled' : '' }}">
                <a href="?page={{ request('page') ? request('page') - 1 : '1' }}" class="page-link" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                </a>
            </li>
            @for ($i = 1; $i <= $pages; $i++) <li class="page-item {{ request('page') == $i || (is_null(request('page')) && $i == 1) ? 'active' : '' }}">
                <a class="page-link" href="?page={{ $i }}{{request('search') ? '&search=' . request('search') : ''}}">{{ $i }}</a>
                </li>
                @endfor
                <li class="page-item {{ request('page') == $pages ? 'disabled' : '' }}">
                    <a class="page-link" href="?page={{ request('page') ? request('page') + 1 : $pages - 1 }}" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                    </a>
                </li>
        </ul>
    </nav>
</div>
@endif

@endsection