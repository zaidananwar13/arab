<?php $this->load->view('templates/header');?>
<div class="row" style="margin-bottom: 20px">
            <div class="col-md-4">
                <h2>Huruf Read</h2>
            </div>
            <div class="col-md-8 text-center">
                <div id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
        </div>
        <table class="table">
	    <tr><td>Huruf</td><td><?php echo $huruf; ?></td></tr>
	    <tr><td>Tanda</td><td><?php echo $tanda; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('huruf') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table><?php $this->load->view('templates/footer');?>