CREATE TABLE users (
  id              INT         NOT NULL AUTO_INCREMENT PRIMARY KEY,
  nick            VARCHAR(20) NOT NULL UNIQUE,
  first_name      VARCHAR(20) NOT NULL DEFAULT '',
  middle_name     VARCHAR(20) NOT NULL DEFAULT '',
  last_name       VARCHAR(20) NOT NULL DEFAULT '',
  reg_time        INT         NOT NULL DEFAULT 0,
  reg_ip          VARCHAR(39) NOT NULL DEFAULT '',
  last_visit_time INT         NOT NULL DEFAULT 0,
  last_visit_ip   VARCHAR(39) NOT NULL DEFAULT ''
);

INSERT INTO users (nick, first_name, middle_name, last_name) VALUES ('alex1rap', 'Alexander', 'Pavlovich', 'Ryabokon');