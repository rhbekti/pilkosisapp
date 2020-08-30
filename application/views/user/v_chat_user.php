<div class="container-fluid">
<audio id="notif_audio"><source src="<?php echo base_url('sounds/notify.ogg');?>" type="audio/ogg"><source src="<?php echo base_url('sounds/notify.mp3');?>" type="audio/mpeg"><source src="<?php echo base_url('sounds/notify.wav');?>" type="audio/wav"></audio>
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="h3 mb-4 text-gray-800"><?= $judul; ?></h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= site_url('/Dashboard'); ?>">Beranda</a></li>
                        <li class="breadcrumb-item active"><?= $judul ?></li>
                        
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <div class="row">
        <div class="col-12 col-md-8">
        <div id="notif"></div>
            <div class="card shadow">
                <div class="card-body overflow-auto" style="height: 60vh;" id="chatku">
                <!-- untuk chat -->
                </div>
                <div class="card-footer bg-primary">
                    
                        <div class="form-group">
                            <div class="input-group mb-3">
                                <input type="hidden" name="total" id="total-pesan">
                                <input type="hidden" name="nama" value="<?=$user['id'];?>" id="nama">
                                <input type="text" name="pesan" class="form-control" placeholder="ketik pesan..." id="pesan">
                                <div class="input-group-append">
                                    <button class="btn btn-success" type="button" id="tombol-kirim">Kirim</button>
                                </div>
                            </div>
                        </div>
                   
                </div>
            </div>
        </div>
        <div class="col-12 col-md-4">
            <div class="card shadow">
                <div class="card-header">
                    <h5 class="font-weight-bold">User</h5>
                </div>
                <div class="card-body overflow-auto" style="height: 60vh;">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th>&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody id="tbluser">
                           
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
</div>