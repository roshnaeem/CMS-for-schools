
DROP SCHEMA IF EXISTS Techdb;
CREATE SCHEMA Techdb;
USE Techdb;


CREATE TABLE Student (
  Student_ID INT NOT NULL AUTO_INCREMENT,
  /*Teacher_ID INT,*/
 
  Email VARCHAR(45),
 
  Password VARCHAR(45),
   username VARCHAR(45),

 
 /*FOREIGN KEY (Teacher_ID) REFERENCES Teacher (Teacher_ID),*/
  PRIMARY KEY  (Student_ID)
);
--

CREATE TABLE Teacher (
  Teacher_ID INT NOT NULL AUTO_INCREMENT,
 
  Email VARCHAR(45),

  Password VARCHAR(45),
 
  PRIMARY KEY  (Teacher_ID)
);
CREATE TABLE TeacherStudent (
  
  Email VARCHAR(45),
  Student_ID INT
 
  
);

CREATE TABLE AttendanceTable(

	Attendance_ID INT NOT NULL AUTO_INCREMENT,
	username VARCHAR(45),
	
	Student_ID INT,
	Attendancedate date, 

	PRIMARY KEY  (Attendance_ID),
	FOREIGN KEY (Student_ID) REFERENCES Student (Student_ID),
	FOREIGN KEY (username) REFERENCES Student (username)
  	ON DELETE SET NULL

);
CREATE TABLE COMMENTS(

	Comment_ID INT NOT NULL AUTO_INCREMENT,
	Comment VARCHAR(90),
	Student_ID INT,

	PRIMARY KEY  (Comment_ID),
	 FOREIGN KEY (Student_ID) REFERENCES Student (Student_ID)
  	ON DELETE SET NULL

);

CREATE TABLE Skills(

	Skill_ID INT NOT NULL AUTO_INCREMENT,
	Skill VARCHAR(90),
	Student_ID INT,

	PRIMARY KEY  (Skill_ID),
	 FOREIGN KEY (Student_ID) REFERENCES Student (Student_ID)
  	ON DELETE SET NULL

);
CREATE TABLE Scores(

	Score_ID INT NOT NULL AUTO_INCREMENT,
	Score INT,
	Student_ID INT,

	PRIMARY KEY  (Score_ID),
	 FOREIGN KEY (Student_ID) REFERENCES Student (Student_ID)
  	ON DELETE SET NULL

);



INSERT INTO Student(Email, Password,username) Values ("r@gmail.com","tr", "rosheen"),
("r@m.com","rm", "roshi"),("r@mm.com","rmm", "roshim"),("r@mm.comm","rmm", "marry"),("r@egmail.com","tre","peter"),
("r@ma.com","rma","watson"),("r@degmail.com","detr","jim"),
("ionran@m.com","ironman", "ron"),("capr@gmail.com","capr","harry"),
("thor@m.com","thorm", "kin");
INSERT INTO COMMENTS (Comment, Student_ID) Values("hihihihi", 2),("hey hey hey",8),("This is a good student", 3),("This is a bad student",1),
("This is a stupid student", 7),("This is a brilliant student",7),("This is the worse student", 6),("This is a good student",5),
("This is an amazing student", 4),("This is a perfect student",8);;

INSERT INTO Skills (Skill, Student_ID) Values("creative writing", 2),("Programming",8),("coding",7),("content writing",6),("gaming",8),("writing",3),("reading",4)
,("sports",5),("public speaking",6),("writing",7);;
INSERT INTO Teacher(Email,Password) values ("rober@nozick.com","tr"),("william@gmail.com","will"), ("marry@rohn.com","marry"),("jim@gmail.com","water");
INSERT INTO Scores (Score, Student_ID) Values(50, 2),(40,1),(50, 2),(40,3),(50, 4),(40,8),(50, 5),(40,5),(50, 6),(40,8),(50, 7),(40,1);
INSERT INTO AttendanceTable(username,Student_ID,Attendancedate) values("rosheen", 2,"2019-3-24"), ( "roshi",1,"2019-8-24"),
( "peter",5,"2019-8-24"),( "harry",9,"2019-8-24"),( "ron",7,"2019-8-24");
INSERT INTO TeacherStudent(Email,Student_ID) Values ("rober@nozick.com",2),("rober@nozick.com",1),("william@gmail.com",5),("william@gmail.com",6),
("marry@rohn.com",5),("marry@rohn.com",7),
("jim@gmail.com",3);
