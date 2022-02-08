<?php $this->load->view('templates/header');?>
<div class="row" style="margin-bottom: 20px">
            <div class="col-md-4">
                <h2>Kamus <?php echo $button ?></h2>
            </div>
            <div class="col-md-8 text-center">
                <div id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
        </div>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">Kata <?php echo form_error('kata') ?></label>
            <input type="text" class="form-control" name="kata" id="kata" placeholder="Kata" value="<?php echo $kata; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Marfu <?php echo form_error('marfu') ?></label>
            <input type="text" class="form-control" name="marfu" id="marfu" placeholder="Marfu" value="<?php echo $marfu; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Masub <?php echo form_error('masub') ?></label>
            <input type="text" class="form-control" name="masub" id="masub" placeholder="Masub" value="<?php echo $masub; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Majsum <?php echo form_error('majsum') ?></label>
            <input type="text" class="form-control" name="majsum" id="majsum" placeholder="Majsum" value="<?php echo $majsum; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Majrur <?php echo form_error('majrur') ?></label>
            <input type="text" class="form-control" name="majrur" id="majrur" placeholder="Majrur" value="<?php echo $majrur; ?>" />
        </div>
	    <input type="hidden" name="id_kamus" value="<?php echo $id_kamus; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('kamus') ?>" class="btn btn-default">Cancel</a>
	</form><?php $this->load->view('templates/footer');?>