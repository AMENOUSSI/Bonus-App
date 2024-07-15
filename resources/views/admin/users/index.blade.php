@extends('layouts.admin.main')

@section('content')


    <div class="card mt-3" >

        <div class="card-body">
            <div class="table-responsive" id="main">
                <div class="card-header d-flex justify-content-between align-items-center" >
                    <div class="card-title">Liste des Distributeurs</div>
                    <a href="{{ route('admin.users.create') }}" class="btn btn-primary btn-rounded">
                        <i class="fa fa-plus-circle" id="icon-rounded"></i>
                    </a>

                </div>

                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                @if(session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif

                <table class="table table-head-bg-secondary">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">First Name</th>
                        <th scope="col">Last Name</th>
                        <th scope="col">Reference Identity</th>
                        <th scope="col">Registration Number</th>
                        <th scope="col">Telephone</th>
                        <th scope="col">Email</th>
                        <th scope="col">Sponsor</th>
                        <th scope="col">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->first_name }}</td>
                            <td>{{ $user->last_name }}</td>
                            <td>{{ $user->identity_reference }}</td>
                            <td>{{ $user->registration_number }}</td>
                            <td>{{ $user->telephone }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->sponsor ? $user->sponsor->first_name . ' ' . $user->sponsor->last_name : 'No Sponsor' }}</td>
                            <td>
                                <div class="btn-group" role="group">
                                    <a href="{{ route('admin.users.edit', $user) }}" class="btn btn-sm btn-warning">
                                        <i class="fa fa-pen"></i>Edit
                                    </a>
                                    <a href="{{ route('admin.users.show', ['user' => $user->id]) }}" class="btn btn-sm btn-info">
                                        <i class="fa fa-eye"></i> View
                                    </a>
                                    <a href="{{ route('admin.users.destroy', $user) }}" class="btn btn-sm btn-danger"
                                       onclick="event.preventDefault(); confirmDelete({{ $user->id }});">
                                        <i class="fa fa-trash"></i> Delete
                                    </a>
                                </div>
                                <form id="delete-form-{{ $user->id }}" action="{{ route('admin.users.destroy', $user->id) }}" method="POST" style="display: none;">
                                    @csrf
                                    @method('DELETE')
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="9" class="text-center">No User enrolled yet!</td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
            <div class="d-flex justify-content-end">
                {{ $users->links() }}
            </div>
        </div>
    </div>

    <script>
        function confirmDelete(userId) {
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('delete-form-' + userId).submit();
                }
            })
        }

        // Check for success message to display
        @if(session('success'))
        Swal.fire({
            title: 'Success!',
            text: '{{ session('success') }}',
            icon: 'success',
            confirmButtonColor: '#3085d6',
            confirmButtonText: 'OK'
        });
        @endif

        // Check for error message to display
        @if(session('error'))
        Swal.fire({
            title: 'Error!',
            text: '{{ session('error') }}',
            icon: 'error',
            confirmButtonColor: '#3085d6',
            confirmButtonText: 'OK'
        });
        @endif
    </script>
@endsection
