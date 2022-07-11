@extends('dashboard.layouts.main')

@section('container')
  <div class="row">
    <div class="col-sm-6">
      <a class="btn btn-secondary mb-3" href="/dashboard/foods">
        <i class="fa-regular fa-chevron-left me-2"></i>
        Back
      </a>
      <div class="card">
        <div class="card-body">
          <form action="/dashboard/foods" method="post">
            @csrf
            <div class="mb-3">
              <label for="name" class="form-label">Nama Makanan</label>
              <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" required autofocus>
              @error('name')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
            </div>

            <div class="mb-3">
              <label for="weight" class="form-label">Berat(gr)</label>
              <input type="text" class="form-control @error('weight') is-invalid @enderror" id="weight" name="weight" required>
              @error('weight')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
            </div>

            <div class="mb-3">
              <label for="calories" class="form-label">Kalori</label>
              <input type="text" class="form-control @error('calories') is-invalid @enderror" id="calories" name="calories" required>
              @error('calories')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
            </div>
            <div class="text-end">
              <button type="submit" class="btn btn-dark px-4">Create</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection
