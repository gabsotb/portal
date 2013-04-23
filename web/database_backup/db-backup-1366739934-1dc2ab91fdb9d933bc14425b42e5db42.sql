DROP TABLE approved_applications;

CREATE TABLE `approved_applications` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `business_id` bigint(20) NOT NULL,
  `applicant_reference_number` varchar(255) NOT NULL,
  `business_registration` bigint(20) NOT NULL,
  `application_type` varchar(255) NOT NULL,
  `comment` varchar(255) DEFAULT NULL,
  `token` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `created_by` bigint(20) DEFAULT NULL,
  `updated_by` text,
  PRIMARY KEY (`id`),
  UNIQUE KEY `applicant_reference_number` (`applicant_reference_number`),
  KEY `business_id_idx` (`business_id`),
  KEY `created_by_idx` (`created_by`),
  CONSTRAINT `approved_applications_business_id_investment_application_id` FOREIGN KEY (`business_id`) REFERENCES `investment_application` (`id`) ON DELETE CASCADE,
  CONSTRAINT `approved_applications_created_by_sf_guard_user_id` FOREIGN KEY (`created_by`) REFERENCES `sf_guard_user` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




DROP TABLE business_application_status;

CREATE TABLE `business_application_status` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `business_id` bigint(20) NOT NULL,
  `application_status` varchar(255) NOT NULL,
  `comment` varchar(255) DEFAULT NULL,
  `percentage` bigint(20) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `business_id_idx` (`business_id`),
  CONSTRAINT `bbii` FOREIGN KEY (`business_id`) REFERENCES `investment_application` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




DROP TABLE business_plan;

CREATE TABLE `business_plan` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `investment_id` bigint(20) NOT NULL,
  `project_brief` text NOT NULL,
  `exemption_on_machinery` varchar(255) DEFAULT NULL,
  `exemption_raw_materials` text,
  `land_ownership_document` varchar(255) DEFAULT NULL,
  `bill_of_quantiy` varchar(255) DEFAULT NULL,
  `drawings` varchar(255) DEFAULT NULL,
  `construction_permits` varchar(255) DEFAULT NULL,
  `investment_allowances` varchar(255) DEFAULT NULL,
  `additional_incentives` text,
  `visa_work_permits` text,
  `token` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `created_by` bigint(20) DEFAULT NULL,
  `updated_by` text,
  PRIMARY KEY (`id`),
  UNIQUE KEY `investment_id` (`investment_id`),
  KEY `investment_id_idx` (`investment_id`),
  KEY `created_by_idx` (`created_by`),
  CONSTRAINT `business_plan_created_by_sf_guard_user_id` FOREIGN KEY (`created_by`) REFERENCES `sf_guard_user` (`id`) ON DELETE CASCADE,
  CONSTRAINT `business_plan_investment_id_investment_application_id` FOREIGN KEY (`investment_id`) REFERENCES `investment_application` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




DROP TABLE business_registration;

CREATE TABLE `business_registration` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `business_name` varchar(255) NOT NULL,
  `business_regno` varchar(255) NOT NULL,
  `business_sector` varchar(255) NOT NULL,
  `office_telephone` varchar(255) NOT NULL,
  `fax` varchar(255) NOT NULL,
  `post_box` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `sector` varchar(255) NOT NULL,
  `district` varchar(255) NOT NULL,
  `city_province` varchar(255) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




DROP TABLE certification_report;

CREATE TABLE `certification_report` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `investment_certificates` bigint(20) DEFAULT NULL,
  `eia_certificates` bigint(20) DEFAULT NULL,
  `tax_exemptions` bigint(20) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `created_by` bigint(20) DEFAULT NULL,
  `updated_by` text,
  PRIMARY KEY (`id`),
  KEY `created_by_idx` (`created_by`),
  CONSTRAINT `certification_report_created_by_sf_guard_user_id` FOREIGN KEY (`created_by`) REFERENCES `sf_guard_user` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




DROP TABLE costs;

CREATE TABLE `costs` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `business_plan` bigint(20) NOT NULL,
  `year1` bigint(20) DEFAULT NULL,
  `year2` bigint(20) DEFAULT NULL,
  `year3` bigint(20) DEFAULT NULL,
  `year4` bigint(20) DEFAULT NULL,
  `year5` bigint(20) DEFAULT NULL,
  `token` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `created_by` varchar(255) NOT NULL DEFAULT 'None',
  `updated_by` text,
  PRIMARY KEY (`id`),
  KEY `business_plan_idx` (`business_plan`),
  CONSTRAINT `costs_business_plan_investment_application_id` FOREIGN KEY (`business_plan`) REFERENCES `investment_application` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




DROP TABLE e_i_a_assessment_decision;

CREATE TABLE `e_i_a_assessment_decision` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `taskassignment_id` bigint(20) NOT NULL,
  `eia_stage` text NOT NULL,
  `verdict` text NOT NULL,
  `remarks` varchar(255) DEFAULT NULL,
  `token` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `created_by` bigint(20) DEFAULT NULL,
  `updated_by` text,
  PRIMARY KEY (`id`),
  KEY `taskassignment_id_idx` (`taskassignment_id`),
  KEY `created_by_idx` (`created_by`),
  CONSTRAINT `e_i_a_assessment_decision_created_by_sf_guard_user_id` FOREIGN KEY (`created_by`) REFERENCES `sf_guard_user` (`id`) ON DELETE CASCADE,
  CONSTRAINT `etei` FOREIGN KEY (`taskassignment_id`) REFERENCES `e_i_task_assignment` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




DROP TABLE e_i_a_certificate;

CREATE TABLE `e_i_a_certificate` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `serial_number` bigint(20) NOT NULL,
  `eireport_id` bigint(20) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `serial_number` (`serial_number`),
  UNIQUE KEY `eireport_id` (`eireport_id`),
  KEY `eireport_id_idx` (`eireport_id`),
  CONSTRAINT `e_i_a_certificate_eireport_id_e_i_report_id` FOREIGN KEY (`eireport_id`) REFERENCES `e_i_report` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




DROP TABLE e_i_a_project_attachment;

CREATE TABLE `e_i_a_project_attachment` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `eiaproject_id` bigint(20) NOT NULL,
  `panoramic_view` varchar(255) DEFAULT NULL,
  `perspective_site_impact` varchar(255) DEFAULT NULL,
  `preliminary_approval` varchar(255) NOT NULL,
  `land_ownership_doc` varchar(255) DEFAULT NULL,
  `ministrial_document` varchar(255) DEFAULT NULL,
  `perimeter_area_map` varchar(255) DEFAULT NULL,
  `location_area_map` varchar(255) DEFAULT NULL,
  `other_supporting_document` varchar(255) DEFAULT NULL,
  `project_reference_number` varchar(255) DEFAULT NULL,
  `token` varchar(255) DEFAULT NULL,
  `resubmit` text,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `created_by` bigint(20) DEFAULT NULL,
  `updated_by` text,
  PRIMARY KEY (`id`),
  UNIQUE KEY `eiaproject_id` (`eiaproject_id`),
  KEY `eiaproject_id_idx` (`eiaproject_id`),
  KEY `created_by_idx` (`created_by`),
  CONSTRAINT `e_i_a_project_attachment_created_by_sf_guard_user_id` FOREIGN KEY (`created_by`) REFERENCES `sf_guard_user` (`id`) ON DELETE CASCADE,
  CONSTRAINT `e_i_a_project_attachment_eiaproject_id_e_i_a_project_detail_id` FOREIGN KEY (`eiaproject_id`) REFERENCES `e_i_a_project_detail` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




DROP TABLE e_i_a_project_brief_decision;

CREATE TABLE `e_i_a_project_brief_decision` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `eiaproject_id` bigint(20) NOT NULL,
  `decision` varchar(255) NOT NULL,
  `comments` varchar(255) NOT NULL,
  `processed_by` bigint(20) NOT NULL,
  `form` text,
  `token` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `created_by` bigint(20) DEFAULT NULL,
  `updated_by` text,
  PRIMARY KEY (`id`),
  UNIQUE KEY `eiaproject_id` (`eiaproject_id`),
  KEY `eiaproject_id_idx` (`eiaproject_id`),
  KEY `processed_by_idx` (`processed_by`),
  KEY `created_by_idx` (`created_by`),
  CONSTRAINT `e_i_a_project_brief_decision_created_by_sf_guard_user_id` FOREIGN KEY (`created_by`) REFERENCES `sf_guard_user` (`id`) ON DELETE CASCADE,
  CONSTRAINT `eeei` FOREIGN KEY (`eiaproject_id`) REFERENCES `e_i_a_project_detail` (`id`) ON DELETE CASCADE,
  CONSTRAINT `e_i_a_project_brief_decision_processed_by_sf_guard_user_id` FOREIGN KEY (`processed_by`) REFERENCES `sf_guard_user` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




DROP TABLE e_i_a_project_description;

