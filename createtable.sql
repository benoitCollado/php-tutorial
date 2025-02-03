CREATE TABLE users(
  INDEX SERIAL PRIMARY KEY UNIQUE,
  firstname VARCHAR(30) NOT NULL,
  lastname VARCHAR(45) NO NULL,
  email VARCHAR(50) NOT NULL UNIQUE,
  password VARCHAR(255) NOT NULL,
);

CREATE TABLE recipes(
  INDEX SERIAL PRIMARY KEY,
  title VARCHAR(50) NOT NULL,
  recipe VARCHAR(255) NOT NULL,
  author INT NOT NULL,
  is_enabled BOOLEAN NOT NULL,
  FOREIGN KEY (author) REFERENCES users(INDEX)
)

/*nouvelle tables pas encore créées !*/


