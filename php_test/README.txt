[database]
database : denkaru2_test
		|-- drugs
		|-- prescription

drugs
	id(int)
	name(varchar 50)
	amount(int)
	type(varchar 2)
	unit(varchar 2)
	classification(varchar 20)
	option(varchar 100)
	max_dose(int)
	frequency(int)

create table drugs(drug_id int AUTO_INCREMENT PRIMARY KEY,drug_name varchar(50),drug_amount int,drug_type varchar(2),drug_unit varchar(4),drug_classification varchar(20),drug_option varchar(100),max_dose int,frequency int);

prescription_2022
	id(int)
	d_id(int) FOREIGN KEY
	p_id(int) FOREIGN KEY
	date(int)
	drugs(varchar 300)

create table prescription_2022(rp_id int AUTO_INCREMENT PRIMARY KEY,d_id int,p_id int,date int,drugs varchar(300),FOREIGN KEY(d_id) references user(id),FOREIGN KEY(p_id) references patiant(id));

prescription.drugs
	{1:{1:{drug:,amount:,unit:,times:,timing:,
