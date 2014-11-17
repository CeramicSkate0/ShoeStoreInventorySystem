SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
-- -----------------------------------------------------
-- Schema fall14seniorproj
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `fall14seniorproj` DEFAULT CHARACTER SET latin1 ;
USE `fall14seniorproj` ;

-- -----------------------------------------------------
-- Table `fall14seniorproj`.`ACCOUNT`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `fall14seniorproj`.`ACCOUNT` (
  `Account_ID` INT(2) NOT NULL,
  `Type` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`Account_ID`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `fall14seniorproj`.`BRAND`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `fall14seniorproj`.`BRAND` (
  `Brand_ID` INT(11) NOT NULL AUTO_INCREMENT,
  `Name` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`Brand_ID`),
  UNIQUE INDEX `Brand_ID_UNIQUE` (`Brand_ID` ASC),
  UNIQUE INDEX `Name_UNIQUE` (`Name` ASC))
ENGINE = InnoDB
AUTO_INCREMENT = 5
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `fall14seniorproj`.`DEPARTMENT`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `fall14seniorproj`.`DEPARTMENT` (
  `Dept_ID` INT(11) NOT NULL AUTO_INCREMENT COMMENT 'PK',
  `Name` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`Dept_ID`),
  UNIQUE INDEX `Dept_ID_UNIQUE` (`Dept_ID` ASC),
  UNIQUE INDEX `Name_UNIQUE` (`Name` ASC))
ENGINE = InnoDB
AUTO_INCREMENT = 4
DEFAULT CHARACTER SET = latin1
COMMENT = 'Departments in the store';


-- -----------------------------------------------------
-- Table `fall14seniorproj`.`STORE`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `fall14seniorproj`.`STORE` (
  `Store_ID` INT(11) NOT NULL AUTO_INCREMENT COMMENT 'PK aka Store number',
  `Address` VARCHAR(45) NULL DEFAULT NULL,
  `City` VARCHAR(45) NULL DEFAULT NULL,
  `Zip` VARCHAR(45) NULL DEFAULT NULL,
  `State` VARCHAR(45) NULL DEFAULT NULL,
  `Phone` VARCHAR(45) NULL DEFAULT NULL,
  PRIMARY KEY (`Store_ID`))
ENGINE = InnoDB
AUTO_INCREMENT = 2
DEFAULT CHARACTER SET = latin1
COMMENT = 'Stores in the company';


-- -----------------------------------------------------
-- Table `fall14seniorproj`.`TITLE`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `fall14seniorproj`.`TITLE` (
  `Title_ID` INT(11) NOT NULL AUTO_INCREMENT,
  `Title` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`Title_ID`),
  UNIQUE INDEX `Title_ID_UNIQUE` (`Title_ID` ASC),
  UNIQUE INDEX `Title_UNIQUE` (`Title` ASC))
ENGINE = InnoDB
AUTO_INCREMENT = 5
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `fall14seniorproj`.`EMPLOYEE`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `fall14seniorproj`.`EMPLOYEE` (
  `User_ID` INT(11) NOT NULL AUTO_INCREMENT COMMENT 'PK',
  `Email` VARCHAR(255) NOT NULL COMMENT 'Used to login for username',
  `Password` VARCHAR(255) NOT NULL,
  `LastName` VARCHAR(25) NOT NULL,
  `FirstName` VARCHAR(25) NOT NULL,
  `MI` VARCHAR(1) NULL DEFAULT NULL,
  `Store_ID` INT(11) NOT NULL,
  `Title_ID` INT(11) NOT NULL,
  `Account_ID` INT(2) NOT NULL,
  PRIMARY KEY (`User_ID`, `Store_ID`, `Title_ID`, `Account_ID`),
  UNIQUE INDEX `Email` (`Email` ASC),
  INDEX `fk_EMPLOYEE_STORE1_idx` (`Store_ID` ASC),
  INDEX `fk_EMPLOYEE_TITLE1_idx` (`Title_ID` ASC),
  INDEX `fk_EMPLOYEE_ACCOUNT1_idx` (`Account_ID` ASC),
  CONSTRAINT `fk_EMPLOYEE_STORE1`
    FOREIGN KEY (`Store_ID`)
    REFERENCES `fall14seniorproj`.`STORE` (`Store_ID`)
    ON DELETE NO ACTION
    ON UPDATE CASCADE,
  CONSTRAINT `fk_EMPLOYEE_TITLE1`
    FOREIGN KEY (`Title_ID`)
    REFERENCES `fall14seniorproj`.`TITLE` (`Title_ID`)
    ON DELETE NO ACTION
    ON UPDATE CASCADE,
  CONSTRAINT `fk_EMPLOYEE_ACCOUNT1`
    FOREIGN KEY (`Account_ID`)
    REFERENCES `fall14seniorproj`.`ACCOUNT` (`Account_ID`)
    ON DELETE NO ACTION
    ON UPDATE CASCADE)