CREATE TABLE `e_i_a_project_description` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `eiaproject_id` bigint(20) NOT NULL,
  `project_nature` varchar(255) NOT NULL,
  `project_objective` text NOT NULL,
  `project_total_cost` bigint(20) NOT NULL,
  `project_working_capital` bigint(20) NOT NULL,
  `total_land_area` bigint(20) NOT NULL,
  `existing_land_use` varchar(255) DEFAULT NULL,
  `site_location_developed_area` tinyint(1) DEFAULT NULL,
  `site_location_undeveloped_area` tinyint(1) DEFAULT NULL,
  `site_location_other` tinyint(1) DEFAULT NULL,
  `site_location_other_specify` text,
  `land_use_residential` tinyint(1) DEFAULT NULL,
  `land_use_industrial` tinyint(1) DEFAULT NULL,
  `land_use_tourism` tinyint(1) DEFAULT NULL,
  `land_use_commercial` tinyint(1) DEFAULT NULL,
  `land_use_instituational` tinyint(1) DEFAULT NULL,
  `land_use_openspace` tinyint(1) DEFAULT NULL,
  `land_use_other` tinyint(1) DEFAULT NULL,
  `land_use_other_specify` text,
  `project_components` text,
  `project_activities` text,
  `water_demand_during_implementation` bigint(20) DEFAULT NULL,
  `water_demand_during_operation` bigint(20) DEFAULT NULL,
  `public_water_supply` tinyint(1) DEFAULT NULL,
  `water_treatment` tinyint(1) DEFAULT NULL,
  `sewage_system` tinyint(1) DEFAULT NULL,
  `sewage_system_modern` tinyint(1) DEFAULT NULL,
  `sewage_system_ecosan` tinyint(1) DEFAULT NULL,
  `sewage_system_biogas` tinyint(1) DEFAULT NULL,
  `sewage_system_other` tinyint(1) DEFAULT NULL,
  `sewage_system_other_specify` varchar(255) DEFAULT NULL,
  `sewage_system_capacity` bigint(20) DEFAULT NULL,
  `power_supply_local_electricity` tinyint(1) DEFAULT NULL,
  `power_supply_own_generator` tinyint(1) DEFAULT NULL,
  `power_supply_local_electricity_size` bigint(20) DEFAULT NULL,
  `power_supply_own_generator_capacity` bigint(20) DEFAULT NULL,
  `power_supply_other` tinyint(1) DEFAULT NULL,
  `power_supply_other_specify` text,
  `solid_waste_ecological` tinyint(1) DEFAULT NULL,
  `solid_waste_dumpsite` tinyint(1) DEFAULT NULL,
  `solid_waste_municipal` tinyint(1) DEFAULT NULL,
  `solid_waste_others` tinyint(1) DEFAULT NULL,
  `solid_waste_others_specify` text,
  `man_power_employment_implementation` bigint(20) DEFAULT NULL,
  `man_power_employment_operation` bigint(20) DEFAULT NULL,
  `implementation_duration` bigint(20) DEFAULT NULL,
  `token` varchar(255) DEFAULT NULL,
  `resubmit` text,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `created_by` bigint(20) DEFAULT NULL,
  `updated_by` text,
  PRIMARY KEY (`id`),
  UNIQUE KEY `eiaproject_id` (`eiaproject_id`),
  KEY `eiaproject_id_idx` (`eiaproject_id`),
  KEY `created_by_idx` (`created_by`),
  CONSTRAINT `e_i_a_project_description_created_by_sf_guard_user_id` FOREIGN KEY (`created_by`) REFERENCES `sf_guard_user` (`id`) ON DELETE CASCADE,
  CONSTRAINT `e_i_a_project_description_eiaproject_id_e_i_a_project_detail_id` FOREIGN KEY (`eiaproject_id`) REFERENCES `e_i_a_project_detail` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




DROP TABLE e_i_a_project_detail;

CREATE TABLE `e_i_a_project_detail` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `project_reference_number` varchar(255) NOT NULL,
  `project_title` varchar(255) NOT NULL,
  `project_plot_number` varchar(255) DEFAULT NULL,
  `village` varchar(255) DEFAULT NULL,
  `cell` varchar(255) DEFAULT NULL,
  `sector` varchar(255) DEFAULT NULL,
  `district` varchar(255) DEFAULT NULL,
  `province` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `token` varchar(255) DEFAULT NULL,
  `resubmit` text,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `created_by` bigint(20) DEFAULT NULL,
  `updated_by` text,
  PRIMARY KEY (`id`),
  UNIQUE KEY `project_reference_number` (`project_reference_number`),
  KEY `created_by_idx` (`created_by`),
  CONSTRAINT `e_i_a_project_detail_created_by_sf_guard_user_id` FOREIGN KEY (`created_by`) REFERENCES `sf_guard_user` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




DROP TABLE e_i_a_project_developer;

CREATE TABLE `e_i_a_project_developer` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `eiaproject_id` bigint(20) NOT NULL,
  `developer_name` varchar(255) NOT NULL,
  `contact_person` varchar(255) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `telephone` varchar(255) DEFAULT NULL,
  `mobile_phone` varchar(255) DEFAULT NULL,
  `email_address` varchar(255) NOT NULL,
  `communication_mode` varchar(255) DEFAULT NULL,
  `social_media_account` varchar(255) DEFAULT NULL,
  `token` varchar(255) DEFAULT NULL,
  `resubmit` text,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `created_by` bigint(20) DEFAULT NULL,
  `updated_by` text,
  PRIMARY KEY (`id`),
  UNIQUE KEY `eiaproject_id` (`eiaproject_id`),
  KEY `eiaproject_id_idx` (`eiaproject_id`),
  KEY `created_by_idx` (`created_by`),
  CONSTRAINT `e_i_a_project_developer_created_by_sf_guard_user_id` FOREIGN KEY (`created_by`) REFERENCES `sf_guard_user` (`id`) ON DELETE CASCADE,
  CONSTRAINT `e_i_a_project_developer_eiaproject_id_e_i_a_project_detail_id` FOREIGN KEY (`eiaproject_id`) REFERENCES `e_i_a_project_detail` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




DROP TABLE e_i_a_project_impact_measures;

CREATE TABLE `e_i_a_project_impact_measures` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `eiaproject_id` bigint(20) NOT NULL,
  `dust_generation` tinyint(1) DEFAULT NULL,
  `dust_generation_watering` tinyint(1) DEFAULT NULL,
  `dust_generation_remove_soil` tinyint(1) DEFAULT NULL,
  `dust_generation_hauling_trucks` tinyint(1) DEFAULT NULL,
  `dust_generation_temporary_fence` tinyint(1) DEFAULT NULL,
  `dust_generation_remarks` text,
  `soil_removal` tinyint(1) DEFAULT NULL,
  `soil_removal_mitigate_stockpile` tinyint(1) DEFAULT NULL,
  `soil_removal_mitigate_revegetate` tinyint(1) DEFAULT NULL,
  `soil_removal_remarks` text,
  `erosion_from_cuts` tinyint(1) DEFAULT NULL,
  `erosion_mitigate_construct_dryseason` tinyint(1) DEFAULT NULL,
  `erosion_mitigate_avoid_exposure` tinyint(1) DEFAULT NULL,
  `erosion_mitigate_barrier_nets` tinyint(1) DEFAULT NULL,
  `erosion_remarks` text,
  `sedimentation` tinyint(1) DEFAULT NULL,
  `sedimentation_mitigate_silt_trap` tinyint(1) DEFAULT NULL,
  `sedimentation_mitigate_proper_stockpilling` tinyint(1) DEFAULT NULL,
  `sedimentation_mitigate_filling_materials` tinyint(1) DEFAULT NULL,
  `sedimentation_remarks` text,
  `pollution` tinyint(1) DEFAULT NULL,
  `pollution_mitigate_temporary_disposal` tinyint(1) DEFAULT NULL,
  `pollution_mitigate_toilet_facilities` tinyint(1) DEFAULT NULL,
  `pollution_mitigate_contract_observe` tinyint(1) DEFAULT NULL,
  `pollution_remarks` text,
  `vegetation_loss` tinyint(1) DEFAULT NULL,
  `vegetation_limit_clearing` tinyint(1) DEFAULT NULL,
  `vegetation_provide_clearing` tinyint(1) DEFAULT NULL,
  `vegetation_use_markers` tinyint(1) DEFAULT NULL,
  `vegetation_replant` tinyint(1) DEFAULT NULL,
  `vegetation_remarks` text,
  `disturbance` tinyint(1) DEFAULT NULL,
  `disturbance_reestablish` tinyint(1) DEFAULT NULL,
  `disturbance_schedule` tinyint(1) DEFAULT NULL,
  `disturbance_maintenance` tinyint(1) DEFAULT NULL,
  `disturbance_remarks` text,
  `noise_generation` tinyint(1) DEFAULT NULL,
  `nosie_generation_schedule` tinyint(1) DEFAULT NULL,
  `noise_generation_undertake` tinyint(1) DEFAULT NULL,
  `noise_generation_remark` text,
  `generation_employment` tinyint(1) DEFAULT NULL,
  `generation_employment_hiring` tinyint(1) DEFAULT NULL,
  `generation_employment_remarks` text,
  `conflicts` tinyint(1) DEFAULT NULL,
  `conflict_conslutation` tinyint(1) DEFAULT NULL,
  `conflict_remarks` text,
  `traffic_congestion` tinyint(1) DEFAULT NULL,
  `traffic_rules_adherance` tinyint(1) DEFAULT NULL,
  `traffice_aid_provision` tinyint(1) DEFAULT NULL,
  `traffic_congestion_remarks` text,
  `crimes_accidents` tinyint(1) DEFAULT NULL,
  `crimes_accidents_safety_rules` tinyint(1) DEFAULT NULL,
  `crime_accidents_remarks` tinyint(1) DEFAULT NULL,
  `token` varchar(255) DEFAULT NULL,
  `resubmit` text,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `created_by` bigint(20) DEFAULT NULL,
  `updated_by` text,
  PRIMARY KEY (`id`),
  UNIQUE KEY `eiaproject_id` (`eiaproject_id`),
  KEY `eiaproject_id_idx` (`eiaproject_id`),
  KEY `created_by_idx` (`created_by`),
  CONSTRAINT `e_i_a_project_impact_measures_created_by_sf_guard_user_id` FOREIGN KEY (`created_by`) REFERENCES `sf_guard_user` (`id`) ON DELETE CASCADE,
  CONSTRAINT `eeei_1` FOREIGN KEY (`eiaproject_id`) REFERENCES `e_i_a_project_detail` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




DROP TABLE e_i_a_project_impact_pass;

CREATE TABLE `e_i_a_project_impact_pass` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `eiaproject_id` bigint(20) NOT NULL,
  `processed_by` bigint(20) NOT NULL,
  `letter_status` bigint(20) NOT NULL,
  `comments` varchar(255) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `created_by` bigint(20) DEFAULT NULL,
  `updated_by` text,
  PRIMARY KEY (`id`),
  KEY `eiaproject_id_idx` (`eiaproject_id`),
  KEY `processed_by_idx` (`processed_by`),
  KEY `created_by_idx` (`created_by`),
  CONSTRAINT `e_i_a_project_impact_pass_created_by_sf_guard_user_id` FOREIGN KEY (`created_by`) REFERENCES `sf_guard_user` (`id`) ON DELETE CASCADE,
  CONSTRAINT `e_i_a_project_impact_pass_eiaproject_id_e_i_a_project_detail_id` FOREIGN KEY (`eiaproject_id`) REFERENCES `e_i_a_project_detail` (`id`) ON DELETE CASCADE,
  CONSTRAINT `e_i_a_project_impact_pass_processed_by_sf_guard_user_id` FOREIGN KEY (`processed_by`) REFERENCES `sf_guard_user` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




DROP TABLE e_i_a_project_operation_phase;

