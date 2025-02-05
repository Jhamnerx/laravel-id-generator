<h1 align="center">Laravel ID Generator</h1>
<p align="center">
    <a href="https://packagist.org/packages/haruncpi/laravel-id-generator"><img src="https://badgen.net/packagist/v/haruncpi/laravel-id-generator" /></a>
    <a href="https://creativecommons.org/licenses/by/4.0/"><img src="https://badgen.net/badge/licence/CC BY 4.0/23BCCB" /></a>
     <a href=""><img src="https://badgen.net/packagist/dt/haruncpi/laravel-id-generator"/></a>
    <a href="https://twitter.com/laravelarticle"><img src="https://badgen.net/badge/twitter/@laravelarticle/1DA1F2?icon&label" /></a>
    <a href="https://facebook.com/laravelarticle"><img src="https://badgen.net/badge/facebook/laravelarticle/3b5998"/></a>
</p>
<p align="center">Easy way to generate custom ID from database table in Laravel framework</p>

![Image description](preview.png)

## Documentation

<div id="post_description">
  <p>
    <font style="vertical-align: inherit"
      ><font style="vertical-align: inherit"
        >La identificación única es una parte importante de nuestra aplicación. </font
      ><font style="vertical-align: inherit"
        >A alguien le gusta generar la identificación de la aplicación como
        incremental automática y a alguien le gusta generar su identificación
        única en un formato personalizado. </font
      ><font style="vertical-align: inherit"
        >Esta publicación le mostrará cómo generar una clave primaria
        personalizada o cualquier campo de su tabla con una ID personalizada a
        través del
      </font></font
    ><a
      title="Paquete generador de ID de Laravel"
      href="https://github.com/haruncpi/laravel-id-generator"
      target="_blank"
      rel="noopener"
      ><font style="vertical-align: inherit"
        ><font style="vertical-align: inherit"
          >paquete generador de ID de Laravel</font
        ></font
      ></a
    ><font style="vertical-align: inherit"
      ><font style="vertical-align: inherit"> .</font></font
    >
  </p>
  <p>&nbsp;</p>
  <p>
    <strong
      ><font style="vertical-align: inherit"
        ><font style="vertical-align: inherit">Instalación</font></font
      ></strong
    >
  </p>
  <pre
    class="language-php"
  ><code>composer require haruncpi/laravel-id-generator</code><button class="btn_copy" title="Copiar" style="background: rgb(102, 102, 102);"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Copiar</font></font></button></pre>
  <p>&nbsp;</p>
  <div>
    <h3>
      <strong
        ><font style="vertical-align: inherit"
          ><font style="vertical-align: inherit">¿Cómo usarlo?</font></font
        ></strong
      >
    </h3>
    <p>
      <font style="vertical-align: inherit"
        ><font style="vertical-align: inherit"
          >Puede usarlo en el código de su controlador como ayudante o dentro de
          su modelo definiendo un método de arranque.</font
        ></font
      >
    </p>
    <p>
      <strong
        ><font style="vertical-align: inherit"
          ><font style="vertical-align: inherit"
            >Ejemplo con controlador</font
          ></font
        ></strong
      >
    </p>
    <p>
      <font style="vertical-align: inherit"
        ><font style="vertical-align: inherit"
          >Generador de ID de importación</font
        ></font
      >
    </p>
    <div>
      <pre
        class="language-php"
      ><code>use Haruncpi\LaravelIdGenerator\IdGenerator;</code><button class="btn_copy" title="Copiar"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Copiar</font></font></button></pre>
    </div>
    <pre
      class="language-php"
    ><code>public function store(Request $request){<font></font>
<font></font>
	$id = IdGenerator::generate(['table' =&gt; 'todos', 'length' =&gt; 6, 'prefix' =&gt; date('y')]);<font></font>
<font></font>
	$todo = new Todo();<font></font>
	$todo-&gt;id = $id;<font></font>
	$todo-&gt;title = $request-&gt;get('title');<font></font>
	$todo-&gt;save();<font></font>
<font></font>
}</code><button class="btn_copy" title="Copiar"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Copiar</font></font></button></pre>
    <p>
      <span class="badge"
        ><font style="vertical-align: inherit"
          ><font style="vertical-align: inherit">NÓTESE BIEN:</font></font
        ></span
      ><font style="vertical-align: inherit"
        ><font style="vertical-align: inherit"
          >Si genera una identificación para el campo de la tabla
        </font></font
      ><code>id</code
      ><font style="vertical-align: inherit"
        ><font style="vertical-align: inherit"
          >, debe configurar el
        </font></font
      ><code>id</code
      ><font style="vertical-align: inherit"
        ><font style="vertical-align: inherit"
          >campo como rellenable y
        </font></font
      ><code>public $incrementing = false;</code
      ><font style="vertical-align: inherit"
        ><font style="vertical-align: inherit">dentro de su modelo.</font></font
      >
    </p>
    <p>&nbsp;</p>
    <p>
      <strong
        ><font style="vertical-align: inherit"
          ><font style="vertical-align: inherit"
            >Ejemplo con el modelo</font
          ></font
        ></strong
      >
    </p>
    <p>
      <font style="vertical-align: inherit"
        ><font style="vertical-align: inherit"
          >En su modelo agregue un
        </font></font
      ><code>boot&nbsp;</code
      ><font style="vertical-align: inherit"
        ><font style="vertical-align: inherit">método. </font
        ><font style="vertical-align: inherit"
          >La identificación se generará automáticamente cuando se agregue un
          nuevo registro.</font
        ></font
      >
    </p>
    <pre class="language-php"><code>public static function boot()<font></font>
{<font></font>
    parent::boot();<font></font>
    self::creating(function ($model) {<font></font>
        $model-&gt;uuid = IdGenerator::generate(['table' =&gt; $this-&gt;table, 'length' =&gt; 6, 'prefix' =&gt;date('y')]);<font></font>
    });<font></font>
}</code><button class="btn_copy" title="Copiar"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Copiar</font></font></button></pre>
    <p>&nbsp;</p>
    <p id="parameters">
      <strong
        ><font style="vertical-align: inherit"
          ><font style="vertical-align: inherit">Parámetros</font></font
        ></strong
      >
    </p>
    <p>
      <font style="vertical-align: inherit"
        ><font style="vertical-align: inherit"
          >Debe pasar una matriz asociativa a
        </font></font
      ><code>generate</code
      ><font style="vertical-align: inherit"
        ><font style="vertical-align: inherit">la función con </font></font
      ><code>table, length</code
      ><font style="vertical-align: inherit"
        ><font style="vertical-align: inherit">y </font></font
      ><code>prefix</code
      ><font style="vertical-align: inherit"
        ><font style="vertical-align: inherit">clave.</font></font
      >
    </p>
    <p>
      <code>table</code
      ><font style="vertical-align: inherit"
        ><font style="vertical-align: inherit"
          >= Su nombre de tabla.</font
        ></font
      >
    </p>
    <p>
      <code>field</code
      ><font style="vertical-align: inherit"
        ><font style="vertical-align: inherit">= Opcional. </font
        ><font style="vertical-align: inherit"
          >Por defecto, funciona en el campo id. </font
        ><font style="vertical-align: inherit"
          >También puede establecer otros nombres de campo.</font
        ></font
      >
    </p>
    <p>
      <code>length</code
      ><font style="vertical-align: inherit"
        ><font style="vertical-align: inherit"
          >= La longitud de su identificación</font
        ></font
      >
    </p>
    <p>
      <code>prefix</code
      ><font style="vertical-align: inherit"
        ><font style="vertical-align: inherit">= Defina su prefijo. </font
        ><font style="vertical-align: inherit"
          >Puede ser un prefijo de año, mes o cualquier letra
          personalizada.</font
        ></font
      >
    </p>
    <p>
      <code>reset_on_prefix_change</code
      ><font style="vertical-align: inherit"
        ><font style="vertical-align: inherit"
          >= Opcional, predeterminado falso. </font
        ><font style="vertical-align: inherit"
          >Si desea restablecer la identificación de 1 en el cambio de prefijo,
          configúrelo como verdadero.</font
        ></font
      >
    </p>
    <p>&nbsp;</p>
    <p>
      <strong
        ><font style="vertical-align: inherit"
          ><font style="vertical-align: inherit">Ejemplo: 01</font></font
        ></strong
      >
    </p>
    <pre class="language-php"><code>$config = [<font></font>
    'table' =&gt; 'todos',<font></font>
    'length' =&gt; 6,<font></font>
    'prefix' =&gt; date('y')<font></font>
];<font></font>
<font></font>
// now use it<font></font>
$id = IdGenerator::generate($config);<font></font>
<font></font>
// use within single line code<font></font>
$id = IdGenerator::generate(['table' =&gt; 'todos', 'length' =&gt; 6, 'prefix' =&gt; date('y')]);<font></font>
<font></font>
// output: 160001</code><button class="btn_copy" title="Copiar"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Copiar</font></font></button></pre>
    <p>&nbsp;</p>
    <p>
      <strong
        ><font style="vertical-align: inherit"
          ><font style="vertical-align: inherit">Ejemplo 02:</font></font
        ></strong
      ><font style="vertical-align: inherit"
        ><font style="vertical-align: inherit">
          INV-000001 para cadena de prefijo. </font
        ><font style="vertical-align: inherit"
          >Su campo debe ser varchar.</font
        ></font
      >
    </p>
    <pre
      class="language-php"
    ><code>$id = IdGenerator::generate(['table' =&gt; 'invoices', 'length' =&gt; 10, 'prefix' =&gt;'INV-']);<font></font>