ENGINE = InnoDB
AUTO_INCREMENT = 2
DEFAULT CHARACTER SET = latin1
COMMENT = 'This table stores Employee Data as well the Emp;loyee User account data for Authenticating';


-- -----------------------------------------------------
-- Table `fall14seniorproj`.`VENDOR`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `fall14seniorproj`.`VENDOR` (
  `Vend_ID` INT(11) NOT NULL AUTO_INCREMENT COMMENT 'PK',
  `Company` VARCHAR(255) NOT NULL,
  `Vender_Code` VARCHAR(3) NULL DEFAULT NULL,
  `Parent` VARCHAR(1) NULL DEFAULT NULL,
  `POC_FN` VARCHAR(45) NULL DEFAULT NULL,
  `POC_LN` VARCHAR(45) NULL DEFAULT NULL,
  `Vender_Phone1` VARCHAR(10) NULL DEFAULT NULL,
  `Vender_Phone2` VARCHAR(10) NULL DEFAULT NULL,
  `Vender_Email` VARCHAR(45) NULL DEFAULT NULL,
  `Vender_Fax` VARCHAR(10) NULL DEFAULT NULL,
  `Vender_Street` VARCHAR(60) NULL DEFAULT NULL,
  `Vender_City` VARCHAR(45) NULL,
  `Vender_ST` VARCHAR(2) NULL DEFAULT NULL,
  `Vender_Zip` VARCHAR(5) NULL DEFAULT NULL,
  `Store_ID` INT(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`Vend_ID`, `Store_ID`),
  UNIQUE INDEX `Company_UNIQUE` (`Company` ASC),
  UNIQUE INDEX `Vend_ID_UNIQUE` (`Vend_ID` ASC),
  INDEX `fk_VENDOR_STORE1_idx` (`Store_ID` ASC),
  CONSTRAINT `fk_VENDOR_STORE1`
    FOREIGN KEY (`Store_ID`)
    REFERENCES `fall14seniorproj`.`STORE` (`Store_ID`)
    ON DELETE NO ACTION
    ON UPDATE CASCADE)
ENGINE = InnoDB
AUTO_INCREMENT = 2
DEFAULT CHARACTER SET = latin1
COMMENT = 'Vendors for the stores';


