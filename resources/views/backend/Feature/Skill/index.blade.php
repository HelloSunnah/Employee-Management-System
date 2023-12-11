@extends('backend.master')
@section('content')
    <!--start content-->
    <main class="page-content">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <div class="border p-3 rounded" style="margin-top: 20px;">
                            <form class="row g-3" id="myForm">
                                @csrf
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label class="form-label">Skill<span style="color:red;"></span></label>
                                            <input type="text" class="form-control" name="name">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="d-grid">
                                        <button type="submit" onclick="skillSubmit()"
                                            class="btn btn-primary">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-2"></div>
        </div>

        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-10">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <center>
                                <h3>Skill List</h3>
                            </center>
                            <table id="myTable" class="table table-hover" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>Sl</th>
                                        <th>Skill</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($skills as $key => $skill)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $skill->name }}</td>
                                            <td><button onclick="deleteItem({{ $skill->id }})" class=" btn btn-danger">
                                                    Delete
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-1"></div>
        </div>
    </main>
    <script>
        function skillSubmit() {
            $.ajax({
                type: "POST",
                url: "{{ route('skill.store') }}",
                data: $("#myForm").serialize(),
                success: function(response) {
                    console.log(response);
                },
                error: function(error) {
                    console.log(error);
                }
            });
        }

        function deleteItem(itemId) {
            console.log(itemId)
            if (confirm('Are you sure you want to delete this item?')) {
                var csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

                $.ajax({
                    type: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': csrfToken
                    },
                    url: `{{ route('skill.destroy', ':id') }}`.replace(':id', itemId),
                    success: function(response) {
                        location.reload();
                    },
                    error: function(error) {
                        console.error('Error deleting item:', error);
                    }
                });
            }
        }
    </script>
@endsection
