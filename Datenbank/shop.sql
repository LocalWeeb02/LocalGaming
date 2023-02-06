-- SQL script for "neues (E)ER-Diagramm"

CREATE TABLE Produkt (
    Produkt_ID BIGINT NOT NULL,
    P_Name VARCHAR(50) NOT NULL,
    P_Zustand VARCHAR(50) NOT NULL,
    P_Preis DOUBLE NOT NULL CHECK (P_Preis >= '0.00'),
    Beschreibung VARCHAR(1000),
    Cart_ID BIGINT,
    Konsole_ID BIGINT,
    PRIMARY KEY (Produkt_ID)
);

CREATE TABLE Warenkorb (
    Cart_ID BIGINT NOT NULL,
    Nutzer_ID BIGINT,
    Anzahl BIGINT,
    erstellt TIMESTAMP,
    PRIMARY KEY (Cart_ID)
);

CREATE TABLE Endgerät (
    Konsole_ID BIGINT NOT NULL,
    K_Name VARCHAR(50),
    PRIMARY KEY (Konsole_ID)
);

ALTER TABLE Produkt
    ADD FOREIGN KEY (Cart_ID) REFERENCES Warenkorb (Cart_ID) ON DELETE SET NULL ON UPDATE NO ACTION;

ALTER TABLE Produkt
    ADD FOREIGN KEY (Konsole_ID) REFERENCES Endgerät (Konsole_ID) ON DELETE SET NULL ON UPDATE NO ACTION;

-- The length of character string columns are specified as the maximum number of bytes in the string.
-- Depending on the character set this can differ from the number of characters.