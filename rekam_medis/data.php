<?php include_once("../_header.php");?>

	<div class="box">
		<h1>Rekam Medis</h1>
		<h4>
			<small>Data Rekam Medis</small>
			<div class="pull-right">
				<a href="" class="btn btn-default btn-xs"><i class="glyphicon glyphicon-refresh"></i></a>
				<a href="add.php" class="btn btn-success btn-xs"><i class="glyphicon glyphicon-plus"></i>Tambah Data</a>
			</div>
		</h4>
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-hover" id="rekam">
				<thead>
					<tr>
						<td>No.</td>
						<td>Tanggal Periksa</td>
						<td>Nama Passien</td>
						<td>Keluhan</td>
						<td>Nama Dokter</td>
						<td>Diagnosa</td>
						<td>Poliklinik</td>
						<td>Data Obat</td>
						<td align="center">
							<i class="glyphicon glyphicon-cog"></i>
						</td>
					</tr>
				</thead>
				<tbody>
					<?php
						$no=1;
						$query = "SELECT * FROM tb_rekammedis
								INNER JOIN tb_pasien ON tb_rekammedis.id_passien = tb_pasien.id_pasien
								INNER JOIN tb_dokter ON tb_rekammedis.id_dokter = tb_dokter.id_dokter
								INNER JOIN tb_poliklink on tb_rekammedis.id_poli = tb_poliklink.id_poli
								";
						$sql_rekam = mysqli_query($con,$query)or die(mysqli_error($con));  
							while ($data = mysqli_fetch_array($sql_rekam)) {?>
							<tr>
								<td><?=$no++?>.</td>
								<td><?=tglIndo($data['tgl_periksa']);?></td>
								<td><?=$data['nama_pasien'];?></td>
								<td><?=$data['keluhan'];?></td>
								<td><?=$data['nama_dokter'];?></td>
								<td><?=$data['diagnosa'];?></td>
								<td><?=$data['nama_poli'];?></td>
								<td>
									<?php
										$query_obat ="SELECT * FROM tb_rm_obat 
													JOIN tb_obat ON tb_rm_obat.id_obat = tb_obat.id_obat
													WHERE id_rm = '$data[id_rm]'";
										$sql_rm_obat = mysqli_query($con,$query_obat) or die(mysqli_error($con)); 
										while ($data_obat = mysqli_fetch_array($sql_rm_obat)) {
											echo $data_obat['nama_obat']."<br>";
										}
									?>
								</td>
								<td><a href="del.php?id=<?=$data['id_rm']?>" class="btn btn-danger btn-xs" onclick="return confirm('Yakin menghapus data?')"><i class="glyphicon glyphicon-trash"></i></a></td>
							</tr>
							<?php
							}
					?>			
				</tbody>
			</table>
		</div>
		<script type="text/javascript">
			$(document).ready(function(){
				$('#rekam').DataTable({
					columnDefs:[
						{
							"searchable":false,
							"orderable":false,
							"targets":8
						}
					]
				});
			});
		</script>
	</div>
	
<?php include_once("../_footer.php");?>