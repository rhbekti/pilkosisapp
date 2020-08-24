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
            <div class="row" id="kartu-kandidat">
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

      
