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

global $db_version, $table_name;
$db_version = "1.0";

//Função que será executada ao desativar o plugin
function install () {
    global $wpdb;

    $sql = "CREATE TABLE ".$wpdb->prefix . "associados_startups (
        id mediumint(9) NOT NULL AUTO_INCREMENT,
        email tinytext NOT NULL,
        senha varchar(32) NOT NULL,
        nome tinytext NOT NULL,
        endereco tinytext NOT NULL,
        cidade tinytext NOT NULL,
        elevator_pitch varchar(140) NOT NULL,
        estagio tinyint NOT NULL,
        segmento varchar(255),
        fundacao date NOT NULL,
        startup_ajuda tinyint NOT NULL,
        url tinytext NOT NULL,
        facebook varchar(150),
        twitter varchar(40),
        logomarca tinytext,
        nome_socio1 tinytext NOT NULL,
        telefone_socio1 varchar(20) NOT NULL,
        email_socio1 tinytext NOT NULL,
        cargo_socio1 tinytext NOT NULL,
        formacao_socio1 tinytext NOT NULL,
        nome_socio2 tinytext,
        telefone_socio2 varchar(20),
        email_socio2 tinytext,
        cargo_socio2 tinytext,
        formacao_socio2 tinytext,
        nome_socio3 tinytext,
        telefone_socio3 varchar(20),
        email_socio3 tinytext,
        cargo_socio3 tinytext,
        formacao_socio3 tinytext,
        UNIQUE KEY id (id)
    );";

    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
    
    dbDelta($sql);

    add_option("db_version", $db_version);
}

//Função que será executada ao desativar o plugin
function unstall() {
    global $wpdb;

    $sql = "DROP TABLE ".$wpdb->prefix . "associados_startups";

    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
    
    dbDelta($sql);

}

//Chama função de ativação do plugin
register_activation_hook(__FILE__,"install");
 
//Chama função de desativar o plugin
register_deactivation_hook(__FILE__,"unstall");

add_action( 'admin_menu', 'associados_menu' );


function associados_menu() {
	add_menu_page( 'Todos os associados', 'Associados', 'manage_options', 'associados', 'list_startups');
	add_submenu_page('associados' , 'Startups', 'Startups', 'manage_options', 'startups', 'startups_options');
}

function startups_options() {
	if ( !current_user_can( 'manage_options' ) )  {
		wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
	}
	if ($_POST) {
        //echo '<pre>'.print_r($_POST, 1).'</pre>';
        
        // Graver cadastro
        save_startups($_POST);
	} else {
        if (isset($_GET['startup_id']) && $_GET['startup_id']) {
            $form = get_startup($_GET['startup_id']);
        } else {
            $form = array('email' => '', 'nome' => '', 'endereco' => '', 'cidade' => '', 'elevator_pitch' => '', 'estagio' => '', 'segmento' => '', 'fundacao' => new DateTime('2011-08-20'), 'startup_ajuda' => '', 'url' => '', 'facebook' => '', 'twitter' => '', 'logomarca' => '', 'nome_socio1' => '', 'telefone_socio1' => '', 'email_socio1' => '', 'cargo_socio1' => '', 'formacao_socio1' => '', 'nome_socio2' => '', 'telefone_socio2' => '', 'email_socio2' => '', 'cargo_socio2' => '', 'formacao_socio2' => '', 'nome_socio3' => '', 'telefone_socio3' => '', 'email_socio3' => '', '' => '', 'formacao_socio3' => '');
			//$form = array('id' => 1, 'email' => 'contato@starspremium.com.br', 'nome' => 'StarsPremium', 'endereco' => 'Rua Teldo Kasper, 109', 'cidade' => 0, 'elevator_pitch' => 'STARSPREMIUM é uma agência de incentivo e relacionamento, nova e diferente. Jovem, cheia de energia e inovadora.', 'estagio' => 2, 'segmento' => '3,10,Incentivo e fidelização', 'fundacao' => new DateTime('2011-08-20'), 'startup_ajuda' => 2, 'url' => 'http://starspremium.com.br', 'facebook' => '', 'twitter' => 'starspremium', 'logomarca' => '', 'nome_socio1' => 'Saulo Arruda', 'telefone_socio1' => '(67) 9238-4909', 'email_socio1' => 'saulo@starspremium.com.br', 'cargo_socio1' => 'Socio 1', 'formacao_socio1' => 'Melhoria do Processo de Software', 'nome_socio2' => 'Jefferson Moreira', 'telefone_socio2' => '(67) 9257-7444', 'email_socio2' => 'jeffmor@starspremium.com.br', 'cargo_socio2' => 'Socio 2', 'formacao_socio2' => 'Ciência da Computação', 'nome_socio3' => 'Flávio Antunes', 'telefone_socio3' => '(11) 98882-0202', 'email_socio3' => 'flavio@starspremium.com.br', 'cargo_socio3' => 'Socio 3', 'formacao_socio3' => 'Publicidade e Propaganda');
		}

        include('startups_form.php');
	}
}

function get_startup($id) {
    global $wpdb;

    $data = $wpdb->get_row("SELECT * FROM ".$wpdb->prefix . "associados_startups WHERE id = $id", ARRAY_A);
    
    return $data;
}

function valid_startups($form) {

}

function save_startups($form) {
    global $wpdb;

    foreach($form as $campo=>$valor){
        $$campo = $valor;
    }

    // Var para guardar erros
    $errors = false;

    // Validação
    if( !is_email( $email ) ) { $errors .= 'E-mail inválido.'; }
    if( empty($senha) ) { $errors .= 'Senha em branco.'; }
    if( $senha != $senha_comfir ) { $errors .= 'Senha diferentes.'; }

    update_option('startups_errors', $errors);

    // Gravar os valores na tabela
    $nova_startup = array(
        "email" => $email, 
        "senha" => $senha,
        "nome" => $nome,
        "endereco" => $endereco,
        "cidade" => $cidade,
        "elevator_pitch" => $elevator_pitch,
        "estagio" => $estagio,
        "segmento" => '1',
        "fundacao" => $fundacao,
        "startup_ajuda" => $startup_ajuda,
        "url" => $url,
        "facebook" => $facebook,
        "twitter" => $twitter,
        "logomarca" => $logomarca,
        "nome_socio1" => $nome_socio1,
        "telefone_socio1" => $telefone_socio1,
        "email_socio1" => $email_socio1,
        "cargo_socio1" => $cargo_socio1,
        "formacao_socio1" => $formacao_socio1,
        "nome_socio2" => $nome_socio2,
        "telefone_socio2" => $telefone_socio2,
        "email_socio2" => $email_socio2,
        "cargo_socio2" => $cargo_socio2,
        "formacao_socio2" => $formacao_socio2,
        "nome_socio3" => $nome_socio3,
        "telefone_socio3" => $telefone_socio3,
        "email_socio3" => $email_socio3,
        "cargo_socio3" => $cargo_socio3,
        "formacao_socio3" => $formacao_socio3
    );

    // Guardar os valores na tabela
    $wpdb->insert( $wpdb->prefix . "associados_startups", $nova_startup );
    
    //echo "<pre>".print_r($nova, 1).'</pre>';
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



// Esta função lista as Startups cadastradas
function list_startups() {
    global $wpdb;
    
    $rows = $wpdb->get_results( "SELECT * FROM ". $wpdb->prefix . "associados_startups;" );

    include('startups_list.php');
}
?>