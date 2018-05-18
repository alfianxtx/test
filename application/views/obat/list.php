<html>
    <head>
        <title>Master Obat</title>
        <link href='<?php echo base_url(); ?>resources/css/style.css' rel='stylesheet' type='text/css' />
        <script>
            function jsTambah() {
                document.location = 'obat/tambah';
            }
        </script>
    </head>
    <body>
        <h1>Master Obat (View List)</h1>
        <br />
        <input type='button' name='btnTambah' value='Tambah' onClick='javascript: jsTambah();' />
        <br /><br />
        <table width='100%' align='center' cellspacing='0' cellpadding='0'>
            <tr>
                <th width='1%'>Kode</th>
                <th width='15%'>satuan</th>
                <th>Nama Obat</th>
                <th width='10%'>Harga Jual</th>
                <th width='100'><i>perintah</i></th>
            </tr>
            <?php foreach($data as $row) { ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['satuan_id']; ?></td>
                    <td><?php echo $row['nama_obat']; ?></td>
                    <td><?php echo $row['harga_jual']; ?></td>
                    <td align='center'>
                        <a href='<?php echo site_url(); ?>/obat/edit/<?php echo $row['id']; ?>'>Edit</a> |
                        <a href='<?php echo site_url(); ?>/obat/hapus/<?php echo $row['id']; ?>'>Hapus</a>
                    </td>
                </tr>
            <?php } ?>
        </table>
    </body>
</html>
