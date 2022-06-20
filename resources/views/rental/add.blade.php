<!-- tambah data blog-->
@extends('template.masteer')

@section('judul','tambah-data')

@section('content')
<div class="content-wrapper">
    <section class="content">
        <div class="container">
            <div class="row">
                <div class="col-6">
                    <div class="card">
                        <div class="card-header bg-primary" style="float: right;">
                            <h3 class="card-title">Tambah Data </h3>
                        </div>
                        <div class="card-body">
                            @if($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif
                            <form action="{{ route('rental.save-rental') }}" method="post">
                                @csrf
                                <div class="form-group mb-3">
                                    <label for="iidd">Id Barang </label>
                                    <input type="number" id="id" name="id_barang" class="form-control" value="{{old('id')}}" autocomplete="off" autofocus>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="at">Nama Barang</label>
                                    <input type="text" id="at" name="nama_barang" class="form-control" value="{{old('nama_barang')}}" autocomplete="off">
                                </div>
                                <div class="form-group mb-3">
                                    <label for="tl">Nama Penyewa</label>
                                    <input type="text" id="tl" name="nama_penyewa" class="form-control" value="{{old('nama_penyewa')}}" autocomplete="off">
                                </div>
                                <div class="form-group mb-3">
                                    <label for="bd">Harga sewa</label>
                                    <br>
                                    <textarea name="harga_sewa" id="bd" cols="30" rows="2" autocomplete="off">{{old('harga_sewa')}}</textarea>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="key">Jumlah Sewa</label>
                                    <input type="text" id="key" name="jumlah_sewa" class="form-control" value="{{old('jumlah_sewa')}}" autocomplete="off">
                                </div>
                                <div class="form-group mb-3">
                                    <label for="key">Keterangan</label>
                                    <input type="text" id="key" name="keterangan" class="form-control" value="{{old('keterangan')}}" autocomplete="off">
                                </div>

                                <input type="submit" class="btn btn-success" name="submit" value="Simpan Data">
                                <a class="btn btn-primary" href="{{ url('data-rental') }}" role="button">Kembali</a>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@endsection