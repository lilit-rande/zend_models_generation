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
function in_array_multi($needle, $haystack, $strict = FALSE) {
	foreach ($haystack as $key => $value) {
		if (in_array($needle, $value, $strict)) {			
			return $key;
		}
		else {
			return false;
		}
	}
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
		$table_desc = array();

		$has_references = false;
		$has_dependences = false;

		// generate table names array
		foreach ($tables as $table) {
			$name = $table[0];
			array_push($table_names, $name);
		}
		
		// get each db table description
		foreach ($table_names as $table_name) {

			$table_desc[$table_name]['columns'] = array();
			// $table_desc[$table_name]['phpType'] = array();

			$desc  = $pdo->query("DESCRIBE $table_name");
			
			$create_table_pdo = $pdo->query("SHOW CREATE TABLE $table_name");
			$create_table_result = $create_table_pdo->fetchAll(PDO::FETCH_ASSOC);
			$create_table_result = $create_table_result[0];	// array_values ???
		
			foreach ($desc as $k => $v) {
			
				//	gestion des commentaires				
				$type_str = (strstr($v['Type'], '(', true)) ? strstr($v['Type'], '(', true) : $v['Type'];
				$phpType =  get_type_php(strtoupper($type_str));	

				if ($v['Key'] == 'PRI' ) {
					$primary_key = $v['Field'];
					array_push($table_desc[$table_name]['columns'], array('name' => lcfirst(normalize_name($primary_key)), 'type' => $phpType, 'role' => 'primary', 'database_name' => $v['Field'] ));
				}
				else if ($v['Key'] == 'MUL') {
					$table_desc[$table_name]['references'] = array();

					if($create_table_result['Table'] == $table_name) {					
	 					$subject = $create_table_result['Create Table']; 
	 					
	 					print_r($subject);
	 					// foreign key names 
	 					$pattern = "/CONSTRAINT\s?\`([^\`]*)\`\s?FOREIGN KEY\s?\(\`([^\`]*)\`\)\s?REFERENCES\s?\`([^\`]*)\` \(\`([^\`]*)\`\)\s?(ON DELETE)?\s?(RESTRICT|CASCADE)?\s?(ON UPDATE?)?\s?(RESTRICT|CASCADE)?/";
	 					
	 					// matches[1] = for_key_name, matches[2] = for_key_column_name, matches[3]=referenced table name, matches[4] = referenced column name,
	 					//  matches[5] = ON DELETE , matches[6] = RESTRICT OR CASCADE  matches[6] = ON UPDATE , matches[6] = RESTRICT OR CASCADE
	 					preg_match_all($pattern, $subject, $matches);
	 					
	 					echo '<pre>';
	 					print_r($matches);
	 					echo '</pre>';
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
	
	 							if (isset($matches[5]) && isset($matches[6]) && strlen($matches[5][$i]) && strlen($matches[6][$i]) ) {
	 								$reference_line['action_type_one'] = $matches[5][$i];	// ON DELETE
	 								$reference_line['action_one'] = $matches[6][$i];
	 							}

	 							if (isset($matches[7]) && isset($matches[8]) && strlen($matches[7][$i]) && strlen($matches[8][$i]) ) {
	 								$reference_line['action_type_two'] = $matches[7][$i];	// ON UPDATE
	 								$reference_line['action_two'] = $matches[8][$i];
	 							}	 							
	 							array_push($table_desc[$table_name]['references'], $reference_line);
	 							
	 							// table dependences
		 						$dependence_ligne = array('table_name' => $table_name, 'model_dbtable_name' => "Model_DbTable_" . normalize_name($table_name));

			 					if ( isset($table_desc[$referenced_table_name]['dependences']) ) {
			 						if ( !in_array($dependence_ligne, $table_desc[$referenced_table_name]['dependences'])) {
			 							array_push($table_desc[$referenced_table_name]['dependences'], $dependence_ligne);
			 						}
			 					} else {
			 						$table_desc[$referenced_table_name]['dependences'] = array();
			 					}

			 					if ( in_array($v['Field'], $matches[2]) ) {
			 						if ($v['Field'] == $foreign_key){
			 							$references_same_table = false;
			 							
			 							$type = "Model_" . normalize_name($referenced_table_name);
					 					$in_columns = false;
					 					foreach ($table_desc[$table_name]['columns'] as $col_key => $col_value) {			 					
					 						if ( in_array($v['Field'], $col_value)) {
					 							$in_columns = true;
					 						}					 						
					 						if ($col_value['name'] == $referenced_table_name) {	// pour les tables dont la clé étrangere est une reference vers la table elle meme (ex: memeber has relation)
					 							$referenced_table_name = $v['Field'];
					 							$refereces_same_table = true;
					 						}
					 					}			 					
				 						if (! $in_columns) {
				 							$temp_column = array('name' => $referenced_table_name, 'type' => $type, 'role' => 'foreign', 'database_name' => $v['Field']);
				 							if (isset($refereces_same_table) && $refereces_same_table) {
				 								$temp_column['references_same_table'] = $refereces_same_table;
				 							}
				 							array_push($table_desc[$table_name]['columns'], $temp_column);
					 					}
			 						}
	 							}
		 					}
	 					} else {	//le reste des colonnes-index
  							array_push($table_desc[$table_name]['columns'], array('name' => lcfirst(normalize_name($v['Field'])), 'type' => $phpType, 'database_name' => $v['Field'] ));
 						}

					}
				}
				else {
					array_push($table_desc[$table_name]['columns'], array('name' => lcfirst(normalize_name($v['Field'])), 'type' => $phpType, 'database_name' => $v['Field'] ));
				}	
			} 

	 	}

	 	// models, mappers, dbtables genaration
	 	foreach ($table_names as $table_name) {
	 		$has_references = (isset ($table_desc[$table_name]['references']) && count($table_desc[$table_name]['references']) > 0) ? true : false;
	 		$has_dependences = (isset ($table_desc[$table_name]['dependences']) && count($table_desc[$table_name]['dependences']) > 0) ? true : false;

	 		// MODELS
			$model_content = "<?php" . PHP_EOL
						. generate_doc_comment(array('category' => 'YOUR CATEGORY HERE', 'package'=>'YOUR PACKAGE NAME HERE', 'subpackage'=>'YOUR SUBPACKAGE NAME HERE', 'desc'=>'YOUR DESCRIPTION HERE', 'author'=>'YOUR NAME HERE', 'copyright'=>'COPYRIGHT', 'version'=>'YOUR APPLICATION VERSION HERE', 'since'=>'YOUR APPLICATION CREATION DATE HERE'))
						. "class Model_"
						. normalize_name($table_name) . PHP_EOL . '{';
			// DBTABLES
		 	$dbtable_doc_comment_params = array('category' => 'YOUR CATEGORY HERE', 'package'=>'YOUR PACKAGE NAME HERE', 'subpackage'=>'YOUR SUBPACKAGE NAME HERE', 'desc'=>'YOUR DESCRIPTION HERE', 'author'=>'YOUR NAME HERE', 'copyright'=>'COPYRIGHT', 'version'=>'YOUR APPLICATION VERSION HERE', 'since'=>'YOUR APPLICATION CREATION DATE HERE');
		 	$dbtable_doc_comment = generate_doc_comment($dbtable_doc_comment_params, "DataTable Gateway");
		 	$dbtable_content = "<?php" . PHP_EOL . $dbtable_doc_comment . "class Model_DbTable_"
		 					. normalize_name($table_name) . " extends Zend_Db_Table_Abstract"  . PHP_EOL . "{" . PHP_EOL ;

		 	// the table name / primary key as protected variables
	 		$dbtable_content .= "\tprotected $" . "_name = '" . $table_name . "';" . PHP_EOL;

	 		// MAPPERS
			$mapper_content = "<?php" . PHP_EOL . "class Model_Mapper_" . $table_name . PHP_EOL . "{" . PHP_EOL 
							. "\tconst TABLE_NAME = '$table_name';" . PHP_EOL;
	 		//mapper objectToRow function
	 		$objectToRow_content = ""
						 		.  generate_doc_comment(array('param' =>"Model_" . normalize_name($table_name) . " $" . $table_name, 'return' => 'array' ))
						 		. "\tpublic function objectToRow( Model_" . normalize_name($table_name) . " $" . $table_name ." )" . PHP_EOL . "\t{" . PHP_EOL;
			//mapper rowToObject function
	 		$rowToObject = "";
	 		$rowToObject_content = "";
	 		$rowToObject_fk_content = "";

	 		$rowToObject .= generate_doc_comment(array('param' => 'array', 'return' =>"Model_" . normalize_name($table_name)))
	 					. "\t" . 'public function rowToObject($row)' . PHP_EOL . "\t{" . PHP_EOL;
	 		$rowToObject_content .= "\t\t$" . $table_name . " = new $" . "this->entityClassName;" . PHP_EOL . PHP_EOL 
	 							. "\t\t$" . $table_name;

			$step = 0;
	 		// $model_content .= modelGeneration($table_desc[$table_name]['columns']);
	 		foreach ($table_desc[$table_name]['columns'] as $column) {
	 			$column_name = $column['name'];
	 			$column_type = $column['type'];
	 			if (isset($column['role'])) { $column_role = $column['role']; }
	 			$column_db_name = $column['database_name'];

	 			//model private variables	 			
	 			$model_content .= generate_doc_comment(array('var' => $column_type))
	 						. "\t" . 'private $' . $column_name . ';' . PHP_EOL;

	 			// model getters
	 			$model_content .= generate_doc_comment(array('return' => 'the $' . $column_name))
					 			. "\t" . 'public function get' . ucfirst($column_name) . '()' . PHP_EOL . "\t{" . PHP_EOL
					 			. "\t\treturn $" . "this->" . $column_name . ';' . PHP_EOL
					 			. "\t}" . PHP_EOL;

	 			// model setters
	 			$model_content .= generate_doc_comment(array('param' => $column_type . ' ' .$column_name))
					 			. "\t" . 'public function set' . ucfirst($column_name) . "($" . $column_name . ")" . PHP_EOL . "\t{" . PHP_EOL
					 			. "\t\t" . '$this->' . $column_name . ' = ' . '$' . $column_name . ';' . PHP_EOL
					 			. "\t}" . PHP_EOL;
				
				// dbtable protected variables
		 		if (isset($column['role']) && $column['role'] == 'primary') {
		 			$dbtable_content .= "\tprotected $" . "_primary = '" . $column_name . "';" . PHP_EOL;
		 			$primary_key_name = 'COL_' . strtoupper($column_db_name);
		 			$primary_key = $column_name;
		 		}

		 		// mapper constants
		 		$mapper_content .= "\tconst COL_" . strtoupper($column_db_name) . " = '$column_db_name';" . PHP_EOL;

		 		//mapper objectToRow function
		 		$objectToRow_content .= "\t\t$" . "row[self::COL_" . strtoupper($column_db_name) . "] = $" . $table_name . "->get" . normalize_name($column_name) . "()";
		 		
		 		$tab = $step == 0 ? "" : "\t\t\t\t";
		 		$step++;
		 		if ($has_references && $column_role == 'foreign' ) {
		 			foreach ($table_desc[$table_name]['references'] as $reference_key=>$reference_value) {
		 				if ( $column_db_name == $reference_value['foreign_key'] ){
			 				$objectToRow_content .= '->get' . normalize_name( $reference_value['referenced_column'] ) . '()';

			 				$rowToObjectModel =(isset($column['references_same_table']) && $column['references_same_table'])  ? lcfirst(normalize_name($column['name'])) : $reference_value['referenced_table_name'];
			 				$rowToObject_fk_content .= "\t\t$" . $rowToObjectModel . "Row = $" . "row->findParentRow('" . $reference_value['referenced_model_dbtable_name'] . "', '" . $reference_value['foreign_key_name'] . "');" . PHP_EOL
									 				. "\t\t$" . $rowToObjectModel . "Mapper = new Model_Mapper_" . normalize_name($reference_value['referenced_table_name']) . "();" . PHP_EOL
									 				. "\t\t$" . $rowToObjectModel . " = $" . $reference_value['referenced_table_name'] . "Mapper->rowToObject($" . $rowToObjectModel . "Row);" . PHP_EOL . PHP_EOL;
							$rowToObjectCol = '$' . $rowToObjectModel;
			 			}
		 			}
		 		} else {
		 			$rowToObjectCol = '$row[self::COL_' . strtoupper($column_db_name) . ']';
		 		}
		 		$objectToRow_content .= ';' . PHP_EOL;				
		 		$eol = $step < count($table_desc[$table_name]['columns']) ? PHP_EOL : ";" . PHP_EOL;
		 		$rowToObject_content .= $tab . "->set" . normalize_name($column_name) . "($rowToObjectCol)" . $eol;
	 		}
	 		$model_content .= "}";
	 		$objectToRow_content .= PHP_EOL . "\t\treturn $" . $table_name . ";" . PHP_EOL . "\t}" . PHP_EOL;
	 		
	 		// table references
	 		if ($has_references) {
	 			$ref_table_size = 0;
	 			$dbtable_content .= "\tprotected $" . "_referenceMap = array(". PHP_EOL;

	 			foreach ($table_desc[$table_name]['references'] as $ref_key => $ref_value) {
	 				$dbtable_content .= "\t\t'" . $ref_value['foreign_key_name'] . "' => array(" . PHP_EOL
					 				. "\t\t\t'columns' => array('". $ref_value['foreign_key'] ."')," . PHP_EOL
					 				. "\t\t\t'refTableClass' => '" . $ref_value['referenced_model_dbtable_name'] . "'," . PHP_EOL
					 				. "\t\t\t'refColumns' => array('". $ref_value['referenced_column'] ."')," . PHP_EOL;
			
	 				if ( isset($ref_value['action_type_one']) && strlen($ref_value['action_type_one']) > 0 ) {
	 					$dbtable_content .= "\t\t\t'" . $ref_value['action_type_one'] . "' => self::" . $ref_value['action_one'] . "," . PHP_EOL;
	 				}
	 				if ( isset($ref_value['action_type_two']) && strlen($ref_value['action_type_two']) > 0 ) {
	 					$dbtable_content .= "\t\t\t'" . $ref_value['action_type_two'] . "' => self::" . $ref_value['action_two'] . "," . PHP_EOL;
	 				}			
					$dbtable_content .= "\t\t)," . PHP_EOL;
	 			}
	 			$dbtable_content .= "\t);". PHP_EOL;
	 		}

	 		// table dependences
	 		if ( $has_dependences ) {
	 			$depTables = "";
	 			foreach ($table_desc[$table_name]['dependences'] as $dep_key => $dep_value) {
	 				// concatenate dependent tables names for generate ligne as 
	 				// protected $_dependentTables = array('depTableName1', 'depTableName2', ...);
	 				$depTables .= strlen($depTables) > 0 ? ", '" . $dep_value['model_dbtable_name'] . "'" : "'" . $dep_value['model_dbtable_name'] . "'" ;	
	 			}
	 			$dbtable_content .= "\tprotected $" . "_dependentTables = array(" . $depTables . ");" . PHP_EOL;
	 		}
	 		$dbtable_content .= "}" . PHP_EOL;
	 		
	 		// mapper private variables
	 		$mapper_content .= PHP_EOL . "\tprivate $" . "dbtable;" . PHP_EOL
					 		. "\tprivate $" . "tableClassName = 'Model_DbTable_" . normalize_name($table_name) . "';" . PHP_EOL
					 		. "\tprivate $" . "entityClassName = 'Model_" . normalize_name($table_name) . "';" . PHP_EOL . PHP_EOL;
	 		//mapper dbTable getter
	 		$mapper_content .= generate_doc_comment(array('return' =>"Model_DbTable_" . normalize_name($table_name)))
					 		. "\tpublic function getDbTable()" . PHP_EOL . "\t{" . PHP_EOL
					 		. "\t\tif (null === $" . "this->dbTable ) {" . PHP_EOL
					 		. "\t\t\t$" . "this->dbTable = new $" . "this->tableClassName;" . PHP_EOL
					 		. "\t\t}" . PHP_EOL
					 		. "\t\treturn $" . "this->dbTable;" . PHP_EOL
					 		. "\t}" . PHP_EOL;
	 		//mapper dbTable setter
	 		$mapper_content .= generate_doc_comment(array('param' =>"dbTable"))
					 		. "\tpublic function setDbTable($" . "dbTable" . ")" . PHP_EOL . "\t{" . PHP_EOL
					 		. "\t\t$" . "this->dbTable = $" . "dbTable;" . PHP_EOL
					 		. "\t}" . PHP_EOL;
	 		//mapper objectToRow function
	 		$mapper_content .= $objectToRow_content;
	 		
	 		//mapper rowToObject function
	 		$rowToObject_content .= PHP_EOL . "\t\treturn $" . $table_name . ';' . PHP_EOL . "\t}". PHP_EOL ;
	 		$rowToObject .= $rowToObject_fk_content . $rowToObject_content;
	 		$mapper_content .= $rowToObject;

	 		$find_function = generate_doc_comment(array('param' => 'unknown_type $id', 'return' => 'boolean|unknown'))
					 		. "\t" . 'public function find($id)' . PHP_EOL
					 		. "\t{" . PHP_EOL
					 		. "\t\t" . '$rowSet = $this->getDbTable()->find($id);' . PHP_EOL
					    	. "\t\t" .'$row = $rowSet->current();' . PHP_EOL
					    	. "\t\t" .'if ( 0 == count($row)) {' . PHP_EOL
					    	. "\t\t\t\t" . 'return false;' . PHP_EOL
					    	. "\t\t" .'}' . PHP_EOL
					    	. "\t\t" .'return $this->rowToObject($row);' . PHP_EOL
					 		. "\t}" . PHP_EOL;
	 		$fetchAll_function = generate_doc_comment(array('return' => "multitype:Model_" . normalize_name($table_name)))
							. "\t" . 'public function fetchAll($where = null, $order = null, $count = null, $offset = null)' . PHP_EOL
							. "\t" . '{' . PHP_EOL
							. "\t\t" . '$row = array();' . PHP_EOL
							. "\t\t" . '$rowSet = $this->getDbTable()->fetchAll($where = null, $order = null, $count = null, $offset = null);' . PHP_EOL
							. "\t\t" . 'foreach ( $rowSet as $value) {' . PHP_EOL
							. "\t\t\t\t" . '$row[] = $this->rowToObject($value);' . PHP_EOL
							. "\t\t" . '}' . PHP_EOL
							. "\t\t" . 'return $row;' . PHP_EOL
							. "\t" . '}' . PHP_EOL;

	 		$mapper_content .= $find_function;
	 		$mapper_content .= $fetchAll_function;
   			
   			if ( isset($primary_key_name) ) {
   				$save_funciton = generate_doc_comment(array('param' => "Model_" . normalize_name($table_name) . ' $' .$table_name))
				   				. "\t" . 'public function save (Model_' . normalize_name($table_name) . ' $' .$table_name . ')' . PHP_EOL
								. "\t" . '{' . PHP_EOL
								. "\t\t" . '$row = $this->objectToRow(' . $table_name . ');' . PHP_EOL
								. "\t\t" . 'try{' . PHP_EOL
								. "\t\t\t" . 'if ( 0 === (int) $row[self::' . $primary_key_name . ']) {' . PHP_EOL
								. "\t\t\t\t" . 'unset($row[self::' . $primary_key_name . ']);' . PHP_EOL	
								. "\t\t\t\t" . 'return $this->getDbTable()->insert($row);' . PHP_EOL
								. "\t\t\t" . '} else {' . PHP_EOL
								. "\t\t\t\t" . '$where = array(self::' . $primary_key_name . ' . \' = ?\' => $row[self::' . $primary_key_name . ']);' . PHP_EOL
								. "\t\t\t\t" . 'return $this->getDbTable()->update($row, $where);' . PHP_EOL
								. "\t\t\t" . '}' . PHP_EOL
								. "\t\t" . '} catch (Zend_Db_Statement_Exception $e) {' . PHP_EOL
								. "\t\t\t" . '// YOUR ERROR VERIFICATION HERE' . PHP_EOL
								. "\t\t\t" . '$message = "YOUR ERROR MESSAGE HERE";' . PHP_EOL
								. "\t\t\t" . 'throw new DomainException($message);' . PHP_EOL
								. "\t\t" . '}' . PHP_EOL
								. "\t" . '}' . PHP_EOL;
				$delete_function = generate_doc_comment(array('param' => normalize_name($table_name) . ' $' .$table_name, 'throws' => 'InvalidArgumentException'))
								. "\t" . 'public function delete($'. $table_name .'){' . PHP_EOL
								. "\t\t" . 'if ( $'. $table_name .' instanceof $this->entityClassName ) {' . PHP_EOL
								. "\t\t\t" . '$id = $'. $table_name .'->get' . normalize_name($primary_key) . '();' . PHP_EOL
								. "\t\t" . '} else if ( is_int($'. $table_name .') ) {' . PHP_EOL
								. "\t\t\t" . '$id = $'. $table_name .';' . PHP_EOL
								. "\t\t" . '} else {' . PHP_EOL
								. "\t\t\t" . 'throw new InvalidArgumentException("$'. $table_name .' must be an instance of $this->entityClassName or an integer");' . PHP_EOL
								. "\t\t" . '}' . PHP_EOL
								. "\t\t" . '$where = array(self::' . $primary_key_name . ' . \' = ?\' => $id);' . PHP_EOL
								. "\t\t" . 'return  (bool)$this->getDbTable()->delete($where);' . PHP_EOL
								. "\t" . '}' . PHP_EOL;		
		 		$mapper_content .= $save_funciton;
		 		$mapper_content .= $delete_function;
			}

	 		$mapper_content .= "}" . PHP_EOL;

		 	// create files	
		 	$model_creation_success = false;
		 	$mapper_creation_success = false;
		 	$dbtable_creation_success = false;

	 		try {	 
				if ($handle = file_put_contents (MODEL_PATH . DS . normalize_name($table_name) . '.php', $model_content) ) { $model_creation_success = true; }
				if ($handle = file_put_contents (MAPPER_PATH . DS . normalize_name($table_name) . '.php', $mapper_content) ) { $mapper_creation_success = true; }
				if ($handle = file_put_contents (DBTABLE_PATH . DS . normalize_name($table_name) . '.php', $dbtable_content) ) { $dbtable_creation_success = true; }
			}
	 		catch (Exception $e) {
				generateJSMessage('Erreur de création ou d\'écriture dans le fichier ' . $e->getMessage());
				die ();
	 		}
	 	}
	 	
	 	if ($model_creation_success) { appendJSMessage('Models has been successfully created at ' . MODEL_PATH); }
	 	if ($mapper_creation_success) { appendJSMessage('Mappers has been successfully created at ' . MAPPER_PATH); }
	 	if ($dbtable_creation_success) { appendJSMessage('DbTables has been successfully created at ' . DBTABLE_PATH); }

	}
	catch (Exception $e)
	{
		generateJSMessage('Connexion impossible : ' . $e->getMessage());
		die ();
	}
}