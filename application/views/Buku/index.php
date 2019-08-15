<!-- Main content -->
<section class="content">
	<div class="box box-primary">
		<div class="box-header">
			<h3 class="box-title">List Buku</h3>
		</div>
		<!-- /.box-header -->
		<div class="box-body">
			<div style="padding-bottom: 10px;">
				<?php // echo anchor(site_url('buku/create'), '<i class="fa fa-wpforms" aria-hidden="true"></i> Tambah Buku', 'class="btn btn-default btn-sm"'); ?>
				<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-tambah">
                	Tambah Buku
              	</button>
				<button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-export">
                	Export to Excel
              	</button>
			</div>
			<table id="example1" class="table table-bordered table-striped">
			<thead>
			<tr>
				<th>No</th>
				<th>Judul Buku</th>
				<th>Tahun</th>
				<th>Jenis Buku</th>
				<th>Sumber Dana</th>
				<th>Action</th>
			</tr>
			</thead>
			<tbody>
			<?php
				$i=1;
				foreach($buku as $bk){
					$jenisBuku = $this->Model_jenisbuku->getWhere($bk['id_jenis_buku']);
					$sumberDana = $this->Model_sumberdana->getWhere($bk['id_sumber_dana']);
					echo "<tr>
							<td>".$i++."</td>
							<td>".$bk['nama_buku']."</td>
							<td>".$bk['tahun']."</td>
							<td>".$jenisBuku[0]['nama_jenis_buku']."</td>
							<td>".$sumberDana[0]['nama_sumber_dana']."</td>
							<td><a class='btn-sm btn-primary' data-toggle='modal' data-target='#modal-update-".$bk['id_buku']."'>
									<i class='fa fa-edit'></i>
								</a>
								&nbsp;".
								anchor('buku/delete/'.$bk['id_buku'],'<i class="fa fa-trash"></i>','class="btn-sm btn-danger" title="Hapus" onClick="if(!confirm(`Apakah Anda Yakin Menghapus '. $bk['nama_buku'] .' ?`)){return false;}"')
							."</td>
						</tr>";
				}
			
			?>
			</tbody>
			<tfoot>
			<tr>
				<th>No</th>
				<th>Judul Buku</th>
				<th>Tahun</th>
				<th>Jenis Buku</th>
				<th>Sumber Dana</th>
				<th>Action</th>
			</tr>
			</tfoot>
			</table>
		</div>
		<!-- /.box-body -->
	</div>

	<!-- modal tambah buku -->
	<div class="modal fade" id="modal-tambah">
		<div class="modal-dialog">
			<div class="modal-content">
				<form action="<?php echo base_url() ?>buku/create" method="post">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title">Tambah Buku</h4>
					</div>
					<div class="modal-body">
						<div class="box-body">
							<div class="form-group">
								<label for="judulBuku">Judul Buku</label>
								<input type="text" class="form-control" name="judulBuku" id="judulBuku" placeholder="Masukkan Judul Buku">
							</div>
							<div class="form-group">
								<label for="tahun">Tahun</label>
								<input type="number" min="1900" max="2099" class="form-control" name="tahun" id="tahun" placeholder="Masukkan Tahun Buku">
							</div>
							<div class="form-group">
								<label for="tahun">Jenis Buku</label>
								<select name="jenisbuku" id="jenisbuku" class="form-control">
									<option selected disabled>--Pilih Jenis Buku--</option>
									<?php
									
										foreach($jenisbuku as $jb){
											echo '<option value="'.$jb["id_jenis_buku"].'">'.$jb["nama_jenis_buku"].'</option>';
										}
									
									?>
								</select>
							</div>
							<div class="form-group">
								<label for="tahun">Sumber Dana</label>
								<select name="sumberdana" id="sumberdana" class="form-control">
									<option selected disabled>--Pilih Sumber Dana--</option>
									<?php
									
										foreach($sumberdana as $sd){
											echo '<option value="'.$sd["id_sumber_dana"].'">'.$sd["nama_sumber_dana"].'</option>';
										}
									
									?>
								</select>
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<button  class="btn btn-default pull-left" data-dismiss="modal">Tutup</button>
						<button  class="btn btn-primary">Simpan</button>
					</div>
				</form>
			</div>
			<!-- /.modal-content -->
		</div>
		<!-- /.modal-dialog -->
	</div>

	<!-- modal export buku -->
	<div class="modal fade" id="modal-export">
		<div class="modal-dialog">
			<div class="modal-content">
				<form action="<?php echo base_url() ?>buku/export" method="post">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title">Export to Excel</h4>
					</div>
					<div class="modal-body">
						<div class="box-body">
							<div class="form-group">
								<label for="tahun">Tahun</label>
								<select name="tahun" id="tahun" class="form-control">
									<option value="semua">--Semua--</option>
									<?php
									
										$tahun = $this->Model_buku->getDistinctTahun();
										foreach($tahun as $thn){
											echo '<option value="'.$thn["tahun"].'">'.$thn["tahun"].'</option>';
										}
									
									?>
								</select>
							</div>
							<div class="form-group">
								<label for="tahun">Jenis Buku</label>
								<select name="jenisbuku" id="jenisbuku" class="form-control">
									<option value="semua">--Semua--</option>
									<?php
									
										foreach($jenisbuku as $jb){
											echo '<option value="'.$jb["id_jenis_buku"].'">'.$jb["nama_jenis_buku"].'</option>';
										}
									
									?>
								</select>
							</div>
							<div class="form-group">
								<label for="tahun">Sumber Dana</label>
								<select name="sumberdana" id="sumberdana" class="form-control">
									<option value="semua">--Semua--</option>
									<?php
									
										foreach($sumberdana as $sd){
											echo '<option value="'.$sd["id_sumber_dana"].'">'.$sd["nama_sumber_dana"].'</option>';
										}
									
									?>
								</select>
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<button  class="btn btn-default pull-left" data-dismiss="modal">Tutup</button>
						<button name="export" class="btn btn-primary">Export</button>
					</div>
				</form>
			</div>
			<!-- /.modal-content -->
		</div>
		<!-- /.modal-dialog -->
	</div>

	<!-- modal edit buku -->
	<?php
	
		foreach($buku as $bk){
	
	?>
		<div class="modal fade" id="modal-update-<?= $bk['id_buku'] ?>">
			<div class="modal-dialog">
				<div class="modal-content">
					<form action="<?php echo base_url() ?>buku/update" method="post">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span></button>
							<h4 class="modal-title">Update Buku <b><?= $bk['nama_buku'] ?></b></h4>
						</div>
						<div class="modal-body">
							<div class="box-body">
								<input type="hidden" class="form-control" name="idBuku" id="idBuku" value="<?= $bk['id_buku'] ?>" readonly>
								<div class="form-group">
									<label for="judulBuku">Judul Buku</label>
									<input type="text" class="form-control" name="judulBuku" id="judulBuku" placeholder="Masukkan Judul Buku" value="<?= $bk['nama_buku'] ?>">
								</div>
								<div class="form-group">
									<label for="tahun">Tahun</label>
									<input type="number" min="1900" max="2099" class="form-control" name="tahun" id="tahun" placeholder="Masukkan Tahun Buku" value="<?= $bk['tahun'] ?>">
								</div>
								<div class="form-group">
									<label for="tahun">Jenis Buku</label>
									<select name="jenisbuku" id="jenisbuku" class="form-control">
										<option selected disabled>--Pilih Jenis Buku--</option>
										<?php
										
											foreach($jenisbuku as $jb){
												$selected = '';
												if($jb['id_jenis_buku'] == $bk['id_jenis_buku']){
													$selected = 'selected';
												}
												echo '<option '.$selected.' value="'.$jb["id_jenis_buku"].'">'.$jb["nama_jenis_buku"].'</option>';
											}
										
										?>
									</select>
								</div>
								<div class="form-group">
									<label for="tahun">Sumber Dana</label>
									<select name="sumberdana" id="sumberdana" class="form-control">
										<option selected disabled>--Pilih Sumber Dana--</option>
										<?php

											foreach($sumberdana as $sd){
												$selected = '';
												if($sd['id_sumber_dana'] == $bk['id_sumber_dana']){
													$selected = 'selected';
												}
												echo '<option '.$selected.' value="'.$sd["id_sumber_dana"].'">'.$sd["nama_sumber_dana"].'</option>';
											}
										
										?>
									</select>
								</div>
							</div>
						</div>
						<div class="modal-footer">
							<button class="btn btn-default pull-left" data-dismiss="modal">Tutup</button>
							<button class="btn btn-primary">Simpan</button>
						</div>
					</form>
				</div>
				<!-- /.modal-content -->
			</div>
			<!-- /.modal-dialog -->
		</div>
	<?php
	
		}
	
	?>
</section>
<!-- /.content -->
