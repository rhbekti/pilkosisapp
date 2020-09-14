<div class="container-fluid">
  
  <div class="row">
    <div class="col-12 col-md-4">
      <div class="card shadow">
        <img src="<?= base_url('/assets/images/') ?>bk.png" class="card-img-top" alt="ilustrasi">
        <div class="card-body">
          <h5 class="card-title font-weight-bold">Hallo <?=$user['nama'];?></h5>
          <p class="card-text">Selamat Datang di Pilkosis SMK Negeri 1 Kebumen</p>
          <form action="<?=site_url('/Voting/voting_kandidat')?>" method="post">
            <input type="hidden" name="idpemilih" value="<?=$user['id'];?>">
            <button type="submit" class="btn btn-primary d-block w-100">Voting</button>
          </form>
        </div>
      </div>
    </div>
    <div class="col-12 col-md-8">
      <div class="row">
        <div class="col-12 col-md-6 mt-2">
        <div class="card shadow bg-warning">
          <div class="card-body text-center">
            <i class="fas fa-bullhorn fa-3x"></i>
            <p><?=$this->session->userdata('status');?></p>
          </div>
        </div>
      </div>
      <div class="col-12 col-md-6 mt-2">
        <div class="card shadow bg-success">
          <div class="card-body text-center text-white">
            <i class="fas fa-users fa-3x"></i>
            <h5>Total Pemilih</h5>
            <p id="totalvote">0</p>
          </div>
        </div>
      </div>
      <div class="col-12 mt-3">
        <div class="card shadow">
          <div class="card-body overflow-auto" style="height: 40vh;">
           <table class="table table-hover" id="tblinformasi">
              <thead>
                <tr>
                  <th>Informasi</th>
                  <th>&nbsp;</th>
                </tr>
              </thead>
           </table>
          </div>
        </div>
      </div>
    </div>
  </div>
  </div>
</div>
</div>
<div class="flashdata" data-aksi="<?= $this->session->flashdata('aksi'); ?>"></div>
<div class="infoaksi" data-info="<?= $this->session->flashdata('info'); ?>"></div>