CREATE TABLE `e_i_a_project_operation_phase` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `eiaproject_id` bigint(20) NOT NULL,
  `domestic_influence` tinyint(1) DEFAULT NULL,
  `domestic_wastewater_treatment` tinyint(1) DEFAULT NULL,
  `domestic_influence_remarks` text,
  `solid_wastes` tinyint(1) DEFAULT NULL,
  `solid_wastes_segregation` tinyint(1) DEFAULT NULL,
  `solid_wastes_proper_collection` tinyint(1) DEFAULT NULL,
  `solid_wastes_proper_housekeeping` tinyint(1) DEFAULT NULL,
  `solid_wastes_remarks` text,
  `increased_traffic` tinyint(1) DEFAULT NULL,
  `increased_traffic_rules_adhere` tinyint(1) DEFAULT NULL,
  `increased_traffic_signables` tinyint(1) DEFAULT NULL,
  `increased_traffice_remarks` text,
  `fire_risk` tinyint(1) DEFAULT NULL,
  `fire_risk_extinguishers` tinyint(1) DEFAULT NULL,
  `fire_risk_exit_stairs` tinyint(1) DEFAULT NULL,
  `fire_risk_remarks` text,
  `token` varchar(255) DEFAULT NULL,
  `resubmit` text,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `created_by` bigint(20) DEFAULT NULL,
  `updated_by` text,
  PRIMARY KEY (`id`),
  UNIQUE KEY `eiaproject_id` (`eiaproject_id`),
  KEY `eiaproject_id_idx` (`eiaproject_id`),
  KEY `created_by_idx` (`created_by`),
  CONSTRAINT `e_i_a_project_operation_phase_created_by_sf_guard_user_id` FOREIGN KEY (`created_by`) REFERENCES `sf_guard_user` (`id`) ON DELETE CASCADE,
  CONSTRAINT `eeei_2` FOREIGN KEY (`eiaproject_id`) REFERENCES `e_i_a_project_detail` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




DROP TABLE e_i_a_project_social_economic;

CREATE TABLE `e_i_a_project_social_economic` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `eiaproject_id` bigint(20) NOT NULL,
  `existing_settlements` tinyint(1) DEFAULT NULL,
  `existing_settlements_remark` text,
  `average_family_size` bigint(20) DEFAULT NULL,
  `average_family_size_remark` text,
  `livelihood_farming` tinyint(1) DEFAULT NULL,
  `livelihood_fishing` tinyint(1) DEFAULT NULL,
  `livelihood_vending` tinyint(1) DEFAULT NULL,
  `livelihood_others` tinyint(1) DEFAULT NULL,
  `livelihood_others_specify` text,
  `livelihood_remarks` text,
  `local_organization` tinyint(1) DEFAULT NULL,
  `local_organization_description` text,
  `social_infrastructures` tinyint(1) DEFAULT NULL,
  `social_schools` tinyint(1) DEFAULT NULL,
  `social_health_centers` tinyint(1) DEFAULT NULL,
  `social_hospital` tinyint(1) DEFAULT NULL,
  `social_transportation` tinyint(1) DEFAULT NULL,
  `social_communication` tinyint(1) DEFAULT NULL,
  `social_churches` tinyint(1) DEFAULT NULL,
  `social_roads` tinyint(1) DEFAULT NULL,
  `social_others` tinyint(1) DEFAULT NULL,
  `social_others_specify` text,
  `token` varchar(255) DEFAULT NULL,
  `resubmit` text,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `created_by` bigint(20) DEFAULT NULL,
  `updated_by` text,
  PRIMARY KEY (`id`),
  UNIQUE KEY `eiaproject_id` (`eiaproject_id`),
  KEY `eiaproject_id_idx` (`eiaproject_id`),
  KEY `created_by_idx` (`created_by`),
  CONSTRAINT `e_i_a_project_social_economic_created_by_sf_guard_user_id` FOREIGN KEY (`created_by`) REFERENCES `sf_guard_user` (`id`) ON DELETE CASCADE,
  CONSTRAINT `eeei_3` FOREIGN KEY (`eiaproject_id`) REFERENCES `e_i_a_project_detail` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




DROP TABLE e_i_a_project_surrounding;

CREATE TABLE `e_i_a_project_surrounding` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `eiaproject_id` bigint(20) NOT NULL,
  `project_general_elevation` bigint(20) DEFAULT NULL,
  `soil_erosion` tinyint(1) DEFAULT NULL,
  `soil_erosion_heavy_rains` tinyint(1) DEFAULT NULL,
  `soil_erosion_unstable` tinyint(1) DEFAULT NULL,
  `soil_erosion_others` tinyint(1) DEFAULT NULL,
  `soil_erosion_others_specify` varchar(255) DEFAULT NULL,
  `existing_water_body` tinyint(1) DEFAULT NULL,
  `existing_water_body_remark` varchar(255) DEFAULT NULL,
  `access_road` tinyint(1) DEFAULT NULL,
  `access_road_distance` bigint(20) DEFAULT NULL,
  `access_road_type` varchar(255) DEFAULT NULL,
  `site_conform_approval` tinyint(1) DEFAULT NULL,
  `site_conform_remark` varchar(255) DEFAULT NULL,
  `site_existing_structure` tinyint(1) DEFAULT NULL,
  `site_existing_remark` varchar(255) DEFAULT NULL,
  `land_use_agriculture` tinyint(1) DEFAULT NULL,
  `land_use_grassland` tinyint(1) DEFAULT NULL,
  `land_use_builtup` tinyint(1) DEFAULT NULL,
  `land_use_marshland` tinyint(1) DEFAULT NULL,
  `land_use_other` tinyint(1) DEFAULT NULL,
  `land_use_other_specify` varchar(255) DEFAULT NULL,
  `existing_trees` tinyint(1) DEFAULT NULL,
  `existing_trees_remark` varchar(255) DEFAULT NULL,
  `wildlife_existing` tinyint(1) DEFAULT NULL,
  `wildlife_existing_remark` varchar(255) DEFAULT NULL,
  `fishery_existing` tinyint(1) DEFAULT NULL,
  `fishery_existing_remark` varchar(255) DEFAULT NULL,
  `watershed_existing` tinyint(1) DEFAULT NULL,
  `watershed_near_distance` bigint(20) DEFAULT NULL,
  `watershed_near_distance_units` text,
  `watershed_within_name` varchar(255) DEFAULT NULL,
  `token` varchar(255) DEFAULT NULL,
  `resubmit` text,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `created_by` bigint(20) DEFAULT NULL,
  `updated_by` text,
  PRIMARY KEY (`id`),
  UNIQUE KEY `eiaproject_id` (`eiaproject_id`),
  KEY `eiaproject_id_idx` (`eiaproject_id`),
  KEY `created_by_idx` (`created_by`),
  CONSTRAINT `e_i_a_project_surrounding_created_by_sf_guard_user_id` FOREIGN KEY (`created_by`) REFERENCES `sf_guard_user` (`id`) ON DELETE CASCADE,
  CONSTRAINT `e_i_a_project_surrounding_eiaproject_id_e_i_a_project_detail_id` FOREIGN KEY (`eiaproject_id`) REFERENCES `e_i_a_project_detail` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




DROP TABLE e_i_a_project_surrounding_species;

CREATE TABLE `e_i_a_project_surrounding_species` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `project_surrounding_id` bigint(20) NOT NULL,
  `birds_animals` varchar(255) DEFAULT NULL,
  `trees_vegetation` varchar(255) DEFAULT NULL,
  `fisheries` varchar(255) DEFAULT NULL,
  `token` varchar(255) DEFAULT NULL,
  `resubmit` text,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `created_by` bigint(20) DEFAULT NULL,
  `updated_by` text,
  PRIMARY KEY (`id`),
  UNIQUE KEY `project_surrounding_id` (`project_surrounding_id`),
  KEY `project_surrounding_id_idx` (`project_surrounding_id`),
  KEY `created_by_idx` (`created_by`),
  CONSTRAINT `e_i_a_project_surrounding_species_created_by_sf_guard_user_id` FOREIGN KEY (`created_by`) REFERENCES `sf_guard_user` (`id`) ON DELETE CASCADE,
  CONSTRAINT `epei` FOREIGN KEY (`project_surrounding_id`) REFERENCES `e_i_a_project_surrounding` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




DROP TABLE e_i_a_site_visit;

CREATE TABLE `e_i_a_site_visit` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `eiaproject_id` bigint(20) NOT NULL,
  `site_visit` date NOT NULL,
  `remarks` varchar(255) DEFAULT NULL,
  `visited` tinyint(1) DEFAULT NULL,
  `approved` tinyint(1) DEFAULT NULL,
  `token` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `created_by` bigint(20) DEFAULT NULL,
  `updated_by` text,
  PRIMARY KEY (`id`),
  UNIQUE KEY `eiaproject_id` (`eiaproject_id`),
  KEY `eiaproject_id_idx` (`eiaproject_id`),
  KEY `created_by_idx` (`created_by`),
  CONSTRAINT `e_i_a_site_visit_created_by_sf_guard_user_id` FOREIGN KEY (`created_by`) REFERENCES `sf_guard_user` (`id`) ON DELETE CASCADE,
  CONSTRAINT `e_i_a_site_visit_eiaproject_id_e_i_a_project_detail_id` FOREIGN KEY (`eiaproject_id`) REFERENCES `e_i_a_project_detail` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




DROP TABLE e_i_a_site_visit_report;

CREATE TABLE `e_i_a_site_visit_report` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `eiasitevisit_id` bigint(20) NOT NULL,
  `report` text NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `created_by` bigint(20) DEFAULT NULL,
  `updated_by` text,
  PRIMARY KEY (`id`),
  UNIQUE KEY `eiasitevisit_id` (`eiasitevisit_id`),
  KEY `eiasitevisit_id_idx` (`eiasitevisit_id`),
  KEY `created_by_idx` (`created_by`),
  CONSTRAINT `e_i_a_site_visit_report_created_by_sf_guard_user_id` FOREIGN KEY (`created_by`) REFERENCES `sf_guard_user` (`id`) ON DELETE CASCADE,
  CONSTRAINT `e_i_a_site_visit_report_eiasitevisit_id_e_i_a_site_visit_id` FOREIGN KEY (`eiasitevisit_id`) REFERENCES `e_i_a_site_visit` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




DROP TABLE e_i_a_tor_status;

CREATE TABLE `e_i_a_tor_status` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `eiaproject_id` bigint(20) NOT NULL,
  `sent_by` bigint(20) NOT NULL,
  `comments` varchar(255) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `created_by` bigint(20) DEFAULT NULL,
  `updated_by` text,
  PRIMARY KEY (`id`),
  KEY `eiaproject_id_idx` (`eiaproject_id`),
  KEY `sent_by_idx` (`sent_by`),
  KEY `created_by_idx` (`created_by`),
  CONSTRAINT `e_i_a_tor_status_created_by_sf_guard_user_id` FOREIGN KEY (`created_by`) REFERENCES `sf_guard_user` (`id`) ON DELETE CASCADE,
  CONSTRAINT `e_i_a_tor_status_eiaproject_id_e_i_a_project_detail_id` FOREIGN KEY (`eiaproject_id`) REFERENCES `e_i_a_project_detail` (`id`) ON DELETE CASCADE,
  CONSTRAINT `e_i_a_tor_status_sent_by_sf_guard_user_id` FOREIGN KEY (`sent_by`) REFERENCES `sf_guard_user` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




