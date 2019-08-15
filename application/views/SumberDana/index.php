<!-- Main content -->
<section class="content col-md-8">
	<div class="box box-primary">
		<div class="box-header">
			<h3 class="box-title">List Sumber Dana</h3>
		</div>
		<!-- /.box-header -->
		<div class="box-body">
			<div style="padding-bottom: 10px;">
				<?php // echo anchor(site_url('sumber_dana/create'), '<i class="fa fa-wpforms" aria-hidden="true"></i> Tambah sumber_dana', 'class="btn btn-default btn-sm"'); ?>
				<button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-tambah">
                	Tambah Sumber Dana
              	</button>
			</div>
			<table id="example1" class="table table-bordered table-striped">
			<thead>
			<tr>
				<th>No</th>
				<th>Sumber Dana</th>
				<th>Action</th>
			</tr>
			</thead>
			<tbody>
			<?php
				$i=1;
				foreach($sumber_dana as $sd){
					echo "<tr>
							<td>".$i++."</td>
							<td>".$sd['nama_sumber_dana']."</td>
							<td><a class='btn-sm btn-primary' data-toggle='modal' data-target='#modal-update-".$sd['id_sumber_dana']."'>
									<i class='fa fa-edit'></i>
								</a>
								&nbsp;".
								anchor('sumberdana/delete/'.$sd['id_sumber_dana'],'<i class="fa fa-trash"></i>','class="btn-sm btn-danger" title="Hapus" onClick="if(!confirm(`Apakah Anda Yakin Menghapus '. $sd['nama_sumber_dana'] .' ?`)){return false;}"')
							."</td>
						</tr>";
				}
			
			?>
			</tbody>
			<tfoot>
			<tr>
				<th>No</th>
				<th>Sumber Dana</th>
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
				<form action="<?php echo base_url() ?>sumberdana/create" method="post">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title">Tambah Sumber Dana</h4>
					</div>
					<div class="modal-body">
						<div class="box-body">
							<div class="form-group">
								<label for="nama_sumber_dana">Sumber Dana</label>
								<input type="text" class="form-control" name="nama_sumber_dana" id="nama_sumber_dana" placeholder="Masukkan Sumber Dana">
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
	
		foreach($sumber_dana as $sd){
	
	?>
		<div class="modal fade" id="modal-update-<?= $sd['id_sumber_dana'] ?>">
			<div class="modal-dialog">
				<div class="modal-content">
					<form action="<?php echo base_url() ?>sumberdana/update" method="post">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span></button>
							<h4 class="modal-title">Update Sumber Dana <b><?= $sd['nama_sumber_dana'] ?></b></h4>
						</div>
						<div class="modal-body">
							<div class="box-body">
								<input type="hidden" class="form-control" name="idsumber_dana" id="idsumber_dana" value="<?= $sd['id_sumber_dana'] ?>" readonly>
								<div class="form-group">
									<label for="nama_sumber_dana">Sumber Dana</label>
									<input type="text" class="form-control" name="nama_sumber_dana" id="nama_sumber_dana" placeholder="Masukkan Sumber Dana" value="<?= $sd['nama_sumber_dana'] ?>">
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
