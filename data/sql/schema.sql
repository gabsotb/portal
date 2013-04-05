CREATE TABLE approved_applications (id BIGINT AUTO_INCREMENT, business_id BIGINT UNIQUE NOT NULL, application_type VARCHAR(255) NOT NULL, comment TEXT, token VARCHAR(255), created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX business_id_idx (business_id), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE business_application_status (id BIGINT AUTO_INCREMENT, business_id BIGINT NOT NULL, application_status VARCHAR(255) NOT NULL, comment VARCHAR(255), percentage BIGINT NOT NULL, token VARCHAR(255), created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX business_id_idx (business_id), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE business_plan (id BIGINT AUTO_INCREMENT, investment_id BIGINT UNIQUE NOT NULL, project_brief TEXT NOT NULL, exemption_on_machinery VARCHAR(255), exemption_raw_materials TEXT, land_ownership_document VARCHAR(255), bill_of_quantiy VARCHAR(255), drawings VARCHAR(255), construction_permits VARCHAR(255), investment_allowances VARCHAR(255), additional_incentives TEXT, visa_work_permits TEXT, token VARCHAR(255), created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, created_by BIGINT, updated_by TEXT, INDEX investment_id_idx (investment_id), INDEX created_by_idx (created_by), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE business_registration (id BIGINT AUTO_INCREMENT, business_name VARCHAR(255) NOT NULL, business_regno VARCHAR(255) NOT NULL, business_sector VARCHAR(255) NOT NULL, office_telephone VARCHAR(255) NOT NULL, fax VARCHAR(255) NOT NULL, post_box VARCHAR(255) NOT NULL, location VARCHAR(255) NOT NULL, sector VARCHAR(255) NOT NULL, district VARCHAR(255) NOT NULL, city_province VARCHAR(255) NOT NULL, token VARCHAR(255), created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE costs (id BIGINT AUTO_INCREMENT, business_plan BIGINT NOT NULL, year1 BIGINT, year2 BIGINT, year3 BIGINT, year4 BIGINT, year5 BIGINT, token VARCHAR(255), created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, created_by VARCHAR(255) DEFAULT 'None' NOT NULL, updated_by TEXT, INDEX business_plan_idx (business_plan), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE e_i_a_certificate (id BIGINT AUTO_INCREMENT, serial_number BIGINT UNIQUE NOT NULL, eireport_id BIGINT UNIQUE NOT NULL, token VARCHAR(255), created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX eireport_id_idx (eireport_id), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE e_i_a_project_attachment (id BIGINT AUTO_INCREMENT, eiaproject_id BIGINT UNIQUE NOT NULL, panoramic_view VARCHAR(255), perspective_site_impact VARCHAR(255), preliminary_approval VARCHAR(255) NOT NULL, land_ownership_doc VARCHAR(255), ministrial_document VARCHAR(255), perimeter_area_map VARCHAR(255), location_area_map VARCHAR(255), other_supporting_document VARCHAR(255), project_reference_number VARCHAR(255), token VARCHAR(255), created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, created_by BIGINT, updated_by TEXT, INDEX eiaproject_id_idx (eiaproject_id), INDEX created_by_idx (created_by), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE e_i_a_project_brief_decision (id BIGINT AUTO_INCREMENT, eiaproject_id BIGINT UNIQUE NOT NULL, decision VARCHAR(255) NOT NULL, comments VARCHAR(255) NOT NULL, processed_by BIGINT NOT NULL, token VARCHAR(255), created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, created_by BIGINT, updated_by TEXT, INDEX eiaproject_id_idx (eiaproject_id), INDEX processed_by_idx (processed_by), INDEX created_by_idx (created_by), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE e_i_a_project_description (id BIGINT AUTO_INCREMENT, eiaproject_id BIGINT UNIQUE NOT NULL, project_nature VARCHAR(255), project_objective TEXT, project_total_cost BIGINT, project_working_capital BIGINT, total_land_area BIGINT, existing_land_use BIGINT, site_location_developed_area TINYINT(1), site_location_undeveloped_area TINYINT(1), site_location_other TINYINT(1), site_location_other_specify TEXT, land_use_residential TINYINT(1), land_use_industrial TINYINT(1), land_use_tourism TINYINT(1), land_use_commercial TINYINT(1), land_use_instituational TINYINT(1), land_use_openspace TINYINT(1), land_use_other TINYINT(1), land_use_other_specify TEXT, project_components TEXT, project_activities TEXT, water_demand_during_implementation BIGINT, water_demand_during_operation BIGINT, public_water_supply TINYINT(1), water_treatment TINYINT(1), sewage_system TINYINT(1), sewage_system_modern TINYINT(1), sewage_system_ecosan TINYINT(1), sewage_system_biogas TINYINT(1), sewage_system_other TINYINT(1), sewage_system_other_specify VARCHAR(255), sewage_system_capacity BIGINT, power_supply_local_electricity TINYINT(1), power_supply_own_generator TINYINT(1), power_supply_local_electricity_size BIGINT, power_supply_own_generator_capacity BIGINT, power_supply_other TINYINT(1), power_supply_other_specify TEXT, solid_waste_ecological TINYINT(1), solid_waste_dumpsite TINYINT(1), solid_waste_municipal TINYINT(1), solid_waste_others TINYINT(1), solid_waste_others_specify TEXT, man_power_employment_implementation BIGINT, man_power_employment_operation BIGINT, implementation_duration BIGINT, token VARCHAR(255), created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, created_by BIGINT, updated_by TEXT, INDEX eiaproject_id_idx (eiaproject_id), INDEX created_by_idx (created_by), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE e_i_a_project_detail (id BIGINT AUTO_INCREMENT, project_reference_number BIGINT UNIQUE NOT NULL, project_title VARCHAR(255) NOT NULL, project_plot_number VARCHAR(255), village VARCHAR(255), cell VARCHAR(255), sector VARCHAR(255), district VARCHAR(255), province VARCHAR(255), name VARCHAR(255), token VARCHAR(255), created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, created_by BIGINT, updated_by TEXT, INDEX created_by_idx (created_by), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE e_i_a_project_developer (id BIGINT AUTO_INCREMENT, eiaproject_id BIGINT UNIQUE NOT NULL, developer_name VARCHAR(255) NOT NULL, contact_person VARCHAR(255) NOT NULL, address VARCHAR(255), telephone VARCHAR(255), mobile_phone VARCHAR(255), email_address VARCHAR(255) NOT NULL, communication_mode VARCHAR(255), social_media_account VARCHAR(255), token VARCHAR(255), created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, created_by BIGINT, updated_by TEXT, INDEX eiaproject_id_idx (eiaproject_id), INDEX created_by_idx (created_by), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE e_i_a_project_impact_measures (id BIGINT AUTO_INCREMENT, eiaproject_id BIGINT UNIQUE NOT NULL, dust_generation TINYINT(1), dust_generation_watering TINYINT(1), dust_generation_remove_soil TINYINT(1), dust_generation_hauling_trucks TINYINT(1), dust_generation_temporary_fence TINYINT(1), dust_generation_remarks TEXT, soil_removal TINYINT(1), soil_removal_mitigate_stockpile TINYINT(1), soil_removal_mitigate_revegetate TINYINT(1), soil_removal_remarks TEXT, erosion_from_cuts TINYINT(1), erosion_mitigate_construct_dryseason TINYINT(1), erosion_mitigate_avoid_exposure TINYINT(1), erosion_mitigate_barrier_nets TINYINT(1), erosion_remarks TEXT, sedimentation TINYINT(1), sedimentation_mitigate_silt_trap TINYINT(1), sedimentation_mitigate_proper_stockpilling TINYINT(1), sedimentation_mitigate_filling_materials TINYINT(1), sedimentation_remarks TEXT, pollution TINYINT(1), pollution_mitigate_temporary_disposal TINYINT(1), pollution_mitigate_toilet_facilities TINYINT(1), pollution_mitigate_contract_observe TINYINT(1), pollution_remarks TEXT, vegetation_loss TINYINT(1), vegetation_limit_clearing TINYINT(1), vegetation_provide_clearing TINYINT(1), vegetation_use_markers TINYINT(1), vegetation_replant TINYINT(1), vegetation_remarks TEXT, disturbance TINYINT(1), disturbance_reestablish TINYINT(1), disturbance_schedule TINYINT(1), disturbance_maintenance TINYINT(1), disturbance_remarks TEXT, noise_generation TINYINT(1), nosie_generation_schedule TINYINT(1), noise_generation_undertake TINYINT(1), noise_generation_remark TEXT, generation_employment TINYINT(1), generation_employment_hiring TINYINT(1), generation_employment_remarks TEXT, conflicts TINYINT(1), conflict_conslutation TINYINT(1), conflict_remarks TEXT, traffic_congestion TINYINT(1), traffic_rules_adherance TINYINT(1), traffice_aid_provision TINYINT(1), traffic_congestion_remarks TEXT, crimes_accidents TINYINT(1), crimes_accidents_safety_rules TINYINT(1), crime_accidents_remarks TINYINT(1), token VARCHAR(255), created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, created_by BIGINT, updated_by TEXT, INDEX eiaproject_id_idx (eiaproject_id), INDEX created_by_idx (created_by), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE e_i_a_project_impact_pass (id BIGINT AUTO_INCREMENT, eiaproject_id BIGINT NOT NULL, processed_by BIGINT NOT NULL, letter_status BIGINT NOT NULL, comments VARCHAR(255) NOT NULL, token VARCHAR(255), created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, created_by BIGINT, updated_by TEXT, INDEX eiaproject_id_idx (eiaproject_id), INDEX processed_by_idx (processed_by), INDEX created_by_idx (created_by), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE e_i_a_project_operation_phase (id BIGINT AUTO_INCREMENT, eiaproject_id BIGINT UNIQUE NOT NULL, domestic_influence TINYINT(1), domestic_wastewater_treatment TINYINT(1), domestic_influence_remarks TEXT, solid_wastes TINYINT(1), solid_wastes_segregation TINYINT(1), solid_wastes_proper_collection TINYINT(1), solid_wastes_proper_housekeeping TINYINT(1), solid_wastes_remarks TEXT, increased_traffic TINYINT(1), increased_traffic_rules_adhere TINYINT(1), increased_traffic_signables TINYINT(1), increased_traffice_remarks TEXT, fire_risk TINYINT(1), fire_risk_extinguishers TINYINT(1), fire_risk_exit_stairs TINYINT(1), fire_risk_remarks TEXT, token VARCHAR(255), created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, created_by BIGINT, updated_by TEXT, INDEX eiaproject_id_idx (eiaproject_id), INDEX created_by_idx (created_by), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE e_i_a_project_social_economic (id BIGINT AUTO_INCREMENT, eiaproject_id BIGINT UNIQUE NOT NULL, existing_settlements TINYINT(1), existing_settlements_remark TEXT, average_family_size BIGINT, average_family_size_remark TEXT, livelihood_farming TINYINT(1), livelihood_fishing TINYINT(1), livelihood_vending TINYINT(1), livelihood_others TINYINT(1), livelihood_others_specify TEXT, livelihood_remarks TEXT, local_organization TINYINT(1), local_organization_description TEXT, social_infrastructures TINYINT(1), social_schools TINYINT(1), social_health_centers TINYINT(1), social_hospital TINYINT(1), social_transportation TINYINT(1), social_communication TINYINT(1), social_churches TINYINT(1), social_roads TINYINT(1), social_others TINYINT(1), social_others_specify TEXT, token VARCHAR(255), created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, created_by BIGINT, updated_by TEXT, INDEX eiaproject_id_idx (eiaproject_id), INDEX created_by_idx (created_by), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE e_i_a_project_surrounding (id BIGINT AUTO_INCREMENT, eiaproject_id BIGINT UNIQUE NOT NULL, project_general_elevation BIGINT, soil_erosion TINYINT(1), soil_erosion_heavy_rains TINYINT(1), soil_erosion_unstable TINYINT(1), soil_erosion_others TINYINT(1), soil_erosion_others_specify VARCHAR(255), existing_water_body TINYINT(1), existing_water_body_remark VARCHAR(255), access_road TINYINT(1), access_road_distance BIGINT, access_road_type VARCHAR(255), site_conform_approval TINYINT(1), site_conform_remark VARCHAR(255), site_existing_structure TINYINT(1), site_existing_remark VARCHAR(255), land_use_agriculture TINYINT(1), land_use_grassland TINYINT(1), land_use_builtup TINYINT(1), land_use_marshland TINYINT(1), land_use_other TINYINT(1), land_use_other_specify VARCHAR(255), existing_trees TINYINT(1), existing_trees_remark VARCHAR(255), wildlife_existing TINYINT(1), wildlife_existing_remark VARCHAR(255), fishery_existing TINYINT(1), fishery_existing_remark VARCHAR(255), watershed_existing TINYINT(1), watershed_near_distance BIGINT, watershed_near_distance_units TEXT, watershed_within_name VARCHAR(255), token VARCHAR(255), created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, created_by BIGINT, updated_by TEXT, INDEX eiaproject_id_idx (eiaproject_id), INDEX created_by_idx (created_by), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE e_i_a_project_surrounding_species (id BIGINT AUTO_INCREMENT, project_surrounding_id BIGINT UNIQUE NOT NULL, birds_animals VARCHAR(255), trees_vegetation VARCHAR(255), fisheries VARCHAR(255), token VARCHAR(255), created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, created_by BIGINT, updated_by TEXT, INDEX project_surrounding_id_idx (project_surrounding_id), INDEX created_by_idx (created_by), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE e_i_a_tor_status (id BIGINT AUTO_INCREMENT, eiaproject_id BIGINT NOT NULL, sent_by BIGINT NOT NULL, comments VARCHAR(255) NOT NULL, token VARCHAR(255), created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, created_by BIGINT, updated_by TEXT, INDEX eiaproject_id_idx (eiaproject_id), INDEX sent_by_idx (sent_by), INDEX created_by_idx (created_by), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE e_i_application_certificate_permission (id BIGINT AUTO_INCREMENT, send_to BIGINT NOT NULL, sent_by BIGINT NOT NULL, message VARCHAR(255) NOT NULL, eireport_id BIGINT NOT NULL, token VARCHAR(255), created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, created_by BIGINT, updated_by TEXT, INDEX eireport_id_idx (eireport_id), INDEX created_by_idx (created_by), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE e_i_application_decision (id BIGINT AUTO_INCREMENT, eireport_id BIGINT NOT NULL, status VARCHAR(255) NOT NULL, comments VARCHAR(255) NOT NULL, token VARCHAR(255), created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, created_by BIGINT, updated_by TEXT, INDEX eireport_id_idx (eireport_id), INDEX created_by_idx (created_by), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE e_i_application_status (id BIGINT AUTO_INCREMENT, eiaproject_id BIGINT NOT NULL, application_status VARCHAR(255) NOT NULL, comments VARCHAR(255) NOT NULL, percentage BIGINT NOT NULL, token VARCHAR(255), created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX eiaproject_id_idx (eiaproject_id), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE e_i_comments (id BIGINT AUTO_INCREMENT, eiaproject_id BIGINT UNIQUE NOT NULL, eir_document_commented VARCHAR(255), processed_by BIGINT NOT NULL, token VARCHAR(255), created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, created_by BIGINT, updated_by TEXT, INDEX eiaproject_id_idx (eiaproject_id), INDEX processed_by_idx (processed_by), INDEX created_by_idx (created_by), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE e_i_report (id BIGINT AUTO_INCREMENT, eiaproject_id BIGINT UNIQUE NOT NULL, word_doc VARCHAR(255) NOT NULL, pdf_doc VARCHAR(255) NOT NULL, token VARCHAR(255), created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, created_by BIGINT, updated_by TEXT, INDEX eiaproject_id_idx (eiaproject_id), INDEX created_by_idx (created_by), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE e_i_task_assignment (id BIGINT AUTO_INCREMENT, user_assigned BIGINT NOT NULL, eiaproject_id BIGINT NOT NULL, instructions VARCHAR(255) NOT NULL, duedate DATETIME NOT NULL, work_status VARCHAR(255) NOT NULL, token VARCHAR(255), created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, created_by BIGINT, updated_by TEXT, INDEX eiaproject_id_idx (eiaproject_id), INDEX user_assigned_idx (user_assigned), INDEX created_by_idx (created_by), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE employementforeign (id BIGINT AUTO_INCREMENT, business_plan BIGINT NOT NULL, year1 BIGINT, year2 BIGINT, year3 BIGINT, year4 BIGINT, year5 BIGINT, token VARCHAR(255), created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, created_by VARCHAR(255) DEFAULT 'None' NOT NULL, updated_by TEXT, INDEX business_plan_idx (business_plan), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE employementlocal (id BIGINT AUTO_INCREMENT, business_plan BIGINT NOT NULL, year1 BIGINT, year2 BIGINT, year3 BIGINT, year4 BIGINT, year5 BIGINT, token VARCHAR(255), created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, created_by VARCHAR(255) DEFAULT 'None' NOT NULL, updated_by TEXT, INDEX business_plan_idx (business_plan), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE investment_application (id BIGINT AUTO_INCREMENT, name VARCHAR(255) NOT NULL, registration_number VARCHAR(255) NOT NULL, title_in_company VARCHAR(255), business_sector TEXT NOT NULL, business_category VARCHAR(255) NOT NULL, office_telephone VARCHAR(255), fax VARCHAR(255), post_box VARCHAR(255), location VARCHAR(255), sector VARCHAR(255), district VARCHAR(255), city_province VARCHAR(255), applicant_reference_number VARCHAR(255), token VARCHAR(255), created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, created_by BIGINT, updated_by TEXT, INDEX created_by_idx (created_by), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE investment_certificate (id BIGINT AUTO_INCREMENT, serial_number BIGINT UNIQUE NOT NULL, business_id BIGINT UNIQUE NOT NULL, token VARCHAR(255), created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, created_by VARCHAR(255) DEFAULT 'None' NOT NULL, updated_by TEXT, INDEX business_id_idx (business_id), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE investment_requests (id BIGINT AUTO_INCREMENT, requestor VARCHAR(255) NOT NULL, request_type VARCHAR(255) NOT NULL, status VARCHAR(255) NOT NULL, business_registration BIGINT NOT NULL, comments TEXT, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, created_by BIGINT, updated_by TEXT, INDEX created_by_idx (created_by), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE investment_resubmission (id BIGINT AUTO_INCREMENT, business_id BIGINT UNIQUE NOT NULL, message_subject VARCHAR(255) NOT NULL, message TEXT NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, created_by BIGINT, updated_by TEXT, INDEX created_by_idx (created_by), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE messages (id BIGINT AUTO_INCREMENT, sender VARCHAR(255) NOT NULL, recepient VARCHAR(255) NOT NULL, message_subject TEXT, message TEXT NOT NULL, attachement VARCHAR(255) NOT NULL, token VARCHAR(255), created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE notifications (id BIGINT AUTO_INCREMENT, recepient VARCHAR(255) NOT NULL, message TEXT NOT NULL, token VARCHAR(255), created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE payment (id BIGINT AUTO_INCREMENT, business_id BIGINT NOT NULL, payment_status VARCHAR(255) DEFAULT 'notpaid' NOT NULL, slip_number BIGINT UNIQUE NOT NULL, token VARCHAR(255), created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, created_by BIGINT, updated_by TEXT, INDEX created_by_idx (created_by), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE plannedperformance (id BIGINT AUTO_INCREMENT, business_plan BIGINT NOT NULL, year1 BIGINT, year2 BIGINT, year3 BIGINT, year4 BIGINT, year5 BIGINT, token VARCHAR(255), created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, created_by VARCHAR(255) DEFAULT 'None' NOT NULL, updated_by TEXT, INDEX business_plan_idx (business_plan), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE portlets (id BIGINT AUTO_INCREMENT, investment_certificate TEXT NOT NULL, eia_certificate TEXT NOT NULL, tax_exemptions TEXT NOT NULL, token VARCHAR(255), created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, created_by BIGINT, updated_by TEXT, INDEX created_by_idx (created_by), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE project_impact (id BIGINT AUTO_INCREMENT, eiaproject_id BIGINT UNIQUE NOT NULL, impact_level TEXT NOT NULL, comments TEXT, token VARCHAR(255), created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, created_by BIGINT, updated_by TEXT, INDEX eiaproject_id_idx (eiaproject_id), INDEX created_by_idx (created_by), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE project_summary (id BIGINT AUTO_INCREMENT, investment_id BIGINT UNIQUE NOT NULL, business_sector VARCHAR(255) NOT NULL, techinical_viability TEXT NOT NULL, planned_investment BIGINT NOT NULL, employment_created BIGINT NOT NULL, job_categories TEXT NOT NULL, token VARCHAR(255), created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, created_by BIGINT, updated_by TEXT, INDEX investment_id_idx (investment_id), INDEX created_by_idx (created_by), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE rejected_applications (id BIGINT AUTO_INCREMENT, business_registration BIGINT NOT NULL, application_type VARCHAR(255) NOT NULL, reason TEXT NOT NULL, comment TEXT, token VARCHAR(255), created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE session (id VARCHAR(32), sessiondata TEXT NOT NULL, time INT NOT NULL, token VARCHAR(255), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE startupexpenses (id BIGINT AUTO_INCREMENT, business_plan BIGINT NOT NULL, year1 BIGINT, year2 BIGINT, year3 BIGINT, year4 BIGINT, year5 BIGINT, token VARCHAR(255), created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, created_by VARCHAR(255) DEFAULT 'None' NOT NULL, updated_by TEXT, INDEX business_plan_idx (business_plan), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE structurefinancial (id BIGINT AUTO_INCREMENT, business_plan BIGINT NOT NULL, local_source BIGINT, foreign_source BIGINT, token VARCHAR(255), created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, created_by VARCHAR(255) DEFAULT 'None' NOT NULL, updated_by TEXT, INDEX business_plan_idx (business_plan), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE task_assignment (id BIGINT AUTO_INCREMENT, user_assigned BIGINT NOT NULL, investmentapp_id BIGINT UNIQUE NOT NULL, instructions TEXT NOT NULL, duedate DATETIME NOT NULL, work_status VARCHAR(255) NOT NULL, token VARCHAR(255), created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, created_by BIGINT, updated_by TEXT, INDEX investmentapp_id_idx (investmentapp_id), INDEX user_assigned_idx (user_assigned), INDEX created_by_idx (created_by), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE tor (id BIGINT AUTO_INCREMENT, eiaproject_id BIGINT NOT NULL, issues_assessed TEXT NOT NULL, specific_tasks TEXT NOT NULL, stake_holders TEXT NOT NULL, experts TEXT NOT NULL, token VARCHAR(255), created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, created_by BIGINT, updated_by TEXT, INDEX eiaproject_id_idx (eiaproject_id), INDEX created_by_idx (created_by), PRIMARY KEY(id)) ENGINE = INNODB;
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
ALTER TABLE approved_applications ADD CONSTRAINT approved_applications_business_id_investment_application_id FOREIGN KEY (business_id) REFERENCES investment_application(id) ON DELETE CASCADE;
ALTER TABLE business_application_status ADD CONSTRAINT bbii FOREIGN KEY (business_id) REFERENCES investment_application(id) ON DELETE CASCADE;
ALTER TABLE business_plan ADD CONSTRAINT business_plan_investment_id_investment_application_id FOREIGN KEY (investment_id) REFERENCES investment_application(id) ON DELETE CASCADE;
ALTER TABLE business_plan ADD CONSTRAINT business_plan_created_by_sf_guard_user_id FOREIGN KEY (created_by) REFERENCES sf_guard_user(id) ON DELETE CASCADE;
ALTER TABLE costs ADD CONSTRAINT costs_business_plan_investment_application_id FOREIGN KEY (business_plan) REFERENCES investment_application(id) ON DELETE CASCADE;
ALTER TABLE e_i_a_certificate ADD CONSTRAINT e_i_a_certificate_eireport_id_e_i_report_id FOREIGN KEY (eireport_id) REFERENCES e_i_report(id) ON DELETE CASCADE;
ALTER TABLE e_i_a_project_attachment ADD CONSTRAINT e_i_a_project_attachment_eiaproject_id_e_i_a_project_detail_id FOREIGN KEY (eiaproject_id) REFERENCES e_i_a_project_detail(id);
ALTER TABLE e_i_a_project_attachment ADD CONSTRAINT e_i_a_project_attachment_created_by_sf_guard_user_id FOREIGN KEY (created_by) REFERENCES sf_guard_user(id) ON DELETE CASCADE;
ALTER TABLE e_i_a_project_brief_decision ADD CONSTRAINT eeei FOREIGN KEY (eiaproject_id) REFERENCES e_i_a_project_detail(id) ON DELETE CASCADE;
ALTER TABLE e_i_a_project_brief_decision ADD CONSTRAINT e_i_a_project_brief_decision_processed_by_sf_guard_user_id FOREIGN KEY (processed_by) REFERENCES sf_guard_user(id);
ALTER TABLE e_i_a_project_brief_decision ADD CONSTRAINT e_i_a_project_brief_decision_created_by_sf_guard_user_id FOREIGN KEY (created_by) REFERENCES sf_guard_user(id) ON DELETE CASCADE;
ALTER TABLE e_i_a_project_description ADD CONSTRAINT e_i_a_project_description_eiaproject_id_e_i_a_project_detail_id FOREIGN KEY (eiaproject_id) REFERENCES e_i_a_project_detail(id);
ALTER TABLE e_i_a_project_description ADD CONSTRAINT e_i_a_project_description_created_by_sf_guard_user_id FOREIGN KEY (created_by) REFERENCES sf_guard_user(id) ON DELETE CASCADE;
ALTER TABLE e_i_a_project_detail ADD CONSTRAINT e_i_a_project_detail_created_by_sf_guard_user_id FOREIGN KEY (created_by) REFERENCES sf_guard_user(id) ON DELETE CASCADE;
ALTER TABLE e_i_a_project_developer ADD CONSTRAINT e_i_a_project_developer_eiaproject_id_e_i_a_project_detail_id FOREIGN KEY (eiaproject_id) REFERENCES e_i_a_project_detail(id);
ALTER TABLE e_i_a_project_developer ADD CONSTRAINT e_i_a_project_developer_created_by_sf_guard_user_id FOREIGN KEY (created_by) REFERENCES sf_guard_user(id) ON DELETE CASCADE;
ALTER TABLE e_i_a_project_impact_measures ADD CONSTRAINT eeei_1 FOREIGN KEY (eiaproject_id) REFERENCES e_i_a_project_detail(id);
ALTER TABLE e_i_a_project_impact_measures ADD CONSTRAINT e_i_a_project_impact_measures_created_by_sf_guard_user_id FOREIGN KEY (created_by) REFERENCES sf_guard_user(id) ON DELETE CASCADE;
ALTER TABLE e_i_a_project_impact_pass ADD CONSTRAINT e_i_a_project_impact_pass_processed_by_sf_guard_user_id FOREIGN KEY (processed_by) REFERENCES sf_guard_user(id);
ALTER TABLE e_i_a_project_impact_pass ADD CONSTRAINT e_i_a_project_impact_pass_eiaproject_id_e_i_a_project_detail_id FOREIGN KEY (eiaproject_id) REFERENCES e_i_a_project_detail(id) ON DELETE CASCADE;
ALTER TABLE e_i_a_project_impact_pass ADD CONSTRAINT e_i_a_project_impact_pass_created_by_sf_guard_user_id FOREIGN KEY (created_by) REFERENCES sf_guard_user(id) ON DELETE CASCADE;
ALTER TABLE e_i_a_project_operation_phase ADD CONSTRAINT eeei_2 FOREIGN KEY (eiaproject_id) REFERENCES e_i_a_project_detail(id);
ALTER TABLE e_i_a_project_operation_phase ADD CONSTRAINT e_i_a_project_operation_phase_created_by_sf_guard_user_id FOREIGN KEY (created_by) REFERENCES sf_guard_user(id) ON DELETE CASCADE;
ALTER TABLE e_i_a_project_social_economic ADD CONSTRAINT eeei_3 FOREIGN KEY (eiaproject_id) REFERENCES e_i_a_project_detail(id);
ALTER TABLE e_i_a_project_social_economic ADD CONSTRAINT e_i_a_project_social_economic_created_by_sf_guard_user_id FOREIGN KEY (created_by) REFERENCES sf_guard_user(id) ON DELETE CASCADE;
ALTER TABLE e_i_a_project_surrounding ADD CONSTRAINT e_i_a_project_surrounding_eiaproject_id_e_i_a_project_detail_id FOREIGN KEY (eiaproject_id) REFERENCES e_i_a_project_detail(id);
ALTER TABLE e_i_a_project_surrounding ADD CONSTRAINT e_i_a_project_surrounding_created_by_sf_guard_user_id FOREIGN KEY (created_by) REFERENCES sf_guard_user(id) ON DELETE CASCADE;
ALTER TABLE e_i_a_project_surrounding_species ADD CONSTRAINT epei FOREIGN KEY (project_surrounding_id) REFERENCES e_i_a_project_surrounding(id);
ALTER TABLE e_i_a_project_surrounding_species ADD CONSTRAINT e_i_a_project_surrounding_species_created_by_sf_guard_user_id FOREIGN KEY (created_by) REFERENCES sf_guard_user(id) ON DELETE CASCADE;
ALTER TABLE e_i_a_tor_status ADD CONSTRAINT e_i_a_tor_status_sent_by_sf_guard_user_id FOREIGN KEY (sent_by) REFERENCES sf_guard_user(id);
ALTER TABLE e_i_a_tor_status ADD CONSTRAINT e_i_a_tor_status_eiaproject_id_e_i_a_project_detail_id FOREIGN KEY (eiaproject_id) REFERENCES e_i_a_project_detail(id) ON DELETE CASCADE;
ALTER TABLE e_i_a_tor_status ADD CONSTRAINT e_i_a_tor_status_created_by_sf_guard_user_id FOREIGN KEY (created_by) REFERENCES sf_guard_user(id) ON DELETE CASCADE;
ALTER TABLE e_i_application_certificate_permission ADD CONSTRAINT ecsi FOREIGN KEY (created_by) REFERENCES sf_guard_user(id) ON DELETE CASCADE;
ALTER TABLE e_i_application_certificate_permission ADD CONSTRAINT e_i_application_certificate_permission_eireport_id_e_i_report_id FOREIGN KEY (eireport_id) REFERENCES e_i_report(id) ON DELETE CASCADE;
ALTER TABLE e_i_application_decision ADD CONSTRAINT e_i_application_decision_eireport_id_e_i_report_id FOREIGN KEY (eireport_id) REFERENCES e_i_report(id) ON DELETE CASCADE;
ALTER TABLE e_i_application_decision ADD CONSTRAINT e_i_application_decision_created_by_sf_guard_user_id FOREIGN KEY (created_by) REFERENCES sf_guard_user(id) ON DELETE CASCADE;
ALTER TABLE e_i_application_status ADD CONSTRAINT e_i_application_status_eiaproject_id_e_i_a_project_detail_id FOREIGN KEY (eiaproject_id) REFERENCES e_i_a_project_detail(id) ON DELETE CASCADE;
ALTER TABLE e_i_comments ADD CONSTRAINT e_i_comments_processed_by_sf_guard_user_id FOREIGN KEY (processed_by) REFERENCES sf_guard_user(id);
ALTER TABLE e_i_comments ADD CONSTRAINT e_i_comments_eiaproject_id_e_i_a_project_detail_id FOREIGN KEY (eiaproject_id) REFERENCES e_i_a_project_detail(id) ON DELETE CASCADE;
ALTER TABLE e_i_comments ADD CONSTRAINT e_i_comments_created_by_sf_guard_user_id FOREIGN KEY (created_by) REFERENCES sf_guard_user(id) ON DELETE CASCADE;
ALTER TABLE e_i_report ADD CONSTRAINT e_i_report_eiaproject_id_e_i_a_project_detail_id FOREIGN KEY (eiaproject_id) REFERENCES e_i_a_project_detail(id) ON DELETE CASCADE;
ALTER TABLE e_i_report ADD CONSTRAINT e_i_report_created_by_sf_guard_user_id FOREIGN KEY (created_by) REFERENCES sf_guard_user(id) ON DELETE CASCADE;
ALTER TABLE e_i_task_assignment ADD CONSTRAINT e_i_task_assignment_user_assigned_sf_guard_user_id FOREIGN KEY (user_assigned) REFERENCES sf_guard_user(id);
ALTER TABLE e_i_task_assignment ADD CONSTRAINT e_i_task_assignment_eiaproject_id_e_i_a_project_detail_id FOREIGN KEY (eiaproject_id) REFERENCES e_i_a_project_detail(id) ON DELETE CASCADE;
ALTER TABLE e_i_task_assignment ADD CONSTRAINT e_i_task_assignment_created_by_sf_guard_user_id FOREIGN KEY (created_by) REFERENCES sf_guard_user(id) ON DELETE CASCADE;
ALTER TABLE employementforeign ADD CONSTRAINT employementforeign_business_plan_investment_application_id FOREIGN KEY (business_plan) REFERENCES investment_application(id) ON DELETE CASCADE;
ALTER TABLE employementlocal ADD CONSTRAINT employementlocal_business_plan_investment_application_id FOREIGN KEY (business_plan) REFERENCES investment_application(id) ON DELETE CASCADE;
ALTER TABLE investment_application ADD CONSTRAINT investment_application_created_by_sf_guard_user_id FOREIGN KEY (created_by) REFERENCES sf_guard_user(id) ON DELETE CASCADE;
ALTER TABLE investment_certificate ADD CONSTRAINT investment_certificate_business_id_investment_application_id FOREIGN KEY (business_id) REFERENCES investment_application(id) ON DELETE CASCADE;
ALTER TABLE investment_requests ADD CONSTRAINT investment_requests_created_by_sf_guard_user_id FOREIGN KEY (created_by) REFERENCES sf_guard_user(id) ON DELETE CASCADE;
ALTER TABLE investment_resubmission ADD CONSTRAINT investment_resubmission_created_by_sf_guard_user_id FOREIGN KEY (created_by) REFERENCES sf_guard_user(id) ON DELETE CASCADE;
ALTER TABLE payment ADD CONSTRAINT payment_created_by_sf_guard_user_id FOREIGN KEY (created_by) REFERENCES sf_guard_user(id) ON DELETE CASCADE;
ALTER TABLE plannedperformance ADD CONSTRAINT plannedperformance_business_plan_investment_application_id FOREIGN KEY (business_plan) REFERENCES investment_application(id) ON DELETE CASCADE;
ALTER TABLE portlets ADD CONSTRAINT portlets_created_by_sf_guard_user_id FOREIGN KEY (created_by) REFERENCES sf_guard_user(id) ON DELETE CASCADE;
ALTER TABLE project_impact ADD CONSTRAINT project_impact_eiaproject_id_e_i_a_project_detail_id FOREIGN KEY (eiaproject_id) REFERENCES e_i_a_project_detail(id) ON DELETE CASCADE;
ALTER TABLE project_impact ADD CONSTRAINT project_impact_created_by_sf_guard_user_id FOREIGN KEY (created_by) REFERENCES sf_guard_user(id) ON DELETE CASCADE;
ALTER TABLE project_summary ADD CONSTRAINT project_summary_investment_id_investment_application_id FOREIGN KEY (investment_id) REFERENCES investment_application(id) ON DELETE CASCADE;
ALTER TABLE project_summary ADD CONSTRAINT project_summary_created_by_sf_guard_user_id FOREIGN KEY (created_by) REFERENCES sf_guard_user(id) ON DELETE CASCADE;
ALTER TABLE startupexpenses ADD CONSTRAINT startupexpenses_business_plan_investment_application_id FOREIGN KEY (business_plan) REFERENCES investment_application(id) ON DELETE CASCADE;
ALTER TABLE structurefinancial ADD CONSTRAINT structurefinancial_business_plan_investment_application_id FOREIGN KEY (business_plan) REFERENCES investment_application(id) ON DELETE CASCADE;
ALTER TABLE task_assignment ADD CONSTRAINT task_assignment_user_assigned_sf_guard_user_id FOREIGN KEY (user_assigned) REFERENCES sf_guard_user(id);
ALTER TABLE task_assignment ADD CONSTRAINT task_assignment_investmentapp_id_investment_application_id FOREIGN KEY (investmentapp_id) REFERENCES investment_application(id) ON DELETE CASCADE;
ALTER TABLE task_assignment ADD CONSTRAINT task_assignment_created_by_sf_guard_user_id FOREIGN KEY (created_by) REFERENCES sf_guard_user(id) ON DELETE CASCADE;
ALTER TABLE tor ADD CONSTRAINT tor_eiaproject_id_e_i_a_project_detail_id FOREIGN KEY (eiaproject_id) REFERENCES e_i_a_project_detail(id) ON DELETE CASCADE;
ALTER TABLE tor ADD CONSTRAINT tor_created_by_sf_guard_user_id FOREIGN KEY (created_by) REFERENCES sf_guard_user(id) ON DELETE CASCADE;
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
