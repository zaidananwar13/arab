<!doctype html>
<html>
    <head>
        <title>SOCIANOVATION - Web Administration</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            .word-table {
                border:1px solid black !important; 
                border-collapse: collapse !important;
                width: 100%;
            }
            .word-table tr th, .word-table tr td{
                border:1px solid black !important; 
                padding: 5px 10px;
            }
        </style>
    </head>
    <body>
        <h2>Kamus List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Kata</th>
		<th>Marfu</th>
		<th>Masub</th>
		<th>Majsum</th>
		
            </tr><?php
            foreach ($kamus_data as $kamus)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $kamus->kata ?></td>
		      <td><?php echo $kamus->marfu ?></td>
		      <td><?php echo $kamus->masub ?></td>
		      <td><?php echo $kamus->majsum ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>