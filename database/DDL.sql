CREATE DATABASE healthcare_rpll;

CREATE TABLE patient(
	patient_id VARCHAR(10),
	patient_name VARCHAR(50),
	patient_address VARCHAR(50),
	patient_age int,
	patient_dob date,
	patient_gender char(1),
	patient_uname VARCHAR(50),
	patient_pwd VARCHAR(20),
	PRIMARY KEY(patient_id)
);

CREATE TABLE department(
	department_id int,
	department_name VARCHAR(50),
	PRIMARY KEY(department_id)
);

CREATE TABLE nonmedical_staff(
	nonmed_id int,
	nonmed_name VARCHAR(50),
	nonmed_job VARCHAR(50),
	nonmed_uname VARCHAR(50),
	nonmed_pwd VARCHAR(20),
	PRIMARY KEY(nonmed_id)
);

CREATE TABLE laboratory(
	lab_id int,
	lab_name VARCHAR(50),
	lab_availability boolean,
	PRIMARY KEY(lab_id)
);

CREATE TABLE medical_utilities(
	util_id int,
	util_name VARCHAR(50),
	util_type VARCHAR(50),
	util_qty int,
	PRIMARY KEY(util_id)
);

CREATE TABLE disease(
	disease_id int,
	disease_type VARCHAR(50),
	disease_name VARCHAR(50),
	PRIMARY KEY(disease_id)
);

CREATE TABLE referral_hospital(
	hospital_id int,
	hospital_address VARCHAR(50),
	hospital_name VARCHAR(50),
	PRIMARY KEY(hospital_id)
);

CREATE TABLE medicine(
	medicine_id int,
	medicine_exp_date date,
	medicine_level int,
	medicine_name VARCHAR(30),
	medicine_price int,
	medicine_qty int,
	medicine_type VARCHAR(30),
	medicine_vendor VARCHAR(30),
	PRIMARY KEY(medicine_id)
);

CREATE TABLE electronics(
	electronic_id int,
	electronic_name VARCHAR(50),
	electronic_qty int,
	electronic_type VARCHAR(50),
	PRIMARY KEY(electronic_id)
);

CREATE TABLE medical_staff(
	medstaff_id int,
	medstaff_age int,
	medstaff_name VARCHAR(50),
	medstaff_uname VARCHAR(50),
	medstaff_pwd VARCHAR(20),
	anamnesia VARCHAR(300),
	#fk
	department_id int,
	PRIMARY KEY(medstaff_id),
	FOREIGN KEY(department_id) REFERENCES department(department_id)
);

CREATE TABLE vehicles(
	vehicle_id int,
	vehicle_type VARCHAR(50),
	vehicle_availability boolean,
	#fk
	nonmed_id int,
	PRIMARY KEY(vehicle_id),
	FOREIGN KEY(nonmed_id) REFERENCES nonmedical_staff(nonmed_id)
);

CREATE TABLE appointment(
	appt_id int,
	appt_date date,
	appt_time time,
	appt_status boolean,
	#fk
	patient_id VARCHAR(10),
	medstaff_id int,
	PRIMARY KEY(appt_id),
	FOREIGN KEY(patient_id) REFERENCES patient(patient_id),
	FOREIGN KEY(medstaff_id) REFERENCES medical_staff(medstaff_id)
);

CREATE TABLE patient_room(
	room_no int,
	room_capacity int,
	room_availability boolean,
	#fk
	patient_id VARCHAR(10),
	electronic_id int,
	medstaff_id int,
	util_id int,
	PRIMARY KEY(room_no),
	FOREIGN KEY(patient_id) REFERENCES patient(patient_id),
	FOREIGN KEY(medstaff_id) REFERENCES medical_staff(medstaff_id),
	FOREIGN KEY(electronic_id) REFERENCES electronics(electronic_id),
	FOREIGN KEY(util_id) REFERENCES medical_utilities(util_id)
);

CREATE TABLE medical_record(
	record_id int,
	#fk
	patient_id VARCHAR(10),
	medstaff_id int,
	disease_id int,
	medicine_id int,
	hospital_id int,
	PRIMARY KEY(record_id),
	FOREIGN KEY(patient_id) REFERENCES patient(patient_id),
	FOREIGN KEY(medstaff_id) REFERENCES medical_staff(medstaff_id),
	FOREIGN KEY(disease_id) REFERENCES disease(disease_id),
	FOREIGN KEY(medicine_id) references medicine(medicine_id),
	FOREIGN KEY(hospital_id) references referral_hospital(hospital_id)
);

CREATE TABLE invoice(
	invoice_id int,
	invoice_amount int,
	invoice_date date,
	invoice_method VARCHAR(50),
	#fk
	patient_id VARCHAR(10),
	record_id int,
	PRIMARY KEY(invoice_id),
	FOREIGN KEY(patient_id) REFERENCES patient(patient_id),
	FOREIGN KEY(record_id) REFERENCES medical_record(record_id)
);

CREATE TABLE schedule(
	schedule_id int NOT NULL AUTO_INCREMENT,
	schedule_date date,
	schedule_time time,
	#fk
	medstaff_id int,
	PRIMARY KEY(schedule_id),
	FOREIGN KEY(medstaff_id) REFERENCES medical_staff(medstaff_id)
);