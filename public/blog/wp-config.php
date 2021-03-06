<?php
/**
 * As configurações básicas do WordPress
 *
 * O script de criação wp-config.php usa esse arquivo durante a instalação.
 * Você não precisa user o site, você pode copiar este arquivo
 * para "wp-config.php" e preencher os valores.
 *
 * Este arquivo contém as seguintes configurações:
 *
 * * Configurações do MySQL
 * * Chaves secretas
 * * Prefixo do banco de dados
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/pt-br:Editando_wp-config.php
 *
 * @package WordPress
 */

// ** Configurações do MySQL - Você pode pegar estas informações
// com o serviço de hospedagem ** //
/** O nome do banco de dados do WordPress */
define('DB_NAME', 'c6_blog');

/** Usuário do banco de dados MySQL */
define('DB_USER', 'c6_blog');

/** Senha do banco de dados MySQL */
define('DB_PASSWORD', 'Ufmg01');

/** Nome do host do MySQL */
define('DB_HOST', 'localhost');

/** Charset do banco de dados a ser usado na criação das tabelas. */
define('DB_CHARSET', 'utf8mb4');

/** O tipo de Collate do banco de dados. Não altere isso se tiver dúvidas. */
define('DB_COLLATE', '');

/**#@+
 * Chaves únicas de autenticação e salts.
 *
 * Altere cada chave para um frase única!
 * Você pode gerá-las
 * usando o {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org
 * secret-key service}
 * Você pode alterá-las a qualquer momento para desvalidar quaisquer
 * cookies existentes. Isto irá forçar todos os
 * usuários a fazerem login novamente.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         ']&#?y|c.Vc+Jppz4~ -0S0Ts]m0CN:5#v,e%LAvR~?WS@d6pvI@VS-@Hs!:Jc$ !');
define('SECURE_AUTH_KEY',  ')kMs^fZmS9O~K-~5G?msEU<M@2-Ni_!6a7V^P6Kk}U]<SAq>c+Z*)r8:lLHRA(DP');
define('LOGGED_IN_KEY',    'F*K`d[&]-+#e2Z7d7#xtQG*`MG=#y/_E_Sa>N}D^$yW{SiiNN$C^%]uJ6qo-eCXX');
define('NONCE_KEY',        'q{@AopPy~irSlv)TeuSUqzGB1TO_111hpT0J1u)jRa9X1pjXCzbSt_d+s4Zd{*Dg');
define('AUTH_SALT',        '*2f^us<}zb<hu5pFBGC%~8im9gDx!Ld%4}KT>XEte<gi,F_EGDYKFPHY<GBvR_Fm');
define('SECURE_AUTH_SALT', 'L+I59Tm+7WHUub}*kzH3I>Z[S~8NYG[z/Z6t/653t^qE|+.NlKP9{;8FewJqf*wO');
define('LOGGED_IN_SALT',   '/2dp&&Z?BeR(d5!n7L#jT~O=FAJ`)7&}Hf]m>zs39@qA{ FB&2#NmsVccc<gg@mV');
define('NONCE_SALT',       'Om?uqvf[|oUOt *}pXV|C~+<b  eeIlni|Rho.SO929T~y1VK()i40^p_r*7D*S`');

/**#@-*/

/**
 * Prefixo da tabela do banco de dados do WordPress.
 *
 * Você pode ter várias instalações em um único banco de dados se você der
 * para cada um um único prefixo. Somente números, letras e sublinhados!
 */
$table_prefix  = 'wp_';

/**
 * Para desenvolvedores: Modo debugging WordPress.
 *
 * Altere isto para true para ativar a exibição de avisos
 * durante o desenvolvimento. É altamente recomendável que os
 * desenvolvedores de plugins e temas usem o WP_DEBUG
 * em seus ambientes de desenvolvimento.
 *
 * Para informações sobre outras constantes que podem ser utilizadas
 * para depuração, visite o Codex.
 *
 * @link https://codex.wordpress.org/pt-br:Depura%C3%A7%C3%A3o_no_WordPress
 */
define('WP_DEBUG', false);

/* Isto é tudo, pode parar de editar! :) */

/** Caminho absoluto para o diretório WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Configura as variáveis e arquivos do WordPress. */
require_once(ABSPATH . 'wp-settings.php');
