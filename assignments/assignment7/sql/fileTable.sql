CREATE TABLE uploadedFiles
(
    file_id int NOT NULL AUTO_INCREMENT,
    file_name char(50) NOT NULL,
    file_path char(50) NOT NULL,
    PRIMARY KEY (file_id)
) ENGINE = InnoDB;