-- -----------------------------------------------------
-- Table `fall14seniorproj`.`PO-REQUEST`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `fall14seniorproj`.`PO-REQUEST` (
  `PO-Request_ID` INT(11) NOT NULL AUTO_INCREMENT,
  `Date_Generated` DATETIME NOT NULL,
  `Date_Filled` DATETIME NULL DEFAULT NULL,
  `Date_Expected` DATETIME NULL DEFAULT NULL,
  `Opened` TINYINT(1) NULL DEFAULT '1',
  `User_ID` INT(11) NOT NULL,
  `Store_ID` INT(11) NOT NULL,
  `Vend_ID` INT(11) NOT NULL,
  PRIMARY KEY (`PO-Request_ID`, `User_ID`, `Store_ID`, `Vend_ID`),
  UNIQUE INDEX `PO-Request_ID_UNIQUE` (`PO-Request_ID` ASC),
  INDEX `fk_PRODUCT-ORDER_EMPLOYEE1_idx` (`User_ID` ASC, `Store_ID` ASC),
  INDEX `fk_PO-REQUEST_VENDOR1_idx` (`Vend_ID` ASC),
  CONSTRAINT `fk_PRODUCT-ORDER_EMPLOYEE1`
    FOREIGN KEY (`User_ID` , `Store_ID`)
    REFERENCES `fall14seniorproj`.`EMPLOYEE` (`User_ID` , `Store_ID`)
    ON DELETE NO ACTION
    ON UPDATE CASCADE,
  CONSTRAINT `fk_PO-REQUEST_VENDOR1`
    FOREIGN KEY (`Vend_ID`)
    REFERENCES `fall14seniorproj`.`VENDOR` (`Vend_ID`)
    ON DELETE NO ACTION
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1
COMMENT = 'PO Table ';


-- -----------------------------------------------------
-- Table `fall14seniorproj`.`SIZE`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `fall14seniorproj`.`SIZE` (
  `Size_ID` INT(11) NOT NULL AUTO_INCREMENT,
  `Size` DECIMAL(3,1) NOT NULL,
  PRIMARY KEY (`Size_ID`),
  UNIQUE INDEX `Size_UNIQUE` (`Size` ASC),
  UNIQUE INDEX `Size_ID_UNIQUE` (`Size_ID` ASC))
ENGINE = InnoDB
AUTO_INCREMENT = 6
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `fall14seniorproj`.`MATERIAL`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `fall14seniorproj`.`MATERIAL` (
  `Material_ID` INT(11) NOT NULL,
  `Name` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`Material_ID`),
  UNIQUE INDEX `Name_UNIQUE` (`Name` ASC),
  UNIQUE INDEX `Material_ID_UNIQUE` (`Material_ID` ASC))
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `fall14seniorproj`.`PATTERN`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `fall14seniorproj`.`PATTERN` (
  `Pattern_ID` INT(11) NOT NULL,
  `Name` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`Pattern_ID`),
  UNIQUE INDEX `Pattern_ID_UNIQUE` (`Pattern_ID` ASC),
  UNIQUE INDEX `Name_UNIQUE` (`Name` ASC))
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `fall14seniorproj`.`PRODUCT`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `fall14seniorproj`.`PRODUCT` (
  `Product_ID` INT(255) NOT NULL AUTO_INCREMENT COMMENT 'PK',
  `Name` VARCHAR(255) NOT NULL,
  `Barcode` VARCHAR(12) NOT NULL,
  `UPC` VARCHAR(12) NOT NULL,
  `Factory_Num` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NULL DEFAULT NULL,
  `Width` DECIMAL(2,1) NULL DEFAULT NULL,
  `Heel_Height` DECIMAL(2,1) NULL DEFAULT NULL,
  `Color` VARCHAR(9) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NULL DEFAULT NULL,
  `Season` VARCHAR(9) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NULL DEFAULT NULL,
  `Last_Updated` DATETIME NULL DEFAULT NULL COMMENT 'Last time this product was touched',
  `Comment` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NULL DEFAULT NULL,
  `Retail_Price` DECIMAL(5,2) NULL DEFAULT NULL,
  `Line_Item_Cost` DECIMAL(5,2) NULL DEFAULT NULL,
  `Quantity_On_Hand` INT(11) NOT NULL DEFAULT '0',
  `Inventory_Last_Taken_By` INT(11) NOT NULL,
  `Brand_ID` INT(11) NOT NULL,
  `Size_ID` INT(11) NOT NULL,
  `Dept_ID` INT(11) NOT NULL,
  `Material_ID` INT(11) NOT NULL,
  `Pattern_ID` INT(11) NOT NULL,
  PRIMARY KEY (`Product_ID`, `Brand_ID`, `Size_ID`, `Dept_ID`, `Material_ID`, `Pattern_ID`),
  UNIQUE INDEX `Product_ID_UNIQUE` (`Product_ID` ASC),
  UNIQUE INDEX `Barcode_UNIQUE` (`Barcode` ASC),
  UNIQUE INDEX `UPC_UNIQUE` (`UPC` ASC),
  UNIQUE INDEX `Name_UNIQUE` (`Name` ASC),
  INDEX `fk_PRODUCT_BRAND1_idx` (`Brand_ID` ASC),
  INDEX `fk_PRODUCT_SIZE1_idx` (`Size_ID` ASC),
  INDEX `fk_PRODUCT_DEPARTMENT1_idx` (`Dept_ID` ASC),
  INDEX `fk_PRODUCT_MATERIAL1_idx` (`Material_ID` ASC),
  INDEX `fk_PRODUCT_PATTERN1_idx` (`Pattern_ID` ASC),
  CONSTRAINT `fk_PRODUCT_BRAND1`
    FOREIGN KEY (`Brand_ID`)
    REFERENCES `fall14seniorproj`.`BRAND` (`Brand_ID`)
    ON DELETE NO ACTION
    ON UPDATE CASCADE,
  CONSTRAINT `fk_PRODUCT_SIZE1`
    FOREIGN KEY (`Size_ID`)
    REFERENCES `fall14seniorproj`.`SIZE` (`Size_ID`)
    ON DELETE NO ACTION
    ON UPDATE CASCADE,
  CONSTRAINT `fk_PRODUCT_DEPARTMENT1`
    FOREIGN KEY (`Dept_ID`)
    REFERENCES `fall14seniorproj`.`DEPARTMENT` (`Dept_ID`)
    ON DELETE NO ACTION
    ON UPDATE CASCADE,
  CONSTRAINT `fk_PRODUCT_MATERIAL1`
    FOREIGN KEY (`Material_ID`)
    REFERENCES `fall14seniorproj`.`MATERIAL` (`Material_ID`)
    ON DELETE NO ACTION
    ON UPDATE CASCADE,
  CONSTRAINT `fk_PRODUCT_PATTERN1`
    FOREIGN KEY (`Pattern_ID`)
    REFERENCES `fall14seniorproj`.`PATTERN` (`Pattern_ID`)
    ON DELETE NO ACTION
    ON UPDATE CASCADE)
