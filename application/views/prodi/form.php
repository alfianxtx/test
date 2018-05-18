<html>
    <head>
        <title>Master Prodi</title>
        <link href='<?php echo base_url(); ?>resources/css/style.css' rel='stylesheet' type='text/css' />
        <script>
            function jsView() {
                document.location = '<?php echo site_url(); ?>/prodi';
            }
        </script>
    </head>
    <body>
        <h1>Master Program Studi (Form)</h1>
        <br />
        <input type='button' name='btn_view' value='Kembali ke View' onClick='javascript: jsView();' />
        <br /><br />
        <?php echo form_open('prodi/simpan'); ?>
        <table width='600' align='center' cellspacing='0' cellpadding='0'>
            <tr>
                <th align='right' width='20%'>ID</th>
                <td>
                    <?php echo form_error('txt_id'); ?>
                    <input type='text' name='txt_id' size='3' maxlength='3' readOnly='readOnly' class='read_only' value='<?php if(isset($data)) echo $data[0]['id']; else echo set_value('txt_id'); ?>' />
                </td>
            </tr>
            <tr>
                <th align='right'>Prodi*</th>
                <td>
                    <?php echo form_error('txt_prodi'); ?>
                    <input type='text' name='txt_prodi' size='30' maxlength='30' value='<?php if(isset($data)) echo $data[0] ['prodi']; else echo set_value('txt_prodi'); ?>' />
                </td>
            </tr>
            <tr>
                <th align='right'>Fakultas*</th>
                <td>
                    <?php echo form_error('txt_fakultas'); ?>
                    <input type='text' name='txt_fakultas' size='30' maxlength='30' value='<?php if(isset($data)) echo $data[0] ['fakultas']; else echo set_value('txt_fakultas'); ?>' />
                </td>
            </tr>
            <tr>
                <td colspan='2'>
                    <i>* - Wajib isi</i>
                    <div align='right'>
                        <input type='submit' name='cmd_simpan' value='Simpan' />
                    </div>
                </td>
            </tr>
        </table>
        </form>
    </body>
</html>