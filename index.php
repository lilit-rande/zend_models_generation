<html>
	<title>Model generation</title>
		<style> 
			body {
				color: #333333;
				font-family: "Helvetica Neue",Helvetica,Arial,sans-serif;
				line-height: 20px;				
			}
			#contener {
				width:500px;
				min-height:500px;
 				margin:100px auto 0;
			} 
			.alert {
				background-color: #FCF8E3;
				border: 1px solid #FBEED5;
				border-radius: 4px 4px 4px 4px;
				margin-bottom: 20px;
				padding: 8px 35px 8px 14px;
				text-shadow: 0 1px 0 rgba(255, 255, 255, 0.5);
			}
			.alert-info {
				background-color: #D9EDF7;
				border-color: #BCE8F1;
				color: #3A87AD;
			}
			.alert-error {
				background-color: #F2DEDE;
				border-color: #EED3D7;
				color: #B94A48;
			}
			fieldset {
				background-color: #F5F5F5;
				border: 1px solid #E3E3E3;
				border-radius: 4px 4px 4px 4px;
				box-shadow: 0 1px 1px rgba(0, 0, 0, 0.05) inset;
				margin-bottom: 20px;
				min-height: 20px;
				padding: 19px;
			}
			.control-group {
				margin-left: 80px;
				clear:both;
			}
			.controls {
				float:left;
				margin-left: 10px;
			}
			input[type="text"], input[type="password"] {
				width:200px;
				margin-bottom: 0;
				vertical-align: middle;
				background-color: #FFFFFF;
				border: 1px solid #CCCCCC;
				box-shadow: 0 1px 1px rgba(0, 0, 0, 0.075) inset;
				transition: border 0.2s linear 0s, box-shadow 0.2s linear 0s;
				border-radius: 4px;
				color: #555555;
				display: inline-block;
				font-size: 14px;
				height: 30px;
				line-height: 20px;
				margin-bottom: 10px;
				padding: 6px;
				vertical-align: middle;
			}
			
			input[type="text"]:focus, input[type="password"]:focus {
				border-color: rgba(82, 168, 236, 0.8);
			    box-shadow: 0 1px 1px rgba(0, 0, 0, 0.075) inset, 0 0 8px rgba(82, 168, 236, 0.6);
			    outline: 0 none;
			}
			
			label {
			    padding-top: 5px;
			    text-align: right;				
				display:inline-block;
				width:100px;
				font-size: 14px;
			    font-weight: normal;
			    line-height: 20px;
				margin-bottom: 5px;
				cursor: pointer;
				float: left;
			}
			input[type="submit"]{
				-moz-border-bottom-colors: none;
				-moz-border-left-colors: none;
				-moz-border-right-colors: none;
				-moz-border-top-colors: none;
				background-color: #F5F5F5;
				background-image: linear-gradient(to bottom, #FFFFFF, #E6E6E6);
				background-repeat: repeat-x;
				border-color: rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.1) #B3B3B3;
				border-image: none;
				border-radius: 4px 4px 4px 4px;
				border-style: solid;
				border-width: 1px;
				box-shadow: 0 1px 0 rgba(255, 255, 255, 0.2) inset, 0 1px 2px rgba(0, 0, 0, 0.05);
				color: #333333;
				cursor: pointer;
				display: inline-block;
				font-size: 14px;
				line-height: 20px;
				margin-bottom: 0;
				padding: 4px 12px;
				text-align: center;
				text-shadow: 0 1px 1px rgba(255, 255, 255, 0.75);
				vertical-align: middle;
				
				background-color: #006DCC;
				background-image: linear-gradient(to bottom, #0088CC, #0044CC);
				background-repeat: repeat-x;
				border-color: rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.25);
				color: #FFFFFF;
				text-shadow: 0 -1px 0 rgba(0, 0, 0, 0.25);
			}
		</style>
	<body>
		<div id="contener">
			<div id="message" class="alert alert-info">Please complete the following form with your db connection datas.</div>
			<form action="" method="post">
				<fieldset>
					<div class="control-group">
						<label>Host</label>
						<div class="controls">
							<input type="text" name="host" id="host"   value="<?= isset($_POST['host']) ? $_POST['host'] : '' ?>" />
						</div>
					</div>	
					<div class="control-group">
						<label>Database name</label>
						<div class="controls">
							<input type="text" name="dbname" id="dbname"   value="<?= isset($_POST['dbname']) ? $_POST['dbname'] : '' ?>"  />
						</div>
					</div>	
					<div class="control-group">
						<label>User</label>
						<div class="controls">
							<input type="text" name="user" id="user"  value="<?= isset($_POST['user']) ? $_POST['user'] : '' ?>"  />
						</div>
					</div>		
					<div class="control-group">
						<label>Password</label>
						<div class="controls">
							<input type="password" name="pass" id="pass"  value="<?= isset($_POST['pass']) ? $_POST['pass'] : '' ?>"  />
						</div>			
					</div>				
					<div class="control-group">
					<label></label>
						<div class="controls">
							<input type="submit" name="submit" id="submit" />
						</div>
					</div>			
				</fieldset>
			</form>
		</div>
	</body>
</html>


<?php

function appendJSMessage($message) {
	echo '<script language="JavaScript" type="text/javascript">
	document.getElementById("message").innerHTML += \'' . str_replace("'", "\'", $message) . ' <br />\';
	</script>';
}
function generateJSMessage($message) {
	echo '<script language="JavaScript" type="text/javascript">
	document.getElementById("message").innerHTML = \'' . str_replace("'", "\'", $message) . ' <br />\';
	</script>';
}

function mkDirectory($dirname) {
	try {
		mkdir($dirname);
	} catch (Exception $e) {
		generateJSMessage($e->message);
	}
}
function normalize_name($column_name) {
	$exclude = array('_' => ' ', '-'=>' ', '.'=>' ');
	$tmp = ucwords(strtr($column_name, $exclude));

	return str_replace(' ', '',$tmp);
}
// convert mysql types into php
function get_type_php ($needle) {	
	$array_convert_types = array (
		'int' => array ('TINYINT', 'SMALLINT', 'MEDIUMINT', 'INT', 'BIGINT', 'BIT',  'SERIAL'),
		'decimal' => array('DECIMAL', 'FLOAT', 'DOUBLE', 'REAL'),
		'bool' => array('BOOLEAN'),
		'date' => array('DATE', 'DATETIME', 'TIMESTAMP', 'TIME', 'YEAR'),
		'string' => array('CHAR', 'VARCHAR', 'TINYTEXT', 'TEXT', 'MEDIUMTEXT', 'LONGTEXT', 'BINARY', 'VARBINARY', 'TINYBLOB', 'MEDIUMBLOB',	'BLOB',	'LONGBLOB',	'ENUM',	'SET'),
		'spatial' => array('GEOMETRY', 'POINT', 'LINESTRING', 'POLYGON', 'MULTIPOINT', 'MULTILINESTRING', 'MULTIPOLYGON', 'GEOMETRYCOLLECTION')
	);
	$key = '';
	foreach ($array_convert_types as $k => $v) {
		if (in_array($needle, $v)) {
			$key = $k;
			return $key;
		}
	}
}
function generate_doc_comment($desc_array, $message = "") {
	$comment_string = "\t" . ' /**' . PHP_EOL;
	
	if (strlen($message) > 0) { $comment_string .= "\t" . $message . PHP_EOL; }

	foreach ($desc_array as $param => $var) {
		$comment_string .= "\t" . ' * @' .$param . ' ' . $var . PHP_EOL;
	}
	$comment_string .= "\t" . ' */' . PHP_EOL;
	return $comment_string;
}

/*
$matches_pk = array();

$str = "CREATE TABLE `project_needs_skill` (
`id_project_needs_skill` int(11) NOT NULL,
`project_id_project` int(11) NOT NULL,
`skill_id_skill` int(11) NOT NULL,
`date_insert` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
`date_update` datetime NOT NULL,
PRIMARY KEY (`id_project_needs_skill`),
KEY `fk_project_needs_skill_project1_idx` (`project_id_project`),
KEY `fk_project_needs_skill_skill1_idx` (`skill_id_skill`),
KEY `date_insert` (`date_insert`),
KEY `date_update` (`date_update`),
CONSTRAINT `fk_project_needs_skill_project1` FOREIGN KEY (`project_id_project`) REFERENCES `project` (`id_project`) ON DELETE NO ACTION ON UPDATE NO ACTION,
CONSTRAINT `fk_project_needs_skill_skill1` FOREIGN KEY (`skill_id_skill`) REFERENCES `skill` (`id_skill`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8
)";

$pat = "/CONSTRAINT\s?\`([^\`]*)\`\s?FOREIGN KEY\s?\(\`([^\`]*)\`\)\s?REFERENCES\s?\`([^\`]*)\` \(\`([^\`]*)\`\)/";

preg_match_all($pat, $str, $matches_pk);

echo '<pre>';
print_r($matches_pk);
echo '</pre>';

if ( count($matches_pk[0]) > 0 ) {

}


	 					if (count($matches) > 0) {
	 						$table_desc[$table_name]['foreign_key'] = array();
	 						
		 					$foreign_key_name = $matches[1];
		 					$foreign_key = $matches[2];
		 					$referenced_table_name = $matches[3];
		 					$referenced_column = $matches[4];
		 					
		 					$references[$table_name]['foreign_key_name'] = $foreign_key_name;
		 					$references[$table_name]['foreign_key_value'] = $foreign_key;
		 					$references[$table_name]['referenced_table_name'] = $referenced_table_name;
		 					$references[$table_name]['referenced_column'] = $referenced_column;
 */