DROP TABLE e_i_application_certificate_permission;

CREATE TABLE `e_i_application_certificate_permission` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `send_to` bigint(20) NOT NULL,
  `sent_by` bigint(20) NOT NULL,
  `message` varchar(255) NOT NULL,
  `eireport_id` bigint(20) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `created_by` bigint(20) DEFAULT NULL,
  `updated_by` text,
  PRIMARY KEY (`id`),
  KEY `eireport_id_idx` (`eireport_id`),
  KEY `created_by_idx` (`created_by`),
  CONSTRAINT `e_i_application_certificate_permission_eireport_id_e_i_report_id` FOREIGN KEY (`eireport_id`) REFERENCES `e_i_report` (`id`) ON DELETE CASCADE,
  CONSTRAINT `ecsi` FOREIGN KEY (`created_by`) REFERENCES `sf_guard_user` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




DROP TABLE e_i_application_decision;

CREATE TABLE `e_i_application_decision` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `eireport_id` bigint(20) NOT NULL,
  `status` varchar(255) NOT NULL,
  `comments` varchar(255) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `created_by` bigint(20) DEFAULT NULL,
  `updated_by` text,
  PRIMARY KEY (`id`),
  KEY `eireport_id_idx` (`eireport_id`),
  KEY `created_by_idx` (`created_by`),
  CONSTRAINT `e_i_application_decision_created_by_sf_guard_user_id` FOREIGN KEY (`created_by`) REFERENCES `sf_guard_user` (`id`) ON DELETE CASCADE,
  CONSTRAINT `e_i_application_decision_eireport_id_e_i_report_id` FOREIGN KEY (`eireport_id`) REFERENCES `e_i_report` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




DROP TABLE e_i_application_status;

CREATE TABLE `e_i_application_status` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `eiaproject_id` bigint(20) NOT NULL,
  `application_status` varchar(255) NOT NULL,
  `comments` varchar(255) NOT NULL,
  `percentage` bigint(20) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `eiaproject_id` (`eiaproject_id`),
  KEY `eiaproject_id_idx` (`eiaproject_id`),
  CONSTRAINT `e_i_application_status_eiaproject_id_e_i_a_project_detail_id` FOREIGN KEY (`eiaproject_id`) REFERENCES `e_i_a_project_detail` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




DROP TABLE e_i_comments;

CREATE TABLE `e_i_comments` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `eiaproject_id` bigint(20) NOT NULL,
  `eir_document_commented` varchar(255) DEFAULT NULL,
  `processed_by` bigint(20) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `created_by` bigint(20) DEFAULT NULL,
  `updated_by` text,
  PRIMARY KEY (`id`),
  UNIQUE KEY `eiaproject_id` (`eiaproject_id`),
  KEY `eiaproject_id_idx` (`eiaproject_id`),
  KEY `processed_by_idx` (`processed_by`),
  KEY `created_by_idx` (`created_by`),
  CONSTRAINT `e_i_comments_created_by_sf_guard_user_id` FOREIGN KEY (`created_by`) REFERENCES `sf_guard_user` (`id`) ON DELETE CASCADE,
  CONSTRAINT `e_i_comments_eiaproject_id_e_i_a_project_detail_id` FOREIGN KEY (`eiaproject_id`) REFERENCES `e_i_a_project_detail` (`id`) ON DELETE CASCADE,
  CONSTRAINT `e_i_comments_processed_by_sf_guard_user_id` FOREIGN KEY (`processed_by`) REFERENCES `sf_guard_user` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




DROP TABLE e_i_report;

CREATE TABLE `e_i_report` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `eiaproject_id` bigint(20) NOT NULL,
  `word_doc` varchar(255) NOT NULL,
  `pdf_doc` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `comments` text,
  `token` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `created_by` bigint(20) DEFAULT NULL,
  `updated_by` text,
  PRIMARY KEY (`id`),
  UNIQUE KEY `eiaproject_id` (`eiaproject_id`),
  KEY `eiaproject_id_idx` (`eiaproject_id`),
  KEY `created_by_idx` (`created_by`),
  CONSTRAINT `e_i_report_created_by_sf_guard_user_id` FOREIGN KEY (`created_by`) REFERENCES `sf_guard_user` (`id`) ON DELETE CASCADE,
  CONSTRAINT `e_i_report_eiaproject_id_e_i_a_project_detail_id` FOREIGN KEY (`eiaproject_id`) REFERENCES `e_i_a_project_detail` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




DROP TABLE e_i_report_resubmission;

CREATE TABLE `e_i_report_resubmission` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `eiaproject_id` bigint(20) NOT NULL,
  `status` varchar(255) NOT NULL,
  `comments` text,
  `commets_doc` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `created_by` bigint(20) DEFAULT NULL,
  `updated_by` text,
  PRIMARY KEY (`id`),
  UNIQUE KEY `eiaproject_id` (`eiaproject_id`),
  KEY `created_by_idx` (`created_by`),
  CONSTRAINT `e_i_report_resubmission_created_by_sf_guard_user_id` FOREIGN KEY (`created_by`) REFERENCES `sf_guard_user` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




DROP TABLE e_i_task_assignment;

CREATE TABLE `e_i_task_assignment` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `user_assigned` bigint(20) NOT NULL,
  `eiaproject_id` bigint(20) NOT NULL,
  `instructions` varchar(255) NOT NULL,
  `duedate` date NOT NULL,
  `work_status` varchar(255) NOT NULL,
  `stage` text NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `created_by` bigint(20) DEFAULT NULL,
  `updated_by` text,
  PRIMARY KEY (`id`),
  UNIQUE KEY `eiaproject_id` (`eiaproject_id`),
  KEY `eiaproject_id_idx` (`eiaproject_id`),
  KEY `user_assigned_idx` (`user_assigned`),
  KEY `created_by_idx` (`created_by`),
  CONSTRAINT `e_i_task_assignment_created_by_sf_guard_user_id` FOREIGN KEY (`created_by`) REFERENCES `sf_guard_user` (`id`) ON DELETE CASCADE,
  CONSTRAINT `e_i_task_assignment_eiaproject_id_e_i_a_project_detail_id` FOREIGN KEY (`eiaproject_id`) REFERENCES `e_i_a_project_detail` (`id`) ON DELETE CASCADE,
  CONSTRAINT `e_i_task_assignment_user_assigned_sf_guard_user_id` FOREIGN KEY (`user_assigned`) REFERENCES `sf_guard_user` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




DROP TABLE employementforeign;

CREATE TABLE `employementforeign` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `business_plan` bigint(20) NOT NULL,
  `year1` bigint(20) DEFAULT NULL,
  `year2` bigint(20) DEFAULT NULL,
  `year3` bigint(20) DEFAULT NULL,
  `year4` bigint(20) DEFAULT NULL,
  `year5` bigint(20) DEFAULT NULL,
  `token` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `created_by` varchar(255) NOT NULL DEFAULT 'None',
  `updated_by` text,
  PRIMARY KEY (`id`),
  KEY `business_plan_idx` (`business_plan`),
  CONSTRAINT `employementforeign_business_plan_investment_application_id` FOREIGN KEY (`business_plan`) REFERENCES `investment_application` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




DROP TABLE employementlocal;

CREATE TABLE `employementlocal` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `business_plan` bigint(20) NOT NULL,
  `year1` bigint(20) DEFAULT NULL,
  `year2` bigint(20) DEFAULT NULL,
  `year3` bigint(20) DEFAULT NULL,
  `year4` bigint(20) DEFAULT NULL,
  `year5` bigint(20) DEFAULT NULL,
  `token` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `created_by` varchar(255) NOT NULL DEFAULT 'None',
  `updated_by` text,
  PRIMARY KEY (`id`),
  KEY `business_plan_idx` (`business_plan`),
  CONSTRAINT `employementlocal_business_plan_investment_application_id` FOREIGN KEY (`business_plan`) REFERENCES `investment_application` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




DROP TABLE investment_application;

CREATE TABLE `investment_application` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `registration_number` varchar(255) NOT NULL,
  `title_in_company` varchar(255) DEFAULT NULL,
  `business_sector` text NOT NULL,
  `business_category` varchar(255) NOT NULL,
  `representative_name` varchar(255) NOT NULL,
  `currency_type` varchar(255) NOT NULL,
  `office_telephone` varchar(255) DEFAULT NULL,
  `fax` varchar(255) DEFAULT NULL,
  `post_box` varchar(255) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `sector` varchar(255) DEFAULT NULL,
  `district` varchar(255) DEFAULT NULL,
  `city_province` varchar(255) DEFAULT NULL,
  `applicant_reference_number` varchar(255) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `created_by` bigint(20) DEFAULT NULL,
  `updated_by` text,
  PRIMARY KEY (`id`),
  UNIQUE KEY `applicant_reference_number` (`applicant_reference_number`),
  KEY `created_by_idx` (`created_by`),
  CONSTRAINT `investment_application_created_by_sf_guard_user_id` FOREIGN KEY (`created_by`) REFERENCES `sf_guard_user` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




DROP TABLE investment_certificate;

CREATE TABLE `investment_certificate` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `serial_number` varchar(255) NOT NULL,
  `business_id` bigint(20) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `created_by` varchar(255) NOT NULL DEFAULT 'None',
  `updated_by` text,
  PRIMARY KEY (`id`),
  UNIQUE KEY `serial_number` (`serial_number`),
  UNIQUE KEY `business_id` (`business_id`),
  KEY `business_id_idx` (`business_id`),
  CONSTRAINT `investment_certificate_business_id_investment_application_id` FOREIGN KEY (`business_id`) REFERENCES `investment_application` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




DROP TABLE investment_requests;

CREATE TABLE `investment_requests` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `requestor` varchar(255) NOT NULL,
  `request_type` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `reference_number` varchar(255) NOT NULL,
  `comments` text NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `created_by` bigint(20) DEFAULT NULL,
  `updated_by` text,
  PRIMARY KEY (`id`),
  UNIQUE KEY `reference_number` (`reference_number`),
  KEY `created_by_idx` (`created_by`),
  CONSTRAINT `investment_requests_created_by_sf_guard_user_id` FOREIGN KEY (`created_by`) REFERENCES `sf_guard_user` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




