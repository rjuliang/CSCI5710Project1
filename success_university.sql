/*By Brijesh Sharma
Julian Ramirez
*/

create database success_university;
use success_university;

create table VEHICLE(
    car_id int NOT NULL,
    car_make varchar(255),
    car_year int,
    car_model varchar(255),
    car_plate varchar(6),
    PRIMARY KEY(car_id)
);

insert into VEHICLE values(
111, 
"Honda",
1997,
"Civic",
"ABC123"
);

insert into VEHICLE values(
112, 
"Honda",
2004,
"Accord",
"GGB789"
);

insert into VEHICLE values(
113, 
"Hyundai",
2022,
"Malloc",
"TYU789"
);

insert into VEHICLE values(
114, 
"Ford",
2021,
"Explorer",
"MKL741"
);

insert into VEHICLE values(
115, 
"Toyota",
2012,
"Camry",
"CVB789"
);

create table DEPARTMENT(
    dept_id int NOT NULL,
    dept_name varchar(255),
    PRIMARY KEY(dept_id)
);

insert into DEPARTMENT values(
101, 
"Computer Science"
);

insert into DEPARTMENT values(
102, 
"Communication"
);

insert into DEPARTMENT values(
103, 
"Engineering"
);

insert into DEPARTMENT values(
104, 
"Social Science"
);

insert into DEPARTMENT values(
105, 
"Athletic Science"
);


create table PROFESSOR(
    professor_id int NOT NULL, 
    first_name varchar(100),
    last_name varchar(100),
    pro_address varchar(250),
    City varchar(50),
    State varchar(2),
    zip_code int,
    birth_date date,
    date_started date,
    car_id int,
    dept_id int NOT NULL,
    FOREIGN KEY (car_id) REFERENCES VEHICLE(car_id),
    FOREIGN KEY (dept_id) REFERENCES DEPARTMENT(dept_id),
    PRIMARY KEY(professor_id)
);

insert into PROFESSOR values(
    201,
    "Alfred",
    "Molina",
    "123 Unknown St",
    "St. Louis",
    "MO",
    "61475",
    "1960-04-05",
    "2015-05-05",
    113,
    101
);

insert into PROFESSOR values(
    202,
    "Juan",
    "Perez",
    "789 Locust Dr",
    "St. Louis",
    "MO",
    "61475",
    "1975-10-05",
    "2021-01-17",
    115,
    101
);

insert into PROFESSOR values(
    203,
    "Mary",
    "Spuckley",
    "101 Elizabeth Dr",
    "St. Louis",
    "MO",
    "67456",
    "1986-07-20",
    "2012-05-07",
    112,
    102
);

insert into PROFESSOR values(
    204,
    "Sanah",
    "Jane",
    "425 Endulgu Rd",
    "St. Louis",
    "MO",
    "69513",
    "1978-05-05",
    "2018-02-10",
    NULL,
    104
);

insert into PROFESSOR values(
    205,
    "Jenna",
    "Mcden",
    "612 Alberta St",
    "St. Louis",
    "MO",
    "67531",
    "1990-01-12",
    "2022-01-17",
    NULL,
    105
);

insert into PROFESSOR values(
    206,
    "Michael",
    "Canterbury",
    "45 Next St",
    "St. Louis",
    "MO",
    "69513",
    "1988-09-25",
    "2022-01-17",
    NULL,
    103
);

create table STUDENT(
    student_id int NOT NULL, 
    first_name varchar(100),
    last_name varchar(100),
    birth_date date,
    registration_date date,
    car_id int,
    advisor_id int NOT NULL,
    PRIMARY KEY(student_id),
    FOREIGN KEY (car_id) REFERENCES VEHICLE(car_id),
    FOREIGN KEY (advisor_id) REFERENCES PROFESSOR(professor_id)
);

insert into STUDENT values(
    1001,
    "Julian",
    "Ramirez",
    "1990-05-02",
    "2021-05-05",
    114,
    201
);

insert into STUDENT values(
    1002,
    "Michael",
    "Ronagard",
    "2004-10-25",
    "2021-07-27",
    111,
    201
);

