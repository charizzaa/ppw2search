@extends('master')
@section('body')
	<div class="container">
		<div class="d-flex flex-row justify-content-between mb-3">
			@if (count($data_buku_cari))
			    <div>Ditemukan <strong>{{ count($data_buku_cari) }}</strong> buah data, dengan kata kunci <strong>{{ $cari }}</strong></div>
			    <a href="/buku">Kembali</a>
			@else
				<div class="alert alert-warning">Data dengan kata kunci <strong>{{ $cari }}</strong> tidak ditemukan</div>
				<a href="/buku">Kembali</a>
			@endif
			<form action="{{ route('buku.search') }}" method="GET">
				@csrf
				<input type="text" name="kata" class="form-control" placeholder="Cari ..." style="">
			</form>
			<button type="button" class="btn btn-primary">
					<a href="{{ route('buku.create') }}">
						<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-square me-2" viewBox="0 0 16 16">
							<path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
							<path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
					</svg>
					Tambah buku
				</a>
			</button>
		</div>
		@if (Session::has('message'))
		    <div class="alert alert-success">{{ Session::get('message') }}</div>
		@endif
		<table border="1px" class="table table-bordered">
			<thead class="table-dark text-center">
				<tr>
				<th>No</th>
				<th>Judul Buku</th>
				<th>Penulis</th>
				<th>Harga</th>
				<th>Tgl. Terbit</th>
				<th>Aksi</th>
			</tr>
		</thead>
		<tbody>
			@foreach ($data_buku_cari as $buku)
			<tr>
					<td class="text-center">{{ $loop->iteration }}</td>
					<td>{{ $buku->judul }}</td>
					<td>{{ $buku->penulis }}</td>
					<td>{{ "Rp ". number_format($buku->harga, 2, ',', '.') }}</td>
					<td>{{ date('d/m/Y', strtotime($buku->tgl_terbit)) }}</td>
					<td>
						<div class="d-flex flex-row justify-content-center">
							<button class="btn btn-success me-1">
								<a href="{{ route('buku.show',$buku->id) }}" >Detail</a>
							</button>
							<button class="btn btn-warning me-1">
								<a href="{{ route('buku.update',$buku->id) }}" >Update</a>
							</button>
							<form action="{{ route('buku.destroy', $buku->id) }}" method="post">
								@csrf
								<button onClick="return confirm('yakin mau dihapus?')" class="btn btn-danger me-1">
									Hapus
								</button>
							</form>
						</div>
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
@endsection