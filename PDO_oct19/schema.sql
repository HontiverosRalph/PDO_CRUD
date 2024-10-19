CREATE TABLE db_administrators (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    first_name VARCHAR(50) NOT NULL,
    last_name VARCHAR(50) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    phone VARCHAR(15) NOT NULL,
    experience_years INT(2) NOT NULL,
    specialization VARCHAR(50),
    date_added TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
