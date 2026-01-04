@extends('layouts.admin')
@section('title', 'User')
@section('content')
<div class="pc-content">
    <div class="row">
            <div class="d-flex align-items-center gap-3 mb-3">
                <a href="{{ route('user.index') }}">
                    <button class="btn btn-outline-primary btn-sm border-1 rounded-1 px-2 py-1" data-bs-toggle="tooltip"
                        title="Kembali">
                        <i class="bi bi-arrow-left fs-5"></i>
                    </button>
                </a>
                <h5 class="mb-0">Edit User</h5>
            </div>

     
        
        <div class="card tbl-card">
            <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form action="{{ url('user-edit/' . $users->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('POST') <!-- Gunakan method PUT untuk update data -->
                        <div class="row">
                            <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">Nama Lengkap</label>
                                        <input type="text" name="name" class="form-control" value="{{ $users->name }}">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Email</label>
                                        <input type="text" name="email" class="form-control" value="{{ $users->email }}">
                                    </div>
                                    {{-- <div class="form-group position-relative">
                                        <label class="form-label">Password</label>
                                        <input type="password" name="password" id="passwordInput" class="form-control">
                                        <span class="toggle-password" onclick="togglePassword()" style="position:absolute; top:38px; right:15px; cursor:pointer;">
                                            <i id="eyeIcon" class="fas fa-eye"></i>
                                        </span>
                                    </div> --}}
                                    <div class="form-group">
                                        <label class="form-label">Jenis Kelamin</label>
                                        <select class="form-select" name="jenis_kelamin">
                                            <option value="Laki-Laki" {{ $users->jenis_kelamin == 'Laki-Laki' ? 'selected' : '' }}>Laki-Laki</option>
                                            <option value="Perempuan" {{ $users->jenis_kelamin == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                                        </select>
                                    </div>
                                    
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Username</label>
                                    <input type="text" name="username" class="form-control" value="{{ $users->username }}">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Contact</label>
                                    <input type="text" name="contact" class="form-control" value="{{ $users->contact }}">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Hak Akses</label>
                                    <select required name="role_id" class="form-select">
                                        <option value="" disabled {{ is_null($users->role_id) ? 'selected' : '' }}>Pilih Hak Akses</option>
                                        @foreach($roles as $item)
                                            <option value="{{ $item->id }}" {{ $users->role_id == $item->id ? 'selected' : '' }}>
                                                {{ $item->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                
                            </div>

                            <div class="text-end btn-page mb-0 mt-4">
                                <button class="btn btn-outline-secondary">Batal</button>
                                <button type="submit" class="btn btn-primary">Edit</button>
                            </div>
                        
                        </div>
                    </form>
            </div>
        </div>
    </div>
</div>

@include('sweetalert::alert')
@endsection
