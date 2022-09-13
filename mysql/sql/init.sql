DROP DATABASE IF EXISTS webapp;
CREATE DATABASE webapp;
USE webapp;

-- 学習記録テーブル

DROP TABLE IF EXISTS records;
CREATE TABLE records (
  id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `study_date` DATETIME NOT NULL,
  `study_time` INT NOT NULL,
  `language_id` INT NOT NULL,
  `content_id` INT NOT NULL
);

INSERT INTO records(study_date, study_time, language_id, content_id)
VALUES
  ('2022-9-13', 2, 1, 1),
  ('2022-9-14', 2, 1, 1),
  ('2022-9-15', 2, 1, 1),
  ('2022-9-16', 3, 2, 1),
  ('2022-9-17', 4, 3, 1),
  ('2022-9-18', 2, 4, 1),
  ('2022-9-19', 0, 1, 2),
  ('2022-9-20', 4, 2, 2),
  ('2022-9-21', 2, 3, 2),
  ('2022-9-22', 3, 4, 2),
  ('2022-9-23', 3, 1, 3),
  ('2022-9-24', 3, 2, 3),
  ('2022-9-25', 2, 3, 3),
  ('2022-9-26', 3, 4, 3),
  ('2022-4-27', 4, 1, 1),
  ('2022-4-27', 3, 2, 1),
  ('2022-4-27', 2, 3, 2),
  ('2022-4-27', 3, 4, 2),
  ('2022-5-27', 4, 1, 3),
  ('2022-5-27', 3, 2, 3),
  ('2022-5-27', 2, 3, 3);



-- 学習言語のテーブル

DROP TABLE IF EXISTS languages;
CREATE TABLE languages (
  id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  language VARCHAR(255) NOT NULL,
  colour VARCHAR(255) NOT NULL
);

INSERT INTO languages(language, colour)
VALUES
  ('HTML', '#0445ec'),
  ('CSS', '#0f70bd'),
  ('Javascript', '#20bdde'),
  ('PHP', '#3ccefe'),
  ('Laravel', '#b29ef3'),
  ('SQL', '#4a17ef'),
  ('SHELL', '#3005c0'),
  ('その他', '#6c46eb');

-- 学習コンテンツのテーブル

DROP TABLE IF EXISTS contents;
CREATE TABLE contents (
  id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  content VARCHAR(255) NOT NULL,
  colour VARCHAR(255) NOT NULL
);

INSERT INTO contents(content, colour)
VALUES
  ('N予備校', '#0445ec'),
  ('課題', '#0f70bd'),
  ('ドットインストール', '#20bdde');