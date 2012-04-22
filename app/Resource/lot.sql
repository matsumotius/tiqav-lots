DROP TABLE IF EXISTS lots;
CREATE TABLE lots (
  id          SERIAL,
  name        VARCHAR(32) DEFAULT '',
  first       VARCHAR(32) NOT NULL,
  second      VARCHAR(32) NOT NULL,
  created_at  DATETIME    NOT NULL
) engine=InnoDB;