//output: INV-000001</code><button class="btn_copy" title="Copiar" style="background: rgb(102, 102, 102);"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Copiar</font></font></button></pre>
    <p>&nbsp;</p>
    <p>
      <strong
        ><font style="vertical-align: inherit"
          ><font style="vertical-align: inherit">Ejemplo 03:</font></font
        ></strong
      ><font style="vertical-align: inherit"
        ><font style="vertical-align: inherit"> AAMM000001</font></font
      >
    </p>
    <pre
      class="language-php"
    ><code>$id = IdGenerator::generate(['table' =&gt; 'invoices', 'length' =&gt; 10, 'prefix' =&gt;date('ym')]);<font></font>
//output: 1910000001</code><button class="btn_copy" title="Copiar"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Copiar</font></font></button></pre>
    <p>&nbsp;</p>
    <p>
      <strong
        ><font style="vertical-align: inherit"
          ><font style="vertical-align: inherit">Ejemplo 04:</font></font
        ></strong
      ><font style="vertical-align: inherit"
        ><font style="vertical-align: inherit">
          Por defecto, este paquete funciona en el campo ID. </font
        ><font style="vertical-align: inherit"
          >Puede establecer otro campo para generar una ID. </font
        ><font style="vertical-align: inherit"
          >Asegúrese de que su campo seleccionado debe ser único y también el
          tipo de datos adecuado.</font
        ></font
      >
    </p>
    <pre
      class="language-php"
    ><code>$id = IdGenerator::generate(['table' =&gt; 'products','field'=&gt;'pid', 'length' =&gt; 6, 'prefix' =&gt;date('P')]);<font></font>
