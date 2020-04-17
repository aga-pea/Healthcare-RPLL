insert INTO
	department(department_id, department_name)
	values(1, 'Departemen Penyakit Dalam');

insert INTO
	department(department_id, department_name)
	values(2, 'Departemen Penyakit Infeksius');

insert into 
	patient(patient_id, patient_name, patient_address, patient_age, patient_dob, patient_gender, patient_uname, patient_pwd) 
	values('A1', 'Fikri', 'Taman Rahayu', 20, '1999-04-20', 'L', 'fikri01', 'fikri123');

insert into 
	patient(patient_id, patient_name, patient_address, patient_age, patient_dob, patient_gender, patient_uname, patient_pwd) 
	values('A2', 'Gwen', 'Taman Kopo', 18, '2001-06-10', 'P', 'gwen10', 'gwen123');

insert into 
	medical_staff(medstaff_id, medstaff_age, medstaff_name, medstaff_uname, medstaff_pwd, department_id) 
	values(1, 35, 'Dion', 'ion', 'ion123', 1);

insert into 
	medical_staff(medstaff_id, medstaff_age, medstaff_name, medstaff_uname, medstaff_pwd, department_id) 
	values(2, 30, 'Jonathan', 'joe', 'joe123', 2);

insert into
	disease(disease_id, disease_type, disease_name)
	values(1, 'Infectious', 'Covid19');

insert into 
	referral_hospital(hospital_id, hospital_address, hospital_name)
	VALUES(1, 'Taman Kopo Indah 3', 'RS UKM');

insert INTO
	medical_record(record_id, patient_id, medstaff_id, disease_id, medicine_id, hospital_id, anamnesia)
	VALUES(1, 'A1', 1, 1, 1, 1, 'corona');