insert into STUDENT values(
    1003,
    "Monica",
    "Latum",
    "2002-11-15",
    "2021-02-14",
    NULL,
    202
);

insert into STUDENT values(
    1004,
    "Laura",
    "Aston",
    "2001-02-26",
    "2021-06-10",
    NULL,
    203
);

insert into STUDENT values(
    1005,
    "Tamm",
    "Gray",
    "2000-03-31",
    "2021-08-27",
    NULL,
    205
);

create table COURSE(
    course_id int NOT NULL,
    course_title varchar(250) NOT NULL,
    PRIMARY KEY(course_id)
);

insert into COURSE values(
    301,
    "Intro to CS"
);

insert into COURSE values(
    302,
    "Intro to Business Communication"
);

insert into COURSE values(
    303,
    "basics of Modular Arithmetic"
);

insert into COURSE values(
    304,
    "Intro to Phylosophy"
);

insert into COURSE values(
    305,
    "Principles of Sports Science"
);

create table PARKING_ASSIGNMENT(
    parking_id int NOT NULL,
    car_id int NOT NULL,
    start_date date,
    end_date date,
    PRIMARY KEY(parking_id),
    FOREIGN KEY (car_id) REFERENCES VEHICLE(car_id)
);

insert into PARKING_ASSIGNMENT values (
    701,
    111,
    "2022-08-05",
    "2022-12-31"
);

insert into PARKING_ASSIGNMENT values (
    702,
    112,
    "2022-08-05",
    "2022-12-31"
);

insert into PARKING_ASSIGNMENT values (
    703,
    113,
    "2023-01-05",
    "2023-05-30"
);

insert into PARKING_ASSIGNMENT values (
    704,
    114,
    "2022-08-05",
    "2022-12-31"
);

insert into PARKING_ASSIGNMENT values (
    705,
    114,
    "2023-01-05",
    "2023-05-30"
);

insert into PARKING_ASSIGNMENT values (
    706,
    115,
    "2022-08-05",
    "2022-12-31"
);



create table SEMESTER(
    semester_id int NOT NULL,
    START_DATE date,
    end_date date,
    PRIMARY KEY(semester_id)
);

insert into SEMESTER values (
    501,
    "2022-08-20",
    "2022-12-17"
);

insert into SEMESTER values (
    502,
    "2023-01-17",
    "2023-05-15"
);

create table SECTION(
    section_id int NOT NULL,
    course_id int NOT NULL,
    professor_id int NOT NULL,
    semester_id int NOT NULL,
    PRIMARY KEY(section_id),
    FOREIGN KEY (course_id) REFERENCES COURSE(course_id),
    FOREIGN KEY (professor_id) REFERENCES PROFESSOR(professor_id),
    FOREIGN KEY (semester_id) REFERENCES SEMESTER(semester_id)
);

insert into SECTION values (
    601,
    301,
    201,
    501
);

insert into SECTION values (
    602,
    301,
    201,
    501
);

insert into SECTION values (
    603,
    301,
    202,
    502
);

insert into SECTION values (
    604,
    301,
    202,
    502
);

insert into SECTION values (
    605,
    302,
    203,
    501
);

insert into SECTION values (
    606,
    302,
    203,
    502
);

insert into SECTION values (
    607,
    303,
    206,
    501
);

insert into SECTION values (
    608,
    304,
    204,
    501
);

insert into SECTION values (
    609,
    305,
    205,
    501
);


create table ENROLLMENT(
    section_id int NOT NULL,
    student_id int NOT NULL,
    FOREIGN KEY (section_id) REFERENCES SECTION(section_id),
    FOREIGN KEY (student_id) REFERENCES STUDENT(student_id)
);

insert into ENROLLMENT values (
    601,
    1001
);

insert into ENROLLMENT values (
    607,
    1002
);

insert into ENROLLMENT values (
    601,
    1002
);

insert into ENROLLMENT values (
    605,
    1003
);

insert into ENROLLMENT values (
    601,
    1004
);

insert into ENROLLMENT values (
    607,
    1004
);

insert into ENROLLMENT values (
    601,
    1005
);

insert into ENROLLMENT values (
    609,
    1005
);