//output: P00001</code><button class="btn_copy" title="Copiar"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Copiar</font></font></button></pre>
    <p>&nbsp;</p>
    <p>
      <strong
        ><font style="vertical-align: inherit"
          ><font style="vertical-align: inherit">Ejemplo 05:</font></font
        ></strong
      ><font style="vertical-align: inherit"
        ><font style="vertical-align: inherit">
          De forma predeterminada, este paquete no restablecerá su ID cuando
          cambie su prefijo de ID. </font
        ><font style="vertical-align: inherit"
          >Si desea restablecer su ID de 1 en cada cambio de prefijo, pase</font
        ></font
      ><code>reset_on_prefix_change =&gt; true</code>
    </p>
    <p>
      <font style="vertical-align: inherit"
        ><font style="vertical-align: inherit"
          >Restablecer ID anualmente</font
        ></font
      >
    </p>
    <pre
      class="language-php"
    ><code>$id = IdGenerator::generate(['table' =&gt; 'invoices', 'length' =&gt; 10, 'prefix' =&gt;date('y')]);<font></font>
//output: 2000000001,2000000002,2000000003<font></font>
//output: 2100000001,2100000002,2100000003</code><button class="btn_copy" title="Copiar"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Copiar</font></font></button></pre>
    <p>
      <font style="vertical-align: inherit"
        ><font style="vertical-align: inherit"
          >Restablecer ID mensualmente</font
        ></font
      >
    </p>
    <pre
      class="language-php"
    ><code>$id = IdGenerator::generate(['table' =&gt; 'invoices', 'length' =&gt; 10, 'prefix' =&gt;date('ym')]);<font></font>
//output: 1912000001,1912000002,1912000003<font></font>
//output: 2001000001,2001000002,2001000003</code><button class="btn_copy" title="Copiar"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Copiar</font></font></button></pre>
    <p>
      <font style="vertical-align: inherit"
        ><font style="vertical-align: inherit"
          >O cualquier cambio de prefijo</font
        ></font
      >
    </p>
    <pre
      class="language-php"
    ><code>$id = IdGenerator::generate(['table' =&gt; 'products', 'length' =&gt; 6, 'prefix' =&gt; $prefix]);<font></font>
//output: A00001,A00002,B00001,B00002</code><button class="btn_copy" title="Copiar"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Copiar</font></font></button></pre>
    <p>&nbsp;</p>
  </div>
</div>
