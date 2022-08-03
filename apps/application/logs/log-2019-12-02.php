<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2019-12-02 00:12:41 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\myci\application\vendor/autoload.php was not found.
DEBUG - 2019-12-02 00:12:41 --> UTF-8 Support Enabled
DEBUG - 2019-12-02 00:12:41 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2019-12-02 00:12:41 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2019-12-02 00:12:41 --> Google Maps Class Initialized
ERROR - 2019-12-02 00:12:41 --> Query error: Unknown column 'cpcl.tgl_rencana_tana' in 'order clause' - Invalid query: SELECT `cpcl`.*, if(cpcl.type_pelaksana=2, "Swakelola", "Kemitraan") as namapengelola, `wilayah_provinsi`.`nama` as `nama_prov`, `wilayah_kabupaten`.`nama` as `nama_kab`, `wilayah_kecamatan`.`nama` as `nama_kec`, `wilayah_desa`.`nama` as `nama_des`, sum(realisasi.luas_realisasi_tanam) as jmlrealisasi, sum(produksi.jml_produksi) as jmlproduksi
FROM `cpcl`
JOIN `wilayah_provinsi` ON `cpcl`.`provinsi` = `wilayah_provinsi`.`id`
JOIN `wilayah_kabupaten` ON `cpcl`.`kabupaten` = `wilayah_kabupaten`.`id`
JOIN `wilayah_kecamatan` ON `cpcl`.`kecamatan` = `wilayah_kecamatan`.`id`
JOIN `wilayah_desa` ON `cpcl`.`desa` = `wilayah_desa`.`id`
LEFT JOIN `realisasi` ON `cpcl`.`id_cpcl` = `realisasi`.`id_cpcl`
LEFT JOIN `produksi` ON `cpcl`.`id_cpcl` = `produksi`.`id_cpcl`
WHERE `cpcl`.`is_delete` = '0'
AND `cpcl`.`id_users` = '10'
ORDER BY `cpcl`.`tgl_rencana_tana` DESC
ERROR - 2019-12-02 00:16:47 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\myci\application\vendor/autoload.php was not found.
DEBUG - 2019-12-02 00:16:47 --> UTF-8 Support Enabled
DEBUG - 2019-12-02 00:16:47 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2019-12-02 00:16:47 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2019-12-02 00:16:47 --> Google Maps Class Initialized
DEBUG - 2019-12-02 00:16:47 --> Total execution time: 0.1276
ERROR - 2019-12-02 00:18:53 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\myci\application\vendor/autoload.php was not found.
DEBUG - 2019-12-02 00:18:53 --> UTF-8 Support Enabled
DEBUG - 2019-12-02 00:18:53 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2019-12-02 00:18:53 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2019-12-02 00:18:53 --> Google Maps Class Initialized
DEBUG - 2019-12-02 00:18:53 --> Total execution time: 0.1603
ERROR - 2019-12-02 00:19:05 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\myci\application\vendor/autoload.php was not found.
DEBUG - 2019-12-02 00:19:05 --> UTF-8 Support Enabled
DEBUG - 2019-12-02 00:19:05 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2019-12-02 00:19:05 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2019-12-02 00:19:05 --> Google Maps Class Initialized
DEBUG - 2019-12-02 00:19:05 --> Total execution time: 0.1117
ERROR - 2019-12-02 00:19:09 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\myci\application\vendor/autoload.php was not found.
DEBUG - 2019-12-02 00:19:09 --> UTF-8 Support Enabled
DEBUG - 2019-12-02 00:19:09 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2019-12-02 00:19:09 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2019-12-02 00:19:09 --> Google Maps Class Initialized
DEBUG - 2019-12-02 00:19:09 --> Total execution time: 0.1072
ERROR - 2019-12-02 00:19:38 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\myci\application\vendor/autoload.php was not found.
DEBUG - 2019-12-02 00:19:38 --> UTF-8 Support Enabled
DEBUG - 2019-12-02 00:19:38 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2019-12-02 00:19:38 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2019-12-02 00:19:38 --> Google Maps Class Initialized
DEBUG - 2019-12-02 00:19:39 --> Total execution time: 0.6362
ERROR - 2019-12-02 00:20:05 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\myci\application\vendor/autoload.php was not found.
DEBUG - 2019-12-02 00:20:05 --> UTF-8 Support Enabled
DEBUG - 2019-12-02 00:20:05 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2019-12-02 00:20:05 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2019-12-02 00:20:05 --> Google Maps Class Initialized
ERROR - 2019-12-02 00:20:05 --> Query error: Duplicate entry '0' for key 'PRIMARY' - Invalid query: INSERT INTO `produksi` (`id_realisasi`, `id_cpcl`, `id_users`, `type_pelaksana`, `nama_pelaksana`, `tgl_produksi`, `jml_produksi`, `luas_realisasi_tanam`, `status_lahan`, `kontur_lahan`, `provinsi`, `kabupaten`, `kecamatan`, `desa`, `address`, `atitude`, `latitude`) VALUES ('1', '1', '10', '1', 'BURHAN', '02/05/2020', '2000', '2', 'Hak Milik', '1', '32', '3213', '3213050', '3213050001', 'Kp. Gunungtua RT. 001 RW. 003 No. 50', '-6.613225905152722', '107.7677136899423')
ERROR - 2019-12-02 00:20:47 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\myci\application\vendor/autoload.php was not found.
DEBUG - 2019-12-02 00:20:47 --> UTF-8 Support Enabled
DEBUG - 2019-12-02 00:20:47 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2019-12-02 00:20:47 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2019-12-02 00:20:47 --> Google Maps Class Initialized
DEBUG - 2019-12-02 00:20:48 --> Total execution time: 0.7408
ERROR - 2019-12-02 00:21:10 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\myci\application\vendor/autoload.php was not found.
DEBUG - 2019-12-02 00:21:10 --> UTF-8 Support Enabled
DEBUG - 2019-12-02 00:21:10 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2019-12-02 00:21:10 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2019-12-02 00:21:10 --> Google Maps Class Initialized
ERROR - 2019-12-02 00:21:10 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\myci\application\vendor/autoload.php was not found.
DEBUG - 2019-12-02 00:21:10 --> UTF-8 Support Enabled
DEBUG - 2019-12-02 00:21:10 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2019-12-02 00:21:10 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2019-12-02 00:21:10 --> Google Maps Class Initialized
DEBUG - 2019-12-02 00:21:10 --> Total execution time: 0.1361
ERROR - 2019-12-02 00:21:22 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\myci\application\vendor/autoload.php was not found.
DEBUG - 2019-12-02 00:21:22 --> UTF-8 Support Enabled
DEBUG - 2019-12-02 00:21:22 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2019-12-02 00:21:22 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2019-12-02 00:21:22 --> Google Maps Class Initialized
DEBUG - 2019-12-02 00:21:22 --> Total execution time: 0.6755
ERROR - 2019-12-02 00:22:08 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\myci\application\vendor/autoload.php was not found.
DEBUG - 2019-12-02 00:22:08 --> UTF-8 Support Enabled
DEBUG - 2019-12-02 00:22:08 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2019-12-02 00:22:08 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2019-12-02 00:22:08 --> Google Maps Class Initialized
ERROR - 2019-12-02 00:22:08 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\myci\application\vendor/autoload.php was not found.
DEBUG - 2019-12-02 00:22:08 --> UTF-8 Support Enabled
DEBUG - 2019-12-02 00:22:08 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2019-12-02 00:22:08 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2019-12-02 00:22:08 --> Google Maps Class Initialized
ERROR - 2019-12-02 00:22:08 --> Severity: error --> Exception: Too few arguments to function Realisasi::daftarrealisasi(), 0 passed in C:\xampp\htdocs\myci\system\core\CodeIgniter.php on line 532 and exactly 1 expected C:\xampp\htdocs\myci\application\controllers\Realisasi.php 46
ERROR - 2019-12-02 00:24:14 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\myci\application\vendor/autoload.php was not found.
DEBUG - 2019-12-02 00:24:14 --> UTF-8 Support Enabled
DEBUG - 2019-12-02 00:24:14 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2019-12-02 00:24:14 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2019-12-02 00:24:14 --> Google Maps Class Initialized
DEBUG - 2019-12-02 00:24:14 --> Total execution time: 0.2175
ERROR - 2019-12-02 00:26:39 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\myci\application\vendor/autoload.php was not found.
DEBUG - 2019-12-02 00:26:39 --> UTF-8 Support Enabled
DEBUG - 2019-12-02 00:26:39 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2019-12-02 00:26:39 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2019-12-02 00:26:39 --> Google Maps Class Initialized
DEBUG - 2019-12-02 00:26:40 --> Total execution time: 0.6763
ERROR - 2019-12-02 00:27:19 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\myci\application\vendor/autoload.php was not found.
DEBUG - 2019-12-02 00:27:19 --> UTF-8 Support Enabled
DEBUG - 2019-12-02 00:27:19 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2019-12-02 00:27:19 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2019-12-02 00:27:19 --> Google Maps Class Initialized
ERROR - 2019-12-02 00:27:19 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\myci\application\vendor/autoload.php was not found.
DEBUG - 2019-12-02 00:27:19 --> UTF-8 Support Enabled
DEBUG - 2019-12-02 00:27:19 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2019-12-02 00:27:19 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2019-12-02 00:27:19 --> Google Maps Class Initialized
DEBUG - 2019-12-02 00:27:19 --> Total execution time: 0.1173
ERROR - 2019-12-02 00:27:46 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\myci\application\vendor/autoload.php was not found.
DEBUG - 2019-12-02 00:27:46 --> UTF-8 Support Enabled
DEBUG - 2019-12-02 00:27:46 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2019-12-02 00:27:46 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2019-12-02 00:27:46 --> Google Maps Class Initialized
ERROR - 2019-12-02 00:27:46 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\myci\application\vendor/autoload.php was not found.
DEBUG - 2019-12-02 00:27:46 --> UTF-8 Support Enabled
DEBUG - 2019-12-02 00:27:46 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2019-12-02 00:27:46 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2019-12-02 00:27:46 --> Google Maps Class Initialized
DEBUG - 2019-12-02 00:27:46 --> Total execution time: 0.1020
ERROR - 2019-12-02 00:27:46 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\myci\application\vendor/autoload.php was not found.
DEBUG - 2019-12-02 00:27:46 --> UTF-8 Support Enabled
DEBUG - 2019-12-02 00:27:46 --> Global POST, GET and COOKIE data sanitized
ERROR - 2019-12-02 00:27:46 --> 404 Page Not Found: Demo_files/images
ERROR - 2019-12-02 00:27:48 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\myci\application\vendor/autoload.php was not found.
DEBUG - 2019-12-02 00:27:49 --> UTF-8 Support Enabled
DEBUG - 2019-12-02 00:27:49 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2019-12-02 00:27:49 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2019-12-02 00:27:49 --> Google Maps Class Initialized
DEBUG - 2019-12-02 00:27:49 --> Total execution time: 0.1244
ERROR - 2019-12-02 00:27:50 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\myci\application\vendor/autoload.php was not found.
DEBUG - 2019-12-02 00:27:50 --> UTF-8 Support Enabled
DEBUG - 2019-12-02 00:27:50 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2019-12-02 00:27:50 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2019-12-02 00:27:50 --> Google Maps Class Initialized
ERROR - 2019-12-02 00:27:50 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\myci\application\vendor/autoload.php was not found.
DEBUG - 2019-12-02 00:27:50 --> UTF-8 Support Enabled
DEBUG - 2019-12-02 00:27:50 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2019-12-02 00:27:50 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2019-12-02 00:27:50 --> Google Maps Class Initialized
DEBUG - 2019-12-02 00:27:50 --> Total execution time: 0.1529
ERROR - 2019-12-02 00:30:39 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\myci\application\vendor/autoload.php was not found.
DEBUG - 2019-12-02 00:30:39 --> UTF-8 Support Enabled
DEBUG - 2019-12-02 00:30:39 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2019-12-02 00:30:39 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2019-12-02 00:30:39 --> Google Maps Class Initialized
DEBUG - 2019-12-02 00:30:40 --> Total execution time: 0.2643
ERROR - 2019-12-02 00:48:42 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\myci\application\vendor/autoload.php was not found.
DEBUG - 2019-12-02 00:48:42 --> UTF-8 Support Enabled
DEBUG - 2019-12-02 00:48:42 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2019-12-02 00:48:42 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2019-12-02 00:48:42 --> Google Maps Class Initialized
DEBUG - 2019-12-02 00:48:42 --> Total execution time: 0.1410
ERROR - 2019-12-02 00:48:42 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\myci\application\vendor/autoload.php was not found.
DEBUG - 2019-12-02 00:48:42 --> UTF-8 Support Enabled
DEBUG - 2019-12-02 00:48:42 --> Global POST, GET and COOKIE data sanitized
ERROR - 2019-12-02 00:48:42 --> 404 Page Not Found: Assets/dashboard2.js
ERROR - 2019-12-02 00:48:49 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\myci\application\vendor/autoload.php was not found.
DEBUG - 2019-12-02 00:48:49 --> UTF-8 Support Enabled
DEBUG - 2019-12-02 00:48:49 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2019-12-02 00:48:49 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2019-12-02 00:48:49 --> Google Maps Class Initialized
DEBUG - 2019-12-02 00:48:49 --> Total execution time: 0.1300
ERROR - 2019-12-02 00:48:49 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\myci\application\vendor/autoload.php was not found.
DEBUG - 2019-12-02 00:48:49 --> UTF-8 Support Enabled
DEBUG - 2019-12-02 00:48:49 --> Global POST, GET and COOKIE data sanitized
ERROR - 2019-12-02 00:48:49 --> 404 Page Not Found: Assets/dashboard2.js
ERROR - 2019-12-02 00:48:52 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\myci\application\vendor/autoload.php was not found.
DEBUG - 2019-12-02 00:48:52 --> UTF-8 Support Enabled
DEBUG - 2019-12-02 00:48:52 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2019-12-02 00:48:52 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2019-12-02 00:48:52 --> Google Maps Class Initialized
ERROR - 2019-12-02 00:48:53 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\myci\application\vendor/autoload.php was not found.
DEBUG - 2019-12-02 00:48:53 --> UTF-8 Support Enabled
DEBUG - 2019-12-02 00:48:53 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2019-12-02 00:48:53 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2019-12-02 00:48:53 --> Google Maps Class Initialized
DEBUG - 2019-12-02 00:48:53 --> Total execution time: 0.1051
ERROR - 2019-12-02 00:48:53 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\myci\application\vendor/autoload.php was not found.
DEBUG - 2019-12-02 00:48:53 --> UTF-8 Support Enabled
DEBUG - 2019-12-02 00:48:53 --> Global POST, GET and COOKIE data sanitized
ERROR - 2019-12-02 00:48:53 --> 404 Page Not Found: Demo_files/images
ERROR - 2019-12-02 00:49:13 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\myci\application\vendor/autoload.php was not found.
DEBUG - 2019-12-02 00:49:13 --> UTF-8 Support Enabled
DEBUG - 2019-12-02 00:49:13 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2019-12-02 00:49:13 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2019-12-02 00:49:13 --> Google Maps Class Initialized
DEBUG - 2019-12-02 00:49:13 --> Total execution time: 0.1295
ERROR - 2019-12-02 00:49:14 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\myci\application\vendor/autoload.php was not found.
DEBUG - 2019-12-02 00:49:14 --> UTF-8 Support Enabled
DEBUG - 2019-12-02 00:49:14 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2019-12-02 00:49:14 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2019-12-02 00:49:14 --> Google Maps Class Initialized
ERROR - 2019-12-02 00:49:14 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\myci\application\vendor/autoload.php was not found.
DEBUG - 2019-12-02 00:49:14 --> UTF-8 Support Enabled
DEBUG - 2019-12-02 00:49:14 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2019-12-02 00:49:14 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2019-12-02 00:49:14 --> Google Maps Class Initialized
DEBUG - 2019-12-02 00:49:14 --> Total execution time: 0.1258
ERROR - 2019-12-02 00:51:59 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\myci\application\vendor/autoload.php was not found.
DEBUG - 2019-12-02 00:51:59 --> UTF-8 Support Enabled
DEBUG - 2019-12-02 00:51:59 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2019-12-02 00:52:00 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2019-12-02 00:52:00 --> Google Maps Class Initialized
DEBUG - 2019-12-02 00:52:00 --> Total execution time: 0.1483
ERROR - 2019-12-02 00:53:20 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\myci\application\vendor/autoload.php was not found.
DEBUG - 2019-12-02 00:53:20 --> UTF-8 Support Enabled
DEBUG - 2019-12-02 00:53:20 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2019-12-02 00:53:20 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2019-12-02 00:53:20 --> Google Maps Class Initialized
DEBUG - 2019-12-02 00:53:20 --> Total execution time: 0.1426
ERROR - 2019-12-02 08:58:38 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\myci\application\vendor/autoload.php was not found.
DEBUG - 2019-12-02 08:58:38 --> UTF-8 Support Enabled
DEBUG - 2019-12-02 08:58:38 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2019-12-02 08:58:38 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2019-12-02 08:58:38 --> Google Maps Class Initialized
ERROR - 2019-12-02 08:58:39 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\myci\application\vendor/autoload.php was not found.
DEBUG - 2019-12-02 08:58:39 --> UTF-8 Support Enabled
DEBUG - 2019-12-02 08:58:39 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2019-12-02 08:58:39 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2019-12-02 08:58:39 --> Google Maps Class Initialized
DEBUG - 2019-12-02 08:58:39 --> Total execution time: 0.3255
ERROR - 2019-12-02 08:58:41 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\myci\application\vendor/autoload.php was not found.
DEBUG - 2019-12-02 08:58:41 --> UTF-8 Support Enabled
DEBUG - 2019-12-02 08:58:41 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2019-12-02 08:58:41 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2019-12-02 08:58:41 --> Google Maps Class Initialized
ERROR - 2019-12-02 08:58:41 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\myci\application\vendor/autoload.php was not found.
DEBUG - 2019-12-02 08:58:41 --> UTF-8 Support Enabled
DEBUG - 2019-12-02 08:58:41 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2019-12-02 08:58:41 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2019-12-02 08:58:41 --> Google Maps Class Initialized
DEBUG - 2019-12-02 08:58:42 --> Total execution time: 0.3299
ERROR - 2019-12-02 09:01:42 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\myci\application\vendor/autoload.php was not found.
DEBUG - 2019-12-02 09:01:42 --> UTF-8 Support Enabled
DEBUG - 2019-12-02 09:01:42 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2019-12-02 09:01:42 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2019-12-02 09:01:42 --> Google Maps Class Initialized
DEBUG - 2019-12-02 09:01:42 --> Total execution time: 0.1599
ERROR - 2019-12-02 09:02:03 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\myci\application\vendor/autoload.php was not found.
DEBUG - 2019-12-02 09:02:03 --> UTF-8 Support Enabled
DEBUG - 2019-12-02 09:02:04 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2019-12-02 09:02:04 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2019-12-02 09:02:04 --> Google Maps Class Initialized
DEBUG - 2019-12-02 09:02:04 --> Total execution time: 0.1328
ERROR - 2019-12-02 09:04:07 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\myci\application\vendor/autoload.php was not found.
DEBUG - 2019-12-02 09:04:07 --> UTF-8 Support Enabled
DEBUG - 2019-12-02 09:04:07 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2019-12-02 09:04:07 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2019-12-02 09:04:07 --> Google Maps Class Initialized
DEBUG - 2019-12-02 09:04:07 --> Total execution time: 0.1480
ERROR - 2019-12-02 09:07:57 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\myci\application\vendor/autoload.php was not found.
DEBUG - 2019-12-02 09:07:57 --> UTF-8 Support Enabled
DEBUG - 2019-12-02 09:07:57 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2019-12-02 09:07:57 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2019-12-02 09:07:57 --> Google Maps Class Initialized
DEBUG - 2019-12-02 09:07:57 --> Total execution time: 0.1358
ERROR - 2019-12-02 09:10:43 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\myci\application\vendor/autoload.php was not found.
DEBUG - 2019-12-02 09:10:43 --> UTF-8 Support Enabled
DEBUG - 2019-12-02 09:10:44 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2019-12-02 09:10:44 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2019-12-02 09:10:44 --> Google Maps Class Initialized
DEBUG - 2019-12-02 09:10:44 --> Total execution time: 0.1509
ERROR - 2019-12-02 09:11:29 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\myci\application\vendor/autoload.php was not found.
DEBUG - 2019-12-02 09:11:29 --> UTF-8 Support Enabled
DEBUG - 2019-12-02 09:11:29 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2019-12-02 09:11:29 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2019-12-02 09:11:29 --> Google Maps Class Initialized
DEBUG - 2019-12-02 09:11:29 --> Total execution time: 0.1593
ERROR - 2019-12-02 09:33:29 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\myci\application\vendor/autoload.php was not found.
DEBUG - 2019-12-02 09:33:29 --> UTF-8 Support Enabled
DEBUG - 2019-12-02 09:33:29 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2019-12-02 09:33:29 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2019-12-02 09:33:29 --> Google Maps Class Initialized
DEBUG - 2019-12-02 09:33:29 --> Total execution time: 0.1788
ERROR - 2019-12-02 09:33:32 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\myci\application\vendor/autoload.php was not found.
DEBUG - 2019-12-02 09:33:32 --> UTF-8 Support Enabled
DEBUG - 2019-12-02 09:33:32 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2019-12-02 09:33:32 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2019-12-02 09:33:32 --> Google Maps Class Initialized
DEBUG - 2019-12-02 09:33:32 --> Total execution time: 0.1409
ERROR - 2019-12-02 09:35:22 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\myci\application\vendor/autoload.php was not found.
DEBUG - 2019-12-02 09:35:22 --> UTF-8 Support Enabled
DEBUG - 2019-12-02 09:35:22 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2019-12-02 09:35:22 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2019-12-02 09:35:22 --> Google Maps Class Initialized
DEBUG - 2019-12-02 09:35:22 --> Total execution time: 0.1395
ERROR - 2019-12-02 09:36:11 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\myci\application\vendor/autoload.php was not found.
DEBUG - 2019-12-02 09:36:11 --> UTF-8 Support Enabled
DEBUG - 2019-12-02 09:36:11 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2019-12-02 09:36:11 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2019-12-02 09:36:11 --> Google Maps Class Initialized
DEBUG - 2019-12-02 09:36:11 --> Total execution time: 0.1572
ERROR - 2019-12-02 09:37:44 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\myci\application\vendor/autoload.php was not found.
DEBUG - 2019-12-02 09:37:44 --> UTF-8 Support Enabled
DEBUG - 2019-12-02 09:37:44 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2019-12-02 09:37:44 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2019-12-02 09:37:44 --> Google Maps Class Initialized
DEBUG - 2019-12-02 09:37:44 --> Total execution time: 0.1482
ERROR - 2019-12-02 09:43:36 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\myci\application\vendor/autoload.php was not found.
DEBUG - 2019-12-02 09:43:36 --> UTF-8 Support Enabled
DEBUG - 2019-12-02 09:43:36 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2019-12-02 09:43:36 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2019-12-02 09:43:36 --> Google Maps Class Initialized
DEBUG - 2019-12-02 09:43:36 --> Total execution time: 0.1673
ERROR - 2019-12-02 10:19:00 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\myci\application\vendor/autoload.php was not found.
DEBUG - 2019-12-02 10:19:00 --> UTF-8 Support Enabled
DEBUG - 2019-12-02 10:19:00 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2019-12-02 10:19:00 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2019-12-02 10:19:00 --> Google Maps Class Initialized
DEBUG - 2019-12-02 10:19:00 --> Total execution time: 0.1412
ERROR - 2019-12-02 10:19:12 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\myci\application\vendor/autoload.php was not found.
DEBUG - 2019-12-02 10:19:12 --> UTF-8 Support Enabled
DEBUG - 2019-12-02 10:19:12 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2019-12-02 10:19:12 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2019-12-02 10:19:12 --> Google Maps Class Initialized
DEBUG - 2019-12-02 10:19:12 --> Total execution time: 0.2025
ERROR - 2019-12-02 10:19:51 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\myci\application\vendor/autoload.php was not found.
DEBUG - 2019-12-02 10:19:51 --> UTF-8 Support Enabled
DEBUG - 2019-12-02 10:19:51 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2019-12-02 10:19:51 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2019-12-02 10:19:51 --> Google Maps Class Initialized
DEBUG - 2019-12-02 10:19:51 --> Total execution time: 0.1438
ERROR - 2019-12-02 10:20:13 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\myci\application\vendor/autoload.php was not found.
DEBUG - 2019-12-02 10:20:13 --> UTF-8 Support Enabled
DEBUG - 2019-12-02 10:20:13 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2019-12-02 10:20:13 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2019-12-02 10:20:13 --> Google Maps Class Initialized
ERROR - 2019-12-02 10:20:13 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\myci\application\vendor/autoload.php was not found.
DEBUG - 2019-12-02 10:20:13 --> UTF-8 Support Enabled
DEBUG - 2019-12-02 10:20:14 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2019-12-02 10:20:14 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2019-12-02 10:20:14 --> Google Maps Class Initialized
DEBUG - 2019-12-02 10:20:14 --> Total execution time: 0.1188
ERROR - 2019-12-02 10:20:14 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\myci\application\vendor/autoload.php was not found.
DEBUG - 2019-12-02 10:20:14 --> UTF-8 Support Enabled
DEBUG - 2019-12-02 10:20:14 --> Global POST, GET and COOKIE data sanitized
ERROR - 2019-12-02 10:20:14 --> 404 Page Not Found: Demo_files/images
ERROR - 2019-12-02 10:20:18 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\myci\application\vendor/autoload.php was not found.
DEBUG - 2019-12-02 10:20:18 --> UTF-8 Support Enabled
DEBUG - 2019-12-02 10:20:18 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2019-12-02 10:20:18 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2019-12-02 10:20:18 --> Google Maps Class Initialized
DEBUG - 2019-12-02 10:20:18 --> Total execution time: 0.1272
ERROR - 2019-12-02 10:20:19 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\myci\application\vendor/autoload.php was not found.
DEBUG - 2019-12-02 10:20:19 --> UTF-8 Support Enabled
DEBUG - 2019-12-02 10:20:19 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2019-12-02 10:20:19 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2019-12-02 10:20:20 --> Google Maps Class Initialized
ERROR - 2019-12-02 10:20:20 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\myci\application\vendor/autoload.php was not found.
DEBUG - 2019-12-02 10:20:20 --> UTF-8 Support Enabled
DEBUG - 2019-12-02 10:20:20 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2019-12-02 10:20:20 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2019-12-02 10:20:20 --> Google Maps Class Initialized
DEBUG - 2019-12-02 10:20:20 --> Total execution time: 0.1286
ERROR - 2019-12-02 10:24:13 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\myci\application\vendor/autoload.php was not found.
DEBUG - 2019-12-02 10:24:14 --> UTF-8 Support Enabled
DEBUG - 2019-12-02 10:24:14 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2019-12-02 10:24:14 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2019-12-02 10:24:14 --> Google Maps Class Initialized
DEBUG - 2019-12-02 10:24:15 --> Total execution time: 1.3475
ERROR - 2019-12-02 10:25:47 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\myci\application\vendor/autoload.php was not found.
DEBUG - 2019-12-02 10:25:47 --> UTF-8 Support Enabled
DEBUG - 2019-12-02 10:25:47 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2019-12-02 10:25:47 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2019-12-02 10:25:47 --> Google Maps Class Initialized
DEBUG - 2019-12-02 10:25:47 --> Total execution time: 0.1376
ERROR - 2019-12-02 10:25:52 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\myci\application\vendor/autoload.php was not found.
DEBUG - 2019-12-02 10:25:52 --> UTF-8 Support Enabled
DEBUG - 2019-12-02 10:25:52 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2019-12-02 10:25:52 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2019-12-02 10:25:52 --> Google Maps Class Initialized
DEBUG - 2019-12-02 10:25:52 --> Total execution time: 0.1833
ERROR - 2019-12-02 10:27:11 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\myci\application\vendor/autoload.php was not found.
DEBUG - 2019-12-02 10:27:11 --> UTF-8 Support Enabled
DEBUG - 2019-12-02 10:27:11 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2019-12-02 10:27:12 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2019-12-02 10:27:12 --> Google Maps Class Initialized
DEBUG - 2019-12-02 10:27:12 --> Total execution time: 0.1267
ERROR - 2019-12-02 10:27:15 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\myci\application\vendor/autoload.php was not found.
DEBUG - 2019-12-02 10:27:15 --> UTF-8 Support Enabled
DEBUG - 2019-12-02 10:27:15 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2019-12-02 10:27:15 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2019-12-02 10:27:15 --> Google Maps Class Initialized
DEBUG - 2019-12-02 10:27:15 --> Total execution time: 0.1935
ERROR - 2019-12-02 10:29:24 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\myci\application\vendor/autoload.php was not found.
DEBUG - 2019-12-02 10:29:24 --> UTF-8 Support Enabled
DEBUG - 2019-12-02 10:29:24 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2019-12-02 10:29:24 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2019-12-02 10:29:24 --> Google Maps Class Initialized
DEBUG - 2019-12-02 10:29:25 --> Total execution time: 0.1441
ERROR - 2019-12-02 10:29:27 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\myci\application\vendor/autoload.php was not found.
DEBUG - 2019-12-02 10:29:27 --> UTF-8 Support Enabled
DEBUG - 2019-12-02 10:29:27 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2019-12-02 10:29:27 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2019-12-02 10:29:27 --> Google Maps Class Initialized
DEBUG - 2019-12-02 10:29:27 --> Total execution time: 0.2082
ERROR - 2019-12-02 10:32:24 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\myci\application\vendor/autoload.php was not found.
DEBUG - 2019-12-02 10:32:24 --> UTF-8 Support Enabled
DEBUG - 2019-12-02 10:32:24 --> No URI present. Default controller set.
DEBUG - 2019-12-02 10:32:24 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2019-12-02 10:32:24 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2019-12-02 10:32:24 --> Google Maps Class Initialized
DEBUG - 2019-12-02 10:32:24 --> Total execution time: 0.2064
ERROR - 2019-12-02 10:32:25 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\myci\application\vendor/autoload.php was not found.
DEBUG - 2019-12-02 10:32:25 --> UTF-8 Support Enabled
DEBUG - 2019-12-02 10:32:25 --> Global POST, GET and COOKIE data sanitized
ERROR - 2019-12-02 10:32:25 --> 404 Page Not Found: Demo_files/images
ERROR - 2019-12-02 10:32:28 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\myci\application\vendor/autoload.php was not found.
DEBUG - 2019-12-02 10:32:28 --> UTF-8 Support Enabled
DEBUG - 2019-12-02 10:32:28 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2019-12-02 10:32:28 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2019-12-02 10:32:29 --> Google Maps Class Initialized
DEBUG - 2019-12-02 10:32:29 --> Total execution time: 0.8329
ERROR - 2019-12-02 10:32:30 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\myci\application\vendor/autoload.php was not found.
DEBUG - 2019-12-02 10:32:30 --> UTF-8 Support Enabled
DEBUG - 2019-12-02 10:32:30 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2019-12-02 10:32:30 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2019-12-02 10:32:30 --> Google Maps Class Initialized
ERROR - 2019-12-02 10:32:31 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\myci\application\vendor/autoload.php was not found.
DEBUG - 2019-12-02 10:32:31 --> UTF-8 Support Enabled
DEBUG - 2019-12-02 10:32:31 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2019-12-02 10:32:31 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2019-12-02 10:32:31 --> Google Maps Class Initialized
DEBUG - 2019-12-02 10:32:31 --> Total execution time: 0.4032
ERROR - 2019-12-02 10:55:22 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\myci\application\vendor/autoload.php was not found.
DEBUG - 2019-12-02 10:55:23 --> UTF-8 Support Enabled
DEBUG - 2019-12-02 10:55:23 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2019-12-02 10:55:23 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2019-12-02 10:55:23 --> Google Maps Class Initialized
ERROR - 2019-12-02 10:55:23 --> Severity: Notice --> Undefined variable: map C:\xampp\htdocs\myci\application\views\back\maps\all_map.php 6
ERROR - 2019-12-02 10:55:23 --> Severity: Notice --> Undefined variable: map C:\xampp\htdocs\myci\application\views\back\maps\all_map.php 9
DEBUG - 2019-12-02 10:55:23 --> Total execution time: 0.2988
ERROR - 2019-12-02 10:58:12 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\myci\application\vendor/autoload.php was not found.
DEBUG - 2019-12-02 10:58:12 --> UTF-8 Support Enabled
DEBUG - 2019-12-02 10:58:12 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2019-12-02 10:58:12 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2019-12-02 10:58:12 --> Google Maps Class Initialized
ERROR - 2019-12-02 10:58:12 --> Severity: Notice --> Undefined variable: map C:\xampp\htdocs\myci\application\views\back\maps\all_map.php 6
ERROR - 2019-12-02 10:58:12 --> Severity: Notice --> Undefined variable: map C:\xampp\htdocs\myci\application\views\back\maps\all_map.php 9
DEBUG - 2019-12-02 10:58:12 --> Total execution time: 0.1684
ERROR - 2019-12-02 11:03:14 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\myci\application\vendor/autoload.php was not found.
DEBUG - 2019-12-02 11:03:14 --> UTF-8 Support Enabled
DEBUG - 2019-12-02 11:03:14 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2019-12-02 11:03:14 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2019-12-02 11:03:14 --> Google Maps Class Initialized
ERROR - 2019-12-02 11:03:15 --> Severity: Notice --> Undefined property: Dashboard::$Map_all C:\xampp\htdocs\myci\application\views\back\dashboard\record.php 201
ERROR - 2019-12-02 11:03:15 --> Severity: Notice --> Undefined variable: map C:\xampp\htdocs\myci\application\views\back\maps\all_map.php 6
ERROR - 2019-12-02 11:03:15 --> Severity: Notice --> Undefined variable: map C:\xampp\htdocs\myci\application\views\back\maps\all_map.php 9
DEBUG - 2019-12-02 11:03:15 --> Total execution time: 0.1677
ERROR - 2019-12-02 11:16:34 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\myci\application\vendor/autoload.php was not found.
DEBUG - 2019-12-02 11:16:34 --> UTF-8 Support Enabled
DEBUG - 2019-12-02 11:16:35 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2019-12-02 11:16:35 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2019-12-02 11:16:35 --> Google Maps Class Initialized
ERROR - 2019-12-02 11:16:56 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\myci\application\vendor/autoload.php was not found.
DEBUG - 2019-12-02 11:16:56 --> UTF-8 Support Enabled
DEBUG - 2019-12-02 11:16:56 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2019-12-02 11:16:56 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2019-12-02 11:16:56 --> Google Maps Class Initialized
ERROR - 2019-12-02 11:18:20 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\myci\application\vendor/autoload.php was not found.
DEBUG - 2019-12-02 11:18:20 --> UTF-8 Support Enabled
DEBUG - 2019-12-02 11:18:20 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2019-12-02 11:18:20 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2019-12-02 11:18:20 --> Google Maps Class Initialized
ERROR - 2019-12-02 11:18:20 --> Severity: Notice --> Undefined variable: map C:\xampp\htdocs\myci\application\views\back\maps\all_map.php 6
ERROR - 2019-12-02 11:18:20 --> Severity: Notice --> Undefined variable: map C:\xampp\htdocs\myci\application\views\back\maps\all_map.php 9
ERROR - 2019-12-02 11:18:20 --> Severity: Notice --> Undefined variable: map C:\xampp\htdocs\myci\application\views\back\maps\all_map.php 6
ERROR - 2019-12-02 11:18:20 --> Severity: Notice --> Undefined variable: map C:\xampp\htdocs\myci\application\views\back\maps\all_map.php 9
DEBUG - 2019-12-02 11:18:20 --> Total execution time: 0.1828
ERROR - 2019-12-02 11:20:26 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\myci\application\vendor/autoload.php was not found.
DEBUG - 2019-12-02 11:20:26 --> UTF-8 Support Enabled
DEBUG - 2019-12-02 11:20:26 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2019-12-02 11:20:26 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2019-12-02 11:20:26 --> Google Maps Class Initialized
ERROR - 2019-12-02 11:20:26 --> Severity: error --> Exception: Call to undefined method CI_Loader::map_all() C:\xampp\htdocs\myci\application\views\back\dashboard\record.php 200
ERROR - 2019-12-02 11:20:35 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\myci\application\vendor/autoload.php was not found.
DEBUG - 2019-12-02 11:20:35 --> UTF-8 Support Enabled
DEBUG - 2019-12-02 11:20:35 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2019-12-02 11:20:35 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2019-12-02 11:20:35 --> Google Maps Class Initialized
ERROR - 2019-12-02 11:20:35 --> Severity: error --> Exception: Call to undefined method CI_Loader::map_all() C:\xampp\htdocs\myci\application\views\back\dashboard\record.php 200
ERROR - 2019-12-02 11:24:56 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\myci\application\vendor/autoload.php was not found.
DEBUG - 2019-12-02 11:24:56 --> UTF-8 Support Enabled
DEBUG - 2019-12-02 11:24:56 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2019-12-02 11:24:56 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2019-12-02 11:24:56 --> Google Maps Class Initialized
ERROR - 2019-12-02 11:24:56 --> Severity: Notice --> Undefined variable: data C:\xampp\htdocs\myci\application\views\back\dashboard\record.php 200
ERROR - 2019-12-02 11:24:56 --> Severity: Notice --> Undefined variable: map C:\xampp\htdocs\myci\application\views\back\maps\all_map.php 6
ERROR - 2019-12-02 11:24:56 --> Severity: Notice --> Undefined variable: map C:\xampp\htdocs\myci\application\views\back\maps\all_map.php 9
ERROR - 2019-12-02 11:24:56 --> Severity: Notice --> Undefined variable: map C:\xampp\htdocs\myci\application\views\back\maps\all_map.php 6
ERROR - 2019-12-02 11:24:56 --> Severity: Notice --> Undefined variable: map C:\xampp\htdocs\myci\application\views\back\maps\all_map.php 9
DEBUG - 2019-12-02 11:24:56 --> Total execution time: 0.2206
ERROR - 2019-12-02 11:25:32 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\myci\application\vendor/autoload.php was not found.
DEBUG - 2019-12-02 11:25:32 --> UTF-8 Support Enabled
DEBUG - 2019-12-02 11:25:32 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2019-12-02 11:25:32 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2019-12-02 11:25:32 --> Google Maps Class Initialized
ERROR - 2019-12-02 11:25:32 --> Severity: Notice --> Undefined variable: map C:\xampp\htdocs\myci\application\views\back\maps\all_map.php 6
ERROR - 2019-12-02 11:25:32 --> Severity: Notice --> Undefined variable: map C:\xampp\htdocs\myci\application\views\back\maps\all_map.php 9
DEBUG - 2019-12-02 11:25:32 --> Total execution time: 0.1554
ERROR - 2019-12-02 11:26:38 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\myci\application\vendor/autoload.php was not found.
DEBUG - 2019-12-02 11:26:38 --> UTF-8 Support Enabled
DEBUG - 2019-12-02 11:26:38 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2019-12-02 11:26:38 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2019-12-02 11:26:38 --> Google Maps Class Initialized
ERROR - 2019-12-02 11:26:39 --> Severity: Notice --> Undefined variable: data C:\xampp\htdocs\myci\application\views\back\dashboard\record.php 199
ERROR - 2019-12-02 11:26:39 --> Severity: Notice --> Undefined variable: map C:\xampp\htdocs\myci\application\views\back\maps\all_map.php 6
ERROR - 2019-12-02 11:26:39 --> Severity: Notice --> Undefined variable: map C:\xampp\htdocs\myci\application\views\back\maps\all_map.php 9
DEBUG - 2019-12-02 11:26:39 --> Total execution time: 0.1605
ERROR - 2019-12-02 11:28:26 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\myci\application\vendor/autoload.php was not found.
DEBUG - 2019-12-02 11:28:26 --> UTF-8 Support Enabled
DEBUG - 2019-12-02 11:28:26 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2019-12-02 11:28:26 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2019-12-02 11:28:26 --> Google Maps Class Initialized
DEBUG - 2019-12-02 11:28:26 --> Googlemaps class already loaded. Second attempt ignored.
ERROR - 2019-12-02 11:28:26 --> Severity: Notice --> Undefined variable: data C:\xampp\htdocs\myci\application\views\back\dashboard\record.php 199
DEBUG - 2019-12-02 11:28:26 --> Total execution time: 0.1544
ERROR - 2019-12-02 11:29:34 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\myci\application\vendor/autoload.php was not found.
DEBUG - 2019-12-02 11:29:34 --> UTF-8 Support Enabled
DEBUG - 2019-12-02 11:29:34 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2019-12-02 11:29:34 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2019-12-02 11:29:34 --> Google Maps Class Initialized
DEBUG - 2019-12-02 11:29:34 --> Googlemaps class already loaded. Second attempt ignored.
DEBUG - 2019-12-02 11:29:34 --> Total execution time: 0.1391
ERROR - 2019-12-02 11:30:33 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\myci\application\vendor/autoload.php was not found.
DEBUG - 2019-12-02 11:30:33 --> UTF-8 Support Enabled
DEBUG - 2019-12-02 11:30:33 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2019-12-02 11:30:33 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2019-12-02 11:30:33 --> Google Maps Class Initialized
DEBUG - 2019-12-02 11:30:33 --> Googlemaps class already loaded. Second attempt ignored.
DEBUG - 2019-12-02 11:30:33 --> Total execution time: 0.1433
ERROR - 2019-12-02 11:31:31 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\myci\application\vendor/autoload.php was not found.
DEBUG - 2019-12-02 11:31:31 --> UTF-8 Support Enabled
DEBUG - 2019-12-02 11:31:31 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2019-12-02 11:31:31 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2019-12-02 11:31:31 --> Google Maps Class Initialized
DEBUG - 2019-12-02 11:31:31 --> Googlemaps class already loaded. Second attempt ignored.
DEBUG - 2019-12-02 11:31:31 --> Total execution time: 0.1503
ERROR - 2019-12-02 11:33:45 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\myci\application\vendor/autoload.php was not found.
DEBUG - 2019-12-02 11:33:45 --> UTF-8 Support Enabled
DEBUG - 2019-12-02 11:33:45 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2019-12-02 11:33:45 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2019-12-02 11:33:45 --> Google Maps Class Initialized
DEBUG - 2019-12-02 11:33:45 --> Googlemaps class already loaded. Second attempt ignored.
DEBUG - 2019-12-02 11:33:45 --> Total execution time: 0.1559
ERROR - 2019-12-02 11:37:31 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\myci\application\vendor/autoload.php was not found.
DEBUG - 2019-12-02 11:37:32 --> UTF-8 Support Enabled
DEBUG - 2019-12-02 11:37:32 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2019-12-02 11:37:32 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2019-12-02 11:37:32 --> Google Maps Class Initialized
DEBUG - 2019-12-02 11:37:32 --> Googlemaps class already loaded. Second attempt ignored.
DEBUG - 2019-12-02 11:37:32 --> Total execution time: 0.2426
ERROR - 2019-12-02 11:39:54 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\myci\application\vendor/autoload.php was not found.
DEBUG - 2019-12-02 11:39:54 --> UTF-8 Support Enabled
DEBUG - 2019-12-02 11:39:54 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2019-12-02 11:39:54 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2019-12-02 11:39:55 --> Google Maps Class Initialized
DEBUG - 2019-12-02 11:39:55 --> Googlemaps class already loaded. Second attempt ignored.
DEBUG - 2019-12-02 11:39:55 --> Total execution time: 0.1978
ERROR - 2019-12-02 11:40:39 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\myci\application\vendor/autoload.php was not found.
DEBUG - 2019-12-02 11:40:39 --> UTF-8 Support Enabled
DEBUG - 2019-12-02 11:40:39 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2019-12-02 11:40:39 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2019-12-02 11:40:39 --> Google Maps Class Initialized
DEBUG - 2019-12-02 11:40:39 --> Googlemaps class already loaded. Second attempt ignored.
DEBUG - 2019-12-02 11:40:39 --> Total execution time: 0.2051
ERROR - 2019-12-02 11:41:00 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\myci\application\vendor/autoload.php was not found.
DEBUG - 2019-12-02 11:41:00 --> UTF-8 Support Enabled
DEBUG - 2019-12-02 11:41:00 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2019-12-02 11:41:00 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2019-12-02 11:41:00 --> Google Maps Class Initialized
DEBUG - 2019-12-02 11:41:00 --> Googlemaps class already loaded. Second attempt ignored.
DEBUG - 2019-12-02 11:41:00 --> Total execution time: 0.1958
ERROR - 2019-12-02 11:41:19 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\myci\application\vendor/autoload.php was not found.
DEBUG - 2019-12-02 11:41:19 --> UTF-8 Support Enabled
DEBUG - 2019-12-02 11:41:19 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2019-12-02 11:41:19 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2019-12-02 11:41:19 --> Google Maps Class Initialized
DEBUG - 2019-12-02 11:41:19 --> Googlemaps class already loaded. Second attempt ignored.
DEBUG - 2019-12-02 11:41:19 --> Total execution time: 0.2368
ERROR - 2019-12-02 11:41:51 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\myci\application\vendor/autoload.php was not found.
DEBUG - 2019-12-02 11:41:51 --> UTF-8 Support Enabled
DEBUG - 2019-12-02 11:41:51 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2019-12-02 11:41:51 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2019-12-02 11:41:51 --> Google Maps Class Initialized
DEBUG - 2019-12-02 11:41:51 --> Googlemaps class already loaded. Second attempt ignored.
DEBUG - 2019-12-02 11:41:51 --> Total execution time: 0.2072
ERROR - 2019-12-02 11:42:09 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\myci\application\vendor/autoload.php was not found.
DEBUG - 2019-12-02 11:42:09 --> UTF-8 Support Enabled
DEBUG - 2019-12-02 11:42:09 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2019-12-02 11:42:09 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2019-12-02 11:42:09 --> Google Maps Class Initialized
DEBUG - 2019-12-02 11:42:09 --> Googlemaps class already loaded. Second attempt ignored.
DEBUG - 2019-12-02 11:42:09 --> Total execution time: 0.2110
ERROR - 2019-12-02 12:12:36 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\myci\application\vendor/autoload.php was not found.
DEBUG - 2019-12-02 12:12:36 --> UTF-8 Support Enabled
DEBUG - 2019-12-02 12:12:36 --> Global POST, GET and COOKIE data sanitized
ERROR - 2019-12-02 12:12:36 --> Severity: error --> Exception: syntax error, unexpected '' (T_ENCAPSED_AND_WHITESPACE), expecting '-' or identifier (T_STRING) or variable (T_VARIABLE) or number (T_NUM_STRING) C:\xampp\htdocs\myci\application\controllers\Dashboard.php 37
ERROR - 2019-12-02 12:15:17 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\myci\application\vendor/autoload.php was not found.
DEBUG - 2019-12-02 12:15:17 --> UTF-8 Support Enabled
DEBUG - 2019-12-02 12:15:17 --> Global POST, GET and COOKIE data sanitized
ERROR - 2019-12-02 12:15:17 --> Severity: error --> Exception: syntax error, unexpected '.' C:\xampp\htdocs\myci\application\controllers\Dashboard.php 37
ERROR - 2019-12-02 12:15:44 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\myci\application\vendor/autoload.php was not found.
DEBUG - 2019-12-02 12:15:44 --> UTF-8 Support Enabled
DEBUG - 2019-12-02 12:15:44 --> Global POST, GET and COOKIE data sanitized
ERROR - 2019-12-02 12:15:44 --> Severity: error --> Exception: syntax error, unexpected '' (T_ENCAPSED_AND_WHITESPACE), expecting '-' or identifier (T_STRING) or variable (T_VARIABLE) or number (T_NUM_STRING) C:\xampp\htdocs\myci\application\controllers\Dashboard.php 37
ERROR - 2019-12-02 12:16:21 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\myci\application\vendor/autoload.php was not found.
DEBUG - 2019-12-02 12:16:21 --> UTF-8 Support Enabled
DEBUG - 2019-12-02 12:16:21 --> Global POST, GET and COOKIE data sanitized
ERROR - 2019-12-02 12:16:21 --> Severity: error --> Exception: syntax error, unexpected 'atitude' (T_STRING) C:\xampp\htdocs\myci\application\controllers\Dashboard.php 37
ERROR - 2019-12-02 12:16:51 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\myci\application\vendor/autoload.php was not found.
DEBUG - 2019-12-02 12:16:52 --> UTF-8 Support Enabled
DEBUG - 2019-12-02 12:16:52 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2019-12-02 12:16:52 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2019-12-02 12:16:52 --> Google Maps Class Initialized
DEBUG - 2019-12-02 12:16:52 --> Googlemaps class already loaded. Second attempt ignored.
ERROR - 2019-12-02 12:16:52 --> Severity: Notice --> Undefined property: Dashboard::$table C:\xampp\htdocs\myci\system\core\Model.php 73
ERROR - 2019-12-02 12:16:52 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'JOIN `wilayah_provinsi` ON `realisasi`.`provinsi` = `wilayah_provinsi`.`id`
JOIN' at line 2 - Invalid query: SELECT `realisasi`.*, if(realisasi.type_pelaksana=2, "Swakelola", "Kemitraan") as namapengelola, `wilayah_provinsi`.`nama` as `nama_prov`, `wilayah_kabupaten`.`nama` as `nama_kab`, `wilayah_kecamatan`.`nama` as `nama_kec`, `wilayah_desa`.`nama` as `nama_des`
JOIN `wilayah_provinsi` ON `realisasi`.`provinsi` = `wilayah_provinsi`.`id`
JOIN `wilayah_kabupaten` ON `realisasi`.`kabupaten` = `wilayah_kabupaten`.`id`
JOIN `wilayah_kecamatan` ON `realisasi`.`kecamatan` = `wilayah_kecamatan`.`id`
JOIN `wilayah_desa` ON `realisasi`.`desa` = `wilayah_desa`.`id`
WHERE `is_delete` = '0'
ORDER BY `nama_perusahaan` DESC
ERROR - 2019-12-02 12:18:16 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\myci\application\vendor/autoload.php was not found.
DEBUG - 2019-12-02 12:18:16 --> UTF-8 Support Enabled
DEBUG - 2019-12-02 12:18:16 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2019-12-02 12:18:16 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2019-12-02 12:18:16 --> Google Maps Class Initialized
DEBUG - 2019-12-02 12:18:17 --> Googlemaps class already loaded. Second attempt ignored.
ERROR - 2019-12-02 12:18:17 --> Query error: Unknown column 'nama_perusahaan' in 'order clause' - Invalid query: SELECT `realisasi`.*, if(realisasi.type_pelaksana=2, "Swakelola", "Kemitraan") as namapengelola, `wilayah_provinsi`.`nama` as `nama_prov`, `wilayah_kabupaten`.`nama` as `nama_kab`, `wilayah_kecamatan`.`nama` as `nama_kec`, `wilayah_desa`.`nama` as `nama_des`
FROM `realisasi`
JOIN `wilayah_provinsi` ON `realisasi`.`provinsi` = `wilayah_provinsi`.`id`
JOIN `wilayah_kabupaten` ON `realisasi`.`kabupaten` = `wilayah_kabupaten`.`id`
JOIN `wilayah_kecamatan` ON `realisasi`.`kecamatan` = `wilayah_kecamatan`.`id`
JOIN `wilayah_desa` ON `realisasi`.`desa` = `wilayah_desa`.`id`
WHERE `is_delete` = '0'
ORDER BY `nama_perusahaan` DESC
ERROR - 2019-12-02 12:18:46 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\myci\application\vendor/autoload.php was not found.
DEBUG - 2019-12-02 12:18:46 --> UTF-8 Support Enabled
DEBUG - 2019-12-02 12:18:46 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2019-12-02 12:18:46 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2019-12-02 12:18:46 --> Google Maps Class Initialized
DEBUG - 2019-12-02 12:18:46 --> Googlemaps class already loaded. Second attempt ignored.
ERROR - 2019-12-02 12:18:46 --> Query error: Unknown column 'realisasi.nama_perusahaan' in 'order clause' - Invalid query: SELECT `realisasi`.*, if(realisasi.type_pelaksana=2, "Swakelola", "Kemitraan") as namapengelola, `wilayah_provinsi`.`nama` as `nama_prov`, `wilayah_kabupaten`.`nama` as `nama_kab`, `wilayah_kecamatan`.`nama` as `nama_kec`, `wilayah_desa`.`nama` as `nama_des`
FROM `realisasi`
JOIN `wilayah_provinsi` ON `realisasi`.`provinsi` = `wilayah_provinsi`.`id`
JOIN `wilayah_kabupaten` ON `realisasi`.`kabupaten` = `wilayah_kabupaten`.`id`
JOIN `wilayah_kecamatan` ON `realisasi`.`kecamatan` = `wilayah_kecamatan`.`id`
JOIN `wilayah_desa` ON `realisasi`.`desa` = `wilayah_desa`.`id`
WHERE `is_delete` = '0'
ORDER BY `realisasi`.`nama_perusahaan` DESC
ERROR - 2019-12-02 12:19:23 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\myci\application\vendor/autoload.php was not found.
DEBUG - 2019-12-02 12:19:23 --> UTF-8 Support Enabled
DEBUG - 2019-12-02 12:19:23 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2019-12-02 12:19:23 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2019-12-02 12:19:23 --> Google Maps Class Initialized
DEBUG - 2019-12-02 12:19:23 --> Googlemaps class already loaded. Second attempt ignored.
DEBUG - 2019-12-02 12:19:23 --> Total execution time: 0.4713
ERROR - 2019-12-02 12:20:12 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\myci\application\vendor/autoload.php was not found.
DEBUG - 2019-12-02 12:20:12 --> UTF-8 Support Enabled
DEBUG - 2019-12-02 12:20:12 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2019-12-02 12:20:12 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2019-12-02 12:20:12 --> Google Maps Class Initialized
DEBUG - 2019-12-02 12:20:12 --> Googlemaps class already loaded. Second attempt ignored.
ERROR - 2019-12-02 12:20:12 --> Query error: Unknown column 'is_delet' in 'where clause' - Invalid query: SELECT `realisasi`.*, if(realisasi.type_pelaksana=2, "Swakelola", "Kemitraan") as namapengelola, `wilayah_provinsi`.`nama` as `nama_prov`, `wilayah_kabupaten`.`nama` as `nama_kab`, `wilayah_kecamatan`.`nama` as `nama_kec`, `wilayah_desa`.`nama` as `nama_des`
FROM `realisasi`
JOIN `wilayah_provinsi` ON `realisasi`.`provinsi` = `wilayah_provinsi`.`id`
JOIN `wilayah_kabupaten` ON `realisasi`.`kabupaten` = `wilayah_kabupaten`.`id`
JOIN `wilayah_kecamatan` ON `realisasi`.`kecamatan` = `wilayah_kecamatan`.`id`
JOIN `wilayah_desa` ON `realisasi`.`desa` = `wilayah_desa`.`id`
WHERE `is_delet` = '0'
ERROR - 2019-12-02 12:23:15 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\myci\application\vendor/autoload.php was not found.
DEBUG - 2019-12-02 12:23:15 --> UTF-8 Support Enabled
DEBUG - 2019-12-02 12:23:16 --> Global POST, GET and COOKIE data sanitized
ERROR - 2019-12-02 12:23:16 --> Severity: error --> Exception: syntax error, unexpected '"', expecting '-' or identifier (T_STRING) or variable (T_VARIABLE) or number (T_NUM_STRING) C:\xampp\htdocs\myci\application\controllers\Dashboard.php 37
ERROR - 2019-12-02 12:26:02 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\myci\application\vendor/autoload.php was not found.
DEBUG - 2019-12-02 12:26:02 --> UTF-8 Support Enabled
DEBUG - 2019-12-02 12:26:02 --> Global POST, GET and COOKIE data sanitized
ERROR - 2019-12-02 12:26:02 --> Severity: error --> Exception: syntax error, unexpected '.' C:\xampp\htdocs\myci\application\controllers\Dashboard.php 37
ERROR - 2019-12-02 12:26:22 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\myci\application\vendor/autoload.php was not found.
DEBUG - 2019-12-02 12:26:22 --> UTF-8 Support Enabled
DEBUG - 2019-12-02 12:26:22 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2019-12-02 12:26:22 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2019-12-02 12:26:22 --> Google Maps Class Initialized
DEBUG - 2019-12-02 12:26:22 --> Googlemaps class already loaded. Second attempt ignored.
DEBUG - 2019-12-02 12:26:23 --> Total execution time: 0.4658
ERROR - 2019-12-02 12:26:55 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\myci\application\vendor/autoload.php was not found.
DEBUG - 2019-12-02 12:26:55 --> UTF-8 Support Enabled
DEBUG - 2019-12-02 12:26:55 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2019-12-02 12:26:55 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2019-12-02 12:26:55 --> Google Maps Class Initialized
DEBUG - 2019-12-02 12:26:55 --> Googlemaps class already loaded. Second attempt ignored.
DEBUG - 2019-12-02 12:26:56 --> Total execution time: 0.3639
ERROR - 2019-12-02 12:27:42 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\myci\application\vendor/autoload.php was not found.
DEBUG - 2019-12-02 12:27:42 --> UTF-8 Support Enabled
DEBUG - 2019-12-02 12:27:42 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2019-12-02 12:27:42 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2019-12-02 12:27:42 --> Google Maps Class Initialized
ERROR - 2019-12-02 12:27:43 --> Severity: Notice --> Undefined variable: map C:\xampp\htdocs\myci\application\views\back\template\meta.php 31
DEBUG - 2019-12-02 12:27:43 --> Total execution time: 0.3104
ERROR - 2019-12-02 12:27:50 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\myci\application\vendor/autoload.php was not found.
DEBUG - 2019-12-02 12:27:50 --> UTF-8 Support Enabled
DEBUG - 2019-12-02 12:27:50 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2019-12-02 12:27:50 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2019-12-02 12:27:50 --> Google Maps Class Initialized
ERROR - 2019-12-02 12:27:50 --> Severity: Notice --> Undefined variable: map C:\xampp\htdocs\myci\application\views\back\template\meta.php 31
DEBUG - 2019-12-02 12:27:50 --> Total execution time: 0.2180
ERROR - 2019-12-02 12:28:20 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\myci\application\vendor/autoload.php was not found.
DEBUG - 2019-12-02 12:28:20 --> UTF-8 Support Enabled
DEBUG - 2019-12-02 12:28:20 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2019-12-02 12:28:20 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2019-12-02 12:28:20 --> Google Maps Class Initialized
ERROR - 2019-12-02 12:28:20 --> Severity: Notice --> Undefined variable: map C:\xampp\htdocs\myci\application\views\back\template\meta.php 31
DEBUG - 2019-12-02 12:28:20 --> Total execution time: 0.1312
ERROR - 2019-12-02 12:28:50 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\myci\application\vendor/autoload.php was not found.
DEBUG - 2019-12-02 12:28:50 --> UTF-8 Support Enabled
DEBUG - 2019-12-02 12:28:50 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2019-12-02 12:28:50 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2019-12-02 12:28:50 --> Google Maps Class Initialized
DEBUG - 2019-12-02 12:28:50 --> Total execution time: 0.1242
ERROR - 2019-12-02 12:29:31 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\myci\application\vendor/autoload.php was not found.
DEBUG - 2019-12-02 12:29:31 --> UTF-8 Support Enabled
DEBUG - 2019-12-02 12:29:31 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2019-12-02 12:29:31 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2019-12-02 12:29:31 --> Google Maps Class Initialized
ERROR - 2019-12-02 12:29:31 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\myci\application\vendor/autoload.php was not found.
DEBUG - 2019-12-02 12:29:31 --> UTF-8 Support Enabled
DEBUG - 2019-12-02 12:29:31 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2019-12-02 12:29:31 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2019-12-02 12:29:31 --> Google Maps Class Initialized
DEBUG - 2019-12-02 12:29:31 --> Total execution time: 0.1000
ERROR - 2019-12-02 12:29:31 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\myci\application\vendor/autoload.php was not found.
DEBUG - 2019-12-02 12:29:31 --> UTF-8 Support Enabled
DEBUG - 2019-12-02 12:29:31 --> Global POST, GET and COOKIE data sanitized
ERROR - 2019-12-02 12:29:31 --> 404 Page Not Found: Demo_files/images
ERROR - 2019-12-02 12:29:36 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\myci\application\vendor/autoload.php was not found.
DEBUG - 2019-12-02 12:29:36 --> UTF-8 Support Enabled
DEBUG - 2019-12-02 12:29:36 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2019-12-02 12:29:37 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2019-12-02 12:29:37 --> Google Maps Class Initialized
DEBUG - 2019-12-02 12:29:37 --> Total execution time: 0.1189
ERROR - 2019-12-02 12:29:38 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\myci\application\vendor/autoload.php was not found.
DEBUG - 2019-12-02 12:29:38 --> UTF-8 Support Enabled
DEBUG - 2019-12-02 12:29:38 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2019-12-02 12:29:38 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2019-12-02 12:29:38 --> Google Maps Class Initialized
ERROR - 2019-12-02 12:29:38 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\myci\application\vendor/autoload.php was not found.
DEBUG - 2019-12-02 12:29:38 --> UTF-8 Support Enabled
DEBUG - 2019-12-02 12:29:38 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2019-12-02 12:29:38 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2019-12-02 12:29:38 --> Google Maps Class Initialized
DEBUG - 2019-12-02 12:29:38 --> Googlemaps class already loaded. Second attempt ignored.
DEBUG - 2019-12-02 12:29:38 --> Total execution time: 0.3572
ERROR - 2019-12-02 12:31:49 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\myci\application\vendor/autoload.php was not found.
DEBUG - 2019-12-02 12:31:49 --> UTF-8 Support Enabled
DEBUG - 2019-12-02 12:31:49 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2019-12-02 12:31:49 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2019-12-02 12:31:49 --> Google Maps Class Initialized
DEBUG - 2019-12-02 12:31:49 --> Googlemaps class already loaded. Second attempt ignored.
DEBUG - 2019-12-02 12:31:49 --> Total execution time: 0.4783
ERROR - 2019-12-02 12:33:14 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\myci\application\vendor/autoload.php was not found.
DEBUG - 2019-12-02 12:33:14 --> UTF-8 Support Enabled
DEBUG - 2019-12-02 12:33:14 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2019-12-02 12:33:14 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2019-12-02 12:33:14 --> Google Maps Class Initialized
DEBUG - 2019-12-02 12:33:14 --> Googlemaps class already loaded. Second attempt ignored.
DEBUG - 2019-12-02 12:33:14 --> Total execution time: 0.4112
ERROR - 2019-12-02 12:33:31 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\myci\application\vendor/autoload.php was not found.
DEBUG - 2019-12-02 12:33:31 --> UTF-8 Support Enabled
DEBUG - 2019-12-02 12:33:31 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2019-12-02 12:33:31 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2019-12-02 12:33:31 --> Google Maps Class Initialized
DEBUG - 2019-12-02 12:33:31 --> Googlemaps class already loaded. Second attempt ignored.
DEBUG - 2019-12-02 12:33:31 --> Total execution time: 0.3604
ERROR - 2019-12-02 12:33:45 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\myci\application\vendor/autoload.php was not found.
DEBUG - 2019-12-02 12:33:45 --> UTF-8 Support Enabled
DEBUG - 2019-12-02 12:33:45 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2019-12-02 12:33:45 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2019-12-02 12:33:45 --> Google Maps Class Initialized
DEBUG - 2019-12-02 12:33:45 --> Googlemaps class already loaded. Second attempt ignored.
DEBUG - 2019-12-02 12:33:45 --> Total execution time: 0.3640
ERROR - 2019-12-02 12:34:16 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\myci\application\vendor/autoload.php was not found.
DEBUG - 2019-12-02 12:34:16 --> UTF-8 Support Enabled
DEBUG - 2019-12-02 12:34:16 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2019-12-02 12:34:16 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2019-12-02 12:34:16 --> Google Maps Class Initialized
DEBUG - 2019-12-02 12:34:16 --> Googlemaps class already loaded. Second attempt ignored.
DEBUG - 2019-12-02 12:34:16 --> Total execution time: 0.3587
ERROR - 2019-12-02 12:39:02 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\myci\application\vendor/autoload.php was not found.
DEBUG - 2019-12-02 12:39:02 --> UTF-8 Support Enabled
DEBUG - 2019-12-02 12:39:02 --> Global POST, GET and COOKIE data sanitized
ERROR - 2019-12-02 12:39:02 --> Severity: error --> Exception: syntax error, unexpected ',' C:\xampp\htdocs\myci\application\controllers\Dashboard.php 39
ERROR - 2019-12-02 12:39:46 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\myci\application\vendor/autoload.php was not found.
DEBUG - 2019-12-02 12:39:46 --> UTF-8 Support Enabled
DEBUG - 2019-12-02 12:39:46 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2019-12-02 12:39:46 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2019-12-02 12:39:46 --> Google Maps Class Initialized
DEBUG - 2019-12-02 12:39:46 --> Googlemaps class already loaded. Second attempt ignored.
DEBUG - 2019-12-02 12:39:46 --> Total execution time: 0.4218
ERROR - 2019-12-02 12:42:07 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\myci\application\vendor/autoload.php was not found.
DEBUG - 2019-12-02 12:42:07 --> UTF-8 Support Enabled
DEBUG - 2019-12-02 12:42:07 --> Global POST, GET and COOKIE data sanitized
ERROR - 2019-12-02 12:42:07 --> Severity: error --> Exception: syntax error, unexpected 'echo' (T_ECHO) C:\xampp\htdocs\myci\application\controllers\Dashboard.php 37
ERROR - 2019-12-02 12:42:36 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\myci\application\vendor/autoload.php was not found.
DEBUG - 2019-12-02 12:42:36 --> UTF-8 Support Enabled
DEBUG - 2019-12-02 12:42:36 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2019-12-02 12:42:36 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2019-12-02 12:42:36 --> Google Maps Class Initialized
DEBUG - 2019-12-02 12:42:36 --> Googlemaps class already loaded. Second attempt ignored.
DEBUG - 2019-12-02 12:42:36 --> Total execution time: 0.3542
ERROR - 2019-12-02 12:56:34 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\myci\application\vendor/autoload.php was not found.
DEBUG - 2019-12-02 12:56:34 --> UTF-8 Support Enabled
DEBUG - 2019-12-02 12:56:34 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2019-12-02 12:56:35 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2019-12-02 12:56:35 --> Google Maps Class Initialized
DEBUG - 2019-12-02 12:56:35 --> Googlemaps class already loaded. Second attempt ignored.
ERROR - 2019-12-02 12:56:35 --> Severity: Notice --> Undefined variable: get_all_marker C:\xampp\htdocs\myci\application\controllers\Dashboard.php 35
ERROR - 2019-12-02 12:56:35 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\myci\application\controllers\Dashboard.php 35
DEBUG - 2019-12-02 12:56:35 --> Total execution time: 0.1880
ERROR - 2019-12-02 12:56:48 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\myci\application\vendor/autoload.php was not found.
DEBUG - 2019-12-02 12:56:48 --> UTF-8 Support Enabled
DEBUG - 2019-12-02 12:56:48 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2019-12-02 12:56:48 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2019-12-02 12:56:48 --> Google Maps Class Initialized
DEBUG - 2019-12-02 12:56:48 --> Googlemaps class already loaded. Second attempt ignored.
ERROR - 2019-12-02 12:56:48 --> Severity: Notice --> Undefined variable: get_all_marker C:\xampp\htdocs\myci\application\controllers\Dashboard.php 35
ERROR - 2019-12-02 12:56:48 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\myci\application\controllers\Dashboard.php 35
DEBUG - 2019-12-02 12:56:48 --> Total execution time: 0.2259
ERROR - 2019-12-02 12:57:42 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\myci\application\vendor/autoload.php was not found.
DEBUG - 2019-12-02 12:57:42 --> UTF-8 Support Enabled
DEBUG - 2019-12-02 12:57:42 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2019-12-02 12:57:42 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2019-12-02 12:57:42 --> Google Maps Class Initialized
DEBUG - 2019-12-02 12:57:42 --> Googlemaps class already loaded. Second attempt ignored.
ERROR - 2019-12-02 12:57:42 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\myci\application\controllers\Dashboard.php 35
ERROR - 2019-12-02 12:57:42 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\myci\application\controllers\Dashboard.php 35
DEBUG - 2019-12-02 12:57:42 --> Total execution time: 0.1809
ERROR - 2019-12-02 12:57:47 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\myci\application\vendor/autoload.php was not found.
DEBUG - 2019-12-02 12:57:47 --> UTF-8 Support Enabled
DEBUG - 2019-12-02 12:57:47 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2019-12-02 12:57:47 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2019-12-02 12:57:47 --> Google Maps Class Initialized
DEBUG - 2019-12-02 12:57:47 --> Googlemaps class already loaded. Second attempt ignored.
ERROR - 2019-12-02 12:57:47 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\myci\application\controllers\Dashboard.php 35
ERROR - 2019-12-02 12:57:47 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\myci\application\controllers\Dashboard.php 35
DEBUG - 2019-12-02 12:57:47 --> Total execution time: 0.2358
ERROR - 2019-12-02 12:58:57 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\myci\application\vendor/autoload.php was not found.
DEBUG - 2019-12-02 12:58:57 --> UTF-8 Support Enabled
DEBUG - 2019-12-02 12:58:57 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2019-12-02 12:58:57 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2019-12-02 12:58:57 --> Google Maps Class Initialized
DEBUG - 2019-12-02 12:58:57 --> Googlemaps class already loaded. Second attempt ignored.
ERROR - 2019-12-02 12:58:57 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\myci\application\controllers\Dashboard.php 35
ERROR - 2019-12-02 12:58:57 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\myci\application\controllers\Dashboard.php 35
DEBUG - 2019-12-02 12:58:57 --> Total execution time: 0.1744
ERROR - 2019-12-02 12:59:12 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\myci\application\vendor/autoload.php was not found.
DEBUG - 2019-12-02 12:59:12 --> UTF-8 Support Enabled
DEBUG - 2019-12-02 12:59:12 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2019-12-02 12:59:12 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2019-12-02 12:59:12 --> Google Maps Class Initialized
DEBUG - 2019-12-02 12:59:12 --> Googlemaps class already loaded. Second attempt ignored.
ERROR - 2019-12-02 12:59:12 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\myci\application\controllers\Dashboard.php 35
ERROR - 2019-12-02 12:59:12 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\myci\application\controllers\Dashboard.php 35
DEBUG - 2019-12-02 12:59:12 --> Total execution time: 0.2611
ERROR - 2019-12-02 12:59:54 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\myci\application\vendor/autoload.php was not found.
DEBUG - 2019-12-02 12:59:54 --> UTF-8 Support Enabled
DEBUG - 2019-12-02 12:59:54 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2019-12-02 12:59:54 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2019-12-02 12:59:54 --> Google Maps Class Initialized
DEBUG - 2019-12-02 12:59:54 --> Googlemaps class already loaded. Second attempt ignored.
ERROR - 2019-12-02 12:59:54 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\myci\application\controllers\Dashboard.php 37
ERROR - 2019-12-02 12:59:54 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\myci\application\controllers\Dashboard.php 37
ERROR - 2019-12-02 12:59:54 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\myci\application\controllers\Dashboard.php 37
ERROR - 2019-12-02 12:59:54 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\myci\application\controllers\Dashboard.php 37
ERROR - 2019-12-02 12:59:55 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\myci\application\controllers\Dashboard.php 37
ERROR - 2019-12-02 12:59:55 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\myci\application\controllers\Dashboard.php 37
ERROR - 2019-12-02 12:59:55 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\myci\application\controllers\Dashboard.php 37
ERROR - 2019-12-02 12:59:55 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\myci\application\controllers\Dashboard.php 37
ERROR - 2019-12-02 12:59:55 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\myci\application\controllers\Dashboard.php 37
ERROR - 2019-12-02 12:59:55 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\myci\application\controllers\Dashboard.php 37
ERROR - 2019-12-02 12:59:55 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\myci\application\controllers\Dashboard.php 37
ERROR - 2019-12-02 12:59:55 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\myci\application\controllers\Dashboard.php 37
ERROR - 2019-12-02 12:59:55 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\myci\application\controllers\Dashboard.php 37
ERROR - 2019-12-02 12:59:55 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\myci\application\controllers\Dashboard.php 37
ERROR - 2019-12-02 12:59:55 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\myci\application\controllers\Dashboard.php 37
ERROR - 2019-12-02 12:59:55 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\myci\application\controllers\Dashboard.php 37
ERROR - 2019-12-02 12:59:55 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\myci\application\controllers\Dashboard.php 37
ERROR - 2019-12-02 12:59:55 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\myci\application\controllers\Dashboard.php 37
ERROR - 2019-12-02 12:59:55 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\myci\application\controllers\Dashboard.php 37
ERROR - 2019-12-02 12:59:55 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\myci\application\controllers\Dashboard.php 37
ERROR - 2019-12-02 12:59:55 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\myci\application\controllers\Dashboard.php 37
ERROR - 2019-12-02 12:59:55 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\myci\application\controllers\Dashboard.php 37
ERROR - 2019-12-02 12:59:55 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\myci\application\controllers\Dashboard.php 37
ERROR - 2019-12-02 12:59:55 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\myci\application\controllers\Dashboard.php 37
ERROR - 2019-12-02 12:59:55 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\myci\application\controllers\Dashboard.php 37
ERROR - 2019-12-02 12:59:55 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\myci\application\controllers\Dashboard.php 37
ERROR - 2019-12-02 12:59:55 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\myci\application\controllers\Dashboard.php 37
ERROR - 2019-12-02 12:59:55 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\myci\application\controllers\Dashboard.php 37
ERROR - 2019-12-02 12:59:56 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\myci\application\controllers\Dashboard.php 37
ERROR - 2019-12-02 12:59:56 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\myci\application\controllers\Dashboard.php 37
ERROR - 2019-12-02 12:59:56 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\myci\application\controllers\Dashboard.php 37
ERROR - 2019-12-02 12:59:56 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\myci\application\controllers\Dashboard.php 37
ERROR - 2019-12-02 12:59:56 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\myci\application\controllers\Dashboard.php 37
ERROR - 2019-12-02 12:59:56 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\myci\application\controllers\Dashboard.php 37
ERROR - 2019-12-02 12:59:56 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\myci\application\controllers\Dashboard.php 37
ERROR - 2019-12-02 12:59:56 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\myci\application\controllers\Dashboard.php 37
ERROR - 2019-12-02 12:59:56 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\myci\application\controllers\Dashboard.php 37
ERROR - 2019-12-02 12:59:56 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\myci\application\controllers\Dashboard.php 37
ERROR - 2019-12-02 12:59:56 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\myci\application\controllers\Dashboard.php 37
ERROR - 2019-12-02 12:59:56 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\myci\application\controllers\Dashboard.php 37
ERROR - 2019-12-02 12:59:56 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\myci\application\controllers\Dashboard.php 37
ERROR - 2019-12-02 12:59:56 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\myci\application\controllers\Dashboard.php 37
ERROR - 2019-12-02 12:59:56 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\myci\application\controllers\Dashboard.php 37
ERROR - 2019-12-02 12:59:56 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\myci\application\controllers\Dashboard.php 37
ERROR - 2019-12-02 12:59:56 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\myci\application\controllers\Dashboard.php 37
ERROR - 2019-12-02 12:59:56 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\myci\application\controllers\Dashboard.php 37
ERROR - 2019-12-02 12:59:56 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\myci\application\controllers\Dashboard.php 37
ERROR - 2019-12-02 12:59:56 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\myci\application\controllers\Dashboard.php 37
ERROR - 2019-12-02 12:59:56 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\myci\application\controllers\Dashboard.php 37
ERROR - 2019-12-02 12:59:56 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\myci\application\controllers\Dashboard.php 37
ERROR - 2019-12-02 12:59:56 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\myci\application\controllers\Dashboard.php 37
ERROR - 2019-12-02 12:59:57 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\myci\application\controllers\Dashboard.php 37
ERROR - 2019-12-02 12:59:57 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\myci\application\controllers\Dashboard.php 37
ERROR - 2019-12-02 12:59:57 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\myci\application\controllers\Dashboard.php 37
ERROR - 2019-12-02 12:59:57 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\myci\application\controllers\Dashboard.php 37
ERROR - 2019-12-02 12:59:57 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\myci\application\controllers\Dashboard.php 37
ERROR - 2019-12-02 12:59:57 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\myci\application\controllers\Dashboard.php 37
ERROR - 2019-12-02 12:59:57 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\myci\application\controllers\Dashboard.php 37
ERROR - 2019-12-02 12:59:57 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\myci\application\controllers\Dashboard.php 37
ERROR - 2019-12-02 12:59:57 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\myci\application\controllers\Dashboard.php 37
ERROR - 2019-12-02 12:59:57 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\myci\application\controllers\Dashboard.php 37
ERROR - 2019-12-02 12:59:57 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\myci\application\controllers\Dashboard.php 37
ERROR - 2019-12-02 12:59:57 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\myci\application\controllers\Dashboard.php 37
ERROR - 2019-12-02 12:59:57 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\myci\application\controllers\Dashboard.php 37
ERROR - 2019-12-02 12:59:57 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\myci\application\controllers\Dashboard.php 37
ERROR - 2019-12-02 12:59:57 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\myci\application\controllers\Dashboard.php 37
DEBUG - 2019-12-02 12:59:57 --> Total execution time: 3.0107
ERROR - 2019-12-02 13:00:02 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\myci\application\vendor/autoload.php was not found.
DEBUG - 2019-12-02 13:00:02 --> UTF-8 Support Enabled
DEBUG - 2019-12-02 13:00:02 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2019-12-02 13:00:02 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2019-12-02 13:00:02 --> Google Maps Class Initialized
DEBUG - 2019-12-02 13:00:02 --> Googlemaps class already loaded. Second attempt ignored.
ERROR - 2019-12-02 13:00:02 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\myci\application\controllers\Dashboard.php 37
ERROR - 2019-12-02 13:00:02 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\myci\application\controllers\Dashboard.php 37
ERROR - 2019-12-02 13:00:02 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\myci\application\controllers\Dashboard.php 37
ERROR - 2019-12-02 13:00:02 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\myci\application\controllers\Dashboard.php 37
ERROR - 2019-12-02 13:00:02 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\myci\application\controllers\Dashboard.php 37
ERROR - 2019-12-02 13:00:02 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\myci\application\controllers\Dashboard.php 37
ERROR - 2019-12-02 13:00:03 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\myci\application\controllers\Dashboard.php 37
ERROR - 2019-12-02 13:00:03 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\myci\application\controllers\Dashboard.php 37
ERROR - 2019-12-02 13:00:03 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\myci\application\controllers\Dashboard.php 37
ERROR - 2019-12-02 13:00:03 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\myci\application\controllers\Dashboard.php 37
ERROR - 2019-12-02 13:00:03 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\myci\application\controllers\Dashboard.php 37
ERROR - 2019-12-02 13:00:03 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\myci\application\controllers\Dashboard.php 37
ERROR - 2019-12-02 13:00:03 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\myci\application\controllers\Dashboard.php 37
ERROR - 2019-12-02 13:00:03 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\myci\application\controllers\Dashboard.php 37
ERROR - 2019-12-02 13:00:03 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\myci\application\controllers\Dashboard.php 37
ERROR - 2019-12-02 13:00:03 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\myci\application\controllers\Dashboard.php 37
ERROR - 2019-12-02 13:00:03 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\myci\application\controllers\Dashboard.php 37
ERROR - 2019-12-02 13:00:03 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\myci\application\controllers\Dashboard.php 37
ERROR - 2019-12-02 13:00:03 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\myci\application\controllers\Dashboard.php 37
ERROR - 2019-12-02 13:00:03 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\myci\application\controllers\Dashboard.php 37
ERROR - 2019-12-02 13:00:03 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\myci\application\controllers\Dashboard.php 37
ERROR - 2019-12-02 13:00:03 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\myci\application\controllers\Dashboard.php 37
ERROR - 2019-12-02 13:00:03 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\myci\application\controllers\Dashboard.php 37
ERROR - 2019-12-02 13:00:03 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\myci\application\controllers\Dashboard.php 37
ERROR - 2019-12-02 13:00:03 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\myci\application\controllers\Dashboard.php 37
ERROR - 2019-12-02 13:00:03 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\myci\application\controllers\Dashboard.php 37
ERROR - 2019-12-02 13:00:03 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\myci\application\controllers\Dashboard.php 37
ERROR - 2019-12-02 13:00:03 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\myci\application\controllers\Dashboard.php 37
ERROR - 2019-12-02 13:00:04 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\myci\application\controllers\Dashboard.php 37
ERROR - 2019-12-02 13:00:04 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\myci\application\controllers\Dashboard.php 37
ERROR - 2019-12-02 13:00:04 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\myci\application\controllers\Dashboard.php 37
ERROR - 2019-12-02 13:00:04 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\myci\application\controllers\Dashboard.php 37
ERROR - 2019-12-02 13:00:04 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\myci\application\controllers\Dashboard.php 37
ERROR - 2019-12-02 13:00:04 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\myci\application\controllers\Dashboard.php 37
ERROR - 2019-12-02 13:00:04 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\myci\application\controllers\Dashboard.php 37
ERROR - 2019-12-02 13:00:04 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\myci\application\controllers\Dashboard.php 37
ERROR - 2019-12-02 13:00:04 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\myci\application\controllers\Dashboard.php 37
ERROR - 2019-12-02 13:00:04 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\myci\application\controllers\Dashboard.php 37
ERROR - 2019-12-02 13:00:04 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\myci\application\controllers\Dashboard.php 37
ERROR - 2019-12-02 13:00:04 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\myci\application\controllers\Dashboard.php 37
ERROR - 2019-12-02 13:00:04 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\myci\application\controllers\Dashboard.php 37
ERROR - 2019-12-02 13:00:04 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\myci\application\controllers\Dashboard.php 37
ERROR - 2019-12-02 13:00:04 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\myci\application\controllers\Dashboard.php 37
ERROR - 2019-12-02 13:00:04 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\myci\application\controllers\Dashboard.php 37
ERROR - 2019-12-02 13:00:04 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\myci\application\controllers\Dashboard.php 37
ERROR - 2019-12-02 13:00:04 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\myci\application\controllers\Dashboard.php 37
ERROR - 2019-12-02 13:00:04 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\myci\application\controllers\Dashboard.php 37
ERROR - 2019-12-02 13:00:04 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\myci\application\controllers\Dashboard.php 37
ERROR - 2019-12-02 13:00:04 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\myci\application\controllers\Dashboard.php 37
ERROR - 2019-12-02 13:00:04 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\myci\application\controllers\Dashboard.php 37
ERROR - 2019-12-02 13:00:04 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\myci\application\controllers\Dashboard.php 37
ERROR - 2019-12-02 13:00:05 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\myci\application\controllers\Dashboard.php 37
ERROR - 2019-12-02 13:00:05 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\myci\application\controllers\Dashboard.php 37
ERROR - 2019-12-02 13:00:05 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\myci\application\controllers\Dashboard.php 37
ERROR - 2019-12-02 13:00:05 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\myci\application\controllers\Dashboard.php 37
ERROR - 2019-12-02 13:00:05 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\myci\application\controllers\Dashboard.php 37
ERROR - 2019-12-02 13:00:05 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\myci\application\controllers\Dashboard.php 37
ERROR - 2019-12-02 13:00:05 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\myci\application\controllers\Dashboard.php 37
ERROR - 2019-12-02 13:00:05 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\myci\application\controllers\Dashboard.php 37
ERROR - 2019-12-02 13:00:05 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\myci\application\controllers\Dashboard.php 37
ERROR - 2019-12-02 13:00:05 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\myci\application\controllers\Dashboard.php 37
ERROR - 2019-12-02 13:00:05 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\myci\application\controllers\Dashboard.php 37
ERROR - 2019-12-02 13:00:05 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\myci\application\controllers\Dashboard.php 37
ERROR - 2019-12-02 13:00:05 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\myci\application\controllers\Dashboard.php 37
ERROR - 2019-12-02 13:00:05 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\myci\application\controllers\Dashboard.php 37
ERROR - 2019-12-02 13:00:05 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\myci\application\controllers\Dashboard.php 37
DEBUG - 2019-12-02 13:00:05 --> Total execution time: 3.1599
ERROR - 2019-12-02 13:00:51 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\myci\application\vendor/autoload.php was not found.
DEBUG - 2019-12-02 13:00:51 --> UTF-8 Support Enabled
DEBUG - 2019-12-02 13:00:51 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2019-12-02 13:00:51 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2019-12-02 13:00:51 --> Google Maps Class Initialized
DEBUG - 2019-12-02 13:00:51 --> Googlemaps class already loaded. Second attempt ignored.
DEBUG - 2019-12-02 13:00:51 --> Total execution time: 0.4190
ERROR - 2019-12-02 13:01:44 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\myci\application\vendor/autoload.php was not found.
DEBUG - 2019-12-02 13:01:44 --> UTF-8 Support Enabled
DEBUG - 2019-12-02 13:01:44 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2019-12-02 13:01:44 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2019-12-02 13:01:44 --> Google Maps Class Initialized
DEBUG - 2019-12-02 13:01:44 --> Googlemaps class already loaded. Second attempt ignored.
DEBUG - 2019-12-02 13:01:44 --> Total execution time: 0.3814
ERROR - 2019-12-02 13:02:28 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\myci\application\vendor/autoload.php was not found.
DEBUG - 2019-12-02 13:02:28 --> UTF-8 Support Enabled
DEBUG - 2019-12-02 13:02:28 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2019-12-02 13:02:28 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2019-12-02 13:02:28 --> Google Maps Class Initialized
DEBUG - 2019-12-02 13:02:28 --> Googlemaps class already loaded. Second attempt ignored.
DEBUG - 2019-12-02 13:02:29 --> Total execution time: 0.3520
ERROR - 2019-12-02 13:04:12 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\myci\application\vendor/autoload.php was not found.
DEBUG - 2019-12-02 13:04:12 --> UTF-8 Support Enabled
DEBUG - 2019-12-02 13:04:12 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2019-12-02 13:04:12 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2019-12-02 13:04:12 --> Google Maps Class Initialized
DEBUG - 2019-12-02 13:04:12 --> Googlemaps class already loaded. Second attempt ignored.
DEBUG - 2019-12-02 13:04:13 --> Total execution time: 0.3980
ERROR - 2019-12-02 13:05:19 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\myci\application\vendor/autoload.php was not found.
DEBUG - 2019-12-02 13:05:19 --> UTF-8 Support Enabled
DEBUG - 2019-12-02 13:05:19 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2019-12-02 13:05:19 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2019-12-02 13:05:19 --> Google Maps Class Initialized
DEBUG - 2019-12-02 13:05:19 --> Googlemaps class already loaded. Second attempt ignored.
DEBUG - 2019-12-02 13:05:19 --> Total execution time: 0.3762
ERROR - 2019-12-02 13:05:45 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\myci\application\vendor/autoload.php was not found.
DEBUG - 2019-12-02 13:05:45 --> UTF-8 Support Enabled
DEBUG - 2019-12-02 13:05:45 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2019-12-02 13:05:45 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2019-12-02 13:05:45 --> Google Maps Class Initialized
DEBUG - 2019-12-02 13:05:45 --> Googlemaps class already loaded. Second attempt ignored.
DEBUG - 2019-12-02 13:05:46 --> Total execution time: 0.3701
ERROR - 2019-12-02 13:13:58 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\myci\application\vendor/autoload.php was not found.
DEBUG - 2019-12-02 13:13:58 --> UTF-8 Support Enabled
DEBUG - 2019-12-02 13:13:58 --> Global POST, GET and COOKIE data sanitized
ERROR - 2019-12-02 13:13:58 --> Severity: error --> Exception: syntax error, unexpected ''.$peta->atitude.'' (T_CONSTANT_ENCAPSED_STRING) C:\xampp\htdocs\myci\application\controllers\Dashboard.php 37
ERROR - 2019-12-02 13:14:35 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\myci\application\vendor/autoload.php was not found.
DEBUG - 2019-12-02 13:14:36 --> UTF-8 Support Enabled
DEBUG - 2019-12-02 13:14:36 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2019-12-02 13:14:36 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2019-12-02 13:14:36 --> Google Maps Class Initialized
DEBUG - 2019-12-02 13:14:36 --> Googlemaps class already loaded. Second attempt ignored.
DEBUG - 2019-12-02 13:14:36 --> Total execution time: 0.3817
ERROR - 2019-12-02 13:16:00 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\myci\application\vendor/autoload.php was not found.
DEBUG - 2019-12-02 13:16:00 --> UTF-8 Support Enabled
DEBUG - 2019-12-02 13:16:00 --> Global POST, GET and COOKIE data sanitized
ERROR - 2019-12-02 13:16:00 --> Severity: error --> Exception: syntax error, unexpected ''.$peta->atitude.'' (T_CONSTANT_ENCAPSED_STRING) C:\xampp\htdocs\myci\application\controllers\Dashboard.php 38
ERROR - 2019-12-02 13:16:32 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\myci\application\vendor/autoload.php was not found.
DEBUG - 2019-12-02 13:16:32 --> UTF-8 Support Enabled
DEBUG - 2019-12-02 13:16:32 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2019-12-02 13:16:32 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2019-12-02 13:16:32 --> Google Maps Class Initialized
DEBUG - 2019-12-02 13:16:32 --> Googlemaps class already loaded. Second attempt ignored.
DEBUG - 2019-12-02 13:16:32 --> Total execution time: 0.3981
ERROR - 2019-12-02 13:17:21 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\myci\application\vendor/autoload.php was not found.
DEBUG - 2019-12-02 13:17:21 --> UTF-8 Support Enabled
DEBUG - 2019-12-02 13:17:21 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2019-12-02 13:17:21 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2019-12-02 13:17:21 --> Google Maps Class Initialized
DEBUG - 2019-12-02 13:17:21 --> Total execution time: 0.1292
ERROR - 2019-12-02 13:17:23 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\myci\application\vendor/autoload.php was not found.
DEBUG - 2019-12-02 13:17:23 --> UTF-8 Support Enabled
DEBUG - 2019-12-02 13:17:23 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2019-12-02 13:17:24 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2019-12-02 13:17:24 --> Google Maps Class Initialized
DEBUG - 2019-12-02 13:17:24 --> Total execution time: 0.1935
ERROR - 2019-12-02 13:17:27 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\myci\application\vendor/autoload.php was not found.
DEBUG - 2019-12-02 13:17:27 --> UTF-8 Support Enabled
DEBUG - 2019-12-02 13:17:27 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2019-12-02 13:17:27 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2019-12-02 13:17:27 --> Google Maps Class Initialized
DEBUG - 2019-12-02 13:17:28 --> Total execution time: 0.6849
ERROR - 2019-12-02 13:17:46 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\myci\application\vendor/autoload.php was not found.
DEBUG - 2019-12-02 13:17:46 --> UTF-8 Support Enabled
DEBUG - 2019-12-02 13:17:46 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2019-12-02 13:17:46 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2019-12-02 13:17:46 --> Google Maps Class Initialized
ERROR - 2019-12-02 13:17:46 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\myci\application\vendor/autoload.php was not found.
DEBUG - 2019-12-02 13:17:46 --> UTF-8 Support Enabled
DEBUG - 2019-12-02 13:17:46 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2019-12-02 13:17:46 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2019-12-02 13:17:46 --> Google Maps Class Initialized
DEBUG - 2019-12-02 13:17:47 --> Total execution time: 0.1734
ERROR - 2019-12-02 13:17:49 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\myci\application\vendor/autoload.php was not found.
DEBUG - 2019-12-02 13:17:49 --> UTF-8 Support Enabled
DEBUG - 2019-12-02 13:17:49 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2019-12-02 13:17:49 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2019-12-02 13:17:49 --> Google Maps Class Initialized
DEBUG - 2019-12-02 13:17:49 --> Total execution time: 0.6774
ERROR - 2019-12-02 13:18:01 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\myci\application\vendor/autoload.php was not found.
DEBUG - 2019-12-02 13:18:01 --> UTF-8 Support Enabled
DEBUG - 2019-12-02 13:18:01 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2019-12-02 13:18:01 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2019-12-02 13:18:01 --> Google Maps Class Initialized
ERROR - 2019-12-02 13:18:01 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\myci\application\vendor/autoload.php was not found.
DEBUG - 2019-12-02 13:18:01 --> UTF-8 Support Enabled
DEBUG - 2019-12-02 13:18:01 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2019-12-02 13:18:01 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2019-12-02 13:18:01 --> Google Maps Class Initialized
DEBUG - 2019-12-02 13:18:01 --> Total execution time: 0.1399
ERROR - 2019-12-02 13:18:06 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\myci\application\vendor/autoload.php was not found.
DEBUG - 2019-12-02 13:18:06 --> UTF-8 Support Enabled
DEBUG - 2019-12-02 13:18:06 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2019-12-02 13:18:06 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2019-12-02 13:18:06 --> Google Maps Class Initialized
ERROR - 2019-12-02 13:18:06 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\myci\application\vendor/autoload.php was not found.
DEBUG - 2019-12-02 13:18:06 --> UTF-8 Support Enabled
DEBUG - 2019-12-02 13:18:06 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2019-12-02 13:18:06 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2019-12-02 13:18:06 --> Google Maps Class Initialized
DEBUG - 2019-12-02 13:18:06 --> Total execution time: 0.1185
ERROR - 2019-12-02 13:18:06 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\myci\application\vendor/autoload.php was not found.
DEBUG - 2019-12-02 13:18:07 --> UTF-8 Support Enabled
DEBUG - 2019-12-02 13:18:07 --> Global POST, GET and COOKIE data sanitized
ERROR - 2019-12-02 13:18:07 --> 404 Page Not Found: Demo_files/images
ERROR - 2019-12-02 13:18:09 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\myci\application\vendor/autoload.php was not found.
DEBUG - 2019-12-02 13:18:09 --> UTF-8 Support Enabled
DEBUG - 2019-12-02 13:18:09 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2019-12-02 13:18:09 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2019-12-02 13:18:09 --> Google Maps Class Initialized
DEBUG - 2019-12-02 13:18:09 --> Total execution time: 0.1259
ERROR - 2019-12-02 13:18:10 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\myci\application\vendor/autoload.php was not found.
DEBUG - 2019-12-02 13:18:10 --> UTF-8 Support Enabled
DEBUG - 2019-12-02 13:18:11 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2019-12-02 13:18:11 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2019-12-02 13:18:11 --> Google Maps Class Initialized
ERROR - 2019-12-02 13:18:11 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\myci\application\vendor/autoload.php was not found.
DEBUG - 2019-12-02 13:18:11 --> UTF-8 Support Enabled
DEBUG - 2019-12-02 13:18:11 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2019-12-02 13:18:11 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2019-12-02 13:18:11 --> Google Maps Class Initialized
DEBUG - 2019-12-02 13:18:11 --> Googlemaps class already loaded. Second attempt ignored.
DEBUG - 2019-12-02 13:18:11 --> Total execution time: 0.4457
ERROR - 2019-12-02 13:22:56 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\myci\application\vendor/autoload.php was not found.
DEBUG - 2019-12-02 13:22:56 --> UTF-8 Support Enabled
DEBUG - 2019-12-02 13:22:56 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2019-12-02 13:22:56 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2019-12-02 13:22:56 --> Google Maps Class Initialized
DEBUG - 2019-12-02 13:22:56 --> Googlemaps class already loaded. Second attempt ignored.
DEBUG - 2019-12-02 13:22:57 --> Total execution time: 1.3967
ERROR - 2019-12-02 13:30:36 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\myci\application\vendor/autoload.php was not found.
DEBUG - 2019-12-02 13:30:36 --> UTF-8 Support Enabled
DEBUG - 2019-12-02 13:30:36 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2019-12-02 13:30:36 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2019-12-02 13:30:36 --> Google Maps Class Initialized
DEBUG - 2019-12-02 13:30:36 --> Googlemaps class already loaded. Second attempt ignored.
DEBUG - 2019-12-02 13:30:37 --> Total execution time: 1.1617
ERROR - 2019-12-02 13:32:03 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\myci\application\vendor/autoload.php was not found.
DEBUG - 2019-12-02 13:32:03 --> UTF-8 Support Enabled
DEBUG - 2019-12-02 13:32:03 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2019-12-02 13:32:03 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2019-12-02 13:32:03 --> Google Maps Class Initialized
DEBUG - 2019-12-02 13:32:03 --> Googlemaps class already loaded. Second attempt ignored.
DEBUG - 2019-12-02 13:32:03 --> Total execution time: 0.3760
ERROR - 2019-12-02 13:32:54 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\myci\application\vendor/autoload.php was not found.
DEBUG - 2019-12-02 13:32:54 --> UTF-8 Support Enabled
DEBUG - 2019-12-02 13:32:54 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2019-12-02 13:32:54 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2019-12-02 13:32:54 --> Google Maps Class Initialized
DEBUG - 2019-12-02 13:32:55 --> Googlemaps class already loaded. Second attempt ignored.
DEBUG - 2019-12-02 13:32:55 --> Total execution time: 0.3771
ERROR - 2019-12-02 13:34:35 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\myci\application\vendor/autoload.php was not found.
DEBUG - 2019-12-02 13:34:35 --> UTF-8 Support Enabled
DEBUG - 2019-12-02 13:34:35 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2019-12-02 13:34:35 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2019-12-02 13:34:35 --> Google Maps Class Initialized
DEBUG - 2019-12-02 13:34:35 --> Googlemaps class already loaded. Second attempt ignored.
DEBUG - 2019-12-02 13:34:36 --> Total execution time: 0.3878
ERROR - 2019-12-02 13:35:07 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\myci\application\vendor/autoload.php was not found.
DEBUG - 2019-12-02 13:35:07 --> UTF-8 Support Enabled
DEBUG - 2019-12-02 13:35:07 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2019-12-02 13:35:07 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2019-12-02 13:35:07 --> Google Maps Class Initialized
DEBUG - 2019-12-02 13:35:07 --> Googlemaps class already loaded. Second attempt ignored.
DEBUG - 2019-12-02 13:35:07 --> Total execution time: 0.4434
ERROR - 2019-12-02 13:35:18 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\myci\application\vendor/autoload.php was not found.
DEBUG - 2019-12-02 13:35:18 --> UTF-8 Support Enabled
DEBUG - 2019-12-02 13:35:18 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2019-12-02 13:35:18 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2019-12-02 13:35:18 --> Google Maps Class Initialized
DEBUG - 2019-12-02 13:35:18 --> Googlemaps class already loaded. Second attempt ignored.
DEBUG - 2019-12-02 13:35:18 --> Total execution time: 0.3821
ERROR - 2019-12-02 13:37:24 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\myci\application\vendor/autoload.php was not found.
DEBUG - 2019-12-02 13:37:24 --> UTF-8 Support Enabled
DEBUG - 2019-12-02 13:37:24 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2019-12-02 13:37:24 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2019-12-02 13:37:24 --> Google Maps Class Initialized
DEBUG - 2019-12-02 13:37:24 --> Googlemaps class already loaded. Second attempt ignored.
DEBUG - 2019-12-02 13:37:25 --> Total execution time: 0.4558
ERROR - 2019-12-02 13:37:53 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\myci\application\vendor/autoload.php was not found.
DEBUG - 2019-12-02 13:37:53 --> UTF-8 Support Enabled
DEBUG - 2019-12-02 13:37:53 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2019-12-02 13:37:53 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2019-12-02 13:37:53 --> Google Maps Class Initialized
DEBUG - 2019-12-02 13:37:53 --> Googlemaps class already loaded. Second attempt ignored.
DEBUG - 2019-12-02 13:37:53 --> Total execution time: 0.3832
ERROR - 2019-12-02 13:38:12 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\myci\application\vendor/autoload.php was not found.
DEBUG - 2019-12-02 13:38:12 --> UTF-8 Support Enabled
DEBUG - 2019-12-02 13:38:12 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2019-12-02 13:38:12 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2019-12-02 13:38:12 --> Google Maps Class Initialized
DEBUG - 2019-12-02 13:38:12 --> Googlemaps class already loaded. Second attempt ignored.
DEBUG - 2019-12-02 13:38:13 --> Total execution time: 0.3541
ERROR - 2019-12-02 13:38:37 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\myci\application\vendor/autoload.php was not found.
DEBUG - 2019-12-02 13:38:37 --> UTF-8 Support Enabled
DEBUG - 2019-12-02 13:38:37 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2019-12-02 13:38:37 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2019-12-02 13:38:37 --> Google Maps Class Initialized
DEBUG - 2019-12-02 13:38:37 --> Googlemaps class already loaded. Second attempt ignored.
DEBUG - 2019-12-02 13:38:38 --> Total execution time: 0.3847
ERROR - 2019-12-02 13:38:53 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\myci\application\vendor/autoload.php was not found.
DEBUG - 2019-12-02 13:38:53 --> UTF-8 Support Enabled
DEBUG - 2019-12-02 13:38:53 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2019-12-02 13:38:53 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2019-12-02 13:38:53 --> Google Maps Class Initialized
DEBUG - 2019-12-02 13:38:53 --> Googlemaps class already loaded. Second attempt ignored.
DEBUG - 2019-12-02 13:38:53 --> Total execution time: 0.3583
ERROR - 2019-12-02 13:39:04 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\myci\application\vendor/autoload.php was not found.
DEBUG - 2019-12-02 13:39:04 --> UTF-8 Support Enabled
DEBUG - 2019-12-02 13:39:04 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2019-12-02 13:39:04 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2019-12-02 13:39:04 --> Google Maps Class Initialized
DEBUG - 2019-12-02 13:39:05 --> Googlemaps class already loaded. Second attempt ignored.
DEBUG - 2019-12-02 13:39:05 --> Total execution time: 0.3928
ERROR - 2019-12-02 13:39:16 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\myci\application\vendor/autoload.php was not found.
DEBUG - 2019-12-02 13:39:16 --> UTF-8 Support Enabled
DEBUG - 2019-12-02 13:39:16 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2019-12-02 13:39:16 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2019-12-02 13:39:16 --> Google Maps Class Initialized
DEBUG - 2019-12-02 13:39:16 --> Googlemaps class already loaded. Second attempt ignored.
DEBUG - 2019-12-02 13:39:17 --> Total execution time: 0.3773
ERROR - 2019-12-02 13:39:48 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\myci\application\vendor/autoload.php was not found.
DEBUG - 2019-12-02 13:39:48 --> UTF-8 Support Enabled
DEBUG - 2019-12-02 13:39:48 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2019-12-02 13:39:48 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2019-12-02 13:39:48 --> Google Maps Class Initialized
DEBUG - 2019-12-02 13:39:48 --> Googlemaps class already loaded. Second attempt ignored.
DEBUG - 2019-12-02 13:39:48 --> Total execution time: 0.3716
ERROR - 2019-12-02 13:40:52 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\myci\application\vendor/autoload.php was not found.
DEBUG - 2019-12-02 13:40:52 --> UTF-8 Support Enabled
DEBUG - 2019-12-02 13:40:52 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2019-12-02 13:40:52 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2019-12-02 13:40:52 --> Google Maps Class Initialized
DEBUG - 2019-12-02 13:40:52 --> Googlemaps class already loaded. Second attempt ignored.
DEBUG - 2019-12-02 13:40:52 --> Total execution time: 0.4075
ERROR - 2019-12-02 13:42:15 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\myci\application\vendor/autoload.php was not found.
DEBUG - 2019-12-02 13:42:15 --> UTF-8 Support Enabled
DEBUG - 2019-12-02 13:42:15 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2019-12-02 13:42:15 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2019-12-02 13:42:15 --> Google Maps Class Initialized
DEBUG - 2019-12-02 13:42:15 --> Googlemaps class already loaded. Second attempt ignored.
DEBUG - 2019-12-02 13:42:15 --> Total execution time: 0.3560
ERROR - 2019-12-02 13:48:17 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\myci\application\vendor/autoload.php was not found.
DEBUG - 2019-12-02 13:48:17 --> UTF-8 Support Enabled
DEBUG - 2019-12-02 13:48:17 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2019-12-02 13:48:17 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2019-12-02 13:48:17 --> Google Maps Class Initialized
DEBUG - 2019-12-02 13:48:17 --> Googlemaps class already loaded. Second attempt ignored.
DEBUG - 2019-12-02 13:48:17 --> Total execution time: 0.4099
ERROR - 2019-12-02 13:49:11 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\myci\application\vendor/autoload.php was not found.
DEBUG - 2019-12-02 13:49:11 --> UTF-8 Support Enabled
DEBUG - 2019-12-02 13:49:11 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2019-12-02 13:49:11 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2019-12-02 13:49:11 --> Google Maps Class Initialized
DEBUG - 2019-12-02 13:49:11 --> Googlemaps class already loaded. Second attempt ignored.
DEBUG - 2019-12-02 13:49:11 --> Total execution time: 0.1492
ERROR - 2019-12-02 13:51:53 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\myci\application\vendor/autoload.php was not found.
DEBUG - 2019-12-02 13:51:53 --> UTF-8 Support Enabled
DEBUG - 2019-12-02 13:51:53 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2019-12-02 13:51:53 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2019-12-02 13:51:53 --> Google Maps Class Initialized
DEBUG - 2019-12-02 13:51:53 --> Googlemaps class already loaded. Second attempt ignored.
DEBUG - 2019-12-02 13:51:53 --> Total execution time: 0.1662
ERROR - 2019-12-02 13:52:35 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\myci\application\vendor/autoload.php was not found.
DEBUG - 2019-12-02 13:52:35 --> UTF-8 Support Enabled
DEBUG - 2019-12-02 13:52:35 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2019-12-02 13:52:35 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2019-12-02 13:52:35 --> Google Maps Class Initialized
DEBUG - 2019-12-02 13:52:36 --> Googlemaps class already loaded. Second attempt ignored.
DEBUG - 2019-12-02 13:52:36 --> Total execution time: 0.1557
ERROR - 2019-12-02 13:53:40 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\myci\application\vendor/autoload.php was not found.
DEBUG - 2019-12-02 13:53:40 --> UTF-8 Support Enabled
DEBUG - 2019-12-02 13:53:40 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2019-12-02 13:53:40 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2019-12-02 13:53:40 --> Google Maps Class Initialized
DEBUG - 2019-12-02 13:53:40 --> Googlemaps class already loaded. Second attempt ignored.
DEBUG - 2019-12-02 13:53:40 --> Total execution time: 0.1593
ERROR - 2019-12-02 13:54:23 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\myci\application\vendor/autoload.php was not found.
DEBUG - 2019-12-02 13:54:23 --> UTF-8 Support Enabled
DEBUG - 2019-12-02 13:54:23 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2019-12-02 13:54:23 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2019-12-02 13:54:23 --> Google Maps Class Initialized
DEBUG - 2019-12-02 13:54:23 --> Googlemaps class already loaded. Second attempt ignored.
DEBUG - 2019-12-02 13:54:23 --> Total execution time: 0.1686
ERROR - 2019-12-02 13:54:48 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\myci\application\vendor/autoload.php was not found.
DEBUG - 2019-12-02 13:54:48 --> UTF-8 Support Enabled
DEBUG - 2019-12-02 13:54:48 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2019-12-02 13:54:48 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2019-12-02 13:54:48 --> Google Maps Class Initialized
DEBUG - 2019-12-02 13:54:48 --> Googlemaps class already loaded. Second attempt ignored.
DEBUG - 2019-12-02 13:54:48 --> Total execution time: 0.1530
ERROR - 2019-12-02 13:55:15 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\myci\application\vendor/autoload.php was not found.
DEBUG - 2019-12-02 13:55:15 --> UTF-8 Support Enabled
DEBUG - 2019-12-02 13:55:15 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2019-12-02 13:55:15 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2019-12-02 13:55:15 --> Google Maps Class Initialized
DEBUG - 2019-12-02 13:55:15 --> Googlemaps class already loaded. Second attempt ignored.
DEBUG - 2019-12-02 13:55:15 --> Total execution time: 0.1534
ERROR - 2019-12-02 13:55:53 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\myci\application\vendor/autoload.php was not found.
DEBUG - 2019-12-02 13:55:53 --> UTF-8 Support Enabled
DEBUG - 2019-12-02 13:55:53 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2019-12-02 13:55:53 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2019-12-02 13:55:53 --> Google Maps Class Initialized
DEBUG - 2019-12-02 13:55:54 --> Googlemaps class already loaded. Second attempt ignored.
DEBUG - 2019-12-02 13:55:54 --> Total execution time: 0.1608
ERROR - 2019-12-02 13:58:04 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\myci\application\vendor/autoload.php was not found.
DEBUG - 2019-12-02 13:58:04 --> UTF-8 Support Enabled
DEBUG - 2019-12-02 13:58:04 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2019-12-02 13:58:04 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2019-12-02 13:58:04 --> Google Maps Class Initialized
DEBUG - 2019-12-02 13:58:05 --> Googlemaps class already loaded. Second attempt ignored.
DEBUG - 2019-12-02 13:58:05 --> Total execution time: 0.1460
ERROR - 2019-12-02 13:59:51 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\myci\application\vendor/autoload.php was not found.
DEBUG - 2019-12-02 13:59:51 --> UTF-8 Support Enabled
DEBUG - 2019-12-02 13:59:51 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2019-12-02 13:59:51 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2019-12-02 13:59:51 --> Google Maps Class Initialized
DEBUG - 2019-12-02 13:59:51 --> Googlemaps class already loaded. Second attempt ignored.
DEBUG - 2019-12-02 13:59:51 --> Total execution time: 0.1654
ERROR - 2019-12-02 14:04:25 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\myci\application\vendor/autoload.php was not found.
DEBUG - 2019-12-02 14:04:25 --> UTF-8 Support Enabled
DEBUG - 2019-12-02 14:04:25 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2019-12-02 14:04:25 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2019-12-02 14:04:25 --> Google Maps Class Initialized
DEBUG - 2019-12-02 14:04:26 --> Googlemaps class already loaded. Second attempt ignored.
DEBUG - 2019-12-02 14:04:26 --> Total execution time: 0.1791
ERROR - 2019-12-02 14:04:48 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\myci\application\vendor/autoload.php was not found.
DEBUG - 2019-12-02 14:04:48 --> UTF-8 Support Enabled
DEBUG - 2019-12-02 14:04:48 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2019-12-02 14:04:48 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2019-12-02 14:04:48 --> Google Maps Class Initialized
DEBUG - 2019-12-02 14:04:49 --> Googlemaps class already loaded. Second attempt ignored.
DEBUG - 2019-12-02 14:04:49 --> Total execution time: 0.1515
ERROR - 2019-12-02 14:15:58 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\myci\application\vendor/autoload.php was not found.
DEBUG - 2019-12-02 14:15:58 --> UTF-8 Support Enabled
DEBUG - 2019-12-02 14:15:58 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2019-12-02 14:15:58 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2019-12-02 14:15:58 --> Google Maps Class Initialized
ERROR - 2019-12-02 14:15:58 --> Severity: Notice --> Undefined variable: get_all_cpcl C:\xampp\htdocs\myci\application\views\back\dashboard\record.php 237
ERROR - 2019-12-02 14:15:58 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\myci\application\views\back\dashboard\record.php 237
DEBUG - 2019-12-02 14:15:58 --> Total execution time: 0.1927
ERROR - 2019-12-02 14:16:27 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\myci\application\vendor/autoload.php was not found.
DEBUG - 2019-12-02 14:16:27 --> UTF-8 Support Enabled
DEBUG - 2019-12-02 14:16:27 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2019-12-02 14:16:27 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2019-12-02 14:16:27 --> Google Maps Class Initialized
DEBUG - 2019-12-02 14:16:27 --> Total execution time: 0.1599
ERROR - 2019-12-02 14:21:08 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\myci\application\vendor/autoload.php was not found.
DEBUG - 2019-12-02 14:21:08 --> UTF-8 Support Enabled
DEBUG - 2019-12-02 14:21:08 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2019-12-02 14:21:08 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2019-12-02 14:21:08 --> Google Maps Class Initialized
ERROR - 2019-12-02 14:21:08 --> Severity: Notice --> Undefined variable: data C:\xampp\htdocs\myci\application\views\back\dashboard\body.php 60
ERROR - 2019-12-02 14:21:08 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\myci\application\views\back\dashboard\body.php 60
ERROR - 2019-12-02 14:21:08 --> Severity: Notice --> Undefined variable: data C:\xampp\htdocs\myci\application\views\back\dashboard\body.php 63
ERROR - 2019-12-02 14:21:08 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\myci\application\views\back\dashboard\body.php 63
DEBUG - 2019-12-02 14:21:08 --> Total execution time: 0.2476
ERROR - 2019-12-02 14:21:16 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\myci\application\vendor/autoload.php was not found.
DEBUG - 2019-12-02 14:21:16 --> UTF-8 Support Enabled
DEBUG - 2019-12-02 14:21:16 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2019-12-02 14:21:16 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2019-12-02 14:21:16 --> Google Maps Class Initialized
ERROR - 2019-12-02 14:21:16 --> Severity: Notice --> Undefined variable: data C:\xampp\htdocs\myci\application\views\back\dashboard\body.php 60
ERROR - 2019-12-02 14:21:16 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\myci\application\views\back\dashboard\body.php 60
ERROR - 2019-12-02 14:21:16 --> Severity: Notice --> Undefined variable: data C:\xampp\htdocs\myci\application\views\back\dashboard\body.php 63
ERROR - 2019-12-02 14:21:16 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\myci\application\views\back\dashboard\body.php 63
DEBUG - 2019-12-02 14:21:16 --> Total execution time: 0.2135
ERROR - 2019-12-02 14:25:11 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\myci\application\vendor/autoload.php was not found.
DEBUG - 2019-12-02 14:25:11 --> UTF-8 Support Enabled
DEBUG - 2019-12-02 14:25:11 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2019-12-02 14:25:11 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2019-12-02 14:25:11 --> Google Maps Class Initialized
DEBUG - 2019-12-02 14:25:11 --> Total execution time: 0.1847
ERROR - 2019-12-02 14:25:19 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\myci\application\vendor/autoload.php was not found.
DEBUG - 2019-12-02 14:25:19 --> UTF-8 Support Enabled
DEBUG - 2019-12-02 14:25:19 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2019-12-02 14:25:19 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2019-12-02 14:25:19 --> Google Maps Class Initialized
ERROR - 2019-12-02 14:25:19 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\myci\application\vendor/autoload.php was not found.
DEBUG - 2019-12-02 14:25:19 --> UTF-8 Support Enabled
DEBUG - 2019-12-02 14:25:19 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2019-12-02 14:25:19 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2019-12-02 14:25:19 --> Google Maps Class Initialized
DEBUG - 2019-12-02 14:25:20 --> Total execution time: 0.1115
ERROR - 2019-12-02 14:25:20 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\myci\application\vendor/autoload.php was not found.
DEBUG - 2019-12-02 14:25:20 --> UTF-8 Support Enabled
DEBUG - 2019-12-02 14:25:20 --> Global POST, GET and COOKIE data sanitized
ERROR - 2019-12-02 14:25:20 --> 404 Page Not Found: Demo_files/images
ERROR - 2019-12-02 14:25:23 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\myci\application\vendor/autoload.php was not found.
DEBUG - 2019-12-02 14:25:23 --> UTF-8 Support Enabled
DEBUG - 2019-12-02 14:25:23 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2019-12-02 14:25:23 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2019-12-02 14:25:23 --> Google Maps Class Initialized
DEBUG - 2019-12-02 14:25:23 --> Total execution time: 0.1438
ERROR - 2019-12-02 14:25:24 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\myci\application\vendor/autoload.php was not found.
DEBUG - 2019-12-02 14:25:24 --> UTF-8 Support Enabled
DEBUG - 2019-12-02 14:25:24 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2019-12-02 14:25:24 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2019-12-02 14:25:24 --> Google Maps Class Initialized
ERROR - 2019-12-02 14:25:24 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\myci\application\vendor/autoload.php was not found.
DEBUG - 2019-12-02 14:25:24 --> UTF-8 Support Enabled
DEBUG - 2019-12-02 14:25:24 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2019-12-02 14:25:24 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2019-12-02 14:25:24 --> Google Maps Class Initialized
DEBUG - 2019-12-02 14:25:25 --> Total execution time: 0.1522
ERROR - 2019-12-02 14:29:26 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\myci\application\vendor/autoload.php was not found.
DEBUG - 2019-12-02 14:29:26 --> UTF-8 Support Enabled
DEBUG - 2019-12-02 14:29:26 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2019-12-02 14:29:26 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2019-12-02 14:29:26 --> Google Maps Class Initialized
DEBUG - 2019-12-02 14:29:26 --> Total execution time: 0.1760
ERROR - 2019-12-02 14:29:29 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\myci\application\vendor/autoload.php was not found.
DEBUG - 2019-12-02 14:29:29 --> UTF-8 Support Enabled
DEBUG - 2019-12-02 14:29:29 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2019-12-02 14:29:29 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2019-12-02 14:29:29 --> Google Maps Class Initialized
DEBUG - 2019-12-02 14:29:29 --> Total execution time: 0.1819
ERROR - 2019-12-02 14:30:54 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\myci\application\vendor/autoload.php was not found.
DEBUG - 2019-12-02 14:30:54 --> UTF-8 Support Enabled
DEBUG - 2019-12-02 14:30:54 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2019-12-02 14:30:54 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2019-12-02 14:30:54 --> Google Maps Class Initialized
DEBUG - 2019-12-02 14:30:54 --> Total execution time: 0.1857
ERROR - 2019-12-02 14:31:46 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\myci\application\vendor/autoload.php was not found.
DEBUG - 2019-12-02 14:31:46 --> UTF-8 Support Enabled
DEBUG - 2019-12-02 14:31:46 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2019-12-02 14:31:46 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2019-12-02 14:31:46 --> Google Maps Class Initialized
DEBUG - 2019-12-02 14:31:46 --> Total execution time: 0.1608
ERROR - 2019-12-02 14:31:52 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\myci\application\vendor/autoload.php was not found.
DEBUG - 2019-12-02 14:31:52 --> UTF-8 Support Enabled
DEBUG - 2019-12-02 14:31:52 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2019-12-02 14:31:52 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2019-12-02 14:31:52 --> Google Maps Class Initialized
DEBUG - 2019-12-02 14:31:52 --> Total execution time: 0.1499
ERROR - 2019-12-02 14:32:50 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\myci\application\vendor/autoload.php was not found.
DEBUG - 2019-12-02 14:32:50 --> UTF-8 Support Enabled
DEBUG - 2019-12-02 14:32:50 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2019-12-02 14:32:50 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2019-12-02 14:32:50 --> Google Maps Class Initialized
DEBUG - 2019-12-02 14:32:50 --> Total execution time: 0.1617
ERROR - 2019-12-02 14:32:54 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\myci\application\vendor/autoload.php was not found.
DEBUG - 2019-12-02 14:32:54 --> UTF-8 Support Enabled
DEBUG - 2019-12-02 14:32:54 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2019-12-02 14:32:54 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2019-12-02 14:32:54 --> Google Maps Class Initialized
DEBUG - 2019-12-02 14:32:54 --> Total execution time: 0.1528
ERROR - 2019-12-02 14:35:04 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\myci\application\vendor/autoload.php was not found.
DEBUG - 2019-12-02 14:35:04 --> UTF-8 Support Enabled
DEBUG - 2019-12-02 14:35:04 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2019-12-02 14:35:04 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2019-12-02 14:35:04 --> Google Maps Class Initialized
DEBUG - 2019-12-02 14:35:04 --> Total execution time: 0.1906
ERROR - 2019-12-02 14:35:07 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\myci\application\vendor/autoload.php was not found.
DEBUG - 2019-12-02 14:35:07 --> UTF-8 Support Enabled
DEBUG - 2019-12-02 14:35:07 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2019-12-02 14:35:07 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2019-12-02 14:35:07 --> Google Maps Class Initialized
DEBUG - 2019-12-02 14:35:07 --> Total execution time: 0.1647
ERROR - 2019-12-02 14:36:20 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\myci\application\vendor/autoload.php was not found.
DEBUG - 2019-12-02 14:36:20 --> UTF-8 Support Enabled
DEBUG - 2019-12-02 14:36:20 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2019-12-02 14:36:20 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2019-12-02 14:36:21 --> Google Maps Class Initialized
ERROR - 2019-12-02 14:36:21 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\myci\application\vendor/autoload.php was not found.
DEBUG - 2019-12-02 14:36:21 --> UTF-8 Support Enabled
DEBUG - 2019-12-02 14:36:21 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2019-12-02 14:36:21 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2019-12-02 14:36:21 --> Google Maps Class Initialized
DEBUG - 2019-12-02 14:36:21 --> Total execution time: 0.1136
ERROR - 2019-12-02 14:36:21 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\myci\application\vendor/autoload.php was not found.
DEBUG - 2019-12-02 14:36:21 --> UTF-8 Support Enabled
DEBUG - 2019-12-02 14:36:21 --> Global POST, GET and COOKIE data sanitized
ERROR - 2019-12-02 14:36:21 --> 404 Page Not Found: Demo_files/images
ERROR - 2019-12-02 14:36:58 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\myci\application\vendor/autoload.php was not found.
DEBUG - 2019-12-02 14:36:58 --> UTF-8 Support Enabled
DEBUG - 2019-12-02 14:36:58 --> No URI present. Default controller set.
DEBUG - 2019-12-02 14:36:58 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2019-12-02 14:36:58 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2019-12-02 14:36:58 --> Google Maps Class Initialized
DEBUG - 2019-12-02 14:36:58 --> Total execution time: 0.1705
ERROR - 2019-12-02 14:36:59 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\myci\application\vendor/autoload.php was not found.
DEBUG - 2019-12-02 14:36:59 --> UTF-8 Support Enabled
DEBUG - 2019-12-02 14:36:59 --> Global POST, GET and COOKIE data sanitized
ERROR - 2019-12-02 14:36:59 --> 404 Page Not Found: Demo_files/images
ERROR - 2019-12-02 14:37:03 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\myci\application\vendor/autoload.php was not found.
DEBUG - 2019-12-02 14:37:03 --> UTF-8 Support Enabled
DEBUG - 2019-12-02 14:37:03 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2019-12-02 14:37:03 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2019-12-02 14:37:03 --> Google Maps Class Initialized
DEBUG - 2019-12-02 14:37:03 --> Total execution time: 0.1629
ERROR - 2019-12-02 14:37:04 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\myci\application\vendor/autoload.php was not found.
DEBUG - 2019-12-02 14:37:04 --> UTF-8 Support Enabled
DEBUG - 2019-12-02 14:37:04 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2019-12-02 14:37:04 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2019-12-02 14:37:05 --> Google Maps Class Initialized
ERROR - 2019-12-02 14:37:05 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\myci\application\vendor/autoload.php was not found.
DEBUG - 2019-12-02 14:37:05 --> UTF-8 Support Enabled
DEBUG - 2019-12-02 14:37:05 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2019-12-02 14:37:05 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2019-12-02 14:37:05 --> Google Maps Class Initialized
DEBUG - 2019-12-02 14:37:05 --> Total execution time: 0.4444
ERROR - 2019-12-02 14:42:02 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\myci\application\vendor/autoload.php was not found.
DEBUG - 2019-12-02 14:42:02 --> UTF-8 Support Enabled
DEBUG - 2019-12-02 14:42:02 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2019-12-02 14:42:02 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2019-12-02 14:42:02 --> Google Maps Class Initialized
DEBUG - 2019-12-02 14:42:03 --> Total execution time: 0.3050
ERROR - 2019-12-02 14:45:56 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\myci\application\vendor/autoload.php was not found.
DEBUG - 2019-12-02 14:45:56 --> UTF-8 Support Enabled
DEBUG - 2019-12-02 14:45:56 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2019-12-02 14:45:56 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2019-12-02 14:45:56 --> Google Maps Class Initialized
DEBUG - 2019-12-02 14:45:56 --> Total execution time: 0.2045
ERROR - 2019-12-02 14:45:58 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\myci\application\vendor/autoload.php was not found.
DEBUG - 2019-12-02 14:45:58 --> UTF-8 Support Enabled
DEBUG - 2019-12-02 14:45:58 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2019-12-02 14:45:58 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2019-12-02 14:45:58 --> Google Maps Class Initialized
DEBUG - 2019-12-02 14:45:59 --> Total execution time: 0.2071
ERROR - 2019-12-02 14:51:54 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\myci\application\vendor/autoload.php was not found.
DEBUG - 2019-12-02 14:51:54 --> UTF-8 Support Enabled
DEBUG - 2019-12-02 14:51:54 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2019-12-02 14:51:54 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2019-12-02 14:51:54 --> Google Maps Class Initialized
DEBUG - 2019-12-02 14:51:55 --> Total execution time: 0.1665
ERROR - 2019-12-02 14:51:58 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\myci\application\vendor/autoload.php was not found.
DEBUG - 2019-12-02 14:51:58 --> UTF-8 Support Enabled
DEBUG - 2019-12-02 14:51:58 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2019-12-02 14:51:58 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2019-12-02 14:51:58 --> Google Maps Class Initialized
DEBUG - 2019-12-02 14:51:58 --> Total execution time: 0.1601
ERROR - 2019-12-02 14:52:30 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\myci\application\vendor/autoload.php was not found.
DEBUG - 2019-12-02 14:52:30 --> UTF-8 Support Enabled
DEBUG - 2019-12-02 14:52:30 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2019-12-02 14:52:30 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2019-12-02 14:52:30 --> Google Maps Class Initialized
DEBUG - 2019-12-02 14:52:30 --> Total execution time: 0.1533
ERROR - 2019-12-02 14:53:19 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\myci\application\vendor/autoload.php was not found.
DEBUG - 2019-12-02 14:53:19 --> UTF-8 Support Enabled
DEBUG - 2019-12-02 14:53:19 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2019-12-02 14:53:19 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2019-12-02 14:53:19 --> Google Maps Class Initialized
ERROR - 2019-12-02 14:53:19 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\myci\application\vendor/autoload.php was not found.
DEBUG - 2019-12-02 14:53:19 --> UTF-8 Support Enabled
DEBUG - 2019-12-02 14:53:19 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2019-12-02 14:53:19 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2019-12-02 14:53:19 --> Google Maps Class Initialized
DEBUG - 2019-12-02 14:53:19 --> Total execution time: 0.1223
ERROR - 2019-12-02 14:53:19 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\myci\application\vendor/autoload.php was not found.
DEBUG - 2019-12-02 14:53:19 --> UTF-8 Support Enabled
DEBUG - 2019-12-02 14:53:19 --> Global POST, GET and COOKIE data sanitized
ERROR - 2019-12-02 14:53:19 --> 404 Page Not Found: Demo_files/images
ERROR - 2019-12-02 14:53:22 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\myci\application\vendor/autoload.php was not found.
DEBUG - 2019-12-02 14:53:22 --> UTF-8 Support Enabled
DEBUG - 2019-12-02 14:53:22 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2019-12-02 14:53:22 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2019-12-02 14:53:22 --> Google Maps Class Initialized
DEBUG - 2019-12-02 14:53:22 --> Total execution time: 0.1305
ERROR - 2019-12-02 14:53:23 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\myci\application\vendor/autoload.php was not found.
DEBUG - 2019-12-02 14:53:23 --> UTF-8 Support Enabled
DEBUG - 2019-12-02 14:53:23 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2019-12-02 14:53:23 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2019-12-02 14:53:23 --> Google Maps Class Initialized
ERROR - 2019-12-02 14:53:23 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\myci\application\vendor/autoload.php was not found.
DEBUG - 2019-12-02 14:53:23 --> UTF-8 Support Enabled
DEBUG - 2019-12-02 14:53:23 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2019-12-02 14:53:23 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2019-12-02 14:53:23 --> Google Maps Class Initialized
DEBUG - 2019-12-02 14:53:24 --> Total execution time: 0.1847
ERROR - 2019-12-02 14:59:17 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\myci\application\vendor/autoload.php was not found.
DEBUG - 2019-12-02 14:59:17 --> UTF-8 Support Enabled
DEBUG - 2019-12-02 14:59:17 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2019-12-02 14:59:17 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2019-12-02 14:59:17 --> Google Maps Class Initialized
DEBUG - 2019-12-02 14:59:17 --> Total execution time: 0.1850
ERROR - 2019-12-02 14:59:19 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\myci\application\vendor/autoload.php was not found.
DEBUG - 2019-12-02 14:59:19 --> UTF-8 Support Enabled
DEBUG - 2019-12-02 14:59:19 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2019-12-02 14:59:19 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2019-12-02 14:59:19 --> Google Maps Class Initialized
DEBUG - 2019-12-02 14:59:19 --> Total execution time: 0.1978
ERROR - 2019-12-02 15:03:57 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\myci\application\vendor/autoload.php was not found.
DEBUG - 2019-12-02 15:03:57 --> UTF-8 Support Enabled
DEBUG - 2019-12-02 15:03:57 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2019-12-02 15:03:57 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2019-12-02 15:03:57 --> Google Maps Class Initialized
DEBUG - 2019-12-02 15:03:57 --> Total execution time: 0.1829
ERROR - 2019-12-02 15:03:59 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\myci\application\vendor/autoload.php was not found.
DEBUG - 2019-12-02 15:03:59 --> UTF-8 Support Enabled
DEBUG - 2019-12-02 15:03:59 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2019-12-02 15:03:59 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2019-12-02 15:03:59 --> Google Maps Class Initialized
DEBUG - 2019-12-02 15:03:59 --> Total execution time: 0.2224
ERROR - 2019-12-02 15:05:30 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\myci\application\vendor/autoload.php was not found.
DEBUG - 2019-12-02 15:05:30 --> UTF-8 Support Enabled
DEBUG - 2019-12-02 15:05:30 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2019-12-02 15:05:30 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2019-12-02 15:05:30 --> Google Maps Class Initialized
DEBUG - 2019-12-02 15:05:30 --> Total execution time: 0.1817
ERROR - 2019-12-02 15:05:31 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\myci\application\vendor/autoload.php was not found.
DEBUG - 2019-12-02 15:05:31 --> UTF-8 Support Enabled
DEBUG - 2019-12-02 15:05:31 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2019-12-02 15:05:31 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2019-12-02 15:05:31 --> Google Maps Class Initialized
DEBUG - 2019-12-02 15:05:32 --> Total execution time: 0.1615
ERROR - 2019-12-02 15:08:06 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\myci\application\vendor/autoload.php was not found.
DEBUG - 2019-12-02 15:08:07 --> UTF-8 Support Enabled
DEBUG - 2019-12-02 15:08:07 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2019-12-02 15:08:07 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2019-12-02 15:08:07 --> Google Maps Class Initialized
DEBUG - 2019-12-02 15:08:07 --> Total execution time: 0.1605
ERROR - 2019-12-02 15:08:08 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\myci\application\vendor/autoload.php was not found.
DEBUG - 2019-12-02 15:08:08 --> UTF-8 Support Enabled
DEBUG - 2019-12-02 15:08:08 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2019-12-02 15:08:08 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2019-12-02 15:08:08 --> Google Maps Class Initialized
DEBUG - 2019-12-02 15:08:09 --> Total execution time: 0.1663
ERROR - 2019-12-02 15:11:56 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\myci\application\vendor/autoload.php was not found.
DEBUG - 2019-12-02 15:11:56 --> UTF-8 Support Enabled
DEBUG - 2019-12-02 15:11:56 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2019-12-02 15:11:57 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2019-12-02 15:11:57 --> Google Maps Class Initialized
DEBUG - 2019-12-02 15:11:57 --> Total execution time: 0.1748
ERROR - 2019-12-02 15:12:00 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\myci\application\vendor/autoload.php was not found.
DEBUG - 2019-12-02 15:12:00 --> UTF-8 Support Enabled
DEBUG - 2019-12-02 15:12:00 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2019-12-02 15:12:00 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2019-12-02 15:12:00 --> Google Maps Class Initialized
DEBUG - 2019-12-02 15:12:00 --> Total execution time: 0.1988
ERROR - 2019-12-02 15:12:51 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\myci\application\vendor/autoload.php was not found.
DEBUG - 2019-12-02 15:12:51 --> UTF-8 Support Enabled
DEBUG - 2019-12-02 15:12:51 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2019-12-02 15:12:51 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2019-12-02 15:12:51 --> Google Maps Class Initialized
DEBUG - 2019-12-02 15:12:52 --> Total execution time: 0.1590
ERROR - 2019-12-02 15:12:53 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\myci\application\vendor/autoload.php was not found.
DEBUG - 2019-12-02 15:12:53 --> UTF-8 Support Enabled
DEBUG - 2019-12-02 15:12:53 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2019-12-02 15:12:53 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2019-12-02 15:12:53 --> Google Maps Class Initialized
DEBUG - 2019-12-02 15:12:53 --> Total execution time: 0.1690
ERROR - 2019-12-02 15:12:55 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\myci\application\vendor/autoload.php was not found.
DEBUG - 2019-12-02 15:12:55 --> UTF-8 Support Enabled
DEBUG - 2019-12-02 15:12:55 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2019-12-02 15:12:55 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2019-12-02 15:12:55 --> Google Maps Class Initialized
DEBUG - 2019-12-02 15:12:55 --> Total execution time: 0.1747
ERROR - 2019-12-02 15:13:30 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\myci\application\vendor/autoload.php was not found.
DEBUG - 2019-12-02 15:13:30 --> UTF-8 Support Enabled
DEBUG - 2019-12-02 15:13:30 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2019-12-02 15:13:30 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2019-12-02 15:13:30 --> Google Maps Class Initialized
DEBUG - 2019-12-02 15:13:31 --> Total execution time: 0.1818
ERROR - 2019-12-02 15:13:32 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\myci\application\vendor/autoload.php was not found.
DEBUG - 2019-12-02 15:13:32 --> UTF-8 Support Enabled
DEBUG - 2019-12-02 15:13:32 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2019-12-02 15:13:32 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2019-12-02 15:13:32 --> Google Maps Class Initialized
DEBUG - 2019-12-02 15:13:32 --> Total execution time: 0.1758
ERROR - 2019-12-02 15:15:13 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\myci\application\vendor/autoload.php was not found.
DEBUG - 2019-12-02 15:15:13 --> UTF-8 Support Enabled
DEBUG - 2019-12-02 15:15:14 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2019-12-02 15:15:14 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2019-12-02 15:15:14 --> Google Maps Class Initialized
DEBUG - 2019-12-02 15:15:14 --> Total execution time: 0.1576
ERROR - 2019-12-02 15:16:35 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\myci\application\vendor/autoload.php was not found.
DEBUG - 2019-12-02 15:16:35 --> UTF-8 Support Enabled
DEBUG - 2019-12-02 15:16:35 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2019-12-02 15:16:35 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2019-12-02 15:16:35 --> Google Maps Class Initialized
DEBUG - 2019-12-02 15:16:35 --> Total execution time: 0.1693
ERROR - 2019-12-02 15:19:16 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\myci\application\vendor/autoload.php was not found.
DEBUG - 2019-12-02 15:19:16 --> UTF-8 Support Enabled
DEBUG - 2019-12-02 15:19:16 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2019-12-02 15:19:16 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2019-12-02 15:19:16 --> Google Maps Class Initialized
DEBUG - 2019-12-02 15:19:16 --> Total execution time: 0.1778
ERROR - 2019-12-02 15:19:17 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\myci\application\vendor/autoload.php was not found.
DEBUG - 2019-12-02 15:19:17 --> UTF-8 Support Enabled
DEBUG - 2019-12-02 15:19:17 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2019-12-02 15:19:17 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2019-12-02 15:19:17 --> Google Maps Class Initialized
DEBUG - 2019-12-02 15:19:18 --> Total execution time: 0.1716
ERROR - 2019-12-02 15:21:33 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\myci\application\vendor/autoload.php was not found.
DEBUG - 2019-12-02 15:21:33 --> UTF-8 Support Enabled
DEBUG - 2019-12-02 15:21:33 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2019-12-02 15:21:33 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2019-12-02 15:21:33 --> Google Maps Class Initialized
DEBUG - 2019-12-02 15:21:33 --> Total execution time: 0.1663
ERROR - 2019-12-02 15:21:55 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\myci\application\vendor/autoload.php was not found.
DEBUG - 2019-12-02 15:21:55 --> UTF-8 Support Enabled
DEBUG - 2019-12-02 15:21:56 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2019-12-02 15:21:56 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2019-12-02 15:21:56 --> Google Maps Class Initialized
DEBUG - 2019-12-02 15:21:56 --> Total execution time: 0.1559
ERROR - 2019-12-02 22:45:11 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\myci\application\vendor/autoload.php was not found.
DEBUG - 2019-12-02 22:45:12 --> UTF-8 Support Enabled
DEBUG - 2019-12-02 22:45:12 --> No URI present. Default controller set.
DEBUG - 2019-12-02 22:45:12 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2019-12-02 22:45:13 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2019-12-02 22:45:13 --> Google Maps Class Initialized
DEBUG - 2019-12-02 22:45:14 --> Total execution time: 3.2205
ERROR - 2019-12-02 22:45:16 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\myci\application\vendor/autoload.php was not found.
DEBUG - 2019-12-02 22:45:16 --> UTF-8 Support Enabled
DEBUG - 2019-12-02 22:45:16 --> Global POST, GET and COOKIE data sanitized
ERROR - 2019-12-02 22:45:17 --> 404 Page Not Found: Demo_files/images
ERROR - 2019-12-02 22:45:20 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\myci\application\vendor/autoload.php was not found.
DEBUG - 2019-12-02 22:45:20 --> UTF-8 Support Enabled
DEBUG - 2019-12-02 22:45:20 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2019-12-02 22:45:20 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2019-12-02 22:45:20 --> Google Maps Class Initialized
DEBUG - 2019-12-02 22:45:21 --> Total execution time: 1.3366
ERROR - 2019-12-02 22:45:23 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\myci\application\vendor/autoload.php was not found.
DEBUG - 2019-12-02 22:45:23 --> UTF-8 Support Enabled
DEBUG - 2019-12-02 22:45:23 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2019-12-02 22:45:23 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2019-12-02 22:45:23 --> Google Maps Class Initialized
ERROR - 2019-12-02 22:45:23 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\myci\application\vendor/autoload.php was not found.
DEBUG - 2019-12-02 22:45:23 --> UTF-8 Support Enabled
DEBUG - 2019-12-02 22:45:23 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2019-12-02 22:45:23 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2019-12-02 22:45:23 --> Google Maps Class Initialized
DEBUG - 2019-12-02 22:45:24 --> Total execution time: 1.0945
ERROR - 2019-12-02 22:46:51 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\myci\application\vendor/autoload.php was not found.
DEBUG - 2019-12-02 22:46:51 --> UTF-8 Support Enabled
DEBUG - 2019-12-02 22:46:51 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2019-12-02 22:46:51 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2019-12-02 22:46:51 --> Google Maps Class Initialized
DEBUG - 2019-12-02 22:46:52 --> Total execution time: 0.1614
ERROR - 2019-12-02 22:49:09 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\myci\application\vendor/autoload.php was not found.
DEBUG - 2019-12-02 22:49:09 --> UTF-8 Support Enabled
DEBUG - 2019-12-02 22:49:10 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2019-12-02 22:49:10 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2019-12-02 22:49:10 --> Google Maps Class Initialized
DEBUG - 2019-12-02 22:49:10 --> Total execution time: 0.1378
ERROR - 2019-12-02 22:49:12 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\myci\application\vendor/autoload.php was not found.
DEBUG - 2019-12-02 22:49:12 --> UTF-8 Support Enabled
DEBUG - 2019-12-02 22:49:12 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2019-12-02 22:49:12 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2019-12-02 22:49:12 --> Google Maps Class Initialized
DEBUG - 2019-12-02 22:49:12 --> Total execution time: 0.1344
ERROR - 2019-12-02 22:59:14 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\myci\application\vendor/autoload.php was not found.
DEBUG - 2019-12-02 22:59:14 --> UTF-8 Support Enabled
DEBUG - 2019-12-02 22:59:14 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2019-12-02 22:59:14 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2019-12-02 22:59:14 --> Google Maps Class Initialized
ERROR - 2019-12-02 22:59:14 --> Severity: Notice --> Undefined variable: markers C:\xampp\htdocs\myci\application\views\back\dashboard\map_marker.php 58
ERROR - 2019-12-02 22:59:14 --> Severity: Notice --> Undefined variable: infowindow C:\xampp\htdocs\myci\application\views\back\dashboard\map_marker.php 61
ERROR - 2019-12-02 22:59:14 --> Severity: Notice --> Undefined variable: markers C:\xampp\htdocs\myci\application\views\back\dashboard\body.php 62
ERROR - 2019-12-02 22:59:14 --> Severity: Notice --> Undefined variable: infowindow C:\xampp\htdocs\myci\application\views\back\dashboard\body.php 65
DEBUG - 2019-12-02 22:59:14 --> Total execution time: 0.2644
ERROR - 2019-12-02 23:01:00 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\myci\application\vendor/autoload.php was not found.
DEBUG - 2019-12-02 23:01:00 --> UTF-8 Support Enabled
DEBUG - 2019-12-02 23:01:00 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2019-12-02 23:01:00 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2019-12-02 23:01:00 --> Google Maps Class Initialized
DEBUG - 2019-12-02 23:01:00 --> Total execution time: 0.1385
ERROR - 2019-12-02 23:01:03 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\myci\application\vendor/autoload.php was not found.
DEBUG - 2019-12-02 23:01:03 --> UTF-8 Support Enabled
DEBUG - 2019-12-02 23:01:03 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2019-12-02 23:01:03 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2019-12-02 23:01:03 --> Google Maps Class Initialized
DEBUG - 2019-12-02 23:01:03 --> Total execution time: 0.1333
ERROR - 2019-12-02 23:01:04 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\myci\application\vendor/autoload.php was not found.
DEBUG - 2019-12-02 23:01:04 --> UTF-8 Support Enabled
DEBUG - 2019-12-02 23:01:04 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2019-12-02 23:01:04 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2019-12-02 23:01:04 --> Google Maps Class Initialized
DEBUG - 2019-12-02 23:01:04 --> Total execution time: 0.1327
ERROR - 2019-12-02 23:01:27 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\myci\application\vendor/autoload.php was not found.
DEBUG - 2019-12-02 23:01:27 --> UTF-8 Support Enabled
DEBUG - 2019-12-02 23:01:27 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2019-12-02 23:01:27 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2019-12-02 23:01:27 --> Google Maps Class Initialized
ERROR - 2019-12-02 23:01:27 --> Severity: Notice --> Undefined variable: markers C:\xampp\htdocs\myci\application\views\back\dashboard\map_marker.php 58
ERROR - 2019-12-02 23:01:27 --> Severity: Notice --> Undefined variable: infowindow C:\xampp\htdocs\myci\application\views\back\dashboard\map_marker.php 61
ERROR - 2019-12-02 23:01:27 --> Severity: Notice --> Undefined variable: markers C:\xampp\htdocs\myci\application\views\back\dashboard\body.php 62
ERROR - 2019-12-02 23:01:27 --> Severity: Notice --> Undefined variable: infowindow C:\xampp\htdocs\myci\application\views\back\dashboard\body.php 65
DEBUG - 2019-12-02 23:01:27 --> Total execution time: 0.2231
ERROR - 2019-12-02 23:02:24 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\myci\application\vendor/autoload.php was not found.
DEBUG - 2019-12-02 23:02:24 --> UTF-8 Support Enabled
DEBUG - 2019-12-02 23:02:24 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2019-12-02 23:02:24 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2019-12-02 23:02:24 --> Google Maps Class Initialized
ERROR - 2019-12-02 23:02:24 --> Severity: Notice --> Undefined variable: markers C:\xampp\htdocs\myci\application\views\back\dashboard\map_marker.php 59
ERROR - 2019-12-02 23:02:24 --> Severity: Notice --> Undefined variable: infowindow C:\xampp\htdocs\myci\application\views\back\dashboard\map_marker.php 62
ERROR - 2019-12-02 23:02:24 --> Severity: Notice --> Undefined variable: markers C:\xampp\htdocs\myci\application\views\back\dashboard\body.php 62
ERROR - 2019-12-02 23:02:24 --> Severity: Notice --> Undefined variable: infowindow C:\xampp\htdocs\myci\application\views\back\dashboard\body.php 65
DEBUG - 2019-12-02 23:02:24 --> Total execution time: 0.2006
ERROR - 2019-12-02 23:31:44 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\myci\application\vendor/autoload.php was not found.
DEBUG - 2019-12-02 23:31:44 --> UTF-8 Support Enabled
DEBUG - 2019-12-02 23:31:44 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2019-12-02 23:31:44 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2019-12-02 23:31:44 --> Google Maps Class Initialized
ERROR - 2019-12-02 23:31:44 --> Severity: Notice --> Undefined variable: map C:\xampp\htdocs\myci\application\views\back\template\meta.php 31
ERROR - 2019-12-02 23:31:44 --> Severity: Notice --> Undefined variable: map C:\xampp\htdocs\myci\application\views\back\dashboard\record.php 196
DEBUG - 2019-12-02 23:31:44 --> Total execution time: 0.1971
ERROR - 2019-12-02 23:33:06 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\myci\application\vendor/autoload.php was not found.
DEBUG - 2019-12-02 23:33:06 --> UTF-8 Support Enabled
DEBUG - 2019-12-02 23:33:06 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2019-12-02 23:33:06 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2019-12-02 23:33:06 --> Google Maps Class Initialized
ERROR - 2019-12-02 23:33:06 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\myci\application\vendor/autoload.php was not found.
DEBUG - 2019-12-02 23:33:06 --> UTF-8 Support Enabled
DEBUG - 2019-12-02 23:33:06 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2019-12-02 23:33:06 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2019-12-02 23:33:06 --> Google Maps Class Initialized
DEBUG - 2019-12-02 23:33:06 --> Total execution time: 0.1079
ERROR - 2019-12-02 23:33:06 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\myci\application\vendor/autoload.php was not found.
DEBUG - 2019-12-02 23:33:06 --> UTF-8 Support Enabled
DEBUG - 2019-12-02 23:33:06 --> Global POST, GET and COOKIE data sanitized
ERROR - 2019-12-02 23:33:06 --> 404 Page Not Found: Demo_files/images
ERROR - 2019-12-02 23:33:09 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\myci\application\vendor/autoload.php was not found.
DEBUG - 2019-12-02 23:33:09 --> UTF-8 Support Enabled
DEBUG - 2019-12-02 23:33:09 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2019-12-02 23:33:09 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2019-12-02 23:33:09 --> Google Maps Class Initialized
DEBUG - 2019-12-02 23:33:09 --> Total execution time: 0.1314
ERROR - 2019-12-02 23:33:10 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\myci\application\vendor/autoload.php was not found.
DEBUG - 2019-12-02 23:33:10 --> UTF-8 Support Enabled
DEBUG - 2019-12-02 23:33:10 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2019-12-02 23:33:10 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2019-12-02 23:33:10 --> Google Maps Class Initialized
ERROR - 2019-12-02 23:33:10 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\myci\application\vendor/autoload.php was not found.
DEBUG - 2019-12-02 23:33:10 --> UTF-8 Support Enabled
DEBUG - 2019-12-02 23:33:10 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2019-12-02 23:33:10 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2019-12-02 23:33:10 --> Google Maps Class Initialized
ERROR - 2019-12-02 23:33:10 --> Severity: Notice --> Undefined variable: map C:\xampp\htdocs\myci\application\views\back\template\meta.php 31
ERROR - 2019-12-02 23:33:10 --> Severity: Notice --> Undefined variable: map C:\xampp\htdocs\myci\application\views\back\dashboard\record.php 196
DEBUG - 2019-12-02 23:33:10 --> Total execution time: 0.1669
ERROR - 2019-12-02 23:33:27 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\myci\application\vendor/autoload.php was not found.
DEBUG - 2019-12-02 23:33:27 --> UTF-8 Support Enabled
DEBUG - 2019-12-02 23:33:27 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2019-12-02 23:33:27 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2019-12-02 23:33:27 --> Google Maps Class Initialized
ERROR - 2019-12-02 23:33:27 --> Severity: Notice --> Undefined variable: map C:\xampp\htdocs\myci\application\views\back\template\meta.php 31
ERROR - 2019-12-02 23:33:27 --> Severity: Notice --> Undefined variable: map C:\xampp\htdocs\myci\application\views\back\dashboard\record.php 196
DEBUG - 2019-12-02 23:33:27 --> Total execution time: 0.2157
ERROR - 2019-12-02 23:36:52 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\myci\application\vendor/autoload.php was not found.
DEBUG - 2019-12-02 23:36:52 --> UTF-8 Support Enabled
DEBUG - 2019-12-02 23:36:52 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2019-12-02 23:36:52 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2019-12-02 23:36:52 --> Google Maps Class Initialized
DEBUG - 2019-12-02 23:36:52 --> Googlemaps class already loaded. Second attempt ignored.
DEBUG - 2019-12-02 23:36:52 --> Googlemaps class already loaded. Second attempt ignored.
ERROR - 2019-12-02 23:36:52 --> Severity: Notice --> Undefined variable: page_title C:\xampp\htdocs\myci\application\views\back\template\meta.php 4
ERROR - 2019-12-02 23:36:52 --> Severity: Notice --> Undefined variable: company_data C:\xampp\htdocs\myci\application\views\back\template\meta.php 4
ERROR - 2019-12-02 23:36:52 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\myci\application\views\back\template\meta.php 4
ERROR - 2019-12-02 23:36:52 --> Severity: Notice --> Undefined variable: company_data C:\xampp\htdocs\myci\application\views\back\template\meta.php 28
ERROR - 2019-12-02 23:36:52 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\myci\application\views\back\template\meta.php 28
ERROR - 2019-12-02 23:36:52 --> Severity: Notice --> Undefined variable: skins_template C:\xampp\htdocs\myci\application\views\back\template\meta.php 34
ERROR - 2019-12-02 23:36:52 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\myci\application\views\back\template\meta.php 34
ERROR - 2019-12-02 23:36:52 --> Severity: Notice --> Undefined variable: layout_template C:\xampp\htdocs\myci\application\views\back\template\meta.php 34
ERROR - 2019-12-02 23:36:52 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\myci\application\views\back\template\meta.php 34
ERROR - 2019-12-02 23:36:52 --> Severity: Notice --> Undefined variable: company_data C:\xampp\htdocs\myci\application\views\back\template\navbar.php 7
ERROR - 2019-12-02 23:36:52 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\myci\application\views\back\template\navbar.php 7
ERROR - 2019-12-02 23:36:52 --> Severity: Notice --> Undefined variable: company_data C:\xampp\htdocs\myci\application\views\back\template\navbar.php 7
ERROR - 2019-12-02 23:36:52 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\myci\application\views\back\template\navbar.php 7
ERROR - 2019-12-02 23:36:52 --> Severity: Notice --> Undefined variable: page_title C:\xampp\htdocs\myci\application\views\back\dashboard\body.php 11
ERROR - 2019-12-02 23:36:52 --> Severity: Notice --> Undefined variable: page_title C:\xampp\htdocs\myci\application\views\back\dashboard\body.php 15
ERROR - 2019-12-02 23:36:52 --> Severity: Notice --> Undefined variable: get_total_menu C:\xampp\htdocs\myci\application\views\back\dashboard\record.php 6
ERROR - 2019-12-02 23:36:52 --> Severity: Notice --> Undefined variable: get_total_submenu C:\xampp\htdocs\myci\application\views\back\dashboard\record.php 16
ERROR - 2019-12-02 23:36:52 --> Severity: Notice --> Undefined variable: get_total_user C:\xampp\htdocs\myci\application\views\back\dashboard\record.php 26
ERROR - 2019-12-02 23:36:52 --> Severity: Notice --> Undefined variable: get_total_usertype C:\xampp\htdocs\myci\application\views\back\dashboard\record.php 36
ERROR - 2019-12-02 23:36:52 --> Severity: Notice --> Undefined variable: get_all_cpcl C:\xampp\htdocs\myci\application\views\back\dashboard\record.php 236
ERROR - 2019-12-02 23:36:52 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\myci\application\views\back\dashboard\record.php 236
DEBUG - 2019-12-02 23:36:52 --> Total execution time: 0.5967
ERROR - 2019-12-02 23:37:34 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\myci\application\vendor/autoload.php was not found.
DEBUG - 2019-12-02 23:37:34 --> UTF-8 Support Enabled
DEBUG - 2019-12-02 23:37:34 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2019-12-02 23:37:34 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2019-12-02 23:37:35 --> Google Maps Class Initialized
DEBUG - 2019-12-02 23:37:35 --> Googlemaps class already loaded. Second attempt ignored.
ERROR - 2019-12-02 23:37:35 --> Severity: Notice --> Undefined variable: page_title C:\xampp\htdocs\myci\application\views\back\template\meta.php 4
ERROR - 2019-12-02 23:37:35 --> Severity: Notice --> Undefined variable: company_data C:\xampp\htdocs\myci\application\views\back\template\meta.php 4
ERROR - 2019-12-02 23:37:35 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\myci\application\views\back\template\meta.php 4
ERROR - 2019-12-02 23:37:35 --> Severity: Notice --> Undefined variable: company_data C:\xampp\htdocs\myci\application\views\back\template\meta.php 28
ERROR - 2019-12-02 23:37:35 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\myci\application\views\back\template\meta.php 28
ERROR - 2019-12-02 23:37:35 --> Severity: Notice --> Undefined variable: skins_template C:\xampp\htdocs\myci\application\views\back\template\meta.php 34
ERROR - 2019-12-02 23:37:35 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\myci\application\views\back\template\meta.php 34
ERROR - 2019-12-02 23:37:35 --> Severity: Notice --> Undefined variable: layout_template C:\xampp\htdocs\myci\application\views\back\template\meta.php 34
ERROR - 2019-12-02 23:37:35 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\myci\application\views\back\template\meta.php 34
ERROR - 2019-12-02 23:37:35 --> Severity: Notice --> Undefined variable: company_data C:\xampp\htdocs\myci\application\views\back\template\navbar.php 7
ERROR - 2019-12-02 23:37:35 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\myci\application\views\back\template\navbar.php 7
ERROR - 2019-12-02 23:37:35 --> Severity: Notice --> Undefined variable: company_data C:\xampp\htdocs\myci\application\views\back\template\navbar.php 7
ERROR - 2019-12-02 23:37:35 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\myci\application\views\back\template\navbar.php 7
ERROR - 2019-12-02 23:37:35 --> Severity: Notice --> Undefined variable: page_title C:\xampp\htdocs\myci\application\views\back\dashboard\body.php 11
ERROR - 2019-12-02 23:37:35 --> Severity: Notice --> Undefined variable: page_title C:\xampp\htdocs\myci\application\views\back\dashboard\body.php 15
ERROR - 2019-12-02 23:37:35 --> Severity: Notice --> Undefined variable: get_total_menu C:\xampp\htdocs\myci\application\views\back\dashboard\record.php 6
ERROR - 2019-12-02 23:37:35 --> Severity: Notice --> Undefined variable: get_total_submenu C:\xampp\htdocs\myci\application\views\back\dashboard\record.php 16
ERROR - 2019-12-02 23:37:35 --> Severity: Notice --> Undefined variable: get_total_user C:\xampp\htdocs\myci\application\views\back\dashboard\record.php 26
ERROR - 2019-12-02 23:37:35 --> Severity: Notice --> Undefined variable: get_total_usertype C:\xampp\htdocs\myci\application\views\back\dashboard\record.php 36
ERROR - 2019-12-02 23:37:35 --> Severity: Notice --> Undefined variable: get_all_cpcl C:\xampp\htdocs\myci\application\views\back\dashboard\record.php 236
ERROR - 2019-12-02 23:37:35 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\myci\application\views\back\dashboard\record.php 236
DEBUG - 2019-12-02 23:37:35 --> Total execution time: 0.4879
ERROR - 2019-12-02 23:37:47 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\myci\application\vendor/autoload.php was not found.
DEBUG - 2019-12-02 23:37:47 --> UTF-8 Support Enabled
DEBUG - 2019-12-02 23:37:47 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2019-12-02 23:37:47 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2019-12-02 23:37:47 --> Google Maps Class Initialized
DEBUG - 2019-12-02 23:37:47 --> Googlemaps class already loaded. Second attempt ignored.
DEBUG - 2019-12-02 23:37:47 --> Googlemaps class already loaded. Second attempt ignored.
ERROR - 2019-12-02 23:37:47 --> Severity: Notice --> Undefined variable: page_title C:\xampp\htdocs\myci\application\views\back\template\meta.php 4
ERROR - 2019-12-02 23:37:47 --> Severity: Notice --> Undefined variable: company_data C:\xampp\htdocs\myci\application\views\back\template\meta.php 4
ERROR - 2019-12-02 23:37:47 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\myci\application\views\back\template\meta.php 4
ERROR - 2019-12-02 23:37:47 --> Severity: Notice --> Undefined variable: company_data C:\xampp\htdocs\myci\application\views\back\template\meta.php 28
ERROR - 2019-12-02 23:37:47 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\myci\application\views\back\template\meta.php 28
ERROR - 2019-12-02 23:37:47 --> Severity: Notice --> Undefined variable: skins_template C:\xampp\htdocs\myci\application\views\back\template\meta.php 34
ERROR - 2019-12-02 23:37:47 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\myci\application\views\back\template\meta.php 34
ERROR - 2019-12-02 23:37:47 --> Severity: Notice --> Undefined variable: layout_template C:\xampp\htdocs\myci\application\views\back\template\meta.php 34
ERROR - 2019-12-02 23:37:47 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\myci\application\views\back\template\meta.php 34
ERROR - 2019-12-02 23:37:47 --> Severity: Notice --> Undefined variable: company_data C:\xampp\htdocs\myci\application\views\back\template\navbar.php 7
ERROR - 2019-12-02 23:37:47 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\myci\application\views\back\template\navbar.php 7
ERROR - 2019-12-02 23:37:47 --> Severity: Notice --> Undefined variable: company_data C:\xampp\htdocs\myci\application\views\back\template\navbar.php 7
ERROR - 2019-12-02 23:37:47 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\myci\application\views\back\template\navbar.php 7
ERROR - 2019-12-02 23:37:47 --> Severity: Notice --> Undefined variable: page_title C:\xampp\htdocs\myci\application\views\back\dashboard\body.php 11
ERROR - 2019-12-02 23:37:47 --> Severity: Notice --> Undefined variable: page_title C:\xampp\htdocs\myci\application\views\back\dashboard\body.php 15
ERROR - 2019-12-02 23:37:47 --> Severity: Notice --> Undefined variable: get_total_menu C:\xampp\htdocs\myci\application\views\back\dashboard\record.php 6
ERROR - 2019-12-02 23:37:48 --> Severity: Notice --> Undefined variable: get_total_submenu C:\xampp\htdocs\myci\application\views\back\dashboard\record.php 16
ERROR - 2019-12-02 23:37:48 --> Severity: Notice --> Undefined variable: get_total_user C:\xampp\htdocs\myci\application\views\back\dashboard\record.php 26
ERROR - 2019-12-02 23:37:48 --> Severity: Notice --> Undefined variable: get_total_usertype C:\xampp\htdocs\myci\application\views\back\dashboard\record.php 36
ERROR - 2019-12-02 23:37:48 --> Severity: Notice --> Undefined variable: get_all_cpcl C:\xampp\htdocs\myci\application\views\back\dashboard\record.php 236
ERROR - 2019-12-02 23:37:48 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\myci\application\views\back\dashboard\record.php 236
DEBUG - 2019-12-02 23:37:48 --> Total execution time: 0.5820
ERROR - 2019-12-02 23:38:30 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\myci\application\vendor/autoload.php was not found.
DEBUG - 2019-12-02 23:38:30 --> UTF-8 Support Enabled
DEBUG - 2019-12-02 23:38:30 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2019-12-02 23:38:31 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2019-12-02 23:38:31 --> Google Maps Class Initialized
DEBUG - 2019-12-02 23:38:31 --> Total execution time: 0.1282
ERROR - 2019-12-02 23:38:32 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\myci\application\vendor/autoload.php was not found.
DEBUG - 2019-12-02 23:38:32 --> UTF-8 Support Enabled
DEBUG - 2019-12-02 23:38:32 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2019-12-02 23:38:32 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2019-12-02 23:38:32 --> Google Maps Class Initialized
ERROR - 2019-12-02 23:38:32 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\myci\application\vendor/autoload.php was not found.
DEBUG - 2019-12-02 23:38:32 --> UTF-8 Support Enabled
DEBUG - 2019-12-02 23:38:32 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2019-12-02 23:38:32 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2019-12-02 23:38:32 --> Google Maps Class Initialized
DEBUG - 2019-12-02 23:38:32 --> Googlemaps class already loaded. Second attempt ignored.
DEBUG - 2019-12-02 23:38:32 --> Googlemaps class already loaded. Second attempt ignored.
ERROR - 2019-12-02 23:38:33 --> Severity: Notice --> Undefined variable: page_title C:\xampp\htdocs\myci\application\views\back\template\meta.php 4
ERROR - 2019-12-02 23:38:33 --> Severity: Notice --> Undefined variable: company_data C:\xampp\htdocs\myci\application\views\back\template\meta.php 4
ERROR - 2019-12-02 23:38:33 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\myci\application\views\back\template\meta.php 4
ERROR - 2019-12-02 23:38:33 --> Severity: Notice --> Undefined variable: company_data C:\xampp\htdocs\myci\application\views\back\template\meta.php 28
ERROR - 2019-12-02 23:38:33 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\myci\application\views\back\template\meta.php 28
ERROR - 2019-12-02 23:38:33 --> Severity: Notice --> Undefined variable: skins_template C:\xampp\htdocs\myci\application\views\back\template\meta.php 34
ERROR - 2019-12-02 23:38:33 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\myci\application\views\back\template\meta.php 34
ERROR - 2019-12-02 23:38:33 --> Severity: Notice --> Undefined variable: layout_template C:\xampp\htdocs\myci\application\views\back\template\meta.php 34
ERROR - 2019-12-02 23:38:33 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\myci\application\views\back\template\meta.php 34
ERROR - 2019-12-02 23:38:33 --> Severity: Notice --> Undefined variable: company_data C:\xampp\htdocs\myci\application\views\back\template\navbar.php 7
ERROR - 2019-12-02 23:38:33 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\myci\application\views\back\template\navbar.php 7
ERROR - 2019-12-02 23:38:33 --> Severity: Notice --> Undefined variable: company_data C:\xampp\htdocs\myci\application\views\back\template\navbar.php 7
ERROR - 2019-12-02 23:38:33 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\myci\application\views\back\template\navbar.php 7
ERROR - 2019-12-02 23:38:33 --> Severity: Notice --> Undefined variable: page_title C:\xampp\htdocs\myci\application\views\back\dashboard\body.php 11
ERROR - 2019-12-02 23:38:33 --> Severity: Notice --> Undefined variable: page_title C:\xampp\htdocs\myci\application\views\back\dashboard\body.php 15
ERROR - 2019-12-02 23:38:33 --> Severity: Notice --> Undefined variable: get_total_menu C:\xampp\htdocs\myci\application\views\back\dashboard\record.php 6
ERROR - 2019-12-02 23:38:33 --> Severity: Notice --> Undefined variable: get_total_submenu C:\xampp\htdocs\myci\application\views\back\dashboard\record.php 16
ERROR - 2019-12-02 23:38:33 --> Severity: Notice --> Undefined variable: get_total_user C:\xampp\htdocs\myci\application\views\back\dashboard\record.php 26
ERROR - 2019-12-02 23:38:33 --> Severity: Notice --> Undefined variable: get_total_usertype C:\xampp\htdocs\myci\application\views\back\dashboard\record.php 36
ERROR - 2019-12-02 23:38:33 --> Severity: Notice --> Undefined variable: get_all_cpcl C:\xampp\htdocs\myci\application\views\back\dashboard\record.php 236
ERROR - 2019-12-02 23:38:33 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\myci\application\views\back\dashboard\record.php 236
DEBUG - 2019-12-02 23:38:33 --> Total execution time: 0.5287
ERROR - 2019-12-02 23:40:07 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\myci\application\vendor/autoload.php was not found.
DEBUG - 2019-12-02 23:40:07 --> UTF-8 Support Enabled
DEBUG - 2019-12-02 23:40:08 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2019-12-02 23:40:08 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2019-12-02 23:40:08 --> Google Maps Class Initialized
DEBUG - 2019-12-02 23:40:08 --> Googlemaps class already loaded. Second attempt ignored.
DEBUG - 2019-12-02 23:40:08 --> Googlemaps class already loaded. Second attempt ignored.
ERROR - 2019-12-02 23:40:08 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\myci\application\controllers\Dashboard.php 44
ERROR - 2019-12-02 23:40:08 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\myci\application\controllers\Dashboard.php 44
ERROR - 2019-12-02 23:40:08 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\myci\application\controllers\Dashboard.php 44
ERROR - 2019-12-02 23:40:08 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\myci\application\controllers\Dashboard.php 44
ERROR - 2019-12-02 23:40:08 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\myci\application\controllers\Dashboard.php 44
ERROR - 2019-12-02 23:40:08 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\myci\application\controllers\Dashboard.php 44
ERROR - 2019-12-02 23:40:08 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\myci\application\controllers\Dashboard.php 44
ERROR - 2019-12-02 23:40:08 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\myci\application\controllers\Dashboard.php 44
ERROR - 2019-12-02 23:40:08 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\myci\application\controllers\Dashboard.php 44
ERROR - 2019-12-02 23:40:08 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\myci\application\controllers\Dashboard.php 44
ERROR - 2019-12-02 23:40:08 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\myci\application\controllers\Dashboard.php 44
ERROR - 2019-12-02 23:40:08 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\myci\application\controllers\Dashboard.php 44
ERROR - 2019-12-02 23:40:08 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\myci\application\controllers\Dashboard.php 44
ERROR - 2019-12-02 23:40:08 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\myci\application\controllers\Dashboard.php 44
ERROR - 2019-12-02 23:40:08 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\myci\application\controllers\Dashboard.php 44
ERROR - 2019-12-02 23:40:08 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\myci\application\controllers\Dashboard.php 44
ERROR - 2019-12-02 23:40:08 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\myci\application\controllers\Dashboard.php 44
ERROR - 2019-12-02 23:40:08 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\myci\application\controllers\Dashboard.php 44
ERROR - 2019-12-02 23:40:08 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\myci\application\controllers\Dashboard.php 44
ERROR - 2019-12-02 23:40:08 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\myci\application\controllers\Dashboard.php 44
ERROR - 2019-12-02 23:40:09 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\myci\application\controllers\Dashboard.php 44
ERROR - 2019-12-02 23:40:09 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\myci\application\controllers\Dashboard.php 44
ERROR - 2019-12-02 23:40:09 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\myci\application\controllers\Dashboard.php 44
ERROR - 2019-12-02 23:40:09 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\myci\application\controllers\Dashboard.php 44
ERROR - 2019-12-02 23:40:09 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\myci\application\controllers\Dashboard.php 44
ERROR - 2019-12-02 23:40:09 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\myci\application\controllers\Dashboard.php 44
ERROR - 2019-12-02 23:40:09 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\myci\application\controllers\Dashboard.php 44
ERROR - 2019-12-02 23:40:09 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\myci\application\controllers\Dashboard.php 44
ERROR - 2019-12-02 23:40:09 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\myci\application\controllers\Dashboard.php 44
ERROR - 2019-12-02 23:40:09 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\myci\application\controllers\Dashboard.php 44
ERROR - 2019-12-02 23:40:09 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\myci\application\controllers\Dashboard.php 44
ERROR - 2019-12-02 23:40:09 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\myci\application\controllers\Dashboard.php 44
ERROR - 2019-12-02 23:40:09 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\myci\application\controllers\Dashboard.php 44
ERROR - 2019-12-02 23:40:09 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\myci\application\controllers\Dashboard.php 44
ERROR - 2019-12-02 23:40:09 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\myci\application\controllers\Dashboard.php 44
ERROR - 2019-12-02 23:40:09 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\myci\application\controllers\Dashboard.php 44
ERROR - 2019-12-02 23:40:09 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\myci\application\controllers\Dashboard.php 44
ERROR - 2019-12-02 23:40:09 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\myci\application\controllers\Dashboard.php 44
ERROR - 2019-12-02 23:40:09 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\myci\application\controllers\Dashboard.php 44
ERROR - 2019-12-02 23:40:09 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\myci\application\controllers\Dashboard.php 44
ERROR - 2019-12-02 23:40:09 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\myci\application\controllers\Dashboard.php 44
ERROR - 2019-12-02 23:40:10 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\myci\application\controllers\Dashboard.php 44
ERROR - 2019-12-02 23:40:10 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\myci\application\controllers\Dashboard.php 44
ERROR - 2019-12-02 23:40:10 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\myci\application\controllers\Dashboard.php 44
ERROR - 2019-12-02 23:40:10 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\myci\application\controllers\Dashboard.php 44
ERROR - 2019-12-02 23:40:10 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\myci\application\controllers\Dashboard.php 44
ERROR - 2019-12-02 23:40:10 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\myci\application\controllers\Dashboard.php 44
ERROR - 2019-12-02 23:40:10 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\myci\application\controllers\Dashboard.php 44
ERROR - 2019-12-02 23:40:10 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\myci\application\controllers\Dashboard.php 44
ERROR - 2019-12-02 23:40:10 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\myci\application\controllers\Dashboard.php 44
ERROR - 2019-12-02 23:40:10 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\myci\application\controllers\Dashboard.php 44
ERROR - 2019-12-02 23:40:10 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\myci\application\controllers\Dashboard.php 44
ERROR - 2019-12-02 23:40:10 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\myci\application\controllers\Dashboard.php 44
ERROR - 2019-12-02 23:40:10 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\myci\application\controllers\Dashboard.php 44
ERROR - 2019-12-02 23:40:10 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\myci\application\controllers\Dashboard.php 44
ERROR - 2019-12-02 23:40:10 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\myci\application\controllers\Dashboard.php 44
ERROR - 2019-12-02 23:40:10 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\myci\application\controllers\Dashboard.php 44
ERROR - 2019-12-02 23:40:10 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\myci\application\controllers\Dashboard.php 44
ERROR - 2019-12-02 23:40:10 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\myci\application\controllers\Dashboard.php 44
ERROR - 2019-12-02 23:40:10 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\myci\application\controllers\Dashboard.php 44
ERROR - 2019-12-02 23:40:10 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\myci\application\controllers\Dashboard.php 44
ERROR - 2019-12-02 23:40:10 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\myci\application\controllers\Dashboard.php 44
ERROR - 2019-12-02 23:40:11 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\myci\application\controllers\Dashboard.php 44
ERROR - 2019-12-02 23:40:11 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\myci\application\controllers\Dashboard.php 44
ERROR - 2019-12-02 23:40:11 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\myci\application\controllers\Dashboard.php 44
ERROR - 2019-12-02 23:40:11 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\myci\application\controllers\Dashboard.php 44
DEBUG - 2019-12-02 23:40:11 --> Total execution time: 3.2911
ERROR - 2019-12-02 23:40:41 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\myci\application\vendor/autoload.php was not found.
DEBUG - 2019-12-02 23:40:41 --> UTF-8 Support Enabled
DEBUG - 2019-12-02 23:40:41 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2019-12-02 23:40:41 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2019-12-02 23:40:41 --> Google Maps Class Initialized
DEBUG - 2019-12-02 23:40:41 --> Googlemaps class already loaded. Second attempt ignored.
DEBUG - 2019-12-02 23:40:41 --> Googlemaps class already loaded. Second attempt ignored.
ERROR - 2019-12-02 23:40:41 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\myci\application\controllers\Dashboard.php 44
ERROR - 2019-12-02 23:40:41 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\myci\application\controllers\Dashboard.php 44
ERROR - 2019-12-02 23:40:41 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\myci\application\controllers\Dashboard.php 44
ERROR - 2019-12-02 23:40:41 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\myci\application\controllers\Dashboard.php 44
ERROR - 2019-12-02 23:40:41 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\myci\application\controllers\Dashboard.php 44
ERROR - 2019-12-02 23:40:41 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\myci\application\controllers\Dashboard.php 44
ERROR - 2019-12-02 23:40:41 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\myci\application\controllers\Dashboard.php 44
ERROR - 2019-12-02 23:40:41 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\myci\application\controllers\Dashboard.php 44
ERROR - 2019-12-02 23:40:41 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\myci\application\controllers\Dashboard.php 44
ERROR - 2019-12-02 23:40:41 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\myci\application\controllers\Dashboard.php 44
ERROR - 2019-12-02 23:40:42 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\myci\application\controllers\Dashboard.php 44
ERROR - 2019-12-02 23:40:42 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\myci\application\controllers\Dashboard.php 44
ERROR - 2019-12-02 23:40:42 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\myci\application\controllers\Dashboard.php 44
ERROR - 2019-12-02 23:40:42 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\myci\application\controllers\Dashboard.php 44
ERROR - 2019-12-02 23:40:42 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\myci\application\controllers\Dashboard.php 44
ERROR - 2019-12-02 23:40:42 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\myci\application\controllers\Dashboard.php 44
ERROR - 2019-12-02 23:40:42 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\myci\application\controllers\Dashboard.php 44
ERROR - 2019-12-02 23:40:42 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\myci\application\controllers\Dashboard.php 44
ERROR - 2019-12-02 23:40:42 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\myci\application\controllers\Dashboard.php 44
ERROR - 2019-12-02 23:40:42 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\myci\application\controllers\Dashboard.php 44
ERROR - 2019-12-02 23:40:42 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\myci\application\controllers\Dashboard.php 44
ERROR - 2019-12-02 23:40:42 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\myci\application\controllers\Dashboard.php 44
ERROR - 2019-12-02 23:40:42 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\myci\application\controllers\Dashboard.php 44
ERROR - 2019-12-02 23:40:42 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\myci\application\controllers\Dashboard.php 44
ERROR - 2019-12-02 23:40:42 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\myci\application\controllers\Dashboard.php 44
ERROR - 2019-12-02 23:40:42 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\myci\application\controllers\Dashboard.php 44
ERROR - 2019-12-02 23:40:42 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\myci\application\controllers\Dashboard.php 44
ERROR - 2019-12-02 23:40:42 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\myci\application\controllers\Dashboard.php 44
ERROR - 2019-12-02 23:40:42 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\myci\application\controllers\Dashboard.php 44
ERROR - 2019-12-02 23:40:42 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\myci\application\controllers\Dashboard.php 44
ERROR - 2019-12-02 23:40:43 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\myci\application\controllers\Dashboard.php 44
ERROR - 2019-12-02 23:40:43 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\myci\application\controllers\Dashboard.php 44
ERROR - 2019-12-02 23:40:43 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\myci\application\controllers\Dashboard.php 44
ERROR - 2019-12-02 23:40:43 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\myci\application\controllers\Dashboard.php 44
ERROR - 2019-12-02 23:40:43 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\myci\application\controllers\Dashboard.php 44
ERROR - 2019-12-02 23:40:43 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\myci\application\controllers\Dashboard.php 44
ERROR - 2019-12-02 23:40:43 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\myci\application\controllers\Dashboard.php 44
ERROR - 2019-12-02 23:40:43 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\myci\application\controllers\Dashboard.php 44
ERROR - 2019-12-02 23:40:43 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\myci\application\controllers\Dashboard.php 44
ERROR - 2019-12-02 23:40:43 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\myci\application\controllers\Dashboard.php 44
ERROR - 2019-12-02 23:40:43 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\myci\application\controllers\Dashboard.php 44
ERROR - 2019-12-02 23:40:43 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\myci\application\controllers\Dashboard.php 44
ERROR - 2019-12-02 23:40:43 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\myci\application\controllers\Dashboard.php 44
ERROR - 2019-12-02 23:40:43 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\myci\application\controllers\Dashboard.php 44
ERROR - 2019-12-02 23:40:43 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\myci\application\controllers\Dashboard.php 44
ERROR - 2019-12-02 23:40:43 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\myci\application\controllers\Dashboard.php 44
ERROR - 2019-12-02 23:40:43 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\myci\application\controllers\Dashboard.php 44
ERROR - 2019-12-02 23:40:43 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\myci\application\controllers\Dashboard.php 44
ERROR - 2019-12-02 23:40:43 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\myci\application\controllers\Dashboard.php 44
ERROR - 2019-12-02 23:40:43 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\myci\application\controllers\Dashboard.php 44
ERROR - 2019-12-02 23:40:43 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\myci\application\controllers\Dashboard.php 44
ERROR - 2019-12-02 23:40:43 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\myci\application\controllers\Dashboard.php 44
ERROR - 2019-12-02 23:40:44 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\myci\application\controllers\Dashboard.php 44
ERROR - 2019-12-02 23:40:44 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\myci\application\controllers\Dashboard.php 44
ERROR - 2019-12-02 23:40:44 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\myci\application\controllers\Dashboard.php 44
ERROR - 2019-12-02 23:40:44 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\myci\application\controllers\Dashboard.php 44
ERROR - 2019-12-02 23:40:44 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\myci\application\controllers\Dashboard.php 44
ERROR - 2019-12-02 23:40:44 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\myci\application\controllers\Dashboard.php 44
ERROR - 2019-12-02 23:40:44 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\myci\application\controllers\Dashboard.php 44
ERROR - 2019-12-02 23:40:44 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\myci\application\controllers\Dashboard.php 44
ERROR - 2019-12-02 23:40:44 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\myci\application\controllers\Dashboard.php 44
ERROR - 2019-12-02 23:40:44 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\myci\application\controllers\Dashboard.php 44
ERROR - 2019-12-02 23:40:44 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\myci\application\controllers\Dashboard.php 44
ERROR - 2019-12-02 23:40:44 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\myci\application\controllers\Dashboard.php 44
ERROR - 2019-12-02 23:40:44 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\myci\application\controllers\Dashboard.php 44
ERROR - 2019-12-02 23:40:44 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\myci\application\controllers\Dashboard.php 44
DEBUG - 2019-12-02 23:40:44 --> Total execution time: 3.3540
ERROR - 2019-12-02 23:41:23 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\myci\application\vendor/autoload.php was not found.
DEBUG - 2019-12-02 23:41:23 --> UTF-8 Support Enabled
DEBUG - 2019-12-02 23:41:23 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2019-12-02 23:41:23 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2019-12-02 23:41:23 --> Google Maps Class Initialized
DEBUG - 2019-12-02 23:41:23 --> Googlemaps class already loaded. Second attempt ignored.
DEBUG - 2019-12-02 23:41:23 --> Googlemaps class already loaded. Second attempt ignored.
DEBUG - 2019-12-02 23:41:23 --> Total execution time: 0.2475
ERROR - 2019-12-02 23:52:11 --> $config['composer_autoload'] is set to TRUE but C:\xampp\htdocs\myci\application\vendor/autoload.php was not found.
DEBUG - 2019-12-02 23:52:11 --> UTF-8 Support Enabled
DEBUG - 2019-12-02 23:52:11 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2019-12-02 23:52:11 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2019-12-02 23:52:11 --> Google Maps Class Initialized
DEBUG - 2019-12-02 23:52:11 --> Googlemaps class already loaded. Second attempt ignored.
DEBUG - 2019-12-02 23:52:11 --> Googlemaps class already loaded. Second attempt ignored.
DEBUG - 2019-12-02 23:52:11 --> Total execution time: 0.2519
