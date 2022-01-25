@if (session('success') == 'store')
 <div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Berhasil Simpan!</strong> Data Telah Berhasil Disimpan.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
 @endif

 @if (session('success') == 'update')
 <div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Berhasil di Update!</strong> Data Telah Berhasil Diupdate.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
 @endif

 @if (session('success') == 'destroy')
 <div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Berhasil di Hapus!</strong> Data Telah Berhasil Dihapus.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
 @endif