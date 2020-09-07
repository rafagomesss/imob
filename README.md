<h1 align="center"> IMOB </h1>
<h2> Descrição do Projeto </h2>
<p>CRUD</p>
<p>Desenvolvido com o serviço Xampp</p>
<p>Necessário Composer</p>
<p>PHP Xampp 7.4</p>

<h2> Etapas </h2>
<h3>1. Clonar Arquivo em C:/ para que fique C:/imob</h3>

<h3>2. Criar virtual host</h3>

**<p>Acessar C:/xampp/apache/conf/extra/httpd-vhosts.conf</p>**

<p>Adicionar ao conteúdo do arquivo:<p>

```
<VirtualHost *:80>
    ServerName www.imob.com.br
    ServerAlias imob.com.br
    DocumentRoot "C:/imob/app/public"
    <Directory "C:/imob">
        Options Indexes FollowSymLinks Includes ExecCGI
        AllowOverride All
        Require all granted
    </Directory>
</VirtualHost>
```

**<p>Acessar C:/Windows/System32/drivers/etc/hosts</p>**

<p>Adicionar ao conteúdo do arquivo:</p>
127.0.0.1 www.imob.com.br

**_Caso não esteja achando as classes, entre na pasta app e pelo cmd/bash execute o comando composer-dump autoload - o_**
