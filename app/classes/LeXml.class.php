<?php

	require_once 'Zip.class.php';
	
	Class LeXml extends Zip
	{
		
		public function __construct($path)
		{
			parent::__construct($path);
		}
		
		private function le_arquivo()
		{
			$arquivos = $this->get_names();
			foreach($arquivos as $k => $v)
			{
				if($v['type'] == 'xml')
				{
					return $v['name'];
					break;
				}
			}
		}
		
		public function conteudo()
		{			
			$xml = $this->read_a_file(Array('path' => $this->le_arquivo()));
			return $this->parseiaXml($xml);
		}
		
		private function parseiaXml($xml)
		{
			$domxml = @DOMDocument::loadXML($xml);
			return	simplexml_import_dom($domxml);
		}
		
		function __destruct() {}
		
	}
	
?>