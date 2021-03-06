-- MySQL Script generated by MySQL Workbench
-- Mon Jul  4 09:12:40 2022
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `mydb` DEFAULT CHARACTER SET utf8 ;
USE `mydb` ;

-- -----------------------------------------------------
-- Table `mydb`.`Utilisateurs`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Utilisateurs` (
  `idUtilisateurs` INT NOT NULL,
  `Nom` VARCHAR(45) NULL,
  `Prénom` VARCHAR(45) NULL,
  `Adresse` VARCHAR(45) NULL,
  `Poste` VARCHAR(45) NULL,
  `Groupe` VARCHAR(45) NULL,
  `Adresse_mail` VARCHAR(45) NULL,
  `mot_de_passe` VARCHAR(45) NULL,
  PRIMARY KEY (`idUtilisateurs`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Tickets`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Tickets` (
  `idTickets` INT NOT NULL,
  `Date_création` DATE NOT NULL,
  `Etat` VARCHAR(45) NULL,
  `Objet_demande` LONGTEXT NULL,
  `Utilisateurs_idUtilisateurs` INT NOT NULL,
  PRIMARY KEY (`idTickets`),
  CONSTRAINT `fk_Tickets_Utilisateurs`
    FOREIGN KEY (`Utilisateurs_idUtilisateurs`)
    REFERENCES `mydb`.`Utilisateurs` (`idUtilisateurs`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Groupes`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Groupes` (
  `idGroupes` INT NOT NULL,
  `Nom` VARCHAR(45) NULL,
  `Droit` VARCHAR(45) NULL,
  PRIMARY KEY (`idGroupes`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Utilisateurs_has_Groupes`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Utilisateurs_has_Groupes` (
  `Utilisateurs_idUtilisateurs` INT NOT NULL,
  `Groupes_idGroupes` INT NOT NULL,
  PRIMARY KEY (`Utilisateurs_idUtilisateurs`, `Groupes_idGroupes`),
  CONSTRAINT `fk_Utilisateurs_has_Groupes_Utilisateurs1`
    FOREIGN KEY (`Utilisateurs_idUtilisateurs`)
    REFERENCES `mydb`.`Utilisateurs` (`idUtilisateurs`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Utilisateurs_has_Groupes_Groupes1`
    FOREIGN KEY (`Groupes_idGroupes`)
    REFERENCES `mydb`.`Groupes` (`idGroupes`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Réseaux`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Réseaux` (
  `idRéseaux` INT NOT NULL,
  `Type` VARCHAR(45) NULL,
  `Marque` VARCHAR(45) NULL,
  `Modèle` VARCHAR(45) NULL,
  `Tickets_idTickets` INT NOT NULL,
  PRIMARY KEY (`idRéseaux`),
  CONSTRAINT `fk_Réseaux_Tickets1`
    FOREIGN KEY (`Tickets_idTickets`)
    REFERENCES `mydb`.`Tickets` (`idTickets`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Téléphones`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Téléphones` (
  `idTéléphones` INT NOT NULL,
  `Marque` VARCHAR(45) NULL,
  `Type` VARCHAR(45) NULL,
  `Numéro` VARCHAR(45) NULL,
  `Tickets_idTickets` INT NOT NULL,
  PRIMARY KEY (`idTéléphones`),
  CONSTRAINT `fk_Téléphones_Tickets1`
    FOREIGN KEY (`Tickets_idTickets`)
    REFERENCES `mydb`.`Tickets` (`idTickets`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Lieux`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Lieux` (
  `idLieux` INT NOT NULL,
  `Nom` VARCHAR(45) NULL,
  `Adresse` VARCHAR(45) NULL,
  `Utilisateurs_idUtilisateurs` INT NOT NULL,
  `Réseaux_idRéseaux` INT NOT NULL,
  `Téléphones_idTéléphones` INT NOT NULL,
  PRIMARY KEY (`idLieux`, `Utilisateurs_idUtilisateurs`, `Réseaux_idRéseaux`, `Téléphones_idTéléphones`),
  CONSTRAINT `fk_Lieux_Utilisateurs1`
    FOREIGN KEY (`Utilisateurs_idUtilisateurs`)
    REFERENCES `mydb`.`Utilisateurs` (`idUtilisateurs`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Lieux_Réseaux1`
    FOREIGN KEY (`Réseaux_idRéseaux`)
    REFERENCES `mydb`.`Réseaux` (`idRéseaux`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Lieux_Téléphones1`
    FOREIGN KEY (`Téléphones_idTéléphones`)
    REFERENCES `mydb`.`Téléphones` (`idTéléphones`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Ordinateurs`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Ordinateurs` (
  `idOrdinateurs` INT NOT NULL,
  `Marque` VARCHAR(45) NULL,
  `Modèle` VARCHAR(45) NULL,
  `Adresse_mac` VARCHAR(45) NULL,
  `OS` VARCHAR(45) NULL,
  `Tickets_idTickets` INT NOT NULL,
  PRIMARY KEY (`idOrdinateurs`),
  CONSTRAINT `fk_Ordinateurs_Tickets1`
    FOREIGN KEY (`Tickets_idTickets`)
    REFERENCES `mydb`.`Tickets` (`idTickets`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Imprimantes`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Imprimantes` (
  `idImprimantes` INT NOT NULL,
  `Marque` VARCHAR(45) NULL,
  `Modèle` VARCHAR(45) NULL,
  `Tickets_idTickets` INT NOT NULL,
  PRIMARY KEY (`idImprimantes`),
  CONSTRAINT `fk_Imprimantes_Tickets1`
    FOREIGN KEY (`Tickets_idTickets`)
    REFERENCES `mydb`.`Tickets` (`idTickets`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Ordinateurs_has_Utilisateurs`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Ordinateurs_has_Utilisateurs` (
  `Ordinateurs_idOrdinateurs` INT NOT NULL,
  `Utilisateurs_idUtilisateurs` INT NOT NULL,
  PRIMARY KEY (`Ordinateurs_idOrdinateurs`, `Utilisateurs_idUtilisateurs`),
  CONSTRAINT `fk_Ordinateurs_has_Utilisateurs_Ordinateurs1`
    FOREIGN KEY (`Ordinateurs_idOrdinateurs`)
    REFERENCES `mydb`.`Ordinateurs` (`idOrdinateurs`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Ordinateurs_has_Utilisateurs_Utilisateurs1`
    FOREIGN KEY (`Utilisateurs_idUtilisateurs`)
    REFERENCES `mydb`.`Utilisateurs` (`idUtilisateurs`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Téléphones_has_Utilisateurs`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Téléphones_has_Utilisateurs` (
  `Téléphones_idTéléphones` INT NOT NULL,
  `Utilisateurs_idUtilisateurs` INT NOT NULL,
  PRIMARY KEY (`Téléphones_idTéléphones`, `Utilisateurs_idUtilisateurs`),
  CONSTRAINT `fk_Téléphones_has_Utilisateurs_Téléphones1`
    FOREIGN KEY (`Téléphones_idTéléphones`)
    REFERENCES `mydb`.`Téléphones` (`idTéléphones`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Téléphones_has_Utilisateurs_Utilisateurs1`
    FOREIGN KEY (`Utilisateurs_idUtilisateurs`)
    REFERENCES `mydb`.`Utilisateurs` (`idUtilisateurs`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Logiciels`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Logiciels` (
  `idLogiciels` INT NOT NULL,
  `Nom` VARCHAR(45) NULL,
  `Editeur` VARCHAR(45) NULL,
  `Licence` VARCHAR(45) NULL,
  `Tickets_idTickets` INT NOT NULL,
  PRIMARY KEY (`idLogiciels`, `Tickets_idTickets`),
  CONSTRAINT `fk_Logiciels_Tickets1`
    FOREIGN KEY (`Tickets_idTickets`)
    REFERENCES `mydb`.`Tickets` (`idTickets`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Logiciels_has_Ordinateurs`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Logiciels_has_Ordinateurs` (
  `Logiciels_idLogiciels` INT NOT NULL,
  `Ordinateurs_idOrdinateurs` INT NOT NULL,
  PRIMARY KEY (`Logiciels_idLogiciels`, `Ordinateurs_idOrdinateurs`),
  CONSTRAINT `fk_Logiciels_has_Ordinateurs_Logiciels1`
    FOREIGN KEY (`Logiciels_idLogiciels`)
    REFERENCES `mydb`.`Logiciels` (`idLogiciels`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Logiciels_has_Ordinateurs_Ordinateurs1`
    FOREIGN KEY (`Ordinateurs_idOrdinateurs`)
    REFERENCES `mydb`.`Ordinateurs` (`idOrdinateurs`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
