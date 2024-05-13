<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Absen</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="<?= base_url('home/dashboard') ?>">Home</a></li>
            </ol>
            <div class="card mb-4">
                    <a href="<?= base_url('home/tambah_absen') ?>">
                        <button class="btn btn-outline-primary">Tambah</button>
                    </a>
                <div class="card-body">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">no</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Tanggal</th>
                                <th scope="col">Jam masuk</th>
                                <th scope="col">Jam keluar</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php

                            $no = 1;
                            foreach ($manda as $erwin) {
                                ?>

                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $erwin->nama ?></td>
                                    <td><?= $erwin->tanggal ?></td>
                                    <td><?= $erwin->jam_masuk ?></td>
                                    <td><?= $erwin->jam_keluar ?></td>
                                    <td>
                                            <a href="<?= base_url('home/edit_absen/' . $erwin->id_absen) ?>">
                                                <button class="">Edit</button>
                                            </a>

                                            <a href="<?= base_url('home/hapus_absen/' . $erwin->id_absen) ?>">
                                                <button class="fa-solid fa-eraser">Hapus</button>
                                            </a>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>