ENGINE = InnoDB
AUTO_INCREMENT = 3
DEFAULT CHARACTER SET = latin1
COMMENT = 'Products in the department';


-- -----------------------------------------------------
-- Table `fall14seniorproj`.`LINE_ITEM`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `fall14seniorproj`.`LINE_ITEM` (
  `Line_ID` INT(11) NOT NULL AUTO_INCREMENT,
  `Quantity_Ordered` INT(11) NULL DEFAULT NULL,
  `Quantity_Recieved` INT(11) NULL DEFAULT NULL,
  `PO-Request_ID` INT(11) NOT NULL,
  `User_ID` INT(11) NOT NULL,
  `Store_ID` INT(11) NOT NULL,
  `Vend_ID` INT(11) NOT NULL,
  `Product_ID` INT(255) NOT NULL,
  PRIMARY KEY (`Line_ID`, `PO-Request_ID`, `User_ID`, `Store_ID`, `Vend_ID`, `Product_ID`),
  UNIQUE INDEX `Line_ID_UNIQUE` (`Line_ID` ASC),
  INDEX `fk_LINE_ITEM_PO-REQUEST1_idx` (`PO-Request_ID` ASC, `User_ID` ASC, `Store_ID` ASC, `Vend_ID` ASC),
  INDEX `fk_LINE_ITEM_PRODUCT1_idx` (`Product_ID` ASC),
  CONSTRAINT `fk_LINE_ITEM_PO-REQUEST1`
    FOREIGN KEY (`PO-Request_ID` , `User_ID` , `Store_ID` , `Vend_ID`)
    REFERENCES `fall14seniorproj`.`PO-REQUEST` (`PO-Request_ID` , `User_ID` , `Store_ID` , `Vend_ID`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_LINE_ITEM_PRODUCT1`
    FOREIGN KEY (`Product_ID`)
    REFERENCES `fall14seniorproj`.`PRODUCT` (`Product_ID`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `fall14seniorproj`.`SALE`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `fall14seniorproj`.`SALE` (
  `Sale_ID` INT(11) NOT NULL AUTO_INCREMENT,
  `Sale_Price` DECIMAL(5,2) NULL DEFAULT NULL,
  `Sale_Precent` TINYINT(2) NULL DEFAULT NULL,
  `Sale_Start_Date` DATETIME NULL DEFAULT NULL,
  `Sale_End_Date` DATETIME NULL DEFAULT NULL,
  `Product_ID` INT(255) NOT NULL,
  `Dept_ID` INT(11) NOT NULL,
  PRIMARY KEY (`Sale_ID`, `Product_ID`, `Dept_ID`),
  UNIQUE INDEX `Sale_ID_UNIQUE` (`Sale_ID` ASC),
  INDEX `fk_SALE_PRODUCTS1_idx` (`Product_ID` ASC, `Dept_ID` ASC),
  CONSTRAINT `fk_SALE_PRODUCTS1`
    FOREIGN KEY (`Product_ID`)
    REFERENCES `fall14seniorproj`.`PRODUCT` (`Product_ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1
COMMENT = 'Keeps track of the items on sale';


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
