<!-- menampilkan index rental -->
@extends('template.masteer')

@section('judul','Data-rental')

@section('content')
<div class="content-wrapper">
   <section class="content">
      <div class="container">
         <div class="row">
            <div class="col-12">
               <div class="card">
                  <div class="card-header bg-success">
                     <h4 class="card-title" >Data Rental</h4>
                  </div>
                  <div class="card-body">
                  <a class="btn btn-warning mb-3" href="{{ url('add-rental')}}" role="button"><i class="fas fa-add"></i> Tambah Data</a>
                     <table id="example1" class="table table-bordered table-striped">
                        <thead>
                           <tr class="bg-info">
                              <th>Id</th>
                              <th>No</th>
                              <th>Nama Barang</th>
                              <th>Nama Penyewa</th>
                              <th>Harga Sewa</th>
                              <th>Jumlah Sewa</th>
                              <th> Keterangan</th>
                              <th>Aksi</th>
                           </tr>
                        </thead>
                        <tbody>
                           @foreach ($data as $row)
                           <tr>
                              <td>{{ $loop->iteration }}</td>
                              <td>{{ $row->id_barang }}</td>
                              <td>{{ $row->nama_barang }}</td>
                              <td>{{ $row->nama_penyewa }}</td>
                              <td>{{ $row->harga_sewa }}</td>
                              <td>{{ $row->jumlah_sewa }}</td>
                              <td>{{ $row->keterangan }}</td>
                              <td>
                                 <a class="btn btn-success btn-sm" href="{{ url('edit-rental')}}/{{ $row->id_barang }}/edit" role="button"><i class="fas fa-add"></i> Update </a>
                                    <form action=" {{ route('delete.rental', $row->id_barang) }}" method="post" class="d-inline">
                                 @csrf
                                 @method('delete')
                                 <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus data?')">Hapus</button>
                                    </form>
                                 </td>
                           </tr>
                           @endforeach
                        </tbody>
                     </table>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </section>
</div>
@endsection