DROP TABLE investment_resubmission;

CREATE TABLE `investment_resubmission` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `business_id` bigint(20) NOT NULL,
  `message_subject` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `created_by` bigint(20) DEFAULT NULL,
  `updated_by` text,
  PRIMARY KEY (`id`),
  UNIQUE KEY `business_id` (`business_id`),
  KEY `created_by_idx` (`created_by`),
  CONSTRAINT `investment_resubmission_created_by_sf_guard_user_id` FOREIGN KEY (`created_by`) REFERENCES `sf_guard_user` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




DROP TABLE messages;

CREATE TABLE `messages` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `sender` varchar(255) NOT NULL,
  `recepient` varchar(255) NOT NULL,
  `sender_email` varchar(255) DEFAULT NULL,
  `recepient_email` varchar(255) DEFAULT NULL,
  `cc_email` varchar(255) DEFAULT NULL,
  `message_subject` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `attachement` varchar(255) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




DROP TABLE notifications;

CREATE TABLE `notifications` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `recepient` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




DROP TABLE payment;

CREATE TABLE `payment` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `business_id` bigint(20) NOT NULL,
  `payment_status` varchar(255) NOT NULL DEFAULT 'notpaid',
  `slip_number` varchar(255) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `created_by` bigint(20) DEFAULT NULL,
  `updated_by` text,
  PRIMARY KEY (`id`),
  UNIQUE KEY `slip_number` (`slip_number`),
  KEY `created_by_idx` (`created_by`),
  CONSTRAINT `payment_created_by_sf_guard_user_id` FOREIGN KEY (`created_by`) REFERENCES `sf_guard_user` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




DROP TABLE plannedperformance;

CREATE TABLE `plannedperformance` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `business_plan` bigint(20) NOT NULL,
  `year1` bigint(20) DEFAULT NULL,
  `year2` bigint(20) DEFAULT NULL,
  `year3` bigint(20) DEFAULT NULL,
  `year4` bigint(20) DEFAULT NULL,
  `year5` bigint(20) DEFAULT NULL,
  `token` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `created_by` varchar(255) NOT NULL DEFAULT 'None',
  `updated_by` text,
  PRIMARY KEY (`id`),
  KEY `business_plan_idx` (`business_plan`),
  CONSTRAINT `plannedperformance_business_plan_investment_application_id` FOREIGN KEY (`business_plan`) REFERENCES `investment_application` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




DROP TABLE portlets;

CREATE TABLE `portlets` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `investment_certificate` text NOT NULL,
  `eia_certificate` text NOT NULL,
  `tax_exemptions` text NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `created_by` bigint(20) DEFAULT NULL,
  `updated_by` text,
  PRIMARY KEY (`id`),
  KEY `created_by_idx` (`created_by`),
  CONSTRAINT `portlets_created_by_sf_guard_user_id` FOREIGN KEY (`created_by`) REFERENCES `sf_guard_user` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

INSERT INTO portlets VALUES("2","<b>Steps required to obtain investment certificate:</b><ul><li>Application for investment registration;</li><li>Notice of acceptance or refusal;</li><li>Issuance of investment registration certificate;</li></ul><span><br><b> The application for investment registration involves the following:</b><br>1.&nbsp;&nbsp; &nbsp;Application letter to the CEO of RDB requesting for investment registration;<br>2.&nbsp;&nbsp; &nbsp;Submission of a business plan or a feasibility study; <br>3.&nbsp;&nbsp; &nbsp;Shareholding structure sheet<br>4.&nbsp;&nbsp; &nbsp;Certificate of company incorporation <br><br><b>Your investment application letter should clearly indicate following:</b><br><br>1.&nbsp;&nbsp; &nbsp;The name and address of the proposed business enterprise, and&nbsp; its legal form;<br>2.&nbsp;&nbsp; &nbsp;The nature of the proposed business activity and the level of planned capital investment;<br>3.&nbsp;&nbsp; &nbsp;The estimated number of persons to be employed and categories of jobs to be created;<br>4.&nbsp;&nbsp;\n &nbsp;The nature and volume of waste which shall be generated by the \nenterprise’s operations, and the proposed methods, of its management;<br>5.&nbsp;&nbsp; &nbsp;The nature of support and facilitation which the investor is seeking from RDB.<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;<br><b>Your investment business plan or feasibility study should clearly indicate following:</b><br>1.&nbsp;&nbsp;&nbsp; Executive summary of the project<br>2.&nbsp;&nbsp;&nbsp; Profile of the project promoter(s); <br>3.&nbsp;&nbsp; &nbsp;The project background; <br>4.&nbsp;&nbsp; &nbsp;Market study or market analysis;<br>5.&nbsp;&nbsp; &nbsp;Investment plan over five year period; <br>6.&nbsp;&nbsp;&nbsp; The level of loan and equity financing;<br>7.&nbsp;&nbsp; &nbsp;Projected statement of income and expenditure 5 years; <br>8.&nbsp;&nbsp; &nbsp;Projected balance sheet ( 5 years)) <br>9.&nbsp;&nbsp; &nbsp;Projected statement of cash flows (5 years) <br>10.&nbsp;&nbsp; &nbsp;Payback period, NPV and IRR <br>11.&nbsp;&nbsp; &nbsp;Loan amortization schedule for the bank loan (if any); <br>12.&nbsp;&nbsp; &nbsp;project implementation&nbsp; plan/ schedule) <br>13.&nbsp;&nbsp; &nbsp;Notes on assumption made in the business plan.<br><br><b>Notice of acceptance or refusal</b><br>Once your application for investment registration is approved we will send to you acceptance letter for your project. \n</span><br>","<h3>What is Environmental Impact Assessment?</h3>\nEnvironmental Impact Assessment (EIA) is defined as a\n systematic process to predict, identify, and evaluate the environmental\n effects of proposed actions and projects. The process is used to \nprevent and mitigate adverse impacts, enhance positive impacts and \nassist the rational use of natural resources to maximize the benefit of \nsocio-economic development projects and ensuring sustainable \ndevelopment.\n\n<h3>What are the economic benefits of EIA process?</h3>\nOnce adverse impacts are identified from the \nproposed project, advance corrective measures can be incorporated into \nthe project which helps developers to minimize environmental risks and \nfinancial costs. However, options are considered for the projects where \ndamage is irreversible to assist developers to invest in profit making \nventures which would have been lost due to environmental problems. The \nprocess ensures financially and economically efficient projects with \nguarantee to attain long term profits.\n\n<h3>Which projects require EIA?</h3>\nProjects with identified adverse impacts on \nenvironment call for a full EIA process for mitigation measures and thus\n the Ministerial Order N°004/2008 of 15/08/2008 establishing the list of\n works, activities and projects that have to undertake an environmental \nimpact assessment highlights some projects as follows; construction and \nrepair of international and national roads, large bridges, industries, \nfactories, hydro-dams and electrical lines, public dams for water \nconservation, rain water harvesting for agricultural activities and \nartificial lakes, large hotels public building which accommodate more \nthan one hundred daily, extraction of mines and public land fills among \nothers.<br>","The One Stop Centre will help in processing and issueing duty exemption and other fiscal incentives in shortest possible time;\n\n<span>The delegated staff from <a href=\"http://www.rdb.rw\" rel=\"nofollow\" target=\"_blank\">Rwanda Revenue Authority</a> :\n<br></span>\n<span><img src=\"http://www.rdb.rw/uploads/RTEmagicC_cd2b3d8a50.gif.gif\" alt=\"-\" height=\"9\" width=\"7\">&nbsp;Issue tax exemptions provided by the <a href=\"http://www.rdb.rw/fileadmin/user_upload/Documents/Investment/Rwanda_Investment_Code_2005.pdf\" rel=\"nofollow\" target=\"_blank\">Investment Code</a> , <a href=\"http://www.rra.gov.rw/rra_article502.html\" rel=\"nofollow\" target=\"_blank\">Tax Laws </a>and the <a href=\"http://www.eac.int/customs/index.php?option=com_docman&amp;task=doc_download&amp;gid=94&amp;Itemid=164\" rel=\"nofollow\" target=\"_blank\">East African Community Customs Management Act</a>;<br>&nbsp;</span><span><img src=\"http://www.rdb.rw/uploads/RTEmagicC_cd2b3d8a50.gif.gif\" alt=\"-\" height=\"9\" width=\"7\">&nbsp;Carry\n out all registration procedures required of a taxpayer (TIN number, \nVAT, TPR, Tax clearance certificate etc) for companies that qualifies \nwith RDB registration;\n<br></span>\n<span><img src=\"http://www.rdb.rw/uploads/RTEmagicC_cd2b3d8a50.gif.gif\" alt=\"-\" height=\"9\" width=\"7\">&nbsp;Advise and educate the public and investors on issues regarding fiscal matters;\n<br></span>\n<span><img src=\"http://www.rdb.rw/uploads/RTEmagicC_cd2b3d8a50.gif.gif\" alt=\"-\" height=\"9\" width=\"7\">&nbsp;Interact with investors and provide necessary information the investors might require;\n<br></span>\n<span><img src=\"http://www.rdb.rw/uploads/RTEmagicC_cd2b3d8a50.gif.gif\" alt=\"-\" height=\"9\" width=\"7\">&nbsp;Ensure the availability of the required forms and other documentation;</span><br>","","2013-04-12 09:11:09","2013-04-12 09:11:09","22","manager");



DROP TABLE project_impact;

CREATE TABLE `project_impact` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `eiaproject_id` bigint(20) NOT NULL,
  `impact_level` text NOT NULL,
  `comments` text,
  `token` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `created_by` bigint(20) DEFAULT NULL,
  `updated_by` text,
  PRIMARY KEY (`id`),
  UNIQUE KEY `eiaproject_id` (`eiaproject_id`),
  KEY `eiaproject_id_idx` (`eiaproject_id`),
  KEY `created_by_idx` (`created_by`),
  CONSTRAINT `project_impact_created_by_sf_guard_user_id` FOREIGN KEY (`created_by`) REFERENCES `sf_guard_user` (`id`) ON DELETE CASCADE,
  CONSTRAINT `project_impact_eiaproject_id_e_i_a_project_detail_id` FOREIGN KEY (`eiaproject_id`) REFERENCES `e_i_a_project_detail` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




DROP TABLE project_summary;

