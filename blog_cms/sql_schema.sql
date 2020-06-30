DROP TABLE IF EXISTS blogs;
CREATE TABLE blogs
(
  id              INT NOT NULL auto_increment,
  blog_title      VARCHAR (100) NOT NULL,
  blog_text       text NOT NULL,
  blog_author     VARCHAR (100) NOT NULL,
  blog_date       DATE NOT NULL,
  PRIMARY KEY     (id)
);

DROP TABLE IF EXISTS comments;
CREATE TABLE comments
(
  id              INT NOT NULL auto_increment,
  name            VARCHAR (100) NOT NULL,
  email           VARCHAR (100),
  url             VARCHAR (100) ,
  comment         text NOT NULL,
  blog_id         INT NOT NULL,
  date            DATE NOT NULL,
  PRIMARY KEY     (id)
);

DROP TABLE IF EXISTS users;
CREATE TABLE users
(
  id              INT NOT NULL auto_increment,
  user_name       VARCHAR (200) NOT NULL,
  password        VARCHAR (200),
  PRIMARY KEY     (id)
);