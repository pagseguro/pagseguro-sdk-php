### 6.0.0 (29/11/2018)

#### Implementações
   * A lib foi atualizada para funcionar no PHP 7.1.3 em diante

#### 5.0.1 (14/11/2018)

#### Implementações
  * checagem para número de telefone e código de area

### 5.0.0 (21/10/2018)

#### Implementações
   * novos casos de testes foram implementados
   
### 4.2.1 (16/08/2018)

#### Correções
- **dev (testes de unidade):**
    * os quebrados foram corrigidos
    * agora estão separados em suites
    * novos casos foram implementados
    * namespace específico para testes foi adicionado "Pagseguro/Tests"
    * logs em html serão criado na pasta ignorada "tests/codeCoverage"

### 4.2.0 (19/03/2018)

#### Funcionalidades
- **CreditorFees:** adicionados novos parâmetros da api do PagSeguro references às classes do CreditorFees
- **addParameter:** adicionada possibilidade de se usar a função addParameter ao criar checkout transparente

### 4.0.1 (13/03/2018)

#### Correções
- **dev (testes):** *downgrade* da versão mínima do PHPUnit

### 4.0.0 (31/01/2018)

#### Funcionalidades
- **pagamento recorrente (assinatura) transparente:** editar valor de cobrança de planos ja criados
- **autorização**: encaminhar os dados do cliente e sugestão para cadastro ao criar uma autorização
- **checkout transparente:** removida funcionalidade depreciada (cartão de crédito internacional)

3.4.1
- Correção na requisição de Pagamento e Retentativa de Pagamento Recorrente

3.4.0
- Adicionada possibilidade de *não* enviar o endereço de entrega nas requisições (*shipping* opcional).

3.3.2
- Correção no charset das requisições
- Correção do erro "Undefined class constant 'INSTALLMENT_NO_INTEREST_INSTALLMENT_QUANTITY'" ao configurar o número de parcelas no checkout transparente com cartão de crédito.

3.3.0
- Removidas funcionalidades depreciadas
- Correções e melhorias gerais

3.2.0
- Adicionado serviço de assinatura transparente

3.1.0
- Alterada URL do checkout transparente
- Correções e melhorias gerais

3.0.8
- Corrigido problema de conversão de tipo bool em string na geração de URL
- Corrigido erro *undefined index* no serviço de parcelamento

3.0.6
- Corrigidos nomes e siglas dos estados brasileiros
- Corrigido bug no serviço de parcelamento
- Correções e melhorias gerais

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
