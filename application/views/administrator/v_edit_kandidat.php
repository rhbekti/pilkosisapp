<!-- Begin Page Content -->
<div class="container-fluid">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="h3 mb-4 text-gray-800"><?= $judul; ?></h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= site_url('/admin/Dashboard'); ?>">Beranda</a></li>
                        <li class="breadcrumb-item active"><?= $judul ?></li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <div class="row">
        <div class="col-12 col-md-8 col-sm-12">
            <div class="card">
                <div class="card-body">
                    <?= form_open_multipart('/admin/kandidat/update'); ?>
                    <div class="form_group">
                        <label for="no">No Kandidat*</label>
                        <input type="number" name="no" id=no" class="form-control" value="<?= $rs->id; ?>">
                        <small class="text-danger"><?= form_error('no'); ?></small>
                    </div>
                    <div class="row">
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label for="nama">Ketua Kandidat</label>
                                <input type="text" name="ketua" id="ketua" class="form-control" value="<?= $rs->ketua; ?>">
                                <small class="text-danger"><?= form_error('ketua'); ?></small>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label for="nama">Wakil Kandidat</label>
                                <input type="text" name="wakil" id="wakil" class="form-control" value="<?= $rs->wakil; ?>">
                                <small class="text-danger"><?= form_error('wakil'); ?></small>
                            </div>
                        </div>
                     </div>
                    <div class="form-group">
                        <label for="misi">Misi*</label>
                        <textarea name="misi" id="misi" cols="30" rows="5" class="form-control"><?= $rs->misi; ?></textarea>
                        <small class="text-danger"><?= form_error('misi'); ?></small>
                    </div>
                    <div class="form-group">
                        <label for="proker">Proker*</label>
                        <textarea name="proker" id="proker" cols="30" rows="10" class="form-control"><?= $rs->proker; ?></textarea>
                        <small class="text-danger"><?= form_error('proker'); ?></small>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-4 col-sm-12">
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label for="visi">Visi*</label>
                        <textarea name="visi" id="visi" cols="30" rows="3" class="form-control"><?= $rs->visi; ?></textarea>
                        <small class="text-danger"><?= form_error('visi'); ?></small>
                    </div>
                    <div class="form-group">
                        <label for="gambar">Foto</label>
                        <div class="card">
                            <div class="card-body">
                                <img src="<?= base_url(); ?>/uploads/images/<?= $rs->foto; ?>" alt="foto" width="80" class="img-fluid">

                            </div>
                        </div>
                        <input type="hidden" name="gambarlama" value="<?= $rs->foto; ?>">
                        <input type="file" name="gambar" id="gambar" class="form-control">
                    </div>
                </div>
            </div>
            <p><small>* Wajib di Isi</small></p>
            <button type="submit" name="simpan" class="btn btn-success">Perbarui</button>
            <a href="<?= site_url('/admin/kandidat'); ?>" class="btn btn-danger">Batal</a>
            <?= form_close(); ?>
        </div>
    </div>
</div>