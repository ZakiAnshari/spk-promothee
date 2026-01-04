@extends('layouts.admin')
@section('title', 'User')
@section('content')
    <div class="pc-content">
        <div class="row">
            <div class=" col-lg-12">
                <h5 class="mb-3">Data User</h5>
                <div class="card tbl-card">
                    <div class="card-body">
                        <div class="table-responsive">
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul class="mb-0">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <!-- Form Search -->
                                <form method="GET" class="d-flex align-items-center" style="max-width: 250px;">
                                    <div class="input-group input-group-sm">
                                        <input type="text" name="name" value="{{ $name }}" class="form-control" placeholder="Search" aria-label="Search">
                                        <button class="btn btn-outline-secondary" type="submit">
                                            <i class="bi bi-search"></i>
                                        </button>
                                    </div>
                                </form>

                                <!-- Add User Button -->
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#user-edit_add-modal">
                                    Tambah User
                                </button>
                            </div>

                            {{-- MODAL TAMBAH DATA --}}
                            <form action="{{ route('user.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="modal fade" id="user-edit_add-modal" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
                                    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="mb-0">Tambah User</h5>
                                                <a href="#" class="avtar avtar-s btn-link-danger" data-bs-dismiss="modal">
                                                    <i class="ti ti-x f-20"></i>
                                                </a>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <div class="row">
                                                            <div class="col-lg-6">
                                                                <div class="form-group">
                                                                    <label class="form-label">Nama Lengkap</label>
                                                                    <input required type="text" name="name" class="form-control" placeholder="Masukkan Nama">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="form-label">Email</label>
                                                                    <input required type="email" name="email" class="form-control" placeholder="@gmail.com">
                                                                </div>
                                                                <div class="form-group position-relative">
                                                                    <label class="form-label">Password</label>
                                                                    <input type="password" name="password" id="passwordInput" class="form-control"  placeholder="Masukkan password (min. 8 karakter)">
                                                                    <span class="toggle-password" onclick="togglePassword()" style="position:absolute; top:38px; right:15px; cursor:pointer;">
                                                                        <i id="eyeIcon" class="fas fa-eye"></i>
                                                                    </span>
                                                                </div>
                                                                
                                                                <div class="form-group">
                                                                    <label class="form-label">Jenis Kelamin</label>
                                                                    <select required name="jenis_kelamin" required class="form-select">
                                                                        <option value="">Pilih</option>
                                                                        <option value="Laki-Laki">Laki-Laki</option>
                                                                        <option value="Perempuan">Perempuan</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <div class="form-group">
                                                                    <label class="form-label">Username</label>
                                                                    <input required type="text" name="username" class="form-control" placeholder="Masukkan Username">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="form-label">Contact</label>
                                                                    <input required type="number" name="contact" class="form-control" placeholder="+62">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="form-label">Hak Akses</label>
                                                                    <select required name="role_id" class="form-select">
                                                                        <option value="">Pilih</option>
                                                                        @foreach($roles as $item)
                                                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer justify-content-between">
                                                <div class="flex-grow-1 text-end">
                                                    <button type="button" class="btn btn-link-danger" style="border: 1px solid #ccc;" data-bs-dismiss="modal">Batal</button>
                                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                                                    
                            {{-- TABLE --}}
                            <table class="table table-hover table-bordered align-middle text-nowrap mb-0">
                                <thead class="table-light">
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Lengkap</th>
                                        <th>Contact</th>
                                        <th>Hak Akses</th>
                                        <th style="width: 80px; text-align: center;">Aksi</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($users  as $index => $item)
                                    <tr>
                                        <td>{{ $users->firstItem() + $index }}</td>
                                        <td>
                                            <div class="row">
                                                <div class="col-auto pe-0">
                                                    @if($item->jenis_kelamin === 'Perempuan')
                                                        <img src="{{ asset('BackEnd/dist/assets/images/user/avatar-9.jpg') }}" alt="user-image"
                                                            class="wid-40 rounded-circle">
                                                    @else
                                                        <img src="{{ asset('BackEnd/dist/assets/images/user/avatar-2.jpg') }}" alt="user-image"
                                                            class="wid-40 rounded-circle">
                                                    @endif
                                                </div>
                                                
                                                <div class="col">
                                                    <h5 class="mb-0">{{ $item->name }}</h5>
                                                    <p class="text-muted f-12 mb-0">{{ $item->email }}</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td>{{ $item->contact }}</td>
                                        <td>  
                                            <span class="d-flex align-items-center gap-2">
                                                <i class="fas fa-circle {{ $item->id === Auth::id() ? 'text-success' : 'text-danger' }} f-10"></i>
                                                {{ $item->role->name ?? 'Role Tidak Ditemukan' }}
                                            </span>
                                        </td>
                                        <td class="text-center">
                                            <ul class="list-inline me-auto mb-0">
                                                <li class="list-inline-item align-bottom" style="border: 1px solid #ccc;" data-bs-toggle="tooltip" title="View">
                                                    <a href="user-show/{{ $item->id }}" class="avtar avtar-xs btn-link-secondary show-user"

                                                    data-bs-target="#user-modal">
                                                    <i class="ti ti-eye f-18"></i>
                                                    </a>
                                                </li>
                                                
                                                <li class="list-inline-item align-bottom" style="border: 1px solid #ccc;" data-bs-toggle="tooltip" title="Edit">
                                                    <a href="user-edit/{{ $item->id }}" class="avtar avtar-xs btn-link-primary">
                                                    <i class="ti ti-edit-circle f-18"></i>
                                                    </a>
                                                </li>
                                                <li class="list-inline-item align-bottom" style="border: 1px solid #ccc;" data-bs-toggle="tooltip" title="Delete">
                                                    <a href="javascript:void(0);" 
                                                       class="avtar avtar-xs btn-link-danger" 
                                                       onclick="confirmDeleteUser({{ $item->id }}, @js($item->name))">
                                                        <i class="ti ti-trash f-18"></i>
                                                    </a>
                                                </li>
                                            </ul>
                                        </td>
                                        
                                        
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="8" class="text-center">Data Kosong</td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                            <!-- Pagination -->
                            <div class=" justify-content-end mt-3">
                                {{ $users->appends(request()->input())->links('pagination::bootstrap-5') }}
                            </div>
                            
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
