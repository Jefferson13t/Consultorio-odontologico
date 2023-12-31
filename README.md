# Consultório Odontológico - Sistema de Gerenciamento
## Resumo
Este projeto foi concebido como parte dsa disciplina de Programação Orientada a Objetos e posteriormente aprimorado para aprofundar meu conhecimento na linguagem PHP.

## Proposta
O Consultório Odontológico é um sistema de gerenciamento que possibilita a autenticação, a criação de perfis com diferentes níveis de acesso, o cadastro de clientes e pacientes, a inclusão de dentistas, o registro de procedimentos e a marcação de consultas.

## Como Funciona
Para começar, é necessário fazer login na página 'administrativo', onde também é possível cadastrar novos procedimentos para o consultório. Na segunda seção da página, são apresentados todos os perfis cadastrados e as atividades de login.

![Imagem da página](../main/view/assets/administrativo.png)

![Imagem da página](../main/view/assets/lista-perfis.png)

Na página 'Dentistas', é possível cadastrar novos profissionais, podendo ser contratados pelo consultório ou estabelecer parcerias. Esses dentistas ficarão listados na segunda seção da página.

![Imagem da página](../main/view/assets/dentista.png)

A seção 'Clientes' permite o cadastro de novos clientes e pacientes (o cliente é quem realiza o pagamento para o paciente). Os pacientes e clientes cadastrados são listados na segunda seção.

![Imagem da página](../main/view/assets/clientes.png)

![Imagem da página](../main/view/assets/lista-clientes.png)

Na página de 'Consulta', é possível agendar consultas com pacientes e dentistas previamente cadastrados para realizar um procedimento em uma data específica. Caso já exista uma consulta marcada na mesma data com o paciente ou dentista selecionado, o agendamento não será efetuado. Os agendamentos realizados são listados na segunda seção da página, e o valor total é calculado automaticamente, sendo a soma dos valores dos procedimentos cadastrados.


![Imagem da página](../main/view/assets/agendamento-cliente.png)

![Imagem da página](../main/view/assets/agendamento-dentista.png)

![Imagem da página](../main/view/assets/lista-agendamentos.png)

## Considerações
Todas as entidades cadastradas são salvas em arquivos na pasta 'stores', e não foi utilizado um banco de dados. Além disso, nenhuma biblioteca ou framework foi empregado no desenvolvimento deste projeto.