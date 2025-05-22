Arrumar projeto

- composer install
- npm install

- barrumar o .emv
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=nome_do_banco
DB_USERNAME=seu_usuario
DB_PASSWORD=sua_senha

- php artisan key:generate
- php artisan migrate

banco de dados ajustar com

INSERT INTO cards (titulo, descricao, image) VALUES 
('🧘‍♀️ Meditação', 'A meditação é uma prática milenar que promove o equilíbrio entre corpo e mente. Ela não exige crenças específicas e pode ser praticada por qualquer pessoa, em qualquer lugar. O objetivo principal da meditação é trazer a atenção para o momento presente, criando um espaço de silêncio interior. Ao meditar, você reduz os níveis de estresse, melhora o foco, regula as emoções e até fortalece o sistema imunológico.', 'meditacao.png'),

('🪞 Autoconhecimento', 'O autoconhecimento é a base para uma vida mais consciente e equilibrada. Conhecer-se é entender suas emoções, limites, valores, padrões e desejos. É um processo contínuo que exige coragem e disposição para olhar para dentro, aceitar suas imperfeições e identificar o que precisa ser transformado.', 'autoconhecimento.png'),

('🌬️ Respiração', 'A respiração é uma ferramenta poderosa de autorregulação emocional. Quando estamos ansiosos ou estressados, tendemos a respirar de forma superficial e rápida, o que alimenta o desconforto. Respirar com consciência ajuda a acalmar o corpo e a mente em poucos minutos.', 'respiracao.png'),

('😣 Ansiedade', 'A ansiedade é uma resposta natural do corpo diante de situações de perigo ou incerteza. No entanto, quando se torna constante e desproporcional, pode interferir na qualidade de vida. Sintomas como preocupação excessiva, insônia, tensão muscular e aceleração dos pensamentos são comuns.', 'ansiedade.png'),

('🧠 Mindfulness', 'Mindfulness, ou atenção plena, é a prática de estar totalmente presente, consciente do que está acontecendo — tanto internamente quanto ao seu redor — sem julgamentos. Essa prática ajuda a reduzir o estresse, aumentar a clareza mental e melhorar o bem-estar emocional.', 'mindfulness.png'),

('😴 Falta de sono', 'Dormir bem é essencial para o equilíbrio físico e emocional. A falta de sono afeta a memória, o humor, a concentração e o sistema imunológico. Insônia ou sono irregular podem ser causados por estresse, má alimentação, uso excessivo de telas e preocupações mentais.', 'sono.png');

INSERT INTO cards (titulo, imagem, descricao, conteudo) VALUES
('Gratidão', 'gratidao.png', 'Pratique a gratidão para aumentar sua felicidade.', 
'A gratidão é uma prática simples que pode transformar sua percepção da vida. Ao focar no que você tem de positivo, você reduz o estresse e aumenta a satisfação diária.

Dicas para cultivar a gratidão:

- Escreva diariamente 3 coisas pelas quais você é grato.
- Expresse agradecimento para pessoas ao seu redor.
- Reflita sobre momentos bons, mesmo em dias difíceis.
- Use um diário de gratidão para criar o hábito.
- Pratique gratidão até mesmo por desafios, que trazem aprendizado.

Com o tempo, a gratidão se torna uma atitude natural que melhora seu bem-estar e relações.');

INSERT INTO cards (titulo, imagem, descricao, conteudo) VALUES
('Exercícios Físicos', 'exercicios.png', 'Movimente o corpo para melhorar a mente.', 
'A prática regular de exercícios físicos traz benefícios físicos e psicológicos, como redução do estresse, melhora do humor e aumento da energia.

Dicas para incorporar exercícios na rotina:

- Escolha atividades que você goste, como caminhada, dança ou yoga.
- Comece devagar e aumente a intensidade gradualmente.
- Reserve pelo menos 30 minutos, 3 vezes por semana.
- Combine exercícios aeróbicos com alongamentos.
- Use a atividade física como pausa para aliviar a mente.

Mover o corpo é um ato de cuidado integral com sua saúde.');

INSERT INTO cards (titulo, imagem, descricao, conteudo) VALUES
('Conexão Social', 'conexao.png', 'A importância das relações para a saúde mental.', 
'Ter conexões sociais significativas ajuda a reduzir a solidão, melhora o humor e fortalece a resiliência emocional.

Dicas para fortalecer suas relações:

- Dedique tempo para conversar com amigos e familiares.
- Participe de grupos ou atividades em comum.
- Seja um bom ouvinte e demonstre interesse genuíno.
- Compartilhe seus sentimentos e experiências.
- Busque apoio quando precisar e ofereça suporte aos outros.

Relações saudáveis são pilares do bem-estar.');

INSERT INTO cards (titulo, imagem, descricao, conteudo) VALUES
('Alimentação Consciente', 'alimentacao.png', 'Coma com atenção e nutra corpo e mente.', 
'A alimentação consciente é o ato de prestar atenção ao que, como e por que você come, ajudando a melhorar a digestão, reduzir o estresse e promover hábitos mais saudáveis.

Dicas para praticar:

- Evite comer distraído (sem celular, TV ou multitarefa).
- Mastigue lentamente e aprecie os sabores.
- Reconheça sinais de fome e saciedade.
- Prefira alimentos naturais e evite processados.
- Estabeleça horários regulares para as refeições.

Comer consciente ajuda a criar uma relação mais saudável com a comida.');

INSERT INTO cards (titulo, imagem, descricao, conteudo) VALUES
('Journaling', 'journaling.png', 'Escreva para organizar a mente e emoções.', 
'O journaling é a prática de registrar pensamentos e sentimentos em um diário, facilitando a reflexão, autoconhecimento e alívio emocional.

Dicas para começar:

- Reserve alguns minutos por dia para escrever livremente.
- Não se preocupe com gramática ou estrutura.
- Explore suas emoções, medos, sonhos e conquistas.
- Use perguntas como: ''O que estou sentindo agora?'' ou ''O que me preocupa?''
- Releia textos antigos para notar seu progresso.

Escrever é um caminho para clareza mental e equilíbrio emocional.');

INSERT INTO cards (titulo, imagem, descricao, conteudo) VALUES
('Limites Saudáveis', 'limites.png', 'Estabeleça limites para proteger seu bem-estar.', 
'Saber dizer não e respeitar seus limites é essencial para manter a saúde mental e evitar o esgotamento.

Dicas para criar limites:

- Identifique o que é essencial para seu equilíbrio.
- Comunique seus limites de forma clara e assertiva.
- Aprenda a recusar pedidos que prejudicam seu tempo ou energia.
- Reserve momentos para cuidar de si mesmo.
- Reconheça que preservar seus limites é um ato de amor-próprio.

Limites bem definidos ajudam a viver com mais equilíbrio e respeito.');