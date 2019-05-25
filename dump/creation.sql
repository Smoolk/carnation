/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
/**
 * Author:  USER
 * Created: 25-mai-2019
 */

-- -----------------------------------------------------------------------------
--             Génération d'une base de données pour
--                           PostgreSQL
--                        (18/3/2019 9:42:27)
-- -----------------------------------------------------------------------------
--      Nom de la base : MLR1
--      Projet : 
--      Auteur : DC
--      Date de dernière modification : 18/3/2019 9:41:08
-- -----------------------------------------------------------------------------

drop database MLR1;
-- -----------------------------------------------------------------------------
--       CREATION DE LA BASE 
-- -----------------------------------------------------------------------------

CREATE DATABASE MLR1;

-- -----------------------------------------------------------------------------
--       TABLE : MARQUE
-- -----------------------------------------------------------------------------

CREATE TABLE MARQUE
   (
    ID_MARQUE serial NOT NULL  ,
    NOM_MARQUE text NULL  
,   CONSTRAINT PK_MARQUE PRIMARY KEY (ID_MARQUE)
   );

-- -----------------------------------------------------------------------------
--       TABLE : MOTO
-- -----------------------------------------------------------------------------

CREATE TABLE MOTO
   (
    ID_MOTO serial NOT NULL  ,
    ID_PERMIS int4 NOT NULL  ,
    ID_COULEUR int4 NOT NULL  ,
    ID_MARQUE int8 NOT NULL  ,
    MODÈLE text NULL  ,
    CYLINDREE int4 NULL  ,
    PUISSANCE int4 NULL  ,
    ANNEE int4 NULL  ,
    KM int4 NULL  ,
    PRIX int4 NULL  ,
    VENDU int4 NULL  ,
    IMAGE text NULL  
,   CONSTRAINT PK_MOTO PRIMARY KEY (ID_MOTO)
   );

-- -----------------------------------------------------------------------------
--       INDEX DE LA TABLE MOTO
-- -----------------------------------------------------------------------------

CREATE  INDEX I_FK_MOTO_PERMIS
     ON MOTO (ID_PERMIS)
    ;

CREATE  INDEX I_FK_MOTO_COULEUR
     ON MOTO (ID_COULEUR)
    ;

CREATE  INDEX I_FK_MOTO_MARQUE
     ON MOTO (ID_MARQUE)
    ;

-- -----------------------------------------------------------------------------
--       TABLE : COULEUR
-- -----------------------------------------------------------------------------

CREATE TABLE COULEUR
   (
    ID_COULEUR serial NOT NULL  ,
    NOM_COULEUR text NULL  
,   CONSTRAINT PK_COULEUR PRIMARY KEY (ID_COULEUR)
   );

-- -----------------------------------------------------------------------------
--       TABLE : PERMIS
-- -----------------------------------------------------------------------------

CREATE TABLE PERMIS
   (
    ID_PERMIS serial NOT NULL  ,
    GRADE text NULL  ,
    DESCRIPTION text NULL  
,   CONSTRAINT PK_PERMIS PRIMARY KEY (ID_PERMIS)
   );

-- -----------------------------------------------------------------------------
--       TABLE : MESSAGE
-- -----------------------------------------------------------------------------

CREATE TABLE MESSAGE
   (
    ID_MESS serial NOT NULL  ,
    ID_MOTO_MOTO_MESSAGE int4 NOT NULL  ,
    MAIL text NULL  ,
    ID_MOTO text NULL  ,
    TEXTE text NULL  
,   CONSTRAINT PK_MESSAGE PRIMARY KEY (ID_MESS)
   );

-- -----------------------------------------------------------------------------
--       INDEX DE LA TABLE MESSAGE
-- -----------------------------------------------------------------------------

CREATE  INDEX I_FK_MESSAGE_MOTO
     ON MESSAGE (ID_MOTO_MOTO_MESSAGE)
    ;


-- -----------------------------------------------------------------------------
--       CREATION DES REFERENCES DE TABLE
-- -----------------------------------------------------------------------------


ALTER TABLE MOTO ADD 
     CONSTRAINT FK_MOTO_PERMIS
          FOREIGN KEY (ID_PERMIS)
               REFERENCES PERMIS (ID_PERMIS);

ALTER TABLE MOTO ADD 
     CONSTRAINT FK_MOTO_COULEUR
          FOREIGN KEY (ID_COULEUR)
               REFERENCES COULEUR (ID_COULEUR);

ALTER TABLE MOTO ADD 
     CONSTRAINT FK_MOTO_MARQUE
          FOREIGN KEY (ID_MARQUE)
               REFERENCES MARQUE (ID_MARQUE);

ALTER TABLE MESSAGE ADD 
     CONSTRAINT FK_MESSAGE_MOTO
          FOREIGN KEY (ID_MOTO_MOTO_MESSAGE)
               REFERENCES MOTO (ID_MOTO);


-- -----------------------------------------------------------------------------
--                FIN DE GENERATION
-- -----------------------------------------------------------------------------