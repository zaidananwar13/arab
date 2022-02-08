<?php $this->load->view('templates/header');?>
<div class="row" style="margin-bottom: 20px">
            <div class="col-md-4">
                <h2>Kamus Read</h2>
            </div>
            <div class="col-md-8 text-center">
                <div id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
        </div>
        <table class="table">
	    <tr><td>Kata</td><td><?php echo $kata; ?></td></tr>
	    <tr><td>Marfu</td><td><?php echo $marfu; ?></td></tr>
	    <tr><td>Masub</td><td><?php echo $masub; ?></td></tr>
	    <tr><td>Majsum</td><td><?php echo $majsum; ?></td></tr>
	    <tr><td>Majrur</td><td><?php echo $majrur; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('kamus') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table><?php $this->load->view('templates/footer');?>