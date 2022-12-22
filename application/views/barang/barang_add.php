<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('dist/_partials/header');
?>
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Data Barang</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
              <div class="breadcrumb-item"><a href="#">Modules</a></div>
              <div class="breadcrumb-item">Data Barang</div>
            </div>
          </div>

          <div class="section-body">
            

            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Tambah Barang</h4>
                  </div>
                  <?= form_open_multipart("barang/add_save") ?>
                  <div class="card-body">

                  <div class="form-group">
                      <label>Nama Barang</label>
                      <input type="text" class="form-control" id="nama_barang" name="nama_barang">
                    </div>

                    <div class="form-group">
                      <label>Harga Barang</label>
                      <input type="text" class="form-control" id="harga_barang" name="harga_barang">
                    </div>

                    <div class="form-group">
                      <label>Gambar</label>
                      <input type="file" class="form-control" id="gambar" name="gambar">
                    </div>
                


                  </div>

                  <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                  </div>
                  <?= form_close(); ?> 
                </div>
              </div>
            </div>
            
          </div>
        </section>
      </div>
<?php $this->load->view('dist/_partials/footer'); ?>