/*Selecting every table*/
select * from VEHICLE;
select * from DEPARTMENT;
select * from PROFESSOR;
select * from STUDENT;
select * from COURSE;
select * from PARKING_ASSIGNMENT;
select * from SEMESTER;
select * from SECTION;
select * from ENROLLMENT;


/*1. What are the plates of the cars that have active permits in 2022 and 2023?*/

select distinct v.car_plate
from PARKING_ASSIGNMENT as p, VEHICLE as v
where p.car_id = v.car_id and p.start_date >= '2022-01-01' and p.end_date <= '2023-12-31'
order by p.start_date;

/*2. What students are enrolled in 'Intro to CS' in 2022?*/

select stu.student_id, stu.first_name, stu.last_name
from COURSE as c, SECTION as s, ENROLLMENT as e, STUDENT as stu, SEMESTER as sem
where s.course_id = c.course_id 
AND s.section_id = e.section_id 
AND e.student_id = stu.student_id
AND s.semester_id = sem.semester_id
AND sem.START_DATE >= '2022-01-01' AND sem.end_date <= '2022-12-31'
AND c.course_title = 'Intro to CS';

/*3. What are the names of professors that have a car registered with an active parking permit?*/

select pro.first_name, pro.last_name
from PARKING_ASSIGNMENT as p, VEHICLE as v, PROFESSOR as pro
where p.car_id = v.car_id and p.start_date >= '2022-01-01' and p.car_id = pro.car_id;

/*4. What sections will be available for 2023 for 'Intro to CS'?*/

select s.section_id
from SECTION as s, COURSE as c, SEMESTER as sem
where s.course_id = c.course_id and s.semester_id = sem.semester_id and sem.start_date >= '2023-01-01' and sem.end_date <= '2023-12-31' and c.course_title = 'Intro to CS'
order by section_id;

/*5. How many sections professor Juan Perez will teach?*/

select COUNT( distinct s.section_id)
from SECTION as s, COURSE as c, PROFESSOR as p
where s.course_id = c.course_id and s.professor_id = p.professor_id and p.first_name = "Juan" and p.last_name = "Perez" 
order by section_id;

/*6. What students is professor 'Alfred Molina' their advisor?*/

select COUNT(student_id)
from STUDENT as s, PROFESSOR as p
where s.advisor_id = p.professor_id and p.first_name = "Alfred" and p.last_name = "Molina";

/*7. What are of the full name of the professor that teach "Intro to Business Communication"?*/

select distinct CONCAT(first_name, " ", last_name) as Professor
from SECTION as s, PROFESSOR as p, COURSE as c
where s.course_id = c.course_id
and s.professor_id = p.professor_id
and c.course_title = "Intro to Business Communication";

/*8. What parking_ids will expire at the end of 2022?*/

select distinct parking_id
from PARKING_ASSIGNMENT as p
where p.end_date = '2022-12-31';

/*9. How many registered cars are 2015 or newer?*/

select COUNT(car_id)
from VEHICLE as v
where car_year >= 2015;

/*10. What is the average age of the professors?*/

select AVG(YEAR(NOW()) - YEAR(birth_date)) as "Average Professor Age" from PROFESSOR;

/*11. What are the course titles (and sections) the student Laura Aston enrolled to?*/

select s.section_id, c.course_title
from SECTION as s, COURSE as c, SEMESTER as sem, STUDENT as stu, ENROLLMENT as e
where s.course_id = c.course_id 
and s.semester_id= sem.semester_id 
and stu.student_id = e.student_id 
and e.section_id = s.section_id 
and stu.first_name = "Laura" and stu.last_name = "Aston";

/*12. What is the highest amount of sections a student is enrolled to?*/

select MAX(m.sections) as 'The highest amount of sections a student is enrolled to'
from (select COUNT(s.section_id) as sections, stu.student_id, CONCAT(stu.first_name, " ", last_name) as 'Student Name'/*, COUNT(s.section_id)*/
from SECTION as s, STUDENT as stu, ENROLLMENT as e
where stu.student_id = e.student_id 
and e.section_id = s.section_id
group by stu.student_id
order by COUNT(s.section_id) desc) as m