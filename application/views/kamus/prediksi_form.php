<?php $this->load->view('templates/header');?>
<div class="row" style="margin-bottom: 20px">
            <div class="col-md-4">
                <h2>Kamus Prediksi</h2>
            </div>
            <div class="col-md-8 text-center">
                
            </div>
        </div>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">Kata </label>
            <input type="text" class="form-control" style="font-size: 90px;height: 90px" name="kata" id="kata" placeholder="Kata" value="" />
        </div>
	    <button type="submit" class="btn btn-primary">Prediksi</button> 
	    <a href="<?php echo site_url('kamus') ?>" class="btn btn-default">Cancel</a>
	</form>
    <div id="message" style="font-size: 90px">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div><?php $this->load->view('templates/footer');?>