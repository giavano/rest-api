CREATE DATABASE giavano;

use giavano;

CREATE TABLE registration(
    id int PRIMARY KEY  NOT NULL UNIQUE auto_increment,
    mobile varchar(20)  NOT NULL UNIQUE,
    firstname varchar(30) NOT NULL,
    lastname varchar(30) NOT NULL,
    dob date,
    gender char(1),
    email varchar(50) UNIQUE NOT NULL
)

