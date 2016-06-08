# Configuração das Credenciais da Biblioteca PagSeguro
A configuração da biblioteca PagSeguro pode ser feita **dinamicamente** ou de outras quatro formas distintas, sendo que será sempre considerada 
a configuração de maior precedência de acordo com a seguinte ordem:

* Dinâmica
* Wrapper
* Environment
* File
* Extensible


As opções de configuração disponíveis estão descritas abaixo:

- **environment**: aceita os valores *production* e *sandbox*. Para utilizar o *sandbox*, é preciso criar uma conta em https://sandbox.pagseguro.uol.com.br.
- **email**: e-mail cadastrado no PagSeguro.
- **token production**: token gerado no PagSeguro.
- **token sandbox**: token gerado no Sandbox.
- **appId production**: aplicacao gerada no PagSeguro.
- **appId sandbox**: aplicacao gerada no Sandbox.
- **appKey production**: token da aplicacao no PagSeguro.
- **appKey sandbox**: token da aplicacao no Sandbox.
- **charset**: codificação do seu sistema (ISO-8859-1 ou UTF-8).
- **log**: ativa/desativa a geração de logs.
- **fileLocation**: local onde se deseja criar o arquivo de log. Ex.: /logs/ps.log.

## Dinâmica
Para fazer a configuração de forma dinâmica das credenciais da biblioteca deve-se utilizar os métodos da classe estática [Configure.php](/source/Configuration/Configure.php) (/source/Configuration/Configure.php).

Para um exemplo completo de configuração dinâmica, consulte o arquivo [dynamicConfiguration.php](/public/Configuration/dynamicConfiguration.php) (/public/Configuration/dynamicConfiguration.php).

## Wrapper
Declarando uma classe **ConfigWrapper**, em qualquer arquivo, da seguinte forma:

```
class ConfigWrapper
{
    const ENV = "production";
    const EMAIL = "your_pagseguro_email";
    const TOKEN_PRODUCTION = "your_production_token";
    const TOKEN_SANDBOX = "your_sandbox_token";
    const APP_ID_PRODUCTION = "your_production_application_id";
    const APP_ID_SANDBOX = "your_sandbox_application_id";
    const APP_KEY_PRODUCTION = "your_production_application_key";
    const APP_KEY_SANDBOX = "your_sandbox_application_key";
    const CHARSET = "UTF-8";
    const LOG_ACTIVE = false;
    const LOG_LOCATION = "";
}
```

## Environment
Declarando as seguintes constantes no servidor da aplicação, seguindo modelo ```CONSTANT_NAME constant_value```:
```
PAGSEGURO_ENV production
PAGSEGURO_EMAIL your_pagseguro_email
PAGSEGURO_TOKEN_PRODUCTION your_production_token
PAGSEGURO_TOKEN_SANDBOX your_sandbox_token
PAGSEGURO_APP_ID_PRODUCTION your_production_application_id
PAGSEGURO_APP_ID_SANDBOX your_sandbox_application_id
PAGSEGURO_APP_KEY_PRODUCTION your_production_application_key
PAGSEGURO_APP_KEY_SANDBOX your_sandbox_application_key

PAGSEGURO_CHARSET UTF-8

PAGSEGURO_LOG_ACTIVE false
PAGSEGURO_LOG_LOCATION 
```

## File

Renomeando o arquivo **source/Configuration/Wrapper-example.php** para **source/Configuration/Wrapper.php** e  atribuindo valor para as constantes da seguinte forma:
```
class Wrapper
{
    const ENV = "production";
    const EMAIL = "your_pagseguro_email";
    const TOKEN_PRODUCTION = "your_production_token";
    const TOKEN_SANDBOX = "your_sandbox_token";
    const APP_ID_PRODUCTION = "your_production_application_id";
    const APP_ID_SANDBOX = "your_sandbox_application_id";
    const APP_KEY_PRODUCTION = "your_production_application_key";
    const APP_KEY_SANDBOX = "your_sandbox_application_key";
    const CHARSET = "UTF-8";
    const LOG_ACTIVE = false;
    const LOG_LOCATION = "";
}
```

## Extensible
Essa é a configuração padrão esperada pela biblioteca PagSeguro, é feita através do arquivo xml **source/Configuration/Conf.xml**, da seguinte forma:
```
<?xml version="1.0"?>
<config>
    <environment>production</environment><!-- sandbox or production -->
    <credentials>
        <account>
            <email>your_pagseguro_email</email>
            <production>
                <token>your_production_token</token>
            </production>
            <sandbox>
                <token>your_sandbox_token</token>
            </sandbox>
        </account>
        <application>
            <production>
                <appId>your_production_application_id</appId>
                <appKey>your_production_application_key</appKey>
            </production>
            <sandbox>
                <appId>your_sandbox_application_id</appId>
                <appKey>your_sandbox_application_key</appKey>
            </sandbox>
        </application>
    </credentials>
    <charset>UTF-8</charset>
    <log>
        <active>true</active>
        <location>/</location>
    </log>
</config>
```