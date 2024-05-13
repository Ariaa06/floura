<div id="layoutSidenav_content">
  <main>
    <div class="container-fluid px-4">
      <h1 class="mt-4">Edit User</h1>
      <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="<?=base_url('home/dashboard')?>">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="<?=base_url('home/user')?>">Back</a></li>
      </ol>
      <div class="container mt-3">
        <form action="<?= base_url('home/aksi_edit_user') ?>" method="POST">
          <div class="mb-3 mt-3">
            <label for="inputText" class="col-sm-2 col-form-label">username</label>
            <div class="col-sm-10">
              <input type="text" required class="form-control" name="username" value="<?= $satu->username ?>">
            </div>
          </div>
          <div class="mb-3">
            <label for="inputText" class="col-sm-2 col-form-label">password</label>
            <div class="col-sm-10">
              <input type="int" required class="form-control" name="pw" value="<?= $satu->pw ?>">
            </div>
          </div>
          <div class="row mb-3">
            <label class="col-sm-2 col-form-label"></label>
            <div class="col-sm-10">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
          </div>

          <input type="hidden" name="id" value="<?= $satu->id_user ?>">
        </form>
      </div>
    </div>
  </main>