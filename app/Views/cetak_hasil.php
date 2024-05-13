<!-- cetak_hasil.php -->
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Print Result</h1>
            <table class="table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>nama</th>
                        <th>tanggal</th>
                        <th>jam masuk</th>
                        <th>jam keluar</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($formulir as $key => $row) { ?>
                        <tr>
                            <td><?= $key + 1 ?></td>
                            <td><?= $row->nama ?></td>
                            <td><?= $row->tanggal ?></td>
                            <td><?= $row->jam_masuk ?></td>
                            <td><?= $row->jam_keluar ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </main>
</div>