if (isset($_POST['submit'])) {

	$message = "";
	foreach ($_POST as $post_key => $post_value) {
		
		if ( $post_value == '' ) {
			$message .= 'Please enter your ' . $post_key . '.<br />';
		}
		generateJSMessage($message);
	}	

	extract($_POST, EXTR_SKIP);

	$dbpath = $dbname;

	define('DS', DIRECTORY_SEPARATOR);
	define('PS', PATH_SEPARATOR);
	define('ROOT_PATH', dirname(dirname(__FILE__)));
	define('MODEL_GEN', dirname(__FILE__) . DS . 'models');
	define('DB_PATH', MODEL_GEN . DS . $dbpath);
	define('MODEL_PATH', DB_PATH . DS . 'models');
	define('DBTABLE_PATH', MODEL_PATH . DS . 'DbTable');
	define('MAPPER_PATH', MODEL_PATH . DS . 'mappers');

	set_include_path(
	ROOT_PATH . PS .
	MODEL_PATH . PS .
	get_include_path()
	);

	if (!file_exists(MODEL_GEN )) { mkDirectory(MODEL_GEN); }
	if (!file_exists(DB_PATH )) { mkDirectory(DB_PATH); }
	if (!file_exists(MODEL_PATH )) { mkDirectory(MODEL_PATH); }
	if (!file_exists(DBTABLE_PATH)) { mkDirectory(DBTABLE_PATH); }
	if (!file_exists(MAPPER_PATH)) { mkDirectory(MAPPER_PATH); }

	try
	{
		// bdd connection params
		$dsn = 'mysql:host=' . $host . ';dbname=' . $dbname;
		$pdo = new PDO( $dsn, $user, $pass );
		
		if ($pdo) {
			generateJSMessage('Connected');
		}

		$tables = $pdo->query("show tables");
		$table_names = array();	
		$table_desc = array();
		
		$matches = array();

		$references = array();
		$dependences = array();
		$table_desc = array();

		// generate table names array
		foreach ($tables as $table) {
			$name = $table[0];
			array_push($table_names, $name);
		}
		
		// get each db table description
		foreach ($table_names as $table_name) {

			$table_desc[$table_name]['primary'] = array();

			$table_desc[$table_name]['columns'] = array();
			// $table_desc[$table_name]['phpType'] = array();

			$desc  = $pdo->query("DESCRIBE $table_name");
			
			$create_table_pdo = $pdo->query("SHOW CREATE TABLE $table_name");
			$create_table_result = $create_table_pdo->fetchAll(PDO::FETCH_ASSOC);
			$create_table_result = $create_table_result[0];	// array_values ???
		
			foreach ($desc as $k => $v) {

				// echo '<pre>';
				// echo 'table_name = ' . $table_name . '<br>';
				// print_r($v);
				// echo '</pre>';
			//	echo $v['Field'] .'<br>';
			
				//	gestion des commentaires				
				$type_str = (strstr($v['Type'], '(', true)) ? strstr($v['Type'], '(', true) : $v['Type'];
				$phpType =  get_type_php(strtoupper($type_str));	

				if ($v['Key'] == 'PRI' ) {
					$primary_key = $v['Field'];
			//		array_push($table_desc[$table_name]['primary'], lcfirst(normalize_name($primary_key)));

					array_push($table_desc[$table_name]['primary'], array('name' => lcfirst(normalize_name($primary_key)), 'type' => $phpType ));
					array_push($table_desc[$table_name]['columns'], array('name' => lcfirst(normalize_name($primary_key)), 'type' => $phpType, 'role' => 'primary' ));
				}
				else if ($v['Key'] == 'MUL') {

					$references[$table_name] = array();
					$table_desc[$table_name]['references'] = array();
					// $foreign_key = $v['Field'];
					// $foreign_keys_list .= strlen($foreign_keys_list) > 0 ? ", '$foreign_key'" : "'$foreign_key'" ;
				
					if($create_table_result['Table'] == $table_name) {					
	 					$subject = $create_table_result['Create Table']; 
	 			
	 					// foreign key names 
	 					$pattern = "/CONSTRAINT\s?\`([^\`]*)\`\s?FOREIGN KEY\s?\(\`([^\`]*)\`\)\s?REFERENCES\s?\`([^\`]*)\` \(\`([^\`]*)\`\)/";
	 					//CONSTRAINT `fk_member_has_skill_member1` FOREIGN KEY (`id_member`) REFERENCES `member` (`id_member`) ON DELETE NO ACTION ON UPDATE NO ACTION,
	 					
	 					// matches[1] = for_key_name, matches[2] = for_key_column_name, matches[3]=referenced table name, matches[4] = referenced column name
	 					preg_match_all($pattern, $subject, $matches);
	 					
	 					$count = count($matches[0]);
	 					if ($count > 0) {

							$reference_line = array();

	 						for ( $i = 0; $i < $count; $i++ ) {

	 							// table references
	 							$foreign_key_name = $matches[1][$i];
	 							$foreign_key = $matches[2][$i];
	 							$referenced_table_name = $matches[3][$i];
	 							$referenced_column = $matches[4][$i];

	 							$reference_line['foreign_key_name'] = $foreign_key_name;
	 							$reference_line['foreign_key'] = $foreign_key;
	 							$reference_line['referenced_table_name'] = $referenced_table_name;
	 							$reference_line['referenced_column'] = $referenced_column;
	 							$reference_line['referenced_model_dbtable_name'] = "Model_DbTable_" . normalize_name($referenced_table_name);

	 							if (isset($matches[5]) && isset($matches[6])) {
	 								$reference_line['action_type_one'] = $matches[5][$i];	// ON DELETE / ON UPDATE
	 								$reference_line['action_one'] = $matches[6][$i];
	 							}

	 							if (isset($matches[7]) && isset($matches[8])) {
	 								$reference_line['action_type_two'] = $matches[7][$i];	// ON DELETE / ON UPDATE
	 								$reference_line['action_two'] = $matches[8][$i];
	 							}
	 							array_push($references[$table_name], $reference_line);
	 							array_push($table_desc[$table_name]['references'], $reference_line);

	 							// table dependences
		 					//	$dependence_ligne = array();
			 					$dependence_ligne = array('table_name' => $table_name, 'model_dbtable_name' => "Model_DbTable_" . normalize_name($table_name));
			 				//	$dependence_ligne['dependent_model_dbtable_name'] = "Model_DbTable_" . normalize_name($table_name);
			 					
			 					//TODO a supprimer en gardant juste la partie table_desc[ref_tab_name][dependences]
			 					if ( isset($dependences[$referenced_table_name]) ) {
			 						if ( !in_array($dependence_ligne, $dependences[$referenced_table_name])) {
			 							array_push($dependences[$referenced_table_name], $dependence_ligne);
			 						}
			 					} else {
			 						$dependences[$referenced_table_name] = array();
			 					}	

			 					if ( isset($table_desc[$referenced_table_name]['dependences']) ) {
			 						if ( !in_array($dependence_ligne, $table_desc[$referenced_table_name]['dependences'])) {
			 							array_push($table_desc[$referenced_table_name]['dependences'], $dependence_ligne);
			 						}
			 					} else {
			 						$table_desc[$referenced_table_name]['dependences'] = array();
			 					}

			 					// table columns
	 							if (! in_array($referenced_table_name, $table_desc[$table_name]['columns'])) {
		 							array_push($table_desc[$table_name]['columns'], array('name' => $referenced_table_name, 'type' => "Model_" . normalize_name($referenced_table_name), 'role' => 'foreign' ));
		 						}
	 						}
	 					}	//count($matches[0]) > 0
	 						if ( !in_array($v['Field'], $matches[2]) ) {	//le reste des colonnes-index : index, unique etc
	 							array_push($table_desc[$table_name]['columns'], array('name' => lcfirst(normalize_name($v['Field'])), 'type' => $phpType ));
	 						}
					}	// if($create_table_result['Table'] == $table_name)
				}	// $v['Key'] == 'MUL'
				else {
					array_push($table_desc[$table_name]['columns'], array('name' => lcfirst(normalize_name($v['Field'])), 'type' => $phpType ));
				}	
			} 

	 	}	// endof foreach ($table_names as $table_name)	 	 

	 	// models, mappers, dbtables genaration
	 	foreach ($table_names as $table_name) {

	 		// MODELS
			$model_content = "<?php" . PHP_EOL;
			$model_content .= generate_doc_comment(array('category' => 'YOUR CATEGORY HERE', 'package'=>'YOUR PACKAGE NAME HERE', 'subpackage'=>'YOUR SUBPACKAGE NAME HERE', 'desc'=>'YOUR DESCRIPTION HERE', 'author'=>'YOUR NAME HERE', 'copyright'=>'COPYRIGHT', 'version'=>'YOUR APPLICATION VERSION HERE', 'since'=>'YOUR APPLICATION CREATION DATE HERE'));
			$model_content .= "class Model_";
			
	 //		if ($table_name == 'language') print_r($table_desc[$table_name]['dependences']);
	 		$model_content .= normalize_name($table_name) . PHP_EOL . '{';
	 		
	 		// $model_content .= modelGeneration($table_desc[$table_name]['columns']);
	 		foreach ($table_desc[$table_name]['columns'] as $column) {
	 			$column_name = $column['name'];
	 			$column_type = $column['type'];

	 			//model private variables	 			
	 			$model_content .= generate_doc_comment(array('var' => $column_type));
	 			$model_content .= "\t" . 'private $' . $column_name . ';' . PHP_EOL;

	 			// getters
	 			$model_content .= generate_doc_comment(array('return' => 'the $' . $column_name));
	 			$model_content .= "\t" . 'public function get' . ucfirst($column_name) . '()' . PHP_EOL . "\t{" . PHP_EOL;
	 			$model_content .= "\t\treturn $" . "this->" . $column_name . ';' . PHP_EOL;
	 			$model_content .= "\t}" . PHP_EOL;

	 			// setters
	 			$model_content .= generate_doc_comment(array('param' => $column_type . ' ' .$column_name));
	 			$model_content .= "\t" . 'public function set' . ucfirst($column_name) . "($" . $column_name . ")" . PHP_EOL . "\t{" . PHP_EOL;
	 			$model_content .= "\t\t" . '$this->' . $column_name . ' = ' . '$' . $column_name . ';' . PHP_EOL;
	 			$model_content .= "\t}" . PHP_EOL;
	 		}
	 		
	 		$model_content .= "}";

	 		// MAPPERS
			$mapper_content = "<?php" . PHP_EOL . "class Model_Mapper_";
			
			// DBTABLES
		 	$dbtable_doc_comment_params = array('category' => 'YOUR CATEGORY HERE', 'package'=>'YOUR PACKAGE NAME HERE', 'subpackage'=>'YOUR SUBPACKAGE NAME HERE', 'desc'=>'YOUR DESCRIPTION HERE', 'author'=>'YOUR NAME HERE', 'copyright'=>'COPYRIGHT', 'version'=>'YOUR APPLICATION VERSION HERE', 'since'=>'YOUR APPLICATION CREATION DATE HERE');
		 	$dbtable_doc_comment = generate_doc_comment($dbtable_doc_comment_params, "DataTable Gateway");
		 	$dbtable_content = "<?php" . PHP_EOL . $dbtable_doc_comment . "class Model_DbTable_";

		 	$dbtable_content .= normalize_name($table_name) . " extends Zend_Db_Table_Abstract"  . PHP_EOL . "{" . PHP_EOL ;

		 	// the table name / primary key as protected variables
	 		$dbtable_content .= "\tprotected $" . "_name = '" . $table_name . "';" . PHP_EOL;
	 		foreach ($table_desc[$table_name]['columns'] as $column) {
		 		// TODO for views
		 		if (isset($column['role']) && $column['role'] == 'primary') {
		 			$dbtable_content .= "\tprotected $" . "_primary = '" . $column['name'] . "';" . PHP_EOL;
		 		}	
	 		}

	 		// table references
	 		if (isset($table_desc[$table_name]['references']) && count( $table_desc[$table_name]['references'] > 0 )) {

	 			$ref_table_size = 0;
	 			$dbtable_content .= "\tprotected $" . "_referenceMap = array(". PHP_EOL;

	 			foreach ($table_desc[$table_name]['references'] as $ref_key => $ref_value) {

	 				$dbtable_content .= "\t\t'" . $ref_value['foreign_key_name'] . "' => array(" . PHP_EOL; 
	 				$dbtable_content .= "\t\t\t'columns' => array('". $ref_value['foreign_key'] ."')," . PHP_EOL;
	 				$dbtable_content .= "\t\t\t'refTableClass' => '" . $ref_value['referenced_model_dbtable_name'] . "'," . PHP_EOL;
	 				$dbtable_content .= "\t\t\t'refColumns' => array('". $ref_value['referenced_column'] ."')," . PHP_EOL;
	 				
	 				//TODO
	 				if ( isset($action_type_one) ) {
	 					$dbtable_content .= "\t\t\t'" . $ref_value['action_type_one'] . "' => self::" . $ref_value['action_one'] . "," . PHP_EOL;
	 				}

	 				if ( isset($action_type_two) ) {
	 					$dbtable_content .= "\t\t\t'" . $ref_value['action_type_two'] . "' => self::" . $ref_value['action_two'] . "," . PHP_EOL;
	 				}
	 				 				
					$dbtable_content .= "\t\t)," . PHP_EOL;
					
	 			}
	 			
	 			$dbtable_content .= "\t);". PHP_EOL;
	 		}

	 		// table dependences
	 		if ( isset($table_desc[$table_name]['dependences']) && count($table_desc[$table_name]['dependences']) > 0 ) {
	 			$depTables = "";
	 			foreach ($table_desc[$table_name]['dependences'] as $dep_key => $dep_value) {
	 				// concatenate dependent tables names for generate ligne as 
	 				// protected $_dependentTables = array('depTableName1', 'depTableName2', ...);
	 				$depTables .= strlen($depTables) > 0 ? ", '" . $dep_value['model_dbtable_name'] . "'" : "'" . $dep_value['model_dbtable_name'] . "'" ;	
	 			}
	 			$dbtable_content .= "\tprotected $" . "_dependentTables = array(" . $depTables . ");" . PHP_EOL;
	 		}
	 		$dbtable_content .= "}" . PHP_EOL;

			echo $dbtable_content . '<br>';
			
		 	// create files	
		 	$model_creation_success = false;
		 	$mapper_creation_success = false;
		 	$dbtable_creation_success = false;

	 		try {	 
				if ($handle = file_put_contents (MODEL_PATH . DS . ucfirst($table_name) . '.php', $model_content) ) { $model_creation_success = true; }
				// if ($handle = file_put_contents (MAPPER_PATH . DS . ucfirst($table_name) . '.php', $mapper_content) ) { $mapper_creation_success = true; }
				if ($handle = file_put_contents (DBTABLE_PATH . DS . ucfirst($table_name) . '.php', $dbtable_content) ) { $dbtable_creation_success = true; }
			}
	 		catch (Exception $e) {
				generateJSMessage('Erreur de création ou d\'écriture dans le fichier ' . $e->getMessage());
				die ();
	 		}
	 	}

	 	if ($model_creation_success) { appendJSMessage('Models has been successfully created at ' . MODEL_PATH); }
	 	if ($mapper_creation_success) { appendJSMessage('Mappers has been successfully created at ' . MAPPER_PATH); }
	 	if ($dbtable_creation_success) { appendJSMessage('DbTables has been successfully created at ' . DBTABLE_PATH); }
		echo '<pre>';
	
		print_r($table_desc);
		echo '</pre>';


	// 	echo $model_content;
	}
	catch (Exception $e)
	{
		generateJSMessage('Connexion impossible : ' . $e->getMessage());
		die ();
	}
}
/*
Array
(
[Table] => category_language
[Create Table] => CREATE TABLE `category_language` (
`id_category_language` int(11) NOT NULL AUTO_INCREMENT,
`label_category` varchar(255) DEFAULT NULL,
`code_category` varchar(45) NOT NULL,
`code_language` varchar(45) NOT NULL,
PRIMARY KEY (`id_category_language`),
KEY `fk_category_language_category_idx` (`code_category`),
KEY `fk_category_language_language_idx` (`code_language`),
CONSTRAINT `fk_category_language_category` FOREIGN KEY (`code_category`) REFERENCES `category` (`code_category`) ON DELETE NO ACTION ON UPDATE NO ACTION,
CONSTRAINT `fk_category_language_language` FOREIGN KEY (`code_language`) REFERENCES `language` (`code_language`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8
)
Array
(
[Table] => category_language
[Create Table] => CREATE TABLE `category_language` (
`id_category_language` int(11) NOT NULL AUTO_INCREMENT,
`label_category` varchar(255) DEFAULT NULL,
`code_category` varchar(45) NOT NULL,
`code_language` varchar(45) NOT NULL,
PRIMARY KEY (`id_category_language`),
KEY `fk_category_language_category_idx` (`code_category`),
KEY `fk_category_language_language_idx` (`code_language`),
CONSTRAINT `fk_category_language_category` FOREIGN KEY (`code_category`) REFERENCES `category` (`code_category`) ON DELETE NO ACTION ON UPDATE NO ACTION,
CONSTRAINT `fk_category_language_language` FOREIGN KEY (`code_language`) REFERENCES `language` (`code_language`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8
)
Array
(
[Table] => country_lang
[Create Table] => CREATE TABLE `country_lang` (
`id_country_lang` int(11) NOT NULL AUTO_INCREMENT,
`label_country` varchar(255) NOT NULL,
`code_language` varchar(45) NOT NULL,
`country_code_iso` varchar(4) NOT NULL,
PRIMARY KEY (`id_country_lang`),
KEY `fk_country_lang_language_idx` (`code_language`),
KEY `fk_country_lang_country1_idx` (`country_code_iso`),
CONSTRAINT `fk_country_lang_country1` FOREIGN KEY (`country_code_iso`) REFERENCES `country` (`code_iso`) ON DELETE NO ACTION ON UPDATE NO ACTION,
CONSTRAINT `fk_country_lang_language` FOREIGN KEY (`code_language`) REFERENCES `language` (`code_language`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=794 DEFAULT CHARSET=utf8
)
Array
(
[Table] => country_lang
[Create Table] => CREATE TABLE `country_lang` (
`id_country_lang` int(11) NOT NULL AUTO_INCREMENT,
`label_country` varchar(255) NOT NULL,
`code_language` varchar(45) NOT NULL,
`country_code_iso` varchar(4) NOT NULL,
PRIMARY KEY (`id_country_lang`),
KEY `fk_country_lang_language_idx` (`code_language`),
KEY `fk_country_lang_country1_idx` (`country_code_iso`),
CONSTRAINT `fk_country_lang_country1` FOREIGN KEY (`country_code_iso`) REFERENCES `country` (`code_iso`) ON DELETE NO ACTION ON UPDATE NO ACTION,
CONSTRAINT `fk_country_lang_language` FOREIGN KEY (`code_language`) REFERENCES `language` (`code_language`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=794 DEFAULT CHARSET=utf8
)
Array
(
[Table] => dpt
[Create Table] => CREATE TABLE `dpt` (
`num_dpt` varchar(3) NOT NULL,
`label_dpt` varchar(45) NOT NULL,
`num_region` varchar(3) NOT NULL,
PRIMARY KEY (`num_dpt`),
UNIQUE KEY `label_dpt_UNIQUE` (`label_dpt`),
KEY `fk_dpt_region1_idx` (`num_region`),
CONSTRAINT `fk_dpt_region1` FOREIGN KEY (`num_region`) REFERENCES `region` (`num_region`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8
)
Array
(
[Table] => industry_language
[Create Table] => CREATE TABLE `industry_language` (
`id_industry_language` int(11) NOT NULL AUTO_INCREMENT,
`label_industry` varchar(255) DEFAULT NULL,
`code_industry` varchar(45) NOT NULL,
`code_language` varchar(45) NOT NULL,
PRIMARY KEY (`id_industry_language`),
KEY `fk_industry_language_industry1_idx` (`code_industry`),
KEY `fk_industry_language_language1_idx` (`code_language`),
CONSTRAINT `fk_industry_language_industry1` FOREIGN KEY (`code_industry`) REFERENCES `industry` (`code_industry`) ON DELETE NO ACTION ON UPDATE NO ACTION,
CONSTRAINT `fk_industry_language_language1` FOREIGN KEY (`code_language`) REFERENCES `language` (`code_language`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=55 DEFAULT CHARSET=utf8
)
Array
(
[Table] => industry_language
[Create Table] => CREATE TABLE `industry_language` (
`id_industry_language` int(11) NOT NULL AUTO_INCREMENT,
`label_industry` varchar(255) DEFAULT NULL,
`code_industry` varchar(45) NOT NULL,
`code_language` varchar(45) NOT NULL,
PRIMARY KEY (`id_industry_language`),
KEY `fk_industry_language_industry1_idx` (`code_industry`),
KEY `fk_industry_language_language1_idx` (`code_language`),
CONSTRAINT `fk_industry_language_industry1` FOREIGN KEY (`code_industry`) REFERENCES `industry` (`code_industry`) ON DELETE NO ACTION ON UPDATE NO ACTION,
CONSTRAINT `fk_industry_language_language1` FOREIGN KEY (`code_language`) REFERENCES `language` (`code_language`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=55 DEFAULT CHARSET=utf8
)
Array
(
[Table] => member
[Create Table] => CREATE TABLE `member` (
`id_member` int(11) NOT NULL AUTO_INCREMENT,
`civility` enum('Mademoiselle','Madame','Monsieur') NOT NULL,
`firstname` varchar(45) NOT NULL,
`lastname` varchar(45) DEFAULT NULL,
`adr_lg1` varchar(45) NOT NULL,
`adr_lg2` varchar(45) DEFAULT NULL,
`adr_lg3` varchar(45) DEFAULT NULL,
`city` varchar(45) NOT NULL,
`cp` varchar(45) NOT NULL,
`email` varchar(255) NOT NULL,
`date_insert` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
`date_update` datetime NOT NULL,
`id_category` int(11) NOT NULL,
`id_industry` int(11) NOT NULL,
`id_language` int(11) NOT NULL,
`num_region` varchar(3) NOT NULL,
`industry_code_industry` varchar(45) NOT NULL,
`code_language` varchar(45) NOT NULL,
`country_code_iso` varchar(4) NOT NULL,
PRIMARY KEY (`id_member`),
UNIQUE KEY `email_UNIQUE` (`email`),
KEY `firstname` (`firstname`),
KEY `lastname` (`lastname`),
KEY `city` (`city`),
KEY `fk_member_region_idx` (`num_region`),
KEY `date_insert` (`date_insert`),
KEY `date_uptade` (`date_update`),
KEY `fk_member_industry_idx` (`industry_code_industry`),
KEY `fk_member_language_idx` (`code_language`),
KEY `fk_member_country1_idx` (`country_code_iso`),
CONSTRAINT `fk_member_country1` FOREIGN KEY (`country_code_iso`) REFERENCES `country` (`code_iso`) ON DELETE NO ACTION ON UPDATE NO ACTION,
CONSTRAINT `fk_member_industry` FOREIGN KEY (`industry_code_industry`) REFERENCES `industry` (`code_industry`) ON DELETE NO ACTION ON UPDATE NO ACTION,
CONSTRAINT `fk_member_language` FOREIGN KEY (`code_language`) REFERENCES `language` (`code_language`) ON DELETE NO ACTION ON UPDATE NO ACTION,
CONSTRAINT `fk_member_region` FOREIGN KEY (`num_region`) REFERENCES `region` (`num_region`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8
)
Array
(
[Table] => member
[Create Table] => CREATE TABLE `member` (
`id_member` int(11) NOT NULL AUTO_INCREMENT,
`civility` enum('Mademoiselle','Madame','Monsieur') NOT NULL,
`firstname` varchar(45) NOT NULL,
`lastname` varchar(45) DEFAULT NULL,
`adr_lg1` varchar(45) NOT NULL,
`adr_lg2` varchar(45) DEFAULT NULL,
`adr_lg3` varchar(45) DEFAULT NULL,
`city` varchar(45) NOT NULL,
`cp` varchar(45) NOT NULL,
`email` varchar(255) NOT NULL,
`date_insert` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
`date_update` datetime NOT NULL,
`id_category` int(11) NOT NULL,
`id_industry` int(11) NOT NULL,
`id_language` int(11) NOT NULL,
`num_region` varchar(3) NOT NULL,
`industry_code_industry` varchar(45) NOT NULL,
`code_language` varchar(45) NOT NULL,
`country_code_iso` varchar(4) NOT NULL,
PRIMARY KEY (`id_member`),
UNIQUE KEY `email_UNIQUE` (`email`),
KEY `firstname` (`firstname`),
KEY `lastname` (`lastname`),
KEY `city` (`city`),
KEY `fk_member_region_idx` (`num_region`),
KEY `date_insert` (`date_insert`),
KEY `date_uptade` (`date_update`),
KEY `fk_member_industry_idx` (`industry_code_industry`),
KEY `fk_member_language_idx` (`code_language`),
KEY `fk_member_country1_idx` (`country_code_iso`),
CONSTRAINT `fk_member_country1` FOREIGN KEY (`country_code_iso`) REFERENCES `country` (`code_iso`) ON DELETE NO ACTION ON UPDATE NO ACTION,
CONSTRAINT `fk_member_industry` FOREIGN KEY (`industry_code_industry`) REFERENCES `industry` (`code_industry`) ON DELETE NO ACTION ON UPDATE NO ACTION,
CONSTRAINT `fk_member_language` FOREIGN KEY (`code_language`) REFERENCES `language` (`code_language`) ON DELETE NO ACTION ON UPDATE NO ACTION,
CONSTRAINT `fk_member_region` FOREIGN KEY (`num_region`) REFERENCES `region` (`num_region`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8
)
Array
(
[Table] => member
[Create Table] => CREATE TABLE `member` (
`id_member` int(11) NOT NULL AUTO_INCREMENT,
`civility` enum('Mademoiselle','Madame','Monsieur') NOT NULL,
`firstname` varchar(45) NOT NULL,
`lastname` varchar(45) DEFAULT NULL,
`adr_lg1` varchar(45) NOT NULL,
`adr_lg2` varchar(45) DEFAULT NULL,
`adr_lg3` varchar(45) DEFAULT NULL,
`city` varchar(45) NOT NULL,
`cp` varchar(45) NOT NULL,
`email` varchar(255) NOT NULL,
`date_insert` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
`date_update` datetime NOT NULL,
`id_category` int(11) NOT NULL,
`id_industry` int(11) NOT NULL,
`id_language` int(11) NOT NULL,
`num_region` varchar(3) NOT NULL,
`industry_code_industry` varchar(45) NOT NULL,
`code_language` varchar(45) NOT NULL,
`country_code_iso` varchar(4) NOT NULL,
PRIMARY KEY (`id_member`),
UNIQUE KEY `email_UNIQUE` (`email`),
KEY `firstname` (`firstname`),
KEY `lastname` (`lastname`),
KEY `city` (`city`),
KEY `fk_member_region_idx` (`num_region`),
KEY `date_insert` (`date_insert`),
KEY `date_uptade` (`date_update`),
KEY `fk_member_industry_idx` (`industry_code_industry`),
KEY `fk_member_language_idx` (`code_language`),
KEY `fk_member_country1_idx` (`country_code_iso`),
CONSTRAINT `fk_member_country1` FOREIGN KEY (`country_code_iso`) REFERENCES `country` (`code_iso`) ON DELETE NO ACTION ON UPDATE NO ACTION,
CONSTRAINT `fk_member_industry` FOREIGN KEY (`industry_code_industry`) REFERENCES `industry` (`code_industry`) ON DELETE NO ACTION ON UPDATE NO ACTION,
CONSTRAINT `fk_member_language` FOREIGN KEY (`code_language`) REFERENCES `language` (`code_language`) ON DELETE NO ACTION ON UPDATE NO ACTION,
CONSTRAINT `fk_member_region` FOREIGN KEY (`num_region`) REFERENCES `region` (`num_region`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8
)
Array
(
[Table] => member
[Create Table] => CREATE TABLE `member` (
`id_member` int(11) NOT NULL AUTO_INCREMENT,
`civility` enum('Mademoiselle','Madame','Monsieur') NOT NULL,
`firstname` varchar(45) NOT NULL,
`lastname` varchar(45) DEFAULT NULL,
`adr_lg1` varchar(45) NOT NULL,
`adr_lg2` varchar(45) DEFAULT NULL,
`adr_lg3` varchar(45) DEFAULT NULL,
`city` varchar(45) NOT NULL,
`cp` varchar(45) NOT NULL,
`email` varchar(255) NOT NULL,
`date_insert` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
`date_update` datetime NOT NULL,
`id_category` int(11) NOT NULL,
`id_industry` int(11) NOT NULL,
`id_language` int(11) NOT NULL,
`num_region` varchar(3) NOT NULL,
`industry_code_industry` varchar(45) NOT NULL,
`code_language` varchar(45) NOT NULL,
`country_code_iso` varchar(4) NOT NULL,
PRIMARY KEY (`id_member`),
UNIQUE KEY `email_UNIQUE` (`email`),
KEY `firstname` (`firstname`),
KEY `lastname` (`lastname`),
KEY `city` (`city`),
KEY `fk_member_region_idx` (`num_region`),
KEY `date_insert` (`date_insert`),
KEY `date_uptade` (`date_update`),
KEY `fk_member_industry_idx` (`industry_code_industry`),
KEY `fk_member_language_idx` (`code_language`),
KEY `fk_member_country1_idx` (`country_code_iso`),
CONSTRAINT `fk_member_country1` FOREIGN KEY (`country_code_iso`) REFERENCES `country` (`code_iso`) ON DELETE NO ACTION ON UPDATE NO ACTION,
CONSTRAINT `fk_member_industry` FOREIGN KEY (`industry_code_industry`) REFERENCES `industry` (`code_industry`) ON DELETE NO ACTION ON UPDATE NO ACTION,
CONSTRAINT `fk_member_language` FOREIGN KEY (`code_language`) REFERENCES `language` (`code_language`) ON DELETE NO ACTION ON UPDATE NO ACTION,
CONSTRAINT `fk_member_region` FOREIGN KEY (`num_region`) REFERENCES `region` (`num_region`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8
)
Array
(
[Table] => member
[Create Table] => CREATE TABLE `member` (
`id_member` int(11) NOT NULL AUTO_INCREMENT,
`civility` enum('Mademoiselle','Madame','Monsieur') NOT NULL,
`firstname` varchar(45) NOT NULL,
`lastname` varchar(45) DEFAULT NULL,
`adr_lg1` varchar(45) NOT NULL,
`adr_lg2` varchar(45) DEFAULT NULL,
`adr_lg3` varchar(45) DEFAULT NULL,
`city` varchar(45) NOT NULL,
`cp` varchar(45) NOT NULL,
`email` varchar(255) NOT NULL,
`date_insert` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
`date_update` datetime NOT NULL,
`id_category` int(11) NOT NULL,
`id_industry` int(11) NOT NULL,
`id_language` int(11) NOT NULL,
`num_region` varchar(3) NOT NULL,
`industry_code_industry` varchar(45) NOT NULL,
`code_language` varchar(45) NOT NULL,
`country_code_iso` varchar(4) NOT NULL,
PRIMARY KEY (`id_member`),
UNIQUE KEY `email_UNIQUE` (`email`),
KEY `firstname` (`firstname`),
KEY `lastname` (`lastname`),
KEY `city` (`city`),
KEY `fk_member_region_idx` (`num_region`),
KEY `date_insert` (`date_insert`),
KEY `date_uptade` (`date_update`),
KEY `fk_member_industry_idx` (`industry_code_industry`),
KEY `fk_member_language_idx` (`code_language`),
KEY `fk_member_country1_idx` (`country_code_iso`),
CONSTRAINT `fk_member_country1` FOREIGN KEY (`country_code_iso`) REFERENCES `country` (`code_iso`) ON DELETE NO ACTION ON UPDATE NO ACTION,
CONSTRAINT `fk_member_industry` FOREIGN KEY (`industry_code_industry`) REFERENCES `industry` (`code_industry`) ON DELETE NO ACTION ON UPDATE NO ACTION,
CONSTRAINT `fk_member_language` FOREIGN KEY (`code_language`) REFERENCES `language` (`code_language`) ON DELETE NO ACTION ON UPDATE NO ACTION,
CONSTRAINT `fk_member_region` FOREIGN KEY (`num_region`) REFERENCES `region` (`num_region`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8
)
Array
(
[Table] => member
[Create Table] => CREATE TABLE `member` (
`id_member` int(11) NOT NULL AUTO_INCREMENT,
`civility` enum('Mademoiselle','Madame','Monsieur') NOT NULL,
`firstname` varchar(45) NOT NULL,
`lastname` varchar(45) DEFAULT NULL,
`adr_lg1` varchar(45) NOT NULL,
`adr_lg2` varchar(45) DEFAULT NULL,
`adr_lg3` varchar(45) DEFAULT NULL,
`city` varchar(45) NOT NULL,
`cp` varchar(45) NOT NULL,
`email` varchar(255) NOT NULL,
`date_insert` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
`date_update` datetime NOT NULL,
`id_category` int(11) NOT NULL,
`id_industry` int(11) NOT NULL,
`id_language` int(11) NOT NULL,
`num_region` varchar(3) NOT NULL,
`industry_code_industry` varchar(45) NOT NULL,
`code_language` varchar(45) NOT NULL,
`country_code_iso` varchar(4) NOT NULL,
PRIMARY KEY (`id_member`),
UNIQUE KEY `email_UNIQUE` (`email`),
KEY `firstname` (`firstname`),
KEY `lastname` (`lastname`),
KEY `city` (`city`),
KEY `fk_member_region_idx` (`num_region`),
KEY `date_insert` (`date_insert`),
KEY `date_uptade` (`date_update`),
KEY `fk_member_industry_idx` (`industry_code_industry`),
KEY `fk_member_language_idx` (`code_language`),
KEY `fk_member_country1_idx` (`country_code_iso`),
CONSTRAINT `fk_member_country1` FOREIGN KEY (`country_code_iso`) REFERENCES `country` (`code_iso`) ON DELETE NO ACTION ON UPDATE NO ACTION,
CONSTRAINT `fk_member_industry` FOREIGN KEY (`industry_code_industry`) REFERENCES `industry` (`code_industry`) ON DELETE NO ACTION ON UPDATE NO ACTION,
CONSTRAINT `fk_member_language` FOREIGN KEY (`code_language`) REFERENCES `language` (`code_language`) ON DELETE NO ACTION ON UPDATE NO ACTION,
CONSTRAINT `fk_member_region` FOREIGN KEY (`num_region`) REFERENCES `region` (`num_region`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8
)
Array
(
[Table] => member
[Create Table] => CREATE TABLE `member` (
`id_member` int(11) NOT NULL AUTO_INCREMENT,
`civility` enum('Mademoiselle','Madame','Monsieur') NOT NULL,
`firstname` varchar(45) NOT NULL,
`lastname` varchar(45) DEFAULT NULL,
`adr_lg1` varchar(45) NOT NULL,
`adr_lg2` varchar(45) DEFAULT NULL,
`adr_lg3` varchar(45) DEFAULT NULL,
`city` varchar(45) NOT NULL,
`cp` varchar(45) NOT NULL,
`email` varchar(255) NOT NULL,
`date_insert` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
`date_update` datetime NOT NULL,
`id_category` int(11) NOT NULL,
`id_industry` int(11) NOT NULL,
`id_language` int(11) NOT NULL,
`num_region` varchar(3) NOT NULL,
`industry_code_industry` varchar(45) NOT NULL,
`code_language` varchar(45) NOT NULL,
`country_code_iso` varchar(4) NOT NULL,
PRIMARY KEY (`id_member`),
UNIQUE KEY `email_UNIQUE` (`email`),
KEY `firstname` (`firstname`),
KEY `lastname` (`lastname`),
KEY `city` (`city`),
KEY `fk_member_region_idx` (`num_region`),
KEY `date_insert` (`date_insert`),
KEY `date_uptade` (`date_update`),
KEY `fk_member_industry_idx` (`industry_code_industry`),
KEY `fk_member_language_idx` (`code_language`),
KEY `fk_member_country1_idx` (`country_code_iso`),
CONSTRAINT `fk_member_country1` FOREIGN KEY (`country_code_iso`) REFERENCES `country` (`code_iso`) ON DELETE NO ACTION ON UPDATE NO ACTION,
CONSTRAINT `fk_member_industry` FOREIGN KEY (`industry_code_industry`) REFERENCES `industry` (`code_industry`) ON DELETE NO ACTION ON UPDATE NO ACTION,
CONSTRAINT `fk_member_language` FOREIGN KEY (`code_language`) REFERENCES `language` (`code_language`) ON DELETE NO ACTION ON UPDATE NO ACTION,
CONSTRAINT `fk_member_region` FOREIGN KEY (`num_region`) REFERENCES `region` (`num_region`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8
)
Array
(
[Table] => member
[Create Table] => CREATE TABLE `member` (
`id_member` int(11) NOT NULL AUTO_INCREMENT,
`civility` enum('Mademoiselle','Madame','Monsieur') NOT NULL,
`firstname` varchar(45) NOT NULL,
`lastname` varchar(45) DEFAULT NULL,
`adr_lg1` varchar(45) NOT NULL,
`adr_lg2` varchar(45) DEFAULT NULL,
`adr_lg3` varchar(45) DEFAULT NULL,
`city` varchar(45) NOT NULL,
`cp` varchar(45) NOT NULL,
`email` varchar(255) NOT NULL,
`date_insert` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
`date_update` datetime NOT NULL,
`id_category` int(11) NOT NULL,
`id_industry` int(11) NOT NULL,
`id_language` int(11) NOT NULL,
`num_region` varchar(3) NOT NULL,
`industry_code_industry` varchar(45) NOT NULL,
`code_language` varchar(45) NOT NULL,
`country_code_iso` varchar(4) NOT NULL,
PRIMARY KEY (`id_member`),
UNIQUE KEY `email_UNIQUE` (`email`),
KEY `firstname` (`firstname`),
KEY `lastname` (`lastname`),
KEY `city` (`city`),
KEY `fk_member_region_idx` (`num_region`),
KEY `date_insert` (`date_insert`),
KEY `date_uptade` (`date_update`),
KEY `fk_member_industry_idx` (`industry_code_industry`),
KEY `fk_member_language_idx` (`code_language`),
KEY `fk_member_country1_idx` (`country_code_iso`),
CONSTRAINT `fk_member_country1` FOREIGN KEY (`country_code_iso`) REFERENCES `country` (`code_iso`) ON DELETE NO ACTION ON UPDATE NO ACTION,
CONSTRAINT `fk_member_industry` FOREIGN KEY (`industry_code_industry`) REFERENCES `industry` (`code_industry`) ON DELETE NO ACTION ON UPDATE NO ACTION,
CONSTRAINT `fk_member_language` FOREIGN KEY (`code_language`) REFERENCES `language` (`code_language`) ON DELETE NO ACTION ON UPDATE NO ACTION,
CONSTRAINT `fk_member_region` FOREIGN KEY (`num_region`) REFERENCES `region` (`num_region`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8
)
Array
(
[Table] => member
[Create Table] => CREATE TABLE `member` (
`id_member` int(11) NOT NULL AUTO_INCREMENT,
`civility` enum('Mademoiselle','Madame','Monsieur') NOT NULL,
`firstname` varchar(45) NOT NULL,
`lastname` varchar(45) DEFAULT NULL,
`adr_lg1` varchar(45) NOT NULL,
`adr_lg2` varchar(45) DEFAULT NULL,
`adr_lg3` varchar(45) DEFAULT NULL,
`city` varchar(45) NOT NULL,
`cp` varchar(45) NOT NULL,
`email` varchar(255) NOT NULL,
`date_insert` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
`date_update` datetime NOT NULL,
`id_category` int(11) NOT NULL,
`id_industry` int(11) NOT NULL,
`id_language` int(11) NOT NULL,
`num_region` varchar(3) NOT NULL,
`industry_code_industry` varchar(45) NOT NULL,
`code_language` varchar(45) NOT NULL,
`country_code_iso` varchar(4) NOT NULL,
PRIMARY KEY (`id_member`),
UNIQUE KEY `email_UNIQUE` (`email`),
KEY `firstname` (`firstname`),
KEY `lastname` (`lastname`),
KEY `city` (`city`),
KEY `fk_member_region_idx` (`num_region`),
KEY `date_insert` (`date_insert`),
KEY `date_uptade` (`date_update`),
KEY `fk_member_industry_idx` (`industry_code_industry`),
KEY `fk_member_language_idx` (`code_language`),
KEY `fk_member_country1_idx` (`country_code_iso`),
CONSTRAINT `fk_member_country1` FOREIGN KEY (`country_code_iso`) REFERENCES `country` (`code_iso`) ON DELETE NO ACTION ON UPDATE NO ACTION,
CONSTRAINT `fk_member_industry` FOREIGN KEY (`industry_code_industry`) REFERENCES `industry` (`code_industry`) ON DELETE NO ACTION ON UPDATE NO ACTION,
CONSTRAINT `fk_member_language` FOREIGN KEY (`code_language`) REFERENCES `language` (`code_language`) ON DELETE NO ACTION ON UPDATE NO ACTION,
CONSTRAINT `fk_member_region` FOREIGN KEY (`num_region`) REFERENCES `region` (`num_region`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8
)
Array
(
[Table] => member_has_profession
[Create Table] => CREATE TABLE `member_has_profession` (
`id_member_has_profession` int(11) NOT NULL AUTO_INCREMENT,
`id_member` int(11) NOT NULL,
`id_profession` int(11) NOT NULL,
`date_insert` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
`date_update` datetime DEFAULT NULL,
PRIMARY KEY (`id_member_has_profession`),
KEY `fk_member_has_profession_member1_idx` (`id_member`),
KEY `fk_member_has_profession_profession1_idx` (`id_profession`),
KEY `date_insert` (`date_insert`),
KEY `date_update` (`date_update`),
CONSTRAINT `fk_member_has_profession_member1` FOREIGN KEY (`id_member`) REFERENCES `member` (`id_member`) ON DELETE NO ACTION ON UPDATE NO ACTION,
CONSTRAINT `fk_member_has_profession_profession1` FOREIGN KEY (`id_profession`) REFERENCES `profession` (`id_profession`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8
)
Array
(
[Table] => member_has_profession
[Create Table] => CREATE TABLE `member_has_profession` (
`id_member_has_profession` int(11) NOT NULL AUTO_INCREMENT,
`id_member` int(11) NOT NULL,
`id_profession` int(11) NOT NULL,
`date_insert` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
`date_update` datetime DEFAULT NULL,
PRIMARY KEY (`id_member_has_profession`),
KEY `fk_member_has_profession_member1_idx` (`id_member`),
KEY `fk_member_has_profession_profession1_idx` (`id_profession`),
KEY `date_insert` (`date_insert`),
KEY `date_update` (`date_update`),
CONSTRAINT `fk_member_has_profession_member1` FOREIGN KEY (`id_member`) REFERENCES `member` (`id_member`) ON DELETE NO ACTION ON UPDATE NO ACTION,
CONSTRAINT `fk_member_has_profession_profession1` FOREIGN KEY (`id_profession`) REFERENCES `profession` (`id_profession`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8
)
Array
(
[Table] => member_has_profession
[Create Table] => CREATE TABLE `member_has_profession` (
`id_member_has_profession` int(11) NOT NULL AUTO_INCREMENT,
`id_member` int(11) NOT NULL,
`id_profession` int(11) NOT NULL,
`date_insert` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
`date_update` datetime DEFAULT NULL,
PRIMARY KEY (`id_member_has_profession`),
KEY `fk_member_has_profession_member1_idx` (`id_member`),
KEY `fk_member_has_profession_profession1_idx` (`id_profession`),
KEY `date_insert` (`date_insert`),
KEY `date_update` (`date_update`),
CONSTRAINT `fk_member_has_profession_member1` FOREIGN KEY (`id_member`) REFERENCES `member` (`id_member`) ON DELETE NO ACTION ON UPDATE NO ACTION,
CONSTRAINT `fk_member_has_profession_profession1` FOREIGN KEY (`id_profession`) REFERENCES `profession` (`id_profession`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8
)
Array
(
[Table] => member_has_profession
[Create Table] => CREATE TABLE `member_has_profession` (
`id_member_has_profession` int(11) NOT NULL AUTO_INCREMENT,
`id_member` int(11) NOT NULL,
`id_profession` int(11) NOT NULL,
`date_insert` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
`date_update` datetime DEFAULT NULL,
PRIMARY KEY (`id_member_has_profession`),
KEY `fk_member_has_profession_member1_idx` (`id_member`),
KEY `fk_member_has_profession_profession1_idx` (`id_profession`),
KEY `date_insert` (`date_insert`),
KEY `date_update` (`date_update`),
CONSTRAINT `fk_member_has_profession_member1` FOREIGN KEY (`id_member`) REFERENCES `member` (`id_member`) ON DELETE NO ACTION ON UPDATE NO ACTION,
CONSTRAINT `fk_member_has_profession_profession1` FOREIGN KEY (`id_profession`) REFERENCES `profession` (`id_profession`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8
)
Array
(
[Table] => member_has_project
[Create Table] => CREATE TABLE `member_has_project` (
`id_member_has_project` int(11) NOT NULL,
`member_id_member` int(11) NOT NULL,
`project_id_project` int(11) NOT NULL,
`date_insert` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
`date_update` datetime NOT NULL,
PRIMARY KEY (`id_member_has_project`),
KEY `fk_member_has_project_member1_idx` (`member_id_member`),
KEY `fk_member_has_project_project1_idx` (`project_id_project`),
KEY `date_insert` (`date_insert`),
KEY `date_update` (`date_update`),
CONSTRAINT `fk_member_has_project_member1` FOREIGN KEY (`member_id_member`) REFERENCES `member` (`id_member`) ON DELETE NO ACTION ON UPDATE NO ACTION,
CONSTRAINT `fk_member_has_project_project1` FOREIGN KEY (`project_id_project`) REFERENCES `project` (`id_project`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8
)
Array
(
[Table] => member_has_project
[Create Table] => CREATE TABLE `member_has_project` (
`id_member_has_project` int(11) NOT NULL,
`member_id_member` int(11) NOT NULL,
`project_id_project` int(11) NOT NULL,
`date_insert` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
`date_update` datetime NOT NULL,
PRIMARY KEY (`id_member_has_project`),
KEY `fk_member_has_project_member1_idx` (`member_id_member`),
KEY `fk_member_has_project_project1_idx` (`project_id_project`),
KEY `date_insert` (`date_insert`),
KEY `date_update` (`date_update`),
CONSTRAINT `fk_member_has_project_member1` FOREIGN KEY (`member_id_member`) REFERENCES `member` (`id_member`) ON DELETE NO ACTION ON UPDATE NO ACTION,
CONSTRAINT `fk_member_has_project_project1` FOREIGN KEY (`project_id_project`) REFERENCES `project` (`id_project`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8
)
Array
(
[Table] => member_has_project
[Create Table] => CREATE TABLE `member_has_project` (
`id_member_has_project` int(11) NOT NULL,
`member_id_member` int(11) NOT NULL,
`project_id_project` int(11) NOT NULL,
`date_insert` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
`date_update` datetime NOT NULL,
PRIMARY KEY (`id_member_has_project`),
KEY `fk_member_has_project_member1_idx` (`member_id_member`),
KEY `fk_member_has_project_project1_idx` (`project_id_project`),
KEY `date_insert` (`date_insert`),
KEY `date_update` (`date_update`),
CONSTRAINT `fk_member_has_project_member1` FOREIGN KEY (`member_id_member`) REFERENCES `member` (`id_member`) ON DELETE NO ACTION ON UPDATE NO ACTION,
CONSTRAINT `fk_member_has_project_project1` FOREIGN KEY (`project_id_project`) REFERENCES `project` (`id_project`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8
)
Array
(
[Table] => member_has_project
[Create Table] => CREATE TABLE `member_has_project` (
`id_member_has_project` int(11) NOT NULL,
`member_id_member` int(11) NOT NULL,
`project_id_project` int(11) NOT NULL,
`date_insert` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
`date_update` datetime NOT NULL,
PRIMARY KEY (`id_member_has_project`),
KEY `fk_member_has_project_member1_idx` (`member_id_member`),
KEY `fk_member_has_project_project1_idx` (`project_id_project`),
KEY `date_insert` (`date_insert`),
KEY `date_update` (`date_update`),
CONSTRAINT `fk_member_has_project_member1` FOREIGN KEY (`member_id_member`) REFERENCES `member` (`id_member`) ON DELETE NO ACTION ON UPDATE NO ACTION,
CONSTRAINT `fk_member_has_project_project1` FOREIGN KEY (`project_id_project`) REFERENCES `project` (`id_project`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8
)
Array
(
[Table] => member_has_relation
[Create Table] => CREATE TABLE `member_has_relation` (
`id_member_has_relation` int(11) NOT NULL AUTO_INCREMENT,
`type` enum('blocked','relation') DEFAULT NULL COMMENT 'enum',
`date_insert` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
`date_update` datetime NOT NULL,
`id_member` int(11) NOT NULL,
`id_relation` int(11) NOT NULL,
PRIMARY KEY (`id_member_has_relation`),
KEY `fk_member_has_relation_member1_idx` (`id_member`),
KEY `fk_member_has_relation_member2_idx` (`id_relation`),
KEY `date_insert` (`date_insert`),
KEY `date_update` (`date_update`),
CONSTRAINT `fk_member_has_relation_member1` FOREIGN KEY (`id_member`) REFERENCES `member` (`id_member`) ON DELETE NO ACTION ON UPDATE NO ACTION,
CONSTRAINT `fk_member_has_relation_member2` FOREIGN KEY (`id_relation`) REFERENCES `member` (`id_member`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8
)
Array
(
[Table] => member_has_relation
[Create Table] => CREATE TABLE `member_has_relation` (
`id_member_has_relation` int(11) NOT NULL AUTO_INCREMENT,
`type` enum('blocked','relation') DEFAULT NULL COMMENT 'enum',
`date_insert` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
`date_update` datetime NOT NULL,
`id_member` int(11) NOT NULL,
`id_relation` int(11) NOT NULL,
PRIMARY KEY (`id_member_has_relation`),
KEY `fk_member_has_relation_member1_idx` (`id_member`),
KEY `fk_member_has_relation_member2_idx` (`id_relation`),
KEY `date_insert` (`date_insert`),
KEY `date_update` (`date_update`),
CONSTRAINT `fk_member_has_relation_member1` FOREIGN KEY (`id_member`) REFERENCES `member` (`id_member`) ON DELETE NO ACTION ON UPDATE NO ACTION,
CONSTRAINT `fk_member_has_relation_member2` FOREIGN KEY (`id_relation`) REFERENCES `member` (`id_member`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8
)
Array
(
[Table] => member_has_relation
[Create Table] => CREATE TABLE `member_has_relation` (
`id_member_has_relation` int(11) NOT NULL AUTO_INCREMENT,
`type` enum('blocked','relation') DEFAULT NULL COMMENT 'enum',
`date_insert` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
`date_update` datetime NOT NULL,
`id_member` int(11) NOT NULL,
`id_relation` int(11) NOT NULL,
PRIMARY KEY (`id_member_has_relation`),
KEY `fk_member_has_relation_member1_idx` (`id_member`),
KEY `fk_member_has_relation_member2_idx` (`id_relation`),
KEY `date_insert` (`date_insert`),
KEY `date_update` (`date_update`),
CONSTRAINT `fk_member_has_relation_member1` FOREIGN KEY (`id_member`) REFERENCES `member` (`id_member`) ON DELETE NO ACTION ON UPDATE NO ACTION,
CONSTRAINT `fk_member_has_relation_member2` FOREIGN KEY (`id_relation`) REFERENCES `member` (`id_member`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8
)
Array
(
[Table] => member_has_relation
[Create Table] => CREATE TABLE `member_has_relation` (
`id_member_has_relation` int(11) NOT NULL AUTO_INCREMENT,
`type` enum('blocked','relation') DEFAULT NULL COMMENT 'enum',
`date_insert` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
`date_update` datetime NOT NULL,
`id_member` int(11) NOT NULL,
`id_relation` int(11) NOT NULL,
PRIMARY KEY (`id_member_has_relation`),
KEY `fk_member_has_relation_member1_idx` (`id_member`),
KEY `fk_member_has_relation_member2_idx` (`id_relation`),
KEY `date_insert` (`date_insert`),
KEY `date_update` (`date_update`),
CONSTRAINT `fk_member_has_relation_member1` FOREIGN KEY (`id_member`) REFERENCES `member` (`id_member`) ON DELETE NO ACTION ON UPDATE NO ACTION,
CONSTRAINT `fk_member_has_relation_member2` FOREIGN KEY (`id_relation`) REFERENCES `member` (`id_member`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8
)
Array
(
[Table] => member_has_skill
[Create Table] => CREATE TABLE `member_has_skill` (
`id_member_has_profession` int(11) NOT NULL AUTO_INCREMENT,
`id_member` int(11) NOT NULL,
`id_skill` int(11) NOT NULL,
`date_insert` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
`date_update` datetime DEFAULT NULL,
PRIMARY KEY (`id_member_has_profession`),
KEY `fk_member_has_skill_member1_idx` (`id_member`),
KEY `fk_member_has_skill_skill1_idx` (`id_skill`),
KEY `date_update` (`date_update`),
KEY `date_insert` (`date_insert`),
CONSTRAINT `fk_member_has_skill_member1` FOREIGN KEY (`id_member`) REFERENCES `member` (`id_member`) ON DELETE NO ACTION ON UPDATE NO ACTION,
CONSTRAINT `fk_member_has_skill_skill1` FOREIGN KEY (`id_skill`) REFERENCES `skill` (`id_skill`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8
)
Array
(
[Table] => member_has_skill
[Create Table] => CREATE TABLE `member_has_skill` (
`id_member_has_profession` int(11) NOT NULL AUTO_INCREMENT,
`id_member` int(11) NOT NULL,
`id_skill` int(11) NOT NULL,
`date_insert` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
`date_update` datetime DEFAULT NULL,
PRIMARY KEY (`id_member_has_profession`),
KEY `fk_member_has_skill_member1_idx` (`id_member`),
KEY `fk_member_has_skill_skill1_idx` (`id_skill`),
KEY `date_update` (`date_update`),
KEY `date_insert` (`date_insert`),
CONSTRAINT `fk_member_has_skill_member1` FOREIGN KEY (`id_member`) REFERENCES `member` (`id_member`) ON DELETE NO ACTION ON UPDATE NO ACTION,
CONSTRAINT `fk_member_has_skill_skill1` FOREIGN KEY (`id_skill`) REFERENCES `skill` (`id_skill`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8
)
Array
(
[Table] => member_has_skill
[Create Table] => CREATE TABLE `member_has_skill` (
`id_member_has_profession` int(11) NOT NULL AUTO_INCREMENT,
`id_member` int(11) NOT NULL,
`id_skill` int(11) NOT NULL,
`date_insert` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
`date_update` datetime DEFAULT NULL,
PRIMARY KEY (`id_member_has_profession`),
KEY `fk_member_has_skill_member1_idx` (`id_member`),
KEY `fk_member_has_skill_skill1_idx` (`id_skill`),
KEY `date_update` (`date_update`),
KEY `date_insert` (`date_insert`),
CONSTRAINT `fk_member_has_skill_member1` FOREIGN KEY (`id_member`) REFERENCES `member` (`id_member`) ON DELETE NO ACTION ON UPDATE NO ACTION,
CONSTRAINT `fk_member_has_skill_skill1` FOREIGN KEY (`id_skill`) REFERENCES `skill` (`id_skill`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8
)
Array
(
[Table] => member_has_skill
[Create Table] => CREATE TABLE `member_has_skill` (
`id_member_has_profession` int(11) NOT NULL AUTO_INCREMENT,
`id_member` int(11) NOT NULL,
`id_skill` int(11) NOT NULL,
`date_insert` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
`date_update` datetime DEFAULT NULL,
PRIMARY KEY (`id_member_has_profession`),
KEY `fk_member_has_skill_member1_idx` (`id_member`),
KEY `fk_member_has_skill_skill1_idx` (`id_skill`),
KEY `date_update` (`date_update`),
KEY `date_insert` (`date_insert`),
CONSTRAINT `fk_member_has_skill_member1` FOREIGN KEY (`id_member`) REFERENCES `member` (`id_member`) ON DELETE NO ACTION ON UPDATE NO ACTION,
CONSTRAINT `fk_member_has_skill_skill1` FOREIGN KEY (`id_skill`) REFERENCES `skill` (`id_skill`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8
)
Array
(
[Table] => message
[Create Table] => CREATE TABLE `message` (
`id_message` int(11) NOT NULL AUTO_INCREMENT,
`object_message` varchar(45) NOT NULL,
`text_message` varchar(255) NOT NULL,
`date_insert` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
`date_update` datetime NOT NULL,
`id_member` int(11) NOT NULL,
`id_relation` int(11) NOT NULL,
PRIMARY KEY (`id_message`),
KEY `fk_message_member1_idx` (`id_member`),
KEY `fk_message_member2_idx` (`id_relation`),
KEY `date_insert` (`date_insert`),
KEY `date_update` (`date_update`),
CONSTRAINT `fk_message_member1` FOREIGN KEY (`id_member`) REFERENCES `member` (`id_member`) ON DELETE NO ACTION ON UPDATE NO ACTION,
CONSTRAINT `fk_message_member2` FOREIGN KEY (`id_relation`) REFERENCES `member` (`id_member`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8
)
Array
(
[Table] => message
[Create Table] => CREATE TABLE `message` (
`id_message` int(11) NOT NULL AUTO_INCREMENT,
`object_message` varchar(45) NOT NULL,
`text_message` varchar(255) NOT NULL,
`date_insert` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
`date_update` datetime NOT NULL,
`id_member` int(11) NOT NULL,
`id_relation` int(11) NOT NULL,
PRIMARY KEY (`id_message`),
KEY `fk_message_member1_idx` (`id_member`),
KEY `fk_message_member2_idx` (`id_relation`),
KEY `date_insert` (`date_insert`),
KEY `date_update` (`date_update`),
CONSTRAINT `fk_message_member1` FOREIGN KEY (`id_member`) REFERENCES `member` (`id_member`) ON DELETE NO ACTION ON UPDATE NO ACTION,
CONSTRAINT `fk_message_member2` FOREIGN KEY (`id_relation`) REFERENCES `member` (`id_member`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8
)
Array
(
[Table] => message
[Create Table] => CREATE TABLE `message` (
`id_message` int(11) NOT NULL AUTO_INCREMENT,
`object_message` varchar(45) NOT NULL,
`text_message` varchar(255) NOT NULL,
`date_insert` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
`date_update` datetime NOT NULL,
`id_member` int(11) NOT NULL,
`id_relation` int(11) NOT NULL,
PRIMARY KEY (`id_message`),
KEY `fk_message_member1_idx` (`id_member`),
KEY `fk_message_member2_idx` (`id_relation`),
KEY `date_insert` (`date_insert`),
KEY `date_update` (`date_update`),
CONSTRAINT `fk_message_member1` FOREIGN KEY (`id_member`) REFERENCES `member` (`id_member`) ON DELETE NO ACTION ON UPDATE NO ACTION,
CONSTRAINT `fk_message_member2` FOREIGN KEY (`id_relation`) REFERENCES `member` (`id_member`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8
)
Array
(
[Table] => message
[Create Table] => CREATE TABLE `message` (
`id_message` int(11) NOT NULL AUTO_INCREMENT,
`object_message` varchar(45) NOT NULL,
`text_message` varchar(255) NOT NULL,
`date_insert` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
`date_update` datetime NOT NULL,
`id_member` int(11) NOT NULL,
`id_relation` int(11) NOT NULL,
PRIMARY KEY (`id_message`),
KEY `fk_message_member1_idx` (`id_member`),
KEY `fk_message_member2_idx` (`id_relation`),
KEY `date_insert` (`date_insert`),
KEY `date_update` (`date_update`),
CONSTRAINT `fk_message_member1` FOREIGN KEY (`id_member`) REFERENCES `member` (`id_member`) ON DELETE NO ACTION ON UPDATE NO ACTION,
CONSTRAINT `fk_message_member2` FOREIGN KEY (`id_relation`) REFERENCES `member` (`id_member`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8
)
Array
(
[Table] => profession
[Create Table] => CREATE TABLE `profession` (
`id_profession` int(11) NOT NULL AUTO_INCREMENT,
`code_profession` varchar(45) NOT NULL,
`label_profession` varchar(45) NOT NULL,
`desc_profession` varchar(255) NOT NULL,
`date_insert` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
`date_update` datetime NOT NULL,
PRIMARY KEY (`id_profession`),
UNIQUE KEY `code_profession_UNIQUE` (`code_profession`),
UNIQUE KEY `label_profession_UNIQUE` (`label_profession`),
KEY `code_profession` (`code_profession`),
KEY `label_profession` (`label_profession`),
KEY `date_insert` (`date_insert`),
KEY `date_update` (`date_update`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8
)
Notice: Undefined offset: 1 in /home/www/formation.local/www2/index.php on line 334
Notice: Undefined offset: 2 in /home/www/formation.local/www2/index.php on line 335
Notice: Undefined offset: 1 in /home/www/formation.local/www2/index.php on line 341
Array
(
[Table] => profession
[Create Table] => CREATE TABLE `profession` (
`id_profession` int(11) NOT NULL AUTO_INCREMENT,
`code_profession` varchar(45) NOT NULL,
`label_profession` varchar(45) NOT NULL,
`desc_profession` varchar(255) NOT NULL,
`date_insert` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
`date_update` datetime NOT NULL,
PRIMARY KEY (`id_profession`),
UNIQUE KEY `code_profession_UNIQUE` (`code_profession`),
UNIQUE KEY `label_profession_UNIQUE` (`label_profession`),
KEY `code_profession` (`code_profession`),
KEY `label_profession` (`label_profession`),
KEY `date_insert` (`date_insert`),
KEY `date_update` (`date_update`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8
)
Notice: Undefined offset: 1 in /home/www/formation.local/www2/index.php on line 334
Notice: Undefined offset: 2 in /home/www/formation.local/www2/index.php on line 335
Notice: Undefined offset: 1 in /home/www/formation.local/www2/index.php on line 341
Array
(
[Table] => project
[Create Table] => CREATE TABLE `project` (
`id_project` int(11) NOT NULL AUTO_INCREMENT,
`code_project` varchar(45) DEFAULT NULL,
`label_project` varchar(45) NOT NULL,
`desc_project` varchar(255) NOT NULL,
`date_insert` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
`date_update` datetime DEFAULT NULL,
PRIMARY KEY (`id_project`),
UNIQUE KEY `label_project_UNIQUE` (`label_project`),
UNIQUE KEY `code_project_UNIQUE` (`code_project`),
KEY `date_insert` (`date_insert`),
KEY `date_update` (`date_update`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8
)
Notice: Undefined offset: 1 in /home/www/formation.local/www2/index.php on line 334
Notice: Undefined offset: 2 in /home/www/formation.local/www2/index.php on line 335
Notice: Undefined offset: 1 in /home/www/formation.local/www2/index.php on line 341
Array
(
[Table] => project
[Create Table] => CREATE TABLE `project` (
`id_project` int(11) NOT NULL AUTO_INCREMENT,
`code_project` varchar(45) DEFAULT NULL,
`label_project` varchar(45) NOT NULL,
`desc_project` varchar(255) NOT NULL,
`date_insert` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
`date_update` datetime DEFAULT NULL,
PRIMARY KEY (`id_project`),
UNIQUE KEY `label_project_UNIQUE` (`label_project`),
UNIQUE KEY `code_project_UNIQUE` (`code_project`),
KEY `date_insert` (`date_insert`),
KEY `date_update` (`date_update`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8
)
Notice: Undefined offset: 1 in /home/www/formation.local/www2/index.php on line 334
Notice: Undefined offset: 2 in /home/www/formation.local/www2/index.php on line 335
Notice: Undefined offset: 1 in /home/www/formation.local/www2/index.php on line 341
Array
(
[Table] => project_needs_language
[Create Table] => CREATE TABLE `project_needs_language` (
`id_project_needs_language` int(11) NOT NULL AUTO_INCREMENT,
`project_id_project` int(11) NOT NULL,
`date_insert` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
`date_update` datetime NOT NULL,
`code_language` varchar(45) NOT NULL,
PRIMARY KEY (`id_project_needs_language`),
KEY `fk_project_needs_language_project1_idx` (`project_id_project`),
KEY `date_insert` (`date_insert`),
KEY `date_update` (`date_update`),
KEY `fk_project_needs_language_language1_idx` (`code_language`),
CONSTRAINT `fk_project_needs_language_language1` FOREIGN KEY (`code_language`) REFERENCES `language` (`code_language`) ON DELETE NO ACTION ON UPDATE NO ACTION,
CONSTRAINT `fk_project_needs_language_project1` FOREIGN KEY (`project_id_project`) REFERENCES `project` (`id_project`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8
)
Array
(
[Table] => project_needs_language
[Create Table] => CREATE TABLE `project_needs_language` (
`id_project_needs_language` int(11) NOT NULL AUTO_INCREMENT,
`project_id_project` int(11) NOT NULL,
`date_insert` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
`date_update` datetime NOT NULL,
`code_language` varchar(45) NOT NULL,
PRIMARY KEY (`id_project_needs_language`),
KEY `fk_project_needs_language_project1_idx` (`project_id_project`),
KEY `date_insert` (`date_insert`),
KEY `date_update` (`date_update`),
KEY `fk_project_needs_language_language1_idx` (`code_language`),
CONSTRAINT `fk_project_needs_language_language1` FOREIGN KEY (`code_language`) REFERENCES `language` (`code_language`) ON DELETE NO ACTION ON UPDATE NO ACTION,
CONSTRAINT `fk_project_needs_language_project1` FOREIGN KEY (`project_id_project`) REFERENCES `project` (`id_project`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8
)
Array
(
[Table] => project_needs_language
[Create Table] => CREATE TABLE `project_needs_language` (
`id_project_needs_language` int(11) NOT NULL AUTO_INCREMENT,
`project_id_project` int(11) NOT NULL,
`date_insert` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
`date_update` datetime NOT NULL,
`code_language` varchar(45) NOT NULL,
PRIMARY KEY (`id_project_needs_language`),
KEY `fk_project_needs_language_project1_idx` (`project_id_project`),
KEY `date_insert` (`date_insert`),
KEY `date_update` (`date_update`),
KEY `fk_project_needs_language_language1_idx` (`code_language`),
CONSTRAINT `fk_project_needs_language_language1` FOREIGN KEY (`code_language`) REFERENCES `language` (`code_language`) ON DELETE NO ACTION ON UPDATE NO ACTION,
CONSTRAINT `fk_project_needs_language_project1` FOREIGN KEY (`project_id_project`) REFERENCES `project` (`id_project`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8
)
Array
(
[Table] => project_needs_language
[Create Table] => CREATE TABLE `project_needs_language` (
`id_project_needs_language` int(11) NOT NULL AUTO_INCREMENT,
`project_id_project` int(11) NOT NULL,
`date_insert` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
`date_update` datetime NOT NULL,
`code_language` varchar(45) NOT NULL,
PRIMARY KEY (`id_project_needs_language`),
KEY `fk_project_needs_language_project1_idx` (`project_id_project`),
KEY `date_insert` (`date_insert`),
KEY `date_update` (`date_update`),
KEY `fk_project_needs_language_language1_idx` (`code_language`),
CONSTRAINT `fk_project_needs_language_language1` FOREIGN KEY (`code_language`) REFERENCES `language` (`code_language`) ON DELETE NO ACTION ON UPDATE NO ACTION,
CONSTRAINT `fk_project_needs_language_project1` FOREIGN KEY (`project_id_project`) REFERENCES `project` (`id_project`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8
)
Array
(
[Table] => project_needs_skill
[Create Table] => CREATE TABLE `project_needs_skill` (
`id_project_needs_skill` int(11) NOT NULL,
`project_id_project` int(11) NOT NULL,
`skill_id_skill` int(11) NOT NULL,
`date_insert` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
`date_update` datetime NOT NULL,
PRIMARY KEY (`id_project_needs_skill`),
KEY `fk_project_needs_skill_project1_idx` (`project_id_project`),
KEY `fk_project_needs_skill_skill1_idx` (`skill_id_skill`),
KEY `date_insert` (`date_insert`),
KEY `date_update` (`date_update`),
CONSTRAINT `fk_project_needs_skill_project1` FOREIGN KEY (`project_id_project`) REFERENCES `project` (`id_project`) ON DELETE NO ACTION ON UPDATE NO ACTION,
CONSTRAINT `fk_project_needs_skill_skill1` FOREIGN KEY (`skill_id_skill`) REFERENCES `skill` (`id_skill`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8
)
Array
(
[Table] => project_needs_skill
[Create Table] => CREATE TABLE `project_needs_skill` (
`id_project_needs_skill` int(11) NOT NULL,
`project_id_project` int(11) NOT NULL,
`skill_id_skill` int(11) NOT NULL,
`date_insert` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
`date_update` datetime NOT NULL,
PRIMARY KEY (`id_project_needs_skill`),
KEY `fk_project_needs_skill_project1_idx` (`project_id_project`),
KEY `fk_project_needs_skill_skill1_idx` (`skill_id_skill`),
KEY `date_insert` (`date_insert`),
KEY `date_update` (`date_update`),
CONSTRAINT `fk_project_needs_skill_project1` FOREIGN KEY (`project_id_project`) REFERENCES `project` (`id_project`) ON DELETE NO ACTION ON UPDATE NO ACTION,
CONSTRAINT `fk_project_needs_skill_skill1` FOREIGN KEY (`skill_id_skill`) REFERENCES `skill` (`id_skill`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8
)
Array
(
[Table] => project_needs_skill
[Create Table] => CREATE TABLE `project_needs_skill` (
`id_project_needs_skill` int(11) NOT NULL,
`project_id_project` int(11) NOT NULL,
`skill_id_skill` int(11) NOT NULL,
`date_insert` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
`date_update` datetime NOT NULL,
PRIMARY KEY (`id_project_needs_skill`),
KEY `fk_project_needs_skill_project1_idx` (`project_id_project`),
KEY `fk_project_needs_skill_skill1_idx` (`skill_id_skill`),
KEY `date_insert` (`date_insert`),
KEY `date_update` (`date_update`),
CONSTRAINT `fk_project_needs_skill_project1` FOREIGN KEY (`project_id_project`) REFERENCES `project` (`id_project`) ON DELETE NO ACTION ON UPDATE NO ACTION,
CONSTRAINT `fk_project_needs_skill_skill1` FOREIGN KEY (`skill_id_skill`) REFERENCES `skill` (`id_skill`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8
)
Array
(
[Table] => project_needs_skill
[Create Table] => CREATE TABLE `project_needs_skill` (
`id_project_needs_skill` int(11) NOT NULL,
`project_id_project` int(11) NOT NULL,
`skill_id_skill` int(11) NOT NULL,
`date_insert` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
`date_update` datetime NOT NULL,
PRIMARY KEY (`id_project_needs_skill`),
KEY `fk_project_needs_skill_project1_idx` (`project_id_project`),
KEY `fk_project_needs_skill_skill1_idx` (`skill_id_skill`),
KEY `date_insert` (`date_insert`),
KEY `date_update` (`date_update`),
CONSTRAINT `fk_project_needs_skill_project1` FOREIGN KEY (`project_id_project`) REFERENCES `project` (`id_project`) ON DELETE NO ACTION ON UPDATE NO ACTION,
CONSTRAINT `fk_project_needs_skill_skill1` FOREIGN KEY (`skill_id_skill`) REFERENCES `skill` (`id_skill`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8
)



*/


