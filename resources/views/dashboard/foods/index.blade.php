@extends('dashboard.layouts.main')

@section('container')
  <div class="container px-0">
    <div class="row pt-3">
      <div class="col-lg-9">
        <a class="btn btn-dark" href="/dashboard/foods/create">
          <i class="fa-regular fa-plus me-2"></i>
          Add New
        </a>
      </div>
      <div class="row">
        <div class="col-sm-6 col-lg-12">
          @if (session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show mb-0 mt-3" role="alert">
              {{ session('success') }}
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
          @endif
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col">
        <div class="card my-3">
          <div class="card-body">
            <table id="myTable" class="table responsive nowrap table-bordered table-striped align-middle" style="width:100%">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Nama Makanan</th>
                  <th>Berat(gr)</th>
                  <th>Kalori</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($foods as $food)
                  <tr>
                    <td>{{ $food->id }}</td>
                    <td>{{ $food->name }}</td>
                    <td>{{ $food->weight }}</td>
                    <td>{{ $food->calories }}</td>
                    <td>
                      <a class="btn btn-sm btn-warning" href="foods/{{ $food->id }}/edit">
                        <i class="fa-regular fa-pen-to-square"></i>
                      </a>
                      <a class="btn btn-sm btn-danger" href="#modalDelete{{ $loop->iteration }}" data-bs-toggle="modal">
                        <i class="fa-regular fa-trash-can"></i>
                      </a>
                    </td>
                  </tr>

                  {{-- Modal Delete --}}
                  <div class="modal fade" id="modalDelete{{ $loop->iteration }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Delete Member</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="/dashboard/foods/{{ $food->id }}" method="post">
                          @method('delete')
                          @csrf
                          <div class="modal-body">
                            <p class="fs-6">Are you sure want to delete reservation <b>{{ '#' . $food->id }}</b> ?</p>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-outline-danger">Delete</button>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                  {{-- End Modal Delete --}}
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
