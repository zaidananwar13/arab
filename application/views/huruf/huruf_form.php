<?php $this->load->view('templates/header');?>
<div class="row" style="margin-bottom: 20px">
            <div class="col-md-4">
                <h2>Huruf <?php echo $button ?></h2>
            </div>
            <div class="col-md-8 text-center">
                <div id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
        </div>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">Huruf <?php echo form_error('huruf') ?></label>
            <input type="text" class="form-control" name="huruf" id="huruf" placeholder="Huruf" value="<?php echo $huruf; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Tanda <?php echo form_error('tanda') ?></label>
            <input type="text" class="form-control" name="tanda" id="tanda" placeholder="Tanda" value="<?php echo $tanda; ?>" />
        </div>
	    <input type="hidden" name="id_huruf" value="<?php echo $id_huruf; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('huruf') ?>" class="btn btn-default">Cancel</a>
	</form><?php $this->load->view('templates/footer');?>