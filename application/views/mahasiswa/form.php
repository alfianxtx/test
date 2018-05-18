<html>
    <head>
        <title>Master Mahasiswa</title>
        <link href='<?php echo base_url(); ?>resources/css/style.css' rel='stylesheet' type='text/css' />
        <link rel="stylesheet" href='<?php echo base_url(); ?>resources/jquery-ui/jquery-ui.theme.css'>
        <link rel="stylesheet" href='<?php echo base_url(); ?>resources/jquery-ui/jquery-ui.css'>
        <script src='<?php echo base_url(); ?>resources/jquery/jquery-3.3.1.min.js'></script>
        <script src='<?php echo base_url(); ?>resources/jquery-ui/jquery-ui.js'></script>
        <script>
            $( function() {
                $( ".datepicker" ).datepicker({
                dateFormat: "yy-mm-dd",
                changeMonth: true,
                changeYear: true
                });
            });
            function jsView() {
                document.location = '<?php echo site_url(); ?>/mahasiswa';
            }
        </script>
    </head>
    <body>
        <h1>Master Mahasiswa (Form)</h1>
        <br />
        <input type='button' name='btn_view' value='Kembali ke View' onClick='javascript: jsView();' />
        <br /><br />
        <?php echo form_open('mahasiswa/simpan'); ?>
        <table width='600' align='center' cellspacing='0' cellpadding='0'>
            <tr>
                <th align='right' width='20%'>Kode<br/><small><i>(auto)</i></small></th>
                <td>
                    <?php echo form_error('txt_id'); ?>
                    <input type='text' name='txt_id' size='3' maxlength='3' readOnly='readOnly' class='read_only' value='<?php if(isset($data)) echo $data[0]['id']; else echo set_value('txt_id'); ?>' />
                </td>
            </tr>
            <tr>
                <th align='right'>Prodi*</th>
                <td>
                    <?php echo form_error('cmb_prodi'); ?>
                    <select name='cmb_prodi'>
                    <?php 
                        if(isset($data))                            {
                            foreach ( $prodi_combo as $rows ) { 
                                if($rows['id'] == $data[0]['prodi_id']){
                                    echo '<option value="'.$rows['id'].'" selected>'. $rows['prodi'].'</option>'; 
                                }else{
                                    echo '<option value="'.$rows['id'].'">'. $rows['prodi'].'</option>'; 
                                }                                    
                            } 
                        }else{
                            foreach ( $prodi_combo as $rows ) { 
                                echo '<option value="'.$rows['id'].'">'. $rows['prodi'].'</option>'; 
                            } 
                        }                            
                    ?>
                    </select>
                </td>
            </tr>
            <tr>
                <th align='right'>Nama*</th>
                <td>
                    <?php echo form_error('txt_nama'); ?>
                    <input type='text' name='txt_nama' size='30' maxlength='30' value='<?php if(isset($data)) echo $data[0]['nama']; else echo set_value('txt_nama'); ?>' />
                </td>
            </tr>
            <tr>
                <th align='right'>Alamat*</th>
                <td>
                    <?php echo form_error('txt_alamat'); ?>
                    <input type='text' name='txt_alamat' size='60' maxlength='60' value='<?php if(isset($data)) echo $data[0]['alamat']; else echo set_value('txt_alamat'); ?>' />
                </td>
            </tr>
            <tr>
                <th align='right'>JenisKelamin*</th>
                <td>
                    <?php echo form_error('cmb_jenis_kelamin'); ?>
                    <select name='cmb_jenis_kelamin'>
                        <?php 
                            if(isset($data))                            {
                                if($data[0]['jenis_kelamin'] == 'Laki-laki'){
                                    echo "<option value='Laki-laki' selected>Laki-laki</option>";
                                    echo "<option value='Perempuan'>Perempuan</option>";
                                }else{
                                    echo "<option value='Laki-laki'>Laki-laki</option>";
                                    echo "<option value='Perempuan' selected>Perempuan</option>";
                                }                                    
                            }else{
                                echo "<option value='Laki-laki'>Laki-laki</option>";
                                echo "<option value='Perempuan'>Perempuan</option>";
                            }                            
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <th align='right'>NoTelp*</th>
                <td>
                    <?php echo form_error('txt_no_tlp'); ?>
                    <input type='text' name='txt_no_tlp' size='30' maxlength='30' value='<?php if(isset($data)) echo $data[0]['no_tlp']; else echo set_value('txt_no_tlp'); ?>' />
                </td>
            </tr>
            <tr>
                <th align='right'>TglLahir*</th>
                <td>
                    <?php echo form_error('txt_tgl_lahir'); ?>
                    <input readonly class='datepicker' type='text' name='txt_tgl_lahir' size='30' maxlength='30' value='<?php if(isset($data)) echo $data[0]['tgl_lahir']; else echo set_value('txt_tgl_lahir'); ?>' />
                </td>
            </tr>
            <tr>
                <th align='right'>TglMasuk*</th>
                <td>
                    <?php echo form_error('txt_tgl_masuk'); ?>
                    <input readonly class='datepicker' type='text' name='txt_tgl_masuk' size='30' maxlength='30' value='<?php if(isset($data)) echo $data[0]['tgl_masuk']; else echo set_value('txt_tgl_masuk'); ?>' />
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