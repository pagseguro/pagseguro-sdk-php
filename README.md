Biblioteca de integração PagSeguro para PHP
===========================================

[![Code Climate](https://codeclimate.com/github/pagseguro/pagseguro-php-sdk/badges/gpa.svg)](https://codeclimate.com/github/pagseguro/pagseguro-php-sdk)
[![Total Downloads](https://poser.pugx.org/pagseguro/pagseguro-php-sdk/d/total.svg)](https://packagist.org/packages/pagseguro/pagseguro-php-sdk)
[![Latest Stable Version](https://poser.pugx.org/pagseguro/pagseguro-php-sdk/v/stable.svg)](https://packagist.org/packages/pagseguro/pagseguro-php-sdk)
[![Latest Unstable Version](https://poser.pugx.org/pagseguro/pagseguro-php-sdk/v/unstable.svg)](https://packagist.org/packages/pagseguro/pagseguro-php-sdk)

Descrição
---------

A biblioteca PagSeguro em PHP é um conjunto de classes de domínio que facilitam, para o desenvolvedor PHP, a utilização das funcionalidades que o PagSeguro oferece na forma de APIs. Com a biblioteca instalada e configurada, você pode facilmente integrar funcionalidades como:

 - Criar [requisições de pagamentos]
 - Criar [requisições de assinaturas]
 - Cancelar [assinaturas]
 - Consultar [assinaturas]
 - Consultar [transações por código]
 - Consultar [transações por intervalo de datas]
 - Consultar [transações abandonadas]
 - Receber [notificações]


Requisitos
----------

 - [PHP] 5.4.27+
 - [SPL]
 - [cURL]
 - [SimpleXml]


Instalação
----------

 - Baixe o repositório como arquivo zip ou faça um clone;
 - Descompacte os arquivos em seu computador;
 - Execute o comando ```composer install```
 - O diretório *public* contém exemplos de chamadas utilizando a API e o diretório *source* contém a biblioteca propriamente dita.

Instalação via Composer

- Alternativamente, é possível utilizar o [Composer] para carregar a biblioteca ([pagseguro/pagseguro-php-sdk]).

Adicionando a dependência ao seu arquivo ```composer.json```
```composer.json
{
    "require": {
       "pagseguro/pagseguro-php-sdk" : "*"
    }
}
```

OU

Executando o comando para adicionar a dependência automaticamente

```php composer.phar require pagseguro/pagseguro-php-sdk```


Configuração
------------

Para fazer uso real da biblioteca, é preciso fazer algumas configurações. 
Para saber mais sobre como configurar a biblioteca acesse a [documentação](/public/Configuration/README.md).


Dúvidas?
----------
---
Caso tenha dúvidas ou precise de suporte, acesse nosso [fórum].


Changelog
---------

3.0.0
 - Criar requisições de pagamentos
 - Criar requisições de pagamentos com assinaturas
 - Criar requisições de cancelamento de transações
 - Criar requisições de estorno de transações
 - Consultar transações por código
 - Consultar transações por intervalo de datas
 - Consultar transações abandonadas
 - Consultar transações por código de referência
 - Criar requisições de autorizações
 - Consultar autorizações por código
 - Consultar autorizações por intervalo de datas
 - Consultar autorizações por código de notificação
 - Consultar autorizações por código de referência 
 - Criar requisições de assinaturas
 - Criar requisições de cancelamento de assinaturas
 - Criar requisições de cobrança de assinaturas
 - Consultar assinaturas por código
 - Consultar assinaturas por intervalo de datas
 - Consultar assinaturas por intervalo de dias
 - Consultar assinaturas por código de notificação
 - Receber notificações de autorizações
 - Receber notificações de assinaturas
 - Receber notificações de transações
 - Criar requisições de checkout transparente utilizando boleto
 - Criar requisições de checkout transparente utilizando debito online
 - Criar requisições de checkout transparente utilizando cartão de crédito
 - Criar requisições de checkout transparente utilizando cartão de crédito internacional
 - Criar requisições de checkout transparente utilizando boleto com split payment
 - Criar requisições de checkout transparente utilizando debito online com split payment
 - Criar requisições de checkout transparente utilizando cartão de crédito com split payment
 - Criar requisições de checkout transparente utilizando cartão de crédito internacional com split payment
 - Atualização do código da biblioteca, aderindo ao uso de *namespaces*.
 - Refatoração do código base.

Licença
-------

Copyright 2016 PagSeguro Internet LTDA.

Licensed under the Apache License, Version 2.0 (the "License"); you may not use this file except in compliance with the License. You may obtain a copy of the License at

http://www.apache.org/licenses/LICENSE-2.0

Unless required by applicable law or agreed to in writing, software distributed under the License is distributed on an "AS IS" BASIS, WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied. See the License for the specific language governing permissions and limitations under the License.


Notas
-----

 - O PagSeguro somente aceita pagamento utilizando a moeda Real brasileiro (BRL).
 - Certifique-se que o email e o token informados estejam relacionados a uma conta que possua o perfil de vendedor ou empresarial.
 - Certifique-se que tenha definido corretamente o charset de acordo com a codificação (ISO-8859-1 ou UTF-8) do seu sistema. Isso irá prevenir que as transações gerem possíveis erros ou quebras ou ainda que caracteres especiais possam ser apresentados de maneira diferente do habitual.
 - Para que ocorra normalmente a geração de logs, certifique-se que o diretório e o arquivo de log tenham permissões de leitura e escrita.
 - Para a utilizar o checkout transparente, é necessária a solicitação de ativação junto com a equipe do PagSeguro, maiores informações podem ser encontradas em [Como receber pagamentos pelo PagSeguro].


Dúvidas?
----------

Em caso de dúvidas acesse nosso [fórum].


Contribuições
-------------

Achou e corrigiu um bug ou tem alguma feature em mente e deseja contribuir?

* Faça um fork
* Adicione sua feature ou correção de bug (git checkout -b my-new-feature)
* Commit suas mudanças (git commit -am 'Added some feature')
* Rode um push para o branch (git push origin my-new-feature)
* Envie um Pull Request
* Obs.: Adicione exemplos para sua nova feature. Se seu Pull Request for relacionado a uma versão específica, o Pull Request não deve ser enviado para o branch master e sim para o branch correspondente a versão.
* Obs2: Não serão aceitos PR's na branch master. Utilizar a branch de desenvolvimento.


  [requisições de assinaturas]: http://download.uol.com.br/pagseguro/docs/pagseguro-assinatura-automatica.pdf
  [assinaturas]: http://download.uol.com.br/pagseguro/docs/pagseguro-assinatura-automatica.pdf
  [requisições de pagamentos]: https://dev.pagseguro.uol.com.br/documentacao/pagamentos
  [notificações]: https://pagseguro.uol.com.br/v3/guia-de-integracao/api-de-notificacoes.html
  [Checkout Transparente]: https://pagseguro.uol.com.br/receba-pagamentos.jhtml#checkout-transparent
  [transações por código]: https://pagseguro.uol.com.br/v3/guia-de-integracao/consulta-de-transacoes-por-codigo.html
  [transações por intervalo de datas]: https://pagseguro.uol.com.br/v2/guia-de-integracao/consulta-de-transacoes-por-intervalo-de-datas.html
  [transações abandonadas]: https://pagseguro.uol.com.br/v2/guia-de-integracao/consulta-de-transacoes-abandonadas.html
  [fórum]: https://comunidade.pagseguro.uol.com.br/hc/pt-br/community/topics
  [PHP]: http://www.php.net/
  [SPL]: http://php.net/manual/en/book.spl.php
  [cURL]: http://php.net/manual/en/book.curl.php
  [SimpleXml]: http://php.net/manual/en/book.simplexml.php
  [GitHub]: https://github.com/pagseguro/php/
  [documentação oficial]: https://dev.pagseguro.uol.com.br/bibliotecas/php
  [Composer]: https://getcomposer.org
  [pagseguro/pagseguro-php-sdk]: https://packagist.org/packages/pagseguro/pagseguro-php-sdk
  [Como receber pagamentos pelo PagSeguro]: https://pagseguro.uol.com.br/receba-pagamentos.jhtml#checkout-transparent