CREATE TABLE `project_summary` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `investment_id` bigint(20) NOT NULL,
  `business_sector` text NOT NULL,
  `business_sector_description` text NOT NULL,
  `techinical_viability` text NOT NULL,
  `planned_investment` bigint(20) NOT NULL,
  `employment_created` bigint(20) NOT NULL,
  `job_categories` text NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `created_by` bigint(20) DEFAULT NULL,
  `updated_by` text,
  PRIMARY KEY (`id`),
  UNIQUE KEY `investment_id` (`investment_id`),
  KEY `investment_id_idx` (`investment_id`),
  KEY `created_by_idx` (`created_by`),
  CONSTRAINT `project_summary_created_by_sf_guard_user_id` FOREIGN KEY (`created_by`) REFERENCES `sf_guard_user` (`id`) ON DELETE CASCADE,
  CONSTRAINT `project_summary_investment_id_investment_application_id` FOREIGN KEY (`investment_id`) REFERENCES `investment_application` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




DROP TABLE rejected_applications;

CREATE TABLE `rejected_applications` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `business_id` bigint(20) NOT NULL,
  `applicant_reference_number` varchar(255) NOT NULL,
  `business_registration` bigint(20) NOT NULL,
  `application_type` varchar(255) NOT NULL,
  `reasons` text,
  `comments` text,
  `token` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `created_by` bigint(20) DEFAULT NULL,
  `updated_by` text,
  PRIMARY KEY (`id`),
  UNIQUE KEY `applicant_reference_number` (`applicant_reference_number`),
  KEY `business_id_idx` (`business_id`),
  KEY `created_by_idx` (`created_by`),
  CONSTRAINT `rejected_applications_business_id_investment_application_id` FOREIGN KEY (`business_id`) REFERENCES `investment_application` (`id`) ON DELETE CASCADE,
  CONSTRAINT `rejected_applications_created_by_sf_guard_user_id` FOREIGN KEY (`created_by`) REFERENCES `sf_guard_user` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




DROP TABLE session;

CREATE TABLE `session` (
  `id` varchar(32) NOT NULL DEFAULT '',
  `sessiondata` text NOT NULL,
  `time` int(11) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO session VALUES("2cr8i5oqhct3bfqlek20o7au90","symfony/user/sfUser/lastRequest|i:1366739914;symfony/user/sfUser/authenticated|b:1;symfony/user/sfUser/credentials|a:1:{i:0;s:14:\"usermanagement\";}symfony/user/sfUser/attributes|a:5:{s:30:\"symfony/user/sfUser/attributes\";a:1:{s:13:\"first_request\";b:0;}s:12:\"admin_module\";a:3:{s:16:\"sfGuardUser.sort\";a:2:{i:0;N;i:1;N;}s:17:\"sfGuardGroup.sort\";a:2:{i:0;N;i:1;N;}s:22:\"sfGuardPermission.sort\";a:2:{i:0;N;i:1;N;}}s:25:\"symfony/user/sfUser/flash\";a:0:{}s:32:\"symfony/user/sfUser/flash/remove\";a:0:{}s:19:\"sfGuardSecurityUser\";a:1:{s:7:\"user_id\";s:2:\"42\";}}symfony/user/sfUser/culture|s:2:\"en\";","1366739915","");
INSERT INTO session VALUES("47eci6jat6dipm81u1j8cc32u2","","1366736216","");
INSERT INTO session VALUES("995pnd4gnq9eh5mjbotve98n46","","1366732425","");
INSERT INTO session VALUES("h0rjdreka7b5cto3413mahnom2","","1366732435","");
INSERT INTO session VALUES("pkn9btb0o4iid46nfdft36tq76","","1366730788","");
INSERT INTO session VALUES("rqus3qlcdoosi230rtk7jfipr3","","1366736412","");



DROP TABLE sf_guard_forgot_password;

CREATE TABLE `sf_guard_forgot_password` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) NOT NULL,
  `unique_key` varchar(255) DEFAULT NULL,
  `expires_at` datetime NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id_idx` (`user_id`),
  CONSTRAINT `sf_guard_forgot_password_user_id_sf_guard_user_id` FOREIGN KEY (`user_id`) REFERENCES `sf_guard_user` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




DROP TABLE sf_guard_group;

CREATE TABLE `sf_guard_group` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `description` text,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

INSERT INTO sf_guard_group VALUES("7","investmentcertadmins","These are the RDB data management administrator. There function is to process certificate application assigned to them by department admins","2013-02-11 15:57:57","2013-02-11 18:06:57");
INSERT INTO sf_guard_group VALUES("8","departmentadmins","These are the Admins who can assign tasks to data admins","2013-02-11 15:58:57","2013-02-11 15:58:57");
INSERT INTO sf_guard_group VALUES("9","eiacertadmins","This is a set of users who can process EIA certificate and issue certificates assigned to them by Department Admins","2013-02-11 18:08:54","2013-02-11 18:08:54");
INSERT INTO sf_guard_group VALUES("10","investmentsupervisors","These are supervisors who assign tasks to data admins to process Investment Certificate Applications. They Monitor and supervisor Investment Certificate Registration Assigned to investment data admins","2013-02-28 07:56:15","2013-02-28 07:56:15");
INSERT INTO sf_guard_group VALUES("11","eiasupervisors","These are Supervisors who assign tasks to data admins responsible for processing applications for EIA Certificates. ","2013-02-28 07:58:20","2013-02-28 07:58:20");
INSERT INTO sf_guard_group VALUES("12","systemadministrators","For System Admins to Manage User Accounts","2013-04-23 17:49:44","2013-04-23 17:49:44");



DROP TABLE sf_guard_group_permission;

CREATE TABLE `sf_guard_group_permission` (
  `group_id` bigint(20) NOT NULL DEFAULT '0',
  `permission_id` bigint(20) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`group_id`,`permission_id`),
  KEY `sf_guard_group_permission_permission_id_sf_guard_permission_id` (`permission_id`),
  CONSTRAINT `sf_guard_group_permission_group_id_sf_guard_group_id` FOREIGN KEY (`group_id`) REFERENCES `sf_guard_group` (`id`) ON DELETE CASCADE,
  CONSTRAINT `sf_guard_group_permission_permission_id_sf_guard_permission_id` FOREIGN KEY (`permission_id`) REFERENCES `sf_guard_permission` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO sf_guard_group_permission VALUES("7","9","2013-02-11 18:50:55","2013-02-11 18:50:55");
INSERT INTO sf_guard_group_permission VALUES("8","7","2013-02-11 16:00:31","2013-02-11 16:00:31");
INSERT INTO sf_guard_group_permission VALUES("9","8","2013-02-11 18:09:52","2013-02-11 18:09:52");
INSERT INTO sf_guard_group_permission VALUES("10","10","2013-02-28 07:59:34","2013-02-28 07:59:34");
INSERT INTO sf_guard_group_permission VALUES("11","11","2013-02-28 08:00:20","2013-02-28 08:00:20");



DROP TABLE sf_guard_permission;

CREATE TABLE `sf_guard_permission` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `description` text,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

INSERT INTO sf_guard_permission VALUES("7","assignJob","Permission to Assign a Job to a data admin","2013-02-11 16:00:31","2013-02-11 16:00:31");
INSERT INTO sf_guard_permission VALUES("8","eiacert","Permission for EIA document processing","2013-02-11 18:09:52","2013-02-11 18:09:52");
INSERT INTO sf_guard_permission VALUES("9","investmentcert","Permission for Investment Certificate issues","2013-02-11 18:10:41","2013-02-11 18:10:41");
INSERT INTO sf_guard_permission VALUES("10","investmentassign","Permission for supervisors who are responsible for assigning tasks to data administrators","2013-02-28 07:59:34","2013-02-28 07:59:34");
INSERT INTO sf_guard_permission VALUES("11","eiaassign","Permission for EIA Supervisors who assign jobs to eia data administrators","2013-02-28 08:00:20","2013-02-28 08:00:20");
INSERT INTO sf_guard_permission VALUES("12","usermanagement","Permission to create, update, or delete user accounts in the system","2013-04-23 17:50:13","2013-04-23 17:50:13");



DROP TABLE sf_guard_remember_key;

CREATE TABLE `sf_guard_remember_key` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) DEFAULT NULL,
  `remember_key` varchar(32) DEFAULT NULL,
  `ip_address` varchar(50) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id_idx` (`user_id`),
  CONSTRAINT `sf_guard_remember_key_user_id_sf_guard_user_id` FOREIGN KEY (`user_id`) REFERENCES `sf_guard_user` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




DROP TABLE sf_guard_user;

