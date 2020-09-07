# imob
## Desenvolvido com o serviço Xampp

**1. Criar virtual host**
    - Acessar C:/xampp/apache/conf/extra/httpd-vhosts.conf
    *Adicionar ao conteúdo do arquivo:*
        > <VirtualHost *:80>
            ServerName www.imob.com.br
            ServerAlias imob.com.br
            DocumentRoot "C:/imob/app/public"
            <Directory "C:/imob">
                Options Indexes FollowSymLinks Includes ExecCGI
                AllowOverride All
                Require all granted
            </Directory>
        </VirtualHost>

    b) Acessar C:/Windows/System32/drivers/etc/hosts
    Adicionar ao conteúdo do arquivo:
        127.0.0.1 www.imob.com.br
