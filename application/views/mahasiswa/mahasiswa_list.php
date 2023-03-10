<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('dist/_partials/header');
?>
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Data Mahasiswa</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
              <div class="breadcrumb-item"><a href="#">Modules</a></div>
              <div class="breadcrumb-item">Mahasiswa</div>
            </div>
          </div>

          <div class="section-body">
            

            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>List Daftar Mahasiswa</h4>
                  </div>
                  <div class="card-body">

            <!-- -- Tambah Button -->
                  <div class="button">
                        <a href ="barang/add" class="btn btn-primary">Tambah Mahasiswa</a>
                  </div>
            <br>
            <!-- -------- -->

                    <div class="table-responsive">
                      <table class="table table-striped" id="table-1">
                        <thead>                                 
                          <tr>
                            
                            <th>NIM</th>
                            <th>Nama</th>
                            <th>Jenis Kelamin</th>
                            <th>Alamat</th>
                            <th>Action</th>
                            
                          </tr>
                        </thead>
                        <tbody>                                 
                          <?php foreach ($mahasiswa as $row): ?>
                              <tr>
                                    <td><?= $row->nim; ?></td>
                                    <td><?= $row->nama; ?></td>
                                    <td><?= $row->jenis_kelamin; ?></td>
                                    <td><?= $row->alamat; ?></td>

                                    <!-- tambah kolom untuk action -->
                                    <td>
                                          <a href ="mahasiswa/edit/<?= $row->nim; ?>" class="btn btn-warning">Edit</a>
                                          <a href ="mahasiswa/hapus/<?= $row->nim; ?>" class="btn btn-danger">Hapus</a>

                                    </td>
                                    <!-- -------- -->


                              </tr>
                              <?php endforeach; ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            
          </div>
        </section>
      </div>
<?php $this->load->view('dist/_partials/footer'); ?>