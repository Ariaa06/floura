<div id="layoutSidenav_content">
  <main>
    <div class="container-fluid px-4">
      <h1 class="mt-4">Edit Gaji</h1>
      <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="<?=base_url('home/dashboard')?>">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="<?=base_url('home/gaji')?>">Back</a></li>
      </ol>
      <div class="container mt-3">
        <form action="<?= base_url('home/aksi_edit_gaji') ?>" method="POST">
          <div class="mb-3 mt-3">
            <label for="inputText" class="col-sm-2 col-form-label">nama</label>
            <div class="col-sm-10">
              <input type="text" required class="form-control" name="nama" value="<?= $satu->nama ?>">
            </div>
          </div>
          <div class="mb-3">
            <label for="inputText" class="col-sm-2 col-form-label">gaji</label>
            <div class="col-sm-10">
              <input type="int" required class="form-control" name="gaji" value="<?= $satu->gaji ?>">
            </div>
          </div>
          <div class="row mb-3">
            <label class="col-sm-2 col-form-label"></label>
            <div class="col-sm-10">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
          </div>

          <input type="hidden" name="id" value="<?= $satu->id_gaji ?>">
        </form>
      </div>
    </div>
  </main>