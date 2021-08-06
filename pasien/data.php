<?php include_once "../_header.php"; ?>
	<div class="box">
		<h1>Pasies</h1>
		<h4>
			<small>Data Pasien</small>
			<div class="pull-right">
				<a href="" class="btn btn-default btn-xs"><i class="glyphicon glyphicon-refresh"></i></a>
				<a href="add.php" class="btn btn-success btn-xs"><i class="glyphicon glyphicon-plus">Tambah Data</i></a>
				<a href="import.php" class="btn btn-info btn-xs"><i class="glyphicon glyphicon-import">Import Data</i></a>
			</div>
		</h4>
			<div class="table-responvise">
				<table class="table table-striped table-bordered table-hover" id="tabelpasien">
					<thead>
						<tr>
							<td>No Identitas</td>
							<td>Nama Pasien</td>
							<td>Jenis Kelamin</td>
							<td>Alamat</td>
							<td>No Telp</td>
							<td align="center">
								<i class="glyphicon glyphicon-cog"></i>
							</td>
						</tr>
					</thead>
				</table>
			</div>
			<script>
				$(document).ready(function() {
				    $('#tabelpasien').DataTable( {
				        "processing": true,
				        "serverSide": true,
				        "ajax": "datapasien.php",
				        scrollY :'250px',
				        dom : 'Bfrtip',
				        buttons : [
				        	{
				        		extend : 'pdf',
				        		orientation : 'potrait',
				        		pageSize : 'Legal',
				        		title : 'data Pasien',
				        		download : 'open'
				        	},
				        	'csv','excel','print','copy'
				        ],
				        columnDefs : [
				        	{
				        		"searchable" : false,
				        		"orderalbe"	: false,
				        		"targets" : 5,
				        		"render" : function(data,type,row){
				        			var btn ="<center><a href=\"edit.php?id="+data+"\"class=\"btn btn-warning btn-xs\"><i class=\"glyphicon glyphicon-edit\"></i></a> <a href=\"del.php?id="+data+"\" onclick=\"return confirm('Yakin menghapus data?')\"class=\"btn btn-danger btn-xs\"><i class=\"glyphicon glyphicon-trash\"></i></a>";
				        			return btn;
				        		}
				        	}
				        ]
				    } );
				} );
			</script>
	</div>

<?php include_once "../_footer.php"; ?>