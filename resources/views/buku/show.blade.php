@extends('master')
@section('body')
	<div class="container w-50 card p-4 d-flex align-items-center">
		<h4 style="font-weight: bold">Detail Buku</h4>
		<table class="table table-bordered">
			<tr>
				<td>Judul Buku</td>
				<td>{{ $buku->judul }}</td>
			</tr>
			<tr>
				<td>Penulis </td>
				<td>{{ $buku->penulis }}</td>
			</tr>
			<tr>
				<td>Harga </td>
				<td>{{ $buku->harga }}</td>
			</tr>
			<tr>
				<td>Tanggal Terbit </td>
				<td>{{ $buku->tgl_terbit }}</td>
			</tr>
		</table>
		<button type="button" class="btn btn-outline-danger"><a href="/buku" style="text-decoration: none; color:red;">Batal</a></button>
	</div>
@endsection