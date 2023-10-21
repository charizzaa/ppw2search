@extends('master')
@section('body')
<div class="container card p-4 d-flex align-items-center">
	<h4 style="font-weight: bold">Update Data Buku</h4>
	<form method="post" action="{{ route('buku.updatedata', $buku->id) }}">
		@csrf
		<table>
			<tr>
				<td>Judul </td>
				<td><input type="text" name="judul" value="{{ $buku->judul }}"></td>
			</tr>
			<tr>
				<td>Penulis </td>
				<td><input type="text" name="penulis" value="{{ $buku->penulis }}"></td>
			</tr>
			<tr>
				<td>Harga </td>
				<td><input type="text" name="harga" value="{{ $buku->harga }}"></td>
			</tr>
			<tr>
				<td>Tanggal Terbit </td>
				<td><input type="text" id="tgl_terbit" name="tgl_terbit" class="date form-control" placeholder="yyyy/mm/dd" value="{{ $buku->tgl_terbit }}"></td>
			</tr>
		</table>
			<div class="d-flex w-100 justify-content-evenly mt-3">
				<button type="submit" class="btn btn-success" onClick="return alert('Berhasil di update')">Update</button>
				<button type="button" class="btn btn-outline-danger"><a href="/buku" style="text-decoration: none; color:red;">Batal</a></button>
			</div>
	</form>
</div>
@endsection