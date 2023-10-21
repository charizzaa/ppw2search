@extends('master')
@section('body')
	<div class="container">
		<div class="d-flex flex-row justify-content-between mb-3">
			<h3>
				<b>Data Buku Dummy</b>
			</h3>
			<form action="{{ route('buku.search') }}" method="GET">
				@csrf
				<input type="text" name="kata" class="form-control" placeholder="Cari ..." style="">
			</form>
			<button type="button" class="btn btn-primary">
				<a href="{{ route('buku.create') }}" class="btn_link">
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
			<th>id</th>
			<th>Judul Buku</th>
			<th>Penulis</th>
			<th>Harga</th>
			<th>Tgl. Terbit</th>
			<th>Aksi</th>
		</tr>
	</thead>
	<tbody>
		@foreach ($data_buku as $buku)
		<tr>
				<td class="text-center">{{ $buku->id }}</td>
				<td>{{ $buku->judul }}</td>
				<td>{{ $buku->penulis }}</td>
				<td>{{ "Rp ". number_format($buku->harga, 2, ',', '.') }}</td>
				<td>{{ date('d/m/Y', strtotime($buku->tgl_terbit)) }}</td>
				<td>
					<div class="d-flex flex-row justify-content-center">
						<button class="btn btn-success me-1">
							<a href="{{ route('buku.show',$buku->id) }}" class="btn_link">Detail</a>
						</button>
						<form action="{{ route('buku.update', $buku->id) }}" method="post">
							@csrf
							<button class="btn btn-warning me-1">
								<a href="{{ route('buku.update',$buku->id) }}" class="btn_link">Update</a>
							</button>
						</form>
						<form action="{{ route('buku.destroy', $buku->id) }}" method="post">
							@csrf
							<button onClick="return confirm('Yakin mau dihapus?')" class="btn btn-danger me-1">
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