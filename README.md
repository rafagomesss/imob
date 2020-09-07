<h1 align="center"> IMOB </h1>
<h2> Descrição do Projeto </h2>
<p>CRUD</p>
<p>Desenvolvido com o serviço Xampp</p>

<h2> Etapas </h2>

<h3>Criar virtual host</h3>

<p>Acessar C:/xampp/apache/conf/extra/httpd-vhosts.conf</p>

**Adicionar ao conteúdo do arquivo:**
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

<p>Acessar C:/Windows/System32/drivers/etc/hosts</p>

**Adicionar ao conteúdo do arquivo:**
127.0.0.1 www.imob.com.br
