<?php
	
	class Zip
	{
		
		private $path;
		private $zip;
		private $read_ok = false;
		private $file;
		private $memo_limit = 820000000;
		
		//Tamanho do arquivo que está dentro do zip e que foi lido.
		public $compressed_filesize;
		
		
		/**
		*	Construtor
		*	
		*	@param	{string}	path	Caminho do .zip
		*	@return	{none}
		*
		*/
		public function __construct($path,$path_temp='')
		{
			$this->path = $path;
			$this->open();
		}
		
		/**
		*	Abre o arquivo
		*	
		*	@param	
		*	@return	
		*/
		private function open()
		{
			$this->zip = zip_open($this->path);
			
			if(is_resource($this->zip)) $this->read_ok = true;
		}
		
		/**
		*	Lê o arquivo
		*	
		*	@param	
		*	@return	
		*/
		private function explore_files()
		{
			do 
			{
				$entry = zip_read($this->zip);
				if($entry) $this->file[] = $entry;
            } 
			while($entry);
		}
		
		/**
		*	Lista os nomes dos arquivos, diretórios e respectivos tamanhos dentro de um arquivo .zip
		*	
		*	@return	{array}		$list[i]['name'] -> Nome, $list[i]['type'] -> Tipo (jpg, xml, txt, etc), $list[i]['size'] -> Tamanho do arquivo
		*/
		public function get_names()
		{
			$this->explore_files();
			$list = Array();
			$c=0;
			foreach($this->file as $value) 
			{
				$list[$c]['name']	= zip_entry_name($value);
				$list[$c]['type']	= pathinfo($list[$c]['name'], PATHINFO_EXTENSION);
				$list[$c]['size'] 	= zip_entry_filesize($value);
				$c++;
			}
			
			return $list;
		}
		
		/**
		*	Lê o conteúdo de um arquivo dentro do .zip
		*	
		*	@param		{array}		param		$param['path'] é o caminho interno do .zip Ex: partido/SP/DespesasPartidos.txt, 
		*										$param['resource'] é o identificador do arquivo pode-se utilizar um ou outro parâmetro
		*	@return		{string}					O Conteúdo do arquivo
		*	
		*/
		public function read_a_file($param = Array(),$exit_type = '')
		{
			$this->explore_files();
			if(empty($param['resource']))
			{
				$resource = $this->find_file($param['path']);
			}
			else
			{
				$resource = $this->file[$param['resource']];
			}
			
			$memo 		= zip_entry_filesize($resource);
			$this->compressed_filesize 	= $memo;
			
			if($memo <= $this->memo_limit)
			{
				if($exit_type == 'line_by_line')
				{
					$result = zip_entry_read($resource,$memo);
					preg_match_all('/(.*)\n/',$result,$return);
					return $return[0];
				}
				else
				{
					return zip_entry_read($resource,$memo);
				}
				
			}
			else
			{
				return Array('Error'=>'Memory Limit','Max Memory'=>$this->memo_limit,'File size'=>$memo);
			}
			
			
			/** Aplicar futuramente para arquivos maiores que o limite de memoria
			while($memo > 0)
			{
				$readSize = min($memo,10240);
				$memo -= $readSize;
				$content = zip_entry_read($resource, $readSize);
				if ($content !== false) echo $content;
			}
			*/
			
		}
		
		/**
		*	Busca o identificador do arquivo baseado em seu nome
		*	
		*	@param	{string}		param	Caminho do arquivo dentro do .zip (considerando diretórios)
		*	@return	{object}				identificador do arquivo dentro do.zip
		*	
		*/
		protected function find_file($param)
		{
			foreach($this->file as $value)
			{
				if(zip_entry_name($value) == $param)
				{
					return $value;
					break;
				}
			}
		}
		
		/**
		*	Detalhes do arquivo
		*	
		*	@param	
		*	@return	
		*	
		*/
		public function file_details()
		{
			
		}
		
		
		/**
		*	Divide grandes arquivos em menores
		*	
		*	@param	
		*	@return	
		*	
		*/
		private function partition_big_files()
		{
			
		}
		
	}
	
?>