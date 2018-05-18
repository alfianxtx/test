<html>
    <head>
        <title>Master Obat</title>
        <link href='<?php echo base_url(); ?>resources/css/style.css' rel='stylesheet' type='text/css' />
        <script>
            function jsView() {
                document.location = '<?php echo site_url(); ?>/obat';
            }
        </script>
    </head>
    <body>
        <h1>Master Obat (Form)</h1>
        <br />
        <input type='button' name='btn_view' value='Kembali ke View' onClick='javascript: jsView();' />
        <br /><br />
        <?php echo form_open('obat/simpan'); ?>
        <table width='600' align='center' cellspacing='0' cellpadding='0'>
            <tr>
                <th align='right' width='20%'>Kode<br/><small><i>(auto)</i></small></th>
                <td>
                    <?php echo form_error('txt_id'); ?>
                    <input type='text' name='txt_id' size='3' maxlength='3' readOnly='readOnly' class='read_only' value='<?php if(isset($data)) echo $data[0]['id']; else echo set_value('txt_id'); ?>' />
                </td>
            </tr>
            <tr>
                <th align='right'>Satuan*</th>
                <td>
                    <?php echo form_error('cmb_satuan'); ?>
                    <select name='cmb_satuan'>
                        <?php foreach ( $satuan_combo as $rows ) { echo '<option value="'.$rows['id'].'">'. $rows['nama_satuan'].'</option>'; } ?>
                    </select>
                </td>
            </tr>
            <tr>
                <th align='right'>Nama Obat*</th>
                <td>
                    <?php echo form_error('txt_nama_obat'); ?>
                    <input type='text' name='txt_nama_obat' size='60' maxlength='200' value='<?php if(isset($data)) echo $data[0]['nama_obat']; else echo set_value('txt_nama_obat'); ?>' />
                </td>
            </tr>
            <tr>
                <th align='right'>Produser</th>
                <td>
                    <?php echo form_error('txt_produser_obat'); ?>
                    <input type='text' name='txt_produser_obat' size='30' maxlength='30' value='<?php if(isset($data)) echo $data[0]['produser_obat']; else echo set_value('txt_produser_obat'); ?>' />
                </td>
            </tr>
            <tr>
                <th align='right'>Expired Date</th>
                <td>
                    <?php echo form_error('txt_exp_obat'); ?>
                    <input type='text' name='txt_exp_obat' size='30' maxlength='30' value='<?php if(isset($data)) echo $data[0]['exp_obat']; else echo set_value('txt_exp_obat'); ?>' />
                </td>
            </tr>
            <tr>
                <th align='right'>Harga Beli</th>
                <td>
                    <?php echo form_error('txt_harga_beli'); ?>
                    <input type='text' name='txt_harga_beli' size='30' maxlength='30' value='<?php if(isset($data)) echo $data[0]['harga_beli']; else echo set_value('txt_harga_beli'); ?>' />
                </td>
            </tr>
            <tr>
                <th align='right'>Harga Jual</th>
                <td>
                    <?php echo form_error('txt_harga_jual'); ?>
                    <input type='text' name='txt_harga_jual' size='30' maxlength='30' value='<?php if(isset($data)) echo $data[0]['harga_jual']; else echo set_value('txt_harga_jual'); ?>' />
                </td>
            </tr>
            <tr>
                <th align='right'>Stok</th>
                <td>
                    <?php echo form_error('txt_stok_obat'); ?>
                    <input type='text' name='txt_stok_obat' size='30' maxlength='30' value='<?php if(isset($data)) echo $data[0]['stok_obat']; else echo set_value('txt_stok_obat'); ?>' />
                </td>
            </tr>
            <tr>
                <th align='right'>Jenis Obat</th>
                <td>
                    <?php echo form_error('txt_jenis_obat'); ?>
                    <input type='text' name='txt_jenis_obat' size='30' maxlength='30' value='<?php if(isset($data)) echo $data[0]['jenis_obat']; else echo set_value('txt_jenis_obat'); ?>' />
                </td>
            </tr>
            <tr>
                <td colspan='2'>
                    <i>* - Wajib isi</i>
                    <div align='right'>
                    <input type='submit' name='cmd_simpan' value='Simpan'/>
                    </div>
                </td>
            </tr>
        </table>
        </form>
    </body>
</html>