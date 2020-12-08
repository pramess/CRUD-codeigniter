          <!-- Icon Cards-->
          <div class="row">
            <div class="col-xl-3 col-sm-6 mb-3">
              <div class="card text-white bg-info o-hidden h-100">
                <div class="card-body">
                  <div class="card-body-icon">
                    <i class="fas fa-fw fa-book"></i>
                  </div>
                  <div class="mr-5">    <?php echo $this->M_perpus->get_data('buku')->num_rows(); ?>  Jumlah Buku yang terdaftar</div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="<?php echo base_url().'admin/buku' ?>">
                  <span class="float-left">View Details</span>
                  <span class="float-right">
                    <i class="fas fa-angle-right"></i>
                  </span>
                </a>
              </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-3">
              <div class="card text-white bg-warning o-hidden h-100">
                <div class="card-body">
                  <div class="card-body-icon">
                    <i class="fas fa-fw fa-user"></i>
                  </div>
                  <div class="mr-5"><?php echo $this->M_perpus->get_data('anggota')->num_rows(); ?> Jumlah Anggota yang Terdaftar</div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="<?php echo base_url().'admin/anggota' ?>">
                  <span class="float-left">View Details</span>
                  <span class="float-right">
                    <i class="fas fa-angle-right"></i>
                  </span>
                </a>
              </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-3">
              <div class="card text-white bg-success o-hidden h-100">
                <div class="card-body">
                  <div class="card-body-icon">
                    <i class="fas fa-fw fa-undo"></i>
                  </div>
                  <div class="mr-5"><?php echo $this->M_perpus->edit_data(array('status_peminjaman'=>0),'transaksi')->num_rows(); ?> Peminjaman Belum Selesai</div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="<?php echo base_url().'admin/peminjaman' ?>">
                  <span class="float-left">View Details</span>
                  <span class="float-right">
                    <i class="fas fa-angle-right"></i>
                  </span>
                </a>
              </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-3">
              <div class="card text-white bg-danger o-hidden h-100">
                <div class="card-body">
                  <div class="card-body-icon">
                    <i class="fas fa-fw fa-check"></i>
                  </div>
                  <div class="mr-5"><?php echo $this->M_perpus->edit_data(array('status_peminjaman'=>1),'transaksi')->num_rows(); ?> Peminjaman Sudah Selesai</div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="<?php echo base_url().'admin/peminjaman' ?>">
                  <span class="float-left">View Details</span>
                  <span class="float-right">
                    <i class="fas fa-angle-right"></i>
                  </span>
                </a>
              </div>
            </div>
          </div>

              <hr>

              <div class="row">
                <div class="col-lg-4">
                  <div class="card-header">
                    <div class="card-heading">
                      <h3 class="card-title" style="font-size:18px;font-weight:bold;"><i class="fas fa-book"></i>  Buku</h3>
                    </div>
                        <div class="card-body">
                          <div class="list-group">
                            <?php foreach ($buku as $b) { ?>
                              <span class="list-group-item">
                                <?php echo $b->judul_buku; ?>
                                <div class="text-right "><?php if($b->status_buku==1){echo'<i class="badge badge-info ">Tersedia</i>';} else{echo '<i class="badge badge-warning">Sedang Dipinjam</i>';} ?></div>

                              </span>
                            <?php } ?>
                          </div>
                        </div>
                           <center> <a href="<?php echo base_url().'admin/buku' ?>">Lihat Semua Buku <i class="glyphicon glyphicon-arrow-right"></i></a></center>
                        </div>
                      </div>
                  

                    <div class="col-lg-4">
                      <div class="card-header">
                        <div class="card-heading">
                          <h3 class="panel-title" style="font-size:18px;font-weight:bold;"><i class="fas fa-users"></i>  Anggota Terbaru</h3>
                        </div>
                            <div class="card-body">
                              <div class="list-group">
                                <?php foreach ($anggota as $a) { ?>
                                  <a  class="list-group-item">
                                      <i class="glyphicon glyphiconuser"></i><?php echo $a->nama_anggota; ?>
                                    <div class=" text-right"><?php echo'<i class="badge badge-info">'.$a->gender.'</i>'; ?></div>
                                  
                                  </a>
                                <?php } ?>
                              </div>
                            </div>
                              <div class="text-right">
                               <center> <a  href="<?php echo base_url().'admin/anggota' ?>"> Lihat Semua Anggota <i class="glyphicon glyphicon-arrow-right"></i></a></center>
                              </div>
                            </div>
                          </div>
                        

                        <div class="col-lg-4">
                          <div class="card-header">
                          <div class="card-heading">
                            <h3 class="panel-title" style="font-size:18px;font-weight:bold;"><i class="fas fa-table"></i> Riwayat Transaksi</h3>
                            </div>
                             <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                                    <tr>
                                      <th>Tgl. Transaksi</th>
                                      <th>Total Denda</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    <?php
                                    foreach ($transaksi as $p) {
                                      ?>
                                      <tr>
                                        <td><?php echo date('d/m/Y',strtotime($p->tgl_pencatatan)); ?></td>
                                        <td><?php echo "Rp. ".number_format($p->total_denda)." ,-"; ?></td>
                                      </tr>
                                    <?php } ?>
                                  </tbody>
                                </table>
                              </div>
                            </div>
                                    <div class="text-right">
                                     <center> <a href="<?php echo base_url().'admin/transaksi' ?>">Lihat Semua Transaksi <i class="glyphicon glyphicon-arrow-right"></i></a> </center>
                                    </div>
                                  </div>
                                </div>

                                    <!-- /.row -->
                                  </div>
