<?php
	
	Class Help extends Main
	{
		public function __construct( $config ){
			
			//	Service instance for internal class use
			parent::__construct(
				$config
			);
		}

		public function info()
		{
			return Array(
				/* 
					
					Config
					
				 */
				'config' => '
					<h2>Configs</h2>
					<p>Supose your domais is http://www.your_domain.com and the folder with Lili Framework is api/ </p>
					<p>To config the framework just edit config.php file into root directory</p>
					<p class="example fa fa-leanpub"><span>Example:</span></p>
					<pre>
//	Main defs
$config->base		= "http://www.your_domain.com/api/";
$config->path		= "/api/";
$config->name		= "Admin System";
$config->site 		= "http://www.your_domain.com";

//	DB
define( "DB_HOST" , "host_name" );
define( "DB_USER" , "user_name" );
define( "DB_PASS" , "password" );
define( "DB_NAME" , "database_name" );

//	Debug
define( "ERROR_REPORTING" , 0 ); // Hide code errors</pre>
					<p>In case your project not use database, just keep DB_HOST, DB_USER, DB_PASS and DB_NAME empty with "".</p>
					<p class="example fa fa-leanpub"><span>Example:</span></p>
					<pre>
//	Main defs
$config->base		= "http://www.your_domain.com/api/";
$config->path		= "/api/";
$config->name		= "Admin System";
$config->site 		= "http://www.your_domain.com";

//	DB
define( "DB_HOST" , "" );
define( "DB_USER" , "" );
define( "DB_PASS" , "" );
define( "DB_NAME" , "" );

//	Debug
define( "ERROR_REPORTING" , 1 ); // Show code errors</pre>
<h3>Show configs through the api</h3>
<p>You can see the configs by url:</p>
<p>http://www.your_domain.com/api/?class=configs&method=info</p>
<p><strong>Obs: </strong><em>configs/info method doesn\'t return secret data like passwords, database names and so on.</em></p>
				',
				/* 
					
					
					
				 */
				'structure' => '
					<h2>API structure</h2>
					<ul>
						<li class="fa fa-folder-open-o">
							app
							<ul>
								<li class="fa fa-folder-open-o">
									classes
								</li>
								<li class="fa fa-folder-open-o">
									configs
									<ul>
										<li class="fa fa-file-text-o"><span>index.php</span></li>
									</ul>
								</li>
								<li class="fa fa-folder-open-o">
									getform 
									<ul>
										<li class="fa fa-file-text-o"><span>index.php</span></li>
									</ul>
								</li>
								<li class="fa fa-folder-open-o">
									help 
									<ul>
										<li class="fa fa-file-text-o"><span>index.php</span></li>
									</ul>
								</li>
							</ul>
						</li>
						<li class="fa fa-folder-open-o">
							config
							<ul>
								<li class="fa fa-file-text-o"><span>index.php</span></li>
								<li class="fa fa-file-text-o"><span>config.php</span></li>
							</ul>
						</li>
						<li class="fa fa-folder-open-o">
							core
							<ul>
								<li class="fa fa-file-text-o"><span>index.php</span></li>
								<li class="fa fa-file-text-o"><span>main.php</span></li>
							</ul>
						</li>
						<li class="fa fa-folder-open-o">
							services
							<ul>
								<li class="fa fa-file-text-o"><span>index.php</span></li>
								<li class="fa fa-file-text-o"><span>Base.class.php</span></li>
								<li class="fa fa-file-text-o"><span>Form.class.php</span></li>
								<li class="fa fa-file-text-o"><span>Image.class.php</span></li>
								<li class="fa fa-file-text-o"><span>Query.class.php</span></li>
								<li class="fa fa-file-text-o"><span>Services.class.php</span></li>
								<li class="fa fa-file-text-o"><span>Utils.class.php</span></li>
							</ul>
						</li>
						<li class="fa fa-file-text-o"><span>index.php</span></li>
					</ul>
					<h4>Structure explanation</h4>
					<p>
						<ul>
							<li class="fa fa-check"><strong>App</strong> folder contains your aplication\'s files.</li>
							<li class="fa fa-check"><strong>App/classes</strong> is a general class folder that serves all app folders.</li>
							<li class="fa fa-check"><strong>App/configs</strong> returns config data.</li>
							<li class="fa fa-check"><strong>App/getform</strong> and <strong>App/help</strong> are app\'s examples.</li>
							<li class="fa fa-check"><strong>Config/config.php</strong> contains your aplication\'s config like DB data, paths and so on.</li>
							<li class="fa fa-check"><strong>Core</strong> contains extensible <strong>Main.php</strong> class. This class must be used in all <strong>App</strong> files</li>
							<li class="fa fa-check"><strong>Services</strong> folder contains the API tools to a fast development.</li>
							<li class="fa fa-check"><strong>index.php</strong> root file contains the routes, validations and so on.</li>
						</ul>
					</p>
				',
				/* 
					
					Examples
					
				 */
				'examples' => '
					<h2>How to call the API.</h2>
					<p>http://www.your_domain.com/api/?class=help&method=menu</p>
					<p><strong>class=</strong> must be the folder name and Class name inside /app/[folder]/index.php file, <strong>method=</strong> is the method inside class.</p>
					<p>You can consider [folder]/index.php as a kind of controller. The file [folder]/index.php can call all other classes and methods</p>
					<p class="example fa fa-leanpub"><span>Example:</span></p>
					<p><strong>app/help/index.php</strong> file with a <strong>menu</strong> method.</p>
					<pre>
&lt;?php
	Class Help extends Main
	{
		.
		.
		.
		public function menu()
		{
			.
			.
			.
			return Array(
				\'config\' => \'Config\',
				\'examples\' => \'Examples\'
			);
		}
	}</pre>
					<p>Lili Framework just return json data. The css/html layout of User Interface are apart from framework</p>
					<h2>How to call Lili Framework into a HTML page</h2>
					<h4>JQuery</h4>
					<p>
					<pre>
$(document).ready( () => {
	$.ajax( {
		method: "GET",
		dataType: "json",
		url: "http://www.your_domain.com/api/?class=help&method=menu"
	} ).done( ( msg ) => {
		console.log( msg );
	} );
} );</pre>
    				</p>
    				<h4>Angular JS</h4>
					<p>Coming soon...</p>
					<h4>Vanilla</h4>
					<p>Coming soon...</p>
				',
				/* 
					
					POST examples
					
				 */
				'post_examples' => '
					<h2>Sending a POST</h2>
					<h4>Form live demo</h4>
					<form id="form_post" target="_blank" method="post"  >
						<div class="form-group col-md-8">
							<label for="form_name" >Name:</label>
							<input type="text" name="name" id="form_name" class="form-control" />
						</div>
						<div class="form-group col-md-2">
							<label for="form_age" >Age:</label>
							<input type="number" name="age" id="form_age" class="form-control" />
						</div>
						<div class="form-group col-md-8">
							<label for="form_email" >E-mail:</label>
							<input type="email" name="email" id="form_email" class="form-control" />
						</div>
						<div class="form-group col-md-8">
							<button type="submit" class="btn btn-primary">Submit</button>
						</div>
					</form>
					<h4>Form example</h4>
					<p>Creating the app file <strong>app/getform/index.php</strong> and calling the <strong>Form</strong> service in <strong>services/Form.class.php</strong></p>
					<pre>
&lt;?php
	Class GetForm extends Main
	{
		public function __construct( $config ){
				
			//	Service instance for internal class use
			parent::__construct(
				$config,
				Array(
					\'form\'=> \'Form\'
				)
			);
		}

		public function post()
		{
			$objData = $this->services->form->getData();
			return $objData;
		}
	}</pre>
					<p><em>Array(\'form\' => \'Form\')</em> calls <strong>Form.class.php</strong> service and instantiates the <strong>Form</strong> methods into <em>$this->service</em> object.</p>
					<p><em>$this->services->form->getData()</em> returns an array with form data\'s fields. The <em>return $objData</em> converts the array output into json format.</p>
					<p>Calling the API through HTML interface</p>
					<pre>
&lt;form id=&quot;form_post&quot; target=&quot;_blank&quot; action=&quot;http://www.your_domain.com/api/?class=getform&amp;method=post&quot; method=&quot;post&quot;  &gt;
&#x9;&lt;div class=&quot;form-group col-md-8&quot;&gt;
&#x9;&#x9;&lt;label for=&quot;form_name&quot; &gt;Name:&lt;/label&gt;
&#x9;&#x9;&lt;input type=&quot;text&quot; name=&quot;name&quot; id=&quot;form_name&quot; class=&quot;form-control&quot; /&gt;
&#x9;&lt;/div&gt;
&#x9;&lt;div class=&quot;form-group col-md-2&quot;&gt;
&#x9;&#x9;&lt;label for=&quot;form_age&quot; &gt;Age:&lt;/label&gt;
&#x9;&#x9;&lt;input type=&quot;number&quot; name=&quot;age&quot; id=&quot;form_age&quot; class=&quot;form-control&quot; /&gt;
&#x9;&lt;/div&gt;
&#x9;&lt;div class=&quot;form-group col-md-8&quot;&gt;
&#x9;&#x9;&lt;label for=&quot;form_email&quot; &gt;E-mail:&lt;/label&gt;
&#x9;&#x9;&lt;input type=&quot;email&quot; name=&quot;email&quot; id=&quot;form_email&quot; class=&quot;form-control&quot; /&gt;
&#x9;&lt;/div&gt;
&#x9;&lt;div class=&quot;form-group col-md-8&quot;&gt;
&#x9;&#x9;&lt;button type=&quot;submit&quot; class=&quot;btn btn-primary&quot;&gt;Submit&lt;/button&gt;
&#x9;&lt;/div&gt;
&lt;/form&gt;</pre>
					<h2>Image Examples</h2>
					<h4>Image Types</h4>
					<p>
						<ul>
							<li class="fa fa-asterisk"><span>image/jpeg</span></li>
							<li class="fa fa-asterisk"><span>image/png</span></li>
							<li class="fa fa-asterisk"><span>image/gif</span></li>
						</ul>
					</p>
				',
				/* 
					
					Services List
					
				 */
				'services_list' => '
					<h2>Services List</h2>
					<h4>Query</h4>
					<p><strong>services/Query.class.php</strong></p>
					<p>Database Query</p>
					<p class="example fa fa-leanpub"><span>Example:</span></p>
					<pre>
parent::__construct(
	$config,
	Array(
		\'query\'=> \'Query\'
	)
);</pre>
					<p>Calls Query methods</p>
					<pre>
$result = $this->services->query->toArray(\'SELECT * FROM table\');</pre>
					<h4>Form</h4>
					<p><strong>services/Form.class.php</strong></p>
					<p>Get form posts</p>
					<p>Instantiate the Form service into a app class</p>
					<p class="example fa fa-leanpub"><span>Example:</span></p>
					<pre>
parent::__construct(
	$config,
	Array(
		\'form\'=> \'Form\'
	)
);</pre>
					<p>Calls Form methods</p>
					<pre>
$form_data = $this->services->form->getData();</pre>
					<h4>Image</h4>
					<p><strong>services/Image.class.php</strong></p>
					<p>Get image file</p>
					<p class="example fa fa-leanpub"><span>Example:</span></p>
					<pre>
parent::__construct(
	$config,
	Array(
		\'image\' => \'Image\'
	)
);</pre>
					<p>Calls Image copy method</p>
					<pre>
$path = \'https://static.pexels.com/photos/35646/pexels-photo.jpg\';
$image = $this->services->image->copy( 
	Array(
		\'file\' 		=> $path, 
		\'img_type\' 	=> \'image/jpeg\',
		\'save_path\' 	=> \'/my_server_folder/image_name.jpg\'
	)
);</pre>

<p>Call Image informations</p>
					<pre>
$path = \'https://static.pexels.com/photos/35646/pexels-photo.jpg\';
$image = $this->services->image->info( 
	Array(
		\'file\' 		=> $path
	)
);</pre>

					<h4>Utils</h4>
					<p><strong>services/Utils.class.php</strong></p>
					<p>General Tools</p>
					<p class="example fa fa-leanpub"><span>Example:</span></p>
					<pre>
parent::__construct(
	$config,
	Array(
		\'utils\'=> \'Utils\'
	)
);</pre>
					<p>Calls Utils methods</p>
					<pre>
$text = $this->services->utils->helloLili(\'This is a test\');</pre>
					<p>Slug method</p>
					<pre>
$text = $this->services->utils->slug(\'This is a test\');</pre>

				'
			);
		}


		public function menu()
		{
			return Array(
				'config' 		=> 'Config',
				'structure'		=> 'API Structure',
				'examples' 		=> 'Calling the API',
				'post_examples' => 'Examples',
				'services_list' => 'Services List'
			);
		}
	}