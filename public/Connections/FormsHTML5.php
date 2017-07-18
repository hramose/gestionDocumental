<?php
/**
 * Forms html5 1.0
 *
 * los tipos de html5 necesarios para hacer las presentaciones de datos del proyecto
 *
 * @package    FormsPHP
 * @author     wagner cadena <wcadena@outlook.com>
 * @copyright  2015 wagner Cadena
 */
class FormsHTML5 {
	
	private $HEADERS;
	/* @const Default tag. */
	const DEFAULT_TAG = '--';
	/**
	 * Constructor
	 * @param string $logfilename Path and name of the file log.
	 * @param string $separator Character used for separate the field values.
	 */
	function FormsHTML5() {
	}
	
	/**
	 * Function para hacer un boton imput
	 *
	 * Campo Imput typo Text.
	 * 
	 * @param string $campo
	 * @param string $titulo 
	 * @param string $valor 
	 * @param string $requerido 
	 * @param string $type 
	 */
	
	function campoT($campo = "",$titulo = "",$valor="",$requerido=false,$type="text") {
		?>
        <div data-role="fieldcontain"><label for="<?php echo $campo;?>" class="ui-hidden-accessible"><?php echo $titulo;?>:</label>
                            <input type="<?=$type?>" name="<?php echo $campo;?>" id="<?php echo $campo;?>" value="<?php echo ($valor=="" ? "" : $valor)?>" placeholder="<?php echo $titulo;?>" data-theme="a" <?php echo ($requerido ? "required" : "")?> class="form-control" >             
            </div>
        <?php
	}
	function TextareaT($campo = "",$titulo = "",$valor="",$requerido=false,$type="text") {
		?>
        <div data-role="fieldcontain"><label for="<?php echo $campo;?>" class="ui-hidden-accessible"><?php echo $titulo;?>:</label>
                <textarea name="<?php echo $campo;?>" id="<?php echo $campo;?>" placeholder="<?php echo $titulo;?>" rows="6" <?php echo ($requerido ? "required" : "")?> class="form-control" ><?php echo $valor;?></textarea> 
            </div>
        <?php
	}
	function campoG($campo = "",$titulo = "",$valor="",$requerido=false) {
		$this->campoT($campo,$titulo,$valor,$requerido,"text");	
	}
	function campoP($campo = "",$titulo = "",$valor="",$requerido=false) {
		$this->campoT($campo,$titulo,$valor,$requerido,"password");		
	}
}
?>