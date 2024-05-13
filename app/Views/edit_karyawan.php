<div id="layoutSidenav_content">
  <main>
    <div class="container-fluid px-4">
      <h1 class="mt-4">Edit Karyawan</h1>
      <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="<?=base_url('home/dashboard')?>">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="<?=base_url('home/karyawan')?>">Back</a></li>
      </ol>
      <div class="container mt-3">
        <form action="<?= base_url('home/aksi_edit_karyawan') ?>" method="POST">
          <div class="mb-3 mt-3">
            <label for="inputText" class="col-sm-2 col-form-label">nama</label>
            <div class="col-sm-10">
              <input type="text" required class="form-control" name="nama" value="<?= $satu->nama ?>">
            </div>
          </div>
          <div class="mb-3">
            <label for="inputText" class="col-sm-2 col-form-label">nomor</label>
            <div class="col-sm-10">
              <input type="int" required class="form-control" name="nomor" value="<?= $satu->nomor ?>">
            </div>
          </div>
          <div class="mb-3">
            <label for="inputText" class="col-sm-2 col-form-label">jenis kelamin</label>
            <div class="col-sm-10">
              <select  type="select" class="form-control" id="jk" name="jk" value="<? $satu->jk ?>">
               <option value="<?= $satu->id_karyawan ?>">
                <?php
                if( $satu->id_karyawan==1){
                  echo "cowo";
                }else{
                  echo "cewe";
                }
                ?>

              </option>
              <option value="cowo">cowo</option>
              <option value="cewe">cewe</option>
              <option value="<?= $satu->id_karyawan ?>">

              </select>
            </div>
          </div>
          <div class="mb-3">
            <label for="inputText" class="col-sm-2 col-form-label">jabatan</label>
            <div class="col-sm-10">
              <input type="text" required class="form-control" name="jabatan" value="<?= $satu->jabatan ?>">
            </div>
          </div>
          <div class="row mb-3">
            <label class="col-sm-2 col-form-label"></label>
            <div class="col-sm-10">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
          </div>

          <input type="hidden" name="id" value="<?= $satu->id_karyawan ?>">
        </form>
      </div>
    </div>
  </main>