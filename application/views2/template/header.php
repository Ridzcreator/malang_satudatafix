<!DOCTYPE html>
<html>
    <head>
        <?php
        if($this->session->userdata('masuk') !=TRUE){
            $url=base_url('Login');
            redirect($url);
        };
		$name = $this->session->userdata('user');
		$page=$this->uri->segment(1); 
        ?>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>KABUPATEN MALANG SATU DATA</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!-- Bootstrap 3.3.7 -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/font-awesome/css/font-awesome.min.css">
        <!-- Ionicons -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/Ionicons/css/ionicons.min.css">
        <!-- jvectormap -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/jvectormap/jquery-jvectormap.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/AdminLTE.min.css">
        <!-- AdminLTE Skins. Choose a skin from the css/skins
             folder instead of downloading all of them to reduce the load. -->
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/cust/cust.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/skins/_all-skins.min.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dataTables/datatables.min.css">
		<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
		
		<script type="text/javascript" .src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

        <!-- Google Font -->
        <link rel="stylesheet"
              href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    </head>
    <body class="hold-transition skin-blue sidebar-mini">
        <div class="wrapper">
            <header class="main-header">

                <!-- Logo -->
                <a href="<?= base_url('Dashboard'); ?>" class="logo">
                    <!-- logo for regular state and mobile devices -->
                    <span class="logo-lg"><b>KABUPATEN MALANG</b>SATU DATA</span>
                    <span class="logo-lg">SATU DATA</span>
                </a>

                <!-- Header Navbar: style can be found in header.less -->
                <nav class="navbar navbar-static-top">
                    <!-- Sidebar toggle button-->
                    <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                        <span class="sr-only">Toggle navigation</span>
                    </a>
                    <!-- Navbar Right Menu -->
                    <div class="navbar-custom-menu">
                        <ul class="nav navbar-nav">
                            <!-- User Account: style can be found in dropdown.less -->
                            <li class="dropdown user user-menu">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <span class="hidden-xs">SELAMAT DATANG DI WEBSITE KABUPATEN MALANG SATU DATA</span>
                                </a>
                            </li>
                            <!-- Control Sidebar Toggle Button -->
                            <li>
                                <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
                            </li>
                        </ul>
                    </div>

                </nav>
            </header>
            <!-- Left side column. contains the logo and sidebar -->
            <aside class="main-sidebar">
                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">
                    <!-- Sidebar user panel -->
                    <div class="user-panel">
                        <div class="pull-left image">
						    <div style="height:5px;font-size:1px;">&nbsp;</div>
                            <img src="<?php echo base_url(); ?>/assets/dist/img/logo3.png" class="img-circle"  alt="KABUPATEN MALANG SATU DATA" >
                        </div>
						<div class="pull-left info">
							<p>Kabupaten Malang </p>
							<a href="#"><i class="fa fa-circle text-success"></i> <?php echo $name;?></a>
						</div>
                    </div>
					<div style="height:8px;font-size:1px;">&nbsp;</div>

                    <!-- sidebar menu: : style can be found in sidebar.less -->
                    <ul class="sidebar-menu" data-widget="tree">
                        <li class="header">MAIN NAVIGATION</li>
                        <li class="<?php if($page=="Dashboard"){echo 'active';}?>">
                            <a href="<?= base_url('Dashboard'); ?>">
                                <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                            </a>
                        </li>
						
						<li class="<?php if($page=="User"||$page=="Level"||$page=="Kecamatan"||$page=="Desa"||$page=="Master_agama"){echo 'active';}?> treeview">
                          <a href="#">
                            <i class="fa fa-folder"></i> <span>Pengelolaan Admin</span>
                            <span class="pull-right-container">
                              <i class="fa fa-angle-left pull-right"></i>
                            </span>
                          </a>
                          <ul class="treeview-menu">
                            <li class="<?php if($page=="User"){echo 'active';}?>">  
								<a href="<?= base_url('User'); ?>"><i class="fa fa-arrow-right"></i>Kelola Data User</a>
								
							</li>
							<li class="<?php if($page=="Level"){echo 'active';}?>">  
								<a href="<?= base_url('Level'); ?>"><i class="fa fa-arrow-right"></i>Kelola Master Level</a>
							</li>
							<li class="<?php if($page=="Kecamatan"){echo 'active';}?>">  
								<a href="<?= base_url('Kecamatan'); ?>"><i class="fa fa-arrow-right"></i>Kelola Master Kecamatan</a>
							</li>
							<li class="<?php if($page=="Desa"){echo 'active';}?>">  
								<a href="<?= base_url('Desa'); ?>"><i class="fa fa-arrow-right"></i>Kelola Master Desa</a>
							</li>
							<li class="<?php if($page=="Master_agama"){echo 'active';}?>">  
								<a href="<?= base_url('Master_agama'); ?>"><i class="fa fa-arrow-right"></i>Kelola Master Agama</a>
							</li>
                          </ul>
                        </li>
						
						<li class="<?php if($page=="Perumahan"||$page=="Alatangkut"||$page=="Tps"||$page=="Malatangkut"||$page=="Alatangkutd"){echo 'active';}?> treeview">
                          <a href="#">
                            <i class="fa fa-folder"></i> <span>Perumahan & Pemukiman</span>
                            <span class="pull-right-container">
                              <i class="fa fa-angle-left pull-right"></i>
                            </span>
                          </a>
                          <ul class="treeview-menu">
						   <li class="<?php if($page=="Malatangkut"){echo 'active';}?>">  
								<a href="<?= base_url('Malatangkut'); ?>"><i class="fa fa-arrow-right"></i>Master Alat Angkut</a>
							</li>
                            <li class="<?php if($page=="Perumahan"){echo 'active';}?>">  
								<a href="<?= base_url('Perumahan'); ?>"><i class="fa fa-arrow-right"></i>Data Sampah</a>
							</li>
							<li class="<?php if($page=="Alatangkutd"){echo 'active';}?>">  
								<a href="<?= base_url('Alatangkutd'); ?>"><i class="fa fa-arrow-right"></i>Alat Angkut Sampah</a>
							</li>
							<li class="<?php if($page=="Tps"){echo 'active';}?>">  
								<a href="<?= base_url('Tps'); ?>"><i class="fa fa-arrow-right"></i>TPS</a>
							</li>
                          </ul>
                        </li>
						
						<li class="<?php if($page=="Perempuankk"||$page=="Pengaduanper"||$page=="Pengaduanank"||$page=="Pengaduanker"){echo 'active';}?> treeview">
                          <a href="#">
                            <i class="fa fa-folder"></i> <span>P. Perempuan & P. Anak</span>
                            <span class="pull-right-container">
                              <i class="fa fa-angle-left pull-right"></i>
                            </span>
                          </a>
                          <ul class="treeview-menu">
                            <li class="<?php if($page=="Perempuankk"){echo 'active';}?>">  
								<a href="<?= base_url('Perempuankk'); ?>"><i class="fa fa-arrow-right"></i>Perempuan Sebagai KK</a>
							</li>
							<li class="treeview <?php if($page=="Pengaduanper"||$page=="Pengaduanank"||$page=="Pengaduanker"){echo 'active';}?>">  
								<a href="<?= base_url('Pengaduanper'); ?>"><i class="fa fa-arrow-right"></i><span>Pengaduan Kekerasan</span>
								<span class="pull-right-container">
								 <i class="fa fa-angle-left pull-right"></i>
								</span>
								</a>
								<ul class="treeview-menu">
									<li class="<?php if($page=="Pengaduanper"){echo 'active';}?>"><a href="<?= base_url('Pengaduanper'); ?>"><i class="fa fa-circle-o"></i>Pengaduan Perempuan</a></li>
									<li class="<?php if($page=="Pengaduanank"){echo 'active';}?>"><a href="<?= base_url('Pengaduanank'); ?>"><i class="fa fa-circle-o"></i>Pengaduan Anak</a></li>
									<li class="<?php if($page=="Pengaduanker"){echo 'active';}?>"><a href="<?= base_url('Pengaduanker'); ?>"><i class="fa fa-circle-o"></i>Pengaduan Kekerasan</a></li>
								</ul>
							</li>
							
                          </ul>
                        </li>
						
						<li class="<?php if($page=="Jumlahphk"||$page=="Pencariantapend"||$page=="Pekerjaan_penduduk"){echo 'active';}?> treeview">
                          <a href="#">
                            <i class="fa fa-folder"></i> <span>Tenaga Kerja</span>
                            <span class="pull-right-container">
                              <i class="fa fa-angle-left pull-right"></i>
                            </span>
                          </a>
                          <ul class="treeview-menu">
                            <li class="<?php if($page=="Jumlahphk"){echo 'active';}?>">  
								<a href="<?= base_url('Jumlahphk'); ?>"><i class="fa fa-arrow-right"></i>Jumlah PHK</a>
							</li>
							<li class="<?php if($page=="Pencariantapend"){echo 'active';}?>">  
								<a href="<?= base_url('Pencariantapend'); ?>"><i class="fa fa-arrow-right"></i>Cari Kerja Tamat Pendidikan</a>
							</li>
							<li class="<?php if($page=="Pekerjaan_penduduk"){echo 'active';}?>">  
								<a href="<?= base_url('Pekerjaan_penduduk'); ?>"><i class="fa fa-arrow-right"></i>Pekerjaan Penduduk</a>
							</li>
                          </ul>
                        </li>
						
						<li class="<?php if($page=="Jenispengairan"){echo 'active';}?> treeview">
                          <a href="#">
                            <i class="fa fa-folder"></i> <span>Pangan</span>
                            <span class="pull-right-container">
                              <i class="fa fa-angle-left pull-right"></i>
                            </span>
                          </a>
                          <ul class="treeview-menu">
                            <li class="<?php if($page=="Jenispengairan"){echo 'active';}?>">  
								<a href="<?= base_url('Jenispengairan'); ?>"><i class="fa fa-arrow-right"></i>Jenis Pengairan</a>
							</li>
                          </ul>
                        </li>
						
						<li class="<?php 
						if(
						$page=="Mlapanganolahraga"
						||$page=="Master_aset"
						||$page=="Ampelgading_struktur_pemerintahan"
						||$page=="Bantur_struktur_pemerintahan"
						||$page=="Bululawang_struktur_pemerintahan"
						||$page=="Dampit_struktur_pemerintahan"
						||$page=="Dau_struktur_pemerintahan"
						||$page=="Donomulyo_struktur_pemerintahan"
						||$page=="Gedangan_struktur_pemerintahan"
						||$page=="Gondanglegi_struktur_pemerintahan"
						||$page=="Jabung_struktur_pemerintahan"
						||$page=="Kalipare_struktur_pemerintahan"
						||$page=="Karangploso_struktur_pemerintahan"
						||$page=="Kasembon_struktur_pemerintahan"
						||$page=="Kepanjen_struktur_pemerintahan"
						||$page=="Kromengan_struktur_pemerintahan"
						||$page=="Lawang_struktur_pemerintahan"
						||$page=="Ngajum_struktur_pemerintahan"
						||$page=="Ngantang_struktur_pemerintahan"
						||$page=="Pagak_struktur_pemerintahan"
						||$page=="Pagelaran_struktur_pemerintahan"
						||$page=="Pakis_struktur_pemerintahan"
						||$page=="Pakisaji_struktur_pemerintahan"
						||$page=="Poncokusumo_struktur_pemerintahan"
						||$page=="Pujon_struktur_pemerintahan"
						||$page=="Singosari_struktur_pemerintahan"
						||$page=="Sumbermanjing_struktur_pemerintahan"
						||$page=="Sumberpucung_struktur_pemerintahan"
						||$page=="Tajinan_struktur_pemerintahan"
						||$page=="Tirtoyudo_struktur_pemerintahan"
						||$page=="Tumpang_struktur_pemerintahan"
						||$page=="Turen_struktur_pemerintahan"
						||$page=="Wagir_struktur_pemerintahan"
						||$page=="Wajak_struktur_pemerintahan"
						||$page=="Wonosari_struktur_pemerintahan"
						||$page=="Kec_banyak_lapangan_olahraga_ampelgading"
						||$page=="Kec_banyak_lapangan_olahraga_bantur"
						||$page=="Kec_banyak_lapangan_olahraga_bululawang"
						||$page=="Kec_banyak_lapangan_olahraga_dampit"
						||$page=="Kec_banyak_lapangan_olahraga_dau"
						||$page=="Kec_banyak_lapangan_olahraga_donomulyo"
						||$page=="Kec_banyak_lapangan_olahraga_gedangan"
						||$page=="Kec_banyak_lapangan_olahraga_gondanglegi"
						||$page=="Kec_banyak_lapangan_olahraga_jabung"
						||$page=="Kec_banyak_lapangan_olahraga_kalipare"
						||$page=="Kec_banyak_lapangan_olahraga_karangploso"
						||$page=="Kec_banyak_lapangan_olahraga_kasembon"
						||$page=="Kec_banyak_lapangan_olahraga_kepanjen"
						||$page=="Kec_banyak_lapangan_olahraga_kromengan"
						||$page=="Kec_banyak_lapangan_olahraga_lawang"
						||$page=="Kec_banyak_lapangan_olahraga_ngajum"
						||$page=="Kec_banyak_lapangan_olahraga_ngantang"
						||$page=="Kec_banyak_lapangan_olahraga_pagak"
						||$page=="Kec_banyak_lapangan_olahraga_pagelaran"
						||$page=="Kec_banyak_lapangan_olahraga_pakis"
						||$page=="Kec_banyak_lapangan_olahraga_pakisaji"
						||$page=="Kec_banyak_lapangan_olahraga_poncokusumo"
						||$page=="Kec_banyak_lapangan_olahraga_pujon"
						||$page=="Kec_banyak_lapangan_olahraga_singosari"
						||$page=="Kec_banyak_lapangan_olahraga_sumbermanjing"
						||$page=="Kec_banyak_lapangan_olahraga_sumberpucung"
						||$page=="Kec_banyak_lapangan_olahraga_tajinan"
						||$page=="Kec_banyak_lapangan_olahraga_tirtoyudo"
						||$page=="Kec_banyak_lapangan_olahraga_tumpang"
						||$page=="Kec_banyak_lapangan_olahraga_turen"
						||$page=="Kec_banyak_lapangan_olahraga_wagir"
						||$page=="Kec_banyak_lapangan_olahraga_wajak"
						||$page=="Kec_banyak_lapangan_olahraga_wonosari"
						||$page=="Kec_penduduk_berdasarkan_agama_ampelgading"
						||$page=="Kec_penduduk_berdasarkan_agama_bantur"
						||$page=="Kec_penduduk_berdasarkan_agama_bululawang"
						||$page=="Kec_penduduk_berdasarkan_agama_dampit"
						||$page=="Kec_penduduk_berdasarkan_agama_dau"
						||$page=="Kec_penduduk_berdasarkan_agama_donomulyo"
						||$page=="Kec_penduduk_berdasarkan_agama_gedangan"
						||$page=="Kec_penduduk_berdasarkan_agama_gondanglegi"
						||$page=="Kec_penduduk_berdasarkan_agama_jabung"
						||$page=="Kec_penduduk_berdasarkan_agama_kalipare"
						||$page=="Kec_penduduk_berdasarkan_agama_karangploso"
						||$page=="Kec_penduduk_berdasarkan_agama_kasembon"
						||$page=="Kec_penduduk_berdasarkan_agama_kepanjen"
						||$page=="Kec_penduduk_berdasarkan_agama_kromengan"
						||$page=="Kec_penduduk_berdasarkan_agama_lawang"
						||$page=="Kec_penduduk_berdasarkan_agama_ngajum"
						||$page=="Kec_penduduk_berdasarkan_agama_ngantang"
						||$page=="Kec_penduduk_berdasarkan_agama_pagak"
						||$page=="Kec_penduduk_berdasarkan_agama_pagelaran"
						||$page=="Kec_penduduk_berdasarkan_agama_pakis"
						||$page=="Kec_penduduk_berdasarkan_agama_pakisaji"
						||$page=="Kec_penduduk_berdasarkan_agama_poncokusumo"
						||$page=="Kec_penduduk_berdasarkan_agama_pujon"
						||$page=="Kec_penduduk_berdasarkan_agama_singosari"
						||$page=="Kec_penduduk_berdasarkan_agama_sumbermanjing"
						||$page=="Kec_penduduk_berdasarkan_agama_sumberpucung"
						||$page=="Kec_penduduk_berdasarkan_agama_tajinan"
						||$page=="Kec_penduduk_berdasarkan_agama_tirtoyudo"
						||$page=="Kec_penduduk_berdasarkan_agama_tumpang"
						||$page=="Kec_penduduk_berdasarkan_agama_turen"
						||$page=="Kec_penduduk_berdasarkan_agama_wagir"
						||$page=="Kec_penduduk_berdasarkan_agama_wajak"
						||$page=="Kec_penduduk_berdasarkan_agama_wonosari"
						||$page=="Kec_jumlah_tempat_ibadah_ampelgading"
						||$page=="Kec_jumlah_tempat_ibadah_bantur"
						||$page=="Kec_jumlah_tempat_ibadah_bululawang"
						||$page=="Kec_jumlah_tempat_ibadah_dampit"
						||$page=="Kec_jumlah_tempat_ibadah_dau"
						||$page=="Kec_jumlah_tempat_ibadah_donomulyo"
						||$page=="Kec_jumlah_tempat_ibadah_gedangan"
						||$page=="Kec_jumlah_tempat_ibadah_gondanglegi"
						||$page=="Kec_jumlah_tempat_ibadah_jabung"
						||$page=="Kec_jumlah_tempat_ibadah_kalipare"
						||$page=="Kec_jumlah_tempat_ibadah_karangploso"
						||$page=="Kec_jumlah_tempat_ibadah_kasembon"
						||$page=="Kec_jumlah_tempat_ibadah_kepanjen"
						||$page=="Kec_jumlah_tempat_ibadah_kromengan"
						||$page=="Kec_jumlah_tempat_ibadah_lawang"
						||$page=="Kec_jumlah_tempat_ibadah_ngajum"
						||$page=="Kec_jumlah_tempat_ibadah_ngantang"
						||$page=="Kec_jumlah_tempat_ibadah_pagak"
						||$page=="Kec_jumlah_tempat_ibadah_pagelaran"
						||$page=="Kec_jumlah_tempat_ibadah_pakis"
						||$page=="Kec_jumlah_tempat_ibadah_pakisaji"
						||$page=="Kec_jumlah_tempat_ibadah_poncokusumo"
						||$page=="Kec_jumlah_tempat_ibadah_pujon"
						||$page=="Kec_jumlah_tempat_ibadah_singosari"
						||$page=="Kec_jumlah_tempat_ibadah_sumbermanjing"
						||$page=="Kec_jumlah_tempat_ibadah_sumberpucung"
						||$page=="Kec_jumlah_tempat_ibadah_tajinan"
						||$page=="Kec_jumlah_tempat_ibadah_tirtoyudo"
						||$page=="Kec_jumlah_tempat_ibadah_tumpang"
						||$page=="Kec_jumlah_tempat_ibadah_turen"
						||$page=="Kec_jumlah_tempat_ibadah_wagir"
						||$page=="Kec_jumlah_tempat_ibadah_wajak"
						||$page=="Kec_jumlah_tempat_ibadah_wonosari"
						||$page=="Kec_luas_wilayah_ampelgading"
						||$page=="Kec_luas_wilayah_bantur"
						||$page=="Kec_luas_wilayah_bululawang"
						||$page=="Kec_luas_wilayah_dampit"
						||$page=="Kec_luas_wilayah_dau"
						||$page=="Kec_luas_wilayah_donomulyo"
						||$page=="Kec_luas_wilayah_gedangan"
						||$page=="Kec_luas_wilayah_gondanglegi"
						||$page=="Kec_luas_wilayah_jabung"
						||$page=="Kec_luas_wilayah_kalipare"
						||$page=="Kec_luas_wilayah_karangploso"
						||$page=="Kec_luas_wilayah_kasembon"
						||$page=="Kec_luas_wilayah_kepanjen"
						||$page=="Kec_luas_wilayah_kromengan"
						||$page=="Kec_luas_wilayah_lawang"
						||$page=="Kec_luas_wilayah_ngajum"
						||$page=="Kec_luas_wilayah_ngantang"
						||$page=="Kec_luas_wilayah_pagak"
						||$page=="Kec_luas_wilayah_pagelaran"
						||$page=="Kec_luas_wilayah_pakis"
						||$page=="Kec_luas_wilayah_pakisaji"
						||$page=="Kec_luas_wilayah_poncokusumo"
						||$page=="Kec_luas_wilayah_pujon"
						||$page=="Kec_luas_wilayah_singosari"
						||$page=="Kec_luas_wilayah_sumbermanjing"
						||$page=="Kec_luas_wilayah_sumberpucung"
						||$page=="Kec_luas_wilayah_tajinan"
						||$page=="Kec_luas_wilayah_tirtoyudo"
						||$page=="Kec_luas_wilayah_tumpang"
						||$page=="Kec_luas_wilayah_turen"
						||$page=="Kec_luas_wilayah_wagir"
						||$page=="Kec_luas_wilayah_wajak"
						||$page=="Kec_luas_wilayah_wonosari"
						||$page=="Kec_jumlah_tempat_ibadah_ampelgading"
						||$page=="Kec_jumlah_tempat_ibadah_bantur"
						||$page=="Kec_jumlah_tempat_ibadah_bululawang"
						||$page=="Kec_jumlah_tempat_ibadah_dampit"
						||$page=="Kec_jumlah_tempat_ibadah_dau"
						||$page=="Kec_jumlah_tempat_ibadah_donomulyo"
						||$page=="Kec_jumlah_tempat_ibadah_gedangan"
						||$page=="Kec_jumlah_tempat_ibadah_gondanglegi"
						||$page=="Kec_jumlah_tempat_ibadah_jabung"
						||$page=="Kec_jumlah_tempat_ibadah_kalipare"
						||$page=="Kec_jumlah_tempat_ibadah_karangploso"
						||$page=="Kec_jumlah_tempat_ibadah_kasembon"
						||$page=="Kec_jumlah_tempat_ibadah_kepanjen"
						||$page=="Kec_jumlah_tempat_ibadah_kromengan"
						||$page=="Kec_jumlah_tempat_ibadah_lawang"
						||$page=="Kec_jumlah_tempat_ibadah_ngajum"
						||$page=="Kec_jumlah_tempat_ibadah_ngantang"
						||$page=="Kec_jumlah_tempat_ibadah_pagak"
						||$page=="Kec_jumlah_tempat_ibadah_pagelaran"
						||$page=="Kec_jumlah_tempat_ibadah_pakis"
						||$page=="Kec_jumlah_tempat_ibadah_pakisaji"
						||$page=="Kec_jumlah_tempat_ibadah_poncokusumo"
						||$page=="Kec_jumlah_tempat_ibadah_pujon"
						||$page=="Kec_jumlah_tempat_ibadah_singosari"
						||$page=="Kec_jumlah_tempat_ibadah_sumbermanjing"
						||$page=="Kec_jumlah_tempat_ibadah_sumberpucung"
						||$page=="Kec_jumlah_tempat_ibadah_tajinan"
						||$page=="Kec_jumlah_tempat_ibadah_tirtoyudo"
						||$page=="Kec_jumlah_tempat_ibadah_tumpang"
						||$page=="Kec_jumlah_tempat_ibadah_turen"
						||$page=="Kec_jumlah_tempat_ibadah_wagir"
						||$page=="Kec_jumlah_tempat_ibadah_wajak"
						||$page=="Kec_jumlah_tempat_ibadah_wonosari"
						||$page=="Kec_wisata_lokal_ampelgading"
						||$page=="Kec_wisata_lokal_bantur"
						||$page=="Kec_wisata_lokal_bululawang"
						||$page=="Kec_wisata_lokal_dampit"
						||$page=="Kec_wisata_lokal_dau"
						||$page=="Kec_wisata_lokal_donomulyo"
						||$page=="Kec_wisata_lokal_gedangan"
						||$page=="Kec_wisata_lokal_gondanglegi"
						||$page=="Kec_wisata_lokal_jabung"
						||$page=="Kec_wisata_lokal_kalipare"
						||$page=="Kec_wisata_lokal_karangploso"
						||$page=="Kec_wisata_lokal_kasembon"
						||$page=="Kec_wisata_lokal_kepanjen"
						||$page=="Kec_wisata_lokal_kromengan"
						||$page=="Kec_wisata_lokal_lawang"
						||$page=="Kec_wisata_lokal_ngajum"
						||$page=="Kec_wisata_lokal_ngantang"
						||$page=="Kec_wisata_lokal_pagak"
						||$page=="Kec_wisata_lokal_pagelaran"
						||$page=="Kec_wisata_lokal_pakis"
						||$page=="Kec_wisata_lokal_pakisaji"
						||$page=="Kec_wisata_lokal_poncokusumo"
						||$page=="Kec_wisata_lokal_pujon"
						||$page=="Kec_wisata_lokal_singosari"
						||$page=="Kec_wisata_lokal_sumbermanjing"
						||$page=="Kec_wisata_lokal_sumberpucung"
						||$page=="Kec_wisata_lokal_tajinan"
						||$page=="Kec_wisata_lokal_tirtoyudo"
						||$page=="Kec_wisata_lokal_tumpang"
						||$page=="Kec_wisata_lokal_turen"
						||$page=="Kec_wisata_lokal_wagir"
						||$page=="Kec_wisata_lokal_wajak"
						||$page=="Kec_wisata_lokal_wonosari"
						||$page=="Kec_jumlah_aset_ampelgading"
						||$page=="Kec_jumlah_aset_bantur"
						||$page=="Kec_jumlah_aset_bululawang"
						||$page=="Kec_jumlah_aset_dampit"
						||$page=="Kec_jumlah_aset_dau"
						||$page=="Kec_jumlah_aset_donomulyo"
						||$page=="Kec_jumlah_aset_gedangan"
						||$page=="Kec_jumlah_aset_gondanglegi"
						||$page=="Kec_jumlah_aset_jabung"
						||$page=="Kec_jumlah_aset_kalipare"
						||$page=="Kec_jumlah_aset_karangploso"
						||$page=="Kec_jumlah_aset_kasembon"
						||$page=="Kec_jumlah_aset_kepanjen"
						||$page=="Kec_jumlah_aset_kromengan"
						||$page=="Kec_jumlah_aset_lawang"
						||$page=="Kec_jumlah_aset_ngajum"
						||$page=="Kec_jumlah_aset_ngantang"
						||$page=="Kec_jumlah_aset_pagak"
						||$page=="Kec_jumlah_aset_pagelaran"
						||$page=="Kec_jumlah_aset_pakis"
						||$page=="Kec_jumlah_aset_pakisaji"
						||$page=="Kec_jumlah_aset_poncokusumo"
						||$page=="Kec_jumlah_aset_pujon"
						||$page=="Kec_jumlah_aset_singosari"
						||$page=="Kec_jumlah_aset_sumbermanjing"
						||$page=="Kec_jumlah_aset_sumberpucung"
						||$page=="Kec_jumlah_aset_tajinan"
						||$page=="Kec_jumlah_aset_tirtoyudo"
						||$page=="Kec_jumlah_aset_tumpang"
						||$page=="Kec_jumlah_aset_turen"
						||$page=="Kec_jumlah_aset_wagir"
						||$page=="Kec_jumlah_aset_wajak"
						||$page=="Kec_jumlah_aset_wonosari"
						||$page=="Kec_jumlah_aset_dihapus_ampelgading"
						||$page=="Kec_jumlah_aset_dihapus_bantur"
						||$page=="Kec_jumlah_aset_dihapus_bululawang"
						||$page=="Kec_jumlah_aset_dihapus_dampit"
						||$page=="Kec_jumlah_aset_dihapus_dau"
						||$page=="Kec_jumlah_aset_dihapus_donomulyo"
						||$page=="Kec_jumlah_aset_dihapus_gedangan"
						||$page=="Kec_jumlah_aset_dihapus_gondanglegi"
						||$page=="Kec_jumlah_aset_dihapus_jabung"
						||$page=="Kec_jumlah_aset_dihapus_kalipare"
						||$page=="Kec_jumlah_aset_dihapus_karangploso"
						||$page=="Kec_jumlah_aset_dihapus_kasembon"
						||$page=="Kec_jumlah_aset_dihapus_kepanjen"
						||$page=="Kec_jumlah_aset_dihapus_kromengan"
						||$page=="Kec_jumlah_aset_dihapus_lawang"
						||$page=="Kec_jumlah_aset_dihapus_ngajum"
						||$page=="Kec_jumlah_aset_dihapus_ngantang"
						||$page=="Kec_jumlah_aset_dihapus_pagak"
						||$page=="Kec_jumlah_aset_dihapus_pagelaran"
						||$page=="Kec_jumlah_aset_dihapus_pakis"
						||$page=="Kec_jumlah_aset_dihapus_pakisaji"
						||$page=="Kec_jumlah_aset_dihapus_poncokusumo"
						||$page=="Kec_jumlah_aset_dihapus_pujon"
						||$page=="Kec_jumlah_aset_dihapus_singosari"
						||$page=="Kec_jumlah_aset_dihapus_sumbermanjing"
						||$page=="Kec_jumlah_aset_dihapus_sumberpucung"
						||$page=="Kec_jumlah_aset_dihapus_tajinan"
						||$page=="Kec_jumlah_aset_dihapus_tirtoyudo"
						||$page=="Kec_jumlah_aset_dihapus_tumpang"
						||$page=="Kec_jumlah_aset_dihapus_turen"
						||$page=="Kec_jumlah_aset_dihapus_wagir"
						||$page=="Kec_jumlah_aset_dihapus_wajak"
						||$page=="Kec_jumlah_aset_dihapus_wonosari"
						||$page=="Kec_jumlah_pembinaan_ampelgading"
						||$page=="Kec_jumlah_pembinaan_bantur"
						||$page=="Kec_jumlah_pembinaan_bululawang"
						||$page=="Kec_jumlah_pembinaan_dampit"
						||$page=="Kec_jumlah_pembinaan_dau"
						||$page=="Kec_jumlah_pembinaan_donomulyo"
						||$page=="Kec_jumlah_pembinaan_gedangan"
						||$page=="Kec_jumlah_pembinaan_gondanglegi"
						||$page=="Kec_jumlah_pembinaan_jabung"
						||$page=="Kec_jumlah_pembinaan_kalipare"
						||$page=="Kec_jumlah_pembinaan_karangploso"
						||$page=="Kec_jumlah_pembinaan_kasembon"
						||$page=="Kec_jumlah_pembinaan_kepanjen"
						||$page=="Kec_jumlah_pembinaan_kromengan"
						||$page=="Kec_jumlah_pembinaan_lawang"
						||$page=="Kec_jumlah_pembinaan_ngajum"
						||$page=="Kec_jumlah_pembinaan_ngantang"
						||$page=="Kec_jumlah_pembinaan_pagak"
						||$page=="Kec_jumlah_pembinaan_pagelaran"
						||$page=="Kec_jumlah_pembinaan_pakis"
						||$page=="Kec_jumlah_pembinaan_pakisaji"
						||$page=="Kec_jumlah_pembinaan_poncokusumo"
						||$page=="Kec_jumlah_pembinaan_pujon"
						||$page=="Kec_jumlah_pembinaan_singosari"
						||$page=="Kec_jumlah_pembinaan_sumbermanjing"
						||$page=="Kec_jumlah_pembinaan_sumberpucung"
						||$page=="Kec_jumlah_pembinaan_tajinan"
						||$page=="Kec_jumlah_pembinaan_tirtoyudo"
						||$page=="Kec_jumlah_pembinaan_tumpang"
						||$page=="Kec_jumlah_pembinaan_turen"
						||$page=="Kec_jumlah_pembinaan_wagir"
						||$page=="Kec_jumlah_pembinaan_wajak"
						||$page=="Kec_jumlah_pembinaan_wonosari"
						||$page=="Kec_prestasi_yang_diraih_ampelgading"
						||$page=="Kec_prestasi_yang_diraih_bantur"
						||$page=="Kec_prestasi_yang_diraih_bululawang"
						||$page=="Kec_prestasi_yang_diraih_dampit"
						||$page=="Kec_prestasi_yang_diraih_dau"
						||$page=="Kec_prestasi_yang_diraih_donomulyo"
						||$page=="Kec_prestasi_yang_diraih_gedangan"
						||$page=="Kec_prestasi_yang_diraih_gondanglegi"
						||$page=="Kec_prestasi_yang_diraih_jabung"
						||$page=="Kec_prestasi_yang_diraih_kalipare"
						||$page=="Kec_prestasi_yang_diraih_karangploso"
						||$page=="Kec_prestasi_yang_diraih_kasembon"
						||$page=="Kec_prestasi_yang_diraih_kepanjen"
						||$page=="Kec_prestasi_yang_diraih_kromengan"
						||$page=="Kec_prestasi_yang_diraih_lawang"
						||$page=="Kec_prestasi_yang_diraih_ngajum"
						||$page=="Kec_prestasi_yang_diraih_ngantang"
						||$page=="Kec_prestasi_yang_diraih_pagak"
						||$page=="Kec_prestasi_yang_diraih_pagelaran"
						||$page=="Kec_prestasi_yang_diraih_pakis"
						||$page=="Kec_prestasi_yang_diraih_pakisaji"
						||$page=="Kec_prestasi_yang_diraih_poncokusumo"
						||$page=="Kec_prestasi_yang_diraih_pujon"
						||$page=="Kec_prestasi_yang_diraih_singosari"
						||$page=="Kec_prestasi_yang_diraih_sumbermanjing"
						||$page=="Kec_prestasi_yang_diraih_sumberpucung"
						||$page=="Kec_prestasi_yang_diraih_tajinan"
						||$page=="Kec_prestasi_yang_diraih_tirtoyudo"
						||$page=="Kec_prestasi_yang_diraih_tumpang"
						||$page=="Kec_prestasi_yang_diraih_turen"
						||$page=="Kec_prestasi_yang_diraih_wagir"
						||$page=="Kec_prestasi_yang_diraih_wajak"
						||$page=="Kec_prestasi_yang_diraih_wonosari"
						||$page=="Kec_jamkesmas_ampelgading"
						||$page=="Kec_jamkesmas_bantur"
						||$page=="Kec_jamkesmas_bululawang"
						||$page=="Kec_jamkesmas_dampit"
						||$page=="Kec_jamkesmas_dau"
						||$page=="Kec_jamkesmas_donomulyo"
						||$page=="Kec_jamkesmas_gedangan"
						||$page=="Kec_jamkesmas_gondanglegi"
						||$page=="Kec_jamkesmas_jabung"
						||$page=="Kec_jamkesmas_kalipare"
						||$page=="Kec_jamkesmas_karangploso"
						||$page=="Kec_jamkesmas_kasembon"
						||$page=="Kec_jamkesmas_kepanjen"
						||$page=="Kec_jamkesmas_kromengan"
						||$page=="Kec_jamkesmas_lawang"
						||$page=="Kec_jamkesmas_ngajum"
						||$page=="Kec_jamkesmas_ngantang"
						||$page=="Kec_jamkesmas_pagak"
						||$page=="Kec_jamkesmas_pagelaran"
						||$page=="Kec_jamkesmas_pakis"
						||$page=="Kec_jamkesmas_pakisaji"
						||$page=="Kec_jamkesmas_poncokusumo"
						||$page=="Kec_jamkesmas_pujon"
						||$page=="Kec_jamkesmas_singosari"
						||$page=="Kec_jamkesmas_sumbermanjing"
						||$page=="Kec_jamkesmas_sumberpucung"
						||$page=="Kec_jamkesmas_tajinan"
						||$page=="Kec_jamkesmas_tirtoyudo"
						||$page=="Kec_jamkesmas_tumpang"
						||$page=="Kec_jamkesmas_turen"
						||$page=="Kec_jamkesmas_wagir"
						||$page=="Kec_jamkesmas_wajak"
						||$page=="Kec_jamkesmas_wonosari"
						||$page=="Kec_jumlah_jenis_pelayanan_ampelgading"
						||$page=="Kec_jumlah_jenis_pelayanan_bantur"
						||$page=="Kec_jumlah_jenis_pelayanan_bululawang"
						||$page=="Kec_jumlah_jenis_pelayanan_dampit"
						||$page=="Kec_jumlah_jenis_pelayanan_dau"
						||$page=="Kec_jumlah_jenis_pelayanan_donomulyo"
						||$page=="Kec_jumlah_jenis_pelayanan_gedangan"
						||$page=="Kec_jumlah_jenis_pelayanan_gondanglegi"
						||$page=="Kec_jumlah_jenis_pelayanan_jabung"
						||$page=="Kec_jumlah_jenis_pelayanan_kalipare"
						||$page=="Kec_jumlah_jenis_pelayanan_karangploso"
						||$page=="Kec_jumlah_jenis_pelayanan_kasembon"
						||$page=="Kec_jumlah_jenis_pelayanan_kepanjen"
						||$page=="Kec_jumlah_jenis_pelayanan_kromengan"
						||$page=="Kec_jumlah_jenis_pelayanan_lawang"
						||$page=="Kec_jumlah_jenis_pelayanan_ngajum"
						||$page=="Kec_jumlah_jenis_pelayanan_ngantang"
						||$page=="Kec_jumlah_jenis_pelayanan_pagak"
						||$page=="Kec_jumlah_jenis_pelayanan_pagelaran"
						||$page=="Kec_jumlah_jenis_pelayanan_pakis"
						||$page=="Kec_jumlah_jenis_pelayanan_pakisaji"
						||$page=="Kec_jumlah_jenis_pelayanan_poncokusumo"
						||$page=="Kec_jumlah_jenis_pelayanan_pujon"
						||$page=="Kec_jumlah_jenis_pelayanan_singosari"
						||$page=="Kec_jumlah_jenis_pelayanan_sumbermanjing"
						||$page=="Kec_jumlah_jenis_pelayanan_sumberpucung"
						||$page=="Kec_jumlah_jenis_pelayanan_tajinan"
						||$page=="Kec_jumlah_jenis_pelayanan_tirtoyudo"
						||$page=="Kec_jumlah_jenis_pelayanan_tumpang"
						||$page=="Kec_jumlah_jenis_pelayanan_turen"
						||$page=="Kec_jumlah_jenis_pelayanan_wagir"
						||$page=="Kec_jumlah_jenis_pelayanan_wajak"
						||$page=="Kec_jumlah_jenis_pelayanan_wonosari"
						||$page=="C_master_jenis_pelayanan"
						)
						{echo 'active';}
						?> treeview">
                          <a href="#">
                            <i class="fa fa-folder"></i> <span>Kecamatan</span>
                            <span class="pull-right-container">
                              <i class="fa fa-angle-left pull-right"></i>
                            </span>
                          </a>
						  <ul class="treeview-menu">
						  <li class="<?php if($page=="Mlapanganolahraga"){echo 'active';}?>">  
								<a href="<?= base_url('Mlapanganolahraga'); ?>"><i class="fa fa-arrow-right"></i>Master Lapangan Olahraga</a>
						  </li>
						  <li class="<?php if($page=="Master_aset"){echo 'active';}?>">  
								<a href="<?= base_url('Master_aset'); ?>"><i class="fa fa-arrow-right"></i>Master Aset</a>
						  </li>
						  <li class="<?php if($page=="C_master_jenis_pelayanan"){echo 'active';}?>">  
								<a href="<?= base_url('C_master_jenis_pelayanan'); ?>"><i class="fa fa-arrow-right"></i>Master Jenis Pelayanan</a>
						  </li>
                          <li class="treeview <?php if($page=="Kec_jumlah_jenis_pelayanan_ampelgading"||$page=="Kec_prestasi_yang_diraih_ampelgading"||$page=="Kec_jumlah_aset_dihapus_ampelgading"||$page=="Kec_jumlah_pembinaan_ampelgading"||$page=="Kec_jumlah_aset_ampelgading"||$page=="Kec_wisata_lokal_ampelgading"||$page=="Kec_luas_wilayah_ampelgading"||$page=="Kec_jumlah_tempat_ibadah_ampelgading"||$page=="Ampelgading_struktur_pemerintahan"||$page=="Kec_banyak_lapangan_olahraga_ampelgading"||$page=="Kec_penduduk_berdasarkan_agama_ampelgading"||$page=="Kec_jamkesmas_ampelgading"){echo 'active';}?>">  
								<a href="#"><i class="fa fa-arrow-right"></i><span>Ampel Gading</span>
								<span class="pull-right-container">
								 <i class="fa fa-angle-left pull-right"></i>
								</span>
								</a>
								<ul class="treeview-menu">
									<li class="<?php if($page=="Ampelgading_struktur_pemerintahan"){echo 'active';}?>"><a href="<?= base_url('Ampelgading_struktur_pemerintahan'); ?>"><i class="fa fa-circle-o"></i>Struktur Pemerintahan</a></li>
									<li class="<?php if($page=="Kec_banyak_lapangan_olahraga_ampelgading"){echo 'active';}?>"><a href="<?= base_url('Kec_banyak_lapangan_olahraga_ampelgading'); ?>"><i class="fa fa-circle-o"></i>Banyak Lapangan Olahraga</a></li>
									<li class="<?php if($page=="Kec_penduduk_berdasarkan_agama_ampelgading"){echo 'active';}?>"><a href="<?= base_url('Kec_penduduk_berdasarkan_agama_ampelgading'); ?>"><i class="fa fa-circle-o"></i>Jumlah Berdasarkan Agama</a></li>
									<li class="<?php if($page=="Kec_jumlah_tempat_ibadah_ampelgading"){echo 'active';}?>"><a href="<?= base_url('Kec_jumlah_tempat_ibadah_ampelgading'); ?>"><i class="fa fa-circle-o"></i>Tempat Ibadah</a></li>
									<li class="<?php if($page=="Kec_jumlah_jenis_pelayanan_ampelgading"){echo 'active';}?>" hidden><a href="<?= base_url('Kec_jumlah_jenis_pelayanan_ampelgading'); ?>"><i class="fa fa-circle-o"></i>Pelayanan</a></li>
									<li class="<?php if($page=="Kec_luas_wilayah_ampelgading"){echo 'active';}?>"><a href="<?= base_url('Kec_luas_wilayah_ampelgading'); ?>"><i class="fa fa-circle-o"></i>Luas Wilayah</a></li>
									<li class="<?php if($page=="Kec_wisata_lokal_ampelgading"){echo 'active';}?>"><a href="<?= base_url('Kec_wisata_lokal_ampelgading'); ?>"><i class="fa fa-circle-o"></i>Tempat Wisata Lokal</a></li>
									<li class="<?php if($page=="Kec_jumlah_aset_ampelgading"){echo 'active';}?>"><a href="<?= base_url('Kec_jumlah_aset_ampelgading'); ?>"><i class="fa fa-circle-o"></i>Jumlah Aset</a></li>
									<li class="<?php if($page=="Kec_jumlah_aset_dihapus_ampelgading"){echo 'active';}?>"><a href="<?= base_url('Kec_jumlah_aset_dihapus_ampelgading'); ?>"><i class="fa fa-circle-o"></i>Jumlah Aset Yang DiHapus</a></li>
									<li class="<?php if($page=="Kec_jumlah_pembinaan_ampelgading"){echo 'active';}?>"><a href="<?= base_url('Kec_jumlah_pembinaan_ampelgading'); ?>"><i class="fa fa-circle-o"></i>Pembinaan</a></li>
									<li class="<?php if($page=="Kec_prestasi_yang_diraih_ampelgading"){echo 'active';}?>"><a href="<?= base_url('Kec_prestasi_yang_diraih_ampelgading'); ?>"><i class="fa fa-circle-o"></i>Prestasi Yang Diraih</a></li>
									<li class="<?php if($page=="Kec_jamkesmas_ampelgading"){echo 'active';}?>"><a href="<?= base_url('Kec_jamkesmas_ampelgading'); ?>"><i class="fa fa-circle-o"></i>Jaminan Kesehatan</a></li>
									<li class="<?php if($page=="Kec_jumlah_jenis_pelayanan_ampelgading"){echo 'active';}?>"><a href="<?= base_url('Kec_jumlah_jenis_pelayanan_ampelgading'); ?>"><i class="fa fa-circle-o"></i>Jenis Pelayanan</a></li>
								</ul>
						  </li>
                          <li class="treeview <?php if($page=="Kec_jumlah_jenis_pelayanan_bantur"||$page=="Kec_prestasi_yang_diraih_bantur"||$page=="Kec_jumlah_pembinaan_bantur"||$page=="Kec_jumlah_aset_dihapus_bantur"||$page=="Kec_jumlah_aset_bantur"||$page=="Kec_wisata_lokal_bantur"||$page=="Kec_luas_wilayah_bantur"||$page=="Kec_jumlah_tempat_ibadah_bantur"||$page=="Bantur_struktur_pemerintahan"||$page=="Kec_banyak_lapangan_olahraga_bantur"||$page=="Kec_penduduk_berdasarkan_agama_bantur"||$page=="Kec_jamkesmas_bantur"){echo 'active';}?>">  
								<a href="#"><i class="fa fa-arrow-right"></i><span>Bantur</span>
								<span class="pull-right-container">
								 <i class="fa fa-angle-left pull-right"></i>
								</span>
								</a>
								<ul class="treeview-menu">
									<li class="<?php if($page=="Bantur_struktur_pemerintahan"){echo 'active';}?>"><a href="<?= base_url('Bantur_struktur_pemerintahan'); ?>"><i class="fa fa-circle-o"></i>Struktur Pemerintahan</a></li>
									<li class="<?php if($page=="Kec_banyak_lapangan_olahraga_bantur"){echo 'active';}?>"><a href="<?= base_url('Kec_banyak_lapangan_olahraga_bantur'); ?>"><i class="fa fa-circle-o"></i>Banyak Lapangan Olahraga</a></li>
									<li class="<?php if($page=="Kec_penduduk_berdasarkan_agama_bantur"){echo 'active';}?>"><a href="<?= base_url('Kec_penduduk_berdasarkan_agama_bantur'); ?>"><i class="fa fa-circle-o"></i>Jumlah Berdasarkan Agama</a></li>
									<li class="<?php if($page=="Kec_jumlah_tempat_ibadah_bantur"){echo 'active';}?>"><a href="<?= base_url('Kec_jumlah_tempat_ibadah_bantur'); ?>"><i class="fa fa-circle-o"></i>Tempat Ibadah</a></li>
									<li class="<?php if($page=="Kec_luas_wilayah_bantur"){echo 'active';}?>"><a href="<?= base_url('Kec_luas_wilayah_bantur'); ?>"><i class="fa fa-circle-o"></i>Luas Wilayah</a></li>
									<li class="<?php if($page=="Kec_wisata_lokal_bantur"){echo 'active';}?>"><a href="<?= base_url('Kec_wisata_lokal_bantur'); ?>"><i class="fa fa-circle-o"></i>Tempat Wisata Lokal</a></li>
									<li class="<?php if($page=="Kec_jumlah_aset_bantur"){echo 'active';}?>"><a href="<?= base_url('Kec_jumlah_aset_bantur'); ?>"><i class="fa fa-circle-o"></i>Jumlah Aset</a></li>
									<li class="<?php if($page=="Kec_jumlah_aset_dihapus_bantur"){echo 'active';}?>"><a href="<?= base_url('Kec_jumlah_aset_dihapus_bantur'); ?>"><i class="fa fa-circle-o"></i>Jumlah Aset Yang DiHapus</a></li>
									<li class="<?php if($page=="Kec_jumlah_pembinaan_bantur"){echo 'active';}?>"><a href="<?= base_url('Kec_jumlah_pembinaan_bantur'); ?>"><i class="fa fa-circle-o"></i>Pembinaan</a></li>
									<li class="<?php if($page=="Kec_prestasi_yang_diraih_bantur"){echo 'active';}?>"><a href="<?= base_url('Kec_prestasi_yang_diraih_bantur'); ?>"><i class="fa fa-circle-o"></i>Prestasi Yang Diraih</a></li>
									<li class="<?php if($page=="Kec_jamkesmas_bantur"){echo 'active';}?>"><a href="<?= base_url('Kec_jamkesmas_bantur'); ?>"><i class="fa fa-circle-o"></i>Jaminan Kesehatan</a></li>
									<li class="<?php if($page=="Kec_jumlah_jenis_pelayanan_bantur"){echo 'active';}?>"><a href="<?= base_url('Kec_jumlah_jenis_pelayanan_bantur'); ?>"><i class="fa fa-circle-o"></i>Jenis Pelayanan</a></li>
								</ul>
						  </li>
						  <li class="treeview <?php if($page=="Kec_jumlah_jenis_pelayanan_bululawang"||$page=="Kec_prestasi_yang_diraih_bululawang"||$page=="Kec_jumlah_pembinaan_bululawang"||$page=="Kec_jumlah_aset_dihapus_bululawang"||$page=="Kec_jumlah_aset_bululawang"||$page=="Kec_prestasi_yang_diraih_bululawang"||$page=="Kec_jumlah_pembinaan_bululawang"||$page=="Kec_jumlah_aset_dihapus_bululawang"||$page=="Kec_jumlah_aset_bululawang"||$page=="Kec_wisata_lokal_bululawang"||$page=="Kec_luas_wilayah_bululawang"||$page=="Kec_jumlah_tempat_ibadah_bululawang"||$page=="Bululawang_struktur_pemerintahan"||$page=="Kec_banyak_lapangan_olahraga_bululawang"||$page=="Kec_penduduk_berdasarkan_agama_bululawang"||$page=="Kec_jamkesmas_bululawang"){echo 'active';}?>">  
								<a href="#"><i class="fa fa-arrow-right"></i><span>Bululawang</span>
								<span class="pull-right-container">
								 <i class="fa fa-angle-left pull-right"></i>
								</span>
								</a>
								<ul class="treeview-menu">
									<li class="<?php if($page=="Bululawang_struktur_pemerintahan"){echo 'active';}?>"><a href="<?= base_url('Bululawang_struktur_pemerintahan'); ?>"><i class="fa fa-circle-o"></i>Struktur Pemerintahan</a></li>
									<li class="<?php if($page=="Kec_banyak_lapangan_olahraga_bululawang"){echo 'active';}?>"><a href="<?= base_url('Kec_banyak_lapangan_olahraga_bululawang'); ?>"><i class="fa fa-circle-o"></i>Banyak Lapangan Olahraga</a></li>
									<li class="<?php if($page=="Kec_penduduk_berdasarkan_agama_bululawang"){echo 'active';}?>"><a href="<?= base_url('Kec_penduduk_berdasarkan_agama_bululawang'); ?>"><i class="fa fa-circle-o"></i>Jumlah Berdasarkan Agama</a></li>
									<li class="<?php if($page=="Kec_jumlah_tempat_ibadah_bululawang"){echo 'active';}?>"><a href="<?= base_url('Kec_jumlah_tempat_ibadah_bululawang'); ?>"><i class="fa fa-circle-o"></i>Tempat Ibadah</a></li>
									<li class="<?php if($page=="Kec_luas_wilayah_bululawang"){echo 'active';}?>"><a href="<?= base_url('Kec_luas_wilayah_bululawang'); ?>"><i class="fa fa-circle-o"></i>Luas Wilayah</a></li>
									<li class="<?php if($page=="Kec_wisata_lokal_bululawang"){echo 'active';}?>"><a href="<?= base_url('Kec_wisata_lokal_bululawang'); ?>"><i class="fa fa-circle-o"></i>Tempat Wisata Lokal</a></li>
									<li class="<?php if($page=="Kec_jumlah_aset_bululawang"){echo 'active';}?>"><a href="<?= base_url('Kec_jumlah_aset_bululawang'); ?>"><i class="fa fa-circle-o"></i>Jumlah Aset</a></li>
									<li class="<?php if($page=="Kec_jumlah_aset_dihapus_bululawang"){echo 'active';}?>"><a href="<?= base_url('Kec_jumlah_aset_dihapus_bululawang'); ?>"><i class="fa fa-circle-o"></i>Jumlah Aset Yang DiHapus</a></li>
									<li class="<?php if($page=="Kec_jumlah_pembinaan_bululawang"){echo 'active';}?>"><a href="<?= base_url('Kec_jumlah_pembinaan_bululawang'); ?>"><i class="fa fa-circle-o"></i>Pembinaan</a></li>
									<li class="<?php if($page=="Kec_prestasi_yang_diraih_bululawang"){echo 'active';}?>"><a href="<?= base_url('Kec_prestasi_yang_diraih_bululawang'); ?>"><i class="fa fa-circle-o"></i>Prestasi Yang Diraih</a></li>
									<li class="<?php if($page=="Kec_jamkesmas_bululawang"){echo 'active';}?>"><a href="<?= base_url('Kec_jamkesmas_bululawang'); ?>"><i class="fa fa-circle-o"></i>Jaminan Kesehatan</a></li>
									<li class="<?php if($page=="Kec_jumlah_jenis_pelayanan_bululawang"){echo 'active';}?>"><a href="<?= base_url('Kec_jumlah_jenis_pelayanan_bululawang'); ?>"><i class="fa fa-circle-o"></i>Jenis Pelayanan</a></li>
								</ul>
						  </li>
						  <li class="treeview <?php if($page=="Kec_jumlah_jenis_pelayanan_dampit"||$page=="Kec_prestasi_yang_diraih_dampit"||$page=="Kec_jumlah_pembinaan_dampit"||$page=="Kec_jumlah_aset_dihapus_dampit"||$page=="Kec_jumlah_aset_dampit"||$page=="Kec_wisata_lokal_dampit"||$page=="Kec_luas_wilayah_dampit"||$page=="Kec_jumlah_tempat_ibadah_dampit"||$page=="Dampit_struktur_pemerintahan"||$page=="Kec_banyak_lapangan_olahraga_dampit"||$page=="Kec_penduduk_berdasarkan_agama_dampit"||$page=="Kec_jamkesmas_dampit"){echo 'active';}?>">  
								<a href="#"><i class="fa fa-arrow-right"></i><span>Dampit</span>
								<span class="pull-right-container">
								 <i class="fa fa-angle-left pull-right"></i>
								</span>
								</a>
								<ul class="treeview-menu">
									<li class="<?php if($page=="Dampit_struktur_pemerintahan"){echo 'active';}?>"><a href="<?= base_url('Dampit_struktur_pemerintahan'); ?>"><i class="fa fa-circle-o"></i>Struktur Pemerintahan</a></li>
									<li class="<?php if($page=="Kec_banyak_lapangan_olahraga_dampit"){echo 'active';}?>"><a href="<?= base_url('Kec_banyak_lapangan_olahraga_dampit'); ?>"><i class="fa fa-circle-o"></i>Banyak Lapangan Olahraga</a></li>
									<li class="<?php if($page=="Kec_penduduk_berdasarkan_agama_dampit"){echo 'active';}?>"><a href="<?= base_url('Kec_penduduk_berdasarkan_agama_dampit'); ?>"><i class="fa fa-circle-o"></i>Jumlah Berdasarkan Agama</a></li>
									<li class="<?php if($page=="Kec_jumlah_tempat_ibadah_dampit"){echo 'active';}?>"><a href="<?= base_url('Kec_jumlah_tempat_ibadah_dampit'); ?>"><i class="fa fa-circle-o"></i>Tempat Ibadah</a></li>
									<li class="<?php if($page=="Kec_luas_wilayah_dampit"){echo 'active';}?>"><a href="<?= base_url('Kec_luas_wilayah_dampit'); ?>"><i class="fa fa-circle-o"></i>Luas Wilayah</a></li>
									<li class="<?php if($page=="Kec_wisata_lokal_dampit"){echo 'active';}?>"><a href="<?= base_url('Kec_wisata_lokal_dampit'); ?>"><i class="fa fa-circle-o"></i>Tempat Wisata Lokal</a></li>
									<li class="<?php if($page=="Kec_jumlah_aset_dampit"){echo 'active';}?>"><a href="<?= base_url('Kec_jumlah_aset_dampit'); ?>"><i class="fa fa-circle-o"></i>Jumlah Aset</a></li>
									<li class="<?php if($page=="Kec_jumlah_aset_dihapus_dampit"){echo 'active';}?>"><a href="<?= base_url('Kec_jumlah_aset_dihapus_dampit'); ?>"><i class="fa fa-circle-o"></i>Jumlah Aset Yang DiHapus</a></li>
									<li class="<?php if($page=="Kec_jumlah_pembinaan_dampit"){echo 'active';}?>"><a href="<?= base_url('Kec_jumlah_pembinaan_dampit'); ?>"><i class="fa fa-circle-o"></i>Pembinaan</a></li>
									<li class="<?php if($page=="Kec_prestasi_yang_diraih_dampit"){echo 'active';}?>"><a href="<?= base_url('Kec_prestasi_yang_diraih_dampit'); ?>"><i class="fa fa-circle-o"></i>Prestasi Yang Diraih</a></li>
									<li class="<?php if($page=="Kec_jamkesmas_dampit"){echo 'active';}?>"><a href="<?= base_url('Kec_jamkesmas_dampit'); ?>"><i class="fa fa-circle-o"></i>Jaminan Kesehatan</a></li>
									<li class="<?php if($page=="Kec_jumlah_jenis_pelayanan_dampit"){echo 'active';}?>"><a href="<?= base_url('Kec_jumlah_jenis_pelayanan_dampit'); ?>"><i class="fa fa-circle-o"></i>Jenis Pelayanan</a></li>
								</ul>
						  </li>
						  <li class="treeview <?php if($page=="Kec_jumlah_jenis_pelayanan_dau"||$page=="Kec_prestasi_yang_diraih_dau"||$page=="Kec_jumlah_pembinaan_dau"||$page=="Kec_jumlah_aset_dihapus_dau"||$page=="Kec_jumlah_aset_dau"||$page=="Kec_wisata_lokal_dau"||$page=="Kec_luas_wilayah_dau"||$page=="Kec_jumlah_tempat_ibadah_dau"||$page=="Dau_struktur_pemerintahan"||$page=="Kec_banyak_lapangan_olahraga_dau"||$page=="Kec_penduduk_berdasarkan_agama_dau"||$page=="Kec_jamkesmas_dau"){echo 'active';}?>">  
								<a href="#"><i class="fa fa-arrow-right"></i><span>Dau</span>
								<span class="pull-right-container">
								 <i class="fa fa-angle-left pull-right"></i>
								</span>
								</a>
								<ul class="treeview-menu">
									<li class="<?php if($page=="Dau_struktur_pemerintahan"){echo 'active';}?>"><a href="<?= base_url('Dau_struktur_pemerintahan'); ?>"><i class="fa fa-circle-o"></i>Struktur Pemerintahan</a></li>
									<li class="<?php if($page=="Kec_banyak_lapangan_olahraga_dau"){echo 'active';}?>"><a href="<?= base_url('Kec_banyak_lapangan_olahraga_dau'); ?>"><i class="fa fa-circle-o"></i>Banyak Lapangan Olahraga</a></li>
									<li class="<?php if($page=="Kec_penduduk_berdasarkan_agama_dau"){echo 'active';}?>"><a href="<?= base_url('Kec_penduduk_berdasarkan_agama_dau'); ?>"><i class="fa fa-circle-o"></i>Jumlah Berdasarkan Agama</a></li>
									<li class="<?php if($page=="Kec_jumlah_tempat_ibadah_dau"){echo 'active';}?>"><a href="<?= base_url('Kec_jumlah_tempat_ibadah_dau'); ?>"><i class="fa fa-circle-o"></i>Tempat Ibadah</a></li>
									<li class="<?php if($page=="Kec_luas_wilayah_dau"){echo 'active';}?>"><a href="<?= base_url('Kec_luas_wilayah_dau'); ?>"><i class="fa fa-circle-o"></i>Luas Wilayah</a></li>
									<li class="<?php if($page=="Kec_wisata_lokal_dau"){echo 'active';}?>"><a href="<?= base_url('Kec_wisata_lokal_dau'); ?>"><i class="fa fa-circle-o"></i>Tempat Wisata Lokal</a></li>
									<li class="<?php if($page=="Kec_jumlah_aset_dau"){echo 'active';}?>"><a href="<?= base_url('Kec_jumlah_aset_dau'); ?>"><i class="fa fa-circle-o"></i>Jumlah Aset</a></li>
									<li class="<?php if($page=="Kec_jumlah_aset_dihapus_dau"){echo 'active';}?>"><a href="<?= base_url('Kec_jumlah_aset_dihapus_dau'); ?>"><i class="fa fa-circle-o"></i>Jumlah Aset Yang DiHapus</a></li>
									<li class="<?php if($page=="Kec_jumlah_pembinaan_dau"){echo 'active';}?>"><a href="<?= base_url('Kec_jumlah_pembinaan_dau'); ?>"><i class="fa fa-circle-o"></i>Pembinaan</a></li>
									<li class="<?php if($page=="Kec_prestasi_yang_diraih_dau"){echo 'active';}?>"><a href="<?= base_url('Kec_prestasi_yang_diraih_dau'); ?>"><i class="fa fa-circle-o"></i>Prestasi Yang Diraih</a></li>
									<li class="<?php if($page=="Kec_jamkesmas_dau"){echo 'active';}?>"><a href="<?= base_url('Kec_jamkesmas_dau'); ?>"><i class="fa fa-circle-o"></i>Jaminan Kesehatan</a></li>
									<li class="<?php if($page=="Kec_jumlah_jenis_pelayanan_dau"){echo 'active';}?>"><a href="<?= base_url('Kec_jumlah_jenis_pelayanan_dau'); ?>"><i class="fa fa-circle-o"></i>Jenis Pelayanan</a></li>
								</ul>
						  </li>
						  <li class="treeview <?php if($page=="Kec_jumlah_jenis_pelayanan_donomulyo"||$page=="Kec_prestasi_yang_diraih_donomulyo"||$page=="Kec_jumlah_pembinaan_donomulyo"||$page=="Kec_jumlah_aset_dihapus_donomulyo"||$page=="Kec_jumlah_aset_donomulyo"||$page=="Kec_wisata_lokal_donomulyo"||$page=="Kec_luas_wilayah_donomulyo"||$page=="Kec_jumlah_tempat_ibadah_donomulyo"||$page=="Donomulyo_struktur_pemerintahan"||$page=="Kec_banyak_lapangan_olahraga_donomulyo"||$page=="Kec_penduduk_berdasarkan_agama_donomulyo"||$page=="Kec_jamkesmas_donomulyo"){echo 'active';}?>">  
								<a href="#"><i class="fa fa-arrow-right"></i><span>Donomulyo</span>
								<span class="pull-right-container">
								 <i class="fa fa-angle-left pull-right"></i>
								</span>
								</a>
								<ul class="treeview-menu">
									<li class="<?php if($page=="Donomulyo_struktur_pemerintahan"){echo 'active';}?>"><a href="<?= base_url('Donomulyo_struktur_pemerintahan'); ?>"><i class="fa fa-circle-o"></i>Struktur Pemerintahan</a></li>
									<li class="<?php if($page=="Kec_banyak_lapangan_olahraga_donomulyo"){echo 'active';}?>"><a href="<?= base_url('Kec_banyak_lapangan_olahraga_donomulyo'); ?>"><i class="fa fa-circle-o"></i>Banyak Lapangan Olahraga</a></li>
									<li class="<?php if($page=="Kec_penduduk_berdasarkan_agama_donomulyo"){echo 'active';}?>"><a href="<?= base_url('Kec_penduduk_berdasarkan_agama_donomulyo'); ?>"><i class="fa fa-circle-o"></i>Jumlah Berdasarkan Agama</a></li>
									<li class="<?php if($page=="Kec_jumlah_tempat_ibadah_donomulyo"){echo 'active';}?>"><a href="<?= base_url('Kec_jumlah_tempat_ibadah_donomulyo'); ?>"><i class="fa fa-circle-o"></i>Tempat Ibadah</a></li>
									<li class="<?php if($page=="Kec_luas_wilayah_donomulyo"){echo 'active';}?>"><a href="<?= base_url('Kec_luas_wilayah_donomulyo'); ?>"><i class="fa fa-circle-o"></i>Luas Wilayah</a></li>
									<li class="<?php if($page=="Kec_wisata_lokal_donomulyo"){echo 'active';}?>"><a href="<?= base_url('Kec_wisata_lokal_donomulyo'); ?>"><i class="fa fa-circle-o"></i>Tempat Wisata Lokal</a></li>
									<li class="<?php if($page=="Kec_jumlah_aset_donomulyo"){echo 'active';}?>"><a href="<?= base_url('Kec_jumlah_aset_donomulyo'); ?>"><i class="fa fa-circle-o"></i>Jumlah Aset</a></li>
									<li class="<?php if($page=="Kec_jumlah_aset_dihapus_donomulyo"){echo 'active';}?>"><a href="<?= base_url('Kec_jumlah_aset_dihapus_donomulyo'); ?>"><i class="fa fa-circle-o"></i>Jumlah Aset Yang DiHapus</a></li>
									<li class="<?php if($page=="Kec_jumlah_pembinaan_donomulyo"){echo 'active';}?>"><a href="<?= base_url('Kec_jumlah_pembinaan_donomulyo'); ?>"><i class="fa fa-circle-o"></i>Pembinaan</a></li>
									<li class="<?php if($page=="Kec_prestasi_yang_diraih_donomulyo"){echo 'active';}?>"><a href="<?= base_url('Kec_prestasi_yang_diraih_donomulyo'); ?>"><i class="fa fa-circle-o"></i>Prestasi Yang Diraih</a></li>
									<li class="<?php if($page=="Kec_jamkesmas_donomulyo"){echo 'active';}?>"><a href="<?= base_url('Kec_jamkesmas_donomulyo'); ?>"><i class="fa fa-circle-o"></i>Jaminan Kesehatan</a></li>
									<li class="<?php if($page=="Kec_jumlah_jenis_pelayanan_donomulyo"){echo 'active';}?>"><a href="<?= base_url('Kec_jumlah_jenis_pelayanan_donomulyo'); ?>"><i class="fa fa-circle-o"></i>Jenis Pelayanan</a></li>
								</ul>
						  </li>
						  <li class="treeview <?php if($page=="Kec_jumlah_jenis_pelayanan_gedangan"||$page=="Kec_prestasi_yang_diraih_gedangan"||$page=="Kec_jumlah_pembinaan_gedangan"||$page=="Kec_jumlah_aset_dihapus_gedangan"||$page=="Kec_jumlah_aset_gedangan"||$page=="Kec_wisata_lokal_gedangan"||$page=="Kec_luas_wilayah_gedangan"||$page=="Kec_jumlah_tempat_ibadah_gedangan"||$page=="Gedangan_struktur_pemerintahan"||$page=="Kec_banyak_lapangan_olahraga_gedangan"||$page=="Kec_penduduk_berdasarkan_agama_gedangan"||$page=="Kec_jamkesmas_gedangan"){echo 'active';}?>">  
								<a href="#"><i class="fa fa-arrow-right"></i><span>Gedangan</span>
								<span class="pull-right-container">
								 <i class="fa fa-angle-left pull-right"></i>
								</span>
								</a>
								<ul class="treeview-menu">
									<li class="<?php if($page=="Gedangan_struktur_pemerintahan"){echo 'active';}?>"><a href="<?= base_url('Gedangan_struktur_pemerintahan'); ?>"><i class="fa fa-circle-o"></i>Struktur Pemerintahan</a></li>
									<li class="<?php if($page=="Kec_banyak_lapangan_olahraga_gedangan"){echo 'active';}?>"><a href="<?= base_url('Kec_banyak_lapangan_olahraga_gedangan'); ?>"><i class="fa fa-circle-o"></i>Banyak Lapangan Olahraga</a></li>
									<li class="<?php if($page=="Kec_penduduk_berdasarkan_agama_gedangan"){echo 'active';}?>"><a href="<?= base_url('Kec_penduduk_berdasarkan_agama_gedangan'); ?>"><i class="fa fa-circle-o"></i>Jumlah Berdasarkan Agama</a></li>
									<li class="<?php if($page=="Kec_jumlah_tempat_ibadah_gedangan"){echo 'active';}?>"><a href="<?= base_url('Kec_jumlah_tempat_ibadah_gedangan'); ?>"><i class="fa fa-circle-o"></i>Tempat Ibadah</a></li>
									<li class="<?php if($page=="Kec_luas_wilayah_gedangan"){echo 'active';}?>"><a href="<?= base_url('Kec_luas_wilayah_gedangan'); ?>"><i class="fa fa-circle-o"></i>Luas Wilayah</a></li>
									<li class="<?php if($page=="Kec_wisata_lokal_gedangan"){echo 'active';}?>"><a href="<?= base_url('Kec_wisata_lokal_gedangan'); ?>"><i class="fa fa-circle-o"></i>Tempat Wisata Lokal</a></li>
									<li class="<?php if($page=="Kec_jumlah_aset_gedangan"){echo 'active';}?>"><a href="<?= base_url('Kec_jumlah_aset_gedangan'); ?>"><i class="fa fa-circle-o"></i>Jumlah Aset</a></li>
									<li class="<?php if($page=="Kec_jumlah_aset_dihapus_gedangan"){echo 'active';}?>"><a href="<?= base_url('Kec_jumlah_aset_dihapus_gedangan'); ?>"><i class="fa fa-circle-o"></i>Jumlah Aset Yang DiHapus</a></li>
									<li class="<?php if($page=="Kec_jumlah_pembinaan_gedangan"){echo 'active';}?>"><a href="<?= base_url('Kec_jumlah_pembinaan_gedangan'); ?>"><i class="fa fa-circle-o"></i>Pembinaan</a></li>
									<li class="<?php if($page=="Kec_prestasi_yang_diraih_gedangan"){echo 'active';}?>"><a href="<?= base_url('Kec_prestasi_yang_diraih_gedangan'); ?>"><i class="fa fa-circle-o"></i>Prestasi Yang Diraih</a></li>
									<li class="<?php if($page=="Kec_jamkesmas_gedangan"){echo 'active';}?>"><a href="<?= base_url('Kec_jamkesmas_gedangan'); ?>"><i class="fa fa-circle-o"></i>Jaminan Kesehatan</a></li>
									<li class="<?php if($page=="Kec_jumlah_jenis_pelayanan_gedangan"){echo 'active';}?>"><a href="<?= base_url('Kec_jumlah_jenis_pelayanan_gedangan'); ?>"><i class="fa fa-circle-o"></i>Jenis Pelayanan</a></li>
								</ul>
						  </li>
						  <li class="treeview <?php if($page=="Kec_jumlah_jenis_pelayanan_gondanglegi"||$page=="Kec_prestasi_yang_diraih_gondanglegi"||$page=="Kec_jumlah_pembinaan_gondanglegi"||$page=="Kec_jumlah_aset_dihapus_gondanglegi"||$page=="Kec_jumlah_aset_gondanglegi"||$page=="Kec_wisata_lokal_gondanglegi"||$page=="Kec_luas_wilayah_gondanglegi"||$page=="Kec_jumlah_tempat_ibadah_gondanglegi"||$page=="Gondanglegi_struktur_pemerintahan"||$page=="Kec_banyak_lapangan_olahraga_gondanglegi"||$page=="Kec_penduduk_berdasarkan_agama_gondanglegi"||$page=="Kec_jamkesmas_gondanglegi"){echo 'active';}?>">  
								<a href="#"><i class="fa fa-arrow-right"></i><span>Gondanglegi</span>
								<span class="pull-right-container">
								 <i class="fa fa-angle-left pull-right"></i>
								</span>
								</a>
								<ul class="treeview-menu">
									<li class="<?php if($page=="Gondanglegi_struktur_pemerintahan"){echo 'active';}?>"><a href="<?= base_url('Gondanglegi_struktur_pemerintahan'); ?>"><i class="fa fa-circle-o"></i>Struktur Pemerintahan</a></li>
									<li class="<?php if($page=="Kec_banyak_lapangan_olahraga_gondanglegi"){echo 'active';}?>"><a href="<?= base_url('Kec_banyak_lapangan_olahraga_gondanglegi'); ?>"><i class="fa fa-circle-o"></i>Banyak Lapangan Olahraga</a></li>
									<li class="<?php if($page=="Kec_penduduk_berdasarkan_agama_gondanglegi"){echo 'active';}?>"><a href="<?= base_url('Kec_penduduk_berdasarkan_agama_gondanglegi'); ?>"><i class="fa fa-circle-o"></i>Jumlah Berdasarkan Agama</a></li>
									<li class="<?php if($page=="Kec_jumlah_tempat_ibadah_gondanglegi"){echo 'active';}?>"><a href="<?= base_url('Kec_jumlah_tempat_ibadah_gondanglegi'); ?>"><i class="fa fa-circle-o"></i>Tempat Ibadah</a></li>
									<li class="<?php if($page=="Kec_luas_wilayah_gondanglegi"){echo 'active';}?>"><a href="<?= base_url('Kec_luas_wilayah_gondanglegi'); ?>"><i class="fa fa-circle-o"></i>Luas Wilayah</a></li>
									<li class="<?php if($page=="Kec_wisata_lokal_gondanglegi"){echo 'active';}?>"><a href="<?= base_url('Kec_wisata_lokal_gondanglegi'); ?>"><i class="fa fa-circle-o"></i>Tempat Wisata Lokal</a></li>
									<li class="<?php if($page=="Kec_jumlah_aset_gondanglegi"){echo 'active';}?>"><a href="<?= base_url('Kec_jumlah_aset_gondanglegi'); ?>"><i class="fa fa-circle-o"></i>Jumlah Aset</a></li>
									<li class="<?php if($page=="Kec_jumlah_aset_dihapus_gondanglegi"){echo 'active';}?>"><a href="<?= base_url('Kec_jumlah_aset_dihapus_gondanglegi'); ?>"><i class="fa fa-circle-o"></i>Jumlah Aset Yang DiHapus</a></li>
									<li class="<?php if($page=="Kec_jumlah_pembinaan_gondanglegi"){echo 'active';}?>"><a href="<?= base_url('Kec_jumlah_pembinaan_gondanglegi'); ?>"><i class="fa fa-circle-o"></i>Pembinaan</a></li>
									<li class="<?php if($page=="Kec_prestasi_yang_diraih_gondanglegi"){echo 'active';}?>"><a href="<?= base_url('Kec_prestasi_yang_diraih_gondanglegi'); ?>"><i class="fa fa-circle-o"></i>Prestasi Yang Diraih</a></li>
									<li class="<?php if($page=="Kec_jamkesmas_gondanglegi"){echo 'active';}?>"><a href="<?= base_url('Kec_jamkesmas_gondanglegi'); ?>"><i class="fa fa-circle-o"></i>Jaminan Kesehatan</a></li>
									<li class="<?php if($page=="Kec_jumlah_jenis_pelayanan_gondanglegi"){echo 'active';}?>"><a href="<?= base_url('Kec_jumlah_jenis_pelayanan_gondanglegi'); ?>"><i class="fa fa-circle-o"></i>Jenis Pelayanan</a></li>
								</ul>
						  </li>
						  <li class="treeview <?php if($page=="Kec_jumlah_jenis_pelayanan_jabung"||$page=="Kec_prestasi_yang_diraih_jabung"||$page=="Kec_jumlah_pembinaan_jabung"||$page=="Kec_jumlah_aset_dihapus_jabung"||$page=="Kec_jumlah_aset_jabung"||$page=="Kec_wisata_lokal_jabung"||$page=="Kec_luas_wilayah_jabung"||$page=="Kec_jumlah_tempat_ibadah_jabung"||$page=="Jabung_struktur_pemerintahan"||$page=="Kec_banyak_lapangan_olahraga_jabung"||$page=="Kec_penduduk_berdasarkan_agama_jabung"||$page=="Kec_jamkesmas_jabung"){echo 'active';}?>">  
								<a href="#"><i class="fa fa-arrow-right"></i><span>Jabung</span>
								<span class="pull-right-container">
								 <i class="fa fa-angle-left pull-right"></i>
								</span>
								</a>
								<ul class="treeview-menu">
									<li class="<?php if($page=="Jabung_struktur_pemerintahan"){echo 'active';}?>"><a href="<?= base_url('Jabung_struktur_pemerintahan'); ?>"><i class="fa fa-circle-o"></i>Struktur Pemerintahan</a></li>
									<li class="<?php if($page=="Kec_banyak_lapangan_olahraga_jabung"){echo 'active';}?>"><a href="<?= base_url('Kec_banyak_lapangan_olahraga_jabung'); ?>"><i class="fa fa-circle-o"></i>Banyak Lapangan Olahraga</a></li>
									<li class="<?php if($page=="Kec_penduduk_berdasarkan_agama_jabung"){echo 'active';}?>"><a href="<?= base_url('Kec_penduduk_berdasarkan_agama_jabung'); ?>"><i class="fa fa-circle-o"></i>Jumlah Berdasarkan Agama</a></li>
									<li class="<?php if($page=="Kec_jumlah_tempat_ibadah_jabung"){echo 'active';}?>"><a href="<?= base_url('Kec_jumlah_tempat_ibadah_jabung'); ?>"><i class="fa fa-circle-o"></i>Tempat Ibadah</a></li>
									<li class="<?php if($page=="Kec_luas_wilayah_jabung"){echo 'active';}?>"><a href="<?= base_url('Kec_luas_wilayah_jabung'); ?>"><i class="fa fa-circle-o"></i>Luas Wilayah</a></li>
									<li class="<?php if($page=="Kec_wisata_lokal_jabung"){echo 'active';}?>"><a href="<?= base_url('Kec_wisata_lokal_jabung'); ?>"><i class="fa fa-circle-o"></i>Tempat Wisata Lokal</a></li>
									<li class="<?php if($page=="Kec_jumlah_aset_jabung"){echo 'active';}?>"><a href="<?= base_url('Kec_jumlah_aset_jabung'); ?>"><i class="fa fa-circle-o"></i>Jumlah Aset</a></li>
									<li class="<?php if($page=="Kec_jumlah_aset_dihapus_jabung"){echo 'active';}?>"><a href="<?= base_url('Kec_jumlah_aset_dihapus_jabung'); ?>"><i class="fa fa-circle-o"></i>Jumlah Aset Yang DiHapus</a></li>
									<li class="<?php if($page=="Kec_jumlah_pembinaan_jabung"){echo 'active';}?>"><a href="<?= base_url('Kec_jumlah_pembinaan_jabung'); ?>"><i class="fa fa-circle-o"></i>Pembinaan</a></li>
									<li class="<?php if($page=="Kec_prestasi_yang_diraih_jabung"){echo 'active';}?>"><a href="<?= base_url('Kec_prestasi_yang_diraih_jabung'); ?>"><i class="fa fa-circle-o"></i>Prestasi Yang Diraih</a></li>
									<li class="<?php if($page=="Kec_jamkesmas_jabung"){echo 'active';}?>"><a href="<?= base_url('Kec_jamkesmas_jabung'); ?>"><i class="fa fa-circle-o"></i>Jaminan Kesehatan</a></li>
									<li class="<?php if($page=="Kec_jumlah_jenis_pelayanan_jabung"){echo 'active';}?>"><a href="<?= base_url('Kec_jumlah_jenis_pelayanan_jabung'); ?>"><i class="fa fa-circle-o"></i>Jenis Pelayanan</a></li>
								</ul>
						  </li>
						  <li class="treeview <?php if($page=="Kec_jumlah_jenis_pelayanan_kalipare"||$page=="Kec_prestasi_yang_diraih_kalipare"||$page=="Kec_jumlah_pembinaan_kalipare"||$page=="Kec_jumlah_aset_dihapus_kalipare"||$page=="Kec_jumlah_aset_kalipare"||$page=="Kec_wisata_lokal_kalipare"||$page=="Kec_luas_wilayah_kalipare"||$page=="Kec_jumlah_tempat_ibadah_kalipare"||$page=="Kalipare_struktur_pemerintahan"||$page=="Kec_banyak_lapangan_olahraga_kalipare"||$page=="Kec_penduduk_berdasarkan_agama_kalipare"||$page=="Kec_jamkesmas_kalipare"){echo 'active';}?>">  
								<a href="#"><i class="fa fa-arrow-right"></i><span>Kalipare</span>
								<span class="pull-right-container">
								 <i class="fa fa-angle-left pull-right"></i>
								</span>
								</a>
								<ul class="treeview-menu">
									<li class="<?php if($page=="Kalipare_struktur_pemerintahan"){echo 'active';}?>"><a href="<?= base_url('Kalipare_struktur_pemerintahan'); ?>"><i class="fa fa-circle-o"></i>Struktur Pemerintahan</a></li>
									<li class="<?php if($page=="Kec_banyak_lapangan_olahraga_kalipare"){echo 'active';}?>"><a href="<?= base_url('Kec_banyak_lapangan_olahraga_kalipare'); ?>"><i class="fa fa-circle-o"></i>Banyak Lapangan Olahraga</a></li>
									<li class="<?php if($page=="Kec_penduduk_berdasarkan_agama_kalipare"){echo 'active';}?>"><a href="<?= base_url('Kec_penduduk_berdasarkan_agama_kalipare'); ?>"><i class="fa fa-circle-o"></i>Jumlah Berdasarkan Agama</a></li>
									<li class="<?php if($page=="Kec_jumlah_tempat_ibadah_kalipare"){echo 'active';}?>"><a href="<?= base_url('Kec_jumlah_tempat_ibadah_kalipare'); ?>"><i class="fa fa-circle-o"></i>Tempat Ibadah</a></li>
									<li class="<?php if($page=="Kec_luas_wilayah_kalipare"){echo 'active';}?>"><a href="<?= base_url('Kec_luas_wilayah_kalipare'); ?>"><i class="fa fa-circle-o"></i>Luas Wilayah</a></li>
									<li class="<?php if($page=="Kec_wisata_lokal_kalipare"){echo 'active';}?>"><a href="<?= base_url('Kec_wisata_lokal_kalipare'); ?>"><i class="fa fa-circle-o"></i>Tempat Wisata Lokal</a></li>
									<li class="<?php if($page=="Kec_jumlah_aset_kalipare"){echo 'active';}?>"><a href="<?= base_url('Kec_jumlah_aset_kalipare'); ?>"><i class="fa fa-circle-o"></i>Jumlah Aset</a></li>
									<li class="<?php if($page=="Kec_jumlah_aset_dihapus_kalipare"){echo 'active';}?>"><a href="<?= base_url('Kec_jumlah_aset_dihapus_kalipare'); ?>"><i class="fa fa-circle-o"></i>Jumlah Aset Yang DiHapus</a></li>
									<li class="<?php if($page=="Kec_jumlah_pembinaan_kalipare"){echo 'active';}?>"><a href="<?= base_url('Kec_jumlah_pembinaan_kalipare'); ?>"><i class="fa fa-circle-o"></i>Pembinaan</a></li>
									<li class="<?php if($page=="Kec_prestasi_yang_diraih_kalipare"){echo 'active';}?>"><a href="<?= base_url('Kec_prestasi_yang_diraih_kalipare'); ?>"><i class="fa fa-circle-o"></i>Prestasi Yang Diraih</a></li>
									<li class="<?php if($page=="Kec_jamkesmas_kalipare"){echo 'active';}?>"><a href="<?= base_url('Kec_jamkesmas_kalipare'); ?>"><i class="fa fa-circle-o"></i>Jaminan Kesehatan</a></li>
									<li class="<?php if($page=="Kec_jumlah_jenis_pelayanan_kalipare"){echo 'active';}?>"><a href="<?= base_url('Kec_jumlah_jenis_pelayanan_kalipare'); ?>"><i class="fa fa-circle-o"></i>Jenis Pelayanan</a></li>
								</ul>
						  </li>
						  <li class="treeview <?php if($page=="Kec_jumlah_jenis_pelayanan_karangploso"||$page=="Kec_prestasi_yang_diraih_karangploso"||$page=="Kec_jumlah_pembinaan_karangploso"||$page=="Kec_jumlah_aset_dihapus_karangploso"||$page=="Kec_jumlah_aset_karangploso"||$page=="Kec_wisata_lokal_karangploso"||$page=="Kec_luas_wilayah_karangploso"||$page=="Kec_jumlah_tempat_ibadah_karangploso"||$page=="Karangploso_struktur_pemerintahan"||$page=="Kec_banyak_lapangan_olahraga_karangploso"||$page=="Kec_penduduk_berdasarkan_agama_karangploso"||$page=="Kec_jamkesmas_karangploso"){echo 'active';}?>">  
								<a href="#"><i class="fa fa-arrow-right"></i><span>Karangploso</span>
								<span class="pull-right-container">
								 <i class="fa fa-angle-left pull-right"></i>
								</span>
								</a>
								<ul class="treeview-menu">
									<li class="<?php if($page=="Karangploso_struktur_pemerintahan"){echo 'active';}?>"><a href="<?= base_url('Karangploso_struktur_pemerintahan'); ?>"><i class="fa fa-circle-o"></i>Struktur Pemerintahan</a></li>
									<li class="<?php if($page=="Kec_banyak_lapangan_olahraga_karangploso"){echo 'active';}?>"><a href="<?= base_url('Kec_banyak_lapangan_olahraga_karangploso'); ?>"><i class="fa fa-circle-o"></i>Banyak Lapangan Olahraga</a></li>
									<li class="<?php if($page=="Kec_penduduk_berdasarkan_agama_karangploso"){echo 'active';}?>"><a href="<?= base_url('Kec_penduduk_berdasarkan_agama_karangploso'); ?>"><i class="fa fa-circle-o"></i>Jumlah Berdasarkan Agama</a></li>
									<li class="<?php if($page=="Kec_jumlah_tempat_ibadah_karangploso"){echo 'active';}?>"><a href="<?= base_url('Kec_jumlah_tempat_ibadah_karangploso'); ?>"><i class="fa fa-circle-o"></i>Tempat Ibadah</a></li>
									<li class="<?php if($page=="Kec_luas_wilayah_karangploso"){echo 'active';}?>"><a href="<?= base_url('Kec_luas_wilayah_karangploso'); ?>"><i class="fa fa-circle-o"></i>Luas Wilayah</a></li>
									<li class="<?php if($page=="Kec_wisata_lokal_karangploso"){echo 'active';}?>"><a href="<?= base_url('Kec_wisata_lokal_karangploso'); ?>"><i class="fa fa-circle-o"></i>Tempat Wisata Lokal</a></li>
									<li class="<?php if($page=="Kec_jumlah_aset_karangploso"){echo 'active';}?>"><a href="<?= base_url('Kec_jumlah_aset_karangploso'); ?>"><i class="fa fa-circle-o"></i>Jumlah Aset</a></li>
									<li class="<?php if($page=="Kec_jumlah_aset_dihapus_karangploso"){echo 'active';}?>"><a href="<?= base_url('Kec_jumlah_aset_dihapus_karangploso'); ?>"><i class="fa fa-circle-o"></i>Jumlah Aset Yang DiHapus</a></li>
									<li class="<?php if($page=="Kec_jumlah_pembinaan_karangploso"){echo 'active';}?>"><a href="<?= base_url('Kec_jumlah_pembinaan_karangploso'); ?>"><i class="fa fa-circle-o"></i>Pembinaan</a></li>
									<li class="<?php if($page=="Kec_prestasi_yang_diraih_karangploso"){echo 'active';}?>"><a href="<?= base_url('Kec_prestasi_yang_diraih_karangploso'); ?>"><i class="fa fa-circle-o"></i>Prestasi Yang Diraih</a></li>
									<li class="<?php if($page=="Kec_jamkesmas_karangploso"){echo 'active';}?>"><a href="<?= base_url('Kec_jamkesmas_karangploso'); ?>"><i class="fa fa-circle-o"></i>Jaminan Kesehatan</a></li>
									<li class="<?php if($page=="Kec_jumlah_jenis_pelayanan_karangploso"){echo 'active';}?>"><a href="<?= base_url('Kec_jumlah_jenis_pelayanan_karangploso'); ?>"><i class="fa fa-circle-o"></i>Jenis Pelayanan</a></li>
								</ul>
						  </li>
						  <li class="treeview <?php if($page=="Kec_jumlah_jenis_pelayanan_kasembon"||$page=="Kec_prestasi_yang_diraih_kasembon"||$page=="Kec_jumlah_pembinaan_kasembon"||$page=="Kec_jumlah_aset_dihapus_kasembon"||$page=="Kec_jumlah_aset_kasembon"||$page=="Kec_wisata_lokal_kasembon"||$page=="Kec_luas_wilayah_kasembon"||$page=="Kec_jumlah_tempat_ibadah_kasembon"||$page=="Kasembon_struktur_pemerintahan"||$page=="Kec_banyak_lapangan_olahraga_kasembon"||$page=="Kec_penduduk_berdasarkan_agama_kasembon"||$page=="Kec_jamkesmas_kasembon"){echo 'active';}?>">  
								<a href="#"><i class="fa fa-arrow-right"></i><span>Kasembon</span>
								<span class="pull-right-container">
								 <i class="fa fa-angle-left pull-right"></i>
								</span>
								</a>
								<ul class="treeview-menu">
									<li class="<?php if($page=="Kasembon_struktur_pemerintahan"){echo 'active';}?>"><a href="<?= base_url('Kasembon_struktur_pemerintahan'); ?>"><i class="fa fa-circle-o"></i>Struktur Pemerintahan</a></li>
									<li class="<?php if($page=="Kec_banyak_lapangan_olahraga_kasembon"){echo 'active';}?>"><a href="<?= base_url('Kec_banyak_lapangan_olahraga_kasembon'); ?>"><i class="fa fa-circle-o"></i>Banyak Lapangan Olahraga</a></li>
									<li class="<?php if($page=="Kec_penduduk_berdasarkan_agama_kasembon"){echo 'active';}?>"><a href="<?= base_url('Kec_penduduk_berdasarkan_agama_kasembon'); ?>"><i class="fa fa-circle-o"></i>Jumlah Berdasarkan Agama</a></li>
									<li class="<?php if($page=="Kec_jumlah_tempat_ibadah_kasembon"){echo 'active';}?>"><a href="<?= base_url('Kec_jumlah_tempat_ibadah_kasembon'); ?>"><i class="fa fa-circle-o"></i>Tempat Ibadah</a></li>
									<li class="<?php if($page=="Kec_luas_wilayah_kasembon"){echo 'active';}?>"><a href="<?= base_url('Kec_luas_wilayah_kasembon'); ?>"><i class="fa fa-circle-o"></i>Luas Wilayah</a></li>
									<li class="<?php if($page=="Kec_wisata_lokal_kasembon"){echo 'active';}?>"><a href="<?= base_url('Kec_wisata_lokal_kasembon'); ?>"><i class="fa fa-circle-o"></i>Tempat Wisata Lokal</a></li>
									<li class="<?php if($page=="Kec_jumlah_aset_kasembon"){echo 'active';}?>"><a href="<?= base_url('Kec_jumlah_aset_kasembon'); ?>"><i class="fa fa-circle-o"></i>Jumlah Aset</a></li>
									<li class="<?php if($page=="Kec_jumlah_aset_dihapus_kasembon"){echo 'active';}?>"><a href="<?= base_url('Kec_jumlah_aset_dihapus_kasembon'); ?>"><i class="fa fa-circle-o"></i>Jumlah Aset Yang DiHapus</a></li>
									<li class="<?php if($page=="Kec_jumlah_pembinaan_kasembon"){echo 'active';}?>"><a href="<?= base_url('Kec_jumlah_pembinaan_kasembon'); ?>"><i class="fa fa-circle-o"></i>Pembinaan</a></li>
									<li class="<?php if($page=="Kec_prestasi_yang_diraih_kasembon"){echo 'active';}?>"><a href="<?= base_url('Kec_prestasi_yang_diraih_kasembon'); ?>"><i class="fa fa-circle-o"></i>Prestasi Yang Diraih</a></li>
									<li class="<?php if($page=="Kec_jamkesmas_kasembon"){echo 'active';}?>"><a href="<?= base_url('Kec_jamkesmas_kasembon'); ?>"><i class="fa fa-circle-o"></i>Jaminan Kesehatan</a></li>
									<li class="<?php if($page=="Kec_jumlah_jenis_pelayanan_kasembon"){echo 'active';}?>"><a href="<?= base_url('Kec_jumlah_jenis_pelayanan_kasembon'); ?>"><i class="fa fa-circle-o"></i>Jenis Pelayanan</a></li>
								</ul>

						  </li>
						  <li class="treeview <?php if($page=="Kec_jumlah_jenis_pelayanan_kepanjen"||$page=="Kec_prestasi_yang_diraih_kepanjen"||$page=="Kec_jumlah_pembinaan_kepanjen"||$page=="Kec_jumlah_aset_dihapus_kepanjen"||$page=="Kec_jumlah_aset_kepanjen"||$page=="Kec_wisata_lokal_kepanjen"||$page=="Kec_luas_wilayah_kepanjen"||$page=="Kec_jumlah_tempat_ibadah_kepanjen"||$page=="Kepanjen_struktur_pemerintahan"||$page=="Kec_banyak_lapangan_olahraga_kepanjen"||$page=="Kec_penduduk_berdasarkan_agama_kepanjen"||$page=="Kec_jamkesmas_kepanjen"){echo 'active';}?>">  
								<a href="#"><i class="fa fa-arrow-right"></i><span>Kepanjen</span>
								<span class="pull-right-container">
								 <i class="fa fa-angle-left pull-right"></i>
								</span>
								</a>
								<ul class="treeview-menu">
									<li class="<?php if($page=="Kepanjen_struktur_pemerintahan"){echo 'active';}?>"><a href="<?= base_url('Kepanjen_struktur_pemerintahan'); ?>"><i class="fa fa-circle-o"></i>Struktur Pemerintahan</a></li>
									<li class="<?php if($page=="Kec_banyak_lapangan_olahraga_kepanjen"){echo 'active';}?>"><a href="<?= base_url('Kec_banyak_lapangan_olahraga_kepanjen'); ?>"><i class="fa fa-circle-o"></i>Banyak Lapangan Olahraga</a></li>
									<li class="<?php if($page=="Kec_penduduk_berdasarkan_agama_kepanjen"){echo 'active';}?>"><a href="<?= base_url('Kec_penduduk_berdasarkan_agama_kepanjen'); ?>"><i class="fa fa-circle-o"></i>Jumlah Berdasarkan Agama</a></li>
									<li class="<?php if($page=="Kec_jumlah_tempat_ibadah_kepanjen"){echo 'active';}?>"><a href="<?= base_url('Kec_jumlah_tempat_ibadah_kepanjen'); ?>"><i class="fa fa-circle-o"></i>Tempat Ibadah</a></li>
									<li class="<?php if($page=="Kec_luas_wilayah_kepanjen"){echo 'active';}?>"><a href="<?= base_url('Kec_luas_wilayah_kepanjen'); ?>"><i class="fa fa-circle-o"></i>Luas Wilayah</a></li>
									<li class="<?php if($page=="Kec_wisata_lokal_kepanjen"){echo 'active';}?>"><a href="<?= base_url('Kec_wisata_lokal_kepanjen'); ?>"><i class="fa fa-circle-o"></i>Tempat Wisata Lokal</a></li>
									<li class="<?php if($page=="Kec_jumlah_aset_kepanjen"){echo 'active';}?>"><a href="<?= base_url('Kec_jumlah_aset_kepanjen'); ?>"><i class="fa fa-circle-o"></i>Jumlah Aset</a></li>
									<li class="<?php if($page=="Kec_jumlah_aset_dihapus_kepanjen"){echo 'active';}?>"><a href="<?= base_url('Kec_jumlah_aset_dihapus_kepanjen'); ?>"><i class="fa fa-circle-o"></i>Jumlah Aset Yang DiHapus</a></li>
									<li class="<?php if($page=="Kec_jumlah_pembinaan_kepanjen"){echo 'active';}?>"><a href="<?= base_url('Kec_jumlah_pembinaan_kepanjen'); ?>"><i class="fa fa-circle-o"></i>Pembinaan</a></li>
									<li class="<?php if($page=="Kec_prestasi_yang_diraih_kepanjen"){echo 'active';}?>"><a href="<?= base_url('Kec_prestasi_yang_diraih_kepanjen'); ?>"><i class="fa fa-circle-o"></i>Prestasi Yang Diraih</a></li>
									<li class="<?php if($page=="Kec_jamkesmas_kepanjen"){echo 'active';}?>"><a href="<?= base_url('Kec_jamkesmas_kepanjen'); ?>"><i class="fa fa-circle-o"></i>Jaminan Kesehatan</a></li>
									<li class="<?php if($page=="Kec_jumlah_jenis_pelayanan_kepanjen"){echo 'active';}?>"><a href="<?= base_url('Kec_jumlah_jenis_pelayanan_kepanjen'); ?>"><i class="fa fa-circle-o"></i>Jenis Pelayanan</a></li>
								</ul>
						  </li>
						  <li class="treeview <?php if($page=="Kec_jumlah_jenis_pelayanan_kromengan"||$page=="Kec_prestasi_yang_diraih_kromengan"||$page=="Kec_jumlah_pembinaan_kromengan"||$page=="Kec_jumlah_aset_dihapus_kromengan"||$page=="Kec_jumlah_aset_kromengan"||$page=="Kec_wisata_lokal_kromengan"||$page=="Kec_luas_wilayah_kromengan"||$page=="Kec_jumlah_tempat_ibadah_kromengan"||$page=="Kromengan_struktur_pemerintahan"||$page=="Kec_banyak_lapangan_olahraga_kromengan"||$page=="Kec_penduduk_berdasarkan_agama_kromengan"||$page=="Kec_jamkesmas_kromengan"){echo 'active';}?>">  
								<a href="#"><i class="fa fa-arrow-right"></i><span>Kromengan</span>
								<span class="pull-right-container">
								 <i class="fa fa-angle-left pull-right"></i>
								</span>
								</a>
								<ul class="treeview-menu">
									<li class="<?php if($page=="Kromengan_struktur_pemerintahan"){echo 'active';}?>"><a href="<?= base_url('Kromengan_struktur_pemerintahan'); ?>"><i class="fa fa-circle-o"></i>Struktur Pemerintahan</a></li>
									<li class="<?php if($page=="Kec_banyak_lapangan_olahraga_kromengan"){echo 'active';}?>"><a href="<?= base_url('Kec_banyak_lapangan_olahraga_kromengan'); ?>"><i class="fa fa-circle-o"></i>Banyak Lapangan Olahraga</a></li>
									<li class="<?php if($page=="Kec_penduduk_berdasarkan_agama_kromengan"){echo 'active';}?>"><a href="<?= base_url('Kec_penduduk_berdasarkan_agama_kromengan'); ?>"><i class="fa fa-circle-o"></i>Jumlah Berdasarkan Agama</a></li>
									<li class="<?php if($page=="Kec_jumlah_tempat_ibadah_kromengan"){echo 'active';}?>"><a href="<?= base_url('Kec_jumlah_tempat_ibadah_kromengan'); ?>"><i class="fa fa-circle-o"></i>Tempat Ibadah</a></li>
									<li class="<?php if($page=="Kec_luas_wilayah_kromengan"){echo 'active';}?>"><a href="<?= base_url('Kec_luas_wilayah_kromengan'); ?>"><i class="fa fa-circle-o"></i>Luas Wilayah</a></li>
									<li class="<?php if($page=="Kec_wisata_lokal_kromengan"){echo 'active';}?>"><a href="<?= base_url('Kec_wisata_lokal_kromengan'); ?>"><i class="fa fa-circle-o"></i>Tempat Wisata Lokal</a></li>
									<li class="<?php if($page=="Kec_jumlah_aset_kromengan"){echo 'active';}?>"><a href="<?= base_url('Kec_jumlah_aset_kromengan'); ?>"><i class="fa fa-circle-o"></i>Jumlah Aset</a></li>
									<li class="<?php if($page=="Kec_jumlah_aset_dihapus_kromengan"){echo 'active';}?>"><a href="<?= base_url('Kec_jumlah_aset_dihapus_kromengan'); ?>"><i class="fa fa-circle-o"></i>Jumlah Aset Yang DiHapus</a></li>
									<li class="<?php if($page=="Kec_jumlah_pembinaan_kromengan"){echo 'active';}?>"><a href="<?= base_url('Kec_jumlah_pembinaan_kromengan'); ?>"><i class="fa fa-circle-o"></i>Pembinaan</a></li>
									<li class="<?php if($page=="Kec_prestasi_yang_diraih_kromengan"){echo 'active';}?>"><a href="<?= base_url('Kec_prestasi_yang_diraih_kromengan'); ?>"><i class="fa fa-circle-o"></i>Prestasi Yang Diraih</a></li>
									<li class="<?php if($page=="Kec_jamkesmas_kromengan"){echo 'active';}?>"><a href="<?= base_url('Kec_jamkesmas_kromengan'); ?>"><i class="fa fa-circle-o"></i>Jaminan Kesehatan</a></li>
									<li class="<?php if($page=="Kec_jumlah_jenis_pelayanan_kromengan"){echo 'active';}?>"><a href="<?= base_url('Kec_jumlah_jenis_pelayanan_kromengan'); ?>"><i class="fa fa-circle-o"></i>Jenis Pelayanan</a></li>
								</ul>
						  </li>
						  <li class="treeview <?php if($page=="Kec_jumlah_jenis_pelayanan_lawang"||$page=="Kec_prestasi_yang_diraih_lawang"||$page=="Kec_jumlah_pembinaan_lawang"||$page=="Kec_jumlah_aset_dihapus_lawang"||$page=="Kec_jumlah_aset_lawang"||$page=="Kec_wisata_lokal_lawang"||$page=="Kec_luas_wilayah_lawang"||$page=="Kec_jumlah_tempat_ibadah_lawang"||$page=="Lawang_struktur_pemerintahan"||$page=="Kec_banyak_lapangan_olahraga_lawang"||$page=="Kec_penduduk_berdasarkan_agama_lawang"||$page=="Kec_jamkesmas_lawang"){echo 'active';}?>">  
								<a href="#"><i class="fa fa-arrow-right"></i><span>Lawang</span>
								<span class="pull-right-container">
								 <i class="fa fa-angle-left pull-right"></i>
								</span>
								</a>
								<ul class="treeview-menu">
									<li class="<?php if($page=="Lawang_struktur_pemerintahan"){echo 'active';}?>"><a href="<?= base_url('Lawang_struktur_pemerintahan'); ?>"><i class="fa fa-circle-o"></i>Struktur Pemerintahan</a></li>
									<li class="<?php if($page=="Kec_banyak_lapangan_olahraga_lawang"){echo 'active';}?>"><a href="<?= base_url('Kec_banyak_lapangan_olahraga_lawang'); ?>"><i class="fa fa-circle-o"></i>Banyak Lapangan Olahraga</a></li>
									<li class="<?php if($page=="Kec_penduduk_berdasarkan_agama_lawang"){echo 'active';}?>"><a href="<?= base_url('Kec_penduduk_berdasarkan_agama_lawang'); ?>"><i class="fa fa-circle-o"></i>Jumlah Berdasarkan Agama</a></li>
									<li class="<?php if($page=="Kec_jumlah_tempat_ibadah_lawang"){echo 'active';}?>"><a href="<?= base_url('Kec_jumlah_tempat_ibadah_lawang'); ?>"><i class="fa fa-circle-o"></i>Tempat Ibadah</a></li>
									<li class="<?php if($page=="Kec_luas_wilayah_lawang"){echo 'active';}?>"><a href="<?= base_url('Kec_luas_wilayah_lawang'); ?>"><i class="fa fa-circle-o"></i>Luas Wilayah</a></li>
									<li class="<?php if($page=="Kec_wisata_lokal_lawang"){echo 'active';}?>"><a href="<?= base_url('Kec_wisata_lokal_lawang'); ?>"><i class="fa fa-circle-o"></i>Tempat Wisata Lokal</a></li>
									<li class="<?php if($page=="Kec_jumlah_aset_lawang"){echo 'active';}?>"><a href="<?= base_url('Kec_jumlah_aset_lawang'); ?>"><i class="fa fa-circle-o"></i>Jumlah Aset</a></li>
									<li class="<?php if($page=="Kec_jumlah_aset_dihapus_lawang"){echo 'active';}?>"><a href="<?= base_url('Kec_jumlah_aset_dihapus_lawang'); ?>"><i class="fa fa-circle-o"></i>Jumlah Aset Yang DiHapus</a></li>
									<li class="<?php if($page=="Kec_jumlah_pembinaan_lawang"){echo 'active';}?>"><a href="<?= base_url('Kec_jumlah_pembinaan_lawang'); ?>"><i class="fa fa-circle-o"></i>Pembinaan</a></li>
									<li class="<?php if($page=="Kec_prestasi_yang_diraih_lawang"){echo 'active';}?>"><a href="<?= base_url('Kec_prestasi_yang_diraih_lawang'); ?>"><i class="fa fa-circle-o"></i>Prestasi Yang Diraih</a></li>
									<li class="<?php if($page=="Kec_jamkesmas_lawang"){echo 'active';}?>"><a href="<?= base_url('Kec_jamkesmas_lawang'); ?>"><i class="fa fa-circle-o"></i>Jaminan Kesehatan</a></li>
									<li class="<?php if($page=="Kec_jumlah_jenis_pelayanan_lawang"){echo 'active';}?>"><a href="<?= base_url('Kec_jumlah_jenis_pelayanan_lawang'); ?>"><i class="fa fa-circle-o"></i>Jenis Pelayanan</a></li>
								</ul>
						  </li>
						  <li class="treeview <?php if($page=="Kec_jumlah_jenis_pelayanan_ngajum"||$page=="Kec_prestasi_yang_diraih_ngajum"||$page=="Kec_jumlah_pembinaan_ngajum"||$page=="Kec_jumlah_aset_dihapus_ngajum"||$page=="Kec_jumlah_aset_ngajum"||$page=="Kec_wisata_lokal_ngajum"||$page=="Kec_luas_wilayah_ngajum"||$page=="Kec_jumlah_tempat_ibadah_ngajum"||$page=="Ngajum_struktur_pemerintahan"||$page=="Kec_banyak_lapangan_olahraga_ngajum"||$page=="Kec_penduduk_berdasarkan_agama_ngajum"||$page=="Kec_jamkesmas_ngajum"){echo 'active';}?>">  
								<a href="#"><i class="fa fa-arrow-right"></i><span>Ngajum</span>
								<span class="pull-right-container">
								 <i class="fa fa-angle-left pull-right"></i>
								</span>
								</a>
								<ul class="treeview-menu">
									<li class="<?php if($page=="Ngajum_struktur_pemerintahan"){echo 'active';}?>"><a href="<?= base_url('Ngajum_struktur_pemerintahan'); ?>"><i class="fa fa-circle-o"></i>Struktur Pemerintahan</a></li>
									<li class="<?php if($page=="Kec_banyak_lapangan_olahraga_ngajum"){echo 'active';}?>"><a href="<?= base_url('Kec_banyak_lapangan_olahraga_ngajum'); ?>"><i class="fa fa-circle-o"></i>Banyak Lapangan Olahraga</a></li>
									<li class="<?php if($page=="Kec_penduduk_berdasarkan_agama_ngajum"){echo 'active';}?>"><a href="<?= base_url('Kec_penduduk_berdasarkan_agama_ngajum'); ?>"><i class="fa fa-circle-o"></i>Jumlah Berdasarkan Agama</a></li>
									<li class="<?php if($page=="Kec_jumlah_tempat_ibadah_ngajum"){echo 'active';}?>"><a href="<?= base_url('Kec_jumlah_tempat_ibadah_ngajum'); ?>"><i class="fa fa-circle-o"></i>Tempat Ibadah</a></li>
									<li class="<?php if($page=="Kec_luas_wilayah_ngajum"){echo 'active';}?>"><a href="<?= base_url('Kec_luas_wilayah_ngajum'); ?>"><i class="fa fa-circle-o"></i>Luas Wilayah</a></li>
									<li class="<?php if($page=="Kec_wisata_lokal_ngajum"){echo 'active';}?>"><a href="<?= base_url('Kec_wisata_lokal_ngajum'); ?>"><i class="fa fa-circle-o"></i>Tempat Wisata Lokal</a></li>
									<li class="<?php if($page=="Kec_jumlah_aset_ngajum"){echo 'active';}?>"><a href="<?= base_url('Kec_jumlah_aset_ngajum'); ?>"><i class="fa fa-circle-o"></i>Jumlah Aset</a></li>
									<li class="<?php if($page=="Kec_jumlah_aset_dihapus_ngajum"){echo 'active';}?>"><a href="<?= base_url('Kec_jumlah_aset_dihapus_ngajum'); ?>"><i class="fa fa-circle-o"></i>Jumlah Aset Yang DiHapus</a></li>
									<li class="<?php if($page=="Kec_jumlah_pembinaan_ngajum"){echo 'active';}?>"><a href="<?= base_url('Kec_jumlah_pembinaan_ngajum'); ?>"><i class="fa fa-circle-o"></i>Pembinaan</a></li>
									<li class="<?php if($page=="Kec_prestasi_yang_diraih_ngajum"){echo 'active';}?>"><a href="<?= base_url('Kec_prestasi_yang_diraih_ngajum'); ?>"><i class="fa fa-circle-o"></i>Prestasi Yang Diraih</a></li>
									<li class="<?php if($page=="Kec_jamkesmas_ngajum"){echo 'active';}?>"><a href="<?= base_url('Kec_jamkesmas_ngajum'); ?>"><i class="fa fa-circle-o"></i>Jaminan Kesehatan</a></li>
									<li class="<?php if($page=="Kec_jumlah_jenis_pelayanan_ngajum"){echo 'active';}?>"><a href="<?= base_url('Kec_jumlah_jenis_pelayanan_ngajum'); ?>"><i class="fa fa-circle-o"></i>Jenis Pelayanan</a></li>
								</ul>
						  </li>
						  <li class="treeview <?php if($page=="Kec_jumlah_jenis_pelayanan_ngantang"||$page=="Kec_prestasi_yang_diraih_ngantang"||$page=="Kec_jumlah_pembinaan_ngantang"||$page=="Kec_jumlah_aset_dihapus_ngantang"||$page=="Kec_jumlah_aset_ngantang"||$page=="Kec_wisata_lokal_ngantang"||$page=="Kec_luas_wilayah_ngantang"||$page=="Kec_jumlah_tempat_ibadah_ngantang"||$page=="Ngantang_struktur_pemerintahan"||$page=="Kec_banyak_lapangan_olahraga_ngantang"||$page=="Kec_penduduk_berdasarkan_agama_ngantang"||$page=="Kec_jamkesmas_ngantang"){echo 'active';}?>">  
								<a href="#"><i class="fa fa-arrow-right"></i><span>Ngantang</span>
								<span class="pull-right-container">
								 <i class="fa fa-angle-left pull-right"></i>
								</span>
								</a>
								<ul class="treeview-menu">
									<li class="<?php if($page=="Ngantang_struktur_pemerintahan"){echo 'active';}?>"><a href="<?= base_url('Ngantang_struktur_pemerintahan'); ?>"><i class="fa fa-circle-o"></i>Struktur Pemerintahan</a></li>
									<li class="<?php if($page=="Kec_banyak_lapangan_olahraga_ngantang"){echo 'active';}?>"><a href="<?= base_url('Kec_banyak_lapangan_olahraga_ngantang'); ?>"><i class="fa fa-circle-o"></i>Banyak Lapangan Olahraga</a></li>
									<li class="<?php if($page=="Kec_penduduk_berdasarkan_agama_ngantang"){echo 'active';}?>"><a href="<?= base_url('Kec_penduduk_berdasarkan_agama_ngantang'); ?>"><i class="fa fa-circle-o"></i>Jumlah Berdasarkan Agama</a></li>
									<li class="<?php if($page=="Kec_jumlah_tempat_ibadah_ngantang"){echo 'active';}?>"><a href="<?= base_url('Kec_jumlah_tempat_ibadah_ngantang'); ?>"><i class="fa fa-circle-o"></i>Tempat Ibadah</a></li>
									<li class="<?php if($page=="Kec_luas_wilayah_ngantang"){echo 'active';}?>"><a href="<?= base_url('Kec_luas_wilayah_ngantang'); ?>"><i class="fa fa-circle-o"></i>Luas Wilayah</a></li>
									<li class="<?php if($page=="Kec_wisata_lokal_ngantang"){echo 'active';}?>"><a href="<?= base_url('Kec_wisata_lokal_ngantang'); ?>"><i class="fa fa-circle-o"></i>Tempat Wisata Lokal</a></li>
									<li class="<?php if($page=="Kec_jumlah_aset_ngantang"){echo 'active';}?>"><a href="<?= base_url('Kec_jumlah_aset_ngantang'); ?>"><i class="fa fa-circle-o"></i>Jumlah Aset</a></li>
									<li class="<?php if($page=="Kec_jumlah_aset_dihapus_ngantang"){echo 'active';}?>"><a href="<?= base_url('Kec_jumlah_aset_dihapus_ngantang'); ?>"><i class="fa fa-circle-o"></i>Jumlah Aset Yang DiHapus</a></li>
									<li class="<?php if($page=="Kec_jumlah_pembinaan_ngantang"){echo 'active';}?>"><a href="<?= base_url('Kec_jumlah_pembinaan_ngantang'); ?>"><i class="fa fa-circle-o"></i>Pembinaan</a></li>
									<li class="<?php if($page=="Kec_prestasi_yang_diraih_ngantang"){echo 'active';}?>"><a href="<?= base_url('Kec_prestasi_yang_diraih_ngantang'); ?>"><i class="fa fa-circle-o"></i>Prestasi Yang Diraih</a></li>
									<li class="<?php if($page=="Kec_jamkesmas_ngantang"){echo 'active';}?>"><a href="<?= base_url('Kec_jamkesmas_ngantang'); ?>"><i class="fa fa-circle-o"></i>Jaminan Kesehatan</a></li>
									<li class="<?php if($page=="Kec_jumlah_jenis_pelayanan_ngantang"){echo 'active';}?>"><a href="<?= base_url('Kec_jumlah_jenis_pelayanan_ngantang'); ?>"><i class="fa fa-circle-o"></i>Jenis Pelayanan</a></li>
								</ul>
						  </li>
						  <li class="treeview <?php if($page=="Kec_jumlah_jenis_pelayanan_pagak"||$page=="Kec_prestasi_yang_diraih_pagak"||$page=="Kec_jumlah_pembinaan_pagak"||$page=="Kec_jumlah_aset_dihapus_pagak"||$page=="Kec_jumlah_aset_pagak"||$page=="Kec_wisata_lokal_pagak"||$page=="Kec_luas_wilayah_pagak"||$page=="Kec_jumlah_tempat_ibadah_pagak"||$page=="Pagak_struktur_pemerintahan"||$page=="Kec_banyak_lapangan_olahraga_pagak"||$page=="Kec_penduduk_berdasarkan_agama_pagak"||$page=="Kec_jamkesmas_pagak"){echo 'active';}?>">  
								<a href="#"><i class="fa fa-arrow-right"></i><span>Pagak</span>
								<span class="pull-right-container">
								 <i class="fa fa-angle-left pull-right"></i>
								</span>
								</a>
								<ul class="treeview-menu">
									<li class="<?php if($page=="Pagak_struktur_pemerintahan"){echo 'active';}?>"><a href="<?= base_url('Pagak_struktur_pemerintahan'); ?>"><i class="fa fa-circle-o"></i>Struktur Pemerintahan</a></li>
									<li class="<?php if($page=="Kec_banyak_lapangan_olahraga_pagak"){echo 'active';}?>"><a href="<?= base_url('Kec_banyak_lapangan_olahraga_pagak'); ?>"><i class="fa fa-circle-o"></i>Banyak Lapangan Olahraga</a></li>
									<li class="<?php if($page=="Kec_penduduk_berdasarkan_agama_pagak"){echo 'active';}?>"><a href="<?= base_url('Kec_penduduk_berdasarkan_agama_pagak'); ?>"><i class="fa fa-circle-o"></i>Jumlah Berdasarkan Agama</a></li>
									<li class="<?php if($page=="Kec_jumlah_tempat_ibadah_pagak"){echo 'active';}?>"><a href="<?= base_url('Kec_jumlah_tempat_ibadah_pagak'); ?>"><i class="fa fa-circle-o"></i>Tempat Ibadah</a></li>
									<li class="<?php if($page=="Kec_luas_wilayah_pagak"){echo 'active';}?>"><a href="<?= base_url('Kec_luas_wilayah_pagak'); ?>"><i class="fa fa-circle-o"></i>Luas Wilayah</a></li>
									<li class="<?php if($page=="Kec_wisata_lokal_pagak"){echo 'active';}?>"><a href="<?= base_url('Kec_wisata_lokal_pagak'); ?>"><i class="fa fa-circle-o"></i>Tempat Wisata Lokal</a></li>
									<li class="<?php if($page=="Kec_jumlah_aset_pagak"){echo 'active';}?>"><a href="<?= base_url('Kec_jumlah_aset_pagak'); ?>"><i class="fa fa-circle-o"></i>Jumlah Aset</a></li>
									<li class="<?php if($page=="Kec_jumlah_aset_dihapus_pagak"){echo 'active';}?>"><a href="<?= base_url('Kec_jumlah_aset_dihapus_pagak'); ?>"><i class="fa fa-circle-o"></i>Jumlah Aset Yang DiHapus</a></li>
									<li class="<?php if($page=="Kec_jumlah_pembinaan_pagak"){echo 'active';}?>"><a href="<?= base_url('Kec_jumlah_pembinaan_pagak'); ?>"><i class="fa fa-circle-o"></i>Pembinaan</a></li>
									<li class="<?php if($page=="Kec_prestasi_yang_diraih_pagak"){echo 'active';}?>"><a href="<?= base_url('Kec_prestasi_yang_diraih_pagak'); ?>"><i class="fa fa-circle-o"></i>Prestasi Yang Diraih</a></li>
									<li class="<?php if($page=="Kec_jamkesmas_pagak"){echo 'active';}?>"><a href="<?= base_url('Kec_jamkesmas_pagak'); ?>"><i class="fa fa-circle-o"></i>Jaminan Kesehatan</a></li>
									<li class="<?php if($page=="Kec_jumlah_jenis_pelayanan_pagak"){echo 'active';}?>"><a href="<?= base_url('Kec_jumlah_jenis_pelayanan_pagak'); ?>"><i class="fa fa-circle-o"></i>Jenis Pelayanan</a></li>
								</ul>
						  </li>
						  <li class="treeview <?php if($page=="Kec_jumlah_jenis_pelayanan_pagelaran"||$page=="Kec_prestasi_yang_diraih_pagelaran"||$page=="Kec_jumlah_pembinaan_pagelaran"||$page=="Kec_jumlah_aset_dihapus_pagelaran"||$page=="Kec_jumlah_aset_pagelaran"||$page=="Kec_wisata_lokal_pagelaran"||$page=="Kec_luas_wilayah_pagelaran"||$page=="Kec_jumlah_tempat_ibadah_pagelaran"||$page=="Pagelaran_struktur_pemerintahan"||$page=="Kec_banyak_lapangan_olahraga_pagelaran"||$page=="Kec_penduduk_berdasarkan_agama_pagelaran"||$page=="Kec_jamkesmas_pagelaran"){echo 'active';}?>">  
								<a href="#"><i class="fa fa-arrow-right"></i><span>Pagelaran</span>
								<span class="pull-right-container">
								 <i class="fa fa-angle-left pull-right"></i>
								</span>
								</a>
								<ul class="treeview-menu">
									<li class="<?php if($page=="Pagelaran_struktur_pemerintahan"){echo 'active';}?>"><a href="<?= base_url('Pagelaran_struktur_pemerintahan'); ?>"><i class="fa fa-circle-o"></i>Struktur Pemerintahan</a></li>
									<li class="<?php if($page=="Kec_banyak_lapangan_olahraga_pagelaran"){echo 'active';}?>"><a href="<?= base_url('Kec_banyak_lapangan_olahraga_pagelaran'); ?>"><i class="fa fa-circle-o"></i>Banyak Lapangan Olahraga</a></li>
									<li class="<?php if($page=="Kec_penduduk_berdasarkan_agama_pagelaran"){echo 'active';}?>"><a href="<?= base_url('Kec_penduduk_berdasarkan_agama_pagelaran'); ?>"><i class="fa fa-circle-o"></i>Jumlah Berdasarkan Agama</a></li>
									<li class="<?php if($page=="Kec_jumlah_tempat_ibadah_pagelaran"){echo 'active';}?>"><a href="<?= base_url('Kec_jumlah_tempat_ibadah_pagelaran'); ?>"><i class="fa fa-circle-o"></i>Tempat Ibadah</a></li>
									<li class="<?php if($page=="Kec_luas_wilayah_pagelaran"){echo 'active';}?>"><a href="<?= base_url('Kec_luas_wilayah_pagelaran'); ?>"><i class="fa fa-circle-o"></i>Luas Wilayah</a></li>
									<li class="<?php if($page=="Kec_wisata_lokal_pagelaran"){echo 'active';}?>"><a href="<?= base_url('Kec_wisata_lokal_pagelaran'); ?>"><i class="fa fa-circle-o"></i>Tempat Wisata Lokal</a></li>
									<li class="<?php if($page=="Kec_jumlah_aset_pagelaran"){echo 'active';}?>"><a href="<?= base_url('Kec_jumlah_aset_pagelaran'); ?>"><i class="fa fa-circle-o"></i>Jumlah Aset</a></li>
									<li class="<?php if($page=="Kec_jumlah_aset_dihapus_pagelaran"){echo 'active';}?>"><a href="<?= base_url('Kec_jumlah_aset_dihapus_pagelaran'); ?>"><i class="fa fa-circle-o"></i>Jumlah Aset Yang DiHapus</a></li>
									<li class="<?php if($page=="Kec_jumlah_pembinaan_pagelaran"){echo 'active';}?>"><a href="<?= base_url('Kec_jumlah_pembinaan_pagelaran'); ?>"><i class="fa fa-circle-o"></i>Pembinaan</a></li>
									<li class="<?php if($page=="Kec_prestasi_yang_diraih_pagelaran"){echo 'active';}?>"><a href="<?= base_url('Kec_prestasi_yang_diraih_pagelaran'); ?>"><i class="fa fa-circle-o"></i>Prestasi Yang Diraih</a></li>
									<li class="<?php if($page=="Kec_jamkesmas_pagelaran"){echo 'active';}?>"><a href="<?= base_url('Kec_jamkesmas_pagelaran'); ?>"><i class="fa fa-circle-o"></i>Jaminan Kesehatan</a></li>
									<li class="<?php if($page=="Kec_jumlah_jenis_pelayanan_pagelaran"){echo 'active';}?>"><a href="<?= base_url('Kec_jumlah_jenis_pelayanan_pagelaran'); ?>"><i class="fa fa-circle-o"></i>Jenis Pelayanan</a></li>
								</ul>
						  </li>
						  <li class="treeview <?php if($page=="Kec_jumlah_jenis_pelayanan_pakis"||$page=="Kec_prestasi_yang_diraih_pakis"||$page=="Kec_jumlah_pembinaan_pakis"||$page=="Kec_jumlah_aset_dihapus_pakis"||$page=="Kec_jumlah_aset_pakis"||$page=="Kec_wisata_lokal_pakis"||$page=="Kec_luas_wilayah_pakis"||$page=="Kec_jumlah_tempat_ibadah_pakis"||$page=="Pakis_struktur_pemerintahan"||$page=="Kec_banyak_lapangan_olahraga_pakis"||$page=="Kec_penduduk_berdasarkan_agama_pakis"||$page=="Kec_jamkesmas_pakis"){echo 'active';}?>">  
								<a href="#"><i class="fa fa-arrow-right"></i><span>Pakis</span>
								<span class="pull-right-container">
								 <i class="fa fa-angle-left pull-right"></i>
								</span>
								</a>
								<ul class="treeview-menu">
									<li class="<?php if($page=="Pakis_struktur_pemerintahan"){echo 'active';}?>"><a href="<?= base_url('Pakis_struktur_pemerintahan'); ?>"><i class="fa fa-circle-o"></i>Struktur Pemerintahan</a></li>
									<li class="<?php if($page=="Kec_banyak_lapangan_olahraga_pakis"){echo 'active';}?>"><a href="<?= base_url('Kec_banyak_lapangan_olahraga_pakis'); ?>"><i class="fa fa-circle-o"></i>Banyak Lapangan Olahraga</a></li>
									<li class="<?php if($page=="Kec_penduduk_berdasarkan_agama_pakis"){echo 'active';}?>"><a href="<?= base_url('Kec_penduduk_berdasarkan_agama_pakis'); ?>"><i class="fa fa-circle-o"></i>Jumlah Berdasarkan Agama</a></li>
									<li class="<?php if($page=="Kec_jumlah_tempat_ibadah_pakis"){echo 'active';}?>"><a href="<?= base_url('Kec_jumlah_tempat_ibadah_pakis'); ?>"><i class="fa fa-circle-o"></i>Tempat Ibadah</a></li>
									<li class="<?php if($page=="Kec_luas_wilayah_pakis"){echo 'active';}?>"><a href="<?= base_url('Kec_luas_wilayah_pakis'); ?>"><i class="fa fa-circle-o"></i>Luas Wilayah</a></li>
									<li class="<?php if($page=="Kec_wisata_lokal_pakis"){echo 'active';}?>"><a href="<?= base_url('Kec_wisata_lokal_pakis'); ?>"><i class="fa fa-circle-o"></i>Tempat Wisata Lokal</a></li>
									<li class="<?php if($page=="Kec_jumlah_aset_pakis"){echo 'active';}?>"><a href="<?= base_url('Kec_jumlah_aset_pakis'); ?>"><i class="fa fa-circle-o"></i>Jumlah Aset</a></li>
									<li class="<?php if($page=="Kec_jumlah_aset_dihapus_pakis"){echo 'active';}?>"><a href="<?= base_url('Kec_jumlah_aset_dihapus_pakis'); ?>"><i class="fa fa-circle-o"></i>Jumlah Aset Yang DiHapus</a></li>
									<li class="<?php if($page=="Kec_jumlah_pembinaan_pakis"){echo 'active';}?>"><a href="<?= base_url('Kec_jumlah_pembinaan_pakis'); ?>"><i class="fa fa-circle-o"></i>Pembinaan</a></li>
									<li class="<?php if($page=="Kec_prestasi_yang_diraih_pakis"){echo 'active';}?>"><a href="<?= base_url('Kec_prestasi_yang_diraih_pakis'); ?>"><i class="fa fa-circle-o"></i>Prestasi Yang Diraih</a></li>
									<li class="<?php if($page=="Kec_jamkesmas_pakis"){echo 'active';}?>"><a href="<?= base_url('Kec_jamkesmas_pakis'); ?>"><i class="fa fa-circle-o"></i>Jaminan Kesehatan</a></li>
									<li class="<?php if($page=="Kec_jumlah_jenis_pelayanan_pakis"){echo 'active';}?>"><a href="<?= base_url('Kec_jumlah_jenis_pelayanan_pakis'); ?>"><i class="fa fa-circle-o"></i>Jenis Pelayanan</a></li>
								</ul>
						  </li>
						  <li class="treeview <?php if($page=="Kec_jumlah_jenis_pelayanan_pakisaji"||$page=="Kec_prestasi_yang_diraih_pakisaji"||$page=="Kec_jumlah_pembinaan_pakisaji"||$page=="Kec_jumlah_aset_dihapus_pakisaji"||$page=="Kec_jumlah_aset_pakisaji"||$page=="Kec_wisata_lokal_pakisaji"||$page=="Kec_luas_wilayah_pakisaji"||$page=="Kec_jumlah_tempat_ibadah_pakisaji"||$page=="Pakisaji_struktur_pemerintahan"||$page=="Kec_banyak_lapangan_olahraga_pakisaji"||$page=="Kec_penduduk_berdasarkan_agama_pakisaji"||$page=="Kec_jamkesmas_pakisaji"){echo 'active';}?>">  
								<a href="#"><i class="fa fa-arrow-right"></i><span>Pakisaji</span>
								<span class="pull-right-container">
								 <i class="fa fa-angle-left pull-right"></i>
								</span>
								</a>
								<ul class="treeview-menu">
									<li class="<?php if($page=="Pakisaji_struktur_pemerintahan"){echo 'active';}?>"><a href="<?= base_url('Pakisaji_struktur_pemerintahan'); ?>"><i class="fa fa-circle-o"></i>Struktur Pemerintahan</a></li>
									<li class="<?php if($page=="Kec_banyak_lapangan_olahraga_pakisaji"){echo 'active';}?>"><a href="<?= base_url('Kec_banyak_lapangan_olahraga_pakisaji'); ?>"><i class="fa fa-circle-o"></i>Banyak Lapangan Olahraga</a></li>
									<li class="<?php if($page=="Kec_penduduk_berdasarkan_agama_pakisaji"){echo 'active';}?>"><a href="<?= base_url('Kec_penduduk_berdasarkan_agama_pakisaji'); ?>"><i class="fa fa-circle-o"></i>Jumlah Berdasarkan Agama</a></li>
									<li class="<?php if($page=="Kec_jumlah_tempat_ibadah_pakisaji"){echo 'active';}?>"><a href="<?= base_url('Kec_jumlah_tempat_ibadah_pakisaji'); ?>"><i class="fa fa-circle-o"></i>Tempat Ibadah</a></li>
									<li class="<?php if($page=="Kec_luas_wilayah_pakisaji"){echo 'active';}?>"><a href="<?= base_url('Kec_luas_wilayah_pakisaji'); ?>"><i class="fa fa-circle-o"></i>Luas Wilayah</a></li>
									<li class="<?php if($page=="Kec_wisata_lokal_pakisaji"){echo 'active';}?>"><a href="<?= base_url('Kec_wisata_lokal_pakisaji'); ?>"><i class="fa fa-circle-o"></i>Tempat Wisata Lokal</a></li>
									<li class="<?php if($page=="Kec_jumlah_aset_pakisaji"){echo 'active';}?>"><a href="<?= base_url('Kec_jumlah_aset_pakisaji'); ?>"><i class="fa fa-circle-o"></i>Jumlah Aset</a></li>
									<li class="<?php if($page=="Kec_jumlah_aset_dihapus_pakisaji"){echo 'active';}?>"><a href="<?= base_url('Kec_jumlah_aset_dihapus_pakisaji'); ?>"><i class="fa fa-circle-o"></i>Jumlah Aset Yang DiHapus</a></li>
									<li class="<?php if($page=="Kec_jumlah_pembinaan_pakisaji"){echo 'active';}?>"><a href="<?= base_url('Kec_jumlah_pembinaan_pakisaji'); ?>"><i class="fa fa-circle-o"></i>Pembinaan</a></li>
									<li class="<?php if($page=="Kec_prestasi_yang_diraih_pakisaji"){echo 'active';}?>"><a href="<?= base_url('Kec_prestasi_yang_diraih_pakisaji'); ?>"><i class="fa fa-circle-o"></i>Prestasi Yang Diraih</a></li>
									<li class="<?php if($page=="Kec_jamkesmas_pakisaji"){echo 'active';}?>"><a href="<?= base_url('Kec_jamkesmas_pakisaji'); ?>"><i class="fa fa-circle-o"></i>Jaminan Kesehatan</a></li>
									<li class="<?php if($page=="Kec_jumlah_jenis_pelayanan_pakisaji"){echo 'active';}?>"><a href="<?= base_url('Kec_jumlah_jenis_pelayanan_pakisaji'); ?>"><i class="fa fa-circle-o"></i>Jenis Pelayanan</a></li>
								</ul>
						  </li>
						  <li class="treeview <?php if($page=="Kec_jumlah_jenis_pelayanan_poncokusumo"||$page=="Kec_prestasi_yang_diraih_poncokusumo"||$page=="Kec_jumlah_pembinaan_poncokusumo"||$page=="Kec_jumlah_aset_dihapus_poncokusumo"||$page=="Kec_jumlah_aset_poncokusumo"||$page=="Kec_wisata_lokal_poncokusumo"||$page=="Kec_luas_wilayah_poncokusumo"||$page=="Kec_jumlah_tempat_ibadah_poncokusumo"||$page=="Poncokusumo_struktur_pemerintahan"||$page=="Kec_banyak_lapangan_olahraga_poncokusumo"||$page=="Kec_penduduk_berdasarkan_agama_poncokusumo"||$page=="Kec_jamkesmas_poncokusumo"){echo 'active';}?>">  
								<a href="#"><i class="fa fa-arrow-right"></i><span>Poncokusumo</span>
								<span class="pull-right-container">
								 <i class="fa fa-angle-left pull-right"></i>
								</span>
								</a>
								<ul class="treeview-menu">
									<li class="<?php if($page=="Poncokusumo_struktur_pemerintahan"){echo 'active';}?>"><a href="<?= base_url('Poncokusumo_struktur_pemerintahan'); ?>"><i class="fa fa-circle-o"></i>Struktur Pemerintahan</a></li>
									<li class="<?php if($page=="Kec_banyak_lapangan_olahraga_poncokusumo"){echo 'active';}?>"><a href="<?= base_url('Kec_banyak_lapangan_olahraga_poncokusumo'); ?>"><i class="fa fa-circle-o"></i>Banyak Lapangan Olahraga</a></li>
									<li class="<?php if($page=="Kec_penduduk_berdasarkan_agama_poncokusumo"){echo 'active';}?>"><a href="<?= base_url('Kec_penduduk_berdasarkan_agama_poncokusumo'); ?>"><i class="fa fa-circle-o"></i>Jumlah Berdasarkan Agama</a></li>
									<li class="<?php if($page=="Kec_jumlah_tempat_ibadah_poncokusumo"){echo 'active';}?>"><a href="<?= base_url('Kec_jumlah_tempat_ibadah_poncokusumo'); ?>"><i class="fa fa-circle-o"></i>Tempat Ibadah</a></li>
									<li class="<?php if($page=="Kec_luas_wilayah_poncokusumo"){echo 'active';}?>"><a href="<?= base_url('Kec_luas_wilayah_poncokusumo'); ?>"><i class="fa fa-circle-o"></i>Luas Wilayah</a></li>
									<li class="<?php if($page=="Kec_wisata_lokal_poncokusumo"){echo 'active';}?>"><a href="<?= base_url('Kec_wisata_lokal_poncokusumo'); ?>"><i class="fa fa-circle-o"></i>Tempat Wisata Lokal</a></li>
									<li class="<?php if($page=="Kec_jumlah_aset_poncokusumo"){echo 'active';}?>"><a href="<?= base_url('Kec_jumlah_aset_poncokusumo'); ?>"><i class="fa fa-circle-o"></i>Jumlah Aset</a></li>
									<li class="<?php if($page=="Kec_jumlah_aset_dihapus_poncokusumo"){echo 'active';}?>"><a href="<?= base_url('Kec_jumlah_aset_dihapus_poncokusumo'); ?>"><i class="fa fa-circle-o"></i>Jumlah Aset Yang DiHapus</a></li>
									<li class="<?php if($page=="Kec_jumlah_pembinaan_poncokusumo"){echo 'active';}?>"><a href="<?= base_url('Kec_jumlah_pembinaan_poncokusumo'); ?>"><i class="fa fa-circle-o"></i>Pembinaan</a></li>
									<li class="<?php if($page=="Kec_prestasi_yang_diraih_poncokusumo"){echo 'active';}?>"><a href="<?= base_url('Kec_prestasi_yang_diraih_poncokusumo'); ?>"><i class="fa fa-circle-o"></i>Prestasi Yang Diraih</a></li>
									<li class="<?php if($page=="Kec_jamkesmas_poncokusumo"){echo 'active';}?>"><a href="<?= base_url('Kec_jamkesmas_poncokusumo'); ?>"><i class="fa fa-circle-o"></i>Jaminan Kesehatan</a></li>
									<li class="<?php if($page=="Kec_jumlah_jenis_pelayanan_poncokusumo"){echo 'active';}?>"><a href="<?= base_url('Kec_jumlah_jenis_pelayanan_poncokusumo'); ?>"><i class="fa fa-circle-o"></i>Jenis Pelayanan</a></li>
								</ul>
						  </li>
						  <li class="treeview <?php if($page=="Kec_jumlah_jenis_pelayanan_pujon"||$page=="Kec_prestasi_yang_diraih_pujon"||$page=="Kec_jumlah_pembinaan_pujon"||$page=="Kec_jumlah_aset_dihapus_pujon"||$page=="Kec_jumlah_aset_pujon"||$page=="Kec_wisata_lokal_pujon"||$page=="Kec_luas_wilayah_pujon"||$page=="Kec_jumlah_tempat_ibadah_pujon"||$page=="Pujon_struktur_pemerintahan"||$page=="Kec_banyak_lapangan_olahraga_pujon"||$page=="Kec_penduduk_berdasarkan_agama_pujon"||$page=="Kec_jamkesmas_pujon"){echo 'active';}?>">  
								<a href="#"><i class="fa fa-arrow-right"></i><span>Pujon</span>
								<span class="pull-right-container">
								 <i class="fa fa-angle-left pull-right"></i>
								</span>
								</a>
								<ul class="treeview-menu">
									<li class="<?php if($page=="Pujon_struktur_pemerintahan"){echo 'active';}?>"><a href="<?= base_url('Pujon_struktur_pemerintahan'); ?>"><i class="fa fa-circle-o"></i>Struktur Pemerintahan</a></li>
									<li class="<?php if($page=="Kec_banyak_lapangan_olahraga_pujon"){echo 'active';}?>"><a href="<?= base_url('Kec_banyak_lapangan_olahraga_pujon'); ?>"><i class="fa fa-circle-o"></i>Banyak Lapangan Olahraga</a></li>
									<li class="<?php if($page=="Kec_penduduk_berdasarkan_agama_pujon"){echo 'active';}?>"><a href="<?= base_url('Kec_penduduk_berdasarkan_agama_pujon'); ?>"><i class="fa fa-circle-o"></i>Jumlah Berdasarkan Agama</a></li>
									<li class="<?php if($page=="Kec_jumlah_tempat_ibadah_pujon"){echo 'active';}?>"><a href="<?= base_url('Kec_jumlah_tempat_ibadah_pujon'); ?>"><i class="fa fa-circle-o"></i>Tempat Ibadah</a></li>
									<li class="<?php if($page=="Kec_luas_wilayah_pujon"){echo 'active';}?>"><a href="<?= base_url('Kec_luas_wilayah_pujon'); ?>"><i class="fa fa-circle-o"></i>Luas Wilayah</a></li>
									<li class="<?php if($page=="Kec_wisata_lokal_pujon"){echo 'active';}?>"><a href="<?= base_url('Kec_wisata_lokal_pujon'); ?>"><i class="fa fa-circle-o"></i>Tempat Wisata Lokal</a></li>
									<li class="<?php if($page=="Kec_jumlah_aset_pujon"){echo 'active';}?>"><a href="<?= base_url('Kec_jumlah_aset_pujon'); ?>"><i class="fa fa-circle-o"></i>Jumlah Aset</a></li>
									<li class="<?php if($page=="Kec_jumlah_aset_dihapus_pujon"){echo 'active';}?>"><a href="<?= base_url('Kec_jumlah_aset_dihapus_pujon'); ?>"><i class="fa fa-circle-o"></i>Jumlah Aset Yang DiHapus</a></li>
									<li class="<?php if($page=="Kec_jumlah_pembinaan_pujon"){echo 'active';}?>"><a href="<?= base_url('Kec_jumlah_pembinaan_pujon'); ?>"><i class="fa fa-circle-o"></i>Pembinaan</a></li>
									<li class="<?php if($page=="Kec_prestasi_yang_diraih_pujon"){echo 'active';}?>"><a href="<?= base_url('Kec_prestasi_yang_diraih_pujon'); ?>"><i class="fa fa-circle-o"></i>Prestasi Yang Diraih</a></li>
									<li class="<?php if($page=="Kec_jamkesmas_pujon"){echo 'active';}?>"><a href="<?= base_url('Kec_jamkesmas_pujon'); ?>"><i class="fa fa-circle-o"></i>Jaminan Kesehatan</a></li>
									<li class="<?php if($page=="Kec_jumlah_jenis_pelayanan_pujon"){echo 'active';}?>"><a href="<?= base_url('Kec_jumlah_jenis_pelayanan_pujon'); ?>"><i class="fa fa-circle-o"></i>Jenis Pelayanan</a></li>
								</ul>
						  </li>
						  <li class="treeview <?php if($page=="Kec_jumlah_jenis_pelayanan_singosari"||$page=="Kec_prestasi_yang_diraih_singosari"||$page=="Kec_jumlah_pembinaan_singosari"||$page=="Kec_jumlah_aset_dihapus_singosari"||$page=="Kec_jumlah_aset_singosari"||$page=="Kec_wisata_lokal_singosari"||$page=="Kec_luas_wilayah_singosari"||$page=="Kec_jumlah_tempat_ibadah_singosari"||$page=="Singosari_struktur_pemerintahan"||$page=="Kec_banyak_lapangan_olahraga_singosari"||$page=="Kec_penduduk_berdasarkan_agama_singosari"||$page=="Kec_jamkesmas_singosari"){echo 'active';}?>">  
								<a href="#"><i class="fa fa-arrow-right"></i><span>Singosari</span>
								<span class="pull-right-container">
								 <i class="fa fa-angle-left pull-right"></i>
								</span>
								</a>
								<ul class="treeview-menu">
									<li class="<?php if($page=="Singosari_struktur_pemerintahan"){echo 'active';}?>"><a href="<?= base_url('Singosari_struktur_pemerintahan'); ?>"><i class="fa fa-circle-o"></i>Struktur Pemerintahan</a></li>
									<li class="<?php if($page=="Kec_banyak_lapangan_olahraga_singosari"){echo 'active';}?>"><a href="<?= base_url('Kec_banyak_lapangan_olahraga_singosari'); ?>"><i class="fa fa-circle-o"></i>Banyak Lapangan Olahraga</a></li>
									<li class="<?php if($page=="Kec_penduduk_berdasarkan_agama_singosari"){echo 'active';}?>"><a href="<?= base_url('Kec_penduduk_berdasarkan_agama_singosari'); ?>"><i class="fa fa-circle-o"></i>Jumlah Berdasarkan Agama</a></li>
									<li class="<?php if($page=="Kec_jumlah_tempat_ibadah_singosari"){echo 'active';}?>"><a href="<?= base_url('Kec_jumlah_tempat_ibadah_singosari'); ?>"><i class="fa fa-circle-o"></i>Tempat Ibadah</a></li>
									<li class="<?php if($page=="Kec_luas_wilayah_singosari"){echo 'active';}?>"><a href="<?= base_url('Kec_luas_wilayah_singosari'); ?>"><i class="fa fa-circle-o"></i>Luas Wilayah</a></li>
									<li class="<?php if($page=="Kec_wisata_lokal_singosari"){echo 'active';}?>"><a href="<?= base_url('Kec_wisata_lokal_singosari'); ?>"><i class="fa fa-circle-o"></i>Tempat Wisata Lokal</a></li>
									<li class="<?php if($page=="Kec_jumlah_aset_singosari"){echo 'active';}?>"><a href="<?= base_url('Kec_jumlah_aset_singosari'); ?>"><i class="fa fa-circle-o"></i>Jumlah Aset</a></li>
									<li class="<?php if($page=="Kec_jumlah_aset_dihapus_singosari"){echo 'active';}?>"><a href="<?= base_url('Kec_jumlah_aset_dihapus_singosari'); ?>"><i class="fa fa-circle-o"></i>Jumlah Aset Yang DiHapus</a></li>
									<li class="<?php if($page=="Kec_jumlah_pembinaan_singosari"){echo 'active';}?>"><a href="<?= base_url('Kec_jumlah_pembinaan_singosari'); ?>"><i class="fa fa-circle-o"></i>Pembinaan</a></li>
									<li class="<?php if($page=="Kec_prestasi_yang_diraih_singosari"){echo 'active';}?>"><a href="<?= base_url('Kec_prestasi_yang_diraih_singosari'); ?>"><i class="fa fa-circle-o"></i>Prestasi Yang Diraih</a></li>
									<li class="<?php if($page=="Kec_jamkesmas_singosari"){echo 'active';}?>"><a href="<?= base_url('Kec_jamkesmas_singosari'); ?>"><i class="fa fa-circle-o"></i>Jaminan Kesehatan</a></li>
									<li class="<?php if($page=="Kec_jumlah_jenis_pelayanan_singosari"){echo 'active';}?>"><a href="<?= base_url('Kec_jumlah_jenis_pelayanan_singosari'); ?>"><i class="fa fa-circle-o"></i>Jenis Pelayanan</a></li>
								</ul>
						  </li>
						  <li class="treeview <?php if($page=="Kec_jumlah_jenis_pelayanan_sumbermanjing"||$page=="Kec_prestasi_yang_diraih_sumbermanjing"||$page=="Kec_jumlah_pembinaan_sumbermanjing"||$page=="Kec_jumlah_aset_dihapus_sumbermanjing"||$page=="Kec_jumlah_aset_sumbermanjing"||$page=="Kec_wisata_lokal_sumbermanjing"||$page=="Kec_luas_wilayah_sumbermanjing"||$page=="Kec_jumlah_tempat_ibadah_sumbermanjing"||$page=="Sumbermanjing_struktur_pemerintahan"||$page=="Kec_banyak_lapangan_olahraga_sumbermanjing"||$page=="Kec_penduduk_berdasarkan_agama_sumbermanjing"||$page=="Kec_jamkesmas_sumbermanjing"){echo 'active';}?>">  
								<a href="#"><i class="fa fa-arrow-right"></i><span>Sumbermanjing</span>
								<span class="pull-right-container">
								 <i class="fa fa-angle-left pull-right"></i>
								</span>
								</a>
								<ul class="treeview-menu">
									<li class="<?php if($page=="Sumbermanjing_struktur_pemerintahan"){echo 'active';}?>"><a href="<?= base_url('Sumbermanjing_struktur_pemerintahan'); ?>"><i class="fa fa-circle-o"></i>Struktur Pemerintahan</a></li>
									<li class="<?php if($page=="Kec_banyak_lapangan_olahraga_sumbermanjing"){echo 'active';}?>"><a href="<?= base_url('Kec_banyak_lapangan_olahraga_sumbermanjing'); ?>"><i class="fa fa-circle-o"></i>Banyak Lapangan Olahraga</a></li>
									<li class="<?php if($page=="Kec_penduduk_berdasarkan_agama_sumbermanjing"){echo 'active';}?>"><a href="<?= base_url('Kec_penduduk_berdasarkan_agama_sumbermanjing'); ?>"><i class="fa fa-circle-o"></i>Jumlah Berdasarkan Agama</a></li>
									<li class="<?php if($page=="Kec_jumlah_tempat_ibadah_sumbermanjing"){echo 'active';}?>"><a href="<?= base_url('Kec_jumlah_tempat_ibadah_sumbermanjing'); ?>"><i class="fa fa-circle-o"></i>Tempat Ibadah</a></li>
									<li class="<?php if($page=="Kec_luas_wilayah_sumbermanjing"){echo 'active';}?>"><a href="<?= base_url('Kec_luas_wilayah_sumbermanjing'); ?>"><i class="fa fa-circle-o"></i>Luas Wilayah</a></li>
									<li class="<?php if($page=="Kec_wisata_lokal_sumbermanjing"){echo 'active';}?>"><a href="<?= base_url('Kec_wisata_lokal_sumbermanjing'); ?>"><i class="fa fa-circle-o"></i>Tempat Wisata Lokal</a></li>
									<li class="<?php if($page=="Kec_jumlah_aset_sumbermanjing"){echo 'active';}?>"><a href="<?= base_url('Kec_jumlah_aset_sumbermanjing'); ?>"><i class="fa fa-circle-o"></i>Jumlah Aset</a></li>
									<li class="<?php if($page=="Kec_jumlah_aset_dihapus_sumbermanjing"){echo 'active';}?>"><a href="<?= base_url('Kec_jumlah_aset_dihapus_sumbermanjing'); ?>"><i class="fa fa-circle-o"></i>Jumlah Aset Yang DiHapus</a></li>
									<li class="<?php if($page=="Kec_jumlah_pembinaan_sumbermanjing"){echo 'active';}?>"><a href="<?= base_url('Kec_jumlah_pembinaan_sumbermanjing'); ?>"><i class="fa fa-circle-o"></i>Pembinaan</a></li>
									<li class="<?php if($page=="Kec_prestasi_yang_diraih_sumbermanjing"){echo 'active';}?>"><a href="<?= base_url('Kec_prestasi_yang_diraih_sumbermanjing'); ?>"><i class="fa fa-circle-o"></i>Prestasi Yang Diraih</a></li>
									<li class="<?php if($page=="Kec_jamkesmas_sumbermanjing"){echo 'active';}?>"><a href="<?= base_url('Kec_jamkesmas_sumbermanjing'); ?>"><i class="fa fa-circle-o"></i>Jaminan Kesehatan</a></li>
									<li class="<?php if($page=="Kec_jumlah_jenis_pelayanan_sumbermanjing"){echo 'active';}?>"><a href="<?= base_url('Kec_jumlah_jenis_pelayanan_sumbermanjing'); ?>"><i class="fa fa-circle-o"></i>Jenis Pelayanan</a></li>
								</ul>
						  </li>
						  <li class="treeview <?php if($page=="Kec_jumlah_jenis_pelayanan_sumberpucung"||$page=="Kec_prestasi_yang_diraih_sumberpucung"||$page=="Kec_jumlah_pembinaan_sumberpucung"||$page=="Kec_jumlah_aset_dihapus_sumberpucung"||$page=="Kec_jumlah_aset_sumberpucung"||$page=="Kec_wisata_lokal_sumberpucung"||$page=="Kec_luas_wilayah_sumberpucung"||$page=="Kec_jumlah_tempat_ibadah_sumberpucung"||$page=="Sumberpucung_struktur_pemerintahan"||$page=="Kec_banyak_lapangan_olahraga_sumberpucung"||$page=="Kec_penduduk_berdasarkan_agama_sumberpucung"||$page=="Kec_jamkesmas_sumberpucung"){echo 'active';}?>">  
								<a href="#"><i class="fa fa-arrow-right"></i><span>Sumberpucung</span>
								<span class="pull-right-container">
								 <i class="fa fa-angle-left pull-right"></i>
								</span>
								</a>
								<ul class="treeview-menu">
									<li class="<?php if($page=="Sumberpucung_struktur_pemerintahan"){echo 'active';}?>"><a href="<?= base_url('Sumberpucung_struktur_pemerintahan'); ?>"><i class="fa fa-circle-o"></i>Struktur Pemerintahan</a></li>
									<li class="<?php if($page=="Kec_banyak_lapangan_olahraga_sumberpucung"){echo 'active';}?>"><a href="<?= base_url('Kec_banyak_lapangan_olahraga_sumberpucung'); ?>"><i class="fa fa-circle-o"></i>Banyak Lapangan Olahraga</a></li>
									<li class="<?php if($page=="Kec_penduduk_berdasarkan_agama_sumberpucung"){echo 'active';}?>"><a href="<?= base_url('Kec_penduduk_berdasarkan_agama_sumberpucung'); ?>"><i class="fa fa-circle-o"></i>Jumlah Berdasarkan Agama</a></li>
									<li class="<?php if($page=="Kec_jumlah_tempat_ibadah_sumberpucung"){echo 'active';}?>"><a href="<?= base_url('Kec_jumlah_tempat_ibadah_sumberpucung'); ?>"><i class="fa fa-circle-o"></i>Tempat Ibadah</a></li>
									<li class="<?php if($page=="Kec_luas_wilayah_sumberpucung"){echo 'active';}?>"><a href="<?= base_url('Kec_luas_wilayah_sumberpucung'); ?>"><i class="fa fa-circle-o"></i>Luas Wilayah</a></li>
									<li class="<?php if($page=="Kec_wisata_lokal_sumberpucung"){echo 'active';}?>"><a href="<?= base_url('Kec_wisata_lokal_sumberpucung'); ?>"><i class="fa fa-circle-o"></i>Tempat Wisata Lokal</a></li>
									<li class="<?php if($page=="Kec_jumlah_aset_sumberpucung"){echo 'active';}?>"><a href="<?= base_url('Kec_jumlah_aset_sumberpucung'); ?>"><i class="fa fa-circle-o"></i>Jumlah Aset</a></li>
									<li class="<?php if($page=="Kec_jumlah_aset_dihapus_sumberpucung"){echo 'active';}?>"><a href="<?= base_url('Kec_jumlah_aset_dihapus_sumberpucung'); ?>"><i class="fa fa-circle-o"></i>Jumlah Aset Yang DiHapus</a></li>
									<li class="<?php if($page=="Kec_jumlah_pembinaan_sumberpucung"){echo 'active';}?>"><a href="<?= base_url('Kec_jumlah_pembinaan_sumberpucung'); ?>"><i class="fa fa-circle-o"></i>Pembinaan</a></li>
									<li class="<?php if($page=="Kec_prestasi_yang_diraih_sumberpucung"){echo 'active';}?>"><a href="<?= base_url('Kec_prestasi_yang_diraih_sumberpucung'); ?>"><i class="fa fa-circle-o"></i>Prestasi Yang Diraih</a></li>
									<li class="<?php if($page=="Kec_jamkesmas_sumberpucung"){echo 'active';}?>"><a href="<?= base_url('Kec_jamkesmas_sumberpucung'); ?>"><i class="fa fa-circle-o"></i>Jaminan Kesehatan</a></li>
									<li class="<?php if($page=="Kec_jumlah_jenis_pelayanan_sumberpucung"){echo 'active';}?>"><a href="<?= base_url('Kec_jumlah_jenis_pelayanan_sumberpucung'); ?>"><i class="fa fa-circle-o"></i>Jenis Pelayanan</a></li>
								</ul>
						  </li>
						  <li class="treeview <?php if($page=="Kec_jumlah_jenis_pelayanan_tajinan"||$page=="Kec_prestasi_yang_diraih_tajinan"||$page=="Kec_jumlah_pembinaan_tajinan"||$page=="Kec_jumlah_aset_dihapus_tajinan"||$page=="Kec_jumlah_aset_tajinan"||$page=="Kec_luas_wilayah_tajinan"||$page=="Kec_jumlah_tempat_ibadah_tajinan"||$page=="Tajinan_struktur_pemerintahan"||$page=="Kec_banyak_lapangan_olahraga_tajinan"||$page=="Kec_penduduk_berdasarkan_agama_tajinan"||$page=="Kec_jamkesmas_tajinan"){echo 'active';}?>">  
								<a href="#"><i class="fa fa-arrow-right"></i><span>Tajinan</span>
								<span class="pull-right-container">
								 <i class="fa fa-angle-left pull-right"></i>
								</span>
								</a>
								<ul class="treeview-menu">
									<li class="<?php if($page=="Tajinan_struktur_pemerintahan"){echo 'active';}?>"><a href="<?= base_url('Tajinan_struktur_pemerintahan'); ?>"><i class="fa fa-circle-o"></i>Struktur Pemerintahan</a></li>
									<li class="<?php if($page=="Kec_banyak_lapangan_olahraga_tajinan"){echo 'active';}?>"><a href="<?= base_url('Kec_banyak_lapangan_olahraga_tajinan'); ?>"><i class="fa fa-circle-o"></i>Banyak Lapangan Olahraga</a></li>
									<li class="<?php if($page=="Kec_penduduk_berdasarkan_agama_tajinan"){echo 'active';}?>"><a href="<?= base_url('Kec_penduduk_berdasarkan_agama_tajinan'); ?>"><i class="fa fa-circle-o"></i>Jumlah Berdasarkan Agama</a></li>
									<li class="<?php if($page=="Kec_jumlah_tempat_ibadah_tajinan"){echo 'active';}?>"><a href="<?= base_url('Kec_jumlah_tempat_ibadah_tajinan'); ?>"><i class="fa fa-circle-o"></i>Tempat Ibadah</a></li>
									<li class="<?php if($page=="Kec_luas_wilayah_tajinan"){echo 'active';}?>"><a href="<?= base_url('Kec_luas_wilayah_tajinan'); ?>"><i class="fa fa-circle-o"></i>Luas Wilayah</a></li>
									<li class="<?php if($page=="Kec_wisata_lokal_tajinan"){echo 'active';}?>"><a href="<?= base_url('Kec_wisata_lokal_tajinan'); ?>"><i class="fa fa-circle-o"></i>Tempat Wisata Lokal</a></li>
									<li class="<?php if($page=="Kec_jumlah_aset_tajinan"){echo 'active';}?>"><a href="<?= base_url('Kec_jumlah_aset_tajinan'); ?>"><i class="fa fa-circle-o"></i>Jumlah Aset</a></li>
									<li class="<?php if($page=="Kec_jumlah_aset_dihapus_tajinan"){echo 'active';}?>"><a href="<?= base_url('Kec_jumlah_aset_dihapus_tajinan'); ?>"><i class="fa fa-circle-o"></i>Jumlah Aset Yang DiHapus</a></li>
									<li class="<?php if($page=="Kec_jumlah_pembinaan_tajinan"){echo 'active';}?>"><a href="<?= base_url('Kec_jumlah_pembinaan_tajinan'); ?>"><i class="fa fa-circle-o"></i>Pembinaan</a></li>
									<li class="<?php if($page=="Kec_prestasi_yang_diraih_tajinan"){echo 'active';}?>"><a href="<?= base_url('Kec_prestasi_yang_diraih_tajinan'); ?>"><i class="fa fa-circle-o"></i>Prestasi Yang Diraih</a></li>
									<li class="<?php if($page=="Kec_jamkesmas_tajinan"){echo 'active';}?>"><a href="<?= base_url('Kec_jamkesmas_tajinan'); ?>"><i class="fa fa-circle-o"></i>Jaminan Kesehatan</a></li>
									<li class="<?php if($page=="Kec_jumlah_jenis_pelayanan_tajinan"){echo 'active';}?>"><a href="<?= base_url('Kec_jumlah_jenis_pelayanan_tajinan'); ?>"><i class="fa fa-circle-o"></i>Jenis Pelayanan</a></li>
								</ul>
						  </li>
						  <li class="treeview <?php if($page=="Kec_jumlah_jenis_pelayanan_tirtoyudo"||$page=="Kec_prestasi_yang_diraih_tirtoyudo"||$page=="Kec_jumlah_pembinaan_tirtoyudo"||$page=="Kec_jumlah_aset_dihapus_tirtoyudo"||$page=="Kec_jumlah_aset_tirtoyudo"||$page=="Kec_wisata_lokal_tirtoyudo"||$page=="Kec_luas_wilayah_tirtoyudo"||$page=="Kec_jumlah_tempat_ibadah_tirtoyudo"||$page=="Tirtoyudo_struktur_pemerintahan"||$page=="Kec_banyak_lapangan_olahraga_tirtoyudo"||$page=="Kec_penduduk_berdasarkan_agama_tirtoyudo"||$page=="Kec_jamkesmas_tirtoyudo"){echo 'active';}?>">  
								<a href="#"><i class="fa fa-arrow-right"></i><span>Tirtoyudo</span>
								<span class="pull-right-container">
								 <i class="fa fa-angle-left pull-right"></i>
								</span>
								</a>
								<ul class="treeview-menu">
									<li class="<?php if($page=="Tirtoyudo_struktur_pemerintahan"){echo 'active';}?>"><a href="<?= base_url('Tirtoyudo_struktur_pemerintahan'); ?>"><i class="fa fa-circle-o"></i>Struktur Pemerintahan</a></li>
									<li class="<?php if($page=="Kec_banyak_lapangan_olahraga_tirtoyudo"){echo 'active';}?>"><a href="<?= base_url('Kec_banyak_lapangan_olahraga_tirtoyudo'); ?>"><i class="fa fa-circle-o"></i>Banyak Lapangan Olahraga</a></li>
									<li class="<?php if($page=="Kec_penduduk_berdasarkan_agama_tirtoyudo"){echo 'active';}?>"><a href="<?= base_url('Kec_penduduk_berdasarkan_agama_tirtoyudo'); ?>"><i class="fa fa-circle-o"></i>Jumlah Berdasarkan Agama</a></li>
									<li class="<?php if($page=="Kec_jumlah_tempat_ibadah_tirtoyudo"){echo 'active';}?>"><a href="<?= base_url('Kec_jumlah_tempat_ibadah_tirtoyudo'); ?>"><i class="fa fa-circle-o"></i>Tempat Ibadah</a></li>
									<li class="<?php if($page=="Kec_luas_wilayah_tirtoyudo"){echo 'active';}?>"><a href="<?= base_url('Kec_luas_wilayah_tirtoyudo'); ?>"><i class="fa fa-circle-o"></i>Luas Wilayah</a></li>
									<li class="<?php if($page=="Kec_wisata_lokal_tirtoyudo"){echo 'active';}?>"><a href="<?= base_url('Kec_wisata_lokal_tirtoyudo'); ?>"><i class="fa fa-circle-o"></i>Tempat Wisata Lokal</a></li>
									<li class="<?php if($page=="Kec_jumlah_aset_tirtoyudo"){echo 'active';}?>"><a href="<?= base_url('Kec_jumlah_aset_tirtoyudo'); ?>"><i class="fa fa-circle-o"></i>Jumlah Aset</a></li>
									<li class="<?php if($page=="Kec_jumlah_aset_dihapus_tirtoyudo"){echo 'active';}?>"><a href="<?= base_url('Kec_jumlah_aset_dihapus_tirtoyudo'); ?>"><i class="fa fa-circle-o"></i>Jumlah Aset Yang DiHapus</a></li>
									<li class="<?php if($page=="Kec_jumlah_pembinaan_tirtoyudo"){echo 'active';}?>"><a href="<?= base_url('Kec_jumlah_pembinaan_tirtoyudo'); ?>"><i class="fa fa-circle-o"></i>Pembinaan</a></li>
									<li class="<?php if($page=="Kec_prestasi_yang_diraih_tirtoyudo"){echo 'active';}?>"><a href="<?= base_url('Kec_prestasi_yang_diraih_tirtoyudo'); ?>"><i class="fa fa-circle-o"></i>Prestasi Yang Diraih</a></li>
									<li class="<?php if($page=="Kec_jamkesmas_tirtoyudo"){echo 'active';}?>"><a href="<?= base_url('Kec_jamkesmas_tirtoyudo'); ?>"><i class="fa fa-circle-o"></i>Jaminan Kesehatan</a></li>
									<li class="<?php if($page=="Kec_jumlah_jenis_pelayanan_tirtoyudo"){echo 'active';}?>"><a href="<?= base_url('Kec_jumlah_jenis_pelayanan_tirtoyudo'); ?>"><i class="fa fa-circle-o"></i>Jenis Pelayanan</a></li>
								</ul>
						  </li>
						  <li class="treeview <?php if($page=="Kec_jumlah_jenis_pelayanan_tumpang"||$page=="Kec_prestasi_yang_diraih_tumpang"||$page=="Kec_jumlah_pembinaan_tumpang"||$page=="Kec_jumlah_aset_dihapus_tumpang"||$page=="Kec_jumlah_aset_tumpang"||$page=="Kec_wisata_lokal_tumpang"||$page=="Kec_luas_wilayah_tumpang"||$page=="Kec_jumlah_tempat_ibadah_tumpang"||$page=="Tumpang_struktur_pemerintahan"||$page=="Kec_banyak_lapangan_olahraga_tumpang"||$page=="Kec_penduduk_berdasarkan_agama_tumpang"||$page=="Kec_jamkesmas_tumpang"){echo 'active';}?>">  
								<a href="#"><i class="fa fa-arrow-right"></i><span>Tumpang</span>
								<span class="pull-right-container">
								 <i class="fa fa-angle-left pull-right"></i>
								</span>
								</a>
								<ul class="treeview-menu">
									<li class="<?php if($page=="Tumpang_struktur_pemerintahan"){echo 'active';}?>"><a href="<?= base_url('Tumpang_struktur_pemerintahan'); ?>"><i class="fa fa-circle-o"></i>Struktur Pemerintahan</a></li>
									<li class="<?php if($page=="Kec_banyak_lapangan_olahraga_tumpang"){echo 'active';}?>"><a href="<?= base_url('Kec_banyak_lapangan_olahraga_tumpang'); ?>"><i class="fa fa-circle-o"></i>Banyak Lapangan Olahraga</a></li>
									<li class="<?php if($page=="Kec_penduduk_berdasarkan_agama_tumpang"){echo 'active';}?>"><a href="<?= base_url('Kec_penduduk_berdasarkan_agama_tumpang'); ?>"><i class="fa fa-circle-o"></i>Jumlah Berdasarkan Agama</a></li>
									<li class="<?php if($page=="Kec_jumlah_tempat_ibadah_tumpang"){echo 'active';}?>"><a href="<?= base_url('Kec_jumlah_tempat_ibadah_tumpang'); ?>"><i class="fa fa-circle-o"></i>Tempat Ibadah</a></li>
									<li class="<?php if($page=="Kec_luas_wilayah_tumpang"){echo 'active';}?>"><a href="<?= base_url('Kec_luas_wilayah_tumpang'); ?>"><i class="fa fa-circle-o"></i>Luas Wilayah</a></li>
									<li class="<?php if($page=="Kec_wisata_lokal_tumpang"){echo 'active';}?>"><a href="<?= base_url('Kec_wisata_lokal_tumpang'); ?>"><i class="fa fa-circle-o"></i>Tempat Wisata Lokal</a></li>
									<li class="<?php if($page=="Kec_jumlah_aset_tumpang"){echo 'active';}?>"><a href="<?= base_url('Kec_jumlah_aset_tumpang'); ?>"><i class="fa fa-circle-o"></i>Jumlah Aset</a></li>
									<li class="<?php if($page=="Kec_jumlah_aset_dihapus_tumpang"){echo 'active';}?>"><a href="<?= base_url('Kec_jumlah_aset_dihapus_tumpang'); ?>"><i class="fa fa-circle-o"></i>Jumlah Aset Yang DiHapus</a></li>
									<li class="<?php if($page=="Kec_jumlah_pembinaan_tumpang"){echo 'active';}?>"><a href="<?= base_url('Kec_jumlah_pembinaan_tumpang'); ?>"><i class="fa fa-circle-o"></i>Pembinaan</a></li>
									<li class="<?php if($page=="Kec_prestasi_yang_diraih_tumpang"){echo 'active';}?>"><a href="<?= base_url('Kec_prestasi_yang_diraih_tumpang'); ?>"><i class="fa fa-circle-o"></i>Prestasi Yang Diraih</a></li>
									<li class="<?php if($page=="Kec_jamkesmas_tumpang"){echo 'active';}?>"><a href="<?= base_url('Kec_jamkesmas_tumpang'); ?>"><i class="fa fa-circle-o"></i>Jaminan Kesehatan</a></li>
									<li class="<?php if($page=="Kec_jumlah_jenis_pelayanan_tumpang"){echo 'active';}?>"><a href="<?= base_url('Kec_jumlah_jenis_pelayanan_tumpang'); ?>"><i class="fa fa-circle-o"></i>Jenis Pelayanan</a></li>
								</ul>
						  </li>
						  <li class="treeview <?php if($page=="Kec_jumlah_jenis_pelayanan_turen"||$page=="Kec_prestasi_yang_diraih_turen"||$page=="Kec_jumlah_pembinaan_turen"||$page=="Kec_jumlah_aset_dihapus_turen"||$page=="Kec_jumlah_aset_turen"||$page=="Kec_wisata_lokal_turen"||$page=="Kec_luas_wilayah_turen"||$page=="Kec_jumlah_tempat_ibadah_turen"||$page=="Turen_struktur_pemerintahan"||$page=="Kec_banyak_lapangan_olahraga_turen"||$page=="Kec_penduduk_berdasarkan_agama_turen"||$page=="Kec_jamkesmas_turen"){echo 'active';}?>">  
								<a href="#"><i class="fa fa-arrow-right"></i><span>Turen</span>
								<span class="pull-right-container">
								 <i class="fa fa-angle-left pull-right"></i>
								</span>
								</a>
								<ul class="treeview-menu">
									<li class="<?php if($page=="Turen_struktur_pemerintahan"){echo 'active';}?>"><a href="<?= base_url('Turen_struktur_pemerintahan'); ?>"><i class="fa fa-circle-o"></i>Struktur Pemerintahan</a></li>
									<li class="<?php if($page=="Kec_banyak_lapangan_olahraga_turen"){echo 'active';}?>"><a href="<?= base_url('Kec_banyak_lapangan_olahraga_turen'); ?>"><i class="fa fa-circle-o"></i>Banyak Lapangan Olahraga</a></li>
									<li class="<?php if($page=="Kec_penduduk_berdasarkan_agama_turen"){echo 'active';}?>"><a href="<?= base_url('Kec_penduduk_berdasarkan_agama_turen'); ?>"><i class="fa fa-circle-o"></i>Jumlah Berdasarkan Agama</a></li>
									<li class="<?php if($page=="Kec_jumlah_tempat_ibadah_turen"){echo 'active';}?>"><a href="<?= base_url('Kec_jumlah_tempat_ibadah_turen'); ?>"><i class="fa fa-circle-o"></i>Tempat Ibadah</a></li>
									<li class="<?php if($page=="Kec_luas_wilayah_turen"){echo 'active';}?>"><a href="<?= base_url('Kec_luas_wilayah_turen'); ?>"><i class="fa fa-circle-o"></i>Luas Wilayah</a></li>
									<li class="<?php if($page=="Kec_wisata_lokal_turen"){echo 'active';}?>"><a href="<?= base_url('Kec_wisata_lokal_turen'); ?>"><i class="fa fa-circle-o"></i>Tempat Wisata Lokal</a></li>
									<li class="<?php if($page=="Kec_jumlah_aset_turen"){echo 'active';}?>"><a href="<?= base_url('Kec_jumlah_aset_turen'); ?>"><i class="fa fa-circle-o"></i>Jumlah Aset</a></li>
									<li class="<?php if($page=="Kec_jumlah_aset_dihapus_turen"){echo 'active';}?>"><a href="<?= base_url('Kec_jumlah_aset_dihapus_turen'); ?>"><i class="fa fa-circle-o"></i>Jumlah Aset Yang DiHapus</a></li>
									<li class="<?php if($page=="Kec_jumlah_pembinaan_turen"){echo 'active';}?>"><a href="<?= base_url('Kec_jumlah_pembinaan_turen'); ?>"><i class="fa fa-circle-o"></i>Pembinaan</a></li>
									<li class="<?php if($page=="Kec_prestasi_yang_diraih_turen"){echo 'active';}?>"><a href="<?= base_url('Kec_prestasi_yang_diraih_turen'); ?>"><i class="fa fa-circle-o"></i>Prestasi Yang Diraih</a></li>
									<li class="<?php if($page=="Kec_jamkesmas_turen"){echo 'active';}?>"><a href="<?= base_url('Kec_jamkesmas_turen'); ?>"><i class="fa fa-circle-o"></i>Jaminan Kesehatan</a></li>
									<li class="<?php if($page=="Kec_jumlah_jenis_pelayanan_turen"){echo 'active';}?>"><a href="<?= base_url('Kec_jumlah_jenis_pelayanan_turen'); ?>"><i class="fa fa-circle-o"></i>Jenis Pelayanan</a></li>
								</ul>
						  </li>
						  <li class="treeview <?php if($page=="Kec_jumlah_jenis_pelayanan_wagir"||$page=="Kec_prestasi_yang_diraih_wagir"||$page=="Kec_jumlah_pembinaan_wagir"||$page=="Kec_jumlah_aset_dihapus_wagir"||$page=="Kec_jumlah_aset_wagir"||$page=="Kec_wisata_lokal_wagir"||$page=="Kec_luas_wilayah_wagir"||$page=="Kec_jumlah_tempat_ibadah_wagir"||$page=="Wagir_struktur_pemerintahan"||$page=="Kec_banyak_lapangan_olahraga_wagir"||$page=="Kec_penduduk_berdasarkan_agama_wagir"||$page=="Kec_jamkesmas_wagir"){echo 'active';}?>">  
								<a href="#"><i class="fa fa-arrow-right"></i><span>Wagir</span>
								<span class="pull-right-container">
								 <i class="fa fa-angle-left pull-right"></i>
								</span>
								</a>
								<ul class="treeview-menu">
									<li class="<?php if($page=="Wagir_struktur_pemerintahan"){echo 'active';}?>"><a href="<?= base_url('Wagir_struktur_pemerintahan'); ?>"><i class="fa fa-circle-o"></i>Struktur Pemerintahan</a></li>
									<li class="<?php if($page=="Kec_banyak_lapangan_olahraga_wagir"){echo 'active';}?>"><a href="<?= base_url('Kec_banyak_lapangan_olahraga_wagir'); ?>"><i class="fa fa-circle-o"></i>Banyak Lapangan Olahraga</a></li>
									<li class="<?php if($page=="Kec_penduduk_berdasarkan_agama_wagir"){echo 'active';}?>"><a href="<?= base_url('Kec_penduduk_berdasarkan_agama_wagir'); ?>"><i class="fa fa-circle-o"></i>Jumlah Berdasarkan Agama</a></li>
									<li class="<?php if($page=="Kec_jumlah_tempat_ibadah_wagir"){echo 'active';}?>"><a href="<?= base_url('Kec_jumlah_tempat_ibadah_wagir'); ?>"><i class="fa fa-circle-o"></i>Tempat Ibadah</a></li>
									<li class="<?php if($page=="Kec_luas_wilayah_wagir"){echo 'active';}?>"><a href="<?= base_url('Kec_luas_wilayah_wagir'); ?>"><i class="fa fa-circle-o"></i>Luas Wilayah</a></li>
									<li class="<?php if($page=="Kec_wisata_lokal_wagir"){echo 'active';}?>"><a href="<?= base_url('Kec_wisata_lokal_wagir'); ?>"><i class="fa fa-circle-o"></i>Tempat Wisata Lokal</a></li>
									<li class="<?php if($page=="Kec_jumlah_aset_wagir"){echo 'active';}?>"><a href="<?= base_url('Kec_jumlah_aset_wagir'); ?>"><i class="fa fa-circle-o"></i>Jumlah Aset</a></li>
									<li class="<?php if($page=="Kec_jumlah_aset_dihapus_wagir"){echo 'active';}?>"><a href="<?= base_url('Kec_jumlah_aset_dihapus_wagir'); ?>"><i class="fa fa-circle-o"></i>Jumlah Aset Yang DiHapus</a></li>
									<li class="<?php if($page=="Kec_jumlah_pembinaan_wagir"){echo 'active';}?>"><a href="<?= base_url('Kec_jumlah_pembinaan_wagir'); ?>"><i class="fa fa-circle-o"></i>Pembinaan</a></li>
									<li class="<?php if($page=="Kec_prestasi_yang_diraih_wagir"){echo 'active';}?>"><a href="<?= base_url('Kec_prestasi_yang_diraih_wagir'); ?>"><i class="fa fa-circle-o"></i>Prestasi Yang Diraih</a></li>
									<li class="<?php if($page=="Kec_jamkesmas_wagir"){echo 'active';}?>"><a href="<?= base_url('Kec_jamkesmas_wagir'); ?>"><i class="fa fa-circle-o"></i>Jaminan Kesehatan</a></li>
									<li class="<?php if($page=="Kec_jumlah_jenis_pelayanan_wagir"){echo 'active';}?>"><a href="<?= base_url('Kec_jumlah_jenis_pelayanan_wagir'); ?>"><i class="fa fa-circle-o"></i>Jenis Pelayanan</a></li>
								</ul>
						  </li>
						  <li class="treeview <?php if($page=="Kec_jumlah_jenis_pelayanan_wajak"||$page=="Kec_prestasi_yang_diraih_wajak"||$page=="Kec_jumlah_pembinaan_wajak"||$page=="Kec_jumlah_aset_dihapus_wajak"||$page=="Kec_jumlah_aset_wajak"||$page=="Kec_wisata_lokal_wajak"||$page=="Kec_luas_wilayah_wajak"||$page=="Kec_jumlah_tempat_ibadah_wajak"||$page=="Wajak_struktur_pemerintahan"||$page=="Kec_banyak_lapangan_olahraga_wajak"||$page=="Kec_penduduk_berdasarkan_agama_wajak"||$page=="Kec_jamkesmas_wajak"){echo 'active';}?>">  
								<a href="#"><i class="fa fa-arrow-right"></i><span>Wajak</span>
								<span class="pull-right-container">
								 <i class="fa fa-angle-left pull-right"></i>
								</span>
								</a>
								<ul class="treeview-menu">
									<li class="<?php if($page=="Wajak_struktur_pemerintahan"){echo 'active';}?>"><a href="<?= base_url('Wajak_struktur_pemerintahan'); ?>"><i class="fa fa-circle-o"></i>Struktur Pemerintahan</a></li>
									<li class="<?php if($page=="Kec_banyak_lapangan_olahraga_wajak"){echo 'active';}?>"><a href="<?= base_url('Kec_banyak_lapangan_olahraga_wajak'); ?>"><i class="fa fa-circle-o"></i>Banyak Lapangan Olahraga</a></li>
									<li class="<?php if($page=="Kec_penduduk_berdasarkan_agama_wajak"){echo 'active';}?>"><a href="<?= base_url('Kec_penduduk_berdasarkan_agama_wajak'); ?>"><i class="fa fa-circle-o"></i>Jumlah Berdasarkan Agama</a></li>
									<li class="<?php if($page=="Kec_jumlah_tempat_ibadah_wajak"){echo 'active';}?>"><a href="<?= base_url('Kec_jumlah_tempat_ibadah_wajak'); ?>"><i class="fa fa-circle-o"></i>Tempat Ibadah</a></li>
									<li class="<?php if($page=="Kec_luas_wilayah_wajak"){echo 'active';}?>"><a href="<?= base_url('Kec_luas_wilayah_wajak'); ?>"><i class="fa fa-circle-o"></i>Luas Wilayah</a></li>
									<li class="<?php if($page=="Kec_wisata_lokal_wajak"){echo 'active';}?>"><a href="<?= base_url('Kec_wisata_lokal_wajak'); ?>"><i class="fa fa-circle-o"></i>Tempat Wisata Lokal</a></li>
									<li class="<?php if($page=="Kec_jumlah_aset_wajak"){echo 'active';}?>"><a href="<?= base_url('Kec_jumlah_aset_wajak'); ?>"><i class="fa fa-circle-o"></i>Jumlah Aset</a></li>
									<li class="<?php if($page=="Kec_jumlah_aset_dihapus_wajak"){echo 'active';}?>"><a href="<?= base_url('Kec_jumlah_aset_dihapus_wajak'); ?>"><i class="fa fa-circle-o"></i>Jumlah Aset Yang DiHapus</a></li>
									<li class="<?php if($page=="Kec_jumlah_pembinaan_wajak"){echo 'active';}?>"><a href="<?= base_url('Kec_jumlah_pembinaan_wajak'); ?>"><i class="fa fa-circle-o"></i>Pembinaan</a></li>
									<li class="<?php if($page=="Kec_prestasi_yang_diraih_wajak"){echo 'active';}?>"><a href="<?= base_url('Kec_prestasi_yang_diraih_wajak'); ?>"><i class="fa fa-circle-o"></i>Prestasi Yang Diraih</a></li>
									<li class="<?php if($page=="Kec_jamkesmas_wajak"){echo 'active';}?>"><a href="<?= base_url('Kec_jamkesmas_wajak'); ?>"><i class="fa fa-circle-o"></i>Jaminan Kesehatan</a></li>
									<li class="<?php if($page=="Kec_jumlah_jenis_pelayanan_wajak"){echo 'active';}?>"><a href="<?= base_url('Kec_jumlah_jenis_pelayanan_wajak'); ?>"><i class="fa fa-circle-o"></i>Jenis Pelayanan</a></li>
								</ul>
						  </li>
						  <li class="treeview <?php if($page=="Kec_jumlah_jenis_pelayanan_wonosari"||$page=="Kec_prestasi_yang_diraih_wonosari"||$page=="Kec_jumlah_pembinaan_wonosari"||$page=="Kec_jumlah_aset_dihapus_wonosari"||$page=="Kec_jumlah_aset_wonosari"||$page=="Kec_wisata_lokal_wonosari"||$page=="Kec_luas_wilayah_wonosari"||$page=="Kec_jumlah_tempat_ibadah_wonosari"||$page=="Wonosari_struktur_pemerintahan"||$page=="Kec_banyak_lapangan_olahraga_wonosari"||$page=="Kec_penduduk_berdasarkan_agama_wonosari"||$page=="Kec_jamkesmas_wonosari"){echo 'active';}?>">  
								<a href="#"><i class="fa fa-arrow-right"></i><span>Wonosari</span>
								<span class="pull-right-container">
								 <i class="fa fa-angle-left pull-right"></i>
								</span>
								</a>
								<ul class="treeview-menu">
									<li class="<?php if($page=="Wonosari_struktur_pemerintahan"){echo 'active';}?>"><a href="<?= base_url('Wonosari_struktur_pemerintahan'); ?>"><i class="fa fa-circle-o"></i>Struktur Pemerintahan</a></li>
									<li class="<?php if($page=="Kec_banyak_lapangan_olahraga_wonosari"){echo 'active';}?>"><a href="<?= base_url('Kec_banyak_lapangan_olahraga_wonosari'); ?>"><i class="fa fa-circle-o"></i>Banyak Lapangan Olahraga</a></li>
									<li class="<?php if($page=="Kec_penduduk_berdasarkan_agama_wonosari"){echo 'active';}?>"><a href="<?= base_url('Kec_penduduk_berdasarkan_agama_wonosari'); ?>"><i class="fa fa-circle-o"></i>Jumlah Berdasarkan Agama</a></li>
									<li class="<?php if($page=="Kec_jumlah_tempat_ibadah_wonosari"){echo 'active';}?>"><a href="<?= base_url('Kec_jumlah_tempat_ibadah_wonosari'); ?>"><i class="fa fa-circle-o"></i>Tempat Ibadah</a></li>
									<li class="<?php if($page=="Kec_luas_wilayah_wonosari"){echo 'active';}?>"><a href="<?= base_url('Kec_luas_wilayah_wonosari'); ?>"><i class="fa fa-circle-o"></i>Luas Wilayah</a></li>
									<li class="<?php if($page=="Kec_wisata_lokal_wonosari"){echo 'active';}?>"><a href="<?= base_url('Kec_wisata_lokal_wonosari'); ?>"><i class="fa fa-circle-o"></i>Tempat Wisata Lokal</a></li>
									<li class="<?php if($page=="Kec_jumlah_aset_wonosari"){echo 'active';}?>"><a href="<?= base_url('Kec_jumlah_aset_wonosari'); ?>"><i class="fa fa-circle-o"></i>Jumlah Aset</a></li>
									<li class="<?php if($page=="Kec_jumlah_aset_dihapus_wonosari"){echo 'active';}?>"><a href="<?= base_url('Kec_jumlah_aset_dihapus_wonosari'); ?>"><i class="fa fa-circle-o"></i>Jumlah Aset Yang DiHapus</a></li>
									<li class="<?php if($page=="Kec_jumlah_pembinaan_wonosari"){echo 'active';}?>"><a href="<?= base_url('Kec_jumlah_pembinaan_wonosari'); ?>"><i class="fa fa-circle-o"></i>Pembinaan</a></li>
									<li class="<?php if($page=="Kec_prestasi_yang_diraih_wonosari"){echo 'active';}?>"><a href="<?= base_url('Kec_prestasi_yang_diraih_wonosari'); ?>"><i class="fa fa-circle-o"></i>Prestasi Yang Diraih</a></li>
									<li class="<?php if($page=="Kec_jamkesmas_wonosari"){echo 'active';}?>"><a href="<?= base_url('Kec_jamkesmas_wonosari'); ?>"><i class="fa fa-circle-o"></i>Jaminan Kesehatan</a></li>
									<li class="<?php if($page=="Kec_jumlah_jenis_pelayanan_wonosari"){echo 'active';}?>"><a href="<?= base_url('Kec_jumlah_jenis_pelayanan_wonosari'); ?>"><i class="fa fa-circle-o"></i>Jenis Pelayanan</a></li>
								</ul>
						  </li>
						  </ul>
                        </li>

                        <li class="<?php if($page=="InputBencana"||$page=="Sarana"||$page=="Kebakaran"||$page=="Bencana"||$page=="Pemadam"||$page=="Pamongpraja"||$page=="JenisKorban"||$page=="Banyakbencana"||$page=="Unjukrasa"){echo 'active';}?> treeview">
                          <a href="#">
                            <i class="fa fa-folder"></i> <span>Ketentraman & Ketertiban</span>
                            <span class="pull-right-container">
                              <i class="fa fa-angle-left pull-right"></i>
                            </span>
                          </a>
                          <ul class="treeview-menu">
                            <li class="<?php if($page=="InputBencana"){echo 'active';}?>">
                                <a href="<?= base_url('InputBencana'); ?>"><i class="fa fa-arrow-right"></i>Input Bencana</a>
                            </li>
                            <li class="<?php if($page=="Sarana"){echo 'active';}?>"> 
                                <a href="<?= base_url('Sarana'); ?>"><i class="fa fa-arrow-right"></i>Sarana Keamanan</a>
                            </li>
                            <li class="<?php if($page=="Bencana"){echo 'active';}?>">
                                <a href="<?= base_url('Bencana'); ?>"><i class="fa fa-arrow-right"></i>Jumlah Korban Bencana</a>
                            </li>
                             <li class="<?php if($page=="Kebakaran"){echo 'active';}?>"> 
                                <a href="<?= base_url('Kebakaran'); ?>"><i class="fa fa-arrow-right"></i>Banyak Kebakaran</a>
                            </li>
                            <li class="<?php if($page=="Pemadam"){echo 'active';}?>">
                                <a href="<?= base_url('Pemadam'); ?>"><i class="fa fa-arrow-right"></i>Banyak Mobil Pemadam</a>
                            </li>
                             <li class="<?php if($page=="Pamongpraja"){echo 'active';}?>"> 
                                <a href="<?= base_url('Pamongpraja'); ?>"><i class="fa fa-arrow-right"></i>Jumlah Satpol PP</a>
                            </li>
                            <li class="<?php if($page=="Banyakbencana"){echo 'active';}?>">
                                <a href="<?= base_url('Banyakbencana'); ?>"><i class="fa fa-arrow-right"></i>Banyak Bencana Alam</a>
                            </li>
                             <li class="<?php if($page=="JenisKorban"){echo 'active';}?>">
                                <a href="<?= base_url('JenisKorban'); ?>"><i class="fa fa-arrow-right"></i>Banyak Korban Usia</a>
                            </li>
                              <li class="<?php if($page=="Unjukrasa"){echo 'active';}?>">
                                <a href="<?= base_url('Unjukrasa'); ?>"><i class="fa fa-arrow-right"></i>Unjuk Rasa</a>
                            </li>
                          </ul>
                        </li>
                        
						
						<li class="<?php if($page=="Diztribusi"||$page=="InputBibit"||$page=="Lokasi_pencemaran"||$page=="Perusahaan_limbah"){echo 'active';}?> treeview">
                          <a href="#">
                            <i class="fa fa-folder"></i> <span>Lingkungan Hidup</span>
                            <span class="pull-right-container">
                              <i class="fa fa-angle-left pull-right"></i>
                            </span>
                          </a>
                          <ul class="treeview-menu">
                          <li class="<?php if($page=="InputBibit"){echo 'active';}?>">
                                <a href="<?= base_url('InputBibit'); ?>"><i class="fa fa-arrow-right"></i>Input Bibit Tanaman</a>
                            </li>
                            <li class="<?php if($page=="Diztribusi"){echo 'active';}?>">
                                <a href="<?= base_url('Diztribusi'); ?>"><i class="fa fa-arrow-right"></i>Distribusi Bibit Tanaman</a>
                            </li>
                             <li class="<?php if($page=="Lokasi_pencemaran"){echo 'active';}?>">
                                <a href="<?= base_url('Lokasi_pencemaran'); ?>"><i class="fa fa-arrow-right"></i>Lokasi Pencemaran</a>
                            </li>
                            <li class="<?php if($page=="Perusahaan_limbah"){echo 'active';}?>">
                                <a href="<?= base_url('Perusahaan_limbah'); ?>"><i class="fa fa-arrow-right"></i>Perusahaan Limbah</a>
                            </li>
                          </ul>
                        </li>
						
                        <li class="<?php if($page=="InputTerminal"||$page=="Lokasi_terminal"||$page=="Banyakkendaraan"||$page=="Penumpangangkutan"){echo 'active';}?> treeview">
                          <a href="#">
                            <i class="fa fa-folder"></i> <span>Perhubungan</span>
                            <span class="pull-right-container">
                              <i class="fa fa-angle-left pull-right"></i>
                            </span>
                          </a>
                          <ul class="treeview-menu">
                          <li class="<?php if($page=="InputTerminal"){echo 'active';}?>">
                                <a href="<?= base_url('InputTerminal'); ?>"><i class="fa fa-arrow-right"></i>Input Terminal</a>
                            </li>
                            
                             <li class="<?php if($page=="Lokasi_terminal"){echo 'active';}?>">
                                <a href="<?= base_url('Lokasi_terminal'); ?>"><i class="fa fa-arrow-right"></i>Lokasi Terminal</a>
                            </li>
                              <li class="<?php if($page=="Banyakkendaraan"){echo 'active';}?>">
                                <a href="<?= base_url('Banyakkendaraan'); ?>"><i class="fa fa-arrow-right"></i>Banyak Kendaraan</a>
                            </li>
                            <li class="<?php if($page=="Penumpangangkutan"){echo 'active';}?>">
                                <a href="<?= base_url('Penumpangangkutan'); ?>"><i class="fa fa-arrow-right"></i>Penumpang Kereta </a>
                            </li>
                          </ul>
                        </li>
						
                         <li class="<?php if($page=="LembagaMasyarakat"||$page=="KelompokEkonomi"){echo 'active';}?> treeview">
                          <a href="#">
                            <i class="fa fa-folder"></i> <span>Pemberdayaan Masyarakat</span>
                            <span class="pull-right-container">
                              <i class="fa fa-angle-left pull-right"></i>
                            </span>
                          </a>
                          <ul class="treeview-menu">
                          <li class="<?php if($page=="LembagaMasyarakat"){echo 'active';}?>">
                                <a href="<?= base_url('LembagaMasyarakat'); ?>"><i class="fa fa-arrow-right"></i>Lembaga Masyarakat</a>
                            </li>
                            
                             <li class="<?php if($page=="KelompokEkonomi"){echo 'active';}?>">
                                <a href="<?= base_url('KelompokEkonomi'); ?>"><i class="fa fa-arrow-right"></i>Kelompok Ekonomi</a>
                            </li>
                          </ul>
                        </li>
						
						<li class="<?php if($page=="Negara"||$page=="Pasar_tradisional"||$page=="Pasar_modern"||$page=="Sarana_perdagangan"||$page=="Ekspor_komoditi"||$page=="Ekspor_negara_tujuan"||$page=="Impor_negara_asal"){echo 'active';}?> treeview">
                          <a href="#">
                            <i class="fa fa-folder"></i> <span>Perdagangan</span>
                            <span class="pull-right-container">
                              <i class="fa fa-angle-left pull-right"></i>
                            </span>
                          </a>
                          <ul class="treeview-menu">
                           <li class="<?php if($page=="Negara"){echo 'active';}?>">  
                                <a href="<?= base_url('Negara'); ?>"><i class="fa fa-arrow-right"></i>Kelola Master Negara</a>
                            </li>
                           <li class="<?php if($page=="Pasar_tradisional"){echo 'active';}?>">
                                <a href="<?= base_url('Pasar_tradisional'); ?>"><i class="fa fa-arrow-right"></i>Pasar Tradisional</a>
                            </li>
                            <li class="<?php if($page=="Pasar_modern"){echo 'active';}?>">
                                <a href="<?= base_url('Pasar_modern'); ?>"><i class="fa fa-arrow-right"></i>Pasar Modern</a>
                            </li>
                            <li class="<?php if($page=="Sarana_perdagangan"){echo 'active';}?>"> 
                                <a href="<?= base_url('Sarana_perdagangan'); ?>"><i class="fa fa-arrow-right"></i>Sarana Perdagangan</a>
                            </li>
                             <li class="<?php if($page=="Ekspor_komoditi"){echo 'active';}?>">
                                <a href="<?= base_url('Ekspor_komoditi'); ?>"><i class="fa fa-arrow-right"></i>Ekspor Komiditi</a>
                            </li>
                             <li class="<?php if($page=="Ekspor_negara_tujuan"||$page=="Impor_negara_asal"){echo 'active';}?> treeview">
                                <a href="#">
                                <i class="fa fa-arrow-right"></i>Ekspor Impor Negara
                                <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                                </span>
                                </a>
                                    <ul class="treeview-menu">
                                 <li class="<?php if($page=="Ekspor_negara_tujuan"){echo 'active';}?>">
                                <a href="<?= base_url('Ekspor_negara_tujuan'); ?>"><i class="fa fa-arrow-right"></i>Ekspor Negara</a>
                                </li>
                                 <li class="<?php if($page=="Impor_negara_asal"){echo 'active';}?>">
                                <a href="<?= base_url('Impor_negara_asal'); ?>"><i class="fa fa-arrow-right"></i>Impor Negara</a>
                                </li>
                                    </ul>
                            </li> 
                          </a>
                          </ul>
                        </li>

                        <li class="<?php if($page=="C_master_bidang"||$page=="Jenis_industri"||$page=="Komoditi"||$page=="Klasifikasi"||$page=="Industri_kecil"||$page=="Industri_rumah_tangga"||$page=="Investasi_pmdn"||$page=="Banding_kembang_realisasi_ekspor"||$page=="Perusahaan_klasifikasi"){echo 'active';}?> treeview">
                          <a href="#">
                            <i class="fa fa-folder"></i> <span>Perindustrian</span>
                            <span class="pull-right-container">
                              <i class="fa fa-angle-left pull-right"></i>
                            </span>
                          </a>
                          <ul class="treeview-menu">
                            <li class="<?php if($page=="Jenis_industri"){echo 'active';}?>">  
                                <a href="<?= base_url('Jenis_industri'); ?>"><i class="fa fa-arrow-right"></i>Kelola Master Jenis Industri</a>
                            </li>
                            <li class="<?php if($page=="C_master_bidang"){echo 'active';}?>">  
                                <a href="<?= base_url('C_master_bidang'); ?>"><i class="fa fa-arrow-right"></i>Kelola Master Bidang Usaha</a>
                            </li>
                            <li class="<?php if($page=="Komoditi"){echo 'active';}?>">  
                                <a href="<?= base_url('Komoditi'); ?>"><i class="fa fa-arrow-right"></i>Kelola Master Komoditi</a>
                            </li>
                            <li class="<?php if($page=="Klasifikasi"){echo 'active';}?>">  
                                <a href="<?= base_url('Klasifikasi'); ?>"><i class="fa fa-arrow-right"></i>Kelola Master Klasifikasi</a>
                            </li>
                            <li class="<?php if($page=="Industri_kecil"||$page=="Industri_rumah_tangga"){echo 'active';}?> treeview">
                                <a href="#">
                                <i class="fa fa-arrow-right"></i>Jenis Industri
                                <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                                </span>
                                </a>
                                    <ul class="treeview-menu">
                                <li class="<?php if($page=="Industri_kecil"){echo 'active';}?>">
                                <a href="<?= base_url('Industri_kecil'); ?>"><i class="fa fa-circle-o"></i>Industri Kecil</a>
                                </li>
                                <li class="<?php if($page=="Industri_rumah_tangga"){echo 'active';}?>">
                                <a href="<?= base_url('Industri_rumah_tangga'); ?>"><i class="fa fa-circle-o"></i>Industri Rumah Tangga</a>
                                </li>
                                    </ul>
                            </li> 
                            <li class="<?php if($page=="Investasi_pmdn"){echo 'active';}?>">  
                                <a href="<?= base_url('Investasi_pmdn'); ?>"><i class="fa fa-arrow-right"></i>Investasi PMDN</a>
                            </li>
                            <li class="<?php if($page=="Banding_kembang_realisasi_ekspor"){echo 'active';}?>">  
                                <a href="<?= base_url('Banding_kembang_realisasi_ekspor'); ?>"><i class="fa fa-arrow-right"></i>Realisasi Ekspor</a>
                            </li>
                            <li class="<?php if($page=="Perusahaan_klasifikasi"){echo 'active';}?>">  
                                <a href="<?= base_url('Perusahaan_klasifikasi'); ?>"><i class="fa fa-arrow-right"></i>Perusahaan Klasifikasi</a>
                            </li>
                            
                          </ul>
                        </li>

                        <li class="<?php if($page=="Provinsi"||$page=="Transmigrasi"){echo 'active';}?> treeview">
                          <a href="#">
                            <i class="fa fa-folder"></i> <span>Transmigrasi</span>
                            <span class="pull-right-container">
                              <i class="fa fa-angle-left pull-right"></i>
                            </span>
                          </a>
                          <ul class="treeview-menu">
                           <li class="<?php if($page=="Provinsi"){echo 'active';}?>"> 
                                <a href="<?= base_url('Provinsi'); ?>"><i class="fa fa-arrow-right"></i>Kelola Master Provinsi</a>
                            </li>
                           <li class="<?php if($page=="Transmigrasi"){echo 'active';}?>">
                                <a href="<?= base_url('Transmigrasi'); ?>"><i class="fa fa-arrow-right"></i>Pemberangkatan Transmigran</a>
                            </li>         
                          </a>
                          </ul>
                        </li>
						
						<li class="<?php if($page=="C_master_perda"||$page=="C_master_provider"||$page=="C_master_kerjasama"||$page=="C_master_negara"||$page=="C_kominfo"||$page=="C_kerjasama_media"||$page=="C_twr"||$page=="C_apl"||$page=="C_pengunjung_negara"||$page=="internetkecamatan"||$page=="internetrumahsakit"){echo 'active';}?> treeview">
                          <a href="#">
                            <i class="fa fa-folder"></i> <span>Komunikasi & Informatika</span>
                            <span class="pull-right-container">
                              <i class="fa fa-angle-left pull-right"></i>
                            </span>
                          </a>
                           <ul class="treeview-menu">
                           <li class="<?php if($page=="C_master_perda"){echo 'active';}?>">  
                                <a href="<?= base_url('C_master_perda'); ?>"><i class="fa fa-arrow-right"></i>Master Kantor Perangkat Daerah</a>
                            </li>
                            <li class="<?php if($page=="C_master_provider"){echo 'active';}?>">  
                                <a href="<?= base_url('C_master_provider'); ?>"><i class="fa fa-arrow-right"></i>Master Provider</a>
                            </li>
                            <li class="<?php if($page=="C_master_kerjasama"){echo 'active';}?>">  
                                <a href="<?= base_url('C_master_kerjasama'); ?>"><i class="fa fa-arrow-right"></i>Master Kerjasama</a>
                            </li>
                         
                            <li class="<?php if($page=="C_master_negara"){echo 'active';}?>">  
                                <a href="<?= base_url('C_master_negara'); ?>"><i class="fa fa-arrow-right"></i>Master Negara</a>
                            </li>
                            <li class="<?php if($page=="C_kominfo"){echo 'active';}?> treeview">
                                    <a href="#">
                                    <i class="fa fa-arrow-right"></i> <span>Terhubung AIFB</span>
                                    <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                    </span>
                                    </a>
                            <ul class="treeview-menu">
                            <li class="<?php if($page=="internetkecamatan"){echo 'active';}?>">  
                                <a href="<?= base_url('internetkecamatan'); ?>"><i class="fa fa-circle-o"></i>Kantor Kecamatan</a>
                            </li>
                            <li class="<?php if($page=="C_kominfo"){echo 'active';}?>">  
                                <a href="<?= base_url('C_kominfo'); ?>"><i class="fa fa-circle-o"></i>Perangkat Daerah</a>
                            </li>
                             <li class="<?php if($page=="internetrumahsakit"){echo 'active';}?>">  
                                <a href="<?= base_url('internetrumahsakit'); ?>"><i class="fa fa-circle-o"></i>Rumah Sakit</a>
                            </li>
                            </ul> 
                            <li class="<?php if($page=="C_kerjasama_media"){echo 'active';}?>">  
                                <a href="<?= base_url('C_kerjasama_media'); ?>"><i class="fa fa-arrow-right"></i>Kerjasama Media</a>
                            </li>
                            <li class="<?php if($page=="C_twr"){echo 'active';}?>">  
                                <a href="<?= base_url('C_twr'); ?>"><i class="fa fa-arrow-right"></i>Tower di setiap Kecamatan</a>
                            </li>
                            <li class="<?php if($page=="C_apl"){echo 'active';}?>">  
                                <a href="<?= base_url('C_apl'); ?>"><i class="fa fa-arrow-right"></i>Aplikasi Terselesaikan</a>
                            </li>

                           
                         <!--    <li class="<?php if($page=="C_pengunjung_negara"){echo 'active';}?> treeview">
                                    <a href="#">
                                    <i class="fa fa-arrow-right"></i> <span>Pengunjung Website Resmi</span>
                                    <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                    </span>
                                    </a>
                            <ul class="treeview-menu">
                            <li class="<?php if($page=="C_pengunjung_negara"){echo 'active';}?>">  
                                <a href="<?= base_url('C_pengunjung_negara'); ?>"><i class="fa fa-arrow-right"></i>Berdasarkan Negara</a>
                            </li>
                            </ul>
							</li> -->
                          </ul>   
                        </li>

                        <li class="<?php if($page=="C_penanaman"||$page=="C_penanaman/perkembangan"){echo 'active';}?> treeview">
                          <a href="#">
                            <i class="fa fa-folder"></i> <span>Penanaman Modal</span>
                            <span class="pull-right-container">
                              <i class="fa fa-angle-left pull-right"></i>
                            </span>
                          </a>
                           <ul class="treeview-menu">
                            <li class="<?php $pagex=$this->uri->segment(2); if($page=="C_penanaman"&&$pagex==""){echo 'active';}?>">  
                                <a href="<?= base_url('C_penanaman'); ?>"><i class="fa fa-arrow-right"></i>Penanaman Modal </a>
                                </li>
                            </li>
							
                            <li class="<?php $pagex=$this->uri->segment(2); if($page=="C_penanaman"&&$pagex=="perkembangan"){echo 'active';}?>">  
                                <a href="<?= base_url('C_penanaman/perkembangan'); ?>"><i class="fa fa-arrow-right"></i>Perkembangan PMDN </a>
                            </li> 
                        </li>
                        </ul>


                    

                        <li class="<?php if($page=="C_cabangolah"||$page=="C_prasarana"||$page=="C_master_cabangolahraga"){echo 'active';}?> treeview">
                            <a href="#">
                                <i class="fa fa-folder"></i> <span>Kepemudaan & Olahraga</span>
                                    <span class="pull-right-container">
                                        <i class="fa fa-angle-left pull-right"></i>
                                    </span>
                            </a>
                            <ul class="treeview-menu">
                            <li class="<?php if($page=="C_master_cabangolahraga"){echo 'active';}?>">  
                                <a href="<?= base_url('C_master_cabangolahraga'); ?>"><i class="fa fa-arrow-right"></i>Master Cabang Olahraga</a>
                            </li>
                        
                                <li class="<?php if($page=="C_cabangolah"){echo 'active';}?>">  
                                    <a href="<?= base_url('C_cabangolah'); ?>"><i class="fa fa-arrow-right"></i>Atlet & Pelatih Berprestasi</a>
                                </li>
                                <li class="<?php if($page=="C_prasarana"){echo 'active';}?>">  
                                    <a href="<?= base_url('C_prasarana'); ?>"><i class="fa fa-arrow-right"></i>Prasarana Olahraga</a>
                                </li>
                            </ul>
                        </li>
						
						<li class="<?php if($page=="C_potensi_unggulan"||$page=="C_wisatawan"||$page=="C_wisatawan_menginap"||$page=="C_desa_wisata"||$page=="C_wisata_buatan"||$page=="C_wisata_alam"||$page=="C_wisata_budaya"||$page=="C_warisan_budaya"){echo 'active';}?> treeview">
                          <a href="#">
                            <i class="fa fa-folder"></i> <span>Pariwisata</span>
                            <span class="pull-right-container">
                              <i class="fa fa-angle-left pull-right"></i>
                            </span>
                          </a>
                          <ul class="treeview-menu">
                            <li class="<?php if($page=="C_potensi_unggulan"){echo 'active';}?>">  
                                <a href="<?= base_url('C_potensi_unggulan'); ?>"><i class="fa fa-arrow-right"></i>Potensi Unggulan</a>
                                
                            </li>
                            <li class="<?php if($page=="C_wisatawan"){echo 'active';}?>">  
                                <a href="<?= base_url('C_wisatawan'); ?>"><i class="fa fa-arrow-right"></i>Wisatawan Datang</a>
                            </li>
                            <li class="<?php if($page=="C_wisatawan_menginap"){echo 'active';}?>">  
                                <a href="<?= base_url('C_wisatawan_menginap'); ?>"><i class="fa fa-arrow-right"></i>Wisatawan Menginap</a>
                            </li>
                            <li class="<?php if($page=="C_desa_wisata"){echo 'active';}?>">  
                                <a href="<?= base_url('C_desa_wisata'); ?>"><i class="fa fa-arrow-right"></i>Desa Wisata</a>
                            </li>
                            <li class="<?php if($page=="C_wisata_buatan"){echo 'active';}?>">  
                                <a href="<?= base_url('C_wisata_buatan'); ?>"><i class="fa fa-arrow-right"></i>Wisata Buatan</a>
                            </li>
                            <li class="<?php if($page=="C_wisata_alam"){echo 'active';}?>">  
                                <a href="<?= base_url('C_wisata_alam'); ?>"><i class="fa fa-arrow-right"></i>Wisata Alam</a>
                            </li>
                            <li class="<?php if($page=="C_wisata_budaya"){echo 'active';}?>">  
                                <a href="<?= base_url('C_wisata_budaya'); ?>"><i class="fa fa-arrow-right"></i>Wisata Budaya</a>
                            </li>
                            <li class="<?php if($page=="C_warisan_budaya"){echo 'active';}?>">  
                                <a href="<?= base_url('C_warisan_budaya'); ?>"><i class="fa fa-arrow-right"></i>Jumlah Warisan Budaya</a>
                            </li>
                          </ul>
                        </li>


                        <li class="<?php if($page=="C_ternak_dipotong"||$page=="C_master_unggas"||$page=="C_master_hewan_ternak"||$page=="C_master_susu"||$page=="C_produksi_telur"||$page=="C_master_daging"||$page=="C_produksi_susu"||$page=="C_vaksinasi_avian"||$page=="C_usaha_peternakan"||$page=="C_produksi_daging"||$page=="C_wisatawan_menginap"||$page=="C_desa_wisata"||$page=="C_wisata_buatan"){echo 'active';}?> treeview">
                          <a href="#">
                            <i class="fa fa-folder"></i> <span>Pertanian</span>
                            <span class="pull-right-container">
                              <i class="fa fa-angle-left pull-right"></i>
                            </span>
                          </a>
                          <ul class="treeview-menu">


                            <li class="<?php if($page=="C_master_daging"){echo 'active';}?>">  
                                <a href="<?= base_url('C_master_daging'); ?>"><i class="fa fa-arrow-right"></i>Master Daging</a>
                            </li>
                            <li class="<?php if($page=="C_master_susu"){echo 'active';}?>">  
                                <a href="<?= base_url('C_master_susu'); ?>"><i class="fa fa-arrow-right"></i>Master Susu</a>
                            </li>
                            <li class="<?php if($page=="C_master_hewan_ternak"){echo 'active';}?>">  
                                <a href="<?= base_url('C_master_hewan_ternak'); ?>"><i class="fa fa-arrow-right"></i>Master Hewan Ternak</a>
                            </li>
                            <li class="<?php if($page=="C_master_unggas"){echo 'active';}?>">  
                                <a href="<?= base_url('C_master_unggas'); ?>"><i class="fa fa-arrow-right"></i>Master Unggas</a>
                            </li>



                            <li class="<?php if($page=="C_ternak_dipotong"){echo 'active';}?>">  
                                <a href="<?= base_url('C_ternak_dipotong'); ?>"><i class="fa fa-arrow-right"></i>Jumlah Ternak Dipotong</a>
                            </li>
                            <li class="<?php if($page=="C_produksi_daging"){echo 'active';}?>">  
                                <a href="<?= base_url('C_produksi_daging'); ?>"><i class="fa fa-arrow-right"></i>Produksi Daging</a>
                            </li>
                            <li class="<?php if($page=="C_produksi_susu"){echo 'active';}?>">  
                                <a href="<?= base_url('C_produksi_susu'); ?>"><i class="fa fa-arrow-right"></i>Produksi Susu</a>
                            </li>
                            <li class="<?php if($page=="C_vaksinasi_avian"){echo 'active';}?>">  
                                <a href="<?= base_url('C_vaksinasi_avian'); ?>"><i class="fa fa-arrow-right"></i>Vaksinasi Avian</a>
                            </li>
                            <li class="<?php if($page=="C_produksi_telur"){echo 'active';}?>">  
                                <a href="<?= base_url('C_produksi_telur'); ?>"><i class="fa fa-arrow-right"></i>Produksi Telur</a>
                            </li>
                            <li class="<?php if($page=="C_usaha_peternakan"){echo 'active';}?>">  
                                <a href="<?= base_url('C_usaha_peternakan'); ?>"><i class="fa fa-arrow-right"></i>Usaha Peternakan </a>
                            </li>
                          </ul>
                        </li>

                        <li class="<?php if($page=="C_pelanggan_pdam"||$page=="C_volume_air_minum_pdam"){echo 'active';}?> treeview">
                          <a href="#">
                            <i class="fa fa-folder"></i> <span>Energi dan SDA</span>
                            <span class="pull-right-container">
                              <i class="fa fa-angle-left pull-right"></i>
                            </span>
                          </a>
                          <ul class="treeview-menu">
                            <li class="<?php if($page=="C_pelanggan_pdam"){echo 'active';}?>">  
                                <a href="<?= base_url('C_pelanggan_pdam'); ?>"><i class="fa fa-arrow-right"></i>Jumlah Pelanggan PDAM</a>
                            </li>
                            <li class="<?php if($page=="C_volume_air_minum_pdam"){echo 'active';}?>">  
                                <a href="<?= base_url('C_volume_air_minum_pdam'); ?>"><i class="fa fa-arrow-right"></i>Volume Air Minum PDAM</a>
                            </li>
                          </ul>
                        </li>
						
						<li class="<?php if($page=="master_tajukbuku"||$page=="jumlahkoleksibuku"||$page=="pengunjungperpusjkel"||$page=="pengunjungperpustpend"||$page=="pengunjungperpusspekerjaan"){echo 'active';}?> treeview">
                          <a href="#">
                            <i class="fa fa-folder"></i> <span>Perpustakaan</span>
                            <span class="pull-right-container">
                              <i class="fa fa-angle-left pull-right"></i>
                            </span>
                          </a>
                          <ul class="treeview-menu">
                           <li class="<?php if($page=="master_tajukbuku"){echo 'active';}?>">  
                                <a href="<?= base_url('master_tajukbuku'); ?>"><i class="fa fa-arrow-right"></i>Master Tajuk Buku</a>
                            </li>
                            <li class="<?php if($page=="jumlahkoleksibuku"){echo 'active';}?>">  
                                <a href="<?= base_url('jumlahkoleksibuku'); ?>"><i class="fa fa-arrow-right"></i>Jumlah Koleksi Buku</a>
                            </li>
                            <li class="<?php if($page=="jumlahkoleksibuku"||$page=="pengunjungperpusjkel"||$page=="pengunjungperpustpend"||$page=="pengunjungperpusspekerjaan"){echo 'active';}?> treeview">
                          <a href="#">
                            <i class="fa fa-folder"></i> <span>Pengunjung Perpustakaan</span>
                            <span class="pull-right-container">
                              <i class="fa fa-angle-left pull-right"></i>
                            </span>
                          </a>
                            <ul class="treeview-menu">
                            <li class="<?php if($page=="pengunjungperpusjkel"){echo 'active';}?>">  
                                <a href="<?= base_url('pengunjungperpusjkel'); ?>"><i class="fa fa-arrow-right"></i>Berdasarkan Jenis Kelamin</a>
                            </li>
                            <li class="<?php if($page=="pengunjungperpustpend"){echo 'active';}?>">  
                                <a href="<?= base_url('pengunjungperpustpend'); ?>"><i class="fa fa-arrow-right"></i>Berdasarkan Pendidikan </a>
                            </li>
                             <li class="<?php if($page=="pengunjungperpusspekerjaan"){echo 'active';}?>">  
                                <a href="<?= base_url('pengunjungperpusspekerjaan'); ?>"><i class="fa fa-arrow-right"></i>Berdasarkan Pekerjaan </a>
                            </li>
							</ul>
                            </li>
                           </ul>
                    </li>
                   
                    <li class="<?php if($page=="Produksiperikanan"||$page=="produksiikan"||$page=="master_semuaikan"){echo 'active';}?> treeview">
                          <a href="#">
                            <i class="fa fa-folder"></i> <span>Perikanan & Kelautan</span>
                            <span class="pull-right-container">
                              <i class="fa fa-angle-left pull-right"></i>
                            </span>
                          </a>
                        <ul class="treeview-menu">
                        <li class="<?php if($page=="master_semuaikan"){echo 'active';}?>">  
                                <a href="<?= base_url('master_semuaikan'); ?>"><i class="fa fa-arrow-right"></i>Master Ikan</a>
                                
                            </li>
                            <li class="<?php if($page=="Produksiperikanan"){echo 'active';}?>">  
                                <a href="<?= base_url('Produksiperikanan'); ?>"><i class="fa fa-arrow-right"></i>Produksi Perikanan</a>
                                
                            </li>
                            <li class="<?php if($page=="produksiikan"){echo 'active';}?>">  
                                <a href="<?= base_url('produksiikan'); ?>"><i class="fa fa-arrow-right"></i>Produksi Ikan (TON)</a>
                            </li>
                        </ul>
                    </li>  
				
						
                        <li>
                            <a href="<?= base_url('login/logout'); ?>">
                                <i class="fa fa-close"></i> <span>Logout</span>
                            </a>
                        </li>
						
						

                    </ul>
                </section>
                <!-- /.sidebar -->
            </aside>
	<style>
	td {
	padding: 5px;
	}
	</style>
