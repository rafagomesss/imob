<h1 align="center"> imob </h1>
## Descrição do Projeto
<p align="center">CRUD</p>
<p align="center">Desenvolvido com o serviço Xampp</p>

<h2 align="center"> Passos </h2>
1. Criar virtual host

<p align="center">Acessar C:/xampp/apache/conf/extra/httpd-vhosts.conf</p>
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
<p align="center">Acessar C:/Windows/System32/drivers/etc/hosts</p>
**Adicionar ao conteúdo do arquivo:**
127.0.0.1 www.imob.com.br
