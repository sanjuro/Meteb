CREATE TABLE activity (id BIGINT AUTO_INCREMENT, sfuser_id BIGINT, title VARCHAR(255), activitytype_id BIGINT, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX activitytype_id_idx (activitytype_id), INDEX sfuser_id_idx (sfuser_id), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE activity_type (id BIGINT AUTO_INCREMENT, title VARCHAR(255), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE client_status (id BIGINT AUTO_INCREMENT, title VARCHAR(255) NOT NULL, PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE commission (id BIGINT AUTO_INCREMENT, title DECIMAL(15, 2), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE expensedata (id BIGINT AUTO_INCREMENT, renewal_expenses VARCHAR(20) NOT NULL, expense_inflation VARCHAR(20) NOT NULL, initial_expenses VARCHAR(20) NOT NULL, loadings VARCHAR(20) NOT NULL, PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE gender (id BIGINT AUTO_INCREMENT, title VARCHAR(255) NOT NULL, PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE marketdata (id BIGINT AUTO_INCREMENT, uploaded_at DATETIME NOT NULL, inception_date DATETIME NOT NULL, month_array TEXT NOT NULL, discounting_array TEXT NOT NULL, dhfactors_matrix TEXT NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE mortality_rate (id BIGINT AUTO_INCREMENT, age BIGINT, mortality_male DECIMAL(10, 6), mortality_female DECIMAL(10, 6), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE pri (id BIGINT AUTO_INCREMENT, title DECIMAL(15, 3), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE quote (id BIGINT AUTO_INCREMENT, client_id BIGINT, quote_type_id BIGINT, created_by BIGINT, second_life BIGINT, main_sex BIGINT, main_dob DATE NOT NULL, spouse_sex BIGINT, spouse_dob DATE NOT NULL, gp BIGINT, spouse_reversion_id BIGINT, pri_id BIGINT, annuity DECIMAL(15, 2), purchase_price DECIMAL(15, 2), initial_gross_annuity DECIMAL(15, 2), initial_net_annuity DECIMAL(15, 2), commission_id BIGINT, commence_at DATETIME NOT NULL, expires_at DATETIME NOT NULL, first_annuity_increase DATETIME NOT NULL, guaranteed_terms BIGINT, premium_charge DECIMAL(15, 5), fund_charge DECIMAL(15, 5), administrative_charge DECIMAL(15, 5), created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX client_id_idx (client_id), INDEX quote_type_id_idx (quote_type_id), INDEX created_by_idx (created_by), INDEX main_sex_idx (main_sex), INDEX spouse_sex_idx (spouse_sex), INDEX commission_id_idx (commission_id), INDEX spouse_reversion_id_idx (spouse_reversion_id), INDEX pri_id_idx (pri_id), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE quote_type (id BIGINT AUTO_INCREMENT, title VARCHAR(255) NOT NULL, PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE spouse_reversion (id BIGINT AUTO_INCREMENT, title DECIMAL(15, 2), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE system (id BIGINT AUTO_INCREMENT, PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE tax_rate (id BIGINT AUTO_INCREMENT, tax_rate DECIMAL(10, 5), start_bracket BIGINT, PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE tax_rebate (id BIGINT AUTO_INCREMENT, age BIGINT, rebate BIGINT, PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE user_profile_index (keyword VARCHAR(200), field VARCHAR(50), position BIGINT, id BIGINT, PRIMARY KEY(keyword, field, position, id)) ENGINE = INNODB;
CREATE TABLE user_profile (id BIGINT AUTO_INCREMENT, sfuser_id BIGINT, gender_id BIGINT, status_id BIGINT, parent_user_id BIGINT, fsp_license_number VARCHAR(12), title VARCHAR(30), name VARCHAR(30) NOT NULL, surname VARCHAR(30) NOT NULL, dob DATE NOT NULL, telephone VARCHAR(20) NOT NULL, mobile VARCHAR(20) NOT NULL, idnumber VARCHAR(20) NOT NULL, fax VARCHAR(20) NOT NULL, postaladdress VARCHAR(100) NOT NULL, streetaddress VARCHAR(100) NOT NULL, spouse_name VARCHAR(30) NOT NULL, spouse_surname VARCHAR(30) NOT NULL, spouse_dob DATE, spouse_gender_id BIGINT, spouseidnumber VARCHAR(20) NOT NULL, company VARCHAR(30) NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX sfuser_id_idx (sfuser_id), INDEX gender_id_idx (gender_id), INDEX status_id_idx (status_id), INDEX parent_user_id_idx (parent_user_id), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE sf_guard_forgot_password (id BIGINT AUTO_INCREMENT, user_id BIGINT NOT NULL, unique_key VARCHAR(255), expires_at DATETIME NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX user_id_idx (user_id), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE sf_guard_group (id BIGINT AUTO_INCREMENT, name VARCHAR(255) UNIQUE, description TEXT, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE sf_guard_group_permission (group_id BIGINT, permission_id BIGINT, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(group_id, permission_id)) ENGINE = INNODB;
CREATE TABLE sf_guard_permission (id BIGINT AUTO_INCREMENT, name VARCHAR(255) UNIQUE, description TEXT, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE sf_guard_remember_key (id BIGINT AUTO_INCREMENT, user_id BIGINT, remember_key VARCHAR(32), ip_address VARCHAR(50), created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX user_id_idx (user_id), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE sf_guard_user (id BIGINT AUTO_INCREMENT, first_name VARCHAR(255), last_name VARCHAR(255), email_address VARCHAR(255) NOT NULL UNIQUE, username VARCHAR(128) NOT NULL UNIQUE, algorithm VARCHAR(128) DEFAULT 'sha1' NOT NULL, salt VARCHAR(128), password VARCHAR(128), is_active TINYINT(1) DEFAULT '1', is_super_admin TINYINT(1) DEFAULT '0', last_login DATETIME, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX is_active_idx_idx (is_active), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE sf_guard_user_group (user_id BIGINT, group_id BIGINT, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(user_id, group_id)) ENGINE = INNODB;
CREATE TABLE sf_guard_user_permission (user_id BIGINT, permission_id BIGINT, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(user_id, permission_id)) ENGINE = INNODB;
ALTER TABLE activity ADD CONSTRAINT activity_sfuser_id_sf_guard_user_id FOREIGN KEY (sfuser_id) REFERENCES sf_guard_user(id) ON DELETE CASCADE;
ALTER TABLE activity ADD CONSTRAINT activity_activitytype_id_activity_type_id FOREIGN KEY (activitytype_id) REFERENCES activity_type(id);
ALTER TABLE quote ADD CONSTRAINT quote_spouse_sex_gender_id FOREIGN KEY (spouse_sex) REFERENCES gender(id);
ALTER TABLE quote ADD CONSTRAINT quote_spouse_reversion_id_spouse_reversion_id FOREIGN KEY (spouse_reversion_id) REFERENCES spouse_reversion(id);
ALTER TABLE quote ADD CONSTRAINT quote_quote_type_id_quote_type_id FOREIGN KEY (quote_type_id) REFERENCES quote_type(id);
ALTER TABLE quote ADD CONSTRAINT quote_pri_id_pri_id FOREIGN KEY (pri_id) REFERENCES pri(id);
ALTER TABLE quote ADD CONSTRAINT quote_main_sex_gender_id FOREIGN KEY (main_sex) REFERENCES gender(id);
ALTER TABLE quote ADD CONSTRAINT quote_created_by_sf_guard_user_id FOREIGN KEY (created_by) REFERENCES sf_guard_user(id) ON DELETE CASCADE;
ALTER TABLE quote ADD CONSTRAINT quote_commission_id_commission_id FOREIGN KEY (commission_id) REFERENCES commission(id);
ALTER TABLE quote ADD CONSTRAINT quote_client_id_sf_guard_user_id FOREIGN KEY (client_id) REFERENCES sf_guard_user(id) ON DELETE CASCADE;
ALTER TABLE user_profile_index ADD CONSTRAINT user_profile_index_id_user_profile_id FOREIGN KEY (id) REFERENCES user_profile(id) ON UPDATE CASCADE ON DELETE CASCADE;
ALTER TABLE user_profile ADD CONSTRAINT user_profile_status_id_client_status_id FOREIGN KEY (status_id) REFERENCES client_status(id);
ALTER TABLE user_profile ADD CONSTRAINT user_profile_sfuser_id_sf_guard_user_id FOREIGN KEY (sfuser_id) REFERENCES sf_guard_user(id) ON DELETE CASCADE;
ALTER TABLE user_profile ADD CONSTRAINT user_profile_parent_user_id_sf_guard_user_id FOREIGN KEY (parent_user_id) REFERENCES sf_guard_user(id);
ALTER TABLE user_profile ADD CONSTRAINT user_profile_gender_id_gender_id FOREIGN KEY (gender_id) REFERENCES gender(id);
ALTER TABLE sf_guard_forgot_password ADD CONSTRAINT sf_guard_forgot_password_user_id_sf_guard_user_id FOREIGN KEY (user_id) REFERENCES sf_guard_user(id) ON DELETE CASCADE;
ALTER TABLE sf_guard_group_permission ADD CONSTRAINT sf_guard_group_permission_permission_id_sf_guard_permission_id FOREIGN KEY (permission_id) REFERENCES sf_guard_permission(id) ON DELETE CASCADE;
ALTER TABLE sf_guard_group_permission ADD CONSTRAINT sf_guard_group_permission_group_id_sf_guard_group_id FOREIGN KEY (group_id) REFERENCES sf_guard_group(id) ON DELETE CASCADE;
ALTER TABLE sf_guard_remember_key ADD CONSTRAINT sf_guard_remember_key_user_id_sf_guard_user_id FOREIGN KEY (user_id) REFERENCES sf_guard_user(id) ON DELETE CASCADE;
ALTER TABLE sf_guard_user_group ADD CONSTRAINT sf_guard_user_group_user_id_sf_guard_user_id FOREIGN KEY (user_id) REFERENCES sf_guard_user(id) ON DELETE CASCADE;
ALTER TABLE sf_guard_user_group ADD CONSTRAINT sf_guard_user_group_group_id_sf_guard_group_id FOREIGN KEY (group_id) REFERENCES sf_guard_group(id) ON DELETE CASCADE;
ALTER TABLE sf_guard_user_permission ADD CONSTRAINT sf_guard_user_permission_user_id_sf_guard_user_id FOREIGN KEY (user_id) REFERENCES sf_guard_user(id) ON DELETE CASCADE;
ALTER TABLE sf_guard_user_permission ADD CONSTRAINT sf_guard_user_permission_permission_id_sf_guard_permission_id FOREIGN KEY (permission_id) REFERENCES sf_guard_permission(id) ON DELETE CASCADE;
