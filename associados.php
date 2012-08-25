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
		$form = ($_GET['startup_id']) ? get_startup($id) : 
			array('id' => 1, 'email' => 'contato@starspremium.com.br', 'nome' => 'StarsPremium', 'endereco' => 'Rua Teldo Kasper, 109', 'cidade' => 0, 'elevator_pitch' => 'STARSPREMIUM é uma agência de incentivo e relacionamento, nova e diferente. Jovem, cheia de energia e inovadora.', 'estagio' => 2, 'segmento' => '3,10,Incentivo e fidelização', 'fundacao' => new DateTime('2011-08-20'), 'startup_ajuda' => 2, 'url' => 'http://starspremium.com.br', 'facebook' => '', 'twitter' => 'starspremium', 'logomarca' => '', 'nome_socio1' => 'Saulo Arruda', 'telefone_socio1' => '(67) 9238-4909', 'email_socio1' => 'saulo@starspremium.com.br', 'formacao_socio1' => 'Melhoria do Processo de Software', 'nome_socio2' => 'Jefferson Moreira', 'telefone_socio2' => '(67) 9257-7444', 'email_socio2' => 'jeffmor@starspremium.com.br', 'formacao_socio2' => 'Ciência da Computação', 'nome_socio3' => 'Flávio Antunes', 'telefone_socio3' => '(11) 98882-0202', 'email_socio3' => 'flavio@starspremium.com.br', 'formacao_socio3' => 'Publicidade e Propaganda');
		include('startups_form.php');
	}
}

function save_startups($form)
{
	
}

function get_cidades() {
	return array(
		array(0, 'Campo Grande'),
		array(1, 'Dourados'),
		array(2, 'Três Lagoas')
	);
}

function get_estagios() {
	return array(
		array(0, 'Pré-modelo - ainda estamos tentando encontrar um modelo para ter receita'),
		array(1, 'Pré-receita - já encontramos um modelo e estamos quase tendo receita'),
		array(2, 'Pré-lucro - já temos receita e estamos caminhando para que ela pague toda a nossa operação')
	);
}

function get_segmentos() {
	return array(
		array(0, 'E-commerce'),
		array(1, 'Mobile'),
		array(2, 'Vídeos'),
		array(3, 'Serviços'),
		array(4, 'Web'),
		array(5, 'Crowdsourcing'),
		array(6, 'Games'),
		array(7, 'Cultura'),
		array(8, 'Educação'),
		array(9, 'Saúde'),
		array(10, 'Outro:')
	);
}

function get_startup_ajudas() {
	return array(
		array(0, 'Começar meu negócio (tirar do papel, validar e encontrar sócios/fornecedores)'),
		array(1, 'Apoio na gestão do meu negócio (capacitação, mentoria, consultoria, incubação e aceleração)'),
		array(2, 'Apoio comercial (vendas e divulgação do meu negócio)'),
		array(3, 'Apoio na captação de recursos para o meu negócio (projetos públicos e investidores)'),
		array(4, 'Outro')
		);	
}
?>