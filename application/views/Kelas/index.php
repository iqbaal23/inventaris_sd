<!-- Main content -->
<section class="content col-md-8">
	<div class="box box-primary">
		<div class="box-header">
			<h3 class="box-title">List Kelas</h3>
		</div>
		<!-- /.box-header -->
		<div class="box-body">
			<div style="padding-bottom: 10px;">
				<?php // echo anchor(site_url('kelas/create'), '<i class="fa fa-wpforms" aria-hidden="true"></i> Tambah kelas', 'class="btn btn-default btn-sm"'); ?>
				<button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-tambah">
                	Tambah Kelas
              	</button>
			</div>
			<table id="example1" class="table table-bordered table-striped">
			<thead>
			<tr>
				<th>No</th>
				<th>Kelas</th>
				<th>Action</th>
			</tr>
			</thead>
			<tbody>
			<?php
				$i=1;
				foreach($kelas as $kls){
					echo "<tr>
							<td>".$i++."</td>
							<td>".$kls['nama_kelas']."</td>
							<td><a class='btn-sm btn-primary' data-toggle='modal' data-target='#modal-update-".$kls['id_kelas']."'>
									<i class='fa fa-edit'></i>
								</a>
								&nbsp;".
								anchor('kelas/delete/'.$kls['id_kelas'],'<i class="fa fa-trash"></i>','class="btn-sm btn-danger" title="Hapus" onClick="if(!confirm(`Apakah Anda Yakin Menghapus '. $kls['nama_kelas'] .' ?`)){return false;}"')
							."</td>
						</tr>";
				}
			
			?>
			</tbody>
			<tfoot>
			<tr>
				<th>No</th>
				<th>Kelas</th>
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
				<form action="<?php echo base_url() ?>kelas/create" method="post">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title">Tambah Kelas</h4>
					</div>
					<div class="modal-body">
						<div class="box-body">
							<div class="form-group">
								<label for="nama_kelas">Kelas</label>
								<input type="text" class="form-control" name="nama_kelas" id="nama_kelas" placeholder="Masukkan Kelas">
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
	
		foreach($kelas as $kls){
	
	?>
		<div class="modal fade" id="modal-update-<?= $kls['id_kelas'] ?>">
			<div class="modal-dialog">
				<div class="modal-content">
					<form action="<?php echo base_url() ?>kelas/update" method="post">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span></button>
							<h4 class="modal-title">Update Kelas <b><?= $kls['nama_kelas'] ?></b></h4>
						</div>
						<div class="modal-body">
							<div class="box-body">
								<input type="hidden" class="form-control" name="idkelas" id="idkelas" value="<?= $kls['id_kelas'] ?>" readonly>
								<div class="form-group">
									<label for="nama_kelas">Kelas</label>
									<input type="text" class="form-control" name="nama_kelas" id="nama_kelas" placeholder="Masukkan Kelas" value="<?= $kls['nama_kelas'] ?>">
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
