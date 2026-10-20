# SGRIF — Sistema de Gerenciamento de Reservas

Projeto acadêmico de sistema web voltado à organização de **reservas de salas e equipamentos** no contexto do **IFPR — Campus Jacarezinho**.

O repositório apresenta uma aplicação PHP com separação entre camadas de interface, controladores, acesso a dados e modelos. É um projeto de estudo e **não deve ser interpretado como uma solução institucional oficialmente implantada ou pronta para produção**.

## Contexto e funcionalidades

O sistema reúne telas e operações de cadastro e gerenciamento relacionados a:

- **Reservas:** registro, consulta, edição e exclusão de reservas de espaços;
- **Salas:** cadastro e manutenção dos ambientes;
- **Equipamentos:** cadastro e associação de equipamentos às salas;
- **Usuários:** manutenção de registros usados nos fluxos de reserva.

Há também arquivos referentes a ocorrências, mas partes dessa área permanecem incompletas no código disponível.

## Tecnologias e organização

- **PHP:** lógica do servidor e controladores;
- **MySQL:** persistência dos dados;
- **PDO:** execução de consultas SQL, incluindo instruções parametrizadas;
- **HTML, CSS e JavaScript:** interface web.

```text
controller/  # controladores das operações
dao/         # acesso e consultas ao banco de dados
database/    # scripts SQL do projeto acadêmico
model/       # classes de domínio
partials/    # fragmentos reutilizáveis de interface
style/       # estilos da aplicação
util/        # utilitários, incluindo a conexão com o banco
view/        # páginas e formulários
```

## Executar em ambiente de desenvolvimento

O projeto foi desenvolvido para um ambiente local com servidor PHP e MySQL. Não há um processo de instalação automatizado ou um ambiente Docker documentado neste repositório.

1. Prepare um ambiente local com **PHP, extensão PDO MySQL e MySQL**.
2. Obtenha o repositório:

   ```bash
   git clone https://github.com/LFelipeRamos/sgrif.git
   ```

3. Revise os scripts de `database/` e prepare um banco local de desenvolvimento. **Não importe dados reais ou pessoais sem autorização e anonimização.**
4. Configure a conexão em `util/conexao.php` para apontar ao banco local. Utilize credenciais próprias de desenvolvimento, sem privilégios excessivos.
5. Hospede as páginas em um servidor com suporte a PHP e acesse as telas de `view/` conforme o ambiente configurado.

Essas são orientações gerais baseadas na estrutura do código; **a instalação ponta a ponta não foi validada nesta revisão de documentação**.

## O que o projeto demonstra

- Separação de responsabilidades em controladores, objetos de domínio e camada DAO;
- Operações CRUD aplicadas ao contexto de reservas;
- Consultas SQL parametrizadas via PDO em operações de acesso a dados;
- Integração entre formulários PHP e banco de dados relacional.

## Estado e cuidados de segurança

**Status: projeto acadêmico / protótipo.**

Antes de qualquer implantação pública, o projeto precisaria de revisão técnica, incluindo:

- Substituição da configuração fixa de conexão por credenciais seguras e restritas;
- Revisão das verificações de autenticação e autorização nas operações;
- Validação de dados de entrada, saída e regras de reserva;
- Remoção de saídas de depuração e tratamento seguro de erros;
- Revisão dos arquivos SQL para evitar divulgação de informações pessoais.

Nenhuma dessas medidas deve ser presumida como já implementada. O objetivo deste README é apresentar com precisão o escopo e a organização do projeto existente.
