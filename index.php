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
	document.getElementById("message").innerHTML += \'' . str_replace("'", "\'", $message) . '\';
	</script>';
}
function generateJSMessage($message) {
	echo '<script language="JavaScript" type="text/javascript">
	document.getElementById("message").innerHTML = \'' . str_replace("'", "\'", $message) . '\';
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
if (isset($_POST['submit'])) {

	$message = "";
	foreach ($_POST as $post_key => $post_value) {
		
		if ( $post_value == '' ) {
			$message .= 'Please enter your ' . $post_key . '.<br />';
		}
		generateJSMessage($message);
	}	

	extract($_POST, EXTR_SKIP);

	define('DS', DIRECTORY_SEPARATOR);
	define('PS', PATH_SEPARATOR);
	define('ROOT_PATH', dirname(dirname(__FILE__)));
	define('DB_PATH', dirname(__FILE__) . DS . 'models');
	define('MODEL_PATH', DB_PATH . DS . 'models');
	define('DBTABLE_PATH', MODEL_PATH . DS . 'DbTable');
	define('MAPPER_PATH', MODEL_PATH . DS . 'mappers');

	set_include_path(
	ROOT_PATH . PS .
	MODEL_PATH . PS .
	get_include_path()
	);

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
		$model_content = "<?php" . PHP_EOL . "class Model_";
		$mapper_content = "&lt;?php" . PHP_EOL . "class Model_Mapper_";
		
		$matches = array();
		$matches_fk = array();
		
		$pdo_select = "";
		$pdo_from = "";
		$pdo_where = "";
		
		$primary_key = "";
		$foreign_key = "";
		$references_test = array();

		$references = array();
		
		$referenced_table_name = "";
		$referenced_column = "";
		
		$table_has_dependences = array();
		$dependent_table_list = array();
		
		// generate table names array
		foreach ($tables as $table) {
			$name = $table[0];
			array_push($table_names, $name);
		}
		
		// get each db table description
		foreach ($table_names as $table_name) {
			$table_desc[$table_name]['rowToObject_foreign_content'] = array();
			$foreign_keys_list = "";
			$referenced_columns_list = "";
			$referenced_tables_list = "";
			$model_dbtables_list = "";		
			
			$hasReferences = false;
			$hasDependences = false;
			
			$desc  = $pdo->query("DESCRIBE $table_name");
			
			$create_table_pdo = $pdo->query("SHOW CREATE TABLE $table_name");
			$create_table_result = $create_table_pdo->fetchAll(PDO::FETCH_ASSOC);
			$create_table_result = $create_table_result[0];	// array_values ???
		
			$model_content .= normalize_name($table_name) . PHP_EOL . "{" . PHP_EOL ;
			$mapper_content .= normalize_name($table_name) . PHP_EOL . "{" . PHP_EOL ;

			// the mapper's table name
			$mapper_content .= "\tconst TABLE_NAME = '$table_name';" . PHP_EOL;
			
			$mapper_constants_list = "";
			
			$objectToRow_comment = generate_doc_comment(array('param'=> 'Model_' .  normalize_name($table_name) . ' $' . $table_name, 'return'=>'$row'));
			$objectToRow_content = $objectToRow_comment . "\t" . 'public function objectToRow(Model_' . normalize_name($table_name) . ' $' . $table_name .  ')' . PHP_EOL . "\t{" . PHP_EOL;
			
			$rowToObject_comment = generate_doc_comment(array('param'=>'$row', 'return'=> 'Model_' .  normalize_name($table_name) . ' $' . $table_name));
			$rowToObject_content = $rowToObject_comment . "\t" . 'public function rowToObject ($row)' . PHP_EOL . "\t{" . PHP_EOL;
			$rowToObject_content .= "\t\t".'$user = new $this->entityClassName;' . PHP_EOL;
			foreach ( $table_desc[$table_name]['rowToObject_foreign_content'] as $row) {
				$rowToObject_content .= $row;
			}
			$rowToObject_content .= "\t\t".'$user';		
				
			
			foreach ($desc as $k => $v) {
				if ($v['Key'] == 'PRI' ) {
					$primary_key = $v['Field'];
					$table_desc[$table_name]['primary'] = $primary_key;
				}
				
				if ($v['Key'] == 'MUL') {
					$hasReferences = true;
					$references[$table_name] = array();
					
					$foreign_key = $v['Field'];
					$foreign_keys_list .= strlen($foreign_keys_list) > 0 ? ", '$foreign_key'" : "'$foreign_key'" ;
				
					if($create_table_result['Table'] == $table_name) {					
	 					$subject = $create_table_result['Create Table']; 
	 			
	 					// foreign key names 
	 					$p = "/CONSTRAINT\s?\`([^\`]*)\`\s?FOREIGN KEY\s?\(\`([^\`]*)\`\)\s?REFERENCES\s?\`([^\`]*)\` \(\`([^\`]*)\`\)/";
	 					//CONSTRAINT `fk_member_has_skill_member1` FOREIGN KEY (`id_member`) REFERENCES `member` (`id_member`) ON DELETE NO ACTION ON UPDATE NO ACTION,
	 					
	 					// matches[1] = for_key_name, matches[2] = for_key_column_name, matches[3]=referenced table name, matches[4] = referenced column name
	 					preg_match($p, $subject, $matches); 	
	 					 					
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
		 					
		 					array_push($table_desc[$table_name]['foreign_key'], $foreign_key_name);
		 					
		 					$referenced_columns_list .= strlen($referenced_columns_list) > 0 ? ", '$referenced_column'" : "'$referenced_column'" ;
		 					$referenced_tables_list .= strlen($referenced_tables_list) > 0 ? ", '$referenced_table_name'" : "'$referenced_table_name'" ;
		 					
		  					$model_dbtables_list .= strlen($model_dbtables_list) > 0 ? ", 'Model_DbTable_" . normalize_name($referenced_table_name) . "'" : "'Model_DbTable_" . normalize_name($referenced_table_name) . "'" ;
		 					array_push($references_test[$table_name], array('referenced_columns_list' => $referenced_columns_list, 'model_dbtables_list' => $model_dbtables_list, 'referenced_table_name' => $referenced_table_name, 'foreign_keys_list' => $foreign_keys_list));
		 					
		 					$dependent_table_list[$referenced_table_name] = array();
							$table_has_dependences[$referenced_table_name] = array();
		
		 					array_push($table_has_dependences[$referenced_table_name], $table_name); 					
		 					array_push($dependent_table_list[$referenced_table_name], 'Model_DbTable_' . normalize_name($table_name));
	 					}
					}
				}

				// models generation							
				if ($foreign_key == $v['Field']) {
					if (isset($referenced_table_name)) {
						//private variable comment
						$php_type = "Model_" . normalize_name($referenced_table_name);
						
						//private variable name
						$private_variable = $referenced_table_name;
					
						$rowToObject_foreign_content = "\t\t$" . $private_variable . 'Row = $row->findParentRow(\'Model_DbTable_' . normalize_name($private_variable) . '\', \'' . $foreign_key_name . '\');' .PHP_EOL  ;
						$rowToObject_foreign_content .= "\t\t$" . $private_variable . 'Mapper = new Model_Mapper_' . normalize_name($private_variable) . '();' .PHP_EOL;
						$rowToObject_foreign_content .= "\t\t$" . $private_variable . ' = $' . $private_variable . 'Mapper->rowToObject($'. $private_variable .'Row);' .PHP_EOL;

						array_push($table_desc[$table_name]['rowToObject_foreign_content'], $rowToObject_foreign_content);
					}
					
					
				} else {
					//private variable comment
					$type_str = (strstr($v['Type'], '(', true)) ? strstr($v['Type'], '(', true) : $v['Type'];			
					$php_type = get_type_php(strtoupper($type_str));
					
					//private variable name
					$private_variable = lcfirst(normalize_name($v['Field']));
				}

				// generate model documentation comment like /** *@var type */
				$model_content .= generate_doc_comment( array('var'=>$php_type));
				
				// generate private variables
				$model_content .= "\t" . 'private $' . $private_variable . ';' . PHP_EOL;

				// generate model getters
				$model_content .= generate_doc_comment( array ('return '=>$private_variable));	// comment
				$model_content .= "\t" . 'public function get' . ucfirst($private_variable) . '()' .PHP_EOL ;	
	 			$model_content .= "\t" . '{' . PHP_EOL;
	 			$model_content .= "\t\t" . 'return $this->' . $private_variable . ';' . PHP_EOL;
	 			$model_content .= "\t" . '}' . PHP_EOL;
				
	 			// generate model setters
	 			$model_content .= generate_doc_comment(array ('param ' => $php_type . ' ' . $private_variable));
	 			$model_content .= "\t" . 'public function set' . ucfirst($private_variable) .'($' . $private_variable . ')' . PHP_EOL;
	 			$model_content .= "\t" . '{' . PHP_EOL;
	 			$model_content .= "\t\t" . '$this->' . $private_variable .' = $' .$private_variable . ';' . PHP_EOL;
	 			$model_content .= "\t\t" . 'return $this;' . PHP_EOL;
	 			$model_content .= "\t" . '}' . PHP_EOL;
	 			
	 			//mapper's generation
	 			// mapper's constants and private variables generation	
	 			$mapper_constants_list .= "\tconst COL_" . strtoupper($v['Field']) . " = '" . $v['Field'] . "';" . PHP_EOL;
	 	
	 			//objectToRow generation
	 			$objectToRow_content .= "\t\t" . '$row[self::COL_' . strtoupper($v['Field']) . '] = $' . $table_name . '->get' . ucfirst($private_variable) . '()';
	 			
	 			if ( isset ($referenced_column) && isset ($referenced_table_name) && $private_variable == $referenced_table_name ) {
	 				$objectToRow_content .= '->get' . normalize_name( $referenced_column ) . '()';
	 			}
	 			
	 			$objectToRow_content .= ';' . PHP_EOL;
	 			
	 			$rowToObject_content .= "\t\t\t\t" . '->set' . normalize_name( $v['Field'] ) . '($row[self::COL_' . strtoupper($v['Field']) .'])' . PHP_EOL;
	 			if ( isset ($referenced_column) && isset ($referenced_table_name) && $private_variable == $referenced_table_name ) {
	 				$rowToObject_content .= "\t\t\t\t" . '->set' . normalize_name( $referenced_column ) . '($' . $referenced_column . ')' . PHP_EOL;
	 			}
	 			
			} 
			
			$f="";
			if(isset($table_desc[$table_name]['foreign_key'])) { $f = $table_desc[$table_name]['foreign_key']; }
			$objectToRow_content .= "\t\treturn $" . "row;" . PHP_EOL;
			$objectToRow_content .= "\t}" . PHP_EOL;

			$rowToObject_content .= ";\t\t".'return $' . $table_name . ';' .PHP_EOL;
			$rowToObject_content .= "\t}" . PHP_EOL;

			$mapper_content .= $mapper_constants_list;
			
			// mapper private variables
			$mapper_content .= generate_doc_comment(array('var' => 'Model_DbTable_' . normalize_name($table_name)));
			$mapper_content .= "\t" . 'private $dbTable;' . PHP_EOL;
			
			$mapper_content .= generate_doc_comment(array('var' => 'string'));
			$mapper_content .= "\t" . 'private $tableClassName = \'Model_DbTable_' . normalize_name($table_name) . "';" . PHP_EOL;
			
			$mapper_content .= generate_doc_comment(array('var' => 'string'));
			$mapper_content .= "\t" . 'private $entityClassName = \'Model_' . normalize_name($table_name) . "';" . PHP_EOL;
					
			// mapper getDbTable function
			$mapper_content .= generate_doc_comment(array('return' => 'Model_DbTable_' . normalize_name($table_name)));
			$mapper_content .= "\t" . 'public function getDbTable()' . PHP_EOL . "\t{" . PHP_EOL;
			$mapper_content .= "\t\t" . 'if (null === $this->dbTable) {' . PHP_EOL;
			$mapper_content .= "\t\t\t" . '$this->dbTable = new $this->tableClassName;' . PHP_EOL . "\t\t}" . PHP_EOL;
			$mapper_content .= "\t\t" . 'return $this->dbTable;' . PHP_EOL;
			$mapper_content .= "\t}" . PHP_EOL;
			
			$mapper_content .= $objectToRow_content;

			$mapper_content .= $rowToObject_content;
	//		echo $mapper_content;
			$model_content .= "}" . PHP_EOL ;
			$mapper_content .= "}" . PHP_EOL ;
				
			// create files	
	 	// 	try {	 
			// 	$handle = file_put_contents (MODEL_PATH . DS . ucfirst($table_name) . '.php', $model_content);
			// 	$handle = file_put_contents (MAPPER_PATH . DS . ucfirst($table_name) . '.php', $mapper_content);
			// 	$model_content = "<?php" . PHP_EOL . "class Model_";
			// 	$mapper_content = "&lt;?php" . PHP_EOL . "class Model_Mapper_";
			// }
	 	// 	catch (Exception $e) {
			// 		generateJSMessage('Erreur de création ou d\'écriture dans le fichier ' . $e->getMessage());
			// 		die ();
	 	// 	}
	 	}
	 	 	
		//dbtables generation
	 	$dbtable_doc_comment_params = array('category' => 'YOUR CATEGORY HERE', 'package'=>'YOUR PACKAGE NAME HERE', 'subpackage'=>'YOUR SUBPACKAGE NAME HERE', 'desc'=>'YOUR DESCRIPTION HERE', 'author'=>'YOUR NAME HERE', 'copyright'=>'COPYRIGHT', 'version'=>'YOUR APPLICATION VERSION HERE', 'date'=>'YOUR APPLICATION CREATION DATE HERE');

	 	$dbtable_doc_comment = generate_doc_comment($dbtable_doc_comment_params, "DataTable Gateway");
	 	$dbtable_content = "<?php" . PHP_EOL . $dbtable_doc_comment . "class Model_DbTable_";
	 	
	 	foreach ($table_names as $table_name) {
	 
	 		$dbtable_content .= normalize_name($table_name) . " extends Zend_Db_Table_Abstract"  . PHP_EOL . "{" . PHP_EOL ;

	 		// the table name / primary key as protected variables
	 		$dbtable_content .= "\tprotected $" . "_name = '" . $table_name . "';" . PHP_EOL;
	 		
	 		// TODO for views
	 		if (isset($table_desc[$table_name]['primary'])) {
	 			$dbtable_content .= "\tprotected $" . "_primary = '" . $table_desc[$table_name]['primary'] . "';" . PHP_EOL;
	 		}
	 		
	 		if (isset ($references_test[$table_name])) {
	 			foreach($references_test[$table_name] as $ref_key => $ref_value){ 			
					$dbtable_content .= "\tprotected $" . "_referenceMap = array(". PHP_EOL;
				//	$dbtable_content .= "\t\t'FK_" . $table_name . "_" . $ref_value['referenced_table_name'] . "' => array (" . PHP_EOL;	
					if (isset($table_desc[$table_name]['foreign_key'])) {
						$dbtable_content .= "\t\t'" .ucfirst($table_desc[$table_name]['foreign_key']) . "' => array (" . PHP_EOL;
					}
					$dbtable_content .=	"\t\t\t'columns' => array(" . $ref_value['foreign_keys_list'] . ")," . PHP_EOL;
					$dbtable_content .= "\t\t\t'refTableClass' =>" . $ref_value['model_dbtables_list'] . "," . PHP_EOL;
					$dbtable_content .= "\t\t\t'refColumns' => array(" . $ref_value['referenced_columns_list'] . ")," . PHP_EOL;
					 					
					// TODO
					$dbtable_content .= "\t\t\t'onDelete' => self::RESTRICT," . PHP_EOL;
					$dbtable_content .= "\t\t\t'onUpdate' => self::CASCADE" . PHP_EOL;
					 					
					$dbtable_content .= "\t\t)". PHP_EOL;
					$dbtable_content .= "\t);". PHP_EOL;
	 			}
	 		}
	 		
	 		if (array_key_exists($table_name, $table_has_dependences)) {
	 			$dbtable_content .= "\tprotected $" . "_dependentTables = array('" . implode('\', \'',$table_has_dependences[$table_name]) . "');". PHP_EOL ;
	 		}
	 		
	 		$dbtable_content .= '}'. PHP_EOL ;
	 		
	//  		echo $dbtable_content;
	  		
	  		// create files
			// try {
			// 	$handle = file_put_contents (DBTABLE_PATH . DS . ucfirst($table_name) . '.php', $dbtable_content);
			// 	//		$handle = file_put_contents (MAPPER_PATH . DS . ucfirst($table_name) . '.php', $mapper_content);
			// 	$dbtable_content = "<?php" . PHP_EOL . $dbtable_doc_comment . "class Model_DbTable_";
			// }
			// catch (Exception $e) {
			// 		generateJSMessage('Erreur de création ou d\'écriture dans le fichier ' . $e->getMessage());
			// 	die ();
	 	// 	}
	 	}
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


