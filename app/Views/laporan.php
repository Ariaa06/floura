<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Print</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="<?= base_url('home/dashboard') ?>">Home</a></li>
            </ol>
            <form action="<?= base_url('home/generate_pdf') ?>" method="post">
                <label for="start_date">Start Date:</label>
                <input type="date" name="start_date" required>
                <label for="end_date">End Date:</label>
                <input type="date" name="end_date" required>
                <button type="submit" class="btn btn-primary">PDF</button>
            </form>
            <form action="<?= base_url('home/generate_excel') ?>" method="post">
                <label for="start_date">Start Date:</label>
                <input type="date" name="start_date" required>
                <label for="end_date">End Date:</label>
                <input type="date" name="end_date" required>
                <button type="submit" class="btn btn-primary">Excel</button>
            </form>
            <form action="<?= base_url('home/generate_window_result') ?>" method="post">
                <label for="start_date">Start Date:</label>
                <input type="date" name="start_date" required>
                <label for="end_date">End Date:</label>
                <input type="date" name="end_date" required>
                <button type="submit" class="btn btn-primary">Windows</button>
            </form>
        </div>
    </main>