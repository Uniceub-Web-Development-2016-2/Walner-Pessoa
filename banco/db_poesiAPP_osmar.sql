-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema db_PoesiAPP
-- -----------------------------------------------------
DROP SCHEMA IF EXISTS `db_PoesiAPP` ;

-- -----------------------------------------------------
-- Schema db_PoesiAPP
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `db_PoesiAPP` DEFAULT CHARACTER SET latin1 ;
USE `db_PoesiAPP` ;

-- -----------------------------------------------------
-- Table `db_PoesiAPP`.`autor`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `db_PoesiAPP`.`autor` ;

CREATE TABLE IF NOT EXISTS `db_PoesiAPP`.`autor` (
  `autor_id` INT NOT NULL AUTO_INCREMENT,
  `nme_autor` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`autor_id`),
  UNIQUE INDEX `idt_autor_UNIQUE` (`autor_id` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `db_PoesiAPP`.`categoria`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `db_PoesiAPP`.`categoria` ;

CREATE TABLE IF NOT EXISTS `db_PoesiAPP`.`categoria` (
  `categoria_id` INT NOT NULL AUTO_INCREMENT,
  `nme_categoria` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`categoria_id`),
  UNIQUE INDEX `idtable1_UNIQUE` (`categoria_id` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `db_PoesiAPP`.`tipo_user`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `db_PoesiAPP`.`tipo_user` ;

CREATE TABLE IF NOT EXISTS `db_PoesiAPP`.`tipo_user` (
  `tipo_user_id` INT NOT NULL AUTO_INCREMENT,
  `nme_tipo_user` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`tipo_user_id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `db_PoesiAPP`.`user`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `db_PoesiAPP`.`user` ;

CREATE TABLE IF NOT EXISTS `db_PoesiAPP`.`user` (
  `user_id` INT NOT NULL AUTO_INCREMENT,
  `email_user` VARCHAR(45) NOT NULL,
  `nme_user` VARCHAR(45) NOT NULL,
  `senha_user` VARCHAR(15) NOT NULL,
  `dt_user_cadastro` DATE NOT NULL,
  `cod_tipo` INT NOT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE INDEX `idt_leitor_UNIQUE` (`user_id` ASC),
  INDEX `fk_tb_usuario_tb_tipo_usuario1_idx` (`cod_tipo` ASC),
  CONSTRAINT `fk_tb_usuario_tb_tipo_usuario1`
    FOREIGN KEY (`cod_tipo`)
    REFERENCES `db_PoesiAPP`.`tipo_user` (`tipo_user_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `db_PoesiAPP`.`poema_texto`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `db_PoesiAPP`.`poema_texto` ;

CREATE TABLE IF NOT EXISTS `db_PoesiAPP`.`poema_texto` (
  `poema_id` INT NOT NULL AUTO_INCREMENT,
  `nme_poema` VARCHAR(45) NOT NULL,
  `dt_cadastro` DATE NOT NULL,
  `txt_poema` VARCHAR(500) NOT NULL,
  `cod_autor` INT NOT NULL,
  `cod_categoria` INT NOT NULL,
  `cod_user` INT NOT NULL,
  PRIMARY KEY (`poema_id`),
  UNIQUE INDEX `idt_poema_UNIQUE` (`poema_id` ASC),
  INDEX `fk_tb_poema_tb_autor` (`cod_autor` ASC),
  INDEX `fk_tb_poema_Categoria1_idx` (`cod_categoria` ASC),
  INDEX `fk_tb_poema_tb_usuario1_idx` (`cod_user` ASC),
  CONSTRAINT `fk_tb_poema_tb_autor`
    FOREIGN KEY (`cod_autor`)
    REFERENCES `db_PoesiAPP`.`autor` (`autor_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tb_poema_Categoria1`
    FOREIGN KEY (`cod_categoria`)
    REFERENCES `db_PoesiAPP`.`categoria` (`categoria_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tb_poema_tb_usuario1`
    FOREIGN KEY (`cod_user`)
    REFERENCES `db_PoesiAPP`.`user` (`user_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `db_PoesiAPP`.`grava_poema_audio`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `db_PoesiAPP`.`grava_poema_audio` ;

CREATE TABLE IF NOT EXISTS `db_PoesiAPP`.`grava_poema_audio` (
  `audio_id` INT NOT NULL AUTO_INCREMENT,
  `local_arq_MP3` VARCHAR(45) NOT NULL,
  `dt_gravacao` DATE NOT NULL,
  `cod_poema` INT NOT NULL,
  `cod_usuario` INT NOT NULL,
  PRIMARY KEY (`audio_id`),
  UNIQUE INDEX `idt_gravacao_UNIQUE` (`audio_id` ASC),
  INDEX `fk_tb_grava_MP3_tb_poema1_idx` (`cod_poema` ASC),
  INDEX `fk_tb_grava_MP3_tb_usuario1_idx` (`cod_usuario` ASC),
  CONSTRAINT `fk_tb_grava_MP3_tb_poema1`
    FOREIGN KEY (`cod_poema`)
    REFERENCES `db_PoesiAPP`.`poema_texto` (`poema_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tb_grava_MP3_tb_usuario1`
    FOREIGN KEY (`cod_usuario`)
    REFERENCES `db_PoesiAPP`.`user` (`user_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `db_PoesiAPP`.`avaliacao_audio`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `db_PoesiAPP`.`avaliacao_audio` ;

CREATE TABLE IF NOT EXISTS `db_PoesiAPP`.`avaliacao_audio` (
  `avalia_id` INT NOT NULL AUTO_INCREMENT,
  `Txt_comentario` VARCHAR(200) NULL,
  `like_dislike` TINYINT(1) NULL,
  `denunciar` TINYINT(1) NOT NULL,
  `cod_user` INT NOT NULL,
  `cod_audio_Poema` INT NOT NULL,
  PRIMARY KEY (`avalia_id`),
  UNIQUE INDEX `idt_audicao_UNIQUE` (`avalia_id` ASC),
  INDEX `fk_tb_avalia_MP3_tb_usuario1_idx` (`cod_user` ASC),
  INDEX `fk_tb_avalia_MP3_tb_grava_MP31_idx` (`cod_audio_Poema` ASC),
  CONSTRAINT `fk_tb_avalia_MP3_tb_usuario1`
    FOREIGN KEY (`cod_user`)
    REFERENCES `db_PoesiAPP`.`user` (`user_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tb_avalia_MP3_tb_grava_MP31`
    FOREIGN KEY (`cod_audio_Poema`)
    REFERENCES `db_PoesiAPP`.`grava_poema_audio` (`audio_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

-- -----------------------------------------------------
-- Data for table `db_PoesiAPP`.`autor`
-- -----------------------------------------------------
START TRANSACTION;
USE `db_PoesiAPP`;
INSERT INTO `db_PoesiAPP`.`autor` (`autor_id`, `nme_autor`) VALUES (1, 'Vinícios de Moraes');
INSERT INTO `db_PoesiAPP`.`autor` (`autor_id`, `nme_autor`) VALUES (2, 'Carlos Drummond de Andrade');
INSERT INTO `db_PoesiAPP`.`autor` (`autor_id`, `nme_autor`) VALUES (3, 'Fernando Pessoa');

COMMIT;


-- -----------------------------------------------------
-- Data for table `db_PoesiAPP`.`categoria`
-- -----------------------------------------------------
START TRANSACTION;
USE `db_PoesiAPP`;
INSERT INTO `db_PoesiAPP`.`categoria` (`categoria_id`, `nme_categoria`) VALUES (1, 'Lírico');
INSERT INTO `db_PoesiAPP`.`categoria` (`categoria_id`, `nme_categoria`) VALUES (2, 'Narrativo');
INSERT INTO `db_PoesiAPP`.`categoria` (`categoria_id`, `nme_categoria`) VALUES (3, 'Dramático');
INSERT INTO `db_PoesiAPP`.`categoria` (`categoria_id`, `nme_categoria`) VALUES (4, 'Romântico');
INSERT INTO `db_PoesiAPP`.`categoria` (`categoria_id`, `nme_categoria`) VALUES (5, 'Realista');
INSERT INTO `db_PoesiAPP`.`categoria` (`categoria_id`, `nme_categoria`) VALUES (6, 'Épica');
INSERT INTO `db_PoesiAPP`.`categoria` (`categoria_id`, `nme_categoria`) VALUES (7, 'Bucólica');

COMMIT;


-- -----------------------------------------------------
-- Data for table `db_PoesiAPP`.`tipo_user`
-- -----------------------------------------------------
START TRANSACTION;
USE `db_PoesiAPP`;
INSERT INTO `db_PoesiAPP`.`tipo_user` (`tipo_user_id`, `nme_tipo_user`) VALUES (1, 'Administrador');
INSERT INTO `db_PoesiAPP`.`tipo_user` (`tipo_user_id`, `nme_tipo_user`) VALUES (2, 'Curador');
INSERT INTO `db_PoesiAPP`.`tipo_user` (`tipo_user_id`, `nme_tipo_user`) VALUES (3, 'Leitor');
INSERT INTO `db_PoesiAPP`.`tipo_user` (`tipo_user_id`, `nme_tipo_user`) VALUES (4, 'Visitante');

COMMIT;


-- -----------------------------------------------------
-- Data for table `db_PoesiAPP`.`user`
-- -----------------------------------------------------
START TRANSACTION;
USE `db_PoesiAPP`;
INSERT INTO `db_PoesiAPP`.`user` (`user_id`, `email_user`, `nme_user`, `senha_user`, `dt_user_cadastro`, `cod_tipo`) VALUES (1, 'waln@gmail.com', 'Walner de Oliveira', 'casadavida', '20160516', 1);
INSERT INTO `db_PoesiAPP`.`user` (`user_id`, `email_user`, `nme_user`, `senha_user`, `dt_user_cadastro`, `cod_tipo`) VALUES (2, 'Pe@gmail.com', 'Pedro Jose', 'viverfeliz', '20160623', 2);
INSERT INTO `db_PoesiAPP`.`user` (`user_id`, `email_user`, `nme_user`, `senha_user`, `dt_user_cadastro`, `cod_tipo`) VALUES (3, 'ac@gmail.com', 'Ana Clara', 'alegriaviva', '20160623', 2);
INSERT INTO `db_PoesiAPP`.`user` (`user_id`, `email_user`, `nme_user`, `senha_user`, `dt_user_cadastro`, `cod_tipo`) VALUES (4, 'Alyne@gmail.com', 'Alyne Thacila', 'sonhofeliz', '20160516', 4);
INSERT INTO `db_PoesiAPP`.`user` (`user_id`, `email_user`, `nme_user`, `senha_user`, `dt_user_cadastro`, `cod_tipo`) VALUES (5, 'marcelo@gmail.com', 'Marcelo', 'voucalar', '20160925', 4);
INSERT INTO `db_PoesiAPP`.`user` (`user_id`, `email_user`, `nme_user`, `senha_user`, `dt_user_cadastro`, `cod_tipo`) VALUES (6, 'Guto@gmail.com', 'Gustavo', 'sonhovivo', '20160925', 4);
INSERT INTO `db_PoesiAPP`.`user` (`user_id`, `email_user`, `nme_user`, `senha_user`, `dt_user_cadastro`, `cod_tipo`) VALUES (7, 'Lupa@gmail.com', 'Luis Paulo', '123456', '20160925', 3);
INSERT INTO `db_PoesiAPP`.`user` (`user_id`, `email_user`, `nme_user`, `senha_user`, `dt_user_cadastro`, `cod_tipo`) VALUES (8, 'Munda@gmail.com', 'Raimunda Silva', '123456', '20160925', 3);
INSERT INTO `db_PoesiAPP`.`user` (`user_id`, `email_user`, `nme_user`, `senha_user`, `dt_user_cadastro`, `cod_tipo`) VALUES (9, 'Papinho@gmail.com', 'Paula Pinho', '123456', '20160925', 3);
INSERT INTO `db_PoesiAPP`.`user` (`user_id`, `email_user`, `nme_user`, `senha_user`, `dt_user_cadastro`, `cod_tipo`) VALUES (10, 'Lulu@gmail.com', 'Luiza Altila', '123456', '20160925', 3);

COMMIT;


-- -----------------------------------------------------
-- Data for table `db_PoesiAPP`.`poema_texto`
-- -----------------------------------------------------
START TRANSACTION;
USE `db_PoesiAPP`;
INSERT INTO `db_PoesiAPP`.`poema_texto` (`poema_id`, `nme_poema`, `dt_cadastro`, `txt_poema`, `cod_autor`, `cod_categoria`, `cod_user`) VALUES (1, 'Para Sempre ', '20160912', 'Por que Deus permite\nque as mães vão-se embora?\nMãe não tem limite,\né tempo sem hora,\nluz que não apaga\nquando sopra o vento\ne chuva desaba,\nveludo escondido\nna pele enrugada,\nágua pura, ar puro,\npuro pensamento.\nMorrer acontece\ncom o que é breve e passa\nsem deixar vestígio.\nMãe, na sua graça,\né eternidade.\nPor que Deus se lembra\n- mistério profundo -\nde tirá-la um dia?\nFosse eu Rei do Mundo,\nbaixava uma lei:\nMãe não morre nunca,\nmãe ficará sempre\njunto de seu filho\ne ele, velho embora,\nserá pequenino\nfeito grão de milho.', 1, 4, 2);
INSERT INTO `db_PoesiAPP`.`poema_texto` (`poema_id`, `nme_poema`, `dt_cadastro`, `txt_poema`, `cod_autor`, `cod_categoria`, `cod_user`) VALUES (2, 'As sem-razões do amor', '20160912', 'Eu te amo porque te amo,\nNão precisas ser amante,\ne nem sempre sabes sê-lo.\nEu te amo porque te amo.\nAmor é estado de graça\ne com amor não se paga.\n\nAmor é dado de graça,\né semeado no vento,\nna cachoeira, no eclipse.\nAmor foge a dicionários\ne a regulamentos vários.\n\nEu te amo porque não amo\nbastante ou demais a mim.\nPorque amor não se troca,\nnão se conjuga nem se ama.\nPorque amor é amor a nada,\nfeliz e forte em si mesmo.\n\nAmor é primo da morte,\ne da morte vencedor,\npor mais que o matem (e matam)\na cada instante de amor.', 1, 4, 1);
INSERT INTO `db_PoesiAPP`.`poema_texto` (`poema_id`, `nme_poema`, `dt_cadastro`, `txt_poema`, `cod_autor`, `cod_categoria`, `cod_user`) VALUES (3, 'Soneto do amigo', '20160912', 'Enfim, depois de tanto erro passado\nTantas retaliações, tanto perigo\nEis que ressurge noutro o velho amigo\nNunca perdido, sempre reencontrado.\n\nÉ bom sentá-lo novamente ao lado\nCom olhos que contêm o olhar antigo\nSempre comigo um pouco atribulado\nE como sempre singular comigo.\n\nUm bicho igual a mim, simples e humano\nSabendo se mover e comover\nE a disfarçar com o meu próprio engano.\n\nO amigo: um ser que a vida não explica\nQue só se vai ao ver outro nascer\nE o espelho de minha alma multiplica...', 2, 1, 3);
INSERT INTO `db_PoesiAPP`.`poema_texto` (`poema_id`, `nme_poema`, `dt_cadastro`, `txt_poema`, `cod_autor`, `cod_categoria`, `cod_user`) VALUES (4, 'Poeta Fingidor', '20161004', 'O poeta é um fingidor.\nFinge tão completamente\nQue chega a fingir que é dor\nA dor que deveras sente.', 3, 4, 3);
INSERT INTO `db_PoesiAPP`.`poema_texto` (`poema_id`, `nme_poema`, `dt_cadastro`, `txt_poema`, `cod_autor`, `cod_categoria`, `cod_user`) VALUES (5, 'Amo Tudo', '20161004', 'Eu amo tudo o que foi\nTudo o que já não é\nA dor que já me não dói\nA antiga e errônea fé\nO ontem que a dor deixou,\nO que deixou alegria\nSó porque foi, e voou\nE hoje é já outro dia.', 3, 4, 2);
INSERT INTO `db_PoesiAPP`.`poema_texto` (`poema_id`, `nme_poema`, `dt_cadastro`, `txt_poema`, `cod_autor`, `cod_categoria`, `cod_user`) VALUES (6, 'Atravesar', '20161004', 'Enquanto não atravessarmos\na dor de nossa própria solidão,\ncontinuaremos\na nos buscar em outras metades.\nPara viver a dois, antes, é\nnecessário ser um.', 3, 3, 2);
INSERT INTO `db_PoesiAPP`.`poema_texto` (`poema_id`, `nme_poema`, `dt_cadastro`, `txt_poema`, `cod_autor`, `cod_categoria`, `cod_user`) VALUES (7, 'Destino', '20161004', 'Segue o teu destino...\nRega as tuas plantas;\nAma as tuas rosas.\nO resto é a sombra\nde árvores alheias', 3, 2, 3);
INSERT INTO `db_PoesiAPP`.`poema_texto` (`poema_id`, `nme_poema`, `dt_cadastro`, `txt_poema`, `cod_autor`, `cod_categoria`, `cod_user`) VALUES (8, 'Ser grande', '20161004', 'Para ser grande, sê inteiro: nada\nTeu exagera ou exclui.\nSê todo em cada coisa. Põe quanto és\nNo mínimo que fazes.\nAssim em cada lago a lua toda\nBrilha, porque alta vive.', 3, 4, 3);
INSERT INTO `db_PoesiAPP`.`poema_texto` (`poema_id`, `nme_poema`, `dt_cadastro`, `txt_poema`, `cod_autor`, `cod_categoria`, `cod_user`) VALUES (9, 'Não importa', '20161004', 'Não importa se a estação do ano muda...\nSe o século vira, se o milénio é outro.\nSe a idade aumenta...\nConserva a vontade de viver,\nNão se chega a parte alguma sem ela.', 3, 4, 2);
INSERT INTO `db_PoesiAPP`.`poema_texto` (`poema_id`, `nme_poema`, `dt_cadastro`, `txt_poema`, `cod_autor`, `cod_categoria`, `cod_user`) VALUES (10, 'Sentir', '20161004', 'Sentir tudo de todas as maneiras,\nViver tudo de todos os lados,\nSer a mesma coisa de todos os modos possíveis ao mesmo tempo,\nRealizar em si toda a humanidade de todos os momentos\nNum só momento difuso, profuso, completo e longínquo.', 3, 2, 1);
INSERT INTO `db_PoesiAPP`.`poema_texto` (`poema_id`, `nme_poema`, `dt_cadastro`, `txt_poema`, `cod_autor`, `cod_categoria`, `cod_user`) VALUES (11, 'Agora', '20160912', 'Vou ver o amanha e nao saberei nada do hoje, agora, agora, agora.', 2, 2, 3);

COMMIT;


-- -----------------------------------------------------
-- Data for table `db_PoesiAPP`.`grava_poema_audio`
-- -----------------------------------------------------
START TRANSACTION;
USE `db_PoesiAPP`;
INSERT INTO `db_PoesiAPP`.`grava_poema_audio` (`audio_id`, `local_arq_MP3`, `dt_gravacao`, `cod_poema`, `cod_usuario`) VALUES (1, '/todos/drumond1.mp3', '20160912', 1, 3);
INSERT INTO `db_PoesiAPP`.`grava_poema_audio` (`audio_id`, `local_arq_MP3`, `dt_gravacao`, `cod_poema`, `cod_usuario`) VALUES (2, '/todos/vinicius1.mp3', '20160912', 3, 3);
INSERT INTO `db_PoesiAPP`.`grava_poema_audio` (`audio_id`, `local_arq_MP3`, `dt_gravacao`, `cod_poema`, `cod_usuario`) VALUES (3, '/todos/vinicius2.mp3', '20160912', 2, 2);
INSERT INTO `db_PoesiAPP`.`grava_poema_audio` (`audio_id`, `local_arq_MP3`, `dt_gravacao`, `cod_poema`, `cod_usuario`) VALUES (4, '/todos/vinicius2.mp3', '20160912', 2, 4);
INSERT INTO `db_PoesiAPP`.`grava_poema_audio` (`audio_id`, `local_arq_MP3`, `dt_gravacao`, `cod_poema`, `cod_usuario`) VALUES (5, '/todos/vinicius2.mp3', '20160912', 4, 4);
INSERT INTO `db_PoesiAPP`.`grava_poema_audio` (`audio_id`, `local_arq_MP3`, `dt_gravacao`, `cod_poema`, `cod_usuario`) VALUES (6, '/todos/vinicius2.mp3', '20160912', 2, 4);
INSERT INTO `db_PoesiAPP`.`grava_poema_audio` (`audio_id`, `local_arq_MP3`, `dt_gravacao`, `cod_poema`, `cod_usuario`) VALUES (7, '/todos/vinicius2.mp3', '20160912', 3, 2);
INSERT INTO `db_PoesiAPP`.`grava_poema_audio` (`audio_id`, `local_arq_MP3`, `dt_gravacao`, `cod_poema`, `cod_usuario`) VALUES (8, '/todos/vinicius2.mp3', '20160912', 2, 3);
INSERT INTO `db_PoesiAPP`.`grava_poema_audio` (`audio_id`, `local_arq_MP3`, `dt_gravacao`, `cod_poema`, `cod_usuario`) VALUES (9, '/todos/vinicius2.mp3', '20160912', 4, 4);
INSERT INTO `db_PoesiAPP`.`grava_poema_audio` (`audio_id`, `local_arq_MP3`, `dt_gravacao`, `cod_poema`, `cod_usuario`) VALUES (10, '/todos/vinicius2.mp3', '20160912', 2, 4);
INSERT INTO `db_PoesiAPP`.`grava_poema_audio` (`audio_id`, `local_arq_MP3`, `dt_gravacao`, `cod_poema`, `cod_usuario`) VALUES (11, '/todos/vinicius2.mp3', '20160912', 3, 2);

COMMIT;


-- -----------------------------------------------------
-- Data for table `db_PoesiAPP`.`avaliacao_audio`
-- -----------------------------------------------------
START TRANSACTION;
USE `db_PoesiAPP`;
INSERT INTO `db_PoesiAPP`.`avaliacao_audio` (`avalia_id`, `Txt_comentario`, `like_dislike`, `denunciar`, `cod_user`, `cod_audio_Poema`) VALUES (1, 'Gostei muito', 1, 0, 4, 1);
INSERT INTO `db_PoesiAPP`.`avaliacao_audio` (`avalia_id`, `Txt_comentario`, `like_dislike`, `denunciar`, `cod_user`, `cod_audio_Poema`) VALUES (2, 'Uauuuu', 1, 0, 4, 1);
INSERT INTO `db_PoesiAPP`.`avaliacao_audio` (`avalia_id`, `Txt_comentario`, `like_dislike`, `denunciar`, `cod_user`, `cod_audio_Poema`) VALUES (3, 'Sai pra la', 0, 0, 4, 2);
INSERT INTO `db_PoesiAPP`.`avaliacao_audio` (`avalia_id`, `Txt_comentario`, `like_dislike`, `denunciar`, `cod_user`, `cod_audio_Poema`) VALUES (4, NULL, 1, 0, 5, 2);
INSERT INTO `db_PoesiAPP`.`avaliacao_audio` (`avalia_id`, `Txt_comentario`, `like_dislike`, `denunciar`, `cod_user`, `cod_audio_Poema`) VALUES (5, NULL, 1, 0, 6, 3);
INSERT INTO `db_PoesiAPP`.`avaliacao_audio` (`avalia_id`, `Txt_comentario`, `like_dislike`, `denunciar`, `cod_user`, `cod_audio_Poema`) VALUES (6, NULL, 1, 0, 4, 3);
INSERT INTO `db_PoesiAPP`.`avaliacao_audio` (`avalia_id`, `Txt_comentario`, `like_dislike`, `denunciar`, `cod_user`, `cod_audio_Poema`) VALUES (7, 'Excelete', 1, 0, 5, 4);
INSERT INTO `db_PoesiAPP`.`avaliacao_audio` (`avalia_id`, `Txt_comentario`, `like_dislike`, `denunciar`, `cod_user`, `cod_audio_Poema`) VALUES (8, NULL, 1, 0, 4, 5);
INSERT INTO `db_PoesiAPP`.`avaliacao_audio` (`avalia_id`, `Txt_comentario`, `like_dislike`, `denunciar`, `cod_user`, `cod_audio_Poema`) VALUES (9, NULL, NULL, 0, 6, 6);
INSERT INTO `db_PoesiAPP`.`avaliacao_audio` (`avalia_id`, `Txt_comentario`, `like_dislike`, `denunciar`, `cod_user`, `cod_audio_Poema`) VALUES (10, NULL, 0, 0, 2, 3);
INSERT INTO `db_PoesiAPP`.`avaliacao_audio` (`avalia_id`, `Txt_comentario`, `like_dislike`, `denunciar`, `cod_user`, `cod_audio_Poema`) VALUES (11, NULL, 1, 0, 5, 7);
INSERT INTO `db_PoesiAPP`.`avaliacao_audio` (`avalia_id`, `Txt_comentario`, `like_dislike`, `denunciar`, `cod_user`, `cod_audio_Poema`) VALUES (12, NULL, 1, 0, 4, 8);
INSERT INTO `db_PoesiAPP`.`avaliacao_audio` (`avalia_id`, `Txt_comentario`, `like_dislike`, `denunciar`, `cod_user`, `cod_audio_Poema`) VALUES (13, NULL, 1, 0, 6, 2);
INSERT INTO `db_PoesiAPP`.`avaliacao_audio` (`avalia_id`, `Txt_comentario`, `like_dislike`, `denunciar`, `cod_user`, `cod_audio_Poema`) VALUES (14, NULL, 1, 0, 4, 9);
INSERT INTO `db_PoesiAPP`.`avaliacao_audio` (`avalia_id`, `Txt_comentario`, `like_dislike`, `denunciar`, `cod_user`, `cod_audio_Poema`) VALUES (15, NULL, 1, 0, 7, 10);
INSERT INTO `db_PoesiAPP`.`avaliacao_audio` (`avalia_id`, `Txt_comentario`, `like_dislike`, `denunciar`, `cod_user`, `cod_audio_Poema`) VALUES (16, NULL, 1, 0, 4, 2);
INSERT INTO `db_PoesiAPP`.`avaliacao_audio` (`avalia_id`, `Txt_comentario`, `like_dislike`, `denunciar`, `cod_user`, `cod_audio_Poema`) VALUES (17, NULL, 1, 0, 8, 10);
INSERT INTO `db_PoesiAPP`.`avaliacao_audio` (`avalia_id`, `Txt_comentario`, `like_dislike`, `denunciar`, `cod_user`, `cod_audio_Poema`) VALUES (18, NULL, NULL, 0, 4, 3);
INSERT INTO `db_PoesiAPP`.`avaliacao_audio` (`avalia_id`, `Txt_comentario`, `like_dislike`, `denunciar`, `cod_user`, `cod_audio_Poema`) VALUES (19, NULL, 1, 0, 9, 6);
INSERT INTO `db_PoesiAPP`.`avaliacao_audio` (`avalia_id`, `Txt_comentario`, `like_dislike`, `denunciar`, `cod_user`, `cod_audio_Poema`) VALUES (20, NULL, NULL, 0, 10, 3);

COMMIT;

