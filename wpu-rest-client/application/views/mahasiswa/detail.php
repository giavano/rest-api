<div class="container">
    <div class="row mt-3">
        <div class="col-md-6">

            <div class="card">
                <div class="card-header">
                    Detail Data Mahasiswa
                </div>
                <div class="card-body">
                    <h5 class="card-title"><?= $mahasiswa['firstname']; ?></h5>
                    <h5 class="card-title"><?= $mahasiswa['lastname']; ?></h5>

                    <h6 class="card-subtitle mb-2 text-muted"><?= $mahasiswa['dob']; ?></h6>
                    <p class="card-text"><?= $mahasiswa['gender']; ?></p>
                    <p class="card-text"><?= $mahasiswa['email']; ?></p>
                    <a href="<?= base_url(); ?>mahasiswa" class="btn btn-primary">Kembali</a>
                </div>
            </div>
        
        </div>
    </div>
</div>