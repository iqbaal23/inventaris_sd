<!-- Main content -->
<section class="content col-md-8">
	<div class="box box-primary">
		<div class="box-header">
			<h3 class="box-title">List Buku</h3>
		</div>
		<!-- /.box-header -->
		<div class="box-body">
			<div style="padding-bottom: 10px;">
				<?php // echo anchor(site_url('buku/create'), '<i class="fa fa-wpforms" aria-hidden="true"></i> Tambah Buku', 'class="btn btn-default btn-sm"'); ?>
				<button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-tambah">
                	Tambah Buku
              	</button>
			</div>
			<table id="example1" class="table table-bordered table-striped">
			<thead>
			<tr>
				<th>No</th>
				<th>Judul Buku</th>
				<th>Action</th>
			</tr>
			</thead>
			<tbody>
			<?php
				$i=1;
				foreach($jenis_buku as $bk){
					echo "<tr>
							<td>".$i++."</td>
							<td>".$bk['nama_jenis_buku']."</td>
							<td><a class='btn-sm btn-primary' data-toggle='modal' data-target='#modal-update-".$bk['id_jenis_buku']."'>
									<i class='fa fa-edit'></i>
								</a>
								&nbsp;".
								anchor('jenisbuku/delete/'.$bk['id_jenis_buku'],'<i class="fa fa-trash"></i>','class="btn-sm btn-danger" title="Hapus" onClick="if(!confirm(`Apakah Anda Yakin Menghapus '. $bk['nama_jenis_buku'] .' ?`)){return false;}"')
							."</td>
						</tr>";
				}
			
			?>
			</tbody>
			<tfoot>
			<tr>
				<th>No</th>
				<th>Judul Buku</th>
				<th>Action</th>
			</tr>
			</tfoot>
			</table>
		</div>
		<!-- /.box-body -->
	</div>

	<div class="modal fade" id="modal-tambah">
		<div class="modal-dialog">
			<div class="modal-content">
				<form action="<?php echo base_url() ?>jenisbuku/create" method="post">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title">Tambah Buku</h4>
					</div>
					<div class="modal-body">
						<div class="box-body">
							<div class="form-group">
								<label for="judulBuku">Judul Buku</label>
								<input type="text" class="form-control" name="jenisBuku" id="jenisBuku" placeholder="Masukkan Judul Buku">
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

	<?php
	
		foreach($jenis_buku as $bk){
	
	?>
		<div class="modal fade" id="modal-update-<?= $bk['id_jenis_buku'] ?>">
			<div class="modal-dialog">
				<div class="modal-content">
					<form action="<?php echo base_url() ?>jenisbuku/update" method="post">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span></button>
							<h4 class="modal-title">Update Buku <b><?= $bk['nama_jenis_buku'] ?></b></h4>
						</div>
						<div class="modal-body">
							<div class="box-body">
								<input type="hidden" class="form-control" name="idJenisBuku" id="idJenisBuku" value="<?= $bk['id_jenis_buku'] ?>" readonly>
								<div class="form-group">
									<label for="jenisBuku">Judul Buku</label>
									<input type="text" class="form-control" name="jenisBuku" id="jenisBuku" placeholder="Masukkan Judul Buku" value="<?= $bk['nama_jenis_buku'] ?>">
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