CREATE TABLE `sf_guard_user` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email_address` varchar(255) NOT NULL,
  `outlook_address` varchar(255) DEFAULT NULL,
  `username` varchar(128) NOT NULL,
  `algorithm` varchar(128) NOT NULL DEFAULT 'sha1',
  `salt` varchar(128) DEFAULT NULL,
  `password` varchar(128) DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT '1',
  `is_super_admin` tinyint(1) DEFAULT '0',
  `last_login` datetime DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email_address` (`email_address`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `outlook_address` (`outlook_address`),
  KEY `is_active_idx_idx` (`is_active`)
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=latin1;

INSERT INTO sf_guard_user VALUES("22","Admin","Admin","manager@smartlinesolutions.net","","manager","sha1","0c0a8c48ef139c954f1d4a94a27c596d","e1aec6ccc7471d3acaeed8c5aec7111d562c17c0","1","0","2013-04-23 17:26:28","2013-02-11 14:40:30","2013-04-23 17:26:28");
INSERT INTO sf_guard_user VALUES("23","Investor","Investor","Mwendia.bonface4@gmail.com","","investor","sha1","34ee4498771273e07acc9ec759ccb2fd","bc0c34c859f745a1320c12bc935fdbe24241cd4a","1","0","2013-02-17 19:48:49","2013-02-11 14:47:34","2013-02-17 19:48:49");
INSERT INTO sf_guard_user VALUES("24","Bonie","Bonie","bonie@gmail.com","","bonie","sha1","158c19be6adba06a5834ba80c2d745c0","4b51b8a1709eeae758902f050982d83025ea75ad","1","0","2013-02-11 19:20:49","2013-02-11 15:53:27","2013-02-11 19:20:49");
INSERT INTO sf_guard_user VALUES("25","Investment","admin","investmentcertadmin@smartlinesolutions.net","","investmentadmin","sha1","f5de406cba10ea73fe17264545b9d5f7","28434b3e366da95cbdadd83753801d4afe99d76b","1","0","2013-02-13 11:52:12","2013-02-11 18:53:19","2013-02-13 11:52:12");
INSERT INTO sf_guard_user VALUES("26","eia","admin","eiacertadmin@smartlinesolutions.net","","eiaadmin","sha1","a8ef1a86054b381e871e71464bb395d1","4477039d5878d8f1f1b34ac57ed2cb7e5e4c3d83","1","0","2013-02-12 10:23:55","2013-02-11 18:56:37","2013-02-12 10:23:55");
INSERT INTO sf_guard_user VALUES("27","Investor2","Investor2","investor2@gmail.com","","investor2","sha1","b3e5a86974794277ed3df359e580036b","a93392060c6cb448ac49cdd30337d46e55f54432","1","0","2013-02-13 09:38:16","2013-02-13 09:37:05","2013-02-13 09:38:16");
INSERT INTO sf_guard_user VALUES("28","Investment","Supervisor","investsupervisor@otbafrica.com","","investmentsupervisor","sha1","5f0dff2daa264c29309e21e2ff2e97f3","66feeb0b51a72a8f27e7fd8c3a8b4f077542a074","1","0","2013-02-28 08:12:29","2013-02-28 07:51:26","2013-02-28 08:12:29");
INSERT INTO sf_guard_user VALUES("29","Eia","Supervisor","eiasupervisor@otbafrica.com","","eiasupervisor","sha1","067a15870a52a75a114ae6918d6df349","441f2d0ed62e411dcccf9adbbc9dc4a41c9a494c","1","0","","2013-02-28 07:52:58","2013-02-28 07:52:58");
INSERT INTO sf_guard_user VALUES("30","Investor3","Investor3","investor3@gmail.com","","investor3","sha1","ee8fad9e2e4075573d4f168fbb3af81b","6f34fdf93396c920c44d3d636680dc435fde51a1","1","0","","2013-04-08 12:29:39","2013-04-08 12:29:39");
INSERT INTO sf_guard_user VALUES("31","Investor4","Investor4","investor4@gmail.com","","investor4","sha1","53df2ba4275731089e060617dc501847","8ef0903e12287d18bab351101f9ebbdf2104af1f","1","0","","2013-04-08 12:30:28","2013-04-08 12:30:28");
INSERT INTO sf_guard_user VALUES("32","Investor5","Investor5","investor5@gmail.com","","investor5","sha1","46a4f0ccc47cefd44787d8fbce3fc163","5e86e5e383e655cd7bff862b9b232c65a0126b87","1","0","","2013-04-08 12:31:01","2013-04-08 12:31:01");
INSERT INTO sf_guard_user VALUES("33","Mugabo","Vianney","Mugabovia@yahoo.com","Vianney.mugabo@rdb.rw","Vianney.mugabo@rdb.rw","sha1","839e050c53cd5b53855ba9cec789ef2f","c19c7426b73c50a436f3aaee1cda19b2589f90ff","1","0","","2013-04-23 17:32:41","2013-04-23 17:32:41");
INSERT INTO sf_guard_user VALUES("34","Lydia"," MUTESI","tesilydia@yahoo.com","Lydia.mutesi@rdb.rw","Lydia.mutesi@rdb.rw","sha1","6cef7177d5dd11d980e2544ca8839690","f8c9eaac28370f31fb911642e2cda1787a511457","1","0","","2013-04-23 17:33:52","2013-04-23 17:33:52");
INSERT INTO sf_guard_user VALUES("35","Joseph"," MPUNGA","mpungaj@yahoo.fr","Joseph.mpunga@rdb.rw","Joseph.mpunga@rdb.rw","sha1","8592bf3d6b212b2db943d3d45e714518","b05ce4bbd2eadcb4fac62f6e9469d071b0752072","1","0","","2013-04-23 17:34:47","2013-04-23 17:34:47");
INSERT INTO sf_guard_user VALUES("36","KARARA ","Jean de Dieu","jdkarara@gmail.com","Jeandedieu.karara@rdb.rw","Jeandedieu.karara@rdb.rw","sha1","caf4b057d88a0edd474d0d4986b4a4f0","e726573476efc78e62080806cc7452bbfabf7e1c","1","0","","2013-04-23 17:35:45","2013-04-23 17:35:45");
INSERT INTO sf_guard_user VALUES("37","Ben ","BYANYIMA","Byanyimaben5@yahoo.com","Ben.byanyiima@rdb.rw","Ben.byanyiima@rdb.rw","sha1","bd63c399dbd5bbf07279761bb6eafcf2","41baf1462101226c92ce9febf98a5859a1ffddae","1","0","","2013-04-23 17:37:11","2013-04-23 17:37:11");
INSERT INTO sf_guard_user VALUES("38","Jacqueline"," MUSONI","Musoja2001@yahoo.com","Jacqueline.musoni@rdb.rw","Jacqueline.musoni@rdb.rw","sha1","202249fa81c84196d2b843089fbf0ff0","a182dec6afcedcaf0553f3ee399d6215e9fba23b","1","0","","2013-04-23 17:38:37","2013-04-23 17:38:37");
INSERT INTO sf_guard_user VALUES("39","DUSABEYEZU ","Sébastien","dusabeseba@yahoo.fr","Sebastian.dusabeyesu@rdb.rw","Sebastian.dusabeyesu@rdb.rw","sha1","9832539dfb99b24c3c5546611eb3a319","c40a9ae82f2c4c1b9724cad5fa26982941f0ea48","1","0","","2013-04-23 17:39:22","2013-04-23 17:39:22");
INSERT INTO sf_guard_user VALUES("40","HARERIMANA ","Simeon Ntuye","simeonntuye@yahoo.com","Simeon.ntuye@rdb.rw","Simeon.ntuye@rdb.rw","sha1","831ce7e9b4f26dc02bd811b2fc8e48c7","1f02641ae4ac5a9b432af28c146b2c931938acaf","1","0","","2013-04-23 17:40:10","2013-04-23 17:40:10");
INSERT INTO sf_guard_user VALUES("41","SEZIBERA ","Alain","Sezibera.alain@gmail.com","alain.sezibera@rdb.rw","alain.sezibera@rdb.rw","sha1","75ca3ec1fc2911b623b78e6e1ac8de0a","d3321a1a8767d02dc4681cd845abd4a103980168","1","0","","2013-04-23 17:40:54","2013-04-23 17:40:54");
INSERT INTO sf_guard_user VALUES("42","Administrator","Administrator","admin@rdb.com","admin@rdb.com","administrator","sha1","5aef8321c189559d9aa66a453ced7156","ad44f804c582b7563470a8912ea010acdf1b6ceb","1","0","2013-04-23 19:00:12","2013-04-23 17:51:04","2013-04-23 19:00:12");



DROP TABLE sf_guard_user_group;

CREATE TABLE `sf_guard_user_group` (
  `user_id` bigint(20) NOT NULL DEFAULT '0',
  `group_id` bigint(20) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`user_id`,`group_id`),
  KEY `sf_guard_user_group_group_id_sf_guard_group_id` (`group_id`),
  CONSTRAINT `sf_guard_user_group_group_id_sf_guard_group_id` FOREIGN KEY (`group_id`) REFERENCES `sf_guard_group` (`id`) ON DELETE CASCADE,
  CONSTRAINT `sf_guard_user_group_user_id_sf_guard_user_id` FOREIGN KEY (`user_id`) REFERENCES `sf_guard_user` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO sf_guard_user_group VALUES("22","8","2013-02-11 15:58:57","2013-02-11 15:58:57");
INSERT INTO sf_guard_user_group VALUES("24","7","2013-02-11 15:57:57","2013-02-11 15:57:57");
INSERT INTO sf_guard_user_group VALUES("25","7","2013-02-11 18:53:19","2013-02-11 18:53:19");
INSERT INTO sf_guard_user_group VALUES("26","9","2013-02-11 18:56:37","2013-02-11 18:56:37");
INSERT INTO sf_guard_user_group VALUES("28","10","2013-02-28 07:56:15","2013-02-28 07:56:15");
INSERT INTO sf_guard_user_group VALUES("29","11","2013-02-28 07:58:20","2013-02-28 07:58:20");
INSERT INTO sf_guard_user_group VALUES("33","7","2013-04-23 17:32:41","2013-04-23 17:32:41");
INSERT INTO sf_guard_user_group VALUES("34","7","2013-04-23 17:33:52","2013-04-23 17:33:52");
INSERT INTO sf_guard_user_group VALUES("35","8","2013-04-23 17:34:47","2013-04-23 17:34:47");
INSERT INTO sf_guard_user_group VALUES("36","9","2013-04-23 17:35:45","2013-04-23 17:35:45");
INSERT INTO sf_guard_user_group VALUES("37","9","2013-04-23 17:37:11","2013-04-23 17:37:11");
INSERT INTO sf_guard_user_group VALUES("38","9","2013-04-23 17:38:37","2013-04-23 17:38:37");
INSERT INTO sf_guard_user_group VALUES("39","11","2013-04-23 17:39:22","2013-04-23 17:39:22");
INSERT INTO sf_guard_user_group VALUES("40","9","2013-04-23 17:40:10","2013-04-23 17:40:10");
INSERT INTO sf_guard_user_group VALUES("41","9","2013-04-23 17:40:54","2013-04-23 17:40:54");
INSERT INTO sf_guard_user_group VALUES("42","12","2013-04-23 17:51:04","2013-04-23 17:51:04");



DROP TABLE sf_guard_user_permission;

CREATE TABLE `sf_guard_user_permission` (
  `user_id` bigint(20) NOT NULL DEFAULT '0',
  `permission_id` bigint(20) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`user_id`,`permission_id`),
  KEY `sf_guard_user_permission_permission_id_sf_guard_permission_id` (`permission_id`),
  CONSTRAINT `sf_guard_user_permission_permission_id_sf_guard_permission_id` FOREIGN KEY (`permission_id`) REFERENCES `sf_guard_permission` (`id`) ON DELETE CASCADE,
  CONSTRAINT `sf_guard_user_permission_user_id_sf_guard_user_id` FOREIGN KEY (`user_id`) REFERENCES `sf_guard_user` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO sf_guard_user_permission VALUES("25","9","2013-02-11 18:53:19","2013-02-11 18:53:19");
INSERT INTO sf_guard_user_permission VALUES("26","8","2013-02-11 18:56:37","2013-02-11 18:56:37");
INSERT INTO sf_guard_user_permission VALUES("33","9","2013-04-23 17:32:41","2013-04-23 17:32:41");
INSERT INTO sf_guard_user_permission VALUES("34","9","2013-04-23 17:33:52","2013-04-23 17:33:52");
INSERT INTO sf_guard_user_permission VALUES("35","7","2013-04-23 17:34:47","2013-04-23 17:34:47");
INSERT INTO sf_guard_user_permission VALUES("36","8","2013-04-23 17:35:46","2013-04-23 17:35:46");
INSERT INTO sf_guard_user_permission VALUES("37","8","2013-04-23 17:37:11","2013-04-23 17:37:11");
INSERT INTO sf_guard_user_permission VALUES("38","8","2013-04-23 17:38:37","2013-04-23 17:38:37");
INSERT INTO sf_guard_user_permission VALUES("39","11","2013-04-23 17:39:22","2013-04-23 17:39:22");
INSERT INTO sf_guard_user_permission VALUES("40","8","2013-04-23 17:40:10","2013-04-23 17:40:10");
INSERT INTO sf_guard_user_permission VALUES("41","8","2013-04-23 17:40:54","2013-04-23 17:40:54");
INSERT INTO sf_guard_user_permission VALUES("42","12","2013-04-23 17:51:04","2013-04-23 17:51:04");



DROP TABLE sf_guard_user_profile;

CREATE TABLE `sf_guard_user_profile` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) NOT NULL,
  `email_new` varchar(255) DEFAULT NULL,
  `firstname` varchar(255) DEFAULT NULL,
  `lastname` varchar(255) DEFAULT NULL,
  `validate_at` datetime DEFAULT NULL,
  `validate` varchar(33) DEFAULT NULL,
  `salutation` varchar(255) NOT NULL,
  `citizenship` varchar(255) NOT NULL,
  `surname` varchar(255) NOT NULL,
  `phone_number` varchar(255) NOT NULL,
  `id_passport` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_id` (`user_id`),
  UNIQUE KEY `email_new` (`email_new`),
  KEY `validate_idx` (`validate`),
  KEY `user_id_idx` (`user_id`),
  CONSTRAINT `sf_guard_user_profile_user_id_sf_guard_user_id` FOREIGN KEY (`user_id`) REFERENCES `sf_guard_user` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

INSERT INTO sf_guard_user_profile VALUES("2","23","","","","2013-02-12 15:34:19","r5fed2d86cb890f01d227e2cb2345e9b3","","","","","","2013-02-12 15:34:19","2013-02-12 15:34:19");



DROP TABLE sf_korero_channel;

CREATE TABLE `sf_korero_channel` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` text,
  `slug` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`),
  UNIQUE KEY `sf_korero_channel_sluggable_idx` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

INSERT INTO sf_korero_channel VALUES("2","General","General chat channel","general");



DROP TABLE sf_korero_message;

CREATE TABLE `sf_korero_message` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `channel_id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `message` text NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `channel_id_idx` (`channel_id`),
  KEY `user_id_idx` (`user_id`),
  CONSTRAINT `sf_korero_message_channel_id_sf_korero_channel_id` FOREIGN KEY (`channel_id`) REFERENCES `sf_korero_channel` (`id`) ON DELETE CASCADE,
  CONSTRAINT `sf_korero_message_user_id_sf_guard_user_id` FOREIGN KEY (`user_id`) REFERENCES `sf_guard_user` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




