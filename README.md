# shareGames
Projeto criado por alunos para trabalho na disciplina de programação para web ofertada pela FACOM - UFMS.

Requisitos basicos para a execução:
- Servidor com suporte a php;
- Ferramenta MySql

Passo a passo para a execução:
i) Usar sua ferramenta MySql e criar um database com o nome 'sharegames';¹
ii) Executar o script sql disponível na pasta /sources/lib e popular o projeto;*²
ii) Configurar o database com seus dados atraves do arquivo Conexao.php disponivel na pasta /sources/app/models;
iii) Iniciar a naveção no site através da view presente em /sources/app/views/login.php;

O que já está possível?
i) Efetuar login (De forma prematura, apenas é checado se existe o usuario e senha no database);
ii) Cadastrar um novo usuario;
iii) Navegar pelo visual da tela inicial de usuario
iv) Ver os dados do perfil do usuario (exceto foto)
v) Cadastrar novos jogos (sem que aparecam na biblioteca)

¹Se você executar o projeto com a configuração de BD atual ele funcionará, pois armazenará os dados em um banco na web dispomibilizado pela db4free.
²O script sql presente no projeto foi criado somente para testes, por esse motivo não nos preocupamos ainda com as restrições, tipos de atributos ou até mesmo com o tamanho dos varchars.
