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
