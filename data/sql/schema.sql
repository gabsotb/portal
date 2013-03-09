CREATE TABLE approved_applications (id BIGINT AUTO_INCREMENT, business_id BIGINT UNIQUE NOT NULL, application_type VARCHAR(255) NOT NULL, comment VARCHAR(255), created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX business_id_idx (business_id), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE business_application_status (id BIGINT AUTO_INCREMENT, business_id BIGINT NOT NULL, application_status VARCHAR(255) NOT NULL, comment VARCHAR(255), percentage BIGINT NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX business_id_idx (business_id), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE business_plan (id BIGINT AUTO_INCREMENT, investment_id BIGINT UNIQUE NOT NULL, land_year1 BIGINT, land_year2 BIGINT, land_year3 BIGINT, land_year4 BIGINT, land_year5 BIGINT, construction_year1 BIGINT, construction_year2 BIGINT, construction_year3 BIGINT, construction_year4 BIGINT, construction_year5 BIGINT, machinery_year1 BIGINT, machinery_year2 BIGINT, machinery_year3 BIGINT, machinery_year4 BIGINT, machinery_year5 BIGINT, furniture_year1 BIGINT, furniture_year2 BIGINT, furniture_year3 BIGINT, furniture_year4 BIGINT, furniture_year5 BIGINT, other_assets1 BIGINT, other_assets2 BIGINT, other_assets3 BIGINT, other_assets4 BIGINT, other_assets5 BIGINT, studies_year1 BIGINT, studies_year2 BIGINT, studies_year3 BIGINT, studies_year4 BIGINT, studies_year5 BIGINT, travel_expenses1 BIGINT, travel_expenses2 BIGINT, travel_expenses3 BIGINT, travel_expenses4 BIGINT, travel_expenses5 BIGINT, starting_capital1 BIGINT, starting_capital2 BIGINT, starting_capital3 BIGINT, starting_capital4 BIGINT, starting_capital5 BIGINT, licensing_expenses1 BIGINT, licensing_expenses2 BIGINT, licensing_expenses3 BIGINT, licensing_expenses4 BIGINT, licensing_expenses5 BIGINT, rental_fees1 BIGINT, rental_fees2 BIGINT, rental_fees3 BIGINT, rental_fees4 BIGINT, rental_fees5 BIGINT, other_expeses1 BIGINT, other_expeses2 BIGINT, other_expeses3 BIGINT, other_expeses4 BIGINT, other_expeses5 BIGINT, equity_local BIGINT, equity_foregin BIGINT, bank_loan_local BIGINT, bank_loan_foreign BIGINT, mother_company_loan_local BIGINT, mother_company_loan_foreign BIGINT, grant_local BIGINT, grant_foreign BIGINT, top_management_local1 BIGINT, top_management_local2 BIGINT, top_management_local3 BIGINT, top_management_local4 BIGINT, top_management_local5 BIGINT, top_management_foreign1 BIGINT, top_management_foreign2 BIGINT, top_management_foreign3 BIGINT, top_management_foreign4 BIGINT, top_management_foreign5 BIGINT, technical_professional_local1 BIGINT, technical_professional_local2 BIGINT, technical_professional_local3 BIGINT, technical_professional_local4 BIGINT, technical_professional_local5 BIGINT, technical_professional_foreign1 BIGINT, technical_professional_foreign2 BIGINT, technical_professional_foreign3 BIGINT, technical_professional_foreign4 BIGINT, technical_professional_foreign5 BIGINT, skilled_labour_local1 BIGINT, skilled_labour_local2 BIGINT, skilled_labour_local3 BIGINT, skilled_labour_local4 BIGINT, skilled_labour_local5 BIGINT, skilled_labour_foreign1 BIGINT, skilled_labour_foreign2 BIGINT, skilled_labour_foreign3 BIGINT, skilled_labour_foreign4 BIGINT, skilled_labour_foreign5 BIGINT, other_jobs_local1 BIGINT, other_jobs_local2 BIGINT, other_jobs_local3 BIGINT, other_jobs_local4 BIGINT, other_jobs_local5 BIGINT, other_jobs_foreign1 BIGINT, other_jobs_foreign2 BIGINT, other_jobs_foreign3 BIGINT, other_jobs_foreign4 BIGINT, other_jobs_foreign5 BIGINT, sales_income1 BIGINT, sales_income2 BIGINT, sales_income3 BIGINT, sales_income4 BIGINT, sales_income5 BIGINT, total_cost_sales1 BIGINT, total_cost_sales2 BIGINT, total_cost_sales3 BIGINT, total_cost_sales4 BIGINT, total_cost_sales5 BIGINT, gross_profit1 BIGINT, gross_profit2 BIGINT, gross_profit3 BIGINT, gross_profit4 BIGINT, gross_profit5 BIGINT, indirect_expenses1 BIGINT, indirect_expenses2 BIGINT, indirect_expenses3 BIGINT, indirect_expenses4 BIGINT, indirect_expenses5 BIGINT, profit_before_tax1 BIGINT, profit_before_tax2 BIGINT, profit_before_tax3 BIGINT, profit_before_tax4 BIGINT, profit_before_tax5 BIGINT, tax_expenses1 BIGINT, tax_expenses2 BIGINT, tax_expenses3 BIGINT, tax_expenses4 BIGINT, tax_expenses5 BIGINT, net_profit1 BIGINT, net_profit2 BIGINT, net_profit3 BIGINT, net_profit4 BIGINT, net_profit5 BIGINT, project_brief TEXT NOT NULL, exemption_on_machinery VARCHAR(255), exemption_raw_materials TEXT, land_ownership_document VARCHAR(255), bill_of_quantiy VARCHAR(255), drawings VARCHAR(255), construction_permits VARCHAR(255), investment_allowances VARCHAR(255), additional_incentives TEXT, visa_work_permits TEXT, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, created_by BIGINT, updated_by TEXT, INDEX investment_id_idx (investment_id), INDEX created_by_idx (created_by), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE business_registration (id BIGINT AUTO_INCREMENT, business_name VARCHAR(255) NOT NULL, business_regno VARCHAR(255) NOT NULL, business_sector VARCHAR(255) NOT NULL, office_telephone VARCHAR(255) NOT NULL, fax VARCHAR(255) NOT NULL, post_box VARCHAR(255) NOT NULL, location VARCHAR(255) NOT NULL, sector VARCHAR(255) NOT NULL, district VARCHAR(255) NOT NULL, city_province VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE country (id BIGINT AUTO_INCREMENT, name VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, created_by BIGINT, updated_by TEXT, INDEX created_by_idx (created_by), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE e_i_a_certificate (id BIGINT AUTO_INCREMENT, serial_number BIGINT UNIQUE NOT NULL, company_id BIGINT UNIQUE NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX company_id_idx (company_id), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE e_i_a_report_decision (id BIGINT AUTO_INCREMENT, report_id BIGINT NOT NULL, decision BIGINT NOT NULL, comment VARCHAR(200) NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, created_by VARCHAR(255) DEFAULT 'None' NOT NULL, updated_by TEXT, INDEX report_id_idx (report_id), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE e_i_a_reports (id BIGINT AUTO_INCREMENT, module VARCHAR(200) NOT NULL, module_id BIGINT NOT NULL, recommendations TEXT NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, created_by VARCHAR(255) DEFAULT 'None' NOT NULL, updated_by TEXT, PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE e_i_application (id BIGINT AUTO_INCREMENT, name VARCHAR(255) NOT NULL, company_regno VARCHAR(255) NOT NULL UNIQUE, developer_title VARCHAR(255) NOT NULL, developer_address VARCHAR(255) NOT NULL, project_name VARCHAR(255) NOT NULL, project_purpose TEXT NOT NULL, project_nature TEXT NOT NULL, project_site TEXT NOT NULL, project_sitelaws TEXT NOT NULL, environment_impacts TEXT NOT NULL, other_alternatives TEXT, other_information TEXT, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, created_by BIGINT, updated_by TEXT, INDEX created_by_idx (created_by), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE e_i_application_decision (id BIGINT AUTO_INCREMENT, eireport_id BIGINT NOT NULL, status VARCHAR(255) NOT NULL, comments VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, created_by BIGINT, updated_by TEXT, INDEX eireport_id_idx (eireport_id), INDEX created_by_idx (created_by), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE e_i_application_status (id BIGINT AUTO_INCREMENT, company_id BIGINT NOT NULL, application_status VARCHAR(255) NOT NULL, comments VARCHAR(255) NOT NULL, percentage BIGINT NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX company_id_idx (company_id), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE e_i_report (id BIGINT AUTO_INCREMENT, company_id BIGINT UNIQUE NOT NULL, ei_doc VARCHAR(255) NOT NULL, emp_doc VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, created_by BIGINT, updated_by TEXT, INDEX company_id_idx (company_id), INDEX created_by_idx (created_by), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE e_i_task_assignment (id BIGINT AUTO_INCREMENT, user_assigned BIGINT NOT NULL, company_id BIGINT NOT NULL, instructions VARCHAR(255) NOT NULL, duedate DATETIME NOT NULL, work_status VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, created_by BIGINT, updated_by TEXT, INDEX company_id_idx (company_id), INDEX user_assigned_idx (user_assigned), INDEX created_by_idx (created_by), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE investment_application (id BIGINT AUTO_INCREMENT, name VARCHAR(255) NOT NULL UNIQUE, registration_number VARCHAR(255) NOT NULL UNIQUE, title_in_company VARCHAR(255) NOT NULL, business_sector VARCHAR(255) NOT NULL, business_category VARCHAR(255) NOT NULL, office_telephone VARCHAR(255) NOT NULL, fax VARCHAR(255) NOT NULL, post_box VARCHAR(255) NOT NULL, location VARCHAR(255) NOT NULL, sector VARCHAR(255) NOT NULL, district VARCHAR(255) NOT NULL, city_province VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, created_by BIGINT, updated_by TEXT, INDEX created_by_idx (created_by), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE investment_certificate (id BIGINT AUTO_INCREMENT, serial_number BIGINT UNIQUE NOT NULL, business_id BIGINT UNIQUE NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, created_by VARCHAR(255) DEFAULT 'None' NOT NULL, updated_by TEXT, INDEX business_id_idx (business_id), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE messages (id BIGINT AUTO_INCREMENT, sender VARCHAR(255) NOT NULL, recepient VARCHAR(255) NOT NULL, message TEXT NOT NULL, attachement VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE notifications (id BIGINT AUTO_INCREMENT, recepient VARCHAR(255) NOT NULL, message TEXT NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE payment (id BIGINT AUTO_INCREMENT, business_id BIGINT NOT NULL, payment_status VARCHAR(255) DEFAULT 'notpaid' NOT NULL, slip_number BIGINT UNIQUE NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, created_by BIGINT, updated_by TEXT, INDEX created_by_idx (created_by), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE portlets (id BIGINT AUTO_INCREMENT, investment_certificate TEXT NOT NULL, eia_certificate TEXT NOT NULL, tax_exemptions TEXT NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, created_by BIGINT, updated_by TEXT, INDEX created_by_idx (created_by), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE project_impact (id BIGINT AUTO_INCREMENT, company_id BIGINT NOT NULL, impact_level BIGINT NOT NULL, comments TEXT, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, created_by BIGINT, updated_by TEXT, INDEX company_id_idx (company_id), INDEX created_by_idx (created_by), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE project_summary (id BIGINT AUTO_INCREMENT, investment_id BIGINT UNIQUE NOT NULL, business_sector VARCHAR(255) NOT NULL, techinical_viability TEXT NOT NULL, planned_investment BIGINT NOT NULL, employment_created BIGINT NOT NULL, job_categories TEXT NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, created_by BIGINT, updated_by TEXT, INDEX investment_id_idx (investment_id), INDEX created_by_idx (created_by), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE public_hearing (id BIGINT AUTO_INCREMENT, company_id BIGINT NOT NULL, report TEXT NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, created_by BIGINT, updated_by TEXT, INDEX company_id_idx (company_id), INDEX created_by_idx (created_by), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE record_decision (id BIGINT AUTO_INCREMENT, tor_id BIGINT NOT NULL, decision TEXT NOT NULL, comment TEXT NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, created_by VARCHAR(255) DEFAULT 'None' NOT NULL, updated_by TEXT, INDEX tor_id_idx (tor_id), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE rejected_applications (id BIGINT AUTO_INCREMENT, business_id BIGINT UNIQUE NOT NULL, application_type VARCHAR(255) NOT NULL, comment VARCHAR(255), created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX business_id_idx (business_id), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE session (id VARCHAR(32), sessiondata TEXT NOT NULL, time INT NOT NULL, PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE task_assignment (id BIGINT AUTO_INCREMENT, user_assigned BIGINT NOT NULL, investmentapp_id BIGINT UNIQUE NOT NULL, instructions TEXT NOT NULL, duedate DATETIME NOT NULL, work_status VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, created_by BIGINT, updated_by TEXT, INDEX investmentapp_id_idx (investmentapp_id), INDEX user_assigned_idx (user_assigned), INDEX created_by_idx (created_by), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE technical_summary (id BIGINT AUTO_INCREMENT, tor_id BIGINT NOT NULL, report TEXT NOT NULL, comment TEXT NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, created_by VARCHAR(255) DEFAULT 'None' NOT NULL, updated_by TEXT, INDEX tor_id_idx (tor_id), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE tor (id BIGINT AUTO_INCREMENT, impact_id BIGINT NOT NULL, issues_assessed TEXT NOT NULL, specific_tasks TEXT NOT NULL, stake_holders TEXT NOT NULL, experts TEXT NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, created_by BIGINT, updated_by TEXT, INDEX impact_id_idx (impact_id), INDEX created_by_idx (created_by), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE tor_decisions (id BIGINT AUTO_INCREMENT, tor_id BIGINT NOT NULL, decision VARCHAR(100) NOT NULL, comments TEXT, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, created_by BIGINT, updated_by TEXT, INDEX tor_id_idx (tor_id), INDEX created_by_idx (created_by), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE tor_status (id BIGINT AUTO_INCREMENT, tor_id BIGINT NOT NULL, status VARCHAR(100) NOT NULL, comments TEXT, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, created_by BIGINT, updated_by TEXT, INDEX tor_id_idx (tor_id), INDEX created_by_idx (created_by), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE sf_guard_forgot_password (id BIGINT AUTO_INCREMENT, user_id BIGINT NOT NULL, unique_key VARCHAR(255), expires_at DATETIME NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX user_id_idx (user_id), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE sf_guard_group (id BIGINT AUTO_INCREMENT, name VARCHAR(255) UNIQUE, description TEXT, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE sf_guard_group_permission (group_id BIGINT, permission_id BIGINT, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(group_id, permission_id)) ENGINE = INNODB;
CREATE TABLE sf_guard_permission (id BIGINT AUTO_INCREMENT, name VARCHAR(255) UNIQUE, description TEXT, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE sf_guard_remember_key (id BIGINT AUTO_INCREMENT, user_id BIGINT, remember_key VARCHAR(32), ip_address VARCHAR(50), created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX user_id_idx (user_id), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE sf_guard_user (id BIGINT AUTO_INCREMENT, first_name VARCHAR(255) NOT NULL, last_name VARCHAR(255) NOT NULL, email_address VARCHAR(255) NOT NULL UNIQUE, username VARCHAR(128) NOT NULL UNIQUE, algorithm VARCHAR(128) DEFAULT 'sha1' NOT NULL, salt VARCHAR(128), password VARCHAR(128), is_active TINYINT(1) DEFAULT '1', is_super_admin TINYINT(1) DEFAULT '0', last_login DATETIME, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX is_active_idx_idx (is_active), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE sf_guard_user_group (user_id BIGINT, group_id BIGINT, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(user_id, group_id)) ENGINE = INNODB;
CREATE TABLE sf_guard_user_permission (user_id BIGINT, permission_id BIGINT, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(user_id, permission_id)) ENGINE = INNODB;
CREATE TABLE sf_guard_user_profile (id BIGINT AUTO_INCREMENT, user_id BIGINT UNIQUE NOT NULL, email_new VARCHAR(255) UNIQUE, firstname VARCHAR(255), lastname VARCHAR(255), validate_at DATETIME, validate VARCHAR(33), salutation VARCHAR(255) NOT NULL, citizenship VARCHAR(255) NOT NULL, surname VARCHAR(255) NOT NULL, phone_number VARCHAR(255) NOT NULL, id_passport VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX validate_idx (validate), INDEX user_id_idx (user_id), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE sf_korero_channel (id BIGINT AUTO_INCREMENT, name VARCHAR(255) NOT NULL UNIQUE, description TEXT, slug VARCHAR(255), UNIQUE INDEX sf_korero_channel_sluggable_idx (slug), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE sf_korero_message (id BIGINT AUTO_INCREMENT, channel_id BIGINT NOT NULL, user_id BIGINT NOT NULL, message TEXT NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX channel_id_idx (channel_id), INDEX user_id_idx (user_id), PRIMARY KEY(id)) ENGINE = INNODB;
ALTER TABLE approved_applications ADD CONSTRAINT approved_applications_business_id_investment_application_id FOREIGN KEY (business_id) REFERENCES investment_application(id);
ALTER TABLE business_application_status ADD CONSTRAINT bbii FOREIGN KEY (business_id) REFERENCES investment_application(id);
ALTER TABLE business_plan ADD CONSTRAINT business_plan_investment_id_investment_application_id FOREIGN KEY (investment_id) REFERENCES investment_application(id);
ALTER TABLE business_plan ADD CONSTRAINT business_plan_created_by_sf_guard_user_id FOREIGN KEY (created_by) REFERENCES sf_guard_user(id) ON DELETE CASCADE;
ALTER TABLE country ADD CONSTRAINT country_created_by_sf_guard_user_id FOREIGN KEY (created_by) REFERENCES sf_guard_user(id) ON DELETE CASCADE;
ALTER TABLE e_i_a_certificate ADD CONSTRAINT e_i_a_certificate_company_id_e_i_application_id FOREIGN KEY (company_id) REFERENCES e_i_application(id);
ALTER TABLE e_i_a_report_decision ADD CONSTRAINT e_i_a_report_decision_report_id_e_i_a_reports_id FOREIGN KEY (report_id) REFERENCES e_i_a_reports(id) ON DELETE CASCADE;
ALTER TABLE e_i_application ADD CONSTRAINT e_i_application_created_by_sf_guard_user_id FOREIGN KEY (created_by) REFERENCES sf_guard_user(id) ON DELETE CASCADE;
ALTER TABLE e_i_application_decision ADD CONSTRAINT e_i_application_decision_eireport_id_e_i_report_id FOREIGN KEY (eireport_id) REFERENCES e_i_report(id) ON DELETE CASCADE;
ALTER TABLE e_i_application_decision ADD CONSTRAINT e_i_application_decision_created_by_sf_guard_user_id FOREIGN KEY (created_by) REFERENCES sf_guard_user(id) ON DELETE CASCADE;
ALTER TABLE e_i_application_status ADD CONSTRAINT e_i_application_status_company_id_e_i_application_id FOREIGN KEY (company_id) REFERENCES e_i_application(id) ON DELETE CASCADE;
ALTER TABLE e_i_report ADD CONSTRAINT e_i_report_created_by_sf_guard_user_id FOREIGN KEY (created_by) REFERENCES sf_guard_user(id) ON DELETE CASCADE;
ALTER TABLE e_i_report ADD CONSTRAINT e_i_report_company_id_e_i_application_id FOREIGN KEY (company_id) REFERENCES e_i_application(id) ON DELETE CASCADE;
ALTER TABLE e_i_task_assignment ADD CONSTRAINT e_i_task_assignment_user_assigned_sf_guard_user_id FOREIGN KEY (user_assigned) REFERENCES sf_guard_user(id);
ALTER TABLE e_i_task_assignment ADD CONSTRAINT e_i_task_assignment_created_by_sf_guard_user_id FOREIGN KEY (created_by) REFERENCES sf_guard_user(id) ON DELETE CASCADE;
ALTER TABLE e_i_task_assignment ADD CONSTRAINT e_i_task_assignment_company_id_e_i_application_id FOREIGN KEY (company_id) REFERENCES e_i_application(id) ON DELETE CASCADE;
ALTER TABLE investment_application ADD CONSTRAINT investment_application_created_by_sf_guard_user_id FOREIGN KEY (created_by) REFERENCES sf_guard_user(id) ON DELETE CASCADE;
ALTER TABLE investment_certificate ADD CONSTRAINT investment_certificate_business_id_investment_application_id FOREIGN KEY (business_id) REFERENCES investment_application(id);
ALTER TABLE payment ADD CONSTRAINT payment_created_by_sf_guard_user_id FOREIGN KEY (created_by) REFERENCES sf_guard_user(id) ON DELETE CASCADE;
ALTER TABLE portlets ADD CONSTRAINT portlets_created_by_sf_guard_user_id FOREIGN KEY (created_by) REFERENCES sf_guard_user(id) ON DELETE CASCADE;
ALTER TABLE project_impact ADD CONSTRAINT project_impact_created_by_sf_guard_user_id FOREIGN KEY (created_by) REFERENCES sf_guard_user(id) ON DELETE CASCADE;
ALTER TABLE project_impact ADD CONSTRAINT project_impact_company_id_e_i_application_id FOREIGN KEY (company_id) REFERENCES e_i_application(id) ON DELETE CASCADE;
ALTER TABLE project_summary ADD CONSTRAINT project_summary_investment_id_investment_application_id FOREIGN KEY (investment_id) REFERENCES investment_application(id);
ALTER TABLE project_summary ADD CONSTRAINT project_summary_created_by_sf_guard_user_id FOREIGN KEY (created_by) REFERENCES sf_guard_user(id) ON DELETE CASCADE;
ALTER TABLE public_hearing ADD CONSTRAINT public_hearing_created_by_sf_guard_user_id FOREIGN KEY (created_by) REFERENCES sf_guard_user(id) ON DELETE CASCADE;
ALTER TABLE public_hearing ADD CONSTRAINT public_hearing_company_id_e_i_application_id FOREIGN KEY (company_id) REFERENCES e_i_application(id) ON DELETE CASCADE;
ALTER TABLE record_decision ADD CONSTRAINT record_decision_tor_id_tor_id FOREIGN KEY (tor_id) REFERENCES tor(id) ON DELETE CASCADE;
ALTER TABLE rejected_applications ADD CONSTRAINT rejected_applications_business_id_investment_application_id FOREIGN KEY (business_id) REFERENCES investment_application(id);
ALTER TABLE task_assignment ADD CONSTRAINT task_assignment_user_assigned_sf_guard_user_id FOREIGN KEY (user_assigned) REFERENCES sf_guard_user(id);
ALTER TABLE task_assignment ADD CONSTRAINT task_assignment_investmentapp_id_investment_application_id FOREIGN KEY (investmentapp_id) REFERENCES investment_application(id) ON DELETE CASCADE;
ALTER TABLE task_assignment ADD CONSTRAINT task_assignment_created_by_sf_guard_user_id FOREIGN KEY (created_by) REFERENCES sf_guard_user(id) ON DELETE CASCADE;
ALTER TABLE technical_summary ADD CONSTRAINT technical_summary_tor_id_tor_id FOREIGN KEY (tor_id) REFERENCES tor(id) ON DELETE CASCADE;
ALTER TABLE tor ADD CONSTRAINT tor_impact_id_project_impact_id FOREIGN KEY (impact_id) REFERENCES project_impact(id) ON DELETE CASCADE;
ALTER TABLE tor ADD CONSTRAINT tor_created_by_sf_guard_user_id FOREIGN KEY (created_by) REFERENCES sf_guard_user(id) ON DELETE CASCADE;
ALTER TABLE tor_decisions ADD CONSTRAINT tor_decisions_tor_id_tor_id FOREIGN KEY (tor_id) REFERENCES tor(id) ON DELETE CASCADE;
ALTER TABLE tor_decisions ADD CONSTRAINT tor_decisions_created_by_sf_guard_user_id FOREIGN KEY (created_by) REFERENCES sf_guard_user(id) ON DELETE CASCADE;
ALTER TABLE tor_status ADD CONSTRAINT tor_status_tor_id_tor_id FOREIGN KEY (tor_id) REFERENCES tor(id) ON DELETE CASCADE;
ALTER TABLE tor_status ADD CONSTRAINT tor_status_created_by_sf_guard_user_id FOREIGN KEY (created_by) REFERENCES sf_guard_user(id) ON DELETE CASCADE;
ALTER TABLE sf_guard_forgot_password ADD CONSTRAINT sf_guard_forgot_password_user_id_sf_guard_user_id FOREIGN KEY (user_id) REFERENCES sf_guard_user(id) ON DELETE CASCADE;
ALTER TABLE sf_guard_group_permission ADD CONSTRAINT sf_guard_group_permission_permission_id_sf_guard_permission_id FOREIGN KEY (permission_id) REFERENCES sf_guard_permission(id) ON DELETE CASCADE;
ALTER TABLE sf_guard_group_permission ADD CONSTRAINT sf_guard_group_permission_group_id_sf_guard_group_id FOREIGN KEY (group_id) REFERENCES sf_guard_group(id) ON DELETE CASCADE;
ALTER TABLE sf_guard_remember_key ADD CONSTRAINT sf_guard_remember_key_user_id_sf_guard_user_id FOREIGN KEY (user_id) REFERENCES sf_guard_user(id) ON DELETE CASCADE;
ALTER TABLE sf_guard_user_group ADD CONSTRAINT sf_guard_user_group_user_id_sf_guard_user_id FOREIGN KEY (user_id) REFERENCES sf_guard_user(id) ON DELETE CASCADE;
ALTER TABLE sf_guard_user_group ADD CONSTRAINT sf_guard_user_group_group_id_sf_guard_group_id FOREIGN KEY (group_id) REFERENCES sf_guard_group(id) ON DELETE CASCADE;
ALTER TABLE sf_guard_user_permission ADD CONSTRAINT sf_guard_user_permission_user_id_sf_guard_user_id FOREIGN KEY (user_id) REFERENCES sf_guard_user(id) ON DELETE CASCADE;
ALTER TABLE sf_guard_user_permission ADD CONSTRAINT sf_guard_user_permission_permission_id_sf_guard_permission_id FOREIGN KEY (permission_id) REFERENCES sf_guard_permission(id) ON DELETE CASCADE;
ALTER TABLE sf_guard_user_profile ADD CONSTRAINT sf_guard_user_profile_user_id_sf_guard_user_id FOREIGN KEY (user_id) REFERENCES sf_guard_user(id) ON DELETE CASCADE;
ALTER TABLE sf_korero_message ADD CONSTRAINT sf_korero_message_user_id_sf_guard_user_id FOREIGN KEY (user_id) REFERENCES sf_guard_user(id) ON DELETE CASCADE;
ALTER TABLE sf_korero_message ADD CONSTRAINT sf_korero_message_channel_id_sf_korero_channel_id FOREIGN KEY (channel_id) REFERENCES sf_korero_channel(id) ON DELETE CASCADE;
