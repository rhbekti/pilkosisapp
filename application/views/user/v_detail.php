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
             <li class="breadcrumb-item"><a href="<?= site_url('/Dashboard'); ?>">Beranda</a></li>
             <li class="breadcrumb-item active"><?= $judul ?></li>
           </ol>
         </div>
       </div>
     </div>
   </section>
   <div class="row">
     <div class="col-12">
       <div class="card shadow">
         <div class="card-body table-responsive">
           <div class="container">
             <div class="row">
               <div class="col-12 col-md-2">
                 <img src="<?= base_url('/uploads/images/') ?><?= $ketua->foto; ?>" alt="fotomu" class="img-fluid">
               </div>
               <div class="col-12 col-md-4">
                 <h5 class="font-weight-bold"><?= $ketua->nama; ?></h5>
                 <ul class="list-group list-group-flush">
                   <li class="list-group-item"><i class="fas fa-calendar"></i> <?= date('d m Y', strtotime($ketua->tgl_lahir)); ?></li>
                   <li class="list-group-item"><i class="fas fa-school"></i> <?= $ketua->namakelas; ?></li>
                   <li class="list-group-item"><i class="fas fa-map-marker-alt"></i> <?= $ketua->alamat; ?></li>
                   <li class="list-group-item"><i class="fab fa-instagram"></i> <?= $ketua->sosmed; ?></li>
                   <li class="list-group-item">Riwayat Organisasi : </li>
                   <li class="list-group-item"><i class="fas fa-user-tie"></i> <?= $ketua->riwayat; ?></li>
                 </ul>
               </div>
               <div class="col-12 col-md-4">
                 <h5 class="font-weight-bold"><?= $wakil->nama; ?></h5>
                 <ul class="list-group list-group-flush">
                   <li class="list-group-item"><i class="fas fa-calendar"></i> <?= date('d m Y', strtotime($wakil->tgl_lahir)); ?></li>
                   <li class="list-group-item"><i class="fas fa-school"></i> <?= $ketua->namakelas; ?></li>
                   <li class="list-group-item"><i class="fas fa-map-marker-alt"></i> <?= $wakil->alamat; ?></li>
                   <li class="list-group-item"><i class="fab fa-instagram"></i> <?= $wakil->sosmed; ?></li>
                   <li class="list-group-item">Riwayat Organisasi : </li>
                   <li class="list-group-item"><i class="fas fa-user-tie"></i> <?= $wakil->riwayat; ?></li>
                 </ul>
               </div>
               <div class="col-12 col-md-2">
                 <img src="<?= base_url('/uploads/images/') ?><?= $wakil->foto; ?>" alt="fotomu" class="img-fluid">
               </div>
             </div>
           </div>
           <div class="row">
             <div class="col-12 text-center mt-3">
               <h4>Visi </h4>
               <p><?=$ketua->visi;?></p>
             </div>
             <div class="col-12 text-center mt-3">
               <h4>Misi </h4>
               <p><?=$ketua->misi;?></p>
             </div>
             <div class="col-12 text-center mt-3">
               <h4>Proker </h4>
               <p><?=$ketua->proker;?></p>
             </div>
             <div class="col-12 text-center mt-3">
               <a href="<?=site_url('/Voting');?>" class="btn btn-primary float-right">Kembali</a>
             </div>
           </div>
         </div>
       </div>
     </div>
   </div>
 </div>
 <!-- /.container-fluid -->

 </div>
 <!-- End of Main Content -->
 