DROP TABLE site_visit;

CREATE TABLE `site_visit` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `eiaproject_id` bigint(20) NOT NULL,
  `site_visit` datetime NOT NULL,
  `remarks` varchar(255) DEFAULT NULL,
  `token` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `created_by` bigint(20) DEFAULT NULL,
  `updated_by` text,
  PRIMARY KEY (`id`),
  UNIQUE KEY `eiaproject_id` (`eiaproject_id`),
  KEY `eiaproject_id_idx` (`eiaproject_id`),
  KEY `created_by_idx` (`created_by`),
  CONSTRAINT `site_visit_created_by_sf_guard_user_id` FOREIGN KEY (`created_by`) REFERENCES `sf_guard_user` (`id`) ON DELETE CASCADE,
  CONSTRAINT `site_visit_eiaproject_id_e_i_a_project_detail_id` FOREIGN KEY (`eiaproject_id`) REFERENCES `e_i_a_project_detail` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




DROP TABLE startupexpenses;

CREATE TABLE `startupexpenses` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `business_plan` bigint(20) NOT NULL,
  `year1` bigint(20) DEFAULT NULL,
  `year2` bigint(20) DEFAULT NULL,
  `year3` bigint(20) DEFAULT NULL,
  `year4` bigint(20) DEFAULT NULL,
  `year5` bigint(20) DEFAULT NULL,
  `token` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `created_by` varchar(255) NOT NULL DEFAULT 'None',
  `updated_by` text,
  PRIMARY KEY (`id`),
  KEY `business_plan_idx` (`business_plan`),
  CONSTRAINT `startupexpenses_business_plan_investment_application_id` FOREIGN KEY (`business_plan`) REFERENCES `investment_application` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




DROP TABLE structurefinancial;

CREATE TABLE `structurefinancial` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `business_plan` bigint(20) NOT NULL,
  `local_source` bigint(20) DEFAULT NULL,
  `foreign_source` bigint(20) DEFAULT NULL,
  `token` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `created_by` varchar(255) NOT NULL DEFAULT 'None',
  `updated_by` text,
  PRIMARY KEY (`id`),
  KEY `business_plan_idx` (`business_plan`),
  CONSTRAINT `structurefinancial_business_plan_investment_application_id` FOREIGN KEY (`business_plan`) REFERENCES `investment_application` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




DROP TABLE task_assignment;

CREATE TABLE `task_assignment` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `user_assigned` bigint(20) NOT NULL,
  `investmentapp_id` bigint(20) NOT NULL,
  `instructions` text NOT NULL,
  `duedate` datetime NOT NULL,
  `work_status` varchar(255) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `created_by` bigint(20) DEFAULT NULL,
  `updated_by` text,
  PRIMARY KEY (`id`),
  UNIQUE KEY `investmentapp_id` (`investmentapp_id`),
  KEY `investmentapp_id_idx` (`investmentapp_id`),
  KEY `user_assigned_idx` (`user_assigned`),
  KEY `created_by_idx` (`created_by`),
  CONSTRAINT `task_assignment_created_by_sf_guard_user_id` FOREIGN KEY (`created_by`) REFERENCES `sf_guard_user` (`id`) ON DELETE CASCADE,
  CONSTRAINT `task_assignment_investmentapp_id_investment_application_id` FOREIGN KEY (`investmentapp_id`) REFERENCES `investment_application` (`id`) ON DELETE CASCADE,
  CONSTRAINT `task_assignment_user_assigned_sf_guard_user_id` FOREIGN KEY (`user_assigned`) REFERENCES `sf_guard_user` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




DROP TABLE tax_exemption_details;

CREATE TABLE `tax_exemption_details` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `office_name` varchar(255) DEFAULT NULL,
  `office_code` varchar(255) DEFAULT NULL,
  `company_name` varchar(255) DEFAULT NULL,
  `investment_certificate` varchar(255) DEFAULT NULL,
  `company_tin` bigint(20) DEFAULT NULL,
  `declarant_name` varchar(255) DEFAULT NULL,
  `declarant_reference` varchar(255) DEFAULT NULL,
  `declarant_code` varchar(255) DEFAULT NULL,
  `electronic_request_number` varchar(255) DEFAULT NULL,
  `electronic_authrization_number` varchar(255) DEFAULT NULL,
  `customs_declaration_reference` varchar(255) DEFAULT NULL,
  `revenue_officer` varchar(255) DEFAULT NULL,
  `revenue_officer_e_verification_date` datetime DEFAULT NULL,
  `revenue_officer_remarks` text,
  `rdb_officer_remarks` text,
  `status` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `created_by` bigint(20) DEFAULT NULL,
  `updated_by` text,
  PRIMARY KEY (`id`),
  KEY `created_by_idx` (`created_by`),
  CONSTRAINT `tax_exemption_details_created_by_sf_guard_user_id` FOREIGN KEY (`created_by`) REFERENCES `sf_guard_user` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




DROP TABLE tax_exemption_items;

CREATE TABLE `tax_exemption_items` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `tax_details_id` bigint(20) NOT NULL,
  `rdb` tinyint(1) DEFAULT NULL,
  `rra` tinyint(1) DEFAULT NULL,
  `hs_code` bigint(20) DEFAULT NULL,
  `description` text,
  `cif` bigint(20) DEFAULT NULL,
  `quantity` bigint(20) DEFAULT NULL,
  `import_duties` bigint(20) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `created_by` bigint(20) DEFAULT NULL,
  `updated_by` text,
  PRIMARY KEY (`id`),
  KEY `tax_details_id_idx` (`tax_details_id`),
  KEY `created_by_idx` (`created_by`),
  CONSTRAINT `tax_exemption_items_created_by_sf_guard_user_id` FOREIGN KEY (`created_by`) REFERENCES `sf_guard_user` (`id`) ON DELETE CASCADE,
  CONSTRAINT `tax_exemption_items_tax_details_id_tax_exemption_details_id` FOREIGN KEY (`tax_details_id`) REFERENCES `tax_exemption_details` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




DROP TABLE tor;

CREATE TABLE `tor` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `eiaproject_id` bigint(20) NOT NULL,
  `issues_assessed` text NOT NULL,
  `specific_tasks` text NOT NULL,
  `stake_holders` text NOT NULL,
  `experts` text NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `created_by` bigint(20) DEFAULT NULL,
  `updated_by` text,
  PRIMARY KEY (`id`),
  KEY `eiaproject_id_idx` (`eiaproject_id`),
  KEY `created_by_idx` (`created_by`),
  CONSTRAINT `tor_created_by_sf_guard_user_id` FOREIGN KEY (`created_by`) REFERENCES `sf_guard_user` (`id`) ON DELETE CASCADE,
  CONSTRAINT `tor_eiaproject_id_e_i_a_project_detail_id` FOREIGN KEY (`eiaproject_id`) REFERENCES `e_i_a_project_detail` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




DROP TABLE tor_submit;

CREATE TABLE `tor_submit` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `eiaproject_id` bigint(20) NOT NULL,
  `attachement` varchar(255) NOT NULL,
  `remarks` text NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `created_by` bigint(20) DEFAULT NULL,
  `updated_by` text,
  PRIMARY KEY (`id`),
  UNIQUE KEY `eiaproject_id` (`eiaproject_id`),
  KEY `eiaproject_id_idx` (`eiaproject_id`),
  KEY `created_by_idx` (`created_by`),
  CONSTRAINT `tor_submit_created_by_sf_guard_user_id` FOREIGN KEY (`created_by`) REFERENCES `sf_guard_user` (`id`) ON DELETE CASCADE,
  CONSTRAINT `tor_submit_eiaproject_id_e_i_a_project_detail_id` FOREIGN KEY (`eiaproject_id`) REFERENCES `e_i_a_project_detail` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




