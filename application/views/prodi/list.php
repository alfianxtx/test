<html>
    <head>
        <title>Master Program Studi</title>
        <link href='<?php echo base_url(); ?>resources/css/style.css' rel='stylesheet' type='text/css' />
        <script>
            function jsTambah() {
            document.location = 'prodi/tambah';
            }
        </script>
    </head>
    <body>
        <h1>Master Program Studi (View List)</h1>
        <a href='<?php echo site_url(); ?>/mahasiswa'>MAHASISWA</a>
        <br /><br />
        <input type='button' name='btnTambah' value='Tambah' onClick='javascript: jsTambah();' />
        <br /><br />
        <table width='100%' align='center' cellspacing='0' cellpadding='0'>
            <tr>
                <th width='1%'>Kode</th>
                <th>Prodi</th>
                <th>Fakultas</th>
                <th width='100'><i>perintah</i></th>
            </tr>
            <?php
                foreach($data as $row) {
            ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['prodi']; ?></td>
                    <td><?php echo $row['fakultas']; ?></td>
                    <td align='center'>
                        <a href='<?php echo site_url(); ?>/prodi/edit/<?php echo $row['id']; ?>'>Edit</a> |
                        <a href='<?php echo site_url(); ?>/prodi/hapus/<?php echo $row['id']; ?>'>Hapus</a>
                    </td>
                </tr>
            <?php
                }
            ?>
        </table>
    </body>
</html>