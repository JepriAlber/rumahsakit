<?php include_once ("../_header.php"); ?>
	<div class="box">
		<h1>Dokter</h1>
		<h4>
			<small>Data Dokter</small>
			<div class="pull-right">
				<a href="" class="btn btn-default btn-xs"><i class="glyphicon glyphicon-refresh"></i></a>
				<a href="add.php" class="btn btn-success btn-xs"><i class="glyphicon glyphicon-plus"></i>Tambah Data</a>
			</div>
		</h4>
		<form method="POST" name="proses">
			<div class="table-responvise">
				<table class="table table-striped table-bordered table-hover" id="table-dokter">
					<thead>
						<tr>
							<td>
								<center>
									<input type="checkbox" id="select_all" value="">
								</center>
							</td>
							<td>No.</td>
							<td>Nama Dokter</td>
							<td>Spesialis</td>
							<td>Alamat</td>
							<td>No Telp</td>
							<td align="center">
								<i class="glyphicon glyphicon-cog"></i>
							</td>
						</tr>
					</thead>
					<tbody>
						<?php
						$no=1;
							$sql_dokter = mysqli_query($con,"SELECT * FROM tb_dokter") or die (mysqli_error($con)); 
							if (mysqli_num_rows($sql_dokter) > 0) {
								while ($data = mysqli_fetch_array($sql_dokter)) {?>
								<tr>
									<td>
									<center>
										<input type="checkbox" name="checked[]" class="check" value="<?=$data['id_dokter']?>">
									</center>
									</td>
									<td><?=$no++?></td>
									<td><?=$data['nama_dokter'];?></td>
									<td><?=$data['spesialis'];?></td>
									<td><?=$data['alamat'];?></td>
									<td><?=$data['no_telp'];?></td>
									<td align="center">
										<a href="edit.php?id=<?=$data['id_dokter']?>" class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-edit"></i></a>
									</td>
								</tr>

								<?php
								}
							}else{
								echo "<tr><td colspan=\"7\"align=\"center\">Data tidak ditemukan</td></tr>";
							}
						?>
						
					</tbody>
				</table>
			</div>
		</form>
		<div class="box pull-right">
			<button class="btn btn-danger btn-sm" onclick="hapus()"><i class="glyphicon glyphicon-trash"></i></button>
		</div>
	</div>
	<script>
			$(document).ready(function(){

				$('#table-dokter').DataTable({
					columDefs: [
						{
						"searchable": false,
						"orderable": false,
						"target": [0,6]
						}
					],
					"order": [1,"asc"]
				});

				$('#select_all').on('click',function(){
					if (this.checked) {
						$('.check').each(function(){
							this.checked = true;
						})
					}else{
						$('.check').each(function(){
							this.checked = false;
						})
					}
				});

				$('.check').on('click',function(){
					if ($('.check:checked').length == $('.check').length) {
						$('#select_all').prop('checked',true);
					}else{
						$('#select_all').prop('checked',false);
					}
				})
			})

			function hapus(){
				var conf = confirm('Yakin Mau Menghapus Data?');
				if (conf) {
					document.proses.action='del.php';
					document.proses.submit();
				}
			}
		</script>
<?php include_once ("../_footer.php"); ?>