/*(
[Field] => code_category
[0] => code_category
[Type] => varchar(45)
[1] => varchar(45)
[Null] => NO
[2] => NO
[Key] => PRI
[3] => PRI
[Default] =>
[4] =>
[Extra] =>
[5] =>
)
<br/>0<br/>Array
(
[Field] => id_category_language
[0] => id_category_language
[Type] => int(11)
[1] => int(11)
[Null] => NO
[2] => NO
[Key] => PRI
[3] => PRI
[Default] =>
[4] =>
[Extra] => auto_increment
[5] => auto_increment
)
<br/>1<br/>Array
(
[Field] => label_category
[0] => label_category
[Type] => varchar(255)
[1] => varchar(255)
[Null] => YES
[2] => YES
[Key] =>
[3] =>
[Default] =>
[4] =>
[Extra] =>
[5] =>
)
<br/>2<br/>Array
(
[Field] => code_category
[0] => code_category
[Type] => varchar(45)
[1] => varchar(45)
[Null] => NO
[2] => NO
[Key] => MUL
[3] => MUL
[Default] =>
[4] =>
[Extra] =>
[5] =>
)
<br/>3<br/>Array
(
[Field] => code_language
[0] => code_language
[Type] => varchar(45)
[1] => varchar(45)
[Null] => NO
[2] => NO
[Key] => MUL
[3] => MUL
[Default] =>
[4] =>
[Extra] =>
[5] =>
)
<br/>0<br/>Array
(
[Field] => code_iso
[0] => code_iso
[Type] => varchar(4)
[1] => varchar(4)
[Null] => NO
[2] => NO
[Key] => PRI
[3] => PRI
[Default] =>
[4] =>
[Extra] =>
[5] =>
)
<br/>1<br/>Array
(
[Field] => code_iso_alpha2
[0] => code_iso_alpha2
[Type] => varchar(2)
[1] => varchar(2)
[Null] => NO
[2] => NO
[Key] =>
[3] =>
[Default] =>
[4] =>
[Extra] =>
[5] =>
)
<br/>2<br/>Array
(
[Field] => code_iso_alpha3
[0] => code_iso_alpha3
[Type] => varchar(4)
[1] => varchar(4)
[Null] => NO
[2] => NO
[Key] => UNI
[3] => UNI
[Default] =>
[4] =>
[Extra] =>
[5] =>
)
<br/>0<br/>Array
(
[Field] => id_country_lang
[0] => id_country_lang
[Type] => int(11)
[1] => int(11)
[Null] => NO
[2] => NO
[Key] => PRI
[3] => PRI
[Default] =>
[4] =>
[Extra] => auto_increment
[5] => auto_increment
)
<br/>1<br/>Array
(
[Field] => label_country
[0] => label_country
[Type] => varchar(255)
[1] => varchar(255)
[Null] => NO
[2] => NO
[Key] =>
[3] =>
[Default] =>
[4] =>
[Extra] =>
[5] =>
)
<br/>2<br/>Array
(
[Field] => code_language
[0] => code_language
[Type] => varchar(45)
[1] => varchar(45)
[Null] => NO
[2] => NO
[Key] => MUL
[3] => MUL
[Default] =>
[4] =>
[Extra] =>
[5] =>
)
<br/>3<br/>Array
(
[Field] => country_code_iso
[0] => country_code_iso
[Type] => varchar(4)
[1] => varchar(4)
[Null] => NO
[2] => NO
[Key] => MUL
[3] => MUL
[Default] =>
[4] =>
[Extra] =>
[5] =>
)
<br/>0<br/>Array
(
[Field] => num_dpt
[0] => num_dpt
[Type] => varchar(3)
[1] => varchar(3)
[Null] => NO
[2] => NO
[Key] => PRI
[3] => PRI
[Default] =>
[4] =>
[Extra] =>
[5] =>
)
<br/>1<br/>Array
(
[Field] => label_dpt
[0] => label_dpt
[Type] => varchar(45)
[1] => varchar(45)
[Null] => NO
[2] => NO
[Key] => UNI
[3] => UNI
[Default] =>
[4] =>
[Extra] =>
[5] =>
)
<br/>2<br/>Array
(
[Field] => num_region
[0] => num_region
[Type] => varchar(3)
[1] => varchar(3)
[Null] => NO
[2] => NO
[Key] => MUL
[3] => MUL
[Default] =>
[4] =>
[Extra] =>
[5] =>
)
<br/>0<br/>Array
(
[Field] => code_industry
[0] => code_industry
[Type] => varchar(45)
[1] => varchar(45)
[Null] => NO
[2] => NO
[Key] => PRI
[3] => PRI
[Default] =>
[4] =>
[Extra] =>
[5] =>
)
<br/>0<br/>Array
(
[Field] => id_industry_language
[0] => id_industry_language
[Type] => int(11)
[1] => int(11)
[Null] => NO
[2] => NO
[Key] => PRI
[3] => PRI
[Default] =>
[4] =>
[Extra] => auto_increment
[5] => auto_increment
)
<br/>1<br/>Array
(
[Field] => label_industry
[0] => label_industry
[Type] => varchar(255)
[1] => varchar(255)
[Null] => YES
[2] => YES
[Key] =>
[3] =>
[Default] =>
[4] =>
[Extra] =>
[5] =>
)
<br/>2<br/>Array
(
[Field] => code_industry
[0] => code_industry
[Type] => varchar(45)
[1] => varchar(45)
[Null] => NO
[2] => NO
[Key] => MUL
[3] => MUL
[Default] =>
[4] =>
[Extra] =>
[5] =>
)
<br/>3<br/>Array
(
[Field] => code_language
[0] => code_language
[Type] => varchar(45)
[1] => varchar(45)
[Null] => NO
[2] => NO
[Key] => MUL
[3] => MUL
[Default] =>
[4] =>
[Extra] =>
[5] =>
)
<br/>0<br/>Array
(
[Field] => code_language
[0] => code_language
[Type] => varchar(45)
[1] => varchar(45)
[Null] => NO
[2] => NO
[Key] => PRI
[3] => PRI
[Default] =>
[4] =>
[Extra] =>
[5] =>
)
<br/>1<br/>Array
(
[Field] => label_language
[0] => label_language
[Type] => varchar(45)
[1] => varchar(45)
[Null] => NO
[2] => NO
[Key] => UNI
[3] => UNI
[Default] =>
[4] =>
[Extra] =>
[5] =>
)
<br/>2<br/>Array
(
[Field] => default
[0] => default
[Type] => int(4)
[1] => int(4)
[Null] => NO
[2] => NO
[Key] =>
[3] =>
[Default] => 0
[4] => 0
[Extra] =>
[5] =>
)
<br/>0<br/>Array
(
[Field] => id_member
[0] => id_member
[Type] => int(11)
[1] => int(11)
[Null] => NO
[2] => NO
[Key] => PRI
[3] => PRI
[Default] =>
[4] =>
[Extra] => auto_increment
[5] => auto_increment
)
<br/>1<br/>Array
(
[Field] => civility
[0] => civility
[Type] => enum('Mademoiselle','Madame','Monsieur')
[1] => enum('Mademoiselle','Madame','Monsieur')
[Null] => NO
[2] => NO
[Key] =>
[3] =>
[Default] =>
[4] =>
[Extra] =>
[5] =>
)
<br/>2<br/>Array
(
[Field] => firstname
[0] => firstname
[Type] => varchar(45)
[1] => varchar(45)
[Null] => NO
[2] => NO
[Key] => MUL
[3] => MUL
[Default] =>
[4] =>
[Extra] =>
[5] =>
)
<br/>3<br/>Array
(
[Field] => lastname
[0] => lastname
[Type] => varchar(45)
[1] => varchar(45)
[Null] => YES
[2] => YES
[Key] => MUL
[3] => MUL
[Default] =>
[4] =>
[Extra] =>
[5] =>
)
<br/>4<br/>Array
(
[Field] => adr_lg1
[0] => adr_lg1
[Type] => varchar(45)
[1] => varchar(45)
[Null] => NO
[2] => NO
[Key] =>
[3] =>
[Default] =>
[4] =>
[Extra] =>
[5] =>
)
<br/>5<br/>Array
(
[Field] => adr_lg2
[0] => adr_lg2
[Type] => varchar(45)
[1] => varchar(45)
[Null] => YES
[2] => YES
[Key] =>
[3] =>
[Default] =>
[4] =>
[Extra] =>
[5] =>
)
<br/>6<br/>Array
(
[Field] => adr_lg3
[0] => adr_lg3
[Type] => varchar(45)
[1] => varchar(45)
[Null] => YES
[2] => YES
[Key] =>
[3] =>
[Default] =>
[4] =>
[Extra] =>
[5] =>
)
<br/>7<br/>Array
(
[Field] => city
[0] => city
[Type] => varchar(45)
[1] => varchar(45)
[Null] => NO
[2] => NO
[Key] => MUL
[3] => MUL
[Default] =>
[4] =>
[Extra] =>
[5] =>
)
<br/>8<br/>Array
(
[Field] => cp
[0] => cp
[Type] => varchar(45)
[1] => varchar(45)
[Null] => NO
[2] => NO
[Key] =>
[3] =>
[Default] =>
[4] =>
[Extra] =>
[5] =>
)
<br/>9<br/>Array
(
[Field] => email
[0] => email
[Type] => varchar(255)
[1] => varchar(255)
[Null] => NO
[2] => NO
[Key] => UNI
[3] => UNI
[Default] =>
[4] =>
[Extra] =>
[5] =>
)
<br/>10<br/>Array
(
[Field] => date_insert
[0] => date_insert
[Type] => timestamp
[1] => timestamp
[Null] => NO
[2] => NO
[Key] => MUL
[3] => MUL
[Default] => CURRENT_TIMESTAMP
[4] => CURRENT_TIMESTAMP
[Extra] => on update CURRENT_TIMESTAMP
[5] => on update CURRENT_TIMESTAMP
)
<br/>11<br/>Array
(
[Field] => date_update
[0] => date_update
[Type] => datetime
[1] => datetime
[Null] => NO
[2] => NO
[Key] => MUL
[3] => MUL
[Default] =>
[4] =>
[Extra] =>
[5] =>
)
<br/>12<br/>Array
(
[Field] => id_category
[0] => id_category
[Type] => int(11)
[1] => int(11)
[Null] => NO
[2] => NO
[Key] =>
[3] =>
[Default] =>
[4] =>
[Extra] =>
[5] =>
)
<br/>13<br/>Array
(
[Field] => id_industry
[0] => id_industry
[Type] => int(11)
[1] => int(11)
[Null] => NO
[2] => NO
[Key] =>
[3] =>
[Default] =>
[4] =>
[Extra] =>
[5] =>
)
<br/>14<br/>Array
(
[Field] => id_language
[0] => id_language
[Type] => int(11)
[1] => int(11)
[Null] => NO
[2] => NO
[Key] =>
[3] =>
[Default] =>
[4] =>
[Extra] =>
[5] =>
)
<br/>15<br/>Array
(
[Field] => num_region
[0] => num_region
[Type] => varchar(3)
[1] => varchar(3)
[Null] => NO
[2] => NO
[Key] => MUL
[3] => MUL
[Default] =>
[4] =>
[Extra] =>
[5] =>
)
<br/>16<br/>Array
(
[Field] => industry_code_industry
[0] => industry_code_industry
[Type] => varchar(45)
[1] => varchar(45)
[Null] => NO
[2] => NO
[Key] => MUL
[3] => MUL
[Default] =>
[4] =>
[Extra] =>
[5] =>
)
<br/>17<br/>Array
(
[Field] => code_language
[0] => code_language
[Type] => varchar(45)
[1] => varchar(45)
[Null] => NO
[2] => NO
[Key] => MUL
[3] => MUL
[Default] =>
[4] =>
[Extra] =>
[5] =>
)
<br/>18<br/>Array
(
[Field] => country_code_iso
[0] => country_code_iso
[Type] => varchar(4)
[1] => varchar(4)
[Null] => NO
[2] => NO
[Key] => MUL
[3] => MUL
[Default] =>
[4] =>
[Extra] =>
[5] =>
)
<br/>0<br/>Array
(
[Field] => id_member_has_profession
[0] => id_member_has_profession
[Type] => int(11)
[1] => int(11)
[Null] => NO
[2] => NO
[Key] => PRI
[3] => PRI
[Default] =>
[4] =>
[Extra] => auto_increment
[5] => auto_increment
)
<br/>1<br/>Array
(
[Field] => id_member
[0] => id_member
[Type] => int(11)
[1] => int(11)
[Null] => NO
[2] => NO
[Key] => MUL
[3] => MUL
[Default] =>
[4] =>
[Extra] =>
[5] =>
)
<br/>2<br/>Array
(
[Field] => id_profession
[0] => id_profession
[Type] => int(11)
[1] => int(11)
[Null] => NO
[2] => NO
[Key] => MUL
[3] => MUL
[Default] =>
[4] =>
[Extra] =>
[5] =>
)
<br/>3<br/>Array
(
[Field] => date_insert
[0] => date_insert
[Type] => timestamp
[1] => timestamp
[Null] => NO
[2] => NO
[Key] => MUL
[3] => MUL
[Default] => CURRENT_TIMESTAMP
[4] => CURRENT_TIMESTAMP
[Extra] => on update CURRENT_TIMESTAMP
[5] => on update CURRENT_TIMESTAMP
)
<br/>4<br/>Array
(
[Field] => date_update
[0] => date_update
[Type] => datetime
[1] => datetime
[Null] => YES
[2] => YES
[Key] => MUL
[3] => MUL
[Default] =>
[4] =>
[Extra] =>
[5] =>
)
<br/>0<br/>Array
(
[Field] => id_member_has_project
[0] => id_member_has_project
[Type] => int(11)
[1] => int(11)
[Null] => NO
[2] => NO
[Key] => PRI
[3] => PRI
[Default] =>
[4] =>
[Extra] =>
[5] =>
)
<br/>1<br/>Array
(
[Field] => member_id_member
[0] => member_id_member
[Type] => int(11)
[1] => int(11)
[Null] => NO
[2] => NO
[Key] => MUL
[3] => MUL
[Default] =>
[4] =>
[Extra] =>
[5] =>
)
<br/>2<br/>Array
(
[Field] => project_id_project
[0] => project_id_project
[Type] => int(11)
[1] => int(11)
[Null] => NO
[2] => NO
[Key] => MUL
[3] => MUL
[Default] =>
[4] =>
[Extra] =>
[5] =>
)
<br/>3<br/>Array
(
[Field] => date_insert
[0] => date_insert
[Type] => timestamp
[1] => timestamp
[Null] => NO
[2] => NO
[Key] => MUL
[3] => MUL
[Default] => CURRENT_TIMESTAMP
[4] => CURRENT_TIMESTAMP
[Extra] => on update CURRENT_TIMESTAMP
[5] => on update CURRENT_TIMESTAMP
)
<br/>4<br/>Array
(
[Field] => date_update
[0] => date_update
[Type] => datetime
[1] => datetime
[Null] => NO
[2] => NO
[Key] => MUL
[3] => MUL
[Default] =>
[4] =>
[Extra] =>
[5] =>
)
<br/>0<br/>Array
(
[Field] => id_member_has_relation
[0] => id_member_has_relation
[Type] => int(11)
[1] => int(11)
[Null] => NO
[2] => NO
[Key] => PRI
[3] => PRI
[Default] =>
[4] =>
[Extra] => auto_increment
[5] => auto_increment
)
<br/>1<br/>Array
(
[Field] => type
[0] => type
[Type] => enum('blocked','relation')
[1] => enum('blocked','relation')
[Null] => YES
[2] => YES
[Key] =>
[3] =>
[Default] =>
[4] =>
[Extra] =>
[5] =>
)
<br/>2<br/>Array
(
[Field] => date_insert
[0] => date_insert
[Type] => timestamp
[1] => timestamp
[Null] => NO
[2] => NO
[Key] => MUL
[3] => MUL
[Default] => CURRENT_TIMESTAMP
[4] => CURRENT_TIMESTAMP
[Extra] => on update CURRENT_TIMESTAMP
[5] => on update CURRENT_TIMESTAMP
)
<br/>3<br/>Array
(
[Field] => date_update
[0] => date_update
[Type] => datetime
[1] => datetime
[Null] => NO
[2] => NO
[Key] => MUL
[3] => MUL
[Default] =>
[4] =>
[Extra] =>
[5] =>
)
<br/>4<br/>Array
(
[Field] => id_member
[0] => id_member
[Type] => int(11)
[1] => int(11)
[Null] => NO
[2] => NO
[Key] => MUL
[3] => MUL
[Default] =>
[4] =>
[Extra] =>
[5] =>
)
<br/>5<br/>Array
(
[Field] => id_relation
[0] => id_relation
[Type] => int(11)
[1] => int(11)
[Null] => NO
[2] => NO
[Key] => MUL
[3] => MUL
[Default] =>
[4] =>
[Extra] =>
[5] =>
)
<br/>0<br/>Array
(
[Field] => id_member_has_profession
[0] => id_member_has_profession
[Type] => int(11)
[1] => int(11)
[Null] => NO
[2] => NO
[Key] => PRI
[3] => PRI
[Default] =>
[4] =>
[Extra] => auto_increment
[5] => auto_increment
)
<br/>1<br/>Array
(
[Field] => id_member
[0] => id_member
[Type] => int(11)
[1] => int(11)
[Null] => NO
[2] => NO
[Key] => MUL
[3] => MUL
[Default] =>
[4] =>
[Extra] =>
[5] =>
)
<br/>2<br/>Array
(
[Field] => id_skill
[0] => id_skill
[Type] => int(11)
[1] => int(11)
[Null] => NO
[2] => NO
[Key] => MUL
[3] => MUL
[Default] =>
[4] =>
[Extra] =>
[5] =>
)
<br/>3<br/>Array
(
[Field] => date_insert
[0] => date_insert
[Type] => timestamp
[1] => timestamp
[Null] => NO
[2] => NO
[Key] => MUL
[3] => MUL
[Default] => CURRENT_TIMESTAMP
[4] => CURRENT_TIMESTAMP
[Extra] => on update CURRENT_TIMESTAMP
[5] => on update CURRENT_TIMESTAMP
)
<br/>4<br/>Array
(
[Field] => date_update
[0] => date_update
[Type] => datetime
[1] => datetime
[Null] => YES
[2] => YES
[Key] => MUL
[3] => MUL
[Default] =>
[4] =>
[Extra] =>
[5] =>
)
<br/>0<br/>Array
(
[Field] => id_message
[0] => id_message
[Type] => int(11)
[1] => int(11)
[Null] => NO
[2] => NO
[Key] => PRI
[3] => PRI
[Default] =>
[4] =>
[Extra] => auto_increment
[5] => auto_increment
)
<br/>1<br/>Array
(
[Field] => object_message
[0] => object_message
[Type] => varchar(45)
[1] => varchar(45)
[Null] => NO
[2] => NO
[Key] =>
[3] =>
[Default] =>
[4] =>
[Extra] =>
[5] =>
)
<br/>2<br/>Array
(
[Field] => text_message
[0] => text_message
[Type] => varchar(255)
[1] => varchar(255)
[Null] => NO
[2] => NO
[Key] =>
[3] =>
[Default] =>
[4] =>
[Extra] =>
[5] =>
)
<br/>3<br/>Array
(
[Field] => date_insert
[0] => date_insert
[Type] => timestamp
[1] => timestamp
[Null] => NO
[2] => NO
[Key] => MUL
[3] => MUL
[Default] => CURRENT_TIMESTAMP
[4] => CURRENT_TIMESTAMP
[Extra] => on update CURRENT_TIMESTAMP
[5] => on update CURRENT_TIMESTAMP
)
<br/>4<br/>Array
(
[Field] => date_update
[0] => date_update
[Type] => datetime
[1] => datetime
[Null] => NO
[2] => NO
[Key] => MUL
[3] => MUL
[Default] =>
[4] =>
[Extra] =>
[5] =>
)
<br/>5<br/>Array
(
[Field] => id_member
[0] => id_member
[Type] => int(11)
[1] => int(11)
[Null] => NO
[2] => NO
[Key] => MUL
[3] => MUL
[Default] =>
[4] =>
[Extra] =>
[5] =>
)
<br/>6<br/>Array
(
[Field] => id_relation
[0] => id_relation
[Type] => int(11)
[1] => int(11)
[Null] => NO
[2] => NO
[Key] => MUL
[3] => MUL
[Default] =>
[4] =>
[Extra] =>
[5] =>
)
<br/>0<br/>Array
(
[Field] => id_profession
[0] => id_profession
[Type] => int(11)
[1] => int(11)
[Null] => NO
[2] => NO
[Key] => PRI
[3] => PRI
[Default] =>
[4] =>
[Extra] => auto_increment
[5] => auto_increment
)
<br/>1<br/>Array
(
[Field] => code_profession
[0] => code_profession
[Type] => varchar(45)
[1] => varchar(45)
[Null] => NO
[2] => NO
[Key] => UNI
[3] => UNI
[Default] =>
[4] =>
[Extra] =>
[5] =>
)
<br/>2<br/>Array
(
[Field] => label_profession
[0] => label_profession
[Type] => varchar(45)
[1] => varchar(45)
[Null] => NO
[2] => NO
[Key] => UNI
[3] => UNI
[Default] =>
[4] =>
[Extra] =>
[5] =>
)
<br/>3<br/>Array
(
[Field] => desc_profession
[0] => desc_profession
[Type] => varchar(255)
[1] => varchar(255)
[Null] => NO
[2] => NO
[Key] =>
[3] =>
[Default] =>
[4] =>
[Extra] =>
[5] =>
)
<br/>4<br/>Array
(
[Field] => date_insert
[0] => date_insert
[Type] => timestamp
[1] => timestamp
[Null] => NO
[2] => NO
[Key] => MUL
[3] => MUL
[Default] => CURRENT_TIMESTAMP
[4] => CURRENT_TIMESTAMP
[Extra] => on update CURRENT_TIMESTAMP
[5] => on update CURRENT_TIMESTAMP
)
<br/>
Notice: Undefined offset: 1 in /home/www/formation.local/www2/index.php on line 337
Notice: Undefined offset: 2 in /home/www/formation.local/www2/index.php on line 338
Notice: Undefined offset: 1 in /home/www/formation.local/www2/index.php on line 344
5<br/>Array
(
[Field] => date_update
[0] => date_update
[Type] => datetime
[1] => datetime
[Null] => NO
[2] => NO
[Key] => MUL
[3] => MUL
[Default] =>
[4] =>
[Extra] =>
[5] =>
)
<br/>
Notice: Undefined offset: 1 in /home/www/formation.local/www2/index.php on line 337
Notice: Undefined offset: 2 in /home/www/formation.local/www2/index.php on line 338
Notice: Undefined offset: 1 in /home/www/formation.local/www2/index.php on line 344
0<br/>Array
(
[Field] => id_project
[0] => id_project
[Type] => int(11)
[1] => int(11)
[Null] => NO
[2] => NO
[Key] => PRI
[3] => PRI
[Default] =>
[4] =>
[Extra] => auto_increment
[5] => auto_increment
)
<br/>1<br/>Array
(
[Field] => code_project
[0] => code_project
[Type] => varchar(45)
[1] => varchar(45)
[Null] => YES
[2] => YES
[Key] => UNI
[3] => UNI
[Default] =>
[4] =>
[Extra] =>
[5] =>
)
<br/>2<br/>Array
(
[Field] => label_project
[0] => label_project
[Type] => varchar(45)
[1] => varchar(45)
[Null] => NO
[2] => NO
[Key] => UNI
[3] => UNI
[Default] =>
[4] =>
[Extra] =>
[5] =>
)
<br/>3<br/>Array
(
[Field] => desc_project
[0] => desc_project
[Type] => varchar(255)
[1] => varchar(255)
[Null] => NO
[2] => NO
[Key] =>
[3] =>
[Default] =>
[4] =>
[Extra] =>
[5] =>
)
<br/>4<br/>Array
(
[Field] => date_insert
[0] => date_insert
[Type] => timestamp
[1] => timestamp
[Null] => NO
[2] => NO
[Key] => MUL
[3] => MUL
[Default] => CURRENT_TIMESTAMP
[4] => CURRENT_TIMESTAMP
[Extra] => on update CURRENT_TIMESTAMP
[5] => on update CURRENT_TIMESTAMP
)
<br/>
Notice: Undefined offset: 1 in /home/www/formation.local/www2/index.php on line 337
Notice: Undefined offset: 2 in /home/www/formation.local/www2/index.php on line 338
Notice: Undefined offset: 1 in /home/www/formation.local/www2/index.php on line 344
5<br/>Array
(
[Field] => date_update
[0] => date_update
[Type] => datetime
[1] => datetime
[Null] => YES
[2] => YES
[Key] => MUL
[3] => MUL
[Default] =>
[4] =>
[Extra] =>
[5] =>
)
<br/>
Notice: Undefined offset: 1 in /home/www/formation.local/www2/index.php on line 337
Notice: Undefined offset: 2 in /home/www/formation.local/www2/index.php on line 338
Notice: Undefined offset: 1 in /home/www/formation.local/www2/index.php on line 344
0<br/>Array
(
[Field] => id_project_needs_language
[0] => id_project_needs_language
[Type] => int(11)
[1] => int(11)
[Null] => NO
[2] => NO
[Key] => PRI
[3] => PRI
[Default] =>
[4] =>
[Extra] => auto_increment
[5] => auto_increment
)
<br/>1<br/>Array
(
[Field] => project_id_project
[0] => project_id_project
[Type] => int(11)
[1] => int(11)
[Null] => NO
[2] => NO
[Key] => MUL
[3] => MUL
[Default] =>
[4] =>
[Extra] =>
[5] =>
)
<br/>2<br/>Array
(
[Field] => date_insert
[0] => date_insert
[Type] => timestamp
[1] => timestamp
[Null] => NO
[2] => NO
[Key] => MUL
[3] => MUL
[Default] => CURRENT_TIMESTAMP
[4] => CURRENT_TIMESTAMP
[Extra] => on update CURRENT_TIMESTAMP
[5] => on update CURRENT_TIMESTAMP
)
<br/>3<br/>Array
(
[Field] => date_update
[0] => date_update
[Type] => datetime
[1] => datetime
[Null] => NO
[2] => NO
[Key] => MUL
[3] => MUL
[Default] =>
[4] =>
[Extra] =>
[5] =>
)
<br/>4<br/>Array
(
[Field] => code_language
[0] => code_language
[Type] => varchar(45)
[1] => varchar(45)
[Null] => NO
[2] => NO
[Key] => MUL
[3] => MUL
[Default] =>
[4] =>
[Extra] =>
[5] =>
)
<br/>0<br/>Array
(
[Field] => id_project_needs_skill
[0] => id_project_needs_skill
[Type] => int(11)
[1] => int(11)
[Null] => NO
[2] => NO
[Key] => PRI
[3] => PRI
[Default] =>
[4] =>
[Extra] =>
[5] =>
)
<br/>1<br/>Array
(
[Field] => project_id_project
[0] => project_id_project
[Type] => int(11)
[1] => int(11)
[Null] => NO
[2] => NO
[Key] => MUL
[3] => MUL
[Default] =>
[4] =>
[Extra] =>
[5] =>
)
<br/>2<br/>Array
(
[Field] => skill_id_skill
[0] => skill_id_skill
[Type] => int(11)
[1] => int(11)
[Null] => NO
[2] => NO
[Key] => MUL
[3] => MUL
[Default] =>
[4] =>
[Extra] =>
[5] =>
)
<br/>3<br/>Array
(
[Field] => date_insert
[0] => date_insert
[Type] => timestamp
[1] => timestamp
[Null] => NO
[2] => NO
[Key] => MUL
[3] => MUL
[Default] => CURRENT_TIMESTAMP
[4] => CURRENT_TIMESTAMP
[Extra] => on update CURRENT_TIMESTAMP
[5] => on update CURRENT_TIMESTAMP
)
<br/>4<br/>Array
(
[Field] => date_update
[0] => date_update
[Type] => datetime
[1] => datetime
[Null] => NO
[2] => NO
[Key] => MUL
[3] => MUL
[Default] =>
[4] =>
[Extra] =>
[5] =>
)
<br/>0<br/>Array
(
[Field] => num_region
[0] => num_region
[Type] => varchar(3)
[1] => varchar(3)
[Null] => NO
[2] => NO
[Key] => PRI
[3] => PRI
[Default] =>
[4] =>
[Extra] =>
[5] =>
)
<br/>1<br/>Array
(
[Field] => label_region
[0] => label_region
[Type] => varchar(255)
[1] => varchar(255)
[Null] => NO
[2] => NO
[Key] => UNI
[3] => UNI
[Default] =>
[4] =>
[Extra] =>
[5] =>
)
<br/>0<br/>Array
(
[Field] => id_skill
[0] => id_skill
[Type] => int(11)
[1] => int(11)
[Null] => NO
[2] => NO
[Key] => PRI
[3] => PRI
[Default] =>
[4] =>
[Extra] => auto_increment
[5] => auto_increment
)
<br/>1<br/>Array
(
[Field] => code_skill
[0] => code_skill
[Type] => varchar(45)
[1] => varchar(45)
[Null] => YES
[2] => YES
[Key] => UNI
[3] => UNI
[Default] =>
[4] =>
[Extra] =>
[5] =>
)
<br/>2<br/>Array
(
[Field] => label_skill
[0] => label_skill
[Type] => varchar(45)
[1] => varchar(45)
[Null] => YES
[2] => YES
[Key] => UNI
[3] => UNI
[Default] =>
[4] =>
[Extra] =>
[5] =>
)
<br/>3<br/>Array
(
[Field] => desc_skill
[0] => desc_skill
[Type] => varchar(255)
[1] => varchar(255)
[Null] => YES
[2] => YES
[Key] =>
[3] =>
[Default] =>
[4] =>
[Extra] =>
[5] =>
)
<br/>
*/


