<a href="{{ route('index') }}" class="btn btn-dark">Back</a>
@if (session('status'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('status') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
@if (session('update_status'))
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        {{ session('update_status') }}
        <button type="but   ton" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
@if (session('delete_status'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session('delete_status') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
<div class="row mt-4">
    <div class="col">
        <div class="table-responsive">
            <table class="table table-dark table-hover">
                <thead>
                    <tr>
                        <th class="">ID</th>
                        <th class="h6">FIRST NAME</th>
                        <th class="h6">LAST NAME</th>
                        <th class="h6">EMAIL</th>
                        <th class="h6">MOBILE</th>
                        <th class="h6">STATUS</th>
                        <th class="h6">TYPE</th>
                        <th class="h6">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data['Blogs'] as $d)
                        <tr class="">
                            <td scope="row">{{ $d->id }}</td>
                            <td>{{ $d->first_name }}</td>
                            <td>{{ $d->last_name }}</td>
                            <td>{{ $d->email }}</td>
                            <td>{{ $d->mobile }}</td>
                            @php
                                $bgcolor = '';
                                switch ($d->status) {
                                    case 'active':
                                        $bgcolor = 'bg-success';
                                        break;
                                    case 'in-active':
                                        $bgcolor = 'bg-danger';
                                        break;
                                    case 'pending':
                                        $bgcolor = 'bg-warning';
                                        break;
                                    default:
                                        $bgcolor = 'bg-success';
                                        break;
                                }
                            @endphp
                            <td><a href="" class="btn {{ $bgcolor }}">{{ $d->status }}</a>
                            </td>
                            <td>{{ $d->type }}</td>
                            <td><a href="{{ route('edit', ['id' => base64_encode($d->id)]) }}"><i
                                        class="text-success bi bi-pencil-square"></i></a>
                                <a href="{{ route('delete', ['id' => base64_encode($d->id)]) }}"><i
                                        class="text-danger bi bi-trash3"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="d-flex justify-content-center">{{ $data['Blogs']->links() }}</div>
        </div>
    </div>
</div>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        setTimeout(function() {
            document.querySelectorAll('.alert').forEach(alert => {
                alert.classList.remove('show');
                alert.classList.add('fade');
            });
        }, 3000);
    });
</script>
