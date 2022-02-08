<?php  if ( ! defined("BASEPATH")) exit("No direct script access allowed");
	function generate_sidemenu()
	{
		return '<li>
		<a href="'.site_url('kamus').'"><i class="fa fa-list fa-fw"></i> Kamus</a>
	</li>
	<li>
		<a href="'.site_url('kamus/prediksi').'"><i class="fa fa-list fa-fw"></i> Prediksi</a>
	</li>
	<li>
		<a href="'.site_url('huruf').'"><i class="fa fa-list fa-fw"></i> Huruf</a>
	</li>';
	}
