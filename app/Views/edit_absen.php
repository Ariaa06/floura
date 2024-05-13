<div id="layoutSidenav_content">
  <main>
    <div class="container-fluid px-4">
      <h1 class="mt-4">Edit Absen</h1>
      <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="<?=base_url('home/dashboard')?>">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="<?=base_url('home/absen')?>">Back</a></li>
      </ol>
      <div class="container mt-3">
        <form action="<?= base_url('home/aksi_edit_absen') ?>" method="POST">
          <div class="mb-3 mt-3">
            <label for="inputText" class="col-sm-2 col-form-label">nama</label>
            <div class="col-sm-10">
              <input type="text" required class="form-control" name="nama" value="<?= $satu->nama ?>">
            </div>
          </div>
          <div class="mb-3">
            <label for="inputText" class="col-sm-2 col-form-label">tanggal</label>
            <div class="col-sm-10">
              <input type="date" required class="form-control" name="tanggal" value="<?= $satu->tanggal ?>">
            </div>
          </div>
          <div class="mb-3">
            <label for="inputText" class="col-sm-2 col-form-label">jam masuk</label>
            <div class="col-sm-10">
              <input type="text" required class="form-control" name="jam_masuk" value="<?= $satu->jam_masuk ?>">
            </div>
          </div>
          <div class="mb-3">
            <label for="inputText" class="col-sm-2 col-form-label">jam keluar</label>
            <div class="col-sm-10">
              <input type="text" required class="form-control" name="jam_keluar" value="<?= $satu->jam_keluar ?>">
            </div>
          </div>
          <div class="row mb-3">
            <label class="col-sm-2 col-form-label"></label>
            <div class="col-sm-10">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
          </div>

          <input type="hidden" name="id" value="<?= $satu->id_absen ?>">
        </form>
      </div>
    </div>
  </main>