<?php
/**
 * @package Associados
 * @version 1.0
 */
/*
Plugin Name: Associados StartupMS
Description: Plugin para cadastro e controle de associados do StartupMS
Author: Saulo Arruda e Marcelo Siqueira
Version: 1.0
Author URI: http://startupms.com.br
*/

global $jal_db_version;
$jal_db_version = "1.0";

function jal_install () {
   global $wpdb;

   $table_name = $wpdb->prefix . "associados_startups"; 

	$sql = "CREATE TABLE $table_name (
  id mediumint(9) NOT NULL AUTO_INCREMENT,
  email tinytext NOT NULL,
  password varchar(32) NOT NULL,
  nome tinytext NOT NULL,
  endereco tinytext NOT NULL,
  cidade tinytext NOT NULL,
  elevator_pitch varchar(140) NOT NULL,
  estagio tinyint NOT NULL,
  segmento varchar(255),
  fundacao date NOT NULL,
  startup_ajuda tinyint NOT NULL,
  url tinytext NOT NULL,
  facebook varchar(150) NOT NULL,
  twitter varchar(40) NOT NULL,
  logomarca tinytext NOT NULL,
  nome_socio1 tinytext NOT NULL,
  telefone_socio1 varchar(20) NOT NULL,
  email_socio1 tinytext NOT NULL,
  cargo_socio1 tinytext NOT NULL,
  formacao_socio1 tinytext NOT NULL,
  nome_socio2 tinytext NOT NULL,
  telefone_socio2 varchar(20),
  email_socio2 tinytext,
  cargo_socio2 tinytext,
  nome_socio3 tinytext NOT NULL,
  formacao_socio3 tinytext,
  telefone_socio3 varchar(20),
  email_socio3 tinytext,
  cargo_socio3 tinytext,
  formacao_socio3 tinytext,
  UNIQUE KEY id (id)
);";

	require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
	dbDelta($sql);
	
	add_option("jal_db_version", $jal_db_version);
}

register_activation_hook(__FILE__,'jal_install');


add_action( 'admin_menu', 'associados_menu' );

function associados_menu() {
	add_menu_page( 'Todos os associados', 'Associados', 'manage_options', 'associados', null);
	add_submenu_page('associados' , 'Startups', 'Startups', 'manage_options', 'startups', 'startups_options');
}

function startups_options() {
	if ( !current_user_can( 'manage_options' ) )  {
		wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
	}
	if ($_POST['id']) {
		// gravar...
	} else {
		$form = ($_GET['startup_id']) ? get_startup($id) : array();
		include('startups_form.php');
	}
}

function save_startups($form)
{
	
}

?>