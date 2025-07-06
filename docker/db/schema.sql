CREATE TABLE categories (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(50) NOT NULL,
  slug VARCHAR(50) UNIQUE NOT NULL,
  description TEXT DEFAULT NULL,
  created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
  updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  deleted_at DATETIME DEFAULT NULL
);

CREATE TABLE posts (
  id INT AUTO_INCREMENT PRIMARY KEY,
  title VARCHAR(255) NOT NULL,
  slug VARCHAR(255) UNIQUE NOT NULL,
  category_id INT NOT NULL,
  content TEXT DEFAULT NULL,
  excerpt TEXT NOT NULL,
  featured_image VARCHAR(255),
  status ENUM('draft', 'published') DEFAULT 'draft',
  views INT DEFAULT 0,
  published_at DATETIME DEFAULT NULL,
  created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
  updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  deleted_at DATETIME DEFAULT NULL,
  FOREIGN KEY (category_id) REFERENCES categories(id) ON DELETE CASCADE
);

CREATE TABLE newsletters (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(100) NOT NULL,
  email VARCHAR(255) NOT NULL UNIQUE,
  created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
  updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  deleted_at DATETIME DEFAULT NULL
);

CREATE TABLE contacts (
  id INT NOT NULL AUTO_INCREMENT,
  name VARCHAR(100) NULL,
  email VARCHAR(100) NOT NULL,
  comment VARCHAR(255) NULL,
  created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY(id)
) ENGINE = INNODB;

/*
** SEED FOR CATEGORIES
1. Gramática
2. Vocabulário
3. Inglês para Viagem
4. Inglês para Trabalho
5. Dicas de Estudo
6. Curiosidades
7. Inglês Avançado
8. Exercícios
*/
INSERT INTO categories (name, slug, description) VALUES
('Gramática', 'gramatica', 'Dicas e explicações sobre gramática inglesa.'),
('Vocabulário', 'vocabulario', 'Expansão de vocabulário e expressões úteis.'),
('Inglês para Viagem', 'ingles-para-viagem', 'Frases e vocabulário para viagens.'),
('Inglês para Trabalho', 'ingles-para-trabalho', 'Vocabulário e expressões para o ambiente de trabalho.'),
('Dicas de Estudo', 'dicas-de-estudo', 'Estratégias e dicas para aprender inglês.'),
('Curiosidades', 'curiosidades', 'Fatos interessantes sobre a língua inglesa.'),
('Inglês Avançado', 'ingles-avancado', 'Conteúdo para alunos avançados.'),
('Exercícios', 'exercicios', 'Exercícios práticos para fixação de conteúdo.');
